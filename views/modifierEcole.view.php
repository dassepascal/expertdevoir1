<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>ecoles/mv">
  <div class="form-group">

    <label for="nomEcole">Nom : </label>
    <input type="text" class="form" id="nomEcole" name="nomEcole" value="<?= $ecole->getNom(); ?>">
  </div>
  <input type="hidden" id="identifiant" name="identifiant" value="<?= $ecole->getId(); ?>">
  <button type="submit" class="btn btn-success">Valider</button>
</form>
<?php

$titre = "Modification de : " . $ecole->getId();
$content = ob_get_clean();
require_once('template.php');
?>
