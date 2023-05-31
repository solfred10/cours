<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>	
	<script type="text/javascript" src="js/fonctionsJavaScript.js"></script>
	<link href="images/faveicon.png" rel="shortcut icon" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>NOM DU SITE</title>	
</head>

<body onload="initFonction();">

<!-- On pose une div qui va contenir les différents éléments de la page -->
<div class="divPrincipale" >
	
	<!-- bandeau -->
	<div class="divBandeau" id="divBandeau" >	
		&nbsp;
	</div>	

	<!-- menu -->
	<?php 
	include("menu.php");						
	?>	
				
	<!-- corps du document -->
	<div class="divPage" id="divPage">
		<?php
		if(empty($_REQUEST['page'])) 
		{
			include("pages/accueil.php");						
		}
		else
		{				
			include("pages/".$_REQUEST['page'].".php");
		}
		?>
	</div>	
		
	<div class="divFooter">
		NOM DU SITE - Tous droits réservés
	</div>
</div>

</body>
</html>                           