<?php

include 'include/connection.php';
include 'include/session.php';

if (isset($_POST['submit'])) {
    $emp_name = $_POST['emp_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pre_address = $_POST['pre_address'];
    $per_address = $_POST['per_address'];
    $contact_no = $_POST['contact_no'];
    $nid = $_POST['nid'];
    $joining_date = $_POST['joining_date'];
    $enging_date = $_POST['enging_date'];
    // $salary_per_month = $_POST['salary_per_month'];
    $designation = $_POST['designation'];
    $status = $_POST['status'];
    $image = 'images/' . time() . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
    }
    $query = mysqli_query(
        $connection,
        "SELECT * FROM employee where emp_username='$username'"
    );
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = 'This username is already exist';
        $_SESSION['status_code'] = 'error';
    } else {
        $result = mysqli_query(
            $connection,
            "INSERT INTO employee(emp_name,emp_email,emp_username,emp_contact,pre_address,per_address,emp_nid,emp_designation,emp_date,emp_ending_date,emp_password,emp_status,image)VALUES
            ('$emp_name','$email','$username','$contact_no','$pre_address','$per_address','$nid','$designation',
            '$joining_date','$enging_date','$password','$status','$image')"
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

    <title>Add Employee Information </title>

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
                                    <h4>Add Employee</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="emp" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="emp_name" class="form-control" placeholder="Enter Employee Name">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Enter Employee Username ">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Employee Passowrd">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Present Address</label>
                                                <textarea name="pre_address" class="form-control" id="" cols="30" rows="12" placeholder="Enter Present Address"></textarea>
                                            </div>
                                            </div>  
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Permanent Address</label>
                                                <textarea name="per_address" class="form-control" id="" cols="30" rows="12" placeholder="Enter Permanent Address"></textarea>
                                            </div>
                                            </div>                                          
                                          </div>

                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NID(Employee National ID)</label>
                                                <input type="text" name="nid" class="form-control" placeholder="Enter NID Number">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input type="text" name="contact_no" class="form-control" placeholder="Enter Employee Contact No">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input type="date" name="joining_date" class="form-control" placeholder="Enter Select Joining Date">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ending Date</label>
                                                <input type="date" name="enging_date" class="form-control" placeholder="Enter Select Ending Date">
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Salary Per Month</label>
                                                <input type="text" name="salary_per_month" class="form-control" value="0.00">
                                            </div> -->
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select name="designation" class="form-control">
                                                    <option value="">--Select Designation--</option>
                                                    <?php
                                                    $select = mysqli_query(
                                                        $connection,
                                                        'SELECT * FROM add_designation'
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

                                                            $emp_designation =
                                                                $row[
                                                                    'emp_designation'
                                                                ];
                                                            $designation_id =
                                                                $row[
                                                                    'designation_id'
                                                                ];
                                                            ?>
                                                            <option value="<?php echo $designation_id; ?>"><?php echo $emp_designation; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                         ?>
                                                            <option value="0">Designation not found</option>
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
                                                <label for="">Select Image</label>
                                                <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control">
                                                <option value="0">Active</option>
                                                <option value="1">Un-Active</option>
                                                </select>
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
                url : "dependent_dropdown.php",
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
<script src="js/emp_validation.js"></script>
<?php include 'include/footerlinks.php'; ?>
</body>


</html>