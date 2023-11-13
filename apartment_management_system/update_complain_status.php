<?php
// Include database connection
include 'include/connection.php';
include 'include/session.php';

// Check if data is sent through AJAX
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update status in database
    $query = "UPDATE add_complain SET job_status='$status' WHERE complain_id=$id";
    $result = mysqli_query($connection, $query);

    // Check if update was successful
    if ($result) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status: ' . mysqli_error($connection);
    }
} elseif (isset($_POST['id']) && isset($_POST['employee'])) {
    $id = $_POST['id'];
    $employee = $_POST['employee'];

    // Update status in database
    $query = "UPDATE add_complain SET assign_employee ='$employee' WHERE complain_id=$id";
    $result = mysqli_query($connection, $query);

    // Check if update was successful
    if ($result) {
        echo 'Employee updated successfully';
    } else {
        echo 'Error updating employee: ' . mysqli_error($connection);
    }
}
?>
