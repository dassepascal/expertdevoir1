<?php
class Eleve
{
  private $id_eleve;
  private $nomEleve;
  private $id_ecole;

  public static $eleves;//tableau eleves


  public function __construct($id_eleve, $nomEleve,$id_ecole)
  {
    $this->id_eleve = $id_eleve;
    $this->nomEleve = $nomEleve;
    $this->id_ecole = $id_ecole;
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
  public function getId_ecole()
  {
    return $this->id_ecole;
  }
  public function setId_ecole($id_ecole)
  {
    $this->id_ecole = $id_ecole;
  }



}
