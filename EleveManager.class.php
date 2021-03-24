<?php
require_once('Model.class.php');

class EleveManager extends Model{
  private $eleves;

  public function ajoutEleves($eleve){
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
      $this->ajoutEleves($student);
    }
  }
}
