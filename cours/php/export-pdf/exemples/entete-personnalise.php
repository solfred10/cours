<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Extension de la class TCPDF pour redéfinir les fonctions Header et Footer
class MYPDF extends TCPDF {
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetTextColor(0,64,255); //Couleur du texte
		$this->setFont('helvetica', 'B', 20);        
        $this->Cell(0, 15, 'Entête personnalisé', 1, false, 'C', 0, '', 0, false, 'M', 'M');        
	}

	public function Footer() {
		//Position à 15mm du bottom
		$this->setY(-15);
		$this->setFont('helvetica', 'I', 8);
		//Affichage du numéro de page (x/x)
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->setFont('dejavusans', 'N', 14, '', true);

$pdf->AddPage();

$html = <<<EOD
<h1>TITRE</h1>
<p>texte à afficher</p>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('entete-personnalise.pdf', 'I');