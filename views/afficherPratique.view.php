<?php
ob_start();
?>



<?php

$titre = "Pratique";
$content = ob_get_clean();
require_once('template.php');
?>
