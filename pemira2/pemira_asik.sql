-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Feb 2017 pada 13.36
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemira_asik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminku`
--

CREATE TABLE `adminku` (
  `id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `adminku`
--

INSERT INTO `adminku` (`id`, `password`) VALUES
('admin', '5136850b6c8f3ebc66122188347efda0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminpanel`
--

CREATE TABLE `adminpanel` (
  `id` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `adminpanel`
--

INSERT INTO `adminpanel` (`id`, `password`) VALUES
('admin', 'adminpanel'),
('admin', 'adminpanel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calonpresiden`
--

CREATE TABLE `calonpresiden` (
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `progdi` varchar(200) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL,
  `no` varchar(20) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calonpresiden`
--

INSERT INTO `calonpresiden` (`nama`, `nim`, `ttl`, `status`, `progdi`, `visi`, `misi`, `no`, `foto`) VALUES
('Khulqi bos', 'A11.2014.08069', 'Semarang', 'Mahasiswa', 'Ilmu Komputer', 'Untuk Udinus lebih baik', 'Kebersamaan udinus', '3', '553426.jpg'),
('Faza Koala', 'A11.2014.08079', 'Indonesia', 'Mahasiswa', 'TI S1', 'Indonesia Pasti Bisa', 'Indonesia Juara Piala Dunia 2019', '1', '327486.jpg'),
('kukuh', 'A12.1197.0780', '11', 'Lajang', 'Ilmu Komputer', 'Melihat Udinus Jaya Bersama', 'Membuat Udinus Menjadi Universitas nomer 1 di Dunia', '2', '220232.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calonwapres`
--

CREATE TABLE `calonwapres` (
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `progdi` varchar(200) NOT NULL,
  `no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calonwapres`
--

INSERT INTO `calonwapres` (`nama`, `nim`, `ttl`, `status`, `progdi`, `no`) VALUES
('Prihatma', 'A11.2014.08083', 'Semarang', 'Indonesia', 'TI S1', '1'),
('Muhammad', 'A11.2014.08093', 'Semarang', 'Mahasiswa', 'Ilmu Komputer', '3'),
('Priambodo', 'A12.2495.2090', '21', 'lajnag', 'Ilmu Komputer', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poling`
--

CREATE TABLE `poling` (
  `nim` varchar(20) NOT NULL,
  `vote` int(3) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poling`
--

INSERT INTO `poling` (`nim`, `vote`, `status`) VALUES
('8083', 1, 'Sudah'),
('A11909', 2, 'Sudah'),
('A1234', 1, 'Sudah'),
('dsajkdnkas', 1, 'Sudah'),
('jos', 1, 'Sudah'),
('oke', 2, 'Sudah'),
('pak', 3, 'Sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id` int(5) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Nim` varchar(20) NOT NULL,
  `Jurusan` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar`
--

INSERT INTO `tb_daftar` (`id`, `Nama`, `Nim`, `Jurusan`, `Email`, `Password`) VALUES
(1, 'kukuh', '', 'kdsadioa', 'kukuhprias@gmail.com', 'kukuh'),
(2, 'kukuh', '', 'ti', 'kukuhprias@gmail.com', 'khjk'),
(3, 'kukuh', '', 'abcd', 'kukuhprias@gmail.com', '5d9bfdd903284815f0eed2c78f7c8d'),
(4, 'kukuh', '', 'dklasjd', 'kukuhprias@gmail.com', '97d91e87018a76f741ad631eaa707c'),
(5, 'kukuh', '', 'abcd', 'kukuhprias@gmail.com', '7d7e97a737ab5450304c9bfbb457854d'),
(6, 'faza', '', 'djaksjd', 'kukuhprias@gmail.com', 'a9e0514840981d9de25ee76ecab65f'),
(7, 'ipat', '', 'djkashd', 'kukuhprias@gmail.com', '63214b58f597b7ecda221ae5dacaa03e'),
(8, 'ivanda', '', 'bdsajdjsa', 'kukuhprias@gmail.com', '2c42e5cf1cdbafea04ed267018ef1511'),
(9, 'JIKI', '', 'JIKI', 'JIKI@jiki.com', 'enak'),
(10, 'Khulqi', '', 'JIKI', 'JIKI@jiki.com', 'enak'),
(11, 'Khulqi', '', 'JIKI', 'JIKI@jiki.com', 'moimoi'),
(12, 'Indonesia', '', 'PLPL', 'PLPLPL', 'SSSS'),
(13, 'pi', '', 'ti', 'kesone01@gmail.com', '72ab8af56bddab33b269c5964b26620a'),
(14, 'Poi', '', 'poi', 'poi@po.com', 'poi'),
(15, 'Ryan Koala', '', 'JIKI', 'JIKI@jiki.com', 'jiko'),
(16, 'Ryan Koala', '', 'JIKI', 'JIKI@jiki.com', '123'),
(17, 'qwe', '', 'qwe', 'qwe', 'qwe'),
(18, 'faza', '', 'po2', 'poi@po.com', 'poi'),
(19, 'Prihatama', '', 'Vote', 'vOTE@Vote.com', 'poipoi'),
(20, 'kukuh', 'A11909', 'ti', 'kukuhprias@gmail.com', '7d7e97a737ab5450304c9bfbb457854d'),
(21, 'jos', 'jos', 'jos', 'kukuhprias@gmail.com', '6f7f3b0fb100c0b0fb21a0287cd72f7b'),
(22, 'oke', 'oke', 'oke', 'kukuhprias@gmail.com', 'oke'),
(23, 'dajshdjkashd', 'dsajkdnkas', 'bdsakjbdkj', 'kukuhprias@gmail.com', '7d7e97a737ab5450304c9bfbb457854d'),
(24, 'ivan', 'A1234', 'fasilkom', 'ivan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(25, 'ivan', 'A1234', 'TI', 'ivan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(26, 'pak', 'pak', 'pak', 'pak@gmail.com', '8d569333abbc9e26646dc6a398891324'),
(27, 'prihatmafaza', '8083', 'Ti S1', 'prihatmafaza@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminku`
--
ALTER TABLE `adminku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calonpresiden`
--
ALTER TABLE `calonpresiden`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `calonwapres`
--
ALTER TABLE `calonwapres`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
