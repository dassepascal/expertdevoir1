<?php
ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/av">
    <div class="form-group">
        <label for="nomEleve">Nom : </label>
        <input type="text" class="form" id="nomEleve" name="nomEleve">
        <label for="pays">Dans quel ecole ?</label><br />
        <select name="id_ecole" id="id_ecole">
            <option value="1">ecole A</option>
            <option value="2">ecole B</option>
            <option value="3">ecole C</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Valider</button>
</form>

<?php
$titre = "ajout d'un éléve";
$content = ob_get_clean();
require_once('template.php');
?>
