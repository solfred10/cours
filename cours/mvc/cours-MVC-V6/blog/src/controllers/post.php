<?php
 
require_once('src/model/post.php');
require_once('src/model/comment.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;

function post($identifier) {   
    //$postRepository = new PostRepository();
    //Instanciation de la classe avec le name space
    $postRepository = new PostRepository(); 
    $postRepository->connection = new DatabaseConnection();
    $post = $postRepository->getPost($identifier);

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $comments = $commentRepository->getComments($identifier);
    
    require('templates/post.php');
}