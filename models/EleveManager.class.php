<?php
require_once('Model.class.php');

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
    $req = $this->getBdd()->prepare("SELECT * FROM eleve");
    $req->execute();
    $mesEleves = $req->fetchall(PDO::FETCH_ASSOC);
    $req->closeCursor();

    foreach ($mesEleves as $eleve) {
      $student = new Eleve($eleve['id_eleve'], $eleve['nomEleve']);
      $this->ajoutEleve($student);
    }
  }
  public function getEleveById($id_eleve)
  {
    for ($i = 0; count($this->eleves); $i++) {
      if ($this->eleves[$i]->getId_eleve() === $id_eleve) {
        return $this->eleves[$i];
      }
    }
  }


  public function ajoutEleveBd($nomEleve, $id_ecole)
  {
    if (!isset($_POST['nomEleve']) || empty($_POST['nomEleve'])) {
      throw new Exception(" Vous devez entrer un nom d'éléve");
    } else {

      $req = "
      select count(nomEleve) from eleve where (nomEleve = :nomEleve)";
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":nomEleve", $nomEleve, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      $results = $stmt->fetchAll();
      foreach ($results as $result) {
        if ($result[0] > 0) {
          throw new Exception(" l'éléve  existe deja");
        } else {
          $req = "
          insert into eleve (nomEleve,id_ecole) values(:nomEleve,:id_ecole)";
          $stmt = $this->getBdd()->prepare($req);
          $stmt->bindValue(":nomEleve", $nomEleve, PDO::PARAM_STR);
          $stmt->bindValue(":id_ecole", $id_ecole, PDO::PARAM_INT);
          $resultat = $stmt->execute();

          $stmt->closeCursor();

          if ($resultat > 0) {
            $eleve = new Eleve($this->getBdd()->lastinsertId(), $nomEleve, $id_ecole);
            $this->ajoutEleve($eleve);
          }
        }
      }
    }
  }
}
