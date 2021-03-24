<?php
require_once('Model.class.php');

class EcoleManager extends Model
{
  private $ecoles;

  public function ajoutEcole($ecole)
  {
    $this->ecoles[] = $ecole;
  }

  public function getEcoles()
  {
    return $this->ecoles;
  }
  public function chargementEcoles()
  {
    $req = $this->getBdd()->prepare("SELECT * FROM ecole");
    $req->execute();
    $mesEcoles = $req->fetchall(PDO::FETCH_ASSOC);
    $req->closeCursor();
    // echo '<pre>';
    // print_r($ecoles);
    foreach ($mesEcoles as $ecole) { //?genere des objets de la class Ecole

      $school = new Ecole($ecole['id_ecole'], $ecole['nomEcole']);
      $this->ajoutEcole($school);
    }
  }
}
