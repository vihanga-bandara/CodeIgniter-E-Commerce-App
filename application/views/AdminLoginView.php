<?php $this->load->view("header"); ?>

<div class="row no-gutters">
	<div class="col-md-4 offset-md-4">
		<div class="row no-gutters">
			<div class="col-md-10 offset-md-1 login-form">
				<form method="post" action="<?php echo base_url() ?>HomeController/login_valid">
					<h2 class="text-center">Admin Login</h2>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username">
						<span class="text-danger"><?php echo form_error("username") ?></span>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<span class="text-danger"><?php echo form_error("password") ?></span>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Log in
						</button>
						<br/><?php echo '<label class="text-danger">' . $this->session->flashdata("error_message") ?>
						<br/>
					</div>
					<div class="clearfix">
						<label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
						<a href="#" class="pull-right">Forgot Password?</a>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
<?php $this->load->view("footer"); ?>

<style>
	.login-form {
		width: 100%;
		border: 1px solid #c3c3c3;
		padding: 60px 75px !important;
		margin-top: 150px;
		-webkit-box-shadow: 0px 0px 30px 0px rgba(150, 148, 150, 1);
		-moz-box-shadow: 0px 0px 30px 0px rgba(150, 148, 150, 1);
		box-shadow: 0px 0px 30px 0px rgba(150, 148, 150, 1);
		border-radius: 12px;

	}
</style>
