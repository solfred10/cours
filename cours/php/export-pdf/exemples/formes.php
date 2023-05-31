<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'DESSINER DES FORMES', '', array(0,64,255), array(187,11,11));
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

// define style for border
$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));
$borderCircle = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 128, 0));

/*
La méthode RECT prend en paramètres 7 arguments :
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : La longueur
4e argmument : La hauteur
5e argmument : Le style 
    F pour remplir le rectangle
    D : Pour avoir une bordure
6e argument : Le type de bordure    
7e argmument : La couleur de fond
*/

$pdf->setDrawColor(50, 0, 0, 0);
$pdf->setFillColor(100, 0, 0, 0);
$pdf->Rect(15, 25, 40, 20, 'DF', $border_style);

$pdf->Rect(65, 25, 40, 20, '', $border_style,array(255,0,0));

/*
La méthode ELLIPSE prend en paramètres 11 arguments :
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : L'angle en X (en radius)
4e argmument : L'angle en Y (en radius)
5e argmument : Rotation horaire ou anti-horaire
6e argmument : L'angle de début
7e argmument : L'angle de fin
8e argmument : Le style 
    F pour remplir le rectangle
    D : Pour avoir une bordure
9e argument :Le type de bordure 
11e argmument : ???
*/

$pdf->Ellipse(135, 35, 20, 5, 0, 0, 360, 'F', '', array(125,125,125));
$pdf->Ellipse(175,35,15,5, 0, 0, 360, 'DF', $borderCircle,array(220, 200, 200));

/*
La méthode CIRCLE prend en paramètres 9 arguments :
1er argmument : Position en X
2e argmument : Position en Y
3e argmument : Le rayon
4e argmument : L'angle de début
5e argmument : L'angle de fin
6e argmument : Le style 
    F pour remplir le rectangle
    D : Pour avoir une bordure
7e argument : Le type de bordure 
8e argmument : La couleur de fond
9e argmument : ???
*/

$pdf->setDrawColor(0, 0, 255);
$pdf->Circle(25, 65, 10, 0, 360, 'DF', '', array(0,255,0));
$pdf->Circle(55, 65, 10, 0, 360, 'DF', $borderCircle, array(255,255,0));
$pdf->Circle(85, 65, 10, 0, 90, 'DF', $borderCircle, array(255,255,0));
$pdf->Circle(85, 65, 10, 90, 180, 'DF', $borderCircle, array(255,255,0));

/*
La méthode POLYGON prend en paramètres 5 arguments :
1er argmument : Un tableau avec les coordonnées de chaque point. Les indexes paires correspondent aux abscisses et Les indexes impaires correspondent aux ordonnées 
2e argmument : Le style 
    F pour remplir le rectangle
    D : Pour avoir une bordure
3e argument : Le type de bordure 
4e argmument : La couleur de fond
5e argmument : Fermer le poygone
*/
$pdf->Polygon(array(15,85,35,85,15,165), 'DF', '', array(255,255,0), true) ;
$pdf->Polygon(array(55,85,55,105,85,165,110,165), 'D', '', array(0,255,0), true) ;

//Enregistrement du PDF
$pdf->Output('export/formes.pdf', 'I');