<?php
//set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$header = array(  
  'NOM'=>'string',//text
  'POIDS'=>'integer',  
  'PRIX'=>'price',  
  'DATE DE SORTIE'=>'date',
  'MAJ OS'=>'DD/MM/YYY',
  'HEURE DE MAJ'=>'time', 
  'DATE COMPLETE' => 'MM/DD/YYYY HH:MM:SS',
  '% DE VENTE EN FRANCE'=>'0%', //si on met 10 dans la cellule ça fera 1000%
  '% DE VENTE EN EUROPE'=>'0.0%',
  '% DE VENTE DANS LE MONDE'=>'0.00%',  
     
);
$rows = array(
  array('iphone 15',200,1500,'2022-01-01','2023-02-02','2023-02-02 23:59:59','2023-02-02 23:59:59',0.5,0.4,0.7),
  array('samsung S22',300,1400,'2023-03-03','2023-04-04','2023-04-04 23:59:59','2023-04-04 23:59:59',40,35.5,20.54),
  array('Rednote 21',400,1300,'2021-05-05','2022-06-06','2022-06-06 23:59:59','2022-06-06 23:59:59',10,24.5,9.46),
);

//création d'un objet Excel
$writer = new XLSXWriter();

//Ecriture de l'entête
$writer->writeSheetHeader('Sheet1', $header);

//Ecriture des lignes
foreach($rows as $row) {
  $writer->writeSheetRow('Sheet1', $row);
}
	
//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

//Création du fichier excel
$writer->writeToFile('exemple1.xlsx');