<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

/*
La méthode WRITEHTML prend en paramètres 6 arguments
1er paramètre : Le texte HTML à afficher
2e paramètre : Effectuer ou non un saut de ligne à la fin de ce contenu
3e paramètre : Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
4e paramètre : Réinitialise ou non la hauteur de ligne
5e paramètre : Auto padding
6e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
*/

$html1 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b> True
<br>
<b>Couleur de fond : </b>True
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>False
<br>
<b>Autopadding : </b>False
<br>
<b>Alignement du texte :</b> à gauche
EOD;

$html2 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b> False
<br>
<b>Couleur de fond : </b>True
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>True
<br>
<b>Autopadding : </b>False
<br>
<b>Alignement du texte :</b> à gauche
EOD;

$html3 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b>True
<br>
<b>Couleur de fond : </b>False
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>False
<br>
<b>Autopadding : </b>False
<br>
<b>Alignement du texte :</b> à gauche
EOD;

$html4 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b> True
<br>
<b>Couleur de fond : </b>True
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>False
<br>
<b>Autopadding : </b>False
<br>
<b>Alignement du texte :</b> à gauche
EOD;

$html5 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b> True
<br>
<b>Couleur de fond : </b>False
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>True
<br>
<b>Autopadding : </b>True
<br>
<b>Alignement du texte :</b> à gauche
EOD;

$html6 = <<<EOD
<b>Texte à afficher</b>
<br>
<b>Effectuer ou non un saut de ligne à la fin de ce contenu :</b> True
<br>
<b>Couleur de fond : </b>True
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>False
<br>
<b>Autopadding : </b>False
<br>
<b>Alignement du texte :</b> Centré
EOD;


$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'writeHTML', '', array(0,64,255), array(187,11,11));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 16));

$pdf->setHeaderMargin(PDF_MARGIN_HEADER);

$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setFont('dejavusans', 'N', 14);

$pdf->setFillColor(255, 255, 127);

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->AddPage();

$pdf->setAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->writeHTML($html1,true,true,false,false,'L');
$pdf->Ln(5);

$pdf->writeHTML($html2,false,true,false,false,'L');
$pdf->writeHTML($html3,true,false,false,false,'L');
$pdf->Ln(5);

$pdf->writeHTML($html4,true,true,false,true,'L');
$pdf->Ln(5);

$pdf->writeHTML($html5,true,false,true,true,'L');
$pdf->Ln(5);

$pdf->writeHTML($html6,true,true,false,false,'C');

$pdf->Output('export/writehtml.pdf', 'I');