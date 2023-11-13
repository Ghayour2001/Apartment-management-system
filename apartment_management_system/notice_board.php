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
                                    <h4>Notice Board</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <div class="col-lg-12">
									<div class="card">
                                       <?php if (
                                           $_SESSION['designation'] == 'admin'
                                       ) {
                                           $designation =
                                               $_SESSION['designation'];
                                           $result = mysqli_query(
                                               $connection,
                                               "SELECT * FROM notice_board where notice_designation='$designation'"
                                           );
                                           while (
                                               $row1 = mysqli_fetch_Array(
                                                   $result
                                               )
                                           ) { ?> 
										<div class="card-body">
											<h4 class="card-title"><?php echo $row1['created_date']; ?></h4>
											<div class="card-content">
												<div class="alert ">
												  <h4 class="alert-heading"><?php echo $row1['notice_title']; ?></h4>
												  <p><?php echo $row1['notice_description']; ?></p>
												  <hr>
												 
												</div>
											</div>
										</div>
                                        <?php }
                                       } elseif (
                                           $_SESSION['designation'] ==
                                           'Employee'
                                       ) {
                                           $designation =
                                               $_SESSION['designation'];
                                           $result = mysqli_query(
                                               $connection,
                                               "SELECT * FROM notice_board where notice_designation='$designation'"
                                           );
                                           while (
                                               $row1 = mysqli_fetch_Array(
                                                   $result
                                               )
                                           ) { ?> 
                                     <div class="card-body">
                                         <h4 class="card-title"><?php echo $row1[
                                             'created_date'
                                         ]; ?></h4>
                                         <div class="card-content">
                                             <div class="alert ">
                                               <h4 class="alert-heading"><?php echo $row1[
                                                   'notice_title'
                                               ]; ?></h4>
                                               <p><?php echo $row1[
                                                   'notice_description'
                                               ]; ?></p>
                                               <hr>
                                              
                                             </div>
                                         </div>
                                     </div>
                                     <?php }
                                       } elseif (
                                           $_SESSION['designation'] == 'Tenant'
                                       ) {
                                           $designation =
                                               $_SESSION['designation'];
                                           $result = mysqli_query(
                                               $connection,
                                               "SELECT * FROM notice_board where notice_designation='$designation'"
                                           );
                                           while (
                                               $row1 = mysqli_fetch_Array(
                                                   $result
                                               )
                                           ) { ?> 
                                  <div class="card-body">
                                      <h4 class="card-title"><?php echo $row1[
                                          'created_date'
                                      ]; ?></h4>
                                      <div class="card-content">
                                          <div class="alert ">
                                            <h4 class="alert-heading"><?php echo $row1[
                                                'notice_title'
                                            ]; ?></h4>
                                            <p><?php echo $row1[
                                                'notice_description'
                                            ]; ?></p>
                                            <hr>
                                           
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                       } elseif (
                                           $_SESSION['designation'] == 'Owner'
                                       ) {
                                           $designation =
                                               $_SESSION['designation'];
                                           $result = mysqli_query(
                                               $connection,
                                               "SELECT * FROM notice_board where notice_designation='$designation'"
                                           );
                                           while (
                                               $row1 = mysqli_fetch_Array(
                                                   $result
                                               )
                                           ) { ?> 
                                  <div class="card-body">
                                      <h4 class="card-title"><?php echo $row1[
                                          'created_date'
                                      ]; ?></h4>
                                      <div class="card-content">
                                          <div class="alert ">
                                            <h4 class="alert-heading"><?php echo $row1[
                                                'notice_title'
                                            ]; ?></h4>
                                            <p><?php echo $row1[
                                                'notice_description'
                                            ]; ?></p>
                                            <hr>
                                           
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                       } ?>
									</div>
								</div> 
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
<script src="js/unit_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>