<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo62-pdf" ;
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

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

// create some HTML content
$html = "<H1>EXO 62 - LES TEMPLATE</H1>";

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// start a new XObject Template and set transparency group option
$template_id = $pdf->startTemplate(60, 60, true);

// create Template content
// ...................................................................
//Start Graphic Transformation
$pdf->StartTransform();

// set clipping mask
$pdf->StarPolygon(30, 30, 29, 10, 3, 0, 1, 'CNZ');

// draw jpeg image to be clipped
$pdf->Image('images/img1.jpg', 0, 0, 60, 60, '', '', '', true, 72, '', false, false, 0, false, false, false);

//Stop Graphic Transformation
$pdf->StopTransform();

$pdf->SetXY(0, 0);

$pdf->SetFont('times', '', 40);

$pdf->SetTextColor(255, 0, 0);

// print a text
$pdf->Cell(60, 60, 'Template', 0, 0, 'C', false, '', 0, false, 'T', 'M');
// ...................................................................

// end the current Template
$pdf->endTemplate();


// print the selected Template various times using various transparencies

$pdf->SetAlpha(0.4);
$pdf->printTemplate($template_id, 15, 50, 20, 20, '', '', false);

$pdf->SetAlpha(0.6);
$pdf->printTemplate($template_id, 27, 62, 40, 40, '', '', false);

$pdf->SetAlpha(0.8);
$pdf->printTemplate($template_id, 55, 85, 60, 60, '', '', false);

$pdf->SetAlpha(1);
$pdf->printTemplate($template_id, 95, 125, 80, 80, '', '', false);




//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>