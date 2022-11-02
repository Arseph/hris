<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";


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
              <h5 class="card-title">My Leaves</h5>
              
              <a href='emp-add-leave.php' class='btn btn-primary'>File New Leave</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Date filed</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Approval Status</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      //get max file id
                      $sql = "select * from emp_leave where agencyid='$uid' order by id desc";
                      $params = array();
                      $options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);
                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $alpha_count = sqlsrv_num_rows($stmt);

                      if($alpha_count>0)
                      {

                        while($row = sqlsrv_fetch_array($stmt))
                        {
                     
                          $id=$row['id'];
                          $leave_id=$row['leave_id'];
                       
                          $filestat_sql = "select recommendation from leave_status where agencyid='$uid'";

                          $result2 = sqlsrv_query($conn, $filestat_sql);
                          $row2=sqlsrv_fetch_array($result2);
                          $recommendation = $row2['recommendation'];

                          if($recommendation==2){
                            $status="<b style='color:blue'>Pending</b>";
                          }elseif($recommendation==1){
                            $status="<b style='color:green'>Approved</b>";
                          }elseif($recommendation==0){
                            $status="<b style='color:red'>Declined</b>";
                          }

                            echo'<tr>';
                          if(($recommendation=='1')||($recommendation=='0')){
                            echo'<td><a  href="emp-view-leave.php?uid='.$uid.'&id='.$id.'" class="btn btn-primary">View</a></td>';
                          }else{
                            echo'
                            <td>
                            <a href="emp-view-leave.php?id='.$id.'" class="btn btn-primary">View</a>
                            <a href="emp-update-leave.php?id='.$id.'" class="btn btn-success">Edit</a>
                            </td>';
                          }
                          echo "<td>".$row['file_date']."</td>";
                          echo "<td>";
                          for ($y = 0; $y <= 14; $y++) 
                            {
                              if($leave_id==$y){
                                echo $lv[$y];
                              }
                            }
                          echo "</td>";
                          echo "<td>".$status."</td>";
                          echo '</tr>';
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