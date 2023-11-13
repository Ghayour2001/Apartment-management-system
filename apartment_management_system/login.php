<?php
include 'include/connection.php';
session_start();
if (isset($_POST['submit'])) {
    $username = htmlentities(
        mysqli_real_escape_string($connection, $_POST['username'])
    );
    $password = htmlentities(
        mysqli_real_escape_string($connection, $_POST['password'])
    );
    $designation = $_SESSION['designation'] = htmlentities(
        mysqli_real_escape_string($connection, $_POST['designation'])
    );
    if ($designation == 'super_admin') {
        $result = mysqli_query(
            $connection,
            "SELECT * FROM super_admin where username='$username' and password='$password'"
        );
        $row = mysqli_fetch_Array($result);
        if ($row > 0) {
            $_SESSION['id'] = $row['s_a_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['contact_no'] = $row['contact_no'];
            $_SESSION['designation'] = 'Super Admin';
            $_SESSION['desig_password_change'] = 'super_admin';
            $_SESSION['image'] = '';
            header('location: index.php');
        }
    } elseif ($designation == 'admin') {
        $result = mysqli_query(
            $connection,
            "SELECT * FROM admin where username='$username' and password='$password'"
        );
        $row = mysqli_fetch_Array($result);
        if ($row > 0) {
            $_SESSION['id'] = $row['a_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['contact_no'] = $row['contact_no'];
            $_SESSION['designation'] = 'Admin';
            $_SESSION['desig_password_change'] = 'admin';
            $_SESSION['image'] = $row['image'];
            header('location: index.php');
        }
    } elseif ($designation == 'owner') {
        $result = mysqli_query(
            $connection,
            "SELECT * FROM add_owner where owner_username='$username' and owner_password='$password'"
        );
        $row = mysqli_fetch_Array($result);
        if ($row > 0) {
            $_SESSION['id'] = $row['owner_id'];
            $_SESSION['username'] = $row['owner_username'];
            $_SESSION['password'] = $row['owner_password'];
            $_SESSION['name'] = $row['owner_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['owner_email'];
            $_SESSION['contact_no'] = $row['owner_contact'];
            $_SESSION['image'] = $row['owner_image'];
            $_SESSION['designation'] = 'Owner';
            $_SESSION['desig_password_change'] = 'owner';
            header('location: index.php');
        }
    } elseif ($designation == 'tenant') {
        $result = mysqli_query(
            $connection,
            "SELECT * FROM add_tenant where username='$username' and t_password='$password'"
        );
        $row = mysqli_fetch_Array($result);
        if ($row > 0) {
            $_SESSION['id'] = $row['tid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['t_password'];
            $_SESSION['name'] = $row['t_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['t_email'];
            $_SESSION['contact_no'] = $row['t_contact'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['designation'] = 'Tenant';
            $_SESSION['desig_password_change'] = 'tenant';
            header('location: index.php');
        }
    } elseif ($designation == 'employee') {
        $result = mysqli_query(
            $connection,
            "SELECT * FROM employee where emp_username='$username' and emp_password='$password'"
        );
        $row = mysqli_fetch_Array($result);
        if ($row > 0) {
            $_SESSION['id'] = $row['emp_id'];
            $_SESSION['username'] = $row['emp_username'];
            $_SESSION['password'] = $row['emp_password'];
            $_SESSION['name'] = $row['emp_name'];
            $_SESSION['role'] = $row['emp_role'];
            $_SESSION['email'] = $row['emp_email'];
            $_SESSION['contact_no'] = $row['emp_contact'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['designation'] = 'Employee';
            $_SESSION['desig_password_change'] = 'employee';
            header('location: index.php');
        }
    } else {
        echo 'select correct designation';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login to AMS</title>
    <style>
    .error{
        color: red !important;
    }
</style>
<?php include 'include/headlinks.php'; ?>


</head>

<body class="bg-secondary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.html"><span>AMS</span></a>
                        </div>
                        <div class="login-form">
                            <h4>LOGIN TO AMS</h4>
                            <form id="frm" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
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
                                <div class="checkbox">
                                    <label>
										<input type="checkbox"> Remember Me
									</label>
                                    <label class="pull-right">
										<a href="#">Forgotten Password?</a>
									</label>

                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                             
                                <!-- <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!---links for validation -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/validation.js"></script>
</html>