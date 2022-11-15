<?php

$table = 'contracts';

// retrieve all contracts details
$sql = "SELECT c.*, t.first_name, t.last_name, rpt.name AS rentPerTerms, h.id AS house_id, ht.rent FROM contracts AS c 
        JOIN tenants AS t ON c.tenant_id=t.id 
        JOIN rent_per_terms AS rpt ON c.rent_per_terms_id=rpt.id 
        JOIN houses AS h ON c.house_id=h.id
        JOIN house_type AS ht ON h.house_type_id=ht.id
        ORDER BY c.id DESC";
$allContracts = executeJoinQuery($sql);

// retrieve one of the contracts for specified tenant
if(isset($_SESSION['tenant_id'])) {
	$tenant_id = $_SESSION['tenant_id'];
	$contract = selectOne($table, ['tenant_id' => $tenant_id]);
}

// retrieve all contracts for specified tenant (user_profile page)
if(isset($_SESSION['tenant_id'])) {
	$tenant_id = $_SESSION['tenant_id'];
	$sql = "SELECT c.*, t.first_name, t.last_name, rpt.name AS rentPerTerms, h.id AS house_id, ht.rent FROM contracts AS c 
                JOIN tenants AS t ON c.tenant_id=t.id 
                JOIN rent_per_terms AS rpt ON c.rent_per_terms_id=rpt.id 
                JOIN houses AS h ON c.house_id=h.id 
                JOIN house_type AS ht ON h.house_type_id=ht.id
                WHERE c.tenant_id={$tenant_id}
                ORDER BY c.id DESC";
	$tenantContracts = executeJoinQuery($sql);
}

// for view contract details
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT c.*, t.first_name, t.last_name, rpt.name AS rentPerTerms, h.id AS house_id, ht.rent FROM contracts AS c 
            JOIN tenants AS t ON c.tenant_id=t.id 
            JOIN rent_per_terms AS rpt ON c.rent_per_terms_id=rpt.id 
            JOIN houses AS h ON c.house_id=h.id 
            JOIN house_type AS ht ON h.house_type_id=ht.id
            WHERE c.id={$id}";
    $contract = executeJoinQuery($sql);

    // display details on view page
    $contract_id = $contract[0]['id'];
    $tenant_name = $contract[0]['first_name'] . " " . $contract[0]['last_name'];
    $house_no = $contract[0]['house_id'];
    $start_of_contract = $contract[0]['start_of_contract'];
    $end_of_contract = $contract[0]['end_of_contract'];
    $duration = $contract[0]['duration'];
    $rent = $contract[0]['rent'];
    $rent_per_terms = $contract[0]['rentPerTerms'];
    $date_of_signing = $contract[0]['date_of_signing'];
    $contract_status = $contract[0]['status'];
}