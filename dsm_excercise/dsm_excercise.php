<?php include 'core/init.php'; ?>
<?php
  $sql_shape = mysqli_query($con,"SELECT distinct(`attribute_name`),`attribute_id` FROM `attributes` WHERE `attribute_type` = 'Shape'");
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
    <div class="container">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="">Select diamond shape</label>
          <select class="form-control" name="" id="product">
            <option disabled>Choose shape</option>
            <?php while($row_shape = mysqli_fetch_assoc($sql_shape)): ?>
              <option value="<?= $row_shape['attribute_id'] ?>"><?= $row_shape['attribute_name'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="search_table" class="control-label">Search Inventory</label>
          <input type="text" name="search_table" id="search_table" placeholder="Search Inventory" class="form-control" />
        </div>
      </div>
    </div>
    <table class="table table-bordered table-hover table-condensed" id="searchtable">
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
      <tbody id="display">

      </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(window).load(function() {
        $.ajax({
          url: "_show_diamond.php",
          context: document.body,
          success: function(html){
             $("#product option[value=2]").prop("selected", true);
             $("#display").html(html);
          }
        });
      });
      $(document).ready(function() {
        $("#product").change(function()
          {
             var id=$(this).val();
             var dataString = 'shape='+ id;
             $.ajax
             ({
              type: "POST",
              url: "_show_diamond.php",
              data: dataString,
              cache: false,
              success: function(html)
              {
                 $("#display").html(html);
              }
             });
        });

      });
    </script>
    <script type="text/javascript">
      $("#search_table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#searchtable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
            else
            $(this).show();
        });
      });
    </script>
  </body>
</html>
