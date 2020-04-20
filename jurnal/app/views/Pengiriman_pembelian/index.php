<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-info22 mr-2"></i> <span class="font-weight-semibold">{title}</span></h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<div class="content">
	<div class="card">
		<div class="card-header {bg_header}">
			<h5 class="card-title">{subtitle}</h5>
		</div>
		<table class="table table-striped index_datatable">
			<thead class="{bg_header}">
				<tr>
					<th>ID</th>
					<th><?php echo lang('notrans') ?></th>
					<th><?php echo lang('order') ?></th>
					<th><?php echo lang('note') ?></th>
					<th><?php echo lang('date') ?></th>
					<th><?php echo lang('supplier') ?></th>
					<th><?php echo lang('warehouse') ?></th>
					<th><?php echo lang('status') ?></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
<script src="{assets_path}global/js/plugins/notifications/pnotify.min.js"></script>
<script src="{assets_path}global/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	var base_url = '{site_url}pengiriman_pembelian/';
	var table = $('.index_datatable').DataTable({
		ajax: {
			url: base_url + 'index_datatable',
			type: 'post',
		},
		pageLength: 100,
		stateSave: true,
		autoWidth: false,
		order: [[0,'DESC']],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"p>',
        language: {
            search: '<span></span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
        },
        columns: [
        	{data: 'id', visible: false},
        	{
        		data: 'notrans',
        		render: function(data,type,row) {
        			var link = base_url + 'detail/' + row.id;
        			return '<a href="'+link+'" class="badge badge-info">'+data+'</a>';
        		}
        	},
        	{
        		data: 'nopemesanan',
        		render: function(data,type,row) {
        			var link = '{site_url}pemesanan_pembelian/detail/' + row.idpemesanan;
        			return '<a target="_blank" href="'+link+'" class="badge badge-info">'+data+'</a>';
        		}
        	},
        	{data: 'catatan', orderable: false, width: '200px'},
        	{data: 'tanggal'},
        	{data: 'supplier'},
        	{data: 'gudang'},
        	{
        		data: 'status',
        		render: function(data) {
        			if(data == '3') return '<span class="badge badge-success"><?php echo lang('done') ?></sapan>';
        			else if(data == '2') return '<span class="badge badge-warning"><?php echo lang('partial') ?></sapan>';
        			else if(data == '1') return '<span class="badge badge-danger"><?php echo lang('pending') ?></sapan>';
        		}
        	}
        ]
	});

	function deleteData(id) {
	    var notice = new PNotify({
	        title: '<?php echo lang('confirm') ?>',
	        text: '<p><?php echo lang('confirm_delete') ?></p>',
	        hide: false,
	        type: 'warning',
	        confirm: {
	            confirm: true,
	            buttons: [
	                { text: 'Yes', addClass: 'btn btn-sm btn-primary' },
	                { addClass: 'btn btn-sm btn-link' }
	            ]
	        },
	        buttons: { closer: false, sticker: false }
	    })
	    notice.get().on('pnotify.confirm', function() {
	    	$.ajax({ url: base_url + 'delete/'+id })
	    	setTimeout(function() { table.ajax.reload() }, 100);
	    })
	}
</script>