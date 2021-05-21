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

    //verification du contenu des variables
    if (empty($id_eleve) or empty($id_sport)) {
      $id_sport = $_POST['id_sport'];
      $id_eleve = $_POST['id_eleve'];
      $validationEleve =  $this->nbSportEleve($id_eleve, $id_sport);

      throw new Exception("Vous devez choisir un eleve et un sport");
    } else { // verification du contenu des variables
      // verification $id_eleve < 3
      if (isset($id_eleve) || isset($id_sport)) {
        $id_sport = $_POST['id_sport'];
        // var_dump($id_sport);

        $id_eleve = $_POST['id_eleve'];
        // var_dump($id_eleve);

        $validationEleve =  $this->nbSportEleve($id_eleve);
        //  var_dump($validationEleve); //return $result[0]de la fonction nbSportEleve

        //  var_dump($validationEleve ? 'true' : 'false');
        /* 2 cas: si true

        cas false nouveau eleve
        */


        if (isset($validationEleve) && $validationEleve == true) {
          //  var_dump($validationEleve);
          //  var_dump('#1');
          //die();


          $listes = $this->listeIdSportEleve($id_eleve);
          // var_dump($listes);
          $verif = in_array($id_sport, $listes);
           var_dump($verif);
          // var_dump($verif ? 'true' : 'false');

          if ($verif !== true) {
            var_dump('#5');

            $this->enregistrerPratique($id_eleve, $id_sport);
          } else {
           // exit();
               var_dump('#6');
            throw new Exception("le sport est deja enregistre");
          }
        } else { // cas validation  false
          //var_dump('#7');

          $this->enregistrerPratique($id_eleve, $id_sport);
        }
      }
    }
  }



  public function enregistrerPratique($id_eleve, $id_sport)
  {
    $req = "insert into pratique (id_eleve,id_sport) values(:id_eleve,:id_sport)";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_INT);
    $stmt->bindValue(":id_sport", $id_sport, PDO::PARAM_INT);
    $resultat = $stmt->execute();
    // var_dump($resultat);
    $stmt->closeCursor();
    if ($resultat > 0) {
      $p = new Eleve($this->getBdd()->lastinsertId(), $id_eleve, $id_sport);
      //  var_dump($p);
      var_dump('exit enregistrementPratiqueBd ');
      $this->ajoutPratique($p);
      var_dump('#12');
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
    //var_dump($resultat);

    $stmt->closeCursor();

    if ($resultat > 0) {
      $this->getPratiqueById($id_pratique)->setId_eleve($id_eleve);
      $this->getPratiqueById($id_pratique)->setId_sport($id_sport);
    }
  }
  public function nbSportEleve($id_eleve)
  {
    // if(isset($id_eleve )||empty($id_eleve)|| empty($id_sport)){
    //   var_dump($id_eleve);
    //$id_eleve = 140;
    $req = "select count(id_eleve) from pratique where(id_eleve=$id_eleve)";
    $stmt = $this->getBdd()->prepare($req);
    $resultat = $stmt->execute();
    //var_dump($resultat);
    $results = $stmt->fetchAll();
    // var_dump($results);
    foreach ($results as $result) {
      //   var_dump($result[0]); //0

      if ($result[0] >= 3) {
        // var_dump($result[0]);

        throw new Exception(" deja 3 inscriptions");
      } else {
        return $result[0];
      }
    }
  }



  public function listeIdSportEleve($id_eleve)
  {
    //var_dump($id_eleve);
    if (isset($id_elve) || !empty($id_eleve) || isset($id_sport) || !empty($id_sport)) {
      // var_dump($id_eleve);
      //$id_eleve = 140;
      $req = "select id_sport from pratique where id_eleve = $id_eleve";
      // var_dump($id_eleve);
      $stmt = $this->getBdd()->prepare($req);
      $stmt->bindValue(":id_eleve", $id_eleve, PDO::PARAM_STR);
      $resultat = $stmt->execute();
      // var_dump($resultat);
      $results = $stmt->fetchAll();
      //var_dump($results);
      for ($i = 0; $i < count($results); $i++) {
        $listeIdSportEleve[] = (($results[$i]['id_sport']));
      }
      var_dump('resultat listeIdSport');
      return $listeIdSportEleve;
    }
  }
}
