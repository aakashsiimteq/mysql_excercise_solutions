<?php
  include 'core/init.php';

  if (isset($_POST['diamondId'])) {
    $output = [];
    $diamondId = $_POST['diamondId'];
    $diamondId = explode(",",$diamondId);
    $countId = count($diamondId);
    for ($i=0; $i < $countId; $i++) {
      $sql_get = mysqli_query($con,"SELECT `diamond_id`,`diamond_size`,`diamond_status` FROM `diamonds` WHERE `diamond_id` = '".$diamondId[$i]."'");
      while ($row_get = mysqli_fetch_assoc($sql_get)) {
        $output[] = $row_get;
      }
    }
    foreach ($output as $key) {
      echo "
      <tr class='text-center'>
        <td>".$key[diamond_id]."</td>
        <td>".$key[diamond_size]."</td>
        <td>".$key[diamond_status]."</td>
      </tr>
      ";
    }
  }

 ?>
