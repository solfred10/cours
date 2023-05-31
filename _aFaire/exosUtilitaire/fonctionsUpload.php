<?php 

function creationUpload($typeUpload, $extension, $cacheCheckbox)
{
	global $conn, $prefixeTable, $sFR_EuroHT, $sGB_EuroHT;

	$retour="";

	/* on récupère le libelle et le prix de l'item pub appelé */
	$queryPub="select libelle".ifElse($_SESSION['J2Clangue']=='fr','','_gb')." as libelle, prix from ".$prefixeTable."_pub_nomenc where valide=1 and code='".$typeUpload."'";	
	$rsPub=sqlsrv_query($conn, $queryPub);
	$tabPub=sqlsrv_fetch_array($rsPub);
	$libelle=$tabPub['libelle'];
	$prix=$tabPub['prix'];

	/* requete pour tester si déjà commandé pour les différents type d'upload */
	if($typeUpload=='logo_alpha' || $typeUpload=='logo')
	{
	
	}
	$queryPub="select fichier,type from ".$prefixeTable."_commande_ca where cle1_cle2='".$_SESSION['J2CidSociete']."' and code='".$typeUpload."'";

	$rsPub=sqlsrv_query($conn, $queryPub);
	$tabPub=sqlsrv_fetch_array($rsPub);

	/* variables par défaut */
	$fichier='';
	$checked="";
	$displayDivCapsule="none";
	$displayIMG="none";
	$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Aucun fichier','No file');
	$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Transmettre votre visuel','Upload your file');
	$displayBtnSupp='boutonDisabled';

	/* si item déjà choisi, on récupère nom du fichier et on parametre variables pour affichage */
	if(sqlsrv_has_rows($rsPub)!=0)
	{
		$fichier=$tabPub['fichier'];
		$checked=' checked ';
		$displayDivCapsule="block";
	}

	/* affichage checkbox , libelle et prix */
	if($cacheCheckbox!='1')
	{
		$disabled = ($tabPub['type']=='contact') ? ' disabled ':'';

		//$retour.="<input type='checkbox' ".$checked." id='".$typeUpload."' name='".$typeUpload."' ".$disabled." table='commande_ca' attributForm='sauve' value='1' onClick=\"document.getElementById('divCapsuleUpload-".$typeUpload."').style.display=(this.checked==true) ? 'block':'none';\"> <label for='".$typeUpload."'>".$libelle."</label>".ifElse($_SESSION['J2Clangue']=='fr',' ','').": <font class='prix'>".$prix.ifElse($_SESSION['J2Clangue']=='fr',$sFR_EuroHT,$sGB_EuroHT)."</font>";
		$retour.="<input type='checkbox' ".$checked." id='".$typeUpload."' name='".$typeUpload."' ".$disabled." table='commande_ca' attributForm='sauve' value='1' onClick=\"document.getElementById('divCapsuleUpload-".$typeUpload."').style.display=(this.checked==true) ? 'block':'none'; CheckIncompatibleOption(this.id);\"> <label for='".$typeUpload."'>".$libelle."</label>".ifElse($_SESSION['J2Clangue']=='fr',' ','').": <font class='prix'>".$prix.ifElse($_SESSION['J2Clangue']=='fr',$sFR_EuroHT,$sGB_EuroHT)."</font>";
	}

	/* ouverture div upload */
	$retour.="<div id='divCapsuleUpload-".$typeUpload."' style='background-color:#FFFFFF;position:relative;margin-top:10px;display:".$displayDivCapsule.";'>
				<b>".ifElse($_SESSION['J2Clangue']=='fr','Votre visuel','Your file')."</b><br><br>";	

				/* si fichier existant, on parametre les variables pour affichage du visuel redim */
				if($fichier!='')
				{					
					$fichierPNG=substr($fichier,0,strrpos($fichier,'.')).".png";
					$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Votre fichier ','Your file').": ".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier);
					$sourceFichierPNG="../../upload/".$prefixeTable."_photo/visuelRedim/".$fichierPNG;
					$displayIMG='block';
					$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Modifier votre visuel','Modify your file');
					$displayBtnSupp='bouton';
				}

				/* affichage du nom du fichier existant*/
				$retour.="<span id='nomFichier-".$typeUpload."'>".$libFichier."</span><br><br>";

				/* affichage de l'image existante au format redim png */
				$retour.="	<center>
								<img id='imgUpload-".$typeUpload."' src=\"../../upload/".$prefixeTable."_photo/visuelRedim/".$fichierPNG."\"  style='display:".$displayIMG."'>
							</center>";	

				/* bouton pour ouvrir upload */
				$retour.="	<br><center>
									<div style='border:0px solid red; text-align:center;position:relative;width:400px;height:30px;background-color:#FFFFFF;' id='divBtnControleUpload-".$typeUpload."'>
										<input type='button' class='bouton' id='btnUpload-".$typeUpload."' value='".$libBoutonAdd."' onClick=\"afficheUpload('".$typeUpload."');\" style='float:left;'>
										&nbsp;&nbsp;&nbsp;
										<input type='button' class='bouton' id='btnUploadSupp-".$typeUpload."' value='".ifElse($_SESSION['J2Clangue']=='fr','Supprimer le visuel','Remove the file')."' onClick=\"supprimeVisuel('".$typeUpload."','".$extension."');\" style='float:right' class='".$displayBtnSupp."'>
									</div>
								</center>";

				/* iframe pour formulaire upload */
				$retour.="<iframe id='divUpload-".$typeUpload."' frameborder='0' style='width:100%;height:110px;display:none;background-color:#FFFFFF;border:0px solid yellow' src='uploadForm.php?fichierSource=".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier)."&fichier=".$fichier."&extension=".$extension."&typeUpload=".$typeUpload."'></iframe>";

				/* div avec l'ajax-loader pour faire patienter */	
				$retour.="<div style='color:#CD0B0B;font-weight:bold;width:98%;height:80px;position:absolute;bottom:0px;display:none;background-color:#ffffff;border:0px solid red;' id='divLoader-".$typeUpload."'><i>".ifElse($_SESSION['J2Clangue']=='fr','Transfert du fichier...','File uploading...')."</i><br><br><img src='../images/ajax-loader.gif'></div>";

	/* fermeture div upload */
	$retour.="</div>";

	/* champ hidden pour récupérer le nom du fichier uploadé et l'enregistrer */
	$retour.="<input type='hidden' table='commande_ca' attributForm='sauve' name='fichierUpload-".$typeUpload."' id='fichierUpload-".$typeUpload."' value='".$fichier."'>";


	return $retour;
}

function creationUploadCodeProd($extension)
{
	$typeUpload='logo_code_produit';
	global $conn, $prefixeTable, $sFR_EuroHT, $sGB_EuroHT;

	$retour="";

	/* on récupère le libelle et le prix de l'item pub appelé */
	$queryPub="select libelle".ifElse($_SESSION['J2Clangue']=='fr','','_gb')." as libelle, prix from ".$prefixeTable."_pub_nomenc where valide=1 and code='".$typeUpload."'";	
	$rsPub=sqlsrv_query($conn, $queryPub);
	$tabPub=sqlsrv_fetch_array($rsPub);
	$libelle=$tabPub['libelle'];
	$prix=$tabPub['prix'];

	/* requete pour tester si déjà commandé pour les différents type d'upload */
	if($typeUpload=='logo_code_produit' || $typeUpload=='vignette_code_produit')
	{
		$queryPub="select logo_vign as fichier from ".$prefixeTable."_prod where cle1_cle2='".$_SESSION['J2CidSociete']."' and type_pub in ('".$typeUpload."')";
	}


	$rsPub=sqlsrv_query($conn, $queryPub);
	$tabPub=sqlsrv_fetch_array($rsPub);

	/* variables par défaut */
	$fichier='';
	$checked="";
	$displayDivCapsule="none";
	$displayIMG="none";
	$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Aucun fichier','No file');
	$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Transmettre votre visuel','Upload your file');
	$displayBtnSupp='boutonDisabled';

	/* si item déjà choisi, on récupère nom du fichier et on parametre variables pour affichage */
	if(sqlsrv_has_rows($rsPub)!=0)
	{
		$fichier=$tabPub['fichier'];
		$checked=' checked ';
		$displayDivCapsule="block";
	}


	/* ouverture div upload */

	$retour.="<div id='divCapsuleUpload-".$typeUpload."' style='position:relative;margin-bottom:50pt;margin-top:10px;display:".$displayDivCapsule.";'>
				<b>".ifElse($_SESSION['J2Clangue']=='fr','Votre visuel','Your file')."</b><br><br>";	

				/* si fichier existant, on parametre les variables pour affichage du visuel redim */
				if($fichier!='')
				{					
					$fichierPNG=substr($fichier,0,strrpos($fichier,'.')).".png";
					$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Votre fichier ','Your file').": ".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier);
					$sourceFichierPNG="../../upload/".$prefixeTable."_photo/visuelRedim/".$fichierPNG;
					$displayIMG='block';
					$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Modifier votre visuel','Modify your file');
					$displayBtnSupp='bouton';
				}

				/* affichage du nom du fichier existant*/
				$retour.="<span id='nomFichier-".$typeUpload."'>".$libFichier."</span><br><br>";

				/* affichage de l'image existante au format redim png */
				$retour.="	<center>
								<img id='imgUpload-".$typeUpload."' src=\"../../upload/".$prefixeTable."_photo/visuelRedim/".$fichierPNG."\" style='display:".$displayIMG."'>
							</center>";	

				/* bouton pour ouvrir upload */
				$retour.="	<br><center>
									<div style='text-align:center;position:relative;width:400px;height:30px;' id='divBtnControleUpload-".$typeUpload."'>
										<input type='button' class='bouton' id='btnUpload-".$typeUpload."' value='".$libBoutonAdd."' onClick=\"afficheUpload('".$typeUpload."');\" style='float:left;'>
										&nbsp;&nbsp;&nbsp;
										<input type='button' class='bouton' id='btnUploadSupp-".$typeUpload."' value='".ifElse($_SESSION['J2Clangue']=='fr','Supprimer le visuel','Remove the file')."' onClick=\"supprimeVisuel('".$typeUpload."','".$extension."');\" style='float:right' class='".$displayBtnSupp."'>
									</div>
								</center>";

				/* iframe pour formulaire upload */
				$retour.="<iframe id='divUpload-".$typeUpload."' frameborder='0' style='width:100%;height:110px;display:none;background-color:#ffffff;' src='uploadForm.php?fichierSource=".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier)."&fichier=".$fichier."&extension=".$extension."&typeUpload=".$typeUpload."'></iframe>";

				/* div avec l'ajax-loader pour faire patienter */	
				$retour.="<div style='color:#CD0B0B;font-weight:bold;width:98%;height:80px;position:absolute;bottom:0px;display:none;background-color:#ffffff;border:0px solid red;' id='divLoader-".$typeUpload."'><i>".ifElse($_SESSION['J2Clangue']=='fr','Transfert du fichier...','File uploading...')."</i><br><br><img src='../images/ajax-loader.gif'></div>";

	/* fermeture div upload */
	$retour.="</div>";

	/* champ hidden pour récupérer le nom du fichier uploadé et l'enregistrer */
	$retour.="<input type='hidden' table='commande_ca' attributForm='sauve' name='fichierUpload-".$typeUpload."' id='fichierUpload-".$typeUpload."' value='".$fichier."'>";


	return $retour;
}	


function creationUploadProduitNouveau($id,$fichier,$extension)
{
	$typeUpload='newProd-'.$id;
	global $conn, $prefixeTable, $sFR_EuroHT, $sGB_EuroHT;

	$retour="";

	/* variables par défaut */
	$checked="";
	$displayDivCapsule="block";
	$displayIMG="none";
	$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Aucun fichier','No file');
	$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Transmettre votre visuel','Upload your file');
	$displayBtnSupp='boutonDisabled';

	/* ouverture div upload */
	$retour.="<div id='divCapsuleUpload-".$typeUpload."' style='position:relative;margin-bottom:50pt;margin-top:10px;display:".$displayDivCapsule.";'>
				<b>".ifElse($_SESSION['J2Clangue']=='fr','Votre visuel','Your file')."</b><br><br>";	

		/* si fichier existant, on parametre les variables pour affichage du visuel redim */
		if($fichier!='')
		{					
			$fichierPNG=substr($fichier,0,strrpos($fichier,'.')).".png";
			$libFichier=ifElse($_SESSION['J2Clangue']=='fr','Votre fichier ','Your file').": ".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier);
			$sourceFichierPNG="../../upload/".$prefixeTable."_photo/visuelRedim/".$fichierPNG;
			$displayIMG='block';
			$libBoutonAdd=ifElse($_SESSION['J2Clangue']=='fr','Modifier votre visuel','Modify your file');
			$displayBtnSupp='bouton';
		}

		/* affichage du nom du fichier existant*/
		$retour.="<span id='nomFichier-".$typeUpload."'>".$libFichier."</span><br><br>";

		/* affichage de l'image existante au format redim png */
		$retour.="	<center>
						<img id='imgUpload-".$typeUpload."' src='".$sourceFichierPNG."' style='display:".$displayIMG."'>
					</center>";	

		/* bouton pour ouvrir upload */
		$retour.="	<br><center>
							<div style='text-align:center;position:relative;width:400px;height:30px;background-color:#FFFFFF' id='divBtnControleUpload-".$typeUpload."'>
								<input type='button' class='bouton' id='btnUpload-".$typeUpload."' value='".$libBoutonAdd."' onClick=\"afficheUpload('".$typeUpload."');\" style='float:left;'>
								&nbsp;&nbsp;&nbsp;
								<input type='button' class='bouton' id='btnUploadSupp-".$typeUpload."' value='".ifElse($_SESSION['J2Clangue']=='fr','Supprimer le visuel','Remove the file')."' onClick=\"supprimeVisuel('".$typeUpload."','".$extension."');\" style='float:right' class='".$displayBtnSupp."'>
							</div>
						</center>";
		//echo "'uploadForm.php?fichierSource=".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier)."&fichier=".$fichier."&extension=".$extension."&typeUpload=".$typeUpload."'" ;
		/* iframe pour formulaire upload */
		$retour.="<iframe id='divUpload-".$typeUpload."' frameborder='0' style='width:100%;height:75px;display:none;background-color:#FFFFFF' src='uploadForm.php?fichierSource=".str_replace($_SESSION['J2CidSociete']."_".$typeUpload."_","",$fichier)."&fichier=".$fichier."&extension=".$extension."&typeUpload=".$typeUpload."'></iframe>";

		/* div avec l'ajax-loader pour faire patienter */	
		$retour.="<div style='color:#CD0B0B;font-weight:bold;width:98%;height:80px;position:absolute;bottom:0px;display:none;background-color:#ffffff;border:0px solid red;' id='divLoader-".$typeUpload."'><i>".ifElse($_SESSION['J2Clangue']=='fr','Transfert du fichier...','File uploading...')."</i><br><br><img src='../images/ajax-loader.gif'></div>";

	/* fermeture div upload */
	$retour.="</div>";

	/* champ hidden pour récupérer le nom du fichier uploadé et l'enregistrer */
	$retour.="<input type='hidden' table='produit' attributForm='sauve' name='fichier_1' id='fichierUpload-".$typeUpload."' value='".$fichier."'>";


	return $retour;
}	
?>