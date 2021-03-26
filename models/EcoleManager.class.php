<?php
require_once('Model.class.php');
require_once('Ecole.class.php');
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
    foreach ($mesEcoles as $ecole) { //?genere des objets de la class Ecole

      $school = new Ecole($ecole['id_ecole'], $ecole['nomEcole']);
      $this->ajoutEcole($school);
    }
  }
  public function getEcoleById($id_ecole)
  {
    for ($i = 0; count($this->ecoles); $i++) {
      if ($this->ecoles[$i]->getId_ecole($id_ecole) === $id_ecole) {
        return $this->ecoles[$i];
      }
    }
  }
  public function ajoutEcoleBd($nomEcole)
  {
    if (!isset($_POST['nomEcole']) || empty($_POST['nomEcole'])) {
      throw new Exception(" Vous devez entrer un nom d'école ");
    } else {

      $req = "
      select count(nomEcole) from ecole where (nomEcole = :nomEcole)";
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nomEcole", $nomEcole, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();
      foreach ($results as $result) {
        if ($result[0] > 0) {
          throw new Exception(" l'école  existe deja");
        } else {
          $req = "
          insert into ecole (nomEcole) values (:nomEcole)";
          $stmt = $this->getBdd()->prepare($req);
          $stmt->bindValue(":nomEcole", $nomEcole, PDO::PARAM_STR);
          $resultat = $stmt->execute();

          $stmt->closeCursor();

          if ($resultat > 0) {
            $ecole = new Ecole($this->getBdd()->lastInsertId(), $nomEcole);

            $this->ajoutEcole($ecole);
          }
        }
      }
    }
  }

  public function suppressionEcoleBd($id_ecole)
  {
    $req = "Delete from ecole  where id_ecole = :idEcole";
    $stmt = $this->getbdd()->prepare($req);
    $stmt->bindValue(":idEcole", $id_ecole, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $ecole = $this->getEcoleById($id_ecole);
      unset($ecole);
    }
  }
  public function modificationEcoleBd($id_ecole, $nomEcole)
  {
    $req = "
    update ecole
    set nomEcole = :nomEcole
    where id_ecole = :id_ecole";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_ecole", $id_ecole, PDO::PARAM_INT);
    $stmt->bindValue(":nomEcole", $nomEcole, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getEcoleById($id_ecole)->setNomEcole($nomEcole);
    }
  }
}
