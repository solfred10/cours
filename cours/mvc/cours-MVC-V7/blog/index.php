<?php

require_once('src/controllers/addComment.php');
require_once('src/controllers/modifyComment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {
    	if ($_GET['action'] === 'post') {
        	if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            	$identifier = $_GET['idComment'];

            	post($identifier);
        	} 
			else {
            	throw new Exception('Aucun identifiant de billet envoyé');
        	}
    	} 
		elseif ($_GET['action'] === 'addComment') {
        	if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            	$identifier = $_GET['idComment'];

            	addComment($identifier, $_POST);
        	} 
			else {
            	throw new Exception('Aucun identifiant de billet envoyé');
        	}
    	}
		elseif ($_GET['action'] === 'showComment') {
        	if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            	$identifier = $_GET['idComment'];

            	comment($identifier);
        	} 
			else {
            	throw new Exception('Aucun identifiant de billet envoyé');
        	}
    	} 
		elseif ($_GET['action'] === 'modifyComment') {
        	if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            	$identifier = $_GET['idComment'];

            	modifyComment($identifier,$_POST);
        	} 
			else {
            	echo "idcomment : ".$_GET['idComment'] ;
				//throw new Exception('Aucun identifiant de billet envoyé 2');
        	}
    	} 
		else {
        	throw new Exception("La page que vous recherchez n'existe pas.");
    	}
	} 
	else {
    	homepage();
	}
} catch (Exception $e) { // S'il y a eu une erreur, alors...
	echo 'Erreur : '.$e->getMessage();
}