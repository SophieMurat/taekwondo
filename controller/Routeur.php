<?php

namespace taekwondo\controller;

use taekwondo\controller\FrontendController;
use taekwondo\controller\BackendController;

require_once('controller/FrontendController.php');
require_once('controller/BackendController.php');

class Routeur {

    private $FrontendController;
    private $BackendController;

    public function __construct(){
        $this->FrontendController = new FrontendController();
        $this->BackendController = new BackendController();
    }
    /**
     * Choose the action according to the request
     */
    public function routerRequete(){
        try{
            if (isset($_GET['action'])){    
                if ($_GET['action'] == 'slider'){
                    $this->FrontendController->slider();
                }
                elseif ($_GET['action'] == 'addImageChoice') {
                    $this->BackendController->addImageChoice();
                }
                elseif ($_GET['action'] == 'addImage') {
                    $this->BackendController->addImage();
                }
            }
            else {
                echo'page en cours de construction';
            }
        }
        catch (Exception $e) {
            erreur($e->getMessage());
        }
    }
}