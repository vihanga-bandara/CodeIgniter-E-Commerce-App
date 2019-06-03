<div class="wrapper" style="display: flex;width: 100%;">
	<!-- Sidebar -->
	<nav id="sidebar" style="width: 250px;
    position: fixed;
    top: 55px;
    left: 0;
    height: 100vh;
    z-index: 999;
    background: #333;
    color: #55abff;
    transition: all 0.3s;">

		<div class="sidebar-header">
			<a class="btn btn-dark w-100 cust-btn cust-btn2" href="<?php echo base_url() . 'AdminController'; ?>">Admin Dashboard</a>
		</div>
		<ul class="list-unstyled components">
			<li><a class="btn btn-primary w-100 cust-btn"
				   href="<?php echo base_url() . 'AdminController/load_category_form'; ?>">Create new Category</a>
			</li>
			<li><a class="btn btn-primary w-100 cust-btn"
				   href="<?php echo base_url() . 'AdminController/load_book_form'; ?>">Add a Book</a></li>
			<li><a class="btn btn-primary w-100 cust-btn"
				   href="<?php echo base_url() . 'AdminController/load_search_form'; ?>">Advanced Search</a></li>
			<li><a class="btn btn-primary w-100 cust-btn"
				   href="<?php echo base_url() . 'AdminController/load_view_books'; ?>">View Books</a></li>

			<li><a class="btn btn-primary w-100 cust-btn"
				   href="<?php echo base_url() . 'AdminController/load_statistics_view'; ?>">User Statistics</a></li>

		</ul>
		<ul class="list-unstyled components">
			<li><a class="btn btn-success w-100 cust-btn" href="<?php echo base_url() . 'HomeController'; ?>">Go Back To Home Page</a></li>
		</ul>

	</nav>
</div>

<style>
	.cust-btn {
		border-radius: 0;
		text-align: justify;
		font-size: medium;
	}
	.cust-btn2{
		font-size: large;
		font-weight: bold;
	}
</style>
