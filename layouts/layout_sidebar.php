<?php 
include "scripts/connect.php";

if (!isset($_SESSION['user_id']))
{
    header('location:pages-login.php');
}else{
  $agencyid=$_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>HRIS v2</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main jquery File -->
  
  <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/doh-logo.png" alt="">
        <span class="d-none d-lg-block">HRIS - <?php if($_SESSION['userlevel']=='3'){
          echo "User";
        }elseif($_SESSION['userlevel']==2){
          echo "Admin";
        }elseif($_SESSION['userlevel']==1){
          echo "Super Admin";
        } ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
          <!--
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a> End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <!--
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul> <!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"><?PHP
            $uid=$_SESSION['user_id'];
            $sql = "select * from emp_basic where agencyid='$uid'";
            $result = sqlsrv_query($conn, $sql);
            $row = sqlsrv_fetch_array($result);
            $imagepath = $row['imagepath'];
            if($imagepath!="")
            { 
              echo '<img src="uploads/'.$imagepath.'" alt="Profile" class="rounded-circle">';  
            } 
            else 
            { 
              echo '<img src="assets/img/personel-logo.jpg" alt="Profile"  class="rounded-circle">'; 
            }

            
            ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['firstname']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['firstname']; ?></h6>
              <span></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="account-settings.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="scripts/logout-script.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <?php 
    if($_SESSION['userlevel']<3){
      echo ' <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
      <!--
        <a class="nav-link collapsed" data-bs-target="#data-nav" data-bs-toggle="collapse" href="addemp.php">
          <i class="bi bi-journal-text"></i><span>PDS Data Entry</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      -->

        <a class="nav-link" href="addemp.php"><i class="bi bi-journal-text"></i>Create New Employee Account</a>

        <a class="nav-link" href="addemp.php"><i class="bi bi-journal-text"></i>Export Employee PDS</a>

      <!--
        <ul id="data-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="addemp.php">
              <i class="bi bi-circle"></i><span>Add New Employee</span>
            </a>
          </li>
          <li>
            <a href="add-address.php">
              <i class="bi bi-circle"></i><span>Add Employee Address</span>
            </a>
            <li>
            <a href="add-identification.php">
              <i class="bi bi-circle"></i><span>Add Employee Identification</span>
            </a>
            <a href="add-family.php">
              <i class="bi bi-circle"></i><span>Add Employee Family information</span>
            </a>
            <a href="add-misc.php">
              <i class="bi bi-circle"></i><span>Add Employee Misc Info</span>
            </a>
       
        </ul>
        -->
      </li>
   <!--begin search nav   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Search By:</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
    
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Education</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Work Experience</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Trainings Attended</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Trainings Conducted</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Voluntary Work</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Scholarship</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Service Record</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Performance</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Office Ratings</span>
            </a>
          </li>

        </ul>
       end search nav-->
          <!-- original content

          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Education</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Work Experience</span>
            </a>
          </li>
        </ul>
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          

          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>

          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
        -->
      </li><!-- End Components Nav -->

      <li class="nav-heading">HR\'s Menu</li>

      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#emplist-nav" data-bs-toggle="collapse">
          <i class="bi bi-gem"></i>
          <span>Employee Master List</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="emplist-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="adm-master-list.php">
              <i class="bi bi-circle"></i><span>Active Employee List</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <!-- <i class="bi bi-bar-chart"></i> -->
          <i class="bi bi-gem"></i>
          <span>Employee Leaves</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="">
          
          <li>
            <a href="admin-leave-list.php">
              <i class="bi bi-circle"></i><span>View Leave Requests</span>
            </a>
            <li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>File leave for Employee</span>
            </a>
            <li>
        </ul>
      </li>
      <!-- End Components Nav -->';



echo'
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Reference-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>References</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Reference-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-divisions.php">
              <i class="bi bi-circle"></i><span>Divisions</span>
            </a>
          </li>
          <li>
            <a href="add-sections.php">
              <i class="bi bi-circle"></i><span>Sections</span>
            </a>
          </li>
          <li>
            <a href="add-positions.php">
              <i class="bi bi-circle"></i><span>Positions</span>
            </a>
          </li>

          <li>
            <a href="programs-list.php">
              <i class="bi bi-circle"></i><span>Programs</span>
            </a>
          </li>
          <li>
            <a href="eligibility-type.php">
              <i class="bi bi-circle"></i><span>Eligibility Category</span>
            </a>
          </li>
          <li>
            <a href="eligibility-list.php">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="name-extension-list.php">
              <i class="bi bi-circle"></i><span>Name Extensions</span>
            </a>
          </li>
        </ul>
      </li>


      
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Date Monitoring</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Retirement</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Loyalty</span>
            </a>
          </li>
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Step Increment</span>
            </a>
          </li>
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Birth Date</span>
            </a>
          </li>
        </ul>
        <!-- original content
        <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Step Increment</span>
            </a>
          </li>
        -->
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#property-nav" data-bs-toggle="collapse" href="#">
          <!-- <i class="bi bi-bar-chart"></i> -->
          <i class="bi bi-gem"></i>
          <span>Property Monitoring</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="property-nav" class="nav-content collapse " data-bs-parent="">
          

          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Property Inventory</span>
            </a>
          </li>
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Property Category</span>
            </a>
            <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Property Status</span>
            </a> 
        <!-- original content
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        -->
        </ul>
      </li><!-- End Charts Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Personnel Board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Prime HRM</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Announcements</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>e-Library</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Travel Order</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Weekly Accomplishment</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Employee Satisfaction</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>e-Complaints</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>HR Request</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <!-- start dashboard
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-columns"></i><span>Dashoard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dashboard-nav" class="nav-content collapse " data-bs-parent="#icons-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>PDS</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Civil status</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Blood type</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Gender</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Educational level</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>e-Complaints</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Government service</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Training types</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Learning Devt. types</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Funding type</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Dual citizenship</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Citizenship</span>
            </a>
          </li>
          <li>
              <i class="bi bi-diamond-fill"></i><span>HR Option 1</span>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Competency</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Offices</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Salary grade</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Personality</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Status</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Position</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Skills</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>HR status request</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>HR type request</span>
            </a>
          </li>
          <li>
              <i class="bi bi-diamond-fill"></i><span>HR Option 2</span>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Designation</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Designation type</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Designation Service</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Service status</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Training roles</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Employee type</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Step</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Performance rating</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Performance year</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Inactive status</span>
            </a>
          </li>
          <li>
              <i class="bi bi-diamond-fill"></i><span>HR Option 3</span>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>stations</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>non-permanent type</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Entry status</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Eligibility Level 3</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Highest education</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Scholarship type</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Relevant experience</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Special info</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>HR prime category</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>DOC type</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Audit trail</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>User level</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>User manual</span>
            </a>
          </li>
        </ul>
      </li>
      End Dashboard -->

      <!-- End Contact Page Nav -->

      <!-- End Register Page Nav -->

      <!-- End Charts Nav -->

      <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>
      -->
      <!-- End Login Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout_script.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>';
    }elseif($_SESSION['userlevel']==3){

        
        $paramm = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                          //get basic
                          $checkbasic_sql = "select * from emp_basic where agencyid='$agencyid'";
                          $basic_result = sqlsrv_query( $conn, $checkbasic_sql , $paramm, $options);
                          $row_basic = sqlsrv_fetch_array($basic_result);

                          //get address
                          $checkaddresss_sql = "select * from emp_address where agencyid='$agencyid'";
                          $address_result = sqlsrv_query( $conn, $checkaddresss_sql , $paramm, $options);
                          $count_address = sqlsrv_num_rows($address_result);
                          $row_address = sqlsrv_fetch_array($address_result);

                          //get identification
                          $identification_sql = "select * from emp_identification
                           where agencyid='$agencyid'";
                          $identification_result = sqlsrv_query( $conn, $identification_sql , $paramm, $options);
                          $count_identification = sqlsrv_num_rows($identification_result);
                          $row_identification = sqlsrv_fetch_array($identification_result);


                          //get family
                          $checkfamily_sql = "select * from emp_family where agencyid='$agencyid'";
                          $family_result = sqlsrv_query( $conn, $checkfamily_sql , $paramm, $options);
                          $count_family = sqlsrv_num_rows($family_result);
                          $row_family = sqlsrv_fetch_array($family_result);

                          //get misc info
                          $checkmisc_sql = "select * from emp_miscinfo where agencyid='$agencyid'";
                          $misc_result = sqlsrv_query( $conn, $checkmisc_sql , $paramm, $options);
                          $count_misc = sqlsrv_num_rows($misc_result);
                          $row_misc = sqlsrv_fetch_array($misc_result);

                          //get hrinfo
                         

                          //get designation
                          $checkhdesignation_sql = "select * from emp_designation where agencyid='$agencyid'";
                          $designation_result = sqlsrv_query( $conn, $checkhdesignation_sql , $paramm, $options);
                          $count_designation = sqlsrv_num_rows($designation_result);
                          $row_designation = sqlsrv_fetch_array($designation_result);

                          //get eligibility
                          $checkhdeligibility_sql = "select * from emp_eligibility where agencyid='$agencyid'";
                          $eligibility_result = sqlsrv_query( $conn, $checkhdeligibility_sql, $paramm, $options);
                          $count_eligibility = sqlsrv_num_rows($eligibility_result);
                          $row_eligibility = sqlsrv_fetch_array($eligibility_result);


       echo ' <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Update PDS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="data-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>';
        echo ' <a href="update-basic.php?uid=' . $row['agencyid'] . '&id='.$row_basic['id'].'"><i class="bi bi-circle"></i><span>Update Basic Information</a>';

        if($count_address!=0)
        {
           echo "<a href='update-address.php?uid=".$row_address['agencyid']."&id=".$row_address['id']."'><i class='bi bi-circle'></i><span>Update Address</span></a>";


        }else{
           echo '<a href="add-address.php">
              <i class="bi bi-circle"></i><span style="color:red;">Add Address</span>
            </a>';
        }


        if($count_identification!=0)
        {
          echo "<a href='update-identification.php?uid=".$row_identification['agencyid']."'><i class='bi bi-circle'></i>
          Update Identification</a>";

        }else{
           echo '<a href="add-identification.php">
              <i class="bi bi-circle"></i><span style="color:red;">Add Identification</span>
            </a>';
        }


        // fix list from here
        if($count_family!=0)
        {
          echo "<a href='update-family.php?uid=".$row_family['agencyid']."'><i class='bi bi-circle'></i>
          Update Family Information</a>";

        }else{
           echo '<a href="add-family.php">
              <i class="bi bi-circle"></i><span style="color:red;">Add Family Information</span>
            </a>';
        }


        if($count_misc!=0)
        {
          echo "<a href='update-misc.php?uid=".$row_misc['agencyid']."'><i class='bi bi-circle'></i>
          Update Misc Information</a>";

        }else{
           echo '<a href="add-misc.php">
              <i class="bi bi-circle"></i><span style="color:red;">Add Misc Information</span>
            </a>';
        }

        if($count_designation!=0)
        {
          echo "<a href='emp-designation-history.php?uid=".$row_designation['agencyid']."'><i class='bi bi-circle'></i>
          Update Designation</a>";

        }else{
           echo "<a href='emp-designation-history.php?uid=".$agencyid."'>
              <i class='bi bi-circle'></i><span style='color:red;'>Add  Designation</span>
            </a>";
        }


        // if($count_hrinfo!=0)
        // {
        //   echo "<a href='update-hrinfo.php?uid=".$row_hrinfo['agencyid']."&record_version=".$row_hrinfo['record_version']."'><i class='bi bi-circle'></i>
        //   Update HR Information</a>";

        // }else{
        //    echo '<a href="add-hrinfo.php">
        //       <i class="bi bi-circle"></i><span style="color:red;">Add HR Information</span>
        //     </a>';
        // }

        // if($count_education!=0)
        // {
        //   echo "<a href='update-education.php?uid=".$row_education['agencyid']."&record_version=".$row_education['record_version']."'><i class='bi bi-circle'></i>
        //   Update Education</a>";

        // }else{
        //    echo '<a href="add-education.php">
        //       <i class="bi bi-circle"></i><span style="color:red;">Add Education</span>
        //     </a>';
        // }

        // if($count_education!=0)
        // {
        //   echo "<a href='emp-education-history.php?uid=".$row_education['agencyid']."'><i class='bi bi-circle'></i>
        //   Update Education</a>";

        // }else{
          
          echo '<a href="emp-education-history.php?uid='.$agencyid.'">
              <i class="bi bi-circle"></i><span>View Education History</span>
            </a>';
        // }

        if($count_eligibility!=0)
        {
        echo '<a href="emp-eligibility-list.php?uid='.$agencyid.'">
              <i class="bi bi-circle"></i><span>Update Eligibility</span>
            </a>';
        }
        else{
          echo '<a href="emp-eligibility-list.php?uid='.$agencyid.'">
              <i class="bi bi-circle"></i><span style="color:red;">Add Eligibility</span>
            </a>';
        }
        echo'

            <!--  <a href="add-hrc.php">
           //    <i class="bi bi-circle"></i><span>Update Employee HR Competency</span>
           //  </a>  --> 
        <!-- original content
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        -->

        </ul>
      </li>
      <li class="nav-item">
        
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Education</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Work Experience</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Trainings Attended</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Trainings Conducted</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Voluntary Work</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Scholarship</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Service Record</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Performance</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Office Ratings</span>
            </a>
          </li>

        </ul>

          <!-- original content

          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Education</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Eligibility</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Work Experience</span>
            </a>
          </li>
        </ul>
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          

          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>

          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
        -->
      </li>
      ';

$leave_check = "select * from emp_designation where agencyid='$agencyid' and void='1' and exit_date='To Present' and status='1' and doh12='1'";
$params = array();
$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);


$leave_result = sqlsrv_query($conn, $leave_check, $params, $options);
$leave_elig = sqlsrv_num_rows($leave_result);


// EMPLOYEE Leaves
if($leave_elig>0)
{
  echo'

<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <!-- <i class="bi bi-bar-chart"></i> -->
          <i class="bi bi-journal-text"></i>
          <span>Leave Menu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="">

          <li>
            <a href="emp-add-leave.php">
              <i class="bi bi-circle"></i><span>File Leave</span>
            </a>
            <li>
            <li>
            <a href="emp-leave-list.php">
              <i class="bi bi-circle"></i><span>View My Leaves</span>
            </a>
            <li>
        </ul>
      </li>';
}
 
     
     echo' 
     <!--- Trainings Attended -->

      <a class="nav-link collapsed" data-bs-target="#trainings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i>
          <span>Trainings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      
      <ul id="trainings-nav" class="nav-content collapse " data-bs-parent="">
            
            <li>
              <a href="emp-add-trainings.php>
                <i class="bi bi-circle"></i><span>Add Trainings</span>
              </a>
            <li>
            <li>
              <a href="emp-Training-history.php>
                <i class="bi bi-circle"></i><span>View Training History</span>
              </a>
            <li>


            </li>


      </ul>


      

     <!--- trainings end --->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>

      


      

    </ul>';
    }?>
   

  </aside><!-- End Sidebar-->

