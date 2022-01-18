-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2022 pada 08.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigipto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `foto_admin` varchar(100) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `foto_admin`, `username_admin`, `password_admin`) VALUES
(5, 'Sintiyawati', 'Sintiyawati@gmail.com', 'IMG20210709121547_polarr.jpg', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jawaban` longtext NOT NULL,
  `link_video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `pertanyaan`, `jawaban`, `link_video`) VALUES
(1, 'bagaimana cara mendaftar akun admin pemilik tempat?', '                                                                <ol><li>Pertama-tama anda klik Join Us Now</li><li>Kemudian jika tidak mempunyai akun maka harus registrasi terlebih dahulu dengan mengklik tulisan daftar disini</li><li>Setelah itu tunggu super admin untuk mengverifikasi akun anda</li><li>refresh halaman jika terdapat tulisan \"Nama yang anda daftarkan sudah terdaftar silahkan login sebagai admin\" maka selanjutnya yaitu melakukan tahap login</li></ol>                                                        ', 'krWBbPHoh-I'),
(2, 'Bagaimana cara mengisi data tempat olahraga?', '                                <p>                                1. Buka halaman tempat olahraga kemudian</p><p>2. Kemudian Klik tambah data jika ingin mendaftarkan tempat olahraga</p><p>3. Kemudian isi data tempat olahraga</p><p>4. Jika Sudah disimpan maka akan tampilah data yang telah disimpan</p><p>5. Kemudian terdapat data aksi edit, detail, dan juga hapus yang dapat digunakan untuk mengedit data, melihat data serta hapus data</p>                            ', '70T7tQKXgAo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_tempat`
--

CREATE TABLE `gambar_tempat` (
  `id_gambar` int(11) NOT NULL,
  `kode_tempat` char(11) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `nama_gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_tempat`
--

INSERT INTO `gambar_tempat` (`id_gambar`, `kode_tempat`, `gambar`, `nama_gambar`) VALUES
(145, 'KT01', 'Galaxy Futsal.jpg', 'Galaxy Futsal'),
(150, 'KT04', 'Futsal Sprint.jpg', 'Sprint Futsal'),
(151, 'KT05', 'Permata Futsal.jpg', 'Permata Futsal'),
(152, 'KT06', 'futal lembahyung.jpg', 'Futsal Lembahyung'),
(153, 'KT07', 'olympuss.jpeg', 'Olympus Fitness Center'),
(154, 'KT08', 'fitness vera.jpeg', 'Fitness Vera'),
(155, 'KT09', 'gor.jpg', 'GOR. KT. PB. Bimantara Tangkas'),
(156, 'KT10', 'mana club.jpg', 'Manna Club'),
(157, 'KT11', 'Manna Club Renang.jpeg', 'Manna Club Renang'),
(158, 'KT12', 'LULIM.jpeg', 'LULIM Dance Studio'),
(159, 'KT13', 'Tropical.jpeg', 'Tropical Gym'),
(160, 'KT14', 'Tropical Waterpark.jpeg', 'Tropical Waterpark'),
(161, 'KT15', 'Lendy.jpeg', 'LENDY Dance Studio'),
(162, 'KT16', 'Manna Club Renang.jpeg', 'WIWIWIW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_tempat`
--

CREATE TABLE `pemilik_tempat` (
  `id_pemilik` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status_akun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik_tempat`
--

INSERT INTO `pemilik_tempat` (`id_pemilik`, `nama_lengkap`, `email`, `username`, `password`, `foto`, `status_akun`) VALUES
(14, 'melsy yasinta', 'melsy2022@gmail.com', 'melsy', 'melsy', '', 'Aktif'),
(15, 'Lisa Aprilia', 'Lisa@gmail.com', 'Lisa aprilia', 'lisa', '', 'Aktif'),
(16, 'Khafifah Rahayu', 'khafifahrahayu@gmail.com', 'Khafifah', 'khafifah', '', 'Aktif'),
(17, 'Hodriansyah', 'hodriansyah2001@gmail.com', 'rian', 'rian', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `ipuser` char(50) NOT NULL,
  `kode_tempat` char(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_olahraga`
--

CREATE TABLE `tempat_olahraga` (
  `id_tempat` int(11) NOT NULL,
  `kode_tempat` char(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `kategori_tempat` varchar(50) NOT NULL,
  `nomor_telepon` char(13) NOT NULL,
  `alamat_tempat` longtext NOT NULL,
  `layanan_tempat` longtext NOT NULL,
  `jadwal` longtext NOT NULL,
  `deskripsi_tempat` longtext NOT NULL,
  `latitude` varchar(13) NOT NULL,
  `longitude` varchar(13) NOT NULL,
  `status_tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_olahraga`
--

INSERT INTO `tempat_olahraga` (`id_tempat`, `kode_tempat`, `id_pemilik`, `nama_tempat`, `kategori_tempat`, `nomor_telepon`, `alamat_tempat`, `layanan_tempat`, `jadwal`, `deskripsi_tempat`, `latitude`, `longitude`, `status_tempat`) VALUES
(66, 'KT07', 16, 'Olympus Fitness Center', 'Gym', '0897434365635', 'Sampit, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '                                                <ol>\r\n                                                    <li>Wifi</li><li>WC</li><li>Kantin</li><li>Kursi Penonton</li><li>Parkiran Gratis</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <div><div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div><br></div></div>\r\n\r\n                                            ', '<ol><li>Olympus Fitness Center ini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga Galaxy Futsal ini maka silahkan beri rating atau views terbaik kamu.</li><li>Untuk biaya sewa tempat olahraga Olympus Fitness Center ini maka silahkan anda hubungi via telepon saja.</li></ol><div><br></div>', '-1.833006', '109.9665713', 'Buka'),
(68, 'KT09', 16, 'GOR. KT. PB. Bimantara Tangkas', 'Gor', '089652124532', 'Jalan Sutomo, Mulia Baru, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '<ol><li>Wifi</li><li>WC</li><li>Kantin</li><li>Kursi Penonton</li><li>Parkiran gratis</li></ol>', '<div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div><br></div>', '<ol><li>GOR. KT. PB. Bimantara Tangkasini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga&nbsp;GOR. KT. PB. Bimantara Tangkas ini maka silahkan beri rating atau views terbaik kamu.</li><li>Untuk biaya sewa tempat olahraga GOR. KT. PB. Bimantara Tangkas ini maka silahkan anda hubungi via telepon saja.</li></ol><div><br></div>', '-1.8513386', '109.9759071', 'Buka'),
(71, 'KT12', 14, 'LULIM Dance Studio', 'Zumba', '0896453642425', 'Jalan Imam Bonjol, Kantor, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '                                                <ol>\r\n                                                    <li>Wifi</li><li>Kantin</li><li>WC</li><li>Kursi Tunggu</li><li>Alat Zumba</li><li>Parkir Gratis</li>\r\n                                                </ol>\r\n\r\n                                            ', '<div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div><br></div>', '<ol><li>LULIM Dance Studio ini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga LULIM Dance Studio ini maka silahkan beri rating atau views terbaik kamu.</li><li>Untuk biaya sewa tempat olahraga&nbsp;LULIM Dance Studio ini maka silahkan anda hubungi via telepon saja.</li></ol><div><br></div>', '-1.8586103', '109.9761494', 'Buka'),
(72, 'KT13', 17, 'Tropical Gym', 'Gym', '0894397386647', 'Jalan Haji Agus Salim, Sampit, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '                                                <ol>\r\n                                                    <li>Wifi</li><li>Wc</li><li>Kantin</li><li>Kursi Tunggu</li><li>Parkir Gratis</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <div><div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div></div><div><br></div>\r\n\r\n                                            ', '                                                <div><ol><li>Tropical Gym ini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga Tropical Gym&nbsp;ini maka silahkan beri rating atau views terbaik kamu.</li><li>Untuk biaya sewa tempat olahraga&nbsp;Tropical Gym&nbsp; ini maka silahkan anda hubungi via telepon saja.</li></ol></div><div><br></div>\r\n\r\n                                            ', '-1.8359283', '109.9739625', 'Buka'),
(73, 'KT14', 17, 'Tropical Waterpark', 'Kolam Renang', '0894756734647', 'Jalan Haji Agus Salim, Sampit, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '                                                <ol>\r\n                                                    <li>Wifi</li><li>Kantin</li><li>Wc</li><li>Kursi Tunggu</li><li>Parkir Gratis</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <div><div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div></div><div><br></div>\r\n\r\n                                            ', '<ol><li>Tropical Waterpark ini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga Tropical Waterpark ini maka silahkan beri rating atau views terbaik kamu.</li><li>untuk biaya sewa tempat olahraga Tropical Waterpark ini maka silahkan anda hubungi via telepon saja.</li></ol><div><br></div>', '-1.8359283', '109.9739625', 'Buka'),
(74, 'KT15', 17, 'Lendy Dance Studio', 'Zumba', '0894363745346', 'Jalan DI Panjaitan, Sampit, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat, Indonesia', '                                                <ol>\r\n                                                    <li>Wifi</li><li>Kantin</li><li>Wc</li><li>Kursi Tunggu</li><li>Parkiran Gratis</li>\r\n                                                </ol>\r\n\r\n                                            ', '<div>Senin<span style=\"white-space:pre\">	</span>: 06:00 - 21:00 WIB</div><div>Selasa <span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Rabu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Kamis<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Jumat<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Sabtu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div>Minggu<span style=\"white-space:pre\">	</span>: 06:00 – 21:00 WIB</div><div><br></div>', '<ol><li>Lendy Dance Studio ini memiliki beberapa layanan dan juga jadwal operasional yang teratur jika anda sangat menyukai atau sangat puas dengan tempat olahraga LENDY Dance Studio ini maka silahkan beri rating atau views terbaik kamu.</li><li>Untuk biaya sewa tempat olahraga LENDY Dance Studio ini maka silahkan anda hubungi via telepon saja.</li></ol><div><br></div>', '-1.8307614', '109.9721041', 'Buka'),
(75, 'KT16', 16, 'futsal', 'Futsal', '0823377777773', 'Jalan Delta Sari Indah, Koreksari, Kureksari, Kabupaten Sidoarjo, Jawa Timur, Indonesia', '                                                <ol>\r\n                                                    <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <ol>\r\n                                                    <li>Tuliskan jadwal operasi tempat olahraga</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <ol>\r\n                                                    <li>Deskripsikan Tempat Olahraga yang anda daftarkan</li>\r\n                                                    <li>Tuliskan biaya sewa pengunjung tempat</li>\r\n                                                </ol>\r\n\r\n                                            ', '-7.3646948000', '112.7351961', 'Buka');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `gambar_tempat`
--
ALTER TABLE `gambar_tempat`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `pemilik_tempat`
--
ALTER TABLE `pemilik_tempat`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `tempat_olahraga`
--
ALTER TABLE `tempat_olahraga`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar_tempat`
--
ALTER TABLE `gambar_tempat`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `pemilik_tempat`
--
ALTER TABLE `pemilik_tempat`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tempat_olahraga`
--
ALTER TABLE `tempat_olahraga`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
