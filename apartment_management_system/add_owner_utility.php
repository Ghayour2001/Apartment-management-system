<?php

include 'include/connection.php';
include 'include/session.php';

if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $owner_name = $_POST['owner_name'];
    $rent = $_POST['rent'];
    $issue_date = $_POST['issue_date'];
    $status = $_POST['status'];
    // .......
    // Assuming the initial invoice number is 1
    $lastInvoiceNumberQuery = mysqli_query(
        $connection,
        'SELECT MAX(invoice_number) as max_invoice_number FROM add_owner_utility'
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
    $sql = "INSERT INTO add_owner_utility(owner_id,floor_no,unit_no,lease_rent,issue_date,status,invoice_number)VALUES
    ('$owner_name','$floor_no','$unit_no','$rent','$issue_date','$status','$invoiceNumber')";
    $result = mysqli_query($connection, $sql);
    $update = mysqli_query(
        $connection,
        "UPDATE add_units SET owner_status = '1' WHERE unit_id = '$unit_no'"
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

    <title>Add Owner Utility Information </title>

    <!-- ================= Favicon ================== -->
    <?php include 'include/headlinks.php'; ?>
    <style>
    .error {
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
                                <h1><?php echo $_SESSION['designation']; ?>, <span>Welcome Here</span></h1>
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
                                    <h4>Add Owner Utility</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="owner_utility" action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Floor No:</label>
                                                        <select name="floor_no" id="floor" class="form-control">
                                                            <option value="">--Select Floor--</option>
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
                                                                        $row['floor_no'];
                                                            ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $floor_no; ?>
                                                            </option>
                                                            <?php
                                                                }
                                                            } else {
                                                                ?>
                                                            <option value="0">Floor not found</option>
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
                                                            <option value="">--Select Unit--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Owner Name:</label>
                                                        <select name="owner_name" class="form-control">
                                                            <option value="">--Select Owner Name--</option>
                                                            <?php
                                                            $select = mysqli_query(
                                                                $connection,
                                                                'SELECT * FROM add_owner'
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

                                                                    $owner_name =
                                                                        $row['owner_name'];
                                                                    $owner_id =
                                                                        $row['owner_id'];
                                                            ?>
                                                            <option value="<?php echo $owner_id; ?>">
                                                                <?php echo $owner_name; ?></option>
                                                            <?php
                                                                }
                                                            } else {
                                                                ?>
                                                            <option value="0">Owner not found</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Lease Amount:</label>
                                                        <input type="number" name="rent" class="form-control"
                                                            placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Issue Date:</label>
                                                        <input type="date" name="issue_date" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status:</label>
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
    <script src="js/owner_utility_validation.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#floor").on("change", function() {
            var floor_no = $(this).val();
            if (floor_no != "") {
                $.ajax({
                    url: "get_units.php",
                    type: "POST",
                    data: {
                        woner_floor_id: floor_no
                    },
                    success: function(data) {
                        $("#unit").html(data);
                        $("#unit").trigger("change"); // Trigger change event manually
                    }
                });
            } else {
                $("#unit").html("<option value=''>Select a unit</option>");
            }
        });


    });
    </script>
    <script src="js/emp_validation.js"></script>
    <?php include 'include/footerlinks.php'; ?>
</body>
<!----total rent calculation ----->
<script type="text/javascript">
function calculateTotalRent() {
    // Get the values of each bill input field
    const water_bill = parseFloat(document.getElementById('water_bill').value) || 0;
    const electiec_bill = parseFloat(document.getElementById('electiec_bill').value) || 0;
    const gas_bill = parseFloat(document.getElementById('gas_bill').value) || 0;
    const security_bill = parseFloat(document.getElementById('security_bill').value) || 0;
    const utility_bill = parseFloat(document.getElementById('utility_bill').value) || 0;
    const other_bill = parseFloat(document.getElementById('other_bill').value) || 0;

    // Add up the bill values to get the total rent
    const totalRent = water_bill + electiec_bill + gas_bill + security_bill + utility_bill + other_bill;
    // Update the total rent field with the result
    document.getElementById('total-bill').value = totalRent;
}
</script>

</html>