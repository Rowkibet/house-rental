<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/tenants.php") ?>
<?php include(ROOT_PATH . "/app/controllers/contracts.php") ?>
<?php include(ROOT_PATH . "/app/controllers/invoices.php") ?>
<?php include(ROOT_PATH . "/app/controllers/payments.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>User Profile Page</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- main content -->

    <div class="user-page-wrapper">

    <!-- notification messages -->
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <div class="user-wrapper">
            <div class="inner-wrapper">
                <div class="user-image">
                    <img src="assets/images/user-icon.png" alt="">
                </div>
                <div class="user-details">
                    <p><?php echo $tenant['first_name'] . " " . $tenant['last_name']; ?></p>
                    <p>Tenant ID: <?php echo $tenant['id']; ?></p>
                    <p>House No: <?php echo isset($contract['house_id']) ? $contract['house_id'] : "n/a"; ?></p>
                    <a href="<?php echo BASE_URL . '/edit_tenant.php?tenant_id=' . $tenant['id']; ?>">Edit Details</a>
                </div> 
            </div>
            <div class="user-more-info">
                <table>
                    <tr>
                        <td>Phone:</td>
                        <td><?php echo $tenant['phone_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $tenant['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="user-content-wrapper">
            <!-- Invoices -->
            <div class="user-table">
                <h2>Invoices</h2>
                <table>
                    <thead>
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>House No</th>
                        <th>Total Rent</th>
                        <th>Balance</th>
                        <th>Due Date</th>
                        <th>Date Created</th>
                    </thead>
                    <?php foreach($tenantInvoices as $key => $invoice) : ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $invoice['id']; ?></td>
                            <td><?php echo $invoice['house_id']; ?></td>
                            <td><?php echo $invoice['total_rent']; ?></td>
                            <td><?php echo $invoice['balance']; ?></td>
                            <td><?php echo $invoice['due_date']; ?></td>
                            <td><?php echo $invoice['date_created']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <button class="small-btn pay-rent"><a href="payment_form.php">Pay Rent</a></button>
            </div>
            <!-- //Invoices -->

            <!-- Payment History -->
            <div class="user-table">
                <h2>Payment History</h2>
                <table>
                    <thead>
                        <th>#</th>
                        <th>Receipt No</th>
                        <th>Date Paid</th>
                        <th>Amount</th>
                        <th>Paid For</th>
                        <th>House No</th>
                    </thead>
                    <?php foreach($tenantPayments as $key => $payment) : ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $payment['receipt_no']; ?></td>
                            <td><?php echo $payment['payment_date']; ?></td>
                            <td><?php echo $payment['amount']; ?></td>
                            <td><?php echo $payment['paidFor']; ?></td>
                            <td><?php echo $payment['house_id']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- //Payment History -->

            <!-- Contracts -->
            <div class="user-table contracts">
                <h2>Contracts</h2>
                <table>
                    <thead>
                        <th>#</th>
                        <th>Contract ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                        <th>House No</th>
                        <th>Rent</th>
                        <th>Rent Per Terms</th>
                        <th>Date of Signing</th>
                        <th>Status</th>
                    </thead>
                    <?php foreach($tenantContracts as $key => $contract) : ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $contract['id']; ?></td>
                            <td><?php echo $contract['start_of_contract']; ?></td>
                            <td><?php echo $contract['end_of_contract']; ?></td>
                            <td><?php echo $contract['duration']; ?></td>
                            <td><?php echo $contract['house_id']; ?></td>
                            <td><?php echo $contract['rent']; ?></td>
                            <td><?php echo $contract['rentPerTerms']; ?></td>
                            <td><?php echo $contract['date_of_signing']; ?></td>
                            <td><?php echo ($contract['status']) ? 'Active' : 'Inactive'?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- //Contracts -->

        </div>
    </div>

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>