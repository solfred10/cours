<?

//$fichier = $_REQUEST["nomFichier"] ;


/*
for ($i=4;$i<count($listeDossier);$i++) {
	$repertoire = $listeDossier[$i] ;
	$cheminFichier  = $repertoire."/".$fichier ;
	if(file_exists($cheminFichier)) {
		echo  "<b>".$cheminFichier." OK</b><br>" ;
	}
	ELSE {
		echo  $cheminFichier." pas là<br>" ;
	}
	
}
*/	
/*
function chercherFichier($repertoireActuel,$fichier) {

	$cheminFichier  = $repertoireActuel."/".$fichier ;
	if (file_exists($cheminFichier)) {
		echo "<b>".$cheminFichier." OK</b><br>" ;
		exit ; 
	}
	
	else {
		$dossier = "" ;
		$listeDossier = "" ;
		$listeDossier = scandir($repertoireActuel); //liste des dossiers du docciers courant 
		for ($i=0;$i<count($listeDossier);$i++) { 
			$dossier = $listeDossier[$i] ;			
			//echo "repertoire : ".$i." - ".$dossier."<br>" ;
			if(is_dir($dossier)) {
				if($dossier != "." and $dossier != ".."  ) {
					if(file_exists($dossier."/".$fichier)) {
						echo "<b>".$cheminFichier."</b><br>" ;
						exit ; 
					}
					else {
						chercherFichier($dossier,$fichier) ;		
					}					
				}
			}		
		}		
	}
	
}
*/

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