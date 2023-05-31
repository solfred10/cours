<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

/*
La méthode PIESECTOR prend en paramètre 7 arguments
1er argument : Position en X du centre
2e argument : Position en Y du centre
3e argument : Le rayon
4e argument : L'angle de départ
5e argument : L'angle d'arrivée
6e argument : Style du rendu
7e argument : Indique s'il faut aller dans le sens des aiguilles d'une montre
8e argument : Origine des angles (0° pour 3H, 90° pour midi, 180° pour 9H, 270° pour 6H)
*/  

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'CAMEMBERT', '', array(0,64,255), array(187,11,11));
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

//Exemple 1
$xc = 30;
$yc = 50;
$r = 20;

$pdf->Text(10, 20, "Début de l'angle à 12H");
$pdf->setFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 0, 180, 'FD', true);

$pdf->setFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 180, 270, 'FD', true);

$pdf->setFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 270, 0, 'FD', true);

//Exemple 2
$xc = 90;
$yc = 50;
$r = 20;

$pdf->Text(70, 20, "Début de l'angle à 6H");

$pdf->setFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 0, 180, 'F', true,270);

$pdf->setFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 180, 270, 'F', true,270);

$pdf->setFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 270, 0, 'F', true,270);

//Exemple 3
$xc = 150;
$yc = 50;
$r = 20;

$pdf->Text(130, 20, "Début de l'angle à 3H");

$pdf->setFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 0, 180, 'F', true,0);

$pdf->setFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 180, 270, 'F', true,0);

$pdf->setFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 270, 0, 'F', true,0);


// write labels
$pdf->setTextColor(255,255,255);
$pdf->Text(145, 58, '50%');
$pdf->Text(135, 40, '25%');
$pdf->Text(155, 40, '25%');
 

//Enregistrement du PDF
$pdf->Output('export/camembert.pdf', 'I');