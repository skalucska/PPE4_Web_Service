<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$ville = strtolower($_GET["ville"]);
$produitEnStock = $bdd->getProduitEnStock($ville);
foreach ($produitEnStock as $row) {
    echo (json_encode($produitEnStock));
}
?>
