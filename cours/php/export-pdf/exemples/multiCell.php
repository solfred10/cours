<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/*
La méthode MultiCell prend en arguments 15 paramètres :  
1er paramètre : La longueur de la cellule
2e paramètre : La hauteur de la cellule
3e paramètre : Le texte à afficher
4e paramètre : la bordure :
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
5e paramètre : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
6e paramètre :  Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
7e paramètre : Position du prochain élément.
    0: à droite
    1: au début de la ligne du dessous
    2: en dessous et décalé de la longueur du bloc
8e paramètre : Coordonnées X
9e paramètre : Coordonnées Y
10e paramètre : Réinitialiser la hauteur de la dernière cellule
11e paramètre : stretch mode: 
	0 : Désactivé
	1 : Mise à l'échelle horizontale uniquement si le texte est plus grand que la largeur de la cellule
	2 : Mise à l'échelle horizontale forcée pour s'adapter à la largeur de la cellule
	3 : Espacement des caractères uniquement si le texte est plus grand que la largeur de la cellule
	4 : Espacement forcé des caractères pour s'adapter à la largeur de la cellule
12e paramètre : Si le texte de la cellule est du HTML
13e paramètre : Appliquer ou non l'autopadding
14e paramètre : hauteur max (doit être supérieur au 1er paramètre)
15e paramètre : Alignement vertical (fonctionne que si le 11e paramètre (texteHTML) = false)
	T : En haut
	M : Au milieu
	B : En bas
16e paramètre : ??
*/

$txtG = '<i>Texte</i>  aligné à gauche';
$txtC= '<i>Texte</i>  centré';
$txtD = 'Texte aligné à droite';

$txtT = 'Texte  aligné en haut';
$txtM= 'Texte aligné au milieu';
$txtB = 'Texte aligné en bas';

$html1 = <<<EOD
<b>Longueur de la cellule :</b> 0 
<br>
<b>Hauteur de la cellule :</b> 75 
<br>
<b>Texte à afficher</b> : xxx
<br>
<b>Bordure : </b>De chaque coté
<br>
<b>Alignement du texte :</b> à gauche 
<br>
<b>Couleur de fond : </b>true
<br>
<b>Position du prochain élément : </b>en dessous
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>true
<br>
<b>Stretch : </b>0
<br>
<b>Le texte est il du HTML : </b>True
<br>
<b>Autopadding : </b>true (10px)
<br>
<b>Hauteur max : </b>''
<br>
<b>Alignement vertical </b> : T
<br>
EOD;

$html2 = <<<EOD
<b>Longueur de la cellule :</b> 150 
<br>
<b>Hauteur de la cellule :</b> 75 
<br>
<b>Texte à afficher</b> : xxx
<br>
<b>Bordure : </b>Aucune
<br>
<b>Alignement du texte :</b> à gauche 
<br>
<b>Couleur de fond : </b>true
<br>
<b>Position du prochain élément : </b>en dessous
<br>
<b>Coordonnées X :</b> ''
<br>
<b>Coordonnées Y :</b> ''
<br>
<b>Réinitialisation de la hauteur de la dernière cellule : </b>true
<br>
<b>Stretch : </b>0
<br>
<b>Le texte est il du HTML : </b>True
<br>
<b>Autopadding : </b>true (10px)
<br>
<b>Hauteur max : </b>''
<br>
<b>Alignement vertical </b> : T
<br>
EOD;

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

//margin de la prochaine cellule
$pdf->setCellMargins(1, 1, 1, 1);

//couleur de fond de la prochaine cellule
$pdf->setFillColor(255, 255, 127);

$pdf->multiCell(0,'','Exemple 1 : Longueur et bordure',0,'L',false,1,'','',true,0,true,false,'','T','');
$pdf->multiCell(0,75,$html1,1,'L',true,1,'','',true,0,true,false,'','T','');
$pdf->multiCell(150,75,$html2,0,'L',true,1,'','',true,0,true,false,'','T','');

$pdf->addPage();

$pdf->multiCell(0,'','Exemple 2 : alignement vertical',0,'L',false,1,'','',true,0,true,false,'','T','');
$pdf->multiCell(60,25,$txtT,1,'L',true,0,'','',true,0,false,false,'25','T',false);
$pdf->multiCell(60,25,$txtM,1,'L',true,0,'','',true,0,false,false,25,'M',false);
$pdf->multiCell(60,25,$txtB,1,'L',true,1,'','',true,0,false,false,25,'B',false);

//padding de la prochaine cellule
$pdf->setCellPadding(5);



$pdf->Output('export/multi-cellule.pdf', 'I');