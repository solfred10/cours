<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo13-pdf" ;
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
<h1>EXO13 : Graphic Transformations</h1>";

$pdf->writeHTML($html, false, 0, false, false, 'L');


// --- Scaling ---------------------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(50, 70, 40, 10, 'D');
$pdf->Text(50, 66, 'Scale');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// Scale by 150% centered by (50,80) which is the lower left corner of the rectangle
$pdf->ScaleXY(150, 50, 80);
$pdf->Rect(50, 70, 40, 10, 'D');
$pdf->Text(50, 66, 'Scale');
// Stop Transformation
$pdf->StopTransform();

// --- Translation -----------------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(125, 70, 40, 10, 'D');
$pdf->Text(125, 66, 'Translate');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// Translate 7 to the right, 5 to the bottom
$pdf->Translate(7, 5);
$pdf->Rect(125, 70, 40, 10, 'D');
$pdf->Text(125, 66, 'Translate');
// Stop Transformation
$pdf->StopTransform();

// --- Rotation --------------------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(70, 100, 40, 10, 'D');
$pdf->Text(70, 96, 'Rotate');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
$pdf->Rotate(20, 70, 110);
$pdf->Rect(70, 100, 40, 10, 'D');
$pdf->Text(70, 96, 'Rotate');
// Stop Transformation
$pdf->StopTransform();

// --- Skewing ---------------------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(125, 100, 40, 10, 'D');
$pdf->Text(125, 96, 'Skew');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// skew 30 degrees along the x-axis centered by (125,110) which is the lower left corner of the rectangle
$pdf->SkewX(30, 125, 110);
$pdf->Rect(125, 100, 40, 10, 'D');
$pdf->Text(125, 96, 'Skew');
// Stop Transformation
$pdf->StopTransform();

// --- Mirroring horizontally ------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(70, 130, 40, 10, 'D');
$pdf->Text(70, 126, 'MirrorH');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// mirror horizontally with axis of reflection at x-position 70 (left side of the rectangle)
$pdf->MirrorH(70);
$pdf->Rect(70, 130, 40, 10, 'D');
$pdf->Text(70, 126, 'MirrorH');
// Stop Transformation
$pdf->StopTransform();

// --- Mirroring vertically --------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(125, 130, 40, 10, 'D');
$pdf->Text(125, 126, 'MirrorV');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// mirror vertically with axis of reflection at y-position 140 (bottom side of the rectangle)
$pdf->MirrorV(140);
$pdf->Rect(125, 130, 40, 10, 'D');
$pdf->Text(125, 126, 'MirrorV');
// Stop Transformation
$pdf->StopTransform();

// --- Point reflection ------------------------------------
$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(70, 160, 40, 10, 'D');
$pdf->Text(70, 156, 'MirrorP');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
// Start Transformation
$pdf->StartTransform();
// point reflection at the lower left point of rectangle
$pdf->MirrorP(70,170);
$pdf->Rect(70, 160, 40, 10, 'D');
$pdf->Text(70, 156, 'MirrorP');
// Stop Transformation
$pdf->StopTransform();

// --- Mirroring against a straigth line described by a point (120, 120) and an angle -20°
$angle=-20;
$px=120;
$py=170;

// just for visualisation: the straight line to mirror against

$pdf->SetDrawColor(200);
$pdf->Line($px-1,$py-1,$px+1,$py+1);
$pdf->Line($px-1,$py+1,$px+1,$py-1);
$pdf->StartTransform();
$pdf->Rotate($angle, $px, $py);
$pdf->Line($px-5, $py, $px+60, $py);
$pdf->StopTransform();

$pdf->SetDrawColor(200);
$pdf->SetTextColor(200);
$pdf->Rect(125, 160, 40, 10, 'D');
$pdf->Text(125, 156, 'MirrorL');
$pdf->SetDrawColor(0);
$pdf->SetTextColor(0);
//Start Transformation
$pdf->StartTransform();
//mirror against the straight line
$pdf->MirrorL($angle, $px, $py);
$pdf->Rect(125, 160, 40, 10, 'D');
$pdf->Text(125, 156, 'MirrorL');
//Stop Transformation
$pdf->StopTransform();


//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>