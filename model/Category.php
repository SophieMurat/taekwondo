<?php

namespace taekwondo\model;

class Category extends Entity
{
    private $id;
    private $category_name;

    //getters
    public function getId(){
        return $this->id;
    }
    public function getCategory_name(){
        return $this->category_name;
    }

    //setters
    public function setId($id)
    {
          $id = (int)$id;
          if($id>0):
              $this->id =$id;
          endif;
    }
    public function setCategory_name($category_name)
    {
          if(is_string($category_name)):
              $this->category_name=$category_name;
          endif;
    }
}