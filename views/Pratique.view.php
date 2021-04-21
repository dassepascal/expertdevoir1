<?php
require_once('models/PratiqueManager.class.php');

$pratiqueManager = new PratiqueManager;



ob_start();
?>
<table class="table">
<tr class="table-dark">
<th>Nom de l'éléve</th>
<th>sport</th>
<th colspan="2">Action</th>
</tr>
<?php for($i =0;$i < count($pratiques);$i++) :?>
<tr>
<td class="align-middle"><a href="<?= URL ;?>pratiqueSports/p/<?= $pratiques[$i]->getId_pratique();?> "><?= $pratiques[$i]->getNomEleve();?></a></td>
<td class="align-middle"><?= $pratiques[$i]->getNomSport();?></a></td>
<td class="align-middle">
      <a href="<?= URL ?>pratiqueSports/m/<?=$pratiques[$i]->getId_pratique();?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="post" action="" onSubmit="return confirm ('voulez vous vraiment supprimer cette ecole');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
      </td>
</tr>
<?php endfor;?>
</table>
<a href="<?= URL ?>pratiqueSports/a/" class="btn btn-success">Ajouter</a>
<?php

$titre = "pratique";
$content = ob_get_clean();
require_once('template.php');
?>
