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
    <th>Nom de l'éléve</th>

    <th>Nom de l'école</th>
    <th colspan="2">Action</th>
  </tr>
  <?php if (isset($eleves)):?>
  <?php  foreach($eleves as $eleve) :?>
    <tr>
      <td class="align-middle"><a href="<?= URL ?>eleves/e/<?= $eleve->getId() ?>"><?= $eleve->getNom() ?></a></td>
      <td class="align-middle "><a href="<?= URL ?>eleves/e/<?= $eleve->getId() ?>"><?= $eleve->getNomEcole() ?></a></td>
      <td class="align-middle"><a href="<?= URL ?>eleves/m/<?= $eleve->getId(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="<?= URL ?>eleves/s/<?= $eleve->getId(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer cette éléve');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
    </tr>
  <?php endforeach ?>
  <?php endif ?>
</table>
<a href="<?= URL ?>eleves/a/" class="btn btn-success">Ajouter</a>
<?php
$titre = "Eleves";
$content = ob_get_clean();
require_once('template.php');
?>
