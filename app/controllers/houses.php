<?php
include(ROOT_PATH . "/app/helpers/validateHouse.php");

$errors = array();
$table = 'houses';

$house_id = '';
$house_type = '';
$house_images = '';
$house_price = '';
$house_type_id = '';
$house_status = '';
$house_type_name = '';
$house_deposit = '';

// retrieve all house details 
$sql = "SELECT h.*, ht.name AS houseType, ht.rent FROM houses AS h 
        JOIN house_type AS ht ON h.house_type_id=ht.id
        ORDER BY h.id DESC";
$houses = executeJoinQuery($sql);
$noOfHouses = count($houses);

// retrieve all house types - drop down menu (admin side)
$house_types = selectAll('house_type');

// retrieve all house details for Maisonettes to display at homepage
$sql = "SELECT h.*, ht.name AS houseType, ht.rent FROM houses AS h 
        JOIN house_type AS ht ON h.house_type_id=ht.id
        WHERE ht.id=2";
$maisonettes = executeJoinQuery($sql);

// retrieve all house details for apartments
$sql = "SELECT h.*, ht.name AS houseType, ht.rent FROM houses AS h 
        JOIN house_type AS ht ON h.house_type_id=ht.id
        WHERE ht.id=1";
$apartments = executeJoinQuery($sql);

// create house
if(isset($_POST['add-house'])) {
    $errors = validateHouse($_POST);

    if(!empty($_FILES['house_images']['name'])) {
        $image_name = time() . '_' . $_FILES['house_images']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['house_images']['tmp_name'], $destination);

        if($result) {
            $_POST['house_images'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "House image required");
    }

    if(count($errors) === 0) {
        unset($_POST['add-house']);
        $house_id = create($table, $_POST);

        $_SESSION['message'] = 'House Added Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\houses\index.php');
    } else {
        $house_type_id = $_POST['house_type_id'];
        $house_status = $_POST['is_available'];
    }
}

// for view house details & update house
if(isset($_GET['id']) || isset($_GET['house_id'])) {
    $house_id = isset($_GET['house_id']) ? $_GET['house_id'] : $_GET['id'];
    $sql = "SELECT h.*, ht.name AS houseType, ht.rent, ht.deposit FROM houses AS h 
            JOIN house_type AS ht ON h.house_type_id=ht.id
            WHERE h.id={$house_id}";
    $house = executeJoinQuery($sql);

    // for homepage, if user not logged in, prompt log in
    if(!isset($_SESSION['username'])) {
        $_SESSION['message'] = 'Please log in first';
        $_SESSION['type'] = 'error';  
        header('location: ' .BASE_URL . '\login.php');
    } 
    // for homepage, generate error if house is occupied
    else if($house[0]['is_available'] === 0 && isset($_GET['house_id'])) {
        $_SESSION['message'] = 'House is already occupied';
        $_SESSION['type'] = 'error';  
        header('location: ' .BASE_URL . '\index.php');
    }

    // display details on update form & view page
    $house_id = $house[0]['id'];
    $house_type = $house[0]['houseType'];
    $house_status = strval($house[0]['is_available']);
    $house_rent = $house[0]['rent'];
    $house_type_id = $house[0]['house_type_id'];
    $house_images = $house[0]['house_images'];
    $house_deposit = $house[0]['deposit'];
}

if(isset($_POST['update-house'])) {
    $errors = validateHouse($_POST);

    if(!empty($_FILES['house_images']['name'])) {
        $image_name = time() . '_' . $_FILES['house_images']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['house_images']['tmp_name'], $destination);

        if($result) {
            $_POST['house_images'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "House image required");
    }

    if(count($errors) === 0) {
        $house_id = $_POST['id'];
        unset($_POST['update-house'], $_POST['id']);
        $count = update($table, $house_id, $_POST);
    
        $_SESSION['message'] = 'House Updated Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\houses\index.php');
        exit();
    } else {
        $house_id = $_POST['id'];
        $house_type_id = $_POST['house_type_id'];
        $house_status = $_POST['is_available'];
    }
}

// Delete House
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);

    $_SESSION['message'] = 'House Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\houses\index.php');
    exit();
}

// house filter at houses page
if(isset($_POST['filter-house'])) {
    if($_POST['house_type'] === '2') {
        $houses = $maisonettes;
        $house_type_id = $_POST['house_type'];
        $house_type_name = 'Maisonettes';
    } else if($_POST['house_type'] === '1') {
        $houses = $apartments;
        $house_type_id = $_POST['house_type'];
        $house_type_name = 'Apartments';
    }  else {
        $houses = $houses;
        $house_type_id = 'all';
        $house_type_name = 'All Houses';
    }
}