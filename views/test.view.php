


<?php
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


