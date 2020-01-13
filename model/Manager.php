<?php

namespace taekwondo\model;

class Manager
{
    protected $db;
    
    public function __construct(){
        $this->db = $this->dbConnect();
    }
    
    private function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=p5;charset=utf8', 'root', '');
        return $db; // renvoie la connection
    }
}