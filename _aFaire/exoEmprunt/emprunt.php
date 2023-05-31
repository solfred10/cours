<?php
include("empruntClass.php");
$emprunt = new emprunt(30000,1.5,5);

?>

<table border="1" cellpadding="5">
	<thead>
		<td>Mensualité n°</td>
		<td>Montant restant</td>
	</thead>
	
	<tbody>		
		<?
		$emprunt->afficherMensualite();
		?>
	</tbody>
	
</table>