
<?php
// require_once('models/PratiqueManager.class.php');
// require_once('controllers/Pratiques.controller.php');
// require_once('models/Pratique.class.php');
// $pratiqueManager = new PratiqueManager;
// $pratiqueManager->chargementPratiques();
// $pratiqueManager->getPratiques();
// var_dump($pratiqueManager->getPratiques());
//  $pratique->getNomEleve();
// //var_dump($nomEcole);

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
        <td>1 </td>
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


<!-- <?php
/*---------------------------------------------------------------*/
/*
    Titre : Enlève les doublons dans une requete

    URL   : https://phpsources.net/code_s.php?id=707
    Date édition     : 07 Juil 2005
    Date mise à jour : 14 Sept 2019
    Rapport de la maj:
    - fonctionnement du code vérifié
*/
/*---------------------------------------------------------------*/

     $req =
" SELECT count(*),nom_champ FROM table GROUP BY nom_champ HAVING count(*) > 1 ";

?>

 -->
 <label for="">Quel sport voulez-vous pratiquer ?</label><br />

<select name="sport"     id="sport">

<option value=""></option>
  <?php foreach ($sports as  $sport):?>

     <option  value="<?=$key +1?>"><?= $sport['nomSport'] ?></option>


     <?php endforeach?>
</select>

<!-- <label for="">Nom :</label>
<select name="id_eleve" id="id_eleve">
<option value=""></option>
<?php
//$nomEleve =$pratique->getNomEleve();
//for($i = 0; $i < count($pratiques); $i++):?>
<option value=""></option>
 <option  value="1"><?= //$pratiques[$i]->getNomSport(); ?></option>


<?php// endfor?>
</select> -->
#1452 - Cannot add or update a child row: a foreign key constraint fails (`db_stat`.`pratique`, CONSTRAINT `FK_sport` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id_sport`))


 <!-- <?php
          $eleves =$elevesManager->getEleves();
          foreach ($eleves as $eleve):?>

             <option  value="<?=$eleve->getId();?>"><?= $eleve->getNomEcole() ?></option>


             <?php endforeach?>
