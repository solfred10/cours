<?php
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" media="screen" href="exos/exosCSS/style23.css" />
	<style>
		
	
	</style>
	
	<?php
	
	require 'lessc.inc.php';

	try {
		 lessc::ccompile('exos/exosCSS/style.less', 'exos/exosCSS/style23.css');
	} catch (exception $ex) {
		 exit('lessc fatal error:
		 '.$ex->getMessage());
	}
	
	?>
	
</head>

<body>
	<!--<img class="cadre" src="images/moncadre.png">-->
	<br><br>
	
	<div class="divBleu">div bleu</div>
	<br><br>
	
	<div class="divRouge"><span class="red">div rouge</span></div>
	<div class="divVerte">div verte</div>
</body>

</html>