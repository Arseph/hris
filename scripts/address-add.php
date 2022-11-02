<?php 
include "connect.php";
$errorcount=0;

// left button save
if(isset($_POST["lbtn"])) 
{
  $r_house = $_POST['r_house'];
  $r_street= $_POST['r_street'];



  $r_barangay= $_POST['r_barangay'];
  $r_city= $_POST['r_city'];
  $r_countrynum= $_POST['r_countrynum'];
  $r_contact= $_POST['r_contact'];
  $r_zip=$_POST['r_zip'];

  $p_house = $_POST['p_house'];
  $p_street= $_POST['p_street'];

  $p_village= $_POST['p_village'];

  $p_barangay= $_POST['p_barangay'];
  $p_city= $_POST['p_city'];
  $p_countrynum= $_POST['p_countrynum'];
  $p_contact= $_POST['p_contact'];
  $p_zip=$_POST['p_zip'];


  if($_POST['sel_employee']==="0")
  {
    echo "please select employee name";
  }
  else
  {
    if (isset($_POST['r_province']))
    {
        $r_province=$_POST['r_province'];
    }
    else
    {
        $r_province="";
    }

    if (isset($_POST['p_province']))
    {
        $p_province=$_POST['p_province'];
    }
    else
    {
        $p_province="";
    }

        if (isset($_POST['r_village']))
    {
        $r_village=$_POST['r_village'];
    }
    else
    {
        $r_village="";
    }

    if (isset($_POST['p_village']))
    {
        $p_village=$_POST['p_village'];
    }
    else
    {
        $p_village="";
    }

      $agencyid=$_POST['sel_employee'];

      $insert_query="insert into dbo.emp_address (agencyid,p_house,p_street,p_village,p_barangay,p_city,p_province,p_countrynum,p_contact,r_house,r_street,r_village,r_barangay,r_city,r_province,r_countrynum,r_contact,r_zip,p_zip) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $params = array("$agencyid","$p_house","$p_street","$p_village","$p_barangay","$p_city","$p_province","$p_countrynum","$p_contact","$r_house","$r_street","$r_village","$r_barangay","$r_city","$r_province","$r_countrynum","$r_contact","$r_zip","$p_zip");

      $stmt = sqlsrv_query($conn, $insert_query, $params);

      include "scripts/audit_emp_add_address.php";

      echo '<script>alert("Record Successfully Added")</script>';
      echo "<script>window.open('index.php','_self')</script>";
  }

}

?>