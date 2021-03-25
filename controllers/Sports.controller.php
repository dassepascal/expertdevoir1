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

}
