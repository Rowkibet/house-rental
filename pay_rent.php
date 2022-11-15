<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "\app\controllers\payments.php");
    include(ROOT_PATH . "/app/controllers/tenants.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Pay Rent</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- notification messages -->
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- page wrapper -->
    <div class="page-wrapper cart">
        <div class="cart-wrapper">
            <h2>Billing details</h2>
            <p>Name: <?php echo $first_name . " " . $last_name; ?></p>
            <p>Phone Number: <?php echo $phone_no; ?></p>
            <table>
                <thead>
                    <th>Invoice ID</th>
                    <th>House No</th>
                    <th>House Type</th>
                    <th>Total Rent</th>
                    <th>Balance</th>
                    <th>Amount to Pay</th>
                    <th>Due Date</th>
                </thead>
                <tr>
                    <td><?php echo $invoice_id; ?></td>
                    <td><?php echo $house_no; ?></td>
                    <td><?php echo $house_type ?></td>
                    <td><?php echo $total_rent; ?></td>
                    <td><?php echo $balance; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $due_date; ?></td>
                </tr>
            </table>
            <p class="amount">Pay Rent: <?php echo $amount; ?></p>
            <button class="small-btn"><a href="pay_rent.php?rent=<?php echo $amount; ?>&contract_id=<?php echo $contract_id; ?>">Pay With MPESA</a></button>
        </div>
    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>