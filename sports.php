<?php
require_once('Sport.class.php');

$sport1 = new Sport(1,"boxe");
$sport2 = new Sport(2,"judo");
$sport3 = new Sport(3,"football");
//$ecoles = [$ecole1,$ecole2,$ecole3];
require_once('SportManager.class.php');
$sportManager = new SportManager;
$sportManager->ajoutSport($sport1);
$sportManager->ajoutSport($sport2);
$sportManager->ajoutSport($sport3);

$sportManager->chargementSports();
ob_start();

?>
<table class="table">
  <tr class="table-dark">
    <th>Nom du sport</th>
    <th></th>
    <th colspan="2">Action</th>
  </tr>
  <?php
  $sports = $sportManager->getSports();
  for($i=0 ;$i < count($sports);$i++):?>
<tr>
<td><?= $sportManager->getSports()[$i]->getNomSport()?></td>
<td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
    </tr>
</tr>

<?php endfor ?>
</table>

<a href="#" class="btn btn-success">Ajouter</a>

<?php
$titre = "sport";
$content = ob_get_clean();
require_once('template.php');
?>
