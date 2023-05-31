<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

//Définition des cellules d'entête
$header = array(  
    'NOM'=>'string',//type text
    'POIDS'=>'integer', //type int 
    'PRIX'=>'price',  //type prix
    'DATE DE SORTIE'=>'date', //type date au format AAA/MM/JJ
    'MAJ OS'=>'DD/MM/YYY', //type date préformaté
    'HEURE DE MAJ'=>'time', //type date au format heure
    'DATE COMPLETE' => 'MM/DD/YYYY HH:MM:SS', //type date au format avec le jour et l'heure
    '% DE VENTE EN FRANCE'=>'0%', //si on met 10 dans la cellule ça fera 1000%
    '% DE VENTE EN EUROPE'=>'0.0%', //pourcentage avec un chiffre après la virgule
    '% DE VENTE DANS LE MONDE'=>'0.00%', //pourcentage avec 2 chiffres après la virgule       
);

//lignes
$rows = array(
    array('iphone 15',200,1500,'2022-01-01','2023-02-02','2023-02-02 23:59:59','2023-02-02 23:59:59',0.5,0.4,0.7),
    array('samsung S22',300,1400,'2023-03-03','2023-04-04','2023-04-04 23:59:59','2023-04-04 23:59:59',40,35.5,20.54),
    array('Rednote 21',400,1300,'2021-05-05','2022-06-06','2022-06-06 23:59:59','2022-06-06 23:59:59',10,24.5,9.46),
);

//option des cellules
$colFontStyle = array('bold','italic','normal'); 
$colFontSize = array(10,12,14) ;
$color = array('green'=>'#0f0','red'=>'#ff0000',"blue"=>"#00ffff","white"=>"#fff","black"=>"#000"); 
$colHorizontalAlign = array('left','center','right'); 
$colVerticalAlign = array('top','center','bottom'); 
$colHauteur = array(16,18,20,30,40);
$colWidth = array(15,20,25);
$colBorderStyle = array("thin","dotted");
$colBorderPosition = array("top","right","left","bottom");

$styleHeader = array(
    'font-style'=>'bold', //style de la police
    'font-size'=>$colFontSize[0], //taille de la police
    'freeze_rows'=>1, //figer les cellules d'entête
    'auto_filter'=>true, //filtre
    'widths'=>[$colWidth[0],$colWidth[1],$colWidth[2]], //largeur des 3 premières cellules
);

$col_options = array(
    'font-style'=>$colFontStyle[1], //style de la police
    'font-size'=>$colFontSize[0], //taille de la police
    'color'=>$color["red"], //couleur du texte
    'fill'=>$color["blue"], //couleur de fond de la cellule
    'halign'=>$colHorizontalAlign[0], //alignement horizontal
    'valign'=>$colVerticalAlign[2], //alignement vertical
    'height'=>$colHauteur[2], //hauteur de la cellule
    'border-style'=>$colBorderStyle[0], //style de la bordure
    'border'=>"".$colBorderPosition[1].",".$colBorderPosition[0], //position de la bordure
);

$sheet1 = 'onglet1'; //nom de l'onglet 1
$sheet2 = 'onglet2'; //nom de l'onglet 2

//Création de l'objet Excel
$writer = new XLSXWriter();

//écriture des cellules d'entête
$writer->writeSheetHeader($sheet1, $header,$styleHeader);

//écriture des lignes
foreach($rows as $row) {
    $writer->writeSheetRow($sheet1, $row,$col_options);
}	

//Une autre façon de faire , sans avoir à utiliser les méthodes writeSheetHeader et writeSheetRow
$writer->writeSheet($rows,$sheet2,$header);//or write the whole sheet in 1 call

//Création du fichier excel
$filename = "recapExportExcel.xls" ;
$writer->writeToFile('export/'.$filename);

if (file_exists('export/'.$filename)) {  
    header('Content-Disposition: attachment; filename="'.basename('export/'.$filename).'"');
    readfile('export/'.$filename);
    //unlink('export/'.$filename);
    exit;
} 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script src="../../../js/fonctionsJS.js"></script>