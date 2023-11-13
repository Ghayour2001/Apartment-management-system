<?php

include 'include/connection.php';
include 'include/session.php';
$owner_utility_id = $_REQUEST['owner_utility_id'];
$results = mysqli_query(
    $connection,
    "SELECT * FROM add_owner_utility where owner_utility_id='$owner_utility_id'"
);
$rows = mysqli_fetch_array($results);
if (isset($_POST['submit'])) {
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $owner_name = $_POST['owner_name'];
    $rent = $_POST['rent'];
    $issue_date = $_POST['issue_date'];
    $status = $_POST['status'];
    $result = mysqli_query(
        $connection,
        "UPDATE add_owner_utility SET owner_id='$owner_name',floor_no='$floor_no',unit_no='$unit_no',lease_rent='$rent',issue_date='$issue_date',status='$status' where owner_utility_id='$owner_utility_id'"
    );
    if ($result == true) {
        //echo '<script>alert("data has been inserted successfully")</script>';
        // $_SESSION['status'] = 'Data hase been Update successfuly';
        // $_SESSION['status_code'] = 'success';
        header('location:owner_utility_list.php');
    } else {
        // echo '<script>alert("somethings went wrong")</script>';
        $_SESSION['status'] = 'Data is not Update';
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

    <title>Update Owner Utility Information </title>

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
                                    <h4>Update Owner Utility</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form id="owner_utility" action="" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Floor No:</label>
                                                <select name="floor_no" id="floor" class="form-control">
                                                    <?php
                                                    $floor_no =
                                                        $rows['floor_no'];
                                                    $select = mysqli_query(
                                                        $connection,
                                                        "SELECT * FROM add_floor where id='$floor_no'"
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
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Unit No:</label>
                                                <select name="unit_no" id="unit" class="form-control">
                                                <?php
                                                $unit_no = $rows['unit_no'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_units where unit_id='$unit_no'"
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

                                                        $unit_id =
                                                            $row['unit_id'];
                                                        $unit_no =
                                                            $row['unit_no'];
                                                        ?>
                                                            <option value="<?php echo $unit_id; ?>"><?php echo $unit_no; ?></option>
                                                            <?php
                                                    }
                                                } else {
                                                     ?>
                                                            <option value="0">Unit not found</option>
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
                                                <label>Select Owner Name:</label>
                                                <select name="owner_name" class="form-control">
                                                <?php
                                                $owner_id = $rows['owner_id'];
                                                $select = mysqli_query(
                                                    $connection,
                                                    "SELECT * FROM add_owner where owner_id='$owner_id'"
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

                                                        $owner_name =
                                                            $row['owner_name'];
                                                        $owner_id =
                                                            $row['owner_id'];
                                                        ?>
                                                            <option value="<?php echo $owner_id; ?>"><?php echo $owner_name; ?></option>
                                                            <?php
                                                    }
                                                } else {
                                                     ?>
                                                            <option value="0">Owner not found</option>
                                                        <?php
                                                }
                                                ?>
                                                    <?php
                                                    $select = mysqli_query(
                                                        $connection,
                                                        'SELECT * FROM add_owner'
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

                                                            $owner_name =
                                                                $row[
                                                                    'owner_name'
                                                                ];
                                                            $owner_id =
                                                                $row[
                                                                    'owner_id'
                                                                ];
                                                            ?>
                                                            <option value="<?php echo $owner_id; ?>"><?php echo $owner_name; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                         ?>
                                                            <option value="0">Owner not found</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rent:</label>
                                                <input type="number" name="rent" class="form-control" value="<?php echo $rows[
                                                    'lease_rent'
                                                ]; ?>">
                                            </div>
                                            </div> 
                                          </div>

                                    
                                                                         
                                         <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Issue Date:</label>
                                                <input type="text" name="issue_date" class="form-control"  value="<?php echo $rows[
                                                    'issue_date'
                                                ]; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status:</label>
                                                <select name="status" id="" class="form-control" >
                                                <?php if (
                                                    $rows['status'] == 0
                                                ) { ?>
                                                <option value="0">Active</option>
                                                    <?php } else { ?>
                                                 <option value="1">In-Active</option>
                                                    <?php } ?>
                                                 <option value="0">Active</option>
                                                <option value="1">In-Active</option>
                                                </select>
                                            </div>
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
        url: "get_units.php",
        type: "POST",
        data: { woner_floor_id: floor_no },
        success: function(data) {
          $("#unit").html(data);
          $("#unit").trigger("change"); // Trigger change event manually
        }
      });
    } else {
      $("#unit").html("<option value=''>Select a unit</option>");
      $("#renter_name").val("").prop("disabled", true);
    }
  });

  $("#unit").on("change", function() {
    var unit_id = $(this).val();
    if (unit_id != "") {
      $.ajax({
        url: "get_renter.php",
        type: "POST",
        data: { unit_id: unit_id },
        dataType: "JSON",
        success: function(data) {
          $("#renter_name").val(data.t_name).prop("disabled", true);
          $("#renter_id").val(data.tid).prop("disabled", false);
        }
      });
    } else {
      $("#renter_name").val("").prop("disabled", true);
    }
  });

});
</script>
<script src="js/emp_validation.js"></script>
<?php include 'include/footerlinks.php'; ?>
</body>
</html>