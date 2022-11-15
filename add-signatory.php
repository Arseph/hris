<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add New Signatory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="signatory-list.php">Signatory List</a></li>
          <li class="breadcrumb-item active">Add Signatory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/add-eligibility-main-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <label>Employee List</label>
              <select class='form-control' name='sel_eligcat'>
                <option value='0'>- Select -</option>
                <?php

                $get_active = "select * from HR_INFO where active =1";
                $param =array();
                $option=array("Scrollable"=> SQLSRV_CURSOR_KEYSET);
                $active_stmt = sqlsrv_query($conn, $get_active, $param, $option);

                $count_active = sqlsrv_num_rows($active_stmt);

                if($count_active>0)
                {
                  while($active_row = sqlsrv_fetch_array($active_stmt))
                  {
                     $active_id = $active_row['agencyid']; //select value

                     $find_userlvl = "select * from user_accounts where agencyid = '$active_id' and userlevel =3";
                     $userlvl_stmt = sqlsrv_query($conn, $find_userlvl, $param, $option);
                     $userlvl_count = sqlsrv_num_rows($userlvl_stmt);

                       if($userlvl_count>0)
                       {
                        $get_id = "select * from emp_basic where agencyid='$active_id'";
                           
                           $id_stmt = sqlsrv_query($conn, $get_id);

                           while($id_row = sqlsrv_fetch_array($id_stmt))
                           {
                             $fname = $id_row['firstname'];
                             $mname = $id_row['middlename'];
                             $sname = $id_row['surname'];
                             $sname = utf8_encode($sname);
                             // $sname = html_entity_decode(htmlentities($sname));

                             if(empty($mname))
                             {
                              $full_name = $fname." ".$sname;
                             }
                              
                             if(!empty($mname))
                             {
                              $full_name = $fname." ".$mname." ".$sname;
                             }

                             

                                //find first part name extension

                                $name_ext = array();

                                $emp_elig = "select * from emp_eligibility where agencyid = '$active_id' and void='1'";
                                $empelig_stmt = sqlsrv_query($conn, $emp_elig, $param, $option);
                                $empelig_count = sqlsrv_num_rows($empelig_stmt);

                               if($empelig_count>0)
                               {
                                
                                while($empelig_row = sqlsrv_fetch_array($empelig_stmt))
                                {  
                                
                                $emp_elig_id = $empelig_row['elig_type'];

                                echo "emp id: ".$emp_elig_id;

                                $get_ext_sql = "select * from ref_elig_main where id='$emp_elig_id' and void='1'";

                                $get_ext_stmt = sqlsrv_query($conn, $get_ext_sql);

                                $name_ext = array();

                                  while($final_part1_row = sqlsrv_fetch_array($get_ext_stmt))
                                  {
                                    $name_ext[] = $final_part1_row['name_ext'];
                                  }

                                  ///// counter

                                  $count = count($name_ext);
                                  $stopper = $count-1;
                                  // $name_ext_pt1 = array();

                                  // echo "lel ".$count;
                                  
                                  for ($x = 0; $x <= $count; $x++) 
                                  {
                                    $name_ext_pt1 .= $name_ext[$x];
                                    
                                    if($x<$stopper){
                                    
                                    $name_ext_pt1 .= ", ";
                                    
                                    }
                                  }

                                  echo "tessa ".$name_ext_pt1;

                                  ///// counter


                                }
                                
                               }

                            }
                          }

                    // echo "<option value='$active_id'>".$fname."</option>";
                      echo "<option value='$active_id'>".$full_name."</option>";
                  }
                      

                }
                ?>
              </select>
              <br>

              <label>Role</label>
              <select class='form-control' name='sel_eligcat'>
                <option value='0'>- Select -</option>
                <option value='1'>Request</option>
                <option value='2'>Issue</option>
              </select>

              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='eligibility-list.php' class="btn btn-secondary">Return</a>

              </div>
            </div>
          </div>
          </form>
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