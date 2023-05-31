<script>
	function rempliChampRecherche(id,valeur,sens)
{						
	//valeur = "'"+valeur+"'" ;
	valeurOld=document.getElementById(id).value;						
	if (sens==true)
	{
		if(valeurOld!='')
			valeurOld='$'+valeurOld;
		document.getElementById(id).value=valeur+valeurOld;			
	}
	else
	{						
		valeurOld=valeurOld.replace('$'+valeur,'');
		valeurOld=valeurOld.replace(valeur+'$','');
		valeurOld=valeurOld.replace(valeur,'');
		document.getElementById(id).value=valeurOld;
	}	
}
</script>

<?
if(isset($_POST["listeIdPhoto"]))
{
	$listeIdPhoto = $_POST["listeIdPhoto"] ;
	$listeIdPhoto = str_replace("$",",",$listeIdPhoto) ;
	$query = "UPDATE photo SET publie=1 WHERE id_conf IN  (".$listeIdPhoto.") " ;
	$rs=sqlsrv_query($conn,$query,$params,$options);	
}
?>

<form action="verifPhoto.php" method="POST">
<?

$requete = "SELECT idPhoto,photo,dateEvenement,categorie,nomEvenement FROM photo as P,evenement as E WHERE P.idEvenement = E.evenement AND P.publie=0" ;
$resultat = mysql_query($requete) ;
if(mysql_has_rows($resultat) == 1)
{
	while($tab = mysql_fetch_array($resultat))
	{
		$idPhoto = $tab["idPhoto"] ;
		$photo = $tab["photo"] ;		
		$dateEvenement = $tab["dateEvenement"] ;		
		$categorie = $tab["categorie"] ;		
		$nomEvenement = $tab["nomEvenement"] ;		
	?>
		<div style="width:300px;height:300px;float:left">
			<img src="photoAverifier/<?=$photo?>">
			<br />
			<?=$dateEvenement?> : <?=$nomEvenement?> - <?=$categorie?> 
			<br />
			<input type="button" onclick="rempliChampRecherche('listeIdPhoto','<?=$id_conf?>',this.checked);">
		</div>
	<?
	}
}
?>
<input type="text" name="listeIdPhoto" id="listeIdPhoto" >
<input type="submit" value="Valider les photos">