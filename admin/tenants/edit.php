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
    <title>Update Tenant</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/tenants/index.php"?>">All Tenants</a></button>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Update Tenant</h2>
                </div>

                <form action="edit.php" method="post" novalidate>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <input type="hidden" name="id" value= "<?php echo $id ?>" id="">

                    <div class="form-control">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" value= "<?php echo $first_name; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Last name</label>
                        <input type="text" name="last_name" value= "<?php echo $last_name; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Email</label>
                        <input type="email" name="email" value= "<?php echo $email; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control date">
                        <label for="">Address</label>
                        <input type="text" name="address" value= "<?php echo $address; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Phone No</label>
                        <input type="text" name="phone_no" value= "<?php echo $phone_no; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">National ID</label>
                        <input type="text" name="national_id" value= "<?php echo $national_id; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <button type="submit" name="update-tenant" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>
 
</body>
</html>