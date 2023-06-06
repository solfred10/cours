<?php
function chercherFichier($repertoireActuel,$fichier,$nbElement) {	
	if($nbElement==1) {
		if(is_dir($repertoireActuel)) {
			if(file_exists($repertoireActuel."/".$fichier)) {
				echo $repertoireActuel ;
			}
			else {
				if($repertoireActuel==$fichier) {
					echo $repertoireActuel ;
				}
			}
		}
	}
	else {
		$listeDossier = scandir($repertoireActuel); //liste des dossiers du docciers courant 
		$nbElement = count($listeDossier) ;		
		for ($i=0;$i<$nbElement;$i++) {
			chercherFichier($listeDossier[$i],$fichier,$nbElement) ;	
		}		
	}
}

$fichierAtrouver ="testFichier.php" ;
$repertoire = getcwd() ;
$listeDossier = scandir($repertoire);
$nbElement = count($listeDossier) ;
$cheminAffiche = "chemin : ". chercherFichier($repertoire,$fichierAtrouver,$nbElement) ;
echo $cheminAffiche ;
?>