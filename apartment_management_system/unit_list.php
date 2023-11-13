<?php

include 'include/connection.php';
include 'include/session.php';
$notdeleted = isset($_GET['para1']) ? $_GET['para1'] : '';
if ($notdeleted == '1') {
    // Display the flash message
    echo '<script>alert("There are associated owner utilities for this unit. Please delete the related owner utilities first");</script>';

    // Remove para1 from the URL
    echo '<script>history.replaceState({}, "", location.pathname + location.search.replace(/[?&]para1=1/, ""));</script>';
} elseif ($notdeleted == '2') {
    // Display the flash message
    echo '<script>alert("The unit exists in the tenant list. Please delete the related tenant record first.");</script>';

    // Remove para1 from the URL
    echo '<script>history.replaceState({}, "", location.pathname + location.search.replace(/[?&]para1=2/, ""));</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unit List</title>
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
            <div class="col-md-12">
                        <a href="add_unit.php" class="btn btn-info float-right">Add New Unit</a>
                        </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Unit List</h4>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table
                        id="bootstrap-data-table-export"
                        class="display table table-borderd table-hover"  style="overflow-x:auto;"
                      >
                        <thead class="thead-dark text-center">
                        <tr>
                          <th>Id</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Date</th>
                            <th>Tenant Status</th>
                            <th>Owner Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody class="text-center">
                       

                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_units'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) { ?>
                            <td><?php echo $i++; ?></td>
                            <!-- this query is just for select floor no from floor table because unit table we have just floor no id  -->
                            <?php
                            $floor_id = $row['floor_no'];
                            $select = mysqli_query(
                                $connection,
                                "SELECT * FROM add_floor where id = '$floor_id'"
                            );
                            $row2 = mysqli_fetch_assoc($select);
                            ?>
                            <td><?php echo $row2['floor_no']; ?></td>
                            <!-- .....  -->
                            <td><?php echo $row['unit_no']; ?></td>
                            <td><?php echo $row['added_date']; ?></td>
                            <?php if ($row['status'] == 0) { ?>
                            <td><span class="badge badge-pill badge-success"><?php echo 'Available'; ?></span></td>
                            <?php } else { ?>
                            <td><span class="badge badge-pill badge-danger"><?php echo 'Unavailable'; ?></span></td>
                              <?php } ?>
                              <?php if ($row['owner_status'] == 0) { ?>
                            <td><span class="badge badge-pill badge-success"><?php echo 'Available'; ?></span></td>
                            <?php } else { ?>
                            <td><span class="badge badge-pill badge-danger"><?php echo 'Unavailable'; ?></span></td>
                              <?php } ?>
                            
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="update_unit.php?unit_id=<?php echo $row[
                                                                        'unit_id'
                                                                    ]; ?>">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="delete.php?unit_id=<?php echo $row[
                                                                        'unit_id'
                                                                    ]; ?>"
                                                                    onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>
                                                                <!-- <a class="dropdown-item" href="#">Assign</a> -->
                                                            </div>
                                                        </td>
                           
                          </tr>
                          <?php }
                          ?>
                        </tbody>
                        <tfoot class="text-center thead-dark">
                          <tr>
                          <th>Id</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Date</th>
                            <th>Tenant Status</th>
                            <th>Owner Status</th>
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

</html>