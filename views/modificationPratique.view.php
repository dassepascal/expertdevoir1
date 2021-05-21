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
<?php
if (!empty($_SESSION['alert'])) : ?>
  <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?></div>
<?php
  unset($_SESSION['alert']);
endif;
?>
<form method="POST" action="<?= URL ?>pratiqueSports/mv ">
  <div class="form-group">
<label for="nomEleve">Nom :</label>

<?php var_dump($pratique->getId_eleve());?>
<input type="text" class="form" id="nomEleve" name="id_eleve" value="<?= $pratique->getNomEleve();?>"><br/>
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
  <input type="hidden" name="id_eleve" value="<?= $pratique->getId_eleve();?>">
  <input type="hidden" id="identifiant" name="identifiant" value="<?= $pratique->getId_pratique(); ?>">
  <?php var_dump($pratique->getId_pratique());?>
  <button type="submit" class="btn btn-success">Valider</button>
</form>
<?php

$titre = "Modifier une Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
