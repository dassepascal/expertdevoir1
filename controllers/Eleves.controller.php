<?php
require_once('models/EleveManager.class.php');
require_once('models/Eleve.class.php');
require_once('models/Ecole.class.php');
require_once('models/EcoleManager.class.php');
class ElevesController{
 private $eleveManager;

 public function __construct()
 {
   $this->eleveManager = new EleveManager;
   $this->eleveManager->chargementEleves();
 }
 public function afficherEleves(){

   $eleves =$this->eleveManager->getEleves();
   require('views/eleves.view.php');
 }
 public function afficherEleve($id){
 
$eleve =$this->eleveManager->getEleveById($id);
require "views/afficherEleve.view.php";

}
public function ajoutEleve(){
  require "views/ajoutEleve.view.php";
}
public function ajoutEleveValidation(){
  $this->eleveManager->ajoutEleveBd($_POST['nomEleve'],$_POST['nomEcole']);
  header('Location: '. URL . "eleves");
}
public function suppressionEleve($id){
  $eleve = $this->eleveManager->suppressionEleveBd($id);
  header('Location: '. URL . "eleves");
}
public function modificationEleve($id){
  $eleve = $this->eleveManager->getEleveById($id);
  require "views/modificationEleve.view.php";
}
public function modificationEleveValidation(){

    $this->eleveManager->modificationEleveBd($_POST['identifiant'],$_POST['nomEleve'],$_POST['nomEcole']);
    header('Location: '. URL . "eleves");
  }
}

