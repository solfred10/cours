<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link href="../../../css/style.css" rel="stylesheet">
	<title>Bootstrap - Accueil</title>
</head>

<body>
	<div class="container">		 
		<div class="row MT20">	
			<div class="col-xl-12 titre">
				<a href="../accueil.html">						
				<img src="../../../images/icones/iconePHP.png">				
</a>
			</div>
		</div>			

		<div class="row MT40">	
			<div class="col-xl-12 titre">
				<h1>Upload d'un visuel</h1>		
				<img id="idImage" src="">
				<input type="file" id="idUploadVisuel" onchange="uploadVisuel(this.id)" />  				
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="../../../js/fonctionsJS.js"></script>

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
			url: 'savePhoto.php',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post'
		})
		.done(function (msg)
		{		
			//$("#idImage").attr("src","exos/exosUtilitaire/images/visuelRedim/"+msg.fichierRedim);		
			$("#idImage").attr("src","upload/"+msg.fichierRedim);					
		});
	}
	</script>

</body>

</html>