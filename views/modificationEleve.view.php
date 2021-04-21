<?php
require_once('controllers/Eleves.controller.php');
require_once('models/EleveManager.class.php');
require_once('models/EcoleManager.class.php');
$eleveManager = new EleveManager;
 $eleveManager->chargementEleves();
 $ecoleManager = new EcoleManager;
 $ecoleManager->chargementEcoles();

ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/mv">
  <div class="form-group">

    <label for="nomEleve">Nom de l'éléve: </label>
    <input type="text" class="form" id="nomEleve" name="nomEleve" value="<?= $eleve->getNom(); ?>"><br/>
    <label for="ecole">Nom de l'école </label>
    <input type="text" class="form" id="nomEcole" name="nomEcole" value="<?= $eleve->getNomEcole(); ?>"><br/>

    <label for="pays">Changer d'école ?</label><br />
        <select name="nomEcole"     id="nomEcole">
       


        <option value=""></option>
          <?php
          $ecoles =$ecoleManager->getEcoles();
          foreach ($ecoles as $ecole):?>

             <option  value="<?=$ecole->getId();?>"><?= $ecole->getNom() ?></option>


             <?php endforeach?>
        </select>
  </div>
  <input type="hidden" id="identifiant" name="identifiant" value="<?= $eleve->getId(); ?>">
  <button type="submit" class="btn btn-success">Valider</button>
</form>


<?php

$titre = "Modification eleve";
$content = ob_get_clean();
require_once('template.php');
?>
