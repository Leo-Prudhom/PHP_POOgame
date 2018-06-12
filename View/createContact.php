<?php
require_once 'header.php';
$personnageInsert = new Entity\Personnage(['name' => $_POST['name'], 'strength' => $_POST['strength']]);

$manager = new Manager\PersonnageManager($pdo);

$OK = $manager->create($personnageInsert);

  if ($OK)
  {
    $msg = $personnageInsert->getName() . ' personnage créé';
  }

  else
  {
    $msg = 'NON OK';
  }

$valeurs = array($_POST);

?>
<p><?= $msg ?></p>
