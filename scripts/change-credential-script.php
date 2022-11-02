<?php
include "connect.php";


  if(isset($_POST['update']))
  {
    

    if($conn)
    {

    //error counter
    $errorcount = 0;
    $uid = $_SESSION['user_id'];

    //check duplicate username
    $username = $_POST['username'];
    $usernamecheck_sql = "select username from dbo.user_accounts where username like '$username' and agencyid!='$uid'";
    $parammm = array();
    $optionss =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt2 = sqlsrv_query( $conn, $usernamecheck_sql , $parammm, $optionss);
    $un_row_count = sqlsrv_num_rows( $stmt2 );




    $password = $_POST['password'];
    $retype = $_POST['rpassword'];

        if ($password != $retype)
        {
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: Passwords dont match. please type again</h4><br>";
        }

        if ($un_row_count >0){
          $errorcount++;
          echo "<h4 class='card-title' style='color: #f2354e;'>Error: Username already in use.</h4><br>";
        }

        if($errorcount==0)
        {

          $query = "update dbo.user_accounts SET username=?,pass=? where agencyid = ?";

          $params= array($username, $password,$uid);

          $stmt = sqlsrv_query($conn, $query, $params);
 
          include "audit_verify_account.php";

          header('location:account_create_complete.php');
        }
    }
  }
?>