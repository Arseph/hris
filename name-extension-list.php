<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Name Extension List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Name Extension List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

         <div class="card">
            <div class="card-body">
              <br>
              <?php
              echo "<a href='add-name-ext.php' class='btn btn-primary'>Add New Name Extension</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">Name Extension</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //get max file id
                      $ext_sql = "select * from extension_list where void='1'";
                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
                      $ext_stmt = sqlsrv_query($conn, $ext_sql,$params,$options);

                      sqlsrv_query($conn,$ext_sql,$params,$options);
                      $ext_count = sqlsrv_num_rows($ext_stmt);

                      if($ext_count!=0)
                      {
                        while($ext_row = sqlsrv_fetch_array($ext_stmt))
                        {
                          echo "<tr>";
                          echo "<td>";
                          echo "<a href='edit-name-ext.php?id=".$ext_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>";
                          echo "<a href='scripts/ext-del.php?id=".$ext_row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>";
                          echo "</td>";
                          echo "<td>".$ext_row['id']."</td>";
                          echo "<td>".$ext_row['ext_name']."</td>";
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