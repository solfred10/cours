<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$writer = new XLSXWriter() ;

$header = array(  
    'NOM'=>'string',//text
    'PRENOM'=>'string',    
    'DATE DE NAISSANCE'=>'date',  
  );
  
  $rows1 = array(
    array("SPORTIF"),    
  );

  $rows2 = array(    
    array('Mbappé','Killian','1998-12-20'),  
    //array('Ocon','Esteban','1996-09-17'),  
    array('Ocon','Esteban','1999-04-20'),  
    array('Quartararo','Fabio'),    
  );

$sheet1 = "Feuille 1" ; //nom de l'onglet

$col_option = ['widths'=>[10,10,20]] ;
$formatSousTitre = array('height'=>25,'font'=>'Arial','font-size'=>10,'font-style'=>'bold,italic', 'fill'=>'#666','color'=>'#000', 'halign'=>'center','valign'=>'center');
$format = array('valign'=>'center');

$writer = new XLSXWriter();
$writer->writeSheetHeader($sheet1, $header,$col_option);

foreach($rows1 as $row) {
    $writer->writeSheetRow($sheet1, $row,$formatSousTitre);
}

foreach($rows2 as $row) {
    $writer->writeSheetRow($sheet1, $row,$format);
}
$writer->markMergedCell($sheet1, $start_row=1, $start_col=0, $end_row=1, $end_col=2);
$writer->markMergedCell($sheet1, $start_row=3, $start_col=2, $end_row=4, $end_col=2);


$writer->writeToFile('fusionnerCellule.xlsx');