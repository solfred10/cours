<?php
//on récupère les infos du formulaire
$destinataire=$_POST["destinataire"] ;
$sujet=$_POST["sujet"] ;
$nomExpediteur=$_POST["nom"]." ".$_POST["prenom"] ;
$expediteur=$_POST["expediteur"] ;
$message=$_POST["message"] ;

//on créé le header
$headers = 'From :"'.$nomExpediteur.'"<'.$destinataire.'>' ;
$headers.="\n";
$headers.='Reply-To: '.$expediteur;
$headers.="\n";
// $headers.='Content-type: text/html; charset=iso-8859-1"';
$headers.='Content-type: text/html; charset=UTF-8"';
$headers.="\n";
$headers.="Content-Transfert-Encoding: 8bit";

$corps = "" ; 
$corps .= "<html>" ;
$corps .= "<head>" ;
$corps .= "<title>" ;
$corps .= "test" ;
$corps .= "</title>" ;
$corps .= "</head>" ;
$corps .= "<body>" ;
$corps .= "aaa" ;
$corps .="\n";
$corps .= $message ;
$corps .= "</body>" ;
$corps .= "<html>" ;

if(mail($destinataire,$sujet,$corps,$headers)) {
	echo "message envoyé" ;
}
else {
	echo "erreur lors de l'envoie du message" ;
}
?>