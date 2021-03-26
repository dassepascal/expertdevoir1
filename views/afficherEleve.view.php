<?php
ob_start();
?>
<table class="table">
  <tr class="table-dark">
    <th>Nom de l'école</th>
      </tr>
<tr>
<td class="align-middle" > afficher nom ecole</td>
</tr>
</table>


<?php

$titre = $eleve->getNomEleve();
$content = ob_get_clean();
require_once('template.php');
?>
