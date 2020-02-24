<?php

namespace taekwondo;
/**
 * Class Autoloader that allows the automatic charging of all the classes
 */

class Autoloader {
    /**
     * Record the autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));//spl_autoload_register créé une file d'attente de fonctions d'autochargement
    }
    /**
     * autoload the files according to our class
     * @param $class string class's name to autoload
     */
    static function autoload($class){
        if(strpos($class,__NAMESPACE__.'\\')===0):// strpos cherche la position de la première occurence dans une chaîne   
        $class= str_replace(__NAMESPACE__.'\\','',$class);
        $class= str_replace('\\','/',$class);// ligne pas nécessaire dans ce projet(quand on a besoin d'ecrire un chemin en html)
        require __DIR__.'/' . $class . '.php';
        endif;
    }
}