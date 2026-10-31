
<?php
date_default_timezone_set('America/La_Paz');
$message=$_POST["message"];
$message1=$_POST["message1"];
$fhora = $_POST["fhora"];
$cvendedor = $_POST["vendedor"];
$fhoraS = date("Y-m-d H:i:s");
$manual = $_POST["manual"];
$codcliente =$_POST["codcliente"];
$tipo = $_POST["tipo"];
$respuesta = "datos recibidos";

//echo $fhoraS;
$connection = mysql_connect ("localhost", "root", "pertec2014");
if (!$connection)
{
  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db("pertec", $connection);
if (!$db_selected)
{
  die('Can\'t use db : ' . mysql_error());
}
if($fhora=="0")
{
     $query = "INSERT INTO rutap (lat,lon,codvendedor,fhoraA,fhoraS,manual, cvisitado, tipo) VALUES ('$message','$message1','$cvendedor','$fhoraS','$fhoraS','$manual', '$codcliente', '$tipo')"; 
}
else
{
     $query = "INSERT INTO rutap (lat,lon,codvendedor,fhoraA,fhoraS,manual, cvisitado, tipo) VALUES ('$message','$message1','$cvendedor','$fhora','$fhoraS','$manual', '$codcliente', '$tipo')";    
}
//echo "la hora es: "+$fhora;
$result = mysql_query($query);

$filename="androidmessages.html";

//file_put_contents($filename,$fhora."<br />",FILE_APPEND);

//$androidmessages=file_get_contents($filename);

//echo $androidmessages;
//echo $message1;
echo "Datos recepcionados";

?>




<?php
/*
date_default_timezone_set('America/La paz');
$message=$_POST["message"];
$message1=$_POST["message1"];
$fhora = $_POST["fhora"];
$cvendedor = $_POST["vendedor"];
$fhoraS = date("Y-m-d H:i:s");
$manual = $_POST["manual"];
$codcliente =$_POST["codcliente"];
$tipo = $_POST["tipo"];
$respuesta = "datos recibidos";

//echo $fhoraS;
$connection = mysql_connect ("localhost", "root", "pertec2014");
if (!$connection)
{
  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db("pertec", $connection);
if (!$db_selected)
{
  die('Can\'t use db : ' . mysql_error());
}

$query = "INSERT INTO ruta (lat,lon,codvendedor,fhoraA,fhoraS,manual, cvisitado, tipo) VALUES ('$message','$message1','$cvendedor','$fhora','$fhoraS','$manual', '$codcliente', '$tipo')";
$result = mysql_query($query);

$filename="androidmessages.html";

//file_put_contents($filename,$fhora."<br />",FILE_APPEND);

//$androidmessages=file_get_contents($filename);

//echo $androidmessages;
//echo $message1;
echo "Datos recepcionados";
*/
?>
