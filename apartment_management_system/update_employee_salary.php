<?php

include 'include/connection.php';
include 'include/session.php';
$emp_salary_id = $_REQUEST['emp_salary_id'];
$select = mysqli_query(
    $connection,
    "SELECT * FROM add_employee_salary where emp_id='$emp_salary_id'"
);
$row1 = mysqli_fetch_array($select);
if (isset($_POST['submit'])) {
    $employee_name = $_POST['employee_name'];
    $designation = $_POST['designation'];
    $salary_month = $_POST['salary_month'];
    $salary_year = $_POST['salary_year'];
    $salary_per_month = $_POST['salary_per_month'];
    $issue_date = $_POST['issue_date'];
    $result = mysqli_query(
        $connection,
        "UPDATE add_employee_salary SET emp_name='$employee_name',designation='$designation',month_id='$salary_month',xyear='$salary_year',amount='$salary_per_month',issue_date='$issue_date' where emp_id='$emp_salary_id'"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        // $_SESSION['status'] = 'Data hase been  successfuly';
        // $_SESSION['status_code'] = 'success';
        header('location:emp_salary_list.php');
    } else {
        // echo '<script>alert("somethings went wrong")</script>';
        $_SESSION['status'] = 'Data is not Inserted';
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

    <title>Add Employee Salary Information </title>

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
                                    <h4>Update Employee Salary</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="salaryform" action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <select name="employee_name" id="emp_id" class="form-control">
                                                <?php
                                                // Fetch categories from database
                                                $employee_name =
                                                    $row1['emp_name'];
                                                $sql1 = "SELECT * FROM employee where emp_id='$employee_name'";
                                                $result1 = mysqli_query(
                                                    $connection,
                                                    $sql1
                                                );
                                                $row2 = mysqli_fetch_array(
                                                    $result1
                                                );
                                                ?>
                                                    <option value="<?php echo $row2[
                                                        'emp_id'
                                                    ]; ?>"><?php echo $row2[
    'emp_name'
]; ?></option>
                                                    <?php
                                                    // Fetch categories from database
                                                    $sql =
                                                        'SELECT * FROM employee';
                                                    $result = mysqli_query(
                                                        $connection,
                                                        $sql
                                                    );
                                                    while (
                                                        $row = mysqli_fetch_array(
                                                            $result
                                                        )
                                                    ) {
                                                        echo '<option value="' .
                                                            $row['emp_id'] .
                                                            '">' .
                                                            $row['emp_name'] .
                                                            '</option>';
                                                    }
                                                    ?>
                                                </select>
                                              
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                              <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $row1[
                                                  'designation'
                                              ]; ?>">
                                            </div>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Salary Month</label>
                                                <select name="salary_month" class="form-control">
                                                <option value="<?php echo $row1[
                                                    'month_id'
                                                ]; ?>"><?php echo $row1[
    'month_id'
]; ?></option>
                                                    <?php
                                                    // Fetch categories from database
                                                    $sql =
                                                        'SELECT * FROM add_month';
                                                    $result = mysqli_query(
                                                        $connection,
                                                        $sql
                                                    );
                                                    while (
                                                        $row = mysqli_fetch_array(
                                                            $result
                                                        )
                                                    ) {
                                                        echo '<option value="' .
                                                            $row['month_name'] .
                                                            '">' .
                                                            $row['month_name'] .
                                                            '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Salary Year</label>
                                                <select name="salary_year" class="form-control">
                                                    <option value="<?php echo $row1[
                                                        'xyear'
                                                    ]; ?>"><?php echo $row1[
    'xyear'
]; ?></option>
                                                   <?php
                                                   // Get the current year
                                                   $currentYear = date('Y');

                                                   // Generate options for the year dropdown
                                                   for (
                                                       $i = $currentYear;
                                                       $i >= $currentYear - 20;
                                                       $i--
                                                   ) {
                                                       echo '<option value="' .
                                                           $i .
                                                           '">' .
                                                           $i .
                                                           '</option>';
                                                   }
                                                   ?>
                                                </select>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Salary Per Month</label>
                                                <input type="text" name="salary_per_month" class="form-control" value="<?php echo $row1[
                                                    'amount'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" name="issue_date" class="form-control"  value="<?php echo $row1[
                                                    'issue_date'
                                                ]; ?>">
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
    $("#emp_id").on("change", function(){
        var emp_id = $(this).val();
        if(emp_id){
            $.ajax({
                type: "POST",
                url: "emp_salary_dependent_dropdown.php",
                data: {emp_id: emp_id},
                dataType: "JSON",
                success: function(data){
                    $("#designation").val(data.emp_designation).prop("disabled", false);
                }
            });
        }else{
            $("#designation").val("").prop("disabled", true);
        }
    });
});



</script>
<script src="js/add_emp_salary_validation.js"></script>


<?php include 'include/footerlinks.php'; ?>
</body>


</html>