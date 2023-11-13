<?php

include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['submit'])) {
    $entry_date = $_POST['entry_date'];
    $visitor_name = $_POST['visitor_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $floor_no = $_POST['floor_no'];
    $unit_no = $_POST['unit_no'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];

    $result = mysqli_query(
        $connection,
        "INSERT INTO visitor(entry_date, name, mobile, address, floor_no, unit_no, in_time, out_time) 
        VALUES ('$entry_date', '$visitor_name', '$mobile', '$address', '$floor_no', '$unit_no', '$in_time', '$out_time')"
    );

    if ($result == true) {
        $_SESSION['status'] = 'Data has been inserted successfully';
        $_SESSION['status_code'] = 'success';
    } else {
        $_SESSION['status'] = 'Data is not inserted';
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

    <title>Complain Information </title>

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
                                    <h4>Add Visitor</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form"  > 
                                    <form id="visitor" method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="visitor_name">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="entry_date">Entry Date</label>
                                        <input type="date" class="form-control" id="entry_date" name="entry_date">
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                              <div class="form-group">
                            <label>Floor No</label>
                             <select name="floor_no" id="floor" class="form-control">
                            <option value="">--Select Floor--</option>
                            <?php
                            $select = mysqli_query(
                                $connection,
                                'SELECT * FROM add_floor'
                            );
                            $count = mysqli_num_rows($select);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($select)) {

                                    $id = $row['id'];
                                    $floor_no = $row['floor_no'];
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
                             <label>Available Unit No</label>
                            <select name="unit_no" id="unit" class="form-control">
                            <option value="">Select Unit</option>
                            </select>
                            </div>
                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="in_time">In Time</label>
                                        <input type="time" class="form-control" id="in_time" name="in_time">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="out_time">Out Time</label>
                                        <input type="time" class="form-control" id="out_time" name="out_time">
                                    </div>
                                    </div>
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




   
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="js/cdn3.6.3.js"></script>
     <script src="js/validation_plugins.js"></script>
<script src="js/visitor_validation.js"></script>

<?php include 'include/footerlinks.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
  $("#floor").on("change", function() {
    var floor_no = $(this).val();
    if (floor_no != "") {
      $.ajax({
        url: "get_visitor.php",
        type: "POST",
        data: { visitor_floor_id: floor_no },
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
</body>


</html>