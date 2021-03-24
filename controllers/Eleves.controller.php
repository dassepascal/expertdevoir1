<?php
require_once('models/EleveManager.class.php');
require_once('models/Eleve.class.php');
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

}
