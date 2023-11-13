<?php

include 'include/connection.php';
include 'include/session.php';
$floor_id = $_REQUEST['floor_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM add_floor where id = '$floor_id'"
);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $query = mysqli_query(
        $connection,
        "SELECT * FROM add_floor where floor_no='$floor_no'"
    );
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = 'This Floor is already exist';
        $_SESSION['status_code'] = 'error';
    } else {
        $result = mysqli_query(
            $connection,
            "UPDATE add_floor SET floor_no='$floor_no' where id='$floor_id'"
        );
        if ($result == true) {
            header('location:floor_list.php');
        } else {
            echo '<script>alert("somethings went wrong")</script>';
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

    <title>Update  Floor Information </title>

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
                                    <h4>Update Floor Number</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="fform" action="" method="post">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                                <input type="text" name="floor_no" class="form-control" value="<?php echo $row[
                                                    'floor_no'
                                                ]; ?>">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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




    <?php include 'include/footerlinks.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="js/cdn3.6.3.js"></script>
     <script src="js/validation_plugins.js"></script>
<script src="js/floor_validation.js"></script>

</body>


</html>