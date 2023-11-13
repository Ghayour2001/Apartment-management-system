<?php

include 'include/connection.php';
include 'include/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <?php include 'include/headlinks.php'; ?>
</head>

<body>
<?php include 'include/sidebar.php'; ?>
    <!-- /# sidebar -->
    <?php include 'include/header.php'; ?>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><?php echo $_SESSION[
                                    'designation'
                                ]; ?>, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <?php if (
                    $_SESSION['role'] == '0' ||
                    $_SESSION['role'] == '1'
                ) { ?>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-home color-success border-success"></i>
                                    </div>
                                   <a href="floor_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Floor</div>
                                        <div class="stat-digit">
                                            <?php
                                            $query1 = mysqli_query(
                                                $connection,
                                                'SELECT * from add_floor'
                                            );
                                            $floors = mysqli_num_rows($query1);
                                            echo $floors;
                                            ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-regular fa-door-open color-primary border-primary"></i>
                                    </div>
                                  <a href="unit_list.php">
                                  <div class="stat-content dib">
                                        <div class="stat-text">Total Unit</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query2 = mysqli_query(
                                            $connection,
                                            'SELECT * from add_units'
                                        );
                                        $units = mysqli_num_rows($query2);
                                        echo $units;
                                        ?>
                                        </div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-pink border-pink"></i>
                                    </div>
                                   <a href="owner_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Owner</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query3 = mysqli_query(
                                            $connection,
                                            'SELECT * from add_owner'
                                        );
                                        $owners = mysqli_num_rows($query3);
                                        echo $owners;
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-regular fa-users color-warning border-warning"></i></div>
                                  <a href="tenant_list.php">
                                  <div class="stat-content dib">
                                        <div class="stat-text">Total Tenant</div>
                                        <div class="stat-digit"><?php
                                        $query4 = mysqli_query(
                                            $connection,
                                            'SELECT * from add_tenant'
                                        );
                                        $tenants = mysqli_num_rows($query4);
                                        echo $tenants;
                                        ?></div>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-user color-secondary border-secondary"></i>
                                    </div>
                                    <a href="employee_list.php">
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Employee</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query5 = mysqli_query(
                                            $connection,
                                            'SELECT * from employee'
                                        );
                                        $employees = mysqli_num_rows($query5);
                                        echo $employees;
                                        ?>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-sharp fa-solid fa-mountain-sun color-danger border-danger"></i></div>
                                   <a href="complaint_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Complain</div>
                                        <div class="stat-digit">
                                        <?php
                                        $currentMonth = date('Y-m');
                                        $query12 = mysqli_query(
                                            $connection,
                                            "SELECT count(complain_id) AS total_complain FROM add_complain WHERE added_date LIKE '$currentMonth%'"
                                        );
                                        $row5 = mysqli_fetch_assoc($query12);
                                        echo $row5['total_complain'];
                                        ?> 
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-sack-dollar color-success border-success"></i>
                                    </div>
                                   <a href="rent_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Rent</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query7 = mysqli_query(
                                            $connection,
                                            'SELECT SUM(total_rent) AS total_rent_sum FROM add_rent;'
                                        );
                                        $row1 = mysqli_fetch_assoc($query7);
                                        if (empty($row1['total_rent_sum'])) {
                                            echo '0';
                                        } else {
                                            echo $row1['total_rent_sum'];
                                        }
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-toolbox color-danger border-danger"></i></div>
                                   <a href="maintenance_cost_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Maintenance</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query8 = mysqli_query(
                                            $connection,
                                            'SELECT SUM(amount) AS total_amount FROM maintenance;'
                                        );
                                        $row2 = mysqli_fetch_assoc($query8);

                                        if (empty($row2['total_amount'])) {
                                            echo '0';
                                        } else {
                                            echo $row2['total_amount'];
                                        }
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-money-check-dollar color-warning border-warning"></i>
                                    </div>
                                   <a href="deposit_bill_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Bill</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query9 = mysqli_query(
                                            $connection,
                                            'SELECT total_bill FROM add_bill WHERE added_date = (SELECT MAX(added_date) FROM add_bill)'
                                        );
                                        $row3 = mysqli_fetch_assoc($query9);
                                        if (empty($row3['total_bill'])) {
                                            echo '0';
                                        } else {
                                            echo $row3['total_bill'];
                                        }
                                        ?>   
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-comments-dollar color-pink border-pink"></i>
                                    </div>
                                   <a href="rent_list.php">
                                   <div class="stat-content dib"><div class="stat-text">Rent Per M..</div>
                                        <div class="stat-digit">
                                        <?php
                                        $currentMonth = date('Y-m');
                                        $query10 = mysqli_query(
                                            $connection,
                                            "SELECT SUM(total_rent) AS total_rent FROM add_rent WHERE added_date LIKE '$currentMonth%'"
                                        );
                                        $row4 = mysqli_fetch_assoc($query10);
                                        if (empty($row4['total_rent'])) {
                                            echo '0';
                                        } else {
                                            echo $row4['total_rent'];
                                        }
                                        ?>   
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-sack-dollar color-success border-success"></i>
                                    </div>
                                   <a href="employee_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Emp Salary</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query11 = mysqli_query(
                                            $connection,
                                            'SELECT SUM(amount) AS employee_salary FROM add_employee_salary;'
                                        );
                                        $row5 = mysqli_fetch_assoc($query11);

                                        if (empty($row5['employee_salary'])) {
                                            echo '0';
                                        } else {
                                            echo $row5['employee_salary'];
                                        }
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>

                        <?php if ($_SESSION['role'] == '0') { ?>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-user-group color-primary border-primary"></i>
                                    </div>
                                    <a href="admin_list.php">
                                    <div class="stat-content dib"><div class="stat-text">Total Admin</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query6 = mysqli_query(
                                            $connection,
                                            'SELECT * from admin'
                                        );
                                        $admins = mysqli_num_rows($query6);
                                        echo $admins;
                                        ?>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </section>
                <!---dashboard for owner--->
                <?php } elseif ($_SESSION['role'] == '2') { ?>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-regular fa-door-open color-primary border-primary"></i>
                                    </div>
                                  
                                  <div class="stat-content dib">
                                        <div class="stat-text">Total Unit</div>
                                        <div class="stat-digit">
                                        <?php
                                        $owner_id = $_SESSION['id'];
                                        $query2 = mysqli_query(
                                            $connection,
                                            "SELECT * FROM add_owner_utility INNER JOIN add_units ON add_owner_utility.unit_no=add_units.unit_id WHERE add_owner_utility.owner_id='$owner_id'"
                                        );
                                        $units = mysqli_num_rows($query2);
                                        echo $units;
                                        ?>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-regular fa-users color-warning border-warning"></i></div>
            
                                  <div class="stat-content dib">
                                        <div class="stat-text">Total Tenant</div>
                                        <div class="stat-digit"><?php
                                        $owner_id = $_SESSION['id'];
                                        $query4 = mysqli_query(
                                            $connection,
                                            "SELECT * FROM add_owner_utility INNER JOIN add_units ON add_owner_utility.unit_no=add_units.unit_id WHERE add_owner_utility.owner_id='$owner_id'"
                                        );
                                        $tenants = mysqli_num_rows($query4);
                                        echo $tenants;
                                        ?></div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-sack-dollar color-success border-success"></i>
                                    </div>
                                   
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Rent</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query7 = mysqli_query(
                                            $connection,
                                            "SELECT SUM(rent) AS Owner_rent
                                            FROM add_owner_utility
                                            JOIN add_rent ON add_owner_utility.floor_no = add_rent.floor_no
                                                         AND add_owner_utility.unit_no = add_rent.unit_no WHERE add_owner_utility.owner_id='{$_SESSION['id']}'"
                                        );
                                        $row1 = mysqli_fetch_assoc($query7);
                                        echo $row1['Owner_rent'];
                                        ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-sack-dollar color-success border-success"></i>
                                    </div>
                                   
                                   <a href="owner_flates_info.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Paid Rent</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query = "SELECT *
                                        FROM add_owner_utility
                                        JOIN add_rent ON add_owner_utility.floor_no = add_rent.floor_no
                                                    AND add_owner_utility.unit_no = add_rent.unit_no
                                        WHERE add_owner_utility.owner_id = '{$_SESSION['id']}'";
                                        $query7 = mysqli_query(
                                            $connection,
                                            $query
                                        );

                                        $paidRentWithoutBills = 0;

                                        while (
                                            $row1 = mysqli_fetch_assoc($query7)
                                        ) {
                                            if ($row1['paid_rent'] == null) {
                                                $rent = '0';
                                            } else {
                                                $rent = $row1['paid_rent'];
                                            }
                                            $bills = [
                                                $row1['water_bill'],
                                                $row1['electric_bill'],
                                                $row1['gas_bill'],
                                                $row1['security_bill'],
                                                $row1['utility_bill'],
                                                $row1['other_bill'],
                                            ];
                                            if ($rent == 0) {
                                                $paidRentWithoutBills = '0';
                                            } else {
                                                $paidRentWithoutBills -=
                                                    array_sum($bills) - $rent;
                                            }
                                        }

                                        echo $paidRentWithoutBills;
                                        ?>

                                        </div>
                                    </div>
                                   </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--employee dashboard-->
                <?php } elseif ($_SESSION['role'] == '4') { ?>
                <section id="main-content">
                    <div class="row">
                    <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-home color-success border-success"></i>
                                    </div>
                                   <div class="stat-content dib">
                                        <div class="stat-text">Total Floor</div>
                                        <div class="stat-digit">
                                            <?php
                                            $query1 = mysqli_query(
                                                $connection,
                                                'SELECT * from add_floor'
                                            );
                                            $floors = mysqli_num_rows($query1);
                                            echo $floors;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-regular fa-door-open color-primary border-primary"></i>
                                    </div>
                                  
                                  <div class="stat-content dib">
                                        <div class="stat-text">Total Unit</div>
                                        <div class="stat-digit">
                                        <?php
                                        $query2 = mysqli_query(
                                            $connection,
                                            'SELECT * from add_units'
                                        );
                                        $units = mysqli_num_rows($query2);
                                        echo $units;
                                        ?>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid fa-sack-dollar color-success border-success"></i>
                                    </div>
                                
                                   <div class="stat-content dib">
                                        <div class="stat-text">Salary Per M..</div>
                                        <div class="stat-digit">
                                        <?php
                                        $emp_id = $_SESSION['id'];
                                        $query15 = mysqli_query(
                                            $connection,
                                            "SELECT * FROM add_employee_salary where emp_name='$emp_id'"
                                        );
                                        $row10 = mysqli_fetch_assoc($query15);
                                        echo $row10['amount'];
                                        ?>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-sharp fa-solid fa-mountain-sun color-danger border-danger"></i></div>
                                   <a href="complaint_list.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Complain</div>
                                        <div class="stat-digit">
                                        <?php
                                        $emp_name = $_SESSION['name'];
                                        $currentMonth = date('Y-m');
                                        $query12 = mysqli_query(
                                            $connection,
                                            "SELECT count(complain_id) AS total_complain FROM add_complain WHERE added_date LIKE '$currentMonth%' and assign_employee='$emp_name'"
                                        );
                                        $row5 = mysqli_fetch_assoc($query12);
                                        echo $row5['total_complain'];
                                        ?> 
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } elseif ($_SESSION['role'] == '3') { ?>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-solid ti-announcement color-success border-success"></i>
                                    </div>
                                
                                   <a href="notice_board.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Notice Board</div>
                                        <div class="stat-digit">
                                        <?php
                                        $designation = $_SESSION['designation'];
                                        $query16 = mysqli_query(
                                            $connection,
                                            "SELECT * FROM notice_board where notice_designation='$designation'"
                                        );
                                        $row11 = mysqli_num_rows($query16);
                                        echo $row11;
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa-sharp fa-solid fa-mountain-sun color-danger border-danger"></i></div>
                                   <a href="add_complain.php">
                                   <div class="stat-content dib">
                                        <div class="stat-text">Complain</div>
                                        <div class="stat-digit">
                                        <?php
                                        $user_id = $_SESSION['id'];
                                        $query15 = mysqli_query(
                                            $connection,
                                            "SELECT * FROM add_complain where c_userid='$user_id'"
                                        );
                                        $row10 = mysqli_num_rows($query15);
                                        echo $row10;
                                        ?>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?> 
            </div>
        </div>
    </div>

<?php include 'include/footerlinks.php'; ?>
</body>

</html>
