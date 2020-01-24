<?php
session_start();
var_dump($_GET);

require_once('Autoloader.php');
use taekwondo\Autoloader;
use taekwondo\controller\Routeur;

Autoloader::register();

$routeur = new Routeur();
$routeur->routerRequete();

