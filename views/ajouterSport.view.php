<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>sports/av" >
    <div class="form-group">
        <label for="nomSport">Nom : </label>
        <input type="text" class="form" id="nomSport" name="nomSport">
    </div>



    <button type="submit"  name="submit_sport_form" class="btn btn-success">Valider</button>
</form>


<?php

$titre = "Ajouter un sport";
$content = ob_get_clean();
require_once('template.php');
?>
