<?php
require_once('Model.class.php');
require_once('Pratique.class.php');
class PratiqueManager extends Model
{

  private $pratiques; // tableau de pratiques

  public function ajoutPratique($pratique)
  {
    $this->pratiques[] = $pratique;
  }
  public function getPratiques()
  {
    return $this->pratiques;
  }

  public function chargementPratiques()
  {
    $req = $this->getBdd()->prepare("SELECT S.nomSport, E.nom as nomEleve, p.id_pratique,P.id_sport,P.id_eleve  FROM eleve E inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport ");
    $req->execute();
    $mesPratiques = $req->fetchAll(PDO::FETCH_ASSOC);

    $req->closeCursor();
    foreach ($mesPratiques as $pratique) {
      //var_dump($pratique);
      $p1 = new Pratique($pratique['id_pratique'], $pratique['id_eleve'], $pratique['id_sport']);
      $p1->setNomSport($pratique['nomSport']);
      $p1->setNomEleve($pratique['nomEleve']);
      $this->ajoutPratique($p1);
    }
  }
  public function getPratiqueById($id_pratique)
  {
    for ($i = 0; $i < count($this->pratiques); $i++) {

      if ($this->pratiques[$i]->getId_pratique($id_pratique) === $id_pratique) {

        return $this->pratiques[$i];
      }
    }
  }
  public function ajoutPratiqueBd($id_eleve, $id_sport)
  {

var_dump($id_sport);
var_dump($id_eleve);

    $req = " insert into pratique (id_eleve,id_sport) values (:id_eleve,:id_sport)";

    $stmt = $this->getBdd()->prepare($req);

    $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_STR);
    $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_STR);

    $resultat = $stmt->execute();
    var_dump($resultat);
    $stmt->closeCursor();

    if ($resultat > 0) {
      $p = new Pratique($this->getBdd()->lastInsertId(), $id_eleve, $id_sport);
      var_dump($p);
      $this->ajoutPratique($p);
    }
  }
  public function suppressionPratiqueBd($id_pratique){
    $req = "delete from pratique where id_pratique =:id_pratique ";
$stmt=$this->getBdd()->prepare($req);
$stmt->bindValue(":id_pratique",$id_pratique,PDO::PARAM_INT);
$resultat = $stmt->execute();
$stmt->closeCursor();

if($resultat > 0){
  $pratique = $this->getPratiqueById($id_pratique);
  unset($pratique);
}

  }
  public function modificationPratiqueBd($id_pratique,$id_eleve,$id_sport){
    var_dump($id_pratique);
    var_dump($id_eleve);
    var_dump($id_sport);
    $req = "update pratique set id_eleve =:id_eleve,id_sport =:id_sport where id_pratique =:id_pratique";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_pratique",$id_pratique,PDO::PARAM_INT);
    $stmt->bindValue(":id_eleve",$id_eleve,PDO::PARAM_INT);
    $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    var_dump($resultat);

    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getPratiqueById($id_pratique)->setId_eleve($id_eleve);
      $this->getPratiqueById($id_pratique)->setId_sport($id_sport);
    }
  }
}
