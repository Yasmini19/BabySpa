<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kapella Bootstrap Admin Dashboard Template</title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>	
		<script type="text/javascript">
		$(document).ready(function(){
		$('#dataTable').DataTable();
		});
		</script>
 </head>
  <body>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell mx-0"></i>
                  <span class="count bg-success">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-information mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Just now
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="mdi mdi-settings mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Private message
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          2 days ago
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email mx-0"></i>
                  <span class="count bg-primary">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="<?php echo base_url();?>assets/admin/images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          The meeting is cancelled
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="<?php echo base_url();?>assets/admin/images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          New product launch
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="<?php echo base_url();?>assets/admin/images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          Upcoming board meeting
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
              </li>
              <li class="nav-item nav-search d-none d-lg-block ml-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search">
                </div>
              </li>	
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url();?>assets/admin/images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url();?>assets/admin/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown  d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Product </button>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-toggle="dropdown">
                  Reports
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                      <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-pdf text-primary"></i>
                        Pdf
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-excel text-primary"></i>
                        Exel
                      </a>
                  </div>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Settings</button>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">Johnson</span>
                    <span class="online-status"></span>
                    <img src="<?php echo base_url();?>assets/admin/images/faces/face28.png" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                    <span class="menu-title">UI Elements</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a href="pages/forms/basic_elements.html" class="nav-link">
                    <i class="mdi mdi-chart-areaspline menu-icon"></i>
                    <span class="menu-title">Form Elements</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="mdi mdi-finance menu-icon"></i>
                    <span class="menu-title">Charts</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="pages/tables/basic-table.html" class="nav-link">
                    <i class="mdi mdi-grid menu-icon"></i>
                    <span class="menu-title">Tables</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo site_url();?>/Admin/galery" class="nav-link">
                    <i class="mdi mdi-google-photos menu-icon"></i>
                    <span class="menu-title">Gallery</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-codepen menu-icon"></i>
                    <span class="menu-title">Sample Pages</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a href="docs/documentation.html" class="nav-link">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Documentation</span></a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div>
									<h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
									<h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
								</div>
								<div class="ml-lg-5 d-lg-flex d-none">
										<button type="button" class="btn bg-white btn-icon">
											<i class="mdi mdi-view-grid text-success"></i>
									</button>
										<button type="button" class="btn bg-white btn-icon ml-2">
											<i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
										</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								<div class="pr-1 mb-3 mb-xl-0">
										<button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Feedback
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</button>
								</div>
								<div class="pr-1 mb-3 mb-xl-0">
										<button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Help
											<i class="mdi mdi-help-circle-outline btn-icon-append"></i>                          
									</button>
								</div>
								<div class="pr-1 mb-3 mb-xl-0">
										<button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Print
											<i class="mdi mdi-printer btn-icon-append"></i>                          
										</button>
								</div>
							</div>
						</div>
					</div>
				<div class="row mt-auto">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body pb-sm-1">
								<div class="d-flex align-items-center justify-content-between">
									<h2 class="text-success font-weight-bold">Gallery Data</h2>
									<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
								</div>
								<div class="d-flex align-right justify-content-end">
								<button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-tambah-galery" class="btn btn-success pull-right">
									<span class="glyphicon glyphicon-plus"></span>  Tambah 
								</button>
								</div>
							</div>
							<div class="row mt-auto">
							<div class="col-lg-12 grid-margin stretch-card">
							<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover" id="dataTable">
									<thead>
										<tr>
											<th>Id</th>
											<th>Images</th>
											<th width="900px">Decriptions</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($galerys as $galery => $value): ?>
										<tr>
											<td>
												<?php echo $value->id_galery ?>
											</td>
											<td>
												<img src="<?php echo base_url('assets/user/upload/'.$value->galery)?>" >
											</td>
											<td>
												<?php echo $value->keterangan ?>
											</td>
											<td>
												<a href="<?php echo base_url("/Admin/edit_galery".$value->id_galery) ?>" class="mdi mdi-pencil-box-outline btn btn-secondary btn-icon-append" aria-hidden="true" data-toggle="modal" data-target="#modal-edit-galery" name="tombolEditGalery" value="<?php echo $value->id_galery; ?>"></a>
                                				<a href="<?php echo base_url("/Admin/delete_galery".$value->id_galery) ?>" class="mdi mdi-delete btn btn-danger btn-icon-append" aria-hidden="true" name="tombolDeleteGalery" value="<?php echo $value->id_galery; ?>"></a>
											</td>
										</tr>
									<?php endforeach; ?>	
									</tbody>
								</table>
							</div>
							</div>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modal-tambah-galery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!--Header-->
              <div class="modal-header"> 

                <h4 class="modal-title" id="myModalLabel">Galery</h4>
                <?php echo validation_errors(); ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <div class="modal-body mx-3">
              <!-- <FORM id="addGalery"> -->
               <form method="post" accept-charset="utf-8" id="addGalery" enctype="multipart/form-data">
                
                 <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="file" id="galery" class="form-control validate" name="galery" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Foto</label>
                </div>
				<div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="keterangan" class="form-control validate" name="keterangan" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Keterangan</label>
                </div>


              </div>

            </div>


              <!--Footer-->
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-outline-primary" id="btnSimpanGalery">
                <input type="button" class="btn btn-primary" value="Close" data-dismiss="modal">
                <?php //echo form_close(); ?>
              </div>
            </form>
            </div>
		</div>
	</div>
				<!-- <div class="container-fluid">
					<div class="col-sm-4 form-control-sm">
						<h2 class="text-success font-weight-bold">Tambah</h2>
						<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
						<form class="mdi-format-horizontal-align-center" id="tambah">
							<div class="form-group">
								<input type="file" name="file">
							</div>
							<div class="form-group">
								<input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
							</div>
							<div class="form-group">
								<button type="submit" id="btn_tambah" class="btn btn-success">Tambah</button>
							</div>
						</form>
					</div>
				</div>
				</div> -->
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix">
                <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">templatewatch</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline"></i></span>
              </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="<?php echo base_url();?>assets/admin/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>assets/admin/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="<?php echo base_url();?>assets/admin/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/progressbar.js/progressbar.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="<?php echo base_url();?>assets/admin/justgage/raphael-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="<?php echo base_url();?>assets/admin/js/dashboard.js"></script>
    <!-- End custom js for this page-->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$('form#addGalery').submit(function(e){
        e.preventDefault();
        var formData = new FormData($('form#addGalery')[0]);

        $.ajax({
          url: '<?php echo site_url('admin/add_galery');?>',
          type: 'POST',
          data: formData,

          cache : false,
          contentType : false,
          processData : false,
          
          success: function(response) {
            
            if (response='true')
            {
              alert('berhasil');
              location.reload();
            }
            else
            { alert('error : ' + response); }
          
          }
        });
      });
	</script>
  </body>
</html>
