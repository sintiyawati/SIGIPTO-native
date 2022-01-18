<?php 
include '../koneksi.php';
if(isset($_GET['id'])){
    $foto_pemilik = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat WHERE id_pemilik='".$_GET['id']."'");
    $data = mysqli_fetch_array($foto_pemilik);
    $foto = $data['foto'];

    if(file_exists("pemilik_tempat/foto_pemilik/$foto")){
    unlink("pemilik_tempat/foto_pemilik/$foto");
    }

    $gambartempat = mysqli_query($koneksi, "SELECT * FROM gambar_tempat RIGHT JOIN tempat_olahraga ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat RIGHT JOIN pemilik_tempat ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik WHERE pemilik_tempat.id_pemilik='".$_GET['id']."'");
    $datas = mysqli_fetch_array($gambartempat);
    $gambar = $datas['gambar'];

    if (file_exists("tempat_olahraga/gambar/$gambar")){
        unlink("tempat_olahraga/gambar/$gambar");
    }
    
    $my = mysqli_query($koneksi, "DELETE pemilik_tempat,tempat_olahraga,gambar_tempat FROM pemilik_tempat RIGHT JOIN tempat_olahraga ON tempat_olahraga.id_pemilik=pemilik_tempat.id_pemilik RIGHT JOIN gambar_tempat ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat WHERE pemilik_tempat.id_pemilik='".$_GET['id']."'"); 

    if ($my) {
        echo "<script>alert('Data Admin Pemilik Tempat Berhasil Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
    }else{
         echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
         echo "<meta http-equiv='refresh' content='0; url=?page=pemilik_tempat/index'></script>";
    }

   }    
   
 ?>