<?php
require_once'header.php';
//permet de choisir un fighter pour ensuite combattre un autre fighter

$manager = new Manager\PersonnageManager($pdo);
$liste = $manager->readAll();

?>

  <?php
    foreach ($liste as $personnages)
    {
      ?>
          <hr>
          <p>Name: <?= $personnages->getName() ?></p>
          <p>Strength: <?= $personnages->getStrength() ?></p>
          <p>Health: <?= $personnages->getHealth() ?></p>
          <p><a href="select.php?id=<?= $personnages->getId() ?>">Choose</a></p>
      <?php
    }
  ?>



