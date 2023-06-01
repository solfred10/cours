<?php

function getPosts() {
	// We connect to the database.
	try {
    	$database = new PDO('mysql:host=fred-sol.fr;dbname=lqja1143_blogMVC;charset=utf8', 'lqja1143_solfred10', 'Matthieu29112007.');
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}

	// We retrieve the 5 last blog posts.
	$statement = $database->query(
    	"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
	);
	$posts = [];
	while (($row = $statement->fetch())) {
    	$post = [
        	'title' => $row['title'],
        	'french_creation_date' => $row['creation_date'],
        	'content' => $row['content'],
    	];

    	$posts[] = $post;
	}

	return $posts;
}
