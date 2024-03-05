<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'resrvation'); 

  $connexion = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
 
  if ($connexion === false) {
    die("Échec de la connexion : " . $connexion->connect_error);
    }
    else{
        echo "la connexion est bonne";
    }