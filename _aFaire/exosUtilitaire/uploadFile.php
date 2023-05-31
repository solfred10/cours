<HTML>
<BODY>
	
<?php
include("../variables.php") ;
include("../fonctions.php") ;
$dossier='photosAverifier/';

$idEvenement=$_REQUEST['idEvt'];
$numPhoto=$_REQUEST['numPhoto'];

$fichierSource=basename($_FILES['fileUpload']['name']);
		
$fileName=substr($fichierSource,0,strrpos($fichierSource,'.'));
$fileName=preg_replace('/[^a-zA-Z0-9_]/i','',$fileName);
$extension = strrchr($fichierSource, '.'); 
$fichier=substr($fileName,0,70).$extension;

/* on upload le fichier dans rep de upload */
$fichierUpload = $_FILES["fileUpload"]["tmp_name"] ;	
$fichier=utf8_decode($fichier) ;

if(!move_uploaded_file($fichierUpload , $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
	echo ifElse($_SESSION['J2Clangue']=='fr','Erreur lors de l\'envoi du fichier','Error during upload');
	return;
}

/* on crée la vignette dans rep visuelRedim*/
$taille=250;

$fileName=substr($fichier,0,strrpos($fichier,'.'));
$imageDest=$fileName.".png";

$image = new Imagick();
$image->setResolution( 72, 72 );

$image->readimage($sServerFullPath.$fichier);

$image->setIteratorIndex(0);
$image->setImageCompressionQuality(90);
$image->setImageFormat('png');

$image->borderImage("#FFFFFF", 1, 1);
$image->trimImage(0);

$height=$image->getImageHeight();
$width=$image->getImageWidth();

/*
if ($image->getImageColorspace() == Imagick::COLORSPACE_CMYK)
{
	$profiles = $image->getImageProfiles('*', false);
	$has_icc_profile = (array_search('icc', $profiles) !== false);
	if ($has_icc_profile === false)
	{
		$icc_cmyk = file_get_contents('D:\\Web\\J2C\\J2C\\WebServiceComExposium\\ICC\\USWebUncoated.icc');
		$image->profileImage('icc', $icc_cmyk);
		unset($icc_cmyk);
	}
	$icc_rgb = file_get_contents('D:\\Web\\J2C\\J2C\\WebServiceComExposium\\ICC\\sRGB_v4_ICC_preference.icc');
	$image->profileImage('icc', $icc_rgb);
	unset($icc_rgb);
}
*/
if ($height < $width && $width>$taille)
{
	$image->resizeImage($taille,0,imagick::FILTER_LANCZOS,1,0);
}

if ($height >= $width && $height>$taille)
{
	$image->resizeImage(0,$taille,imagick::FILTER_LANCZOS,1,0);
}

try
{
	$image->writeImage('photoAverifier\\visuelRedim\\'.$imageDest);
	$requete = "INSERT INTO photos VALUES (".$idEvenement.",'".$fichier."')" ;
	$resultat = mysql_query($requete) ;
}

catch (Exception $e)
{
	if ($sDebug=='1')
	 echo "<font color=red>Sauvegarde de l'image ".$imageFile." Echec<br>" .$e."</font><br>";
  
	return('-1');
}

$image->clear();
$image->destroy();

?>
<script>	
	retourUpload('<?=$imageDest?>','<?=$numPhoto?>');
</script>