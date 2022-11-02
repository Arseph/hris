<?php
include "connect.php";

$munit_id = 0;

if(isset($_POST['depart'])){

    $munit_id = $_POST['depart'];
}

$mstation_arr = array();

$sql = "select * from dbo.mstation where mother_unit='".$munit_id."'";

if($result = sqlsrv_query($conn, $sql))
{
    while($row = sqlsrv_fetch_array($result))
    {
        $mstation_id = $row['id'];
        $mstation_name = $row['mother_station'];
        $mstation_arr[] = array("id" => $mstation_id, "mother_station" => $mstation_name);

    }
}

// encoding array to json format
echo json_encode($mstation_arr);