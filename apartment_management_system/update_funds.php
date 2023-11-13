<?php

include 'include/connection.php';
include 'include/session.php';
$funds_id = $_REQUEST['funds_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM add_funds where fund_id = '$funds_id'"
);
$rows = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
    $owner_id = $_POST['owner_id'];
    $month_id = $_POST['month_id'];
    $xyear = $_POST['xyear'];
    $f_date = $_POST['f_date'];
    $total_amount = $_POST['total_amount'];
    $purpose = $_POST['purpose'];

    $result = mysqli_query(
        $connection,
        "UPDATE add_funds SET owner_id='$owner_id', month_id='$month_id', xyear='$xyear', f_date='$f_date', total_amount='$total_amount', purpose='$purpose' WHERE fund_id='$funds_id'"
    );

    if ($result == true) {
        // $_SESSION['status'] = 'Data has been updated successfully';
        // $_SESSION['status_code'] = 'success';
        header('location:funds_list.php');
    } else {
        $_SESSION['status'] = 'Data is not updated';
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

    <title>Update Funds Information </title>

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
                                    <h4>Update Funds</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <form id="funds_form" action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Owner ID</label>
                <select name="owner_id" class="form-control">
                <?php
                $owner_id = $rows['owner_id'];
                $select = mysqli_query(
                    $connection,
                    "SELECT * FROM add_owner where owner_id='$owner_id'"
                );
                $count = mysqli_num_rows($select);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($select)) {

                        $owner_name = $row['owner_name'];
                        $owner_id = $row['owner_id'];
                        ?>
                                                            <option value="<?php echo $owner_id; ?>"><?php echo $owner_name; ?></option>
                                                            <?php
                    }
                } else {
                     ?>
                                                            <option value="0">Owner not found</option>
                                                        <?php
                }
                ?>
                    <?php
                    $select = mysqli_query(
                        $connection,
                        'SELECT * FROM add_owner'
                    );
                    $count = mysqli_num_rows($select);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($select)) {

                            $owner_name = $row['owner_name'];
                            $owner_id = $row['owner_id'];
                            ?>
                                                            <option value="<?php echo $owner_id; ?>"><?php echo $owner_name; ?></option>
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
                <label>Month</label>
                <select name="month_id" class="form-control">
                <?php
                $month_id = $rows['month_id'];
                $select1 = mysqli_query(
                    $connection,
                    "SELECT * FROM add_month where m_id='$month_id'"
                );
                $count = mysqli_num_rows($select1);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($select1)) {

                        $month_name = $row['month_name'];
                        $m_id = $row['m_id'];
                        ?>
                                                            <option value="<?php echo $m_id; ?>"><?php echo $month_name; ?></option>
                                                            <?php
                    }
                } else {
                     ?>
                                                            <option value="0">Month not found</option>
                                                        <?php
                }
                ?>
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
                <select name="xyear" class="form-control">
                    <option value="<?php echo $rows[
                        'xyear'
                    ]; ?>"><?php echo $rows['xyear']; ?></option>
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
                <label>Date</label>
                <input type="date" name="f_date" class="form-control" value="<?php echo $rows[
                    'f_date'
                ]; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="<?php echo $rows[
                    'total_amount'
                ]; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Purpose</label>
                <input type="text" name="purpose" class="form-control" value="<?php echo $rows[
                    'purpose'
                ]; ?>">
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




   
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/funds_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>