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

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Tempat Olahraga</h4>
            <div class="header">
                <a href="?page=tempat_olahraga/tambah" class="btn btn-sm btn-secondary pull-right">Tambah Data</a>
            </div>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>No.</center></th>
                            <th><center>Nama Tempat</center></th>
                            <th><center>Alamat</center></th>
                            <th><center>Status Tempat</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $no = 1;
                         $my = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='$_SESSION[id_pemilik]'");
                         while ($data = mysqli_fetch_array($my)) {
                        $karakter = 30;
                        $cetak = substr($data['alamat_tempat'], 0, $karakter);
                          ?>
                          <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><center><?php echo $data['nama_tempat'] ?></center></td>
                            <td><center><?php echo $cetak ?>...</center></td>
                             <td>
                                <center>
                              <?php

                                  if ($data['status_tempat']=='Buka'){
                                   echo "
                                   <a href='#konfirmasiTutup$data[kode_tempat]' data-toggle='modal'>
                                   <span class='label label-success'>Buka</span>
                                   </a>
                                   ";
                               }else if ($data['status_tempat']=='Tutup'){
                                  echo "
                                  <a href='#konfirmasiBuka$data[kode_tempat]' data-toggle='modal'>
                                  <span class='label label-danger'>Tutup</span>
                                  </a>
                                  ";
                              }

                              ?>   
                              </center>
                             </td>
                            <td>
                               <center>
                                <a href="?page=tempat_olahraga/edit&kode_tempat=<?php echo $data['kode_tempat'] ?>" class="btn btn-primary">
                                   <i class="fa fa-edit"></i>      
                                </a>
                                <a href="?page=tempat_olahraga/hapus&kode_tempat=<?php echo $data['kode_tempat'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                                    <i class="fa fa-trash-o"></i>      
                                </a>
                                <a href="?page=tempat_olahraga/detail&kode=<?php echo $data['kode_tempat'] ?>" class="btn btn-warning" >
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </center>
                        </td>
                    </tr>

<!-- Modal Tutup Tempat Olahraga -->
<div class="modal modal-danger fade" id="konfirmasiTutup<?php echo $data['kode_tempat'] ?>">
 <div class="modal-dialog modal-sm">
  <form action="" method="post">
    <input type="hidden" name="kode_tempat" value="<?php echo $data['kode_tempat'] ?>">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Yakin ingin Menutup Tempat Olahraga ini ?!</h4>
        </div>
        <div class="modal-footer">
            <button type="submit" name="tutup" class="btn btn-danger">Tutup</button>
            <button type="button" class="btn btn-warning waves-effect text-left" data-dismiss="modal">Batal</button>
        </div>
    </div>
</form>
</div>
</div>
<!-- #END# Modal Tutup Tempat Olahraga-->

<!-- Modal Membuka Tempat Olahraga -->
<div class="modal modal-success fade" id="konfirmasiBuka<?php echo $data['kode_tempat'] ?>">
 <div class="modal-dialog modal-sm">
  <form action="" method="post">
    <input type="hidden" name="kode_tempat" value="<?php echo $data['kode_tempat'] ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Yakin ingin membuka tempat olahraga ini ?!</h4>
    </div>
    <div class="modal-footer">
        <button type="submit" name="buka" class="btn btn-success">Buka</button>
        <button type="button" class="btn btn-warning waves-effect text-left" data-dismiss="modal">Batal</button>
    </div>
</div>
</form>
</div>
</div>
<!-- #END# Modal Membuka Tempat Olahraga -->


                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 


  if (isset($_POST['buka'])) {
    $kode_tempat = $_POST['kode_tempat'];
    $sqlBuka = mysqli_query($koneksi, "UPDATE tempat_olahraga SET status_tempat='Buka' WHERE kode_tempat='$kode_tempat'");
    if ($sqlBuka) {
      echo "<script>alert('Tempat Olahraga Berhasil Dibuka')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'><script>";
    }else{
      echo "<script>alert('Terjadi Kesalahan, Coba sekali lagi')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'><script>";
    }

  }

  if (isset($_POST['tutup'])) {
    $kode_tempat = $_POST['kode_tempat'];
    $sqlTutup = mysqli_query($koneksi, "UPDATE tempat_olahraga SET status_tempat='Tutup' WHERE kode_tempat='$kode_tempat'");
    if ($sqlTutup) {
      echo "<script>alert('Tempat Olahraga Sudah Tutup')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'><script>";
    }else{
      echo "<script>alert('Terjadi Kesalahan, Coba sekali lagi')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'><script>";
    }

  }

?>