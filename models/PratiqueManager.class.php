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
  foreach ($mesPratiques as $pratique) {
//var_dump($pratique);
    $p1 = new Pratique($pratique['id_pratique'],$pratique['id_eleve'], $pratique['id_sport']);
    $p1 -> setNomSport($pratique['nomSport']);
    $p1 -> setNomEleve($pratique['nomEleve']);
    $this->ajoutPratique($p1);
  }
}
public function ajoutPratiqueBd($id_sport,$id_eleve){


     $req = " insert into pratique (id_Sport,id_eleve) values (:id_sport,:id_eleve)";

     $stmt = $this->getBdd()->prepare($req);

     $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_STR);
     $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_STR);

     $resultat = $stmt->execute();
      var_dump($resultat);
     $stmt->closeCursor();

     if ($resultat === true) {
       $p = new Pratique($this->getBdd()->lastInsertId(), $id_sport,$id_eleve);
var_dump($p);
       $this->ajoutPratique($p);
     }
   }

}



