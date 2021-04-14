<?php
require_once('models/SportManager.class.php');
$sportManager = new SportManager;
var_dump($sportManager);
 $test =$sportManager->getSports();
 $test2 = $sportManager->chargementSports();
 var_dump($test2);

ob_start();
?>

<form method="POST" action="<?= URL ?>eleves/av">
    <div class="form-group">

        <label for="">Quel sport voulez-vous pratiquer ?</label><br />
        <select name="sport"     id="sport">
        
        <option value=""></option>
          <?php foreach ($listeSports as $key => $sport):?>

             <option  value="<?=$key +1?>"><?= $listeSport['sport'] ?></option>


             <?php endforeach?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Valider</button>
</form>




<?php

$titre = "Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
