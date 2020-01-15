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
    /**
     * insert a new signed adherent file
     */
    public function uploadAdherentFile($adherentName,$adherentFirstname,$fileName,$finalPath,$categorie){
        $req = $this->db->prepare('INSERT INTO p5_adherent_files(adherent_name,
        adherent_firstname,adherent_fileName,adherent_fileUrl,upload_date,category_id) 
                    VALUES (?,?,?,?,NOW(),?)');
        $req->execute(array($adherentName,$adherentFirstname,$fileName,$finalPath,$categorie));

    }
    /**
     * Select a category of file
     */
    public function chooseCategory(){
        $req = $this->db->query('SELECT * FROM p5_files_category');
        return $req;
    }
}