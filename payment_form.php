<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\payments.php") ?>
<?php include(ROOT_PATH . "\app\controllers\contracts.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Payment Form</title>
</head>

<body>
    
<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- notification messages -->
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
    
    <div class="form-container">
        <div class="auth-form">
            <div class="form-header">
                <h2>Payment Form</h2>
            </div>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
    
            <form action="payment_form.php" method="post" novalidate>
                <div class="form-control">
                    <label for="">Select House</label>
                    <select name="contract_id" id="">
                        <option value=""></option>
                        <?php foreach($contracts as $key => $contract): ?>
                            <?php if(!empty($contract_id) && $contract_id == $contract['id']): ?>
                                <option selected value="<?php echo $contract['id']; ?>"><?php echo $contract['house_id']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $contract['id']; ?>"><?php echo $contract['house_id']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Amount</label>
                    <input type="text" name="amount" value="<?php echo $amount?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <button type="submit" name="payment-form-btn">Submit</button>
            </form>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>