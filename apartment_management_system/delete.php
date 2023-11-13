<?php
include 'include/connection.php';

$floor_id = $_REQUEST['floor_id'];
$tenant_unit_no = $_REQUEST['tenant_unit_no'];
$unit_no = $_REQUEST['unit_no'];
$unit_id = $_REQUEST['unit_id'];
$owner_id = $_REQUEST['owner_id'];
$tenant_id = $_REQUEST['tenant_id'];
$employee_id = $_REQUEST['employee_id'];
$emp_salary_id = $_REQUEST['emp_salary_id'];
$rent_id = $_REQUEST['rent_id'];
$owner_utility_id = $_REQUEST['owner_utility_id'];
$maintenance_id = $_REQUEST['maintenance_id'];
$funds_id = $_REQUEST['funds_id'];
$bill_id = $_REQUEST['bill_id'];
$visitor_id = $_REQUEST['visitor_id'];
$notice_id = $_REQUEST['notice_id'];
$complain_id = $_REQUEST['complain_id'];
$designation_id = $_REQUEST['designation_id'];
$admin_id = $_REQUEST['admin_id'];
//floor deletion code

if ($floor_id == true) {
    // Check if there are associated units for the floor
    $result = mysqli_query(
        $connection,
        "SELECT * FROM add_units WHERE floor_no = '$floor_id'"
    );
    if (mysqli_num_rows($result) > 0) {
        header('location: floor_list.php?para1=1');
        exit();
    } else {
        $result = mysqli_query(
            $connection,
            "DELETE FROM add_floor WHERE id = '$floor_id'"
        );
        if ($result == true) {
            header('location: floor_list.php');
            exit();
        }
    }
} elseif ($unit_id == true) {
    // Check if there are associated records in add_owner_utility table
    $checkResult = mysqli_query(
        $connection,
        "SELECT * FROM add_owner_utility WHERE unit_no = '$unit_id'"
    );
    if (mysqli_num_rows($checkResult) > 0) {
        header('location: unit_list.php?para1=1');
        exit();
    } else {
        $checkResult1 = mysqli_query(
            $connection,
            "SELECT * FROM add_tenant WHERE t_unit_no = '$unit_id'"
        );
        if (mysqli_num_rows($checkResult1) > 0) {
            header('location: unit_list.php?para1=2');
            exit();
        } else {
            $result = mysqli_query(
                $connection,
                "DELETE FROM add_units WHERE unit_id = '$unit_id'"
            );
            if ($result == true) {
                header('location: unit_list.php');
                exit();
            }
        }
    }
} elseif ($owner_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_owner where owner_id = '$owner_id'"
    );
    if ($result == true) {
        header('location:owner_list.php');
    }
} elseif ($tenant_id || $tenant_unit_no == true) {
    // Check if there are associated records in the add_rent table
    $checkResult = mysqli_query(
        $connection,
        "SELECT * FROM add_rent WHERE rid = '$tenant_id'"
    );

    if (mysqli_num_rows($checkResult) > 0) {
        header('location: tenant_list.php?para1=1');
        exit();
    } else {
        $result = mysqli_query(
            $connection,
            "DELETE FROM add_tenant WHERE tid = '$tenant_id'"
        );
        $result = mysqli_query(
            $connection,
            "UPDATE add_units SET status='0' where unit_id= '$tenant_unit_no'"
        );
        if ($result == true) {
            header('location: tenant_list.php');
            exit();
        }
    }
} elseif ($employee_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM employee where emp_id = '$employee_id'"
    );
    if ($result == true) {
        header('location:employee_list.php');
    }
} elseif ($emp_salary_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_employee_salary where emp_id = '$emp_salary_id'"
    );
    if ($result == true) {
        header('location:emp_salary_list.php');
    }
} elseif ($rent_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_rent where rent_id = '$rent_id'"
    );
    if ($result == true) {
        header('location:rent_list.php');
    }
} elseif ($owner_utility_id || $unit_no == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_owner_utility where owner_utility_id = '$owner_utility_id'"
    );
    $result = mysqli_query(
        $connection,
        "UPDATE add_units SET owner_status='0' where unit_id= '$unit_no'"
    );
    if ($result == true) {
        header('location:owner_utility_list.php');
    }
} elseif ($maintenance_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM maintenance where id = '$maintenance_id'"
    );
    if ($result == true) {
        header('location:maintenance_cost_list.php');
    }
} elseif ($funds_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_funds where fund_id = '$funds_id'"
    );
    if ($result == true) {
        header('location:funds_list.php');
    }
} elseif ($bill_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_bill where bill_id = '$bill_id'"
    );
    if ($result == true) {
        header('location:deposit_bill_list.php');
    }
} elseif ($visitor_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM visitor where id = '$visitor_id'"
    );
    if ($result == true) {
        header('location:visitor_list.php');
    }
} elseif ($notice_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM notice_board where notice_id = '$notice_id'"
    );
    if ($result == true) {
        header('location:notice_board_list.php');
    }
} elseif ($complain_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_complain where complain_id = '$complain_id'"
    );
    if ($result == true) {
        header('location:admin_complain_list.php');
    }
} elseif ($designation_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM add_designation where designation_id = '$designation_id'"
    );
    if ($result == true) {
        header('location:designation_list.php');
    }
} elseif ($admin_id == true) {
    $result = mysqli_query(
        $connection,
        "DELETE FROM admin where a_id = '$admin_id'"
    );
    if ($result == true) {
        header('location:admin_list.php');
    }
}

?>
