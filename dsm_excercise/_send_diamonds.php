<?php

  include 'core/init.php';

  $diamondId = $_POST['diamondId'];
  $diamondId = explode(",",$diamondId);
  $countId = count($diamondId);
  for ($i=0; $i < $countId; $i++) {
    $sql_update = mysqli_query($con,"UPDATE diamonds SET `diamond_status` = 'In Transfer Process' WHERE `diamond_id` = '".$diamondId[$i]."'");
  }

  if ($sql_update) {
    echo "1";
  }else {
    echo "2";
  }

 ?>
