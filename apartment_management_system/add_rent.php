<?php

include 'include/connection.php';
include 'include/session.php';
$tenant = $_REQUEST['tenant_id'];
$select = mysqli_query(
    $connection,
    "SELECT * FROM add_tenant INNER JOIN add_units ON add_tenant.t_unit_no = add_units.unit_id INNER JOIN add_floor ON add_tenant.t_floor_no = add_floor.id where add_tenant.tid='$tenant' "
);
$row = mysqli_fetch_array($select);

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
    $issue_date = $_POST['issue_date'];
    $status = $_POST['status'];
    // Assuming the initial invoice number is 1
    $lastInvoiceNumberQuery = mysqli_query(
        $connection,
        'SELECT MAX(invoice_number) as max_invoice_number FROM add_rent'
    );
    $lastInvoiceNumberData = mysqli_fetch_assoc($lastInvoiceNumberQuery);
    $lastInvoiceNumber = $lastInvoiceNumberData['max_invoice_number'];

    // Increment the invoice number by 1
    if ($lastInvoiceNumber == '') {
        $invoiceNumber = 'INV-' . date('Ymd') . '-' . '000001';
    } else {
        $newInvoiceNumber = substr($lastInvoiceNumber, -6) + 1;

        // Generate the final invoice number
        $invoiceNumber =
            'INV-' .
            date('Ymd') .
            '-' .
            str_pad($newInvoiceNumber, 6, '0', STR_PAD_LEFT);
    }
    $result = mysqli_query(
        $connection,
        "INSERT INTO add_rent(floor_no,unit_no,rid,month_id,xyear,rent,water_bill,electric_bill,gas_bill,security_bill,utility_bill,other_bill,total_rent,issue_date,bill_status,invoice_number)VALUES
            ('$floor_no','$unit_no','$renter_name','$month','$year','$rent','$water_bill','$electiec_bill',
            '$gas_bill','$security_bill','$utility_bill','$other_bill','$total_bill','$issue_date','$status','$invoiceNumber')"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        $_SESSION['status'] = 'Data hase been Inserted successfuly';
        $_SESSION['status_code'] = 'success';
    } else {
        // echo '<script>alert("somethings went wrong")</script>';
        $_SESSION['status'] = 'Data is not Inserted';
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
                                    <h4>Add Rent</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="emp" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                               <input type="text" name="" value="<?php echo $row[
                                                   'floor_no'
                                               ]; ?>" class="form-control" disabled>
                                                 <input type="hidden" name="floor_no" value="<?php echo $row[
                                                     't_floor_no'
                                                 ]; ?>" class="form-control">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Unit No:</label>
                                                <input type="text" name="" value="<?php echo $row[
                                                    'unit_no'
                                                ]; ?>" class="form-control" disabled>
                                                 <input type="hidden" name="unit_no" value="<?php echo $row[
                                                     't_unit_no'
                                                 ]; ?>" class="form-control">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Rent Month:</label>
                                                <select name="month" class="form-control">
                                                    <option value="">--Select Rent Month--</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Rent Year:</label>
                                                <select name="year" class="form-control">
                                                    <option value="">--Select Rent Year--</option>
                                                    <?php
                                                    // Get the current year
                                                    $currentYear = date('Y');

                                                    // Generate options for the year dropdown
                                                    for (
                                                        $i = $currentYear;
                                                        $i >= $currentYear - 20;
                                                        $i--
                                                    ) {
                                                        echo '<option value="' .
                                                            $i .
                                                            '">' .
                                                            $i .
                                                            '</option>';
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
                                                <input type="text" name="" value="<?php echo $row[
                                                    't_name'
                                                ]; ?>" class="form-control" disabled>
                                                 <input type="hidden" name="renter_name" value="<?php echo $row[
                                                     'tid'
                                                 ]; ?>" class="form-control">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rent:</label>
                                                <input type="number" name="rent" id="rent" class="form-control" value="<?php echo $row[
                                                    't_rent_pm'
                                                ]; ?>" onchange="calculateTotalRent()">
                                            </div>
                                            </div>                                          
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Water Bill</label>
                                                <input type="number" name="water_bill" id="water_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Electic Bill</label>
                                                <input type="number" name="electiec_bill" id="electiec_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gas Bill</label>
                                                <input type="number" name="gas_bill" id="gas_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Security Bill</label>
                                                <input type="number" name="security_bill" id="security_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                           
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Utility Bill</label>
                                                <input type="number" name="utility_bill" id="utility_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other Bill</label>
                                                <input type="number" name="other_bill" id="other_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            </div>                                  
                                         <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Rent</label>
                                                <input type="number" name="total_bill" id="total_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" name="issue_date"  class="form-control">
                                            </div>
                                            </div>
                                            </div>
                                         <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                <option value="0">Active</option>
                                                <option value="1">In-Active</option>
                                                </select>
                                            </div>
                                            </div>
                                         </div>
                                            
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




   
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="js/cdn3.6.3.js"></script>
     <script src="js/validation_plugins.js"></script>
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
</body>
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

</html>