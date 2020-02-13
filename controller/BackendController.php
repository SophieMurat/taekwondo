<?php

namespace taekwondo\controller;

use taekwondo\model\SliderManager;
use taekwondo\model\FilesManager;
use taekwondo\model\AdminManager;
use taekwondo\model\Admin;
use taekwondo\model\EventsManager;
use taekwondo\model\Event;
use taekwondo\model\FileAdmin;
use taekwondo\model\Category;
use taekwondo\model\Slide;
use taekwondo\model\FileAdherent;

/**
 * Class BackendController
 * Manage all the functions of the admin part
 */
class BackendController
{
    public $msg= "";
    public $error=false;
    public $validate=false;
    public $rootPath="/p5/taekwondo/";
    private $sliderManager;
    private $filesManager;
    private $eventsManager;

    public function __construct(){
        $this->sliderManager = new SliderManager();
        $this->filesManager = new FilesManager();
        $this->adminsManager = new AdminManager();
        $this->eventsManager = new EventsManager();
    }

    /**
     * add a new image from the admin part and show action on the list of slides
     */
    public function addImage(){
        $slides=$this->sliderManager->getAllSlides();
        if(isset($_POST['upload'])):
            if (isset($_POST['upload'])&& isset($_POST['title'])&& strlen(trim($_POST['title']))):
                $image = $_FILES['image']['name'];
                $title= $_POST['title'];
                $temp = explode(".", $image);
                $imageName=round(microtime(true)). '.'. end($temp);
                $path ='public/img/'.$imageName;
                $fileExtension= strrchr($imageName, ".");
                $extensionAllowed= array('.png', '.jpg', '.jpeg');
                $maxSize = 2000000;
                $size = ($_FILES['image']['size']);
                if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0):
                    $slide=new Slide(array(
                        'image_title'=>$_POST['title'],
                        'image_path'=>'public/img/'.$imageName
                    ));
                    $newSlide= $this->sliderManager->addOneImage($slide);
                    $movePath=move_uploaded_file($_FILES['image']['tmp_name'], $path);// on recupère une image n'importe ou sur le pc et cela la range le fichier avec le path indiqué
                    if($movePath):
                        header('Location:'.$this->rootPath.'addImage#gallery');
                    else:
                        $this->msg = 'erreur lors de l\'ajout de l\'image';
                    endif;
                elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0):
                    $this->msg='L\'image ne doit pas faire plus de 2Mo';
                else:
                    $this->msg= 'Seuls les images au format jpg,jpeg et png sont autorisées';
                endif;
            else:
                $this->msg='Veuillez indiquer un titre pour votre image';
            endif;
        require('view/addImageView.php');
        endif;
        require('view/addImageView.php');
    }
    /**
     * Delete a slide
     */
    public function deleteSlide(){
        if (isset($_GET['id']) && $_GET['id'] > 0):
            $slide= new Slide(array(
                'id'=>$_GET['id']
            ));
            $deletedSlide=$this->sliderManager->deleteSlide($slide);
            if($deletedSlide === false):
                header("HTTP:1.0 404 Not Found");
                throw new \Exception('Erreur veuillez contacter votre developpeur!');
            else:
                //unlink ($deletedSlide->getImage_path());
                header('Location:'.$this->rootPath.'addImage');
            endif;
        else:
            $this->msg='Aucun identifiant d\'image envoyé';
            require('view/errorView.php');
        endif;
    }
    /**
     * Choose to add an inscription File and see the signed inscription files
     */
    public function addInscriptionFileChoice(){
        $categories=$this->filesManager->chooseCategory();
        if(isset($_POST['fileCategory'])):
            $fileCategory=$this->filesManager->signedFiles($_POST['category']);
        endif;
        require('view/inscriptionFilesView.php');  
    }
    /**
     * Delete an adherent file
     */
    public function deleteAdherentFile(){
        if (isset($_GET['id']) && $_GET['id'] > 0):
            $categories=$this->filesManager->chooseCategory();
            $file= new FileAdherent(array(
                'id'=>$_GET['id']
            ));
            $deletedFile=$this->filesManager->deleteAdherentFile($file);
            if($deletedFile === false):
                header("HTTP:1.0 404 Not Found");
                throw new \Exception('Erreur veuillez contacter votre developpeur!');
            else:
                require('view/inscriptionFilesView.php');
            endif;
        else:
            $this->msg='Aucun identifiant de fichier envoyé';
            require('view/errorView.php');
        endif;
    }
    /***
     * Add an inscription file from the admin part
     */
    public function addInscriptionFile(){
        if(isset($_POST['upload'])):
            if(!empty($_FILES)&& !empty($_POST['fileName'])&&strlen(trim($_POST['fileName']))):
                $temporaryPath= $_FILES['pdf_file']['tmp_name'];
                $file_name= $_FILES['pdf_file']['name'];
                $temp=explode(".",$file_name);
                $fileName=round(microtime(true)).'.'.end($temp);
                $finalPath = 'public/admin_files/'.$fileName;
                $fileExtension = strrchr($fileName, ".");
                $extensionAllowed = array('.pdf', '.PDF');
                $maxSize = 2000000;
                $size = ($_FILES['pdf_file']['size']);
                if(in_array($fileExtension,$extensionAllowed) && $size<$maxSize && $size!==0):
                    $file= new FileAdmin(array(
                        'name_file'=>$_FILES['pdf_file']['name'],
                        'file_url'=>'public/admin_files/'.$fileName,
                        'Title_file'=>$_POST['fileName']
                    ));
                    $newFile= $this->filesManager->addAdminFile($file);
                    $path=move_uploaded_file($temporaryPath,$finalPath);
                    if($path):
                        move_uploaded_file($temporaryPath,$finalPath);
                        $this->msg =' Le fichier a bien été envoyé';
                    else:
                        $this->msg= 'Une erreur est survenue lors de l\'envoi du fichier';
                    endif;
                elseif(in_array($fileExtension,$extensionAllowed) && $size>$maxSize || $size ==0):
                    $this->msg='Le fichier ne doit pas faire plus de 2Mo';
                else:
                        $this->msg= 'Seuls les fichiers PDF sont autorisés.';
                endif;
            else:
                $this->msg= 'Veuillez indiquer le nom de votre fichier';
            endif; 
        endif;
        $this->addInscriptionFileChoice();
    }
    /**
     * Open the admin dashboard 
     */
    public function admin(){
        require('view/adminView.php');
    }
    /**
    * Create an account
    */
    public function adminCreate(){
        if(isset($_POST['submit'])):
            if (!empty($_POST['name']) && !empty($_POST['login'])
            && !empty($_POST['password']) && !empty($_POST['password_confirmation'])):
                $admin =$this->adminsManager->login($_POST['login']);
                if($admin):
                    $this->error=true;
                    $this->msg='Login déjà utilisé!';              
                elseif($_POST['password'] !== $_POST['password_confirmation']):
                    $this->error=true;
                    $this->msg='Les mots de passe ne sont pas identiques';
                else:
                    $hash_pwd=password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $newAdmin = new Admin(array(
                        'admin_name'=>$_POST['name'],
                        'password'=> $hash_pwd, 
                        'login'=>$_POST['login']));
                    $this->adminsManager->setAdmin($newAdmin);
                    $this->validate=true;
                    $this->msg='Le nouveau compte a bien été ajouté!';
                endif;
            else :
                $this->error=true;
                $this->msg='Veuillez remplir tous les champs';
            endif;
            require('view/createAdmin.php');
        else:
            require('view/createAdmin.php');
        endif;
    }
    /**
     * Sign in 
     */
    public function login(){
        if(isset($_POST['submit'])):
            if (!empty($_POST['login']) && !empty($_POST['password'])):
                $admin =$this->adminsManager->login($_POST['login']);
                if(!$admin):
                    $this->error=true;
                    $this->msg ='Login inconnu seuls les administrateurs ont accès
                    à cette page';
                else:
                    $hashChecked=password_verify($_POST['password'],$admin->password());
                    if($hashChecked):
                        header('Location:'.$this->rootPath.'admin');
                        $_SESSION['login']=$admin->login();
                        $_SESSION['id']=$admin->id();
                        $_SESSION['user_name']=$admin->admin_name();
                    else:
                        $this->error=true;
                        $this->msg ='Mauvais mot de passe';
                    endif;
                endif;             
            else :
                $this->error=true;
                $this->msg='Veuillez remplir tous les champs';
            endif;
            require('view/loginView.php');
        else:
            require('view/loginView.php');
        endif;
    }
    /**
     * Disconnect
     * Close the open Session
     */
    public function unplug(){
        session_destroy();
        header('Location:'.$this->rootPath.'login');
    }
    /**
     * Add a new category
     */
    public function createCategory(){
        $categories=$this->filesManager->chooseCategory();
        if(isset($_POST['create'])):
            $category= new Category(array(
                'category_name'=>$_POST['category']
            ));
            $newCategory=$this->filesManager->addCategory($category);
            header('Location:'.$this->rootPath.'createCategory');
        endif;
        require('view/createCategoryView.php');
    }
    /**
     * Delete a category
     */
    public function deleteCategory(){
        $categories=$this->filesManager->chooseCategory();
        if (isset($_GET['id']) && $_GET['id'] > 0):
            $category= new Category(array(
                'id'=>$_GET['id']
            ));
            $deleted=$this->filesManager->deleteCategory($category);
            if($deleted === false):
                header("HTTP:1.0 404 Not Found");
                throw new \Exception('Erreur veuillez contacter votre developpeur!');
            else:
                header('Location:'.$this->rootPath.'createCategory');
            endif;
        else:
            $this->msg='Aucun identifiant de catégorie envoyé';
            require('view/errorView.php');
        endif;
    }
    /**
     * Open the event management part
     */
    public function eventManagement(){
        require('view/eventManagementView.php');
    }
    /**
     * Open the create event View
     */
    public function createEvent(){
        require('view/addEventView.php');
    }
    /**
     * Add a new Event
     */
    public function addEvent(){
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['event_date'])
        && strlen(trim($_POST['title']))):
            $newEvent= new Event(array(
                'title'=>$_POST['title'],
                'content'=>$_POST['content'],
                'event_date'=>$_POST['event_date']));
            $created=$this->eventsManager->createEvent($newEvent);
            if ($created === false):
                $this->error=true;
                $this->msg='Impossible d\'ajouter l\'évènement!';
            else:
                $this->validate=true;
                $this->msg='L\'évènement a bien été créé';
            endif;
        else:
            $this->error=true;
            $this->msg='Veuillez remplir le titre, la date et le contenu de l\'évènement';
        endif;
        require('view/addEventView.php');
    }
    /**
     * List of all events in the amdin part
     */
    public function getAllEvents(){
        $events=$this->eventsManager->getAllEvents();
        require('view/listEventsAdminView.php');
    }
    /**
     * Delete One Event
     */
    public function deleteEvent(){
        if (isset($_GET['id']) && $_GET['id'] > 0):
            $deletedEvent=new Event(array('id'=>$_GET['id']));
            $event =$this->eventsManager->eventDelete($deletedEvent);
            if($event === false):
                header("HTTP:1.0 404 Not Found");
                throw new \Exception('Erreur veuillez contacter votre developpeur!');
            else:
                header('Location:'.$this->rootPath.'allEvents');
            endif;
        else :
            $this->msg='Aucun identifiant de billet envoyé';
            require('view/errorView.php');
        endif; 
    }
    /**
     * Show the event that need to be modify
     */
    public function modifyEvent(){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $event = $this->eventsManager->getEvent($_GET['id']);
            if($event === false){
                header("HTTP:1.0 404 Not Found");
                header('Location:'.$this->rootPath.'errorView');
            }
            else{
                require('view/updateEventView.php');
            }
        }
        else {
            $this->msg='Aucun identifiant d\'évènement envoyé';
            require('view/errorView.php');
        }   
    }
    /**
     * Open one event
     */
    public function getEvent(){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $event = $this->eventsManager->getEvent($_GET['id']);
            if($event === false){
                header("HTTP:1.0 404 Not Found");
                throw new \Exception('Erreur veuillez contacter votre developpeur!');
            }
            else{
                require('view/eventView.php');
            }
        }
        else {
            $this->msg='Aucun identifiant d\'évènement envoyé';
            require('view/errorView.php');
        }  
    }
    /**
     * Upade an Event
     */
    public function updateEvent(){
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['event_date']) 
        && strlen(trim($_POST['title']))){
            $updatedEvent= new Event(array(
                'title'=>$_POST['title'],
                'content'=>$_POST['content'],
                'event_date'=>$_POST['event_date'],
                'id'=>$_GET['id']
            ));
            $update=$this->eventsManager->eventUpdate($updatedEvent);
            if ($update === false) {
                $event = $this->eventsManager->getEvent($_GET['id']);
                $this->error= true;
                $this->msg='Impossible de modifier l\'article !';
                require('view/updateEventView.php');
            }
            else {
                header('Location:'.$this->rootPath.'allEvents');
            }
        }
        else{
            $event = $this->eventsManager->getEvent($_GET['id']);
            $this->error= true;
            $this->msg='Veuillez remplir tous les champs!';
            require('view/updateEventView.php');
        }
    }
}