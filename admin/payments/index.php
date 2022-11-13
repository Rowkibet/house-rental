<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\payments.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Payments</title>
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

            <div class="table-wrapper">

                <h2>Payments</h2>

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Receipt No</th>
                        <th>Full Name</th>
                        <th>House No</th>
                        <th>Amount</th>
                        <th>Paid For</th>
                        <th>Balance</th>
                        <th>Date Paid</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($payments as $key => $payment): ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $payment['receipt_no']; ?></td>
                            <td><?php echo ($payment['first_name'] . " " . $payment['last_name'])?></td>
                            <td><?php echo $payment['house_id']; ?></td>
                            <td><?php echo $payment['amount']; ?></td>
                            <td><?php echo $payment['paidFor']; ?></td>
                            <td><?php echo $payment['balance']; ?></td>
                            <td><?php echo $payment['payment_date']; ?></td>
                            <td><button><a href="view.php?id=<?php echo $payment['id']; ?>">View</a></button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->
</body>
</html>