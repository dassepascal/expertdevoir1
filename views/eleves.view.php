<?php
require_once('models/Eleve.class.php');
require_once('models/EleveManager.class.php');
require_once('controllers/Eleves.controller.php');
$eleveManager = new EleveManager;
$eleveManager->chargementEleves();
require_once('models/Ecole.class.php');
require_once('models/EcoleManager.class.php');
$ecolemanager = new EcoleManager;
$ecolemanager->chargementEcoles();
//$nomEcole =  new Ecole($id_ecole,$nomEcole);
//$nomEcole->getNomEcole();
//var_dump($nomEcole);

ob_start();

?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'éléve</th>

    <th>Nom de l'école</th>
    <th colspan="2">Action</th>
  </tr>
  <?php

  for ($i = 0; $i < count($eleves); $i++) : ?>
    <tr>
      <td class="align-middle"><a href="<?= URL ?>eleves/e/<?= $eleves[$i]->getId_eleve() ?>"><?= $eleves[$i]->getNomEleve() ?></a></td>
     <td class="align-middle "><a  href="<?= URL ?>eleves/e/<?= $eleves[$i]->getId_ecole() ?>"><?= $eleves[$i]->getId_ecole()?></a></td>
<?php var_dump($eleves[$i]->getId_ecole())?>
      <td class="align-middle"><a href="<?= URL ?>eleves/m/<?= $eleves[$i]->getId_eleve(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="<?= URL ?>eleves/s/<?= $eleves[$i]->getId_eleve(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer cette éléve');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
    </tr>
    </tr>

  <?php endfor ?>
</table>

<a href="<?= URL ?>eleves/a/" class="btn btn-success">Ajouter</a>




<?php
$titre = "eleve";
$content = ob_get_clean();
require_once('template.php');
?>
