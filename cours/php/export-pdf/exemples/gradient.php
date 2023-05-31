<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'LES GRADIENTS', '', array(0,64,255), array(187,11,11));
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

//Couleurs
$red = array(255, 0, 0);
$blue = array(0, 0, 200);
$yellow = array(255, 255, 0);
$green = array(0, 255, 0);
$white = array(255);
$black = array(0);

// set the coordinates x1,y1,x2,y2 of the gradient (see linear_gradient_coords.jpg)
$coordsHorizontal = array(0, 0, 1, 0);
$coordsVertical = array(0, 0, 0, 1);
$coordsDiag = array(0, 1, 1, 0);
$coordsRadial1 = array(0.5, 0.5, 0.5, 0.5, 0.3);
$coordsRadial2 = array(0.5, 0.5, 0.5, 0.5, 0.5);
$coordsRadial3 = array(0, 0, 0, 0, 0.8);

/*
La méthode LINEARGRADIENT prend en paramètre 7 arguments
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : La longueur
4e argmument : La hauteur
5e argument : La 1ère couleur
6e argument : La 2e couleur
7e argument : Un tableau avec les coordonnées du vecteur qui va définir le radient. Les indexes paires correspondent aux abscisses et Les indexes impaires correspondent aux ordonnées 
*/	 

$pdf->writeHTML('<h2>LINEAIRE</h2>',true,true,false,true,'L');

$pdf->LinearGradient(15, 45, 40, 40, $red, $blue, $coordsHorizontal);
$pdf->Text(15, 90, 'Horizontal');

$pdf->LinearGradient(65, 45, 40, 40, $red, $blue, $coordsVertical);
$pdf->Text(65, 90, 'Vertical');

$pdf->LinearGradient(115, 45, 40, 40, $red, $blue, $coordsDiag);
$pdf->Text(115, 90, 'Diagonal');

/*
La méthode RADIALGRADIENT prend en paramètre 7 arguments
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : La longueur
4e argmument : La hauteur
5e argument : La 1ère couleur
6e argument : La 2e couleur
7e argument : Un tableau avec les coordonnées du vecteur qui va définir le radient. Les indexes paires correspondent aux abscisses et Les indexes impaires correspondent aux ordonnées 
*/	 

$pdf->Ln(15);
$pdf->writeHTML('<h2>RADIAL</h2>',true,true,false,true,'L');

$pdf->RadialGradient(15, 120, 40, 40, $red, $blue, $coordsRadial1);
$pdf->RadialGradient(65, 120, 40, 40, $red, $blue, $coordsRadial2);
$pdf->RadialGradient(115, 120, 40, 40, $red, $blue, $coordsRadial3);

//Enregistrement du PDF
$pdf->Output('export/gradient.pdf', 'I');