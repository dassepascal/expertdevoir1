<?php
require('SportManager.class.php');
require('Sport.class.php');
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

}
