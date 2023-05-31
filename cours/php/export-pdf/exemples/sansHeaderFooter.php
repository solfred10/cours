<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//Marges
$pdf->setMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);


//Saut de page automatique
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

//code HTML à afficher
$html = <<<EOD
Page sans entête ni footer
EOD;

//Ecriture du texte
$pdf->writeHTML($html,true,true,false,false,'L');

//Ajout d'une page. Obligatoire sinon le PDF ne sera pa généré
$pdf->AddPage();

//Ecriture du texte
$pdf->writeHTML($html,true,true,false,false,'L');

//Enregistrement du PDF
$pdf->Output('PDFdeBase.pdf', 'I');