<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{base_url}favicon.ico" />
	<title>{title}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link href="{assets_path}global/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{css_path}bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}layout.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}components.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}colors.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{assets_path}global/js/main/jquery.min.js"></script>
	<script src="{assets_path}global/js/main/bootstrap.bundle.min.js"></script>
	<script src="{assets_path}global/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{assets_path}global/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="{assets_path}js/app.js"></script>
	<script src="{assets_path}global/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" action="{site_url}Auth/dologin" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<?php if ($this->session->flashdata('error')): ?>
								<div class="alert alert-danger border-0 alert-dismissible"> 
									<?php echo $this->session->flashdata('error'); ?>
							    </div>
							<?php endif ?>

							<div class="text-center mb-3 mt-1">
								<div>
									<img src="{uploads_path}<?php echo get_pengaturan('logo_login') ?>" width="160">
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="<?php echo lang('username') ?>" name="username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="<?php echo lang('password') ?>" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-block {bg_header}"><?php echo lang('login') ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
