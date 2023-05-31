<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'EFFET SUR LE TEXTE', '', array(0,64,255), array(187,11,11));
$pdf->setFooterData(array(187,11,11),array(0,64,255));

//Police de l'entête et du pied de page
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'I', 12));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, 'I', PDF_FONT_SIZE_DATA));

//Marges
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

//Saut de page automatique
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

/*
La méthode setTextRenderingMode prend en paramètre 3 arguments :
1er argument : La taille du contour
2e argument : Remplir ou non le texte
3e argument : ??? 
*/

$pdf->SetFillColor(array(255,0,0));
$pdf->setTextRenderingMode($stroke=0.1, $fill=true, $clip=false);
$pdf->Write(0, 'Fill text ', '', 0, '', true, 0, false, false, 0);

$pdf->setTextRenderingMode($stroke=0.2, $fill=false, $clip=false);
$pdf->Write(0, 'Stroke text', '', 0, '', true, 0, false, false, 0);

$pdf->setTextRenderingMode($stroke=0.2, $fill=false, $clip=false);
$pdf->Write(0, 'Fill, then stroke text', '', 0, '', true, 0, false, false, 0);

$pdf->StartTransform();
$pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=true);
$pdf->Write(0, 'Fill text and add to path for clipping', '', 0, '', true, 0, false, false, 0);
$pdf->Image('images/image_demo.jpg', 15, 65, 170, 10, '', '', '', true, 72);
$pdf->StopTransform();

$pdf->StartTransform();
$pdf->setTextRenderingMode($stroke=0.3, $fill=false, $clip=true);
$pdf->Write(0, 'Stroke text and add to path for clipping', '', 0, '', true, 0, false, false, 0);
$pdf->Image('images/image_demo.jpg', 15, 75, 170, 10, '', '', '', true, 72);
$pdf->StopTransform();

$pdf->StartTransform();
$pdf->setTextRenderingMode($stroke=0.3, $fill=true, $clip=true);
$pdf->Write(0, 'Fill, then stroke text and add to path for clipping', '', 0, '', true, 0, false, false, 0);
$pdf->Image('images/image_demo.jpg', 15, 85, 170, 10, '', '', '', true, 72);
$pdf->StopTransform();

$pdf->StartTransform();
$pdf->setTextRenderingMode($stroke=0, $fill=false, $clip=true);
$pdf->Write(0, 'Add text to path for clipping', '', 0, '', true, 0, false, false, 0);
$pdf->Image('images/image_demo.jpg', 15, 95, 170, 10, '', '', '', true, 72);
$pdf->StopTransform();

// reset text rendering mode
$pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);

$html  = '<span stroke="0" fill="true">HTML Fill text</span><br />';
$html .= '<span stroke="0.2" fill="false">HTML Stroke text</span><br />';
$html .= '<span stroke="0.2" fill="true" strokecolor="#FF0000" color="#FFFF00">HTML Fill, then stroke text</span><br />';
$html .= '<span stroke="0" fill="false">HTML Neither fill nor stroke text (invisible)</span><br />';

$pdf->writeHTML($html, true, 0, true, 0);

//Ecriture du texte
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

//Enregistrement du PDF
$pdf->Output('export/effetTexte.pdf', 'I');