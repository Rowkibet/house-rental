<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/tenants.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Tenants</title>
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
            
            <div class="flex">
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/tenants/create.php"?>">Add Tenant</a></button>
            </div>
            
            <div class="table-wrapper">

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Tenants</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Tenant ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($tenants as $key => $tenant) : ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $tenant['id']; ?></td>
                            <td><?php echo ($tenant['first_name'] . " " . $tenant['last_name'])?></td>
                            <td><?php echo $tenant['email']; ?></td>
                            <td><?php echo $tenant['phone_no']; ?></td>
                            <td><button><a href="view.php?id=<?php echo $tenant['id']; ?>">view</a></button></td>
                            <td><button><a href="edit.php?id=<?php echo $tenant['id']; ?>">update</a></button></td>
                            <td><button><a href="index.php?del_id=<?php echo $tenant['id']; ?>">delete</a></button></td>
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