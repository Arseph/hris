<?php
include "connect.php";
  if(isset($_POST['hrcsave']))
  {

    if($conn)
    {

    //reset error counter to 0
    $errorcount = 0;
    $errors="";

    $agencyid= $_POST['sel_employee'];
    $foe= $_POST['foe'];

     if($agencyid=="0")
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: please Select Employee</h4>";
        }


    // $foe = $_POST['foe'];
    // $gaps = $_POST['gaps'];
    // $actions = $_POST['actions'];
    // $competency_lvl = $_POST['competency_lvl'];
    

    // $gad = $_POST['gad'];
    // if (!isset($gad)){
    //   $gad="";
    // }else{
    //   $gad = $_POST['gad'];
    // }




 // if($competency_lvl=="0")
 //        {
 //          $errorcount++;
 //          echo "<h4 class='card-title' style='color: #f2354e;'>Error: please Competency level</h4>";
 //        }
   
        if($errorcount==0)
        {

          // $query="insert into dbo.emp_hrc (agencyid,foe,gaps,actions,competency_lvl,gad) values (?,?,?,?,?,?)";
          // $params= array("$agencyid", "$foe", "$gaps", "$actions", "$competency_lvl", "$gad");

          $query="insert into dbo.emp_hrc (agencyid,foe) values (?,?)";
          $params= array("$agencyid","$foe");

          $stmt = sqlsrv_query($conn, $query, $params);

          // $update_query = "update dbo.emp_basic SET competency=? where agencyid=?";

          // $update_params= array('set', $agencyid);
    
          // $stmt = sqlsrv_query($conn, $update_query, $update_params);

          echo "<button class='btn btn-primary'>Continue to Address Form?</button><br><br>";
        }

      }
    }
?>