<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "exo6-pdf" ;
$extension = ".pdf" ;
$fichier = $titre.$extension ;
$html = ""; 
$suite = ""; 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('frédéric SOL');
$pdf->SetTitle($titre);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, ' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
   /* public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }*/
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// set font
$pdf->SetFont('dejavusans', '', 14, '', true);

// add a page
$pdf->AddPage();


$html = '<h2>TABLEAUX</h2>
<table border="0" cellspacing="3" cellpadding="4">
    <tr>
        <td>Frédéric SOL 06.07.11.22.28 frederic.sol@gmail.com 1 allée Colette 91270 Vigneux sur Seine INFORMATIONS PERSONNELLES Nationalité : Français Né le 10.05.1984 Titulaire du permis B FORMATION Octobre – Décembre 2010 Webdesigner 2JR Concept (95) 2006 – 2008 Master informatique Université d’Evry (91) 2002 – 2006 Licence informatique Université d’Evry (91) Juin 2002 Baccalauréat Général Série Scientifique Lycée St-Pierre, Brunoy (91)</td>
		
		<td>
			EXPERIENCES PROFESSIONNELLES
			Depuis mai 2011
			Développeur / Webmaster – J2C COMMUNICATION
			• Missions :
			- Développement de sites internet coté front et back : sites d’inscription en PHP/ MySQL / Jquery (sous la responsabilité d’un chef de projet),
			- Intégration HTML/CSS de maquette PSD,
			- Gestion de bases de données (Microsoft SQL Server et phpMyAdmin) et extractions de données en fonction des besoins,
			- Envoi d’emailing,
			- Maintenance bureautique,
			De janvier 2011 à avril 2011
			Stage développeur web – ICI BANQUES
			 Mission : Création de A à Z du site icibanques.com
			- Gestion de l’hébergeur,
			- Gestion du référencement,
			- Développement du site.
			Mai 2010
			 Mission : Refonte du site esbrunoyhandball-essonne.fr
			- Gestion de l’hébergeur,
			- Gestion du référencement,
			- Développement du site.
			En totale autonomie, j’avais pour mission de refaire entièrement le site existant.
			D’octobre 2008 à mai 2010
			Consultant – SD WORX
			 Mission :
			- Développement et maintenance d’un logiciel de paie,
			- Offrir un soutien technique aux utilisateurs.
			COMPETENCES
			- Langages informatiques : PHP, HTML, CSS, JQUERY, SQL, ASP, Git
			- Logiciels : photoshop, notepad++, filezilla, pack office, wordPress(notion)
			CENTRE D’INTERETS
			- Handball : responsable d’une équipe séniors loisirs et membre du bureau
			- Ancien arbitre de football au niveau régional
			- Cinéma
			- Jeux de société
		
		
		</td>		
    </tr>    
    
</table>';

//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->writeHTML($html, false, 0, false, false, 'L');	
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>