<?php

$this->load->view("header");
?>

<h1> pako </h1>
<div class="container">


	<table id="cart" class="table table-hover table-condensed">
		<thead>
		<tr>
			<th style="width:50%">Product</th>
			<th style="width:10%">Price</th>
			<th style="width:8%">Quantity</th>
			<th style="width:22%" class="text-center">Subtotal</th>
			<th style="width:10%"></th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($this->cart->contents() as $items) { ?>
		</thead>
		<tbody>
		<tr>
			<td data-th="Product">
				<div class="row">
					<!--<div class="col-sm-2 hidden-xs"><img src="<?php /*echo base_url() . '/uploads/' . $items['image'] */?>"
														 alt="..."
														 class="img-responsive"/></div>-->
					<div class="col-sm-10">
						<h4 class="nomargin"><?php echo $items['name']; ?></h4>

					</div>
				</div>
			</td>
			<td data-th="Price"><?php echo $this->cart->format_number($items['price']); ?></td>
			<td data-th="Quantity">
				<?php echo form_open('CartController/update'); ?>
				<?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
				<input type="number" name="<?php echo $i . '[qty]'; ?>" class="form-control text-center"
					   value="<?php echo $items['qty']; ?>">
			</td>
			<td data-th="Subtotal"
				class="text-center"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
			<td class="actions" data-th="">
				<button type="submit" class="btn btn-default btn-sm"><i class="fas fa-pen-square"></i></button>
				<?php echo form_close() ?>
				<a href="<?php echo base_url().'CartController/delete/'. $items['rowid']?>"><i class="fas fa-trash"></i><i
						class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php $i++; ?>

		<?php } ?>
		</tbody>
		<tfoot>

		<tr>

			<td colspan="2" class="hidden-xs"></td>
			<td class="hidden-xs text-center">
				<strong>Total <?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
			<td><a href="<?php echo base_url()."BookController";?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
		</tr>
		</tfoot>
	</table>


</div>


<!--
<div style="padding-top:60px"></div>
<?php
/*
echo form_open('CartController/update'); */?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
	<tr>
		<th>QTY</th>
		<th>Item Description</th>
		<th style="text-align:right">Item Price</th>
		<th style="text-align:right">Sub-Total</th>
	</tr>
	<?php /*$i = 1; */?>
	<?php /*foreach ($this->cart->contents() as $items): */?>
		<?php /*echo form_hidden($i . '[rowid]', $items['rowid']); */?>
		<tr>
			<td><?php /*echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); */?></td>
			<td>
				<?php /*echo $items['name']; */?>
				<?php /*if ($this->cart->has_options($items['rowid']) == TRUE): */?>
					<p>
						<?php /*foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): */?>
							<strong><?php /*echo $option_name; */?>:</strong> <?php /*echo $option_value; */?><br/>
						<?php /*endforeach; */?>
					</p>
				<?php /*endif; */?>
			</td>
			<td style="text-align:right"><?php /*echo $this->cart->format_number($items['price']); */?></td>
			<td style="text-align:right">$<?php /*echo $this->cart->format_number($items['subtotal']); */?></td>
			<td style="text-align:right"><a
					href="<?php /*echo base_url() . 'CartController/delete/' . $items['rowid'] */?>">Delete</a></td>
		</tr>

		<?php /*$i++; */?>

	<?php /*endforeach; */?>

	<tr>
		<td colspan="2"></td>
		<td class="right"><strong>Total</strong></td>
		<td class="right">$<?php /*echo $this->cart->format_number($this->cart->total()); */?></td>
	</tr>

</table>

<p><?php /*echo form_submit('', 'Update your Cart'); */?></p>
-->
<?php $this->load->view("footer"); ?>
