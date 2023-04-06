<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES BOUTONS CHECKBOX</h1>	
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			Sport : <input type="checkbox" name="sport1" value="handball">handball <input type="checkbox" name="sport1" value="course à pied">course à pied
			<br />
		</div>
		<button onclick="recupererValeurCheckbox1()">Récupérer la valeur des bouton checkbox sport (méthode 1)</button> 				
		<button onclick="recupererValeurCheckbox2()">Récupérer la valeur des bouton checkbox sport (méthode 2)</button> 
		<button onclick="recupererValeurCheckbox3()">Récupérer la valeur des bouton checkbox sport (méthode 3)</button> 
		<br /><br />	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			Sport : <input type="checkbox" name="sport2" value="handball">handball <input type="checkbox" name="sport2" value="course à pied">course à pied <input type="checkbox" name="sport2" value="badminton">badminton
			<br />
			Club : <input type="checkbox" name="club2" value="ESBHB">ESBHB <input type="checkbox" name="club2" value="ABC">ABC <input type="checkbox" name="club2" value="Montgeron">Montgeron
			<br />			
		</div>
		<button onclick="recupererElementCoche1()">Récupérer la valeur des bouton checkbox coché (méthode 1)</button> 				
		<button onclick="recupererElementCoche2()">Récupérer la valeur des bouton checkbox coché (méthode 2)</button> 				
		<button onclick="recupererElementCoche3()">Récupérer la valeur des bouton checkbox coché (méthode 3)</button> 			 
		<br /><br />	
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple3">
			Sport : <input type="checkbox" name="sport3" value="handball" id="handball3">handball <input type="checkbox" name="sport3" value="course à pied" value="course à pied">course à pied <input type="checkbox" name="sport3" value="badminton">badminton
			<br />
			Club : <input type="checkbox" name="club3" value="ESBHB">ESBHB <input type="checkbox" name="club3" value="ABC">ABC <input type="checkbox" name="club3" value="Montgeron">Montgeron
			<br />			
		</div>
		<button onclick="verifierElementCoche1()">Vérifie si handball est coché</button> 				
		<button onclick="cocherElementCoche1()">cocher handball </button> 				
		<button onclick="desactiverElement()">Désactiver bouton club</button> 				
			 
		<br /><br />	
	</div>	
</div>


<script>
	function recupererValeurCheckbox1() {			
		var boutonCheckboxSport = $("#exemple1 input[type=checkbox]") ;	
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurCheckbox2() {			
		var boutonCheckboxSport = $("#exemple1 [type=checkbox]") ;			
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurCheckbox3() {			
		var boutonCheckboxSport = $("#exemple1 input:checkbox") ;			
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}	
	
	function recupererElementCoche1() {			
		var boutonCheckboxSport = $("#exemple2 input[type=checkbox]:checked") ;	
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererElementCoche2() {			
		var boutonCheckboxSport = $("#exemple2 [type=checkbox]:checked") ;			
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererElementCoche3() {			
		var boutonCheckboxSport = $("#exemple2 input:checkbox:checked") ;			
		boutonCheckboxSport.each(function() {
			alert($(this).val());
		})
	}
	
	function verifierElementCoche1() {			
		var boutonCheckboxSport = $("#handball3").prop("checked") ;	
		alert(boutonCheckboxSport);
	}
	
	function cocherElementCoche1() {			
		var boutonCheckboxSport = $("#handball3").prop("checked",true) ;			
	}
	
	function desactiverElement() {			
		var boutonCheckboxSport = $("[name=club3]").prop("disabled",true) ;			
	}
</script>