<?php
if(isset($_REQUEST["page"]))
{
	$menuActif = $_REQUEST["page"] ;
}
else
{
	$menuActif = "accueil" ;
}	

?>
<div class="divMenu">
	<div class="itemMenu" id="accueil">Accueil</div>
	<div class="itemMenu" id="page1">Page1</div>
	<div class="itemMenu" id="page2">Page2</div>
	<div class="itemDernierMenu">
	<?php
		echo "<input type='hidden' name='menuActif' id='menuActif' value='".$menuActif."'>";
	?>	
	</div>
</div>