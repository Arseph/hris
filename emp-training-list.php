<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
include "scripts\kick.php";

if (!isset($_SESSION['user_id']))
{
    header('location:pages-login.php');
}
$uid=$_GET['uid'];

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <?php
          if($_SESSION['userlevel']<3)
          {
            echo '<li class="breadcrumb-item"><a href="adm-master-list.php">Employee Master List</a></li>';

            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$uid.'">Employee Summary</a></li>';


          }
          ?>
          <li class="breadcrumb-item">Trainings History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Training History</h5>
              
              <a href='<?php echo "emp-add-training.php?uid=".$uid; ?>' class='btn btn-primary'>Add New Training</a>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Title</th>
                    <th scope="col">Conducted/Sponsored By</th>
                    <th scope="col">Learning & Development Type</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      //get max file id
                      $sql = "select * from emp_training where agencyid='$uid' and void='1' order by id desc";
                      $params = array();
                      $options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);
                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $alpha_count = sqlsrv_num_rows($stmt);

                      if($alpha_count>0)
                      {

                        while($row = sqlsrv_fetch_array($stmt))
                        {
                     
                          $id=$row['id'];
                          $title=$row['title'];
                          $from = $row['from_date'];
                          $ld_type = $row['ld_type'];
                          $sponsor = $row['conduct_sponsor'];

                          if($ld_type=='1'){
                            $ld_type = "Managerial";
                          }

                          if($ld_type=='2'){
                            $ld_type = "Supervisory";
                          }

                          if($ld_type=='3'){
                            $ld_type = "Technical";
                          }

                          if($ld_type=='4'){
                            $ld_type = "Foundation";
                          }

                        echo'<tr>';
                            
                          echo'
                            <td>

                            <a href="emp-update-training.php?id='.$id.'&uid='.$uid.'" class="btn btn-success"><img src="assets/img/pen-fill.svg"></a>

                            <a href="scripts/del-training.php?id='.$id.'&uid='.$uid.'" class="btn btn-danger"><img src="assets/img/trash-fill.svg"></a>

                            </td>';
                          
                          echo "<td>".$id."</td>";
                          echo "<td>".$from."</td>";
                          echo "<td>".$title."</td>";
                          echo "<td>".$sponsor."</td>";
                          echo "<td>".$ld_type."</td>";
                          }

                        echo '</tr>';

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