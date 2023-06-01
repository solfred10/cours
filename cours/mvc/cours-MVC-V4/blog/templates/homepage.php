<?php $title = "Le blog de l'AVBN 2022-2023"; 
//la fonction ob_start() mémorise" toute la sortie HTML qui suit.
ob_start(); 
?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
	<div class="news">
    	<h3>
        	<?= htmlspecialchars($post['title']); ?>
        	<em>le <?= $post['french_creation_date']; ?></em>
    	</h3>
    	<p>
        	<?= nl2br(htmlspecialchars($post['content'])); ?>
        	<br />
        	<em><a href="index.php?action=post&id=<?= urlencode($post['identifier']) ?>">Commentaires</a></em>
    	</p>
	</div>
<?php
}

//on récupère le contenu généré avecob_get_clean()
$content = ob_get_clean(); 

require('layout.php') 
?>