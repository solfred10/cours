<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">				
		<h1 class="titleCenter">LES CHAMPS DE SAISIES</h1>	
	</div>							
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			Nom : <input type="text" value="Sol">
			<br />
			Prénom : <input type="text" value="Fred">
			<br />
		</div>
		<button onclick="recupererValeurChampSaisie1()">Récupérer la valeur des champs de saisie (méthode 1)</button> 				
		<button onclick="recupererValeurChampSaisie2()">Récupérer la valeur des champs de saisie (méthode 2)</button> 	
		<button onclick="recupererValeurChampSaisie3()">Récupérer la valeur des champs de saisie (méthode 3)</button> 	
		<br /><br />	
	</div>		
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple2">
			Nom : <input type="text" value="champs1">
			<br />
			Prénom : <input type="text" value="champs2">
			<br />
		</div>
		<button onclick="changerValeurChampSaisie1()">changer la valeur des champs de saisie (méthode 1)</button> 				
		<button onclick="changerValeurChampSaisie2()">changer la valeur des champs de saisie (méthode 2)</button> 	
		<br /><br />	
	</div>		
</div>


<script>
	function recupererValeurChampSaisie1() {		
		var champSaisie = $("#exemple1 input[type=text]") ;			
		champSaisie.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurChampSaisie2() {		
		var champSaisie = $("#exemple1 [type=text]") ;			
		champSaisie.each(function() {
			alert($(this).val());
		})
	}
	
	function recupererValeurChampSaisie3() {	
		var champSaisie = $("#exemple1 input:text");		
		champSaisie.each(function() {
			alert($(this).val());
		})
	}
	
	function changerValeurChampSaisie1() {						
		$("#exemple2 input[type=text]").val("méthode1") ;
	}
	
	function changerValeurChampSaisie2() {		
		$("#exemple2 input:text").val("méthode2")
	}
</script>