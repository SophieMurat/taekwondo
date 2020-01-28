<?php

namespace taekwondo\model;

class FileAdherent extends Entity
{
    private $id;
    private $adherent_name;
    private $adherent_firstname;
    private $adherent_city;
    private $adherent_fileName;
    private $adherent_fileUrl;
    private $upload_date;
    private $category_id;
    private $sentDate;

    //liste des getters

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
    public function getAdherent_fileName(){
        return $this->adherent_fileName;
    }
    public function getAdherent_fileUrl(){
        return $this->adherent_fileUrl;
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
      // liste des setters

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
      public function setAdherent_fileName($adherent_fileName)
      {
          if(is_string($adherent_fileName)):
              $this->adherent_fileName=$adherent_fileName;
          endif;
      }
      public function setAdherent_fileUrl($adherent_fileUrl)
      {
          if(is_string($adherent_fileUrl)):
              $this->adherent_fileUrl=$adherent_fileUrl;
          endif;
      }
}