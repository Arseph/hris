<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
$completion_count = 0;
$userlevel=$_SESSION['userlevel'];
?>
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding-right: 10px;
  padding-left: 10px;
  font-size: 15px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Employee's Master list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">

            </div>
            
            <!-- End Reports -->

            <!-- Property list start -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                <?php
                if($userlevel<3)
                  {
                  echo '
                  <h5 class="card-title">Employee Master List</h5>
                  <a href="addemp.php" class="btn btn-primary">Add New Employee</a>';
                  }else{
                    echo '<h5 class="card-title">My Information</h5>';
                  }
                ?>
<br><br>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th scope="col">Agency ID</th>
                        <th scope="col">Surname</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Designated Station</th>
                        <!-- <th scope="col">Data Status</th> -->
                      </tr>
                    </thead>
                    <tbody>

<?php
                    
                     $userid=$_SESSION['user_id'];
                     $userlevel=$_SESSION['userlevel'];
                     

                    if($userlevel<3){
                      $sql = "select distinct agencyid from emp_basic where firstname<>'admin'";
                      
                    }else{
                     echo "<script>window.open('index.php','_self')</script>";
                                 
                    }

                    $get_all_stmt = sqlsrv_query($conn, $sql);

                    $paramm = array();
                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                    while($get_all_rows = sqlsrv_fetch_array($get_all_stmt))
                    {

                      //use this id to find other tables
                      $agencyid = $get_all_rows['agencyid'];

                      //get all basic info
                      $getbasic_sql = "select TOP 1 * from emp_basic where agencyid='$agencyid' order by id desc";

                      $getbasic_stmt = sqlsrv_query($conn,$getbasic_sql);


                      while($getbasic_row = sqlsrv_fetch_array($getbasic_stmt))
                      {

                          //get address
                          $checkaddresss_sql = "select TOP 1 * from emp_address where agencyid='$agencyid' order by id desc";
                          $address_result = sqlsrv_query( $conn, $checkaddresss_sql , $paramm, $options);
                          $count_address = sqlsrv_num_rows($address_result);
                          $row_address = sqlsrv_fetch_array($address_result);


                          // //get education
                          // $checkeducation_sql = "select TOP 1 * from emp_education where agencyid='$agencyid' order by record_version desc";
                          
                          // $education_result = sqlsrv_query( $conn, $checkeducation_sql , $paramm, $options);

                          // $count_education = sqlsrv_num_rows($education_result);
                          // $row_education = sqlsrv_fetch_array($education_result);

                          //get identification
                          $identification_sql = "select TOP 1 * from emp_identification where agencyid='$agencyid' order by id desc";
                          $identification_result = sqlsrv_query( $conn, $identification_sql , $paramm, $options);
                          $count_identification = sqlsrv_num_rows($identification_result);
                          $row_identification = sqlsrv_fetch_array($identification_result);


                          //get family
                          $checkfamily_sql = "select TOP 1 * from emp_family where agencyid='$agencyid' order by id desc";
                          $family_result = sqlsrv_query( $conn, $checkfamily_sql , $paramm, $options);
                          $count_family = sqlsrv_num_rows($family_result);
                          $row_family = sqlsrv_fetch_array($family_result);

                          //get misc info
                          $checkmisc_sql = "select TOP 1 * from emp_miscinfo where agencyid='$agencyid' order by id desc";
                          $misc_result = sqlsrv_query( $conn, $checkmisc_sql , $paramm, $options);
                          $count_misc = sqlsrv_num_rows($misc_result);
                          $row_misc = sqlsrv_fetch_array($misc_result);

                          //get designation
                          // $checkdesignation_sql = "select TOP 1 * from emp_designation where agencyid='$agencyid' order by id desc";
                          // $designation_result = sqlsrv_query( $conn, $checkdesignation_sql , $paramm, $options);
                          // $count_designation = sqlsrv_num_rows($designation_result);
                          // $row_designation = sqlsrv_fetch_array($designation_result);

                          //get designation
                          $checkdesignation_sql = "select TOP 1 * from emp_designation where agencyid='$agencyid' order by id desc";
                          $designation_result = sqlsrv_query( $conn, $checkdesignation_sql , $paramm, $options);
                          $count_designation = sqlsrv_num_rows($designation_result);
                          $row_designation = sqlsrv_fetch_array($designation_result);

                          echo "<tr>";
                            echo '<td><div class="dropdown">';
                            echo '<img src="assets/img/pen-fill.svg" alt="Edit">';
                            echo '<div class="dropdown-content">';
                            echo "<a href='update-basic.php?uid=".$getbasic_row['agencyid']."&record_version=".$getbasic_row['record_version']."'>Basic Information</a>";

                            if($count_address!=0){
                               echo "<a href='update-address.php?uid=".$row_address['agencyid']."&record_version=".$row_address['record_version']."'>Address</a>";
                            $completion_count++;
                            }

                            if($count_identification!=0){
                               echo "<a href='update-identification.php?uid=".$row_identification['agencyid']."&record_version=".$row_identification['record_version']."'>Identification</a>";
                            $completion_count++;
                            }

                            

                            if($count_family!=0){
                               echo "<a href='update-family.php?uid=".$row_family['agencyid']."&record_version=".$row_family['record_version']."'>Family</a>";
                            $completion_count++;
                            }

                            if($count_misc!=0){
                               echo "<a href='update-misc.php?uid=".$row_misc['agencyid']."&record_version=".$row_misc['record_version']."'>Misc Info</a>";
                            $completion_count++;
                            }


                            if($count_designation!=0)
                            {
                              echo "<a href='emp-designation-history.php?uid=".$row_designation['agencyid']."'>Employee Designation</a>";
                              // echo $row_designation['agencyid']
                               // echo "<a href='emp-designation-history.php?uid=".$row_designation['agencyid'].">Designation History</a>";

                            $completion_count++;
                            }

                            
                               echo "<a href='emp-education-history.php?uid=".$get_all_rows['agencyid']."'>Education</a>";
                            
                            
                            echo '</div></div> ';

                            //view segment
                            echo '<div class="dropdown">';
                            echo '<img src="assets/img/eye-fill.svg" alt="Edit">';
                            echo '<div class="dropdown-content">';
                            echo '</div></div>';
                            echo '</td>';
                            //echo "<td><a href='update-basic.php?uid=".$getbasic_row['agencyid']."&record_version=".$getbasic_row['record_version']."'>Update Record</a></td>";
                            echo "<td>".$getbasic_row['agencyid']."</td>";
                            echo "<td>".utf8_decode($getbasic_row['surname'])."</td>";
                            echo "<td>".$getbasic_row['firstname']."</td>";
                            echo "<td>".$getbasic_row['middlename']."</td>";
                            echo "<td>";


                            if($count_designation!=0)
                            {
                              $dstation=$row_designation['designated_station'];

                              $dstation_sql="select * from mstation where sec_code = '$dstation'";
                              $dstation_stmt = sqlsrv_query($conn,$dstation_sql,$paramm,$options);
                              $countdes_result = sqlsrv_num_rows($dstation_stmt);

                              if($countdes_result>0){
                                $dstation_row = sqlsrv_fetch_array($dstation_stmt);
                                echo "<b style='color:blue;'>".$dstation_row['mother_station']."</b>";
                              }else{

                                echo "<b style='color:blue;'>".$dstation."</b>";
                              }
                              
                              // echo "<a href='emp-designation-history.php?uid=".$row_designation['agencyid']."&record_version=".$row_designation['record_version']."'>
                              // Update Employee Designation</a>";

                            }else{
                              echo "<b style='color:red;'>unset</b>";
                            }
                            
                            echo "</td>";
                            // echo "<td>";

                            // if($completion_count==6){
                            //   echo "<b style='color:green;'>Complete</b>";
                            // }else{
                            //   echo "<b style='color:red;'>Incomplete</b>";

                            // }
                            // echo "</td>";
                          echo"</tr>";
                          // $completion_count=0;
                        // }
                      }

                    };
                    

?>

                      
                    </tbody>
                  </table>

                </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div>
            </div>

            <!-- End of property List -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <!--
                <div class="card-body pb-0">
                  <h5 class="card-title">Personnel Property Summary<span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item image</th>
                        <th scope="col">Item Summary</th>
                        <th scope="col">Date</th>
                        <th scope="col">Owner</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="fw-bold">124</td>
                        <th scope="row"><a href="#"><img src="assets/img/personel-logo.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">External hard disk</a></td>
                         <td class="fw-bold">12/21/2021</td>
                          <td class="fw-bold">Sample Sample sample</td>
                      </tr>
                      <tr>
                        <td class="fw-bold">98</td>
                        <th scope="row"><a href="#"><img src="assets/img/personel-logo.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Office furniture</a></td>
                        <td><span class="badge bg-success">Active</span></td>
                        
                      </tr>
                      <tr>
                        <td class="fw-bold">74</td>
                        <th scope="row"><a href="#"><img src="assets/img/personel-logo.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Coffee machine</a></td>
                        <td><span class="badge bg-success">Active</span></td>
                        
                      </tr>
                      <tr>
                        <td class="fw-bold">63</td>
                        <th scope="row"><a href="#"><img src="assets/img/personel-logo.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Universal stapler</a></td>
                        <td><span class="badge bg-success">Active</span></td>
                        
                      </tr>
                      <tr>
                        <td class="fw-bold">41</td>
                        <th scope="row"><a href="#"><img src="assets/img/personel-logo.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">File Cabinet</a></td>
                        <td><span class="badge bg-success">Active</span></td>
                        
                      </tr>
                    </tbody>
                  </table>

                </div>
                -->
              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Audit Trail Summary</h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                  <a href="#" class="fw-bold text-dark">User 1</a> Added a New Employee
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    <a href="#" class="fw-bold text-dark">User 1</a> Deleted an Employee record
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    <a href="#" class="fw-bold text-dark">User 3</a> has logged in
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    <a href="#" class="fw-bold text-dark">User 2</a> Downloaded <a href="#" class="fw-bold text-dark">Document x</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    <a href="#" class="fw-bold text-dark">User 3</a> Updated <a href="#" class="fw-bold text-dark">Employee name's</a> Employee information
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    <a href="#" class="fw-bold text-dark">User 1</a> has logged out
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <!--
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
          
           End Budget Report -->

          <!-- Website Traffic 
          
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
          
           End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Employee Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Its Employee Name's Birthday Today</a></h4>
                  <p>its her 54th birthday today</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">Employee name step incremented</a></h4>
                  <p>Employee monthly salary updated</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="#">Employee name is Eligible for promotion</a></h4>
                  <p>Employee monthly Salary updated</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="#">Employee entered Retirement Age</a></h4>
                  <p>Status Changed to inactive</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Department of Health</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      
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
<!--
<script>
  $( document ).ready(function() {
    alert( "ready!" );
});
</script>
-->
</html>