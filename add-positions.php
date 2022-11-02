<?php
session_start();
$uid=$_SESSION['user_id'];
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add Position Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Position</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Position List</h5>
              <a href='add-new-positions.php' class='btn btn-primary'>Add New Position</a>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th scope="col">Position ID</th>
                        <th scope="col">Position Name</th>
                        <th scope="col">Short-Code</th>
                        <th scope="col">Permanent Position</th>
                      </tr>
                    </thead>
                    <?php
                      $get_positions_sql = "select * from select_position where pos_void='1' order by EmpPosition asc";
                      $position_stmt = sqlsrv_query($conn,$get_positions_sql);
                    ?>
                    <tbody>
                      <?php
                        while($row = sqlsrv_fetch_array($position_stmt)){
           

                            echo "<td>";
                          echo "<a href='edit-position.php?pos_code=".$row['pos_code']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>";
                          echo "<a href='scripts/position-del.php?id=".$row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>";
                          echo "</td>";

                            echo"
                            <td>".$row['pos_code']."</td>
                            <td>".$row['EmpPosition']."</td>";
                            if(!empty($row['pos_short'])){
                              echo "<td>".$row['pos_short']."</td>";
                            }else{
                              echo "<td><b style='color:red;'>Unset</b></td>";
                            }
                            if($row['permanent']=='1'){
                              echo "<td><b style='color:blue;'>Yes</b></td>";
                            }else{
                              echo "<td><b style='color:red;'>No</b></td>";
                            }
                            
                          echo "</tr>";
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