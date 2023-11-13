<?php

include 'include/connection.php';
include 'include/session.php';
$visitor_id = $_REQUEST['visitor_id'];
$result = mysqli_query(
    $connection,
    "SELECT * FROM visitor where id = '$visitor_id' "
);
$rows = mysqli_fetch_array($result);
$name = $rows['name'];
$address = $rows['address'];
$mobile = $rows['mobile'];
$entry_date = $rows['entry_date'];
$floor_no = $rows['floor_no'];
$unit_no = $rows['unit_no'];
$in_time = $rows['in_time'];
$out_time = $rows['out_time'];

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
        "UPDATE visitor SET entry_date='$entry_date', name='$visitor_name', mobile='$mobile', address='$address', floor_no='$floor_no', unit_no='$unit_no', in_time='$in_time', out_time='$out_time' WHERE id='$visitor_id'"
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
                                    <h4>Update Visitor</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form"  > 
                                   
                                    <form id="visitor" method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="visitor_name" value="<?php echo $name; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"value="<?php echo $address; ?>">
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="entry_date">Entry Date</label>
                                        <input type="date" class="form-control" id="entry_date" name="entry_date" value="<?php echo $entry_date; ?>">
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                              <div class="form-group">
                            <label>Floor No</label>
                             <select name="floor_no" id="floor" class="form-control">
                            <?php
                            $floor_id = $rows['floor_no'];
                            $select = mysqli_query(
                                $connection,
                                "SELECT * FROM add_floor where id = '$floor_id' "
                            );
                            $row1 = mysqli_fetch_array($select);
                            ?>
                                    <option value="<?php echo $row1[
                                        'id'
                                    ]; ?>"><?php echo $row1[
    'floor_no'
]; ?></option>
                            </select>
                             </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                             <label>Unit</label>
                            <select name="unit_no" id="unit" class="form-control">
                            <?php
                            $unit_no = $rows['unit_no'];
                            $select = mysqli_query(
                                $connection,
                                "SELECT * FROM add_units where unit_id = '$unit_no' "
                            );
                            $row3 = mysqli_fetch_array($select);
                            ?>
                                                    <option value="<?php echo $row3[
                                                        'unit_id'
                                                    ]; ?>"><?php echo $row3[
    'unit_no'
]; ?></option>
                            </select>
                            </div>
                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="in_time">In Time</label>
                                        <input type="time" class="form-control" id="in_time" name="in_time" value="<?php echo $in_time; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="out_time">Out Time</label>
                                        <input type="time" class="form-control" id="out_time" name="out_time" value="<?php echo $out_time; ?>">
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
    $(document).ready(function(){
        function loadData(type, category_id){
            $.ajax({
                url : "ajax_for_update_visitor.php",
                type : "POST",
                data : {type : type, id : category_id},
                success : function(data){
                    if(type == "for_visitor"){
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
                loadData("for_visitor", floor)
            }else{
                $("#unit").html("");
            }
        })
    });
</script>
</body>


</html>