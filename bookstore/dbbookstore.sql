-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Okt 2019 pada 14.55
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbookstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(8) NOT NULL,
  `nm_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(1) NOT NULL,
  `blokir` enum('Y','T') NOT NULL,
  `tgldaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nm_pengguna`, `username`, `password`, `email`, `level`, `blokir`, `tgldaftar`) VALUES
('U-000001', 'Administrator', 'admin', 'YWRtaW4=', 'admin@gmail.com', '1', 'T', '2016-09-12'),
('U-000002', 'Staff', 'staff', 'c3RhZmY=', 'staff@gmail.com', '2', 'T', '2016-09-12'),
('U-000003', 'Manager', 'manager', 'bWFuYWdlcg==', 'manager@gmail.com', '3', 'T', '2016-09-12'),
('U-000004', 'Abdullah Syafii', 'syafii', 'MTIzNA==', '', '1', 'T', '2018-02-13'),
('U-000007', 'YUSUF', 'YUSUF', '1234', 'yusuf@gmail.com', '1', 'T', '2018-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(1, 'KOMPUTER'),
(7, 'ILMU KEDOKTERAN'),
(8, 'pendidikan alam9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mybooks`
--

CREATE TABLE `tbl_mybooks` (
  `book_id` int(11) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mybooks`
--

INSERT INTO `tbl_mybooks` (`book_id`, `ISBN`, `category_id`, `title`, `author`, `price`, `publisher_id`, `img`, `publish_date`) VALUES
(1, '978-602-6232-24-3', 1, 'Belajar ngoding untuk pemula', 'didik setiawan', 57000, 2, '045835-icon.png', '2018-11-02'),
(2, '978-602-6232-24-2', 1, 'Pemrograman web php', 'abdullah', 112500, 2, '045901-buku1.jpg', '2018-11-06'),
(3, '987-602-6232-25-2', 7, 'BUMI MANUSIA', 'hendri', 87000, 5, '050201-User-Group-icon.png', '2018-11-07'),
(6, '978-602-6232-17-1', 7, 'DEMAM BERDARAH', 'ahmad yani', 99000, 4, '050248-User-red-icon.png', '2018-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_publishers`
--

CREATE TABLE `tbl_publishers` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_publishers`
--

INSERT INTO `tbl_publishers` (`publisher_id`, `publisher_name`) VALUES
(1, 'ERLANGGA'),
(2, 'INFORMATIKA'),
(4, 'Balai Pustaka'),
(5, 'Bumi Aksara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_mybooks`
--
ALTER TABLE `tbl_mybooks`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_mybooks`
--
ALTER TABLE `tbl_mybooks`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
