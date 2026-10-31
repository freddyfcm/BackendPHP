<?php
 date_default_timezone_set('America/La_Paz');
/*
echo "entro hasta aqui";
if(@move_uploaded_file($_FILES["filUpload"]["tmp_name"],"/archivoscsv/".$_FILES["filUpload"]["name"]))
{
	$arr["StatusID"] = "1";
	$arr["Error"] = "";
    echo "es estado ID es 1";
}
else
{
    
	$arr["StatusID"] = "0";
	$arr["Error"] = "Error cannot upload file.";
    echo "es estado ID es 0 ";
}

echo json_encode($arr);

*/
$respuesta = array();
$respuesta["respuesta"] = array();
$AnioS = date("Y");
$mesS = date("m");
$diaS = date("d");
$carpeta = "CSVs/$AnioS/$mesS/$diaS/";


if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
  
    $file_path = $carpeta;
     
    $file_path = $file_path . basename( $_FILES['uploadedfile']['name']);
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $file_path)) {
        chmod($carpeta, 0777);
       // echo "success";
       // echo $carpeta;
     // $arr["StatusID"] = "1";
	//$arr["Error"] = "";
       // echo "es estado ID es 1";
      
    echo "1";
    } else{
      //  echo "fail";
      //  echo $carpeta;
      //  $arr["StatusID"] = "0";
	  //  $arr["Error"] = "";
        chmod($carpeta, 0777);
        echo "0";
    }
   // array_push($respuesta["respuesta"], $arr);
//echo json_encode($respuesta);
    chmod($carpeta, 0777);
?>
