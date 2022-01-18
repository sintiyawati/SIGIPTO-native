-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 06:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.25

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `foto_admin`, `username_admin`, `password_admin`) VALUES
(5, 'eko kurniawan', 'ekokurnikw@gmail.com', 'poltek.jpg', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jawaban` longtext NOT NULL,
  `link_video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `pertanyaan`, `jawaban`, `link_video`) VALUES
(1, 'bagaimana cara mendaftar akun admin pemilik tempat?', '                                                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'NgSFun7F8dI'),
(2, 'Bagaimana cara mengisi data tempat olahraga?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'NgSFun7F8dI');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_tempat`
--

CREATE TABLE `gambar_tempat` (
  `id_gambar` int(11) NOT NULL,
  `kode_tempat` char(11) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `nama_gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_tempat`
--

INSERT INTO `gambar_tempat` (`id_gambar`, `kode_tempat`, `gambar`, `nama_gambar`) VALUES
(82, 'KT03', 'Screenshot (51).png', 'testttt'),
(83, 'KT03', 'Screenshot (52).png', 'testttt'),
(84, 'KT03', 'Screenshot (53).png', 'testttt'),
(85, 'KT03', 'Screenshot (54).png', 'testttt'),
(86, 'KT03', 'Screenshot (55).png', 'testttt'),
(87, 'KT04', 'poltek.jpg', 'wrewer'),
(88, 'KT04', 'Untitled.png', 'wrewer'),
(89, 'KT04', 'Screenshot (53).png', 'wrewer'),
(90, 'KT04', 'Screenshot (54).png', 'wrewer'),
(91, 'KT01', 'IMG_20210124_155423.jpg', 'testt'),
(92, 'KT01', 'IMG-20210117-WA0007.jpg', 'testt'),
(93, 'KT01', 'IMG-20210117-WA0008.jpg', 'testt'),
(94, 'KT02', 'IMG_20210109_103352.jpg', 'tresfasad'),
(95, 'KT02', 'IMG_20210124_155423.jpg', 'tresfasad'),
(96, 'KT02', 'IMG_20210124_155500.jpg', 'tresfasad'),
(97, 'KT02', 'IMG-20210117-WA0006.jpg', 'tresfasad'),
(98, 'KT02', 'IMG_20210109_103352.jpg', 'esdasd'),
(99, 'KT02', 'IMG_20210124_155423.jpg', 'esdasd'),
(100, 'KT02', 'IMG_20210124_155500.jpg', 'esdasd'),
(101, 'KT02', 'IMG-20210117-WA0006.jpg', 'esdasd'),
(102, 'KT03', 'kisspng-goat-farm-clip-art-hand-painted-goat-5a90b40a226113.5136144815194327141408.png', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_tempat`
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
-- Dumping data for table `pemilik_tempat`
--

INSERT INTO `pemilik_tempat` (`id_pemilik`, `nama_lengkap`, `email`, `username`, `password`, `foto`, `status_akun`) VALUES
(1, 'eko kurniawan', 'ekokurnikw96@gmail.com', 'ekokw', '1234567', 'IMG-20201126-WA0000.jpg', 'Aktif'),
(2, 'test', 'test@gmail.com', 'test', 'tets', 'poltek.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `ipuser` char(50) NOT NULL,
  `kode_tempat` char(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `ipuser`, `kode_tempat`, `nama`, `rate`, `datetime`) VALUES
(16, '837ec5754f503cfaaee0929fd48974e7', 'KT01', 'eko', 5, '2022-01-06 03:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_olahraga`
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
-- Dumping data for table `tempat_olahraga`
--

INSERT INTO `tempat_olahraga` (`id_tempat`, `kode_tempat`, `id_pemilik`, `nama_tempat`, `kategori_tempat`, `nomor_telepon`, `alamat_tempat`, `layanan_tempat`, `jadwal`, `deskripsi_tempat`, `latitude`, `longitude`, `status_tempat`) VALUES
(22, 'KT01', 1, 'Olimpus Gym center', 'Futsal', '089509154456', 'Kantor Desa Baru, RT.006/RW.002, Baru, Kabupaten Ketapang, West Kalimantan, Indonesia', '                                                                                                                                        Pelayanan\r\n                                                                                                                            ', '                                                                                                                                        Pelayanan\r\n                                                                                                                            ', '                                                                                                                                        Pelayanan\r\n                                                                                    \r\n                                        ', '-1.7735157', '110.2593928', 'Buka'),
(24, 'KT02', 2, 'test 21', 'Zumba', '089509154456', 'Sukaharja, Ketapang Regency, West Kalimantan, Indonesia', '                                                                                            <ol>\r\n                                                <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga.</li>\r\n                                            </ol>\r\n                                                 \r\n                                                                                    ', '                                                                                            <ol>\r\n                                                <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga.</li>\r\n                                            </ol>\r\n                                                 \r\n                                                                                    ', '                                                                                            <ol>\r\n                                                <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga.</li>\r\n                                            </ol>\r\n                                                 \r\n                                            \r\n                                        ', '-1.8086934', '109.9913694', 'Tutup'),
(26, 'KT03', 2, 'test', 'Kolam Renang', '089213798123', 'Jl. Sisingamangaraja, Sampit, Ketapang Regency, West Kalimantan, Indonesia', '                                                <ol>\r\n                                                    <li>Tuliskan layanan apa saja yang tersedia pada tempat olahraga</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <ol>\r\n                                                    <li>Tuliskan jadwal operasi tempat olahraga</li>\r\n                                                </ol>\r\n\r\n                                            ', '                                                <ol>\r\n                                                    <li>Deskripsikan Tempat Olahraga yang anda daftarkan</li>\r\n                                                    <li>Tuliskan biaya sewa pengunjung tempat</li>\r\n                                                </ol>\r\n\r\n                                            ', '-1.8337151', '109.9615072', 'Buka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gambar_tempat`
--
ALTER TABLE `gambar_tempat`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `pemilik_tempat`
--
ALTER TABLE `pemilik_tempat`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tempat_olahraga`
--
ALTER TABLE `tempat_olahraga`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gambar_tempat`
--
ALTER TABLE `gambar_tempat`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pemilik_tempat`
--
ALTER TABLE `pemilik_tempat`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tempat_olahraga`
--
ALTER TABLE `tempat_olahraga`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
