<?php
include 'include/connection.php';
include 'include/session.php';

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];

    // Fetch data for selected category from database
    $sql = "SELECT *
    FROM employee
    INNER JOIN add_designation ON employee.emp_designation = add_designation.designation_id
     WHERE employee.emp_id = '" . $emp_id . "'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    // Return data as JSON
    echo json_encode($row);
}

?>