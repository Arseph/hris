<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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

              <!--
              <div class="card info-card sales-card">

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
                  <h5 class="card-title">Employees: <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            //End Sales Card 

            // Revenue Card 
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

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
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            // End Revenue Card 

            // Customers Card 
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

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
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            // End Customers Card 

            // Reports
            
            <div class="col-12">
             

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
                  <h5 class="card-title">Reports <span>/Today</span></h5>
                
                  // Line Chart
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  // End Line Chart 

                </div>

              </div>
            -->
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
                        <th scope="col">Data Status</th>
                      </tr>
                    </thead>
                    <tbody>

<?php
                    
                     $userid=$_SESSION['user_id'];
                     $userlevel=$_SESSION['userlevel'];
                     

                    if($userlevel<3){
                      $sql = "select agencyid, surname, firstname, middlename from dbo.emp_basic where firstname<>'admin'";
                    }else{
                      $sql = "select TOP 1 agencyid, surname, firstname, middlename from dbo.emp_basic where agencyid='$userid' order by id desc";
                    }
                    if($result = sqlsrv_query($conn, $sql))
                    {
                        while($row = sqlsrv_fetch_array($result))
                        {
                          $entry_id=$row['agencyid'];
                          $checkaddresss_sql= "select agencyid from emp_address where agencyid='$entry_id'";
                          $identification_sql= "select agencyid from emp_identification where agencyid='$entry_id'";
                          $family_sql= "select agencyid from emp_family where agencyid='$entry_id'";
                          $miscinfo_sql= "select agencyid from emp_miscinfo where agencyid='$entry_id'";
                          $hrinfo_sql= "select agencyid from hrinfo where agencyid='$entry_id'";
                          $education_sql = "select agencyid from emp_education where agencyid='$entry_id'";
                          
                          $paramm = array();
                          $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                          $address_result = sqlsrv_query( $conn, $checkaddresss_sql , $paramm, $options);
                          $identification_result = sqlsrv_query( $conn, $identification_sql , $paramm, $options);
                          $family_result = sqlsrv_query( $conn, $family_sql , $paramm, $options);
                          $miscinfo_result = sqlsrv_query( $conn, $miscinfo_sql , $paramm, $options);
                          $hrinfo_result = sqlsrv_query( $conn, $hrinfo_sql , $paramm, $options);
                          $education_result = sqlsrv_query( $conn, $education_sql , $paramm, $options);

                          $count_address = sqlsrv_num_rows( $address_result );
                          $count_identification = sqlsrv_num_rows( $identification_result );
                          $count_family = sqlsrv_num_rows( $family_result );
                          $count_miscinfo = sqlsrv_num_rows( $miscinfo_result );
                          $count_hrinfo = sqlsrv_num_rows( $hrinfo_result );
                          $count_education = sqlsrv_num_rows( $education_result );

                          if($count_education>1){
                            $count_education=1;
                          }

                          $data_completion=$count_address+$count_identification+$count_family+$count_miscinfo+$count_hrinfo+$count_education;

                          $basic_version_sql = "select max(record_version) as basic_version from emp_basic where agencyid='$entry_id'";
                              $basic_stmt = sqlsrv_query($conn,$basic_version_sql);
                              $basic_row = sqlsrv_fetch_array($basic_stmt);
                              $basic_version_sql=$basic_row['basic_version'];

                          echo "<tr>";
                          echo
                          '<td><div class="dropdown">
                          <img src="assets/img/pen-fill.svg" alt="Edit"> 
                            
                            <div class="dropdown-content">
                            <a href="update-basic.php?uid=' . $row['agencyid'] . '&record_version='.$basic_version_sql.'">Basic Information</a>';
                          if($count_address!=0){
                            echo '<a href="update-address.php?uid=' . $row['agencyid'] . '">Address</a>';
                          }
                          if($count_identification!=0){
                            echo '<a href="update-identification.php?uid=' . $row['agencyid'] . '">Identification  </a>';
                          }
                          if($count_family!=0){
                            echo '<a href="update-family.php?uid=' . $row['agencyid'] . '">Family Information</a>';
                          }
                          if($count_miscinfo!=0){
                            echo '<a href="update-misc.php?uid=' . $row['agencyid'] . '">Misc Info</a>';
                          }
                          if($count_hrinfo!=0)
                          {
                            echo '<a href="update-hrinfo.php?uid=' . $row['agencyid'] . '">HR Info</a>';
                            
                          }
                          if($count_education!=0){
                            echo '<a href="update-education.php?uid=' . $row['agencyid'] . '">Education</a>';
                          }  
                          echo '</div>
                        </div><a href="profile.php?uid='. $row['agencyid'] .'"><img src="assets/img/eye-fill.svg" alt="Edit" style="padding-left: 12px;" ></a></td>';
                          echo "<td>" . $row['agencyid'] . "</td>";
                          echo "<td>" . $row['surname'] . "</td>";
                          echo "<td>" . $row['firstname'] . "</td>";
                          echo "<td>" . $row['middlename'] . "</td>";


                          if($count_hrinfo!=0)
                          {   
                            $entry_id=$row['agencyid'] ;
                            $designation_sql = "select agencyid, designated_station from dbo.hrinfo where agencyid='$entry_id'";
                            $res = sqlsrv_query($conn, $designation_sql);
                            
                            while($row = sqlsrv_fetch_array($res))
                            { 
                              $d_station=$row['designated_station'];
                              $d_sql = "select * from mstation where id='$d_station'";
                                  
                              $res = sqlsrv_query($conn, $d_sql);
                              
                              while($row = sqlsrv_fetch_array($res))
                              {
                                $designated_station=$row['mother_station'];
                                
                                if($count_hrinfo>0)
                                {
                                  echo "<td>" . $designated_station . "</td>";
                                }
                              }
                            }
                          }
                          else
                          {
                            echo "<td>Unset</td>";
                          }
                          if($data_completion==6){
                            echo "<td><b style='color:green;'>Complete</b></td>";
                          }else{
                            echo "<td><b style='color:red;'>Inomplete</b></td>";
                          }
                    }
}
                            


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
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="#">Employee name just got married</a></h4>
                  <p>Personel's Family Name needs update</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">Employee name step incremented</a></h4>
                  <p>Employee monthly salary updated</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="#">Employee name got promoted</a></h4>
                  <p>Employee monthly Salary updated</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="#">Employee entered Retirement</a></h4>
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