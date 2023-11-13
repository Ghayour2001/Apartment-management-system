<?php

include 'include/connection.php';
include 'include/session.php';
$unit_id = $_REQUEST['unit_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM add_units where unit_id = '$unit_id'"
);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $status = $_POST['status'];
    $owner_status = $_POST['owner_status'];
    $result = mysqli_query(
        $connection,
        "UPDATE add_units SET floor_no='$floor_no',unit_no='$unit_no',status='$status',owner_status='$owner_status' where unit_id='$unit_id'"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        $_SESSION['status'] = 'Data hase been Updated successfuly';
        $_SESSION['status_code'] = 'success';
        header('location: unit_list.php');
    } else {
        // echo '<script>alert("somethings went wrong")</script>';
        $_SESSION['status'] = 'Data is not Updated';
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

    <title>Update Unit Information </title>

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
                                    <h4>Update Unit</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="uform" action="" method="post">
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                               
                                                    <select name="floor_no" id="" class="form-control">
            <!-- this code is just for showing the floor no form floor table  -->
                                                    <?php
                                                    $floor_id =
                                                        $row['floor_no'];
                                                    $select = mysqli_query(
                                                        $connection,
                                                        "SELECT * FROM add_floor where id = '$floor_id' "
                                                    );
                                                    $row1 = mysqli_fetch_array(
                                                        $select
                                                    );
                                                    ?>
        <option value="<?php echo $row1['id']; ?>"><?php echo $row1[
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

                                                            $floor_no =
                                                                $row[
                                                                    'floor_no'
                                                                ];
                                                            $floor_id =
                                                                $row['id'];
                                                            ?>
                                                            <option value="<?php echo $floor_id; ?>"><?php echo $floor_no; ?></option>
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
                                                <?php
                                                $result = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_units where unit_id = '$unit_id'"
                                                );
                                                $row = mysqli_fetch_array(
                                                    $result
                                                );
                                                ?>
                                                <label>Unit No:</label>
                                                <input type="text" name="unit_no" class="form-control" value="<?php echo $row[
                                                    'unit_no'
                                                ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tenant Status:</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="<?php echo $row[
                                                        'status'
                                                    ]; ?>"> <?php echo $row[
    'status'
] == 0
    ? 'Available'
    : 'Assigned'; ?></option>
                                                    <option value="0">Available</option>
                                                    <option value="1">Assigned</option>
                                                </select>
                                            </div>
                                           
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Owner Status:</label>
                                                <select name="owner_status" id="" class="form-control">
                                                    <option value="<?php echo $row[
                                                        'owner_status'
                                                    ]; ?>"> <?php echo $row[
    'owner_status'
] == 0
    ? 'Available'
    : 'Assigned'; ?></option>
                                                    <option value="0">Available</option>
                                                    <option value="1">Assigned</option>
                                                </select>
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
<script src="js/unit_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>