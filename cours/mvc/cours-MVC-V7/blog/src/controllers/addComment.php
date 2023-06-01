<?php

require_once('src/model/comment.php');

use Application\Model\Comment\CommentRepository;

function addComment(string $post, array $input)	{
	$author = null;
	$comment = null;
	if (!empty($input['author']) && !empty($input['comment'])) {
		$author = $input['author'];
		$comment = $input['comment'];
	} else {
		die('Les données du formulaire sont invalides.');
	}

	$commentRepository = new CommentRepository();
	$commentRepository->connection = new DatabaseConnection();

	$success = $commentRepository->createComment($post, $author, $comment);
	if ($success === 0) {
		die('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=post&id=' . $post);
	}
}