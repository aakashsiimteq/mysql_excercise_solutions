<?php include 'core/init.php'; ?>
<?php

  $sql_diamond = mysqli_query($con,"SELECT * FROM dsm_project.diamonds WHERE `diamond_shape_id` = '2' AND `diamond_size` >= 0.90 LIMIT 94");


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DSM Diamonds | Certified</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-bordered table-hover table-condensed">
      <thead class="thead-inverse" style="font-size:12px;">
        <th>LOT #</th>
        <th>LOC</th>
        <th>Shape</th>
        <th>Carat</th>
        <th>Lab</th>
        <th>Certificate</th>
        <th>CLR</th>
        <th>CLA</th>
        <th>FLR</th>
        <th>Fcut</th>
        <th>POL</th>
        <th>SYM</th>
        <th>INS</th>
        <th>AINS</th>
        <th width="20%">Mesurement (L x B x H)</th>
        <th>Orignal rapnet</th>
        <th>Orignal discount</th>
        <th>Orignal p/c price</th>
        <th>Orignal total</th>
        <th>Revaluated discount</th>
        <th>Revaluated p/c</th>
        <th>Revaluated total</th>
        <th>Final rapnet</th>
        <th>Final discount</th>
        <th>Final p/c price</th>
        <th>Final total</th>
        <th>Selling discount</th>
        <th>Selling p/c price</th>
        <th>Selling total</th>
        <th>Status</th>
        <th>Customer</th>
        <th>Front View</th>
        <th>Rapnet View</th>
        <th>Purchase Date</th>
        <th>Party</th>
        <th>Approval No</th>
        <th>Approval Date</th>
      </thead>
      <tbody >
        <?php while($row_diamond = mysqli_fetch_assoc($sql_diamond)): ?>
          <?php

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
           ?>
          <tr style="font-size:12px;">
            <td><?= $row_diamond['diamond_lot_no'] ?></td>
            <td><?= $row_office['office_name'] ?></td>
            <td><?= $row_shape['attribute_name'] ?></td>
            <td><?= $row_diamond['diamond_size'] ?></td>
            <td><?= $row_lab['attribute_name'] ?></td>
            <td><?= $row_diamond['diamond_cert'] ?></td>
            <td><?= $row_clr['attribute_name'] ?></td>
            <td><?= $row_cla['attribute_name'] ?></td>
            <td><?= $row_flr['attribute_name'] ?></td>
            <td><?= $row_fcut['attribute_name'] ?></td>
            <td><?= $row_pol['attribute_name'] ?></td>
            <td><?= $row_sym['attribute_name'] ?></td>
            <td></td>
            <td><?= $row_diamond['diamond_ains'] ?></td>
            <td><?= $row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3'] ?></td>
            <td><?= '$'. $row_diamond['diamond_price_rapnet'] ?></td>
            <td><?= $row_diamond['diamond_discount']. '%' ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_perct'],2)?></td>
            <td><?= '$'. round($row_diamond['diamond_price_total'],2)?></td>
            <td><?= $row_diamond['diamond_discount_revaluated'] . '%' ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_perct_revaluated'],2) ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_total_revaluated'],2) ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_rapnet_final'],2) ?></td>
            <td><?= $row_diamond['diamond_discount_final']. '%'  ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_perct_final'],2) ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_total_final'],2) ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_sell'],2) ?></td>
            <td><?= $row_diamond['diamond_discount_sell']. '%'  ?></td>
            <td><?= '$'. round($row_diamond['diamond_price_perct_sell'],2) ?></td>
            <td><?= $row_diamond['diamond_status'] ?></td>
            <td><?= $row_customer['company_name'] ?></td>
            <td><?= $row_diamond['diamond_status_front'] ?></td>
            <?php if ($row_diamond['diamond_show_rapnet'] == 'Yes'): ?>
              <td>Show</td>
            <?php else: ?>
              <td>Hide</td>
            <?php endif; ?>
            <td><?= date('d/m/Y',strtotime($row_diamond['diamond_purchase_date'])) ?></td>
            <?php if ($row_diamond['diamond_party_name'] == ''): ?>
              <td>Not available</td>
            <?php else: ?>
              <td><?= $row_diamond['diamond_party_name'] ?></td>
            <?php endif; ?>
            <td><?= $row_diamond['diamond_approval_no'] ?></td>
            <td></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
