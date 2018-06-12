<?php

require_once"header.php";

//gestion du manager
$manager = new Manager\PersonnageManager($pdo);

//personnage sélectionné par l'usager
$currentPerso = $manager->read($_GET['id']);

//liste des personnages à affronter
$enemi = $manager->read($_GET['vs']);


/*?>
<h1><?= $currentPerso->getName() ?> VS <?= $enemi->getName() ?></h1>
<form action="fight_submit.php" method="POST">
  <input type="submit" name="Attack" value="Attack <?= $enemi->getName() ?>">
</form>

<?php*/

//mise en place de la fight
$manager->attackPersoToTarget($currentPerso, $enemi);

echo "<p>" . $enemi->getName() . ": " . $enemi->getHealth() . " PV</p>";

?>

