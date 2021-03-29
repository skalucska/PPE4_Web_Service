<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$ville = lowcase($_GET["ville"]);
$produitHorStock = $bdd->getProduitHorStock($ville);
foreach ($produitHorStock as $row) {
    echo (json_encode($produitHorStock));
}
?>
