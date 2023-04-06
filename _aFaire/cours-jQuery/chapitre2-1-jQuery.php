<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES SELECTEURS</h1>
		<h2 class="titleCenter">LES FILTRES ADDITIONNELS</h2>
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1" style="display:none">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherDiv()">Afficher la div</button> 
		<br /><br />	
	</div>	

	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="masquerDiv()">Masquer la div</button> 
		<br /><br />	
	</div>			
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherMasquerDiv()">Afficher / Masquer la div</button> 
		<br /><br />	
	</div>	
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple4" style="display:none">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherFonduDiv()">Afficher la div avec un fondu (sans param)</button> 
		<button onclick="afficherFonduDiv('slow')">Afficher la div avec un fondu (avec le param slow)</button> 
		<button onclick="afficherFonduDiv(2000)">Afficher la div avec un fondu (avec un param de temps)</button> 
		<br /><br />	
	</div>	

	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple5">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="masquerFonduDiv()">Masquer la div avec un fondu (sans param)</button> 
		<button onclick="masquerFonduDiv('fast')">Masquer la div avec un fondu (avec le param fast)</button> 
		<button onclick="masquerFonduDiv(3000)">Masquer la div avec un fondu (avec un param de temps)</button> 
		<br /><br />	
	</div>			
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple6">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherOpaciteDiv()">Afficher/masquer la div avec un fondu (sans param)</button> 
		<button onclick="afficherOpaciteDiv('fast')">Afficher/masquer la div avec un fondu (avec le param fast)</button> 
		<button onclick="afficherOpaciteDiv(3000)">Afficher/masquer la div avec un fondu (avec un param de temps)</button> 
		<br /><br />	
		<br /><br />	
	</div>	
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple7" style="display:none">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherVersBas()">Afficher la div vers le bas (sans param)</button> 
		<button onclick="afficherVersBas('slow')">Afficher la div vers le bas (avec le param slow)</button> 
		<button onclick="afficherVersBas(2000)">Afficher la div vers le bas (avec un param de temps)</button> 
		<br /><br />	
	</div>	

	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple8">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherVersHaut()">Masquer la div vers le haut (sans param)</button> 
		<button onclick="afficherVersHaut('fast')">Masquer la div vers le haut(avec le param fast)</button> 
		<button onclick="afficherVersHaut(3000)">Masquer la div vers le haut (avec un param de temps)</button> 
		<br /><br />	
	</div>			
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple9">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<p>3e paragraphe</p>
			<p>4e paragraphe</p>
		</div>
		<button onclick="afficherVersHautBas()">Afficher/masquer la div vers le haut ou le bas (sans param)</button> 
		<button onclick="afficherVersHautBas('fast')">Afficher/masquer la div vers le haut ou le bas (avec le param fast)</button> 
		<button onclick="afficherVersHautBas(3000)">Afficher/masquer la div vers le haut ou le bas (avec un param de temps)</button> 
		<br /><br />	
		<br /><br />	
	</div>	
</div>

<script>
function afficherDiv() {
	$("#exemple1").show();	
}

function masquerDiv() {
	$("#exemple2").hide();	
}

function afficherMasquerDiv() {
	$("#exemple3").toggle();	
}

function afficherFonduDiv(paramTemps) {	
	$("#exemple4").fadeIn(paramTemps);	
}

function masquerFonduDiv(paramTemps) {	
	$("#exemple5").fadeOut(paramTemps);	
}

function afficherOpaciteDiv(paramTemps) {
	$("#exemple6").fadeToggle(paramTemps);		
}

function afficherVersBas(paramTemps) {	
	$("#exemple7").slideDown(paramTemps);	
}

function afficherVersHaut(paramTemps) {	
	$("#exemple8").slideUp(paramTemps);	
}

function afficherVersHautBas(paramTemps) {
	$("#exemple9").slideToggle(paramTemps);		
}


	
</script>