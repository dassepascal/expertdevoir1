<?php
require_once('models/SportManager.class.php');
require_once('models/PratiqueManager.class.php');
require_once('controllers/Pratiques.controller.php');
require_once('models/EcoleManager.class.php');
require_once('controllers/Eleves.controller.php');
$sportManager = new SportManager;
var_dump($sportManager);
$pratiqueManager = new PratiqueManager;
var_dump($pratiqueManager);
$pratiqueManager->chargementPratiques();

$sportManager->chargementSports();

$eleveManager = new EleveManager;
$eleveManager->chargementEleves();



ob_start();
?>
<form method="POST" action="<?= URL ?>pratiqueSports/av ">
<div class="form-group">
<label for="id_eleve">Nom : </label>
<select name="id_eleve"     id="id_eleve">

<option value=""></option>
  <?php
$eleves = $eleveManager->getEleves();
  for($i =0; $i < count($eleves); $i++) :?>


<option  value=""><?= $eleves[$i]->getNom(); ?></option>

     <?php endfor?>
</select><br>



 <label for="">Quel sport voulez-vous pratiquer ?</label><br />
 <select name="id_sport"     id="id_sport">

<option value=""></option>
  <?php
$sports = $sportManager->getSports();

  for($i =0; $i < count($sports); $i++) :?>

     <option  value="<?= $sports[$i]->getId_sport()?>"><?= $sports[$i]->getNomSport(); ?></option>


     <?php endfor?>
</select>
</div>
<button type="submit" class="btn btn-success">Valider</button>
</form>
<?php

$titre = "Ajouter une Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
