<?php

class Comment {
    public string $author ;
    public string $frenchCreationDate;
    public string $comment ;
}



function commentDbConnect()
{
	try {
    	$database = new PDO('mysql:host=fred-sol.fr;dbname=lqja1143_blogMVC;charset=utf8', 'lqja1143_solfred10', 'Matthieu29112007.');

    	return $database;
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
}

function createComment($identifier,$author,$comment) {
    $database = commentDbConnect();
	$statement = $database->prepare("INSERT INTO comments (post_id,author,comment, comment_date) VALUES (?,?,?, NOW())");
	$affectedLines = $statement->execute([$identifier,$author,$comment]);

    return $affectedLines ;
}

function createComment2($comment) {
    $database = commentDbConnect();
	$statement = $database->prepare("INSERT INTO comments (post_id,author,comment, comment_date) VALUES (?,?,?, NOW())");
	$affectedLines = $statement->execute([$identifier,$comment->author,$comment-comment]);

    return $affectedLines ;
}

function getComments(string $post)
{
	$database = commentDbConnect();
	$statement = $database->prepare(
    	"SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
	);
	$statement->execute([$post]);

	$comments = [];
	//Dans notre bouclewhile, pour chaque ligne de résultat SQL, on a instancié un nouvel objet de typeComment. Enfin, on a renseigné la valeur de chacune des propriétés.
	while (($row = $statement->fetch())) {
    		$comment = new Comment();
        	$comment->author = $row['author'];
        	$comment->frenchCreationDate = $row['french_creation_date'];
        	$comment->comment = $row['comment'];
    		$comments[] = $comment;	
		}

	return $comments;
}

?>