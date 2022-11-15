<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
include "scripts\kick.php";


$user_id=$_GET['uid'];
$get_name_sql = "select * from emp_basic where agencyid = '$user_id'";
$get_stmt = sqlsrv_query($conn,$get_name_sql);

$get_row = sqlsrv_fetch_array($get_stmt);

$fname = $get_row['firstname'];
$sname = $get_row['surname'];
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Education History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          
          <?php
          if($_SESSION['userlevel']<3){
            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$user_id.'">Employee Summary</a></li>';
          }
          ?>
          
          <li class="breadcrumb-item active">Education History</li>
          <li class="breadcrumb-item active"><?php echo $fname." ".$sname; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
          
            <div class="card-body">
              <br>
              <h4>Primary Level Education</h4>
              <?php

                if($_SESSION['userlevel']<3){
                  echo '<a class="btn btn-secondary" href="employee-summary.php?uid='.$user_id.'">Back</a><br><br>';
                }

                  echo "<a href='emp-add-primary.php?uid=".$user_id."' class='btn btn-primary'>Add New Primary Education</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php

                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      //get max file id
                      $sql = "select * from emp_education_primary where agencyid='$user_id'";

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_primary = sqlsrv_num_rows($stmt);

                      
                     

                      
                    if($count_primary>0)
                    {
                       while($row_primary = sqlsrv_fetch_array($stmt))
                       {
                           $primary_id = $row_primary['id'];


                        if($row_primary['void']=='1'){
                          echo "<td>

                          <a href='emp-edit-primary.php?uid=".$user_id."&id=".$primary_id."' class='btn btn-success'><img src='assets/img/pen.svg'></a>

                          <a href='scripts/emp-education-del.php?uid=".$user_id."&id=".$primary_id."&edu_lvl=primary' class='btn btn-danger'><img src='assets/img/trash.svg'></a>

                          </td>";
                          echo "<td>".$row_primary['id']."</td>";
                          echo "<td>".$row_primary['school']."</td>";

                          if($row_primary['graduate']=='1'){
                           echo "<td style='color:blue;'><b>".$row_primary['from_year']."</b></td>";
                           echo "<td style='color:blue;'><b>".$row_primary['to_year']."</b></td>"; 
                          }else{
                           echo "<td>".$row_primary['from_year']."</td>";
                           echo "<td>".$row_primary['to_year']."</td>"; 
                          }
                          

                          echo "<td>".$row_primary['scholarship']."</td>";
                          echo '</tr>';
                        }
                       }
                    
                        
                        
                      }
                    ?>
                    </tbody>
                  </table>

              <br><h4>Secondary Level Education</h4>
                 <?php
              echo "<a href='emp-add-secondary.php?uid=".$user_id."' class='btn btn-primary'>Add New Secondary Education</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php

                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      //get max file id
                      $sql = "select * from emp_education_secondary where agencyid='$user_id'";

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_secondary = sqlsrv_num_rows($stmt);

                      
                     

                      
                    if($count_secondary>0)
                    {
                       while($row_secondary = sqlsrv_fetch_array($stmt))
                       {
                           $secondary_id = $row_secondary['id'];


                        if($row_secondary['void']=='1'){
                          echo "<td>

                          <a href='emp-edit-secondary.php?uid=".$user_id."&id=".$secondary_id."' class='btn btn-success'><img src='assets/img/pen.svg'></a>

                          <a href='scripts/emp-education-del.php?uid=".$user_id."&id=".$secondary_id."&edu_lvl=secondary' class='btn btn-danger'><img src='assets/img/trash.svg'></a>

                          </td>";
                          echo "<td>".$row_secondary['id']."</td>";
                          echo "<td>".$row_secondary['school']."</td>";

                          if($row_secondary['graduate']=='1'){
                           echo "<td style='color:blue;'><b>".$row_secondary['from_year']."</b></td>";
                           echo "<td style='color:blue;'><b>".$row_secondary['to_year']."</b></td>"; 
                          }else{
                           echo "<td>".$row_secondary['from_year']."</td>";
                           echo "<td>".$row_secondary['to_year']."</td>"; 
                          }
                          

                          echo "<td>".$row_secondary['scholarship']."</td>";
                          echo '</tr>';
                        }
                       }
                    
                        
                        
                      }
                    ?>
                    </tbody>
                  </table>


                   <br><h4>Bachelors Level Education</h4>
                  <?php
              echo "<a href='emp-add-bachelors.php?uid=".$user_id."' class='btn btn-primary'>Add New Bachelor's Level Education</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                      //get max file id
                      $bachelors_sql = "select * from emp_education_bachelors where agencyid='$user_id' and void='1'";
                      $bachelors_stmt = sqlsrv_query($conn, $bachelors_sql, $params, $options);

                      $bachelors_count = sqlsrv_num_rows($bachelors_stmt);

                      if($bachelors_count>0)
                      {

                        while($bach_row = sqlsrv_fetch_array($bachelors_stmt))
                        {
                          echo "<td>
                       <a href='emp-edit-bachelors.php?uid=".$user_id."&id=".$bach_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>

                       <a href='scripts/emp-education-del.php?uid=".$user_id."&id=".$bach_row['id']."&edu_lvl=bachelors' class='btn btn-danger'><img src='assets/img/trash.svg'></a>

                       </td>";
                        echo "<td>".$bach_row['id']."</td>";
                        echo "<td>".$bach_row['school']."</td>";

                        if($bach_row['graduate']=='1'){
                         echo "<td style='color:blue;'><b>".$bach_row['from_year']."</b></td>";
                         echo "<td style='color:blue;'><b>".$bach_row['to_year']."</b></td>"; 
                        }else{
                         echo "<td>".$bach_row['from_year']."</td>";
                         echo "<td>".$bach_row['to_year']."</td>"; 
                        }
                        echo "<td>".$bach_row['scholarship']."</td>";
                        echo '</tr>';
                        }  
                      }
                      
                     
                      

                    ?>
                    </tbody>
                  </table>


                  <br><h4>Vocational Level Education</h4>
                  <?php
              echo "<a href='emp-add-vocational.php?uid=".$user_id."' class='btn btn-primary'>Add New Vocational Level Education</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                      //get max file id
                      $vocational_sql = "select * from emp_education_vocational where agencyid='$user_id' and void='1'";
                      $vocational_stmt = sqlsrv_query($conn, $vocational_sql, $params, $options);

                      $vocational_count = sqlsrv_num_rows($vocational_stmt);

                      if($vocational_count>0)
                      {

                        while($voc_row = sqlsrv_fetch_array($vocational_stmt))
                        {
                          echo "<td>
                       <a href='emp-edit-vocational.php?uid=".$user_id."&id=".$voc_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>

                       <a href='scripts/emp-education-del.php?uid=".$user_id."&id=".$voc_row['id']."&edu_lvl=vocational' class='btn btn-danger'><img src='assets/img/trash.svg'></a>

                       </td>";
                        echo "<td>".$voc_row['id']."</td>";
                        echo "<td>".$voc_row['school']."</td>";

                        if($voc_row['graduate']=='1'){
                         echo "<td style='color:blue;'><b>".$voc_row['from_year']."</b></td>";
                         echo "<td style='color:blue;'><b>".$voc_row['to_year']."</b></td>"; 
                        }else{
                         echo "<td>".$voc_row['from_year']."</td>";
                         echo "<td>".$voc_row['to_year']."</td>"; 
                        }
                        echo "<td>".$voc_row['scholarship']."</td>";
                        echo '</tr>';
                        }  
                      }
                      
                     
                      

                    ?>
                    </tbody>
                  </table>

                  <br><h4>Master/Doctoral Level Education</h4>
                  <?php
              echo "<a href='emp-add-maphd.php?uid=".$user_id."' class='btn btn-primary'>Add New Master/Doctoral Level Education</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                      //get max file id
                      $maphd_sql = "select * from emp_education_maphd where agencyid='$user_id' and void='1'";
                      $maphd_stmt = sqlsrv_query($conn, $maphd_sql, $params, $options);

                      $maphd_count = sqlsrv_num_rows($maphd_stmt);

                      if($maphd_count>0)
                      {

                        while($maphd_row = sqlsrv_fetch_array($maphd_stmt))
                        {
                          echo "<td>
                       <a href='emp-edit-maphd.php?uid=".$user_id."&id=".$maphd_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>

                       <a href='scripts/emp-education-del.php?uid=".$user_id."&id=".$maphd_row['id']."&edu_lvl=maphd' class='btn btn-danger'><img src='assets/img/trash.svg'></a>

                       </td>";
                        echo "<td>".$maphd_row['id']."</td>";
                        echo "<td>".$maphd_row['school']."</td>";

                        if($maphd_row['graduate']=='1'){
                         echo "<td style='color:blue;'><b>".$maphd_row['from_year']."</b></td>";
                         echo "<td style='color:blue;'><b>".$maphd_row['to_year']."</b></td>"; 
                        }else{
                         echo "<td>".$maphd_row['from_year']."</td>";
                         echo "<td>".$maphd_row['to_year']."</td>"; 
                        }
                        echo "<td>".$maphd_row['scholarship']."</td>";
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