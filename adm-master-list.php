c<?php
session_start();
$user_id=$_SESSION['user_id'];
include "layouts\layout_sidebar.php";
$get_user = "select * from emp_basic where agencyid='$user_id'";
$get_stmt = sqlsrv_query($conn,$get_user);
$get_row=sqlsrv_fetch_array($get_stmt);
$user_fname = $get_row['firstname'];
$user_sname = $get_row['surname'];
// error_reporting(0);
// ini_set('display_errors', 0);

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Employee Designation History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Employee Designation History</li>
          <li class="breadcrumb-item active"><?php echo $user_fname." ".$user_sname; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Active Employee's Master list</h5>
              <?php
              echo "<a href='emp-add-designation.php?uid=".$user_id."' class='btn btn-primary'>Add New Designation</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">ID</th>
                        <th scope="col">Surname</th>
                        <th scope="col">First Name</th>
                        <th scope='col'>Middle Name</th>
                        <th scope='col'>Designated Station</th>
                        <th scope='col'>Employment Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //get max file id
                      $sql = "select agencyid from HR_INFO where active='1'";
                      $stmt = sqlsrv_query($conn, $sql);

                      
                        while($row = sqlsrv_fetch_array($stmt))
                        {
                            //uid
                            $agencyid=$row['agencyid'];

                            $get_data = "select * from emp_basic where agencyid='$agencyid'";

                            $params = array();
                            $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                            $data_stmt = sqlsrv_query($conn, $get_data, $params, $options);
                            $result = sqlsrv_num_rows($data_stmt);
                            

                            $data_row = sqlsrv_fetch_array($data_stmt);

                            if($result>0)
                            {
                                //name
                                $surname = $data_row['surname'];
                                $firstname = $data_row['firstname'];

                                if(isset($data_row['middlename']))
                                {
                                  $middlename = $data_row['middlename']; 
                                }else{
                                  $middlename = "";
                                }

                                //get designated station
                                $get_dstation = "select * from emp_designation where agencyid='$agencyid' and void='1' and exit_date='To Present'";

                                $dstation_stmt = sqlsrv_query($conn, $get_dstation, $params, $options);
                                $dstation_result = sqlsrv_num_rows($dstation_stmt);
                                
                                if($dstation_result>0)
                                {
                                  $dstation_row = sqlsrv_fetch_array($dstation_stmt);

                                  if($dstation_row['doh12']==1)
                                  {  
                                      $dstation_code = $dstation_row['designated_station'];

                                      //get dstation
                                      $get_dstation = "select * from mstation where sec_code='$dstation_code'";

                                      $getdstation_stmt = sqlsrv_query($conn, $get_dstation);
                                      
                                      $getdstation_row = sqlsrv_fetch_array($getdstation_stmt);

                                      $dstation = $getdstation_row['mother_station'];

                                  }
                                  else
                                  {
                                    $dstation = $dstation_row['designated_station'];
                                  }

                                      //get status
                                      $status_code = $dstation_row['status'];
                                      $get_status = "select * from ref_empstatus where id='$status_code'";
                                      $status_stmt = sqlsrv_query($conn, $get_status);
                                      $status_row = sqlsrv_fetch_array($status_stmt);
                                      $status = $status_row['status_name'];

                                }else{
                                  $dstation = "unset";
                                  $status = "unset";
                                }






                              echo "<td>
                              <a href='employee-summary.php?uid=".$agencyid."' class='btn btn-success'>View <img src='assets/img/eye.svg'></a>

                              <a href='phpspreadsheet2/simple1.php?uid=".$agencyid."' class='btn btn-primary'>Download<img src='assets/img/download.svg'></a>
                              </td>";

                              echo "<td>".$agencyid."</td>";
                              echo "<td><b style='color:blue;'>".$surname."</b></td>";
                              echo "<td><b style='color:blue;'>".$firstname."</b></td>";
                              echo "<td><b style='color:blue;'>".$middlename."</b></td>";

                              if($dstation_result>0)
                              {
                               echo "<td><b style='color:blue;'>".$dstation."</b></td>"; 
                               echo "<td><b style='color:blue;'>".$status."</b></td>"; 
                              }else{
                                echo "<td><b style='color:red;'>".$dstation."</b></td>";
                                echo "<td><b style='color:red;'>".$status."</b></td>";
                              }
                              

                              echo '</tr>';  

                            }   
                           

                        }

                          



                    ?>
                    </tbody>
                  </table>
              </div><!-- End No Labels Form -->

            </div>
          </div>
    </section>
  </form>
  </main><!-- End #main -->

  <?php
  include "layouts\layout_footer.php";
  ?>

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