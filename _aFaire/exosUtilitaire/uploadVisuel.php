<?php
$message = '';
$statut = '';

$fichier = '';
$fichierSource = basename($_FILES['file']['name']);
$extension = strrchr($fichierSource, '.');

$cheminRedim= 'images/visuelRedim/';
$autoriser = array('.png', '.jpg', '.jpeg');

if (in_array(strtolower($extension), $autoriser)) {
	
    $tmp = substr($fichierSource, 0, strrpos($fichierSource, '.'));
    $tmp = preg_replace('/[^A-Za-z1-9]/', '', $tmp);

    $fichier =  $tmp . $extension;
    $path = 'images/';
    $dest = $path . $fichier;
   

    // ENVOI DU FICHIER
    try 
	{
		$fichierUpload = $_FILES['file']['tmp_name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $dest);
        $statut = 'ok';
		
		//redimensionnement du fichier
		$taille=150;
		
		$fichierSansExtension=substr($fichier,0,strrpos($fichier,'.'));
		$fichierRedim=$fichierSansExtension.".jpg";
		
		$image = new Imagick();
		$image->setResolution( 72, 72 );

		$image->readimage($dest);

		$image->setIteratorIndex(0);
		$image->setImageCompressionQuality(90);
		$image->setImageFormat('jpg');

		$image->borderImage("#FFFFFF", 1, 1);
		$image->trimImage(0);
		
		$height=$image->getImageHeight();
		$width=$image->getImageWidth();
		
		if ($height < $width && $width>$taille)
		{
			$image->resizeImage($taille,0,imagick::FILTER_LANCZOS,1,0);
		}

		if ($height >= $width && $height>$taille)
		{
			$image->resizeImage(0,$taille,imagick::FILTER_LANCZOS,1,0);
		}

		
		
		$image->writeImage($cheminRedim.$fichierRedim);
	 
    } 
	catch (Exception $e) {        
        $statut = 'erreur';
        $message = ($_SESSION['J2Clangue'] == 'fr') ? "R�essayer" : 'Try again. ';
    }
} 
else {
    $statut = 'erreur';
    $message = ($_SESSION['J2Clangue'] == 'fr') ? "Image uniquement aux formats jpeg, png." : 'Picture only in format jpeg, png. ';
}

echo json_encode(array('statut' => $statut, 'fichierRedim' => $fichierRedim, 'fichierSource' => $fichierSource, 'message' => $message));
?>