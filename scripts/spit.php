<?php
include "connect.php";

if(isset($_POST["echo"])) 
{
  $depart = $_POST['sel_depart'];
  $section = $_POST['sel_user'];

  $sql_section = "select * from dbo.munit where id='".$depart."'";
  $result = sqlsrv_query($conn, $sql_section);
                            
  while($row = sqlsrv_fetch_array($result))
  {

    $department = $row['mother_unit'];
    echo "department: ".$department."<br>";
  } 

  //echo "department: ".$depart."<br>section: ".$section;


    $sql_department = "select * from dbo.mstation where id='".$depart."'";
    $result = sqlsrv_query($conn, $sql_department);
                            
 while($row = sqlsrv_fetch_array($result))
  {

    $section = $row['mother_station'];
    echo "section: ".$section;
  }
                        
}

?>