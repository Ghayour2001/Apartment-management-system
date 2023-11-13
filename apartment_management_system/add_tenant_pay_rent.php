<?php

include 'include/connection.php';
include 'include/session.php';
$rent_id = $_REQUEST['rent_id'];
$result1 = mysqli_query(
    $connection,
    "SELECT * FROM add_rent INNER JOIN add_tenant ON add_rent.rid = add_tenant.tid INNER JOIN add_units ON add_rent.unit_no = add_units.unit_id INNER JOIN add_floor ON add_rent.floor_no = add_floor.id INNER JOIN add_month ON add_rent.month_id = add_month.m_id where add_rent.rent_id='$rent_id'"
);
$row = mysqli_fetch_array($result1);
if (isset($_POST['submit'])) {
    $payment_date = $_POST['payment_date'];
    if ($row['paid_rent'] == '') {
        $previous_paid_rent = '0';
        $present_paid_rent = $_POST['paid_rent'];
        $total_paid_rent = $present_paid_rent + $previous_paid_rent;
    } else {
        $previous_paid_rent = $row['paid_rent'];
        $present_paid_rent = $_POST['paid_rent'];
        $total_paid_rent = $present_paid_rent + $previous_paid_rent;
    }
    $remaining_rent = $_POST['remaining_rent'];

    $result = mysqli_query(
        $connection,
        "UPDATE add_rent SET payment_date='$payment_date',paid_rent='$total_paid_rent',remaining_rent='$remaining_rent' WHERE rent_id='$rent_id'"
    );

    if ($result == true) {
        header('location:rent_list.php');
    } else {
        $_SESSION['status'] = 'Data is not inserted';
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

    <title>Payment Information </title>

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
                                    <h>Add Tenant Payment</h>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <form id="funds_form" action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tenant Name</label>
                <input type="text" name="tenant_name" class="form-control" value="<?php echo $row[
                    't_name'
                ]; ?>" disabled>
            </div>
        </div> <div class="col-md-6">
            <div class="form-group">
                <label>Floor No</label>
                <input type="text" name="floor_no" class="form-control" value="<?php echo $row[
                    'floor_no'
                ]; ?>" disabled>
            </div>
        </div> <div class="col-md-6">
            <div class="form-group">
                <label>Unit No</label>
                <input type="text" name="unit_no" class="form-control" value="<?php echo $row[
                    'unit_no'
                ]; ?>" disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Payment Month</label>
                <select name="month_id" class="form-control" disabled>
                    <option value=""><?php echo $row['month_name']; ?></option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Year</label>
                <select name="xyear" class="form-control" disabled>
                    <option value=""><?php echo $row['xyear']; ?></option>
                    <?php for ($year = date('Y'); $year >= 1999; $year--) {
                        echo '<option value="' .
                            $year .
                            '">' .
                            $year .
                            '</option>';
                    } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Payment Date</label>
                <input type="date" name="payment_date" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
     <?php if ($row['remaining_rent'] == '') { ?>
        <div class="col-md-6">
            <div class="form-group">
                <label>Total Rent</label>
                <input type="number" name="total_rent" id="total_rent" class="form-control" value="<?php echo $row[
                    'total_rent'
                ]; ?>" onchange="calculateTotalRent()">
            </div>
        </div>
     <?php } elseif ($row['remaining_rent'] !== '') { ?>
        <div class="col-md-6">
            <div class="form-group">
                <label>Total Rent</label>
                <input type="number" name="total_rent" id="total_rent" class="form-control" value="<?php echo $row[
                    'remaining_rent'
                ]; ?>" onchange="calculateTotalRent()">
            </div>
        </div>
     <?php } ?>
        <div class="col-md-6">
            <div class="form-group">
                <label>Paid Rent</label>
                <input type="text" name="paid_rent" id="paid_rent" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
            </div>
        </div>      
    </div>
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <label>Remaining Rent</label>
                <input type="text" name="remaining_rent" id="remaining_rent" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
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

<?php include 'include/footerlinks.php'; ?>
</body>
<script type="text/javascript">
function calculateTotalRent() {
  // Get the values of each bill input field
  const total_rent = parseFloat(document.getElementById('total_rent').value) || 0;
  const paid_rent = parseFloat(document.getElementById('paid_rent').value) || 0;


  // Add up the bill values to get the total rent
  const remaining_rent = total_rent - paid_rent;
  // Update the total rent field with the result
  document.getElementById('remaining_rent').value = remaining_rent;
}

</script>


</html>