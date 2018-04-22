<link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
	body {
    padding-top: 90px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

</style>

<div class="container">
	<div class="row">
		<?php if ($this->session->flashdata('message_success')): ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Thành công!</h4>
				<?php echo $this->session->flashdata('message_success') ?>
			</div>
		<?php endif ?>

		<?php if ($this->session->flashdata('message_error')): ?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Thất bại!</h4>
				<?php echo $this->session->flashdata('message_error') ?>
			</div>
		<?php endif ?>
		

		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<a href="#" class="<?php echo ($this->uri->segment(2) == 'login')? 'active' : '' ?>" id="login-form-link">Login</a>
						</div>
						<div class="col-xs-6">
							<a href="#" id="register-form-link" class="<?php echo ($this->uri->segment(2) == 'register')? 'active' : '' ?>">Register</a>
						</div>
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="<?php echo base_url('client/login'); ?>" method="post" role="form" style="<?php echo ($this->uri->segment(2) == 'login')? 'display: block' : 'display: none' ?>">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>"/>
								<div class="form-group">
									<input type="email" name="login_email" tabindex="1" class="form-control" placeholder="Email" value="">
								</div>
								<div class="form-group">
									<input type="password" name="login_password" tabindex="2" class="form-control" placeholder="Password">
								</div>
								<div class="form-group text-center">
									<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
									<label for="remember"> Remember Me</label>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form id="register-form" action="<?php echo base_url('client/register'); ?>" method="post" role="form" style="<?php echo ($this->uri->segment(2) == 'register')? 'display: block' : 'display: none' ?>">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
								<div class="form-group">
									<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Họ tên..." value="">
									<span class="error"><?php echo form_error('username'); ?></span>
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Địa chỉ Email" value="">
									<span class="error"><?php echo form_error('email'); ?></span>
								</div>
								<div class="form-group">
									<input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="0988888888" value="">
								</div>
								<div class="form-group">
									<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Số 23 Tô Hiệu" value="">
								</div>
								<div class="form-group">
									<input type="text" name="district" id="district" tabindex="1" class="form-control" placeholder="Cầu Giấy" value="">
								</div>
								<div class="form-group">
									<input type="text" name="city" id="city" tabindex="1" class="form-control" placeholder="Hà Nội" value="">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="" tabindex="2" class="form-control" placeholder="Password">
									<span class="error"><?php echo form_error('password'); ?></span>
								</div>
								<div class="form-group">
									<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									<span class="error"><?php echo form_error('confirm-password'); ?></span>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng Ký">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {

	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

	});

</script>