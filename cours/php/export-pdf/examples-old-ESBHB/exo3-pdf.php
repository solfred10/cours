<?php
//on inclu les bibiliothèque TCPDF
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$fichier = "exo3-3-pdf.pdf" ;

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo        
		$cheminLogoHeader =  "images/arobase.png" ;
        $this->Image($cheminLogoHeader, PDF_MARGIN_LEFT, 15, 5, 5, 'png', '', 'B', false, 300, 'L', false, false, 0, false, true);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0,20, 'EXO 3 - HEADER ET FOOTER PERSONNALISE', array('LTRB' => array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 0))), false, 'C', 0, '', 0, true, 'M', 'M');
       
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'B', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//propriétés du document
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('frédéric SOL');
$pdf->SetSubject('1er exercice sur les PDF');
$pdf->SetKeywords('TCPDF, PDF, example, test');

$cheminLogoHeader =  "../../f-sol.site/exos/exoGenerationPDF/images/arobase.png" ;

//header
$pdf->SetHeaderData($cheminLogoHeader, 10, "GÉNÉRATION des DPF", "Par Frédéric SOL", array(255,0,0), array(0,0,255));
$pdf->setHeaderFont(Array("helvetica", '', 16));
$pdf->SetHeaderMargin(7);

//footer
$pdf->setFooterData(array(255,0,0), array(0,0,255));
$pdf->setFooterFont(Array("Arial", '', 7));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//marge
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);

//Saut de page
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

//Police de la page
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
$pdf->AddPage();

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
//Texte HTML à afficher
$html = "";
$suite = "Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />Voici un exemple de génération de fichier PDF.<br /><br />" ;

for ($i=2;$i<=6;$i++) {
	$html .= "<b>".$i."e partie</b><br />".$suite ;
}
$pdf->writeHTML($html, true, 0, false, false, 'L');	

//Ajout d'une page
$pdf->AddPage("L","A3","","");

//Texte simple à afficher
$pdf->write(30,"test1", '',false,"L",false,0,'','',50,'','');	
$pdf->write(30,"test2", '',false,"L",true,0,'','',200,'','');	
$pdf->write(40,"test3", '',true,"L",false,0,'','',200,'','');	

//on enregistre le fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>