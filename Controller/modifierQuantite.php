<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$quantite = $_GET["quantite"];
$localisation = lowcase($_GET["ville"]);
$idProduit = $_GET["id"];
$quantiteStocker = $bdd->getQuantite($idProduit, $localisation);
$ajoutStock = $quantiteStocker["0"];
$newquantiter = $quantite+$ajoutStock;
$bdd->updateQuantiteProduit($newquantiter, $idProduit, $localisation);
?>
