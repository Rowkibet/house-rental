<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\houses.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Single House</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- main content -->
    <div class="single-house">
        <div class="house-image">
            <img src="<?php echo 'assets/images/' . $house_images; ?>" alt="">
        </div>
        <div class="house-text">
            <h1 class=""> House Description </h1>
            <p>House No: <?php echo $house_id; ?></p>
            <p>House Type: <?php echo $house_type; ?></p>
            <p>House Status: <?php echo ($house_status) ? 'Available' : 'Occupied'; ?></p>
            <p>House Rent: <?php echo $house_rent; ?></p>
            <p>House Deposit: <?php echo $house_deposit; ?></p>

            <button class="small-btn"><a href="pay_deposit.php?book_house_id=<?php echo $house_id; ?>">Book House</a></button>
        </div>
    </div>

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>