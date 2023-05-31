<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'FORMULAIRE', '', array(0,64,255), array(187,11,11));
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

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

/*
La méthode TEXTFIELD prend en paramètre 8 arguments
1er argument : Le libellé
2e argument : La longueur du champ
3e argument : La hauteur du champ
4e argument : Propriété javascript
5e argument : ???
6e argument : Position en X
7e argument : Position en Y
8e argument : Autoriser ou non le javascript
*/

/*
La méthode COMBOBOX permet de créer un menu déroulant et prend en paramètre 9 arguments
1er argument : Le libellé
2e argument : La longueur du champ
3e argument : La hauteur du champ
4e argument : Tableau de valeur possible
5e argument : Propriété javascript
6e argument : ???
7e argument : Position en X
8e argument : Position en Y
9e argument : Autoriser ou non le javascript
*/

/*
La méthode LISTBOX permet de créer un menu déroulant multi-choix et prend en paramètre 9 arguments
1er argument : Le libellé
2e argument : La longueur du champ
3e argument : La hauteur du champ
4e argument : Tableau de valeur possible
5e argument : Propriété javascript
6e argument : ???
7e argument : Position en X
8e argument : Position en Y
9e argument : Autoriser ou non le javascript
*/

/*
La méthode RADIOBUTTON permet de créer des boutons radios et prend en paramètre 9 arguments
1er argument : Le libellé
2e argument : Taille des boutons
3e argument : Propriété javascript
4e argument : ???
5e argument : Valeur
6e argument : Coché ou non par defaut
7e argument : Position en X
8e argument : Position en Y
9e argument : Autoriser ou non le javascript
*/

/*
La méthode CHECKBOX permet de créer des boutons radios et prend en paramètre 9 arguments
1er argument : Le libellé
2e argument : Taille des boutons
3e argument : Coché ou non par defaut
4e argument : Propriété javascript
5e argument : ???
6e argument : Valeur
7e argument : Position en X
8e argument : Position en Y
9e argument : Autoriser ou non le javascript
*/

//Prénom
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Prénom</b>', 0, 0, false, false, 'L', true);
$pdf->TextField('firstname', 50, 5,array(),array(),'','',false);
$pdf->Ln(6);

//nom
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Nom</b>', 0, 0, false, false, 'L', true);
$pdf->TextField('lastname', 50, 5);
$pdf->Ln(6);

//genre
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Genre</b>', 0, 0, false, false, 'L', true);
$pdf->ComboBox('gender', 30, 5, array(array('', '-'), array('M', 'Homme'), array('F', 'Femme')));
$pdf->Ln(6);

//Multiselect
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Sport pratiqué</b>', 0, 0, false, false, 'L', true);
$pdf->ListBox('listbox', 60, 20, array('', 'Running', 'Handball', 'Badminton', 'Tennis', 'Foot'), array('multipleSelection'=>'true'));
$pdf->Ln(25);

//adresse
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Adresse</b>', 0, 0, false, false, 'L', true);
$pdf->TextField('address', 60, 18, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>'aaa', 'dv'=>'bbb'));
$pdf->Ln(20);

//boisson
$pdf->writeHTMLCell(35, 0, '' , '', '<b>Boisson</b>', 0, 0, false, false, 'L', true);
$pdf->RadioButton('drink', 5, array(), array(), 'Bière');
$pdf->Cell(35, 5, 'Bière');
$pdf->Ln(6);

$pdf->writeHTMLCell(35, 0, '' , '', '', 0, 0, false, false, 'L', true);
$pdf->RadioButton('drink', 5, array(), array(), 'Rhum', true);
$pdf->Cell(35, 5, 'Rhum');
$pdf->Ln(6);

$pdf->writeHTMLCell(35, 0, '' , '', '', 0, 0, false, false, 'L', true);
$pdf->RadioButton('drink', 5, array(), array(), 'Vin');
$pdf->Cell(35, 5, 'Vin');
$pdf->Ln(6);

$pdf->writeHTMLCell(35, 0, '' , '', '', 0, 0, false, false, 'L', true);
$pdf->RadioButton('drink', 5, array(), array(), 'Eau');
$pdf->Cell(35, 5, 'Eau');
$pdf->Ln(10);

// Newsletter
$pdf->writeHTMLCell(50, 0, '' , '', 'Inscription à la newsletter', 0, 0, false, false, 'L', true);
$pdf->CheckBox('newsletter', 5, true, array(), array(), 'OK');
$pdf->Ln(10);

$pdf->writeHTMLCell(0, 0, '' , '', "<b>Reste à faire : </b><br>Liste des paramètres des différentes fonctions d'affichage du formulaire<br>Fonction javascript pour vérifier que tous les champs obligatoires sont bien renseignés", 0, 0, false, false, 'L', true);

//Enregistrement du PDF
$pdf->Output('export/formulaire.pdf', 'I');