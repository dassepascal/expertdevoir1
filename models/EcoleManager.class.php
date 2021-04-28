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
    $req = $this->getBdd()->prepare("SELECT *  FROM ecole ");
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
  public function nbEleves($id_ecole)
  {
    $req = $this->getBdd()->prepare("SELECT  count(E.ecole_id) as nbEleves   FROM ecole T INNER JOIN eleve E ON T.id = E.ecole_id where E.ecole_id = $id_ecole ");
    $req->execute();
    $nbEleves = $req->fetchall(PDO::FETCH_ASSOC);
    //var_dump( $listeIdEcole);
    foreach ($nbEleves as $nbEleve) {
      $nbEleve = ($nbEleve['nbEleves']);
    }
    $req->closeCursor();

    return $nbEleve;
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
          var_dump($resultat);
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
  public function nbEleveUnSport($id_ecole)
  {
    $req = $this->getBdd()->prepare("select  E.id as idEleve  , S.id_sport  from ecole T inner join eleve E on T.id= E.ecole_id inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport where T.id = $id_ecole group by E.id ");

    $req->execute();
    $nbEleveUnSports = $req->fetchAll();


    foreach ($nbEleveUnSports as $nbEleveSport) {
      // var_dump(count($nbEleveSport[0]));
    }

    $req->closeCursor();


    return $nbEleveUnSports;
  }
  public function listeEleves()
  {
    $ecoles = $this->ecoles;
  }


  public function nbElevesPratiqueSport()
  {
    $req = $this->getBdd()->prepare(" SELECT P.id_pratique FROM eleve E INNER JOIN pratique P on E.id = P.id_eleve  ");
    $req->execute();
    $nbEPS = $req->fetchall(PDO::FETCH_ASSOC);

    $req->closeCursor();

    return $nbEPS;
  }
  public function listeActiviteSportives($id_ecole)
  {
    $req = $this->getBdd()->prepare(" SELECT E.id, S.id_sport FROM ecole T inner join eleve E on T.id = E.ecole_id INNER JOIN pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport where T.id =$id_ecole GROUP BY S.id_sport ");
    $req->execute();
    $listeActiviteSportives = $req->fetchall(PDO::FETCH_ASSOC);
    $nbsports =count($listeActiviteSportives);


    $req->closeCursor();

    return $nbsports;
  }
  public function activites($id_ecole)
  {
    $req = $this->getBdd()->prepare("select count( S.id_sport) as nbEleves, S.nomSport  from ecole T inner join  eleve E on  T.id = E.ecole_id  inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport where  T.id = $id_ecole group by S.id_sport order by S.id_sport asc");
    $req->execute();


    $activites = $req->fetchAll(PDO::FETCH_ASSOC);


    $req->closeCursor();
    return $activites;
  }
}
