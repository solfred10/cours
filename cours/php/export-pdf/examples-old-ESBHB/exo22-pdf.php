<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo22-pdf" ;
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
<h1>EXO22 : DESSINER DES CARRÉS DE COULEURS</h1>";

$pdf->Write(0, 'Example of CMYK, RGB and Grayscale colours', '', 0, 'L', true, 0, false, false, 0);

// define style for border
$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

// --- CMYK ------------------------------------------------

$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0);
$pdf->SetTextColor(100, 0, 0, 0);
$pdf->Rect(30, 60, 30, 30, 'DF', $border_style);
$pdf->Text(30, 92, 'Cyan');

$pdf->SetDrawColor(0, 50, 0, 0);
$pdf->SetFillColor(0, 100, 0, 0);
$pdf->SetTextColor(0, 100, 0, 0);
$pdf->Rect(70, 60, 30, 30, 'DF', $border_style);
$pdf->Text(70, 92, 'Magenta');

$pdf->SetDrawColor(0, 0, 50, 0);
$pdf->SetFillColor(0, 0, 100, 0);
$pdf->SetTextColor(0, 0, 100, 0);
$pdf->Rect(110, 60, 30, 30, 'DF', $border_style);
$pdf->Text(110, 92, 'Yellow');

$pdf->SetDrawColor(0, 0, 0, 50);
$pdf->SetFillColor(0, 0, 0, 100);
$pdf->SetTextColor(0, 0, 0, 100);
$pdf->Rect(150, 60, 30, 30, 'DF', $border_style);
$pdf->Text(150, 92, 'Black');

// --- RGB -------------------------------------------------

$pdf->SetDrawColor(255, 127, 127);
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255, 0, 0);
$pdf->Rect(30, 110, 30, 30, 'DF', $border_style);
$pdf->Text(30, 142, 'Red');

$pdf->SetDrawColor(127, 255, 127);
$pdf->SetFillColor(0, 255, 0);
$pdf->SetTextColor(0, 255, 0);
$pdf->Rect(70, 110, 30, 30, 'DF', $border_style);
$pdf->Text(70, 142, 'Green');

$pdf->SetDrawColor(127, 127, 255);
$pdf->SetFillColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 255);
$pdf->Rect(110, 110, 30, 30, 'DF', $border_style);
$pdf->Text(110, 142, 'Blue');

// --- GRAY ------------------------------------------------

$pdf->SetDrawColor(191);
$pdf->SetFillColor(127);
$pdf->SetTextColor(127);
$pdf->Rect(30, 160, 30, 30, 'DF', $border_style);
$pdf->Text(30, 192, 'Gray');


//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->writeHTML($html, false, 0, false, false, 'L');	
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>