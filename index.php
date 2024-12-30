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
			background-color: #000000;
			color: #ffffff;
			font-family: 'Arial', sans-serif;
		}
		.customnav {
			background-color: #ff6600;
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
			color: #ffcc00;
		}
		.banner {
			background: linear-gradient(135deg, #ff6600, #ffcc00);
			padding: 50px 0;
			text-align: center;
		}
		.banner h1 {
			color: #ffffff;
			font-weight: bold;
		}
		.banner .btn {
			background-color: #000000;
			color: #ffffff;
			border: none;
			padding: 10px 20px;
			font-size: 1.2rem;
		}
		.banner .btn:hover {
			background-color: #ff6600;
		}
		.lawyerscard .card {
			border: none;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(255, 102, 0, 0.5);
			background-color: #1a1a1a;
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
			color: #ff6600;
			font-weight: bold;
		}
		.lawyerscard .btn-info {
			background-color: #ff6600;
			border: none;
			color: #ffffff;
		}
		.lawyerscard .btn-info:hover {
			background-color: #ffcc00;
		}
		.aboutus {
			padding: 50px 0;
			background-color: #1a1a1a;
			text-align: center;
		}
		footer {
			background-color: #ff6600;
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
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images\slider1.jpg" height="600px" class="d-block w-100" alt="Slider Image 1">
					<div class="carousel-caption d-none d-md-block">
						<h5>Find Your Suitable Lawyer</h5>
						<p>Expert legal assistance at your fingertips.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images\slider2.jpg" height="600px"  class="d-block w-100" alt="Slider Image 2">
					<div class="carousel-caption d-none d-md-block">
						<h5>Professional Lawyers</h5>
						<p>Dedicated to serving your legal needs.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images\slider3.jpg" height="600px"  class="d-block w-100" alt="Slider Image 3">
					<div class="carousel-caption d-none d-md-block">
						<h5>Your Legal Partner</h5>
						<p>We are here to help you navigate the law.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<br>
		<br>
		<br>
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
			<h 1>About Us</h1>
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