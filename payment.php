<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 
	

	$errors = array();

	$user_id = '';
	$name = '';

	$jan = '';
	$feb = '';
	$march = '';
	$april = '';
	$may = '';
	$june = '';
	$july = '';
	$aug = '';
	$sep = '';
	$oct = '';
	$nov = '';
	$december = '';


	if (isset($_GET['user_id'])) {
		// getting the student information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$query = "SELECT * FROM classfee WHERE id = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// student found
				$result = mysqli_fetch_assoc($result_set);
				$user_id = $result['id'];
				$name = $result['name'];

				$jan = $result['jan'];
				$feb = $result['feb'];
				$march = $result['march'];
				$april = $result['april'];
				$may = $result['may'];
				$june = $result['june'];
				$july = $result['july'];
				$aug = $result['aug'];
				$sep = $result['sep'];
				$oct = $result['oct'];
				$nov = $result['nov'];
				$december = $result['december'];


			} else {
				// user not found
				header('Location: students.php?err=student_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: students.php?err=query_failed');
		}

	}

	if (isset($_POST['submit'])) {

		$payment = $_POST['payment'];

		$std = $_POST['std'];

		if (empty($errors)) {

			// no errors found... adding new record
			$payment = mysqli_real_escape_string($connection, $_POST['payment']);

			if ($payment == "Jan_paid") {
				$query = "UPDATE classfee SET jan = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "Feb_paid") {
				$query = "UPDATE classfee SET feb = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "March_paid") {
				$query = "UPDATE classfee SET march = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "April_paid") {
				$query = "UPDATE classfee SET april = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "May_paid") {
				$query = "UPDATE classfee SET may = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "June_paid") {
				$query = "UPDATE classfee SET june = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "July_paid") {
				$query = "UPDATE classfee SET july = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "Aug_paid") {
				$query = "UPDATE classfee SET aug = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "Sep_paid") {
				$query = "UPDATE classfee SET sep = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "Oct_paid") {
				$query = "UPDATE classfee SET oct = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "Nov_paid") {
				$query = "UPDATE classfee SET nov = 'PAID' WHERE id = {$std} LIMIT 1";
			}

			else if ($payment == "December_paid") {
				$query = "UPDATE classfee SET december = 'PAID' WHERE id = {$std} LIMIT 1";
			}
			

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: months.php?student_payment=true');
			} else {
				$errors[] = 'Failed to modify the payment.';
			}

		}
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment</title>
	<link rel="stylesheet" href="css/style_payment.css">
</head>
<body>
	
<?php include 'headers/header_payment.php'; ?>

		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		?>
		
	<div class="container">

		<form action="payment.php" method="post" class="add-product-form">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			<h3>New Payment</h3>
			<p class="desc">
				<label for="">Student ID: <?php echo $user_id; ?></label>
			</p>
			<p class="desc">
				<label for="">Student Name: <?php echo $name; ?></label>
			</p>

			<p class="desc">Select Month : 
                <select name = "payment" class="" required>
                    <option value = "payment">Month</option>
                    <option value = "Jan_paid">January</option>
                    <option value = "Feb_paid">February</option>
                    <option value = "March_paid">March</option>
                    <option value = "April_paid">April</option>
                    <option value = "May_paid">May</option>
                    <option value = "June_paid">June</option>
                    <option value = "July_paid">July</option>
                    <option value = "Aug_paid">August</option>
					<option value = "Sep_paid">September</option>
                    <option value = "Oct_paid">October</option>
                    <option value = "Nov_paid">November</option>
                    <option value = "December_paid">December</option>
                </select>
            </p>

			<p>
				<input type="hidden" name="std" value="<?php echo $user_id; ?>">
			</p>

			<p class="desc">
				<label for="">&nbsp;</label>
				<button type="submit" name="submit" class="btn">Pay</button>
			</p>

		</form>

	</div>

	<div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>


    <script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>