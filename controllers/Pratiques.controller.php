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
  }
}
