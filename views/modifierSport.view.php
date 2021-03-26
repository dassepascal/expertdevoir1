<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>sports/mv">
  <div class="form-group">

    <label for="nomSport">Nom : </label>
    <input type="text" class="form" id="nomSport" name="nomSport" value="<?= $sport->getNomSport(); ?>">
    
  </div>
  <input type="hidden" id="identifiant" name="identifiant" value="<?= $sport->getId_sport(); ?>">
  <button type="submit" class="btn btn-success">Valider</button>
</form>


<?php

$titre ="modification du sport: ".$sport->getNomSport() ;
$content = ob_get_clean();
require_once('template.php');
?>
