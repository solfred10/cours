<?php
require('../../../PHPMailer-5.2.26/class.phpmailer.php'); 
 
 //on récupère les infos du formulaire
$destinataire=$_POST["destinataire"] ;
$sujet=$_POST["sujet"] ;
$nomExpediteur=$_POST["nom"]." ".$_POST["prenom"] ;
$expediteur=$_POST["expediteur"] ;
$message=$_POST["message"] ; 
$pieceJointe="envoiEmailPHP.pdf";	
 
//paramètre 
$mail = new PHPMailer();
$mail->Host = 'smtp.esbrunoyhandball-essonne.fr';
$mail->Port = 25; // Par défaut
$mail->CharSet = 'UTF-8';  
 
//Authentification
$mail->SMTPAuth   = true;
$mail->Username = "esbru145@esbrunoyhandball-essonne.fr";
$mail->Password = "abalo10051984";
 
//Expéditeur
$mail->SetFrom($expediteur, $nomExpediteur);
//Destinataire
$mail->AddAddress($destinataire);
//destinataire en copie 
$mail->AddCC('sol.fred1005@gmail.com');
//destinataire en copie caché
$mail->AddBCC('sol.fred@free.fr');
//Objet
$mail->Subject = $sujet;
//Message
$mail->MsgHTML($message);
//Pièce jointe
$mail->AddAttachment($pieceJointe);    
 
// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
  echo 'Erreur : ' . $mail->ErrorInfo;
} 
else {
  echo '2e Message envoyé !';
}  
?>

