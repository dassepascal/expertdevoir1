<?php
require_once('models/Eleve.class.php');
require_once('models/EleveManager.class.php');
require_once('controllers/Eleves.controller.php');
$eleveManager = new EleveManager;
$eleveManager->chargementEleves();
$nomEcole =$eleve->getNomEcole();
$listeId = $eleve->getEcole_id();
$listeSports = $eleveManager->listeSports();




ob_start();
?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'école</th>
      </tr>

<tr>
<td class="align-middle "><?=$nomEcole?></td>

</tr>

</table>
<a href="">Voulez-vous pratiquer un sport? </a>





<?php

$titre = $eleve->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
