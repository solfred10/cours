<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES BOUTONS RADIOS</h1>	
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			Sport : <input type="radio" name="sport1" value="handball">handball <input type="radio" name="sport1" value="course à pied">course à pied
			<br />
		</div>
		<button onclick="recupererValeurRadio1()">Récupérer la valeur des bouton radio sport (méthode 1)</button> 				
		<button onclick="recupererValeurRadio2()">Récupérer la valeur des bouton radio sport (méthode 2)</button> 
		<button onclick="recupererValeurRadio3()">Récupérer la valeur des bouton radio sport (méthode 3)</button> 
		<br /><br />	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			Sport : <input type="radio" name="sport2" value="handball">handball <input type="radio" name="sport2" value="course à pied">course à pied <input type="radio" name="sport2" value="badminton">badminton
			<br />
			Club : <input type="radio" name="club2" value="ESBHB">ESBHB <input type="radio" name="club2" value="ABC">ABC <input type="radio" name="club2" value="Montgeron">Montgeron
			<br />			
		</div>
		<button onclick="recupererElementCoche1()">Récupérer la valeur des bouton radio coché (méthode 1)</button> 				
		<button onclick="recupererElementCoche2()">Récupérer la valeur des bouton radio coché (méthode 2)</button> 				
		<button onclick="recupererElementCoche3()">Récupérer la valeur des bouton radio coché (méthode 3)</button> 			 
		<br /><br />	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3">
			Sport : <input type="radio" name="sport3" value="handball" id="handball3">handball <input type="radio" name="sport3" value="course à pied" value="course à pied">course à pied <input type="radio" name="sport3" value="badminton">badminton
			<br />
			Club : <input type="radio" name="club3" value="ESBHB">ESBHB <input type="radio" name="club3" value="ABC">ABC <input type="radio" name="club3" value="Montgeron">Montgeron
			<br />			
		</div>
		<button onclick="verifierElementCoche1()">Vérifie si handball est coché</button> 				
		<button onclick="cocherElementCoche1()">cocher handball </button> 				
		<button onclick="desactiverElement()">Désactiver bouton club</button> 				
			 
		<br /><br />	
	</div>	
</div>


<script>
	function recupererValeurRadio1() {			
		var boutonRadioSport = $("#exemple1 input[type=radio]") ;	
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurRadio2() {			
		var boutonRadioSport = $("#exemple1 [type=radio]") ;			
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurRadio3() {			
		var boutonRadioSport = $("#exemple1 input:radio") ;			
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}	
	
	function recupererElementCoche1() {			
		var boutonRadioSport = $("#exemple2 input[type=radio]:checked") ;	
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererElementCoche2() {			
		var boutonRadioSport = $("#exemple2 [type=radio]:checked") ;			
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererElementCoche3() {			
		var boutonRadioSport = $("#exemple2 input:radio:checked") ;			
		boutonRadioSport.each(function() {
			alert($(this).val());
		})
	}
	
	function verifierElementCoche1() {			
		var boutonRadioSport = $("#handball3").prop("checked") ;	
		alert(boutonRadioSport);
	}
	
	function cocherElementCoche1() {			
		var boutonRadioSport = $("#handball3").prop("checked",true) ;			
	}
	
	function desactiverElement() {			
		var boutonRadioSport = $("[name=club3]").prop("disabled",true) ;			
	}
</script>