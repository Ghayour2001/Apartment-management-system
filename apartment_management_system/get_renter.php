<?php
include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['unit_id'])) {
    $unit_id = $_POST['unit_id'];
    // Connect to database and fetch renter name for the selected unit
    $result = mysqli_query(
        $connection,
        "SELECT * FROM add_tenant WHERE t_unit_no = $unit_id"
    );
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo 'Unknown renter';
    }
}

?>
