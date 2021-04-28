<?php
require_once('models/SportManager.class.php');
require_once('models/EleveManager.class.php');
require_once('models/EcoleManager.class.php');
$ecoleManager = new EcoleManager;
$ecoleManager->chargementEcoles();
$ecoleManager->getEcoles();
$sportManager = new SportManager;
$sportManager->chargementSports();
$sports =$sportManager->getSports();




$id_ecole = $ecole->getId();


$listeIdEcole = $ecoleManager->listeId($ecole->getId());
$nbEleves = count($listeIdEcole);
$nbEPS = count($ecoleManager->nbElevesPratiqueSport());
//var_dump($nbEPS);
$nbAciviteSportives = count($ecoleManager->listeActiviteSportives());

$test =count($ecoleManager->nbEleveUnSport($ecole->getId()));
var_dump(($test));
//var_dump($nbEleveUnSport);
//var_dump($ecoleManager->nbEleveUnSport($id));

//var_dump($nb);
//$nbEleveUnSport = ($ecoleManager->nbEleveUnSport($ecole->getId()));
//var_dump($nbEleveUnSports);


$ecoleManager->listeEleves();
//var_dump($ecoleManager->listeEleves($ecole));
$ecoleManager->chargementEcoles();
 $ecoleManager->getEcoles();
// var_dump($ecoleManager->getEcoles());




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
    <td class="align-middle"><?= $nbAciviteSportives ?></td>
  </tr>

</table><br>
<table border= "1px solid black">
  <tr>
    <th>liste sport</th>
  </tr>

  <?php
  $sports =$sportManager->getSports();
   foreach ($sports as $sport):?>
  <tr>

    <td><?= $sport->getnomSport() ?>  </td>

  </tr>
<?php endforeach ?>
</table>


<?php

$titre = $ecole->getNom();
$content = ob_get_clean();
require_once('template.php');
?>
