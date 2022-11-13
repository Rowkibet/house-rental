<?php

function validateUser($user) {
    $errors = array();

    if(empty($user['username'])) {
        array_push($errors, 'username is required');
    }

    if(empty($user['role_id'])) {
        array_push($errors, 'user role is required');
    }

    if(empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
 
    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Passwords do not match');
    }
    
    return $errors;
}

function validateLogin($user) {
    $errors = array();

    if(empty($user['username'])) {
        array_push($errors, 'username is required');
    }
    
    if(empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    
    return $errors;
}

function validateUpdate($user) {
    $errors = array();

    if(empty($user['username'])) {
        array_push($errors, 'username is required');
    }

    if(empty($user['role_id'])) {
        array_push($errors, 'user role is required');
    }
 
    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Passwords do not match');
    }

    return $errors;

}