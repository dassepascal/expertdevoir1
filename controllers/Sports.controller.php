<?php
require('models/SportManager.class.php');
require('models/Sport.class.php');
class SportsController{
 private $sportManager;

 public function __construct()
 {
   $this->sportManager = new SportManager;
   $this->sportManager->chargementSports();
 }
 public function afficherSports(){

   $ecoles =$this->sportManager->getsports();
   require('views/sports.view.php');
 }
 public function afficherSport($id_sport){
   $sport = $this->sportManager->getSportById($id_sport);
   require "views/afficherSport.view.php";

 }
 public function ajouterSport(){
   require "views/ajouterSport.view.php";

 }
 public function ajouterSportValidation(){
   $this->sportManager->ajoutSportBd($_POST['nomSport']);
   header('Location: '. URL . "sports");
 }
 public function suppressionSport($id_sport){
   $this->sportManager->suppressionSportBd($id_sport);
   header('Location: '. URL . "sports");
 }
 public function modificationSport($id_sport){
  $sport = $this->sportManager->getSportById($id_sport);

  require "views/modifierSport.view.php";
 }
 public function modificationSportValidation(){
   $this->sportManager->modificationSportBd($_POST['identifiant'],$_POST['nomSport']);

   header('Location: '. URL . "sports");
 }
}
