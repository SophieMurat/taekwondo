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
            if (isset($_GET['action'])):   
                if ($_GET['action'] == 'slider'):
                    $this->FrontendController->slider();
                elseif ($_GET['action'] == 'informations'):
                    $this->FrontendController->informations();
                elseif ($_GET['action'] == 'sendInscriptionFile'):
                    $this->FrontendController->sendInscriptionFile();
                elseif ($_GET['action'] == 'events'):
                    $this->FrontendController->events();
                elseif ($_GET['action'] == 'login'):
                    $this->BackendController->login();
                elseif(!empty($_SESSION)):
                    if ($_GET['action'] == 'addImage'):
                        $this->BackendController->addImage();
                    elseif ($_GET['action'] == 'addInscriptionFileChoice'):
                        $this->BackendController->addInscriptionFileChoice();                         
                    elseif ($_GET['action'] == 'deleteImage'):
                        $this->BackendController->deleteSlide();                         
                    elseif ($_GET['action'] == 'addInscriptionFile'):
                        $this->BackendController->addInscriptionFile();
                    elseif ($_GET['action'] == 'admin'):
                        $this->BackendController->admin();
                    elseif ($_GET['action'] == 'getSignedFiles'):
                        $this->BackendController->getsignedFiles();
                    elseif ($_GET['action'] == 'deleteAdherentFile'):
                        $this->BackendController->deleteAdherentFile();
                    elseif ($_GET['action'] == 'adminCreate'):
                        $this->BackendController->adminCreate();
                    elseif ($_GET['action'] == 'unlog'):
                        $this->BackendController->unplug();
                    elseif ($_GET['action'] == 'createCategory'):
                        $this->BackendController->createCategory();
                    elseif ($_GET['action'] == 'deleteCategory'):
                        $this->BackendController->deleteCategory();
                    elseif ($_GET['action'] == 'eventManagement'):
                        $this->BackendController->eventManagement();
                    elseif ($_GET['action'] == 'createEvent'):
                        $this->BackendController->createEvent();
                    elseif ($_GET['action'] == 'addEvent'):
                        $this->BackendController->addEvent();
                    elseif ($_GET['action'] == 'allEvents'):
                        $this->BackendController->getAllEvents();
                    elseif ($_GET['action'] == 'deleteEvent'):
                        $this->BackendController->deleteEvent();
                    elseif ($_GET['action'] == 'modifyEvent'):
                        $this->BackendController->modifyEvent();
                    elseif ($_GET['action'] == 'updateEvent'):
                        $this->BackendController->updateEvent();
                    else:
                        $this->FrontendController->error();
                    endif;
                else:
                    $this->FrontendController->error();
                endif;
            else:
                $this->FrontendController->slider();
            endif;
        }
        catch (Exception $e) {
            erreur($e->getMessage());
        }
    }
}