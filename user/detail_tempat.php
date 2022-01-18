<?php 
$datax = mysqli_query($koneksi,"SELECT * FROM tempat_olahraga WHERE kode_tempat='$_GET[kode]'");
$dat=mysqli_fetch_array($datax);
$kd = $dat['kode_tempat'];
?>

<!--Page Title-->
<section class="page-title" style="background-image:url(assets/images/background/11.jpg)">
	<div class="auto-container">
		<div class="clearfix">
			<div class="pull-left">
				<h2>Detail</h2>
				<div class="text">Tempat Olahraga</div>
			</div>
			<div class="pull-right">
				<ul class="page-breadcrumb">
					<li><a href="index.html">home</a></li>
					<li>Detail</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!--End Page Title-->

<!-- Sidebar Cart Item -->
<div class="xs-sidebar-group info-group">
	<div class="xs-overlay xs-bg-black"></div>
	<div class="xs-sidebar-widget">
		<div class="sidebar-widget-container">
			<div class="widget-heading">
				<a href="#" class="close-side-widget">
					X
				</a>
			</div>
			<div class="sidebar-textwidget">

				<!-- Sidebar Info Content -->
				<div class="sidebar-info-contents">
					<div class="content-inner">
						<div class="logo">
							<!-- <a href="index.html"><img src="images/logo.png" alt="" /></a> -->
						</div>
						<div class="content-box">
							<h2>About Us</h2>
							<p class="text">The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review point you’ll end up reviewing and negotiating the content itself and not the design.</p>
							<a href="#" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
						</div>
						<div class="contact-info">
							<h2>Contact Info</h2>
							<ul class="list-style-one">
								<li><span class="icon fa fa-location-arrow"></span>Chicago 12, Melborne City, USA</li>
								<li><span class="icon fa fa-phone"></span>(111) 111-111-1111</li>
								<li><span class="icon fa fa-envelope"></span>Gym@gmail.com</li>
								<li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
							</ul>
						</div>
						<!-- Social Box -->
						<ul class="social-box">
							<li class="facebook"><a href="#" class="fa fa-facebook-f"></a></li>
							<li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
							<li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
							<li class="instagram"><a href="#" class="fa fa-instagram"></a></li>
							<li class="youtube"><a href="#" class="fa fa-youtube"></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- END sidebar widget item -->
<style type="text/css">
	.box-slider{
		position: relative;
	}
	.carousel-outer .naf-bottom{
		position: relative;
		width: 50%;
		margin: 20px auto 0 auto;
	}
	.bottom-item{
		opacity: 1;
	}
	.bottom-item img{
		opacity: 1;
	}
	.slick-prev{
		position: absolute;
		top: 50%;
		left: 5%;
		background: #111 !important;
		width: 35px;
		height: 35px;
		display: flex;
		align-items: center;
		justify-content: center;
		z-index: 9;
		border-radius: 5px;
	}
	.slick-prev:hover,
	.slick-prev:focus,
	.slick-next:hover,
	.slick-next:focus{
		background: rgba(0,0,0, 0.3)!important;
	}
	.slick-next{
		position: absolute;
		top: 50%;
		right: 5%;
		background: #111 !important;
		width: 35px;
		height: 35px;
		display: flex;
		align-items: center;
		justify-content: center;
		z-index: 9;
		border-radius: 5px;
	}

</style>
<!--Shop Single Section-->
<section class="shop-single-section">
	<div class="auto-container">

		<!--Shop Single-->
		<div class="shop-page product-details">

			<!--Basic Details-->
			<div class="basic-details">
				<div class="row clearfix">
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="box-slider">
							<div class="naf-for">
								<?php
								$mys = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN gambar_tempat USING(kode_tempat) WHERE tempat_olahraga.kode_tempat='$kd'");
								while ($datax = mysqli_fetch_array($mys)) {
									$kode = $datax['kode_tempat'];

								?>
								<div class="nav-item">
										<img src="admin/tempat_olahraga/gambar/<?php echo $datax['gambar']; ?>" alt="" style="width: 100%;height: 500px; padding: 10px;border-radius: 15px;"> 
									</div>
								<?php } ?>
							</div>

							<div class="naf-bottom">
								<?php

								$mysql = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN gambar_tempat USING(kode_tempat) WHERE tempat_olahraga.kode_tempat='$kode'");
								while ($data = mysqli_fetch_array($mysql)) {
									
								?>
									<div class="bottom-item">
										<img src="admin/tempat_olahraga/gambar/<?php echo $data['gambar'] ?>" alt="" style="height: 150px;display: none;"> 
									</div>
								<?php } ?>
							</div>

						</div>
					</div>

					<!--Info Column-->
					<div class="info-column col-lg-6 col-md-12 col-sm-12">
						<div class="details-header">
							<h2><?php echo $dat['nama_tempat'] ?></h2>
							<?php 
							$sqlrating=mysqli_query($koneksi,"SELECT AVG(rating.rate) AS totalRating FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat WHERE rating.kode_tempat='$kd'");
							$dataRating = mysqli_fetch_array($sqlrating);
							$rating = round($dataRating['totalRating'],2);

							?>
							<div class="rating">
								<?php if ($rating == 0) {
									echo '<i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i>';
								}else{
									for ($i=0; $i < $rating; $i++){
										echo'<span style="font-size:25px"><i class="fa fa-star"></i></span>';
									}
								} 
								?>
							</div>
							<div class="item-price"><?php

							if ($dat['status_tempat']=='Buka') {
								echo "
								<span class='btn btn-success'>Buka</span>
								";
							}else{
								echo "
								<span class='btn btn-danger'>Tutup</span>
								";
							}

						?></div>
					</div>

					<ul class="shop-list">
						<li><strong>Category</strong><span class="theme_color">. </span><a href="#"><?php echo $dat['kategori_tempat'] ?></a></li>

					</ul>
					<div class="text">
						<p><i class="fa fa-map-marker" style="font-size:20px"></i></span> <?php echo $dat['alamat_tempat'] ?></p>
					</div>
					<!-- Content Side -->
					<div class="content-side col-md-12 col-sm-12">
						<div class="classes-detail">
							<div class="inner-box">
								<div class="lower-content">
									<h3>Jadwal Operasi</h3>
									<div class="row clearfix">

										<!-- Schedule Column -->
										<div class="schedule-column col-md-12 col-sm-12">
											<div class="inner-column">
												<!-- <h5>Monday</h5> -->
												<div class="time"><?php echo $dat['jadwal'] ?></div>
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Basic Details-->

			<!--Product Info Tabs-->
			<div class="product-info-tabs">
				<!--Product Tabs-->
				<div class="prod-tabs tabs-box">
					<?php 
					// hitung total viewer dari tabel rating
					$mysql_view = mysqli_query($koneksi, "SELECT count(DISTINCT ipuser) AS jumlahview FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat WHERE rating.kode_tempat='$kd'");
					$data_view = mysqli_fetch_array($mysql_view);
					$total_view = $data_view['jumlahview'];
					?>
					<!--Tab Btns-->
					<ul class="tab-btns tab-buttons clearfix">
						<li data-tab="#prod-details" class="tab-btn active-btn">Deskripsi</li>
						<li data-tab="#prod-info" class="tab-btn">Pelayanan</li>
						<li data-tab="#prod-reviews" class="tab-btn">Rating (<?php echo $total_view ?>)</li>
					</ul>

					<!--Tabs Container-->
					<div class="tabs-content">

						<!--Tab / Active Tab-->
						<div class="tab active-tab" id="prod-details">
							<div class="content">
								<p><center><?php echo $dat['deskripsi_tempat'] ?></center></p>
							</div>
						</div>

						<!--Tab / Active Tab-->
						<div class="tab" id="prod-info">
							<div class="content">
								<p><center><?php echo $dat['layanan_tempat'] ?></center></p>
							</div>
						</div>
						<!--Tab-->
						<div class="tab" id="prod-reviews">
							<!--Reviews Container-->
							<div class="reviews-container">
								<!--Review-->
								<?php 
								$sql=mysqli_query($koneksi,"SELECT * FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat WHERE rating.kode_tempat='$kd'");
								while($datarate = mysqli_fetch_array($sql)){		

									?>
									<div class="review-box clearfix">
										<figure class="rev-thumb"><img src="assets/images/favpng_icon-design-avatar.png" alt="" style="width:40px;height: 40px;margin-left: 60px;"></figure>
										<div class="rev-content">
											<div class="rev-header clearfix">
												<h4><?php echo $datarate['nama'] ?></h4>
												<div class="rating">
													<?php if ($datarate['rate'] == 0) {
														echo '<span class="fa fa-star-o"><span class="fa fa-star-o"><span class="fa fa-star-o"><span class="fa fa-star-o"><span class="fa fa-star-o"><span class="fa fa-star-o">';
													}else{
														for ($i=0; $i < $datarate['rate']; $i++){
															echo'<span class="fa fa-star">';
														}
													} 
													?>
												</div>
												<div class="time"><?php echo $datarate['datetime'] ?></div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php  

								?>
								<!--Add Review-->
								<div class="add-review">
									<h2>Add a Review</h2>
									<form method="POST">
										<input type="hidden" name="kode_tempat" value="<?php echo $dat['kode_tempat'] ?>">
										
										<div class="row clearfix">
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<label>Name <span style="color: red;">*</span></label>
												<input type="text" name="nama" value="" placeholder="" required>
											</div>
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<label>Rating </label>
												<div class="rating">
													<label>
														<input type="radio" id="star1" name="rate" value="1">
														<span class="fa fa-star" style="color:red;"></span>
													</label>
													<label>
														<input type="radio" id="star2" name="rate" value="2">
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
													</label>
													<label>
														<input type="radio" id="star3" name="rate" value="3">
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>   
													</label>
													<label>
														<input type="radio" id="star4" name="rate" value="4">
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
													</label>
													<label>
														<input type="radio" id="star5" name="rate" value="5">
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
														<span class="fa fa-star" style="color:red;"></span>
													</label>
												</div>
											</div>
											<div class="form-group text-right col-md-12 col-sm-12 col-xs-12">
												<button type="submit" name="simpan" class="theme-btn btn-style-three"><span class="txt">Add Review</span></button>
											</div>
										</div>
									</form>
								</div>                                          

							</div>
						</div>
						<!--End Tab-->

					</div>
				</div>

			</div>
			<!--End Product Info Tabs-->

		</div>

	</div>
</section>
<!--End Shop Single Section-->
<?php  
    if (isset($_POST['simpan'])) {

	$ipuser = md5($_SERVER['REMOTE_ADDR']);
	$nama = $_POST['nama'];
	$kode = $_POST['kode_tempat'];
	$rate = $_POST['rate'];
	$date = date('Y-m:d H:i:s');

		$mysqlcek = mysqli_query($koneksi, "SELECT * FROM rating WHERE ipuser='$ipuser'") or die (mysql_error($koneksi));
        if (mysqli_num_rows($mysqlcek)>0) {
            echo "<script>alert('Maaf Anda Sudah Memberikan Rating')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=user/detail_tempat&kode=$kd'></script>";
        }else{

		$masukanRating = mysqli_query($koneksi,"INSERT INTO rating VALUES(NULL, '$ipuser', '$kode', '$nama', '$rate', '$date')");
		if($masukanRating){
			echo "<script>alert('Terimakasih telah memberi ulasan tempat ini)</script>";
			echo "<meta http-equiv='refresh' content='1; url=?page=user/detail_tempat&kode=$kd'>";
		}else{
			echo "<script>alert('Terjadi kesalahan, coba ulangi kembali)</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=user/detail_tempat&kode=$kd'>";
		}
	}
}
?>