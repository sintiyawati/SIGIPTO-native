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

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Tempat Olahraga</h4>
                    <form class="m-t-40" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <h5>Kode Tempat Olahraga</h5>
                            <div class="controls">
                                <input type="text" name="kode_tempat" value="<?php echo $kodeTempat ?>" class="form-control" readonly> </div>
                            </div>
                            <div class="form-group">
                                <h5>Nama Tempat Olahraga</h5>
                                <div class="controls">
                                    <input type="text" name="nama_tempat" class="form-control" required placeholder="Nama tempat" required oninvalid="this.setCustomValidity('Nama Tempat tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Tempat</label>
                                    <select class="form-control show-tick" name="kategori_tempat" required oninvalid="this.setCustomValidity('Kategori tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                                        <option value="">-- Pilih Kategori Tempat --</option>
                                        <option value="Gym">Gym</option>
                                        <option value="Zumba">Zumba</option>
                                        <option value="Futsal">Futsal</option>
                                        <option value="Kolam Renang">Kolam Renang</option>
                                        <option value="Gor">Gor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5>Titik Koordinat Latitude</h5>
                                    <div class="controls">
                                        <input type="text" id="lat" name="latitude" class="form-control" required placeholder="Titik Koordinat Latitude" required oninvalid="this.setCustomValidity('Kolom ini tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off" readonly=""> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Titik Koordinat Longitude</h5>
                                        <div class="controls">
                                            <input type="text" id="lng" name="longitude" class="form-control" required placeholder="Titik Koordinat Longitude" required oninvalid="this.setCustomValidity('Kolom ini tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off" readonly=""> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Nama Pemilik Tempat Olahraga</h5>
                                            <div class="controls">
                                                <select name="id_pemilik" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option>--- Pilih Pemilik Tempat ---</option>
                                                    <?php
                                                    $mysql = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat");
                                                    while ($data = mysqli_fetch_array($mysql)) {
                                                        ?>
                                                        <option value="<?php echo $data['id_pemilik'] ?>"><?php echo $data['nama_lengkap'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Nomor Telepon<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="nomor_telepon" class="form-control" required placeholder="Nomor Telepon" maxlength="13">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Alamat</h5>
                                            <div class="controls">
                                                <textarea type="text" name="alamat_tempat" class="form-control" id="lokasi" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <img src="assets/images/default-min.jpg" id="preimage" style="width: 100%; height: 200px; margin-top:15px;border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Gambar Tempat</label>
                                            <input name="gambar[]" type="file" class="form-control" id="image" onchange="loadfile(event)" required placeholder="Nama Gambar" aria-describedby="fileHelp" required oninvalid="this.setCustomValidity('Gambar tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off" multiple>
                                        </div>
                                        <div class="form-group">
                                            <h5>Nama Gambar</h5>
                                            <div class="controls">
                                                <input type="text" name="nama_gambar" class="form-control" required placeholder="Nama Gambar">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h5>Pelayanan yang tersedia</h5>                    
                                            <textarea name="layanan_tempat" class="summernote">
                                                <ol>
                                                    <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga</li>
                                                </ol>

                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5>Jadwal Operasi</h5>                    
                                            <textarea name="jadwal" class="summernote">
                                                <ol>
                                                    <li>Tuliskan jadwal operasi tempat olahraga</li>
                                                </ol>

                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5>Deskripsi Tempat Olahraga</h5>                    
                                            <textarea name="deskripsi_tempat" class="summernote">
                                                <ol>
                                                    <li>Deskripsikan Tempat Olahraga yang anda daftarkan</li>
                                                    <li>Tuliskan biaya sewa pengunjung tempat</li>
                                                </ol>

                                            </textarea>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
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
                        </div>


                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

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
                    center:new google.maps.LatLng(-1.501197, 110.702505),
                    mapId: "3a3b33f0edd6ed2a",
                    zoom: 12,
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
            <script type="text/javascript">
                function loadfile(event){
                    var output=document.getElementById('preimage');
                    output.src=URL.createObjectURL(event.target.files[0]);

                }
            </script> 

            <?php 


            if (isset($_POST['simpan'])) {

              $kode_tempat = $_POST['kode_tempat'];
              $id_pemilik = $_POST['id_pemilik'];
              $nama_tempat = $_POST['nama_tempat'];
              $kategori_tempat = $_POST['kategori_tempat'];
              $nomor_telepon = $_POST['nomor_telepon'];
              $alamat_tempat = $_POST['alamat_tempat'];
              $layanan_tempat = $_POST['layanan_tempat'];
              $jadwal = $_POST['jadwal'];
              $deskripsi_tempat = $_POST['deskripsi_tempat'];
              $latitude = $_POST['latitude'];
              $longitude = $_POST['longitude'];
              $nama_gambar = $_POST['nama_gambar'];

              $namaFile = $_FILES['gambar']['name'];
              $tempatFile = $_FILES['gambar']['tmp_name'];

              $jumlahDipilih = count($namaFile);
              $mysqlcek = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga WHERE nama_tempat='$nama_tempat'") or die (mysql_error($koneksi));
              if (mysqli_num_rows($mysqlcek)>0) {
                echo "<script>alert('Maaf Nama Tempat Sudah Ada')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/tambah'></script>";

            }else{

              for ($i=0; $i < $jumlahDipilih; $i++) { 

                $namagambarPilih = $namaFile[$i];
                $tmpgambarPilih = $tempatFile[$i];

                $inputFolderGambar  = move_uploaded_file($tmpgambarPilih, "../admin/tempat_olahraga/gambar/". $namagambarPilih);
                $inputGambar = mysqli_query($koneksi, "INSERT INTO gambar_tempat VALUES ('', '$kode_tempat', '$namagambarPilih', '$nama_gambar');");
            }

            $inputTempat = mysqli_query($koneksi, "INSERT INTO tempat_olahraga VALUES ('', '$kode_tempat', '$id_pemilik', '$nama_tempat', '$kategori_tempat', '$nomor_telepon', '$alamat_tempat', '$layanan_tempat', '$jadwal', '$deskripsi_tempat', '$latitude', '$longitude', 'Buka');");

            if ($inputFolderGambar AND $inputGambar AND $inputTempat){
                echo "<script>alert('Data Tempat Olahraga Berhasil Disimpan')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'></script>";
            }else{
                echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/tambah'></script>";
            }

        }
    }
    
    ?>
