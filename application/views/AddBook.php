<?php
$this->load->view("header");
$this->load->view("sidenav");
?>
<div class="row no-gutters">
	<div class="offset-md-2 col-md-10 main bottles">
			<div class="col-md-10 offset-md-1">
				<form method="post" action="<?php echo base_url() . "BookController/book_form_authenticate"; ?>">
					<div class="form-group">
						<h3> Add a book</h3>
					</div>
					<div class="form-group">
						<label for="title" class="control-label">Title of the book</label>
						<input type="text" class="form-control" name="title" placeholder="Enter Title">
						<span class="text-danger"><?php echo form_error("title") ?></span>
					</div>
					<div class="form-group">
						<label for="author" class="control-label">Author of the book</label>
						<input type="text" class="form-control" name="author" placeholder="Enter Author">
						<span class="text-danger"><?php echo form_error("author") ?></span>
					</div>
					<div class="form-group">
						<label for="price" class="control-label">Price of the book</label>
						<input type="number" class="form-control" name="price" placeholder="Enter Price">
						<span class="text-danger"><?php echo form_error("price") ?></span>
					</div>
					<div class="form-group">
						<label for="description">Description of the book</label>
						<textarea class="form-control" name="description" placeholder="Enter Book Description" rows="3"></textarea>
						<span class="text-danger"><?php echo form_error("description") ?></span>
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category">
							<?php
							foreach ($categories as $cat)
							{
								echo '<option value="' . $cat->category . '">' . $cat->category . '</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="img" class="control-label">Choose Image</label>
						<input type="file" class="form-control" name="image">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div>
					<?php if ($this->session->flashdata("success_message_book") != "")
					{ ?>
						<div class="form-group">
							<?php echo '<p class="text-success">Successfully added a new book</p>'; ?>
						</div> <?php
					} ?>
				</form>
			</div>
		</div>
</div>

<!--<script>-->
<!--	$(document).ready(function () {-->
<!--		$('#')-->
<!--	});-->
<!--</script>-->
