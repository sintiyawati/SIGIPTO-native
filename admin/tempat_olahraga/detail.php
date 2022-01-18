<?php 
$datax = mysqli_query($koneksi,"SELECT * FROM tempat_olahraga WHERE kode_tempat='$_GET[kode]'");
$dat=mysqli_fetch_array($datax);
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detail</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Detail Tempat Olahraga</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                     <div class="owl-carousel">
                        <?php 
                        $mysql = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN gambar_tempat ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat WHERE tempat_olahraga.kode_tempat='$_GET[kode]'");
                        while ($data = mysqli_fetch_array($mysql)) {

                            ?>
                            <div class="item">
                                <?php 
                                if ($data['gambar']=='') {?>
                                    <img src="assets/images/default-min.jpg" id="preimage" alt="" class="img-circle" style="width:50%; height: 140px;"/>
                                <?php }else{?>
                                    <img class="d-block img-fluid"  src="tempat_olahraga/gambar/<?php echo $data['gambar'] ?>" style="width: 100%;height: 250px;">
                                <?php } ?>
                                <h4 class="card-title m-t-20"><?php echo $data['nama_tempat'] ?></h4>
                            </div>
                        <?php } ?>
                    </div>
                </center>
            </div>
            <hr style="margin-top:-20px;">
            <div class="card-body"> 
                <small class="text-muted">Nomor Telepon</small>
                <h6><?php echo $dat['nomor_telepon'] ?></h6> 

                <small class="text-muted p-t-10 db">Alamat</small>
                <h6><?php echo $dat['alamat_tempat'] ?></h6>

                <div class="map-box">
                    <div id="map-canvas" style="width:100%;height:150px;" frameborder="0" allowfullscreen></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Detail Tempat</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--second tab-->
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Tempat</strong>
                                <br>
                                <p class="text-muted"><?php echo $dat['nama_tempat'] ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nomor Telepon</strong>
                                <br>
                                <p class="text-muted"><?php echo $dat['nomor_telepon'] ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Status Tempat</strong>
                                <br>
                                <p class="text-muted">
                                    <?php

                                  if ($dat['status_tempat']=='Buka') {
                                   echo "
                                   <span class='label label-success'>Buka</span>
                                   ";
                                 }else{
                                  echo "
                                  <span class='label label-danger'>Tutup</span>
                                  ";
                              }

                              ?>
                                </p>
                            </div>

                            <div class="col-md-3 col-xs-6"> 
                            <strong>Rating</strong>
                                <br>
                                <?php 
                                $sqlrating=mysqli_query($koneksi,"SELECT AVG(rating.rate) AS totalRating FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat WHERE rating.kode_tempat='$_GET[kode]'");
                                $dataRating = mysqli_fetch_array($sqlrating);
                                $rating = round($dataRating['totalRating'],2);

                                ?>
                            <h1 class="text-warning">
                            <b><span id="average_rating" style="font-size:25px"><?php echo $rating ?></span></b>
                        </h1>
                        <div class="mb-3" id="star">
                            <?php if ($rating == 0) {
                                echo '<i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i><i class="fa fa-star star-light main_star"></i>';
                            }else{
                                for ($i=0; $i < $rating; $i++){
                                    echo'<span class="on"><i class="fa fa-star"></i></span>';
                                }
                            } 
                            ?>
                        </div>
                        </div>
                        
                        </div>
                        <hr>
                        <h6><strong>Kategori Tempat</strong></h6>
                        <p class="m-t-10"><?php echo $dat['kategori_tempat'] ?></p>
                        <h6><strong>Jadwal Operasi</strong></h6>
                        <p class="m-t-20"><?php echo $dat['jadwal'] ?></p>
                        <h6><strong>Pelayanan</strong></h6>
                        <p class="m-t-20"><?php echo $dat['layanan_tempat'] ?></p>
                        <h6><strong>Deskripsi Tempat</strong></h6>
                        <p class="m-t-20"><?php echo $dat['deskripsi_tempat'] ?></p>

                        <br>
                        <a href="?page=tempat_olahraga/index" type="reset" class="btn btn-inverse">Kembali</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<script type="text/javascript">   
    <?php 
    $kode = $_GET['kode'];
    $dataa = mysqli_query($koneksi,"SELECT * FROM tempat_olahraga WHERE kode_tempat='$kode'");
    $d=mysqli_fetch_array($dataa);
    ?>

    var markers = [
    ['<b><?php echo $d['nama_tempat']; ?></b>', <?php echo $d['latitude']; ?>, <?php echo $d['longitude']; ?>]
    ];


   
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.SATELLITE
      }     
      var map = new google.maps.Map(mapCanvas, mapOptions)

      var infowindow = new google.maps.InfoWindow(), marker, i;
        var bounds = new google.maps.LatLngBounds(); // diluar looping
        for (i = 0; i < markers.length; i++) {  
            pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(pos); // di dalam looping
        marker = new google.maps.Marker({
            position: pos,
            map: map,
            animation: google.maps.Animation.BOUNCE
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(markers[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
        map.fitBounds(bounds); // setelah looping
    }
</script>
