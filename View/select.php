<?php

require_once"header.php";

//gestion du manager
$manager = new Manager\PersonnageManager($pdo);

//personnage sélectionné par l'usager
$currentPerso = $manager->read($_GET['id']);

//liste des personnages à affronter
$enemies = $manager->readAllExcept($currentPerso);

//personnage à affronter
if (isset($_GET['vs']))
{
  $enemi = $manager->read($_GET['vs']);
}

?>

<p><?= $currentPerso->getName() ?></p>
<p>Strength: <?= $currentPerso->getStrength() ?></p>

<h1>VERSUS: </h1>

<?php
    foreach ($enemies as $personnages)
    {
      ?>
          <hr>
          <p>Name: <?= $personnages->getName() ?></p>
          <p>Strength: <?= $personnages->getStrength() ?></p>
          <p>Health: <?= $personnages->getHealth() ?></p>
          <p><a href="fight.php?id=<?= $currentPerso->getId()?>&amp;vs=<?= $personnages->getId()?>">FIGHT</a></p>
      <?php
    }
