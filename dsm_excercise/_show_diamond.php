<?php

  include 'core/init.php';

  $diamond_shape = $_POST['shape'];

  if (!isset($diamond_shape)) {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '2' AND  `diamond_type` = 'Certified' AND `diamond_lot_no` LIKE 'C%' AND `diamond_status` NOT IN ('Invoiced','Deleted') ORDER BY `diamond_id` DESC");
  } else {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '$diamond_shape' AND  `diamond_type` = 'Certified' AND `diamond_lot_no` LIKE 'C%' AND `diamond_status` NOT IN ('Invoiced','Deleted') ORDER BY `diamond_id` DESC");
  }
  while($row_diamond = mysqli_fetch_assoc($sql_diamond)){

      $sql_office = mysqli_query($con,"SELECT `office_name` FROM dsm_project.`offices` WHERE `office_id` = '".$row_diamond['office_id']."'");
      $row_office = mysqli_fetch_assoc($sql_office);

      $sql_shape = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_shape_id']."'");
      $row_shape = mysqli_fetch_assoc($sql_shape);

      $sql_customer = mysqli_query($con,"SELECT `company_name` FROM `users` WHERE `user_id` = '".$row_diamond['diamond_customer_id']."'");
      $row_customer = mysqli_fetch_assoc($sql_customer);

      $sql_lab = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_lab_id']."'");
      $row_lab = mysqli_fetch_assoc($sql_lab);

      $sql_clr = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_clr_id']."'");
      $row_clr = mysqli_fetch_assoc($sql_clr);

      $sql_cla = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_cla_id']."'");
      $row_cla = mysqli_fetch_assoc($sql_cla);

      $sql_flr = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_flr_id']."'");
      $row_flr = mysqli_fetch_assoc($sql_flr);

      $sql_fcut = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_fcut_id']."'");
      $row_fcut = mysqli_fetch_assoc($sql_fcut);

      $sql_pol = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_pol_id']."'");
      $row_pol = mysqli_fetch_assoc($sql_pol);

      $sql_sym = mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_sym_id']."'");
      $row_sym = mysqli_fetch_assoc($sql_sym);

    if ($row_diamond['diamond_status'] == 'InTranist') {
      echo "
      <tr style='font-size:12px;' class='table-warning'>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_lab['attribute_name']."</td>
        <td>".$row_diamond['diamond_cert']."</td>
        <td>".$row_clr['attribute_name']."</td>
        <td>".$row_cla['attribute_name']."</td>
        <td>".$row_flr['attribute_name']."</td>
        <td>".$row_fcut['attribute_name']."</td>
        <td>".$row_pol['attribute_name']."</td>
        <td>".$row_sym['attribute_name']."</td>
        <td></td>
        <td>".$row_diamond['diamond_ains']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. $row_diamond['diamond_price_rapnet'] ."</td>
        <td>".$row_diamond['diamond_discount']. '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".$row_diamond['diamond_discount_revaluated'] . '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_rapnet_final'],2) ."</td>
        <td>".$row_diamond['diamond_discount_final']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_discount_sell']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
        ";
        if ($row_diamond['diamond_show_rapnet'] == 'Yes'){
          echo "<td>Show</td>";
        }
        else{
          echo "<td>Hide</td>";
        }
        echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
        if ($row_diamond['diamond_party_name'] == ''){
          echo "<td>Not available</td>";
        }else{
          echo "<td>".$row_diamond['diamond_party_name']."</td>";
        }
        echo" <td>".$row_diamond['diamond_approval_no']."</td>
        <td></td>
      </tr>";
    }elseif ($row_diamond['diamond_status'] == 'On Consignment') {
      echo "
      <tr style='font-size:12px;' class='table-danger'>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_lab['attribute_name']."</td>
        <td>".$row_diamond['diamond_cert']."</td>
        <td>".$row_clr['attribute_name']."</td>
        <td>".$row_cla['attribute_name']."</td>
        <td>".$row_flr['attribute_name']."</td>
        <td>".$row_fcut['attribute_name']."</td>
        <td>".$row_pol['attribute_name']."</td>
        <td>".$row_sym['attribute_name']."</td>
        <td></td>
        <td>".$row_diamond['diamond_ains']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. $row_diamond['diamond_price_rapnet'] ."</td>
        <td>".$row_diamond['diamond_discount']. '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".$row_diamond['diamond_discount_revaluated'] . '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_rapnet_final'],2) ."</td>
        <td>".$row_diamond['diamond_discount_final']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_discount_sell']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
        ";
        if ($row_diamond['diamond_show_rapnet'] == 'Yes'){
          echo "<td>Show</td>";
        }
        else{
          echo "<td>Hide</td>";
        }
        echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
        if ($row_diamond['diamond_party_name'] == ''){
          echo "<td>Not available</td>";
        }else{
          echo "<td>".$row_diamond['diamond_party_name']."</td>";
        }
        echo" <td>".$row_diamond['diamond_approval_no']."</td>
        <td></td>
      </tr>";



    }elseif ($row_diamond['diamond_status'] == 'Reserve') {
      echo "
      <tr style='font-size:12px;' class='table-primary'>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_lab['attribute_name']."</td>
        <td>".$row_diamond['diamond_cert']."</td>
        <td>".$row_clr['attribute_name']."</td>
        <td>".$row_cla['attribute_name']."</td>
        <td>".$row_flr['attribute_name']."</td>
        <td>".$row_fcut['attribute_name']."</td>
        <td>".$row_pol['attribute_name']."</td>
        <td>".$row_sym['attribute_name']."</td>
        <td></td>
        <td>".$row_diamond['diamond_ains']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. $row_diamond['diamond_price_rapnet'] ."</td>
        <td>".$row_diamond['diamond_discount']. '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".$row_diamond['diamond_discount_revaluated'] . '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_rapnet_final'],2) ."</td>
        <td>".$row_diamond['diamond_discount_final']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_discount_sell']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
        ";
        if ($row_diamond['diamond_show_rapnet'] == 'Yes'){
          echo "<td>Show</td>";
        }
        else{
          echo "<td>Hide</td>";
        }
        echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
        if ($row_diamond['diamond_party_name'] == ''){
          echo "<td>Not available</td>";
        }else{
          echo "<td>".$row_diamond['diamond_party_name']."</td>";
        }
        echo" <td>".$row_diamond['diamond_approval_no']."</td>
        <td></td>
      </tr>";
    }elseif ($row_diamond['diamond_status'] == 'In Transfer Process') {
      echo "
      <tr style='font-size:12px;' class='table-success'>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_lab['attribute_name']."</td>
        <td>".$row_diamond['diamond_cert']."</td>
        <td>".$row_clr['attribute_name']."</td>
        <td>".$row_cla['attribute_name']."</td>
        <td>".$row_flr['attribute_name']."</td>
        <td>".$row_fcut['attribute_name']."</td>
        <td>".$row_pol['attribute_name']."</td>
        <td>".$row_sym['attribute_name']."</td>
        <td></td>
        <td>".$row_diamond['diamond_ains']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. $row_diamond['diamond_price_rapnet'] ."</td>
        <td>".$row_diamond['diamond_discount']. '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".$row_diamond['diamond_discount_revaluated'] . '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_rapnet_final'],2) ."</td>
        <td>".$row_diamond['diamond_discount_final']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_discount_sell']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
        ";
        if ($row_diamond['diamond_show_rapnet'] == 'Yes'){
          echo "<td>Show</td>";
        }
        else{
          echo "<td>Hide</td>";
        }
        echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
        if ($row_diamond['diamond_party_name'] == ''){
          echo "<td>Not available</td>";
        }else{
          echo "<td>".$row_diamond['diamond_party_name']."</td>";
        }
        echo" <td>".$row_diamond['diamond_approval_no']."</td>
        <td></td>
      </tr>";
    }else {
      echo "
      <tr style='font-size:12px;'>
        <td>".$row_diamond['diamond_lot_no']."</td>
        <td>".$row_office['office_name']."</td>
        <td>".$row_shape['attribute_name']."</td>
        <td>".$row_diamond['diamond_size']."</td>
        <td>".$row_lab['attribute_name']."</td>
        <td>".$row_diamond['diamond_cert']."</td>
        <td>".$row_clr['attribute_name']."</td>
        <td>".$row_cla['attribute_name']."</td>
        <td>".$row_flr['attribute_name']."</td>
        <td>".$row_fcut['attribute_name']."</td>
        <td>".$row_pol['attribute_name']."</td>
        <td>".$row_sym['attribute_name']."</td>
        <td></td>
        <td>".$row_diamond['diamond_ains']."</td>
        <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
        <td>".'$'. $row_diamond['diamond_price_rapnet'] ."</td>
        <td>".$row_diamond['diamond_discount']. '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
        <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
        <td>".$row_diamond['diamond_discount_revaluated'] . '%' ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_rapnet_final'],2) ."</td>
        <td>".$row_diamond['diamond_discount_final']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
        <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
        <td>".$row_diamond['diamond_discount_sell']. '%'  ."</td>
        <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
        <td>".$row_diamond['diamond_status'] ."</td>
        <td>".$row_customer['company_name'] ."</td>
        <td>".$row_diamond['diamond_status_front'] ."</td>
        ";
        if ($row_diamond['diamond_show_rapnet'] == 'Yes'){
          echo "<td>Show</td>";
        }
        else{
          echo "<td>Hide</td>";
        }
        echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
        if ($row_diamond['diamond_party_name'] == ''){
          echo "<td>Not available</td>";
        }else{
          echo "<td>".$row_diamond['diamond_party_name']."</td>";
        }
        echo" <td>".$row_diamond['diamond_approval_no']."</td>
        <td></td>
      </tr>";
    }

  }
