<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo5-pdf" ;
$extension = ".pdf" ;
$fichier = $titre.$extension ;

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {       
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0,20, 'EXO 5 - LES TABLEAUX', array('LTRB' => array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255))), false, 'C', 0, '', 0, true, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'B', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 005', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
 
$pdf-> setPrintfOOTER (false);

// ---------------------------------------------------------

//Police de la page
$pdf->SetFont('helvetica', '', 11, '', true);

// add a page
$pdf->AddPage();

//padding des cellules
$pdf->setCellPaddings(5, 5, 5, 5);

//margin des cellules
$pdf->setCellMargins(3, 3, 3, 3);

//background des cellules
$pdf->SetFillColor(255, 255, 127);

// set some text for example
$txt = '<b>Lorem ipsum dolor sit amet</b>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
$txt0 = 'Voici un texte classique';
$txt1 = 'Voici un texte qui va dépasser mais en faite non. Voici un texte qui va dépasser mais en faite non';
$txt2 = 'texte toute la cellule';
$txt3 = 'Voici un texte qui va dépasser mais en faite non';
$txt4 = 'Voici un texte qui va dépasser mais en faite non';

// MultiCell( $w, $h, $txt, $border = 0, $align = 'J', $fill = false, $ln = 1, $x = '', $y = '', $reseth = true, $stretch = 0, $ishtml = false, $autopadding = true, $maxh = 0, $valign = 'T', $fitcell = false )
// MultiCell( longueurDeLaCellule, hauteurDeLaCellule, texteAafficher, bordureDeLacellue(1), alignementDuTexte(2), couleurDeFond(3), positionProchaineCellule(4), positionXsurlaPage, positionYsurlaPage, ResetDernièreHauteur(5), etirementDuTexte(6), $ishtml = false(7), paddingAutomatique, hauteurMax, alignementVertical(8), $fitcell(9) )

/*
(1) valeur possible : 0,1 T, R, B,L 
(2) valeur possible : L, C, R, J pour gauche, centré, droite, justifié
(3) valeur possible : true, false
(4) valeur possible : 0 (to the right), 1(to the beginning of the next line [DEFAULT]), 2:  (below) 
(5) valeur possible : true, false
(6) valeur possible : 
		0 (désactivé) disabled
		1 (si le texte est plus grand que la longueur de la cellule alors on force pour qu'il rentre) 
		2 (on force le texte à prendre toute la longueur de la cellule) 
		3 (réduction de l'espace entre les caractères pour que le texte de dépense pas de la cellule) c
		4 (Espacement forcé des caractères pour s'adapter à la longueur de la cellule)  
(7) pour indiquer si le texte est du html. toujours laisser à false et utiliser la méthode writeHTMLCell
(8) valeur possible : T, M, B pour top, middle, bottom
(9) : ajustement di texte dans la cellule en réduisant la taille de la police (ne fonctionne pas en mode HTML)
*/

// Multicell test
$pdf->MultiCell(55, 25, '[LEFT] '.$txt, array('LTRB' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0))), 'L', 1, 0, '', '', false,0,true,false,25);
$pdf->MultiCell(55, 15, '[RIGHT] '.$txt, 1, 'R', 0, 1,  '', '', true,0,true);
$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, ' ', 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt, 1, 'J', 1, 1, '' ,'', true);

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

$pdf->SetFillColor(220, 255, 220);

// set some text for example
$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

// Vertical alignment
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - TOP] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'T');
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] '.$txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');


//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->Output($fichier, 'F');
echo $fichier ;

?>