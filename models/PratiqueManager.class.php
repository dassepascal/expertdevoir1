<?php
require_once('Model.class.php');
require_once('Pratique.class.php');
class PratiqueManager extends Model
{

  private $pratiques; // tableau de pratiques

  public function ajoutPratique($pratique)
  {
    $this->pratiques[] = $pratique;
  }
  public function getPratiques()
  {
    return $this->pratiques;
  }

  public function chargementPratiques()
  {
    $req = $this->getBdd()->prepare("SELECT S.nomSport, E.nom as nomEleve, p.id_pratique,P.id_sport,P.id_eleve  FROM eleve E inner join pratique P on E.id = P.id_eleve inner join sport S on P.id_sport = S.id_sport ");
    $req->execute();
    $mesPratiques = $req->fetchAll(PDO::FETCH_ASSOC);

    $req->closeCursor();
    foreach ($mesPratiques as $pratique) {
      //var_dump($pratique);
      $p1 = new Pratique($pratique['id_pratique'], $pratique['id_eleve'], $pratique['id_sport']);
      $p1->setNomSport($pratique['nomSport']);
      $p1->setNomEleve($pratique['nomEleve']);
      $this->ajoutPratique($p1);
    }
  }
  public function getPratiqueById($id_pratique)
  {
    for ($i = 0; $i < count($this->pratiques); $i++) {

      if ($this->pratiques[$i]->getId_pratique($id_pratique) === $id_pratique) {

        return $this->pratiques[$i];
      }
    }
  }
  public function ajoutPratiqueBd($id_eleve, $id_sport)
  {
    // recuperation des variables
    $id_sport = $_POST['id_sport'];
    var_dump($id_sport);

    $id_eleve = $_POST['id_eleve'];
    var_dump($id_eleve);
    //verification du contenu des variables
    if (empty($id_eleve) or empty($id_sport)) {
      throw new Exception("Vous devez choisir un eleve et un sport");
    } else { // verification du contenu des variables
      if (isset($id_eleve)) { // verification $id_eleve
        $req = "select (id_sport) from pratique where(id_eleve=$id_eleve)";
        $stmt = $this->getBdd()->prepare($req);
        $resultat = $stmt->execute();
        var_dump($resultat);
        $results = $stmt->fetchAll();
        var_dump($results);
      }
      for ($i = 0; $i < count($results); $i++) {
        var_dump(count($results));
        echo (count($results) > 3) ? 'true' : 'false';
        echo ' <br/>';
        //   //! sorti du for

        //!verifier si le sport existe dans la base

      }
      if ((count($results) > 3) === true) {
        echo 'true';
      } else {
        echo 'false';
        echo 'id_sport existe deja?'; //! id recherche 18
        var_dump($id_sport);
        //liste des sport de l'eleve
        $pratiques = $this->getPratiques();
        var_dump($pratiques);

        for ($i = 0; $i < count($pratiques); $i++) {
          $pratiques[$i]->getId_eleve();
          var_dump($pratiques[$i]->getId_eleve());
          //! probleme d'egalite n'est teste
          if ($id_eleve === ($pratiques[$i]->getId_eleve())) {
            var_dump($id_eleve);
            $array[] = ($pratiques[$i]->getId_sport());
            var_dump($array); //! 2 valeurs
            var_dump($id_sport);
            $verif = in_array($id_sport, $array);
            var_dump($verif); //! reponse si true le sport est dans le tableau

            echo $pratiques[$i]->getId_sport();
            echo '<br/>';
          } //else
          // execute la requete
          // $req = "insert into pratique (id_eleve,id_sport) values(:id_eleve,:id_sport)";
          // $stmt = $this->getBdd()->prepare($req);
          // $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_INT);
          // $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_INT);
          // $resultat = $stmt->execute();
          // var_dump($resultat);
          // $stmt->closeCursor();
          // if ($resultat > 0) {
          //   $p = new Eleve($this->getBdd()->lastinsertId(), $id_eleve, $id_sport);
          //   var_dump($p);
          //   $this->ajoutPratique($p);
          //   die();
          // }



        }
      }
    }
  }





  public function suppressionPratiqueBd($id_pratique)
  {
    $req = "delete from pratique where id_pratique =:id_pratique ";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_pratique", $id_pratique, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    var_dump($resultat);

    $stmt->closeCursor();

    if ($resultat > 0) {
      $pratique = $this->getPratiqueById($id_pratique);
      unset($pratique);
    }
  }
  public function modificationPratiqueBd($id_pratique, $id_eleve, $id_sport)
  {

    $req = "update pratique set id_eleve =:id_eleve,id_sport =:id_sport where id_pratique =:id_pratique";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_pratique", $id_pratique, PDO::PARAM_INT);
    $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_INT);
    $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    var_dump($resultat);

    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getPratiqueById($id_pratique)->setId_eleve($id_eleve);
      $this->getPratiqueById($id_pratique)->setId_sport($id_sport);
    }
  }
}
