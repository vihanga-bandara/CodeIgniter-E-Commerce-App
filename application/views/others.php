<body>
<div class="container">
	<h3> Insert Data using CodeIgniter </h3>
	<form method="post" action = "<?php echo base_url()?>main/form_validation">
		<?php
		if($this->uri->segment(2) == "inserted"){
			echo '<p class="text-success">Data Inserted</p>';
		}
		?>
		<div class="form-group">
			<label>Enter First Name</label>
			<input type="text" name = "first_name" class="form-control"/>
			<span class="text-danger"><?php echo form_error("first_name") ?></span>
		</div>
		<div class="form-group">
			<label>Enter Last Name</label>
			<input type="text" name = "last_name" class="form-control" />
			<span class="text-danger"><?php echo form_error("last_name") ?></span>
		</div>
		<div class="form-group">
			<input type="submit" name="insert" value="insert" class="btn btn-info" />
		</div>
	</form>
</div>
<div class="container">
	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Fn</th>
			<th>Ln</th>
			<th>Actions</th>
		</tr>
		<?php
		if($fetchedData->num_rows()>0){
			foreach($fetchedData->result() as $row){
				?>
				<tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo $row->last_name; ?></td>
					<td><a href="#" class="delete_data" id="<?php echo $row->id;?>">Delete</a></td>
				</tr>
				<?php
			}
		}else{
			?>
			<tr>
				<td colspan="3">No Data Found</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function () {


		})
	})
</script>
</body>
