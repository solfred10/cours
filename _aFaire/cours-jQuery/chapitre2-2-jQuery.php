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
		<h2 class="titleCenter">MANIPULER DU CONTENU</h2>
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			<p>1er paragraphe</p>
			<span>je suis un span</span>
		</div>
		<button onclick="ecrireDansDiv()">Ecrire "Hello word" dans la div</button> 
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			<p>1er paragraphe</p>
		</div>
		<button onclick="recupererText()">Récupérer le text dans la div</button> 
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3">
			<div>
			<b>aaa</b>
			</div>
		</div>
		<button onclick="remplacerText()">remplacer aaa par bbb</button> 
		<br /><br />	
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple4">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="supprimerParagraphe1()">Supprimer les paragraphe</button> 
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple5">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="supprimerParagraphe2()">Supprimer le texte des paragraphes (mais la balise reste)</button> 
		<br /><br />	
	</div>		
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple6">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="ajouterContenu1()">Ajouter du contenu avant la balise ouvrante de la div</button> 
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple7">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="ajouterContenu2()">Ajouter du contenu après la balise fermante de la div</button> 
		<br /><br />	
	</div>		
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple8">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="ajouterContenu3()">Ajouter du contenu après la balise ouvrante de la div</button> 
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple9">
			<p>1er paragraphe</p>
			<p>2e paragraphe</p>
			<span>span n°1</span><br >
			<span>span n°2</span>			
		</div>
		<button onclick="ajouterContenu4()">Ajouter du contenu avant la balise fermante de la div</button> 
		<br /><br />	
	</div>		
</div>

<script>
function ecrireDansDiv() {
	$("#exemple1").html("Hello word");	
}

function recupererText() {
	var textDiv = $("#exemple2").text();	
	alert(textDiv);
}

function remplacerText() {
	$("#exemple3 div").replaceWith("<i>bbb</i>");	
}

function supprimerParagraphe1() {
	$("#exemple4 p").remove();	
}

function supprimerParagraphe2() {
	$("#exemple5 p").empty();	
}

function ajouterContenu1() {
	$("#exemple6").before("<b>texte avant la div</b>");	
}

function ajouterContenu2() {
	$("#exemple7").after("<b>texte après la div</b>");	
}

function ajouterContenu3() {
	$("#exemple8").prepend("<b>texte au début de la div</b>");	
}

function ajouterContenu4() {
	$("#exemple9").append("<b>texte à la fin la div</b>");	
}



	
</script>