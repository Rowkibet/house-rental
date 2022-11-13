<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\users.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Add User</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/users/index.php"?>">All Users</a></button>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Add User</h2>
                </div>

                <form action="create.php" method="post" novalidate>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <div class="form-control">
                    <label for="">Username</label>
                    <input type="text" name="username" value= "<?php echo $username; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">User Role</label>
                    <select name="role_id" id="">
                        <option value=""></option>
                        <?php foreach(array_slice($roles, 0, 2) as $key => $role): ?>
                            <?php if(!empty($role_id) && $role_id == $role['id']): ?>
                                <option selected value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?php echo $password ?>" id="password">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Confirm Password</label>
                    <input type="password" name="passwordConf" value="<?php echo $passwordConf ?>" id="confirm-password">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                    <button type="submit" name="add-user" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>