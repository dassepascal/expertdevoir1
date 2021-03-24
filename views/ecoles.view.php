<?php
require_once('models/Ecole.class.php');
require_once('models/EcoleManager.class.php');
$ecolemanager = new EcoleManager;
$ecolemanager->chargementEcoles();
ob_start();

?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'école</th>
    <th colspan="2">Action</th>
  </tr>
  <?php

  for($i=0 ;$i < count($ecoles);$i++):?>
<tr>
<td><?= $ecoles[$i]->getNomEcole()?></td>
<td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
    </tr>
</tr>

<?php endfor ?>
</table>

<a href="#" class="btn btn-success">Ajouter</a>

<?php
$titre = "ecole";
$content = ob_get_clean();
require_once('template.php');
?>
