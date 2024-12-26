<?php
	session_start();
	include("db_con/dbCon.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqSOr9EjcFbA7JQx7ukb7GPuvPpjsqVfj72N5G5wVb/eVclu2z8ld" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Lawyer Management System</title>
	<style>
		body {
			background-color: #f1f1f1;
			color: #333333;
			font-family: 'Arial', sans-serif;
		}
		.customnav {
			background-color: #343a40;
			color: white;
			padding: 10px 0;
		}
		.customnav .navbar-brand {
			font-size: 1.5rem;
			color: #ffffff;
		}
		.customnav .nav-link {
			color: #ffffff;
			margin-right: 15px;
		}
		.customnav .nav-link:hover {
			color: #adb5bd;
		}
		.banner {
			background: linear-gradient(135deg, #e8e8e8, #ffffff);
			padding: 50px 0;
			text-align: center;
		}
		.banner h1 {
			color: #333333;
			font-weight: bold;
		}
		.banner .btn {
			background-color: #343a40;
			color: #ffffff;
			border: none;
			padding: 10px 20px;
			font-size: 1.2rem;
		}
		.banner .btn:hover {
			background-color: #495057;
		}
		.lawyerscard .card {
			border: none;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			background-color: #ffffff;
			margin-bottom: 30px;
		}
		.lawyerscard .card img {
			border-radius: 10px 10px 0 0;
			height: 200px;
			object-fit: cover;
		}
		.lawyerscard .card-body {
			padding: 20px;
		}
		.lawyerscard .card-title {
			color: #343a40;
			font-weight: bold;
		}
		.lawyerscard .btn-info {
			background-color: #343a40;
			border: none;
			color: #ffffff;
		}
		.lawyerscard .btn-info:hover {
			background-color: #495057;
		}
		.aboutus {
			padding: 50px 0;
			background-color: #ffffff;
			text-align: center;
		}
		footer {
			background-color: #343a40;
			color: white;
			padding: 20px 0;
			text-align: center;
		}
	</style>
</head>
<body>
	<header class="customnav">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="navbar-brand" href="index.php">Lawyer Management System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="lawyers.php">Lawyers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About Us</a>
						</li>
						<?php if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){ ?>
							<li class="nav-item">
								<a class="nav-link" href="user_dashboard.php">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
						<?php }else{ ?>
							<li class="nav-item">
								<a class="nav-link" href="login.php">Login</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Register
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="lawyer_register.php">Register as a lawyer</a>
									<a class="dropdown-item" href="user_register.php">Register as a user</a>
								</div>
							</li>
						<?php }?>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<section>
		<div class="banner">
			<div class="container">
				<h1>Find Your Suitable Lawyer Here!</h1>
				<button class="btn">Find Lawyers</button>
			</div>
		</div>
	</section>
	<section class="lawyerscard">
		<div class="container">
			<div class="row">
				<?php
					$conn = connect();
					$result = mysqli_query($conn, "SELECT * FROM user,lawyer WHERE user.u_id=lawyer.lawyer_id AND user.status='Active'");
					while($row = mysqli_fetch_array($result)) {
				?>
					<div class="col-md-4">
						<div class="card">
							<img src="images/upload/<?php echo $row["image"]; ?>" class="card-img-top" alt="Lawyer Image">
							<div class="card-body">
								<h5 class="card-title"> <?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?> </h5>
								<p class="card-text">Specialty: <?php echo $row["speciality"]; ?></p>
								<p class="card-text">Experience: <?php echo $row["practise_Length"]; ?> years</p>
								<a class="btn btn-info" href="single_lawyer.php?u_id=<?php echo $row["u_id"]; ?>">
									<i class="fa fa-street-view"></i> View Full Profile
								</a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</section>
	<section class="aboutus">
		<div class="container">
			<h1>About Us</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo debitis magni minus neque, sit culpa, placeat velit aperiam ea sunt eaque vitae similique iusto temporibus nihil ducimus repellendus alias eos!</p>
			<h2>Our Contact Details</h2>
			<p>Address: Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
			<p>Contact No.: +916263056779</p>
		</div>
	</section>
	<footer>
		<p>All rights reserved. 2022</p>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
