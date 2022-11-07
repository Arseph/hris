<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {


    if($conn)
    {

    //error counter
    $errorcount = 0;


    $id = $_GET['id'];

    $title=$_POST['title'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $hour_num=$_POST['hours'];
    
    $conduct_sponsor=$_POST['txt_conduct'];

    $ld_type=$_POST['sel_ldtype'];


    //get file browser path
    $source = $_FILES['imagepath']['tmp_name'];
    $completion_certificate = $_FILES['coc']['tmp_name'];


    if($ld_type==0)
    {
      echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please Select Learning & Development Type</h4><br>";
            $errorcount++;
    }





        /////////////


        if(( $source == "" )&&( $completion_certificate =="" ))
          {
            $case = "no changes";

            $query="update emp_training set title=?, from_date=?, to_date=?, hour_num=?, ld_type=?, conduct_sponsor=? where id = ?";
            $params= array("$title", "$from_date", "$to_date", "$hour_num", "$ld_type", "$conduct_sponsor", "$id");

          }

          //CA CHANGES
          if(( $source != "" )&&( $completion_certificate =="" ))
          {

            $case = "ca changes.";
            
            $temp = explode(".", $_FILES["imagepath"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            $destination = 'training_files/ca/'.$newfilename;

            $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));

            $filesize=$_FILES["imagepath"]["size"];

            //VALIDATION

            if ($filesize>6000000)
            { 
                echo "<h4 class='card-title' style='color: #f2354e;'>Error: C.A. file size over 6mb</h4><br>";
                $errorcount++;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
            {
              echo "<h4 class='card-title' style='color: #f2354e;'>Error: C.A. only accepts jpg or png file allowed</h4><br>";
               $errorcount++;
            }


            $query="update emp_training set  ca=?, title=? ,from_date=? ,to_date=? ,hour_num=? ,ld_type=? ,conduct_sponsor=? where id = ?";
            $params= array($destination, "$title", "$from_date", "$to_date", "$hour_num", "$ld_type", "$conduct_sponsor", "$id");

            copy($source, $destination);
          }


          //COC CHANGES
          if(( $source == "" )&&( $completion_certificate !="" ))
          {

            $case = "coc changes.";

            $coc_temp = explode(".", $_FILES["coc"]["name"]);
            $coc_newfilename = round(microtime(true)) . '.' . end($coc_temp);
            
            $coc_destination = 'training_files/coc/'.$coc_newfilename;

            $coc_filetype = strtolower(pathinfo($coc_destination,PATHINFO_EXTENSION));

            $coc_filesize=$_FILES["coc"]["size"];


            ///validation
            if ($coc_filesize>6000000)
            { 
                echo "<h4 class='card-title' style='color: #f2354e;'>Error: C.O.C. file size over 6mb</h4><br>";
                $errorcount++;
            }

            if($coc_filetype != "jpg" && $coc_filetype != "png" && $coc_filetype != "jpeg")
            {
              echo "<h4 class='card-title' style='color: #f2354e;'>Error: C.O.C. only allows jpg or png file allowed</h4><br>";
               $errorcount++;
            }


            $query="update emp_training set coc=?, title=? ,from_date=? ,to_date=? ,hour_num=? ,ld_type=? ,conduct_sponsor=? where id = ?";
            $params= array("$coc_destination", "$title", "$from_date", "$to_date", "$hour_num", "$ld_type", "$conduct_sponsor", "$id");

            copy($completion_certificate, $coc_destination);
          }
          


          // CA AND COC CHANGES
          if(( $source != "" )&&( $completion_certificate !="" ))
          {
            $case = "ca and coc changes.";
           
            $temp = explode(".", $_FILES["imagepath"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            $destination = 'training_files/ca/'.$newfilename;

            $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));

            $filesize=$_FILES["imagepath"]["size"];

            //coc

            $coc_temp = explode(".", $_FILES["coc"]["name"]);
            $coc_newfilename = round(microtime(true)) . '.' . end($coc_temp);
            
            $coc_destination = 'training_files/coc/'.$coc_newfilename;

            $coc_filetype = strtolower(pathinfo($coc_destination,PATHINFO_EXTENSION));

            $coc_filesize=$_FILES["coc"]["size"];


            if (($filesize>6000000)||($coc_filesize>6000000))
            { 
                echo "<h4 class='card-title' style='color: #f2354e;'>Error: file size over 6mb</h4><br>";
                $errorcount++;
            }

            if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") || ($coc_filetype != "jpg" && $coc_filetype != "png" && $coc_filetype != "jpeg"))
            {
              echo "<h4 class='card-title' style='color: #f2354e;'>Error: only jpg or png file allowed</h4><br>";
               $errorcount++;
            }


            $query="update emp_training set  ca=?, coc=?, title=? ,from_date=? ,to_date=? ,hour_num=? ,ld_type=? ,conduct_sponsor=? where id = ?";
            $params= array("$destination", "$coc_destination", "$title", "$from_date", "$to_date", "$hour_num", "$ld_type", "$conduct_sponsor", "$id");

            copy($source, $destination);
            copy($completion_certificate, $coc_destination);
          }
   
        if($errorcount==0)
        {

          $stmt = sqlsrv_query($conn, $query, $params);    

          include "scripts/audit_emp_update_training.php";

          echo '<script>alert("Record Successfully Updated")</script>';

          echo "<script>window.open('emp-training-list.php?uid=".$uid."','_self')</script>";  
        }
    }
  }
?>