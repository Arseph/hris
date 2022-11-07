<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {

    if($conn)
    {

    //error counter
    $errorcount = 0;
    $title=$_POST['title'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $hour_num=$_POST['hours'];
    
    $conduct_sponsor=$_POST['txt_conduct'];

    $ld_type=$_POST['sel_ldtype'];

    if($ld_type==0)
    {
      echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please Select Learning & Development Type</h4><br>";
            $errorcount++;
    }


    //image variables
    $source = $_FILES['imagepath']['tmp_name'];
    $completion_certificate = $_FILES['coc']['tmp_name'];

      if(( $source != "" )&&( $completion_certificate !="" ))
      {
        //change file name of the file to be copied
        $temp = explode(".", $_FILES["imagepath"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $coc_temp = explode(".", $_FILES["coc"]["name"]);
        $coc_newfilename = round(microtime(true)) . '.' . end($temp);

        //$newfilename = $_FILES["imagepath"]["name"];

        $destination = 'training_files/ca/'.$newfilename;
        $coc_destination = 'training_files/coc/'.$coc_newfilename;

        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
        $coc_filetype = strtolower(pathinfo($coc_destination,PATHINFO_EXTENSION));

        $filesize=$_FILES["imagepath"]["size"];
        $coc_filesize=$_FILES["coc"]["size"];

        if (($filesize>6000000)&&($coc_filesize>6000000))
        { 
            echo "<h4 class='card-title' style='color: #f2354e;'>Error: file size over 6mb</h4><br>";
            $errorcount++;
        }

        if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") || ($coc_filetype != "jpg" && $coc_filetype != "png" && $coc_filetype != "jpeg"))
        {
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: only jpg or png file allowed</h4><br>";
           $errorcount++;
        }






   
        if($errorcount==0)
        {

          $query="insert into dbo.emp_training (agencyid,ca,coc,title,from_date,to_date,hour_num,ld_type,conduct_sponsor,void) values (?,?,?,?,?,?,?,?,?,?)";
          $params= array("$agencyid", "$destination", "$coc_destination", "$title", "$from_date", "$to_date", "$hour_num", "$ld_type", "$conduct_sponsor","1");


          $stmt = sqlsrv_query($conn, $query, $params);    

          copy($source, $destination);
          copy($completion_certificate, $coc_destination);

          include "scripts/audit_emp_add_training.php";

          echo '<script>alert("Record Successfully Added")</script>';

          echo "<script>window.open('emp-training-list.php?uid=".$uid."','_self')</script>";  
        }

      }else{
       echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please choose an image.</h4><br>";
      }
    }
  }
?>