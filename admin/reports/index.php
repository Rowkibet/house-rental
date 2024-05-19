<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\payments.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/houses.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="print.css">
    <title>Reports</title>
</head>
<body>
     <!-- navigation bar -->
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
        <!-- Admin content -->
        <div class="admin-content">
            
        <?php if(count($filterErrors) > 0): ?>
            <div class="msg error">
                <?php foreach ($filterErrors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

            <div class="flex">
                <div class="filter">
                    <form action="index.php" method="post">
							<label>House type</label>
							<select name="house_type_id" id="">
                                <option value="all">All</option>
								<?php foreach($house_types as $key => $house_type): ?>
									<?php if(!empty($houseType_id) && $houseType_id == $house_type['id']): ?>
										<option selected value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
									<?php else: ?>
										<option value="<?php echo $house_type['id']; ?>"><?php echo $house_type['name']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>

							<label>From date</label>
							<input type="date" name="from_date" value="<?php echo $from_date; ?>"> 

							<label>To date</label>
							<input type="date" name="to_date" value="<?php echo $to_date; ?>">

                        <button type="submit" name="filter-report">Submit</button>
                    </form>
                    </form>
                </div>
            </div>

            <div class="table-wrapper" id="payment-table">
                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Payment Report</h2>
                <h4>From date: <?php echo isset($from_date) ? date("d/m/Y", strtotime($from_date)) : "n/a"; ?> </br>
                    To date: <?php echo isset($to_date) ? date("d/m/Y", strtotime($to_date)) : "n/a"; ?>
				</h4>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Tenant Name</th>
                        <th>House No</th>
                        <th>House Type</th>
                        <th>Date Paid</th>
                        <th>Amount</th>
                    </thead>

                    <!-- table rows -->
					<?php foreach($selected_payments as $key => $payment) : ?>
                        <tr>
                            <td><?php echo $key+1 . "." ; ?></td>
                            <td><?php echo ($payment['first_name'] . " " . $payment['last_name']); ?></td>
                            <td><?php echo $payment['house_id']; ?></td>
                            <td><?php echo $payment['houseType']; ?></td>
                            <td><?php echo $payment['payment_date']; ?></td>
                            <td><?php echo $payment['amount']; ?></td>
                            <?php $total_amount+=$payment['amount']; ?>
                        </tr>
					<?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold">Total</td>
                        <td style="font-weight: bold"><?php echo $total_amount; ?></td>
                    </tr>
                </table>
            </div>

            <button class="btn" onclick="window.print()">Print</button>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->

    <script src="<?php echo BASE_URL . "\assets\js\print.js"; ?>"></script>
</body>
</html>