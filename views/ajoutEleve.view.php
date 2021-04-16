<?php
require_once('models/EcoleManager.class.php');
require_once('controllers/Eleves.controller.php');
require_once('models/EleveManager.class.php');
 $eleveManager = new eleveManager;
  $listeEcoles =$eleveManager->listeEcole();
  $listeSports = $eleveManager->listeSports();



ob_start();
?>
<form method="POST" action="<?= URL ?>eleves/av">
    <div class="form-group">
        <label for="nomEleve">Nom : </label>
        <input type="text" class="form" id="nomEleve" name="nomEleve"><br/>

        <label for="NomEcole">Dans quel ecole ?</label><br />

        <select name="nomEcole"     id="nomEcole">
        
        <option value=""></option>
          <?php foreach ($listeEcoles as $key => $listeEcole):?>

             <option  value="<?=$key +1?>"><?= $listeEcole['nomEcole'] ?></option>


             <?php endforeach?>
        </select>



    </div>
    <button type="submit" class="btn btn-success">Valider</button>
</form>

<?php
$titre ="ajout eleve" ;
$content = ob_get_clean();
require_once('template.php');
?>
