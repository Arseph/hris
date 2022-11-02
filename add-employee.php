<?php
session_start();
include "scripts\connection_script.php";

include "scripts\account_check.php";
include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>

<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #45de6e;
}
</style>

  
    <script>


  //HR Competency tab


  //create more Field of Expertise textboxes with unique id

  var x = 0; //FOE button id variable
  var b = 0; //GAP button id variable
  var y = 0; //Action taken button id variable

function foebtn(){



    const foeButton = document.getElementById("foeButton");
    foeButton.remove();

    const foedelbtn = document.getElementById("foedelbtn");
    foedelbtn.remove();

    x++;

    let foe = document.createElement("input");
    foe.setAttribute('type', 'text');
    foe.setAttribute('id', 'foe'+x);
    foe.setAttribute('name', 'foe[]');
    foe.setAttribute('placeholder', 'Enter Field of expertise');
    foe.setAttribute('class', 'form-control');
    
    document.querySelector('#foe-main').appendChild(foe);

    let foelvl = document.createElement("input");
    foelvl.setAttribute('type', 'text');
    foelvl.setAttribute('id', 'foelvl'+x);
    foelvl.setAttribute('name', 'foelvl[]');
    foelvl.setAttribute('placeholder', 'Enter level');
    foelvl.setAttribute('class', 'form-control');
    
    document.querySelector('#foe-main').appendChild(foelvl);


    document.getElementById("foe"+x).style.width="70%";
    document.getElementById("foelvl"+x).style.width="30%";

    let foemakebtn = document.createElement("a");
    foemakebtn.setAttribute('class', 'btn btn-primary');
    foemakebtn.setAttribute('id', 'foeButton');
    foemakebtn.setAttribute('onclick', 'foebtn()');
    document.querySelector('#foe-main').appendChild(foemakebtn);
    document.getElementById("foeButton").innerHTML = "Add more";

    let foedelbtnmake = document.createElement("a");
    foedelbtnmake.setAttribute('class', 'btn btn-danger');
    foedelbtnmake.setAttribute('id', 'foedelbtn');
    foedelbtnmake.setAttribute('onclick', 'foedel()');
    document.querySelector('#foe-main').appendChild(foedelbtnmake);
    document.getElementById("foedelbtn").innerHTML = "-";

    document.getElementById("foeButton").style.width="95%";
    document.getElementById("foedelbtn").style.width="5%";

    }


  function gapbtn(){
     

    const gapdelbtn = document.getElementById("gapButton");
    gapdelbtn.remove();

    const gapdelbtndel = document.getElementById("gapdelbtn");
    gapdelbtndel.remove();

     let gapmakebtn = document.createElement("a");
     gapmakebtn.setAttribute('class', 'btn btn-primary');

     b++;

    let gapno = document.createElement("input");
    gapno.setAttribute('type', 'text');
    gapno.setAttribute('placeholder', 'Enter #');
    gapno.setAttribute('class', 'form-control');
    gapno.setAttribute('id', 'gapno'+b);
    gapno.setAttribute('name', 'gapno[]');
    document.querySelector('#gap-main').appendChild(gapno);

    let competency = document.createElement("input");
    competency.setAttribute('type', 'text');
    competency.setAttribute('placeholder', 'Enter required competency');
    competency.setAttribute('class', 'form-control');
    competency.setAttribute('id', 'competency'+b);
    competency.setAttribute('name', 'competency[]');
    document.querySelector('#gap-main').appendChild(competency);

    let requiredcompetencylvl = document.createElement("input");
    requiredcompetencylvl.setAttribute('type', 'text');
    requiredcompetencylvl.setAttribute('placeholder', 'Required Competency Level (1-4)');
    requiredcompetencylvl.setAttribute('class', 'form-control');
    requiredcompetencylvl.setAttribute('id', 'requiredcompetencylvl'+b);
    requiredcompetencylvl.setAttribute('name', 'requiredcompetencylvl[]');
    document.querySelector('#gap-main').appendChild(requiredcompetencylvl);

    let currentcompetency = document.createElement("input");
    currentcompetency.setAttribute('type', 'text');
    currentcompetency.setAttribute('placeholder', 'Current Competency Level (1-4)');
    currentcompetency.setAttribute('class', 'form-control');
    currentcompetency.setAttribute('id', 'currentcompetency'+b);
    currentcompetency.setAttribute('name', 'currentcompetency[]');
    document.querySelector('#gap-main').appendChild(currentcompetency);

    document.getElementById("gapno"+b).style.width="10%";
    document.getElementById("competency"+b).style.width="30%";
    document.getElementById("requiredcompetencylvl"+b).style.width="30%";
    document.getElementById("currentcompetency"+b).style.width="30%";

    gapmakebtn.setAttribute('id', 'gapButton');
    gapmakebtn.setAttribute('onclick', 'gapbtn()');
    document.querySelector('#gap-main').appendChild(gapmakebtn);
    document.getElementById("gapButton").innerHTML = "Add more";

    let gapdelbtnmake = document.createElement("a");
    gapdelbtnmake.setAttribute('class', 'btn btn-danger');
    gapdelbtnmake.setAttribute('id', 'gapdelbtn');
    gapdelbtnmake.setAttribute('onclick', 'gapdel()');
    document.querySelector('#gap-main').appendChild(gapdelbtnmake);
    document.getElementById("gapdelbtn").innerHTML = "-";

    document.getElementById("gapButton").style.width="95%";
    document.getElementById("gapdelbtn").style.width="5%";

  }

    function actionbtn(){

      const actionbtndel = document.getElementById("actionButton");
      actionbtndel.remove();

      const actiondelbtndel = document.getElementById("actiondelbtn");
      actiondelbtndel.remove();

    y++;

    let actionno = document.createElement("input");
    actionno.setAttribute('type', 'text');
    actionno.setAttribute('placeholder', 'Enter #');
    actionno.setAttribute('class', 'form-control');
    actionno.setAttribute('id', 'actionno'+y);
    actionno.setAttribute('name', 'actionno[]');
    document.querySelector('#action-main').appendChild(actionno);

    let gapiden = document.createElement("input");
    gapiden.setAttribute('type', 'text');
    gapiden.setAttribute('placeholder', 'Enter GAPS identified');
    gapiden.setAttribute('class', 'form-control');
    gapiden.setAttribute('id', 'gapiden'+y);
    gapiden.setAttribute('name', 'gapiden[]');
    document.querySelector('#action-main').appendChild(gapiden);

    let targetdate = document.createElement("input");
    targetdate.setAttribute('type', 'text');
    targetdate.setAttribute('placeholder', 'Enter gap address target date');
    targetdate.setAttribute('class', 'form-control');
    targetdate.setAttribute('id', 'targetdate'+y);
    targetdate.setAttribute('name', 'targetdate[]');
    document.querySelector('#action-main').appendChild(targetdate);

    let actiontaken = document.createElement("input");
    actiontaken.setAttribute('type', 'text');
    actiontaken.setAttribute('placeholder', 'Enter Action Taken');
    actiontaken.setAttribute('class', 'form-control');
    actiontaken.setAttribute('id', 'actiontaken'+y);
    actiontaken.setAttribute('name', 'actiontaken[]');
    document.querySelector('#action-main').appendChild(actiontaken);

    document.getElementById("actionno"+y).style.width="10%";
    document.getElementById("gapiden"+y).style.width="30%";
    document.getElementById("targetdate"+y).style.width="30%";
    document.getElementById("actiontaken"+y).style.width="30%";


    let actionbtnmake = document.createElement("a");
    actionbtnmake.setAttribute('class', 'btn btn-primary');
    actionbtnmake.setAttribute('id', 'actionButton');
    actionbtnmake.setAttribute('onclick', 'actionbtn()');
    document.querySelector('#action-main').appendChild(actionbtnmake);
    document.getElementById("actionButton").innerHTML = "Add more";

    let actiondelbtnmake = document.createElement("a");
    actiondelbtnmake.setAttribute('class', 'btn btn-danger');
    actiondelbtnmake.setAttribute('id', 'actiondelbtn');
    actiondelbtnmake.setAttribute('onclick', 'actiondel()');
    document.querySelector('#action-main').appendChild(actiondelbtnmake);
    document.getElementById("actiondelbtn").innerHTML = "-";

    document.getElementById("actionButton").style.width="95%";
    document.getElementById("actiondelbtn").style.width="5%";
    
    }

 function foedel(){
      
      if(x>0){

      const foedel = document.getElementById("foe"+x);
      foedel.remove();
      const foelvldel = document.getElementById("foelvl"+x);
      foelvldel.remove();
      
      x--;

     }
 }

  function gapdel(){

      if(b>0){

      const gapnodel = document.getElementById("gapno"+b);
      
      const competencydel = document.getElementById("competency"+b);
      
      const requireddel = document.getElementById("requiredcompetencylvl"+b);
      
      const currentdel = document.getElementById("currentcompetency"+b);
      

      gapnodel.remove();
      competencydel.remove();
      requireddel.remove();
      currentdel.remove();
      
      b--;

      }
  
 }

  function actiondel(){

      if(y>0){

      const actionnodel = document.getElementById("actionno"+y);
      
      const gapidendel = document.getElementById("gapiden"+y);
      
      const targetdatedel = document.getElementById("targetdate"+y);
      
      const actiontakendel = document.getElementById("actiontaken"+y);
      

      actionnodel.remove();
      gapidendel.remove();
      targetdatedel.remove();
      actiontakendel.remove();

      y--;

      }
  
 }

</script>

    <script type="text/javascript">

        //first ajax
        $(document).ready(function(){

            $("#sel_depart").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'scripts/getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var mstation_name = response[i]['mother_station'];

                            $("#sel_user").append("<option value='"+id+"'>"+mstation_name+"</option>");

                        }
                    }
                });
            });

        });

        //2nd ajax
        $(document).ready(function(){

            $("#sel_depart2").change(function(){
                var deptid2 = $(this).val();

                $.ajax({
                    url: 'scripts/getUsers2.php',
                    type: 'post',
                    data: {depart2:deptid2},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user2").empty();
                        for( var o = 0; o<len; o++){
                            var id2 = response[o]['id'];
                            var mstation_name2 = response[o]['mother_station'];

                            $("#sel_user2").append("<option value='"+id2+"'>"+mstation_name2+"</option>");

                        }
                    }
                });
            });

        });

        var a=1;
    </script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/personel-logo.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $emp_fname;?></h2>
              <h3 style="color:green"><b>Person Creating Account</b></h3>
              <!--
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>

              </div>
              -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pds-basic">Basic</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#pds-address">Address</button>
                </li>

                <!--
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>
                -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pds-identification">Identification</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pds-family">Family</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pds-other-info">Other Info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pds-hr-info">HR Info</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pds-hr-competency">HR Competency</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade active show profile-edit" id="pds-basic">

                <!-- form1 -->
                <!-- Profile Edit Form -->
                  <form action="#" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/personel-logo.jpg" alt="Profile">
                        <div class="pt-2">
                          
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                          
                          <!-- old file browser
                          <input type="file" name="attachment" class="file" id="attachment" style="display: none;" onchange="fileSelected(this)"/>
                          <button type="button" class="btn btn-primary btn-sm" onclick="openAttachment()"><i class="bi bi-upload"></i></button>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          -->

                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="agencyid" class="col-md-4 col-lg-3 col-form-label">Agency ID<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="agencyid" type="number" class="form-control" id="agencyid" min="0" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter agency ID" value="<?php if(isset($_POST['agencyid'])){ echo $_POST['agencyid']; }?>"required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="surname" class="col-md-4 col-lg-3 col-form-label">Surname<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="surname" text="text" class="form-control" id="surname" placeholder="Enter surname" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['surname'])){ echo $_POST['surname']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="suffix" class="col-md-4 col-lg-3 col-form-label">Suffix</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="suffix" text="text" class="form-control" id="Suffix" placeholder="Enter suffix"  onkeydown="return /[a-z]/i.test(event.key)" value="<?php if(isset($_POST['suffix'])){ echo $_POST['suffix']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" text="firstname" class="form-control" id="surname" placeholder="Enter first name" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="middlename" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" text="text" class="form-control" id="middlename" placeholder="Enter middle name" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['middlename'])){ echo $_POST['middlename']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of birth<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="dob" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pob" class="col-md-4 col-lg-3 col-form-label">Place of Birth<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pob" text="text" class="form-control" id="pob" placeholder="Enter place of birth" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['pob'])){ echo $_POST['pob']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="sex" class="col-md-4 col-lg-3 col-form-label">Sex<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" id="gender" required>
                          <option value="" disabled selected>Select gender</option>
                          <option value="Male" <?php if($_POST['gender']=='Male') echo 'selected="selected"';?>>Male</option>
                          <option value="Female" <?php if($_POST['gender']=='Female') echo 'selected="selected"';?> >Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Civilstatus" class="col-md-4 col-lg-3 col-form-label">Civil Status<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <select name="civil" id="civil" required>
                            <option value="" disabled selected>Select civil status</option>
                            <option value="Single" <?php if($_POST['civil']=='Single') echo 'selected="selected"';?>>Single</option>
                            <option value="Married" <?php if($_POST['civil']=='Married') echo 'selected="selected"';?>>Married</option>
                            <option value="Widowed" <?php if($_POST['civil']=='Widowed') echo 'selected="selected"';?>>Widowed</option>
                            <option value="Separated" <?php if($_POST['civil']=='Separated') echo 'selected="selected"';?>>Separated</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label">Citizenship<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-check-input" type="radio" name="radio_citizen" value="filipino" id="citizen_filipino" onclick="disableTxt()" required <?php if (isset($_POST['radio_citizen']) && $_POST['radio_citizen']=="filipino") echo "checked";?>><span style="font-size:18px"> Filipino</span>
                        <input class="form-check-input" type="radio" name="radio_citizen" value="dual" id="citizen_dual" onclick="undisableTxt()" required <?php if (isset($_POST['radio_citizen']) && $_POST['radio_citizen']=="dual") echo "checked";?>><span style="font-size:18px"> Dual</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label id="dual_label" for="dual" class="col-md-4 col-lg-3 col-form-label">Country if dual citizenship</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dual" type="text" class="form-control" id="dual" placeholder="" onkeypress="dualtyped()" value="<?php if(isset($_POST['dual'])){ echo $_POST['dual']; } else { echo "";}?>"  >

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="height" class="col-md-4 col-lg-3 col-form-label">Height (m)<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="height" type="number" class="form-control" id="height" min="0" max="3" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter height(In meters)" value="<?php if(isset($_POST['height'])){ echo $_POST['height']; }?>" required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="weight" class="col-md-4 col-lg-3 col-form-label">Weight (kg)<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="weight" type="number" class="form-control" id="weight" min="0" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter height(In meters)" value="<?php if(isset($_POST['weight'])){ echo $_POST['weight']; }?>"required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="bloodtype" class="col-md-4 col-lg-3 col-form-label">Blood Type<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9" id="bloodtype" name="bloodtype">
                        <select name="blood" required>
                            <option value="" disabled selected>Select your option</option>
                            <option value="A" <?php if($_POST['blood']=='A') echo 'selected="selected"';?>>A</option>
                            <option value="B" <?php if($_POST['blood']=='B') echo 'selected="selected"';?>>B</option>
                            <option value="O" <?php if($_POST['blood']=='O') echo 'selected="selected"';?>>O</option>
                            <option value="AB" <?php if($_POST['blood']=='AB') echo 'selected="selected"';?>>AB</option>
                            <option value="A+" <?php if($_POST['blood']=='A+') echo 'selected="selected"';?>>A+</option>
                            <option value="B+" <?php if($_POST['blood']=='B+') echo 'selected="selected"';?>>B+</option>
                            <option value="AB+" <?php if($_POST['blood']=='AB+') echo 'selected="selected"';?>>AB+</option>
                            <option value="O+" <?php if($_POST['blood']=='O+') echo 'selected="selected"';?>>O+</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">password<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" class="form-control" id="password" placeholder="Enter password" min="5" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; }?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Re-Type password<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password2" type="text" class="form-control" id="password2" placeholder="Re-Enter password" min="5" value="<?php if(isset($_POST['password2'])){ echo $_POST['password2']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="userlevel" class="col-md-4 col-lg-3 col-form-label">User Level<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9" id="userlevel" name="userlevel">
                        <select name="level" id="level" required>
                            <option value="" disabled selected>Select user level</option>
                            <option value="Admin" <?php if($_POST['level']=='Admin') echo 'selected="selected"';?>>Admin</option>
                            <option value="Default" <?php if($_POST['level']=='Default') echo 'selected="selected"';?>>Default</option>
                            <option value="HR Admin" <?php if($_POST['level']=='HR Admin') echo 'selected="selected"';?>>HR Admin</option>
                            <option value="HR View" <?php if($_POST['level']=='HR View') echo 'selected="selected"';?>>HR View</option>
                            <option value="IT" <?php if($_POST['level']=='IT') echo 'selected="selected"';?>>IT</option>
                            <option value="Property" <?php if($_POST['level']=='Property') echo 'selected="selected"';?>>Property</option>
                            <option value="User Supervisors" <?php if($_POST['level']=='User Supervisors') echo 'selected="selected"';?>>User Supervisors</option>
                            <option value="Users (EEWTTSV)" <?php if($_POST['level']=='Users (EEWTTSV)') echo 'selected="selected"';?>>Users (EEWTTSV)</option>
                            <option value="Users (EEWTTSV+Personal)" <?php if($_POST['level']=='Users (EEWTTSV+Personal)') echo 'selected="selected"';?>>Users (EEWTTSV+Personal)</option>
                          </select>
                      </div>
                    </div>
                    <?php include "scripts\add-employee-error.php"; ?>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="save">Check for errors</button>
                      
                    </div>
                  <!-- End Profile Edit Form -->
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="pds-address">
<section class="section contact">

          <section class="section">
      <div class="row">
        <h5 id='residential-form'><b>Residential</b></h5>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">House/Block/Lot no</h5>
              
              <textarea id="residentialhouse1" name="residentialhouse1" rows="3" cols="29" required><?php if(isset($_POST['residentialhouse1'])){ echo $_POST['residentialhouse1']; }?></textarea>

              <h5 class="card-title">Subdivision/Village</h5>
              
              <textarea id="subdivision1" name="subdivision1" rows="2" cols="29" required><?php if(isset($_POST['subdivision1'])){ echo $_POST['subdivision1']; }?></textarea>

              <h5 class="card-title">City/Municipality</h5>
              
              <textarea id="city1" name="city1" rows="2" cols="29"required><?php if(isset($_POST['city1'])){ echo $_POST['city1']; }?></textarea>

              <h5 class="card-title">Contact Number</h5>

              <input type="text" id="contactnumber1" name="contactnumber1" value="<?php if(isset($_POST['contactnumber1'])){ echo $_POST['contactnumber1']; }?>"required>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">street</h5>
              
              <textarea id="street1" name="street1" rows="3" cols="29" required><?php if(isset($_POST['street1'])){ echo $_POST['street1']; }?></textarea>

              <h5 class="card-title">Barangay</h5>
              
              <textarea id="barangay1" name="barangay1" rows="2" cols="29" required><?php if(isset($_POST['barangay1'])){ echo $_POST['barangay1']; }?></textarea>

              <h5 class="card-title">province</h5>
              
              <textarea id="province1" name="province1" rows="2" cols="29" ><?php if(isset($_POST['province1'])){ echo $_POST['province1']; }?></textarea>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <h5><b>Permanent</b></h5>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">House/Block/Lot no</h5>
              
              <textarea id="residentialhouse2" name="residentialhouse2" rows="3" cols="29" required><?php if(isset($_POST['residentialhouse2'])){ echo $_POST['residentialhouse2']; }?></textarea>

              <h5 class="card-title">Subdivision/Village</h5>
              
              <textarea id="subdivision2" name="subdivision2" rows="2" cols="29" required><?php if(isset($_POST['subdivision2'])){ echo $_POST['subdivision2']; }?></textarea>

              <h5 class="card-title">City/Municipality</h5>
              
              <textarea id="city2" name="city2" rows="2" cols="29" required><?php if(isset($_POST['city2'])){ echo $_POST['city2']; }?></textarea>

              <h5 class="card-title">Contact Number</h5>

              <input type="text" id="contactnumber2" name="contactnumber2" value="<?php if(isset($_POST['contactnumber1'])){ echo $_POST['contactnumber1']; }?>" required>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">street</h5>
              
              <textarea id="street2" name="street2" rows="3" cols="29" required><?php if(isset($_POST['street2'])){ echo $_POST['street2']; }?></textarea>

              <h5 class="card-title">Barangay</h5>
              
              <textarea id="barangay2" name="barangay2" rows="2" cols="29" required><?php if(isset($_POST['barangay2'])){ echo $_POST['barangay2']; }?></textarea>

              <h5 class="card-title">province</h5>
              
              <textarea id="province2" name="province2" rows="2" cols="29" required><?php if(isset($_POST['province2'])){ echo $_POST['province2']; }?></textarea>
            </div>
          </div>

        </div>
      </div>
    </section>
 </div>
<!-- </form> -->

                <div class="tab-pane fade pt-3" id="pds-identification">
                  <!-- Settings Form -->
                  <!-- <form> -->

                    <div class="row mb-3">
                      <label for="gsis-id" class="col-md-4 col-lg-3 col-form-label">GSIS ID number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="gsis-id" type="text" class="form-control" id="gsis-id" value="<?php if(isset($_POST['gsis-id'])){ echo $_POST['gsis-id']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pagibig-id" class="col-md-4 col-lg-3 col-form-label">PAGIBIG ID number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pagibig-id" type="text" class="form-control" id="pagibig-id" value="<?php if(isset($_POST['pagibig-id'])){ echo $_POST['pagibig-id']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="philhealth-id" class="col-md-4 col-lg-3 col-form-label">Philhealth ID number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="philhealth-id" type="text" class="form-control" id="philhealth-id" value="<?php if(isset($_POST['philhealth-id'])){ echo $_POST['philhealth-id']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">SSS ID number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sss-id" type="text" class="form-control" id="sss-id" value="<?php if(isset($_POST['sss-id'])){ echo $_POST['sss-id']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Email Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email-add" type="text" class="form-control" id="email-add" value="<?php if(isset($_POST['email-add'])){ echo $_POST['email-add']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mobile Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile-number" type="text" class="form-control" id="mobile-number" value="<?php if(isset($_POST['mobile-number'])){ echo $_POST['mobile-number']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">TIN number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tin-number" type="text" class="form-control" id="tin-number" value="<?php if(isset($_POST['tin-number'])){ echo $_POST['tin-number']; }?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                <!--  </form> End settings Form -->

                </div>
<!-- </form> -->

                <div class="tab-pane fade pt-3" id="pds-family">
                  <!-- Family Form -->
                 <!-- <form> -->

                    <div class="row mb-3">
                      <label for="gsis-id" class="col-md-4 col-lg-3 col-form-label">Spouse Surname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-surname" type="text" class="form-control" id="spouse-surname" value="<?php if(isset($_POST['spouse-surname'])){ echo $_POST['spouse-surname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pagibig-id" class="col-md-4 col-lg-3 col-form-label">Spouse First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-fname" type="text" class="form-control" id="spouse-fname" value="<?php if(isset($_POST['spouse-fname'])){ echo $_POST['spouse-fname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="philhealth-id" class="col-md-4 col-lg-3 col-form-label">Spouse Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-mname" type="text" class="form-control" id="spouse-mname" value="<?php if(isset($_POST['spouse-mname'])){ echo $_POST['spouse-mname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Spouse Contact Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-contact" type="text" class="form-control" id="spouse-countact" value="<?php if(isset($_POST['spouse-contact'])){ echo $_POST['spouse-contact']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Spouse Occupation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-occupation" type="text" class="form-control" id="spouse-occupation" value="<?php if(isset($_POST['spouse-occupation'])){ echo $_POST['spouse-occupation']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Spouse Employer/Business</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-business" type="text" class="form-control" id="spouse-business" value="<?php if(isset($_POST['spouse-business'])){ echo $_POST['spouse-business']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Business Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="spouse-business-add" type="text" class="form-control" id="spouse-business-add" value="<?php if(isset($_POST['spouse-business-add'])){ echo $_POST['spouse-business-add']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Spouse' Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="spouse-dob" id="spouse-dob" value="<?php if(isset($_POST['spouse-dob'])){ echo $_POST['spouse-dob']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Father's Surname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father-surname" type="text" class="form-control" id="father-surname" value="<?php if(isset($_POST['father-surname'])){ echo $_POST['father-surname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Father's First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father-fname" type="text" class="form-control" id="father-fname" value="<?php if(isset($_POST['father-fname'])){ echo $_POST['father-fname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Father's Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father-mname" type="text" class="form-control" id="father-mname" value="<?php if(isset($_POST['father-mname'])){ echo $_POST['father-mname']; }?>">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Father's Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="father-dob" id="father-dob" value="<?php if(isset($_POST['father-dob'])){ echo $_POST['father-dob']; }?>">
                      </div>
                    </div>

                                        <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mother's Maiden Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="mother-maiden-name" id="mother-maiden-name" value="<?php if(isset($_POST['mother-maiden-name'])){ echo $_POST['mother-maiden-name']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mother's Surname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother-surname" type="text" class="form-control" id="mother-surname" value="<?php if(isset($_POST['mother-surname'])){ echo $_POST['mother-surname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mother's Firstname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother-fname" type="text" class="form-control" id="mother-fname" value="<?php if(isset($_POST['mother-fname'])){ echo $_POST['mother-fname']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mother's Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother-mname" type="text" class="form-control" id="mother-mname" value="<?php if(isset($_POST['mother-mname'])){ echo $_POST['mother-mname']; }?>">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Mother's Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="mother-dob" id="mother-dob"  value="<?php if(isset($_POST['mother-dob'])){ echo $_POST['mother-dob']; }?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Children's Name/s</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="children-name" id="children-name" cols="45"><?php if(isset($_POST['children-name'])){ echo $_POST['children-name']; }?></textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  <!--</form>-->

                </div>
          
                <div class="tab-pane fade pt-3" id="pds-other-info">

                  <!--<form>-->

                    <div class="row mb-3">
                      <label for="gsis-id" class="col-md-4 col-lg-3 col-form-label">Special Skills / Hobbies</label>
                      <div class="col-md-8 col-lg-9">

                        <textarea rows="3" cols="50" name="hobbies"><?php if(isset($_POST['hobbies'])){ echo $_POST['hobbies']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pagibig-id" class="col-md-4 col-lg-3 col-form-label">Non-Academic Recognition</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea rows="3" cols="50" name="nac"><?php if(isset($_POST['nac'])){ echo $_POST['nac']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="philhealth-id" class="col-md-4 col-lg-3 col-form-label">Associations Membership</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea rows="3" cols="50" name="memberships"><?php if(isset($_POST['memberships'])){ echo $_POST['memberships']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="#" class="col-md-4 col-lg-3 col-form-label">Referrence</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea rows="3" cols="50" name="referrence"><?php if(isset($_POST['referrence'])){ echo $_POST['referrence']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">34<b>-A.</b> Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the office, Bureau or Department where you will be appointed?<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                        <input class="form-check-input" type="radio" name="radio_affinity" value="yes" id="radio_affinity_yes" required <?php if (isset($_POST['radio_affinity']) && $_POST['radio_affinity']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>
                        <input class="form-check-input" type="radio" name="radio_affinity" value="no" id="radio_affinity_no" required <?php if (isset($_POST['radio_affinity']) && $_POST['radio_affinity']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
          
                      <label><B>A</B> within a third degree?</label>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">34<b>-B.</b> Within the fourth degree (or Local Government Unit - Career Employees)?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_degree" value="yes" id="degree_yes" required <?php if (isset($_POST['radio_degree']) && $_POST['radio_degree']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_degree" value="no" id="degree_no" required <?php if (isset($_POST['radio_degree']) && $_POST['radio_degree']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">34. if yes, give details<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details1"><?php if(isset($_POST['details1'])){ echo $_POST['details1']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">35-A. Have you ever been found guilty of any administrative offence ?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_offence" value="yes" id="offence_yes" required <?php if (isset($_POST['radio_offence']) && $_POST['radio_offence']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_offence" value="no" id="offence_no" required <?php if (isset($_POST['radio_offence']) && $_POST['radio_offence']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">34. if yes, give details<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details2"><?php if(isset($_POST['details2'])){ echo $_POST['details2']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">35-B. Have you been criminally charged before any court?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_charge" value="yes" id="charge_yes" required <?php if (isset($_POST['radio_charge']) && $_POST['radio_charge']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_charge" value="no" id="charge_no" required <?php if (isset($_POST['radio_charge']) && $_POST['radio_charge']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">35-B. b. If yes Give details<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details3"><?php if(isset($_POST['details3'])){ echo $_POST['details3']; }?></textarea>
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_convict" value="yes" id="convict_yes" required <?php if (isset($_POST['radio_convict']) && $_POST['radio_convict']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_convict" value="no" id="convict_no" required <?php if (isset($_POST['radio_convict']) && $_POST['radio_convict']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">36. If yes Give details<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details4"><?php if(isset($_POST['details4'])){ echo $_POST['details4']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">37. Have you ever been seperated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_separate" value="yes" id="separate_yes" required <?php if (isset($_POST['radio_separate']) && $_POST['radio_separate']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_separate" value="no" id="separate_no" required <?php if (isset($_POST['radio_separate']) && $_POST['radio_separate']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">37. If yes Give details <span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details5"><?php if(isset($_POST['details5'])){ echo $_POST['details5']; }?></textarea>
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">38-A. Have you ever been a candidate in a national or local election held within the last year(except Barangay election)?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_candidate" value="yes" id="candidate_yes" required <?php if (isset($_POST['radio_candidate']) && $_POST['radio_candidate']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_candidate" value="no" id="candidate_no" required <?php if (isset($_POST['radio_candidate']) && $_POST['radio_candidate']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If yes Give details <span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details6"><?php if(isset($_POST['details6'])){ echo $_POST['details6']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">38-B. Have you resigned from government service during the three (3) month period before the last election<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_service" value="yes" id="service_yes" required <?php if (isset($_POST['radio_service']) && $_POST['radio_service']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_service" value="no" id="service_no" required <?php if (isset($_POST['radio_service']) && $_POST['radio_service']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If yes Give details <span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details7"><?php if(isset($_POST['details7'])){ echo $_POST['details7']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">39. Have you acquired the status of an immigrant or permanent resident of another country?<span style="color:red">*</span><br></label>
                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_immigrant" value="yes" id="immigrant_yes" required <?php if (isset($_POST['radio_immigrant']) && $_POST['radio_immigrant']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_immigrant" value="no" id="immigrant_no" required <?php if (isset($_POST['radio_immigrant']) && $_POST['radio_immigrant']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If yes Give details<b>(Country)</b> <span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details8"><?php if(isset($_POST['details8'])){ echo $_POST['details8']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">40. Pursuant to:<br> <b>(a)</b> Indigenous Peoples Act (RA 8371);<br><br> <b>(b)</b> Magna Carta for Disabled Persons (RA 7277);<br><br><b>(c)</b> Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:<span style="color:red">*</span><br><br><b>A.</b> Are you a member of any indigenous group?</label>

                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_indigenous" value="yes" id="indigenous_yes" required <?php if (isset($_POST['radio_indigenous']) && $_POST['radio_indigenous']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_indigenous" value="no" id="indigenous_no" required <?php if (isset($_POST['radio_indigenous']) && $_POST['radio_indigenous']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If yes, please specify <span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details9"><?php if(isset($_POST['details9'])){ echo $_POST['details9']; }?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">40-<b>B.</b> Are you a person with Disability?</label>

                      <div class="col-md-8 col-lg-9">

                        <input class="form-check-input" type="radio" name="radio_disability" value="yes" id="disability_yes" required <?php if (isset($_POST['radio_disability']) && $_POST['radio_disability']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_disability" value="no" id="disability_no" required <?php if (isset($_POST['radio_disability']) && $_POST['radio_disability']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If YES, please specify ID no<span style="color:red">*</span><br></label>

                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details10"><?php if(isset($_POST['details10'])){ echo $_POST['details10']; }?></textarea>
                      </div>

                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">40-<b>C.</b> Are you a solo parent?</label>

                      <div class="col-md-8 col-lg-9">

                         <input class="form-check-input" type="radio" name="radio_parent" value="yes" id="parent_yes" required <?php if (isset($_POST['radio_parent']) && $_POST['radio_parent']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_parent" value="no" id="parent_no" required <?php if (isset($_POST['radio_parent']) && $_POST['radio_parent']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" style="font-size: 70%;">If YES, please specify ID no<span style="color:red">*</span><br></label>

                      
                      <div class="col-md-8 col-lg-9">
                       <textarea rows="3" cols="50" name="details11"><?php if(isset($_POST['details11'])){ echo $_POST['details11']; }?></textarea>
                      </div>
                       
                    </div>


                    <div class="row mb-3">
                      <label for="pagibig-id" class="col-md-4 col-lg-3 col-form-label"><b>Govt. ID # and Issuance Date</b></label>
                    </div>

                    <div class="row mb-3">
                      <label for="gsis-id" class="col-md-4 col-lg-3 col-form-label">Passport</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="others_passport_id" type="text" class="form-control" id="others_passport_id" placeholder="enter passport ID #" value="<?php if(isset($_POST['others_passport_id'])){ echo $_POST['others_passport_id']; }?>">
                        <input name="others_passport_date" type="date" class="form-control" id="others_passport_date" value="<?php if(isset($_POST['others_passport_date'])){ echo $_POST['others_passport_date']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="gsis-id" class="col-md-4 col-lg-3 col-form-label">GSIS</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="others_gsis_id" type="text" class="form-control" id="others_gsis_id" placeholder="enter passport ID #" value="<?php if(isset($_POST['others_gsis_id'])){ echo $_POST['others_gsis_id']; }?>">
                        <input name="others_gsis_date" type="date" class="form-control" id="others_gsis_date" value="<?php if(isset($_POST['others_gsis_date'])){ echo $_POST['others_gsis_date']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="sss-id" class="col-md-4 col-lg-3 col-form-label">SSS</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="others_sss_id" type="text" class="form-control" id="others_sss_id" placeholder="enter passport ID #"  value="<?php if(isset($_POST['others_sss_id'])){ echo $_POST['others_sss_id']; }?>">
                        <input name="others_sss_date" type="date" class="form-control" id="others_sss_date" value="<?php if(isset($_POST['others_sss_date'])){ echo $_POST['others_sss_date']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="prc-id" class="col-md-4 col-lg-3 col-form-label">PRC</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="others_prc_id" type="text" class="form-control" id="others_prc_id" placeholder="enter prc ID #" value="<?php if(isset($_POST['others_prc_id'])){ echo $_POST['others_prc_id']; }?>">
                        <input name="others_prc_date" type="date" class="form-control" id="others_prc_date" value="<?php if(isset($_POST['others_prc_date'])){ echo $_POST['others_prc_date']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="drivers-id" class="col-md-4 col-lg-3 col-form-label">Drivers License</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="others_driver_id" type="text" class="form-control" id="others_driver_id" placeholder="enter passport ID #" value="<?php if(isset($_POST['others_driver_id'])){ echo $_POST['others_driver_id']; }?>">
                        <input name="others_driver_date" type="date" class="form-control" id="others_driver_date" value="<?php if(isset($_POST['others_driver_date'])){ echo $_POST['others_driver_date']; }?>">
                      </div>
                    </div>
<!-- </form> -->
                     <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                </div>

                <!--</form>-->
            <div class="tab-pane fade pt-3" id="pds-hr-info">
                  

                  <!--<form> -->

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mother unit</label>
                      <div class="col-md-8 col-lg-9">
                                <select id="sel_depart" name="sel_depart">
                                    <option value="0">- Select -</option>
                                    <?php 

                                    // Fetch Department
                                    $sql_munit = "SELECT * FROM munit";
                                    $munit_data = mysqli_query($conn,$sql_munit);

                                    while($row = mysqli_fetch_assoc($munit_data) ){
                                        $munit_id = $row['id'];
                                        $munit_name = $row['mother_unit'];
                                      
                                        // Option
                                        //echo "<option value='".$munit_id2."' >".$munit_name2."</option>";
                                        
                                       if(isset($_POST['sel_depart'])){ 
                                        echo "<option value='".$munit_id."' selected>".$munit_name."</option>"; 
                                        }else{
                                          echo "<option value='".$munit_id."' >".$munit_name."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mother Station</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_user" name="sel_user">
                          <option value="0">- Select -</option
>                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Designated unit</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_depart2" name="sel_depart2">
                            <option value="0">- Select -</option>
                            <?php 
                            // Fetch Department
                            $sql_munit2 = "SELECT * FROM munit";
                            $munit_data2 = mysqli_query($conn,$sql_munit2);
                            while($row = mysqli_fetch_assoc($munit_data2) ){
                                $munit_id2 = $row['id'];
                                $munit_name2 = $row['mother_unit'];
                              
                                // Option
                                //echo "<option value='".$munit_id2."' >".$munit_name2."</option>";
                                
                               if(isset($_POST['sel_depart2'])){ 
                                echo "<option value='".$munit_id2."' selected>".$munit_name2."</option>"; 
                                }else{
                                  echo "<option value='".$munit_id2."' >".$munit_name2."</option>";
                                }
                            }
                            ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Designated station</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_user2" name="sel_user2">
                            <option value="0">- Select -</option>
                        </select>
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" >Employment status<span style="color:red">*</span><br></label>
                    </div>

                  

                   <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Inactive reason</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_inactive" name="sel_inactive">
                            <option value="0">- Select -</option>
                            <option value="AWOL">AWOL</option>
                            <option value="Dropped from the roll">Dropped from the roll</option>
                            <option value="Retired">Retired</option>
                            <option value="Secondment">Secondment</option>
                            <option value="erminated">Terminated</option>
                            <option value="End of Contract">End of Contract</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" >Employee Type<span style="color:red">*</span><br></label>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Non permanent type</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_nonpermanent" name="sel_nonpermanent">
                            <option value="0">- Select -</option>
                            <option value="Coterminous">Coterminous</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Contract of Service">Contract of Service</option>
                            <option value="Job order">Job order</option>
                            <option value="Casual">Casual</option>
                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" >Eligible<span style="color:red">*</span><br></label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input class="form-check-input" type="radio" name="radio_eligible" value="yes" required <?php if (isset($_POST['radio_eligible']) && $_POST['radio_eligible']=="yes") echo "checked";?>><span style="font-size:18px"> Yes</span>

                        <input class="form-check-input" type="radio" name="radio_eligible" value="no" required <?php if (isset($_POST['radio_eligible']) && $_POST['radio_eligible']=="no") echo "checked";?>><span style="font-size:18px"> No</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label" >Eligibility Level 1 & 2<span style="color:red">*</span><br></label>
                      
                      <div class="col-md-8 col-lg-9">

                        <input type="checkbox" id="eligibility1" name="eligibility[]" value="Registered nurse" <?php if (isset($_POST['eligibility1'])){ echo "checked"; } ?>>
                        <label for="eligibility1">Registered nurse</label><br>

                        <input type="checkbox" id="eligibility2" name="eligibility[]" value="RA 1080" >
                        <label for="eligibility2">RA 1080</label><br>

                        <input type="checkbox" id="eligibility3" name="eligibility[]" value="Licensure Exam for Teacher">
                        <label for="eligibility3">Licensure Exam for Teacher</label><br>

                        <input type="checkbox" id="eligibility4" name="eligibility[]" value="Environmental Planning">
                        <label for="eligibilit4">Environmental Planning</label><br>

                        <input type="checkbox" id="eligibility5" name="eligibility[]" value="CS Sub-Professional" >
                        <label for="eligibility5">CS Sub-Professional</label><br>

                        <input type="checkbox" id="eligibility6" name="eligibility[]" value="Midwifery Board" >
                        <label for="eligibility6">Midwifery Board</label><br>

                        <input type="checkbox" id="eligibility7" name="eligibility[]" value="Barangay Eligibility">
                        <label for="eligibility7">Barangay Eligibility</label><br>

                        <input type="checkbox" id="eligibility8" name="eligibility[]" value="National Competency TESDA" >
                        <label for="eligibilit8">National Competency TESDA</label><br>

                        <input type="checkbox" id="eligibility9" name="eligibility[]"  value="CS Professional">
                        <label for="eligibility9">CS Professional</label><br>

                        <input type="checkbox" id="eligibility10" name="eligibility[]" value="Sanitation Board10">
                        <label for="eligibility10">Sanitation Board</label><br>

                        <input type="checkbox" id="eligibility11" name="eligibility[]" value="Civil Engineering">
                        <label for="eligibility11">Cvil Engineering</label><br>

                        <input type="checkbox" id="eligibility12" name="eligibility[]" value="Others">
                        <label for="eligibilit12">Others</label><br>

                      </div>
                    </div>
                    
<br>
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Eligibility level 3</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_lvl3" name="sel_lvl3">
                            <option value="0">- Select -</option>
                            <option value="CESE">CESE</option>
                            <option value="CESO V">CESO V</option>
                            <option value="CESO IV">CESO IV</option>
                            <option value="CESO III">CESO III</option>
                            <option value="CESO II">CESO II</option>
                            <option value="CESO I">CESO I</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Position</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_positions" name="sel_positions">
                            <option value="0">- Select -</option>
                            <option value="CESE">CESE</option>
                            <option value="CESO V">CESO V</option>
                            <option value="CESO IV">CESO IV</option>
                            <option value="CESO III">CESO III</option>
                            <option value="CESO II">CESO II</option>
                            <option value="CESO I">CESO I</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Salary Grade</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_salgrade" name="sel_salgrade">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Basic Salary</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input type="text" id="basicsalary" name="basicsalary" value="<?php if(isset($_POST['basicsalary'])){ echo $_POST['basicsalary']; }?>";>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Step</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_step" name="sel_step">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Item No.</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input type="text" id="itemno" name="itemno" value="<?php if(isset($_POST['itemno'])){echo $_POST['itemno'];}?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Designation Type</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_destype" name="sel_destype">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Designation</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input type="text" id="designation" name="designation" value="<?php if(isset($_POST['designation'])){echo $_POST['designation'];}?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Highest Grade/level</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_highgrade" name="sel_highgrade">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Work Experience</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_workexp" name="sel_workexp">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Skills</label>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Personality</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_personality" name="sel_personality">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label"> Special info</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <select id="sel_specialinfo" name="sel_specialinfo">
                            <option value="0">- Select -</option>
                            <option value="1">sample value 1</option>
                            <option value="2">sample value 2</option>
                            <option value="3">sample value 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Last Date of Promotion or Increment (mm/dd/yyyy)</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="date_promotion" value="<?php if(isset($_POST['date_promotion'])){ echo $_POST['date_promotion']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Entry in Government (mm/dd/yyyy)<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="date_goventry" value="<?php if(isset($_POST['date_goventry'])){ echo $_POST['date_goventry']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">201 files</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <input type="text" id="201files" name="201files" value="<?php if(isset($_POST['201files'])){echo $_POST['201files'];}?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Remarks</label>
                      
                      <div class="col-md-8 col-lg-9">
                        <textarea name="hrremarks" id="hrremarks" rows="6" cols="60"><?php if(isset($_POST['hrremarks'])){echo $_POST['hrremarks'];}?></textarea>
                      </div>
                    </div>
 </form>                

                </div>
                <!-- </form> -->

<div class="tab-pane fade pt-3" id="pds-hr-competency">

<!-- field of experience form-->


  <div class="row mb-3"><center><b>Field of Expertise</b></center></div>
  
  <form>

      <div class="row mb-3" id="foe-main">
        
          <input type="text" id="foe0" name="foe[]" placeholder="Enter Field of expertise" style="width:70%" class="form-control">

          <input type="text" id="foelvl0" name="foelvl[]" placeholder="Enter level" style="width:30%" class="form-control">
          <a id="foeButton" class="btn btn-primary" onclick="foebtn()" style="width:95%">Add more</a>
          <a class="btn btn-danger" id="foedelbtn" onclick="foedel()" style="width:5%">-</a>
      </div>

      <div class="text-center">
          <button  class="btn btn-primary" name="save_competency" type="submit">Save</button>
      </div>
</form>

      <div class="row mb-3"><center><b>Competency Gaps</b></center></div>
  
      <div class="row mb-3" id="gap-main">

        <input type="text" id="gapno0" name="gapno[]" placeholder="Enter #" style="width:10%" class="form-control" > 

        <input type="text" id="competency0" name="competency[]" placeholder="Enter Required Competency" style="width:30%" class="form-control">

        <input type="text" id="requiredcompetencylvl0" name="requiredcompetencylvl[]" placeholder="Required Competency Level (1-4)" style="width:30%" class="form-control">

        <input type="text" id="currentcompetency0" name="currentcompetency[]" placeholder="Current Competency Level (1-4)" style="width:30%" class="form-control">
        <a class="btn btn-primary" id="gapButton" onclick="gapbtn()"  style="width:95%">Add more</a>
        <a class="btn btn-danger" id="gapdelbtn" onclick="gapdel()" style="width:5%">-</a>
      </div>

  <div class="row mb-3"><center><b>Action taken</b></center></div>

    <div class="row mb-3" id="action-main">

      <input type="text" id="actionno0" name="actionno[]" placeholder="Enter #" style="width:10%" class="form-control" > 

      <input type="text" id="gapiden0" name="gapiden[]" placeholder="Enter GAPS identified" style="width:30%" class="form-control">

      <input type="text" id="targetdate0" name="targetdate[]" placeholder="Enter gap address target date" style="width:30%" class="form-control">

      <input type="text" id="actiontaken0" name="actiontaken[]" placeholder="Enter Action Taken" style="width:30%" class="form-control">
      <a class="btn btn-primary" id="actionButton" onclick="actionbtn()" style="width:95%">Add more</a>
      <a class="btn btn-danger" id="actiondelbtn" onclick="actiondel()" style="width:5%">-</a>
    </div>
  
  <div class="row mb-3">
    <label for="sex" class="col-md-4 col-lg-3 col-form-label">Competency level<span style="color:red">*</span></label>
    <div class="col-md-8 col-lg-9">
        <select name="competencylvl" id="competencylvl" >
            <option value="" disabled selected>- Select -</option>
            <option value="" disabled selected>sample 1</option>
            <option value="" disabled selected>sample 1<</option>
        </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="sex" class="col-md-4 col-lg-3 col-form-label">GAD Intervension<span style="color:red">*</span></label>
    
    <div class="col-md-8 col-lg-9">
      <textarea cols="70" name="gadintervension" id="gadintervension"></textarea>
    </div>
  </div>



</div>
</div><!-- End Bordered Tabs -->

<!-- End competency Form -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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

  <script>
    function dualtyped(){
      document.getElementById("citizen_dual").checked = true;    
    }

    function undisableTxt() {
      document.getElementById("dual").disabled = false;
      document.getElementById("dual").required = true;
      document.getElementById("dual").placeholder = "Please specify country";
      document.getElementById("dual_label").innerHTML= "Country if dual citizenship<span style='color:red'>*</span>";

    }

    function disableTxt() {
      document.getElementById("dual").value = "";
      document.getElementById("dual").disabled = true;
      document.getElementById("dual").required = false;
      document.getElementById("dual").placeholder = "n/a";
      document.getElementById("dual_label").innerHTML= "Country if dual citizenship";

  }
</script>


</body>

</html>

<?php

if(isset($_POST["save"])) 
{

  $source = $_FILES['fileToUpload']['tmp_name'];

  if( $source != "" )
  {
        //change file name of the file to be copied
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $destination = "uploads/" . $newfilename;

        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));


  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") 
    {       
       $filesize=$_FILES["fileToUpload"]["size"];

      if ($filesize<8000000)
      {  
            if (!copy($source, $destination)) {
              echo "failed to copy ...\n";
            }
      }
    }
  }

}


include "scripts\add-employee-script.php";
include "scripts\HRC-save-script.php";
?>