<?php

include 'include/connection.php';
include 'include/session.php';
$notice_id = $_REQUEST['notice_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM notice_board WHERE notice_id = '$notice_id'"
);
$rows = mysqli_fetch_array($result);
$n_title = $rows['notice_title'];
$n_description = $rows['notice_description'];
$n_designation = $rows['notice_designation'];
$n_status = $rows['notice_status'];

if (isset($_POST['submit'])) {
    $n_title = $_POST['n_title'];
    $n_description = $_POST['n_description'];
    $n_designation = $_POST['n_designation'];
    $n_status = $_POST['n_status'];

    $result = mysqli_query(
        $connection,
        "UPDATE notice_board SET notice_title='$n_title', notice_description='$n_description', notice_designation='$n_designation', notice_status='$n_status' WHERE notice_id='$notice_id'"
    );

    if ($result == true) {
        $_SESSION['status'] = 'Data has been updated successfully';
        $_SESSION['status_code'] = 'success';
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

    <title>Update Notice Information </title>

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
                                    <h4>Update Notice Board</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <form id="notice_form" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Notice Title</label>
                                                    <input type="text" name="n_title" class="form-control"value="<?php echo $n_title; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Notice Description</label>
                                            <textarea name="n_description" class="form-control"><?php echo $n_description; ?></textarea>
                                        </div>
                                        </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Designation</label>
                                                <select id="" name="n_designation" class="form-control">
                                                    <option value="<?php echo $n_designation; ?>"><?php echo $n_designation; ?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="owner">Owner</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="tenant">Tenant</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Staus</label>
                                                <select id="" name="n_status" class="form-control">
                                                    <option value="<?php echo $n_status; ?>"><?php echo $n_status; ?></option>
                                                    <option value="0">Active</option>
                                                    <option value="1">Un-Active</option>
                                                </select>
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
<script src="js/maintenance_cost_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>