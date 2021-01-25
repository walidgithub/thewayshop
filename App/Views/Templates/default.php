<!DOCTYPE html>
<html lang="en">
	<!-- Basic -->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Site Metas -->
		<title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Site Icons -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= App::$path ?>css/bootstrap.min.css">
		<!-- Site CSS -->
		<link rel="stylesheet" href="<?= App::$path ?>css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="<?= App::$path ?>css/responsive.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?= App::$path ?>css/custom.css">

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<!-- Start Main Top -->
		<div class="main-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="text-slid-box">
							<div id="offer-box" class="carouselTicker">
								<ul class="offer-box">
								<?php
								foreach ($saleitems as $saleitem): 
									?>
                                    <li>
										<i class="fab fa-opencart"></i><?= $saleitem->itemname ?> <del><?= $saleitem->pricebefore ?></del> <?= $saleitem->priceafter ?>
									</li>
									<?php
								endforeach;
								?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="right-phone-box">
							<p>Call US :
								<a href="#"> +11 900 800 100</a></p>
						</div>
						<div class="our-link">
							<ul>
								<?php
								if(isset($_SESSION['user'])){
                                  ?>
                                  <li><a href="<?= App::$path ?>Users/logout">Log out</a></li>
                                  <li><a href="<?= App::$path ?>Users/edit/<?= $_SESSION['user']->id ?>">my profile</a></li>
                                <?php
                                }else{
                                  ?>
                                  <li> <a href="<?= App::$path ?>Users/login">Log in</a></li>
                                <?php
                                }
								?>
									
								<li>
									<a href="<?= App::$path ?>Users/add">Sign Up</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Main Top -->

		<!-- Start Main Top -->
		<header class="main-header">
			<!-- Start Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
				<div class="container">
					<!-- Start Header Navigation -->
					<div class="navbar-header">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href="<?= App::$path ?>about/index"><img src="images/logo.png" class="logo" alt=""></a>
					</div>
					<!-- End Header Navigation -->

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
							<li class="nav-item">
								<a class="nav-link" href="<?= App::$path ?>Home">Home</a></li>
							<li class="nav-item active">
							<?php
								if(isset($_SESSION['user'])){
									?>
								<a class="nav-link" href="<?= App::$path ?>MyShop/addoredit">Add/Edit My Shop</a></li>
								<?php
                                 }else{
                                 	?>
                                 	<li class="nav-item">
                                 	<a class="nav-link" href="<?= App::$path ?>Users/login">Add/Edit My Shop</a></li>
                                 	<?php
                                 }
								?>
							<li class="dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My page</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?= App::$path ?>Cart/index">Cart</a></li>
									<li>
										<a href="<?= App::$path ?>WishList/index">Wishlist</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= App::$path ?>Service/index">Our Service</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->

					<!-- Start Atribute Navigation -->
					<div class="attr-nav">
						<ul>
							<li class="search">
								<a href="#">
									<i class="fa fa-search"></i></a></li>
							<li class="side-menu">
							<?php
                                    if(isset($_SESSION['user'])){
										?>
								<a href="#">
									<i class="fa fa-shopping-bag"></i>
									<?php
									  foreach ($cartscount as $cartcount): 
									  ?>
                                      <span class="badge"><?=  $cartcount->allcartscount ?></span>
                                      <?php
                                      endforeach;
                                    }
                                    ?>
								</a></li>
						</ul>
					</div>
					<!-- End Atribute Navigation -->
				</div>
				<!-- Start Side Menu -->
				<div class="side">
					<a href="#" class="close-side">
						<i class="fa fa-times"></i></a>
					<li class="cart-box">
						<ul class="cart-list">
                                    <?php
                                    if(isset($_SESSION['user'])){
									  foreach ($usercarts as $usercart): 
									  ?>
                                      <li>
								        <a href="#" class="photo"><img src="<?=  $usercart->thumb ?>" class="cart-thumb" alt="" /></a>
								        <h6>
									    <a href="#"><?=  $usercart->itemname ?></a></h6>
								        <p>1x -
									    <span class="price"><?=  $usercart->itemprice ?></span></p>
							           </li>
                                      <?php
                                      endforeach;
                                    }
                                    ?>
							<li class="total">
								<a href="<?= App::$path ?>Cart/index" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
								<span class="float-right">
								<?php
								foreach ($cartssum as $cartsum): 
								?>
								<strong>Total</strong>: <?=  $cartsum->cartssum ?></span>
								<?php
                                endforeach;
                                ?>
							</li>
						</ul>
					</li>
				</div>
				<!-- End Side Menu -->
			</nav>
			<!-- End Navigation -->
		</header>
		<!-- End Main Top -->

		<!-- Start Top Search -->
		<div class="top-search">
			<div class="container">
			<form action="<?= App::$path ?>Shop/search" method="post" id="search-shops" name="search-shops" enctype="multipart/form-data">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-search"></i></span>
						
					<input name="search" type="text" class="form-control" placeholder="Search">
					<input name="address" type="text" class="form-control" placeholder="Address">
					<button class="btn hvr-hover2" style="margin-left: 5px;margin-right: 5px;" id="submit" type="submit">Search</button>
					<span class="input-group-addon close-search">
						<i class="fa fa-times"></i></span>
				</div>
				</form>
			</div>
		</div>
		<!-- End Top Search -->

		<!-- view content start -->
		<div class="container">
			<?= $content; ?>
		</div>

		<!-- Start Footer  -->
		<footer>
			<div class="footer-main">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="footer-widget">
								<h4>About ThewayShop</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
								<ul>
									<li>
										<a href="#">
											<i class="fab fa-facebook" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fab fa-twitter" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fa fa-rss" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li>
										<a href="#">
											<i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="footer-link">
								<h4>Information</h4>
								<ul>
									<li>
										<a href="<?= App::$path ?>About/index">About Us</a></li>
									<li>
										<a href="#">Our Location</a></li>
									<li>
										<a href="#">Terms &amp; Conditions</a></li>
									<li>
										<a href="<?= App::$path ?>Contact/add">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="footer-link-contact">
								<h4>Contact Us</h4>
								<ul>
									<li>
										<p>
											<i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
									</li>
									<li>
										<p>
											<i class="fas fa-phone-square"></i>Phone:
											<a href="tel:+1-888705770">+1-888 705 770</a></p>
									</li>
									<li>
										<p>
											<i class="fas fa-envelope"></i>Email:
											<a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer  -->

		<!-- Start copyright  -->
		<div class="footer-copyright">
			<p class="footer-company">All Rights Reserved. &copy; 2020
				<a href="<?= App::$path ?>About/index">ThewayShop</a> Design By :
				<a href="<?= App::$path ?>About/index">walid barakat</a></p>
		</div>
		<!-- End copyright  -->

		<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

		<!-- ALL JS FILES -->
		<script src="<?= App::$path ?>js/jquery-3.2.1.min.js"> </script>
		<script src="<?= App::$path ?>js/popper.min.js"> </script>
		<script src="<?= App::$path ?>js/bootstrap.min.js"> </script>
		<!-- ALL PLUGINS -->
		<script src="<?= App::$path ?>js/jquery.superslides.min.js"> </script>
		<script src="<?= App::$path ?>js/bootstrap-select.js"> </script>
		<script src="<?= App::$path ?>js/inewsticker.js"> </script>
		<script src="<?= App::$path ?>js/bootsnav.js."> </script>
		<script src="<?= App::$path ?>js/images-loded.min.js"> </script>
		<script src="<?= App::$path ?>js/isotope.min.js"> </script>
		<script src="<?= App::$path ?>js/owl.carousel.min.js"> </script>
		<script src="<?= App::$path ?>js/baguetteBox.min.js"> </script>
		<script src="<?= App::$path ?>js/form-validator.min.js"> </script>
		<script src="<?= App::$path ?>js/contact-form-script.js"> </script>
		<script src="<?= App::$path ?>js/custom.js"> </script>
		<script src="<?= App::$path ?>js/functions.js"> </script>
		<script src="<?= App::$path ?>js/<?= App::getInstance()->cur_page ?>.js"></script>
	</body>

</html>
