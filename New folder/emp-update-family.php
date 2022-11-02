
  <?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

$uid=$_GET['uid']; // get link value
$sql = "select * from emp_family where agencyid='$uid'";

$agencyid=$_GET['uid']; // get link value

if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $agencyid = $row['agencyid']; 
    $s_sname = $row['spouse_sname']; 
    $s_fname = $row['spouse_fname'];
    $s_mname = $row ['spouse_mname'];
    $s_contact = $row ['spouse_contact'];
    $s_work = $row ['spouse_work'];
    $s_boss = $row ['spouse_boss'];
    $s_badd = $row ['spouse_badd'];
    $s_bday = $row ['spouse_bday'];
    $f_sname = $row ['father_sname'];
    $f_fname = $row ['father_fname'];
    $f_mname = $row ['father_mname'];
    $f_bday = $row ['father_bday'];
    $m_maiden = $row ['mother_maiden'];
    $m_sname = $row ['mother_sname'];
    $m_fname = $row ['mother_fname'];
    $m_mname = $row ['mother_mname'];
    $m_bday = $row ['mother_bday'];


  }
}
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Updating Records of Employee ID: <?php echo $uid; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Family Information Form</h5>

              <!-- General Form Elements -->
              <form method="post" type="submit">
                  <?php include "scripts/update-family-script.php"; ?>
                
                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">Spouse Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_sname" value="<?php if(isset($s_sname)){ echo $s_sname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">Spouse First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_fname" name="s_sname" value="<?php if(isset($s_fname)){ echo $s_fname; }?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Spouse Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_mname" value="<?php if(isset($s_mname)){ echo $s_mname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sss_id" class="col-sm-2 col-form-label">Spouse Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_num"  value="<?php if(isset($s_mname)){ echo $s_mname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email_ad" class="col-sm-2 col-form-label">Spouse Occupation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_work" value="<?php if(isset($s_work)){ echo $s_work; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="mobile_no" class="col-sm-2 col-form-label">Spouse Employer/Business</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="s_boss" value="<?php if(isset($s_boss)){ echo $s_boss; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">Business Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="s_badd" value="<?php if(isset($s_badd)){ echo $s_badd; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">Spouse Birth Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control"  name="s_bday" value="<?php if(isset($s_bday)){ echo $s_bday; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">Father's Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_sname" value="<?php if(isset($f_sname)){ echo $f_sname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">Father's First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_fname" value="<?php if(isset($f_fname)){ echo $f_fname; }?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Father's Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_mname" value="<?php if(isset($f_mname)){ echo $f_mname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Father's Birthday</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="f_bday" value="<?php if(isset($f_bday)){ echo $f_bday; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Mother's Maiden Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_maiden" value="<?php if(isset($m_maiden)){ echo $m_maiden; }?>">
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">Mother's Surname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_sname" value="<?php if(isset($m_sname)){ echo $m_sname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">Mother's First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_fname" value="<?php if(isset($m_fname)){ echo $m_fname; }?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Mother's Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="m_mname" value="<?php if(isset($m_mname)){ echo $m_mname; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Mother's Birthday</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="m_bday" value="<?php if(isset($m_bday)){ echo $m_bday; }?>">
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
                     <?php 
                      $children_sql = "select * from emp_children where agencyid='$agencyid'";
                      $params = array();
                      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                      $stmt = sqlsrv_query( $conn, $children_sql , $params, $options );

                      $row_count = sqlsrv_num_rows( $stmt );

                        if($row_count>0)
                        {

                          while($row = sqlsrv_fetch_array($stmt))
                          {
                            echo '<input type="text" class="form-control" value="'.$row['child_name'].'" id="c_name" name="c_name[]" required>';
                          }
                        }
                      ?>
                  </div>
                  <div class="col-sm-4" id='bdaydiv'>
                                         <?php 
                      $children_sql = "select * from emp_children where agencyid='$agencyid'";
                      $params = array();
                      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                      $stmt = sqlsrv_query( $conn, $children_sql , $params, $options );

                      $row_count = sqlsrv_num_rows( $stmt );

                        if($row_count>0)
                        {

                          while($row = sqlsrv_fetch_array($stmt))
                          {
                            echo '<input type="date" class="form-control" value="'.$row['bday'].'" id="c_bday" name="c_bday[]" required>';
                          }
                        }
                      ?>
                  </div>
                </div>

                <div class="row mb-3">
                  
                  <div class="col-sm-11 text-center">
                    <button class="btn btn-primary" name="update_family">Update</button>
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

    <script>
    var addchild = 1;
    c_length= document.getElementById("namediv");
    child_length= c_length.childNodes.length;
    orig_length = c_length.childNodes.length;

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
        child_length++;


    }

    function minusChild() {


      if(c_length.childNodes.length > 2) 
      {
        if(child_length==orig_length)
        {
          if (confirm("Are you sure?") == true) 
          {
          var namedel = document.getElementById("namediv");
          var datedel = document.getElementById("bdaydiv");
          namedel.removeChild(namedel.lastChild);
          datedel.removeChild(datedel.lastChild);
          
          addchild--;
          child_length--;
          orig_length--;
          }
        }else{
          var namedel = document.getElementById("namediv");
          var datedel = document.getElementById("bdaydiv");
          namedel.removeChild(namedel.lastChild);
          datedel.removeChild(datedel.lastChild);
          addchild--;
          child_length--;
        } 

      }



      
    }


  </script>

</body>

</html>