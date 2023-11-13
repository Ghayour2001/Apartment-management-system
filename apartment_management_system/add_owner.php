<?php

include 'include/connection.php';
include 'include/session.php';

if (isset($_POST['submit'])) {
    $owner_name = $_POST['owner_name'];
    $owner_username = $_POST['owner_username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $present_address = $_POST['present_address'];
    $cnic = $_POST['cnic'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $image = 'images/' . time() . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
    }
    $query = mysqli_query(
        $connection,
        "SELECT * FROM add_owner where owner_username='$owner_username'"
    );
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = 'This username is already exist';
        $_SESSION['status_code'] = 'error';
    } else {
        $result = mysqli_query(
            $connection,
            "INSERT INTO add_owner(owner_name,owner_username,owner_email,owner_contact,owner_pre_address,owner_cnic,owner_password,status,owner_image)VALUES
            ('$owner_name','$owner_username','$email','$contact_no','$present_address','$cnic','$password','$status','$image')"
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

    <title>Add Owner Information </title>

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
                                    <h4>Add Owner</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="oform" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Owner Name:</label>
                                                <input type="text" name="owner_name" class="form-control" placeholder="Enter Owner Name">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" name="owner_username" class="form-control" placeholder="Enter Owner username">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No:</label>
                                                <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact Number">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Present Address:</label>
                                                <input type="text" name="present_address" class="form-control" placeholder="Enter Presnet Address">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CNIC:</label>
                                                <input type="text" name="cnic" class="form-control" placeholder="Enter Owner CNIC no">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image:</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status:</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">--Select Status--</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">In-Active</option>
                                                </select>
                                            </div>
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
<script src="js/owner_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
</body>


</html>