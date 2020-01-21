<?php

namespace taekwondo\model;

class Entity {
    
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }
    
    public function hydrate($data)
    {
      foreach ($data as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }
}