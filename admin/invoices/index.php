<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\invoices.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Invoices</title>
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

                <h2>Invoices</h2>

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>Tenant Name</th>
                        <th>House No</th>
                        <th>Rent</th>
                        <th>Balance</th>
                        <th>Due Date</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($invoices as $key => $invoice) : ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $invoice['id']; ?></td>
                            <td><?php echo ($invoice['first_name'] . " " . $invoice['last_name']); ?></td>
                            <td><?php echo $invoice['house_id']; ?></td>
                            <td><?php echo $invoice['total_rent']; ?></td>
                            <td><?php echo $invoice['balance']; ?></td>
                            <td><?php echo $invoice['due_date']; ?></td>
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