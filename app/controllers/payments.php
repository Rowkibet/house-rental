<?php
include(ROOT_PATH . "/app/helpers/validatePayment.php");

$errors = array();
$table = 'payments';

$payment_id = '';
$receipt_no = '';
$tenant_name = '';
$house_no = '';
$amount = '';
$paid_for = '';
$balance = '';
$date_paid = '';
$invoice_id = '';

// pay deposit variables
$house_no = '';
$house_type = '';
$rent = '';
$rent_per_terms = '';
$deposit = '';

// retrieve all payment details
$sql = "SELECT p.*, t.first_name, t.last_name, h.id AS house_id, i.balance, i.id AS invoice_id, i.due_date, pf.name AS paidFor FROM payments AS p 
        JOIN tenants AS t ON p.tenant_id=t.id 
        JOIN houses AS h ON p.house_id=h.id 
        JOIN invoices AS i ON p.invoice_id=i.id
        JOIN paid_for AS pf ON p.paid_for_id=pf.id
		ORDER BY p.id DESC";
$payments = executeJoinQuery($sql);
$noOfPayments = count($payments);

// retrieve all payments for specified tenant (user_profile page)
if(isset($_SESSION['tenant_id'])) {
        $tenant_id = $_SESSION['tenant_id'];
        $sql = "SELECT p.*, t.first_name, t.last_name, h.id AS house_id, i.balance, i.id AS invoice_id, pf.name AS paidFor FROM payments AS p 
                JOIN tenants AS t ON p.tenant_id=t.id 
                JOIN houses AS h ON p.house_id=h.id 
                JOIN invoices AS i ON p.invoice_id=i.id
                JOIN paid_for AS pf ON p.paid_for_id=pf.id
                WHERE p.tenant_id={$tenant_id}
				ORDER BY p.id DESC";
        $tenantPayments = executeJoinQuery($sql);
}

// for view payment details
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT p.*, t.first_name, t.last_name, h.id AS house_id, i.balance, i.id AS invoice_id, pf.name AS paidFor FROM payments AS p 
            JOIN tenants AS t ON p.tenant_id=t.id 
            JOIN houses AS h ON p.house_id=h.id 
            JOIN invoices AS i ON p.invoice_id=i.id
            JOIN paid_for AS pf ON p.paid_for_id=pf.id
            WHERE p.id={$id}";
    $payment = executeJoinQuery($sql);

    // display details on view page
    $payment_id = $payment[0]['id'];
    $receipt_no = $payment[0]['receipt_no'];
    $tenant_name = $payment[0]['first_name'] . " " . $payment[0]['last_name'];
    $house_no = $payment[0]['house_id'];
    $amount = $payment[0]['amount'];
    $paid_for = $payment[0]['paidFor'];
    $balance = $payment[0]['balance'];
    $date_paid = $payment[0]['payment_date'];
    $invoice_id = $payment[0]['invoice_id'];
}

// display house details & deposit amount
	if(isset($_GET['book_house_id'])) {
		$house_id = $_GET['book_house_id'];
		
		// fetch house data
		$sql = "SELECT h.*, ht.name AS houseType, ht.rent, ht.deposit FROM houses AS h 
				JOIN house_type AS ht ON h.house_type_id=ht.id
				WHERE h.id={$house_id}";
		$house = executeJoinQuery($sql);

			// Display data in pay deposit page
			$house_no = $house[0]['id'];
			$house_type = $house[0]['houseType'];
			$rent = $house[0]['rent'];
			$rent_per_terms = 'Monthly';
			$deposit = $house[0]['deposit'];
		}

	// pay deposit & book house
	if(isset($_GET['deposit'])) {
		$deposit = $_GET['deposit'];
		$house_id = $_GET['house_id'];

		// fetch house data
		$sql = "SELECT h.*, ht.name AS houseType, ht.rent, ht.deposit FROM houses AS h 
				JOIN house_type AS ht ON h.house_type_id=ht.id
				WHERE h.id={$house_id}";
		$house = executeJoinQuery($sql);

		// create contract
		$contract_data['start_of_contract'] = date("Y/m/d");
		$contract_data['end_of_contract'] = date('Y-m-d', strtotime('+2 years'));
		$contract_data['duration'] = '2';
		$contract_data['date_of_signing'] = date("Y/m/d");
		$contract_data['status'] = '1'; // active
		$contract_data['rent_per_terms_id'] = '2';
		$contract_data['house_id'] = $house_id;
		$contract_data['tenant_id'] = $_SESSION['tenant_id'];
		$contract_id = create('contracts', $contract_data);

		// create invoice
		$invoice_data['total_rent'] = $house[0]['rent'];
		$invoice_data['balance'] = $house[0]['rent'];
		$invoice_data['due_date'] = date('Y-m-d', strtotime('30 days'));
		$invoice_data['contract_id'] = $contract_id;
		$invoice_data['tenant_id'] = $_SESSION['tenant_id'];
		$invoice_data['status'] = '1'; // active
		$invoice_id = create('invoices', $invoice_data);

		// make payment & store record
		$payment_data['receipt_no'] = substr(strtoupper(time().uniqid(mt_rand())), -10);
		$payment_data['payment_date'] = date("Y/m/d");
		$payment_data['amount'] = $deposit;
		$payment_data['paid_for_id'] = '2'; // deposit
		$payment_data['tenant_id'] = $_SESSION['tenant_id'];
		$payment_data['house_id'] = $house_id;
		$payment_data['invoice_id'] = $invoice_id;
		$payment_id = create($table, $payment_data);

		// update house status to occupied
		$house = selectOne('houses', ['id' => $house_id]);
		$count = update('houses', $house['id'], ['is_available' => '0']);

		// redirect to user_profile after payment is done
		$_SESSION['message'] = 'Payment Made Successfully';
		$_SESSION['type'] = 'success';
		header('location: ' .BASE_URL . '/user_profile.php');
	}

// Select House & Enter amount to pay rent
if(isset($_POST['payment-form-btn'])) {
	$errors = validatePayment($_POST);

	if(count($errors) === 0) {
		$contract_id = $_POST['contract_id'];
		$amount = $_POST['amount'];

		// redirect to pay_rent.php
		header('location: ' .BASE_URL . '/pay_rent.php?pform_amount=' . $amount . '&pform_contract_id=' . $contract_id . '&tenant_id=' . $_SESSION['tenant_id']);
		exit();
	} else {
		$contract_id = $_POST['contract_id'];
		$amount = $_POST['amount'];
	}
}

// Display rent invoice details in pay_rent.php page
if(isset($_GET['pform_amount'])) {
	$contract_id = $_GET['pform_contract_id'];
	$pform_amount = $_GET['pform_amount'];

	// fetch invoice details
	$sql = "SELECT i.*, c.house_id, ht.name AS houseType, ht.deposit FROM invoices AS i 
			JOIN contracts AS c ON i.contract_id=c.id
			JOIN houses AS h ON c.house_id=h.id
			JOIN house_type AS ht ON h.house_type_id=ht.id
			WHERE i.contract_id={$contract_id}";
	$invoice = executeJoinQuery($sql);

	// Display data in pay rent page
	$invoice_id = $invoice[0]['id'];
	$house_no = $invoice[0]['house_id'];
	$house_type = $invoice[0]['houseType'];
	$total_rent = $invoice[0]['total_rent'];
	$balance = $invoice[0]['balance'];
	$amount = $pform_amount;
	$due_date = $invoice[0]['due_date'];
}

// Pay rent for selected house
if(isset($_GET['rent'])) {
	$contract_id = $_GET['contract_id'];
	$amount = $_GET['rent'];

	// update invoice
		// fetch the invoice record (that is active)
		$conditions['contract_id'] = $contract_id;
		$conditions['status'] = '1';
		$invoice = selectOne('invoices', $conditions);
	$invoice_data['balance'] = $invoice['balance'] - intval($amount);
	$count = update('invoices', $invoice['id'], $invoice_data);

	// fetch house ID of selected house
	$contract = selectOne('contracts', ['id' => $contract_id]);
	$house_id = $contract['house_id'];

	// store payment made
	$payment_data['receipt_no'] = substr(strtoupper(time().uniqid(mt_rand())), -10);
	$payment_data['payment_date'] = date("Y/m/d");
	$payment_data['amount'] = $amount;
	$payment_data['paid_for_id'] = '1'; // rent
	$payment_data['tenant_id'] = $_SESSION['tenant_id'];
	$payment_data['house_id'] = $house_id;
	$payment_data['invoice_id'] = $invoice['id'];
	$payment_id = create($table, $payment_data);

	// if user finishes paying the amount due, create new invoice
	if($invoice_data['balance'] === 0) {
		$count = update('invoices', $invoice['id'], ['status' => 0]);
		$new_due_date = date('Y-m-d', strtotime($invoice['due_date']. ' + 30 days'));

		// create new invoice
		$invoice_data['total_rent'] = $invoice['total_rent'];
		$invoice_data['balance'] = $invoice['total_rent'];
		$invoice_data['due_date'] = $new_due_date;
		$invoice_data['contract_id'] = $contract_id;
		$invoice_data['tenant_id'] = $_SESSION['tenant_id'];
		$invoice_data['status'] = '1'; // active
		$new_invoice_id = create('invoices', $invoice_data);
	}

	// redirect to user_profile after payment is done
	$_SESSION['message'] = 'Payment Made Successfully';
	$_SESSION['type'] = 'success';
	header('location: ' .BASE_URL . '/user_profile.php');
}