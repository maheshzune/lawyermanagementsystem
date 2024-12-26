<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['status'] !== 'Active') {
    header('Location: login.php?deactivate');
    exit;
}

if ($_SESSION['login'] == TRUE and $_SESSION['status'] == 'Active') {

	//session_start();
	include("db_con/dbCon.php");
	$a=$_SESSION['client_id'];
							$conn = connect();
							
	$result = mysqli_query($conn,"SELECT * FROM user,client WHERE user.u_id=client.client_id AND user.status='Active' AND user.u_id='$a'");
	
	?>
	<!doctype html>
	<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
			integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/simple-sidebar.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/media.css">
		<title></title>
	</head>

	<body>
		<header class="customnav bg-success">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-lg ">
							<a class="navbar-brand cus-a" href="index.php">Lawyer Management System</a>


							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto ">
									<li class="">
										<a class="nav-link cus-a" href="#">Full Name: <?php echo $_SESSION['first_Name']; ?>
											<?php echo $_SESSION['last_Name']; ?></a>
									</li>
									<li class="">
										<a class="nav-link cus-a" href="logout.php">Log Out</a>
									</li>

								</ul>

							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<body>

			<div class="d-flex" id="wrapper">

				<!-- Sidebar -->
				<div class="bg-light border-right" id="sidebar-wrapper">
					<div class="sidebar-heading">My Profile</div>
					<div class="list-group list-group-flush">
						<a href="user_dashboard.php"
							class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
						<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit
							Profile</a><!--user_profile page-->
						<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking
							requests</a><!--booking page-->
						<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update
							Password</a><!--booking page-->
					</div>
				</div>
				<!-- /#sidebar-wrapper -->

				<!-- Page Content -->
				<div id="page-content-wrapper">
					<?php if (isset($_GET['done'])) {
						echo "<div class='alert alert-danger alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Welcome!</strong> You are login as a normal user.
							</div>";
					} ?>
					<?php
					while($row = mysqli_fetch_array($result)) {
					?>
					<div class="container-fluid">
						<div
							style="max-width: 800px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
							<div style="text-align: center; margin-bottom: 20px;">
								<img src="images/upload/<?php echo $row["image"]; ?>" alt="User Avatar"
									style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid #ddd; margin-bottom: 10px;">
								<h2><?php echo htmlspecialchars($_SESSION['first_Name'] . ' ' . $_SESSION['last_Name']); ?>
								</h2>
								<p style="color: #666; font-size: 14px;"><?php echo htmlspecialchars($_SESSION['email']); ?>
								</p>
							</div>
							<div style="margin-top: 20px;">
								<h3 style="margin-bottom: 10px;">Personal Information</h3>
								<p style="margin: 5px 0; color: #333;"><strong>Full Name:</strong>
									<?php echo htmlspecialchars($_SESSION['first_Name'] . ' ' . $_SESSION['last_Name']); ?>
								</p>
								<p style="margin: 5px 0; color: #333;"><strong>Email:</strong>
									<?php echo htmlspecialchars($_SESSION['email']); ?></p>
								<p style="margin: 5px 0; color: #333;"><strong>Phone:</strong>
								<?php echo $row["contact_number"]; ?></p>
								<p style="margin: 5px 0; color: #333;"><strong>Address:</strong>
								<?php echo $row["full_address"]; ?></p>
								<h3 style="margin-top: 20px; margin-bottom: 10px;">Account Details</h3>
								<p style="margin: 5px 0; color: #333;"><strong>Username:</strong>
								<?php echo $row["u_id"]; ?></p>
								
							</div>
							<div style="text-align: center; margin-top: 20px;">
								<a href="user_profile.php"
									style="text-decoration: none; background: #007BFF; color: #fff; padding: 10px 20px; border-radius: 5px;">Edit
									Profile</a>
							</div>
						</div>
                  <?php
					}?>

					</div>
				</div>
				<!-- /#page-content-wrapper -->

			</div>
			<!-- /#wrapper -->



		</body>
		<footer class="bg-success">
			<div class="container">
				<div class="row">
					<div class="col">
						<h5>All rights reserved 2022</h5>
					</div>
				</div>
			</div>
		</footer>
		<!-- Optional JavaScript -->
		<!-- jQuery -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
			integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
			crossorigin="anonymous"></script>
	</body>

	</html>
	<?php

} else
	header('location:login.php?deactivate');
?>