<?php
require_once('Model.class.php');
require_once('Ecole.class.php');
class EcoleManager extends Model
{
  private $ecoles;

  //public function students() // return array(Eleve $student)

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

      $school = new Ecole($ecole['id'], $ecole['nom']);
      $this->ajoutEcole($school);
    }
  }
  public function getEcoleById($id)
  {
    for ($i = 0; count($this->ecoles); $i++) {
      if ($this->ecoles[$i]->getId($id) === $id) {
        return $this->ecoles[$i];
      }
    }
  }
  public function students(){
    $req = $this->getBdd()->prepare("SELECT T.id, T.nom, E.nom as eleves FROM ecole T INNER JOIN eleve E ON T.id = E.ecole_id");
    $req->execute();
    $listeEcoles = $req->fetchall(PDO::FETCH_ASSOC);
//var_dump($listeEcoles);
    $req->closeCursor();
    foreach ($listeEcoles as  $ecole){
     $lesIds =($ecole['id']);
     //var_dump($lesIds);
     $newecole = new Ecole($ecole['id'],$ecole['nom']);
     $newecole->setEleves($ecole['eleves']);

    }
    return $lesIds;
  }
  public function ajoutEcoleBd($nom)
  {
    if (!isset($_POST['nomEcole']) || empty($_POST['nomEcole'])) {
      throw new Exception(" Vous devez entrer un nom d'école ");
    } else {

      $req = "
      select count(nom) from ecole where (nom =:nom)";
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();
      foreach ($results as $result) {
        if ($result[0] > 0) {
          throw new Exception(" l'école  existe deja");
        } else {
          $req = "
          insert into ecole (nom) values (:nom)";
          $stmt = $this->getBdd()->prepare($req);
          $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
          $resultat = $stmt->execute();

          $stmt->closeCursor();

          if ($resultat > 0) {
            $ecole = new Ecole($this->getBdd()->lastInsertId(), $nom);

            $this->ajoutEcole($ecole);
          }
        }
      }
    }
  }

  public function suppressionEcoleBd($id)
  {
    $req = "Delete from ecole  where id =:id";
    $stmt = $this->getbdd()->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if ($resultat > 0) {
      $ecole = $this->getEcoleById($id);
      unset($ecole);
    }
  }

  public function modificationEcoleBd($id, $nom)
  {
    $req = "
    update ecole
    set nom = :nom
    where id = :id";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    var_dump($resultat);
    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getEcoleById($id)->setNom($nom);
    }
  }
  public function nbEleves(){
    $req = $this->getBdd()->prepare("SELECT T.id FROM ecole  T INNER JOIN eleve E ON  T.id = E.ecole_id ");
    $req->execute();
    $monId = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
     return $monId;
  }

}
