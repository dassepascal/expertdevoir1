<?php

class Pratique
{
  private $id_pratique;
  private $id_eleve;
  private $id_sport;

  public static $pratiques;

  public function __construct($id_pratique, $id_eleve, $id_sport)
  {
    $this->id_pratique = $id_pratique;
    $this->id_eleve = $id_eleve;
    $this->id_sport = $id_sport;
  }

  public function getId_pratique()
  {
    return $this->id_pratique;
  }
  public function setId_pratique($id_pratique)
  {
    $this->id_pratique = $id_pratique;
  }

  public function getId_eleve()
  {
    return $this->id_eleve;
  }
  public function setId_eleve($id_eleve)
  {
    $this->id_eleve = $id_eleve;
  }



  public function getId_sport()
  {
    return $this->id_sport;
  }
  public function setId_sport($id_sport)
  {
    $this->id_sport = $id_sport;
  }

  public function setNomEleve($nomEleve){
    $this->nomEleve = $nomEleve;
  }
  public function getNomEleve(){
    return $this->nomEleve;
  }
  public function setNomSport($nomSport){
    $this->nomSport = $nomSport;
  }
  public function getNomSport(){
    return $this->nomSport ;
  }


}
