<?php
include 'include/connection.php';
include 'include/session.php';
$rent_id = $_REQUEST['rent_id'];
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
$sql = "SELECT * FROM add_rent INNER JOIN add_tenant ON add_rent.rid = add_tenant.tid INNER JOIN add_units ON add_rent.unit_no = add_units.unit_id INNER JOIN add_floor ON add_rent.floor_no = add_floor.id WHERE add_rent.rent_id = '$rent_id'";
// die($sql);
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<body class="bg-secondary">
    
    <div class="unix-invoice" >
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <button class="btn btn-info float-right" onclick="printInvoice()">Print Invoice</button>
                    <div id="invoice" class="effect2 m-t-120">
                        <div id="invoice-top">
                            <div class="invoice-logo"><img src="<?php echo $_SESSION[
                                'image'
                            ]; ?>" alt=""></div>
                            <div class="invoice-info">
                                <h2><?php echo $_SESSION['name']; ?></h2>
                                <p> <?php echo $_SESSION[
                                    'email'
                                ]; ?> <br> <?php echo $_SESSION[
     'contact_no'
 ]; ?>
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
                                'image'
                            ]; ?>" width="100"  class="clientlogo" sty alt=""></div>
                            <div class="invoice-info">
                                <h2><?php echo $row['t_name']; ?></h2>
                                <p><?php echo $row[
                                    't_email'
                                ]; ?><br><?php echo $row['t_contact']; ?>
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
                                                <p class="itemtext">Rent</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'rent'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Water Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'water_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Electricity Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'electric_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Gas Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'gas_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Security Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'security_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr>

                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Utility Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'utility_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr> <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext">Other Bill</p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo $row[
                                                    'other_bill'
                                                ]; ?></p>
                                            </td>
                                        </tr>


                                        <tr class="tabletitle">
                                            <td></td>
                                            <td></td>
                                            <td class="Rate">
                                                <h2>Total Amount</h2>
                                            </td>
                                            <td class="payment">
                                                <h2><?php echo $row[
                                                    'total_rent'
                                                ]; ?></h2>
                                            </td>
                                        </tr> <tr  class="service">
                                            <td></td>
                                            <td></td>
                                            <td class="Rate">
                                                <h2>Paid Amount</h2>
                                            </td>
                                            <td class="payment">
                                                <h2><?php echo $row[
                                                    'paid_rent'
                                                ]; ?></h2>
                                            </td>
                                        </tr> <tr class="tabletitle">
                                            <td></td>
                                            <td></td>
                                            <td class="Rate">
                                                <h2>Remaining Amount</h2>
                                            </td>
                                            <td class="payment">
                                                <h2><?php echo $row[
                                                    'remaining_rent'
                                                ]; ?></h2>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!--End Table-->
                            <!-- <button class="btn btn-info" onclick="printInvoice()">Print Invoice</button> -->


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