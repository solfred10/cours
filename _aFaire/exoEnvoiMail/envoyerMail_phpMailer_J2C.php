<?php

ob_start();

//on récupère les infos du formaulaire
$destinataire=$_POST["destinataire"] ;
$sujet=$_POST["sujet"] ;
$nomExpediteur=$_POST["nom"]." ".$_POST["prenom"] ;
$expediteur=$_POST["expediteur"] ;
$message=$_POST["message"] ;
$emailCopie="" ;
$mailUserName="esbru145" ;
$mailUserPsw="abalo10051984" ;

require_once('../../../PHPMailer-5.2.26/class.phpmailer.php'); //utilisé pour envoyer un email rapport à la fin du traitement

$mail = new PHPMailer(true) or die ('erreur class phpMailer'); // the true param means it will throw exceptions on errors, which we need to catch
	
 

try{
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host = "86.65.11.26"; 
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls"; 
	$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	$mail->Username   = $mailUserName; // SMTP account username
	$mail->Password   =$mailUserPsw;        // SMTP account password
	$mail->AddReplyTo($expediteur, $expediteur);
	$mail->SetFrom($expediteur, $expediteur);
	$mail->AddAddress($destinataire);
	// $mail->AddBCC($emailCopie);	
	$mail->Encoding = "base64";
	$mail->Encoding = 'quoted-printable'; 
		
	$mail->Subject = "test envoie d'un email par Frédéric";
	$pieceJointe="envoiEmailPHP.pdf";	
	
	//coprs du message
	$corpsMail='';
	$corpsMail.=  "<html>";
	$corpsMail.="<head>";
	$corpsMail.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" >";
	$corpsMail.=  "</head>";
	$corpsMail.=  "<body style=\"font-family:arial; font-size:10pt;\">";
	// $corpsMail.=  "<img src='header.png'>";
	// $corpsMail.= $mail->addEmbeddedImage('bandeau.png','bandeau','bandeau.png');
	// $corpsMail.=  "<img src='cid:bandeau'>";
	$corpsMail.=  "<br><br>";

	$corpsMail.= "test";
	$corpsMail.= "<br><br>";
		
	$corpsMail.= "</body>";"
	$corpsMail.= </HTML>";
	
	$mail->IsHTML(true);
	$mail->MsgHTML($corpsMail);
	// $mail->AddAttachment($cheminPDF);     
	$mail->Send();
	echo ('0');
}
catch (phpmailerException $e)
{
	echo ('2');
	echo $e->errorMessage(); //Pretty error messages from PHPMailer
}
catch (Exception $e)
{
	echo ('1');	
}

$mail->ClearAddresses();
$mail->ClearAttachment();
unset($mail);

?>




