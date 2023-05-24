<?php
//set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

$header = array(  
  'NOM'=>'string',//text
  'PRENOM'=>'string',    
  'DATE DE NAISSANCE'=>'date',  
);

$rows1 = array(
  array('Mbappé','Killian','1998-12-20'),  
);

$rows2 = array(    
  array('Ocon','Esteban','1996-09-17'),  
);

$rows3 = array(    
  array('Quartararo','Fabio','1999-04-20'),    
);

$rows4 = array(    
  array('DHaene','François','1985-12-24'),    
);

$rows5 = array(  
  array('Griezmann','Antoine','1991-03-21'),  
  array('Federer','Roger','1981-08-08'),   
);

$rows6 = array(    
  array('Jornet','Kilian','1987-10-27'),  
  array('DHaene','François','1985-12-24'),    
);

$rows7 = array(    
  array('Dupont','Antoine','1996-11-15'),  
  array('Ntamak','Romain','1999-05-01'),    
);

$sheet1 = "Feuille 1" ; //nom de l'onglet

$styleHeader = array('font-style'=>'bold') ;
$style1 = array('font-style'=>'italic','font-size'=>10);
$style2 = array('color'=>'#0f0'); //couleur du texte
$style3 = array('fill'=>'#fcf'); //couleur de fond de la cellule
$style4 = array('halign'=>'center');
$style5 = array(['halign'=>'left'],['halign'=>'center'],['halign'=>'right']);
$style6 = array(['font-size'=>12],['font-size'=>12],['font-size'=>10]) ;
$style7 = array('border-style'=>'thin','border'=>'top,bottom');


//création d'un objet Excel
$writer = new XLSXWriter();

//Ecriture de l'entête  
$writer->writeSheetHeader($sheet1, $header,$styleHeader);

//1ère ligne en italic
foreach($rows1 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style1);
}

//Couleur du texte
foreach($rows2 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style2);
}

//Couleur de fond de la cellule
foreach($rows3 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style3);
}

//Texte centré horizontalement
foreach($rows4 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style4);
}

//1ère colonne aligné à gauche, la 2e centrée et la dernière à droite
foreach($rows5 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style5);
}

/*taille de police pour chaque cellule
ATTENTION : Dans le tableau style1, on doit avoir le même d'élément que de cellules
*/
foreach($rows6 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style6);
}

//bordure
foreach($rows7 as $row) {
  $writer->writeSheetRow($sheet1, $row,$style7);
}

//Création du fichier excel
$writer->writeToFile('style.xlsx');