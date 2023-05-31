<div class="col-lg-12 divExoCSS">
	<h3 id="parentsEnfant">MANIPULATION DES CHAINES DE CARACTERES</h3>

	<span id="monTexte">Mon.Fichier.png</span>
	<br><br>
	
	<button class="btn btn-success" onclick="afficherNombreDeCaractere('monTexte')">Nombre de caractères</button>
	<br><br>
	
	<button class="btn btn-success" onclick="afficherPremierePositionCaractere('i','monTexte')">1ère Position du i</button>
	<br><br>		
	
	<button class="btn btn-success" onclick="afficherDernierePositionCaractere('i','monTexte')">Dernière position du i</button>
	<br><br>	
	
	<button class="btn btn-success" onclick="extraireChaineV1(2,5,'monTexte')">extraction d'un morceau de chaine (du 2e indice jusqu'au 5e non inclu)</button>
	<br><br>	
	
	<button class="btn btn-danger" onclick="extraireChaineV1(-2,-1,'monTexte')">extraction d'un morceau de chaine (du 2e indice depuis la fin jusqu'au 5e indice depuis la fin non inclu)</button>
	<br><br>	

	<button class="btn btn-success" onclick="extraireChaineV2(2,'monTexte')">extraction à partir du 2e indice et jusqu'à la fin</button>
	<br><br>	
	
	<button class="btn btn-danger" onclick="extraireChaineV2(-2,'monTexte')">extraction à partir du 2e indice depuis la fin et jusqu'au début</button>
	<br><br>
	
	<button class="btn btn-success" onclick="extraireChaineV3(-2,'monTexte')">extraction à partir du 2e indice depuis la fin et jusqu'au début (methode substring)</button>
	<br><br>	
	
	<button class="btn btn-success" onclick="extraireChaineV4(2,5,'monTexte')">extraction à partir du 2e indice  et sur une longueur de 5 caractère (méthode substr)</button>
	<br><br>
	
	<button class="btn btn-success" onclick="remplacerTexte('Mon','Ma','monTexte')">remplacer Mon par ma</button>
	<br><br>

	<button class="btn btn-success" onclick="mettreEnMajuscule('monTexte')">Mettre en majuscule</button>
	<br><br>	
	
	<button class="btn btn-success" onclick="extraireCaractere(2,'monTexte')">Extraire le caractère de l'indice numéro 2</button>
	<br><br>
	
	<button class="btn btn-success" onclick="mettreChaineDansTableau('.','monTexte')">Mettre texte dans tableau avec le séparateur .</button>
	<br><br>	

</div>