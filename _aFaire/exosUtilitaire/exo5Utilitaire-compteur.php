<div class="col-lg-12 divExoCSS">
	<h3>Compteur descriptions</h3>
	<br><br>
	
	<h4>100 caractères max</h4>	
	<textarea id="description1" cols="50" rows="5" onkeyup="limiterNbCaractere(this.id,100,'compteurCaractereDescription')"></textarea>
	<div id="compteurCaractereDescription"></div>
	
	<h4>3 mot max</h4>	
	<textarea id="description2" cols="50" rows="5" onkeyup="limiterNbMot(this.id,3,'compteurMotDescription')"></textarea>
	<div id="compteurMotDescription"></div>
</div>	