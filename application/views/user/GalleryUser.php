<div class="container-fluid">
	<section class="gallery py-5" id="gallery">
		<div class="container py-md-5">
			<div class="header mb-3 mb-sm-5 text-center">
				<h3 class="heading text-center mb-3 mb-sm-5">Our Gallery and Testimony</h3>
			</div>

			<div class="row news-grids text-center">
			<?php foreach ($gallery as $key) {?>
					<div class="col-md-4 gal-img">
						<a href="#<?= $key->galery?>"><img src="<?php echo base_url();?>assets/user/images/<?= $key->galery?>" alt="news image" class="img-fluid"></a>
					</div>
			<!-- popup-->
				<div id="<?= $key->galery?>" class="pop-overlay animate">
					<div class="popup">
						<img src="<?php echo base_url();?>assets/user/images/<?= $key->galery?>" alt="Popup Image" class="img-fluid" />
						<p class="mt-4"><?= $key->keterangan?></p>
						<a class="close" href="#gallery">&times;</a>
					</div>
				</div>
			<?php } ?>
			<!-- //popup -->
			</div>
		</div>
	</section>
	<div style="align-items: center;"><?php 
	echo $this->pagination->create_links();?></div>
</div>