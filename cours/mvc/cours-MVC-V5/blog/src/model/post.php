<?php

require_once('src/lib/database.php');

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
}

/*
function getPosts() {
	// We connect to the database.
	try {
    	$database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}

	// We retrieve the 5 last blog posts.
	$statement = $database->query(
    	"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
	);
	$posts = [];
	while (($row = $statement->fetch())) {
		$post = new Post();   
		$post->title = $row['title'];
    	$post->frenchCreationDate = $row['creation_date'];
        $post->content = $row['content'];
		$post->identifier = $row['id'];

    	$posts[] = $post;
	}

	return $posts;
}
*/

/*
function getPost($identifier) {
    $database = dbConnect();
 
    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    );
    $statement->execute([$identifier]);
 
    $row = $statement->fetch();
	$post = new Post();  
    $post->title = $row['title'];
    $post->frenchCreationDate = $row['french_creation_date'];
    $post->content = $row['content'];
    $post->identifier = $row['id'];
     
    return $post;
}
*/

class PostRepository
{
	public DatabaseConnection $connection;

	public function getPost(string $identifier): Post
	{    	
    	$statement = $this->connection->getConnection()->prepare(
        	"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    	);
    	$statement->execute([$identifier]);

    	$row = $statement->fetch();
    	$post = new Post();
    	$post->title = $row['title'];
    	$post->frenchCreationDate = $row['french_creation_date'];
    	$post->content = $row['content'];
    	$post->identifier = $row['id'];

    	return $post;
	}

	public function getPosts()
	{    	    
		$statement = $this->connection->getConnection()->query(
			"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
		);
		$posts = [];
		while (($row = $statement->fetch())) {
			$post = new Post();   
			$post->title = $row['title'];
			$post->frenchCreationDate = $row['creation_date'];
			$post->content = $row['content'];
			$post->identifier = $row['id'];
	
			$posts[] = $post;
		}
	
		return $posts;
	}	
}
 /*
function dbConnect()
{
	try {
    	$database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');

    	return $database;
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
}
*/
/*
function dbConnect()
{
	if ($repository->database === null) {
    	$repository->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'password');
	}
}
*/