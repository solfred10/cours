<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'QR CODE', '', array(0,64,255), array(187,11,11));
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

// set style for barcode
$style = array(
	'border' => 1,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(255,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

/*
La méthode WRITE2DBARCODE prend en paramètre 8 arguments
1er argument : L'URL
2e argument : Le type de QR code
3e argmument : Position en X
4e argmument : Position en Y
5e argmument : La longueur
6e argmument : La hauteur
7e argument : Le style
8e argument : L'alignement
9e argument : Occupe ou non tous l'espace du cadre
*/

// QRCODE,L : QR-CODE Low error correction
$pdf->Text(20, 25, 'QRCODE L');
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 30, 30, 30, $style, 'N');

// QRCODE,M : QR-CODE Medium error correction
$pdf->Text(60, 25, 'QRCODE M');
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,M', 60, 30, 30, 30, $style, 'N');

// QRCODE,Q : QR-CODE Better error correction
$pdf->Text(100, 25, 'QRCODE Q');
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 100, 30, 30, 30, $style, 'T');

// QRCODE,H : QR-CODE Best error correction
$pdf->Text(140, 25, 'QRCODE H');
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 140, 30, 30, 30, $style, 'B');

// QRCODE,L : QR-CODE Low error correction
$pdf->Text(20, 70, "Occupe tout l'espace");
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 20, 80, 70, 50, $style, 'N',true);

// QRCODE,L : QR-CODE Low error correction
$pdf->Text(100, 70, "N'occupe pas tout l'espace");
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 100, 80, 70, 50, $style, 'N',false);

// PDF417 (ISO/IEC 15438:2006)
$pdf->Text(20,140, 'PDF417 (ISO/IEC 15438:2006)');
$pdf->write2DBarcode('www.tcpdf.org', 'PDF417', 20, 150, 0, 30, $style, 'N');

//Enregistrement du PDF
$pdf->Output('export/QRcode.pdf', 'I');