<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$idProduit = $_GET["id"];
$localisation = $_GET["ville"];
$verif = $bdd->getInfoProduit($idProduit, $localisation);
    if ($verif["0"] == 1) {
        //$verifier = '{"produit":true}';
        echo(json_encode($verif));
    }else {
        //$verifier = '{"produit":false}';
        echo(json_encode($verif));
    }
?>