<?php 
 session_start();
 require_once 'config/config.php';
//  if (empty(($_SESSION['email'])) && $_SESSION['id']  == null || !isset($_SESSION['email'])) {
	if (!isset($_SESSION['email']) && !isset($_SESSION['id']) && !isset($_SESSION['username'])) {
		echo '
		<script>
			window.location = "logout.php";
		</script>
		';
		die('Sorry Your Session Has Expired, Please Visit The Login Page To Continue...');
		
	}
	// else{
	// 	$isLoggedIn = true;
	// 	$email = $_SESSION['email'];
	// 	$id = $_SESSION['id'];
	// }
	

 	$page = $_SERVER['REQUEST_URI'];
	$page = explode("/", $page);
	$page = $page[2];

	if ($page == "home" || $page == ""):
		$currentPage = "home";      
	elseif ($page == "profile"):
		$currentPage = "profile";
		
	else:
		$currentPage = "error";
		
	endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo FULL_NAME ?></title>
	<!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo MULTIPATH ?>/imgs/favicon/icon.png">
	<!-- bs link -->
    <link rel="stylesheet" href="<?php echo MULTIPATH ?>css/bs.min.css" type="text/css" crossorigin="anonymous">
   <!-- fa link -->
	<link rel="stylesheet" href="<?php echo FONTAWESOMEPATH?>all.css">
	<link rel="stylesheet" href="<?php echo FONTAWESOMEPATH?>brands.css">
	<link rel="stylesheet" href="<?php echo FONTAWESOMEPATH?>fontawesome.css">
	<link rel="stylesheet" href="<?php echo FONTAWESOMEPATH?>solid.css">
   <!-- <link rel="stylesheet" href="<?php echo MULTIPATH ?>css/fa.min.css" type="text/css" crossorigin="anonymous"> -->
   <!-- custom css link -->
   <link rel="stylesheet" href="<?php echo MULTIPATH ?>css/style.css" type="text/css" crossorigin="anonymous">

</head>
<body>
	<div class="preloader"></div>
	<div class="wrapper">
		<div>
			
			<nav class="navbar navbar-expand-lg  sticky-top nav-bg py-3  px-5 font-monospace">
			  	<div class="px-2 py-1" style="height: 35px;width: 35px;">
			  		<img class="img-fluid" src="<?php echo MULTIPATH ?>/imgs/favicon/icon.png" >
			  	</div>
				<span class="">
					<a href="" class="navbar-brand brand fw-bolder fs-3 h1">FUNCONNECT</a>
				</span>
				<span class="d-none d-sm-inline mx-1">
					<?php echo "<div class='text-white text-center'>".$_SESSION['username']."</div>";?>
				</span>
										<a href="logout.php">Logout</a>
			  	<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>
			  	<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
					<div class="offcanvas-header nav-bg">
						<h5 class="offcanvas-title text-center" id="offcanvasNavbarLabel">
							<a href="<?php echo SITEURL ?>home" class="navbar-brand brand fw-bolder fs-3 h1">FUNCONNECT</a>
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
			    	<div class="offcanvas-body sticky-md-bottom">
				    	<ul class="navbar-nav justify-content-center flex-grow-1 no-gutters">
							<li class="nav-item d-flex align-items-center mx-3" id="nav-icon">
								<a class="nav-link  <?php if ($currentPage=='home'): echo 'active'; else: echo ' '; endif; ?>" aria-current="page" href="">
									<i class="fa-solid fa-house-chimney fa-xl color-icon <?php if ($currentPage=='home'): echo 'active'; else: echo ' '; endif; ?>"></i>
									<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.<path d="M511.8 287.6L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L416 100.7V64C416 46.33 430.3 32 448 32H480C497.7 32 512 46.33 512 64V185L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6L511.8 287.6z"/></svg> -->
								</a>
							</li>
							<li class="nav-item d-flex align-items-center px-1 mx-3" id="nav-icon">
								<a class="nav-link <?php if ($currentPage=='video'): echo 'active'; else: echo ' '; endif; ?>" aria-current="page" href="#">
								 <i class="fa-solid fa-video fa-xl color-icon <?php if ($currentPage=='video'): echo 'active'; else: echo ' '; endif; ?>"></i>
								</a>
							</li>
							<li class="nav-item d-flex align-items-center px-1 mx-3" id="nav-icon">
								<a class="nav-link <?php if ($currentPage=='fried'): echo 'active'; else: echo ' '; endif; ?>" aria-current="page" href="#">
								 <i class="fa-solid fa-user-group fa-xl color-icon <?php if ($currentPage=='fried'): echo 'active'; else: echo ' '; endif; ?>"></i>
								</a>
							</li>
							<li class="nav-item d-flex align-items-center px-2 mx-3" id="nav-icon">
								<a class="nav-link <?php if ($currentPage=='notification'): echo 'active'; else: echo ' '; endif; ?>" aria-current="page" href="#">
								<i class="fa-solid fa-bell fa-xl color-icon <?php if ($currentPage=='notification'): echo 'active'; else: echo ' '; endif; ?>"></i>
								</a>
							</li>
						</ul>
						<div class="py-2">
							<div class="text-center profile">
								<a href="<?php echo SITEURL ?>profile"><img src="assets/imgs/dp.png" alt="user" class="rounded-circle  mx-auto d-block img-fluid"></a>
							</div>
						</div>
					</div>
			  </div>
			</nav>
			<!-- mobile bottom nav -->
			<nav class="navbar fixed-bottom d-lg-none d-md-none d-sm-block d-xs-none" style="background: #3360FB;">
				<ul class="navbar-nav d-flex flex-row justify-content-between">
					<li class="nav-item d-flex align-items-center px-1 mx-3" id="nav-icon">
						<a class="nav-link active" aria-current="page" href="#">
							<i class="fa-solid fa-house-chimney fa-xl color-icon"></i>
						</a>
					</li>
					<li class="nav-item d-flex align-items-center px-1 mx-3" id="nav-icon">
						<a class="nav-link active" aria-current="page" href="#">
							<i class="fa-solid fa-video fa-xl color-icon"></i>
						</a>
					</li>
					<li class="nav-item d-flex align-items-center px-1 mx-3" id="nav-icon">
						<a class="nav-link active" aria-current="page" href="#">
							<i class="fa-solid fa-user-group fa-xl color-icon"></i>
						</a>
					</li>
					<li class="nav-item d-flex align-items-center px-2 mx-3" id="nav-icon">
						<div class="text-center profile">
							<img src="assets/imgs/dp.png" alt="user" class="rounded-circle  mx-auto d-block img-fluid">
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</div>


	<!-- token for this app: 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 -->