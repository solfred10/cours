<?php
//On charge le fichier du modèle. Il ne se passe rien pour l'instant, parce qu'il ne contient qu'une fonction.
require('src/model.php');

//On appelle la fonction, ce qui exécute le code à l'intérieur desrc/model.php. On y récupère la liste des billets dans la variable$posts.
$posts = getPosts();

//On charge le fichier de la vue (l'affichage), qui va présenter les informations dans une page HTML.
require('templates/homepage.php');