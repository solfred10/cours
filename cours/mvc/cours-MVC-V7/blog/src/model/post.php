<?php
/*on déclare un name space
Cela a un impact : les noms complets de toutes les classes et fonctions déclarées dans ce fichier sont désormais différents ! Ils sont le résultat de la concaténation de l'espace de nom avec leur nom interne.
Tous les fichiers qui font appel aux classes de ce fichier doivent maintenant ajouter le namespace en préfixe.
*/
namespace Application\Model\Post;

require_once('src/lib/database.php');

class Post
{
    public string $identifier;
	public string $title;
    public string $content;
	public string $frenchCreationDate; 
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
	/*on met un \ devant DatabaseConnection car sinon on irai cherchait cette classe au même niveau d'arobrescence de ce fichier
	C'est l'équivalent d'un ./ en HTML
	*/
	public \DatabaseConnection $connection;

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