<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Pemilik Tempat</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pemilik Tempat Olahraga</h4>
            <div class="header">
                <a href="?page=pemilik_tempat/tambah" class="btn btn-sm btn-secondary pull-right">Tambah Data</a>
            </div>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>No.</center></th>
                            <th><center>Nama Lengkap</center></th>
                            <th><center>Email</center></th>
                            <th><center>Tempat Olahraga</center></th>
                            <th><center>Status Akun</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include '../koneksi.php';
                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat");
                        while ($data = mysqli_fetch_array($my)) {
                            $ids = $data['id_pemilik'];
                            ?>
                            <tr>
                                <td><center><?php echo $no++ ?></center></td>
                                <td><center><?php echo $data['nama_lengkap'] ?></center></td>
                                <td><center><?php echo $data['email'] ?></center></td>
                                <td>
                                    <?php  
                                    $mys = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$ids'");
                                    while($dat = mysqli_fetch_array($mys)){
                                        ?>
                                        <center style="padding: 5px;"><a href="?page=tempat_olahraga/detail&kode=<?php echo $dat['kode_tempat'] ?>" class="btn btn-info" title="Lihat Detail"> <?php echo $dat['nama_tempat'] ?>
                                    </a></center> 
                                <?php } ?>
                            </td>

                            <td>
                                <center>
                                  <?php

                                  if ($data['status_akun']=='Baru') {
                                     echo "
                                     <a href='#konfirmasiBaru$data[id_pemilik]' data-toggle='modal'>
                                     <span class='label label-warning'>Menunggu Konfirmasi</span>
                                     </a>
                                     ";
                                 }else if($data['status_akun']=='Aktif'){
                                     echo "
                                     <a href='#konfirmasiNonaktif$data[id_pemilik]' data-toggle='modal'>
                                     <span class='label label-success'>Aktif</span>
                                     </a>
                                     ";
                                 }else if($data['status_akun']=='Nonaktif'){
                                  echo "
                                  <a href='#konfirmasiAktif$data[id_pemilik]' data-toggle='modal'>
                                  <span class='label label-danger'>Nonaktif</span>
                                  </a>
                                  ";
                              }

                              ?>
                          </center>
                      </td>
                      <td>
                         <center>
                             <a href="?page=pemilik_tempat/hapus&id=<?php echo $data['id_pemilik'] ?>,<?php echo $data['kode_tempat'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data pemilik tempat olahraga ini?!<br>Jika dihapus maka data tempat olahraga juga akan terhapus');">
                                <i class="fa fa-trash-o"></i>      
                            </a>
                            <a href="?page=pemilik_tempat/detail&id_pemilik=<?php echo $data['id_pemilik'] ?>" class="btn btn-warning" >
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </center>
                    </td>
                </tr>


                <!-- Modal aktifkan akun baru -->
                <div class="modal modal-warning fade" id="konfirmasiBaru<?php echo $data['id_pemilik'] ?>">
                   <div class="modal-dialog modal-sm">
                      <form action="" method="post">
                        <input type="hidden" name="id_pemilik" value="<?php echo $data['id_pemilik'] ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Yakin ingin mengaktifkan akun ini ?!</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="aktifkan" class="btn btn-success">Aktifkan</button>
                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- #END# Modal aktifkan akun baru -->

            <!-- Modal Nonaktifkan akun baru -->
            <div class="modal modal-danger fade" id="konfirmasiNonaktif<?php echo $data['id_pemilik'] ?>">
               <div class="modal-dialog modal-sm">
                  <form action="" method="post">
                    <input type="hidden" name="id_pemilik" value="<?php echo $data['id_pemilik'] ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Yakin ingin menonaktifkan akun ini ?!</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="nonaktifkan" class="btn btn-danger">Nonaktifkan</button>
                            <button type="button" class="btn btn-warning waves-effect text-left" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- #END# Modal aktifkan akun baru -->

        <!-- Modal Nonaktifkan akun baru -->
        <div class="modal modal-success fade" id="konfirmasiAktif<?php echo $data['id_pemilik'] ?>">
           <div class="modal-dialog modal-sm">
              <form action="" method="post">
                <input type="hidden" name="id_pemilik" value="<?php echo $data['id_pemilik'] ?>">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Yakin ingin mengaktifkan akun ini ?!</h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="aktifkan" class="btn btn-success">Aktifkan</button>
                    <button type="button" class="btn btn-warning waves-effect text-left" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- #END# Modal aktifkan akun baru -->
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php 


if (isset($_POST['aktifkan'])) {
    $id_pemilik = $_POST['id_pemilik'];
    $sql = mysqli_query($koneksi, "UPDATE pemilik_tempat SET status_akun='Aktif' WHERE id_pemilik='$id_pemilik'");
    if ($sql) {
      echo "<script>alert('Akun Berhasil Diaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'><script>";
  }else{
      echo "<script>alert('Terjadi Kesalahan, Coba sekali lagi')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'><script>";
  }

}

if (isset($_POST['nonaktifkan'])) {
    $id_pemilik = $_POST['id_pemilik'];
    $sql = mysqli_query($koneksi, "UPDATE pemilik_tempat SET status_akun='Nonaktif' WHERE id_pemilik='$id_pemilik'");
    if ($sql) {
      echo "<script>alert('Akun Berhasil Dinonaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'><script>";
  }else{
      echo "<script>alert('Terjadi Kesalahan, Coba sekali lagi')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'><script>";
  }

}

?>