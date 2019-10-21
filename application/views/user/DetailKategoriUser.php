<div class="container" style="min-height: 100%">
	<div class="artikel" id="artikel" style="min-height: 640px; padding-top: 100px;padding-bottom: inherit;">
		<b><h5 class="heading">Our Category</h5></b>
		<br>
<!-- 		<hr width="10%" align="left">
 -->		
 		<div class="row">
 			<div class="col-md-8">
 				<?php foreach ($data as $key) { ?>
		 			<div id="header">
							<h3><?= $key->judul_kat;?></h3>
					</div>
					<br>
		 			<div id="body">
							<p><?php echo $key->keterangan_kat; ?></p>
							<p>
								<ol style="color: #707579; font-family: 'Open Sans',sans-serif; font-size: 17px;line-height:2em;letter-spacing: 1px">
								<?php foreach ($data3 as $key3) {?>
									<li style="list-style-type:unset"><?= $key3->judul_sub;?>
										<br><img src="<?php echo base_url();?>assets/user/images/<?php echo $key3->foto_sub;?>"  width="670" height="350">
										<br><?= $key3->keterangan_sub;?>
									</li>
								<?php } ?>
								</ol>  
							</p>
					</div>
				<?php } ?>
 			</div>
 			<div class="col-md-1"></div>

 			<div class="col-md-3">
 				<h5><b>Kategori lainnya</b></h5>
 				<br>
 				<?php foreach ($data2 as $key2) { ?>
 				<div class="" id="artikelLain">

		 			<div id="header">
							<h6><a href="<?php echo site_url()?>/User/DetailKategoriUser/<?= $key2->id_kategori?>"><?= $key2->judul_kat;?></a></h6>
					</div>
				</div>
				<br>
				<?php } ?>
 			</div>

		</div>
	
		<br>
	</div>
	<br>
</div> 