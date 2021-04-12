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
    <th>Nom de l'école</th>
      </tr>

<tr>
<td class="align-middle "> affiche nom ecole</td>

</tr>

</table>


<?php

$titre = $eleve->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
