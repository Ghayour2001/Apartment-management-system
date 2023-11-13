<?php

include 'include/connection.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Complain List</title>
    <?php include 'include/list_headlinks.php'; ?>
   
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
                    <h4>Complain List</h4>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="display table table-bordered table-hover">
  <thead class="thead-dark text-center">
    <tr>
      <th>Id</th>
      <th>Complaint Title</th>
      <th>Date</th>
      <th>Description</th>
      <th>Complain Status</th>
      <th>Assigned Employee ID</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody class="text-center">
    <?php
    $result = mysqli_query($connection, 'SELECT * FROM add_complain');
    $i = 1;
    while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['c_title']; ?></td>
        <td><?php echo $row['c_date']; ?></td>
        <td><?php echo $row['c_description']; ?></td>
        <td>
 <select class="form-control" onchange="updateStatus(<?php echo $row[
     'complain_id'
 ]; ?> , this.value)">
        <option value="Pending" <?php if ($row['job_status'] == 'Pending') {
            echo 'selected';
        } ?>>Pending</option>
        <option value="On-Hold" <?php if ($row['job_status'] == 'On-Hold') {
            echo 'selected';
        } ?>>On-Hold</option>
        <option value="In-Progress" <?php if (
            $row['job_status'] == 'In-Progress'
        ) {
            echo 'selected';
        } ?>>In-Progress</option>
        <option value="Completed" <?php if ($row['job_status'] == 'Completed') {
            echo 'selected';
        } ?>>Completed</option>
      </select>
    </td>  
       <td>
 <select class="form-control" onchange="updateemployee(<?php echo $row[
     'complain_id'
 ]; ?> , this.value)">
 <?php if ($row['assign_employee'] == '') { ?>
 <option value="">--Select Employee--</option>
     <?php
     $result1 = mysqli_query($connection, 'SELECT * FROM employee');
     while ($row1 = mysqli_fetch_array($result1)) { ?>
        <option value="<?php echo $row1['emp_name']; ?>"><?php echo $row1[
    'emp_name'
]; ?></option>
        <?php }
     } elseif ($row['assign_employee'] !== '') { ?>
      <option value=""><?php echo $row['assign_employee']; ?></option>
          <?php
          $result1 = mysqli_query($connection, 'SELECT * FROM employee');
          while ($row1 = mysqli_fetch_array($result1)) { ?>
             <option value="<?php echo $row1['emp_name']; ?>"><?php echo $row1[
    'emp_name'
]; ?></option>
             <?php }
          } ?>
      </select>
    </td>
    
        <td>
          <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="text-muted sr-only">Action</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="delete.php?complain_id=<?php echo $row[
                'complain_id'
            ]; ?>" onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>
          </div>
        </td>
      </tr>
    <?php }
    ?>
  </tbody>

  <tfoot class="text-center thead-dark">
    <tr>
    <th>Id</th>
      <th>Complaint Title</th>
      <th>Date</th>
      <th>Description</th>
      <th>Complain Status</th>
      <th>Assigned Employee ID</th>
      <th>Action</th>
    </tr>
  </tfoot>
</table>



                    </div>
                  </div>
                </div>
                <!-- /# card -->
              </div>
              <!-- /# column -->
            </div>
            <!-- /# row -->

            <div class="row">
              <div class="col-lg-12">
                <div class="footer">
                  <p>
                   
                  </p>
                </div>
              </div>
            </div>
          </section>
            </div>
        </div>
    </div>
    <?php include 'include/list_footerlinks.php'; ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function updateStatus(id, status) {
  $.ajax({
    url: 'update_complain_status.php',
    type: 'post',
    data: {id: id, status: status},
    success: function(response) {
      // Do something here if the update was successful
    },
    error: function() {
      alert('Error updating status');
    }
  });
} function updateemployee(id, employee) {
  $.ajax({
    url: 'update_complain_status.php',
    type: 'post',
    data: {id: id, employee: employee},
    success: function(response) {
      // Do something here if the update was successful
      
    },
    error: function() {
      alert('Error updating employee');
    }
  });
}
</script>

</html>