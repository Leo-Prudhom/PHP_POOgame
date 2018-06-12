<?php

  require_once '../autoload.php';
  use Entity\Personnage;
  use Manager\PersonnageManager;

  //connexion bdd
$pdo = new PDO('mysql:host=localhost;dbname=minifightgame','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <meta charset="utf-8">
  <title>MEGA BASTON game</title>
</head>
<header>
  <p><<a href="index.php">Menu</a></p>
</header>

<body>
