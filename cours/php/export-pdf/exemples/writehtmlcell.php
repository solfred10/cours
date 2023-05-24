<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$htmlVide = <<<EOD
 &nbsp;
EOD;

$html1 = <<<EOD
<b>Longueur de la cellule :</b> 0 
<br>
<b>Hauteur de la cellule :</b> 0 
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>en dessous
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>true
<br>
<b>Alignement du texte :</b> à gauche 
<br>
<b>Autopadding : </b>true (10px)
EOD;

$html2 = <<<EOD
<b>Longueur de la cellule :</b> 0 
<br>
<b>Hauteur de la cellule :</b> 0 
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>en dessous
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>true
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html3 = <<<EOD
<b>Longueur de la cellule :</b> 88 
<br>
<b>Hauteur de la cellule :</b> ''
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>true (10px)
EOD;

$html4 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> ''
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>en dessous
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html5 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 100
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>en dessous et décalé
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html6 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 100
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>au début de la ligne du dessous
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html7 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 100
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html8 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 10
<br>
<b>Coordonnées Y :</b> 40
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html9 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html10 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>Sans bordure
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html11 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>En haut
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html12 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>En bas
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html13 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>En haut et en bas
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$html14 = <<<EOD
<b>Longueur de la cellule :</b> 88
<br>
<b>Hauteur de la cellule :</b> 50
<br>
<b>Coordonnées X :</b> 50
<br>
<b>Coordonnées Y :</b> 100
<br>
<b>texte à afficher</b>
<br>
<b>Bordure : </b>En haut
<br>
<b>Position du prochain élément : </b>à droite
<br>
<b>Couleur de fond : </b>true
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>false
<br>
<b>Alignement du texte :</b> à gauche
<br>
<b>Autopadding : </b>false
EOD;

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'writeHTMLCell', '', array(0,64,255), array(187,11,11));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 16));

$pdf->setHeaderMargin(PDF_MARGIN_HEADER);

$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setFont('dejavusans', 'N', 14);

$pdf->setFillColor(255, 255, 127);

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->AddPage();

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//margin de la prochaine cellule
$pdf->setCellMargins(1, 1, 1, 1);

/*
La méthode WRITEHTMLCELL permet d'écrire dans une cellule avec la possibilité de mettre des bordure, une couleur de fond et du text HTML (tous les attributs HTML doivent être entre doubles quotes).
Cette méthode prend en paramètre plusieurs arguments : 
1er paramètre : la longueur de la cellule. Si on met 0 alors la cellule occupera toute la largeur (jusqu'à la limite de la marge)
2e paramètre : la hauteur de la cellule
3e paramètre : la coordonnée X
4e paramètre : la coordonnée Y
5e paramètre : le texte HTML à afficher
6e paramètre : la bordure :
	0 : Pas de bordure
	1 : bordure de chaque coté
	XXXX :         
        T pour une bordure en haut
        R pour une bordure à droite
        B pour une bordure en bas
        L pour une bordure à Gauche
		    Exemple : LR pour une bordure à gauche et  àdroite
	Array : Pour définir le type de bordure, l'épaisseur, la couleur, ... 
		Exemple : array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
7e paramètre : Position du prochain élément
    0: à droite
    1: au début de la ligne du dessous
    2: en dessous et décalé de la longueur de la cellule précédente
8e paramètre : Appliquer ou non une couleur de fond (définit auparavant avec la méthode setFillColor)
9e paramètre : Reinitialiser ou non la hauteur de la dernière cellule
10e paramètre :	Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
11e paramètre : Auto padding	 
*/

$pdf->setFont('helvetica', 'N', 16);
$pdf->writeHTML("Auto padding sans utiliser la méthode <i>setCellPadding</i>",true,false,true,true,'L');
$pdf->writeHTMLCell(0, 0, '' , '', $html1, 1, 1, true, false, 'L', true);
$pdf->writeHTMLCell(0, 0, '' , '', $html2, 1, 1, true, false, 'L', false);

$pdf->Ln(5);
$pdf->setFont('helvetica', 'N', 16);
$pdf->writeHTML("Auto padding en utilisant la méthode <i>setCellPadding</i>",true,false,true,true,'L');
$pdf->setFont('dejavusans', 'N', 7);
$pdf->setCellPaddings(10,10,10,10);
$pdf->writeHTMLCell(88, '', '' , '', $html3, 1, 0, true, false, 'L', true);
$pdf->writeHTMLCell(88, '', '' , '', $html4, 1, 0, true, false, 'L', false);
$pdf->setCellPaddings(0,0,0,0);

$pdf->AddPage();

$pdf->setFont('helvetica', 'N', 16);
$pdf->writeHTML("Position de la prochaine cellule",true,false,true,false,'L');

$pdf->setFont('dejavusans', 'N', 7);
$pdf->writeHTMLCell(88, '', '' , '', $html5, 1, 2, true, false, 'L', true);
$pdf->writeHTMLCell(88, '', '' , '', $html6, 1, 1, true, false, 'L', false);
$pdf->writeHTMLCell(88, '', '' , '', $html7, 1, 0, true, false, 'L', false);
$pdf->writeHTMLCell(88, '', '' , '', $html6, 1, 1, true, false, 'L', false);

$pdf->AddPage();

$pdf->setFont('helvetica', 'N', 16);
$pdf->writeHTML("Coordonnées",true,false,true,false,'L');
$pdf->Ln(5);

$pdf->setFont('dejavusans', 'N', 7);
$pdf->writeHTMLCell(88, 50, 10 , 40, $html8, 1, 0, true, false, 'L', false);
$pdf->writeHTMLCell(88, 50, 50 , 100, $html9, 1, 1, true, false, 'L', false);

$pdf->AddPage();
$pdf->setFont('helvetica', 'N', 16);
$pdf->writeHTML("Bordure",true,false,true,false,'L');
$pdf->Ln(5);

$pdf->setFont('dejavusans', 'N', 7);
$pdf->writeHTMLCell(88, 50, '' , '', $html10, 0, 0, true, false, 'L', false);
$pdf->writeHTMLCell(88, 50, '' , '', $html11, 'T', 1, true, false, 'L', false);
$pdf->writeHTMLCell(88, 50, '' , '', $html12, 'B', 0, true, false, 'L', false);
$pdf->writeHTMLCell(88, 50, '' , '', $html13, 'TB', 1, true, false, 'L', false);
$pdf->Ln(5);
$pdf->setCellPadding(10,10,10,10);
$pdf->writeHTMLCell(88, 50, '' , '', $html14, array('LTRB'=>array('width'=>3,'color'=>array(66,0, 255))), 1, true, false, 'L', true);

$pdf->Output('export/writehtmlcell.pdf', 'I');