<?php

header('Content-Type: text/html; charset=UTF-8'); 


$serverName='213.56.104.72\J2C';
$connectionLogin = 'sa';
$connectionPsw = 'lynx';

$serverName = '213.56.104.72\J2C';
$connectionInfo = array( "UID"=>$connectionLogin, "PWD"=>$connectionPsw, "Database"=>"equipauto" , "CharacterSet" => "UTF-8");
$connSQLSRV = sqlsrv_connect( $serverName, $connectionInfo);
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query="(SELECT photo AS fichier FROM equipauto_palm_produit where cle1_cle2 in (select cle1_cle2 from equipauto_edi_dint where entree_test=0) AND photo <> '' AND grandPrix=0) UNION (SELECT photoGP AS fichier FROM equipauto_palm_produit where cle1_cle2 in (select cle1_cle2 from equipauto_edi_dint where entree_test=0) AND photoGP <> '' AND grandPrix=0) ";
$rs = sqlsrv_query($connSQLSRV, $query , $params, $options);


$zip = new ZipArchive();
$dateFile=date('Ymd-Hi');

$file = $_SERVER['DOCUMENT_ROOT']."\\upload\\equipauto_photo\\equipAuto2015-photo-".$dateFile.".zip";

$zip->open($file, ZipArchive::OVERWRITE);

try
{
	while($tab = sqlsrv_fetch_array($rs))
	{
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'\\upload\\equipauto_photo\\'.$tab['fichier']))
			$zip->addFile($_SERVER['DOCUMENT_ROOT'].'\\upload\\equipauto_photo\\'.$tab['fichier'], $tab['fichier']);
	}
	
}
catch(Exception $e)
{
	echo($e->getMessage());
}
$zip->close();

echo "equipAuto2015-photo-".$dateFile.".zip";

?>