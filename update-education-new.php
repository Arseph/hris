<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

$agencyid=$_GET['uid']; // get link value

$primary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='primary'";
$secondary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='secondary'";
$tertiary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='tertiary'";

?>
  <script>

    var p = 1;
    var s = 1;
    var t = 1;

    function addP() {

      p++;

        const pschool = document.createElement("input");
        document.getElementById("pschooldiv").appendChild(pschool);
        pschool.setAttribute('id','pschool'+p);
        pschool.setAttribute('name','pschool[]');
        pschool.setAttribute('class','form-control');
        pschool.setAttribute('type','text');
        pschool.setAttribute('placeholder', 'Name of School');
        pschool.setAttribute('required', '');

        const psfrom = document.createElement("input");
        document.getElementById("psyfromdiv").appendChild(psfrom);
        psfrom.setAttribute('id','psfrom'+p);
        psfrom.setAttribute('name','psyfrom[]');
        psfrom.setAttribute('class','form-control');
        psfrom.setAttribute('type','text');
        psfrom.setAttribute('placeholder', 'Year (From)');
        psfrom.setAttribute('required', '');

        const psto = document.createElement("input");
        document.getElementById("psytodiv").appendChild(psto);
        psto.setAttribute('id','psto'+p);
        psto.setAttribute('name','psyto[]');
        psto.setAttribute('class','form-control');
        psto.setAttribute('type','text');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');


        

    }

    function minusP() {
      
      pcount= document.getElementById("pschooldiv");
      if(pcount.childNodes.length > 2) 
      {
        var pschooldel = document.getElementById("pschooldiv");
        var psyfromdel = document.getElementById("psyfromdiv");
        var psytodel = document.getElementById("psytodiv");
        pschooldel.removeChild(pschooldel.lastChild);
        psyfromdel.removeChild(psyfromdel.lastChild);
        psytodel.removeChild(psytodel.lastChild);
        
        p--;

      }

      
    }

    function  addS(){

      s++;
        const sschool = document.createElement("input");
        document.getElementById("sschooldiv").appendChild(sschool);
        sschool.setAttribute('id','sschool'+s);
        sschool.setAttribute('name','sschool[]');
        sschool.setAttribute('class','form-control');
        sschool.setAttribute('type','text');
        sschool.setAttribute('placeholder', 'Name of School');
        sschool.setAttribute('required', '');

        const ssfrom = document.createElement("input");
        document.getElementById("ssyfromdiv").appendChild(ssfrom);
        ssfrom.setAttribute('id','ssfrom'+s);
        ssfrom.setAttribute('name','ssyfrom[]');
        ssfrom.setAttribute('class','form-control');
        ssfrom.setAttribute('type','text');
        ssfrom.setAttribute('placeholder', 'Year (From)');
        ssfrom.setAttribute('required', '');

        const ssto = document.createElement("input");
        document.getElementById("ssytodiv").appendChild(ssto);
        ssto.setAttribute('id','ssto'+s);
        ssto.setAttribute('name','ssyto[]');
        ssto.setAttribute('class','form-control');
        ssto.setAttribute('type','text');
        ssto.setAttribute('placeholder', 'Year (To)');
        ssto.setAttribute('required', '');

        
    }

    function minusS(){

      scount= document.getElementById("sschooldiv");
      if(scount.childNodes.length > 2) 
      {
        var sschooldel = document.getElementById("sschooldiv");
        var ssyfromdel = document.getElementById("ssyfromdiv");
        var ssytodel = document.getElementById("ssytodiv");
        sschooldel.removeChild(sschooldel.lastChild);
        ssyfromdel.removeChild(ssyfromdel.lastChild);
        ssytodel.removeChild(ssytodel.lastChild);
        
        s--;
      }
    }

    function addT(){
      t++;
      const tschool = document.createElement("input");
        document.getElementById("tschooldiv").appendChild(tschool);
        tschool.setAttribute('id','tschool'+t);
        tschool.setAttribute('name','tschool[]');
        tschool.setAttribute('class','form-control');
        tschool.setAttribute('type','text');
        tschool.setAttribute('placeholder', 'Name of School');
        tschool.setAttribute('required', '');

      const tcourse = document.createElement("input");
        document.getElementById("coursediv").appendChild(tcourse);
        tcourse.setAttribute('id','tcourse'+t);
        tcourse.setAttribute('name','course[]');
        tcourse.setAttribute('class','form-control');
        tcourse.setAttribute('type','text');
        tcourse.setAttribute('placeholder', 'Degree/Course');
        tcourse.setAttribute('required', '');


        const tsfrom = document.createElement("input");
        document.getElementById("tsyfromdiv").appendChild(tsfrom);
        tsfrom.setAttribute('id','tsfrom'+t);
        tsfrom.setAttribute('name','tsyfrom[]');
        tsfrom.setAttribute('class','form-control');
        tsfrom.setAttribute('type','text');
        tsfrom.setAttribute('placeholder', 'Year (From)');
        tsfrom.setAttribute('required', '');

        const tsto = document.createElement("input");
        document.getElementById("tsytodiv").appendChild(tsto);
        tsto.setAttribute('id','tsto'+t);
        tsto.setAttribute('name','tsyto[]');
        tsto.setAttribute('class','form-control');
        tsto.setAttribute('type','text');
        tsto.setAttribute('placeholder', 'Year (To)');
        tsto.setAttribute('required', '');

        
    }


    function minusT() {

      tcount= document.getElementById("tschooldiv");
      if(tcount.childNodes.length > 2) 
      {
        var tschooldel = document.getElementById("tschooldiv");
        var tsyfromdel = document.getElementById("tsyfromdiv");
        var tsytodel = document.getElementById("tsytodiv");

        var tcoursedel = document.getElementById("coursediv");

        tcoursedel.removeChild(tcoursedel.lastChild);

        tschooldel.removeChild(tschooldel.lastChild);
        tsyfromdel.removeChild(tsyfromdel.lastChild);
        tsytodel.removeChild(tsytodel.lastChild);
        t--;
      }

    }

    function clearP() 
    {
    p=1;
    pcount= document.getElementById("pschooldiv");
    psyfrom= document.getElementById("psyfromdiv");
    psyto = document.getElementById("psytodiv");
    
    while (pcount.childNodes.length > 1) 
    {
    pcount.removeChild(pcount.lastChild);
    psyfrom.removeChild(psyfrom.lastChild);
    psyto.removeChild(psyto.lastChild);
    }
    const pschool = document.createElement("input");
        document.getElementById("pschooldiv").appendChild(pschool);
        pschool.setAttribute('id','pschool'+p);
        pschool.setAttribute('name','pschool[]');
        pschool.setAttribute('class','form-control');
        pschool.setAttribute('type','text');
        pschool.setAttribute('placeholder', 'Name of School');
        pschool.setAttribute('required', '');

        const psfrom = document.createElement("input");
        document.getElementById("psyfromdiv").appendChild(psfrom);
        psfrom.setAttribute('id','psfrom'+p);
        psfrom.setAttribute('name','psyfrom[]');
        psfrom.setAttribute('class','form-control');
        psfrom.setAttribute('type','text');
        psfrom.setAttribute('placeholder', 'Year (From)');
        psfrom.setAttribute('required', '');

        const psto = document.createElement("input");
        document.getElementById("psytodiv").appendChild(psto);
        psto.setAttribute('id','psto'+p);
        psto.setAttribute('name','psyto[]');
        psto.setAttribute('class','form-control');
        psto.setAttribute('type','text');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');


    
    }

    function clearS() 
    {

    s=1;
    scount= document.getElementById("sschooldiv");
    ssyfrom= document.getElementById("ssyfromdiv");
    ssyto = document.getElementById("ssytodiv");
    
    while (scount.childNodes.length > 1) 
    {
    scount.removeChild(scount.lastChild);
    ssyfrom.removeChild(ssyfrom.lastChild);
    ssyto.removeChild(ssyto.lastChild);
    }
    const sschool = document.createElement("input");
        document.getElementById("sschooldiv").appendChild(sschool);
        sschool.setAttribute('id','sschool'+s);
        sschool.setAttribute('name','sschool[]');
        sschool.setAttribute('class','form-control');
        sschool.setAttribute('type','text');
        sschool.setAttribute('placeholder', 'Name of School');
        sschool.setAttribute('required', '');

        const ssfrom = document.createElement("input");
        document.getElementById("ssyfromdiv").appendChild(ssfrom);
        ssfrom.setAttribute('id','ssfrom'+s);
        ssfrom.setAttribute('name','ssyfrom[]');
        ssfrom.setAttribute('class','form-control');
        ssfrom.setAttribute('type','text');
        ssfrom.setAttribute('placeholder', 'Year (From)');
        ssfrom.setAttribute('required', '');

        const ssto = document.createElement("input");
        document.getElementById("ssytodiv").appendChild(ssto);
        ssto.setAttribute('id','ssto'+s);
        ssto.setAttribute('name','ssyto[]');
        ssto.setAttribute('class','form-control');
        ssto.setAttribute('type','text');
        ssto.setAttribute('placeholder', 'Year (To)');
        ssto.setAttribute('required', '');
    }

    function clearT() {
   t=1;
    tcount= document.getElementById("tschooldiv");
    course = document.getElementById("coursediv");
    tsyfrom= document.getElementById("tsyfromdiv");
    tsyto = document.getElementById("tsytodiv");
    
    while (tcount.childNodes.length > 1) 
    {
    tcount.removeChild(tcount.lastChild);
    course.removeChild(course.lastChild);
    tsyfrom.removeChild(tsyfrom.lastChild);
    tsyto.removeChild(tsyto.lastChild);
    }
    const tschool = document.createElement("input");
        document.getElementById("tschooldiv").appendChild(tschool);
        tschool.setAttribute('id','tschool'+t);
        tschool.setAttribute('name','tschool[]');
        tschool.setAttribute('class','form-control');
        tschool.setAttribute('type','text');
        tschool.setAttribute('placeholder', 'Name of School');
        tschool.setAttribute('required', '');

        const tsfrom = document.createElement("input");
        document.getElementById("tsyfromdiv").appendChild(tsfrom);
        tsfrom.setAttribute('id','tsyfrom'+t);
        tsfrom.setAttribute('name','tsyfrom[]');
        tsfrom.setAttribute('class','form-control');
        tsfrom.setAttribute('type','text');
        tsfrom.setAttribute('placeholder', 'Year (From)');
        tsfrom.setAttribute('required', '');

        const tsto = document.createElement("input");
        document.getElementById("tsytodiv").appendChild(tsto);
        tsto.setAttribute('id','tsto'+t);
        tsto.setAttribute('name','tsyto[]');
        tsto.setAttribute('class','form-control');
        tsto.setAttribute('type','text');
        tsto.setAttribute('placeholder', 'Year (To)');
        tsto.setAttribute('required', '');

        const tcourse = document.createElement("input");
        document.getElementById("coursediv").appendChild(tcourse);
        tcourse.setAttribute('id','tcourse'+t);
        tcourse.setAttribute('name','course[]');
        tcourse.setAttribute('class','form-control');
        tcourse.setAttribute('type','text');
        tcourse.setAttribute('placeholder', 'Degree/Course');
        tcourse.setAttribute('required', '');
    }

  </script>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1 id='testa'>Add Education Form</h1>
      <!-- <p id='testa'></p> -->
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Updating Basic info of Employee ID: <?php echo $agencyid; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Education Form</h5>
              <br>
              <?php

              if(isset($_SESSION['update_success'])){
                if($_SESSION['update_success']!="")
                {
                  echo $_SESSION['update_success'];
                  $_SESSION['update_success']="";
                }
              }
              ?>
              
<form method='post' type='submit'>              

              <!-- No Labels Form -->
              <div  class="row g-3">

                <br>
                 <div id='primary_main' class="row g-3">



                    <div class="col-10">
                      <H5><b>Select Primary Level Education:</b></H5>
                      <p id='demo'></p>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Pminus' onclick='minusP()' type='button'>-</button>
                      <button class="btn btn-primary" id='Padd' onclick='addP()' type='button'>Add</button>
                      <button class="btn btn-secondary" onclick='clearP()' type='button'>Clear</button>
                    </div>

                    <div class="col-md-6" id='pschooldiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $primary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['school'].'" name="pschool[]" required>';
                          } 
                        }

                      ?>

                      
                    </div>
                    

                    <div class="col-md-3" id='psyfromdiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $primary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['from_year'].'" name="psyfrom[]" required>';
                          }
                        } 

                      ?>
  
                    </div>

                    <div class="col-md-3" id='psytodiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $primary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['to_year'].'" name="psyto[]" required>';
                          } 
                        }

                      ?>

                    </div >

                </div >
                

                <div id='secondary_main' class="row g-3">

                    <div class="col-10">
                      <H5><b>Enter Secondary Level Education:</b></H5>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Sminus' onclick='minusS()' type='button'>-</button>
                      <button class="btn btn-primary" id='Sadd' onclick='addS()' type='button'>Add</button>
                      <button class="btn btn-secondary" onclick='clearS()' type='button'>Clear</button>
                    </div>




                    <div class="col-md-6" id='sschooldiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $secondary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['school'].'" name="sschool[]" required>';
                          } 
                        }

                      ?>
                    </div>
                    

                    <div class="col-md-3" id='ssyfromdiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $secondary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['from_year'].'" name="ssyfrom[]" required>';
                          }
                        } 

                      ?>
  
                    </div>

                    <div class="col-md-3" id='ssytodiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $secondary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['to_year'].'" name="ssyto[]" required>';
                          } 
                        }

                      ?>

                    </div >

                </div >

                <div id='tertiary_main' class="row g-3">

                    <div class="col-10">
                      <H5><b>Enter Tertiary Level Education:</b></H5>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Tminus' onclick='minusT()' type='button'>-</button>
                      <button class="btn btn-primary" id='Tadd' onclick='addT()' type='button'>Add</button>
                      <button class="btn btn-secondary" onclick='clearT()' type='button'>Clear</button>
                    </div>

                    <div class="col-md-3" id='tschooldiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $tertiary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['school'].'" name="tschool[]" required>';
                          } 
                        }

                      ?>
                    </div>
                    <div class="col-md-3" id='coursediv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $tertiary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['course'].'" name="course[]" required>';
                          } 
                        }

                      ?>
                    </div>

                    <div class="col-md-3" id='tsyfromdiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $tertiary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['from_year'].'" name="tsyfrom[]" required>';
                          } 
                        }

                      ?>
                    </div>

                    <div class="col-md-3" id='tsytodiv'>
                      <?php 
                        if($result = sqlsrv_query($conn, $tertiary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<input type="text" class="form-control" value="'.$row['to_year'].'" name="tsyto[]" required>';
                          } 
                        }

                      ?>

                    </div >

                </div >
                <div class="text-center">
                  <button class="btn btn-primary" name='update'>Update</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              <!-- End No Labels Form -->

            </div>
          </div>
<?php include "scripts/update-education-script.php"; ?>
</form>        

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    © Copyright <b>Department of Health</b>. All Rights Reserved
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

  <!-- add primary script -->


</body>

</html>
