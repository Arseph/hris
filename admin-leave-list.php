<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
include "scripts\admin-check.php";

if (!isset($_SESSION['user_id']))
{
    header('location:pages-login.php');
}
$uid=$_SESSION['user_id'];


$leaves_sql = "select * from leave_list";

$stmt = sqlsrv_query($conn, $leaves_sql);
$lnum=1;
while($row=sqlsrv_fetch_array($stmt))
{
  $l[$lnum]=$row['leave_id'];
  $lv[$lnum]=$row['leave_type'];
  $lnum++;
}




?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Leave Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Leave List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Leave Requests</h5>
              <p>List of All Filed Leaves</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Date filed</th>
                    <th scope="col">Requestor</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Approval Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                  
                    <?php

                    $sql = "select distinct agencyid from emp_leave";
                    $stmt=sqlsrv_query($conn, $sql);

                    while($row=sqlsrv_fetch_array($stmt))
                    {
                       $emp_basic_agencyid=$row['agencyid'];

                       //get name
                       $getname_sql="select * from emp_basic where agencyid ='$emp_basic_agencyid'";
                        $getname_stmt=sqlsrv_query($conn,$getname_sql);

                         $name_row = sqlsrv_fetch_array($getname_stmt);
                         $fname = $name_row['firstname'];
                         $mname = $name_row['middlename'];
                         $sname = $name_row['surname'];


                        $display_all = "select * from emp_leave where agencyid='$emp_basic_agencyid'";

                        $last_stmt=sqlsrv_query($conn,$display_all);


                        while($last_row =sqlsrv_fetch_array($last_stmt))
                        {
                          $leave_id = $last_row['leave_id'];
                          echo "<tr>";
                          echo "<td>";
                                
                          $get_last_status = "select * from leave_status where file_id='$leave_id' and agencyid='$emp_basic_agencyid'";

                          $status_stmt=sqlsrv_query($conn,$get_last_status);
                          $stat_row = sqlsrv_fetch_array($status_stmt);

                          $recommendation=$stat_row['recommendation'];
                                
                                if($recommendation=='2')
                                {
                                echo "<a href='leave-approval-form.php?uid=".$emp_basic_agencyid."&file_id=".$leave_id."' class='btn btn-primary'>Respond</a>"; 
                                }
                                else
                                {
                                echo "<a href='update-approval-form.php?uid=".$emp_basic_agencyid."&file_id=".$leave_id."' class='btn btn-success'>Edit Response</a>"; 
                                }
                                

                                echo "</td>";

                                echo "<td>".$last_row['file_date']."</td>";
                                echo "<td>".$fname;
                                if(!empty($mname)){
                                  echo " ".$mname;
                                }
                                echo " ".$sname;
                                echo "</td>";
                                echo "<td>";
                                $y=1;
                                for ($y=0; $y < 15 ; $y++) { 
                                  if($last_row['leave_id']==$y)
                                  {
                                    echo $lv[$y];
                                  }                               
                                }                                
                                echo "</td>";
                                echo "<td>";

                               //----------approval segment

                                $approval_sql = "select * from leave_status where agencyid='$emp_basic_agencyid' and file_id='$leave_id'";

                                $approval_stmt = sqlsrv_query($conn,$approval_sql);
                                $rowx=sqlsrv_fetch_array($approval_stmt);

                                if($rowx['recommendation']==2){
                                  echo "<b style='color:blue;'>pending</b>";
                                }elseif($rowx['recommendation']==1){
                                  echo "<b style='color:green;'>approved</b>";
                                }else{
                                  echo "<b style='color:red;'>disapproved</b>";
                                }

                                // -------- approval end
                                echo "</td>";
                                echo "</tr>";
                        }

                      }
                        
                    ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Department of Health</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>