<div class="container">
	<div class="artikel" id="artikel" style="padding-top: 10%;">
		<b><h5 class="heading">Our News</h5></b>
		<br>
<!-- 		<hr width="10%" align="left">
 -->		<?php foreach ($berita as $key) { ?>
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo base_url();?>assets/user/images/<?php echo $key->foto_berita;?>"  width="400" height="150">
			</div>
			<div class="col-md-9">
				<div id="header">
					<h5><?= $key->judul_berita;?></h5>
				</div>
				<div id="body">
					<p><?php echo substr($key->deskripsi, 0, 250) . '...'; ?></p>
				</div>
				<div id="hyperlink">
					<a href=""><p>read more</p></a>
				</div>
			</div>
		</div>
		<br>
		<?php } ?>

		<div style="align-items: center;"><?php 
	echo $this->pagination->create_links();?></div>
		
		<br>
	</div>
</div> 