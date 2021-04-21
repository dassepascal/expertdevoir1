<?php
$sportManager = new SportManager;
$sportManager->chargementSports();

ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/iv ">
  <div class="form-group choix1">
    <label for="">Quel sport voulez-vous pratiquer en 1?</label><br />
    <select name="id_sport" id="id_sport">
      <option value=""></option>
      <?php
      $sports = $sportManager->getSports();
      for ($i = 0; $i < count($sports); $i++) : ?>
        <option value="<?= $sports[$i]->getId_sport() ?>"><?= $sports[$i]->getNomSport(); ?></option>
      <?php endfor ?>
    </select>
  </div>

  



  <a href="<?= URL ?>eleves/iv/" class="btn btn-success">Valider</a>




</form>


<?php

$titre = "Inscription sports";
$content = ob_get_clean();
require_once('template.php');
?>
