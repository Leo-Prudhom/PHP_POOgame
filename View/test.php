<?php

require_once'header.php';


$manager = new Manager\PersonnageManager($pdo);



$perso1 = $manager->read(22);
$perso2 = $manager->read(23);

var_dump($perso1, $perso2);

$test = $manager->attackPersoToTarget($perso1, $perso2);

var_dump($perso2);
?>
