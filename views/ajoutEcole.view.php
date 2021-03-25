<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>ecoles/av">
    <div class="form-group">
        <label for="nomEcole">Nom : </label>
        <input type="text" class="form" id="nomEcole" name="nomEcole">
    </div>

    <button type="submit" name="submit_form"    class="btn btn-success">Valider</button>
</form>

<?php
$title = "ajout d'une école";
$titre = "ajout d'une école";
$content = ob_get_clean();
require_once('template.php');
?>
