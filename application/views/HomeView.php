<?php $this->load->view("header"); ?>
<div style="padding-top:60px"></div>
<div class="container">
	<div class="row">
		<?php foreach ($home_books as $book)
		{?>
		<div class="col">
			<div class="card" style="width: 15rem; margin-top:25px">
				<img class="card-img-top" height="350px" src="uploads/<?php echo $book->image;?>"  alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title" style="height:60px"><?php echo $book->title; ?></h5>
					<p class="card-text" style="color:red;">LKR <?php echo $book->price; ?></p>
					<a href="<?php echo base_url() . 'HomeController/load_user_book_view/' . $book->id; ?>"
					   class="btn btn-primary btn-sm" role="button"> View Book </a>
				</div>
			</div>

		</div>

		<?php } ?>
	</div>
</div>

<?php $this->load->view("footer"); ?>

