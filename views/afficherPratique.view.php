<?php
require_once('models/PratiqueManager.class.php');
require_once('controllers/Pratiques.controller.php');
require_once('models/Pratique.class.php');
$pratiqueManager = new PratiqueManager;
$pratiqueManager->chargementPratiques();
$pratiqueManager->getPratiques();
var_dump($pratiqueManager->getPratiques());
 $pratique->getNomEleve();
//var_dump($nomEcole);

ob_start();
?>

<table class="table">
    <tr class="table-dark">
        <th>Nom de l'eleve</th>
        <th colspan="3"> nom sports</th>
        <th colspan="2">Action</th>
    </tr>

 <?php for ($i =0; count($pratiques);$i++):?>


    <tr>
        <td class="align-middle "><a href=""></a></td>
        <td><?= $pratique->getNomEleve();?> </td>
        <td>2</td>
        <td>3</td>

        <td class="align-middle"> <a href="" class="btn btn-warning">Modifier</a></td>

        <td class="align-middle">
            <form method="post" action="" onSubmit="return confirm ('voulez vous vraiment supprimer cette pratique');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    </tr>

 <?php endfor;?>

<a href="<?= URL ?>pratiqueSports/a/" class="btn btn-success">Ajouter</a>







<?php

$titre = "Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
