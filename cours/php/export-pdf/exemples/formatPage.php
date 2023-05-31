<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'FORMAT DE PAGE', '', array(0,64,255), array(187,11,11));
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

/*
La méthode ADDPAGE prend en paramètre 4 arguments :
1er argument : L'orientation de la apge :
    P : Portrait
    L : Paysage    
2e argument : Le format de page (A4, A3, ...)
3e argument : Garder ou pas les marges
4e argument : ???
*/

$pdf->AddPage('P', 'A4');
$pdf->write(10,'A4 PORTRAIT','',false,'C');

$pdf->AddPage('P', 'A3');
$pdf->write(10,'A3 PORTRAIT','',false,'C');

$pdf->AddPage('L', 'A4');
$pdf->write(10,'A4 PAYSAGE','',false,'C');

$pdf->AddPage('L', 'A3');
$pdf->write(10,'A3 PAYSAGE','',false,'C');

//Enregistrement du PDF
$pdf->Output('export/formatPage.pdf', 'I');