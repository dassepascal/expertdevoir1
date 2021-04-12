<?php
require_once('models/Eleve.class.php');
require_once('models/EleveManager.class.php');
require_once('controllers/Eleves.controller.php');
$eleveManager = new EleveManager;

$eleveManager->chargementEleves();
//$eleveManager->getNomEcoleById($ecole_id);
$eleveEcole = $eleveManager->afficherNomEcole();
// echo '<pre>';
// print_r($eleveEcole);

ob_start();

?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'éléve</th>

    <th>Nom de l'école</th>
    <th colspan="2">Action</th>
  </tr>
  <?php

  //for ($i = 0; $i < count($eleveEcole); $i++) :
  foreach($eleves as $eleve) :
  ?>
<?php var_dump($eleve);?>
    <tr>
      <td class="align-middle"><a href="<?= URL ?>eleves/e/<?= $eleve->getId_eleve() ?>"><?= $eleve->getNomEleve() ?></a></td>


      <td class="align-middle "><a href="<?= URL ?>eleves/e/<?= $eleve->getId_eleve() ?>"><?= $eleve->getNomEcole() ?></a></td>

      <td class="align-middle"><a href="<?= URL ?>eleves/m/<?= $eleve->getId_eleve(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="<?= URL ?>eleves/s/<?= $eleve->getId_eleve(); ?>" onSubmit="return confirm ('voulez vous vraiment supprimer cette éléve');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
    </tr>


  <?php endforeach ?>

</table>

<a href="<?= URL ?>eleves/a/" class="btn btn-success">Ajouter</a>




<?php
$titre = "Eleves";
$content = ob_get_clean();
require_once('template.php');
?>
