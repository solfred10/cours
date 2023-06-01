<?php
//On charge le fichier du modèle qui contient l'ensemble des fonctions
require_once('src/model/post.php');

function homepage() {
    //On appelle la fonction getPosts récupère la liste des billets dans la variable $posts.
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
	
    //On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
	require('templates/homepage.php');
}