<?php
$this->load->view("header");
$this->load->view("sidenav");
?>

<div class="row no-gutters">
	<div class="offset-md-3 col-md-9 main bottles">
		<h1 class="page-header">Welcome <?php echo $this->session->userdata('username'); ?></h1>
		<div class="row no-gutters">
			<div class="col-md-12">
				<hr>
				<h4 class="text-center">Highest Viewed Books</h4>
				<div class='row no-gutters' style="margin-top:40px">

					<?php
					foreach ($TopBooks as $book)
					{
						echo "<div class='card-sin'>";
						echo "<div class='card'>";
						echo "<img class='card-img-top' src=" . base_url() . "uploads/" . $book->image . " alt='Card image cap'>";
						echo "<div class='card-body'>";
						echo "<p class='card-title min-title title-align'>" . $book->title . "</p>";
						echo "</div></div>";
						echo "</div>";
					}
					?>

				</div>
				<hr>
			</div>
		</div>
	</div>>
</div>

<style>

	.main-single-image .card-img-top {
		height: auto;
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
		width: 17%;
		margin: 0 auto;
		padding: 5px;
	}

	.card-sin img {
		height: 270px;
	}

	.title-align {
		height: 80px;
	}

	.min-title {
		min-height: 88px;
	}
</style>

