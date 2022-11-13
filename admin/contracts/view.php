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
    <title>View Contract</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/contracts/index.php"?>">All Contracts</a></button>
            </div>

            <div class="card-wrapper flight-preview" style="margin-top:5px;">
                <div class="preview-card">
                    <h2>Contract Details</h2>

                    <table>
                        <tr>
                            <td>Contract ID</td>
                            <td><?php echo $contract_id; ?></td>
                        </tr>
                        <tr>
                            <td>Tenant Name</td>
                            <td><?php echo $tenant_name; ?></td>
                        </tr>
                        <tr>
                            <td>House No</td>
                            <td><?php echo $house_no; ?></td>
                        </tr>
                        <tr>
                            <td>Start of Contract</td>
                            <td><?php echo $start_of_contract; ?></td>
                        </tr>
                        <tr>
                            <td>End of Contract</td>
                            <td><?php echo $end_of_contract; ?></td>
                        </tr>
                        <tr>
                            <td>Contract Duration</td>
                            <td><?php echo $duration; ?></td>
                        </tr>
                        <tr>
                            <td>Rent</td>
                            <td><?php echo $rent; ?></td>
                        </tr>
                        <tr>
                            <td>Rent Per Terms</td>
                            <td><?php echo $rent_per_terms; ?></td>
                        </tr>
                        <tr>
                            <td>Date Of Signing</td>
                            <td><?php echo $date_of_signing; ?></td>
                        </tr>
                        <tr>
                            <td>Contract Status</td>
                            <td><?php echo ($contract_status) ? 'Active' : 'Inactive' ?></td>
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