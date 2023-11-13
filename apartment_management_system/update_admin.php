<?php

include 'include/connection.php';
include 'include/session.php';
$admin_id = $_REQUEST['admin_id'];
$query = mysqli_query(
    $connection,
    "SELECT * FROM admin WHERE a_id='$admin_id'"
);
$row = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $status = $_POST['status'];
    $image = 'images/' . time() . $_FILES['image']['name'];
    if ($_FILES['image']['name'] != '') {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
        }
    } else {
        $image = $row['image'];
    }

    $result = mysqli_query(
        $connection,
        "UPDATE admin SET name='$name',username='$username',password='$password',email='$email',contact_no='$contact_no',image='$image',status='$status' WHERE a_id='$admin_id'"
    );
    if ($result == true) {
        // $_SESSION['status'] = 'Data has been updated successfully';
        // $_SESSION['status_code'] = 'success';
        header('location:admin_list.php');
    } else {
        $_SESSION['status'] = 'Something went wrong while updating data';
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

    <title>Update Admin Information </title>

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
                                    <h4>Update Admin</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="admin_form" action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo $row[
                                                            'name'
                                                        ]; ?>">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="text" name="email" class="form-control"value="<?php echo $row[
                                                            'email'
                                                        ]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password:</label>
                                                        <input type="password" name="password" class="form-control" value="<?php echo $row[
                                                            'password'
                                                        ]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username:</label>
                                                        <input type="text" name="username" class="form-control" value="<?php echo $row[
                                                            'username'
                                                        ]; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">                   
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact No:</label>
                                                        <input type="text" name="contact_no" class="form-control" value="<?php echo $row[
                                                            'contact_no'
                                                        ]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status:</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="<?php echo $row[
                                                        'status'
                                                    ]; ?>"><?php echo $row[
    'status'
] == 0
    ? 'Active'
    : 'In-Active'; ?></option>
                                                    <option value="0">Active</option>
                                                    <option value="1">In-Active</option>
                                                </select>
                                            </div>
                                         
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Image:</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <img  width="100" src=" <?php echo $row[
                                                            'image'
                                                        ]; ?>" alt="">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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





    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/admin_validation.js"></script>

    <?php include 'include/footerlinks.php'; ?>
</body>


</html>