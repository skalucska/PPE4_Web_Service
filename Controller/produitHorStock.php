<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$ville = strtolower($_GET["ville"]);
$produitHorStock = $bdd->getProduitHorStock($ville);
foreach ($produitHorStock as $row) {
    echo (json_encode($produitHorStock));
}
?>
