<?php
include_once './DbConnect.php';

//$vendedor;

//$cvendedor = $_POST["vendedor"];
//$fecha=date("Y-m-d");
//$codcliente =$_POST["codcliente"];

//    $db = new DbConnect();
//    $query = "INSERT INTO marcador (nombre,direccion,lat, lon) VALUES ('$cvendedor','xxxxxxxx','-00.77777','-10.1111')";
//    $resulte = mysql_query($query);
//   echo $cvendedor;

function getClientes(){
    $db = new DbConnect();
    // array for json response
    $respuesta = array();
    $respuesta["veclientes"] = array();
   // $cvendedor ='99999';
    
    $vendedor = $_GET['vendedor'];
    $fecha=date("Y-m-d");
    // Mysql select query
    //$result = mysql_query("SELECT codigo,razonsocial FROM vecliente_geo");
    $result = mysql_query("SELECT vecliente.codigo,vecliente.razonsocial, vehojaderuta_cliente.deuda, vehojaderuta_cliente.objetivo_mensual
                            FROM vecliente, vehojaderuta, vehojaderuta_cliente
                            where vehojaderuta.codvendedor='".$vendedor."'  
                                AND vehojaderuta.fecha='".$fecha."' 
                                AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                AND vehojaderuta_cliente.codcliente=vecliente.codigo");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["deuda"] = $row["deuda"];
        $tmp["objmes"] = $row["objetivo_mensual"];
       // $tmp["orden"] = $row["orden"];
        
        // push category to final json array
        array_push($respuesta["veclientes"], $tmp);
    }
    
    // keeping response header to json
    header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($respuesta);
    //echo +$cvendedor;
   // 
}

getClientes();

//echo $cvendedor;
?>