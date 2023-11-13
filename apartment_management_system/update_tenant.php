<?php

include 'include/connection.php';
include 'include/session.php';
$tenant_id = $_REQUEST['tenant_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM add_tenant where tid = '$tenant_id' "
);
$row1 = mysqli_fetch_array($result);
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
    $month = $_POST['month'];
    $year = $_POST['year'];
    $nid = $_POST['nid'];
    $status = $_POST['status'];
    $image = 'images/' . time() . $_FILES['image']['name'];
    if ($_FILES['image']['name'] != '') {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
        }
    } else {
        $image = $row1['image'];
    }
    $result = mysqli_query(
        $connection,
        "UPDATE add_tenant SET t_name='$tenant_name',username='$username',t_email='$email',t_contact='$contact_no',t_address='$address',t_nid='$nid',t_floor_no='$floor_no'
        ,t_unit_no='$unit_no',t_advance='$advance_rent',t_rent_pm='$rent_per_month',t_date='$issue_date',t_password='$password',image='$image',t_status='$status',t_month='$month',t_year='$year' where tid='$tenant_id'"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        // $_SESSION['status'] = 'Data hase been Updated successfuly';
        // $_SESSION['status_code'] = 'success';
        header('location:tenant_list.php');
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
                                                <label>Tenant Name</label>
                                                <input type="text" name="tenant_name" class="form-control" value="<?php echo $row1[
                                                    't_name'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="<?php echo $row1[
                                                    't_email'
                                                ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" value="<?php echo $row1[
                                                    'username'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" value="<?php echo $row1[
                                                    't_password'
                                                ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" id="" cols="30" rows="12" ><?php echo $row1[
                                                    't_address'
                                                ]; ?></textarea>
                                            </div>
                                            </div>                                          
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input type="text" name="contact_no" class="form-control" value="<?php echo $row1[
                                                    't_contact'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No</label>
                                                <select name="floor_no" id="floor" class="form-control">
                                                <?php
                                                $t_floor_no =
                                                    $row1['t_floor_no'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_floor where id = '$t_floor_no' "
                                                );
                                                $row2 = mysqli_fetch_array(
                                                    $select
                                                );
                                                ?>
                                                    <option value="<?php echo $row2[
                                                        'id'
                                                    ]; ?>"><?php echo $row2[
    'floor_no'
]; ?></option>
                                                    
                                                </select>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Available Unit No</label>
                                                <select name="unit_no" id="unit" class="form-control">
                                                <?php
                                                $t_unit_no = $row1['t_unit_no'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_units where unit_id = '$t_unit_no' "
                                                );
                                                $row3 = mysqli_fetch_array(
                                                    $select
                                                );
                                                ?>
                                                    <option value="<?php echo $row3[
                                                        'unit_id'
                                                    ]; ?>"><?php echo $row3[
    'unit_no'
]; ?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advance Rent</label>
                                                <input type="text" name="advance_rent" class="form-control" value="<?php echo $row1[
                                                    't_advance'
                                                ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rent Per Month</label>
                                                <input type="text" name="rent_per_month" class="form-control" value="<?php echo $row1[
                                                    't_rent_pm'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" name="issue_date" class="form-control" value="<?php echo $row1[
                                                    't_date'
                                                ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tenant National ID</label>
                                                <input type="text" name="nid" class="form-control" value="<?php echo $row1[
                                                    't_nid'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="<?php echo $row1[
                                                        't_status'
                                                    ]; ?>"><?php echo $row1[
    't_status'
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
                                                <label for="">Select Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <img width="100" src="<?php echo $row1[
                                                    'image'
                                                ]; ?>" alt="">
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
    $(document).ready(function(){
        function loadData(type, category_id){
            $.ajax({
                url : "ajax_for_update_tenant.php",
                type : "POST",
                data : {type : type, id : category_id},
                success : function(data){
                    if(type == "unitdata"){
                     $("#unit").html(data);
                    }else{
                     $("#floor").append(data);
                    }
                }
            });
        }
        loadData();
        $("#floor").on("change",function(){
            var floor = $("#floor").val();

            if(floor != ""){
                loadData("unitdata", floor)
            }else{
                $("#unit").html("");
            }
        })
    });
</script>
<script src="js/update_tenant_validation.js"></script>


<?php include 'include/footerlinks.php'; ?>
</body>


</html>