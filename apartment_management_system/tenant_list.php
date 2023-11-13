<?php

include 'include/connection.php';
include 'include/session.php';
$notdeleted = isset($_GET['para1']) ? $_GET['para1'] : '';
if ($notdeleted == '1') {
    // Display the flash message
    echo '<script>alert("There are associated records in the rent list. Please delete the related records first.");</script>';

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

    <title>Tenant List</title>
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
                        <a href="add_tenant.php" class="btn btn-info float-right">Add Tenant</a>
                        </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Tenant List</h4>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive"  style="overflow-x:auto;">
                      <table
                        id="bootstrap-data-table-export"
                        class="display table table-borderd table-hover"
                      >
                        <thead class="thead-dark text-center">
                        <tr>
                          <th>S.No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Rented Unit No</th>
                            <th>Advance Payment</th>
                            <th>Payment Per Month</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody class="text-center">
                       

                          <tr>
                          <?php
                          $result = mysqli_query(
                              $connection,
                              'SELECT * FROM add_tenant'
                          );
                          $i = 1;
                          while ($row = mysqli_fetch_array($result)) {
                              $tid = $row['tid']; ?>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['t_name']; ?></td>
                            <td><?php echo $row['t_contact']; ?></td>
                           
                            <?php
                            $unit_no = $row['t_unit_no'];
                            $select = mysqli_query(
                                $connection,
                                "SELECT * FROM add_units where unit_id = '$unit_no'
                             "
                            );
                            $row1 = mysqli_fetch_array($select);
                            ?>
                            <td><?php echo $row1['unit_no']; ?></td>
                            <td><?php echo $row['t_advance']; ?></td>
                            <td><?php echo $row['t_rent_pm']; ?></td>
                            <td><img width="100" src="<?php echo $row[
                                'image'
                            ]; ?>" alt=""></td>
                            <?php if ($row['t_status'] == 0) { ?>
                            <td><span class="badge badge-pill badge-success"><?php echo 'Active'; ?></span></td>
                            <?php } else { ?>
                            <td><span class="badge badge-pill badge-danger"><?php echo 'Unactive'; ?></span></td>
                              <?php } ?>
                            
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="update_tenant.php?tenant_id=<?php echo $row[
                                                                        'tid'
                                                                    ]; ?>">Edit</a>
                                                                <a class="dropdown-item"
                                                                href="delete.php?tenant_id=<?php echo $row[
                                                                    'tid'
                                                                ]; ?>&tenant_unit_no=<?php echo $row[
    't_unit_no'
]; ?>"
                                                                onclick="return confirm('Are you sure you want to delete the data?');">
                                                                Remove
                                                                </a>

                                                                    <a class="dropdown-item"
                                                                data-toggle="modal"
                                                                data-target="#view<?php echo $tid; ?>">View</a>
                                                                <a class="dropdown-item"
                                                                    href="add_rent.php?tenant_id=<?php echo $row[
                                                                        'tid'
                                                                    ]; ?>">Add Rent</a>
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
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Rented Unit No</th>
                            <th>Advance Payment</th>
                            <th>Payment Per Month</th>
                            <th>Image</th>
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
            <!-- /# modal -->
            <?php
            // <!-- profile modal start -->
            $get_data =
                'SELECT * FROM add_tenant INNER JOIN add_units ON add_tenant.t_unit_no = add_units.unit_id INNER JOIN add_floor ON add_tenant.t_floor_no = add_floor.id ';
            $run_data = mysqli_query($connection, $get_data);

            while ($row = mysqli_fetch_array($run_data)) {
                $tid =
                    $row[
                        'tid'
                    ]; ?> <div class='modal fade' id='view<?= $tid ?>' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel'
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
                                            <div class="user-photo m-b-30">
                                                <img class="img-fluid" src="<?php echo $row[
                                                    'image'
                                                ]; ?>" alt="" />
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                        <div class="user-profile-name"> <?php echo $row[
                                            't_name'
                                        ]; ?> </div><br>
                                            <div class="user-Location">
                                                <i class="ti-location-pin"></i> <?php echo $row[
                                                    't_address'
                                                ]; ?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                                                                  
                                            <div class="custom-tab user-profile-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#1" aria-controls="1" role="tab"
                                                            data-toggle="tab">About</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="1">
                                                        <div class="contact-information">
                                                            <h4>Personal Details</h4>
                                                            <div class="row">
                                                              <div class="col-md-6">
                                                              <div class="phone-content">
                                                                <span class="contact-title">Phone:</span>
                                                                <span class="phone-number"><?php echo $row[
                                                                    't_contact'
                                                                ]; ?></span>
                                                            </div>                                                         
                                                            <div class="email-content">
                                                                <span class="contact-title">Email:</span>
                                                                <span class="contact-email"><?php echo $row[
                                                                    't_email'
                                                                ]; ?></span>
                                                            </div> <div class="email-content">
                                                                <span class="contact-title">Username:</span>
                                                                <span class="contact-email"><?php echo $row[
                                                                    'username'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="website-content">
                                                                <span class="contact-title">Cnic:</span>
                                                                <span class="contact-website"><?php echo $row[
                                                                    't_nid'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="skype-content">
                                                                <span class="contact-title">Status:</span>
                                                                <span class="contact-skype"><?php echo $row[
                                                                    't_status'
                                                                ] == 0
                                                                    ? 'Active'
                                                                    : 'Un-Active'; ?></span>
                                                            </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                              <div class="phone-content">
                                                                <span class="contact-title">Floor No:</span>
                                                                <span class="phone-number"><?php echo $row[
                                                                    'floor_no'
                                                                ]; ?></span>
                                                            </div>                                                         
                                                            <div class="email-content">
                                                                <span class="contact-title">Unit No:</span>
                                                                <span class="contact-email"><?php echo $row[
                                                                    'unit_no'
                                                                ]; ?></span>
                                                            </div> <div class="email-content">
                                                                <span class="contact-title">Advance Rent:</span>
                                                                <span class="contact-email"><?php echo $row[
                                                                    't_advance'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="website-content">
                                                                <span class="contact-title">Rent Per Month:</span>
                                                                <span class="contact-website"><?php echo $row[
                                                                    't_rent_pm'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="skype-content">
                                                                <span class="contact-title">Date:</span>
                                                                <span class="contact-website"><?php echo $row[
                                                                    't_date'
                                                                ]; ?></span>
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