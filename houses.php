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
    <title>Houses</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    
    <!-- page wrapper -->
    <div class="page-wrapper">
        <div class="room-filter">
            <form action="houses.php" method="post">
                <select name="house_type" id="">
                    <option value="all">All</option>
                    <?php foreach($house_types as $key => $house_type): ?>
                        <?php if(!empty($house_type_id) && $house_type_id == $house_type['id']): ?>
                            <option selected value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="filter-house">Filter</button>
            </form>
        </div>

        <h1 class="houses-title"> <?php echo empty($house_type_name) ? "All Houses" : $house_type_name; ?></h1>

        <div class="house-wrapper">
        <?php foreach($houses as $key => $house): ?>
            <div class="houses house-1">
                <div class="house-image">
                    <img src="<?php echo 'assets/images/' . $house['house_images']; ?>" alt="">
                </div>
                <div class="house-text">
                <h1 class=""> House No. <?php echo $house['id']; ?> </h1>
                        <p>House Type: <?php echo $house['houseType']; ?></p>
                        <p>House Price: <?php echo $house['rent']; ?></p>
                        <p>Status: <?php echo ($house['is_available']) ? 'Available' : 'Occupied'; ?></p>

                    <a href="single_house.php?id=<?php echo $house['id']; ?>" class="btn book-btn"> Book Now</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>


    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    
</body>
</html>