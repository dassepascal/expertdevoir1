<?php
ob_start();
?>
<table class="table">
<tr class="table-dark">
  <th>Nombre  d'éléve</th>
</tr>
<tr>
<td class="align-middle">afficher le nombre</td>
</tr>
</table>
<?php
$title = $ecole->getNomEcole();
$titre = $ecole->getNomEcole();
$content = ob_get_clean();
require_once('template.php');
?>
