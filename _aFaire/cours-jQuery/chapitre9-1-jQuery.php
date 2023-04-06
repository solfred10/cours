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
		<div id="exemple1">
			<select id="sports">
				<option value=""></option>
				<option value="badminton">badminton</option>
				<option value="Course à pied">Course à pied</option>
				<option value="handball">handball</option>
			</select>
		</div>
		<button onclick="selectionnerMenuDeroulant1()">Sélectionner le sport choisi</button> 	
		<br />
		<button onclick="selectionnerMenuDeroulant2()">Sélectionner le 2e sport</button> 		
		<br />	
		<button onclick="selectionnerMenuDeroulant3()">Sélectionner le 3e sport</button> 				
		<br /><br />	
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<div id="exemple1">
			<select id="club">
				<option value=""></option>
				<option value="abc">abc</option>
				<option value="esbhb">esbhb</option>
				<option value="esm">esm</option>
			</select>
		</div>
		<button onclick="forcerValeurMenuDeroulant1()">Sélectionner ABC</button> 	
		<br />	
		<button onclick="forcerValeurMenuDeroulant2()">Sélectionner esbhb</button>
		<br />	
		<button onclick="forcerValeurMenuDeroulant3()">Sélectionner esm</button> 				
		<br /><br />	
	</div>				
</div>


<script>
	function selectionnerMenuDeroulant1() {
		var sport = $("#sports option:selected").val()	;
		alert(sport);
	}
	
	function selectionnerMenuDeroulant2() {
		var sport = $("#sports option:eq(2)").val() ;	
		alert(sport);
	}
	
	function selectionnerMenuDeroulant3() {
		var sport = $("#sports option").eq(3).val() ;	
		alert(sport);
	}
	
	function forcerValeurMenuDeroulant1() {
		$("#club [value=abc]").prop("selected",true);
	}
	
	function forcerValeurMenuDeroulant2() {
		var valeur2 = $("#club option:eq(2)") ;		
		$(valeur2).prop("selected",true);
	}
	
	function forcerValeurMenuDeroulant3() {
		var valeur3 = $("#club option").eq(3) ;		
		$(valeur3).prop("selected",true);
	}
</script>