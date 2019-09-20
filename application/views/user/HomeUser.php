
<!-- banner -->
<div class="banner" id="home">
	<div class="layer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 banner-text-w3ls"></div>
				<!-- banner slider-->
				<div class="col-md-6 px-lg-3 px-0">
					<div class="banner-form-w3 ml-lg-5">
						<div class="card shadow">
							<div class="card-body">
								<h5 class="mb-3 text-center">Book Our Spa</h5>
								<form action="#" method="post">						
									<div class="form-style-w3layout">
										<div class="custom-control custom-switch" style="padding-bottom: 10px">
											<input type="checkbox" class="custom-control-input" id="customSwitch1">
											<label class="custom-control-label" for="customSwitch1">Kategori lainnya</label>
										</div>
										<div class="row">	
											<div class="col-md-6">
												<div class="input-container">
													<i class="glyphicon glyphicon-backward icon">a</i>
													<input placeholder="Kategori" name="kategori" type="text" required="">
												</div>
											</div>	
											<div class="col-md-6">
												<div class="input-container">
													<i class="fa fa-envelope icon"></i>
													<input placeholder="Sub Kategori" name="subkategori" type="text" required="">
												</div>
											</div>
										</div>
										<div class="row" id="form2" style="display: none">	
											<div class="col-md-6">
												<div class="input-container">
													<i class="glyphicon glyphicon-backward icon">a</i>
													<input placeholder="Kategori" name="kategori" type="text" required="">
												</div>
											</div>	
											<div class="col-md-6">
												<div class="input-container">
													<i class="fa fa-envelope icon"></i>
													<input placeholder="Sub Kategori" name="subkategori" type="text" required="">
												</div>
											</div>	
										</div>	
										<br>
										<div class="row">
											<div class="col-md-6">
												<div class="input-container">
													<i class="fa fa-envelope icon"></i>
													<input placeholder="Sesi" name="sesi" type="text" required="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-container">
													<i class="fa fa-envelope icon"></i>
													<input placeholder="Tanggal" name="tgl" type="text" required="">
												</div>
											</div>
										</div>
										<br>
										<button Class="btn" style="border-radius: 30px;">Book</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
<section class="some-content py-5" id="about">
	<div class="container py-md-5">
		<div class="row about-vv-top mt-2">
			<div class="col-lg-6 about-info">
				<h4 class="title-hny  mb-md-5">Manfaat Baby Spa untuk Melatih Motorik Bayi</h4>
				<p>Baby spa atau pijat bayi saat ini sudah semakin populer. Banyak para Bunda yang rutin mengajak buah hatinya ke baby spa untuk mendapatkan berbagai treatment terbaik. Namun, baby spa hanya diperbolehkan jika berat badan Si Kecil sudah mencapai 5kg, lho.  Selain mengasyikan, kegiatan yang mencakup renang dan pijat ini tentunya memiliki berbagai manfaat untuk Si Kecil. Salah satunya dapat merangsang gerak motoriknya.</p>
				<div class="read-more-button mt-4">
					<a href="index.html" class="read-more btn">Read More </a>
				</div>

			</div>
			<div class="col-lg-6 about-img mt-md-4 mt-sm-4">
				<img src="<?php echo base_url();?>assets/user/images/b8.jpg" class="img-fluid" alt="">
			</div>

		</div>
	</div>
</section>
<!-- //banner-bottom-->
<!-- services -->
<section class="services py-5" id="services">
	<div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">Our Services</h3>
		<div class="row service-grid-grids text-center">
			<div class="col-lg-4 col-md-6 service-grid service-grid1 mb-4">
				<div class="service-icon">
					<span class="fa fa-h-square"></span>
				</div>
				<h4 class="mt-3">Baby</h4>
				<hr width="50%">
				<p class="mt-3"></p>
				<div class="read-more-button mt-4">
					<a href="index.html" class="read-more btn">Read More </a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 service-grid service-grid2 mb-4">
				<div class="service-icon">
					<span class="fa fa-glide-g"></span>
				</div>
				<h4 class="mt-3">Mom</h4>
				<hr width="50%">
				<p class="mt-3"></p>
				<div class="read-more-button mt-4">
					<a href="index.html" class="read-more btn">Read More </a>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 service-grid service-grid3 mb-4">
				<div class="service-icon">
					<span class="fa fa-fighter-jet"></span>
				</div>
				<h4 class="mt-3">Konselor</h4>
				<hr width="50%">
				<p class="mt-3">Perspiciatis unde omnis iste natus doloret ipsum volupte ut accusal ntium dolor remque laudantium, totam dolor.</p>
				<div class="read-more-button mt-4">
					<a href="index.html" class="read-more btn">Read More </a>
				</div>
			</div>
		</div>
	</div>		
</section>
<!-- //services -->
<!-- Team  -->
<section class="team py-5" id="team">
	<div class="container py-md-5">
		<div>
			<h3 class="heading text-center mb-3 mb-sm-5">Our Terapis</h3>
		</div>
		<div class="row">
			<?php foreach($trps as $key => $value):  ?>
				<div class="team-grid col-lg-3 col-sm-6 mb-5">
					<img src="<?php echo base_url()?>/assets/upload/<?php echo $value->foto?>" class="" alt="" />
					<div class="team-info text-center">
						<h3 class="e"><?php echo $value->full_name ?></h3>
						<span class=""><?php echo $value->alamat?></span>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<!-- //Team -->

<!-- Gallery -->
<section class="gallery py-5" id="gallery">
	<div class="container py-md-5">
		<div class="header mb-3 mb-sm-5 text-center">
			<h3 class="heading text-center mb-3 mb-sm-5">Mamina Gallery</h3>
			<div class="row news-grids text-center">
				<div class="col-md-4 gal-img">
					<a href="#baby1"><img src="<?php echo base_url();?>assets/user/images/b1.png" alt="news image" class="img-fluid"><span>Testimoni</span></a>
					<a href="#baby2"><img src="<?php echo base_url();?>assets/user/images/b2.png" alt="news image" class="img-fluid"><span>Testimoni</span></a>

				</div>

				<div class="col-md-4 gal-img">
					<a href="#baby3"><img src="<?php echo base_url();?>assets/user/images/b4.png" alt="news image" class="img-fluid"><span>Testimoni</span></a>
					<a href="#baby4"><img src="<?php echo base_url();?>assets/user/images/b5.png" alt="news image" class="img-fluid"><span>Testimoni</span></a>
				</div>
				<div class="col-md-4 gal-img">
					<a href="#baby5"><img src="<?php echo base_url();?>assets/user/images/b6.jpg" alt="news image" class="img-fluid"><span>Testimoni</span></a>
					<a href="#baby6"><img src="<?php echo base_url();?>assets/user/images/b7.png" alt="news image" class="img-fluid"><span>Testimoni</span></a>
				</div>
			</div>
		</div>
		<!-- popup-->
		<div id="baby1" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b1.png" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">𝙉𝙮𝙖𝙢𝙖𝙣𝙣𝙮𝙖.. 𝙙𝙖𝙥𝙖𝙩𝙠𝙖𝙣 𝙡𝙖𝙮𝙖𝙣𝙖𝙣 𝙠𝙖𝙢𝙞 𝙙𝙞 𝙧𝙪𝙢𝙖𝙝 𝙢𝙖𝙢𝙖</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup -->

		<!-- popup-->
		<div id="baby2" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b2.png" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">𝑶𝒑𝒕𝒊𝒎𝒂𝒍𝒌𝒂𝒏 𝒎𝒐𝒕𝒐𝒓𝒊𝒌 𝒅𝒂𝒏 𝒃𝒐𝒏𝒅𝒊𝒏𝒈 𝒃𝒂𝒃𝒚 𝒅𝒂𝒏 𝒎𝒂𝒎𝒂 𝒑𝒂𝒑𝒂 𝒅𝒆𝒏𝒈𝒂𝒏 𝒃𝒂𝒃𝒚 𝒔𝒑𝒂</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup -->
		<!-- popup-->
		<div id="baby3" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b4.png" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Dukungan keluarga terdekat, merupakan booster terbaik untuk bayi dan mama</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup3 -->
		<!-- popup-->
		<div id="baby4" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b5.png" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Apapun pilihanmu, mama Kami akan dukung. Kami hanya bisa memberikan apa yang kami rasa tahu dan apa yang kami rasa terbaik untuk bayi mama .</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup -->
		<!-- popup-->
		<div id="baby5" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b6.jpg" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Waaah... Just keep swimming ya!</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup -->
		<!-- popup-->
		<div id="baby6" class="pop-overlay animate">
			<div class="popup">
				<img src="<?php echo base_url();?>assets/user/images/b7.png" alt="Popup Image" class="img-fluid" />
				<p class="mt-4">Perjuangan mengasihi takkan sebanding dengan berapa kaleng susu yang sudah kamu persiapkan untuk bayimu kelak. Perjuangkan seoptimal yang kamu bisa. Bayimu, berhak atas asi yang ada didalammu.</p>
				<a class="close" href="#gallery">&times;</a>
			</div>
		</div>
		<!-- //popup -->
	</div>
</section>
<!--// gallery -->

<!-- destinations -->
<section class="destinations py-5" id="destinations">
	<div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">Tour Prices</h3>
		<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">China</h4>
				<div class="image-position position-relative">
					<img src="<?php echo base_url();?>assets/user/images/p1.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-usd"></span>1000</li>

						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>China</h4>
						<a href="#contact">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Malaysia</h4>
				<div class="image-position position-relative">
					<img src="<?php echo base_url();?>assets/user/images/p2.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-usd"></span>1100</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Malaysia</h4>
						<a href="#contact">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Japan</h4>
				<div class="image-position position-relative">
					<img src="<?php echo base_url();?>assets/user/images/p3.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-usd"></span>1200</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Japan</h4>
						<a href="#contact">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Singapore</h4>
				<div class="image-position position-relative">
					<img src="<?php echo base_url();?>assets/user/images/p4.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-usd"></span>1300</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Singapore</h4>
						<a href="#contact">Book Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- destinations -->
<!--/testimonials -->
<section class="testimonials py-5" id="testimonials">
	<div class="container py-md-5">
		<h3 class="heading heading1 text-center mb-3 mb-sm-5"> Client Reviews</h3>
		<div class="row">
			<div class="col-lg-4 col-sm-6 test-info text-left mb-4">
				<p><span class="fa fa-quote-left"></span> Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.Nulla non laoreet eleifend. <span class="fa fa-quote-right"></span></p>
				<div class="test-img text-right mb-3">
					<img src="<?php echo base_url();?>assets/user/images/te1.jpg" class="img-fluid" alt="user-image">
				</div>
				<h3 class="my-md-2 my-3 text-right">Jenifer Burns</h3>


			</div>
			<div class="col-lg-4 col-sm-6 test-info text-left mb-4">
				<p><span class="fa fa-quote-left"></span> Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.Nulla non laoreet eleifend. <span class="fa fa-quote-right"></span></p>

				<div class="test-img text-right mb-3">
					<img src="<?php echo base_url();?>assets/user/images/te2.jpg" class="img-fluid" alt="user-image">
				</div>
				<h3 class="my-md-2 my-3 text-right"> Abraham Smith</h3>


			</div>
			<div class="col-lg-4 col-sm-6 test-info text-left gap1 mb-4">
				<p><span class="fa fa-quote-left"></span> Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis.Nulla non laoreet eleifend. <span class="fa fa-quote-right"></span></p>
				<div class="test-img text-right mb-3">
					<img src="<?php echo base_url();?>assets/user/images/te3.jpg" class="img-fluid" alt="user-image">
				</div>
				<h3 class="my-md-2 my-3 text-right">Jenifer Burns</h3>

			</div>
		</div>
	</div>
</section>
<!--//testimonials -->
<!-- Contact -->
<section class="contact py-5" id="contact">
	<div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5"> Get In Touch with us</h3>
		<ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">
			<li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
				<div class=" adress-icon">
					<span class="fa fa-map-marker"></span>
				</div>

				<h6>Location</h6>
				<p>MALANG</p>

			</li>

			<li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
				<div class="adress-icon">
					<span class="fa fa-envelope-open-o"></span>
				</div>
				<h6>Phone & Email</h6>
                   <!--- <p>0895391501373</p> --->
                    <a href="https://api.whatsapp.com/send?phone=62895391501373&text=Halo%20Mamina%20Saya%20Mau%20Reservasi%20Massage" class="glyphicon-phone">0895391501373</a>
                    <a href="https://mail.google.com" class="mail">hestidianarps@gmail.com</a>
                </li>
				 <li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
                    <div class="adress-icon">
                        <span class="fa fa-building"></span>
                    </div>
                    <!---<h6>our branches</h6>
                    <p>india</p>
                    <p>china</p>-->

                </li>
            </ul>

            <div class="contact-grids mt-5">
            	<div class="row">
            		<div class="col-lg-6 col-md-6 contact-left-form">
            			<form action="#" method="post">
            				<div class=" form-group contact-forms">
            					<input type="text" class="form-control" placeholder="Name" required="">
            				</div>
            				<div class="form-group contact-forms">
            					<input type="email" class="form-control" placeholder="Email" required="">
            				</div>
            				<div class="form-group contact-forms">
            					<input type="text" class="form-control" placeholder="Phone" required=""> 
            				</div>
            				<div class="form-group contact-forms">
            					<textarea class="form-control" placeholder="Message" rows="3" required=""></textarea>
            				</div>
            				<button class="btn btn-block sent-butnn">Send</button>
            			</form>
            		</div>
            		<div class="col-lg-6 col-md-6 contact-right pl-lg-5">
            			<img src="<?php echo base_url();?>assets/user/images/c1.jpg" class="img-fluid" alt="user-image">

            		</div>
            	</div>
            </div>
        </div>
    </section>
    <!-- //Contact -->
    <!-- map -->	
    <div class="map p-2">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126438.2854809817!2d112.56174164505262!3d-7.978639465170192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822063dc2fb%3A0x78879446481a4da2!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1568126843831!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- //map -->

    <!-- //contact us -->