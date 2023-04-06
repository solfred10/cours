<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Partie V - Chapitre 5 - Exemple 7</title>

<style>
  div {
	margin: 50px auto;
	text-align: center;
  }

  #fred {
	padding: 5px;
	width: 150px;
	background-color: #CCC;
  }

  #dropper {
	padding-top: 40px;
	width: 400px;
	height: 400px;
	border: 2px solid #222;
	background-color: #888;
  }
</style>
</head>

<body>

<div id="dropper">J'accepte les fichiers déplacés !</div>

<script>
var dropper = document.querySelector('#dropper');

//on supprime l'interdiction du drop
dropper.addEventListener('dragover', function(e) {
	e.preventDefault(); 
});

dropper.addEventListener('drop', function(e) {
	e.preventDefault(); //empêche l'ouverture de l'image quand on la déposera

	//on récupère les infos du/des fichiers déposer
	var files = e.dataTransfer.files ;
	var	filesLength = files.length ;
	var	filenames = "";

	for(i = 0 ; i < filesLength ; i++) {
		filenames += files[i].name+"<br>";
	}
	document.getElementById("dropper").innerHTML = filesLength + ' fichier(s) :<br><br>' + filenames;				
	
});
</script>

</body>
</html>