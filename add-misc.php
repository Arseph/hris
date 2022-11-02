<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

?>
<style type="text/css">

  .detailsZero{
    display: none;
  }
  .detailsOne {
    display: none;
  }

   .detailsTwo {
    display: none;
  }

   .detailsThree {
    display: none;
  }

    .detailsFour {
    display: none;
  }

    .detailsFive {
    display: none;
  }

    .detailsSix {
    display: none;
  }

    .detailsSeven {
    display: none;
  }

    .detailsEight {
    display: none;
  }

    .detailsNine {
    display: none;
  }

    .detailsTen {
    display: none;
  }

   .details11 {
    display: none;
  }
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Misc employee info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Misc Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Misc Info Form</h5>

              <!-- Advanced Form Elements -->
              <form method="post">
              <?php include "scripts/add-misc-script.php";?>
                <div class="row mb-5">
                      <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">

                    <div class="input-group mb-3">
                       <br><span class="input-group-text" id="basic-addon1">Employee name</span>
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
                       
                        $checkaddresss_sql= "select top 1 * from emp_miscinfo where agencyid='$agencyid' order by id desc";
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
                      $get_address_sql= "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
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

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Special Skills / Hobbies</span>
                      <textarea class="form-control" name="txthobby"></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Non-Academic Recognition</span>
                      <textarea class="form-control" name="txtnar"></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Associations Membership
</span>
                      <textarea class="form-control" name="txtassoc"></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Referrence</span>
                      <textarea class="form-control" name="txtreference"></textarea>
                    </div>

                    <span class="input-group-text form-control" id="basic-addon1" >34-A. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief <br>of bureau or office or to the person who has immediate <br>supervision over you in the office, Bureau or Department where you will be appointed?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0" name="checkbox1-0" <?php 
                      if(isset($_POST['checkbox1-0'])){if($q1=="on"){ echo "checked"; }}?>>
                      <label class="form-check-label" for="flexSwitchCheckDefault">A - Within a third degree?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsZero" id="detailsZero">
                        <span class="input-group-text" id="basic-addon1" >Give Details</span>
                        <textarea class="form-control"  name="details0"></textarea>
                    </div>
                    <br>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefaulttwo" name="checkbox1-2">
                      <label class="form-check-label" for="flexSwitchCheckDefaultttwo">B - Within a fourth degree?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsOne" id="detailsOne">
                        <span class="input-group-text" id="basic-addon1" >Give Details</span>
                        <textarea class="form-control"  name="details1"></textarea>
                    </div>
                    <br>

                    <span class="input-group-text" id="basic-addon1">35-A. Have you ever been found guilty of any administrative offence ?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault3" name="checkbox2">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsTwo" id="detailsTwo">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control" name="details2"></textarea>
                    </div>


                    <br>
                    <span class="input-group-text" id="basic-addon1">35-B. Have you been criminally charged before any court?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4" name="checkbox3">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsThree" id="detailsThree" name="details3">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control" name="details3"></textarea>
                    </div>
                    
                     <br>
                    <span class="input-group-text" id="basic-addon1">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or <br> regulation by any court or tribunal?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault5" name="checkbox4">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsFour" id="detailsFour">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control" name="details4"></textarea>
                    </div>

                      <br>
                    <span class="input-group-text" id="basic-addon1">37. Have you ever been seperated from the service in any of the following modes: resignation, retirement,<br> dropped from the rolls, dismissal, termination, end of term,<br> finished contract or phased out (abolition) in the public or private sector?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault6" name="checkbox5">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsFive" id="detailsFive">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control" name="details5"></textarea>
                    </div>

                     <br>
                    <span class="input-group-text" id="basic-addon1">38-A. Have you ever been a candidate in a national or local election held within the last year<br>(except Barangay election)?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault7" name="checkbox6">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsSix" id="detailsSix">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control" name="details6"></textarea>
                    </div>

                     <br>
                    <span class="input-group-text" id="basic-addon1">38-B. Have you resigned from government service during the three (3) month period before the last election*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault8" name="checkbox7">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsSeven" id="detailsSeven">
                      <span class="input-group-text">Give details(Country) *</span>
                      <textarea class="form-control"name="details7"></textarea>
                    </div>

                    <br>
                    <span class="input-group-text" id="basic-addon1">39. Have you acquired the status of an immigrant or permanent resident of another country?*</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault9" name="checkbox8">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsEight" id="detailsEight">
                      <span class="input-group-text">Give details(Country) *</span>
                      <textarea class="form-control" name="details8"></textarea>
                    </div>

                      <br>
                    <span class="input-group-text" id="basic-addon1">40. Pursuant to:<br> (a) Indigenous Peoples Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); <br>(c) Solo Parents Welfare Act of 2000 (RA 8972). <br><br>A. Are you a member of any indigenous group?</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault10" name="checkbox9">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsNine" id="detailsNine">
                      <span class="input-group-text">Give Details</span>
                      <textarea class="form-control"name="details9"></textarea>
                    </div>

                    <br>
                    <span class="input-group-text" id="basic-addon1">40-B. Are you a person with Disability?</span>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" name="checkbox10">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Yes or No?</label>
                    </div>

                    <br>
                    <div class="input-group mb-3 detailsTen" id="detailsTen">
                      <span class="input-group-text">please specify ID no*</span>
                      <textarea class="form-control" name="details10"></textarea>
                    </div>

                     
                    

                        
                    

                    <div class="row">
                      <div class="col-md-5">
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" name="save">Submit</button>
                      </div>
                    </div>


              </form><!-- End General Form Elements -->

</div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "layouts\layout_footer.php"; ?>

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
  <script>
    $( "#flexSwitchCheckDefault0" ).change(function() {
      if(this.checked) {
        $('#detailsZero').removeClass('detailsZero');   
      } else {
        $('#detailsZero').addClass('detailsZero'); 
      }
    });


    $( "#flexSwitchCheckDefaultone" ).change(function() {
      if(this.checked) {
        $('#detailsOne').removeClass('detailsOne');  
      } else {
        document.getElementById("details").reset();
        $('#detailsOne').addClass('detailsOne'); 
      }
    });

        $( "#flexSwitchCheckDefaulttwo" ).change(function() {
      if(this.checked) {
        $('#detailsOne').removeClass('detailsOne');   
      } else {
        $('#detailsOne').addClass('detailsOne'); 
      }
    });


    $( "#flexSwitchCheckDefault3" ).change(function() {
      if(this.checked) {
        $('#detailsTwo').removeClass('detailsTwo');   
      } else {
        $('#detailsTwo').addClass('detailsTwo'); 
      }
    });

    $( "#flexSwitchCheckDefault4" ).change(function() {
      if(this.checked) {
        $('#detailsThree').removeClass('detailsThree');   
      } else {
        $('#detailsThree').addClass('detailsThree'); 
      }
    });

    $( "#flexSwitchCheckDefault5" ).change(function() {
      if(this.checked) {
        $('#detailsFour').removeClass('detailsFour');   
      } else {
        $('#detailsFour').addClass('detailsFour'); 
      }
    });

    $( "#flexSwitchCheckDefault6" ).change(function() {
      if(this.checked) {
        $('#detailsFive').removeClass('detailsFive');   
      } else {
        $('#detailsFive').addClass('detailsFive'); 
      }
    });

    $( "#flexSwitchCheckDefault7" ).change(function() {
      if(this.checked) {
        $('#detailsSix').removeClass('detailsSix');   
      } else {
        $('#detailsSix').addClass('detailsSix'); 
      }
    });

    $( "#flexSwitchCheckDefault8" ).change(function() {
      if(this.checked) {
        $('#detailsSeven').removeClass('detailsSeven');   
      } else {
        $('#detailsSeven').addClass('detailsSeven'); 
      }
    });

    $( "#flexSwitchCheckDefault9" ).change(function() {
      if(this.checked) {
        $('#detailsEight').removeClass('detailsEight');   
      } else {
        $('#detailsEight').addClass('detailsEight'); 
      }
    });

     $( "#flexSwitchCheckDefault10" ).change(function() {
      if(this.checked) {
        $('#detailsNine').removeClass('detailsNine');   
      } else {
        $('#detailsNine').addClass('detailsNine'); 
      }
    });

    $( "#flexSwitchCheckDefault11" ).change(function() {
      if(this.checked) {
        $('#detailsTen').removeClass('detailsTen');   
      } else {
        $('#detailsTen').addClass('detailsTen'); 
      }
    });

    $( "#flexSwitchCheckDefault12" ).change(function() {
      if(this.checked) {
        $('#details11').removeClass('details11');   
      } else {
        $('#details11').addClass('details11'); 
      }
    });

  </script>
</body>

</html>