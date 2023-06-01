<?php
//On charge le fichier du modèle qui contient l'ensemble des fonctions
require_once('src/model/post.php');

/*
Pour éviter d'avoir à ecrire $postRepository = new \Application\Model\Post\PostRepository(); lors d'une instanciation de classe
*/
use Application\Model\Post\PostRepository;

function homepage() {
    //On appelle la fonction getPosts récupère la liste des billets dans la variable $posts.
    $postRepository = new PostRepository(); 
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
	
    //On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
	require('templates/homepage.php');
}