<?php $this->load->view("header"); ?>
<div style="padding-top:60px"></div>
<div class="container">
	<div class="row form-group">
		<?php if ($this->session->flashdata('message_cart'))
		{
			echo "<p class='text-success'>" . $this->session->flashdata('message_cart') . "</p>";
		} ?>
	</div>
	<div class="row form-group">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php
					echo "<li class='nav-item active'>";
					foreach ($categories as $category)
					{
						echo "<a class='btn btn-outline-primary' style='margin-left:10px;' href='" . base_url() . "BookController/get_category/" . $category->category . "'>" . $category->category . "</a>";
					}
					?>
			</div>
		</nav>
	</div>
	<div class="row form-group">
		<?php
		foreach ($fetched_res as $book)
		{
			?>
			<div class="col">
				<div class="card" style="width: 15rem; margin-top:25px">
					<img class="card-img-top" height="350px" src="<?php echo base_url() . 'uploads/' . $book->image; ?>"
						 alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" style="height:60px"><?php echo $book->title; ?></h5>
						<p class="card-text" style="color:red;">LKR <?php echo $book->price; ?></p>
						<!--						<a href="-->
						<?php //echo base_url() . 'HomeController/load_user_book_view/' . $book->id;
						?><!--"-->
						<!--						   class="btn btn-danger btn-sm" role="button"> Add to Cart </a>-->
						<a style="color:blue; text-decoration:none"
						   href="<?php echo base_url() . 'HomeController/load_user_book_view/' . $book->id; ?>">
							<button type='submit' class='btn btn-primary'><i class="fa fa-book" aria-hidden="true"></i></i></i> View Book
							</button>
						</a>

						<?php
						$book_detail_arr = array(
							'id' => $book->id,
							'title' => $book->title,
							'price' => $book->price,
							'image' => $book->image
						);
						$book_detail_arr['qty'] = 1;
						echo form_open('/CartController/add', '', $book_detail_arr); ?>
						<br>
						<button type='submit' class='btn btn-outline-success'><i class="fa fa-shopping-cart"
																				 aria-hidden="true"></i> Add to Cart
						</button>
						<?php echo form_close();
						?>

					</div>
				</div>

			</div>
		<?php } ?>
	</div>
	<div class="row form-group pagi-change">
		<?php echo $paginated_links ?>
	</div>
</div>
<?php $this->load->view("footer"); ?>

<style>
	.pagi-change a{
		border: 1px solid red;
		background-color: blue;
		color: #ffff;
		padding: 5px;
		margin: 0 5px;
	}

	.pagi-change strong{
		border: 1px solid red;
		background-color: pink;
		color: #ffff;
		padding: 5px;
		margin: 0 5px;
	}
</style>
