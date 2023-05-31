<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>

<form method="post" id="formUpload" action="uploadFile.php" enctype="multipart/form-data">
	<input type="file" name="fileUpload" id="fileUpload" value="">
	<input type="button" id="lanceUpload" onClick="executeUpload(document.getElementById('idEvenement').value,document.getElementById('numeroPhoto').value);" value="Envoyer">
	<!--on récupère l'id de l'événement dans le formulaire pour l'insertion dans la table-->
	<input type="text" id="idEvt" name="idEvt" value="">
	<input type="text" id="numPhoto" name="numPhoto" value="">
</form>

