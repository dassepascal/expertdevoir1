<?php
require_once('Model.class.php');
require_once('Ecole.class.php');
//require_once('EcoleManager.class.php');
//$nomEcole = new Ecole($id_ecole,$nomEcole);
//$nomEcole->getNomEcole();
//$ecolemanager = new EcoleManager;
//$ecolemanager->chargementEcoles();
class EleveManager extends Model
{
  private $eleves;
  //private $ecoles;
  public function ajoutEleve($eleve)
  {
    $this->eleves[] = $eleve;
  }


  public function getEleves()
  {
    return $this->eleves;
  }

  public function chargementEleves()
  {
    $req = $this->getBdd()->prepare("SELECT * FROM eleve");
    $req->execute();
    $mesEleves = $req->fetchall(PDO::FETCH_ASSOC);
    $req->closeCursor();

    foreach ($mesEleves as $eleve) {
      //var_dump($eleve);
      $student = new Eleve($eleve['id_eleve'], $eleve['nomEleve'], $eleve['ecole_id']);
      $this->ajoutEleve($student);
    }
  }
  public function afficherNomEcole()
  {
    $req = $this->getBdd()->prepare(" SELECT E.id_eleve,E.nomEleve,E.ecole_id , T.nomEcole FROM eleve E INNER JOIN ecole T ON T.id_ecole = E.ecole_id");
    $req->execute();
    $mesNomEcoles = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    // echo '<pre>';
    //print_r($mesNomEcoles);
return $mesNomEcoles;
    var_dump($mesNomEcoles[0]['nomEleve']);
    var_dump($mesNomEcoles[0]['nomEcole']);
  }



  public function getEleveById($id_eleve)
  {
    for ($i = 0; count($this->eleves); $i++) {
      if ($this->eleves[$i]->getId_eleve() === $id_eleve) {
        return $this->eleves[$i];
      }
    }
  }

  public function getNomEcoleById($ecole_id)
  {
    for ($i = 0; count($this->eleves); $i++) {
      if ($this->eleves[$i]->getecole_id() === $ecole_id) {
        return $this->eleves[$i];
      }
    }
  }

  public function ajoutEleveBd($nomEleve, $ecole_id)
  {
    if (!isset($_POST['nomEleve']) || empty($_POST['nomEleve']) || empty($_POST['nomEcole'])) {

      throw new Exception(" Vous devez entrer un eleve");
    } else {

      $req = " select count(nomEleve) from eleve where (nomEleve =:nomEleve)";
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nomEleve", $nomEleve, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();

      foreach ($results as $result) {
        if ($result[0] > 0) {
          throw new Exception(" 'eleve existe deja");
        } else {
          $req = "insert into eleve (nomEleve,id_ecole) values(:nomEleve,:id_ecole)";

          $stmt = $this->getBdd()->prepare($req);
          $stmt->bindValue(":nomEleve", $nomEleve, PDO::PARAM_STR);
          $stmt->bindValue(":ecole_id", $ecole_id, PDO::PARAM_INT);
          $resultat = $stmt->execute();

          $stmt->closeCursor();

          if ($resultat > 0) {
            $eleve = new Eleve($this->getBdd()->lastinsertId(), $nomEleve, $ecole_id);
            $this->ajoutEleve($eleve);
          }
        }
      }
    }
  }
  public function suppressionEleveBd($id_eleve)
  {
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
  public function modificationEleve($id_eleve)
  {
    $eleve = $this->eleveManager->getEleveById($id_eleve);
    require "views/modificationEleve.view.php";
  }
  public function modificationEleveBd($id_eleve, $nomEleve, $ecole_id)
  {

    $req = "update eleve set nomEleve=:nomEleve, ecole_id =:ecole_id where id_eleve=:id_eleve";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_INT);
    $stmt->bindValue(":nomEleve", $nomEleve, PDO::PARAM_STR);
    $stmt->bindValue(":ecole_id", $ecole_id, PDO::PARAM_STR);
    $resultat = $stmt->execute();

    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getEleveById($id_eleve)->setNomEleve($nomEleve);
      $this->getEleveById($id_eleve)->setEcole_id($ecole_id);
    }
  }
}
