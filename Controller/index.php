<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$loginInfo=$_GET["loginInfo"];
$json = json_decode($loginInfo,true);
$verif = $bdd->getConnect($json["login"],$json["password"]);
if ($verif["0"] == 1) {
        echo(json_encode($verif));
    }else {
        echo(json_encode($verif));
    }
?>
