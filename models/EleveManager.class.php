<?php
require_once('Model.class.php');

class EleveManager extends Model{
  private $eleves;

  public function ajoutEleve($eleve){
    $this->eleves[]= $eleve;
  }

  public function getEleves(){
    return $this->eleves;
  }

  public function chargementEleves(){
    $req = $this->getBdd()->prepare("SELECT * FROM eleve");
    $req->execute();
    $mesEleves = $req->fetchall(PDO::FETCH_ASSOC);
    $req ->closeCursor();

    foreach($mesEleves as $eleve){
      $student = new Eleve ($eleve['id_eleve'],$eleve['nomEleve']);
      $this->ajoutEleve($student);
    }
  }
  public function getEleveById($id_eleve){
    for($i=0;count($this->eleves);$i++){
      if($this->eleves[$i]->getId_eleve() === $id_eleve){
        return $this->eleves[$i];
      }

    }
  }
  public function ajoutEleveBd($nomEleve,$id_ecole){
    $req = "
    insert into eleve (nomEleve,id_ecole) values(:nomEleve,:id_ecole)";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":nomEleve",$nomEleve,PDO::PARAM_STR);
    $stmt->bindValue(":id_ecole",$id_ecole,PDO::PARAM_INT);
    $resultat = $stmt->execute();

    $stmt->closeCursor();

    if($resultat > 0){
      $eleve = new Eleve ($this->getBdd()->lastinsertId(), $nomEleve,$id_ecole);
      $this->ajoutEleve($eleve);
    }
  }
  public function suppressionEleveBd($id_eleve){
    $req = "Delete from eleve  where id_eleve = :idEleve";
    $stmt = $this->getbdd()->prepare($req);
    $stmt->bindValue(":idEleve", $id_eleve, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $eleve = $this->getEleveById($id_eleve);
      unset($eleve);
    }
  }
}
