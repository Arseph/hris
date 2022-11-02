<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

$agencyid=$_GET['uid']; // get link value

//get record version
$record_version_sql = "SELECT TOP 1 record_version FROM emp_education where agencyid='2021-087' ORDER BY record_version DESC";
$result = sqlsrv_query($conn, $record_version_sql);
$row = sqlsrv_fetch_array($result);
$record_version= $row['record_version'];
$new_record_version = $record_version+1;



$primary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='primary' and record_version='$record_version'";
$secondary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='secondary' and record_version='$record_version'";
$tertiary_sql = "select * from dbo.emp_education where agencyid='$agencyid' and edu_lvl ='tertiary' and record_version='$record_version'";

$highest_sql = "select * from emp_highest_edu where agencyid='$agencyid' and record_version='$record_version'";             

$result = sqlsrv_query($conn, $highest_sql);

  while($row = sqlsrv_fetch_array($result))
  {
    $emp_highest_id= $row['highest_grade_id'];
  }


?>

<style>
.ungrad_btn{
    background: url('assets/img/book-half.svg') no-repeat;
    cursor:pointer;
    margin-left: auto;
    margin-right: auto;
    width: 10%;
}


.txt_to {
/*  display: block;
  width: 100%;*/
/*  width: 300px;*/
width: 74%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
  

  <script>

    var p = 1;
    var s = 1;
    var t = 1;
    var tgrad = 1;
    // alert(x);

    function addP() {
      p++;

       const pspan = document.createElement("span");
        
        document.getElementById("primary_main2").appendChild(pspan);
        pspan.setAttribute('id','pspan'+p);
        
        const pschool = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(pschool);
        pschool.setAttribute('id','pschool'+p);
        pschool.setAttribute('name','pschool[]');
        pschool.setAttribute('class','txt_to');
        pschool.setAttribute('style','width:50%;');
        pschool.setAttribute('type','text');
        pschool.setAttribute('placeholder', 'Name of School');
        pschool.setAttribute('required', '');

        const psfrom = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(psfrom);
        psfrom.setAttribute('id','psfrom'+p);
        psfrom.setAttribute('name','psyfrom[]');
        psfrom.setAttribute('class','txt_to');
        psfrom.setAttribute('style','width:11%;');
        psfrom.setAttribute('type','number');
        psfrom.setAttribute('placeholder', 'Year (From)');
        psfrom.setAttribute('required', '');

        const psto = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(psto);
        psto.setAttribute('id','psto'+p);
        psto.setAttribute('name','psyto[]');
        psto.setAttribute('class','txt_to');
        psto.setAttribute('style','width:11%;')
        psto.setAttribute('type','number');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');



    const scholarship = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(scholarship);
        scholarship.setAttribute('id','txt_pscholarship'+p);
        scholarship.setAttribute('name','txt_pscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:28%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
        

    }

    function minusP() {
       pmain2 = document.getElementById("primary_main2");
       if(pmain2.childElementCount>=1)
       {
         
        pmain2.removeChild(pmain2.lastChild);
       }

       if(pmain2.childElementCount==0)
       {
        const pspan = document.createElement("span");
        
        document.getElementById("primary_main2").appendChild(pspan);
        pspan.setAttribute('id','pspan'+p);

        const pschool = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(pschool);
        pschool.setAttribute('id','pschool'+p);
        pschool.setAttribute('name','pschool[]');
        pschool.setAttribute('class','txt_to');
        pschool.setAttribute('style','width:50%;');
        pschool.setAttribute('type','text');
        pschool.setAttribute('placeholder', 'Name of School');
        pschool.setAttribute('required', '');

        const psfrom = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(psfrom);
        psfrom.setAttribute('id','psfrom'+p);
        psfrom.setAttribute('name','psyfrom[]');
        psfrom.setAttribute('class','txt_to');
        psfrom.setAttribute('style','width:11%;');
        psfrom.setAttribute('type','text');
        psfrom.setAttribute('placeholder', 'Year (From)');
        psfrom.setAttribute('required', '');

        const psto = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(psto);
        psto.setAttribute('id','psto'+p);
        psto.setAttribute('name','psyto[]');
        psto.setAttribute('class','txt_to');
        psto.setAttribute('style','width:11%;')
        psto.setAttribute('type','text');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');


        const scholarship = document.createElement("input");
        document.getElementById("pspan"+p).appendChild(scholarship);
        scholarship.setAttribute('id','txt_pscholarship'+p);
        scholarship.setAttribute('name','txt_pscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:28%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
      }
      if(p>0)
      {
        p--;
      }
      
    }

    function  addS(){

           s++;

       const sspan = document.createElement("span");

        
        document.getElementById("secondary_main").appendChild(sspan);
        sspan.setAttribute('id','sspan'+s);
        
        const sschool = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(sschool);
        sschool.setAttribute('id','sschool'+s);
        sschool.setAttribute('name','sschool[]');
        sschool.setAttribute('class','txt_to');
        sschool.setAttribute('style','width:50%;');
        sschool.setAttribute('type','text');
        sschool.setAttribute('placeholder', 'Name of School');
        sschool.setAttribute('required', '');

        const ssfrom = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(ssfrom);
        ssfrom.setAttribute('id','ssfrom'+s);
        ssfrom.setAttribute('name','ssyfrom[]');
        ssfrom.setAttribute('class','txt_to');
        ssfrom.setAttribute('style','width:11%;');
        ssfrom.setAttribute('type','number');
        ssfrom.setAttribute('placeholder', 'Year (From)');
        ssfrom.setAttribute('required', '');

        const ssto = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(ssto);
        ssto.setAttribute('id','ssto'+s);
        ssto.setAttribute('name','ssyto[]');
        ssto.setAttribute('class','txt_to');
        ssto.setAttribute('style','width:11%;')
        ssto.setAttribute('type','number');
        ssto.setAttribute('placeholder', 'Year (To)');
        ssto.setAttribute('required', '');
        
        // const sgradyear = document.createElement("input");
        // document.getElementById("sspan"+s).appendChild(sgradyear);
        // sgradyear.setAttribute('id','sgrad_year'); 
        // sgradyear.setAttribute('name','sgrad_year');
        // sgradyear.setAttribute('type','checkbox');
        // // sgradyear.setAttribute('required', '');
        
        // const newLabel = document.createElement("label");
        // newLabel.innerHTML = " Graduate year? ";
        // document.getElementById("sspan"+s).appendChild(newLabel);


    const scholarship = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(scholarship);
        scholarship.setAttribute('id','txt_sscholarship'+s);
        scholarship.setAttribute('name','txt_sscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:28%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors'); 
    }

    function minusS(){

       smain = document.getElementById("secondary_main");
       if(smain.childElementCount>=1)
       {
         
        smain.removeChild(smain.lastChild);
       }

      if(smain.childElementCount==0)
      {

       const sspan = document.createElement("span");
        
        document.getElementById("secondary_main").appendChild(sspan);
        sspan.setAttribute('id','sspan'+s);
        
        const sschool = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(sschool);
        sschool.setAttribute('id','sschool'+s);
        sschool.setAttribute('name','sschool[]');
        sschool.setAttribute('class','txt_to');
        sschool.setAttribute('style','width:50%;');
        sschool.setAttribute('type','text');
        sschool.setAttribute('placeholder', 'Name of School');
        sschool.setAttribute('required', '');

        const ssfrom = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(ssfrom);
        ssfrom.setAttribute('id','ssfrom'+s);
        ssfrom.setAttribute('name','ssyfrom[]');
        ssfrom.setAttribute('class','txt_to');
        ssfrom.setAttribute('style','width:11%;');
        ssfrom.setAttribute('type','number');
        ssfrom.setAttribute('placeholder', 'Year (From)');
        ssfrom.setAttribute('required', '');

        const ssto = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(ssto);
        ssto.setAttribute('id','ssto'+s);
        ssto.setAttribute('name','ssyto[]');
        ssto.setAttribute('class','txt_to');
        ssto.setAttribute('style','width:11%;')
        ssto.setAttribute('type','number');
        ssto.setAttribute('placeholder', 'Year (To)');
        ssto.setAttribute('required', '');


    const scholarship = document.createElement("input");
        document.getElementById("sspan"+s).appendChild(scholarship);
        scholarship.setAttribute('id','txt_sscholarship'+s);
        scholarship.setAttribute('name','txt_sscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:28%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors'); 
      }

      if(s>0)
      {
        s--;
      }
    }

    function addT(){
                t++;
                 tmain = document.getElementById("tertiary_main");
                 tgrad= tmain.childElementCount;
                 tgrad++;
       const tspan = document.createElement("span");
        
        document.getElementById("tertiary_main").appendChild(tspan);
        tspan.setAttribute('id','tspan'+t);
        
        const tschool = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tschool);
        tschool.setAttribute('id','tschool'+t);
        tschool.setAttribute('name','tschool[]');
        tschool.setAttribute('class','txt_to');
        tschool.setAttribute('style','width:28%;');
        tschool.setAttribute('type','text');
        tschool.setAttribute('placeholder', 'Name of School');
        tschool.setAttribute('required', '');

        const tcourse = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tcourse);
        tcourse.setAttribute('id','tcourse'+t);
        tcourse.setAttribute('name','tcourse[]');
        tcourse.setAttribute('class','txt_to');
        tcourse.setAttribute('style','width:10%;');
        tcourse.setAttribute('type','text');
        tcourse.setAttribute('placeholder', 'Degree/Course');
        tcourse.setAttribute('required', '');

        const tsfrom = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tsfrom);
        tsfrom.setAttribute('type','text');
        tsfrom.setAttribute('id','tsyfrom'+t);
        tsfrom.setAttribute('name','tsyfrom[]');
        tsfrom.setAttribute('class','txt_to');
        tsfrom.setAttribute('style','width:11%;');
        tsfrom.setAttribute('type','number');
        tsfrom.setAttribute('placeholder', 'Year (From)');
        tsfrom.setAttribute('required', '');

        const tsto = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tsto);
        tsto.setAttribute('id','tsto'+t);
        tsto.setAttribute('name','tsyto[]');
        tsto.setAttribute('class','txt_to');
        tsto.setAttribute('style','width:11%;')
        tsto.setAttribute('type','number');
        tsto.setAttribute('placeholder', 'Year (To)');
        tsto.setAttribute('required', '');

         const tgradyear = document.createElement("input");
         document.getElementById("tspan"+t).appendChild(tgradyear);
        tgradyear.setAttribute('name','tgrad_year'+tgrad);
        tgradyear.setAttribute('type','checkbox');
        // tgradyear.setAttribute('required', '');
        
        const newLabel = document.createElement("label");
        newLabel.innerHTML = " Graduate year? ";
        document.getElementById("tspan"+t).appendChild(newLabel);

          const tunits = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tunits);
        tunits.setAttribute('id','tunits'+t);
        tunits.setAttribute('name','tunits[]');
        tunits.setAttribute('class','txt_to');
        tunits.setAttribute('type','text');
        tunits.setAttribute('style', 'width:10%');
        tunits.setAttribute('placeholder', 'Units'); 

    const scholarship = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(scholarship);
        scholarship.setAttribute('id','txt_tscholarship'+t);
        scholarship.setAttribute('name','txt_tscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:18%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors'); 
        
    
    }


    function minusT() 
    {
       tmain = document.getElementById("tertiary_main");
       if(tmain.childElementCount>=1)
       {
         
        tmain.removeChild(tmain.lastChild);
        tgrad--;
       }

      if(tmain.childElementCount==0)
      {
         tgrad=1;
         const tspan = document.createElement("span");
        
        document.getElementById("tertiary_main").appendChild(tspan);
        tspan.setAttribute('id','tspan'+t);
        
        const tschool = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tschool);
        tschool.setAttribute('id','tschool'+t);
        tschool.setAttribute('name','tschool[]');
        tschool.setAttribute('class','txt_to');
        tschool.setAttribute('style','width:28%;');
        tschool.setAttribute('type','text');
        tschool.setAttribute('placeholder', 'Name of School');
        tschool.setAttribute('required', '');

        const tcourse = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tcourse);
        tcourse.setAttribute('id','tcourse'+t);
        tcourse.setAttribute('name','tcourse[]');
        tcourse.setAttribute('class','txt_to');
        tcourse.setAttribute('style','width:10%;');
        tcourse.setAttribute('type','text');
        tcourse.setAttribute('placeholder', 'Degree/Course');
        tcourse.setAttribute('required', '');

        const tsfrom = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tsfrom);
        tsfrom.setAttribute('type','text');
        tsfrom.setAttribute('id','tsyfrom'+t);
        tsfrom.setAttribute('name','tsyfrom[]');
        tsfrom.setAttribute('class','txt_to');
        tsfrom.setAttribute('style','width:11%;');
        tsfrom.setAttribute('type','number');
        tsfrom.setAttribute('placeholder', 'Year (From)');
        tsfrom.setAttribute('required', '');

        const tsto = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tsto);
        tsto.setAttribute('id','tsto'+t);
        tsto.setAttribute('name','tsyto[]');
        tsto.setAttribute('class','txt_to');
        tsto.setAttribute('style','width:11%;')
        tsto.setAttribute('type','number');
        tsto.setAttribute('placeholder', 'Year (To)');
        tsto.setAttribute('required', '');

         const tgradyear = document.createElement("input");
         document.getElementById("tspan"+t).appendChild(tgradyear);
        tgradyear.setAttribute('name','tgrad_year'+tgrad);
        tgradyear.setAttribute('type','checkbox');
        tgradyear.setAttribute('required', '');
        
        const newLabel = document.createElement("label");
        newLabel.innerHTML = " Graduate year? ";
        document.getElementById("tspan"+t).appendChild(newLabel);

          const tunits = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(tunits);
        tunits.setAttribute('id','tunits'+t);
        tunits.setAttribute('name','tunits[]');
        tunits.setAttribute('class','txt_to');
        tunits.setAttribute('type','text');
        tunits.setAttribute('style', 'width:10%');
        tunits.setAttribute('placeholder', 'Units'); 

    const scholarship = document.createElement("input");
        document.getElementById("tspan"+t).appendChild(scholarship);
        scholarship.setAttribute('id','txt_sscholarship'+t);
        scholarship.setAttribute('name','txt_tscholar[]');
        scholarship.setAttribute('class','txt_to');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:18%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors'); 
    
      }

      if(t>0)
      {
        t--;
      }
    
    }

    function clearP() 
    {
    p=1;

    var pschooldel = document.getElementById("pschooldiv");
    var psyfromdel = document.getElementById("psyfromdiv");
    var psytodel = document.getElementById("psytodiv");
    var pscholardel = document.getElementById("pscholardiv")
    

    // pschooldel.removeChild(pschooldel.lastChild);
    // pschooldel.removeChild(pschooldel.lastChild);
    while(pschooldel.childNodes.length> 1) 
    {
      pschooldel.removeChild(pschooldel.lastChild);
      psyfromdel.removeChild(psyfromdel.lastChild);
      pscholardel.removeChild(pscholardel.lastChild);

    }
    
    psytodel.removeChild(psytodel.lastChild);

    while(psytodel.childNodes.length>1) 
    {

      psytodel.removeChild(psytodel.lastChild);
      psytodel.removeChild(psytodel.lastChild);
      psytodel.removeChild(psytodel.lastChild);
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
        psto.setAttribute('class','txt_to');
        psto.setAttribute('style','width:50%;')
        psto.setAttribute('type','text');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');

        const pgradyear = document.createElement("input");
        document.getElementById("psytodiv").appendChild(pgradyear);
        pgradyear.setAttribute('id','pgrad_year'+p);
        pgradyear.setAttribute('name','pgrad_year[]');
        pgradyear.setAttribute('type','radio');
        pgradyear.setAttribute('required', '');
        
        const newLabel = document.createElement("label");
        newLabel.innerHTML = " Graduate year? ";
        document.getElementById("psytodiv").appendChild(newLabel);


    const scholarship = document.createElement("input");
        document.getElementById("pscholardiv").appendChild(scholarship);
        scholarship.setAttribute('id','txt_pscholarship'+p);
        scholarship.setAttribute('name','txt_pscholar[]');
        scholarship.setAttribute('class','form-control');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:100%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
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
                <div class="row g-3">
                  <div class="col-md-4">
                  <H5><b>Select Highest Level:</b></H5>
                  <select id='sel_highgrade' class="form-select" name="sel_highgrade">
                    <option value='0'>- Select -</option>
                    <?php 
                    $sel_high = "select * from select_highest_grade";
                          
                    if($result = sqlsrv_query($conn, $sel_high))
                    {
                      while($row = sqlsrv_fetch_array($result))
                      {
                        $highest_grade = $row['highest_grade'];
                        $highest_grade_id = $row['id'];
                        
                        if($emp_highest_id == $highest_grade_id)
                        {
                          echo "<option value='$highest_grade_id' selected>".$highest_grade."</option>";
                        }
                        else
                        {
                          echo "<option value='$highest_grade_id'>".$highest_grade."</option>";
                        }
                      }
                    }
                       
                    ?>
                    </select>
                </div>
                 <span >
                    <H5><b>Enter Primary Level Education:</b></H5>
                    <button class="btn btn-danger" id='Sminus' onclick='minusP()' type='button'>-</button>
                    <button class="btn btn-primary" id='Sadd' onclick='addP()' type='button'>+</button>
                  </span>
                <div id='primary_main2' class="row g-3">
                  <?php 
                        if($result = sqlsrv_query($conn, $primary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<span>';
                          echo '<input type="text" class="txt_to" value="'.$row['school'].'" name="pschool[]" style="width:50%;" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['from_year'].'" name="psyfrom[]" style="width:11%;" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['to_year'].'" name="psyto[]" style="width:11%;" required>';
                            echo '<input type="text" class="txt_to" value="'.$row['scholarship'].'" name="txt_pscholar[]" style="width:28%;" placeholder="Scholarship/Honors"> ';
                            echo'</span>';

                          } 
                        }

                      ?>
                </div>
                   <span >
                    <H5><b>Enter Secondary Level Education:</b></H5>
                    <button class="btn btn-danger" id='Sminus' onclick='minusS()' type='button'>-</button>
                    <button class="btn btn-primary" id='Sadd' onclick='addS()' type='button'>+</button>
                  </span>
                 <div id='secondary_main' class="row g-3">
                  <?php 
                        if($result = sqlsrv_query($conn, $secondary_sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<span>';
                          echo '<input type="text" class="txt_to" value="'.$row['school'].'" name="sschool[]" style="width:50%;" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['from_year'].'" name="ssyfrom[]" style="width:11%;" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['to_year'].'" name="ssyto[]" style="width:11%;" required>';

                            echo '<input type="text" class="txt_to" value="'.$row['scholarship'].'" name="sscholar[]" style="width:28%;" placeholder="Scholarship/Honors"> ';
                            echo'</span>';

                          } 
                        }

                      ?>
                </div>
                <span >
                    <H5><b>Enter Tertiary Level Education:</b></H5>
                    <button class="btn btn-danger" id='Tminus' onclick='minusT()' type='button'>-</button>
                    <button class="btn btn-primary" id='Tadd' onclick='addT()' type='button'>+</button>
                  </span>
                <div id='tertiary_main' class="row g-3">
                  
                  <?php 
                        if($result = sqlsrv_query($conn, $tertiary_sql))
                        {
                          $t=1;
                          while($row = sqlsrv_fetch_array($result))
                          {
                          echo '<span>';
                          echo '<input type="text" class="txt_to" value="'.$row['school'].'" name="tschool[]" style="width:28%;" required>';
                          echo '<input type="text" class="txt_to" value="'.$row['course'].'" name="tcourse[]" style="width:10%;" placeholder="Degree/Course" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['from_year'].'" name="tsyfrom[]" style="width:11%;" required>';
                          echo '<input type="number" class="txt_to" value="'.$row['to_year'].'" name="tsyto[]" style="width:11%;" required>';
                            if($row['graduate']=='0')
                            {
                            echo '<input type="checkbox"  name="tgrad_year'.$t.'" value="1"><label>Graduate year?</label>';
                            
                            }elseif($row['graduate']=='1'){
                              echo '<input type="checkbox"  name="tgrad_year'.$t.'" value="1" checked><label>Graduate year?</label>';
                            }
                            echo '<input type="text" class="txt_to" value="'.$row['units'].'" name="tunits[]" style="width:10%;" placeholder="Units">
                            <input type="text" class="txt_to" value="'.$row['scholarship'].'" name="txt_tscholar[]" style="width:18%;" placeholder="Scholarship/Honors" > ';
                            echo'</span>';
                            $t++;

                          } 
                        }

                      ?>

                 

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
