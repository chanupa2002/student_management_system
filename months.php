<?php session_start(); ?>
<?php require_once('connection.php'); ?>

<?php 

	$user_list = '';

	$query = "SELECT * FROM classfee WHERE december IS NOT NULL ORDER BY id";
	

	$users = mysqli_query($connection, $query);

	
	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['id']}</td>";
		$user_list .= "<td>{$user['name']}</td>";
		$user_list .= "<td><p class='paid'>{$user['jan']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['feb']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['march']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['april']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['may']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['june']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['july']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['aug']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['sep']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['oct']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['nov']}</p></td>";
		$user_list .= "<td><p class='paid'>{$user['december']}</p></td>";
		$user_list .= "<td><a href=\"payment.php?user_id={$user['id']}\"><p class='pay'>Pay -></p></a></td>";
		$user_list .= "</tr>";
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Monthly Payments</title>
	<link rel="stylesheet" href="css/style_months.css">
</head>
<body>

<?php include 'headers/header_months.php'; ?>


	<main>
		<table class="masterlist">
			<tr>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>January</th>
				<th>February</th>
				<th>March</th>
				<th>April</th>
				<th>May</th>
				<th>June</th>
				<th>July</th>
				<th>August</th>
				<th>September</th>
				<th>October</th>
				<th>November</th>
				<th>December</th>
				<th>Do-Payments</th>
			</tr>

			<?php echo $user_list; ?>
		</table>
	</main>

	<div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>


    <script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>