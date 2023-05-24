<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo15-pdf" ;
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
<h1>EXO15 : CHAPITRAGE</h1>";
$pdf->writeHTML($html, false, 0, false, false, 'L');	

// set a bookmark for the current position
$pdf->Bookmark('Chapter 1', 0, 0, '', 'B', array(0,64,128));

// print a line using Cell()
$pdf->Cell(0, 10, 'Chapter 1', 0, 1, 'L');

$pdf->SetFont('times', 'I', 14);
$pdf->Write(0, 'You can set PDF Bookmarks using the Bookmark() method.
You can set PDF Named Destinations using the setDestination() method.');

$pdf->SetFont('times', 'B', 20);

// add other pages and bookmarks

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.1', 1, 0, '', '', array(0,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.1', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.2', 1, 0, '', '', array(0,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.2', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Sub-Paragraph 1.2.1', 2, 0, '', 'I', array(0,0,0));
$pdf->Cell(0, 10, 'Sub-Paragraph 1.2.1', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.3', 1, 0, '', '', array(0,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.3', 0, 1, 'L');

$pdf->AddPage();
// add a named destination so you can open this document at this page using the link: "example_015.pdf#chapter2"
$pdf->setDestination('chapter2', 0, '');
// add a bookmark that points to a named destination
$pdf->Bookmark('Chapter 2', 0, 0, '', 'BI', array(128,0,0), -1, '#chapter2');
$pdf->Cell(0, 10, 'Chapter 2', 0, 1, 'L');
$pdf->SetFont('times', 'I', 14);
$pdf->Write(0, 'Once saved, you can open this document at this page using the link: "example_015.pdf#chapter2".');

$pdf->AddPage();
$pdf->setDestination('chapter3', 0, '');
$pdf->SetFont('times', 'B', 20);
$pdf->Bookmark('Chapter 3', 0, 0, '', 'B', array(0,64,128));
$pdf->Cell(0, 10, 'Chapter 3', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Chapter 4', 0, 0, '', 'B', array(0,128,0));
$pdf->Cell(0, 10, 'Chapter 4', 0, 1, 'L');
$txt = 'Example of File Attachment.
Double click on the icon to open the attached file.';
$pdf->SetFont('helvetica', '', 10);
$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

// attach an external file TXT file
$pdf->Annotation(20, 50, 5, 5, 'TXT file', array('Subtype'=>'FileAttachment', 'Name' => 'PushPin', 'FS' => 'data/utf8test.txt'));

// attach an external file
$pdf->Annotation(50, 50, 5, 5, 'PDF file', array('Subtype'=>'FileAttachment', 'Name' => 'PushPin', 'FS' => 'example_012.pdf'));

// add a bookmark that points to an embedded file
// NOTE: prefix the file name with the * character for generic file and with % character for PDF file
$pdf->Bookmark('TXT file', 0, 0, '', 'B', array(128,0,255), -1, '*utf8test.txt');

// add a bookmark that points to an embedded file
// NOTE: prefix the file name with the * character for generic file and with % character for PDF file
$pdf->Bookmark('PDF file', 0, 0, '', 'B', array(128,0,255), -1, '%example_012.pdf');

// add a bookmark that points to an external URL
$pdf->Bookmark('External URL', 0, 0, '', 'B', array(0,0,255), -1, 'http://www.tcpdf.org');



//écriture du contenu dans le fichier puis sauvegarde du fichier

$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>