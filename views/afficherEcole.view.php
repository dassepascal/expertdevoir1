<?php
ob_start();
?>

Page d'accueil

<?php
$title = "accueil";
$titre = "Accueil";
$content = ob_get_clean();
require_once('template.php');
?>
