<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'IMAGE DE COUVERTURE', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

//Police de l'entête et du pied de page
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 12));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

//Marges
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

//Suppression de l'entête
$pdf->setPrintHeader(false);

//Suppression du footer
$pdf->setPrintFooter(false);

$pdf->AddPage();

//Désactivation du saut de page automatique. Obligatoire sinon  les marges sont conservées
$pdf->setAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'image_demo.jpg';
$pdf->Image($img_file, null, 0, 210, 297, '', '', '', false, 300, 'C', false, false, 0);

//Saut de page automatique
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//Affichage d'un texte sur la couverture
$html = 'PAGE 3';
$pdf->writeHTML($html, true, false, true, false, '');

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'IMAGE DE COUVERTURE', '', array(0,64,255), array(187,11,11));
$pdf->setPrintHeader(true);

$pdf->AddPage();
$pdf->setFooterData(array(187,11,11),array(0,64,255));
$pdf->setPrintFooter(true);

$html = '<span style="background-color:yellow;color:blue;">PAGE 3</span>';
$pdf->writeHTML($html, true, false, true, false, '');

//Enregistrement du PDF
$pdf->Output('export/imageCouverture.pdf', 'I');