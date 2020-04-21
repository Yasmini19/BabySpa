
<!-- banner -->
<div class="banner" id="home" style="padding-top: 6%;max-height: 697px">
	<div class="layer">
		<div class="container-fluid">
			<div class="row" style="padding-left: 1%; padding-right: 1%">
				<div class="col-md-6 banner-text-w3ls"></div>
				<!-- banner slider-->
				<div class="col-md-6 px-lg-3 px-0">
					<div class="banner-form-w3 ml-lg-5">
						<div class="card shadow">
							<div class="card-body">
								<h5 class="mb-3 text-center">Reservasi Layanan</h5>
								<form method="post" id="inputReservation" accept-charset="utf-8" action="<?= site_url() ?>/User/addReservation">						
									<div class="form-style-w3layout">
										<div class="custom-control custom-switch" style="padding-bottom: 10px">
											<input type="checkbox" class="custom-control-input" id="customSwitch1">
											<label class="custom-control-label" for="customSwitch1">Kategori lainnya</label>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="input-container">
													<!-- <i class="fa fa-envelope icon"></i> -->
													<input placeholder="Tanggal" name="tanggal" type="text" required="" class="reset" autocomplete="off" id="datepicker1">
												</div>
											</div>
											<div class="col-md-8">
												<div class="input-container">
													<!-- <i class="fa fa-envelope icon"></i> -->
													<select id="sesi" name="sesi" class="js-example-basic-single" required>
														<option value="-">Pilih Sesi</option>
														<?php foreach ($this->db->get('sesi_reservasi')->result() as $key => $value): ?>
															<option value="<?= $value->id_sesi ?>"
																data-json='<?php echo json_encode($value) ?>' data-sesi="<?= $value->waktu ?>"><?= $value->waktu ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-4">
													<div class="input-container">
														<!-- <i class="glyphicon glyphicon-backward icon">a</i> -->
														<!-- <input placeholder="Kategori" name="kategori" type="text" required=""> -->
														<select id="kategori" name="kategori" class="js-example-basic-single" required>
															<option value="-" selected disabled>Pilih Kategori</option>
															<?php foreach ($this->db->get('kategori')->result() as $key => $value): ?>
																<option value="<?= $value->id_kategori ?>"
																	data-json='<?php echo json_encode($value) ?>'  data-kat ="<?= $value->judul_kat?>"><?= $value->judul_kat ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>	
													<div class="col-md-5">
														<div class="input-container">
															<!-- <i class="fa fa-envelope icon"></i> -->
															<select id="sub_kategori0" name="sub_kategori0" class="js-example-basic-single" required>
																<option value="-" selected disabled>Pilih Sub-Kategori</option>
																<?php foreach ($this->db->get('sub_kategori')->result() as $key => $value): ?>
																	<option value="<?= $value->id_sub_kategori ?>"
																		data-json='<?php echo json_encode($value) ?>' data-harga ="<?= $value->harga?>" data-sub ="<?= $value->judul_sub ?>"><?= $value->judul_sub ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="input-container">
																<!-- <i class="fa fa-envelope icon"></i> -->
																<input placeholder="Jumlah" name="jumlah0" id="jumlah0" type="number" class="reset" required=""
																max="2">
															</div>
														</div>
													</div>
													<div class="row" id="form2" style="display: none; padding-bottom: 20px">	
														<div class="col-md-4">
															<div class="input-container">
																<!-- <i class="glyphicon glyphicon-backward icon">a</i> -->
																<!-- <input placeholder="Kategori" name="kategori" type="text" required=""> -->
																<select id="kategori1" name="kategori1" class="js-example-basic-single">
																	<option value="-" selected disabled>Pilih Kategori</option>
																	<?php foreach ($this->db->get('kategori')->result() as $key => $value): ?>
																		<option value="<?= $value->id_kategori ?>"
																			data-json='<?php echo json_encode($value) ?>' data-kat ="<?= $value->judul_kat?>"><?= $value->judul_kat ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>	
															<div class="col-md-5">
																<div class="input-container">
																	<!-- <i class="fa fa-envelope icon"></i> -->
																	<select id="sub_kategori1" name="sub_kategori1" class="js-example-basic-single">
																		<option value="-" selected disabled>Pilih Sub-Kategori</option>
																		<?php foreach ($this->db->get('sub_kategori')->result() as $key => $value): ?>
																			<option value="<?= $value->id_sub_kategori ?>"
																				data-json='<?php echo json_encode($value) ?>' data-harga ="<?= $value->harga?>" data-sub ="<?= $value->judul_sub ?>"><?= $value->judul_sub ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input-container">
																		<!-- <i class="fa fa-envelope icon"></i> -->
																		<input placeholder="Jumlah" id="jumlah1" name="jumlah1" class="reset" type="number" max="2">
																	</div>
																</div>
																<br><br>	
															</div>											

															<button type="submit" Class="btn" style="border-radius: 30px;">Pesan Sekarang</button>
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
					<section class="some-content py-5" id="about" style="height:686px">
						<div class="container py-md-5">
							<div id="carousel-slider">
								<?php 
								$no = 1;
								foreach ($berita as $key) {?>
								<div style="padding-left: 10px; padding-right: 10px; padding-bottom: 5px; padding-top: 5px">
									<div class="row about-vv-top mt-2">
										<div class="col-lg-6 about-info">
											<h4 class="title-hny  mb-md-5"><?= $key->judul_berita;?></h4>
											<p><?= substr($key->deskripsi, 0, 450) . '...';?></p>
											<div class="read-more-button mt-4">
												<a href="<?php echo site_url()?>/User/DetailBeritaUser/<?= $key->id_berita?>" class="read-more btn">Read More </a>
											</div>
										</div>
										<div class="col-lg-6 about-img mt-md-4 mt-sm-4">
											<img src="<?php echo base_url();?>assets/user/images/<?php echo $key->foto_berita;?>" class="img-fluid" alt="">
										</div>
									</div>
								</div>
								<?php $no++; } ?>
							</div>
						</a>
					</div>
				</section>
				<!-- //banner-bottom-->
				<!-- services -->
				<section class="services py-5" id="services">
					<div class="container py-md-5">
						<h3 class="heading text-center mb-3 mb-sm-5">Layanan Kami</h3>
						<div class="row service-grid-grids text-center">

							<?php foreach ($service as $key => $value) : ?>
								<div class="col-lg-4 col-md-6 service-grid service-grid3 mb-4">
									<h4 class="mt-3"><?php echo $value->judul_kat ?></h4>
									<hr width="50%">
									<p class="mt-3"><?php echo substr($value->keterangan_kat, 0, 200) . '...'; ?></p>
									<div class="read-more-button mt-4">
										<a href="<?= site_url()?>/User/DetailKategoriUser/<?= $value->id_kategori?>" class="read-more btn">Read More </a>
									</div>
								</div>
							<?php endforeach?>
						</div>
					</div>		
				</section>
				<!-- //services -->
				<!-- Team  -->
				<section class="team py-5" id="team" style="height: 665px">
					<div class="container py-md-5">
						<div>
							<h3 class="heading text-center mb-3 mb-sm-5">Terapis Kami</h3>
						</div>
						<div class="row">
							<?php foreach($trps as $key => $value):  ?>
								<div class="team-grid col-lg-3 col-sm-6 mb-5">
									<div style="min-height: 250px; max-height: 250px; min-width: 200px; max-width: 200px">
										<img src="<?php echo base_url()?>/assets/upload/<?php echo $value->foto;?>" class="" alt="" style="border: 5px solid #fff; border-radius: 100%;"/>
									</div>
									<br>
									<div class="team-info text-center"  style="background: #fff ;border: 5px solid #737373;border-radius: 10px;">
										<h3 class="e" style="color: #35405a"><?php echo $value->full_name;?></h3>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</section>
				<!-- //Team -->
				<!-- destinations -->
				<section class="destinations py-5" id="destinations">
					<div class="container py-md-5">
						<h3 class="heading text-center mb-3 mb-sm-5">Harga Layanan Kami</h3>

						<div class="row justify-content-center">
							<div class="col-11">
								<nav class="nav nav-pills flex-column flex-sm-row" role="tablist" id="myTabs">
									<?php 
									$no = 1;
									foreach ($service as $key) {?>
									<a class="flex-sm-fill text-sm-center nav-link <?php if($no==1){ echo "active";}?>" href="#<?= $key->id_kategori;?>" role="tab"><?= $key->judul_kat;?></a>
									<?php 
									$no++;
								}?> 
							</nav>
							<div class="tab-content mt-2" id="tabContent">
								<br>
								<div class="tab-pane" id="2" role="tabpanel">
									<div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner">
											<?php 
											$no = 0;
											foreach($subkategori2 as $key => $value):  ?>
											<?php if ($no == 0){?>
											<div class="carousel-item active">
												<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
													<?php }else if($no !=0 && $no % 4 == 0){?>
													<div class="carousel-item">
														<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
															<?php }?>
															<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
																<div class="card mb-2">
																	<img class="card-img-top"
																	src="<?php echo base_url();?>assets/user/images/<?php echo $value->foto_sub?>"
																	alt="Card image cap" width="200" height="200">
																	<div class="card-body">
																		<h5 class="card-title"><?php echo $value->judul_sub?></h5>
																		<p class="card-text"><?php echo $value->judul_kat?></p>
																		<p><b>Harga : <br><?php echo "Rp " . number_format($value->harga, 2, ",", ".");?></b></p>
																	</div>
																</div>
															</div>
															<?php if ($no != 0 && $no % 4 == 3){?>
														</div>
													</div>
													<?php } $no++;?>
												<?php endforeach ?>
											</div>
										</div>
									</div>

										<!-- <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only" style="background-color: black">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a> -->
									</div>
								</div>

								<div class="tab-pane" id="3" role="tabpanel">
									<div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner">
											<?php 
											$no = 0;
											foreach($subkategori3 as $key => $value):  ?>
											<?php if ($no == 0){?>
											<div class="carousel-item active">
												<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
													<?php }else if($no !=0 && $no % 4 == 0){?>
													<div class="carousel-item">
														<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
															<?php }?>
															<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
																<div class="card mb-2">
																	<img class="card-img-top"
																	src="<?php echo base_url();?>assets/user/images/<?php echo $value->foto_sub?>"
																	alt="Card image cap" width="200" height="200">
																	<div class="card-body">
																		<h5 class="card-title"><?php echo $value->judul_sub?></h5>
																		<p class="card-text"><?php echo $value->judul_kat?></p>
																		<p><b>Harga : <br><?php echo "Rp " . number_format($value->harga, 2, ",", ".");?></b></p>
																	</div>
																</div>
															</div>
															<?php if ($no != 0 && $no % 4 == 3){?>
														</div>
													</div>
													<?php } $no++;?>
												<?php endforeach ?>
											</div>
										</div>
										
										<!-- <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a> -->
									</div>
								</div>
							</div>

							<div class="tab-pane active" id="1" role="tabpanel">
								<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<?php 
										$no = 0;
										foreach($subkategori1 as $key => $value):  ?>
										<?php if ($no == 0){?>
										<div class="carousel-item active">
											<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
												<?php }else if($no !=0 && $no % 4 == 0){?>
												<div class="carousel-item">
													<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
														<?php }?>
														<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
															<div class="card mb-2">
																<img class="card-img-top"
																src="<?php echo base_url();?>assets/user/images/<?php echo $value->foto_sub?>"
																alt="Card image cap" width="200" height="200">
																<div class="card-body">
																	<h5 class="card-title"><?php echo $value->judul_sub?></h5>
																	<p class="card-text"><?php echo $value->judul_kat?></p>
																	<p><b>Harga : <br><?php echo "Rp " . number_format($value->harga, 2, ",", ".");?></b></p>
																</div>
															</div>
														</div>
														<?php if ($no != 0 && $no % 4 == 3){?>
													</div>
												</div>
												<?php } $no++;?>
											<?php endforeach ?>
										</div>
									</div>

										<!-- <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only btn-secondary">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only btn-secondary">Next</span>
										</a> -->
									</div>
								</div>
							</div>





						</div>
					</div>
				</div>
			</div>


		</section>
		<!-- destinations -->
		<!--/testimonials -->
							<!-- <section class="testimonials py-5" id="testimonials">
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
							</section> -->
							<!--//testimonials -->
							<!-- Contact -->
							<section class="contact py-5" id="contact">
								<div class="container py-md-5">
									<h3 class="heading text-center mb-3 mb-sm-5"> Hubungi Kami</h3>
									<ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">
										<li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
											<div class=" adress-icon">
												<span class="fa fa-map-marker"></span>
											</div>

											<h6>Lokasi</h6>
											<?php foreach($loc as $key => $value):  ?>
												<p><?php echo $value->keterangan?></p>
											<?php endforeach ?>

										</li>

										<li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
											<div class="adress-icon">
												<span class="fa fa-envelope-open-o"></span>
											</div>
											<h6>Telepon & Email</h6>
											<?php foreach($phone as $key => $value):  ?>
												<p><?php echo $value->keterangan?></p>
											<?php endforeach ?>

											<?php foreach($email as $key => $value):  ?>
												<p><?php echo $value->keterangan?></p>
											<?php endforeach ?>
										</li>
										<li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
											<div class="adress-icon">
												<span class="fa fa-building"></span>
											</div>
											<h6>Social Media</h6>
											<?php foreach($socmed as $key => $value):  ?>
												<p><?php echo $value->keterangan?></p>
											<?php endforeach ?>             
										</li>
									</ul>
								</div>
							</section>
							<!-- //Contact -->
							<!-- map -->	
							<div class="map p-2">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3547541415846!2d112.66413601415638!3d-7.962241781554421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6290f9428769f%3A0x4684b75b7086a28e!2sMamina%20Mother%20and%20Baby%20Spa!5e0!3m2!1sid!2sid!4v1570679764313!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							</div>
							<!-- //map -->

							<!-- //contact us -->

							<script type="text/javascript">
								$(document).ready(function () {
									var sesi = "";
									$('#datepicker1').datepicker({
										format: "dd-mm-yyyy",
										autoclose:true
									});

									$('#datepicker1').on('changeDate', function(){
										var tgl=$(this).val();
										$.ajax({
											url : "<?php echo site_url('User/get_sesiuser');?>",
											method : "POST",
											data : {tgl: tgl},
											dataType : 'json',
											success: function(data){
												 //alert(JSON.stringify(data[0]));
												//$('#sesi').children('option:not(:first)').remove();
												var html = '<option selected disabled>Pilih Sesi</option>';
												var i;
												
												for(i=0; i< data.length; i++){
													if(data[i].jml < data[i].jml_terapis){
														html += '<option value="'+data[i].id_sesi+'" data-sesi="'+data[i].waktu+'">'+data[i].waktu+'</option>';
														//alert(data.id_sesi);
													}if(data[i].jml == data[i].jml_terapis){
														html += '<option value="'+data[i].id_sesi+'" disabled>'+data[i].waktu+' (tidak tersedia)</option>';
													}
												}
												$('#sesi').html(html);
											}
										});
									});

									$('#kategori').change(function(){
										var id=$(this).val();
										$.ajax({
											url : "<?php echo site_url('User/get_subkategori');?>",
											method : "POST",
											data : {id: id},
											dataType : 'json',
											success: function(data){
												var html = '<option selected disabled>Pilih Sub-Kategori</option>';
												var i;
												//alert(data);
												for(i=0; i<data.length; i++){
													html += '<option value="'+data[i].id_sub_kategori+'" data-sub="'+data[i].judul_sub+'" data-harga="'+data[i].harga+'">'+data[i].judul_sub+'</option>';

												}
												$('#sub_kategori0').html(html);

											}
										});
									});

									$('#kategori1').change(function(){
										var id=$(this).val();
										$.ajax({
											url : "<?php echo site_url('User/get_subkategori');?>",
											method : "POST",
											data : {id: id},
											dataType : 'json',
											success: function(data){
												var html = '<option selected disabled>Pilih Sub-Kategori</option>';
												var i;
												//alert(data.length);
												for(i=0; i<data.length; i++){
													html += '<option value="'+data[i].id_sub_kategori+'" data-sub="'+data[i].judul_sub+'" data-harga="'+data[i].harga+'">'+data[i].judul_sub+'</option>';

												}
												$('#sub_kategori1').html(html);
											}
										});
									});

									// $('form#inputReservation').submit(function(e){
									// 	e.preventDefault();
									// 	var formData = new FormData(this);
									// 	var url = $(this).attr('action');
									// 	$.ajax({
									// 		url : url,
									// 		type : "POST",
									// 		data: formData,
									// 		success : function (data){

									// 			if(data == 'true'){
									// 				//alert(data);
									// 				var q = "yass";
									// 				swal({
									// 					title: "Success",
									// 					type:"success",
									// 					text: q,
									// 					timer: 2000,
									// 					showConfirmButton: false
									// 				});

									// 				reset();
									// 			}else{
									// 				window.location.href="<?php echo site_url('Login') ?>";
									// 			}
									// 		},
									// 		cache : false,
									// 		contentType : false,
									// 		processData : false,
									// 	})
									// });
									// $('#sesi').change(function(){
									// 	sesi += $(this).find(":selected").attr('data-sesi');

									// 	alert(sesi);

									// });

									$('form#inputReservation').submit(function(e){
										e.preventDefault();
										var formData = new FormData(this);
										var url = $(this).attr('action');

										var tgl 		= $("#datepicker1").val();
										var sesi 		= $("#sesi").find(":selected").data('sesi');
										var layanan0 	= $("#sub_kategori0").find(":selected").data('sub') +' ('+ $("#kategori").find(":selected").data('kat') +')';
										var harga0 		= $("#sub_kategori0").find(":selected").data('harga');
										var jumlah0		= $("#jumlah0").val();

										var layanan1 	= '';
										var harga1 		= '';
										var jumlah1		= '';

										var teks = '<div id="detail" style="padding-top:20px"><p> Pemesanan tanggal <b>'+tgl+'</b>, pada sesi <b>'+sesi+'</b></p><br><p>Layanan :</p><p>'+layanan0+' : Rp. '+harga0+' x '+jumlah0+' (orang)</p>';

										if($("#jumlah1").val() != ''){
											var layanan1 	= $("#sub_kategori1").find(":selected").data('sub') +' ('+ $("#kategori1").find(":selected").data('kat') +')';
											var harga1 		= $("#sub_kategori1").find(":selected").data('harga');
											var jumlah1		= $("#jumlah1").val();

											teks += '<p>'+layanan1+' : Rp. '+harga1+' x '+jumlah1+' (orang)</p>';
										}

										var harga = (Number(harga0) * Number(jumlah0)) + (Number(harga1) * Number(jumlah1));


										teks += '<br><hr><p> Total : <b>Rp. '+harga+'</b></p><br></div>';


										swal({
											html : true,
											title: "<h5>Apakah ingin melanjutkan pemesanan?</h5>",
											text: teks,
											showCancelButton: true,
											confirmButtonClass: "btn-success",
											confirmButtonText: "Iya",
											cancelButtonClass: "btn btn-outline-warning",
											cancelButtonText: "Tidak",
											closeOnConfirm: false,
											closeOnCancel: false
										},
										function(isConfirm){
											if (isConfirm) {
												$.ajax({
													url: url,
													type: 'post',
													data: formData,
													success: function (data) {
														if(data == 'true'){
															swal({
																title: "Pemesanan Berhasil",
																type:"success",
																timer: 2000,
																showConfirmButton: false
															});

															reset();
														}else{
															swal({
																title: "Harus Login Terlebih dahulu",
																type:"warning",
																timer: 2000,
																showConfirmButton: false
															},function(){ 
																window.location.href = "<?php echo site_url('Login') ?>";
															});
														}	
													},
													cache : false,
													contentType : false,
													processData : false,
													error: function (data) {
														swal(data.responseText);
													}                    
												});
											}else{
												swal({
													title: "Pemesanan dibatalkan",
													type:"error",
													timer: 2000,
													showConfirmButton: false
												});
												reset();
											}
										});
									});

									function reset() {
										var a = document.getElementsByClassName('reset');
								        // a = HTMLCollection
								        // console.log(a);
								        // You can iterate over HTMLCollection.
								        for (var i = 0; i < a.length; i++) {
								            // You can set the value in every item in the HTMLCollection.
								            a[i].value = "";
								        }
								        $("#kategori").prop('selectedIndex',0);
								        $("#kategori1").prop('selectedIndex',0);
								        $("#sub_kategori0").prop('selectedIndex',0);
								        $("#sub_kategori1").prop('selectedIndex',0);
								        $("#sesi").prop('selectedIndex',0);
								    };

								    $("#carousel-slider").slick({
								    	arrows: true,
								    	infinite: true,
								    	slidesToShow: 1,
								    	slidesToScroll: 1,
								    	autoplay: true,
								    	autoplaySpeed: 5000,
								    	mobileFirst: true
								    });


								});
							</script>
							<script type="text/javascript">
								jQuery(document).ready(function() {

									let activeTab = $('#myTabs a').filter('.active');

									$('#myTabs a').click(function(e) {
										e.preventDefault();

										activeTab.removeClass('active');
										$(activeTab.attr('href')).removeClass('active');

										activeTab = $(this);

										activeTab.addClass("active");
										$(activeTab.attr('href')).addClass('active');
									});
								});
							</script>


