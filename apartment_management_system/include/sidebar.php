<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" >
    <div class="nano">
        <div class="nano-content">
           <?php if ($_SESSION['role'] == '0' || $_SESSION['role'] == '1') { ?>
            <ul>
                <div class="logo"><a href="index.php">
                        <!-- <img src="images/logo.png" alt="" /> --><span>AMS</span>
                    </a></div>
                <li class="label">Main</li>
                <li><a href="index.php"><i class="ti-home"></i>Home</a></li>
                <li class="label">Apps</li>
                <?php if ($_SESSION['role'] == '0') { ?>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Admin <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="admin_list.php"><i class="ti-angle-double-right"></i>Admin list</a></li>
                        <li><a href="add_admin.php"><i class="ti-angle-double-right"></i>Add Admin</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li><a class="sidebar-sub-toggle"><i class="ti-layers"></i> Floor Information <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="floor_list.php"><i class="ti-angle-double-right"></i>Floor list</a></li>
                        <li><a href="add_floor.php"><i class="ti-angle-double-right"></i>Add floor</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-view-grid"></i> Utility Information <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="unit_list.php"><i class="ti-angle-double-right"></i>Unit list</a></li>
                        <li><a href="add_unit.php"><i class="ti-angle-double-right"></i>Add Unit</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Owner Information <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="owner_list.php"><i class="ti-angle-double-right"></i>Owner list</a></li>
                        <li><a href="add_owner.php"><i class="ti-angle-double-right"></i>Add Owner</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>Owner Utility <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="owner_utility_list.php"><i class="ti-angle-double-right"></i>Owner Utility List</a>
                        </li>
                        <li><a href="add_owner_utility.php"><i class="ti-angle-double-right"></i>Add Owner Utility</a>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="fa-sharp fa-solid fa-users"></i> Tenant Information <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="tenant_list.php"><i class="ti-angle-double-right"></i>Tenant list</a></li>
                        <li><a href="add_tenant.php"><i class="ti-angle-double-right"></i>Add Tenant</a></li>
                        <li><a href="rent_list.php"><i class="ti-angle-double-right"></i>Rent List</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Employee Information <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="employee_list.php"><i class="ti-angle-double-right"></i>Employee List</a></li>
                        <li><a href="add_employee.php"><i class="ti-angle-double-right"></i>Add Employee</a></li>
                        <li><a href="add_employee_salary.php"><i class="ti-angle-double-right"></i>Employee Salary</a>
                        </li>
                        <li><a href="emp_salary_list.php"><i class="ti-angle-double-right"></i>Employee Salary List</a>
                        </li>
                        <li><a href="designation_list.php"><i class="ti-angle-double-right"></i>Designation List</a>
                        </li>
                        <li><a href="add_designation.php"><i class="ti-angle-double-right"></i>Employee Designation</a>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-cut"></i>Maintenance Cost <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="maintenance_cost_list.php"><i class="ti-angle-double-right"></i>Maintenance Cost
                                List</a></li>
                        <li><a href="add_maintenance_cost.php"><i class="ti-angle-double-right"></i>Add Maintenance
                                Cost</a></li>
                    </ul>
                </li>
                <!-- <li><a class="sidebar-sub-toggle"><i class="fa-solid fa-money-check-dollar"></i> Apartment Fund<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="funds_list.php"><i class="ti-angle-double-right"></i>Fund List</a></li>
                        <li><a href="add_funds.php"><i class="ti-angle-double-right"></i>Add Fund</a></li>
                    </ul>
                </li> -->
                <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>Bill Deposit<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="deposit_bill_list.php"><i class="ti-angle-double-right"></i>Bill List</a></li>
                        <li><a href="add_deposit_bill.php"><i class="ti-angle-double-right"></i>Add Bill</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-comments"></i>Complain<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="admin_complain_list.php"><i class="ti-angle-double-right"></i>Complain
                                List</a></li>
                        <!-- <li><a href="add_complain.php"><i class="ti-angle-double-right"></i>Add Complain</a></li> -->
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-car"></i>Visitor<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="visitor_list.php"><i class="ti-angle-double-right"></i>Visitor List</a></li>
                        <li><a href="add_visitor.php"><i class="ti-angle-double-right"></i>Add Visitor</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-announcement"></i>Notice Board<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="notice_board_list.php"><i class="ti-angle-double-right"></i>Notice List</a></li>
                        <li><a href="add_notice_board.php"><i class="ti-angle-double-right"></i>Add Notice</a></li>
                        <!-- <li><a href="notice_board.php"><i class="ti-angle-double-right"></i>Notice Board</a></li> -->

                    </ul>
                </li>
            </ul>
<!---aside barfor owner--->
           <?php } elseif ($_SESSION['role'] == '2') { ?>
            <ul>
                <div class="logo"><a href="index.php">
                        <!-- <img src="images/logo.png" alt="" /> --><span>AMS</span>
                    </a></div>
                <li class="label">Main</li>
                <li><a href="index.php"><i class="ti-home"></i>Home</a></li>
                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-comments"></i>Complain<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                         <li><a href="track_complain.php"><i class="ti-angle-double-right"></i>Complain Status</a>
                        </li>
                        <li><a href="add_complain.php"><i class="ti-angle-double-right"></i>Add Complain</a></li>
                    </ul>
                </li>
                <li><a href="notice_board.php"><i class="ti-announcement"></i>Notice Board</a></li>
                <li><a href="porsonal_lease_invoice_for_owner.php"><i class="ti-money"></i>Lease Info</a></li>
                <li><a href="owner_flates_info.php"><i class="ti-money"></i>Tenant Rent Info</a></li>
            </ul>

           <?php } elseif ($_SESSION['role'] == '3') { ?>
            <ul>
                <div class="logo"><a href="index.php">
                        <!-- <img src="images/logo.png" alt="" /> --><span>AMS</span>
                    </a></div>
                <li class="label">Main</li>
                <li><a href="index.php"><i class="ti-home"></i>Home</a></li>
                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-comments"></i>Complain<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                         <li><a href="track_complain.php"><i class="ti-angle-double-right"></i>Complain Status</a>
                        </li>
                        <li><a href="add_complain.php"><i class="ti-angle-double-right"></i>Add Complain</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-announcement"></i>Notice Board<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="notice_board.php"><i class="ti-angle-double-right"></i>Notice Board</a></li>

                    </ul>
                </li>
                 <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>Rent Information<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="personal_rent_invoice_for_tenant.php"><i class="ti-angle-double-right"></i>Invoice</a></li>

                    </ul>
                </li>
            </ul>

           <?php } elseif ($_SESSION['role'] == '4') { ?>
            <ul>
                <div class="logo"><a href="index.php">
                        <!-- <img src="images/logo.png" alt="" /> --><span>AMS</span>
                    </a></div>
                <li class="label">Main</li>
                <li><a href="index.php"><i class="ti-home"></i>Home</a></li>
                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-comments"></i>Complain<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                         <li><a href="track_complain.php"><i class="ti-angle-double-right"></i>Complain Status</a>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-announcement"></i>Notice Board<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="notice_board.php"><i class="ti-angle-double-right"></i>Notice Board</a></li>

                    </ul>
                </li>
            </ul>

           <?php } ?>
        </div>
    </div>
</div>