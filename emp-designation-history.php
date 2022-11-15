<?php
session_start();
$user_id=$_GET['uid'];
include "layouts\layout_sidebar.php";
include "scripts\kick.php";

$get_user = "select * from emp_basic where agencyid='$user_id'";
$user_stmt = sqlsrv_query($conn,$get_user);
$row=sqlsrv_fetch_array($user_stmt);
// error_reporting(0);
// ini_set('display_errors', 0);


session_start();

if (isset($_POST['login']))
{
  $username = utf8_decode($_POST['username']);
  $password = $_POST['password'];

                        
  $accountcheck_sql = "select * from user_accounts where username='$username' and pass='$password'";
  $paramm = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $accountcheck_sql , $paramm, $options);
    
    $total_account = sqlsrv_num_rows( $stmt );

    echo $total_account;

        if ($total_account > 0) 
        {     

            $row = sqlsrv_fetch_array($stmt);
            $agencyid= $row['agencyid'];
            $_SESSION['user_id'] = $agencyid;
            $_SESSION['userlevel']  = $row['userlevel'];
            

             $userlvl_sql = "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
             $userlvl_stmt = sqlsrv_query($conn,$userlvl_sql);
             $userlvl_row = sqlsrv_fetch_array($userlvl_stmt);
             $_SESSION['firstname']  = $userlvl_row ['firstname'];
           

            //CHECK IF FIRST LOGIN
            $new_check_sql = "select * from audit_trail where agencyid='$agencyid' and action_type='3'";
            
            $paramm = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $stmt = sqlsrv_query( $conn, $new_check_sql, $paramm, $options);
            $find_verify = sqlsrv_num_rows( $stmt );

            //IF FIRST LOGIN
            if($find_verify==0)
            {
                include "audit_first_login.php";
                
            }
            else
            {
                include "audit_login.php";
              header('location:index.php');

            }

        }else{
            $error_msg = '<br/><p style="color:red">incorrect username and/or password</p>';
        }
        

}    
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Employee Designation History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
          if($_SESSION['userlevel']<3){
            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$user_id.'">Employee Summary</a></li>';
          }
          ?>
          <li class="breadcrumb-item">Employee Designation History</li>
          <li class="breadcrumb-item active"><?php echo $row['firstname']." ".$row['surname']; ?></li>
        </ol>

      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Designation History</h5>
              <?php
              echo "<a href='emp-add-designation.php?uid=".$user_id."' class='btn btn-primary'>Add New Designation</a>";
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Action</th>
                        <th class="fw-bold">From</th>
                        <th class="fw-bold">To</th>
                        <th scope="col">Mother Station</th>
                        <th scope="col">Designated Station</th>
                        <th scope='col'>Position</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //get max file id
                      $sql = "select * from emp_designation where agencyid='$user_id' and void='1'";
                      $params= array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_row = sqlsrv_num_rows($stmt);
                      


                      if($count_row>0)
                      {
                        while($row = sqlsrv_fetch_array($stmt))
                        {
                          $mstation=$row['mother_station'];
                          $dstation=$row['designated_station'];
                          $position=$row['position'];
                          $id = $row['id'];

                          if($row['doh12']=='1')
                          {
                            //get mother station
                            $mstation_sql="select * from mstation where sec_code = '".$mstation."'";
                            $mstation_stmt = sqlsrv_query($conn,$mstation_sql);
                            $mstation_row = sqlsrv_fetch_array($mstation_stmt);
                            $mstation = $mstation_row['mother_station'];

                            //get designated station
                            $dstation_sql="select * from mstation where sec_code = '".$dstation."'";
                            $dstation_stmt = sqlsrv_query($conn,$dstation_sql);
                            $dstation_row = sqlsrv_fetch_array($dstation_stmt);
                            $dstation = $dstation_row['mother_station'];

                            //get position
                            $position_sql= "select * from select_position where pos_code='".$row['position']."'";
                            $position_stmt=sqlsrv_query($conn,$position_sql);
                            $position_row=sqlsrv_fetch_array($position_stmt);
                            $position = $position_row['EmpPosition'];
                          }

                          $timestamp=strtotime($row['entry_date']);
                          $entry_date= date("m-d-Y", $timestamp);

                          $exit_date = $row['exit_date'];

                          echo "<td>
                          <a href='emp-edit-designation.php?uid=".$user_id."&id=".$id."' class='btn btn-success'><img src='assets/img/pen-fill.svg'></a>

                          <a href='scripts/emp-designation-del.php?uid=".$user_id."&id=".$id."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>


                          </td>";

                          echo "<td>".$entry_date."</td>";
                           echo "<td>".$exit_date."</td>";
                          echo "<td><b style='color:blue;'>".$mstation."</b></td>";
                          echo "<td><b style='color:blue;'>".$dstation."</b></td>";
                          echo "<td><b>".$position."</b></td>";
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