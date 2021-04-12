<?php
require_once('Ecole.class.php');
class Eleve
{
  private $id_eleve;
  private $nomEleve;
  private $ecole_id;


  public static $eleves;//tableau eleves


  public function __construct($id_eleve, $nomEleve,$ecole_id)
  {
    $this->id_eleve = $id_eleve;
    $this->nomEleve = $nomEleve;
    $this->id_ecole = $ecole_id;

    self::$eleves[] = $this;

  }


  public function getId_eleve()
  {
    return $this->id_eleve;
  }
  public function setId_eleve($id_eleve)
  {
    $this->id_eleve = $id_eleve;
  }
  public function getNomEleve()
  {
    return $this->nomEleve;
  }
  public function setNomEleve($nomEleve)
  {
    $this->nomEleve = $nomEleve;
  }
  public function getEcole_id()
  {
    return $this->ecole_id;
  }
  public function setEcole_id($ecole_id)
  {
    $this->ecole_id = $ecole_id;
  }
  


  }




