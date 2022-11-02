

<?php

$serverName = "LAPTOP-0VAHF0JF"; 
$connectionInfo = array( "Database"=>"hris3");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
     //echo "Connection established.<br />";
}

?>


