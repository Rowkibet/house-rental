<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "/app/controllers/houses.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Homepage - House Rental</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- notification messages -->
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- page wrapper -->
    <div class="page-wrapper">
        <h1 class="houses-title"> Maisonettes </h1>
        <div class="house-wrapper">
            <?php foreach(array_slice($maisonettes, 0, 3) as $key => $maisonette): ?>
                <div class="houses house-1">
                    <div class="house-image">
                        <img src="<?php echo 'assets/images/' . $maisonette['house_images']; ?>" alt="">
                    </div>
                    <div class="house-text">
                        <h1 class=""> House No. <?php echo $maisonette['id']; ?> </h1>
                        <p>House Type: <?php echo $maisonette['houseType']; ?></p>
                        <p>House Rent: <?php echo $maisonette['rent']; ?></p>
                        <p>Status: <?php echo ($maisonette['is_available']) ? 'Available' : 'Occupied'; ?></p>

                        <a href="single_house.php?id=<?php echo $maisonette['id']; ?>" class="btn book-btn"> Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="#" class="btn browse-btn"> Browse More Maisonettes</a>

        <h1 class="houses-title"> Apartments </h1>
        <div class="house-wrapper">
            <?php foreach(array_slice($apartments, 0, 3) as $key => $apartment): ?>
                <div class="houses house-1">
                    <div class="house-image">
                        <img src="<?php echo 'assets/images/' . $apartment['house_images']; ?>" alt="">
                    </div>
                    <div class="house-text">
                        <h1 class=""> House No. <?php echo $apartment['id']; ?> </h1>
                        <p>House Type: <?php echo $apartment['houseType']; ?></p>
                        <p>House Rent: <?php echo $apartment['rent']; ?></p>
                        <p>Status: <?php echo ($apartment['is_available']) ? 'Available' : 'Occupied';; ?></p>

                        <a href="single_house.php?id=<?php echo $apartment['id']; ?>" class="btn book-btn"> Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="#" class="btn browse-btn"> Browse More Apartments</a>

    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>