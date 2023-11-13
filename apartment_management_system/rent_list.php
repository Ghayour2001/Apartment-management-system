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

    <title>Rent List</title>
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
                    <h4>Rent List</h4>
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
                            <th>Renter Name</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Rent Month</th>
                            <th>Total Rent</th>
                            <th>Dues</th>
                            <th>Bill Status</th>
                            <th>Action</th>

                          </tr>
                        </thead>

                        <tbody class="text-center">
                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_rent'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) { ?>
                            <td><?php echo $i++; ?></td>
                            <?php
                            $rid = $row['rid'];
                            $sql1 = "SELECT * FROM add_tenant where tid='$rid'";
                            $result1 = mysqli_query($connection, $sql1);
                            $row2 = mysqli_fetch_array($result1);

                            if (isset($row2['t_name'])) { ?>
                              <td><?php echo $row2['t_name']; ?></td>
                              <?php } else { ?>
                              <td><?php echo 'Data Not Found'; ?></td>
                              <?php }
                            ?>
                          
                            <?php
                            $floor_no = $row['floor_no'];
                            $sql2 = "SELECT * FROM add_floor where id='$floor_no'";
                            $result2 = mysqli_query($connection, $sql2);
                            $row3 = mysqli_fetch_array($result2);

                            if (isset($row3['floor_no'])) { ?>
                              <td><?php echo $row3['floor_no']; ?></td>
                              <?php } else { ?>
                              <td><?php echo 'Floor Not Found'; ?></td>
                              <?php }
                            ?>  <?php
  $unit_no = $row['unit_no'];
  $sql3 = "SELECT * FROM add_units where unit_id='$unit_no'";
  $result3 = mysqli_query($connection, $sql3);
  $row4 = mysqli_fetch_array($result3);

  if (isset($row4['unit_no'])) { ?>
                              <td><?php echo $row4['unit_no']; ?></td>
                              <?php } else { ?>
                              <td><?php echo 'Unit Not Found'; ?></td>
                              <?php }
  ?> <?php
 $month_id = $row['month_id'];
 $sql4 = "SELECT * FROM add_month where m_id='$month_id'";
 $result4 = mysqli_query($connection, $sql4);
 $row5 = mysqli_fetch_array($result4);
 if (isset($row5['month_name'])) { ?>
                              <td><?php echo $row5['month_name']; ?></td>
                              <?php } else { ?>
                              <td><?php echo 'Month Not Found'; ?></td>
                              <?php }
 ?>
<td><?php echo $row['total_rent']; ?></td>

 <td><?php echo $row['remaining_rent']; ?></td>

 <?php if ($row['remaining_rent'] == '') { ?>
  <td width="100" class="btn btn-danger btn-rounded  m-b-10 m-l-5"> Un-Paid</td>
 <?php } elseif ($row['remaining_rent'] > 0) { ?>
  <td width="100" class="btn btn-warning btn-rounded  m-b-10 m-l-5"> Half-Paid</td>
 <?php } elseif ($row['remaining_rent'] == 0) { ?>
  <td width="100" class="btn btn-success btn-rounded  m-b-10 m-l-5"> Fully-Paid</td>
 <?php } ?>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="update_rent.php?rent_id=<?php echo $row[
                                                                        'rent_id'
                                                                    ]; ?>">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="delete.php?rent_id=<?php echo $row[
                                                                        'rent_id'
                                                                    ]; ?>"
                                                                    onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>
                                                                    <a href="add_tenant_pay_rent.php?rent_id=<?php echo $row[
                                                                        'rent_id'
                                                                    ]; ?>" class="dropdown-item" >Pay Bill</a>
                                                                    <a href="tenant_invoice.php?rent_id=<?php echo $row[
                                                                        'rent_id'
                                                                    ]; ?>" class="dropdown-item" >Invoice</a>
                                                            </div>
                                                        </td>
                           
                          </tr>
                          <?php }
                          ?>
                        </tbody>
                        <tfoot class="text-center thead-dark">
                        <tr>
                          <th>S.No</th>
                            <th>Renter Name</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Rent Month</th>
                            <th>Total Rent</th>
                            <th>Dues</th>
                            <th>Bill Status</th>
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