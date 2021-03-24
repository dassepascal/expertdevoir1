<?php
class Eleve
{
  private $id_eleve;
  private $nomEleve;

  public static $eleves;//tableau ecole


  public function __construct($id_eleve, $nomEleve)
  {
    $this->id_eleve = $id_eleve;
    $this->nomEleve = $nomEleve;
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

  public function getnomEleve()
  {
    return $this->nomEleve;
  }
  public function setNomEleve($nomEleve)
  {
    $this->nomEleve = $nomEleve;
  }
}
