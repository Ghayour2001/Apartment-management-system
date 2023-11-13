<?php

include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    // $status = $_POST['status'];
    $query = mysqli_query(
        $connection,
        "SELECT * FROM add_units where floor_no='$floor_no' and unit_no='$unit_no'"
    );
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = 'This Unit is already exist';
        $_SESSION['status_code'] = 'error';
    } else {
        $result = mysqli_query(
            $connection,
            "INSERT INTO add_units(floor_no,unit_no)VALUES('$floor_no','$unit_no')"
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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Unit Information </title>

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
                                    <h4>Add Unit</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="uform" action="" method="post">
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                               
                                                    <select name="floor_no" id="" class="form-control">
                                                        <option value="">Select Floor No</option>
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
                                                            $id = $row['id'];
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
                                                <input type="text" name="unit_no" class="form-control" placeholder="Add unit No">
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