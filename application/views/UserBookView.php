<?php
$this->load->view("header");
?>
<div style="padding-top:60px"></div>

<div class="container" style="padding-top:20px">
	<div class="row">
		<div class="col-4">
			<img style="width:300px;"
				 src="<?php echo base_url() . 'uploads/' . $bookDetails->image; ?>"/>
		</div>
		<div class="col-8">
			<div style="padding:40px">
				<h3><?php echo $bookDetails->title; ?></h3>
				<h5>Author : <?php echo $bookDetails->author; ?>
					<small style="color:#337ab7"><?php echo "(" . $ViewCount[0]->visitor_count . " views)";?> </small>
				</h5>

				<h6 class="title-price">
					<small>tags</small>
				</h6>
				<h3>LKR <?php echo $bookDetails->price; ?></h3>

				<div class="section">
					<h6 class="title-attr">
						<small>Category</small>
					</h6>
					<div>
						<div class="attr2"><?php echo $bookDetails->category_name; ?></div>
					</div>
				</div>
				<div class="section">
					<div style="margin-top:20px;">
						<input type="number" name="quantity" min="0" max="5" placeholder="1">
					</div>
				</div>
				<div class="section">
					<?php
					$book_detail_arr = array(
						'id' => $bookDetails->id,
						'title' => $bookDetails->title,
						'price' => $bookDetails->price,
						'image' => $bookDetails->image
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
				<div class="section">
					<h5 class="title-attr">
						<hr>
						<small><?php echo $bookDetails->description; ?></small>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div class="row no-gutters">
		<div class="col-md-12">
			<hr>
			<h4 class="text-center">People who viewed this item also viewed</h4>
			<div class='row no-gutters' style="margin-top:40px">

				<?php
				foreach ($RecommendBooks as $books)
				{
					echo "<div class='card-sin'>";
					echo "<div class='card'>";
					echo "<img class='card-img-top' src=" . base_url() . "uploads/" . $books->image . " alt='Card image cap'>";
					echo "<div class='card-body'>";
					echo "<p class='card-title min-title title-align'>" . $books->title . "</p>";
					echo "<p class='card-text'>" . $books->author . "</p>";
					echo "<p class='card-text' style='color:red;'>" . "LKR ". $books->price . "</p>";

					?>
					<a style="color:blue; text-decoration:none"
						   href="<?php echo base_url() . 'HomeController/load_user_book_view/' . $books->id; ?>">
							<button type='submit' class='btn btn-primary'><i class="fa fa-book" aria-hidden="true"></i></i></i> View Book
				</button>
						</a>
					<?php
					echo "</div></div>";
					echo "</div>";
				}
				?>

			</div>
		</div>
	</div>

	<hr>

		<div class="row no-gutters">
			<div class="col-md-12">
				<hr>
				<h4 class="text-center">Top 5 Books</h4>
				<div class='row no-gutters' style="margin-top:40px">
				<?php
				if ($this->session->has_userdata('bookArray'))
				{
					foreach ($TopViewedBooks as $book)
					{
						echo "<div class='card-sin card-unset'>";
						echo "<div class='card'>";
						echo "<img class='card-img-top' src=" . base_url() . "uploads/" . $book->image . " alt='Card image cap'>";
						echo "<div class='card-body'>";
						echo "<p class='card-title min-title title-align'>" . $book->title . "</p>";
						echo "<p class='card-text'>" . $book->author . "</p>";
						echo "<p class='card-text' style='color:red;'>" . "LKR " . $book->price . "</p>";
						?>
						<a style="color:blue; text-decoration:none"
						   href="<?php echo base_url() . 'HomeController/load_user_book_view/' . $book->id; ?>">
							<button type='submit' class='btn btn-primary'><i class="fa fa-book" aria-hidden="true"></i></i></i> View Book
							</button>
						</a>
						<?php

						echo "</div></div>";
						echo "</div>";
					}
				}
				?>
				</div>
			</div>
		</div>
</div>

<style>

	.main-single-image .card-img-top {
		height: auto;
		width: 100%;
	}

	.main-book-top h3 {
		margin-bottom: 13px;
	}

	h3, h5 {
		font-weight: 400;
	}

	.price-div span {
		font-weight: 600;
	}

	.price-div button {
		width: 100%;
		margin-top: 50px;
	}

	.card-sin {
		width: 20%;
		margin: 0 auto;
		padding: 5px;
	}

	.card-sin img {
		height: 300px;
	}

	.title-align {
		height: 80px;
	}

	.min-title {
		min-height: 88px;
	}

	.card-unset {
		margin: unset;
	}

</style>

<?php $this->load->view("footer"); ?>
