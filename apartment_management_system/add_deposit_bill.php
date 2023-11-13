<?php

include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['submit'])) {
    $water_bill = $_POST['water_bill'];
    $gas_bill = $_POST['gas_bill'];
    $electric_bill = $_POST['electric_bill'];
    $issue_date = $_POST['issue_date'];
    $bill_month = $_POST['bill_month'];
    $bill_year = $_POST['bill_year'];
    $total_bill = $_POST['total_bill'];
    $deposit_bank_name = $_POST['deposit_bank_name'];

    $result = mysqli_query(
        $connection,
        "INSERT INTO add_bill (water_bill, gas_bill, electric_bill, issue_date, bill_month, bill_year, total_bill, deposit_bank_name) 
        VALUES ('$water_bill','$gas_bill','$electric_bill', '$issue_date', '$bill_month', '$bill_year', '$total_bill', '$deposit_bank_name')"
    );

    if ($result == true) {
        $_SESSION['status'] = 'Data has been inserted successfully';
        $_SESSION['status_code'] = 'success';
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

    <title>Deposit Bill Information </title>

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
                                    <h4>Add Deposit Bill</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <form id="deposit_bill_form" action="" method="post">
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
                                                <input type="number" name="electric_bill" id="electric_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
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
                                                <label>Total Bill</label>
                                                <input type="number" name="total_bill" id="total_bill" class="form-control" placeholder="0.00" onchange="calculateTotalRent()">
                                            </div>
                                            </div>
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Bill Month</label>
                <select name="bill_month" class="form-control">
                    <option value="">--Select Bill Month--</option>
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
        <div class="col-md-6">
            <div class="form-group">
                <label>Bill Year</label>
                <select name="bill_year" class="form-control">
                    <option value="">--Select Bill Year--</option>
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
    </div>
    <div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label>Issue Date</label>
                <input type="date" name="issue_date" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Deposit Bank Name</label>
                <input type="text" name="deposit_bank_name" class="form-control" placeholder="Enter deposit bank name">
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
<script src="js/funds_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>
<script type="text/javascript">
function calculateTotalRent() {
  // Get the values of each bill input field
  const water_bill = parseFloat(document.getElementById('water_bill').value) || 0;
  const electiec_bill = parseFloat(document.getElementById('electric_bill').value) || 0;
  const gas_bill = parseFloat(document.getElementById('gas_bill').value) || 0;

  // Add up the bill values to get the total rent
  const totalRent = water_bill + electiec_bill + gas_bill;
  // Update the total rent field with the result
  document.getElementById('total_bill').value = totalRent;
}

</script>

</html>