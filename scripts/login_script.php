<?php


session_start();

if (isset($_POST['login']))
{
	$username = utf8_decode($_POST['username']);
	$password = $_POST['password'];

                        
	$accountcheck_sql = "select * from user_accounts where username='$username' and pass='$password'";
	$paramm = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $accountcheck_sql , $paramm, $options);
    
    $total_account = sqlsrv_num_rows( $stmt );

    echo $total_account;

        if ($total_account > 0) 
        {     

            $row = sqlsrv_fetch_array($stmt);
            $agencyid= $row['agencyid'];
            $_SESSION['user_id'] = $agencyid;
            $_SESSION['userlevel']  = $row['userlevel'];
            

             $userlvl_sql = "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
             $userlvl_stmt = sqlsrv_query($conn,$userlvl_sql);
             $userlvl_row = sqlsrv_fetch_array($userlvl_stmt);
             $_SESSION['firstname']  = $userlvl_row ['firstname'];
           

            //CHECK IF FIRST LOGIN
            $new_check_sql = "select * from audit_trail where agencyid='$agencyid' and action_type='3'";
            
            $paramm = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $stmt = sqlsrv_query( $conn, $new_check_sql, $paramm, $options);
            $find_verify = sqlsrv_num_rows( $stmt );

            //IF FIRST LOGIN
            if($find_verify==0)
            {
                include "audit_first_login.php";
                
            }
            else
            {
                include "audit_login.php";
              header('location:index.php');

            }

        }else{
            $error_msg = '<br/><p style="color:red">incorrect username and/or password</p>';
        }
        

}    




?>