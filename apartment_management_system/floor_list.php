<?php

include 'include/connection.php';
include 'include/session.php';
$notdeleted = isset($_GET['para1']) ? $_GET['para1'] : '';
if ($notdeleted == '1') {
    // Display the flash message
    echo '<script>alert("There are associated units for this floor. Please delete the related units first.");</script>';

    // Remove para1 from the URL
    echo '<script>history.replaceState({}, "", location.pathname + location.search.replace(/[?&]para1=1/, ""));</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Floor List</title>
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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                   
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
                        <a href="add_floor.php" class="btn btn-primary float-right">Add New Floor</a>
                        </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Floor List</h4>
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
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody class="text-center">
                       

                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_floor'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) { ?>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['floor_no']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal"
                                      type="button" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item"
                                      href="update_floor.php?floor_id=<?php echo $row[
                                          'id'
                                      ]; ?>">Edit</a>
                                  <a class="dropdown-item"
                                      href="delete.php?floor_id=<?php echo $row[
                                          'id'
                                      ]; ?>"
                                      onclick="return confirm('Are you sure to Delete the Data?');">
                                      Remove
                                  </a>
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
                            <th>Date</th>
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