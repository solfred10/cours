<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$header = array(  
    'NOM'=>'string',//text
    'PRENOM'=>'string',    
    'DATE DE NAISSANCE'=>'date',  
);
  
  $rows = array(
    array('Mbappé','Killian','1998-12-20'),  
    array('Ocon','Esteban','1996-09-17'),  
    array('Quartararo','Fabio','1999-04-20'),    
);

$sheet1 = 'onglet1'; //nom de l'onglet

$col_options = ['widths'=>[20,20,30]] ;
$row_options = ['height'=>20] ;

$writer = new XLSXWriter();
$writer->writeSheetHeader($sheet1, $header,$col_options);//optional

//1ère ligne en italic
foreach($rows as $row) {
    $writer->writeSheetRow($sheet1, $row,$row_options);
  }

$writer->writeToFile('tailleCellule.xlsx');

