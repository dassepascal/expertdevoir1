<?php
require_once('Model.class.php');
require_once('Pratique.class.php');
class PratiqueManager extends Model{

  private $pratiques;

  public function ajoutPratique($pratique){
    $this ->pratiques[] = $pratique;
  }
  public function getPratiques(){
    return $this->pratiques;

  }
public function chargementPratiques(){
  $req = $this->getBdd()->prepare("SELECT * FROM pratique");
  $req->execute();
  $mesPratiques = $req->fetchAll(PDO::FETCH_ASSOC);
  $req->closeCursor();
  foreach ($mesPratiques as $pratique) { //?genere des objets de la class Ecole

    $p = new Pratique($pratique['id_eleve'], $pratique['id_sport']);
    $this->ajoutPratique($p);
  }
}
public function listeSport(){

  $req = $this->getBdd()->prepare("SELECT  S.sport  FROM pratique P INNER JOIN sport S ON P.id_sport = S.id_sport GROUP BY T.nom HAVING count(*) > 1 ");
  $req->execute();
  $listeSport = $req->fetchall(PDO::FETCH_ASSOC);

  $req->closeCursor();
  return $listeSport;


}

}
