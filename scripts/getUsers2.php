<?php
include "connect.php";

$munit_id2 = 0;

if(isset($_POST['depart2'])){

    $munit_id2 = $_POST['depart2'];
}

$mstation_arr2 = array();

$sql = "select * from dbo.mstation where mother_unit='".$munit_id2."'";

if($result = sqlsrv_query($conn, $sql))
{
    while($row = sqlsrv_fetch_array($result))
    {
        $mstation_id2 = $row['id'];
        $mstation_name2 = $row['mother_station'];
        $mstation_arr2[] = array("id" => $mstation_id2, "mother_station" => $mstation_name2);

    }
}

// encoding array to json format
echo json_encode($mstation_arr2);