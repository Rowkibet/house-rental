<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "\app\controllers\booking.php")
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
            <p>Name: Rowland Koech</p>
            <p>Phone Number: 0717105322</p>
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
                    <td>9</td>
                    <td>Apartment</td>
                    <td>8000</td>
                    <td>Monthly</td>
                    <td>3000</td>
                </tr>
            </table>
            <p class="amount">Pay Deposit: 3000</p>
            <button class="small-btn"><a href="mpesaprocessor.php?amount=1&room_id=<?php echo $room_no ?>">Pay With MPESA</a></button>
        </div>
    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>