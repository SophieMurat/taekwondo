<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;

require_once('model/SliderManager.php');

class FrontendController
{
    private $sliderManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
    }

    /**
     * get all the images for the slider
     */
    public function slider(){
        $slides = $this->sliderManager->getAllSlides();

        require('view/homePageView.php');
    }


}