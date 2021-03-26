<?php

class Pratique
{

  private $id_eleve;
  private $id_sport;


  public function __construct($id_eleve, $id_sport)
  {
    $this->id_eleve = $id_eleve;
    $this->id_sport = $id_sport;
  }
  public function getId_eleve(){
    return $this->id_eleve;
  }
public function setId_eleve($id_eleve){
  $this->id_eleve = $id_eleve;
}



  public function getId_sport(){
    return $this->id_sport;
  }
  public function setId_sport($id_sport){
    $this->id_sport = $id_sport;
  }
}
