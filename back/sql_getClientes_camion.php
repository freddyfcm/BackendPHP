<?php
 date_default_timezone_set('America/La_Paz');

function getClientes(){
ini_set('display_errors', 1);
error_reporting(~0);

//date_default_timezone_set('America/La paz');
    $respuesta = array();
    $respuesta["veclientes"] = array();
   // $cvendedor ='99999';
    
    $placa = $_GET['vendedor'];
    $fecha=date("Y-m-d");
    $hora=date("H:i:s");

if($placa=="aaaaaaa"|| $placa=="bbbbbb"|| $placa=="ccccccccc")
 {   
    $serverName = "192.168.41.99";
    $userName = "sa";
    $userPassword = 'ayanami00';
    $dbName = "PE";
    
    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);
    
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
     
    $sql = "SELECT vecliente.codigo,vecliente.razonsocial, vehojaderuta_cliente.deuda, vehojaderuta_cliente.objetivo_mensual
                                FROM vecliente, vehojaderuta, vehojaderuta_cliente
                                where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=? 
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=vecliente.codigo";
                                    
                                    
  $sql1 = " SELECT velugar.codigo,razonsocial=velugar.descripcion, vehojaderuta_cliente.deuda  ,vehojaderuta_cliente.objetivo_mensual
                                    FROM velugar, vehojaderuta, vehojaderuta_cliente
                                    where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=?
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=velugar.codigo ";
    
    $stmt = sqlsrv_query($conn, $sql, array($_GET['vendedor'], $fecha));;
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["deuda"] = $row["deuda"];
        $tmp["objmes"] = $row["objetivo_mensual"];
        
        array_push($respuesta["veclientes"], $tmp);
    }
    
    $stmt1 = sqlsrv_query($conn, $sql1, array($_GET['vendedor'], $fecha));;
    if( $stmt1 === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
          $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["deuda"] = $row["deuda"];
        $tmp["objmes"] = $row["objetivo_mensual"];
        
        array_push($respuesta["veclientes"], $tmp);
    }
    
    echo json_encode($respuesta);
}
if($placa=="1245XSE"|| $placa=="3764RHH"|| $placa=="3800RUP"|| $placa=="2881EPP")
 {   
    $serverName = "192.168.31.252";
    $userName = "sa";
    $userPassword = 'ayanami00';
    $dbName = "PE";
    
    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);
    
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
     
    $sql = " SELECT vecliente.codigo,vecliente.razonsocial,(in_hojaderuta1.id+'-'+CAST (in_hojaderuta1.numeroid as varchar(10)))as total, in_hojaderuta1.peso as kg
                                FROM vecliente,in_hojaderuta, in_hojaderuta1
                                where in_hojaderuta.placa=?  
                                    AND in_hojaderuta.fecha=?
                                    AND in_hojaderuta.codigo=in_hojaderuta1.codin_hojaderuta 
                                    AND in_hojaderuta1.codcliente=vecliente.codigo";
                 
                                                                                                 
                                    
   // $stmt = sqlsrv_query($conn, $sql+$union+$sql1, array($_GET['vendedor'], $fecha));;
   $stmt = sqlsrv_query($conn, $sql, array($_GET['vendedor'], $fecha));
   //$stmt = sqlsrv_query($conn, $sql, array($_GET['vendedor']));
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["total"] = $row["total"];
        $tmp["kg"] = $row["kg"];
        
        array_push($respuesta["veclientes"], $tmp);
    }
  
   // header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($respuesta);
}
if($placa=="81001"|| $placa=="81101"|| $placa=="81102"|| $placa=="81103"||$placa=="81104"|| $placa=="81105")
 {   
    $serverName = "192.168.81.99";
    $userName = "sa";
    $userPassword = 'ayanami00';
    $dbName = "PE";
    
    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);
    
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
     
    $sql = "SELECT vecliente.codigo,vecliente.razonsocial, vehojaderuta_cliente.deuda, vehojaderuta_cliente.objetivo_mensual
                                FROM vecliente, vehojaderuta, vehojaderuta_cliente
                                where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=? 
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=vecliente.codigo";
                                    
    $sql1 = " SELECT velugar.codigo,razonsocial=velugar.descripcion, vehojaderuta_cliente.deuda  ,vehojaderuta_cliente.objetivo_mensual
                                    FROM velugar, vehojaderuta, vehojaderuta_cliente
                                    where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=?
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=velugar.codigo ";
                                    
    
    $stmt = sqlsrv_query($conn, $sql, array($_GET['vendedor'], $fecha));;
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["deuda"] = $row["deuda"];
        $tmp["objmes"] = $row["objetivo_mensual"];
        
        array_push($respuesta["veclientes"], $tmp);
    }
    
    
    $stmt1 = sqlsrv_query($conn, $sql1, array($_GET['vendedor'], $fecha));;
    if( $stmt1 === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
          $tmp = array();
        $tmp["codigo"] = $row["codigo"];
        $tmp["razonsocial"] = $row["razonsocial"];
        $tmp["deuda"] = $row["deuda"];
        $tmp["objmes"] = $row["objetivo_mensual"];
        
        array_push($respuesta["veclientes"], $tmp);
    }
    
   // header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($respuesta);
}



    // array for json response


    //echo +$cvendedor;
   // 
}
getClientes();


//echo $cvendedor;
?>