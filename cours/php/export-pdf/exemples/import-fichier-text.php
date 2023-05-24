<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Import d'un fichier texte", '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 24));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setFont('dejavusans', 'N', 14, '', true);

$pdf->AddPage();

//insertion du fichier
$utf8text = file_get_contents('data/utf8test.txt', false);

//écriture du fichier
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);

$pdf->Output('export/import-fichier-text.pdf', 'I');