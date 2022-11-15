<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {

    if($conn)
    {

    //error counter
    $errorcount = 0;

    //image variables
    $source = $_FILES['imagepath']['tmp_name'];

    //automate autogeneration of id using current format 2022-22 year-##
    
   $sql = "select TOP 1 * from emp_basic order by id desc";
      if($result = sqlsrv_query($conn, $sql))
      {
          while($row = sqlsrv_fetch_array($result))
          {
              $agencyid=$row['agencyid'];
              $lastnum = substr($agencyid, 5);
              $lastnum++;
              $year= date("Y");
              $agencyid=$year."-".$lastnum;
              
          }
          
      }


    
    $surname = $_POST['surname'];
    $suffix = $_POST['suffix'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dob = $_POST['dob'];
    $pob = $_POST['pob'];

    $radiogender = $_POST['radiogender'];
    $radiocivil = $_POST['radiocivil'];
    $radiocitizen = $_POST['radiocitizen'];
    $radiocitizenby = $_POST['radiocitizenby'];
    $cid = $_POST['cid'];
    if (!isset($cid)){
      $cid="";
    }


    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bloodtype = $_POST['bloodtype'];

    //check duplicate username
    $username = $_POST['username'];
    $usernamecheck_sql = "select * from dbo.user_accounts where username='$username'";
    $parammm = array();
    $optionss =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt2 = sqlsrv_query( $conn, $usernamecheck_sql , $parammm, $optionss);
    $un_row_count = sqlsrv_num_rows( $stmt2 );

    $password = $_POST['password'];
    $retype = $_POST['retype'];
    $userlevel = $_POST['userlevel'];

      if( $source != "" )
      {
        //change file name of the file to be copied
        $temp = explode(".", $_FILES["imagepath"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        //$newfilename = $_FILES["imagepath"]["name"];

        $destination = 'uploads/'.$newfilename;
        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
        $filesize=$_FILES["imagepath"]["size"];

        if ($filesize>6000000)
        { 
            echo "<h4 class='card-title' style='color: #f2354e;'>Error: file size over 6mb</h4><br>";
            $errorcount++;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
        {
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: only jpg or png file allowed</h4><br>";
           $errorcount++;
        }



        if ($password != $retype)
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: Passwords dont match. please type again</h4><br>";
        }

        if ($un_row_count >0){
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: Username already in use.</h4><br>";
        }

        if($bloodtype=="0")  
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: please select bloodtype</h4>";
        }

        if($userlevel=="0")
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: please userlevel</h4>";
        }
   
        if($errorcount==0)
        {

          $query="insert into dbo.emp_basic (imagepath,agencyid,surname,suffix,firstname,middlename,dob,pob,gender,civil,citizenship,citizenshipby,cid,height,weightt,bloodtype) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $params= array("$newfilename","$agencyid", "$surname", "$suffix", "$firstname", "$middlename", "$dob", "$pob", "$radiogender", "$radiocivil", "$radiocitizen","$radiocitizenby","$cid","$height","$weight","$bloodtype");


          $stmt = sqlsrv_query($conn, $query, $params);

          $account_sql = "insert INTO user_accounts(agencyid, username, pass, userlevel) VALUES (?,?,?,?)";
          $account_params= array("$agencyid","$username","$password","$userlevel");

          sqlsrv_query($conn, $account_sql, $account_params);

          $hrinfo_sql ="insert into HR_INFO (agencyid,active,date_hired,year_hired,day_hired,month_hired) values (?,?,?,?,?,?)";

          $day_hired = date("d");
          $year_hired = date("Y");
          $month_hired = date("m");

          $date_hired = date("Y-m-d");
          $params = array("$agencyid","1","$date_hired","$year_hired","$day_hired","$month_hired");

          $hrinfo_stmt = sqlsrv_query($conn, $hrinfo_sql, $params);

          include "scripts/audit_create_user.php";

          copy($source, $destination);

          echo '<script>alert("User Account Successfully Created")</script>';
          // echo "<script>window.open('index.php','_self')</script>";
        }

      }else{
       echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please choose an image.</h4><br>";
      }
    }
  }
?>