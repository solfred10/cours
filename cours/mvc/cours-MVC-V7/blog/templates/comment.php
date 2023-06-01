<?php $title = "Le blog de l'AVBN 2022-2023"; 
//la fonction ob_start() mémorise" toute la sortie HTML qui suit.
ob_start(); 
?>
<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php?action=post&idComment=<?=$comment->idPost?>">Retour à la liste des commentaires</a></p>

<?php

?>
	<div class="news">    	
    	<p>
        Auteur : <?= htmlspecialchars($comment->author); ?>        	
        <br>
        Commentaire : <?= nl2br(htmlspecialchars($comment->comment)); ?>
        <br />
        <em><a href="index.php?action=post&idComment=<?= urlencode($comment->idComment) ?>">Commentaires</a></em>
    	</p>
	</div>

    <h2>Modifier</h2>
    <form action="index.php?action=modifyComment&idComment=<?=$comment->idComment?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" value=<?=$comment->author?> />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"><?=$comment->comment?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php


//on récupère le contenu généré avecob_get_clean()
$content = ob_get_clean(); 

require('layout.php') 
?>