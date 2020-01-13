<?php

namespace taekwondo\model;

require_once("model/Manager.php");

class SliderManager extends Manager 
{
    /**
     * Stock a new image
     */
    public function addOneImage($path,$title){ 
        $req = $this->db->prepare('INSERT INTO p5_images(image_path, image_title) VALUES (?,?)');
        $newSlide=$req->execute(array($path,$title));
        var_dump($newSlide);
        return $newSlide;
    }
    /**
     * Get all slides
     */
    public function getAllSlides(){
        $req =$this->db->query('SELECT * FROM p5_images');
        $result=$req->fetchAll();
        return $result;
    }
}