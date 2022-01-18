<?php 
 // hitung total viewer dari tabel rating
    $mysql_viewer = mysqli_query($koneksi, "SELECT count(DISTINCT ipuser) AS jumlahviewer FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$_SESSION[id_pemilik]'");
    $data_viewer = mysqli_fetch_array($mysql_viewer);
    $total_viewer = $data_viewer['jumlahviewer'];

    // hitung total tempat dari tabel tempat berdasarkan session admin
    $mysql_tempat = mysqli_query($koneksi, "SELECT count(DISTINCT kode_tempat) AS jumlahtempat FROM tempat_olahraga JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$_SESSION[id_pemilik]'");
    $data_tempat = mysqli_fetch_array($mysql_tempat);
    $tempat = $data_tempat['jumlahtempat'];

    // hitung total viewer dari tabel rating berdasarkan session admin
    $mysql_viewer = mysqli_query($koneksi, "SELECT count(DISTINCT ipuser) AS jumlahviewer FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$_SESSION[id_pemilik]'");
    $data_viewer = mysqli_fetch_array($mysql_viewer);
    $viewer = $data_viewer['jumlahviewer'];

 ?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-8">
            <div class="card">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-8"><h2><?php echo $tempat ?> <i class=" ti-location-pin font-20 text-danger"></i></h2>
                            <h6>Total Tempat</h6></div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-lg-4 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- Row -->
                            <div class="row">
                                <div class="col-8"><h2><?php echo $viewer ?> <i class="ti-user font-20 text-info"></i></h2>
                                    <h6>Total Viewer</h6></div>
                                    <div class="col-4 align-self-center text-right p-l-0">
                                        <div id="sparklinedash2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><h2>Tanggal &nbsp<i class="ti-calendar font-18 text-danger"></i></h2>
                                        <h6><?php
                                                include '../function_tgl.php';
                                                echo hari_ini() .' / '; echo tgl_indo(date('Y-m-d'));?></h6></div>
                                        <div class="col-4 align-self-center text-right p-l-0">
                                            <div id="sparklinedash4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row -->


                    <!-- Row -->

                    <!-- Row -->
                    <!-- Row -->

                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Peta Pesebaran Tempat Olahraga</h4>
                                    <div id="gmaps" class="gmaps"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->

                </div>

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
        $query = $koneksi->query("SELECT * FROM tempat_olahraga JOIN gambar_tempat ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$_SESSION[id_pemilik]'");
        while ($row = $query->fetch_assoc()) {
            $nama = $row["nama_tempat"];
            $lat  = $row["latitude"];
            $long = $row["longitude"];
            $alamat = $row["alamat_tempat"];
            $gambar = $row["gambar"];
            $kode = $row["kode_tempat"];


            echo ("addMarker($lat, $long, '<div class=info-windows>' +
            '<img src=../admin/tempat_olahraga/gambar/$gambar>' +
            '<div class=info-title>' +
                '<h2 class=address>$nama</h2>' +
                '<h3 class=large>$alamat</h3>' +
                '<a href=?page=tempat_olahraga/detail&kode=$kode class=btn btn-primary>Detail</a>' +
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