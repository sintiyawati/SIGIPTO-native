<?php 
$datax = mysqli_query($koneksi,"SELECT * FROM tempat_olahraga JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE kode_tempat='$_GET[kode_tempat]'");
$dat=mysqli_fetch_array($datax);
$kd = $dat['kode_tempat'];
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Tempat Olahraga</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tempat Olahraga</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
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
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Edit Data Tempat Olahraga</h4>
                    <form class="m-t-40" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id_tempat" value="<?php echo $dat['id_tempat'] ?>">
                        <input type="hidden" name="id_pemilik" value="<?php echo $_SESSION['id_pemilik'] ?>">
                        <div class="form-group">
                            <h5>Kode Tempat Olahraga</h5>
                            <div class="controls">
                                <input type="text" name="kode_tempat" value="<?php echo $kd ?>" class="form-control" readonly> </div>
                            </div>
                            <div class="form-group">
                                <h5>Nama Tempat Olahraga</h5>
                                <div class="controls">
                                    <input type="text" name="nama_tempat" value="<?php echo $dat['nama_tempat'] ?>" class="form-control" required placeholder="Nama tempat" required oninvalid="this.setCustomValidity('Nama Tempat tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Tempat</label>
                                    <select class="form-control show-tick" name="kategori_tempat" required oninvalid="this.setCustomValidity('Kategori tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                                        <option value="" <?php if ($dat['kategori_tempat']=='') {
                                            echo "selected";
                                        }?>>-- Pilih Kategori Tempat --</option>
                                        <option value="Gym" <?php if ($dat['kategori_tempat']=='Gym') {
                                            echo "selected";
                                        }?>>Gym</option>
                                        <option value="Zumba" <?php if ($dat['kategori_tempat']=='Zumba') {
                                            echo 'selected';
                                        }?>>Zumba</option>
                                        <option value="Futsal" <?php if ($dat['kategori_tempat']=='Futsal') {
                                            echo "selected";
                                        }?>>Futsal</option>
                                        <option value="Kolam Renang" <?php if ($dat['kategori_tempat']=='Kolam Renang') {
                                            echo "selected";
                                        }?>>Kolam Renang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5>Titik Koordinat Latitude</h5>
                                    <div class="controls">
                                        <input type="text" id="lat" name="latitude" value="<?php echo $dat['latitude'] ?>" class="form-control" required placeholder="Titik Koordinat Latitude" required oninvalid="this.setCustomValidity('Kolom ini tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off" readonly=""> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Titik Koordinat Longitude</h5>
                                        <div class="controls">
                                            <input type="text" id="lng" name="longitude" value="<?php echo $dat['longitude'] ?>" class="form-control" required placeholder="Titik Koordinat Longitude" required oninvalid="this.setCustomValidity('Kolom ini tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off" readonly=""> </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Nomor Telepon<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="nomor_telepon" value="<?php echo $dat['nomor_telepon'] ?>" class="form-control" required placeholder="Nomor Telepon" maxlength="13">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Alamat</h5>
                                            <div class="controls">
                                                <textarea type="text" name="alamat_tempat" class="form-control" id="lokasi" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $dat['alamat_tempat'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Pelayanan yang tersedia</h5>            
                                            <textarea name="layanan_tempat" class="summernote">
                                                <?php echo $dat['layanan_tempat'] ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5>Jadwal Operasi</h5>                    
                                            <textarea name="jadwal" class="summernote">
                                                <?php echo $dat['jadwal'] ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5>Deskripsi Tempat Olahraga</h5>                    
                                            <textarea name="deskripsi_tempat" class="summernote">
                                                <?php echo $dat['deskripsi_tempat'] ?>

                                            </textarea>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" name="edit" class="btn btn-info">Simpan</button>
                                            <a href="?page=tempat_olahraga/index" type="reset" class="btn btn-inverse">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tandai lokasi tempat olahraga</h4>
                                    <div id="googleMap" style="width:100%;height:450px;"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Gambar Tempat</h4>
                                    <div class="box-slider">
                                        <div class="naf-for">
                                            <?php
                                            $mys = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN gambar_tempat USING(kode_tempat) WHERE tempat_olahraga.kode_tempat='$kd'");
                                            while ($datax = mysqli_fetch_array($mys)) {
                                                $kode = $datax['kode_tempat'];

                                                ?>
                                                <div class="nav-item">
                                                    <img src="../admin/tempat_olahraga/gambar/<?php echo $datax['gambar']; ?>" alt="" style="width: 100%;height: 300px; padding: 10px;border-radius: 15px;"> 
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="naf-bottom">
                                            <?php

                                            $mysql = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN gambar_tempat USING(kode_tempat) WHERE tempat_olahraga.kode_tempat='$kode'");
                                            while ($data = mysqli_fetch_array($mysql)) {

                                                ?>
                                                <div class="bottom-item">
                                                    <img src="../admin/tempat_olahraga/gambar/<?php echo $data['gambar'] ?>" alt="" style="height: 150px;display: none;"> 
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-xs-right">
                                  <a href="?page=tempat_olahraga/edit_gambar&kd=<?php echo $kd ?>" class="btn btn-block btn-primary">
                                    UPDATE GAMBAR TEMPAT
                                </a>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <script type="text/javascript">
                function loadfile(event){
                    var output=document.getElementById('preimage');
                    output.src=URL.createObjectURL(event.target.files[0]);

                }
            </script> 
            <script>
            // variabel global marker
            var marker;

            function taruhMarker(peta, posisiTitik){

                if( marker ){
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta,
            });
        }

            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat().toFixed(7);
            document.getElementById("lng").value = posisiTitik.lng().toFixed(7);

        }

        function initialize() {
            var mapOption = {
                center:new google.maps.LatLng(-1.831212, 109.969031),
                mapId: "3a3b33f0edd6ed2a",
                zoom:17,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), mapOption);

            // even listner ketika peta diklik
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });

        }

            // event jendela di-load  
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>

        <?php 


        if (isset($_POST['edit'])) {
          $id_tempat = $_POST['id_tempat'];
          $nama_tempat = $_POST['nama_tempat'];
          $kategori_tempat = $_POST['kategori_tempat'];
          $nomor_telepon = $_POST['nomor_telepon'];
          $alamat_tempat = $_POST['alamat_tempat'];
          $layanan_tempat = $_POST['layanan_tempat'];
          $jadwal = $_POST['jadwal'];
          $deskripsi_tempat = $_POST['deskripsi_tempat'];
          $latitude = $_POST['latitude'];
          $longitude = $_POST['longitude'];


          $updateData = mysqli_query($koneksi, "UPDATE `tempat_olahraga` SET `nama_tempat` = '$nama_tempat', `kategori_tempat` = '$kategori_tempat', `nomor_telepon` = '$nomor_telepon', `alamat_tempat` = '$alamat_tempat', `layanan_tempat` = '$layanan_tempat', `jadwal` = '$jadwal', `deskripsi_tempat` = '$deskripsi_tempat', `latitude` = '$latitude', `longitude` = '$longitude' WHERE id_tempat='$id_tempat'");

          if ($updateData){
            echo "<script>alert('Data Tempat Olahraga Berhasil Disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'></script>";
        }else{
            echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/tambah'></script>";
        }

    }


    ?>

