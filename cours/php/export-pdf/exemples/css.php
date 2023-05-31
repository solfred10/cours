<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'CSS DANS UN PDF', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

//Police de l'entête et du pied de page
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 12));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

//Marges
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

//Saut de page automatique
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

 // define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
	h1 {
		color: red;
		font-family: times;
		font-size: 24pt;
		text-decoration: underline;
	}
	.paragraphe1 {		
		font-family: helvetica;
		font-size: 12pt;
	}
	
	div.test {
		width:200px;
		height:100px;
		border: 2px solid red ;		
		color: blue;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;		
		text-align: center;
		border-radius: 25px;	
		padding:5px;
		margin-bottom:50px;
	}	
</style>

<p class="paragraphe1">paragraphe 1</p>

<div class="test">border-radius ne fonctionne pas</div>
<div class="test">margin ne fonctionne pas</div>
<div class="test">padding ne fonctionne pas</div>
EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Enregistrement du PDF
$pdf->Output('export/css.pdf', 'I');