<?php 
 require_once 'config/config.php';
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
	<!-- nP*JM5p*(IRjrj(TU3ZX -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 d-none d-lg-block login-sidebar-banna">
					<div class="py-3">
						<img class="img-fluid my-1" src="<?php echo MULTIPATH ?>/imgs/favicon/icon.png">
						<a href="" class="navbar-brand brand fw-bolder fs-3 h1 mx-3">FUNCONNECT</a>
			  		</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 min-vh-100 login-wrap">
					<header>
						<nav>
							<ul class="nav justify-content-end py-3">
							  <li class="nav-item">
							    <a class="nav-link active" aria-current="page" href="<?php echo SITEURL ?>login">LOGIN</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" href="<?php echo SITEURL ?>registration">REGISTER</a>
							  </li>
							</ul>
						</nav>
					</header>
					<div>
						<h2 class="text-center">Login to your account</h2>
						<div class="col-md-8 offset-md-2 py-4">
							<form name="Userlogin" method="POST" id="login" class="needs-validation" novalidate>
							  	<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email Address" name="email" autocomplete="username">
							  	</div>
								<div class="mb-3">
									<label for="exampleInputPassword1" class="form-label">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password" autocomplete="current-password">
								</div>
								<div>
									<div id="loginErorMsg" class="text-center">
									</div>
								</div>
							  	<div class="d-grid gap-2 pt-3">
								  <button class="btn btn-dark btn-lg" type="submit">Login</button>
								</div>
								<div>
									<p class="pt-4">
										Dont have account <a href="<?php echo SITEURL ?>registration" class="text-decoration-none">Register</a>
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