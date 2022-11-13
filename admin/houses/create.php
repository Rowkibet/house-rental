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
    <title>Add Houses</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <div class="flex">
            <button class="btn"><a href="<?php echo BASE_URL . "/admin/houses/index.php"?>">All Houses</a></button>
        </div>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Add House</h2>
                </div>

                <form action="create.php" method="post" enctype="multipart/form-data" novalidate>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                    <div class="form-control">
                        <label for="">House Type</label>
                        <select name="house_type_id" id="">
                            <option value=""></option>
                            <?php foreach($house_types as $key => $house_type): ?>
                                <?php if(!empty($house_type_id) && $house_type_id == $house_type['id']): ?>
                                    <option selected value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">House Images</label>
                        <input type="file" name="house_images" value= "" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">House Status</label>
                        <select name="is_available" id="">
                            <option value=""></option>
                            <?php if(!empty($house_status) && $house_status === '1'): ?>
                                <option selected value="1">Available</option>
                                <option value="0">Occupied</option>
                            <?php elseif($house_status === '0'): ?>
                                <option value="1">Available</option>
                                <option selected value="0">Occupied</option>
                            <?php else: ?>
                                <option value="1">Available</option>
                                <option value="0">Occupied</option>
                            <?php endif; ?>
                        </select>
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <button type="submit" name="add-house" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>