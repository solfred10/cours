<?php
?>

<html>
<head>
	<script>
	function uploadVisuel(divId) 
	{   
		var file_data = $('#' + divId).prop('files')[0];
		if (!file_data)
		{
			alert('Merci de choisir un fichier');
			return;
		}

		var form_data = new FormData();
		form_data.append('file', file_data);
		   
		$.ajax({
			url: 'exos/exosUtilitaire/uploadVisuel.php',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post'
		})
		.done(function (msg)
		{		
			$("#idImage").attr("src","exos/exosUtilitaire/images/visuelRedim/"+msg.fichierRedim);		
		});
	}
	</script>
</head>

<body>
<br><br>

<h3>Upload d'un visuel</h3>

<img id="idImage" src="">
<input type="file" id="idUploadVisuel" onchange="uploadVisuel('idUploadVisuel')" />  
<br>
</body>

<!-- page uploadVisuel -->


</html>