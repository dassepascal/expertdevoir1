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
  $req = $this->getBdd()->prepare("SELECT S.nomSport, E.nom as nomEleve, p.id_pratique,P.id_sport,P.id_eleve  FROM eleve E inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport ");
  $req->execute();
  $mesPratiques = $req->fetchAll(PDO::FETCH_ASSOC);

  $req->closeCursor();
  foreach ($mesPratiques as $pratique) { //?genere des objets de la class Ecole
//var_dump($pratique);
    $p = new Pratique($pratique['id_pratique'],$pratique['id_eleve'], $pratique['id_sport']);
    $p -> setNomSport($pratique['nomSport']);
    $p -> setNomEleve($pratique['nomEleve']);
    $this->ajoutPratique($p);
  }
}


}
