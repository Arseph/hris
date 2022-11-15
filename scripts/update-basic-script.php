<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {

    if($conn)
    {

    //error counter
    $errorcount = 0;

    
    $new_surname = $_POST['surname'];
    $new_suffix = $_POST['suffix'];
    $new_firstname = $_POST['firstname'];
    $new_middlename = $_POST['middlename'];
    $new_dob = $_POST['dob'];
    $new_pob = $_POST['pob'];

    $new_radiogender = $_POST['radiogender'];
    $new_radiocivil = $_POST['radiocivil'];
    $new_radiocitizen = $_POST['radiocitizen'];
    $new_radiocitizenby = $_POST['radiocitizenby'];
    $new_cid = $_POST['cid'];
    
    if (!isset($new_cid)){
      $new_cid="";
    }


    $new_height = $_POST['height'];
    $new_weight = $_POST['weight'];
    $new_bloodtype = $_POST['bloodtype'];



      // $source = $_FILES['imagepath']['tmp_name'];
      // if( $source != "" )
      // {
      //    //change file name of the file to be copied
      //     $temp = explode(".", $_FILES["imagepath"]["name"]);
      //     $newfilename = round(microtime(true)) . '.' . end($temp);

      //     //$newfilename = $_FILES["imagepath"]["name"];

      //     $destination = 'uploads/'.$newfilename;
      //     $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
      //     $filesize=$_FILES["imagepath"]["size"];

      //   if ($filesize>6000000)
      //   { 
      //       echo "<h4 class='card-title' style='color: #f2354e;'>Error: file size over 6mb</h4><br>";
      //       $errorcount++;
      //   }

      //   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
      //   {
      //     echo "<h4 class='card-title' style='color: #f2354e;'>Error: only jpg or png file allowed</h4><br>";
      //      $errorcount++;
      //   }
      // }


        if($bloodtype=="0")  
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: please select bloodtype</h4>";
        }

   
        if($errorcount==0)
        {

          // if( $source != "" )
          // {


          // copy($source, $destination);
          
          $query="update emp_basic set surname=?,suffix=?,firstname=?,middlename=?,dob=?,pob=?,gender=?,civil=?,citizenship=?,citizenshipby=?,cid=?,height=?,weightt=?,bloodtype=? where agencyid=?";

          $params= array($new_surname, $new_suffix, $new_firstname, $new_middlename, $new_dob, $new_pob, $new_radiogender, $new_radiocivil, $new_radiocitizen,$new_radiocitizenby,$new_cid,$new_height,$new_weight,$new_bloodtype, $agencyid);


          $stmt = sqlsrv_query($conn, $query, $params);

          //audit trail
          include "scripts/audit_emp_update_basic.php";

          //   }else{

          //   if(!empty($imagepath))
          //   {
          //     $newfilename=$imagepath;
          //   }

          //    $query="update emp_basic set imagepath=?,surname=?,suffix=?,firstname=?,middlename=?,dob=?,pob=?,gender=?,civil=?,citizenship=?,citizenshipby=?,cid=?,height=?,weightt=?,bloodtype=? where agencyid=?";

          //    $params= array($imagepath, $surname, $suffix, $firstname, $middlename, $dob, $pob, $radiogender, $radiocivil, $radiocitizen,$radiocitizenby,$cid,$height,$weight,$bloodtype,$agencyid);

          //   $stmt = sqlsrv_query($conn, $query, $params);

          // }
          echo '<script>alert("Record Successfully Updated")</script>';
            
            if($_SESSION['userlevel'] > 2 )
            {
              echo "<script>window.open('index.php','_self')</script>";
            }
            else
            {
              echo "<script>window.open('employee-summary.php?uid=".$uid."','_self')</script>";
            }
          }
    }
  }
?>