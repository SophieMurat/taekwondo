<?php

namespace taekwondo\model;

/**
 * Class managing everyting concerning the admins files
 */

class FileAdmin extends Entity
{
    private $id;
    private $name_file;
    private $file_url;
    private $title_file;

    /**
     * Getters list
     */
    public function getId(){
        return $this->id;
    }
    public function getName_file(){
        return $this->name_file;
    }
    public function getFile_url(){
        return $this->file_url;
    }
    public function getTitle_file(){
        return $this->title_file;
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
    public function setName_file($name_file)
    {
          if(is_string($name_file)):
              $this->name_file=$name_file;
          endif;
    }
    public function setFile_url($file_url)
    {
          if(is_string($file_url)):
              $this->file_url=$file_url;
          endif;
    }
    public function setTitle_file($title_file)
    {
          if(is_string($title_file)):
              $this->title_file=$title_file;
          endif;
    }
}