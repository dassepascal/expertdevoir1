<?php
require_once('Ecole.class.php');
class Eleve
{
  private $id;
  private $nom;
  private $ecole_id;
  private $nomEcole;


  public static $eleves;//tableau eleves


  public function __construct($id, $nom, $ecole_id)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->ecole_id = $ecole_id;

    self::$eleves[] = $this;

  }

  // id, nom, ecole (nom)
  // getId() -> id() => $eleve->id()
  // getNom() -> nom() => $eleve->nom()
  // getEcole -> ecole() => $eleve->ecole()

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function setNom($nom)
  {
    $this->nom = $nom;
  }
  public function getEcole_id()
  {
    return $this->ecole_id;
  }
  public function setEcole_id($ecole_id)
  {
    $this->ecole_id = $ecole_id;
  }
  public function setNomEcole($nomEcole) {
    $this->nomEcole = $nomEcole;
  }
  public function getNomEcole() {
    return $this->nomEcole;
  }
}




