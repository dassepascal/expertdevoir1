<?php
require_once('models/SportManager.class.php');
require_once('models/EleveManager.class.php');
require_once('models/EcoleManager.class.php');
$ecoleManager = new EcoleManager;
$ecoleManager->chargementEcoles();
$ecoleManager->getEcoles();
$activites = $ecoleManager->activites($ecole->getId());
$nbEleves = $ecoleManager->nbEleves($ecole->getId());


$nbEPS = count($ecoleManager->nbElevesPratiqueSport());

$nbSports = ($ecoleManager->listeActiviteSportives($ecole->getId()));

$test = count($ecoleManager->nbEleveUnSport($ecole->getId()));





$sportManager = new SportManager;
$sportManager->chargementSports();
$sports = $sportManager->getSports();



ob_start();
?>
<table border="1px solid black">
  <tr>
    <th>Nombre d'éléves</th>
    <td class="align-middle"><?= $nbEleves ?> </td>
  </tr>
  <tr>
    <th>Nombre d'eleve pratiquant au moin 1 sport</th>
    <td class="align-middle"><?= $test ?></td>
  </tr>
  <tr>
    <th>nombre activite sportive</th>
    <td class="align-middle"><?= $nbSports ?></td>
  </tr>

</table><br>
<table border="1px solid black">
  <tr>
    <th>liste des sports</th>
    <th> nombre d'eleves</th>
  </tr>
  <?php if (isset($activites)):?>
  <?php
  foreach ($activites as $activite) : ?>

    <tr>

      <td><?=  $activite['nomSport'] ?> </td>
      <td><?= $activite['nbEleves'] ?></td>
    </tr>
  <?php endforeach ?>
  <?php endif ?>
</table>


<?php

$titre = $ecole->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
