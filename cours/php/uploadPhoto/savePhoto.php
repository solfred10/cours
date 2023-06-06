<?php
$message = '';
$statut = '';
$fichier = '';
$fichierSource = basename($_FILES['file']['name']);
$extension = strrchr($fichierSource, '.');
$cheminRedim= 'upload/visuelRedim/';
$autoriser = array('.png', '.jpg', '.jpeg');
$fichierRedim = "fichierRedim" ;

if (in_array(strtolower($extension), $autoriser)) {
	
    $tmp = substr($fichierSource, 0, strrpos($fichierSource, '.'));
    $tmp = preg_replace('/[ ]/', '-', $tmp);

    $fichier =  $tmp . $extension;
    $path = 'upload/';
    $dest = $path . $fichier;
   

    // ENVOI DU FICHIER
    try 
	{
		$fichierUpload = $_FILES['file']['tmp_name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $dest);
        $statut = 'ok';

		/*
		
		
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
			 */
    } 
	catch (Exception $e) {        
        $statut = 'erreur';
        $message = "Réessayer";
    }
} 
else {
    $statut = 'erreur';
    $message = "Image uniquement aux formats jpeg, png.";
}

echo json_encode(array('statut' => $statut, 'fichierRedim' => $fichierRedim, 'fichierSource' => $fichier, 'message' => $message));
?>