<?php

//check if account has logged in, if not.. redirect to login page


if (!isset($_SESSION['firstname']))
{
    header('location:pages-login.php');
}

?>