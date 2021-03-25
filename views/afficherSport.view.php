<?php
ob_start();
?>



<?php

$titre = $sport->getNomSport();
$content = ob_get_clean();
require_once('template.php');
?>
