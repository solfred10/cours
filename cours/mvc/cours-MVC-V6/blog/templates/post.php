<?php $title = "Le blog de l'AVBN 2022"; 
//la fonction ob_start() mémorise" toute la sortie HTML qui suit.
ob_start(); 
?>

<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post->title) ?>
        <em>le <?= $post->frenchCreationDate ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
foreach ($comments as $comment) {
?>
<p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?></p><p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
<?php
}

//on récupère le contenu généré avecob_get_clean()
$content = ob_get_clean(); 

require('layout.php') 
?>
<form action="index.php?action=addComment&id=<?= $post->identifier?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>




