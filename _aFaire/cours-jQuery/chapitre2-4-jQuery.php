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
		<h2 class="titleCenter">LES POSITIONS</h2>
	</div>							
</div>

<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5">
		<div id="exemple1" style="width:300px;height:300px;border:1px solid red;padding:10px 15px 20px 25px ">
			width:300px<br />
			height:300px<br />
			border:1px solid red<br />			
			padding-top:10px<br />	
			padding-bottom:20px<br />	
			padding-left:15px<br />	
			padding-right:25px<br />	
		</div>					
		<button onclick="afficherHauteur('sansMargeSansBordure')">Afficher hauteur (sans marge interne ni bordure)</button> 	
		<br />
		<button onclick="afficherHauteur('sansBordure')">Afficher hauteur avec marge mais sans bordure)</button> 
		<br />		
		<button onclick="afficherHauteur('avecTout')">Afficher hauteur Hauteur (avec marge et bordure)</button> 	
	</div>
	
	<div class="col-lg-7 col-md-7 col-sm-7">
		Hauteur (sans marge interne ni bordure) = 300(height) - 10(padding-top) - 20(padding-bottom) - 2(border)		
		<div id="divHauteur1">
			 
		</div>
		<br /><br />
		Hauteur (avec marge mais sans bordure) = 300(height) - 2(border)		
		<div id="divHauteur2">
			 
		</div>
		<br /><br />
		Afficher hauteur Hauteur (avec marge et bordure) = 300(height) 		
		<div id="divHauteur3">
			 
		</div>
	</div>
</div>
<br /><br />

<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5">
		<div id="exemple2" style="width:250px;height:300px;border:1px solid red;padding:10px 15px 20px 25px ">
			width:250px<br />
			height:300px<br />
			border:1px solid red<br />			
			padding-top:10px<br />	
			padding-bottom:20px<br />	
			padding-left:15px<br />	
			padding-right:25px<br />	
		</div>					
		<button onclick="afficherLongueur('sansMargeSansBordure')">Afficher longueur (sans marge interne ni bordure)</button> 	
		<br />
		<button onclick="afficherLongueur('sansBordure')">Afficher longueur avec marge mais sans bordure)</button> 
		<br />		
		<button onclick="afficherLongueur('avecTout')">Afficher longueur longueur (avec marge et bordure)</button> 	
	</div>
	
	<div class="col-lg-7 col-md-7 col-sm-7">
		longueur (sans marge interne ni bordure) = 250(height) - 15(padding-left) - 25(padding-right) - 2(border)		
		<div id="divLongueur1">
			 
		</div>
		<br /><br />
		longueur (avec marge mais sans bordure) = 250(height) - 2(border)		
		<div id="divLongueur2">
			 
		</div>
		<br /><br />
		Afficher longueur (avec marge et bordure) = 250(height) 		
		<div id="divLongueur3">
			 
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5">
		<div id="exemple3" style="width:250px;height:300px;border:1px solid red;padding:10px 15px 20px 25px;margin-top:20px;margin-left:30px;position:relative">
			width:250px<br />
			height:300px<br />
			border:1px solid red<br />
			margin-top:20px<br />
			margin-left:30px<br />	
			padding-top:10px<br />	
			padding-bottom:20px<br />	
			padding-left:15px<br />	
			padding-right:25px<br />	
		</div>					
		<button onclick="afficherPosition('document')">Afficher la position par rapport au coin supérieur gauche de la page</button> 	
		<br />
		<button onclick="afficherPosition('parent')">Afficher la position par rapport au parent</button> 	
		<br />	
	</div>
	
	<div class="col-lg-7 col-md-7 col-sm-7">
		position par rapport au coin supérieur gauche de la page		
		<div id="divPositionDocument">
			 
		</div>
		<br />
		position par rapport au parent
		<div id="divPositionParent">
			 
		</div>
		
		
	</div>
</div>

<script>
	function afficherHauteur(parametre) {
		if (parametre=="sansMargeSansBordure") {
			var hauteur = $("#exemple1").height();
			$("#divHauteur1").html("<b>Hauteur (sans marge ni bordure) = "+hauteur+"</b>") ;
		}
		else if (parametre=="sansBordure") {
			var hauteur = $("#exemple1").innerHeight();
			$("#divHauteur2").html("<b>Hauteur (avec marge mais sans bordure) = "+hauteur+"</b>") ;
		}
		else {
			var hauteur = $("#exemple1").outerHeight(false);
			$("#divHauteur3").html("<b>Hauteur (avec marge et bordure) = "+hauteur+"</b>") ;
		}
	}
	
	function afficherLongueur(parametre) {
		if (parametre=="sansMargeSansBordure") {
			var longueur = $("#exemple2").width();
			$("#divLongueur1").html("<b>Longueur (sans marge ni bordure) = "+longueur+"</b>") ;
		}
		else if (parametre=="sansBordure") {
			var longueur = $("#exemple2").innerWidth();
			$("#divLongueur2").html("<b>Longueur (avec marge mais sans bordure) = "+longueur+"</b>") ;
		}
		else {
			var longueur = $("#exemple2").outerWidth(false);
			$("#divLongueur3").html("<b>Longueur (avec marge et bordure) = "+longueur+"</b>") ;
		}
	}	
	
	function afficherPosition(parametre) {		
		if (parametre=="document") {
			
			var positionDivTop = $("#exemple3").offset().top;			
			var positionDivLeft = $("#exemple3").offset().left;			
			$("#divPositionDocument").html("<b>haut : "+positionDivTop+"<br>"+"Gauche : "+positionDivLeft+"</b><br>") ;
		}		
		else {			
			var positionDivTop = $("#exemple3").position().top;
			var positionDivLeft = $("#exemple3").position().left;
			$("#divPositionParent").html("<b>haut : "+positionDivTop+"<br>"+"Gauche : "+positionDivLeft+"</b><br>") ;
		}
	}	
</script>	