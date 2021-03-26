<?php
require_once('models/EcoleManager.class.php');
// $id_ecole = $ecoleManager->getId_ecole();
// var_dump($id_ecole);
ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/av">
    <div class="form-group">
        <label for="nomEleve">Nom : </label>
        <input type="text" class="form" id="nomEleve" name="nomEleve"><br/>
        <label for="pays">Dans quel ecole ?</label><br />
        <select name="nomEcole"     id="nomEcole">
        <option value=""></option>
            <option value="1">ecole A</option>
            <option value="2">ecole B</option>
            <option value="3">ecole C</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Valider</button>
</form>

<?php
$titre ="ajout eleve" ;
$content = ob_get_clean();
require_once('template.php');
?>
