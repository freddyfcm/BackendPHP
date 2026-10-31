<?php

/*
** Connect to database:
*/
 date_default_timezone_set('America/La_Paz');

//parametros llegados del celular
$message=$_POST["message"];
$message1=$_POST["message1"];
$fechaA = $_POST["fechaa"];
$horaA = $_POST["horaa"];
$cvendedor = $_POST["vendedor"];
$manual = $_POST["manual"];
$codcliente =$_POST["codcliente"];
$tipo = $_POST["tipo"];
$tipov = $_POST["tipovisita"];
$km = $_POST["km"];
$respuesta = "datos recibidos";
 
 //fecha hora del servidor
$fechaS = date("Y-m-d");
$horaS = date("H:i:s");

 
 ///////////////
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "192.168.31.70";
$userName = "usgps";
$userPassword = 'ayanami00';
$dbName = "DBGPS";

$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

$conn = sqlsrv_connect( $serverName, $connectionInfo);

$sql = "INSERT INTO rutaCamiones (lat,lon,placa,fechaA,horaA,fechaS,horaS,manual, cvisitado, 
tipo,tipovisita,km ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";

$params = array($_POST["message"], $_POST["message1"], $_POST["vendedor"], $_POST["fechaa"], 
$_POST["horaa"], $fechaS,$horaS, $_POST["manual"], $_POST["codcliente"], $_POST["tipo"],
$_POST["tipovisita"],$_POST["km"]);

//$params = array('-17.00000', '-66.111111', 66666, '20141212', '12:12', '20141111', '11:11', 1, 300123, 1);
$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}
else
{
echo "Datos recepcionados W(8(|)";
}
 
sqlsrv_close($conn);

echo "Datos recepcionados";

?>