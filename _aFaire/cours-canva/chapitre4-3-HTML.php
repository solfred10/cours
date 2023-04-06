<?php
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<a href="?page=<?=$_REQUEST["page"]?>&chapitre=accueil">Retour</a>
	</div>							
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<h2 class="titleCenter textBleu">LES ANIMATIONS</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>animation rotation</h3>
		<br />
		<canvas id="animationRotation" width="400" height="400" >			
		</canvas>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>animation translation</h3>
		<br />
		<canvas id="animationTranslation" width="400" height="100" style="background-color:#eee">			
		</canvas>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-4">	
		<h3>double animation</h3>
		<br />
		<canvas id="doubleAnimation" width="400" height="400" style="background-color:#fff">			
		</canvas>
	</div>	
</div>



<script>	 
var monCanvas1 = document.getElementById('animationRotation');  
var monCanvas2 = document.getElementById("animationTranslation")

if (monCanvas1.getContext){
	var ctx = monCanvas1.getContext('2d');
	/* dessin */
	ctx.fillStyle = "green";
	/* translation au centre */
	ctx.translate(monCanvas1.width/2,monCanvas1.height/2);
	/* incrément */
	var i = 0;
	/* timer */
	var interval = setInterval(rotation, 100);    
} 
else {
	alert('canvas non supporté par ce navigateur');
}

function rotation() {
	ctx.rotate(0.5);
	/* dessin */
	ctx.fillRect(0, 0, 100, 10);
	i++;
	if(i>11) clearInterval(interval);
}


/*Translation*/
context2 = monCanvas2.getContext('2d');
context2.fillStyle="#000" ;
context2.fillRect(0,0,50,10) ;
var translation = setInterval(translation,500) ;
var j = 1 ;

function translation() {
	if(j>10) {
		clearInterval(translation);
	}
	else {
		context2.clearRect(0,0,monCanvas2.width,monCanvas2.height) ; /*on efface le rectangle dessiné précédement*/
		context2.translate(5,5) ; /*On effectue la translation du contexte. */		
		context2.fillRect(0,0,50,10) ; /*On dessine le nouveau rectangle*/
		j++;
	}
}

</script>

<script>
    /* canvas */
    var monCanvas3 = document.getElementById('doubleAnimation');
    if (monCanvas3.getContext){
        var ctx = monCanvas3.getContext('2d');
        /* incrément */
        var indice=0;
    } else {
        alert('canvas non supporté par ce navigateur');
    }
        
    /* fonction de dessin */
    function Animer() {
        /* incrémentation */
        indice++;        
        /* sauvegarde de l'état du contexte */
        ctx.save();        
        /* effaçage */
        ctx.clearRect(0, 0, monCanvas3.width,monCanvas3.height);
        /* translation du contexte et dessin du premier rectangle */
        ctx.translate(indice,indice);
        ctx.fillStyle = "blue";
        ctx.fillRect(-10, -10, 20, 20);
        /* rotation puis translation du contexte et dessin du cercle */
          ctx.rotate( indice/10 );
        ctx.translate(50,0);
          ctx.beginPath();
        /* arc : x, y, radius, startAngle, endAngle, antiClockwise */
          ctx.arc(0, 0, 10, 0, 2 * Math.PI, false);
          ctx.fillStyle = 'green';
          ctx.fill();
          ctx.lineWidth = 1;
          ctx.strokeStyle = '#003300';
          ctx.stroke();
          /* retour à l'état précédent du contexte */
        ctx.restore();
    }
    
    /* fonction d'arrêt */
    function Stopper() {
        clearInterval(inter);
    }

    /* timer */
    var inter = setInterval(Animer, 100);    
    setTimeout(Stopper, 20000);

</script>