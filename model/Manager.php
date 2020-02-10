<?php

namespace taekwondo\model;
/**
 * class Manager
 * manage the connection to the database
 */

class Manager
{
    protected $db;
    protected $ini;
    
    public function __construct(){
        $this->db = $this->dbConnect();
    }
    
    private function dbConnect()
    {
        $this->ini= parse_ini_file('app/app.ini');
        $db = new \PDO('mysql:host='.$this->ini['db_host'].';dbname=' .$this->ini['db_name'].';charset=utf8',
        $this->ini['db_user'],$this->ini['db_password']);
        return $db; // renvoie la connection
    }
}