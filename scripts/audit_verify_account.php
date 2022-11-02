<?php
//find audit action: verify account
          $audit_action_sql = "select * from audit_actions where action_name='verify_account'";
          $result = sqlsrv_query($conn, $audit_action_sql);
          $row = sqlsrv_fetch_array($result);
          $action_type = $row['id'];

          date_default_timezone_set('Asia/Manila');
          $action_date=date("Y-m-d");
          $action_time=date('g:i:a');

          //record action: verify account
          $action_details = "Credentials successfully updated, First Login Successful.";
          $query="insert into audit_trail (agencyid,action_date,action_time,action_type,action_details) values (?,?,?,?,?)";
          $audit_action_params = array("$uid","$action_date","$action_time","$action_type","$action_details");
          $aa_go = sqlsrv_query($conn, $query, $audit_action_params);
?>