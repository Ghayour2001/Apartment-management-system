<?php
include 'include/connection.php';
include 'include/session.php';

if ($_POST['type'] == '') {
    $select = mysqli_query($connection, 'SELECT * FROM add_floor');
    $str = '';
    while ($row = mysqli_fetch_assoc($select)) {
        $str .= "<option value='{$row['id']}'>{$row['floor_no']}</option>";
    }
} elseif ($_POST['type'] == 'unitdata') {
    $select = mysqli_query(
        $connection,
        "SELECT * FROM add_units where floor_no = {$_POST['id']} and status = 0"
    );
    $str = '';
    while ($row = mysqli_fetch_assoc($select)) {
        $str .= "<option value='{$row['unit_id']}'>{$row['unit_no']}</option>";
    }
} elseif ($_POST['type'] == 'for_visitor') {
    $select = mysqli_query(
        $connection,
        "SELECT * FROM add_units where floor_no = {$_POST['id']} "
    );
    $str = '';
    while ($row = mysqli_fetch_assoc($select)) {
        $str .= "<option value='{$row['unit_id']}'>{$row['unit_no']}</option>";
    }
}

echo $str;
?>
