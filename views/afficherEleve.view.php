<?php
ob_start();
?>



<?php

$titre = $eleve->getNomEleve();
$content = ob_get_clean();
require_once('template.php');
?>
