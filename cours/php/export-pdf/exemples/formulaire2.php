<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

$html = <<<EOD
<form method="post" action="http://localhost/printvars.php" enctype="multipart/form-data">
<label for="name">Pseudo :</label> <input type="text" name="name" value="" size="20" maxlength="30" /><br />
<label for="password">Mot de passe :</label> <input type="password" name="password" value="" size="20" maxlength="30" /><br /><br />
<label for="infile">Photo :</label> <input type="file" name="userfile" size="20" /><br /><br />
<input type="checkbox" name="agree" value="1" checked="checked" /> <label for="agree">Accepter les CGV </label><br /><br />
<label>Sexe : </label>
<input type="radio" name="radioquestion" id="rqa" value="1" /> <label for="rqa">Homme</label>
<input type="radio" name="radioquestion" id="rqb" value="2"  /> <label for="rqb">Femme</label>
<br /><br />
<label for="selection">Pays:</label>
<select name="selection" size="0">
	<option value="0">France</option>
	<option value="1">Espagne</option>
	<option value="2">USA</option>
	<option value="3">Japon</option>
</select>
<br /><br />
<label for="selection">Multi select:</label>
<select name="multiselection" size="2" multiple="multiple">
	<option value="0">zero</option>
	<option value="1">one</option>
	<option value="2">two</option>
	<option value="3">three</option>
</select>
<br /><br /><br />
<label for="text">Message :</label><br />
<textarea cols="40" rows="3" name="text"></textarea><br />
<br /><br /><br />
<input type="reset" name="reset" value="Reset" />
<input type="submit" name="submit" value="Submit" />
<input type="button" name="print" value="Print" onclick="print()" />
<input type="hidden" name="hiddenfield" value="OK" />
<br />
</form>
EOD;

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'FORMULAIRE HTML', '', array(0,64,255), array(187,11,11));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 16));

$pdf->setHeaderMargin(PDF_MARGIN_HEADER);

$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->AddPage();

$pdf->setAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->writeHTML($html,true,true,false,false,'L');

$pdf->Output('export/formulaireHTML.pdf', 'I');