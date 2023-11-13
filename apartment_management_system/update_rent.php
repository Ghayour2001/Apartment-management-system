<?php

include 'include/connection.php';
include 'include/session.php';
$rent_id = $_REQUEST['rent_id'];
$query = mysqli_query(
    $connection,
    "SELECT * FROM add_rent where rent_id = '$rent_id'"
);
$rows = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $renter_name = $_POST['renter_name'];
    $rent = $_POST['rent'];
    $water_bill = $_POST['water_bill'];
    $electiec_bill = $_POST['electiec_bill'];
    $gas_bill = $_POST['gas_bill'];
    $security_bill = $_POST['security_bill'];
    $utility_bill = $_POST['utility_bill'];
    $other_bill = $_POST['other_bill'];
    $total_bill = $_POST['total_bill'];
    if ($rows['paid_rent'] == '' || $rows['remaining_rent'] == '') {
        $paid_rent = '';
        $remaining_rent = '';
    } else {
        $paid_rent = $_POST['paid_rent'];
        $remaining_rent = $_POST['remaining_rent'];
    }
    $issue_date = $_POST['issue_date'];
    $status = $_POST['status'];
    $result = mysqli_query(
        $connection,
        "UPDATE add_rent SET floor_no='$floor_no',unit_no='$unit_no',rid='$renter_name',month_id='$month',xyear='$year',rent='$rent'
        ,water_bill='$water_bill',electric_bill='$electiec_bill',gas_bill='$gas_bill',security_bill='$security_bill'
        ,utility_bill='$utility_bill',other_bill='$other_bill',total_rent='$total_bill',paid_rent='$paid_rent',remaining_rent='$remaining_rent',issue_date='$issue_date',bill_status='$status' where rent_id = '$rent_id'"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        // $_SESSION['status'] = 'Data hase been Update successfuly';
        // $_SESSION['status_code'] = 'success';
        header('location:rent_list.php');
    } else {
        // echo '<script>alert("somethings went wrong")</script>';
        $_SESSION['status'] = 'Data is not Update';
        $_SESSION['status_code'] = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Rent Information </title>

      <!-- ================= Favicon ================== -->
      <?php include 'include/headlinks.php'; ?>
      <style>
    .error{
        color: red !important;
    }
</style>
</head>

<body>

<?php include 'include/sidebar.php'; ?>
        <!-- /# sidebar -->
 <?php include 'include/header.php'; ?>

   




    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><?php echo $_SESSION[
                                    'designation'
                                ]; ?>, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Update Rent</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="emp" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                                <select name="floor_no" id="floor" class="form-control">
                                                <?php
                                                $floor_id = $rows['floor_no'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_floor where id = '$floor_id' "
                                                );
                                                $row1 = mysqli_fetch_array(
                                                    $select
                                                );
                                                ?>
                                                                <option value="<?php echo $row1[
                                                                    'id'
                                                                ]; ?>"><?php echo $row1[
    'floor_no'
]; ?></option>
                                                                                                            
                                                    
                                                    <?php
                                                    $select = mysqli_query(
                                                        $connection,
                                                        'SELECT * FROM add_floor'
                                                    );
                                                    $count = mysqli_num_rows(
                                                        $select
                                                    );
                                                    if ($count > 0) {
                                                        while (
                                                            $row = mysqli_fetch_array(
                                                                $select
                                                            )
                                                        ) {

                                                            $id = $row['id'];
                                                            $floor_no =
                                                                $row[
                                                                    'floor_no'
                                                                ];
                                                            ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $floor_no; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                         ?>
                                                            <option value="0">Floor is not found</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Unit No:</label>
                                                <select name="unit_no" id="unit" class="form-control">
                                                <?php
                                                $t_unit_no = $rows['unit_no'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_units where unit_id = '$t_unit_no' "
                                                );
                                                $row3 = mysqli_fetch_array(
                                                    $select
                                                );
                                                ?>
                                                    <option value="<?php echo $row3[
                                                        'unit_id'
                                                    ]; ?>"><?php echo $row3[
    'unit_no'
]; ?></option>
                                                </select>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Rent Month:</label>
                                                <select name="month" class="form-control">
                                                <?php
                                                $month_id = $rows['month_id'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_month where m_id='$month_id'"
                                                );
                                                $count = mysqli_num_rows(
                                                    $select
                                                );
                                                if ($count > 0) {
                                                    while (
                                                        $row = mysqli_fetch_array(
                                                            $select
                                                        )
                                                    ) {

                                                        $month_name =
                                                            $row['month_name'];
                                                        $m_id = $row['m_id'];
                                                        ?>
                                                            <option value="<?php echo $m_id; ?>"><?php echo $month_name; ?></option>
                                                            <?php
                                                    }
                                                }
                                                ?>


                                                    <?php
                                                    $select = mysqli_query(
                                                        $connection,
                                                        'SELECT * FROM add_month'
                                                    );
                                                    $count = mysqli_num_rows(
                                                        $select
                                                    );
                                                    if ($count > 0) {
                                                        while (
                                                            $row = mysqli_fetch_array(
                                                                $select
                                                            )
                                                        ) {

                                                            $month_name =
                                                                $row[
                                                                    'month_name'
                                                                ];
                                                            $m_id =
                                                                $row['m_id'];
                                                            ?>
                                                            <option value="<?php echo $m_id; ?>"><?php echo $month_name; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                         ?>
                                                            <option value="0">Month is not found</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Rent Year:</label>
                                                <select name="year" class="form-control">
                                                <?php
                                                $xyear = $rows['xyear'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_year where y_id='$xyear'"
                                                );
                                                $count = mysqli_num_rows(
                                                    $select
                                                );
                                                if ($count > 0) {
                                                    while (
                                                        $row = mysqli_fetch_array(
                                                            $select
                                                        )
                                                    ) {

                                                        $xyear = $row['xyear'];
                                                        $y_id = $row['y_id'];
                                                        ?>
                                                            <option value="<?php echo $y_id; ?>"><?php echo $xyear; ?></option>
                                                            <?php
                                                    }
                                                } else {
                                                     ?>
                                                            <option value="0">Year is not found</option>
                                                        <?php
                                                }
                                                ?>

                                                    <?php
                                                    $select = mysqli_query(
                                                        $connection,
                                                        'SELECT * FROM add_year'
                                                    );
                                                    $count = mysqli_num_rows(
                                                        $select
                                                    );
                                                    if ($count > 0) {
                                                        while (
                                                            $row = mysqli_fetch_array(
                                                                $select
                                                            )
                                                        ) {

                                                            $xyear =
                                                                $row['xyear'];
                                                            $y_id =
                                                                $row['y_id'];
                                                            ?>
                                                            <option value="<?php echo $y_id; ?>"><?php echo $xyear; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                         ?>
                                                            <option value="0">Year is not found</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Renter Name:</label>
                                                <?php
                                                $tenant_id = $rows['rid'];
                                                $result5 = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_tenant where tid='$tenant_id'"
                                                );
                                                $row4 = mysqli_fetch_array(
                                                    $result5
                                                );
                                                ?>
                                               <input type="text" name=""  id="renter_name" class="form-control"  value="<?php echo $row4[
                                                   't_name'
                                               ]; ?>"> 
                                               <input type="hidden" name="renter_name"  id="renter_id" class="form-control"  value="<?php echo $rows[
                                                   'rid'
                                               ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rent:</label>
                                                <input name="rent" id="rent" id="rent" class="form-control"  value="<?php echo $rows[
                                                    'rent'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>                                          
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Water Bill</label>
                                                <input type="text" name="water_bill" id="water_bill" class="form-control"  value="<?php echo $rows[
                                                    'water_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Electic Bill</label>
                                                <input type="text" name="electiec_bill" id="electiec_bill" class="form-control"  value="<?php echo $rows[
                                                    'electric_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gas Bill</label>
                                                <input type="text" name="gas_bill" id="gas_bill" class="form-control"  value="<?php echo $rows[
                                                    'gas_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Security Bill</label>
                                                <input type="text" name="security_bill" id="security_bill" class="form-control"  value="<?php echo $rows[
                                                    'security_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                           
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Utility Bill</label>
                                                <input type="text" name="utility_bill" id="utility_bill" class="form-control"  value="<?php echo $rows[
                                                    'utility_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other Bill</label>
                                                <input type="text" name="other_bill" id="other_bill" class="form-control"  value="<?php echo $rows[
                                                    'other_bill'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            </div>                                  
                                         <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Bill</label>
                                                <input type="text" name="total_bill" id="total_bill" class="form-control"  value="<?php echo $rows[
                                                    'total_rent'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="text" name="issue_date"  class="form-control"  value="<?php echo $rows[
                                                    'issue_date'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            </div>
                                            <?php if (
                                                $rows['paid_rent'] == ''
                                            ) { ?>

                                            <?php } else { ?>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Payment Date</label>
                                                    <input type="date" name="payment_date" class="form-control" value="<?php echo $rows[
                                                        'payment_date'
                                                    ]; ?>">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Paid Rent</label>
                                                        <input type="text" name="paid_rent" id="paid_rent" class="form-control" value="<?php echo $rows[
                                                            'paid_rent'
                                                        ]; ?>" onchange="calculateRemainingRent()">
                                                        <input type="hidden" name="" id="subtracted_rent" value="<?php echo $rows[
                                                            'paid_rent'
                                                        ]; ?>" onchange="calculateRemainingRent()">
                                                    </div>
                                                </div> 
                                            </div>
                                            <?php } ?>
                                  <?php if ($rows['remaining_rent'] == '') { ?>
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control" >
                                                <?php if (
                                                    $rows['bill_status'] == 0
                                                ) { ?>
                                                <option value="0">Active</option>
                                                    <?php } else { ?>
                                                 <option value="1">In-Active</option>
                                                    <?php } ?>
                                                 <option value="0">Active</option>
                                                <option value="1">In-Active</option>
                                                </select>
                                            </div>
                                            </div>
                                         </div>
                                 <?php } else { ?>
                                    <div class="row">
                                         <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Remaining Rent</label>
                                                    <input type="text" name="remaining_rent" id="remaining_rent" class="form-control" value="<?php echo $rows[
                                                        'remaining_rent'
                                                    ]; ?>" onchange="calculateRemainingRent()">
                                                    <input type="hidden" name="" id="sub_remaining" value="<?php echo $rows[
                                                        'remaining_rent'
                                                    ]; ?>" onchange="calculateRemainingRent()">
                                                </div>
                                            </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control" >
                                                <?php if (
                                                    $rows['bill_status'] == 0
                                                ) { ?>
                                                <option value="0">Active</option>
                                                    <?php } else { ?>
                                                 <option value="1">In-Active</option>
                                                    <?php } ?>
                                                 <option value="0">Active</option>
                                                <option value="1">In-Active</option>
                                                </select>
                                            </div>
                                            </div>
                                         </div>
                                 <?php } ?>
                                            
                                         </div>
                                         <div class="row">
                                      <div class="col-md-12">
                                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                       </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p> <a href="#"></a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>




   
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $("#floor").on("change", function() {
    var floor_no = $(this).val();
    if (floor_no != "") {
      $.ajax({
        url: "get_units.php",
        type: "POST",
        data: { floor_no: floor_no },
        success: function(data) {
          $("#unit").html(data);
          $("#unit").trigger("change"); // Trigger change event manually
        }
      });
    } else {
      $("#unit").html("<option value=''>Select a unit</option>");
      $("#renter_name").val("").prop("disabled", true);
    }
  });

  $("#unit").on("change", function() {
    var unit_id = $(this).val();
    if (unit_id != "") {
      $.ajax({
        url: "get_renter.php",
        type: "POST",
        data: { unit_id: unit_id },
        dataType: "JSON",
        success: function(data) {
          $("#renter_name").val(data.t_name).prop("disabled", true);
          $("#renter_id").val(data.tid).prop("disabled", false);
        }
      });
    } else {
      $("#renter_name").val("").prop("disabled", true);
    }
  });

  $("#unit").on("change", function() {
    var unit = $(this).val();
    if (unit != "") {
      $.ajax({
        url: "get_renter.php",
        type: "POST",
        data: { unit: unit },
        success: function(data) {
          $("#rent").val(data);
        }
      });
    } else {
      $("#rent").val("");
    }
  });

});
</script>
<script src="js/emp_validation.js"></script>
<?php include 'include/footerlinks.php'; ?>
<script type="text/javascript">
function calculateTotalRent() {
  // Get the values of each bill input field
  const rent = parseFloat(document.getElementById('rent').value) || 0;
  const water_bill = parseFloat(document.getElementById('water_bill').value) || 0;
  const electiec_bill = parseFloat(document.getElementById('electiec_bill').value) || 0;
  const gas_bill = parseFloat(document.getElementById('gas_bill').value) || 0;
  const security_bill = parseFloat(document.getElementById('security_bill').value) || 0;
  const utility_bill = parseFloat(document.getElementById('utility_bill').value) || 0;
  const other_bill = parseFloat(document.getElementById('other_bill').value) || 0;

  // Add up the bill values to get the total rent
  const totalRent = rent + water_bill + electiec_bill + gas_bill + security_bill + utility_bill + other_bill;
  // Update the total rent field with the result
  document.getElementById('total_bill').value = totalRent;
}



</script>
</body>
<script type="text/javascript">
    //for remaining rent
    function calculateRemainingRent() {
  // Get the values of each bill input field
  const sub_remaining = parseFloat(document.getElementById('sub_remaining').value) || 0;
  const remaining_rent = parseFloat(document.getElementById('remaining_rent').value) || 0;
  const paid_rent = parseFloat(document.getElementById('paid_rent').value) || 0;
  const subtracted_rent = parseFloat(document.getElementById('subtracted_rent').value) || 0;

  const sub_rent = sub_remaining-remaining_rent;
  const sub_remaining_rent = paid_rent + sub_rent;

  const rent = subtracted_rent-paid_rent;
  const s_r_rent = remaining_rent + rent;
 document.getElementById('paid_rent').value = sub_remaining_rent;
 document.getElementById('remaining_rent').value = s_r_rent;
    }
</script>

</html>