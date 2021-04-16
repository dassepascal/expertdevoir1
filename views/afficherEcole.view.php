<?php

 require_once('models/EcoleManager.class.php');

$ecoleManager = new EcoleManager;
$id_ecole = $ecole->getId();
 $listeIdEcole =$ecoleManager -> listeId($ecole->getId());
 $nbEleves = count($listeIdEcole);
 $nbEPS = count( $ecoleManager-> nbElevesPratiqueSport());
 $nbAciviteSportives = count($ecoleManager->listeActiviteSportives());




ob_start();
?>
<table class="table">
<tr class="table-dark">

  <th>Nombre  d'éléves</th>
  <th>Nombre d'eleve pratiquant au moin 1 sport</th>
  <th>nombre activite sportive</th>
  <th> liste activite sportive</th>
</tr>






<tr>


<td class="align-middle"><?= $nbEleves?> </td>
<td class="align-middle"><?= $nbEPS ?></td>
<td class="align-middle"><?= $nbAciviteSportives ?></td>
<td class="align-middle">afficher le nombre</td>
</tr>


</table>
<?php
$title = $ecole->getNom();
$titre = $ecole->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
