<?php

require_once('models/EcoleManager.class.php');

$ecoleManager = new EcoleManager;
$id_ecole = $ecole->getId();
$listeIdEcole = $ecoleManager->listeId($ecole->getId());
$nbEleves = count($listeIdEcole);
$nbEPS = count($ecoleManager->nbElevesPratiqueSport());
$nbAciviteSportives = count($ecoleManager->listeActiviteSportives());




ob_start();
?>
<table border="1px solid black">
  <tr>
    <th>Nombre d'éléves</th>
    <td class="align-middle"><?= $nbEleves ?> </td>
  </tr>
  <tr>
    <th>Nombre d'eleve pratiquant au moin 1 sport</th>
    <td class="align-middle"><?= $nbEPS ?></td>
  </tr>
  <tr>
    <th>nombre activite sportive</th>
    <td class="align-middle"><?= $nbAciviteSportives ?></td>
  </tr>

</table><br>
<table>
  <tr>
    <th>liste sport</th>
  </tr>
  <tr>

    <td> </td>
  </tr>
</table>


<?php
$title = $ecole->getNom();
$titre = $ecole->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
