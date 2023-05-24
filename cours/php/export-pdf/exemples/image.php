<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ' Les images', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 24));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setFont('dejavusans', 'N', 14, '', true);

$pdf->AddPage();

$pdf->setJPEGQuality(75);

$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', 'images/image_demo.jpg', 'N', false, 300, '', false, false, 0, false, false, false);
$pdf->Ln(4);
$pdf->Image('images/image_demo.jpg', '', '', 60, 60, '', 'images/image_demo.jpg', 'B', true, 300, 'C', false, false, 0, false, false, false);
$pdf->Ln(4);
$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', 'images/image_demo.jpg', 'B', false, 300, 'R', false, false, 0, false, false, false);
$pdf->Ln(4);
$pdf->Image('images/img.png', '', '', 60, 60, '', 'images/image_demo.jpg', 'B', false, 300, 'L', false, false, 1, false, false, false);
$pdf->Ln(4);
$pdf->Image('images/img.png', '', '', 60, 60, '', 'images/image_demo.jpg', 'B', false, 300, 'L', false, false, array('LTRB' => array('width' => 0.5, 'cap' => 'round', 'join' => 'miter', 'dash' => 1, 'color' => array(0, 255, 255))), false, false, false);
$pdf->Ln(4);
$pdf->writeHTML("Cacher l'image",1);
$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', 'images/image_demo.jpg', 'N', false, 300, '', false, false, 0, false, true, false);
$pdf->addPage();
$pdf->writeHTML("La taille de l'image ne dépasse pas la taille de la page");
$pdf->Image('images/image_demo.jpg', '', '', 1800, 1600, '', 'images/image_demo.jpg', 'N', false, 300, '', false, false, 0, false, false, true);

$pdf->addPage();
$pdf->writeHTML("La taille de l'image dépasse la taille de la page");
$pdf->Image('images/image_demo.jpg', '', '', 1800, 1600, '', 'images/image_demo.jpg', 'N', false, 300, '', false, false, 0, false, false, false);

$pdf->Output('export/image.pdf', 'I');