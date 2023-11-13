<?php
include 'include/connection.php';
include 'include/session.php';
if (isset($_POST['floor_no'])) {
    $floor_no = $_POST['floor_no'];
    // Connect to database and fetch unit list for the selected floor
    $result = mysqli_query(
        $connection,
        "SELECT * FROM add_units WHERE floor_no = $floor_no and status=0 and owner_status=1"
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
} elseif (isset($_POST['woner_floor_id'])) {
    $woner_floor_id = $_POST['woner_floor_id'];
    // Connect to database and fetch unit list for the selected floor
    $result = mysqli_query(
        $connection,
        "SELECT * FROM add_units WHERE floor_no = $woner_floor_id and owner_status=0"
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
