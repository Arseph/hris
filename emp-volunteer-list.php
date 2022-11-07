<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";


if (!isset($_SESSION['user_id']))
{
    header('location:pages-login.php');
}
$uid=$_SESSION['user_id'];



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Voluntary Work History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Voluntary Work History</h5>
              
              <a href='<?php echo "emp-add-volunteer.php?uid=".$uid; ?>' class='btn btn-primary'>Add New Voluntary Work</a>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Action</th>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name & Address of Organization</th>
                    <th scope="col">Conducted/Sponsored By</th>
                    <th scope="col">Position / Name of Work</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      //get max file id
                      $sql = "select * from emp_volunteer where agencyid='$uid' and void='1' order by id desc";
                      $params = array();
                      $options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);
                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $alpha_count = sqlsrv_num_rows($stmt);

                      if($alpha_count>0)
                      {

                        while($row = sqlsrv_fetch_array($stmt))
                        {
                     
                          $id=$row['id'];
                          $org_name=$row['org_name'];
                          $from = $row['from_date'];
                          $hour_num = $row['hour_num'];
                          $position = $row['position'];


                        echo'<tr>';
                            
                          echo'
                            <td>
                            <a href="emp-view-volunteer.php?id='.$id.'" class="btn btn-primary"><img src="assets/img/eye-fill.svg"></a>

                            <a href="emp-update-volunteer.php?id='.$id.'&uid='.$uid.'" class="btn btn-success"><img src="assets/img/pen-fill.svg"></a>

                            <a href="scripts/del-volunteer.php?id='.$id.'&uid='.$uid.'" class="btn btn-danger"><img src="assets/img/trash.svg"></a>
                            </td>';
                          
                          echo "<td>".$id."</td>";
                          echo "<td>".$from."</td>";
                          echo "<td>".$org_name."</td>";
                          echo "<td>".$from."</td>";
                          echo "<td>".$position."</td>";
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