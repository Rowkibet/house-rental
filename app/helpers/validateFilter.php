<?php

function validateFilter($filter) {
    $filterErrors = array();

    if(empty($filter['from_date']) || empty($filter['to_date'])) {
        array_push($filterErrors, 'Fill in all the fields');
    }
    
    return $filterErrors;
}