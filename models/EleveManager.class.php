<?php
require_once('Model.class.php');
require_once('Ecole.class.php');
require_once('Eleve.class.php');
class EleveManager extends Model
{
  private $eleves;

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
    $req = $this->getBdd()->prepare("SELECT E.id, E.nom, E.ecole_id , T.nom as nomEcole FROM eleve E INNER JOIN ecole T ON T.id = E.ecole_id");
    $req->execute();
    $mesEleves = $req->fetchall(PDO::FETCH_ASSOC);

    $req->closeCursor();

    foreach ($mesEleves as $eleve) {

      $student = new Eleve($eleve['id'], $eleve['nom'], $eleve['ecole_id']);

      $student->setNomEcole($eleve['nomEcole']);


      $this->ajoutEleve($student);
    }
  }
  public function listeEcole()
  {
    $req = $this->getBdd()->prepare("SELECT   T.nom as nomEcole FROM eleve E INNER JOIN ecole T ON T.id = E.ecole_id GROUP BY T.nom HAVING count(*) > 1 ");
    $req->execute();
    $listeEcoles = $req->fetchall(PDO::FETCH_ASSOC);

    $req->closeCursor();
    return $listeEcoles;
  }




  public function getEleveById($id)
  {
    for ($i = 0; count($this->eleves); $i++) {
      if ($this->eleves[$i]->getId() === $id) {
        return $this->eleves[$i];
      }
    }
  }



  public function ajoutEleveBd($nom, $ecole_id)
  {

    if (!isset($_POST['nomEleve']) || empty($_POST['nomEleve'])) {
      throw new Exception(" Vous devez entrer un eleve");


    }else if (!isset($_POST['nomEcole']) || empty($_POST['nomEcole'])){
      throw new Exception(" Vous devez entrer une ecole");
    } else {

      $req = " select count(nom) from eleve where (nom =:nomEcole)";
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nomEcole", $nom, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();

      foreach ($results as $result) {
        if ($result[0] > 0) {
          throw new Exception(" eleve existe deja");
        } else {
          $req = "insert into eleve (nom,ecole_id) values(:nom,:ecole_id)";

          $stmt = $this->getBdd()->prepare($req);
          $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
          $stmt->bindValue(":ecole_id", $ecole_id, PDO::PARAM_INT);
          $resultat = $stmt->execute();
          var_dump($resultat);

          $stmt->closeCursor();

          if ($resultat > 0) {
            $eleve = new Eleve($this->getBdd()->lastinsertId(), $nom, $ecole_id);

            $this->ajoutEleve($eleve);
          }
        }
      }
    }
  }
  public function suppressionEleveBd($id)
  {
    $req = "Delete from eleve  where id = :id";
    $stmt = $this->getbdd()->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $eleve = $this->getEleveById($id);
      unset($eleve);
    }
  }
  public function modificationEleve($id)
  {
    $eleve = $this->eleveManager->getEleveById($id);
    require "views/modificationEleve.view.php";
  }
  public function modificationEleveBd($id, $nom, $ecole_id)
  {

    $req = "update eleve set nom=:nom, ecole_id =:ecole_id where id=:id";


    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":ecole_id", $ecole_id, PDO::PARAM_STR);
    $resultat = $stmt->execute();


    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getEleveById($id)->setNom($nom);
      $this->getEleveById($id)->setEcole_id($ecole_id);
    }
  }
  public function listeSports(){

    $req = $this->getBdd()->prepare("SELECT  nomSport FROM sport  ");
    $req->execute();
    $listeSports = $req->fetchall(PDO::FETCH_ASSOC);

    $req->closeCursor();
    return $listeSports;


  }

  }


