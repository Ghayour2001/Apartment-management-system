<?php
if (isset($_POST['SUBMIT'])) {
    $username = htmlentities(
        mysqli_real_escape_string($connection, $_POST['username'])
    );
    $currentPassword = htmlentities(
        mysqli_real_escape_string($connection, $_POST['current_password'])
    );
    $newPassword = htmlentities(
        mysqli_real_escape_string($connection, $_POST['new_password'])
    );
    $designation = htmlentities(
        mysqli_real_escape_string($connection, $_POST['designation'])
    );
    $loggedInDesignation = $_SESSION['desig_password_change']; // Get the logged-in user's designation

    if ($designation == $loggedInDesignation) {
        // Check if the provided designation matches the logged-in user's designation
        if ($designation == 'super_admin') {
            $result = mysqli_query(
                $connection,
                "SELECT * FROM super_admin WHERE username='$username' AND password='$currentPassword'"
            );
            $row = mysqli_fetch_array($result);

            if ($row) {
                $updateResult = mysqli_query(
                    $connection,
                    "UPDATE super_admin SET password='$newPassword' WHERE s_a_id={$row['s_a_id']}"
                );

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to change the password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password. Password change failed.!');</script>";
            }
        } elseif ($designation == 'admin') {
            $result = mysqli_query(
                $connection,
                "SELECT * FROM admin WHERE username='$username' AND password='$currentPassword'"
            );
            $row = mysqli_fetch_array($result);

            if ($row) {
                $updateResult = mysqli_query(
                    $connection,
                    "UPDATE admin SET password='$newPassword' WHERE a_id={$row['a_id']}"
                );

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to change the password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password. Password change failed!');</script>";
            }
        } elseif ($designation == 'owner') {
            $result = mysqli_query(
                $connection,
                "SELECT * FROM add_owner WHERE owner_username='$username' AND owner_password='$currentPassword'"
            );
            $row = mysqli_fetch_array($result);

            if ($row) {
                $updateResult = mysqli_query(
                    $connection,
                    "UPDATE add_owner SET owner_password='$newPassword' WHERE owner_id={$row['owner_id']}"
                );

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to change the password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password. Password change failed!');</script>";
            }
        } elseif ($designation == 'tenant') {
            $result = mysqli_query(
                $connection,
                "SELECT * FROM add_tenant WHERE username='$username' AND t_password='$currentPassword'"
            );
            $row = mysqli_fetch_array($result);

            if ($row) {
                $updateResult = mysqli_query(
                    $connection,
                    "UPDATE add_tenant SET t_password='$newPassword' WHERE tid={$row['tid']}"
                );

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to change the password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password. Password change failed!');</script>";
            }
        } elseif ($designation == 'employee') {
            $result = mysqli_query(
                $connection,
                "SELECT * FROM employee WHERE emp_username='$username' AND emp_password='$currentPassword'"
            );
            $row = mysqli_fetch_array($result);

            if ($row) {
                $updateResult = mysqli_query(
                    $connection,
                    "UPDATE employee SET emp_password='$newPassword' WHERE emp_id={$row['emp_id']}"
                );

                if ($updateResult) {
                    echo "<script>alert('Password changed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to change the password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid username or password. Password change failed!');</script>";
            }
        } else {
            echo "<script>alert('Invalid designation. Password change failed.');</script>";
        }
    } else {
        echo "<script>alert('Invalid designation. Password change failed.');</script>";
    }
} ?>

<div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="images/1.png" style="max-width: 60px">
                                <span class="user-avatar"> <?php echo $_SESSION[
                                    'name'
                                ]; ?>

                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" data-toggle="modal"data-target="#view<?php echo $_SESSION[
                                    'id'
                                ]; ?>" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                <a class="dropdown-item"  class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </div>                 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    // <!-- profile modal start -->
<div class='modal fade' id='view<?= $_SESSION[
    'id'
] ?>' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel'
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
                                                <img class="img-fluid" src="<?php echo $_SESSION[
                                                    'image'
                                                ]; ?>" alt="" />
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                        <div class="user-profile-name"> <?php echo $_SESSION[
                                            'name'
                                        ]; ?> </div><br>
                                            <div class="user-Location">
                                                <i class="ti-user"></i> <?php echo $_SESSION[
                                                    'username'
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
                                                              <div class="col-md-8">
                                                              <div class="phone-content">
                                                                <span class="contact-title">Phone:</span>
                                                                <span class="phone-number"><?php echo $_SESSION[
                                                                    'contact_no'
                                                                ]; ?></span>
                                                            </div>                                                         
                                                            <div class="email-content">
                                                                <span class="contact-title">Email:</span>
                                                                <span class="contact-email"><?php echo $_SESSION[
                                                                    'email'
                                                                ]; ?></span>
                                                            </div> <div class="email-content">
                                                                <span class="contact-title">Username:</span>
                                                                <span class="contact-email"><?php echo $_SESSION[
                                                                    'username'
                                                                ]; ?></span>
                                                            </div>
                                                            <div class="website-content">
                                                                <span class="contact-title">Designation:</span>
                                                                <span class="contact-website"><?php echo $_SESSION[
                                                                    'designation'
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


<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <select id="" name="designation" class="form-control">
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="owner">Owner</option>
                            <option value="employee">Employee</option>
                            <option value="tenant">Tenant</option>
                        </select>
                    </div>
                    <button type="submit" name="SUBMIT" class="btn btn-primary btn-flat m-b-30 m-t-30">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

