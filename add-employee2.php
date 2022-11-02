<?php
include "scripts\connection_script.php";
include "scripts\account_check.php";
include "layouts\layout_sidebar.php"
;
?>

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
              <h2>Sample Name</h2>
              <h3>Sample position</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <!--
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>
                -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade active show profile-edit" id="profile-edit">

                <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/personel-logo.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="agencyid" class="col-md-4 col-lg-3 col-form-label">Agency ID<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="agencyid" type="text" class="form-control" id="agencyid" placeholder="Enter Agency ID" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="surname" class="col-md-4 col-lg-3 col-form-label">Surname<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Surname" text="text" class="form-control" id="surname" placeholder="enter surname" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="suffix" class="col-md-4 col-lg-3 col-form-label">Suffix</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="suffix" type="text" class="form-control" id="suffix" placeholder="Enter Suffix e.g. jr., sr., etc..">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter Firstname">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="middlename" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="birthday" class="col-md-4 col-lg-3 col-form-label">Date of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" id="birthday" name="birthday">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pob" class="col-md-4 col-lg-3 col-form-label">Place of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pob" type="text" class="form-control" id="pob" placeholder="Enter Place of Birth">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                      <div class="col-md-8 col-lg-9" id="sex" name="sex">
                        <select>
                          <option value="" disabled selected>Select your option</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Civilstatus" class="col-md-4 col-lg-3 col-form-label">Civil Status</label>
                      <div class="col-md-8 col-lg-9" id="sex" name="sex">
                        <select>
                            <option value="" disabled selected>Select your option</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Separated</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label">Citizenship</label>
                      <div class="col-md-8 col-lg-9" id="dual" name="Citizenship">
                        <input class="form-check-input" type="radio" name="citizen_filipino" id="citizen_filipino"><span style="font-size:18px"> Filipino</span>
                        <input class="form-check-input" type="radio" name="citizen_dual" id="citizen_dual" ><span style="font-size:18px"> Dual</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dual" class="col-md-4 col-lg-3 col-form-label">Country if dual citizenship</label>
                      <div class="col-md-8 col-lg-9" id="dual" name="dual">
                        <input name="dual" type="text" class="form-control" id="dual" placeholder="" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Height" class="col-md-4 col-lg-3 col-form-label">Height (m)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Height" type="number" class="form-control" id="Height" max="3" placeholder="Enter Height">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="weight" class="col-md-4 col-lg-3 col-form-label">Weight (kg)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="weight" type="number" class="form-control" id="weight" placeholder="Enter Weight">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="bloodtype" class="col-md-4 col-lg-3 col-form-label">Blood Type</label>
                      <div class="col-md-8 col-lg-9" id="bloodtype" name="bloodtype">
                        <select>
                            <option value="" disabled selected>Select your option</option>
                            <option>A</option>
                            <option>B</option>
                            <option>O</option>
                            <option>AB</option>
                            <option>A+</option>
                            <option>B+</option>
                            <option>AB+</option>
                            <option>O+</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" class="form-control" id="password" placeholder="Enter password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="userlevel" class="col-md-4 col-lg-3 col-form-label">User Level</label>
                      <div class="col-md-8 col-lg-9" id="userlevel" name="userlevel">
                        <select>
                            <option value="" disabled selected>Select your option</option>
                            <option>Admin</option>
                            <option>Default</option>
                            <option>HR Admin</option>
                            <option>HR View</option>
                            <option>IT</option>
                            <option>Property</option>
                            <option>User Supervisors</option>
                            <option>Users (EEWTTSV)</option>
                            <option>Users (EEWTTSV+Personal)</option>
                          </select>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>

                <div class="tab-pane fade  profile-edit pt-3" id="profile-overview">

                                    <!-- default overview -->
                 
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Sample full name</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Section</div>
                    <div class="col-lg-9 col-md-8">ICT</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8">Computer Programmer 1</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">Sample Address</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact #</div>
                    <div class="col-lg-9 col-md-8">Sample # 1234</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">sample_email@gmail.com</div>
                  </div>
                
                <!-- default overview end -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Department of Health</span></strong>.<br> All Rights Reserved
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

</html>