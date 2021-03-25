<?php
require_once('Model.class.php');

class SportManager extends Model{
  private $sports;

  public function ajoutSport($sport){
    $this->sports[]= $sport;
  }

  public function getSports(){
    return $this->sports;
  }

  public function chargementSports(){
    $req = $this->getBdd()->prepare("SELECT * FROM sport");
    $req->execute();
    $mesSports = $req->fetchall(PDO::FETCH_ASSOC);
   $req->closecursor();

   foreach($mesSports as $sport){
     $s = new Sport($sport['id_sport'],$sport['nomSport']);
     $this->ajoutSport($s);
   }
  }
  public function getSportById($id_sport){
    for($i=0;count($this->sports);$i++){
if($this->sports[$i]->getId_sport($id_sport) === $id_sport){
  return $this->sports[$i];
}
    }
  }


}
