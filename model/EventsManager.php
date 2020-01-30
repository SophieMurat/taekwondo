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
    /**
     * Catch 5 events per page
     */
    public function getEvents($start,$perPage){
        $req=$this->db->query("SELECT title, posted_date, content,
        DATE_FORMAT(event_date,'%d/%m/%Y') AS dateEvent FROM events
        ORDER BY STR_TO_DATE(dateEvent,'%d/%m/%Y') DESC LIMIT $start,$perPage");
        $events=$req->fetchAll(\PDO::FETCH_CLASS,'taekwondo\model\Event');
        return $events;
    }
     /**
     * get the count of events
     */
    public function countEvent(){
        $count=(int)$this->db->query('SELECT COUNT(id) FROM events')->fetch()[0];
        return $count;
    }
      /**
     * Get all events
     */
    public function getAllEvents()
    {
        $req = $this->db->query("SELECT id, title, content, 
       DATE_FORMAT(event_date,'%d/%m/%Y') AS dateEvent FROM events ORDER BY dateEvent DESC");
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 
        'taekwondo\model\Event');
        return $req;
    }
    /**
     * Delete one chosen post
     */
    public function eventDelete(Event $event){
        $req = $this->db->prepare('DELETE FROM events WHERE id=?');
        $deletedEvent = $req->execute(array($event->getId()));
        return $deletedEvent;
    }
    /**
     * Get one Event
     */
    public function getEvent($eventId){
        $req = $this->db->prepare("SELECT id, title,content,event_date FROM events
        WHERE id=? ");
        $req->execute(array($eventId));
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 
        'taekwondo\model\Event');
        $event = $req->fetch();
        return $event;
    }
    /**
     * Update one Event
     */
    public function eventUpdate(Event $event){
        $req = $this->db->prepare("UPDATE events SET title=?,content=?,event_date =?
         WHERE id=?");
        $updatedEvent=$req->execute(array($event->getTitle(),$event->getContent(),$event->getEvent_date()
        ,$event->getId()));
        return $updatedEvent;
    }
}