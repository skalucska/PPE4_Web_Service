<?php
include "../Modele/Bdd.php";

$bdd = new Bdd();

$loginInfo=$_GET["loginInfo"];
$json = json_decode($loginInfo,true);
$verif = $bdd->getConnect($json["login"],$json["password"]);
if ($verif["0"] == 1) {
        //$verifier = '{"connexionValide":"true"}';
        echo(json_encode($verif));
    }else {
        //$verifier = '{"connexionValide":"false"}';
        echo(json_encode($verif));
    }
?>
