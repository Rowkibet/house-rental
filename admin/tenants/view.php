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
    <title>View Tenant</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/tenants/index.php"?>">All Tenants</a></button>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/tenants/create.php"?>">Add Tenant</a></button>
            </div>

            <div class="card-wrapper flight-preview" style="margin-top:5px;">
                <div class="preview-card">
                    <h2>Tenant Details</h2>

                    <table>
                        <tr>
                            <td>Full Name</td>
                            <td><?php echo ($first_name . " " . $last_name) ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $address?></td>
                        </tr>
                        <tr>
                            <td>Phone No</td>
                            <td><?php echo $phone_no ?></td>
                        </tr>
                        <tr>
                            <td>National ID</td>
                            <td><?php echo $national_id ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->
</body>
</html>