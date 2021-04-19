<?php
ob_start();
?>
<h2> Sports </h2>
<p><?= $pratique->getNomSport();?> </p>


<?php

$titre = $pratique->getNomEleve();
$content = ob_get_clean();
require_once('template.php');
?>
