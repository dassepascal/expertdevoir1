<?php
ob_start();
?>



<?php
$title = $eleve->getNomEleve();
$titre = $eleve->getNomEleve();
$content = ob_get_clean();
require_once('template.php');
?>
