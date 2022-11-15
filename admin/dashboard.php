<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/houses.php") ?>
<?php include(ROOT_PATH . "/app/controllers/tenants.php") ?>
<?php include(ROOT_PATH . "/app/controllers/payments.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard - House Rental</title>
</head>
<body>
     <!-- navigation bar -->
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
        <!-- Admin content -->
        <div class="admin-content">

            <!-- notification messages -->
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

            <div class="card-wrapper">
                <div class="preview-card flex">
                    <p>No. of Houses</p>
                    <p><?php echo $noOfHouses; ?></p>
                </div>

                <div class="preview-card flex">
                    <p>No. Of Tenants</p>
                    <p><?php echo $noOfTenants; ?></p>
                </div>

                <div class="preview-card flex">
                    <p>Payments</p>
                    <p><?php echo $noOfPayments; ?></p>
                </div> 
            </div>
            
            <div class="card-wrapper flight-preview">
                <div class="preview-card">
                    <h2>Payments</h2>

                    <table>
                        <tr>
                            <th>#</th>
                            <th>Tenant Name</th>
                            <th>receipt no.</th>
                            <th>House No.</th>
                            <th>amount paid</th>
                            <th>Date Paid</th>
                            <th>Balance</th>
                            <th>Due Date</th>
                        </tr>
                        <?php foreach(array_slice($payments, 0, 4) as $key => $payment) : ?>
                            <tr>
                                <td><?php echo $key + 1 . "." ?></td>
                                <td><?php echo $payment['first_name'] . " " . $payment['last_name']; ?></td>
                                <td><?php echo $payment['receipt_no']; ?></td>
                                <td><?php echo $payment['house_id']; ?></td>
                                <td><?php echo $payment['amount']; ?></td>
                                <td><?php echo $payment['payment_date']; ?></td>
                                <td><?php echo $payment['balance']; ?></td>
                                <td><?php echo $payment['due_date']; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

        <!-- // Admin Content -->
        </div>
    </div>
    <!-- // Admin Page Wrapper-->
</body>
</html>