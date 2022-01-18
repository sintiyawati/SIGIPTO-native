<!--Page Title-->
<section class="page-title" style="background-image:url(assets/images/background/11.jpg)">
	<div class="auto-container">
		<div class="clearfix">
			<div class="pull-left">
				<h2>Peta</h2>
				<div class="text">Peta Pesebaran Tempat Olahraga</div>
			</div>
			<div class="pull-right">
				<ul class="page-breadcrumb">
					<li><a href="index.html">home</a></li>
					<li>Peta</li>
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
							<a href="index.html"><img src="images/logo.png" alt="" /></a>
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

<!-- Contact Form Section -->
<section class="contact-form-section">
	<div class="auto-container">
		<div class="row clearfix">
			<!-- Title Column -->
			<div class="title-column col-lg-6 col-md-12 col-sm-12">
				<!-- Sec Title -->
				<div id="gmaps" style="width:100%;height:450px;"></div>
			</div>
			
            <!-- Content Side -->
                    <div class="content-side col-md-6 ">
                        <div class="classes-detail">
                            <div class="inner-box">
                                <div class="lower-content">
                                    <h3>List Kategori</h3>
                                    <div class="row clearfix">
                                        <!-- Schedule Column -->
                                        <div class="schedule-column col-md-4 ">
                                            <div class="inner-column">
                                                <h5><a href="?page=user/maps&kategori_tempat=Gym"><?php echo $Gyms ?> tempat Gym </a></h5>
                                            </div>
                                        </div>
                                        <!-- Schedule Column -->
                                        <div class="schedule-column col-md-4 ">
                                            <div class="inner-column">
                                                <h5><a href="?page=user/maps&kategori_tempat=Zumba"><?php echo $Zumbas ?> tempat Zumba </a></h5>
                                            </div>
                                        </div>
                                        <!-- Schedule Column -->
                                        <div class="schedule-column col-md-4 ">
                                            <div class="inner-column">
                                                <h5><a href="?page=user/maps&kategori_tempat=Futsal"><?php echo $Futsals ?> tempat Futsal </a></h5>
                                            </div>
                                        </div>
                                        <!-- Schedule Column -->
                                        <div class="schedule-column col-md-4 ">
                                            <div class="inner-column">
                                                <h5><a href="?page=user/maps&kategori_tempat=Kolam Renang">
                                                	<?php echo $Kolams ?> tempat Kolam Renang </a></h5>
                                            </div>
                                        </div>
                                        <div class="schedule-column col-md-4 ">
                                            <div class="inner-column">
                                                <h5><a href="?page=user/maps&kategori_tempat=Gor"><?php echo $Gor ?> tempat Gor </a></h5>
                                            </div>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
			<!-- Content Side -->
			</div>
		</div>
	</div>

</section>

<!-- End Contact Form Section -->

<script type="text/javascript">   
    var marker;
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            zoom: 13,
            center: {
                lat: -1.8165475,
                lng: 109.9822499
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('gmaps'), mapOptions);      
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
        // Sesuaikan dengan konfigurasi database Anda
        $kategori_tempat = $_GET['kategori_tempat'];
        if (is_null($kategori_tempat)) {
        	$query = $koneksi->query("select * FROM tempat_olahraga JOIN gambar_tempat ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat ORDER BY gambar_tempat.gambar ASC");
        } else {
        	$query = $koneksi->query("select * FROM tempat_olahraga JOIN gambar_tempat ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat WHERE kategori_tempat='".$kategori_tempat."' ORDER BY gambar_tempat.gambar ASC");
        }
        
        while ($row = $query->fetch_assoc()) {
            $nama = $row["nama_tempat"];
            $lat  = $row["latitude"];
            $long = $row["longitude"];
            $alamat = $row["alamat_tempat"];
            $gambar = $row["gambar"];
            $kode = $row["kode_tempat"];

            echo ("addMarker($lat, $long, '<div class=info-windows>' +
                '<img src=admin/tempat_olahraga/gambar/$gambar>' +
                '<div class=info-title>' +
                '<h2 class=address>$nama</h2>' +
                '<h3 class=large>$alamat</h3>' +
                '<a href=?page=user/detail_tempat&kode=$kode class=btn btn-inverse>Detail</a>' +
                '</div>' +
                '</div>');\n");
        }
        ?> 
        // Proses membuat marker 
        function addMarker(lat, lng, info){
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: peta,
                position: lokasi
            });       
            // peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);
        }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html){
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(peta, marker);
            });
        }
</script>