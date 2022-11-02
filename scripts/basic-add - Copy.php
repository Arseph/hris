<?php 
include "connection_script.php";


// image validation: size, file type, empty.
if(isset($_POST["basicsave"])) 
{
  $errorcount = 0;
  $source = $_FILES['imagepath']['tmp_name'];

    //check for duplicate
    $agencyid = $_POST['agencyid'];
    $idcheck_sql = mysqli_query($conn, "SELECT agencyid FROM employee_basic WHERE agencyid='$agencyid'");
    $dupe_id  = mysqli_num_rows($idcheck_sql);


    $surname = $_POST['surname'];
    $suffix = $_POST['suffix'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dob = $_POST['dob'];
    $pob = $_POST['pob'];
    $radiogender = $_POST['radiogender'];
    $radiocivil = $_POST['radiocivil'];
    $radiodual = $_POST['radiodual'];
    $cid = $_POST['cid'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bloodtype = $_POST['bloodtype'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype = $_POST['retype'];
    $userlevel = $_POST['userlevel'];
    $hrinfo = "unset";

  if( $source != "" )
  {
    //change file name of the file to be copied
    $temp = explode(".", $_FILES["imagepath"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $destination = "uploads/" . $newfilename;

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
        echo "<h4 class='card-title' style='color: #f2354e;'>Error: passwords dont match.</h4><br>";
        $errorcount++;
    }

    if ($dupe_id != 0)
    { 
        echo "<h4 class='card-title' style='color: #f2354e;'>Error: Duplicate id.</h4><br>";
        $errorcount++;
    }     

    if ($errorcount == 0)
    {
      copy($source, $destination);
    }

    }else{
       echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please choose an image.</h4>[<br>";
    }

    if ($errorcount == 0)
    {

    $basic_add_sql = "INSERT INTO employee_basic(imagepath, agencyid, surname, suffix, firstname, middlename, dob, pob, gender, civil, citizenship, multi,  height, weight, bloodtype, username, password, userlevel, hrinfo) VALUES('$destination', '$agencyid', '$surname', '$suffix', '$firstname', '$middlename', '$dob', '$pob', '$radiogender', '$radiocivil', '$radiodual', '$cid', '$height', '$weight', '$bloodtype', '$username', '$password', '$userlevel', '$hrinfo')";

    $basic_result = mysqli_query($conn, $basic_add_sql);
    echo "<br><span style='color:green;'><b>Employee Record Created!</b></span><br>";
    echo "<br><a href='add-address.php' class='btn btn-primary'>Continue to add address form?</a>";
    echo "<br><a href='addemp.php' class='btn btn-success'>Stay at current form?</a>";
    }
  }


?>