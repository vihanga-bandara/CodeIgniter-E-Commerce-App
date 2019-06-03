<?php
$this->load->view("header");
$this->load->view("sidenav");
?>
<div class="offset-md-3 col-md-9 main bottles">
	<div class="row no-gutters">

		<div class="input-group stylish-input-group">
			<h2>Admin Search</h2></br>
		</div>
		<div class="input-group stylish-input-group">
			<form method="post" action="<?php echo base_url() ?>BookController/search">
				<input type="search" class="form-control" style="margin-bottom:10px;" name="search"
					   placeholder="Search by Author/Title">
				<button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Search</button>
			</form>
		</div>
	</div>
</div>
<div class="offset-md-3 col-md-9 main bottles">
	<div class="row no-gutters">
		<div class="col-md-12">
			<h3> Search Book Results </h3>
			<table class="table table-bordered">
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Author</th>
					<th>Price</th>
					<th>Description</th>
					<th>Category</th>
				</tr>
				<?php
				if ($this->input->post("search"))
				{

					foreach ($search_items as $book)
					{ ?>
						<tr>
							<td><?php echo $book->id;
								echo $this->uri->segment(0); ?></td>
							<td>
								<a href="http://localhost/CodeIgniter-E-Commerce-App/AdminController/load_admin_book_view/<?php echo $book->id; ?>"
								   class="book_view"><?php echo $book->title; ?></a></td>
							<td><?php echo $book->author; ?></td>
							<td><?php echo $book->price; ?></td>
							<td><?php echo $book->description; ?></td>
							<td><?php echo $book->category_name; ?></td>
						</tr>
					<?php }
				} else
				{
					?>
					<tr style="text-align: center;">
						<td colspan="6">No Data Found</td>
					</tr>
					<?php
				}
				?>
			</table>

		</div>
	</div>


