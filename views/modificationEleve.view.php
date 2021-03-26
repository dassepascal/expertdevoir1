<?php
ob_start();
?>



<?php

$titre = "Modification eleve";
$content = ob_get_clean();
require_once('template.php');
?>
