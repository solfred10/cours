<?php
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$header = array ('Nombres' => 'integer') ;
$row = array() ;
$sheet1 = "Feuille 1" ; //nom de l'onglet

$writer = new XLSXWriter();
$writer->writeSheetHeader($sheet1, $header);//optional
for($i=0; $i<10; $i++)
{
    $writer->writeSheetRow($sheet1, array(rand()%10000));
}
$writer->writeToFile('nombreAleatoire.xlsx');