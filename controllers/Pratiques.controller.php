<?php
require_once('models/PratiqueManager.class.php');

class PratiqueController
{
  private $pratiqueManager;

  public function __construct()
  {
    $this->pratiqueManager = new PratiqueManager;
    $this->pratiqueManager->chargementPratiques();
  }
  public function afficherPratiques()
  {

    $pratiques = $this->pratiqueManager->getPratiques();
    //var_dump($pratiques);
    require('views/pratique.view.php');
  }
  public function afficherPratique($id_pratique)
  {

    $pratique = $this->pratiqueManager->getPratiqueById($id_pratique);
    require "views/afficherPratique.view.php";

  }

  public function ajouterPratique()
  {
    require "views/ajouterPratique.view.php";
  }
  public function ajouterPratiqueValidation()
  {
    $this->pratiqueManager->ajoutPratiqueBd($_POST['id_eleve'], $_POST['id_sport']);
   // die();
    header('location:' . URL . "pratiqueSports",false);
  }
  public function suppressionPratique($id_pratique){
    $this->pratiqueManager->suppressionPratiqueBd($id_pratique);
    header('location:' . URL . "pratiqueSports");

  }
  public function modificationPratique($id_pratique){
    $pratique = $this->pratiqueManager->getPratiqueById($id_pratique);
    require "views/modificationPratique.view.php";
  }
  public function modificationPratiqueValadation(){

  $this->pratiqueManager->modificationPratiqueBd($_POST['identifiant'],$_POST['id_eleve'],$_POST['id_sport']);
  header('location:' . URL . "pratiqueSports");

  }

}
