<?php
require_once('models/Eleve.class.php');
require_once('models/EleveManager.class.php');
require_once('controllers/Eleves.controller.php');
$eleveManager = new EleveManager;
$eleveManager->chargementEleves();


ob_start();

?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'éléve</th>
    <th></th>
    <th colspan="2">Action</th>
  </tr>
  <?php

  for($i=0 ;$i < count($eleves);$i++):?>
<tr>
<td class="align-middle"><?= $eleves[$i]->getNomEleve()?></a></td>
<td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
    </tr>
</tr>

<?php endfor ?>
</table>

<a href="#" class="btn btn-success">Ajouter</a>

<?php
$titre = "eleve";
$content = ob_get_clean();
require_once('template.php');
?>
