<?php

namespace taekwondo\model;

class EventsManager extends Manager
{
    /**
     * Create an Event
     */
    public function createEvent(Event $event){
        $req=$this->db->prepare('INSERT INTO events (title,posted_date, content,event_date)
        VALUES(?,NOW(),?,?)');
        $createdEvent=$req->execute(array($event->getTitle(),$event->getContent(),$event->getEvent_date()));
        return $createdEvent;
    }
}