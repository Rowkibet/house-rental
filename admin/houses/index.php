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
    <title>Houses</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/houses/create.php"?>">Add house</a></button>
            </div>
            
            <div class="table-wrapper">

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Houses</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>House No</th>
                        <th>House Status</th>
                        <th>House Type</th>
                        <th>House Rent</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($houses as $key => $house) : ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $house['id']; ?></td>
                            <td><?php echo ($house['is_available']) ? 'Available' : 'Occupied'?></td>
                            <td><?php echo $house['houseType']; ?></td>
                            <td><?php echo $house['rent']; ?></td>
                            <td><button><a href="view.php?id=<?php echo $house['id']; ?>">view</a></button></td>
                            <td><button><a href="edit.php?id=<?php echo $house['id']; ?>">update</a></button></td>
                            <td><button><a href="index.php?del_id=<?php echo $house['id']; ?>">delete</a></button></td>
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