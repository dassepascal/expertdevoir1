<?php
class Ecole
{
  private $id_ecole;
  private $nomEcole;

public static $ecoles;// tableau des ecoles


  public function __construct($id_ecole, $nomEcole)
  {
    $this->id_ecole = $id_ecole;
    $this->nomEcole = $nomEcole;

  }


  public function getId_ecole()
  {
    return $this->id_ecole;
  }
  public function setId_ecole($id_ecole)
  {
    $this->id_ecole = $id_ecole;
  }

  public function getnomEcole()
  {
    return $this->nomEcole;
  }
  public function setNomEcole($nomEcole)
  {
    $this->nomEcole = $nomEcole;
  }
}
