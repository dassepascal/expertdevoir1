<?php
//require_once('Eleve.class.php');
class Ecole
{
  private $id;
  private $nom;
  private $ecole_id;

public static $ecoles;// tableau des ecoles

 // id, nom,
  // getId() -> id() => $ecole->id()
  // getNom() -> nom() => $ecole->nom()



  public function __construct($id, $nom)
  {
    $this->id = $id;
    $this->nom = $nom;
    self::$ecoles[]=$this;

  }


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
  public function getEcole_id(){
   return $this ->ecole_id;
  }
  public function setEcole_id($ecole_id){
    $this ->ecole_id = $ecole_id;

  }
}
