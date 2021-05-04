<?php

$serverName = 'DESKTOP-DCU9DEO';
$connectionInfo = array("Database"=>"packingexpress","UID"=>"sa","PWD"=>"123","CharacterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName, $connectionInfo);


if($conn_sis){
    echo "Exito";
}else{
    echo "fallo";
    die( print_r(sqlsrv_errors(), true));
}



$sql = "SELECT coditm,descripcion FROM items where coditm < 1000";
$stmt = sqlsrv_query( $conn_sis, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['coditm'].", ".$row['descripcion']."<br />";
}

sqlsrv_free_stmt( $stmt);



?>