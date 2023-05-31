<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'CODES BARRES', '', array(0,64,255), array(187,11,11));
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

//style
$style = array(
	'position' => '',
	'align' => 'C',
	'stretch' => false,
	'fitwidth' => true,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255),
	'text' => true,
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);

/*
La méthode WRITE2DBARCODE prend en paramètre 8 arguments
1er argument : Le texte qui va s'afficher sous le code barre
2e argument : Le type de code barre
3e argmument : Position en X
4e argmument : Position en Y
5e argmument : La longueur
6e argmument : La hauteur
7e argument : L'unité de mesure (0.4 par défault)
8e argument : Le style
9e argument : Position du prochain code barre
	T: top-right  
	M: middle-right 
	B: bottom-right 
	N: next line
*/

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->write1DBarcode('CODE C39', 'C39', '', '', '', 18, 0.4, $style, 'B');

$pdf->Ln();

// CODE 39 + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('CODE 39 +', 'C39+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 39 EXTENDED
$pdf->Cell(0, 0, 'CODE 39 EXTENDED', 0, 1);
$pdf->write1DBarcode('CODE 39 E', 'C39E', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 93 - USS-93
$pdf->Cell(0, 0, 'CODE 93 - USS-93', 0, 1);
$pdf->write1DBarcode('TEST93', 'C93', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Standard 2 of 5
$pdf->Cell(0, 0, 'Standard 2 of 5', 0, 1);
$pdf->write1DBarcode('1234567', 'S25', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Standard 2 of 5 + CHECKSUM
$pdf->Cell(0, 0, 'Standard 2 of 5 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('1234567', 'S25+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Interleaved 2 of 5
$pdf->Cell(0, 0, 'Interleaved 2 of 5', 0, 1);
$pdf->write1DBarcode('1234567', 'I25', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// Interleaved 2 of 5 + CHECKSUM
$pdf->Cell(0, 0, 'Interleaved 2 of 5 + CHECKSUM', 0, 1);
$pdf->write1DBarcode('1234567', 'I25+', '', '', '', 18, 0.4, $style, 'N');


// add a page ----------
$pdf->AddPage();

// CODE 128 AUTO
$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);
$pdf->write1DBarcode('CODE 128 AUTO', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 A
$pdf->Cell(0, 0, 'CODE 128 A', 0, 1);
$pdf->write1DBarcode('CODE 128 A', 'C128A', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 B
$pdf->Cell(0, 0, 'CODE 128 B', 0, 1);
$pdf->write1DBarcode('CODE 128 B', 'C128B', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 128 C
$pdf->Cell(0, 0, 'CODE 128 C', 0, 1);
$pdf->write1DBarcode('0123456789', 'C128C', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// EAN 8
$pdf->Cell(0, 0, 'EAN 8', 0, 1);
$pdf->write1DBarcode('1234567', 'EAN8', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// EAN 13
$pdf->Cell(0, 0, 'EAN 13', 0, 1);
$pdf->write1DBarcode('1234567890128', 'EAN13', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// UPC-A
$pdf->Cell(0, 0, 'UPC-A', 0, 1);
$pdf->write1DBarcode('12345678901', 'UPCA', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// UPC-E
$pdf->Cell(0, 0, 'UPC-E', 0, 1);
$pdf->write1DBarcode('04210000526', 'UPCE', '', '', '', 18, 0.4, $style, 'N');

// add a page ----------
$pdf->AddPage();

// 5-Digits UPC-Based Extension
$pdf->Cell(0, 0, '5-Digits UPC-Based Extension', 0, 1);
$pdf->write1DBarcode('51234', 'EAN5', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// 2-Digits UPC-Based Extension
$pdf->Cell(0, 0, '2-Digits UPC-Based Extension', 0, 1);
$pdf->write1DBarcode('34', 'EAN2', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// MSI
$pdf->Cell(0, 0, 'MSI', 0, 1);
$pdf->write1DBarcode('80523', 'MSI', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// MSI + CHECKSUM (module 11)
$pdf->Cell(0, 0, 'MSI + CHECKSUM (module 11)', 0, 1);
$pdf->write1DBarcode('80523', 'MSI+', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODABAR
$pdf->Cell(0, 0, 'CODABAR', 0, 1);
$pdf->write1DBarcode('123456789', 'CODABAR', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// CODE 11
$pdf->Cell(0, 0, 'CODE 11', 0, 1);
$pdf->write1DBarcode('123-456-789', 'CODE11', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// PHARMACODE
$pdf->Cell(0, 0, 'PHARMACODE', 0, 1);
$pdf->write1DBarcode('789', 'PHARMA', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

// PHARMACODE TWO-TRACKS
$pdf->Cell(0, 0, 'PHARMACODE TWO-TRACKS', 0, 1);
$pdf->write1DBarcode('105', 'PHARMA2T', '', '', '', 18, 2, $style, 'N');

// add a page ----------
$pdf->AddPage();

// IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
$pdf->Cell(0, 0, 'IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200', 0, 1);
$pdf->write1DBarcode('01234567094987654321-01234567891', 'IMB', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// POSTNET
$pdf->Cell(0, 0, 'POSTNET', 0, 1);
$pdf->write1DBarcode('98000', 'POSTNET', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// PLANET
$pdf->Cell(0, 0, 'PLANET', 0, 1);
$pdf->write1DBarcode('98000', 'PLANET', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)
$pdf->Cell(0, 0, 'RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)', 0, 1);
$pdf->write1DBarcode('SN34RD1A', 'RMS4CC', '', '', '', 15, 0.6, $style, 'N');

$pdf->Ln();

// KIX (Klant index - Customer index)
$pdf->Cell(0, 0, 'KIX (Klant index - Customer index)', 0, 1);
$pdf->write1DBarcode('SN34RDX1A', 'KIX', '', '', '', 15, 0.6, $style, 'N');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE ALIGNMENTS

// add a page
$pdf->AddPage();

// set a background color
$style['bgcolor'] = array(255,255,240);
$style['fgcolor'] = array(127,0,0);

// Left position
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center position
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right position
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0,127,0);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = false; // disable fitwidth

// Left alignment
$style['align'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['align'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['align'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0,64,127);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = true; // disable fitwidth

// Left alignment
$style['cellfitalign'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['cellfitalign'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['cellfitalign'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(127,0,127);

// Left alignment
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE STYLE

// define barcode style
$style = array(
	'position' => '',
	'align' => '',
	'stretch' => true,
	'fitwidth' => false,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,128),
	'bgcolor' => array(255,255,128),
	'text' => true,
	'label' => 'CUSTOM LABEL',
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->setLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', 120, 25, 0.4, $style, 'N');



//Enregistrement du PDF
$pdf->Output('export/codeBarre.pdf', 'I');