 <?php 

$mysql = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat WHERE id_pemilik='$_GET[id_pemilik]'");
$data = mysqli_fetch_array($mysql); 

?>

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
            <li class="breadcrumb-item active">Detail Data Pemilik Tempat</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="container-fluid">
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> 
                    <?php 
                    if ($data['foto']=='') {?>
                        <img src="pemilik_tempat/foto_pemilik/icon.png" alt="" class="img-circle" id="preimage" style="width:50%; height: 140px;"/>
                    <?php }else{?>
                        <img src="pemilik_tempat/foto_pemilik/<?php echo $data['foto']; ?>" class="img-circle" id="preimage" style="width:50%; height: 140px;"/>
                    <?php } ?>
                    
                    <h4 class="card-title m-t-10"><?php echo $data['nama_lengkap']; ?></h4>
                    <h6 class="card-subtitle">Pemilik Tempat Olahraga</h6>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> 
                <small class="text-muted">Email address </small>
                <h6><?php echo $data['email']; ?></h6>

                <small class="text-muted">Username</small>
                <h6><?php echo $data['username']; ?></h6>

                <small class="text-muted">Password</small>
                <h6><?php echo $data['password']; ?></h6>
            </div>
            <form method="POST">
                <input type="hidden" name="id_pemilik" value="<?php echo $data['id_pemilik']; ?>">
                <div class="text-xs-right" style="padding:20px;">
                    <button type="submit" name="update" class="btn btn-info">EDIT</button>
                    <a href="?page=pemilik_tempat/index" type="reset" class="btn btn-inverse">Kembali</a>
                </div>

            </form>
        </div>
    </div>
    <!-- Column -->
    <?php 

            if (isset($_POST['update'])) {
                ?>
                <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Pengaturan Akun</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data" action="">
                            <input type="hidden" name="id_pemilik" value="<?php echo $data['id_pemilik']; ?>">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" placeholder="Nama Lengkap" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" name="username" value="<?php echo $data['username']; ?>" placeholder="Username" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input id="password-field" type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control form-control-line" >
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <label>Ubah Foto</label>
                                <input name="foto" type="file" class="form-control" id="image" onchange="loadfile(event)" aria-describedby="fileHelp">
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="edit" class="btn btn-success" onclick="return confirm('Yakin ingin menyimpan perubahan data ini ?!');">Simpan</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

        <?php } ?>
</div>
</div>
<!-- Row -->
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
// Simpan menu
if (isset($_POST['edit'])) {

  $id_pemilik       = $_POST['id_pemilik'];
  $nama_lengkap           = $_POST['nama_lengkap'];
  $email          = $_POST['email'];
  $username       = $_POST['username'];
  $password       = $_POST['password'];
  $nama_gambar    = $_FILES['foto']['name'];
  $tempat_gambar  = $_FILES['foto']['tmp_name'];

  if (empty($nama_gambar)) {

    mysqli_query($koneksi, "UPDATE pemilik_tempat SET nama_lengkap='$nama_lengkap', email='$email', username='$username', password='$password' WHERE id_pemilik='$id_pemilik'");

    echo "<script>alert('Data Pemilik Tempat Berhasil Diubah')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
}else{

    $u=mysqli_query($koneksi,"SELECT * FROM pemilik_tempat WHERE id_pemilik='$id_pemilik'");
    $us=mysqli_fetch_array($u);

    file_exists("pemilik_tempat/foto_pemilik/".$us['foto']);
    unlink("pemilik_tempat/foto_pemilik/".$us['foto']);
    move_uploaded_file($tempat_gambar, "pemilik_tempat/foto_pemilik/".$nama_gambar);

    $update_database =  mysqli_query($koneksi, "UPDATE pemilik_tempat SET nama_lengkap='$nama_lengkap', email='$email', username='$username', password='$password', foto='$nama_gambar' WHERE id_pemilik='$id_pemilik'");

    if($update_database){
       echo "<script>alert('Data Pemilik Tempat Berhasil Diubah')</script>";
       echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
   }else{
      echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
  }

}


}

?>