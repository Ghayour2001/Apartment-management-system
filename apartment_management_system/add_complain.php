<?php

include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['submit'])) {
    $c_title = $_POST['c_title'];
    $c_description = $_POST['c_description'];
    $c_date = $_POST['c_date'];
    $c_userid = $_SESSION['id'];
    $complainant_name = $_SESSION['name'];
    $designation = $_SESSION['designation'];
    // $job_status = $_POST['job_status'];

    $result = mysqli_query(
        $connection,
        "INSERT INTO add_complain(c_title, c_description, c_date, c_userid, complainant_name, designation) 
        VALUES ('$c_title', '$c_description', '$c_date', '$c_userid', '$complainant_name', '$designation')"
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

    <title>Complain Information </title>

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
                                    <h4>Add Complain</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form"  > 
                                    <form id="complaintForm" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="c_title">Complaint Title</label>
                                            <input type="text" class="form-control" id="c_title" name="c_title" placeholder="Enter complaint title">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="c_date">Complaint Date</label>
                                            <input type="date" class="form-control" id="c_date" name="c_date">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="c_description">Complaint Description</label>
                                            <textarea class="form-control" id="c_description" name="c_description" rows="3" placeholder="Enter complaint description"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<script src="js/complain_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>