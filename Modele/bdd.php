<?php
class Bdd{

  private $dbh;

public function __construct(){
      try {
        $dsn = 'mysql:dbname=ppe4;host=127.0.0.1:33';
        $this->dbh = new PDO($dsn, 'root', '');
      } catch (PDOException $e){
        echo 'connexion échouée : '.$e->getMessage();
      }
}

public function getConnect($login,$password){

  $res = $this->dbh->prepare('SELECT count(0) as connexionValide from utilisateurs where us_user = :login and us_pass = :password;');


  $res->execute(array(":login" => $login,":password" => $password));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

public function getInfoProduit($idProduit, $localisation){
  $res = $this->dbh->prepare('SELECT count(0) from produitenstock join entrepot on EN_ID= FK_EN where FK_Pr = :idProduit and EN_ville = :localisation;');

  $res->execute(array(":idProduit" => $idProduit, ":localisation" => $localisation));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

public function getQuantite($idProduit, $localisation){
  $res = $this->dbh->prepare('SELECT etatDeStock from produitenstock where FK_Pr = :idProduit and fk_en = (select en_id from entrepot where en_ville = :localisation);');

  $res->execute(array(":idProduit" => $idProduit, ":localisation" => $localisation));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}


public function updateQuantiteProduit($newQuantite, $idProduit, $localisation){
  $res = $this->dbh->prepare("UPDATE produitenstock SET  etatDeStock = :newQuantite WHERE fk_Pr = :idProduit and fk_en = (SELECT EN_ID from entrepot where EN_ville = :localisation);");

  $res->execute(array(":newQuantite" => $newQuantite, ":idProduit" => $idProduit, ":localisation" => $localisation));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

public function getProduitEnStock($ville){
  $res = $this->dbh->prepare('SELECT PR_Libelle FROM produit join produitenstock on PR_ReferenceProduit = FK_Pr join entrepot on EN_ID = FK_EN where etatDeStock > 0 and EN_Ville = :ville;');

  $res->execute(array(":ville" =>$ville));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

public function getProduithorStock($ville){
  $res = $this->dbh->prepare('SELECT PR_Libelle FROM produit join produitenstock on PR_ReferenceProduit = FK_Pr join entrepot on EN_ID = FK_EN where etatDeStock = 0 and EN_Ville = :ville;');

  $res->execute(array(":ville" =>$ville));
  return $res->fetchAll(PDO::FETCH_ASSOC);
}


}
 ?>
