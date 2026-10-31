<?php
include_once './DbConnect.php';
   //Define la zona horaria exacta para cada pais.
   date_default_timezone_set('America/La paz');
   
   #variable con la hora con formato am, pm
  // $currentTime = date("Y-m-d");
   
   //echo que imprime la hora.
  //echo "$currentTime"; 
  
//phpinfo();
function getHora(){
    
    $db = new DbConnect();
    // array for json response
    $respuesta = array();
    $respuesta["horaS"] = array();
  
    $fecha=date("Y-m-d H:i:s");
  
        $tmp = array();
        $tmp["hora"] = $fecha;
              
        // push category to final json array
        array_push($respuesta["horaS"], $tmp);
   // }
    
    // keeping response header to json
    header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($respuesta);
   // echo $fecha;
   // 
}
getHora();


?>