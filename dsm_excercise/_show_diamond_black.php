<?php

  include 'core/init.php';

  $diamond_shape = $_POST['shape'];

  if (!isset($diamond_shape)) {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '2' AND  diamond_type ='Black' AND `diamond_lot_no` LIKE 'B%' AND `diamond_status` NOT IN ('Invoiced','Deleted') ORDER BY `diamond_id` DESC");
  } else {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '$diamond_shape' AND  diamond_type ='Black' AND `diamond_lot_no` LIKE 'B%' AND `diamond_status` NOT IN ('Invoiced','Deleted') ORDER BY `diamond_id` DESC");
  }
  while($row_diamond = mysqli_fetch_assoc($sql_diamond)){

      $sql_office = mysqli_query($con,"SELECT `office_name` FROM `offices` WHERE `office_id` = '".$row_diamond['office_id']."'");
      $row_office = mysqli_fetch_assoc($sql_office);

      $sql_shape = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_shape_id']."'");
      $row_shape = mysqli_fetch_assoc($sql_shape);

    if ($row_diamond['diamond_status'] == 'InTranist') {
      echo "
      <tr style='font-size:12px;' class='table-warning'>
        <td><input type='checkbox' class='checkbox freetrans' name='diaid[]' value=".$row_diamond['diamond_id']."></td>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
      </tr>";
    }elseif ($row_diamond['diamond_status'] == 'On Consignment') {
      echo "
      <tr style='font-size:12px;' class='table-danger'>
        <td></td>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
      </tr>";
    }elseif ($row_diamond['diamond_status'] == 'Reserve') {
      echo "
      <tr style='font-size:12px;' class='table-primary'>
        <td><input type='checkbox' class='checkbox freetrans' name='diaid[]' value=".$row_diamond['diamond_id']."></td>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
      </tr>";
    }elseif ($row_diamond['diamond_status'] == 'In Transfer Process') {
      echo "
      <tr style='font-size:12px;' class='table-success'>
        <td></td>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
      </tr>";
    }else {
      echo "
      <tr style='font-size:12px;'>
        <td><input type='checkbox' class='checkbox freetrans' name='diaid[]' value=".$row_diamond['diamond_id']."></td>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
      </tr>";
    }

  }
?>
<script type="text/javascript">
  $(".freetrans").click(function(){
    var numberOfChecked = $('input:checkbox:checked').length;
    if (numberOfChecked > 0) {
      $('#dropdownMenuButton').prop('disabled', false)
    }else {
      $('#dropdownMenuButton').prop('disabled', true)
    }
    // var isDisabled = $('#dropdownMenuButton').is(':disabled');
    // if (isDisabled) {
    //   $('#dropdownMenuButton').prop('disabled', false)
    // }else {
    //   $('#dropdownMenuButton').prop('disabled', true)
    // }
  });
</script>
