<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$writer = new XLSXWriter() ;

$header = array(  
    'NOM'=>'string',//text
    'PRENOM'=>'string',    
    'DATE DE NAISSANCE'=>'date',  
);

$rows1 = array(    
    array('Mbappé','Killian','1998-12-20'),  
    array('Ocon','Esteban','1996-09-17'),  
    array('Quartararo','Fabio','1999-04-20'),    
);
  
$rows2 = array(    
    array('Dupont','Antoine','1996-11-15'),  
    array('Ntamak','Romain','1999-05-01'),    
);

$sheet1 = 'onglet1'; //nom de l'onglet
$sheet2 = 'onglet2'; //nom de l'onglet
$col_option = ['widths'=>[10,10,30]]  ;

$writer->writeSheetHeader($sheet1, $header, $col_option);

foreach($rows1 as $row) {
    $writer->writeSheetRow($sheet1, $row);
}

$writer->writeSheetHeader($sheet2, $header,$col_option);
foreach($rows2 as $row) {
    $writer->writeSheetRow($sheet2, $row);
}

$writer->writeToFile('plusieursOnglets.xlsx');