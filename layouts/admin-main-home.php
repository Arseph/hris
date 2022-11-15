   <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


            
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
<br><br>

              <h5 class="card-title">Personnel Population Chart</h5>

              <!-- Donut Chart -->
              <div id="donutChart"></div>

              <?php 
              $count_msd = 0;
              $count_lhsd = 0;
              $count_pdoho = 0;
              $count_others = 0;
              $count_unset = 0;

              $sql = "select * from HR_INFO where active = '1'";
              $stmt = sqlsrv_query($conn, $sql);

              $params = array();
              $options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

                while ($row = sqlsrv_fetch_array($stmt))
                {
                  $div_uid = $row['agencyid'];

                


                   $find_division = "select * from emp_designation where agencyid='$div_uid' and exit_date = 'To Present' and void='1' and doh12='1'";
                   $div_stmt = sqlsrv_query($conn, $find_division, $params, $options);

                   $count_div  = sqlsrv_num_rows($div_stmt);

                  if($count_div==0)
                  {
                    $count_unset++;
                    
                  }else{
                    $div_row = sqlsrv_fetch_array($div_stmt);
                    $sec_code = $div_row['designated_station'];

                    $division_sql = "select * from mstation where sec_code='$sec_code'";
                    $final_stmt = sqlsrv_query($conn, $division_sql);

                    $final_row = sqlsrv_fetch_array($final_stmt);

                    $div_code = $final_row['mother_unit'];


                    if($div_code == '120201'){
                      $count_msd++;
                    }

                    if($div_code == '120202'){
                      $count_lhsd++;
                    }

                    if($div_code == '120205'){
                      $count_pdoho++;
                    }

                    if($div_code == '120207'){
                      $count_others++;
                    }

                  }


                }

              ?>



              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#donutChart"), {
                    
                    series: [<?php echo $count_msd.", ".$count_lhsd.", ".$count_pdoho.", ".$count_others.", ".$count_unset; ?>],
                    chart: {
                      height: 350,
                      type: 'donut',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Management Support Division', 'Local Health Support Division', 'Provincial DOH Office', 'Other Office/Facilities','Unset'],
                  }).render();
                });
              </script>
              <!-- End Donut Chart -->

            </div>
          </div>
        </div>



            <!-- End of property List -->

            <!-- Top Selling -->
            <div class="col-6">
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

            <?php
            $monthnum = date('m');

            $dateObj = DateTime::createFromFormat('!m', $monthnum);
  
            // Store the month name to variable
            $monthName = $dateObj->format('F');

            ?>


            <div class="card-body pb-0">
              <h5 class="card-title">Birthday Celebrants For the month of <?php echo $monthName; ?></h5>

              <div class="news">



                <?php

                $get_active = "select * from HR_INFO where active = '1'";
                $active_stmt = sqlsrv_query($conn,$get_active);

                while($active_row = sqlsrv_fetch_array($active_stmt))
                {
                  $uidfor_bday = $active_row['agencyid'];

                  $find_userlvl = "select * from user_accounts where agencyid='$uidfor_bday'";
                  $userlvl_stmt = sqlsrv_query($conn, $find_userlvl);


                  while($userlvl_row=sqlsrv_fetch_array($userlvl_stmt))
                  {
                    $user_level = $userlvl_row['userlevel'];


                    $get_bday = "select * from emp_basic where agencyid='$uidfor_bday' and firstname!='admin'";
                    $bday_stmt = sqlsrv_query($conn, $get_bday);

 


                      while($bday_row = sqlsrv_fetch_array($bday_stmt))
                      {

                        $bday_date = $bday_row['dob'];
                        $last_name = $bday_row['surname'];
                        $first_name = $bday_row['firstname'];
                        $profile_image = $bday_row['imagepath'];
                        

                        if(!is_null($bday_date))
                        {
                          $month_hired = substr($bday_date, 5,-3);
                          $this_month = date('m');
                          $bday_day = substr($bday_date, 8);


                          if($this_month==$month_hired)
                          {
                            echo '<div class="post-item clearfix">';

                            if(!is_null($profile_image))
                            {
                              
                              $image_format = substr($profile_image, -4);

                              if($image_format=='.jpg')
                              {
                                echo '<a href="employee-summary.php?uid='.$uidfor_bday.'"><img src="uploads/'.$profile_image.'" alt=""></a>';
                              }

                              if($image_format=='.png')
                              {
                                echo '<a href="employee-summary.php?uid='.$uidfor_bday.'"><img src="uploads/'.$profile_image.'" alt=""></a>';
                              }

                            }
                            else
                            {
                              echo '<img src="assets/img/personel-logo.jpg" alt="">';
                              
                            }
                            
                            echo '<h4><a href="employee-summary.php?uid='.$uidfor_bday.'"><b style="color:blue;">'.$first_name.' '.$last_name.'\'</b>s Birthday is on '.$monthName.' '.$bday_day.'</a></h4>';
                          echo '</div>';
                          }

                        }


                      }

                    
                  }

                  
                }
                

                    

                ?>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    
    <!-- begin hired personnel chart-->
  <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hired Personnel Chart</h5>

              <!-- Vertical Bar Chart -->
              <div id="verticalBarChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#verticalBarChart")).setOption({
                    
                    tooltip: {
                      trigger: 'axis',
                      axisPointer: {
                        type: 'shadow'
                      }
                    },
                    legend: {},
                    grid: {
                      left: '3%',
                      right: '4%',
                      bottom: '3%',
                      containLabel: true
                    },
                    xAxis: {
                      type: 'value',
                      boundaryGap: [0, 0.01]
                    },
                    yAxis: {
                      type: 'category',
                      data: ['January','February','March','April','May','June','July','August','September','October','November','December']
                    },

                    


                    series: [
                      <?php

                        //get highest year
                        $get_high = "select TOP 1 * from HR_INFO order by year_hired desc";
                        $high_stmt = sqlsrv_query($conn, $get_high);
                        $high_row = sqlsrv_fetch_array($high_stmt);
                        $high_year = $high_row['year_hired'];


                        //get highest year
                        $get_low = " select top 1 * from HR_INFO order by year_hired asc;";
                        $low_stmt = sqlsrv_query($conn, $get_low);
                        $low_row = sqlsrv_fetch_array($low_stmt);
                        $low_year = $low_row['year_hired'];


                        // for($l=$low_year; $l<=$high_year; $l++)
                        for($l=2018; $l<=$high_year; $l++)
                        {
                          //count hired per month of every year
                          for($m=1; $m<=12; $m++)
                          {
                            $get_monthly = "select * from HR_INFO where year_hired='$l' and month_hired like '%$m%'";
                            
                            $params = array();
                            $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                            $month_hire = sqlsrv_query($conn,$get_monthly,$params,$options);
                            $hired_permonth = sqlsrv_num_rows($month_hire);
                            
                            $count_month[]=$hired_permonth;
                          }
                            echo "{";
                            echo 'name: \''.$l.'\',';
                            echo "type: 'bar',";
                            echo "data: [".$count_month[0].", ".$count_month[1].", ".$count_month[2].", ".$count_month[3].", ".$count_month[4].", ".$count_month[5].", ".$count_month[6].", ".$count_month[7].", ".$count_month[8].", ".$count_month[9].", ".$count_month[10].", ".$count_month[11]."]";
                            

                            echo "}";
                            unset($count_month);

                            if($low_year<$high_year){
                              echo ",";
                            }

                          

                        }
                      ?>

                      // {
                      //   name: '2011',
                      //   type: 'bar',
                      //   data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                      // },
                    ]
                  });
                });
              </script>
              <!-- End Vertical Bar Chart -->

            </div>
          </div>
        </div>
        <!-- end hired personnel -->

          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Active Employee Status Population</h5>

              <!--get employment status data-->
                <?php

                        $pop_permanent=0;
                        $pop_joborder=0;
                        $pop_coterminous=0;
                        $pop_temporary=0;
                        $pop_casual=0;
                        $pop_unset=0;


                $get_status = "select * from HR_INFO where active='1'";
                $status_stmt = sqlsrv_query($conn,$get_status);

                while($status_row = sqlsrv_fetch_array($status_stmt))
                {
                  $agencyid=$status_row['agencyid']; //agencyid

                  $sql = "select * from emp_designation where agencyid = '$agencyid' and void='1' and exit_date='To Present' and doh12='1'";

                  $params = array();
                  $options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

                  $stmt = sqlsrv_query($conn, $sql, $params, $options);

                  $count_row = sqlsrv_num_rows($stmt);

                  if($count_row<1){
                    $pop_unset++;
                  }else{

                    $row = sqlsrv_fetch_array($stmt);

                    $pop_status = $row['status'];

                    if($pop_status=='1'){
                        $pop_permanent++;
                      }
                      
                      if($pop_status=='2'){
                        $pop_joborder++;
                      }
                      
                      if($pop_status=='3'){
                        $pop_coterminous++;
                      }

                      if($pop_status=='4'){
                        $pop_temporary++;
                      }

                      if($pop_status=='5'){
                        $pop_casual++;
                      }
                  }
                        
                }
                  

                ?>
              <!-- end get employment status data-->

              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Permanent',
                        'Contractual/Job Order',
                        'Coterminous',
                        'Temporary',
                        'Casual',
                        'Unset'
                      ],
                      datasets: [{
                        label: 'employment status population',
                        data: [
                          <?php
                          echo $pop_permanent.", ".$pop_joborder.", ".$pop_coterminous.", ".$pop_temporary.", ".$pop_casual.", ".$pop_unset;

                          ?>

                          ],
                        backgroundColor: [
                          'rgb(255, 128, 0)',
                          'rgb(54, 162, 235)',
                          'rgb(78, 205, 86)',
                          'rgb(255, 0, 0)',
                          'rgb(255, 204, 255)',
                          'rgb(255, 255, 0)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

            </div>
          </div>
        </div>
  </section>