<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo44-pdf" ;
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


// set font
$pdf->SetFont('dejavusans', '', 14, '', true);

// add a page
$pdf->AddPage();

// Set some content to print
$html = "
<h1>EXO44 : COPIE/SUPPRESSION DE PAGES</h1>";

// print a line using Cell()
$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: A', 0, 1, 'L');

// add some vertical space
$pdf->Ln(10);

// print some text
$pdf->SetFont('times', 'I', 16);
$txt = 'TCPDF allows you to Copy, Move and Delete pages.';
$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', 'B', 40);

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: B', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: D', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: E', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: E-2', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: F', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: C', 0, 1, 'L');

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: G', 0, 1, 'L');

// Move page 7 to page 3
$pdf->movePage(7, 3);

// Delete page 6
$pdf->deletePage(6);

$pdf->AddPage();
$pdf->Cell(0, 10, 'PAGE: H', 0, 1, 'L');

// copy the second page
$pdf->copyPage(2);


//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->writeHTML($html, false, 0, false, false, 'L');	
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>