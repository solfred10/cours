<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES ATTRIBUTS</h1>	
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			<a href="http://cours.f-sol-wordpress.eu/?page=jQuery&chapitre=chapitre3-1">1er lien</a>
			<a href="http://cours.f-sol-wordpress.eu/?page=jQuery&chapitre=chapitre4-1">2 lien</a>			
		</div>
		<button onclick="changerCouleurLien()">Récupérer lien html</button> 				
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			<img src="../images/icones/iconeJquery.png" width="100px">		
		</div>
		<button onclick="recupererURLimage()">Récupérer lien html</button> 				
		<button onclick="changerURLimage()">changer lien html</button> 				
		<button onclick="supprimerAttribut()">Supprimer attribut width</button> 				
		<br /><br />	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3">
			Sport : <input type="radio" name="sport" value="handball">handball <input type="radio" name="sport" value="course à pied">course à pied
			<br />
		</div>
		<button onclick="recupererValeurRadio1()">Récupérer la valeur des bouton radio sport (méthode 1)</button> 				
		<button onclick="recupererValeurRadio2()">Récupérer la valeur des bouton radio sport (méthode 2)</button> 		
		<br /><br />	
	</div>
	
	
</div>

<div class="row">
	
</div>

<script>
	function recupererLien() {
		$("#exemple1 [href]").css("color","#ff0000") ;		
	}	
	
	function recupererURLimage() {			
		var lienImage = $("img").attr("src") ;	
		alert(lienImage);			
	}
	
	function changerURLimage() {			
		var lienImage = $("img").attr("src","../images/icones/iconeJqueryUI.png") ;	
	}
	
	function supprimerAttribut() {			
		$("img").removeAttr("width") ;	
	}	
	
	function recupererValeurRadio1() {			
		var boutonRadioSport = $("#exemple3 input[name=sport]") ;	
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurRadio2() {			
		var boutonRadioSport = $("#exemple3 [name=sport]") ;			
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
</script>