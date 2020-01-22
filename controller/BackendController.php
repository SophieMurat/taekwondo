<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;
use taekwondo\model\AdminManager;
use taekwondo\model\Admin;


class BackendController
{
    public $msg= "";
    public $error=false;
    private $sliderManager;
    private $filesManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
        $this->filesManager = new FilesManager();
        $this->adminsManager = new AdminManager();
    }

    /**
     * add a new image from the admin part and show action on the list of slides
     */
    public function addImage(){
        $slides=$this->sliderManager->getAllSlides();
        if (isset($_POST['upload'])){
            $image = $_FILES['image']['name'];
            $title= $_POST['title'];
            $temp = explode(".", $image);
            $imageName=round(microtime(true)). '.'. end($temp);
            $path ='public/img/'.$imageName;
            $fileExtension= strrchr($imageName, ".");
            $extensionAllowed= array('.png', '.jpg', '.jpeg');
            $maxSize = 2000000;
            $size = ($_FILES['image']['size']);
            if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0){
                $newSlide= $this->sliderManager->addOneImage($path,$title);
                $movePath=move_uploaded_file($_FILES['image']['tmp_name'], $path);// on recupère une image n'importe ou sur le pc et cela la range le fichier avec le path indiqué
                if($movePath){
                    header('Location:index.php?action=addImage');
                }
                else{
                    $this->msg = 'erreur lors de l\'ajout de l\'image';
                }
            }
            elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0){
                $this->msg='L\'image ne doit pas faire plus de 2Mo';
            }
            else{
                $this->msg= 'Seuls les images au format jpg,jpeg et png sont autorisées';
            }
        }
        require('view/addImageView.php');
    }
    /**
     * modify a slide
     */
    public function updateImage(){
        if (isset($_POST['upload'])){
            $image = $_FILES['image']['name'];
            $title= $_POST['title'];
            $temp = explode(".", $image);
            $imageName=round(microtime(true)). '.'. end($temp);
            $path ='public/img/'.$imageName;
            $fileExtension= strrchr($imageName, ".");
            $extensionAllowed= array('.png', '.jpg', '.jpeg');
            $maxSize = 2000000;
            $size = ($_FILES['image']['size']);
            if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0){
                $newSlide= $this->sliderManager->modifySlide($path,$title,$_GET['imageId']);
                $movePath=move_uploaded_file($_FILES['image']['tmp_name'], $path);// on recupère une image n'importe ou sur le pc et cela la range le fichier avec le path indiqué
                if($movePath){
                    header('Location:index.php?action=addImage');
                }
                else{
                    $this->msg = 'erreur lors de l\'ajout de l\'image';
                }
            }
            elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0){
                $this->msg='L\'image ne doit pas faire plus de 2Mo';
            }
            else{
                $this->msg= 'Seuls les images au format jpg,jpeg et png sont autorisées';
            }
        }
        require('view/modifyImageView.php');
    }
    /**
     * Delete a slide
     */
    public function deleteSlide(){
        $deletedSlide=$this->sliderManager->deleteSlide($_GET['imageId']);
        header('Location:index.php?action=addImage');
    }
    /**
     * Choose to add an inscription File and see the signed inscription files
     */
    public function addInscriptionFileChoice(){
        $categories=$this->filesManager->chooseCategory();
        if(isset($_POST['fileCategory'])){
            $fileCategory=$this->filesManager->signedFiles($_POST['category']);
        }
        require('view/inscriptionFilesView.php');  
    }
    /***
     * Add an inscription file from the admin part
     */
    public function addInscriptionFile(){
        if(!empty($_FILES)){
            $temporaryPath= $_FILES['pdf_file']['tmp_name'];
            $file_name= $_FILES['pdf_file']['name'];
            $finalPath = 'public/admin_files/'.$file_name;
            $fileExtension = strrchr($file_name, ".");
            $extensionAllowed = array('.pdf', '.PDF');
            $titleFile=$_POST['fileName'];
            $maxSize = 2000000;
            $size = ($_FILES['pdf_file']['size']);
            if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0){
                $newFile= $this->filesManager->addAdminFile($file_name,$finalPath,$titleFile);
                $path=move_uploaded_file($temporaryPath,$finalPath);
                if($path){
                    move_uploaded_file($temporaryPath,$finalPath);
                    $this->msg =' le fichier a bien été chargé';
                }
                else {
                    $this->msg= 'Une erreur est survenue lors de l\'envoi du fichier';
                }
            }
            elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0){
                $this->msg='Le fichier ne doit pas faire plus de 2Mo';
            }
            else {
                    $this->msg= 'Seuls les fichiers PDF sont autorisés.';
            }
        }
        $this->addInscriptionFileChoice();
    }
    /**
     * Open the admin dashboard 
     */
    public function admin(){
        require('view/adminView.php');
    }
    /**
    * Create an account
    */
    public function adminCreate(){
        if(isset($_POST['submit'])){
            if (!empty($_POST['name']) && !empty($_POST['login'])
            && !empty($_POST['password']) && !empty($_POST['password_confirmation'])) {
                $admin =$this->adminsManager->login($_POST['login']);
                if($admin){
                    $this->error=true;
                    $this->msg='Login déjà utilisé!';              
                }
                elseif($_POST['password'] !== $_POST['password_confirmation']){
                    $this->error=true;
                    $this->msg='Les mots de passe ne sont pas identiques';
                }
                else{
                    $hash_pwd=password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $newAdmin = new Admin(array(
                        'admin_name'=>$_POST['name'],
                        'password'=> $hash_pwd, 
                        'login'=>$_POST['login']));
                    $this->adminsManager->setAdmin($newAdmin);
                    $this->error=true;
                    $this->msg='Le nouveau compte a bien été ajouté!';
                }
            }
            else {
                $this->error=true;
                $this->msg='Veuillez remplir tous les champs';
            }
            require('view/createAdmin.php');
        }
        else{
            require('view/createAdmin.php');
        }
    }
    /**
     * Sign in 
     */
    public function login(){
        if(isset($_POST['submit'])){
            if (!empty($_POST['login']) && !empty($_POST['password'])){
                $admin =$this->adminsManager->login($_POST['login']);
                var_dump($admin);
                if(!$admin){
                    $this->error=true;
                    $this->msg ='Login inconnu seuls les administrateurs ont accès
                    à cette page';
                }
                else{
                    $hashChecked=password_verify($_POST['password'],$admin->password());
                    if($hashChecked){
                        header('Location: index.php?action=admin');
                        $_SESSION['login']=$admin->login();
                        $_SESSION['id']=$admin->id();
                        $_SESSION['user_name']=$admin->admin_name();
                    }
                    else{
                        $this->error=true;
                        $this->msg ='Mauvais mot de passe';
                    }
                }              
            }
            else {
                $this->error=true;
                $this->msg='Veuillez remplir tous les champs';
            }
            require('view/loginView.php');
        }
        else{
            require('view/loginView.php');
        }
    }
    /**
     * Disconnect
     * Close the open Session
     */
    public function unplug(){
        session_destroy();
        header('Location: index.php?action=login');
    }
    /**
     * Add a new category
     */
    public function createCategory(){
        $categories=$this->filesManager->chooseCategory();
        if(isset($_POST['create'])){
            $newCategory=$this->filesManager->addCategory($_POST['category']);
            header('location:index.php?action=createCategory');
        }
        require('view/createCategoryView.php');
    }
    /**
     * Delete a category
     */
    public function deleteCategory(){
        $categories=$this->filesManager->chooseCategory();
        $deleted=$this->filesManager->deleteCategory($_GET['categoryId']);
        header('location:index.php?action=createCategory');
    }
    /**
     * Open the modify ImageView with its form
     */
    public function modifyImage(){
        $imageModify=$this->sliderManager->getOneSlide($_GET['imageId']);
        require('view/modifyImageView.php');
    }
}