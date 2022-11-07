<?php

               

                //audit time
                date_default_timezone_set('Asia/Manila');
                $action_date=date("Y-m-d");
                $action_time=date('g:i:a');

                $action_details='Update'; // action details


                //specify data that got modified here


                $affected_record = "Training"; // affected record

                $record_id = $_GET['id'];; //record id
                $action_type = 6; //6 is update , 5 is data entry


                $current_user = $_SESSION['user_id'];
                $record_action_sql="insert into audit_trail (agencyid,action_date,action_time,action_type,action_details,affected_record,record_id) values (?,?,?,?,?,?,?)";
                $audit_action_params = array("$current_user","$action_date","$action_time","$action_type","$action_details", "$affected_record", $record_id);

                sqlsrv_query($conn, $record_action_sql, $audit_action_params);

                echo "<script>window.open('emp-training-list.php?uid=".$uid."','_self')</script>";  



?>