<?php
session_start();
$uid=$_SESSION['user_id'];
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Sections List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Sections</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sections List</h5>
              <a href='add-new-sections.php' class='btn btn-primary' >Add New Section</a>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th scope="col">Section ID</th>
                        <th scope="col">Section Name</th>
                        <th scope="col">Mother Unit</th>
                        <th scope="col">Short Code</th>
                      </tr>
                    </thead>
                    <?php
                      $get_positions_sql = "select * from mstation where sec_void='1' order by mother_station asc";
                      $position_stmt = sqlsrv_query($conn,$get_positions_sql);
                    ?>
                    <tbody>
                      <?php
                        while($row = sqlsrv_fetch_array($position_stmt))
                        {
                          $munit = $row['mother_unit'];

                          $get_mother="select * from munit where div_code = '$munit'";
                          $mother_stmt = sqlsrv_query($conn,$get_mother);
                            $mother_row = sqlsrv_fetch_array($mother_stmt);
                            $mother = $mother_row['mother_unit_long'];

                          echo"<tr>";
                          
                            echo "<td>";
                          echo "<a href='edit-section.php?sec_code=".$row['sec_code']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>";
                          echo "<a href='scripts/section-del.php?id=".$row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>";
                          echo "</td>";

                            echo "<td>".$row['sec_code']."</td>
                            <td>".$row['mother_station']."</td>
                            <td>".$mother."</td>
                            <td>".$row['sec_short']."</td>
                          </tr>";
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