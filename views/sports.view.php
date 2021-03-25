<?php
require_once('models/Sport.class.php');
require_once('models/SportManager.class.php');
$sportManager = new SportManager;
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
<td class="alig-middle"><a href="<?= URL ?>sports/k/<?= $sports[$i]->getId_sport();?>"><?= $sportManager->getSports()[$i]->getNomSport()?></a></td>
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
