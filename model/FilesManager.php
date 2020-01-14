<?php

namespace taekwondo\model;

require_once("model/Manager.php");

class FilesManager extends Manager 
{
    /**
     * Add a new admin file
     */
    public function addAdminFile($file_name,$finalPath,$titleFile){
        $req = $this->db->prepare('INSERT INTO admin_files(name_file, file_url,title_file) VALUES (?,?,?)');
        $req->execute(array($file_name,$finalPath,$titleFile));
    }
    /**
     * Post all the inscriptions files online
     */
    public function listInscriptionFiles(){
        $req = $this->db->query('SELECT file_url, title_file FROM admin_files');
        return $req;
    }
}