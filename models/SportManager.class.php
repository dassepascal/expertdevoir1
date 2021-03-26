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
  public function ajoutSportBd($nomSport){
    if(!isset($_POST['nomSport']) || empty($_POST['nomSport'])){
      throw new Exception(" Vous devez entrer un nom de sport");

    }else{
      // le sport existe-t- il?
      $req = "select count(nomSport) from sport where (nomSport = :nomSport)";

      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nomSport",$nomSport,PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();
      foreach($results as $result){
        if($result[0] >0){
          throw new Exception(" le sport existe deja");
        }else{
          $req = " insert into sport (nomSport) values (:nomSport)";

            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":nomSport", $nomSport, PDO::PARAM_STR);
            $resultat = $stmt->execute();

            $stmt->closeCursor();

            if ($resultat > 0) {
              $sport = new Ecole($this->getBdd()->lastInsertId(), $nomSport);

              $this->ajoutSport($sport);
            }
        }

      }


    }

  }
  public function suppressionSportbd($id_sport){
    $req=" delete from sport where id_sport = :idSport";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":idSport", $id_sport,PDO::PARAM_INT);

    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $sport = $this->getSportById($id_sport);
      unset($sport);
    }
  }
  public function modificationSportBd($id_sport,$nomSport){
    $req="update sport set nomSport = :nomSport where id_sport = :id_sport";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_sport",$id_sport,PDO::PARAM_INT);
    $stmt->bindValue(":nomSport", $nomSport, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getSportById($id_sport)->setNomSport($nomSport);
    }
  }


}
