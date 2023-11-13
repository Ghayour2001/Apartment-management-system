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

    <title>Owner Utility List</title>
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
                        <a href="add_owner_utility.php" class="btn btn-info float-right">Add Owner Utility</a>
                        </div>
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
                            <th>Owner Name</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Lease Rent</th>
                            <th>Issue Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody class="text-center">
                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_owner_utility'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) {
                              $owner_id = $row['owner_utility_id']; ?>
                            <td><?php echo $i++; ?></td>
                            <?php
                            $owner_id = $row['owner_id'];
                            $sql1 = "SELECT * FROM add_owner where owner_id='$owner_id'";
                            $result1 = mysqli_query($connection, $sql1);
                            $row2 = mysqli_fetch_array($result1);

                            if (isset($row2['owner_name'])) { ?>
                              <td><?php echo $row2['owner_name']; ?></td>
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
  ?>
 
 <td><?php echo $row['lease_rent']; ?></td>
 <td><?php echo $row['issue_date']; ?></td>
 <td><?php echo $row['status'] == 0 ? 'Active' : 'In-Active'; ?></td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="update_owner_utility.php?owner_utility_id=<?php echo $row[
                                                                        'owner_utility_id'
                                                                    ]; ?>">Edit</a>
                                                                <a class="dropdown-item" href="delete.php?owner_utility_id=<?php echo $row[
                                                                    'owner_utility_id'
                                                                ]; ?>&unit_no=<?php echo $row[
    'unit_no'
]; ?>" onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>

                                                                    <a class="dropdown-item"
                                                                data-toggle="modal"
                                                                data-target="#view<?php echo $owner_id; ?>">View</a>
                                                                <a href="owner_invoice.php?owner_utility_id=<?php echo $row[
                                                                    'owner_utility_id'
                                                                ]; ?>" class="dropdown-item" >Invoice</a>
                                                            </div>
                                                        </td>
                           
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                        <tfoot class="text-center thead-dark">
                        <tr>
                        <th>S.No</th>
                            <th>Owner Name</th>
                            <th>Floor No</th>
                            <th>Unit No</th>
                            <th>Lease Rent</th>
                            <th>Issue Date</th>
                            <th>Status</th>
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
            <!-- modal-->
             <?php
             // <!-- profile modal start -->
             $get_data = 'SELECT * FROM add_owner_utility';
             $run_data = mysqli_query($connection, $get_data);

             while ($rows = mysqli_fetch_array($run_data)) {
                 $owner_id =
                     $rows[
                         'owner_utility_id'
                     ]; ?> <div class='modal fade' id='view<?= $owner_id ?>' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel'
                        aria-hidden='true'>
                        <div class='modal-dialog modal-lg col-md-8'>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Profile Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                        <?php
                                        $owner_id = $rows['owner_id'];
                                        $sql2 = "SELECT * FROM add_owner where owner_id='$owner_id'";
                                        $result2 = mysqli_query(
                                            $connection,
                                            $sql2
                                        );
                                        $row3 = mysqli_fetch_array($result2);
                                        if ($row3['owner_name']) {
                                        }
                                        ?>
                                          <div class="user-profile-name"><span class="contact-title">Owner Name:</span></div>
                                             <div class="user-profile-name"> <?php echo $row3[
                                                 'owner_name'
                                             ]; ?> </div>
                                        </div> <div class="col-lg-4">
                                        <?php
                                        $floor_no = $rows['floor_no'];
                                        $sql4 = "SELECT * FROM add_floor where id='$floor_no'";
                                        $result4 = mysqli_query(
                                            $connection,
                                            $sql4
                                        );
                                        $row4 = mysqli_fetch_array($result4);
                                        ?>
                                         <div class="user-profile-name"><span class="contact-title">Floor No:</span></div>
                                             <div class="user-profile-name"> <?php echo $row4[
                                                 'floor_no'
                                             ]; ?> </div>
                                        </div> <div class="col-lg-4">
                                        <?php
                                        $unit_id = $rows['unit_no'];
                                        $sql5 = "SELECT * FROM add_units where unit_id='$unit_id'";
                                        $result5 = mysqli_query(
                                            $connection,
                                            $sql5
                                        );
                                        $row5 = mysqli_fetch_array($result5);
                                        ?>
                                         <div class="user-profile-name"><span class="contact-title">Unit No:</span></div>
                                             <div class="user-profile-name"> <?php echo $row5[
                                                 'unit_no'
                                             ]; ?> </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                                                                  
                                            <div class="custom-tab user-profile-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#1" aria-controls="1" role="tab"
                                                            data-toggle="tab">Bill Details</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="1">
                                                       <div class="row">
                                                        <div class="col-md-6">
                                                        <!-- <h4>Bill Details</h4> -->
                                                            <div class="phone-content">
                                                                <span class="contact-title">Water Bill:</span>
                                                                <span class="phone-number"><?php echo $rows[
                                                                    'water_bill'
                                                                ]; ?></span>
                                                            </div>                                                         
                                                            <div class="email-content">
                                                                <span class="contact-title">Electric Bill:</span>
                                                                <span class="contact-email"><?php echo $rows[
                                                                    'electric_bill'
                                                                ]; ?></span>
                                                            </div> <div class="email-content">
                                                                <span class="contact-title">Gas Bill:</span>
                                                                <span class="contact-email"><?php echo $rows[
                                                                    'gas_bill'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="website-content">
                                                                <span class="contact-title">Security Bill:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'security_bill'
                                                                ]; ?></span>
                                                            </div><div class="website-content">
                                                                <span class="contact-title">Cnic:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'security_bill'
                                                                ]; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="website-content">
                                                                <span class="contact-title">Utility Bill:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'utility_bill'
                                                                ]; ?></span>
                                                            </div> <div class="website-content">
                                                                <span class="contact-title">Other Bill:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'utility_bill'
                                                                ]; ?></span>
                                                            </div>
                                                        <div class="website-content">
                                                                <span class="contact-title">Total Rent:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'total_rent'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="website-content">
                                                                <span class="contact-title">Issue Date:</span>
                                                                <span class="contact-website"><?php echo $rows[
                                                                    'total_rent'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="skype-content">
                                                                <span class="contact-title">Status:</span>
                                                                <span class="contact-skype"><?php echo $rows[
                                                                    'status'
                                                                ] == 0
                                                                    ? 'Active'
                                                                    : 'Un-Active'; ?></span>
                                                            </div>
                                                        </div>
                                                       </div>
                                                           
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>


            <?php
             }
             ?>

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