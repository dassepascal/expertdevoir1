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
  

<?php if(isset($ecoles)):?>
  <?php  for ($i = 0; $i < count($ecoles); $i++) : ?>
    <tr>
      <td class="align-middle "><a  href="<?= URL ?>ecoles/h/<?= $ecoles[$i]->getId() ?>"><?= $ecoles[$i]->getNom() ?></a></td>


      <td class="align-middle">
      <a href="<?= URL ?>ecoles/m/<?= $ecoles[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="<?= URL ?>ecoles/s/<?= $ecoles[$i]->getId(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer cette ecole');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
      </td>
    </tr>
    </tr>

  <?php endfor ?>
  <?php endif ?>
  </table>

<a href="<?= URL ?>ecoles/a/" class="btn btn-success">Ajouter</a>



<?php
$titre = "Ecoles";
$content = ob_get_clean();
require_once('template.php');
?>
