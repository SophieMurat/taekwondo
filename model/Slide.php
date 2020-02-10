<?php

namespace taekwondo\model;

/**
 * Class managing everyting concerning the slides for the slider
 */

class Slide extends Entity
{
    private $id;
    private $image_title;
    private $image_path;

    /**
     * Getters list
     */
    public function getId(){
        return $this->id;
    }
    public function getImage_title(){
        return $this->image_title;
    }
    public function getImage_path(){
        return $this->image_path;
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
    public function setImage_title($image_title)
    {
          if(is_string($image_title)):
              $this->image_title=$image_title;
          endif;
    }
    public function setImage_path($image_path)
    {
          if(is_string($image_path)):
              $this->image_path=$image_path;
          endif;
    }
}