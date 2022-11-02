
  <?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Add family Information</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Family Information Form</h5>

              <!-- General Form Elements -->
              <form method="post" type="submit">
                  <?php include "scripts/add-family-script.php";?>
                <div class="row mb-3">
                  <label for ="" class="col-sm-2 col-form-label">Select Employee</label>
                  <div class="col-sm-10">
                    <select name="sel_employee" class="form-select">
                       
                        <?php

                    if ($_SESSION['userlevel']<3)
                    {
                      echo "<option value='0' Selected>- Select -</option>";

                      $sql_empname = "select * from dbo.emp_basic where firstname<>'admin' order by surname";

                      $result = sqlsrv_query($conn, $sql_empname);
                      

                      while($row = sqlsrv_fetch_array($result))
                      {
                        $agencyid = $row['agencyid'];
                       
                        $checkaddresss_sql= "select * from emp_family where agencyid='$agencyid'";
                                                $paramm = array();
                        $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $address_result = sqlsrv_query( $conn, $checkaddresss_sql , $paramm, $options);
                        $count_address = sqlsrv_num_rows( $address_result );


                         if($count_address<1)
                         {

                            $empsurname = $row['surname'];
                            $empfname = $row['firstname'];
                            $empmname = $row['middlename'];

                            if ($empmname!="")
                            {
                              $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                            } 
                            else 
                            {
                              $emp_fullname = $empsurname.", ".$empfname;
                            }

                            if($_POST['sel_employee'] == $agencyid)
                            {
                              echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                            }
                            else
                            {
                               echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                            }
                          }

                      }

                    }else{
                      $agencyid=$_SESSION['user_id'];
                      $get_address_sql= "select * from emp_basic where agencyid='$agencyid'";
                      $result = sqlsrv_query($conn, $get_address_sql);
                      $row = sqlsrv_fetch_array($result);

                      $empsurname = $row['surname'];
                      $empfname = $row['firstname'];
                      $empmname = $row['middlename'];

                            if ($empmname!="")
                            {
                              $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                            } 
                            else 
                            {
                              $emp_fullname = $empsurname.", ".$empfname;
                            }

                            if($_POST['sel_employee'] == $agencyid)
                            {
                              echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                            }
                            else
                            {
                               echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                            }
                    }

                   ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">Spouse Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_sname">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">Spouse First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_fname">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Spouse Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_mname">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sss_id" class="col-sm-2 col-form-label">Spouse Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_num">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email_ad" class="col-sm-2 col-form-label">Spouse Occupation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_work">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="mobile_no" class="col-sm-2 col-form-label">Spouse Employer/Business</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_boss">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">Business Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="s_badd">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">Spouse Birth Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control"  name="s_bday">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">Father's Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_sname">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">Father's First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_fname" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Father's Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_mname" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Father's Birthday</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="f_bday" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Mothers Maiden name" class="col-sm-2 col-form-label">Mother's Maiden Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_maiden">
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="Mothers surname" class="col-sm-2 col-form-label">Mother's Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_sname" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="mothers firstname" class="col-sm-2 col-form-label">Mother's First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_fname" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="mother's middle name" class="col-sm-2 col-form-label">Mother's Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_mname">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Mother's Birthday</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="m_bday" required>
                  </div>
                </div>

                <div class="row mb-12">
                  <div class="col-sm-10">
                  </div>
                  <div class="col-sm-2">
                    <input type="button" class='btn btn-primary' value='+' onclick='addChild()'>
                    <input type="button" class='btn btn-danger' value='-' onclick='minusChild()'>
                  </div>
                </div>

                <div class="row mb-10">
                  <div class="col-sm-8">
                    <label><b>Child Name</b></label>
                  </div>
                  <div class="col-sm-4">
                   <label><b>Child Birthday</b></label>
                  </div>
                </div>

                <div class="row mb-10">
                  <div class="col-sm-8" id='namediv'>
                    <input type="text" class="form-control" name="c_name[]" placeholder="Child Name">
                  </div>
                  <div class="col-sm-4" id='bdaydiv'>
                    <input type="date" class="form-control" name="c_bday[]" placeholder="Child Birthday">
                  </div>
                </div>

                <br>
                <div class="row mb-3">
                  
                  <div class="col-sm-11 text-center">
                    <button class="btn btn-primary" name="save">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php
  include "layouts\layout_footer.php";
  ?>
  <!-- End Footer -->

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

  <!-- add child button -->
  <script>
    var addchild = 1;

    function addChild() {
        //const pcontainer = document.createElement("div");


        const cname = document.createElement("input");
        document.getElementById("namediv").appendChild(cname);
        cname.setAttribute('id','c_name'+addchild);
        cname.setAttribute('name','c_name[]');
        cname.setAttribute('class','form-control');
        cname.setAttribute('type','text');
        cname.setAttribute('placeholder', 'Child Name');
        cname.setAttribute('required', '');

        const cbday = document.createElement("input");
        document.getElementById("bdaydiv").appendChild(cbday);
        cbday.setAttribute('id','c_bday'+addchild);
        cbday.setAttribute('name','c_bday[]');
        cbday.setAttribute('class','form-control');
        cbday.setAttribute('type','date');
        cbday.setAttribute('placeholder', 'Child Birthday');
        cbday.setAttribute('required', '');


        addchild++;

    }

    function minusChild() {
        if (addchild>1){
        var namedel = document.getElementById("namediv");
        var datedel = document.getElementById("bdaydiv");
        namedel.removeChild(namedel.lastChild);
        datedel.removeChild(datedel.lastChild);
        
        addchild--;
        }

      
    }
  </script>

</body>

</html>