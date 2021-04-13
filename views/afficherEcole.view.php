<?php
// require_once('models/Ecole.class.php');
 require_once('models/EcoleManager.class.php');
// require_once('views/ecoles.view.php');
//  $ecoleManager = new EcoleManager;
//  $ecoleManager->getEcoleById($id);
//  $test =$ecoleManager->chargementEcoles();
//  var_dump($test);//$ecolemanager->students($id);


$ecoleManager = new EcoleManager;
//$ecoles = $ecoleManager->getEcoles();
//var_dump($ecoles);
$test = $ecoleManager->students();
var_dump($test);
// $liste = $ecole->getEleves();
// var_dump($liste);
//$test1 =$ecoleManager->getEcoleById($id);
//var_dump($test1);

$id_ecole = $ecole->getId();
var_dump($id_ecole);
$nom = $ecole->getNom();
var_dump($nom);
$eleves = $ecole->getEleves();
var_dump($eleves);

ob_start();
?>
<table class="table">
<tr class="table-dark">
<th> id ecole</th>
  <th>Nombre  d'éléves</th>
  <th>Nombre d'eleve pratiquant au moin 1 sport</th>
  <th>nombre activite sportive</th>
  <th> liste activite sportive</th>
</tr>






<tr>
<td class="align-middle"><?= $id_ecole;?></td>

<td class="align-middle">afficher le nombre eleve </td>
<td class="align-middle">afficher le nombre eleve pratique 1 sport</td>
<td class="align-middle">afficher le nombre activite sportive?</td>
<td class="align-middle">afficher le nombre</td>
</tr>


</table>
<?php
$title = $ecole->getNom();
$titre = $ecole->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
