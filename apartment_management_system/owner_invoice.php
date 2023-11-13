<?php
include 'include/connection.php';
include 'include/session.php';
$owner_utility_id = $_REQUEST['owner_utility_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Owner Invoice</title>

    <?php include 'include/list_headlinks.php'; ?>
</head>
<?php
$sql = "SELECT * FROM add_owner INNER JOIN add_owner_utility ON add_owner.owner_id = add_owner_utility.owner_id INNER JOIN add_units ON add_owner_utility.unit_no=add_units.unit_id INNER JOIN add_floor ON add_owner_utility.floor_no = add_floor.id  
    WHERE add_owner_utility.owner_utility_id = '$owner_utility_id'";
// die($sql);
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<body class="bg-primary">
    <div class="unix-invoice" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <button class="btn btn-info float-right" onclick="printInvoice()">Print Invoice</button>
                    <div id="invoice" class="effect2 m-t-120">
                        <div id="invoice-top">
                            <div class="invoice-logo"></div>
                            <div class="invoice-info">
                                <h2><?php echo $_SESSION['name']; ?></h2>
                                <p> hello@Admin Board.com <br> +8801629599859
                                </p>
                            </div>
                            <!--End Info-->
                            <div class="title">
                                <h4><?php echo $row['invoice_number']; ?></h4>
                                <p>Issued: <?php echo $row[
                                    'issue_date'
                                ]; ?></p>    <p>Floor No: <?php echo $row[
    'floor_no'
]; ?></p>    <p>Unit No: <?php echo $row['unit_no']; ?></p>
                            </div>
                            <!--End Title-->
                        </div>
                        <!--End InvoiceTop-->



                        <div id="invoice-mid">

                            <div class="clientlogo"><img src="<?php echo $row[
                                'owner_image'
                            ]; ?>" width="100"  class="clientlogo" sty alt=""></div>
                            <div class="invoice-info">
                                <h2><?php echo $row['owner_name']; ?></h2>
                                <p><?php echo $row[
                                    'owner_email'
                                ]; ?><br><?php echo $row['owner_contact']; ?>
                            </p>
                            </div>

                            <div id="project">
                                <h2>Apartment Management System</h2>
                                <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
                            </div>

                        </div>
                        <!--End Invoice Mid-->

                        <div id="invoice-bot">

                            <div id="invoice-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr class="tabletitle">
                                            <td class="table-item">
                                                <h2>Item Description</h2>
                                            </td>
                                            <td class="Hours">
                                                <h2></h2>
                                            </td>
                                            <td class="Rate">
                                                <h2></h2>
                                            </td>
                                            <td class="subtotal">
                                                <h2>Amount</h2>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Lease Amount</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'lease_rent'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!--End Table-->
                           


                            <div id="legalcopy">
                                <p class="legal"><strong>Thank you for </strong>  Payment 
                                </p>
                            </div>

                        </div>
                        <!--End InvoiceBot-->
                    </div>
                    <!--End Invoice-->
                </div>
            </div>
        </div>
    </div>

</body>
<script>
		function printInvoice() {
			window.print();
		}
	</script>
</html>