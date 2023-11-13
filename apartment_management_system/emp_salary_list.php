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

    <title>Employee Salary List</title>
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
                        <a href="add_employee_salary.php" class="btn btn-info float-right">Add Employee Salary</a>
                        </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Employee Salary List</h4>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table
                        id="bootstrap-data-table-export"
                        class="display table table-borderd table-hover"
                      >
                        <thead class="thead-dark text-center">
                        <tr>
                          <th>S.No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Salary Month</th>
                            <th>Salary Year</th>
                            <th>Salary Per Month</th>
                            <th>Issue Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody class="text-center">
                       

                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_employee_salary'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) { ?>
                            <td><?php echo $i++; ?></td>
                            <?php
                            $employee_name = $row['emp_name'];
                            $sql1 = "SELECT * FROM employee where emp_id='$employee_name'";
                            $result1 = mysqli_query($connection, $sql1);
                            $row2 = mysqli_fetch_array($result1);
                            ?>
                            <td><?php echo $row2['emp_name']; ?></td>
                            <td><?php echo $row['designation']; ?></td>
                            <td><?php echo $row['month_id']; ?></td>
                            <td><?php echo $row['xyear']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['issue_date']; ?></td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="update_employee_salary.php?emp_salary_id=<?php echo $row[
                                                                        'emp_id'
                                                                    ]; ?>">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="delete.php?emp_salary_id=<?php echo $row[
                                                                        'emp_id'
                                                                    ]; ?>"
                                                                    onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>
                                                               
                                                            </div>
                                                        </td>
                           
                          </tr>
                          <?php }
                          ?>
                        </tbody>
                        <tfoot class="text-center thead-dark">
                          <tr>
                            <th>S.No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Salary Month</th>
                            <th>Salary Year</th>
                            <th>Salary Per Month</th>
                            <th>Issue Date</th>
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