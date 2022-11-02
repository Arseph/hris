<?php
include "connect.php";
session_start();
$agencyid= $_SESSION['user_id'];


include "audit_logout.php";



session_destroy();
header('location:../pages-login.php');

?>