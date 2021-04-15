<?php
ob_start();
?>
  <label for="">Quel sport voulez-vous pratiquer ?</label><br />

<select name="sport"     id="sport">

<option value=""></option>
  <?php foreach ($listeSports as $key => $sport):?>

     <option  value="<?=$key +1?>"><?= $sport['nomSport'] ?></option>


     <?php endforeach?>
</select>


<?php

$titre = "Ajouter une Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
