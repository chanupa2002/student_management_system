<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 
	

	$errors = array();

	$user_id = '';
	$name = '';
	$contactNo = '';
	$parentName = '';
	$address = '';


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
				$contactNo = $result['contactNo'];
				$parentName = $result['parentName'];
				$address = $result['address'];
				
				

			} else {
				// student not found
				header('Location: students.php?err=student_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: students.php?err=query_failed');
		}

	}

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Profile</title>
	<link rel="stylesheet" href="css/style_details.css">
</head>
<body>
	
<?php include 'headers/header_details.php'; ?>


	<main>
		<?php 
			if (!empty($errors)) {
				display_errors($errors);
			}
		 ?>

		<form action="payment.php" method="post" class="userform">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			
			<p>
				<?php
					$items = mysqli_query($connection, $query);

					while ($row = mysqli_fetch_assoc($items)) {
	
						foreach (json_decode($row["image"]) as $image) {
						$image = "<img src='uploads/{$image}' width='200' id='profimg'>";
						}
					}
					echo $image;

				?>
			</p>

			<p>
				<input type="hidden" name="std" value="<?php echo $user_id; ?>">
			</p>
		</form>

		<table>

			<tr>
				<th>Student ID</th>
				<th><?php echo $user_id; ?></th>
			</tr>
			<tr>
				<th>Student Name</th>
				<th><?php echo $name; ?></th>
			</tr>
			<tr>
				<th>Contact No</th>
				<th><?php echo $contactNo; ?></th>
			</tr>
			<tr>
				<th>Parent Name</th>
				<th><?php echo $parentName; ?></th>
			</tr>
			<tr>
				<th>Address</th>
				<th><?php echo $address; ?></th>
			</tr>
		
		</table>

	</main>
	
	<div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>


    <script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>