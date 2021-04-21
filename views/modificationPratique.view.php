<?php
require_once('models/SportManager.class.php');
require_once('models/PratiqueManager.class.php');
require_once('controllers/Pratiques.controller.php');
require_once('models/EcoleManager.class.php');
require_once('controllers/Eleves.controller.php');
$sportManager = new SportManager;
$pratiqueManager = new PratiqueManager;
$pratiqueManager->chargementPratiques();
$sportManager->chargementSports();
$eleveManager = new EleveManager;
$eleveManager->chargementEleves();



ob_start();
?>
<form method="POST" action="<?= URL ?>pratiqueSports/av ">
  <div class="form-group">
<label for="nomEleve">Nom :</label>
<input type="text" class="form" id="nomEleve" name="nomEleve" value="<?= $pratique->getNomEleve();?>"><br/>
<label for="nomSport">Sport actuel:</label>
<input type="text" class="form" id="nomSport" name="nomSport" value="<?= $pratique->getNomSport();?>"><br/>
    <label for="">Quel sport voulez-vous pratiquer ?</label><br />
    <select name="id_sport" id="id_sport">
      <option value=""></option>
      <?php
      $sports = $sportManager->getSports();
      for ($i = 0; $i < count($sports); $i++) : ?>
        <option value="<?= $sports[$i]->getId_sport() ?>"><?= $sports[$i]->getNomSport(); ?></option>
      <?php endfor ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Valider</button>
</form>
<?php

$titre = "Modifier une Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
