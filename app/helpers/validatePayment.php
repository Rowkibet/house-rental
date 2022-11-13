<?php

function validatePayment($payment) {
    $errors = array();

    if(empty($payment['contract_id'])) {
        array_push($errors, 'House No is required');
    }

    if(empty($payment['amount'])) {
        array_push($errors, 'amount is required');
    }
    
    return $errors;
}