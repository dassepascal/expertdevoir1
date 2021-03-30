<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/mv">
  <div class="form-group">

    <label for="nomEleve">Nom de l'éléve: </label>
    <input type="text" class="form" id="nomEleve" name="nomEleve" value="<?= $eleve->getNomEleve(); ?>"><br/>
    <label for="ecole">Nom de l'école </label>
    <input type="text" class="form" id="nomEcole" name="nomEcole" value="<?= $eleve->getId_ecole(); ?>"><br/>

    <label for="pays">Changer d'école ?</label><br />
        <select name="nomEcole"     id="nomEcole">
        <option value=""></option>
            <option value="1">ecole A</option>
            <option value="2">ecole B</option>
            <option value="3">ecole C</option>
        </select>
  </div>
  <input type="hidden" id="identifiant" name="identifiant" value="<?= $eleve->getId_eleve(); ?>">
  <button type="submit" class="btn btn-success">Valider</button>
</form>


<?php

$titre = "Modification eleve";
$content = ob_get_clean();
require_once('template.php');
?>
