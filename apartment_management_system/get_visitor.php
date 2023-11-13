<?php
include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['visitor_floor_id'])) {
    $visitor_floor_id = $_POST['visitor_floor_id'];
    // Connect to database and fetch unit list for the selected floor
    $result = mysqli_query(
        $connection,
        "SELECT * FROM add_units WHERE floor_no = $visitor_floor_id"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" .
                $row['unit_id'] .
                "'>" .
                $row['unit_no'] .
                '</option>';
        }
    } else {
        echo "<option value=''>No units found</option>";
    }
}

?>
