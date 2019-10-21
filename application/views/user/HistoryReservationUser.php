<div class="container" style="min-height: 100%">
	<div class="artikel" id="artikel" style="min-height: 603px; padding-top: 100px;padding-bottom: inherit;">
		<h3 class="heading text-center mb-3 mb-sm-5">Your Reservation History</h3>
<!-- 		<hr width="10%" align="left">
 -->		<?php foreach ($reservasi as $key) { ?>
		<div class="row">
			<div class="col-md-3">
				<?php foreach ($this->db->select('*')->from('user')->where('id_user', $key->terapis_id )->get()->result() as $value1){?>
					<img src="<?php echo base_url();?>assets/user/images/<?php echo $value1->foto;?>"  width="400" height="150">
					<h5>Terapis	: <?= $value1->full_name;?></h5>
				<?php } ?>
			</div>
			<div class="col-md-9">
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
						<td><p>Biaya transport : <?= $key->biaya_transportasi; ?></p></td>
						<td>&nbsp | &nbsp</td>
						<td><p>Total : <?= $key->total_harga_awal; ?></p></td>
						<td>&nbsp | &nbsp</td>
						<td><p>Diskon : <?= $key->nominal_diskon; ?></p></td>
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
	</div>
	<div style="align-items: center;"><?php 
	echo $this->pagination->create_links();?></div>
	<br>
</div> 
