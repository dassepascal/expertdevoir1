<?php
require_once('models/Eleve.class.php');
require_once('models/EleveManager.class.php');
require_once('controllers/Eleves.controller.php');
$eleveManager = new EleveManager;
$eleveManager->chargementEleves();
$eleveEcole = $eleveManager->afficherNomEcole();
var_dump($eleveEcole);

ob_start();
?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'école</th>
      </tr>
      <?php
      for ($i = 0; $i < count($eleveEcole); $i++) : ?>
<tr>
<td class="align-middle "><?= $eleveEcole[$i]['nomEcole'] ?></a></td>
<!-- <td class="align-middle" > <?=$eleveEcole[$i]['nomEcole'] ?></td> -->
</tr>
<?php endfor ?>
</table>


<?php

$titre = $eleve->getNomEleve();
$content = ob_get_clean();
require_once('template.php');
?>
