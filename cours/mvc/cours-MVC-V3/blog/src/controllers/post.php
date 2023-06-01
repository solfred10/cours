<?php
error_reporting(E_ALL); ini_set("display_errors", 1); 
 
require_once('src/model.php');

function post($identifier) {   
    $post = getPost($identifier);
    $comments = getComments($identifier);
    
    require('templates/post.php');
}
?>