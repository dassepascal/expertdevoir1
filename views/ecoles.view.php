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

  for ($i = 0; $i < count($ecoles); $i++) : ?>
    <tr>
      <td class="align-middle "><a  href="<?= URL ?>ecoles/h/<?= $ecoles[$i]->getId_ecole() ?>"><?= $ecoles[$i]->getNomEcole() ?></a></td>
<?php var_dump($ecoles[$i]->getId_ecole());?>
<?php var_dump($ecoles[$i]->getNomEcole());?>

      <td class="align-middle">
      <a href="<?= URL ?>ecoles/m/<?= $ecoles[$i]->getId_ecole(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="<?= URL ?>ecoles/s/<?= $ecoles[$i]->getId_ecole(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer cette ecole');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
      </td>
    </tr>
    </tr>

  <?php endfor ?>
  </table>

<a href="<?= URL ?>ecoles/a/" class="btn btn-success">Ajouter</a>



<?php
$titre = "ecole";
$content = ob_get_clean();
require_once('template.php');
?>
