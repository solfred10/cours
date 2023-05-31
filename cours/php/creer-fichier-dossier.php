<?php
require_once("PHP_XLSXWriter-master/xlsxwriter.class.php");

//exemple 1
/*

echo "test2" ;

$data = array(
array('year','month','amount'),
array('2003','1','220'),
array('2003','2','153.5'),
);
$writer = new XLSXWriter();
$writer->writeSheet($data);
$writer->writeToFile('output.xlsx');
*/



//exemple 2
/*
$header = array(
  'created'=>'date',
  'product_id'=>'integer',
  'quantity'=>'#,##0',
  'amount'=>'price',
  'description'=>'string',
  'tax'=>'[$$-1009]#,##0.00;[RED]-[$$-1009]#,##0.00',
);
$data = array(
    array('2015-01-01',873,1,'44.00','misc','=D2*0.05'),
    array('2015-01-12',324,2,'88.00','none','=D3*0.05'),
);

$writer = new XLSXWriter();
$writer->writeSheetHeader('Sheet1', $header );
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row );
$writer->writeToFile('example.xlsx');*/


//exemple3
/*
$writer = new XLSXWriter();
$writer->writeSheetHeader('Sheet1', array('c1'=>'integer','c2'=>'integer','c3'=>'integer','c4'=>'integer') );
for($i=0; $i<50; $i++)
{
    $writer->writeSheetRow('Sheet1', array($i, $i+1, $i+2, $i+3) );
}
$writer->writeToFile('example3.xlsx');
*/

//Exemple 4 
/*
$writer = new XLSXWriter();
$colors = array('ff','cc','99','66','33','00');
foreach($colors as $b) {
	foreach($colors as $g) {
		$rowdata = array();
		$rowstyle = array();
		foreach($colors as $r) {
			$rowdata[] = "#$r$g$b";
			$rowstyle[] = array('fill'=>"#$r$g$b");
		}
		$writer->writeSheetRow('Sheet1', $rowdata, $rowstyle );
	}
}
$writer->writeToFile('xlsx-colors.xlsx');
*/

//exemple 5
$writer = new XLSXWriter();
$styles1 = array( 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
$styles2 = array( ['font-size'=>6],['font-size'=>8],['font-size'=>10],['font-size'=>16] );
$styles3 = array( ['font'=>'Arial'],['font'=>'Courier New'],['font'=>'Times New Roman'],['font'=>'Comic Sans MS']);
$styles4 = array( ['font-style'=>'bold'],['font-style'=>'italic'],['font-style'=>'underline'],['font-style'=>'strikethrough']);
$styles5 = array( ['color'=>'#f00'],['color'=>'#0f0'],['color'=>'#00f'],['color'=>'#666']);
$styles6 = array( ['fill'=>'#ffc'],['fill'=>'#fcf'],['fill'=>'#ccf'],['fill'=>'#cff']);
$styles7 = array( 'border'=>'left,right,top,bottom');
$styles8 = array( ['halign'=>'left'],['halign'=>'right'],['halign'=>'center'],['halign'=>'none']);
$styles9 = array( array(),['border'=>'left,top,bottom'],['border'=>'top,bottom'],['border'=>'top,bottom,right']);


$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles1 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles2 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles3 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles4 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles5 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles6 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles7 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles8 );
$writer->writeSheetRow('Sheet1', $rowdata = array(300,234,456,789), $styles9 );
$writer->writeToFile('xlsx-styles.xlsx');

?>