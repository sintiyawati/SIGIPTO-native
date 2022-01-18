<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<style type="text/css">
    .field-icon {
        float: right;
        margin-left: -35px;
        margin-right: 10px;
        margin-top: 10px;
        position: absolute;
        z-index: 2;
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Pemilik Tempat</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="app.php">Home</a></li>
            <li class="breadcrumb-item active">Pemilik Tempat</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Pemilik Tempat Olahraga</h4>
                    <form class="m-t-40" method="post" action="" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <h5>Nama Lengkap</h5>
                                <div class="controls">
                                    <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap" required data-validation-required-message="Data ini wajib diisi"> </div>
                                </div>
                                 <div class="form-group">
                                        <div class="controls">
                                            <img src="assets/images/default-min.jpg" id="preimage" style="width: 100%; height: 200px; margin-top:15px;border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input name="foto" type="file" class="form-control" id="image" onchange="loadfile(event)" aria-describedby="fileHelp">
                                    </div>
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required placeholder="Email" required data-validation-required-message="Data ini wajib diisi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <h5>Username<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="username" class="form-control" required placeholder="Username" required data-validation-required-message="Data ini wajib diisi"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password-field" type="password" class="form-control" name="password" required placeholder="Password">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                <a href="?page=pemilik_tempat/index" type="reset" class="btn btn-inverse">Kembali</a>
                            </div>
                        </form>
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

    <?php

    if (isset($_POST['simpan'])) {

        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $namaFoto = $_FILES['foto']['name'];
        $tempatFoto = $_FILES['foto']['tmp_name'];

        $mysqlcek = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat WHERE nama_lengkap='$nama_lengkap'") or die (mysql_error($koneksi));
        if (mysqli_num_rows($mysqlcek)>0) {
            echo "<script>alert('Maaf Nama Yang Anda Masukan Sudah Terdaftar')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/tambah'></script>";
        }else{

            $simpanFoto = move_uploaded_file($tempatFoto, "pemilik_tempat/foto_pemilik/" . $namaFoto);

            if ($simpanFoto) {
                mysqli_query($koneksi, "INSERT INTO pemilik_tempat VALUES ('', '$nama_lengkap', '$email', '$username', '$password', '$namaFoto', 'Aktif');");

                echo "<script>alert('Data Pemilik Tempat Berhasil Disimpan')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
            } else {
                echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/tambah'></script>";
            }
        }

    }

?>