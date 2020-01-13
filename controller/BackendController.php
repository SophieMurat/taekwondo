<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;

require_once('model/SliderManager.php');

class BackendController
{
    public $msg= "";
    private $sliderManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
    }

    /**
     * add a new image from the admin par
     */
    public function addImage(){
        if (isset($_POST['upload'])){
            $image = $_FILES['image']['name'];
            $title= $_POST['title'];
            $path ='public/img/'.$image;
            var_dump($path);
            var_dump($title);
            $newSlide= $this->sliderManager->addOneImage($path,$title);
            var_dump($newSlide);
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
    public function addImageChoice(){
        require('view/addImageView.php');
    }
}