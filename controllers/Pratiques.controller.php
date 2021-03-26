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
  public function afficherPratiques(){

    $pratiques = $this->pratiqueManager->getPratiques();
    require('views/afficherPratique.view.php');
  }

}
