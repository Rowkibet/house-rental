<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "\app\controllers\payments.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Pay Deposit</title>
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
            <p>Name: Rowland Koech</p>
            <p>Phone Number: 0717105322</p>
            <table>
                <thead>
                    <th>House No</th>
                    <th>House Type</th>
                    <th>Rent</th>
                    <th>Rent Per Terms</th>
                    <th>Deposit</th>
                </thead>
                <tr>
                    <td><?php echo $house_no; ?></td>
                    <td><?php echo $house_type; ?></td>
                    <td><?php echo $rent; ?></td>
                    <td><?php echo $rent_per_terms; ?></td>
                    <td><?php echo $deposit; ?></td>
                </tr>
            </table>
            <p class="amount">Pay Deposit: <?php echo $deposit; ?></p>
            <button class="small-btn"><a href="pay_deposit.php?deposit=<?php echo $deposit; ?>&house_id=<?php echo $house_no; ?>">Pay With MPESA</a></button>
        </div>
    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>