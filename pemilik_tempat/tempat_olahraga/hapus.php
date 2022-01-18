<?php 

if(isset($_GET['kode_tempat'])){
    $my = mysqli_query($koneksi, "SELECT * FROM gambar_tempat JOIN tempat_olahraga ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat WHERE gambar_tempat.kode_tempat='".$_GET['kode_tempat']."'");
    $data = mysqli_fetch_array($my);
    $gambar = $data['gambar'];
    if (file_exists("../admin/tempat_olahraga/gambar/$gambar")){
        unlink("../admin/tempat_olahraga/gambar/$gambar");
    }

    $hapusTempat = mysqli_query($koneksi, "DELETE FROM tempat_olahraga WHERE kode_tempat='".$_GET['kode_tempat']."'"); 
    $hapusRating=mysqli_query($koneksi, "DELETE FROM rating WHERE kode_tempat='".$_GET['kode_tempat']."'");
    
    if ($hapusTempat AND $hapusRating) {
        echo "<script>alert('Data Tempat Olahraga Berhasil Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'></script>";
    }else{
         echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
         echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/index'></script>";
    }

   }    
   
 ?>