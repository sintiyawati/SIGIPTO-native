<?php 

$koneksi = mysqli_connect("localhost", "root", "", "SIGIPTO") or die("Koneksi ke database gagal!");

$query = mysqli_query($koneksi, "SELECT max(kode_tempat) as kodeTerbesar FROM tempat_olahraga");
$data = mysqli_fetch_array($query);
$kodeTempat = $data['kodeTerbesar'];
$urutan = (int) substr($kodeTempat, 2, 4);
$urutan++;
$huruf = "KT";
$kodeTempat = $huruf . sprintf("%02s", $urutan);

// hitung total viewer dari tabel rating
$mysql_viewer = mysqli_query($koneksi, "SELECT count(DISTINCT ipuser) AS jumlahviewer FROM rating");
$data_viewer = mysqli_fetch_array($mysql_viewer);
$total_viewer = $data_viewer['jumlahviewer'];

// hitung total tempat dari tabel tempat
$mysql_tempat = mysqli_query($koneksi, "SELECT count(DISTINCT kode_tempat) AS jumlahtempat FROM tempat_olahraga");
$data_tempat = mysqli_fetch_array($mysql_tempat);
$total_tempat = $data_tempat['jumlahtempat'];

// hitung total pemilik tempat dari tabel pemilik tempat
$mysql_pemilik = mysqli_query($koneksi, "SELECT count(DISTINCT id_pemilik) AS jumlahpemilik FROM pemilik_tempat");
$data_pemilik = mysqli_fetch_array($mysql_pemilik);
$total_pemilik = $data_pemilik['jumlahpemilik'];


// hitung pendaftaran baru admin pemilik tempat
$sqlpendaftaranBaru = mysqli_query($koneksi, "SELECT count(*) AS pendaftaranBaru FROM pemilik_tempat WHERE status_akun='Baru'");
$dataHitungBaru = mysqli_fetch_array($sqlpendaftaranBaru);
$notifpendaftaranBaru = $dataHitungBaru['pendaftaranBaru'];

// hitung total tempat olahraga berdasarkan kategori
$gym = mysqli_query($koneksi, "SELECT count(*) AS jmlTempat FROM tempat_olahraga WHERE kategori_tempat='Gym'");
$data_gym = mysqli_fetch_array($gym);
$Gyms = $data_gym['jmlTempat'];

// hitung total tempat olahraga berdasarkan kategori
$zumba = mysqli_query($koneksi, "SELECT count(*) AS jmlTempat FROM tempat_olahraga WHERE kategori_tempat='Zumba'");
$data_zumba = mysqli_fetch_array($zumba);
$Zumbas = $data_zumba['jmlTempat'];

// hitung total tempat olahraga berdasarkan kategori
$futsal = mysqli_query($koneksi, "SELECT count(*) AS jmlTempat FROM tempat_olahraga WHERE kategori_tempat='Futsal'");
$data_futsal = mysqli_fetch_array($futsal);
$Futsals = $data_futsal['jmlTempat'];

// hitung total tempat olahraga berdasarkan kategori
$kolam = mysqli_query($koneksi, "SELECT count(*) AS jmlTempat FROM tempat_olahraga WHERE kategori_tempat='Kolam Renang'");
$data_kolam = mysqli_fetch_array($kolam);
$Kolams = $data_kolam['jmlTempat'];

// hitung total tempat olahraga berdasarkan kategori
$gor = mysqli_query($koneksi, "SELECT count(*) AS jmlTempat FROM tempat_olahraga WHERE kategori_tempat='Gor'");
$data_gor = mysqli_fetch_array($gor);
$Gor = $data_gor['jmlTempat'];


?>