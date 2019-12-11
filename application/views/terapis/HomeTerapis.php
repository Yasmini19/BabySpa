        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Schedule</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Terapis Schedule </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="page-content">
                                    <div class="alert notification" style="display: none;">
                                        <button class="close" data-close="alert"></button>
                                        <p></p>
                                    </div>
                                    <div class="row">
                                        <div style="background-color: white; padding: 12px">
                                            <div id="calendarIO"></div>
                                        </div>
                                        <!-- end place -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>

        <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="POST" id="form_create">
                        <input type="hidden" name="calendar_id" value="0">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Detail Calendar Event</h4>
                          <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                        <div class="form-group">
                         <div class="alert alert-danger" style="display: none;"></div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4">Pemesan  <span class="required"> </span></label>
                        <div class="col-sm-12">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" disabled="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4">Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" name="description" id="description" class="form-control" placeholder="alamat" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4">No Hp</label>
                        <div class="col-sm-12">
                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-6">Tanggal / Jam Mulai</label>
                        <div class="col-sm-12">
                            <input type="text" name="start_date" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-6">Tanggal / Jam Selesai </label>
                        <div class="col-sm-12">
                            <input type="text" name="end_date" class="form-control" disabled>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="javascript::void" class="btn default" data-dismiss="modal">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.card -->
    </section>
    <!-- right col -->
    <!-- </div> -->
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->

<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0-rc.1
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- </div> -->
<!-- ./wrapper -->

<!-- jQuery -->
    <!-- <script src="<?php //echo base_url(); 
    ?>assets/admin/plugins/jquery/jquery.min.js"></script> -->
    <!-- jQuery UI 1.11.4 -->
    
    <!-- page script -->

