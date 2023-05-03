<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$writer = new XLSXWriter() ;

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

$sheet1 = "Feuille 1" ; //nom de l'onglet

$col_option = ['auto_filter'=>true, 'widths'=>[15,15,30]]  ;
$col_option = ['freeze_rows'=>1, 'freeze_columns'=>1,'width'=>[10,10,20]]  ;

$writer->writeSheetHeader($sheet1, array('col-string'=>'string','col-numbers'=>'integer','col-timestamps'=>'datetime'), );

$writer = new XLSXWriter();
$writer->writeSheetHeader($sheet1, $header,$col_option);

//Une autre façon de faire , sans avoir à utiliser les méthodes writeSheetHeader et writeSheetRow
//$writer->writeSheet($rows,$sheet1,$header);//or write the whole sheet in 1 call

foreach($rows as $row) {
    $writer->writeSheetRow($sheet1, $row);
}

$writer->writeToFile('figerEntete.xlsx');