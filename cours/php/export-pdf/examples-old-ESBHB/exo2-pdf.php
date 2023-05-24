<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo2-pdf" ;
$extension = ".pdf" ;
$fichier = $titre.$extension ;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// set font
$pdf->SetFont('dejavusans', '', 14, '', true);

// add a page
$pdf->AddPage();

// ---------------------------------------------------------
//Texte HTML à afficher
$html = "
<h1>EXO1 : UN HEADER, UN FOOTER, ET SAUT DE PAGE</h1>
";
$suite = "Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />" ;

for ($i=2;$i<=6;$i++) {
	$html .= "<b>".$i."e partie</b><br />".$suite ;
}
$pdf->writeHTML($html, true, 0, false, false, 'L');	

//on enregistre le fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>