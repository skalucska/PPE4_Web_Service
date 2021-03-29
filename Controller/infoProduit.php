<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$idProduit = $_GET["id"];
$localisation = lowcase($_GET["ville"]);
$verif = $bdd->getInfoProduit($idProduit, $localisation);
    if ($verif["0"] == 1) {
        echo(json_encode($verif));
    }else {
        echo(json_encode($verif));
    }
?>
