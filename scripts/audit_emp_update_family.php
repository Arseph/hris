<?php

               

                //audit time
                date_default_timezone_set('Asia/Manila');
                $action_date=date("Y-m-d");
                $action_time=date('g:i:a');

               // $action_details='Data Entry'; // create record
               $action_details='Update Record'; // update record

                //specify data that got modified here




                $affected_record = "Family Information"; // affected record

                $get_record_id = "select * from emp_family where agencyid='$agencyid'";
                $get_record_smtmt = sqlsrv_query($conn, $get_record_id);
                $record_row = sqlsrv_fetch_array($get_record_smtmt);

                $record_id = $record_row['id']; //record id
                $action_type = 6; //6 is update , 5 is data entry


                $current_user = $_SESSION['user_id'];
                $record_action_sql="insert into audit_trail (agencyid,action_date,action_time,action_type,action_details,affected_record,record_id) values (?,?,?,?,?,?,?)";
                $audit_action_params = array("$current_user","$action_date","$action_time","$action_type","$action_details", "$affected_record", $record_id);

                sqlsrv_query($conn, $record_action_sql, $audit_action_params);



?>