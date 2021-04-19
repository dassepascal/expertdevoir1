<?php
class Sport
{
  private $id_sport;
  private $nomsport;

  public static $sports;//tableau sports


  public function __construct($id_sport, $nomSport)
  {
    $this->id_sport = $id_sport;
    $this->nomsport = $nomSport;
    self::$sports[] = $this;
  }


  public function getId_sport()
  {
    return $this->id_sport;
  }
  public function setId_sport($id_sport)
  {
    $this->id_sport = $id_sport;
  }

  public function getNomSport()
  {
    return $this->nomsport;
  }
  public function setNomSport($nomSport)
  {
    $this->nomSport = $nomSport;
  }
}
