<?php

$host = ""; 
$base = "";
$user = "";
$pass = "";

try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $base, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
}


//SESSION
session_start();

require_once 'fonction.php';

