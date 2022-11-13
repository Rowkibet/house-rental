<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/contracts.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Contracts</title>
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

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Contracts</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Contract ID</th>
                        <th>Tenant Name</th>
                        <th>House No</th>
                        <th>Rent to pay</th>
                        <th>Rent per terms</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($allContracts as $key => $contract) : ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $contract['id']; ?></td>
                            <td><?php echo ($contract['first_name'] . " " . $contract['last_name'])?></td>
                            <td><?php echo $contract['house_id']; ?></td>
                            <td><?php echo $contract['rent']; ?></td>
                            <td><?php echo $contract['rentPerTerms']; ?></td>
                            <td><?php echo ($contract['status']) ? 'Active' : 'Inactive' ?></td>
                            <td><button><a href="view.php?id=<?php echo $contract['id']; ?>">view</a></button></td>
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