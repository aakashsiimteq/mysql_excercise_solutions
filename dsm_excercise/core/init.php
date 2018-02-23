<?php
  error_reporting(0);
  session_start();
  $office_name = 'Sydney';
  $_SESSION['officename'] = $office_name;
  //$con = mysqli_connect('localhost:3306','root','R@hul.21896#','dsm_project');
  $con = mysqli_connect('localhost:3306','root','wolf','dsm_system');

  if (!$con) {
    die('Failed to connect to database');
  }

 ?>
