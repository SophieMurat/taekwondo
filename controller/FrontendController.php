<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;


class FrontendController
{
    public $msg= "";
    private $sliderManager;
    private $filesManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
        $this->filesManager = new FilesManager();
    }

    /**
     * get all the images for the slider
     */
    public function slider(){
        $slides = $this->sliderManager->getAllSlides();

        require('view/homePageView.php');
    }
    /**
     * Show all the informations hours and documents
     */
    public function informations(){
        $inscriptionFiles=$this->filesManager->listInscriptionFiles();
        $categories=$this->filesManager->chooseCategory();
        require ('view/informationsView.php');
    }
    /**
     * Send the filled inscription files
     */
    public function sendInscriptionFile(){
        if(!empty($_FILES)){
            $temporaryPath= $_FILES['adherent_file']['tmp_name'];
            $fileName= $_FILES['adherent_file']['name'];
            $finalPath= 'public/adherent_files/'.$fileName;
            $fileExtension= strrchr($fileName, ".");
            $extensionAllowed= array('.pdf', '.PDF');
            $adherentName=$_POST['name'];
            $adherentFirstname=$_POST['firstname'];
            if(in_array($fileExtension,$extensionAllowed)){
                $movePath= move_uploaded_file($temporaryPath,$finalPath);
                if($movePath){
                    $uploadedFile=$this->filesManager->uploadAdherentFile($adherentName,$adherentFirstname,
                    $fileName,$finalPath,$_POST['category']);
                    $this->msg =' le fichier a bien été chargé';;
                }
                else {
                    $this->msg= 'Une erreur est survenue lors de l\'envoi du fichier';
                }
            }else {
                $this->msg= 'Seuls les fichiers PDF sont autorisés.';
            }
            header('Location: index.php?action=informations');
        }
        header('Location: index.php?action=informations');
    }

}