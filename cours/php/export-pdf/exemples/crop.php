<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'CROPS', '', array(0,64,255), array(187,11,11));
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

$pdf->AddPage();
/*
La méthode CROPMARK prend en paramètres 6 arguments :
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : La longueur
4e argmument :  La hautuer
5e argmument : La postion : 
    T : En haut
    L : A gauche
    B : En bas
    R : à deoite
6e argmument : La couleur
*/
$pdf->cropMark(30, 50, 10, 10, 'TL',array(125,125,125));
$pdf->cropMark(180, 50, 10, 10, 'TR',array(255,0,0));
$pdf->cropMark(30, 200, 10, 10, 'BL',array(0,255,0));
$pdf->cropMark(180, 200, 10, 10, 'BR',array(0,0,255));
 

//Enregistrement du PDF
$pdf->Output('export/crop.pdf', 'I');