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
			'identifier' => $row['id'],
    	];

    	$posts[] = $post;
	}

	return $posts;
}

function getPost($identifier) {
    $database = dbConnect();
 
    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    );
    $statement->execute([$identifier]);
 
    $row = $statement->fetch();
    $post = [
        'title' => $row['title'],
        'french_creation_date' => $row['french_creation_date'],
        'content' => $row['content'],
    ];
 
    return $post;
}

function getComments($identifier) {
	$database = dbConnect();

	$statement = $database->prepare(  "SELECT id, author, comment, /*DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date*/ comment_date as french_creation_date  FROM comments WHERE post_id = ? ORDER BY comment_date DESC") 
	$statement->execute([$identifier]) ;
	
	$comments = [] ;
	
	while ($row = $statement->fetch()) {
		$comment = [
			'author' => $row['author'] ,
			'french_creation_date' => $row['french_creation_date'],
			'comment' => $row['comment'] ,
		] ;
		$comments[] = $comment ;
	}
	return $comments ; 	
}

function dbConnect()
{
	try {
    	$database = new PDO('mysql:host=fred-sol.fr;dbname=lqja1143_blogMVC;charset=utf8', 'lqja1143_solfred10', 'Matthieu29112007.');

    	return $database;
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
}
