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
		$user_list .= "<td class='prof'><a href=\"details.php?user_id={$user['id']}\"><p class='prof'><i class='fa fa-user-circle' aria-hidden='true'></i></p></a></td>";
		$user_list .= "<td class='profDel'><a href=\"deleteStudent.php?user_id={$user['id']}\" 
						onclick=\"return confirm('Are you sure?');\"><p class='delStd'><i class='fa fa-trash' aria-hidden='true'></i></i></p></a></td>";
		$user_list .= "</tr>";
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students</title>
	<link rel="stylesheet" href="css/style_students.css">
</head>
<body>

<?php include 'headers/header_students.php'; ?>


	<main>
		<div id="homePg">
			<table class="masterlist">
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Profile</th>
					<th>Delete</th>
				</tr>

				<?php echo $user_list; ?>

			</table>
		</div>
	</main>
	
	<div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>


	<script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>