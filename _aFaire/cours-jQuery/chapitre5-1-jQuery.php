<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES CLASSES</h1>	
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1" class="texteGras">
			texte dans la div
		</div>
		<button onclick="afficherValeurClass()">afficher la valeur de la class</button> 	
		<br />	
		<button onclick="changerValeurClass()">changer la valeur de la class</button> 		
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2" class="texteGras">
			texte dans la div
		</div>
			
		<button onclick="ajouterClass()">Ajouter une valeur à l'attribut class</button> 		
		<br />	
		<button onclick="supprimerClass()">Supprimer une valeur à l'attribut class</button> 
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3" class="texteGras">
			texte dans la div
		</div>
		<button onclick="possedeClass('texteRouge')">Possède la class "texte rouge"</button>	
		<br />
		<button onclick="possedeClass('texteGras')">Possède la class "texte gras"</button>				
		<br /><br />	
	</div>	
</div>


<script>
	function afficherValeurClass() {
		var valeurClass = $("#exemple1").attr("class");	
		alert(valeurClass);
	}
	
	function changerValeurClass() {
		$("#exemple1").attr("class","texteItalic");			
	}
	
	function ajouterClass() {
		$("#exemple2").addClass("texteRouge");	
	}
	
	function supprimerClass() {
		$("#exemple2").removeClass("texteRouge");	
	}
	
	function possedeClass(nomClass) {
		alert($("#exemple3").hasClass(nomClass));	
	}	
	
</script>