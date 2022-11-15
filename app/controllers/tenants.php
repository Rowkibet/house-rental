<?php
include(ROOT_PATH . "/app/helpers/validateTenant.php");
include(ROOT_PATH . "/app/helpers/loginUser.php");

$errors = array();
$table = 'tenants';

$id = '';
$first_name = '';
$last_name = '';
$username = '';
$email = '';
$address = '';
$phone_no = '';
$national_id = '';
$password = '';
$passwordConf = '';

// retrieve all tenant details
$tenants = selectAll($table);
$noOfTenants = count($tenants);

// retrieve tenant details for specified tenant
if(isset($_SESSION['tenant_id'])) {
    $tenant_id = $_SESSION['tenant_id'];
    $tenant = selectOne($table, ['id' => $tenant_id]);
}

// tenant registration
if(isset($_POST['add-tenant']) || isset($_POST['register-btn'])) {
    $errors = validateTenant($_POST);

    if(count($errors) === 0) {
        $register_btn = isset($_POST['register-btn']) ? 1 : 0;
        unset($_POST['add-tenant'], $_POST['register-btn'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Store user data separately
        $user_data['username'] = $_POST['username'];
        $user_data['password'] = $_POST['password'];
        $user_data['role_id'] = '3';
        unset($_POST['username'], $_POST['password']);
        $user_id = create('users', $user_data);

        // Store tenant data with the new user ID
        $_POST['user_id'] = $user_id;
        $tenant_id = create($table, $_POST);

        if($register_btn) {
            $user = selectOne('users', ['id' => $user_id]);
            $user['tenant_id'] = $tenant_id;

            //Log User In
            loginUser($user); 
        } else {
            $_SESSION['message'] = 'Tenant Added Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\tenants\index.php');
            exit();
        }

    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $national_id = $_POST['national_id'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// for view tenant details, update tenant & edit tenant details @ public pages
if(isset($_GET['tenant_id'])) {
    $id = $_GET['tenant_id'];
    $tenant = selectOne($table, ['id' => $id]);

    // display details on update form & view page
    $first_name = $tenant['first_name'];
    $last_name = $tenant['last_name'];
    $email = $tenant['email'];
    $address = $tenant['address'];
    $phone_no = $tenant['phone_no'];
    $national_id = $tenant['national_id'];
}

if(isset($_POST['update-tenant']) || isset($_POST['edit-btn'])) {
    $errors = validateUpdate($_POST);

    if(count($errors) === 0) {
        $update_tenant = isset($_POST['update-tenant']) ? 1 : 0;
        $id = $_POST['id'];
        unset($_POST['id'], $_POST['update-tenant'], $_POST['edit-btn']);
    
        // Update Tenant data
        $count = update($table, $id, $_POST);
    
        if($update_tenant) {
            $_SESSION['message'] = 'Tenant Updated Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\tenants\index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Tenant Details Updated Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\user_profile.php');
            exit();
        }
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $national_id = $_POST['national_id'];
    }


}

// delete tenant
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    // Delete user data
    $user_id = selectOne($table, ['id' => $id]);
    $count = delete('users', $user_id);

    // Delete Tenant data
    $count = delete($table, $id);

    $_SESSION['message'] = 'Tenant Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\tenants\index.php');
    exit();
}