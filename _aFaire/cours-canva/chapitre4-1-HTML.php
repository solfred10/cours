<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<h2 class="titleCenter textBleu">LES CANVAS</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Rectangle rempli</h3>
		<br />
		<canvas id="rectangleRempli" >
			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Rectangle avec bordure</h3>
		<br />
		<canvas id="rectangleBordure" >
			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>triangle</h3>
		<br />
		<canvas id="triangle" >
			
		</canvas>
	</div>		
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>etoile</h3>
		<br />
		<canvas id="etoile" height="300px" >
			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>Cercle</h3>
		<br />
		<canvas id="cercle" >
			
		</canvas>
	</div>	
	
	
</div>

<script>
	var monCanvas1 = document.getElementById('rectangleRempli');    
	var monCanvas2 = document.getElementById('rectangleBordure');    
	var monCanvas3 = document.getElementById('triangle');    
	var monCanvas4 = document.getElementById('etoile');    
	var monCanvas5 = document.getElementById('cercle');    
	if (monCanvas1.getContext) {	
		var context1 = monCanvas1.getContext('2d');
		context1.fillStyle = "#0000ff";
		context1.fillRect(0,0,200,50);
	}
	else {
		alert("canvas non supportés");
	}
	
	if (monCanvas2.getContext) {	
		var context2 = monCanvas2.getContext("2d");
		context2.strokeStyle="red";   
		context2.lineWidth="2";   
		context2.strokeRect(1,1,200,50);		
	}
	else {
		alert("canvas non supportés");
	}
	
	if (monCanvas3.getContext) {
		var context3 = monCanvas3.getContext("2d");	
		context3.strokeStyle= "green" ;
		context3.lineWidth= 2 ;
		context3.beginPath();
		context3.moveTo(50,0);
		context3.lineTo(0,100);
		context3.lineTo(100,100);
		context3.closePath();    
		context3.stroke();
	}
	else {
		alert("canvas non supportés");
	}
	
	if (monCanvas4.getContext) {
		var context4 = monCanvas4.getContext("2d");	
		context4.fillStyle="yellow" ;
		context4.moveTo(50,0) ;
		context4.lineTo(25,25) ;
		context4.lineTo(0,50) ;
		context4.lineTo(25,50) ;
		context4.lineTo(50,200) ;
		context4.lineTo(100,75) ;
		context4.lineTo(75,100) ;
		context4.lineTo(75,75) ;
		context4.lineTo(100,50) ;
		context4.lineTo(75,25) ;
		context4.closePath() ;
		context4.fill() ;
				
	}
	else {
		alert("canvas non supportés");
	}
	
	if (monCanvas5.getContext) {
		
		var context5 = monCanvas5.getContext("2d");	
		context5.fillStyle="red" ;
		 /* arc : x, y, radius, startAngle, endAngle, antiClockwise */
		context5.arc(50, 50, 50, 0, 2 * Math.PI, false);
		context5.fill();	
	}
	else {
		alert("canvas non supportés");
	}
	
	

</script>