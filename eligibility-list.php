<?php
session_start();
include "scripts\connect.php";
include "scripts\admin-check.php";
include "layouts\layout_sidebar.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Eligibility List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Eligibility List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <br>
              <?php
              echo "<a href='add-eligibility-main.php' class='btn btn-primary'>Add New Eligibility</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">Eligibility Name</th>
                        <th scope="col">Eligibility Category</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //get max file id
                      $elig_sql = "select * from ref_elig_main where void='1'";
                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
                      $elig_stmt = sqlsrv_query($conn, $elig_sql,$params,$options);

                      sqlsrv_query($conn,$elig_sql,$params,$options);
                      $elig_count = sqlsrv_num_rows($elig_stmt);

                      if($elig_count!=0)
                      {
                        while($elig_row = sqlsrv_fetch_array($elig_stmt))
                        {
                          echo "<tr>";

                          echo "<td>";
                          echo "<a href='update-eligibility-main.php?id=".$elig_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>";
                          echo "<a href='scripts/elig-del.php?id=".$elig_row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>";
                          echo "</td>";

                          echo "<td>".$elig_row['id']."</td>";
                          echo "<td>".$elig_row['elig_name']."</td>";

                          $get_eligcat = "select * from ref_eligibility where id='".$elig_row['elig_cat']."'";
                          $eligcat_stmt = sqlsrv_query($conn, $get_eligcat);
                          $eligtype_row = sqlsrv_fetch_array($eligcat_stmt);
                          echo "<td>".$eligtype_row['elig_name']."</td>";

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