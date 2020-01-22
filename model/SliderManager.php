<?php

namespace taekwondo\model;

class SliderManager extends Manager 
{
    /**
     * Stock a new image
     */
    public function addOneImage($path,$title){ 
        $req = $this->db->prepare('INSERT INTO p5_images(image_path, image_title) VALUES (?,?)');
        $newSlide=$req->execute(array($path,$title));
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
    /**
     * Get the title of the image that need to be modified
     */
    public function getOneSlide($imageId){
        $req = $this->db->prepare('SELECT image_title FROM p5_images WHERE id=?');
        $req->execute(array($imageId));
        $image=$req->fetch();
        return $image;
    }
    /**
     * Modify one image of the slider
     */
    public function modifySlide($path,$title,$slideId){
        $req=$this->db->prepare('UPDATE p5_images SET image_path=?, image_title=? WHERE id=?');
        $updatedImage=$req->execute(array($path,$title,$slideId));
        return $updatedImage;
    }
    /**
     * Delete one image from the slider
     */
    public function deleteSlide($imageId){
        $req=$this->db->prepare('DELETE FROM p5_images WHERE id=?');
        $deletedSlide=$req->execute(array($imageId));
    }
}