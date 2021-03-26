

<?php
ob_start();
?>
<form action="#" method="post">
<fieldset><legend>Afficher ecole</legend>
<label for="ecole"> Ecole :</label>

<select name = 'ecole' id='ecole' onchange="submit()">
<option value=""></option>
<option value="1"> ecole 1</option>
<option value="1"> ecole 2</option>
<option value="1"> ecole 3</option>
</select>
</fieldset>
</form>


<?php

$titre = "test";
$content = ob_get_clean();
require_once('template.php');
?>
