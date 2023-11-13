<?php

include 'include/connection.php';
include 'include/session.php';
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
                                    <h4>View Complain</h4>
                                    
                                </div>
                                <?php if ($_SESSION['designation'] == 'Owner') {
                                    $designation = $_SESSION['designation'];
                                    $result = mysqli_query(
                                        $connection,
                                        "SELECT * FROM add_complain where designation='$designation'"
                                    );
                                    while (
                                        $row1 = mysqli_fetch_Array($result)
                                    ) { ?> 
                                  <div class="card-body">
                                      <h4 class="card-title"><?php
                                      echo $row1['added_date'];
                                      if ($row1['job_status'] == 'Pending') { ?>
                                        <button class="btn btn-warning btn-rounded m-b-10 m-l-5">Pending</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'On-Hold'
                                      ) { ?>
                                        <button class="btn btn-primary btn-rounded m-b-10 m-l-5">On-Hold</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'In-Progress'
                                      ) { ?>
                                        <button class="btn btn-pink btn-rounded m-b-10 m-l-5">In-Progress</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'Completed'
                                      ) { ?>
                                        <button class="btn btn-success btn-rounded m-b-10 m-l-5">Completed</button>
                                        <?php }
                                      ?>
                                      
                                    
                                    </h4>
                                      <div class="card-content">
                                          <div class="alert ">
                                            <h4 class="alert-heading"><?php echo $row1[
                                                'c_title'
                                            ]; ?></h4>
                                            <p><?php echo $row1[
                                                'c_description'
                                            ]; ?></p>
                                            <hr>
                                           
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                } elseif (
                                    $_SESSION['designation'] == 'Tenant'
                                ) {
                                    $designation = $_SESSION['designation'];
                                    $result = mysqli_query(
                                        $connection,
                                        "SELECT * FROM add_complain where designation='$designation'"
                                    );
                                    while (
                                        $row1 = mysqli_fetch_Array($result)
                                    ) { ?> 
                                  <div class="card-body">
                                      <h4 class="card-title"><?php
                                      echo $row1['added_date'];
                                      if ($row1['job_status'] == 'Pending') { ?>
                                        <button class="btn btn-warning btn-rounded m-b-10 m-l-5">Pending</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'On-Hold'
                                      ) { ?>
                                        <button class="btn btn-primary btn-rounded m-b-10 m-l-5">On-Hold</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'In-Progress'
                                      ) { ?>
                                        <button class="btn btn-pink btn-rounded m-b-10 m-l-5">In-Progress</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'Completed'
                                      ) { ?>
                                        <button class="btn btn-success btn-rounded m-b-10 m-l-5">Completed</button>
                                        <?php }
                                      ?>
                                      
                                    
                                    </h4>
                                      <div class="card-content">
                                          <div class="alert ">
                                            <h4 class="alert-heading"><?php echo $row1[
                                                'c_title'
                                            ]; ?></h4>
                                            <p><?php echo $row1[
                                                'c_description'
                                            ]; ?></p>
                                            <hr>
                                           
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                } elseif (
                                    $_SESSION['designation'] == 'Employee'
                                ) {
                                    $name = $_SESSION['name'];
                                    $result = mysqli_query(
                                        $connection,
                                        "SELECT * FROM add_complain where assign_employee='$name'"
                                    );
                                    while (
                                        $row1 = mysqli_fetch_Array($result)
                                    ) { ?> 
                                  <div class="card-body">
                                      <h4 class="card-title"><?php
                                      echo $row1['added_date'];
                                      if ($row1['job_status'] == 'Pending') { ?>
                                        <button class="btn btn-warning btn-rounded m-b-10 m-l-5">Pending</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'On-Hold'
                                      ) { ?>
                                        <button class="btn btn-primary btn-rounded m-b-10 m-l-5">On-Hold</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'In-Progress'
                                      ) { ?>
                                        <button class="btn btn-pink btn-rounded m-b-10 m-l-5">In-Progress</button>
                                        <?php } elseif (
                                          $row1['job_status'] == 'Completed'
                                      ) { ?>
                                        <button class="btn btn-success btn-rounded m-b-10 m-l-5">Completed</button>
                                        <?php }
                                      ?>
                                      
                                    
                                    </h4>
                                      <div class="card-content">
                                          <div class="alert ">
                                            <h4 class="alert-heading"><?php echo $row1[
                                                'c_title'
                                            ]; ?></h4>
                                            <p><?php echo $row1[
                                                'c_description'
                                            ]; ?></p>
                                            <hr>
                                           
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                } ?>
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
<script src="js/unit_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>