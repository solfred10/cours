<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'ANNOTATION', '', array(0,64,255), array(187,11,11));
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

$txt = "Exemple d'un texte avec annotation. Bouger la souris sur le carré jaune";
$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

/*
La méthode Annotation prend en paramètre 7 arguments
1er argument : Position en X
2e argument : Position en Y
3e argument : Longueur du rectangle d'annotation
4e argument : Hauteur du rectangle d'annotation
5e argument : Texte d'annotation
6e argument : ???
7e argument : ???
*/

// text annotation
$pdf->Annotation(100, 25, 1, 1, "remarque : xxx");
 
//Enregistrement du PDF
$pdf->Output('export/annotation.pdf', 'I');