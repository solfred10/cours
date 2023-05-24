<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/*
La méthode MultiCell prend en arguments 15 paramètres :  
1er paramètre : La longueur de la cellule
2e paramètre : La hauteur de la cellule
3e paramètre : Une bordure
4e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
5e paramètre :  Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
6e paramètre : Position du prochain élément.
    0: à droite
    1: au début de la ligne du dessous
    2: en dessous et décalé de la longueur du bloc
7e paramètre : Coordonnées X
8e paramètre : Coordonnées Y
9e paramètre : Réinitialiser la hauteur de la dernière cellule
10e paramètre : stretch mode: 
	0 : Désactivé
	1 : Mise à l'échelle horizontale uniquement si le texte est plus grand que la largeur de la cellule
	2 : Mise à l'échelle horizontale forcée pour s'adapter à la largeur de la cellule
	3 : Espacement des caractères uniquement si le texte est plus grand que la largeur de la cellule
	4 : Espacement forcé des caractères pour s'adapter à la largeur de la cellule
11e paramètre : Si le texte de la cellule est du HTML
12e paramètre : Appliquer ou non l'autopadding
13e paramètre : hauteur max (doit être supérieur au 1er paramètre)
14e paramètre : Alignement vertical (fonctionne que si le 11e paramètre (texteHTML) = false)
	T : En haut
	M : Au milieu
	B : En bas
15e paramètre : ??
*/

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Multi cellules', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 24));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setFont('dejavusans', 'N', 14, '', true);

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

//padding de la prochaine cellule
$pdf->setCellPaddings(1, 1, 1, 1);

//margin de la prochaine cellule
$pdf->setCellMargins(1, 1, 1, 1);

//couleur de fond de la prochaine cellule
$pdf->setFillColor(255, 255, 127);

$txtG = '<i>Texte</i>  aligné à gauche';
$txtC= '<i>Texte</i>  centré';
$txtD = 'Texte aligné à droite';

$txtT = 'Texte  aligné en haut';
$txtM= 'Texte aligné au milieu';
$txtB = 'Texte aligné en bas';

$html = "Changement de couleur de fond, de padding et de margin" ;

$pdf->MultiCell(50, 15, $txtG, 1, 'L', 1, 0, '', '', true,0,false,true,35,'T');
$pdf->MultiCell(50, 15, $txtC, 1, 'C', 0, 0, '', '',  true,0,true);
$pdf->MultiCell(50, 15, $txtD, 1, 'R', 1, 0, '', '', true);

$pdf->Ln(24);

$pdf->writeHTML($html, 1, 0, 0, true, '', true);

$pdf->setCellPaddings(5, 5, 5, 5);

$pdf->setFillColor(0, 255, 255);

$pdf->MultiCell(50, 25, $txtT, 1, 'L', 1, 0, '', '', true,0,false,true,25,'T');

$pdf->setCellMargins(10,0,0,0);

$pdf->MultiCell(50, 25, $txtM, 1, 'L', 0, 0, '', '',  true,0,false,true,25,'M');
$pdf->MultiCell(50, 25, $txtB, 1, 'L', 1, 0, '', '',  true,0,false,true,25,'B');

$pdf->Output('export/multi-cellule.pdf', 'I');