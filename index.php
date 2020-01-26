<?php
session_start();

require_once('Autoloader.php');
use taekwondo\Autoloader;
use taekwondo\controller\Routeur;

Autoloader::register();

$routeur = new Routeur();
$routeur->routerRequete();

