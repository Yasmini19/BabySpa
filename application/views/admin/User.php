<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Mamina</title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/mamina.png" />
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
                  <a href="<?php echo base_url();?>index.php/Admin/contact_us" class="nav-link">
                    <i class="mdi mdi-account-location menu-icon"></i>
                    <span class="menu-title">Kontak dan Alamat</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <!-- <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                      </ul>
                  </div> -->
              </li>
             <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/Admin/Terapis" class="nav-link">
                    <i class="mdi mdi-account-box-outline menu-icon"></i>
                    <span class="menu-title">Terapis</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/Admin/user" class="nav-link">
                    <i class="mdi mdi-finance menu-icon"></i>
                    <span class="menu-title">User</span>
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
                  <a href="pages/icons/mdi.html" class="nav-link">
                    <i class="mdi mdi-emoticon menu-icon"></i>
                    <span class="menu-title">Icons</span>
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
            <!-- starttable -->
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">User</h4>

                        <div  id="demo-dt-wrapper" class="dataTables_wrapper form-inline dt-boostrap no-footer">
                          <div class="toolbar">
                           <div class="pr-1 mb-3 mb-xl-0">
                          <button type="button" class="btn btn-outline-inverse-info btn-icon-text" data-toggle="modal" data-target="#modal-tambah-user">
                            ADD
                          <i class="mdi mdi-plus-box btn-icon-append"></i>                          
                    </button>
                    </div>
                          </div>
                          <div id="demo-dt-add_filter" class="dataTables_filter">
                            <label>
                              Search :
                              <input type="search" class="form-control input-sm" placeholder aria-controls="demo-dt-add" id="searchTable">
                            </label>
                          </div>
                        </div>
                        <br>
                        <div id='divHasil'>
                        <table id="demo-datatables" class="table table-striped table-bordered datatable no-footer dtr-inline" role="grid" aria-describedby="demo-dt-add-info">

                           <thead>
                              <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="demo-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Id User</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No Tlp</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Action</th>
                        
                              </tr>
                            </thead>
                            <tbody>
                              
                             <?php foreach ($usr as $key => $value): ?>
                           <tr>
                          <td><?php echo $value->id_user ?></td>
                          <td><?php echo $value->full_name ?></td>
                          <td><?php echo $value->username ?></td>
                          <td><?php echo $value->email ?></td>
                          <td><?php echo $value->no_telp ?></td>
                          <td><?php echo $value->alamat ?></td>
                          <td><img src="<?php echo base_url()?>./assets/upload/<?php echo $value->foto?>" alt="" width=100 height=100></td>
                           <td>
                                <a href="<?php echo base_url("/Admin/edit_user".$value->id_user) ?>" class="mdi mdi-pencil-box-outline btn-icon-append" aria-hidden="true" data-toggle="modal" data-target="#modal-edit-user" name="tombolEditUser" value="<?php echo $value->id_user; ?>"</a>
                                <a href="<?php echo base_url("/Admin/delete_user/".$value->id_user) ?>" class="mdi mdi-delete btn-icon-append" aria-hidden="true" name="tombolDeleteUser" value="<?php echo $value->id_user; ?>"></a>
                          </td>

                        </tr>
                        <?php endforeach; ?>
                        
                        <tr>
                          <td>
                            </td>
                        </tr>
                  
                            </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- endtable -->
          </div>
        </div>

        <!--Modal ADD-->

        <div class="modal fade" id="modal-tambah-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!--Header-->
              <div class="modal-header">
                <?php //echo form_open_multipart('Admin/add_terapis'); ?> 

                <h4 class="modal-title" id="myModalLabel">Terapis</h4>
                <?php echo validation_errors(); ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <div class="modal-body mx-3">
              <!-- <FORM id="addTerapis"> -->
               <form method="post" accept-charset="utf-8" id="addUser" enctype="multipart/form-data">

                  <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="full_name" class="form-control validate" name="full_name" placeholder="Input field" >
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Fullname</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="username" class="form-control validate" name="username" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Username</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="email" id="email" class="form-control validate" name="email" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Email</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="no_telp" class="form-control validate" name="no_telp" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">No Telp</label>
                </div>
                
              <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="alamat" class="form-control validate" name="alamat" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Alamat</label>
                </div>

                 <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="file" id="foto" class="form-control validate" name="foto" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Foto</label>

                </div>
                
              </div>

            </div>


              <!--Footer-->
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-outline-primary" id="btnSimpanUser">
                <input type="button" class="btn btn-primary" value="Close" data-dismiss="modal">
                <?php //echo form_close(); ?>
              </div>
            </form>
            </div>
  </div>
</div>

<!--Modal EDIT-->

        <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!--Header-->
              <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Terapis</h4>
                <?php echo validation_errors(); ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <!-- <FORM id="addTerapis"> -->
               <form method="post" accept-charset="utf-8" id="editUser" enctype="multipart/form-data">
              <!--Body-->
              <div class="modal-body">
                  <div class="modal-body mx-3">
              
                    <input type="hidden" id="edit_id" name="edit_id">
                    <input type="hidden" id="edit_level" name="edit_level">
                <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="edit_full_name" class="form-control validate" name="edit_full_name" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Fullname</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="edit_username" class="form-control validate" name="edit_username" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Username</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="email" id="edit_email" class="form-control validate" name="edit_email" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Email</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="edit_no_telp" class="form-control validate" name="edit_no_telp" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">No Telp</label>
                </div>
                
                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="text" id="edit_alamat" class="form-control validate" name="edit_alamat" placeholder="Input field">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Alamat</label>
                </div>

                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <img alt="" width=100 height=100 id="foto_lama">
                  <input type="file" id="edit_foto" class="form-control validate" name="edit_foto" placeholder="Input field">

                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Foto</label>
                </div>
                
              </div>

            </div>


              <!--Footer-->
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-outline-primary" id="btnSimpanUser">
                <input type="button" class="btn btn-primary" value="Close" data-dismiss="modal">
                <?php //echo form_close(); ?>
              </div>
            </form>
            </div>
          </div>
        </div>

             


<script src="<?php echo base_url();?>assets/admin/jquery/jquery.js"></script>
    <script type="text/javascript">

      $('form#addUser').submit(function(e){
        e.preventDefault();
        var formData = new FormData($('form#addUser')[0]);

        $.ajax({
          url: '<?php echo site_url('admin/add_user');?>',
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

      $('#searchTable').keyup(function(){

        var text = $('#searchTable').val();

        if (text != '' || text != null)
        {

          $.ajax({
            url: '<?php echo site_url('admin/search_user') ?>',
            type: 'post',
            data: {text:text},
            success: function(data) {
              //alert(data);
              $('#divHasil').html(data);
              //$('#divHasil').innerHTML=data;
            }
          });
        }
        else
        {alert('error');}
      });

       $('[name="tombolEditUser"]').click(function(){
        
        var id = $(this).attr('value')
       
        $.ajax({
          url: '<?php echo site_url('admin/get_user') ?>',
          type: 'post',
          data: {id:id},
          success: function(data) {
            if(data==null){alert('kosong');}
            
            data=JSON.parse(data);
            
            $('#edit_id').val(data.id_user);
            $('#edit_level').val(data.level);
            $('#edit_full_name').val(data.full_name);
            $('#edit_username').val(data.username);
            $('#edit_email').val(data.email);
            $('#edit_no_telp').val(data.no_telp);
            $('#edit_alamat').val(data.alamat);
            $('#foto_lama').attr('src', '<?php echo base_url()?>/assets/upload/'+data.foto);
         }
        });
      });
     
     //ajaxformedit
      $('form#editUser').submit(function(e){
        e.preventDefault();
        var formData = new FormData($('form#editUser')[0]);
        
        $.ajax({
          url: '<?php echo site_url('admin/edit_user');?>',
          type: 'POST',
          data: formData,

          cache : false,
          contentType : false,
          processData : false,
          
          success: function(response) {
            
            if (response)
            {
              alert('berhasil');
              location.reload();
            }
            else
            { alert('error : ' + response); }
          
          }
        });
      });


      //ajaxdelete
      $('[name="tombolDeleteUser"]').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value')
        //alert(id);
        $.ajax({
          url: '<?php echo site_url('admin/delete_user') ?>',
          type: 'post',
          data: {id:id},
          success: function(response) {
            //alert(response);
          if (response)
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
    
  </body>
</html>