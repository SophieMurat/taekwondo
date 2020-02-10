<?php

namespace taekwondo\model;
/**
 * Class managing everyting concerning the events
 */

class Event extends Entity
{
    private $id;
    private $title;
    private $posted_date;
    private $content;
    private $event_date;
    private $dateEvent;

    // Liste des getters

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getPosted_date(){
        return $this->post_date;
    }
    public function getContent(){
        return $this->content;
    }
    public function getEvent_date(){
        return $this->event_date;
    }
    public function getDateEvent(){
        return $this->dateEvent;
    }

    // liste des setters

    public function setId($id)
    {
        $id = (int)$id;
        if($id>0):
            $this->id =$id;
        endif;
    }
    public function setTitle($title)
    {
        if(is_string($title)):
            $this->title=$title;
        endif;
    }
    public function setPosted_date($posted_date){
        $this->posted_date=$posted_date;
    }
    public function setContent($content){
        if(is_string($content)):
            $this->content=$content;
        endif;
    }
    public function setEvent_date($event_date){
        $this->event_date=$event_date;
    }
}