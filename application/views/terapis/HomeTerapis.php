
<div class="page-content-wrapper" style="background-color: #f4f6f9;" >
<div class="container" style="min-height: 1000px">
        <div class="page-content">
            <div class="alert notification" style="display: none;">
                <button class="close" data-close="alert"></button>
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-body">
                            <br>
                            <div style="background-color: white; padding: 12px">
                            <div id="calendarIO"></div>
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
                    <!-- end place -->
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<script>

//$( "#calendarIO" ).removeClass( "fc-scroller" );
</script>