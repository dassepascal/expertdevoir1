<?php
// require_once('models/Ecole.class.php');
// require_once('models/EcoleManager.class.php');
// require_once('views/ecoles.view.php');
 $ecolemanager = new EcoleManager;
 $monId = $ecolemanager->nbEleves();

 //var_dump(intval($monId[0]));

//  for ($i=0;count($monId);$i++ ){
//     if( $id_ecole === $monId[$i]){

//      var_dump($id_ecole);
//  }



//   }
// $ecolemanager->chargementEcoles();
// $ecolemanager->getEcoles();

$id_ecole = $ecole->getId();
ob_start();
?>
<table class="table">
<tr class="table-dark">
<th> id ecole</th>
  <th>Nombre  d'éléve</th>
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
