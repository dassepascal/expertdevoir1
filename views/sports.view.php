<?php
require_once('models/Sport.class.php');
require_once('models/SportManager.class.php');
$sportManager = new SportManager;
$sportManager->chargementSports();
$sportManager->getSports();


ob_start();

?><?php
if (!empty($_SESSION['alert'])) : ?>
  <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?></div>
<?php
  unset($_SESSION['alert']);
endif;
?>
<table class="table">
  <tr class="table-dark">
    <th>Nom du sport</th>
    <th></th>
    <th colspan="2">Action</th>
  </tr>
  <?php if (isset($sports)):?>
  <?php
$sports =$sportManager->getSports();
  for($i=0 ;$i < count($sports);$i++):?>
<tr>
<td class="alig-middle"><a href="<?= URL ?>sports/k/<?= $sports[$i]->getId_sport();?>"><?= $sports[$i]->getNomSport()?></a></td>

<td class="align-middle"> <a href="<?= URL ?>sports/m/<?= $sports[$i]->getId_sport(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
      <form method="post" action="<?= URL ?>sports/s/<?= $sports[$i]->getId_sport(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer ce sport');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
    </tr>
</tr>

<?php endfor ?>
<?php endif ?>
</table>

<a href="<?= URL ?>sports/a/" class="btn btn-success">Ajouter</a>

<?php
$titre = "sport";
$content = ob_get_clean();
require_once('template.php');
?>
