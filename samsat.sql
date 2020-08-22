-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 10:47 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsat`
--

-- --------------------------------------------------------

--
-- Table structure for table `aparatur`
--

CREATE TABLE `aparatur` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aparatur`
--

INSERT INTO `aparatur` (`id`, `nama`, `nip`, `jabatan`, `bagian`, `foto`) VALUES
(4, 'Eko Kurniadi', '123', 'Kepala Badan Keuangan Daerah Provinsi Jambi UPTD-P', 'Penata TK I', 'aparatur1592541323.jpg'),
(5, 'Elpa Oswari, SH', '2345', 'Kepala Perwakilan PT Asuransi Keuangan Jasaraharja', 'Keuangan Jasa Raharja', 'aparatur1592541461.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `berita` text NOT NULL,
  `tanggal_posting` date NOT NULL,
  `posted_by` varchar(30) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `id_kategori`, `judul`, `berita`, `tanggal_posting`, `posted_by`, `foto`, `active`) VALUES
(1, 1, 'Berita Terbaru', '<p>test input</p>', '2019-01-01', 'Admin', 'berita1580068731.jpg', 'non-active'),
(2, 1, 'Berita Terbaru', '<p>ini adalah berita</p>', '2020-01-26', 'Admin', 'berita1580068716.jpg', 'non-active'),
(3, 1, 'test', '<p>dkfnadnflakdsfn,adsnf,mansd</p>', '2020-01-27', 'Admin', 'berita1580068689.jpg', 'non-active'),
(4, 1, 'Detik News', '<p>PDIP DKI Jakarta menyesalkan ternyata Direktur Utama PT TransJakarta <a href=\"https://www.detik.com/tag/donny-andy-saragih\">Donny Andy S Saragih</a> adalah terpidana kasus penipuan. Menurutnya, status Donny bisa merusak citra TransJakarta yang sudah baik.</p><p>\"Harapan masyarakat (terhadap TransJ) sudah hampir terpenuhi. Tapi dengan Dirut yang baru seperti ini kan kita sayangkan, kepercayaan masyarakat yang begitu tinggi tadi bisa-bisa jadi menurun begitu saja,\" ucap Ketua Fraksi PDIP DKI Jakarta Gembong Warsono, saat dihubungi, Senin (27/1/2020).</p><p>\"Iya lah (merusak) citra TransJ dan Pemprov DKI Jakarta kan,\" kata Gembong.</p>', '2020-01-27', 'Admin', 'berita1580096357.jpeg', 'non-active'),
(5, 1, 'dsfafaf', '<p> Spesifikasi :</p><p>- Mobil Keluarga</p><p>- abc</p><p>- def</p>', '2020-03-13', 'admin', 'berita1584088057.jpg', 'active'),
(6, 2, 'Pemutihan Pajak 2020', '<p>jfkasjfkajsfhklahldfk</p>', '2020-06-22', 'Admin', 'berita1592831258.PNG', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerja`
--

CREATE TABLE `bidang_kerja` (
  `id` int(11) NOT NULL,
  `icons` varchar(30) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `active` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_kerja`
--

INSERT INTO `bidang_kerja` (`id`, `icons`, `bidang`, `deskripsi`, `active`) VALUES
(10, 'fa fa-balance-scale', 'Penata TK I', '<p>Penata TK I</p>', 'active'),
(11, 'fa fa-home', 'Keuangan Jasa Raharja', '<p>Keuangan Jasa Raharja</p>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id`, `provinsi`, `kabupaten`, `kecamatan`) VALUES
(1, 'Jambi', 'Jambi', 'Kota Baru'),
(2, 'Jawa Barat', 'Jawa Barat', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat_fiskal`
--

CREATE TABLE `detail_surat_fiskal` (
  `id` int(11) NOT NULL,
  `no_seri` varchar(30) NOT NULL,
  `tembusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_surat_fiskal`
--

INSERT INTO `detail_surat_fiskal` (`id`, `no_seri`, `tembusan`) VALUES
(1, '000001', 'Yth. Kepala Badan Keuangan Daerah Provinsi Jambi'),
(2, '000001', 'Yth. Sdr. Kasi STNK Polda Jambi'),
(3, '000001', 'Arsip'),
(7, '000002', 'YTH. SDHFSAHFKADFHK'),
(8, '000002', 'YTH. KJSDFHKAJSFHKA'),
(9, '000002', 'ARSIP');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `deskripsi`) VALUES
(1, 'galeri1580098460.jpg', 'Kegiatan 1'),
(3, 'galeri1580098460.jpg', 'Kegiatan 1'),
(4, 'user1580188543.png', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'Kepala Badan Keuangan Daerah Provinsi Jambi UPTD-PPD Kota Jambi'),
(2, 'Kepala Perwakilan PT Asuransi Keuangan Jasaraharja');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id` int(11) NOT NULL,
  `jenis_kendaraan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `jenis_kendaraan`) VALUES
(1, 'Pickup'),
(2, 'Sedan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `kategori_berita` varchar(80) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori_berita`, `active`) VALUES
(1, 'Berita Desa', 'active'),
(2, 'Pemutihan Pajak', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `email`, `no_telp`) VALUES
(1, '<p>Jalan Mergosari</p>', 'email@gmail.com', '085296072649');

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` int(11) NOT NULL,
  `misi` text NOT NULL,
  `active` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `misi`, `active`) VALUES
(1, '<p>1. Mengatur dan Mengendalikan Pertumbuhan Penduduk seimbang</p><p>2. Meningkatkan Ketahanan dan Kesejahteraan Keluarga</p><p>3. Meningkatkan Pengelolaan Potensi Keluarga</p><p>4. Meningkatkan Dukungan manajemen yang handal dalam pengendalian Penduduk, Ketahanan keluarga </p><p>    dan Keluarga Berencana</p>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `first_name`, `last_name`, `email_address`, `telp`, `pesan`, `status`) VALUES
(1, 'afadsf', 'jdsfsa', 'ekokurniadi@gmail.com', '0852965465', 'gsfdgsfdgsfd', 1),
(2, 'adfadfadf', 'dfadf', 'ekokurniadi@gmail.com', '0852965465', 'dfasdfadfadfa', 1),
(3, 'dfadsfadf', 'dfadsfas', 'ekokurniadi@gmail.com', '0852965465', 'dfasdfadfa', 1),
(4, 'dfadsfadf', 'dfadfaf', 'ekokurniadi@gmail.com', '08555', 'adsfadfadfadfaf', 1),
(5, 'Dino', 'Doni', 'Dino@example.com', '085566778899', 'Website nya keren gan :)', 1),
(6, 'Eko', 'Kurniadi', 'ekokurniadi.02@gmail.com', '085296072649', 'Test', 1),
(7, 'Eko', 'Kurniadi', 'ekokurniadi.02@gmail.com', '0895604730750', 'Website nya keren, sangat modis', 1),
(8, 'eko', 'Kurniadi', 'ekokurniadi@gmail.com', '0852965465', 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `sejarah`) VALUES
(1, '<p>abc</p>');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `foto`, `title`, `subtitle`) VALUES
(4, 'slider1592665550.jpg', 'Samsat', 'Kota Jambi'),
(5, 'slider1592665583.jpg', 'Selamat Datang di Website Samsat Jambi', 'Kota Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `surat_fiskal`
--

CREATE TABLE `surat_fiskal` (
  `id` int(11) NOT NULL,
  `no_seri` varchar(20) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `nomor_polisi` varchar(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `merktype_kendaraan` varchar(50) NOT NULL,
  `tahuncc_kendaraan` varchar(50) NOT NULL,
  `warna_kendaraan` varchar(50) NOT NULL,
  `nomor_chasis` varchar(20) NOT NULL,
  `nomor_mesin` varchar(15) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `bbn_kb_sebesar` double DEFAULT '0',
  `tanggal_bbn_kb` date DEFAULT NULL,
  `pkb_sebesar` double DEFAULT '0',
  `tanggal_pkb` date DEFAULT NULL,
  `daerah_tujuan` varchar(100) NOT NULL,
  `untuk_atas_nama` varchar(100) NOT NULL,
  `alamat_pemilik` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_swdkllj` varchar(15) NOT NULL,
  `tanggal_swdkllj` date NOT NULL,
  `tanggal_akhir_berlaku_swdkllj` date NOT NULL,
  `pejabat_uptd` varchar(50) NOT NULL,
  `pejabat_jasaraharja` varchar(50) NOT NULL,
  `arsip` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_fiskal`
--

INSERT INTO `surat_fiskal` (`id`, `no_seri`, `no_surat`, `nomor_polisi`, `nama_pemilik`, `alamat`, `merktype_kendaraan`, `tahuncc_kendaraan`, `warna_kendaraan`, `nomor_chasis`, `nomor_mesin`, `jenis`, `bbn_kb_sebesar`, `tanggal_bbn_kb`, `pkb_sebesar`, `tanggal_pkb`, `daerah_tujuan`, `untuk_atas_nama`, `alamat_pemilik`, `tanggal_surat`, `no_swdkllj`, `tanggal_swdkllj`, `tanggal_akhir_berlaku_swdkllj`, `pejabat_uptd`, `pejabat_jasaraharja`, `arsip`) VALUES
(1, '000001', '001 / 000001 / FAD / VI / 2020', 'BH 9480 AS', 'KHOIRIAH', 'JL. RADJA YAMIN RT. 009 KEL. SELAMAT KEC. TELANAIPURA KOTA JAMBI', 'Suzuki/Futura ST 150', '2014/1.493 CC', 'Hitam', 'MHYESL415EJ304634', 'G51AID941705', 'Pickup', 0, '2020-06-19', 2213400, '2021-05-13', 'Jambi', 'BAIQ SUTRAWATI', 'AIKMUAL BARAT BARU RT 001 KEL AIKMUAL KEC. PRAYA PROVINSI NUSA TENGGARA BARAT', '2020-06-08', '0151129', '2020-06-08', '2021-05-13', 'Eko Kurniadi', 'Elpa Oswari, SH', 0),
(2, '000002', '973 /00001 /FAD /VI /2020', 'BH 1234 XX', 'EKO KURNIADI', 'JALAN RA KARTINI RT 38', 'Avanza', '2020/1.300 CC', 'Hitam', 'JHDFKJAHKDFHAK', 'DFAKJFHKAJFH', 'Pickup', 0, '0000-00-00', 2500000, '2020-06-22', 'Jawa Barat', 'EKO KURNIADI', 'JALAN RA KARTINI RT 38', '2020-06-22', '123456', '2020-06-22', '2020-06-25', 'Eko Kurniadi', 'Elpa Oswari, SH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `tentang_kami` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `logo`, `tentang_kami`) VALUES
(1, 'logo1580067792.png', '<p data-f-id=\"pbf\" xss=removed>Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id` int(11) NOT NULL,
  `tipe_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id`, `tipe_kendaraan`) VALUES
(1, 'Suzuki/Futura ST 150'),
(2, 'Avanza');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Pengawas') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'admin', 'admin', '12345', 'Admin', 'user1580114086.jpg'),
(2, 'admin2', 'admin2', 'admin2', 'Admin', 'user1592831023.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `visi` text NOT NULL,
  `active` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `visi`, `active`) VALUES
(1, '<p>Terwujudnya Keluarga Kecil Bahagia dan Sejahtera </p>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `warna`) VALUES
(1, 'Hitam'),
(2, 'Putih');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aparatur`
--
ALTER TABLE `aparatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_kerja`
--
ALTER TABLE `bidang_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_surat_fiskal`
--
ALTER TABLE `detail_surat_fiskal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_fiskal`
--
ALTER TABLE `surat_fiskal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aparatur`
--
ALTER TABLE `aparatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang_kerja`
--
ALTER TABLE `bidang_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_surat_fiskal`
--
ALTER TABLE `detail_surat_fiskal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_fiskal`
--
ALTER TABLE `surat_fiskal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
