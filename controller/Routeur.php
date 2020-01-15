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
                elseif ($_GET['action'] == 'addInscriptionFileChoice') {
                    $this->BackendController->addInscriptionFileChoice();
                }
                elseif ($_GET['action'] == 'addInscriptionFile') {
                    $this->BackendController->addInscriptionFile();
                }
                if ($_GET['action'] == 'informations'){
                    $this->FrontendController->informations();
                }
                if ($_GET['action'] == 'sendInscriptionFile'){
                    $this->FrontendController->sendInscriptionFile();
                }
            }
            else {
                $this->FrontendController->slider();
            }
        }
        catch (Exception $e) {
            erreur($e->getMessage());
        }
    }
}