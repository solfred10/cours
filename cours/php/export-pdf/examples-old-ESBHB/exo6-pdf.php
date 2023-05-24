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
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {       
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0,20, 'EXO 6 - LE HTML DANS TCPDF', array('LTRB' => array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255))), false, 'C', 0, '', 0, true, 'M', 'M');
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

//Police de la page
$pdf->SetFont('helvetica', '', 11, '', true);

// add a page
$pdf->AddPage();


//texte à afficher
$html = '<h2>Caractère spéciaux</h2>
&lt; € &euro; &#8364; &amp; è &egrave; &copy; &gt;
<h2>Image</h2>
<div style="text-align:center">IMAGES<br />
	<img src="images/img2.jpg" alt="test alt attribute" width="100" height="100" border="0" />
</div>

<h2>List numérotée</h2>
<ol>    
	<li>Sed ut perspiciatis unde.</li>
    <li><b>bold text</b></li>
    <li><i>italic text</i></li>
    <li><u>underlined text</u></li>   
	<li><del>line through</del></li>	
	<li><small>small text</small></li>	
	<li><sub>subscript</sub></li>	
	<li><sub>subscript</sub></li>	
	<li><font size="+3">font + 3</font></li>
    <li><a href="http://www.tecnick.com">link to http://www.tecnick.com</a></li>
    <li>SUBLIST
        <ol>
            <li>row one
                <ul>
                    <li>sublist</li>
                </ul>
            </li>
            <li>row two</li>
        </ol>
    </li>    
    <li><font size="+3">font + 3</font></li>    
</ol>
<h2>List non numérotée</h2>
<ul>
    <li>Coffee</li>
    <li>Black hot drink</li>
    <li>Chocolate</li>
</ul>
<h2>List de description</h2>
<dl>
    <dt>Coffee</dt>
    <dd>Black hot drink</dd>
    <dt>Milk</dt>
    <dd>White cold drink</dd>
</dl>';

$pdf->writeHTML($html, false, 0, false, false, 'L');	

$pdf->addPage();

$html = '
<h2>CSS</h2>
<div>
<span style="font-weight: bold;">bold text</span><br />
<span style="text-decoration: line-through;">line-trough</span><br />
<span style="text-decoration: underline;">underline</span><br />
<span style="color: rgb(0, 128, 64);">color</span><br />
<span style="background-color: rgb(255, 0, 0);">background color</span><br />
<span style="font-weight: bold;">bold</span><br />
<span style="font-size: xx-small;">xx-small</span><br />
<span style="font-size: x-small;">x-small</span><br />
<span style="font-size: small;">small</span><br />
<span style="font-size: medium;">medium</span><br />
<span style="font-size: large;">large</span><br />
<span style="font-size: x-large;">x-large</span><br />
<span style="font-size: xx-large;">xx-large</span>
</div>';

$html .= '<h2>TABLEAUX</h2>
<table border="1" cellspacing="3" cellpadding="4">
    <tr>
        <th align="left">texte ferré à gauche</th>
        <th align="center">texte centré</th>
        <th align="right">texte ferré à droite</th>
        <th align="justify">texte justifié<br /> Lorem ipsum dolor sit amet, consectetur adipiscing</th>
    </tr>
    <tr>
        <td bgcolor="#cccccc">background color</td>
        <td  colspan="2">Texte sur 2 colonne</td>
        <td color="red">Texte en couleur</td>
    </tr>
   
    <tr>
        <td>1A</td>
        <td rowspan="2">Texte sur 2 ligne</td>
        <td>1C</td>
        <td>1D</td>
    </tr>
    <tr>
        <td>2A</td>
        <td>2C</td>
        <td>2D</td>
    </tr>
    
</table>';

$pdf->writeHTML($html, false, 0, false, false, 'L');	

//sauvegarde du fichier
$pdf->Output("pdf/".$fichier, 'F');
echo "pdf/".$fichier ;

?>