<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/DataTable/DataTables-1.10.18/css/dataTables.bootstrap.min.css"); ?>" />


	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/DataTable/DataTables-1.10.18/js/jquery.dataTables.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/DataTable/DataTables-1.10.18/js/dataTables.bootstrap.min.js"); ?>"></script>
</head>

<body>
<!-- ##### Header Area Start ##### -->
<header class="header_area">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
		<div class="container">
			<a class="navbar-brand" href="#">Brand</a>
			<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
				&#9776;
			</button>
			<div class="collapse navbar-collapse" id="exCollapsingNavbar">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a href="#" class="nav-link">About</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Link</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Service</a></li>
					<li class="nav-item"><a href="#" class="nav-link">More</a></li>
				</ul>
				<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
					<li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
					<li class="dropdown order-1">
						<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right mt-2">
							<li class="px-3 py-2">
								<form class="form" role="form">
									<div class="form-group">
										<input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
									</div>
									<div class="form-group">
										<input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">Login</button>
									</div>
									<div class="form-group text-center">
										<small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
									</div>
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Forgot password</h3>
					<button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>Reset your password..</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>



	<!--	<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">-->
<!--		<!-- Classy Menu -->-->
<!--		<nav class="classy-navbar" id="essenceNav">-->
<!--			<!-- Logo -->-->
<!--			<a class="nav-brand" href="index.html"><img src="--><?php //echo base_url("assets/img/core-img/logo.png"); ?><!--" alt=""></a>-->
<!--			<!-- Navbar Toggler -->-->
<!--			<div class="classy-navbar-toggler">-->
<!--				<span class="navbarToggler"><span></span><span></span><span></span></span>-->
<!--			</div>-->
<!--			<!-- Menu -->-->
<!--			<div class="classy-menu">-->
<!--				<!-- close btn -->-->
<!--				<div class="classycloseIcon">-->
<!--					<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>-->
<!--				</div>-->
<!--				<!-- Nav Start -->-->
<!--				<div class="classynav">-->
<!--					<ul>-->
<!--						<li><a href="#">Shop</a>-->
<!--							<div class="megamenu">-->
<!--								<ul class="single-mega cn-col-4">-->
<!--									<li class="title">Women's Collection</li>-->
<!--									<li><a href="">Dresses</a></li>-->
<!--									<li><a href="">Blouses &amp; Shirts</a></li>-->
<!--									<li><a href="">T-shirts</a></li>-->
<!--									<li><a href="">Rompers</a></li>-->
<!--									<li><a href="">Bras &amp; Panties</a></li>-->
<!--								</ul>-->
<!--								<ul class="single-mega cn-col-4">-->
<!--									<li class="title">Men's Collection</li>-->
<!--									<li><a href="">T-Shirts</a></li>-->
<!--									<li><a href="">Polo</a></li>-->
<!--									<li><a href="">Shirts</a></li>-->
<!--									<li><a href="">Jackets</a></li>-->
<!--									<li><a href="">Trench</a></li>-->
<!--								</ul>-->
<!--								<ul class="single-mega cn-col-4">-->
<!--									<li class="title">Kid's Collection</li>-->
<!--									<li><a href="">Dresses</a></li>-->
<!--									<li><a href="">Shirts</a></li>-->
<!--									<li><a href="">T-shirts</a></li>-->
<!--									<li><a href="">Jackets</a></li>-->
<!--									<li><a href="">Trench</a></li>-->
<!--								</ul>-->
<!--								<div class="single-mega cn-col-4">-->
<!--									<img src="--><?php //echo base_url("assets/img/bg-img/bg-6.jpg"); ?><!--" alt="">-->
<!--								</div>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li><a href="#">Pages</a>-->
<!--							<ul class="dropdown">-->
<!--								<li><a href="">Home</a></li>-->
<!--								<li><a href="">Shop</a></li>-->
<!--								<li><a href="">Product Details</a></li>-->
<!--								<li><a href="">Checkout</a></li>-->
<!--								<li><a href="">Blog</a></li>-->
<!--								<li><a href="">Single Blog</a></li>-->
<!--								<li><a href="">Regular Page</a></li>-->
<!--								<li><a href="">Contact</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!--						<li><a href="">Blog</a></li>-->
<!--						<li><a href="">Contact</a></li>-->
<!--					</ul>-->
<!--				</div>-->
<!--				<!-- Nav End -->-->
<!--			</div>-->
<!--		</nav>-->
<!---->
<!--		<!-- Header Meta Data -->-->
<!--		<div class="header-meta d-flex clearfix justify-content-end">-->
<!--			<!-- Search Area -->-->
<!--			<div class="search-area">-->
<!--				<form action="#" method="post">-->
<!--					<input type="search" name="search" id="headerSearch" placeholder="Type for search">-->
<!--					<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>-->
<!--				</form>-->
<!--			</div>-->
<!--			<!-- Favourite Area -->-->
<!--			<div class="user-login-info">-->
<!--				<a href="#"><img src="--><?php //echo base_url("assets/img/core-img/heart.svg"); ?><!--" alt=""></a>-->
<!--			</div>-->
<!--			<!-- User Login Info -->-->
<!--			<div class="user-login-info">-->
<!--				<a href="#"><img src="--><?php //echo base_url("assets/img/core-img/user.svg"); ?><!--" alt=""></a>-->
<!--			</div>-->
<!--			<!-- Cart Area -->-->
<!--			<div class="cart-area">-->
<!--				<a href="#" id="essenceCartBtn"><img src="--><?php //echo base_url("assets/img/core-img/bag.svg"); ?><!--" alt=""> <span>3</span></a>-->
<!--			</div>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!--</header>-->

</body>

