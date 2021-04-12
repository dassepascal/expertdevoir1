<?php
require_once('models/EcoleManager.class.php');

class EcolesController
{
  private $ecoleManager;

  public function __construct()
  {
    $this->ecoleManager = new EcoleManager;
    $this->ecoleManager->chargementEcoles();
  }
  public function afficherEcoles()
  {

    $ecoles = $this->ecoleManager->getEcoles();
    require('views/ecoles.view.php');
  }
  /*!*********************************************/
  public function afficherEcole($id_ecole)
  {
    $ecole = $this->ecoleManager->getEcoleById($id_ecole);
    var_dump($ecole);
    //$studentsCount = count($this->ecoleManager->students($ecole->id()));

    require "views/afficherEcole.view.php";
  }
  public function ajoutEcole()
  {

    require "views/ajoutEcole.view.php";
  }
  public function ajoutEcoleValidation()
  {
    $this->ecoleManager->ajoutEcoleBd($_POST['nomEcole']);

    header('Location: '. URL . "ecoles");

  }
  public function suppressionEcole($id_ecole){
    $this->ecoleManager->suppressionEcoleBd($id_ecole);
    header('Location: '. URL . "ecoles");

  }
  public function modificationEcole($id_ecole){
    $ecole = $this->ecoleManager->getEcoleById($id_ecole);
    require "views/modifierEcole.view.php";
  }
  public function modificationEcoleValidation(){
    $this->ecoleManager->modificationEcoleBd($_POST['identifiant'],$_POST['nomEcole']);
    header('Location: '. URL . "ecoles");
  }
}
