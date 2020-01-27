<?php

namespace taekwondo\model;

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
    public function uploadAdherentFile($adherentName,$adherentFirstname,$adherentCity,$fileName,$finalPath,$categorie){
        $req = $this->db->prepare('INSERT INTO p5_adherent_files(adherent_name,
        adherent_firstname,adherent_city,adherent_fileName,adherent_fileUrl,upload_date,category_id) 
                    VALUES (?,?,?,?,?,NOW(),?)');
        $req->execute(array($adherentName,$adherentFirstname,$adherentCity,$fileName,$finalPath,$categorie));

    }
    /**
     * Select a category of file
     */
    public function chooseCategory(){
        $req = $this->db->query('SELECT * FROM p5_files_category');
        return $req;
    }
    /**
     * Select the signed inscriptions files according to there categories.
     */
    public function signedFiles($categoryFile){
        $req = $this->db->prepare("SELECT adherent_name,
        adherent_firstname,adherent_city,adherent_fileName,adherent_fileUrl, 
        DATE_FORMAT(upload_date,GET_FORMAT(DATE, 'EUR')) 
        AS sentDate ,category_id 
        FROM p5_adherent_files 
        WHERE category_id=?"); 
        $req->execute(array($categoryFile));
        $signedFiles=$req->fetchAll();
        return $signedFiles;
    }
    /**
     * Add a new Category
     */
    public function addCategory($category){
        $req =$this->db->prepare('INSERT INTO p5_files_category(category_name)
        VALUES(?)');
        $req->execute(array($category));
    }
    /**
     * Delete a category
    */
    public function deleteCategory($categoryId){
        $req =$this->db->prepare('DELETE FROM p5_files_category WHERE id=?');
        $req->execute(array($categoryId));
    }
}