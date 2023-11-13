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

    <title>Deposit Bill List</title>
    <?php include 'include/list_headlinks.php'; ?>
   
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
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
            <div class="row">
            <div class="col-md-12">
                        <a href="add_deposit_bill.php" class="btn btn-info float-right">Add Deposit Bill</a>
                        </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-title">
                    <h4>Deposit Bill List</h4>
                  </div>
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                    <table id="bootstrap-data-table-export" class="display table table-bordered table-hover">
  <thead class="thead-dark text-center">
    <tr>
      <th>Id</th>
      <th>Water Bill</th>
      <th>Gas Bill</th>
      <th>Electric Bill</th>
      <th>Issue Date</th>
      <th>Month</th>
      <th>Year</th>
      <th>Total Bill</th>
      <th>Deposit Bank</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody class="text-center">
    <?php
    $result = mysqli_query($connection, 'SELECT * FROM add_bill');
    $i = 1;
    while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['water_bill']; ?></td>
        <td><?php echo $row['gas_bill']; ?></td>
        <td><?php echo $row['electric_bill']; ?></td>
        <td><?php echo $row['issue_date']; ?></td>
        <?php
        $bill_month = $row['bill_month'];
        $result2 = mysqli_query(
            $connection,
            "SELECT * FROM add_month where m_id='$bill_month'"
        );
        $row2 = mysqli_fetch_array($result2);
        ?>
        <td><?php echo $row2['month_name']; ?></td>
        <td><?php echo $row['bill_year']; ?></td>
        <td><?php echo $row['total_bill']; ?></td>
        <td><?php echo $row['deposit_bank_name']; ?></td>
        <td>
          <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="text-muted sr-only">Action</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="update_deposit_bill.php?bill_id=<?php echo $row[
                'bill_id'
            ]; ?>">Edit</a>
            <a class="dropdown-item" href="delete.php?bill_id=<?php echo $row[
                'bill_id'
            ]; ?>" onclick="return confirm('Are you sure to Delete the Data?');">Remove</a>
          </div>
        </td>
      </tr>
    <?php }
    ?>
  </tbody>

  <tfoot class="text-center thead-dark">
    <tr>
      <th>Id</th>
      <th>Water Bill</th>
      <th>Gas Bill</th>
      <th>Electric Bill</th>
      <th>Issue Date</th>
      <th>Month</th>
      <th>Year</th>
      <th>Total Bill</th>
      <th>Deposit Bank</th>
      <th>Action</th>
    </tr>
  </tfoot>
</table>


                    </div>
                  </div>
                </div>
                <!-- /# card -->
              </div>
              <!-- /# column -->
            </div>
            <!-- /# row -->

            <div class="row">
              <div class="col-lg-12">
                <div class="footer">
                  <p>
                   
                  </p>
                </div>
              </div>
            </div>
          </section>
            </div>
        </div>
    </div>
    <?php include 'include/list_footerlinks.php'; ?>

</body>

</html>