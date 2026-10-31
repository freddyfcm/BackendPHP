<?php
 date_default_timezone_set('America/La_Paz');

function getClientes(){
ini_set('display_errors', 1);
error_reporting(~0);

//date_default_timezone_set('America/La paz');
    $respuesta = array();
    $respuesta["veclientes"] = array();
   // $cvendedor ='99999';
    
    $vendedor = $_GET['vendedor'];
    $fecha=date("Y-m-d");


if($vendedor=="41001"|| $vendedor=="41101"|| $vendedor=="41102"|| $vendedor=="41103"||$vendedor=="41104"|| $vendedor=="41201" ||$vendedor=="41202"|| $vendedor=="41203"|| $vendedor=="41204")
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
if($vendedor=="31000"|| $vendedor=="31001"|| $vendedor=="31101"|| $vendedor=="31102"|| $vendedor=="31103"||$vendedor=="31104"|| $vendedor=="31201" ||$vendedor=="31202"|| $vendedor=="31203")
 {   
    $serverName = "192.168.31.252";
    $userName = "sa";
    $userPassword = 'ayanami00';
    $dbName = "PE";
    
    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);
    
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
     
    $sql = " SELECT vecliente.codigo,vecliente.razonsocial, vehojaderuta_cliente.deuda, vehojaderuta_cliente.objetivo_mensual
                                FROM vecliente, vehojaderuta, vehojaderuta_cliente
                                where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=? 
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=vecliente.codigo ";
     
      $sql1 = " SELECT velugar.codigo,razonsocial=velugar.descripcion, vehojaderuta_cliente.deuda  ,vehojaderuta_cliente.objetivo_mensual
                                    FROM velugar, vehojaderuta, vehojaderuta_cliente
                                    where vehojaderuta.codvendedor=?  
                                    AND vehojaderuta.fecha=?
                                    AND vehojaderuta.codigo=vehojaderuta_cliente.codhojaderuta 
                                    AND vehojaderuta_cliente.codcliente=velugar.codigo ";             
                                                                                                 
                                    
   // $stmt = sqlsrv_query($conn, $sql+$union+$sql1, array($_GET['vendedor'], $fecha));;
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
if($vendedor=="81001"|| $vendedor=="81101"|| $vendedor=="81102"|| $vendedor=="81103"||$vendedor=="81104"|| $vendedor=="81105" ||$vendedor=="81201"|| $vendedor=="81202")
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