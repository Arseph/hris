<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
$file_id = $_GET['file_id'];
$uid = $_GET['uid'];

?>
<style type="text/css">

  .hide_element 
  {
    display: none;
  }

  .txt_to {
width: 30%;
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
  // function toggle_others(){
  //  var element = document.getElementById("txt_others");
  //  element.classList.toggle("hide_element");
  // }

  function hide_disapprove(){
   var element = document.getElementById("disapprove_details");
   element.classList.add("hide_element");
  }

  function show_disapprove(){
   var element = document.getElementById("disapprove_details");
   element.classList.remove("hide_element");
  }

    function hide_approve(){
   var element = document.getElementById("approve_details");
   element.classList.add("hide_element");
  }

  function show_approve(){
   var element = document.getElementById("approve_details");
   element.classList.remove("hide_element");
  }

  function hide_all(){
   element = document.getElementById("main_div");
   element.classList.add("hide_element");
  }
</script>

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Leave Approval Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Leave Approval Form</h5>
              <?php include "scripts\leave-approval-form-script.php"; ?>
              <!-- General Form Elements -->
              <form method="post" type="submit">
              <div id='main_div'>
                <h5 class="card-title"><b>Action</b></h5>
                  <input type="radio" name='radio_action' value='1' onchange='hide_disapprove();show_approve()()'><b>Approve</b>
                  <br>
                  <input type="radio" name='radio_action' value='0' onchange='show_disapprove();hide_approve()'><b>Disapprove</b>

                  <!-- <input type="text" class="txt_to hide_element" id="txt_others"> -->


                  <div class='hide_element' id='disapprove_details'>
                    <br>
                    <textarea name='disapprove_details' class='form-control' id='' rows='5' cols='30' placeholder="Enter Disapproval Reason and Details"></textarea>
                  </div>
                  <div class='hide_element' id='approve_details'>
                    days with pay: <input type="number" name="withpay_days" class="txt_to" style='width:61%;'><br>
                    days without pay: <input type="number" name="withoutpay_days" class="txt_to" style='width:56.5%;'><br>
                    others: <input type='text' class='txt_to' name='others' placeholder="(Specify)" style='width:70%;' name='others'><br>
                    <input type="number" name="others_specify" class="txt_to" style='width:80%;'><br>
                  </div>
                  <br>
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

</body>

</html>