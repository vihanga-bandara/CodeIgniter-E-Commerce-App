<?php
$this->load->view("header");
$this->load->view("sidenav");
?>

<div class="row no-gutters">
	<div class="offset-md-3 col-md-9 main bottles">
		<div class="form-group">
			<h3> View Book Details</h3>
		</div>
	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Author</th>
			<th>Price</th>
			<th>Description</th>
			<th>Category</th>
			<th>Visitor Count</th>
		</tr>
		<?php
		if (sizeof($book_detail)>0)
		{
			foreach ($book_detail as $book)
			{ ?>
				<tr>
					<td><?php echo $book->id; ?></td>
					<td>
						<a href="http://localhost/CodeIgniter-E-Commerce-App/AdminController/load_admin_book_view/<?php echo $book->id; ?>"
						   class="book_view"><?php echo $book->title; ?></a></td>
					<td><?php echo $book->author; ?></td>
					<td><?php echo $book->price; ?></td>
					<td><?php echo $book->description; ?></td>
					<td><?php echo $book->category_name; ?></td>
					<td><?php echo $book->visitor_count; ?></td>
				</tr>
			<?php }
		} else
		{
			?>
			<tr>
				<td colspan="7">No book data has been found </td>
			</tr>
			<?php
		}
		?>
	</table>


</div>
</div>
