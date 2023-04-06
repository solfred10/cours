<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<h2 class="titleCenter textBleu">LES TRANSFORMATIONS</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Agrandissement</h3>
		<br />
		<canvas id="agrandissement" width="400" >			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Translation</h3>
		<br />
		<canvas id="translation" width="400">			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Rotation</h3>
		<br />
		<canvas id="rotation" width="400">			
		</canvas>
	</div>	
</div>

<div class="row">		
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Texte</h3>
		<br />
		<canvas id="texteAffiche">			
		</canvas>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Les images</h3>
		<br />
		<canvas id="imageAffiche" height="400px">			
		</canvas>
	</div>	
</div>


<script>	 
var monCanvas1 = document.getElementById('agrandissement');  
var monCanvas2 = document.getElementById('translation');  
var monCanvas3 = document.getElementById('rotation');  
var monCanvas4 = document.getElementById('texteAffiche');  
var monCanvas5 = document.getElementById('imageAffiche');  

if (monCanvas1.getContext) {	
	var contexte1 = monCanvas1.getContext('2d');
	var contexte2 = monCanvas2.getContext('2d');
	var contexte3 = monCanvas3.getContext('2d');
	var contexte4 = monCanvas4.getContext('2d');
	var contexte5 = monCanvas5.getContext('2d');
 	
	contexte1.strokeStyle = "#000000";	
	contexte1.strokeRect(0,0,100,50);
	contexte1.scale(2,2);
	contexte1.strokeRect(0,0,100,50); /* Ce rectangle fera 200px de long par 100px de haut */
	
	contexte2.fillStyle = "#ff0000" ;
	contexte2.fillRect(0,0,50,25);
	contexte2.translate(55,30);
	contexte2.fillRect(0,0,50,25);	
		
	contexte3.fillStyle="#ff0000" ;
	contexte3.fillRect(0,0,100,50) ;	
	contexte3.fillStyle="#000fff" ;
	contexte3.save() ;
	contexte3.translate(50,0); /* On déplace le point d'origine */
	contexte3.rotate(45 * Math.PI/180);  /* On effectue une rotation de 45° */
	contexte3.fillRect(0,0,100,50) ; /*On trace un rectangle depuis le nouveau point d'origine qui est en (50,0)*/
	contexte3.restore() ;
	
	contexte4.fillStyle="#ff0000" ;
	contexte4.font = 'Italic 20px Sans-Serif';
	contexte4.fillText('Hello',0,20);  

	/* nouvelle image */
	monImage = new Image();
	/* définition de la source */
	monImage.src = '../images/icones/iconeHTML.png';
	/* tracé uniquement quand l'image sera chargée
	(quand l'événement onLoad sera déclenché, exécuter ctx.drawImage() */
	monImage.onload = function(){
		contexte5.drawImage(monImage, 0, 0);
	}

	
	
}
else {
	alert("canvas non supportés");
}
</script>