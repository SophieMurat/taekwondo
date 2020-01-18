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
            $newSlide= $this->sliderManager->addOneImage($path,$title);
            if($newSlide){
                move_uploaded_file($_FILES['image']['tmp_name'], $path);// on recupère une image n'importe ou sur le pc et cela la range le fichier avec le path indiqué
                $this->msg = 'L\'image a bien été ajoutée';
            }
            else{
                $this->msg = 'erreur lors de l\'ajout de l\'image';
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
            if(in_array($fileExtension,$extensionAllowed)){
                $movePath= move_uploaded_file($temporaryPath,$finalPath);
                if($movePath){
                    $this->filesManager->addAdminFile($file_name,$finalPath,$titleFile);
                    $this->msg =' le fichier a bien été chargé';
                }
                else {
                    $this->msg= 'Une erreur est survenue lors de l\'envoi du fichier';
                }
            }else {
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