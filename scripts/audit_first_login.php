<?php
//find audit action: login
                $find_action_sql = "select * from audit_actions where action_name='login'";
                $result = sqlsrv_query($conn, $find_action_sql);
                $row = sqlsrv_fetch_array($result);
                $action_type = $row['id'];

                //record audit action
                date_default_timezone_set('Asia/Manila');
                $action_date=date("Y-m-d");
                $action_time=date('g:i:a');
                $action_details='unverified account detected';
                
                $record_action_sql="insert into audit_trail (agencyid,action_date,action_time,action_type,action_details) values (?,?,?,?,?)";
                $audit_action_params = array("$agencyid","$action_date","$action_time","$action_type","$action_details");
                $aa_go = sqlsrv_query($conn, $record_action_sql, $audit_action_params);


                    //find audit action: redirect
                    $find_action_sql = "select * from audit_actions where action_name='redirect'";
                    $result = sqlsrv_query($conn, $find_action_sql);
                    $row = sqlsrv_fetch_array($result);
                    $action_type = $row['id'];


                    //record audit action: redirect
                    $action_details='Redirecting to Mandatory Change Credential Screen.';
                    $audit_action_params = array("$agencyid","$action_date","$action_time","$action_type","$action_details");
                    $aa_go = sqlsrv_query($conn, $record_action_sql, $audit_action_params);


                header('location:change_credential.php');

?>