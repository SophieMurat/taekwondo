<?php

namespace taekwondo\model;
/**
 * Class managing everyting concerning the admins
 */
class Admin extends Entity
{
    private $id;
    private $admin_name;
    private $password;
    private $login;

    // Liste des getters

    public function id(){
        return $this->id;
    }
    public function admin_name(){
        return $this->admin_name;
    }
    public function login(){
        return $this->login;
    }
    public function password(){
        return $this->password;
    }
    // Liste des setters

    public function setId($id)
    {
        $id = (int)$id;
        if($id>0):
            $this->id =$id;
        endif;
    }
    public function setAdmin_name($adminName)
    {
        if(is_string($adminName)):
            $this->admin_name=$adminName;
        endif;
    }
    public function setLogin($login)
    {
        if(is_string($login)):
            $this->login=$login;
        endif;
    }
    public function setPassword($password){
        if(is_string($password)):
            $this->password=$password;
        endif;
    }
}
