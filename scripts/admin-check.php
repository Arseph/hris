<?PHP
  if($_SESSION['userlevel']>2)
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
?>