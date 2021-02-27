<?php

session_start();
unset($_SESSION["UserId"]);
unset($_SESSION["loggedin"] );
header('location:home.php');

?>