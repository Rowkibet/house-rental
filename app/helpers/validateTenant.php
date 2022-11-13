<?php

function validateTenant($tenant) {
    $errors = array();

    if(empty($tenant['first_name'])) {
        array_push($errors, 'first name is required');
    }

    if(empty($tenant['last_name'])) {
        array_push($errors, 'last name is required');
    }

    if(empty($tenant['username'])) {
        array_push($errors, 'username is required');
    }

    if(empty($tenant['email'])) {
        array_push($errors, 'Email is required');
    }
    
    if(empty($tenant['address'])) {
        array_push($errors, 'address is required');
    }

    if(empty($tenant['phone_no'])) {
        array_push($errors, 'Phone No is required');
    }

    if(empty($tenant['national_id'])) {
        array_push($errors, 'national id is required');
    }

    if(empty($tenant['password'])) {
        array_push($errors, 'Password is required');
    }
 
    if($tenant['passwordConf'] !== $tenant['password']) {
        array_push($errors, 'Passwords do not match');
    }

    $existingEmail = selectOne('tenants', ['email' => $tenant['email']]);
    if($existingEmail['email']) {
        array_push($errors, 'Email already exists');
    }
    
    $existingPhoneNo = selectOne('tenants', ['phone_no' => $tenant['phone_no']]);
    if($existingPhoneNo['phone_no']) {
        array_push($errors, 'Phone No already exists');
    }
    
    return $errors;
}

function validateUpdate($tenant) {
    $errors = array();

    if(empty($tenant['first_name'])) {
        array_push($errors, 'first name is required');
    }

    if(empty($tenant['last_name'])) {
        array_push($errors, 'last name is required');
    }

    if(empty($tenant['email'])) {
        array_push($errors, 'Email is required');
    }
    
    if(empty($tenant['address'])) {
        array_push($errors, 'address is required');
    }

    if(empty($tenant['phone_no'])) {
        array_push($errors, 'Phone No is required');
    }

    if(empty($tenant['national_id'])) {
        array_push($errors, 'national id is required');
    }

    return $errors;

}