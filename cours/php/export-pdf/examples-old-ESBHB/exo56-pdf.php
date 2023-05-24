<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo56-pdf" ;
$extension = ".pdf" ;
$fichier = $titre.$extension ;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('frédéric SOL');
$pdf->SetTitle($titre);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 18);

// add a page
$pdf->AddPage();

// create some HTML content
$html = "<H1>EXO 56 - TRAITS DE COUPEs</H1>";

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);


// $pdf->Ln(5);

// color registration bars

// A,W,R,G,B,C,M,Y,K,RGB,CMYK,ALL,ALLSPOT,<SPOT_COLOR_NAME>
$pdf->colorRegistrationBar(50, 70, 40, 40, true, false, 'A,R,G,B,C,M,Y,K');
$pdf->colorRegistrationBar(90, 70, 40, 40, true, true, 'A,R,G,B,C,M,Y,K');
$pdf->colorRegistrationBar(50, 115, 80, 5, false, true, 'A,W,R,G,B,C,M,Y,K,ALL');
$pdf->colorRegistrationBar(135, 70, 5, 50, false, false, 'A,W,R,G,B,C,M,Y,K,ALL');

// corner crop marks

$pdf->cropMark(50, 70, 10, 10, 'TL');
$pdf->cropMark(140, 70, 10, 10, 'TR');
$pdf->cropMark(50, 120, 10, 10, 'BL');
$pdf->cropMark(140, 120, 10, 10, 'BR');

// various crop marks

$pdf->cropMark(95, 65, 5, 5, 'LEFT,TOP,RIGHT', array(255,0,0));
$pdf->cropMark(95, 125, 5, 5, 'LEFT,BOTTOM,RIGHT', array(255,0,0));

$pdf->cropMark(45, 95, 5, 5, 'TL,BL', array(0,255,0));
$pdf->cropMark(145, 95, 5, 5, 'TR,BR', array(0,255,0));

$pdf->cropMark(95, 140, 5, 5, 'A,D', array(0,0,255));

// registration marks

// $pdf->registrationMark(40, 60, 5, false);
// $pdf->registrationMark(150, 60, 5, true, array(0,0,0), array(255,255,0));
// $pdf->registrationMark(40, 130, 5, true, array(0,0,0), array(255,255,0));
// $pdf->registrationMark(150, 130, 5, false, array(100,100,100,100,'All'), array(0,0,0,0,'None'));



//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>