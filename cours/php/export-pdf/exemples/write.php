<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

/*La méthode WRITE prend en paramètres 11 arguments
1er argument : La marge en haut
2e argument : Le texte à afficher
3e argument : lien hypertexte sur le bloc
4e argument : Appliquer ou non couleur de fond (définit auparavant avec la méthode setFillColor)
5e argument : Alignement du texte	 
	 L : à gauche (par défaut)
	 C : centré
	 R : à droite
6e argument : Si vrai le curseur sera en fin de ligne, sinon il sera en début de ligne suivante
7e argument : stretch
	0 : Désactivé
	1 : Mise à l'échelle horizontale uniquement si le texte est plus grand que la largeur de la cellule
	2 : Mise à l'échelle horizontale forcée pour s'adapter à la largeur de la cellule
	3 : Espacement des caractères uniquement si le texte est plus grand que la largeur de la cellule
	4 : Espacement forcé des caractères pour s'adapter à la largeur de la cellule
8e argument : Si vrai imprime uniquement la première ligne et renvoie la chaîne restante.
9e argument : Si vrai la chaîne est le début d'une ligne
10e argument : Hauteur max
11e argument : La largeur de la première ligne sera réduite de ce montant
12e argument : Tableau margin du conteneur parent
*/	

$html1 = <<<EOD
Hauteur de ligne : 10
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : False
Alignement du texte : à gauche
Stretch : 0
Curseur en fin de ligne : false
Imprime uniquement la première ligne : 
La chaîne est le début d'une ligne : 
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html2 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : www.fred-sol.fr
Couleur de fond : True
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : 
La chaîne est le début d'une ligne : 
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html3 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : false
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : 
La chaîne est le début d'une ligne : 
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html4 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : false
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : False
La chaîne est le début d'une ligne : False
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html5 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : false
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : True
La chaîne est le début d'une ligne : False
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html6 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : false
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : False
La chaîne est le début d'une ligne : True
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$html7 = <<<EOD
Hauteur de ligne : 5
Texte à afficher : xxxxx
Lien hypertexte : 
Couleur de fond : false
Alignement du texte : à gauche
Stretch : 0
Curseur en début de ligne suivante : False
Imprime uniquement la première ligne : True
La chaîne est le début d'une ligne : True
Hauteur max : 
% de réduction de la ligne : 
Tableau margin du conteneur parent : 
EOD;

$htmlLorem = <<<EOD
Lorem ipsum dolor sit amet1, Lorem ipsum dolor sit amet2, Lorem ipsum dolor sit amet3, Lorem ipsum dolor sit amet4, 
EOD;

$htmlLorem2 = <<<EOD
Lorem ipsum dolor sit amet1, Lorem ipsum dolor sit amet2, Lorem
EOD;

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'WRITE', '', array(0,64,255), array(187,11,11));

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

$pdf->setFillColor(122,155,122);

$pdf->write(5,'Exemple 1 : Base');
$pdf->Ln(5);
$pdf->write(5,'-------------------------');
$pdf->Ln(10);

$pdf->write(10,$html1,'',false,'L',false,0,false,false,0,0,'');
$pdf->Ln(15);

$pdf->write(5,'Exemple 2 : Lien hypertexte dans le bloc');
$pdf->Ln(5);
$pdf->write(5,'---------------------------------------------------------');
$pdf->Ln(10);

$pdf->write(5,$html2,'www.fred-sol.fr',true,'L',false,0,false,false,0,0,'');
$pdf->Ln(15);

$pdf->addPage();

$pdf->write(5,'Exemple 3 : Curseur en fin de ligne');
$pdf->Ln(5);
$pdf->write(5,'---------------------------------------------------------');
$pdf->Ln(10);

$pdf->write(5,$html3,'',false,'L',false,0,false,false,0,0,'');
$pdf->write(5,$html3,'',true,'L',false,0,false,false,0,0,'');

$pdf->addPage();

$pdf->write(5,'Exemple 4 : Impression de la 1ère ligne');
$pdf->Ln(5);
$pdf->write(5,'---------------------------------------------------------');
$pdf->Ln(10);

$pdf->write(5,$html4,'',false,'L',false,0,false,false,0,0,'');
$pdf->Ln(7);
$pdf->write(5,$htmlLorem,'',true,'L',false,0,false,false,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$html5,'',false,'L',false,0,false,false,0,0,'');
$pdf->Ln(7);
$pdf->write(5,$htmlLorem,'',true,'L',false,0,true,false,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$html6,'',false,'L',false,0,false,false,0,0,'');
$pdf->Ln(7);
$pdf->write(5,$htmlLorem,'',true,'L',false,0,false,true,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$html7,'',false,'L',false,0,false,false,0,0,'');
$pdf->Ln(7);
$pdf->write(5,$htmlLorem,'',true,'L',false,0,true,true,20,0,'');

$pdf->addPage();

$pdf->write(5,'Exemple 5 : Stretch');
$pdf->Ln(5);
$pdf->write(5,'---------------------------------------------------------');
$pdf->Ln(10);

$pdf->write(5,$htmlLorem2,'',true,'L',false,1,false,false,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$htmlLorem2,'',true,'L',false,2,false,false,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$htmlLorem2,'',true,'L',false,3,false,false,20,0,'');
$pdf->Ln(10);

$pdf->write(5,$htmlLorem2,'',true,'L',false,4,false,false,20,0,'');
$pdf->Ln(10);


$pdf->Output('export/write.pdf', 'I');