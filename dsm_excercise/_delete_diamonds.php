<?php

  include 'core/init.php';

  if (isset($_POST['diamondId'])) {
    $diamondId = $_POST['diamondId'];
    $diamondId = explode(",",$diamondId);
    $countId = count($diamondId);
    for ($i=0; $i < $countId; $i++) {
      $sql_update = mysqli_query($con,"DELETE FROM  diamonds WHERE `diamond_id` = '".$diamondId[$i]."'");
    }

    if ($sql_update) {
      echo "1";
    }else {
      echo "2";
    }
  }

 ?>
