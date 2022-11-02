<?php
include "connection_script.php";


    if(isset($_POST["save"])) 
    {
      
      $basicpage_error = 0;
      $pick_image = 0;
      //check file size
      $file_size=$_FILES["fileToUpload"]["size"];
      $file_size=floor($file_size/1000). '%';

      if ($file_size > 8000) 
        {
          echo "file limit is 8000Kb <br>";
          echo "current file size is ".$file_size."Kb<br>";
          $pick_image ++;
          $basicpage_error ++;
        }

      //file type check
      $destination = "../uploads/".$_FILES['fileToUpload']['name'];
      $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));

       if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
        {
          echo "-".$imageFileType." format type not allowed. please choose .jpg or .png format<br>";
          $pick_image ++;
          $basicpage_error ++;
        }
      
      //check if passwords matched
      $employee_password = $_POST['password'];
      $retyped_password = $_POST['password2'];
      if ($employee_password !== $retyped_password)
      {
          echo "-passwords did not match <br>";
          $pick_image ++;
          $basicpage_error ++;
      }

      //check if theres dupe id
      $employee_id = $_POST['agencyid'];
      $idcheck_sql = mysqli_query($conn, "SELECT agency_id FROM employee WHERE agency_id='$employee_id'");
      $dupe_id  = mysqli_num_rows($idcheck_sql);
      
      if ($dupe_id >0){

        echo "-duplicate agency id<br>";
        echo $dupe_id;
        $pick_image ++;
        $basicpage_error ++;
      }

      if ($pick_image>1)
      {
        echo "-please select the image again.";
        $basicpage_error ++;
      }

      if ($basicpage_error == 0){
        echo "basic page filled up completely";
      }

    }
    ?>

