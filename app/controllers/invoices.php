<?php

$table = 'invoices';

$invoice_id = '';
$tenant_name = '';
$house_no = '';
$rent = '';
$balance = '';
$due_date = '';

// retrieve all invoice details
$sql = "SELECT i.*, t.first_name, t.last_name, c.house_id FROM invoices AS i 
        JOIN tenants AS t ON i.tenant_id=t.id 
        JOIN contracts AS c ON i.contract_id=c.id
        ORDER BY i.id DESC";
$invoices = executeJoinQuery($sql);

// retrieve all invoice details for specified tenant (user_profile page)
if(isset($_SESSION['tenant_id'])) {
        $tenant_id = $_SESSION['tenant_id'];
        $sql = "SELECT i.*, t.first_name, t.last_name, c.house_id FROM invoices AS i 
                JOIN tenants AS t ON i.tenant_id=t.id 
                JOIN contracts AS c ON i.contract_id=c.id
                WHERE t.id={$tenant_id}
                ORDER BY i.id DESC";
        $tenantInvoices = executeJoinQuery($sql);
}
