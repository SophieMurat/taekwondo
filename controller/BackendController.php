<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;


class BackendController
{
    public $msg= "";
    private $sliderManager;
    private $filesManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
        $this->filesManager = new FilesManager();
    }

    /**
     * add a new image from the admin par
     */
    public function addImage(){
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
            /*var_dump($size);
            var_dump($maxSize);
            var_dump($size<$maxSize);*/
            if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0){
                $newSlide= $this->sliderManager->addOneImage($path,$title);
                $movePath=move_uploaded_file($_FILES['image']['tmp_name'], $path);// on recupère une image n'importe ou sur le pc et cela la range le fichier avec le path indiqué
                if($movePath){
                    $this->msg = 'L\'image a bien été ajoutée';
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
     * Choose to add an Image
     */
    public function addImageChoice(){
        require('view/addImageView.php');
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
            var_dump($size);
            var_dump($maxSize);
            var_dump($size<$maxSize);
            if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0){
                $newFile= $this->filesManager->addAdminFile($file_name,$finalPath,$titleFile);
                $path=move_uploaded_file($temporaryPath,$finalPath);
                var_dump($path);
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
}