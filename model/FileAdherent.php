<?php

namespace taekwondo\model;

/**
 * Class managing everyting concerning the adherents files
 */

class FileAdherent extends Entity
{
    private $id;
    private $adherent_name;
    private $adherent_firstname;
    private $adherent_city;
    private $adherent_file_name;
    private $adherent_file_url;
    private $upload_date;
    private $category_id;
    private $sentDate;

   /**
    * Getters list
    */

    public function getId(){
        return $this->id;
    }
    public function getAdherent_name(){
        return $this->adherent_name;
    }
    public function getAdherent_firstname(){
        return $this->adherent_firstname;
    }
    public function getAdherent_city(){
        return $this->adherent_city;
    }
    public function getAdherent_file_name(){
        return $this->adherent_file_name;
    }
    public function getAdherent_file_url(){
        return $this->adherent_file_url;
    }
    public function getUpload_date(){
        return $this->upload_date;
    }
    public function getCategory_id(){
        return $this->category_id;
    }
    public function getSentDate(){
        return $this->sentDate;
    }
      /**
       * Setters list
       */

      public function setId($id)
      {
          $id = (int)$id;
          if($id>0):
              $this->id =$id;
          endif;
      }
      public function setAdherent_name($adherent_name)
      {
          if(is_string($adherent_name)):
              $this->adherent_name=$adherent_name;
          endif;
      }
      public function setAdherent_firstname($adherent_firstname)
      {
          if(is_string($adherent_firstname)):
              $this->adherent_firstname=$adherent_firstname;
          endif;
      }
      public function setAdherent_city($adherent_city)
      {
          if(is_string($adherent_city)):
              $this->adherent_city=$adherent_city;
          endif;
      }
      public function setAdherent_file_name($adherent_file_name)
      {
          if(is_string($adherent_file_name)):
              $this->adherent_file_name=$adherent_file_name;
          endif;
      }
      public function setAdherent_file_url($adherent_file_url)
      {
          if(is_string($adherent_file_url)):
              $this->adherent_file_url=$adherent_file_url;
          endif;
      }
}