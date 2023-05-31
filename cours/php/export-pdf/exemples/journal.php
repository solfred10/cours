<?php
//Chargement de la bibliothèque TCPDF
require_once('../TCPDF-main/examples/tcpdf_include.php');

//Création de l'objet PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Texte dans le header et le footer
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'JOURNAL', '', array(0,64,255), array(187,11,11));
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

// define some html content for testing
$txt = '<p style="text-align:justify;color:blue;font-size:12pt;"><span style="color:red;font-size:14pt;font-weight:bold;">TEST PAGE REGIONS:</span> <span style="color:green;">A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code. A region is always aligned on the left or right side of the page ad is defined using a vertical segment. You can set multiple regions for the same page. You can combine several adjacent regions to approximate curved shapes.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.
Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.
Integer non sem eget neque mattis accumsan. Maecenas eu nisl mauris, sit amet interdum ipsum. In pharetra erat vel lectus venenatis elementum. Nulla non elit ligula, sit amet mollis urna. Morbi ut gravida est. Mauris tincidunt sem et turpis molestie malesuada. Curabitur vel nulla risus, sed mollis erat. Suspendisse vehicula accumsan purus nec varius. Donec fermentum lorem id felis sodales dictum. Quisque et dolor ipsum. Nam luctus consectetur dui vitae fermentum. Curabitur sodales consequat augue, id ultricies augue tempor ac. Aliquam ac magna id ipsum vehicula bibendum. Sed elementum congue tristique. <img src="images/image_demo.jpg" width="5mm" height="5mm" /> Phasellus vel lorem eu lectus porta sodales. Etiam neque tortor, sagittis id pharetra quis, laoreet vel arcu.
Cras quam mi, ornare laoreet laoreet vel, vehicula at lacus. Maecenas a lacus accumsan augue convallis sagittis sed quis odio. Morbi sit amet turpis diam, dictum convallis urna. Cras eget interdum augue. Cras eu nisi sit amet dolor faucibus porttitor. Suspendisse potenti. Nunc vitae dolor risus, at cursus libero. Suspendisse bibendum tellus non nibh hendrerit tristique. Mauris eget orci elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta libero non ante laoreet semper. Proin volutpat sodales mi, ac fermentum erat sagittis in. Vivamus at viverra felis. Ut pretium facilisis ante et pharetra.
Nulla facilisi. Cras varius quam eget libero aliquam vitae tincidunt leo rutrum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque a nisl massa, quis pretium urna. Proin vel porttitor tortor. Cras rhoncus congue velit in bibendum. Donec pharetra semper augue id lacinia. Quisque magna quam, hendrerit eu aliquam et, pellentesque ut tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas nulla quam, rutrum eu feugiat at, elementum eu libero. Maecenas ullamcorper leo et turpis rutrum ac laoreet eros faucibus. Phasellus condimentum lorem quis neque imperdiet quis molestie enim iaculis.</p>';


// add a page
$pdf->AddPage();

// print some graphic content
$pdf->Image('images/image_demo.jpg', 155,  30, 40, 40, 'JPG', '', '', true);
$pdf->Image('images/image_demo.jpg',  15, 230, 40, 40, 'JPG', '', '', true);

// define no-write page regions to avoid text overlapping images
/*
	'page' => page number or empy for current page
	'xt' => X top
	'yt' => Y top
	'yb' => Y bottom
	'side' => page side ('L' = left or 'R' = right)
*/
$regions = array(
array('page' => '', 'xt' => 153, 'yt' =>  30, 'xb' => 153, 'yb' =>  70, 'side' => 'R'),
array('page' => '', 'xt' =>  60, 'yt' =>  90, 'xb' =>  70, 'yb' => 140, 'side' => 'L'),
array('page' => '', 'xt' => 143, 'yt' => 130, 'xb' => 153, 'yb' => 180, 'side' => 'R'),
array('page' => '', 'xt' =>  58, 'yt' => 230, 'xb' =>  58, 'yb' => 270, 'side' => 'L')
);

$regions = array(
    array('page' => '', 'xt' => 153, 'yt' =>  30, 'xb' => 153, 'yb' =>  70, 'side' => 'R'),
    array('page' => '', 'xt' => 60, 'yt' =>  230, 'xb' => 60, 'yb' =>  272, 'side' => 'L'),
    );

// set page regions, check also getPageRegions(), addPageRegion() and removePageRegion()
$pdf->setPageRegions($regions);

// write html text
$pdf->writeHTML($txt, true, false, true, false, '');

//Enregistrement du PDF
$pdf->Output('export/journal.pdf', 'I');