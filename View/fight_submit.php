<?php
require_once"fight.php";

if (isset($_POST['Attack']))
    {
       $attack = $manager->attackPersoToTarget($currentPerso, $enemi);
    }

    header('Location: fight.php');

?>
