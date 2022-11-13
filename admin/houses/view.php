<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/houses.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>View House</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/houses/index.php"?>">All Houses</a></button>
            </div>

            <div class="card-wrapper flight-preview" style="margin-top:5px;">
                <div class="preview-card">
                    <h2>House Details</h2>

                    <table>
                        <tr>
                            <td>House No</td>
                            <td><?php echo $house_id; ?></td>
                        </tr>
                        <tr>
                            <td>House Type</td>
                            <td><?php echo $house_type; ?></td>
                        </tr>
                        <tr>
                            <td>House Images</td>
                            <td<img src="<?php echo ROOT_PATH . "/assets/images/" . $house_images; ?>" alt=""></td>
                        </tr>
                        <tr>
                            <td>House Status</td>
                            <td><?php echo ($house_status) ? 'Available' : 'Occupied'; ?></td>
                        </tr>
                        <tr>
                            <td>House Rent</td>
                            <td><?php echo $house_rent; ?></td>
                        </tr>
                        <tr>
                            <td>House Deposit</td>
                            <td><?php echo $house_deposit; ?></td>
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