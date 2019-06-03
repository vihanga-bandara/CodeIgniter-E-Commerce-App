<?php
$this->load->view("header");
$this->load->view("sidenav");
?>
<div style="padding-top:60px"></div>

<!--<div class="container" style="padding-top:20px">-->
<div class="row no-gutters">
	<div class="offset-md-3 col-md-9 main bottles">
		<div class="row">
			<div class="col-4">
				<img style="width:300px;"
					 src="<?php echo base_url() . 'uploads/' . $book_detail->image; ?>"/>
			</div>

			<div class="col-8">
				<div style="padding:40px">
					<h3><?php echo $book_detail->title; ?></h3>
					<h5>Author : <?php echo $book_detail->author; ?>
						<small style="color:#337ab7"><?php echo "(" . $ViewCount[0]->visitor_count . " views)";?></small>
					</h5>

					<h6 class="title-price">
						<small>tags</small>
					</h6>
					<h3>LKR <?php echo $book_detail->price; ?></h3>

					<div class="section">
						<h6 class="title-attr">
							<small>Category</small>
						</h6>
						<div>
							<div class="attr2"><?php echo $book_detail->category_name; ?></div>
						</div>
					</div>
					<div class="section">
						<?php
						$book_detail_arr = array(
							'id' => $book_detail->id,
							'title' => $book_detail->title,
							'price' => $book_detail->price,
							'image' => $book_detail->image
						);
						$book_detail_arr['qty'] = 1;
						echo form_open('/AdminController/load_statistics_view', '', $book_detail_arr); ?>
						<br>
						<button type='submit' class='btn btn-outline-success'><i class="fa fa-shopping-cart"
																				 aria-hidden="true"></i> Check Visitor Statistics
						</button>
						<?php echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
