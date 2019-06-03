<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
			integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
			crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url() . "assets/css/style.css"; ?>">

	<!-- Start Navigation Bar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-custom">
		<!--		<div class="container-fluid">-->
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url() . 'HomeController'; ?>">BooksRead</a>
		</div>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav mr-auto">
			<?php if ($this->session->userdata("username") == '')
			{
				?>

				<li class="nav-item <?php echo menu_activate('HomeController'); ?>"><a
						class="nav-link" href="<?php echo base_url() . 'HomeController'; ?>"><i class="fa fa-home"
																								aria-hidden="true"></i>
						Home</a></li>

				<li class="<?php echo menu_activate('BookController'); ?>"><a
						class="nav-link" href="<?php echo base_url() . 'BookController'; ?>"><i class="fa fa-book"
																								aria-hidden="true"></i>
						Books</a></li>
				<li class="<?php echo menu_activate('CartController'); ?>"><a
						class="nav-link" href="<?php echo base_url() . 'CartController'; ?>"><i
							class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a></li>
				<?php
			} ?>



				<?php if ($this->session->userdata("username") != '')
				{
					?>
					<li class="<?php echo menu_activate('AdminController'); ?>"><a
							class="nav-link" href="<?php echo base_url() . 'HomeController/enter_admin'; ?>">Admin Panel
							<i class="fa fa-cogs" aria-hidden="true"></i></a></li>
					<?php
				} ?>
			</ul>

			<ul class="navbar-nav ml-auto">
				<?php if ($this->session->userdata("username") != '')
				{
					?>
					<li><a class="nav-link" href="#"><span
								class="glyphicon glyphicon-user"></span><i class="fa fa-user-circle"
																		   aria-hidden="true"></i> <?php echo $this->session->userdata('username'); ?>
						</a></li>
					<li><a class="nav-link" href="<?php echo base_url() . 'HomeController/admin_logout'; ?>"><span
								class="glyphicon glyphicon-log-out"></span><i class="fa fa-sign-out"
																			  aria-hidden="true"></i> Admin Logout</a>
					</li>
					<?php
				} else
				{
					?>
					<li><a class="nav-link" href="<?php echo base_url() . 'HomeController/admin_login'; ?>"><span
								class="glyphicon glyphicon-log-in"></span><i class="fa fa-sign-in"
																			 aria-hidden="true"></i> Admin Login</a>
					</li>
					<?php
				} ?>
				<!--				<form class="navbar-form navbar-right">-->
				<!--					<input type="text" class="form-control" placeholder="Search...">-->
				<!--				</form>-->
			</ul>

		</div>
		<!--		</div>-->
	</nav>
	<!-- End Navigation Bar-->
</head>
</html>


<style>
	.nav-custom {
		position: fixed;
		width: 100%;
		z-index: 10;
	}
</style>






