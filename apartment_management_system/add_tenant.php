<?php

include 'include/connection.php';
include 'include/session.php';

if (isset($_POST['submit'])) {
    $tenant_name = $_POST['tenant_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $advance_rent = $_POST['advance_rent'];
    $rent_per_month = $_POST['rent_per_month'];
    $issue_date = $_POST['issue_date'];
    $nid = $_POST['nid'];
    $status = $_POST['status'];
    $image = 'images/' . time() . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
    }

    $query = mysqli_query(
        $connection,
        "SELECT * FROM add_tenant where username='$username'"
    );
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = 'This username is already exist';
        $_SESSION['status_code'] = 'error';
    } else {
        $result = mysqli_query(
            $connection,
            "INSERT INTO add_tenant(t_name,username,t_email,t_contact,t_address,t_nid,t_floor_no,t_unit_no,t_advance,t_rent_pm,t_date,t_password,image,t_status)VALUES
            ('$tenant_name','$username','$email','$contact_no','$address','$nid','$floor_no',
            '$unit_no','$advance_rent','$rent_per_month','$issue_date','$password','$image','$status')"
        );
        $update = mysqli_query(
            $connection,
            "UPDATE add_units SET status = '1' WHERE unit_id = '$unit_no'"
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

    <title>Add Tenant Information </title>

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
                                    <h4>Add Tenant</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="tenantform" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tenant Name:</label>
                                                <input type="text" name="tenant_name" class="form-control" placeholder="Enter Tenant Name">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" name="username" class="form-control" placeholder="Enter Username ">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Passowrd">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address:</label>
                                                <textarea name="address" class="form-control" id="" cols="30" rows="12" placeholder="Address"></textarea>
                                            </div>
                                            </div>                                          
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No:</label>
                                                <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact Number">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                                <select name="floor_no" id="floor" class="form-control">
                                                    <option value="">--Select Floor--</option>
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

                                                            $id = $row['id'];
                                                            $floor_no =
                                                                $row[
                                                                    'floor_no'
                                                                ];
                                                            ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $floor_no; ?></option>
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
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Available Unit No:</label>
                                                <select name="unit_no" id="unit" class="form-control">
                                                    <option value="">Select Unit</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advance Rent:</label>
                                                <input type="text" name="advance_rent" class="form-control" placeholder="Enter Advance Rent">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rent Per Month:</label>
                                                <input type="text" name="rent_per_month" class="form-control" placeholder="Enter Rent Per Month">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date:</label>
                                                <input type="date" name="issue_date" class="form-control">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tenant National ID:</label>
                                                <input type="text" name="nid" class="form-control" placeholder="Enter Tenant National ID">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">--Select Status--</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">In-Active</option>
                                                </select>
                                            </div>
                                        </div>                                   
                                         </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="">Select Image</label>
                                                <input type="file" name="image" class="form-control">
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
<script type="text/javascript">
      $(document).ready(function() {
  $("#floor").on("change", function() {
    var floor_no = $(this).val();
    if (floor_no != "") {
      $.ajax({
        url: "dependent_dropdown.php",
        type: "POST",
        data: { tenant_floor_id: floor_no },
        success: function(data) {
          $("#unit").html(data);
          $("#unit").trigger("change"); // Trigger change event manually
        }
      });
    } else {
      $("#unit").html("<option value=''>Select a unit</option>");
    }
  });


});
</script>
<script src="js/tenant_validation.js"></script>


<?php include 'include/footerlinks.php'; ?>
</body>


</html>