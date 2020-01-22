<?php

namespace taekwondo\controller;

use taekwondo\controller\FrontendController;
use taekwondo\controller\BackendController;


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
                elseif ($_GET['action'] == 'informations'){
                    $this->FrontendController->informations();
                }
                elseif ($_GET['action'] == 'sendInscriptionFile'){
                    $this->FrontendController->sendInscriptionFile();
                }
                elseif ($_GET['action'] == 'login') {
                    $this->BackendController->login();
                }
                elseif(!empty($_SESSION)){
                    if ($_GET['action'] == 'addImageChoice') {
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
                    elseif ($_GET['action'] == 'admin') {
                        $this->BackendController->admin();
                    }
                    elseif ($_GET['action'] == 'getSignedFiles') {
                        $this->BackendController->getsignedFiles();
                    }
                    elseif ($_GET['action'] == 'adminCreate') {
                        $this->BackendController->adminCreate();
                    }
                    elseif ($_GET['action'] == 'unlog') {
                        $this->BackendController->unplug();
                    }
                    elseif ($_GET['action'] == 'createCategory') {
                        $this->BackendController->createCategory();
                    }
                    elseif ($_GET['action'] == 'deleteCategory') {
                        $this->BackendController->deleteCategory();
                    }
                    elseif ($_GET['action'] == 'cancelConfirm') {
                        $this->BackendController->cancelConfirm();
                    }
                    else{
                        $this->FrontendController->error();
                    }  
                }
                else{
                    $this->FrontendController->error();
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