<?php 
 require_once 'config/config.php';

//  $page = $_SERVER['REQUEST_URI'];
//  $page = explode("/", $page);
//  $page = $page[2];
// if ($page == "registration"):
// 	$currentPage = "registration";
// endif;



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo FULL_NAME ?></title>
	<!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo MULTIPATH ?>/imgs/favicon/icon.png">
	<!-- bs link -->
    <link rel="stylesheet" href="<?php echo MULTIPATH ?>css/bs.min.css" type="text/css" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="<?php echo MULTIPATH ?>css/style.css" type="text/css" crossorigin="anonymous">

</head>
<body>
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 d-none d-lg-block registration-sidebar-banna">
					<div class="py-3">
						<img class="img-fluid my-1" src="<?php echo MULTIPATH ?>/imgs/favicon/icon.png">
						<a href="<?php echo SITEURL ?>registration" class="navbar-brand brand fw-bolder fs-3 h1 mx-3">FUNCONNECT</a>
			  		</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 min-vh-100 login-wrap">
					<header class="row g-4">
						<div class="py-3 d-lg-none d-md-block d-sm-block d-xs-block">
							<img class="img-fluid my-1" src="<?php echo MULTIPATH ?>/imgs/favicon/icon.png">
							<a href="" class="navbar-brand brand fw-bolder fs-3 h1 mx-3">FUNCONNECT</a>
						</div>
						<nav class="d-none d-lg-block d-md-none d-sm-none d-xs-none">
							<ul class="nav justify-content-end py-3">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?php echo SITEURL ?>login">LOGIN</a>
								</li>
								<li class="nav-item mx-2">
							    	<a class="nav-link" href="<?php echo SITEURL ?>registration">REGISTER</a>
 						  		</li>
							</ul>
						</nav>
					</header>
					<div>
						<h2 class="text-center">Create Your Account</h2>
						<div class="col-md-8 offset-md-2 pb-2 pt-1">
							<form method="POST" id="userRegistration" class="needs-validation" novalidate>
								
								<div class="row align-items-center justify-content-between g-2">
									<div class="mb-3 col-md-6">
										<label for="exampleInputFirstName" class="form-label">Enter Firstname</label>
										<input type="text" name="fname" class="form-control" id="exampleInputFirstName" aria-describedby="emailHelp" placeholder="Enter Your Firstname">
									</div>
									<div class="mb-3 col-md-6">
										<label for="exampleInputLastName" class="form-label">Enter Lastname</label>
										<input type="text" name="lname" class="form-control" id="exampleInputLastName" aria-describedby="emailHelp" placeholder="Enter Your Lastname">
									</div>
								</div>
							  	<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Email address</label>
									<div class="input-group">
										<input class="form-control" id="exampleInputEmail1" name="email" type="email" placeholder="Enter Your Email Address"  autocomplete="email" aria-describedby="emailHelp"/>
									</div>
								  
							  	</div>
								<div class="mb-3">
									<label for="exampleInputName" class="form-label">Enter Phone</label>
									<input type="text" class="form-control" name="phone" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Your Mobile Number">
								</div>
								<div class="row align-items-center justify-content-between g-2">
									<div class="mb-3 col col-lg-6 col-md-6">
										<label for="exampleInputPassword1" class="form-label">Password</label>
										<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Your Password"  autocomplete="new-password">
									</div>
									<div class="mb-3 col col-lg-6 col-md-6">
										<label for="exampleInputConfirmPassword" class="form-label">Confirm Password</label>
										<input type="password" class="form-control" name="cpassword" id="exampleInputConfirmPassword" placeholder="Confirm Password"  autocomplete="new-password">
									</div>
								</div>
								<div>
									<div id="errorMsg" class="text-center">
									</div>
								</div>
							  	<div class="d-grid gap-2 pt-3">
								  <button class="btn btn-dark btn-lg" type="submit">Register</button>
								</div>
								<div>
									<p class="pt-4">
										Already have account <a href="<?php echo SITEURL ?>login" class="text-decoration-none">Login</a>
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

<?php 
	require_once 'includes/footer.php';
?>