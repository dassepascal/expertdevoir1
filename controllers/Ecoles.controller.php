<?php
require_once('models/EcoleManager.class.php');

class EcolesController{
 private $ecoleManager;

 public function __construct()
 {
   $this->ecoleManager = new EcoleManager;
   $this->ecoleManager->chargementEcoles();
 }
 public function afficherEcoles(){

   $ecoles =$this->ecoleManager->getEcoles();
   require('views/ecoles.view.php');
 }

}
