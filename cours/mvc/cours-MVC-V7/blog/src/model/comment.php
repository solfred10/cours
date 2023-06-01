<?php

namespace Application\Model\Comment;

require_once('src/lib/database.php');

class Comment
{
	public string $idComment;
	public string $idPost;    
	public string $author;
    public string $comment;
	public string $frenchCreationDate;
}

class CommentRepository {

	public \DatabaseConnection $connection ;
	
	public function getComments(string $post)	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
		);
		$statement->execute([$post]);
	
		$comments = [];
		while (($row = $statement->fetch())) {
			
			$comment  = new Comment();
			$comment->idComment = $row['id'];
			$comment ->author = $row['author'];
			$comment->frenchCreationDate = $row['french_creation_date'];
			$comment->comment = $row['comment'];
				
			$comments[] = $comment;
		}	
		return $comments;
	}

	public function getComment($identifier) {
		$statement=$this->connection->getConnection()->prepare("SELECT id, post_id, author, comment FROM comments WHERE id = ? ") ;
		$statement->execute([$identifier]);
		$row = $statement->fetch() ;
		$comment  = new Comment();		
		$comment ->idComment = $row['id'];		
		$comment ->idPost = $row['post_id'];		
		$comment ->author = $row['author'];		
		$comment->comment = $row['comment'];
		return $comment;
	}
	
	public function createComment($identifier,$author,$comment) {
		$statement = $this->connection->getConnection()->prepare("INSERT INTO comments (post_id,author,comment, comment_date) VALUES (?,?,?, NOW())");
		$affectedLines = $statement->execute([$identifier,$author,$comment]);
	
		return $affectedLines ;
	}

	public function updateComment($identifier,$author,$comment) {
		$statement = $this->connection->getConnection()->prepare("UPDATE comments set author=?, comment=?, comment_date=NOW() WHERE id=?");
		$affectedLines = $statement->execute([$author,$comment,$identifier]);
	
		return $affectedLines ;
	}
}