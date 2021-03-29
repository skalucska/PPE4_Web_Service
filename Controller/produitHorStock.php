<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$ville = strtolower($_GET["ville"]);
$produitHorStock = $bdd->getProduitHorStock($ville);

    echo (json_encode($produitHorStock));

?>
