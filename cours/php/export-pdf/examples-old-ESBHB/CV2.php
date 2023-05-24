<?php
// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf_5_9_205/config/lang/fra.php');
require_once('../../../tcpdf_5_9_205/tcpdf.php');

$titre = "CV_FredericSol" ;
$extension = ".pdf" ;
$fichier = $titre.$extension ;







// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 5, ' ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Frédéric SOL');
$pdf->SetAuthor('Frédéric SOL');
// $pdf->SetTitle('CV Frédéric SOL');
$pdf->SetSubject('CV Frédéric SOL');
 

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(5, 10, 5);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(2);

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
$pdf->SetFont('arial', '', 9, '', true);

// add a page
$pdf->AddPage();

$colonneGauche = '<table border="0" cellpadding="1mm">
	<tr>
		<td colspan="2" style="text-align:center">
			<br />
			<img src="images/fredericSOL.png" style="width:35mm" />
			<br />
			<span style="font-weight:bold;font-size:14pt">Frédéric SOL</span>
			<br /><br /><br />
		</td>
	</tr>
	
	<tr>
		<td style="width:9mm">
			<img src="images/portable.png" />
		</td>
		<td valign="center" style="width:48mm">
			<br />
			06.07.11.22.28 
			<br /><br />
		</td>
	</tr>
	
	<tr>	
		<td>
			<img src="images/arobase.png" border="0" />
		</td>
		<td>
			frederic.sol@gmail.com 
			<br /><br />
		</td>
	</tr>
	
	<tr>	
		<td>
			<img src="images/localisation.png" border="0" />
		</td>
		<td>
			1 allée Colette 91270 Vigneux sur Seine
			<br /><br />
		</td>	
	</tr>
</table>
	
<table border="0">	
	<tr>	
		<td >
			<table border="0" cellpadding="2mm">
				<tr>
					<td style="width:15mm">
						<img src="images/infoPerso.png" style="width:15mm" />
					</td>
					<td style="width:42mm;">
						<b>INFORMATIONS <br />PERSONNELLES</b>
					</td>
				</tr>
			</table>
			
		</td>			
	</tr>
	
	<tr>	
		<td>
			
			Nationalité : Français 
			<br />
			Né le 10.05.1984 
			<br />
			Titulaire du permis B
			<br /><br />
		</td>	
	</tr>
	
</table>

<table border="0">	
	<tr>	
		<td >
			<table border="0" cellpadding="2mm">
				<tr>
					<td style="width:15mm">
						<img src="images/formation.png" style="width:15mm" />
					</td>
					<td style="width:42mm;">
						<b>FORMATION</b>
					</td>
				</tr>
			</table>
			
		</td>			
	</tr>
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">octobre – décembre 2010</span>
			<br />
			<span style="color:#000;font-weight:bold">Webdesigner</span> 
			<br />
			2JR Concept (95) 
			<br /><br /><br />
			
			<span style="color:#0000FF;font-weight:bold">2006 – 2008</span> 
			<br />
			<span style="color:#000;font-weight:bold">Master informatique</span> 
			<br />
			Université d’Evry (91) 
			<br /><br /><br />
			
			<span style="color:#0000FF;font-weight:bold">2002 – 2006</span> 
			<br />
			<span style="color:#000;font-weight:bold">Licence informatique</span> 
			<br />
			Université d’Evry (91) 
			<br /><br /><br />
			
			<span style="color:#0000FF;font-weight:bold">juin 2002</span> 
			<br />
			<span style="color:#000;font-weight:bold">Baccalauréat Général Série Scientifique</span> 
			<br />
			Lycée St-Pierre, Brunoy (91)
			<br />
		</td>	
	</tr>
	
</table>
';

$colonneDroite = '<table border="0">	
	<tr>	
		<td>
			<table border="0" cellpadding="2mm">
				<tr>
					<td style="width:15mm">
						<img src="images/experience.png" style="width:15mm" />
					</td>
					<td style="width:115mm;">
						<b>EXPERIENCES PROFESSIONNELLES</b>
					</td>
				</tr>
			</table>			
		</td>			
	</tr> 
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">septembre 2019
			<br />
			Développeur web / chef de projet – opsomai
			</span>						
			<ul style="margin:0;padding:0">
				<li>Développement de sites internet coté front et back</li>
				<li>Recueil de l’expression des besoins</li>
				<li>Rédaction des spécifications fonctionnelles</li> 
				<li>Recette interne avant livraison</li> 				
				<li>Documentation</li>
			</ul>
			<br /><br />
		</td>	
	</tr>
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">mai 2011 - août 2019
			<br />
			Développeur / Webmaster – J2C COMMUNICATION
			</span>						
			<ul style="margin:0;padding:0">
				<li>Développement de sites internet coté front et back : sites d’inscription en PHP/ MySQL / Jquery (sous la responsabilité d’un chef de projet),</li>
				<li>Intégration HTML/CSS de maquette PSD,</li>
				<li>Gestion de bases de données (Microsoft SQL Server et phpMyAdmin) et extractions de données en fonction des besoins,</li>
				<li>Envoi d’emailing,</li>
				<li>Maintenance bureautique,</li>
			</ul>
			<br /><br />
		</td>	
	</tr>
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">janvier 2011 - avril 2011
			<br />
			Stage développeur web – ICI BANQUES
			</span>				
			<ul style="margin:0;padding:0">
				<li>Gestion de l’hébergeur,</li>
				<li>Gestion du référencement,</li>
				<li>Développement du site,</li>				
			</ul>
			<br /><br />
		</td>	
	</tr>
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">Mai 2010			
			</span>			
			<br />
			Refonte du site internet du club de handball de brunoy
			<ul style="margin:0;padding:0">
				<li>Gestion de l’hébergeur,</li>
				<li>Gestion du référencement,</li>
				<li>Développement du site,</li>				
			</ul>
			<br /><br />
		</td>	
	</tr>
	
	<tr>	
		<td>			
			<span style="color:#0000FF;font-weight:bold">octobre 2008 - mai 2010
			<br />
			Consultant – SD WORX			
			</span>						
			<ul style="margin:0;padding:0">
				<li>Développement et maintenance d’un logiciel de paie,</li>
				<li>Offrir un soutien technique aux utilisateurs,</li>						
			</ul>			
			<br /><br />
		</td>	
	</tr>
	
	
	<tr>	
		<td>
			<table border="0" cellpadding="2mm">
				<tr>
					<td style="width:15mm">						
						<img src="images/competence.png" style="width:15mm" />
					</td>
					<td style="width:115mm;">						
						<b>COMPÉTENCES</b>
					</td>
				</tr>
			</table>			
		</td>			
	</tr> 
	
	<tr>	
		<td>							
			<ul style="margin:0;padding:0">
				<li>Langages informatiques : PHP, HTML, CSS, JQUERY, SQL, ASP, Git</li>							
				<li>Logiciels : photoshop, notepad++, filezilla, pack office, wordPress(notion)</li>	
			</ul>			
			<br /><br />
		</td>	
	</tr>
	
	<tr>	
		<td>
			<table border="0" cellpadding="2mm">
				<tr>
					<td style="width:15mm">						
						<img src="images/interet.png" style="width:10mm" />
					</td>
					<td style="width:115mm;">						
						<b>CENTRE D’INTERETS</b>
					</td>
				</tr>
			</table>			
		</td>			
	</tr> 
	
	<tr>	
		<td>							
			<ul style="margin:0;padding:0">
				<li>Ancien responsable d’une équipe séniors de handball et membre du bureau</li>							
				<li>Ancien arbitre de football au niveau régional</li>	
				<li>Cinéma, séries</li>	
				<li>Jeux de société</li>	
			</ul>	
		</td>	
	</tr>
	
	</table>
';
/*

			
			
*/
$html = '
<table border="0" cellspacing="3" cellpadding="4">
    <tr>
        <td style="width:60mm;background-color:#efefef">'.$colonneGauche.'</td>
        <td style="width:135mm;background-color:#fff">'.$colonneDroite.'</td>
    </tr>    
    
</table>';

//écriture du contenu dans le fichier puis sauvegarde du fichier
$pdf->writeHTML($html, false, 0, false, false, 'L');	
$pdf->Output($fichier, 'F');
echo $fichier ;

?>