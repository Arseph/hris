<?php
session_start();
$user_id=$_GET['uid'];
include "layouts\layout_sidebar.php";
$get_user = "select * from emp_basic where agencyid='$user_id'";
$user_stmt = sqlsrv_query($conn,$get_user);
$row=sqlsrv_fetch_array($user_stmt);

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Employee Eligibility List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Employee Eligibility List</li>
          <li class="breadcrumb-item"><?php echo $row['firstname']." ".$row['surname']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Eligibility List</h5>
              <?php
              echo "<a href='emp-add-eligibility.php?uid=".$user_id."' class='btn btn-primary'>Add New Eligibility</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No</th>
                        <th scope="col">Eligibility Name</th>
                        <th scope="col">Eligibility Type</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php



                        $getmatch_sql = "select * from emp_eligibility where agencyid='$user_id' and void='1' order by id asc";

                        $match_stmt = sqlsrv_query($conn, $getmatch_sql);

                        while($match_row = sqlsrv_fetch_array($match_stmt))
                        {
                          $elig_type = $match_row['elig_type'];

                          //get elig ref
                          $find_elig = "select * from ref_elig_main where id='$elig_type'";
                          $elig_stmt = sqlsrv_query($conn,$find_elig);
                          $elig_row= sqlsrv_fetch_array($elig_stmt);

                          $elig_id = $elig_row['id'];
                        
                          $elig_name = $elig_row['elig_name'];
                          $elig_type = $elig_row['elig_cat'];

                          //get elig category
                          $find_eligtype = "select * from ref_eligibility where id='$elig_type'";
                          $eligtype_stmt = sqlsrv_query($conn,$find_eligtype);
                          $eligtype_row= sqlsrv_fetch_array($eligtype_stmt);
                          $elig_type = $eligtype_row['elig_name'];

                          echo "<td><a href='emp-edit-eligibility.php?uid=".$user_id."&id=".$match_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>
                          <a href='scripts/emp-eligibility-del.php?uid=".$user_id."&id=".$match_row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>
                          </td>";

                          
                          echo "<td>".$match_row['id']."</td>";

                          
                          echo "<td><b>".$elig_name."</b></td>";
                          echo "<td><b>".$elig_type."</b></td>";
                          echo '</tr>';
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