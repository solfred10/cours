<div class="col-lg-offset-1 col-lg-3">	
	<div class="form-group">
		<label for="nom">Nom : </label>
		<input id="nom" type="text" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="prenom">Prénom : </label>
		<input id="prenom" type="text" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="destinataire">Destinataire : </label>
		<input id="destinataire" type="text" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="sujet">Sujet : </label>
		<input id="sujet" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="expediteur">Expediteur : </label>
		<input id="expediteur" type="text" class="form-control">
	</div>
			
	<div class="form-group">
		<label for="message">Message : </label>
		<textarea id="message" type="textarea" class="form-control"></textarea>
	</div>
	
	<button onclick="envoyerMail('envoyerMail')">Envoi simple</button>
	<button onclick="envoyerMail('envoyerMail_phpMailer')">Envoi par PHP mailer</button>

</div>