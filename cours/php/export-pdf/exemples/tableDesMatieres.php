<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'TABLE DES MATIERES', '', array(0,64,255), array(187,11,11));
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

//Ajout d'une page. Obligatoire sinon le PDF ne sera pas généré
$pdf->AddPage();

/*
La méthode  BOOKMARK prend en paramètre 8 arguments :
1er argument : Le nom du chapitre dans la table des matières
2e argument : Le niveau du chapitre (0 pour le 1er niveau)
3e argument : ???
4e argument : Le numéro de la page (laisser vide pour une numérotation automatique). C'est ce paramètre qui va permettre d'accèder à la page
5e argument : Le style
	B : Gras
	I : Italique
	BI : Gras et italique
6e argument : Couleur
7e argument : ???
8e argument : ???
*/

/* la méthode SETLINK prend en paramètre 3 arguments :
1er argument : L'ID du lien retourner par la méthode AddLink()
2e argument : ???
3e argument : Le numéro de la page cible 
*/	 


//Création du chapitre dans la table des matières
$pdf->Bookmark('Chapitre 1', 1, 0, '', 'B', array(0,64,128));

$pdf->writeHTML("Chapitre 1",true,true,false,false,'L');

//Lien sur la page 2 qui va permette de revenir à la table des matières quand on va cliquer dessus
$index_link = $pdf->AddLink();
$pdf->setLink($index_link, 0, '*1');
$pdf->Cell(0, 10, 'Link to INDEX', 0, 1, 'R', false, '');

$pdf->AddPage();
$pdf->Bookmark('Sous Chapitre 1.1', 1, 0, '', '', array(128,0,0));
$pdf->writeHTML("Sous Chapitre 1.1",true,true,false,false,'L');

$pdf->AddPage();
$pdf->Bookmark('Sous Chapitre 1.2', 1, 0, '', '', array(128,0,0));
$pdf->writeHTML("Sous Chapitre 1.2",true,true,false,false,'L');

$pdf->AddPage();
$pdf->Bookmark('Sous-sous Chapitre 1.2.1', 2, 0, '', 'I', array(0,128,0));
$pdf->writeHTML("Sous-sous Chapitre 1.2.1",true,true,false,false,'L');

$pdf->AddPage();
// $pdf->Bookmark('Chapitre 2', 0, 0, '', 'B', array(0,64,128));
$pdf->Bookmark('Chapitre 2', 0, 0, '');
$pdf->writeHTML("Chapitre 2",true,true,false,false,'C');


//Création de la page qui va contenir la table des matières (un peu comme la méthode addPage)
$pdf->addTOCPage();

$pdf->setFont('times', 'B', 16);
$pdf->writeHTML("Table des matières",true,true,false,false,'C');
$pdf->Ln();

/*
 La méthode addTOC (TOC pour Table Of Content) prend en paramètres 5 arguments
 1er argument : Numéro de la apge où doit s'insérer la table des matières
 2e argument : Police
 3e argument : Séparateur entre le nom du chapitre et le numéro de page
 4e argument : Le style
	B : Gras
	I : Italique
	BI : Gras et italique
5e argument : Couleur
 */

//Création de la table des matières
$pdf->addTOC(1, 'courier', '.', 'INDEX 2', 'B', array(255,255,0));

//Fin de la création de la table des matières
$pdf->endTOCPage();

//Enregistrement du PDF
$pdf->Output('export/tableDesMatieres.pdf', 'I');