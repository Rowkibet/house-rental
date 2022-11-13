<?php

function validateHouse($house) {
    $errors = array();

    if(empty($house['house_type_id'])) {
        array_push($errors, 'house type is required');
    }

    if(empty($house['is_available']) && $house['is_available'] !== '0') {
        array_push($errors, 'house status is required');
    }
    
    return $errors;
}