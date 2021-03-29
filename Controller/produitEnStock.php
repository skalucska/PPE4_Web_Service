<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$ville = strtolower($_GET["ville"]);
$produitEnStock = $bdd->getProduitEnStock($ville);
echo (json_encode($produitEnStock));
?>
