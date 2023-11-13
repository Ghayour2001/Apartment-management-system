<?php
include 'include/connection.php';
session_start();

if (isset($_POST['submit'])) {
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
                    echo 'Failed to change the password.';
                }
            } else {
                echo 'Invalid username or password. Password change failed.';
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
                    echo 'Failed to change the password.';
                }
            } else {
                echo 'Invalid username or password. Password change failed.';
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
                    echo 'Failed to change the password.';
                }
            } else {
                echo 'Invalid username or password. Password change failed.';
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
                    echo 'Failed to change the password.';
                }
            } else {
                echo 'Invalid username or password. Password change failed.';
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
                    echo 'Failed to change the password.';
                }
            } else {
                echo 'Invalid username or password. Password change failed.';
            }
        } else {
            echo "<script>alert('Invalid designation. Password change failed.');</script>";
        }
    } else {
        echo "<script>alert('Invalid designation. Password change failed.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password - Super Admin</title>
    <style>
        .error {
            color: red !important;
        }
    </style>
    <?php include 'include/headlinks.php'; ?>
</head>


<!---links for validation -->

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/validation.js"></script>
<?php include 'include/footerlinks.php'; ?>
</html>
