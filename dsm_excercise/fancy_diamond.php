<?php include 'core/init.php'; ?>
<?php
  $sql_shape = mysqli_query($con,"SELECT distinct(`attribute_label`),`attribute_id` FROM `attributes` WHERE `attribute_type` = 'Shape'");

  $sql_table = mysqli_query($con,"SELECT DISTINCT (`diamond_status`), COUNT(*) AS statusCount,CEIL(SUM(`diamond_size`)) AS sumCarat FROM `diamonds` WHERE    `diamond_type` = 'Certified' AND `diamond_lot_no` LIKE 'C%'  AND `diamond_status` NOT IN ('Invoiced' , 'Deleted') GROUP BY (`diamond_status`)");

  $sql_ofice = mysqli_query($con,"SELECT DISTINCT(`office_name`),`office_id` FROM offices WHERE `office_name` NOT IN ('All','".$_SESSION['officename']."')");

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DSM Diamonds | Certified</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <header  style="padding-bottom:20px;">
      <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
        <a class="navbar-brand" href="#">DSM system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-right">
            <li class="nav-item active">
              <a class="nav-link" href="dsm_excercise.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Black Diamond</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Fancy Diamond</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Matching Pair</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row" style="padding-bottom:20px;">
        <div class="form-group col-md-6">
          <label for="search_table" class="control-label">Search Inventory</label>
          <input type="text" name="search_table" id="search_table" placeholder="Search Inventory" class="form-control" />
          <br>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" disabled type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="javascript:void(0)" onclick="submit()">Free items from Intransit</a>
              <a class="dropdown-item" href="javascript:void(0)" onclick="transfer()" data-toggle="modal" data-target="#transferModal">Transfer</a>
              <a class="dropdown-item" href="javascript:void(0)" onclick="release()" data-toggle="modal" data-target="#transferModal">Release Reserve</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Certified</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <table class="table table-bordered table-sm">
                <thead>
                  <th>Status</th>
                  <th>Count</th>
                  <th>Carat</th>
                </thead>
                <tbody>
                  <?php while($row_table = mysqli_fetch_assoc($sql_table)): ?>
                    <?php if ($row_table['diamond_status'] == 'InTranist'): ?>
                      <tr class='table-warning'>
                        <td><button class="btn btn-link status" value="<?= $row_table['diamond_status'] ?>" ><?= $row_table['diamond_status'] ?></button></td>
                        <td><?= $row_table['statusCount'] ?></td>
                        <td><?= $row_table['sumCarat'] ?></td>
                      </tr>
                    <?php elseif($row_table['diamond_status'] == 'On Consignment'): ?>
                      <tr class='table-danger'>
                        <td><button class="btn btn-link status" value="<?= $row_table['diamond_status'] ?>" ><?= $row_table['diamond_status'] ?></button></td>
                        <td><?= $row_table['statusCount'] ?></td>
                        <td><?= $row_table['sumCarat'] ?></td>
                      </tr>
                    <?php elseif($row_table['diamond_status'] == 'Reserve'): ?>
                      <tr class='table-info'>
                        <td><button class="btn btn-link status" value="<?= $row_table['diamond_status'] ?>" ><?= $row_table['diamond_status'] ?></button></td>
                        <td><?= $row_table['statusCount'] ?></td>
                        <td><?= $row_table['sumCarat'] ?></td>
                      </tr>
                    <?php elseif($row_table['diamond_status'] == 'In Transfer Process'): ?>
                      <tr class='table-success'>
                        <td><button class="btn btn-link status" value="<?= $row_table['diamond_status'] ?>" ><?= $row_table['diamond_status'] ?></button></td>
                        <td><?= $row_table['statusCount'] ?></td>
                        <td><?= $row_table['sumCarat'] ?></td>
                      </tr>
                    <?php else: ?>
                      <tr>
                        <td><button class="btn btn-link status" value="<?= $row_table['diamond_status'] ?>" ><?= $row_table['diamond_status'] ?></button></td>
                        <td><?= $row_table['statusCount'] ?></td>
                        <td><?= $row_table['sumCarat'] ?></td>
                      </tr>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Desc / Type</th>
                    <th>Certified</th>
                    <th>Temp.Cert.</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php while($row_shape = mysqli_fetch_assoc($sql_shape)): ?>
          <?php
            $sql_count = mysqli_query($con, "SELECT COUNT(*) from `diamonds` WHERE `diamond_shape_id` = '".$row_shape['attribute_id']."' AND  `diamond_type` = 'Fancy' AND `diamond_lot_no` LIKE 'F%' AND `diamond_status` NOT IN ('Invoiced','Deleted')");
            $row_count = mysqli_fetch_array($sql_count);
           ?>
           <?php if ($row_count[0] > 0): ?>
             <button type="button" value="<?= $row_shape['attribute_id'] ?>" name="button" id="product<?= $row_shape['attribute_id'] ?>" class="btn btn-sm btn-outline-primary product" style="margin-left:15px; margin-bottom:15px;">
               <?= $row_shape['attribute_label']." (".$row_count[0].")"?>
             </button>
           <?php endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-sm" id="searchtable">
            <thead class="thead-dark" style="font-size:12px;">
              <th><input type="checkbox" class="checkbox" id="checkAll"></th>
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
        </div>
      </div>
    </div>
    <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transfer Diamonds</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <select class="form-control" name="" id="officeId">
              <?php while($row_office = mysqli_fetch_assoc($sql_ofice)): ?>
                <option value="<?= $row_office['office_id'] ?>"><?= $row_office['office_name'] ?></option>
              <?php endwhile; ?>
            </select>
            <table class="table table-sm">
              <thead>
                <tr class="text-center">
                  <th>Diamond Id</th>
                  <th>Diamond Carat</th>
                  <th>Diamond Status</th>
                </tr>
              </thead>
              <tbody id="transdisplay">

              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-primary" onclick="submitTransfer()">Transfer</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      $(window).load(function() {
        $("#product2").addClass("active");
        $.ajax({
          url: "_show_diamond_fd.php",
          context: document.body,
          success: function(html){
             $("#display").html(html);
          }
        });
      });
      $(document).ready(function() {
        $(".product").click(function()
          {
             var selectedid = this.id;
             $('.product.active').removeClass('active');
             $("#"+selectedid).addClass("active");
             var id=$(this).val();
             var dataString = 'shape='+ id;
             $.ajax
             ({
              type: "POST",
              url: "_show_diamond_fd.php",
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
    <script type="text/javascript">
      $('.status').click(function() {
        var id = $(this).val();
        $('#search_table').val(id);
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
    <script type="text/javascript">
      $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
        var isDisabled = $('#dropdownMenuButton').is(':disabled');
        if (isDisabled) {
          $('#dropdownMenuButton').prop('disabled', false)
        }else {
          $('#dropdownMenuButton').prop('disabled', true)
        }
      });
    </script>
    <script type="text/javascript">
      function transfer(){
        var values = [];
        $("input[type=checkbox]:checked").each(function(){
            values.push($(this).val());
        });
        var id = values.join();
        var dataString = 'diamondId=' + id;
        $.ajax
        ({
         type: "POST",
         url: "_transferdetail.php",
         data: dataString,
         cache: false,
         success: function(html)
         {
            $("#transdisplay").html(html);
         }
        });

      }
    </script>
    <script type="text/javascript">
      function submit() {
        var values = [];
        $("input[type=checkbox]:checked").each(function(){
            values.push($(this).val());
        });
        var id = values.join();
        var dataString = 'diamondId=' + id;
        $.ajax
        ({
         type: "POST",
         url: "_freeTransit.php",
         data: dataString,
         cache: false,
         success: function(val)
         {
            if (val == 1) {
              swal({
                title: "Good job!",
                text: "The selected diamonds are freed from intransit",
                icon: "success",
              }).then(function () {
                location.reload();
              });
            }else {
              swal({
                title: "Oh no!",
                text: "The selected diamonds couldnt be freed from intransit",
                icon: "error",
              }).then(function () {
                location.reload();
              });
            }
         }
        });
      }
    </script>
    <script type="text/javascript">
      function submitTransfer() {
        var values = [];
        $("input[type=checkbox]:checked").each(function(){
            values.push($(this).val());
        });
        var id = values.join();
        var officeId = $('#officeId').val();
        var dataString = 'diamondId=' + id + "&officeId=" + officeId;
        $.ajax
        ({
         type: "POST",
         url: "_send_diamonds.php",
         data: dataString,
         cache: false,
         success: function(val)
         {
            if (val == 1) {
              swal({
                title: "Good job!",
                text: "The selected diamonds are send for transfer",
                icon: "success",
              }).then(function () {
                location.reload();
              });
            }else {
              swal({
                title: "Oh no!",
                text: "The selected diamonds couldnt be sent for Transfer",
                icon: "error",
              }).then(function () {
                location.reload();
              });
            }
         }
        });
      }
    </script>
  </body>
</html>
