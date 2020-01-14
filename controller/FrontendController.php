<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;

require_once('model/SliderManager.php');
require_once('model/FilesManager.php');

class FrontendController
{
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
        require ('view/informationsView.php');
    }


}