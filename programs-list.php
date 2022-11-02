<?php
session_start();
$uid=$_SESSION['user_id'];
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Programs List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Programs List</h5>
              <a href='add-new-program.php' class='btn btn-primary'>Add New Program</a>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th scope="col">Program Under</th>
                        <th scope="col">Program ID</th>
                        <th scope="col">Program Name</th>
                        <th scope="col">Short Code</th>
                      </tr>
                    </thead>
                    <?php
                      $get_prog_sql = "select * from ref_program where prog_void='1' order by prog_desc asc";
                      $prog_stmt = sqlsrv_query($conn,$get_prog_sql);
                    ?>
                    <tbody>
                      <?php
                        while($row = sqlsrv_fetch_array($prog_stmt))
                        {
                          $section_code=$row['sec_code'];
                          $get_section= "select * from mstation where sec_code='$section_code'";
                          $get_section_stmt = sqlsrv_query($conn,$get_section);
                          $getsec_row = sqlsrv_fetch_array($get_section_stmt);

                          if(!empty($getsec_row['mother_station'])){
                            $section=$getsec_row['mother_station'];
                          }else{
                            $section="";
                          }
                          

                          echo" <tr>";

                            echo "<td>";
                          echo "<a href='edit-program.php?prog_code=".$row['prog_code']."&id=".$row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>";
                          echo "<a href='scripts/program-del.php?id=".$row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>";
                          echo "</td>";

                            echo "<td>".$row['prog_code']."</td>
                            <td>".$row['prog_desc']."</td>
                            <td>".$row['prog_short']."</td>
                            
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