<?php
$this->load->view("header");
$this->load->view("sidenav");
?>

<div class="row no-gutters">
	<div class="offset-md-2 col-md-10 main bottles">
		<div class="container">
			<div class="row">
				<h2>Existing Categories</h2>
			</div></br>
			<div class="row">
				<ul class="navbar-nav mr-auto">
					<?php
					echo "<li class='nav-item'>";
					foreach ($categories as $category)
					{
						echo "<a class='btn btn-outline-primary' style='margin-left:10px;'>" . $category->category . "</a>";
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="offset-md-2 col-md-10 main bottles">
		<div class="container">
			<div class="row">
				<h2>Add a Category</h2></br>
			</div>
			<form method="post" action="<?php echo base_url() . "BookController/category_form_authenticate"; ?>">
				<div class="row">
					<div class="form-group">
						<label for="category" class="control-label">Name of Category</label>
						<input type="text" class="form-control" name="category" placeholder="Enter Category">
						<span class="text-danger"><?php echo form_error("category") ?></span>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<button type="submit" class="btn btn-success">Create Category</button>
					</div>
				</div>

			</form>
			<?php if ($this->session->flashdata("success_message_category") != "")
			{ ?>
				<div class="row">
					<div class="form-group">
						<?php echo '<p class="text-success">Successfully created a new category</p>'; ?>
					</div>
				</div> <?php
			} ?>
		</div>
	</div>
</div>
