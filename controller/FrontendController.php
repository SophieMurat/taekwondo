<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;
use taekwondo\model\EventsManager;
use taekwondo\model\FileAdherent;


class FrontendController
{
    public $msg= "";
    private $sliderManager;
    private $filesManager;
    private $eventsManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
        $this->filesManager = new FilesManager();
        $this->eventsManager = new EventsManager();
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
        if(isset($_POST['upload'])):
            if(!empty($_FILES)&&!empty($_POST['city'])&&!empty($_POST['name'])&&!empty($_POST['firstname'])
            &&strlen(trim($_POST['name']))&&strlen(trim($_POST['firstname']))):
                $temporaryPath= $_FILES['adherent_file']['tmp_name'];
                $fileName= $_FILES['adherent_file']['name'];
                $temp=explode(".",$fileName);
                $newName=round(microtime(true)).'.'.end($temp);
                $finalPath= 'public/adherent_files/'.$newName;
                $fileExtension= strrchr($newName, ".");
                $extensionAllowed= array('.pdf', '.PDF');
                $maxSize = 2000000;
                $size = ($_FILES['adherent_file']['size']);
                if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0):
                    $movePath= move_uploaded_file($temporaryPath,$finalPath);
                    if($movePath):
                        $file= new FileAdherent(array(
                            'adherent_name'=>$_POST['name'],
                            'adherent_firstname'=>$_POST['firstname'],
                            'adherent_city'=>$_POST['city'],
                            'adherent_fileName'=>$newName
                        ));
                        $uploadedFile=$this->filesManager->uploadAdherentFile($file,$finalPath,$_POST['category']);
                        $this->msg =' Le fichier a bien été chargé';;
                    else :
                        $this->msg= 'Une erreur est survenue lors de l\'envoi du fichier';
                    endif;
                elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0):
                    $this->msg='Le fichier ne doit pas faire plus de 2Mo';
                else:
                    $this->msg= 'Seuls les fichiers PDF sont autorisés.';
                endif;
            else:
                $this->msg='Veuillez bien remplir tous les champs';
            endif;
        endif;
        $this->informations();
    }
    /**
     * Load error page
     */
    public function error(){
        $this->msg= 'Accès refusé!';
        require('view/errorView.php');
    }
    public function events(){
        $count= $this->eventsManager->countEvent();
        $currentPage=$_GET['page'] ?? 1;
        if(!filter_var($currentPage, FILTER_VALIDATE_INT)):
            $this->msg='Numéro de page invalide';
            require('view/errorView.php');
            exit;
        endif;
        if($currentPage <= 0):
            $this->msg='Numéro de page invalide';
            require('view/errorView.php');
            exit;
        endif;
        /*if($currentPage === '1'):
            header('Location:/p5/taekwondo/events');
            exit;
        endif;*/
        $perPage= 3;
        $start =$perPage*($currentPage-1);
        $pages = ceil($count /$perPage);
        if ($currentPage > $pages):
            $this->msg='Pas d\'évènements disponibles sur cette page';
            require('view/errorView.php');
        else:
        $events = $this->eventsManager->getEvents($start,$perPage);
        require('view/eventsView.php');
        endif;
    }
}