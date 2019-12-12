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
        						<li class="breadcrumb-item active">Reservation History</li>
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
        						<h3 class="card-title"> Your Reservation History </h3>
        					</div>

        					<!-- /.card-header -->
        					<div class="card-body">
        						<?php foreach ($reservasi as $key) { ?>
        						<div class="row">
        							<div class="col-md-2"></div>
        							<div class="col-md-3">
        								<?php foreach ($this->db->select('*')->from('user')->where('id_user', $key->terapis_id )->get()->result() as $value1){?>
        								<img src="<?php echo base_url();?>assets/upload/<?php echo $value1->foto;?>"  width="200" height="150">
        								<h5>Terapis	: <?= $value1->full_name;?></h5>
        								<?php } ?>
        							</div>
        							<div class="col-md-6">
        								<div id="header">
        									<?php foreach ($this->db->select('*')->from('sesi_reservasi')->where('id_sesi', $key->sesi_id )->get()->result() as $value2){?>
        									<h5>Sesi	: <?= $value2->sesi," ", $value2->waktu;?></h5>
        									<?php } ?>
        									<h5>Tanggal : <?= $key->tgl_reservasi;?></h5>
        								</div>
        								<div id="body">
        									<?php foreach ($this->db->select('*')->from('detail_reservasi')->join('sub_kategori','detail_reservasi.subkategori_id = sub_kategori.id_sub_kategori')->where('reservasi_id', $key->id_reservasi )->get()->result() as $value){?>
        									<table>
        										<td><p>Layanan	: <?= $value->judul_sub; ?></p></td>
        										<td>&nbsp | &nbsp</td>
        										<td><p>Harga : <?= $value->harga; ?></p></td>
        										<td>&nbsp | &nbsp</td>
        										<td><p>Jumlah : <?= $value->jmlh; ?></p></td>
        									</table>
        									<?php } ?>
        									<table>
        										<td><p>Total : <?= $key->total_harga_awal; ?></p></td>
        										<td>&nbsp | &nbsp</td>
        										<td><p>Biaya transport : <?php if(empty($key->biaya_transportasi)){ echo "belum";}else{$key->biaya_transportasi;} ?></p></td>
        										<td>&nbsp | &nbsp</td>
        										<td><p>Diskon : <?php if(empty($key->nominal_diskon)){ echo "belum";}else{$key->nominal_diskon;} ?></p></td>
        									</table>
        								</div>
        								<div id="footer">
        									<p>Status Reservasi : <?= $key->status; ?></p>	
        								</div>
        							</div>
        						</div>
        						<br>
        						<?php } ?>

        						<br>
        					<div style="align-items: center;"><?php 
        					echo $this->pagination->create_links();?></div>
        					<br>
        				</div> 
        			</div>
        		</div>
        	</div>
        </section>
    </div>

