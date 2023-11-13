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
                            <th>Paid Rent</th>


                          </tr>
                        </thead>

                        <tbody class="text-center">
                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              "SELECT * FROM add_owner_utility JOIN add_rent ON add_owner_utility.floor_no = add_rent.floor_no JOIN add_floor ON add_owner_utility.floor_no=add_floor.id JOIN add_units ON add_owner_utility.unit_no=add_units.unit_id WHERE add_owner_utility.floor_no = add_rent.floor_no AND add_owner_utility.unit_no = add_rent.unit_no AND add_owner_utility.owner_id='{$_SESSION['id']}'"
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
  $unit_no = $row['unit_id'];
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
<td><?php echo $row['rent']; ?></td>
<?php
$bills = [
    $row['water_bill'],
    $row['electric_bill'],
    $row['gas_bill'],
    $row['security_bill'],
    $row['utility_bill'],
    $row['other_bill'],
];
$paid_rent = $row['paid_rent'];
$rent_without_bills = $paid_rent - array_sum($bills);
?>
<td><?php echo $rent_without_bills; ?></td>
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
                            <th>Paid Rent</th>

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