<?php

namespace taekwondo\model;

/**
 * Class AdminManager
 * class creating and reading for the entity Admin
 */

class AdminManager extends Manager
{
    /**
     *  Create a new admin
     */
    public function setAdmin(Admin $admin){
        $req =$this->db->prepare('INSERT INTO P5_admins(admin_name,password,login)
        VALUES(?,?,?)');
        $req->execute(array($admin->admin_name(),$admin->password(),$admin->login()));
    }
    /**
     * Login with an account already created
     * @param [string] $login
     */
    public function login($login){
        $req = $this->db->prepare('SELECT id,admin_name,password, login FROM P5_admins 
        WHERE login=? ');
        $req->execute(array($login));
        $adminData=$req->fetch(\PDO::FETCH_ASSOC);
        
        if (!$adminData):
            return false;
        else:
            return new Admin($adminData);
        endif;
    }
}