
 public function suppressionPratiqueBd($id_pratique){
    $req = "delete from pratique where id_pratique =:id_pratique ";
$stmt=$this->getBdd()->prepare($req);
$stmt->bindValue(":id_pratique",$id_pratique,PDO::PARAM_INT);
$resultat = $stmt->execute();
$stmt->closeCursor();

if($resultat > 0){
  $pratique = $this->getPratiqueById($id_pratique);
  unset($pratique);
}
