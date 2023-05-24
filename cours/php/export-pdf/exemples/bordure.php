<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator('Jean Dupont');
$pdf->setAuthor('Frédéric SOL');
$pdf->setTitle('TCPDF Exemple 1');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, exemple, test, guide');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 24));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Les bordures', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setFont('dejavusans', 'N', 14);

$pdf->AddPage();

$htmlVide = <<<EOD
    &nbsp;
EOD;

$htmlSansBordure = <<<EOD
<h1>TITRE</h1>
<div style="margin-left:10px">Sans bordure</div>
EOD;

$htmlBordureLR = <<<EOD
<div>Bordure gauche et droite</div>
EOD;

$htmlBordureTB = <<<EOD
<div>Bordure haute et basse</div>
EOD;

$htmlBordure = <<<EOD
<div>Bordure</div>
EOD;

$htmlWidthHeight = <<<EOD
<div>Longueur et hauteur de la cellule définie</div>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $htmlSansBordure, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlBordureLR, 'LR', 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlBordureTB, 'TB', 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlBordure, 1, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(150,55, '', '', $htmlWidthHeight, 1, 1, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);

$pdf->AddPage();
$pdf->writeHTMLCell(50,55, '', '', "cap=>square join=>miter", array('LTRB' => array('width' => 5, 'cap' => 'square', 'join' => 'miter', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 75, '', "cap=>butt join=>miter", array('LTRB' => array('width' => 5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 140, '', "cap=>round join=>miter", array('LTRB' => array('width' => 10, 'cap' => 'round', 'join' => 'miter', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);

$pdf->writeHTMLCell(50,55, 15, 95, "cap=>square join=>round", array('LTRB' => array('width' => 5, 'cap' => 'square', 'join' => 'round', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 75, 95, "cap=>butt join=>round", array('LTRB' => array('width' => 5, 'cap' => 'butt', 'join' => 'round', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 140, 95, "cap=>round join=>round", array('LTRB' => array('width' => 10, 'cap' => 'round', 'join' => 'round', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);

$pdf->writeHTMLCell(50,55, 15, 165, "cap=>square join=>bevel", array('LTRB' => array('width' => 5, 'cap' => 'square', 'join' => 'bevel', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 75, 165, "cap=>butt join=>bevel", array('LTRB' => array('width' => 5, 'cap' => 'butt', 'join' => 'bevel', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(50,55, 140, 165, "cap=>round join=>bevel", array('LTRB' => array('width' => 10, 'cap' => 'round', 'join' => 'bevel', 'dash' => 1, 'color' => array(66,0, 255))), 0, 0, true, '', true);
$pdf->writeHTMLCell(0,0, '', '', $htmlVide, 0, 1, 0, true, '', true);

$destination = "http://cours.fred-sol.fr/cours/php/export-pdf/exemples/export/" ;
$fileName = "bordure.pdf";
$pdf->Output($destination.$fileName, 'D');