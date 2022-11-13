<?php
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/loginUser.php");

$errors = array();
$table = 'users';

$username = '';
$password = '';
$passwordConf = '';
$role_id = '';
$role_type_name = 'All Users';

// Retrieve all user details
$sql = "SELECT u.*, r.role_type FROM users AS u 
        JOIN roles AS r ON u.role_id=r.id";
$users = executeJoinQuery($sql);

// Retrieve all user roles - drop down menu at add user
$roles = selectAll('roles');

// user login
if(isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if(count($errors) === 0) {
        unset($_POST['login-btn']);

        $user = selectOne($table, ['username' => $_POST['username']]);
        if($user && password_verify($_POST['password'], $user['password'])) {
            //Log User In
            $tenant = selectOne('tenants', ['user_id' => $user['id']]);
            $user['tenant_id'] = $tenant['id'];
            loginUser($user);
            exit();
        } else {
            array_push($errors, 'Invalid username or password');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

// add user (admin & landlord)
if(isset($_POST['add-user'])) {
    $errors = validateUser($_POST);

    if(count($errors) === 0) {
        unset($_POST['add-user'],$_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);

        $_SESSION['message'] = 'User Added Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\users\index.php');
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $role_id = $_POST['role_id'];
    }
}

// view user details
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT u.*, r.role_type FROM users AS u 
            JOIN roles AS r ON u.role_id=r.id
            WHERE u.id={$id}";
    $user = executeJoinQuery($sql);

    // display details on view page
    $id = $user[0]['id'];
    $username = $user[0]['username'];
    $role_id = $user[0]['role_id'];
}

if(isset($_POST['update-user'])) {
    $errors = validateUpdate($_POST);

    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
        if(empty($_POST['password'])) {
            unset($_POST['password']);
        } else {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $count = update($table, $id, $_POST);

        $_SESSION['message'] = 'User Updated Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\users\index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $role_id = $_POST['role_id'];
    }

}

// Delete user
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    // deletes both user & tenant record as foreign key constraint is set to CASCADE
    $count = delete($table, $id);

    $_SESSION['message'] = 'User Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\users\index.php');
    exit();
}
