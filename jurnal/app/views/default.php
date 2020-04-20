<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{base_url}favicon.ico" />
	<title>{title} :: <?php echo get_pengaturan('app_name') ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link href="{assets_path}global/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{css_path}bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}layout.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}components.min.css" rel="stylesheet" type="text/css">
	<link href="{css_path}colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{assets_path}global/js/main/jquery.min.js"></script>
	<script src="{assets_path}global/js/main/bootstrap.bundle.min.js"></script>
	<script src="{assets_path}global/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{assets_path}global/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="{assets_path}global/js/plugins/pickers/pickadate/picker.date.js"></script>	
	<script src="{assets_path}global/js/plugins/forms/styling/uniform.min.js"></script>	
	<script src="{assets_path}global/js/plugins/ui/prism.min.js"></script>
	<script src="{assets_path}js/app.js"></script>
	<script src="{assets_path}js/custom.js"></script>
	<script src="{assets_path}js/numeral.min.js"></script>
	<!-- /theme JS files -->

	<style type="text/css">
		.logo img {width: 110px; height: 22px; display: block; float: left; }
	</style>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark {bg_navbar}">
		<div class="navbar-brand">
			<div class="logo">
				<a href="{site_url}">
					<img src="{uploads_path}<?php echo get_pengaturan('logo') ?>">
				</a>
			</div>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>



		<div class="collapse navbar-collapse" id="navbar-mobile">
			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
			<ul class="navbar-nav">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span> <?php echo get_user('name') ?> </span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{site_url}Akun_setting" class="dropdown-item"><i class="icon-cog5"></i> 
							<?php echo lang('account_setting') ?></a>
						<a href="{site_url}auth/logout" class="dropdown-item"><i class="icon-switch2"></i> 
							<?php echo lang('logout') ?>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<?php $this->load->view('sidebar'); ?>

		<!-- Main content -->
		<div class="content-wrapper">

			
			<?php $this->load->view($content); ?>


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2019 <span class="font-weight-semibold"><?php echo get_pengaturan('app_name') ?></span>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="http://www.isyanto.com" class="navbar-nav-link font-weight-semibold" target="_blank"><span class="text-pink-400"><i class="icon-user mr-2"></i> www.isyanto.com</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
