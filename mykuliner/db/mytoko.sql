-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 03:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'adminku');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'mie '),
(2, ' mie cup');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kurir`, `tarif`) VALUES
(1, 'JNE', 10000),
(2, 'J&T Express', 15000),
(3, 'Ninja Express', 20000),
(4, 'TIKI', 25000),
(5, 'SiCepat', 15000),
(6, 'Anteraja', 15000),
(7, 'Kargo', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(7, 'deaa9108@gmail.com', 'adila156-', 'adila', '085607529120', 'jln.brantastimur');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 16, 'user user', 'BRI', 150000, 2021, '20211213151413bg.jpeg'),
(2, 16, 'user user', 'BRI', 150000, 2021, '20211213151839123.png'),
(3, 22, 'user user', 'BRI', 470000, 2021, '20211214123458bgzoom.jpg'),
(4, 18, 'user user', 'BRI', 150000, 2021, '20211214132609M S I.phd');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `kurir`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(23, 1, 2, '2021-12-16', 135000, 'J&T Express', 15000, 'sragen', 'Pending', ''),
(24, 6, 2, '2021-12-16', 100000, 'J&T Express', 15000, 'sragen', 'Pending', ''),
(25, 7, 3, '2023-11-15', 595000, 'Ninja Express', 20000, 'jln.brantastimur', 'Pending', ''),
(26, 8, 7, '2023-11-17', 470000, 'Kargo', 20000, 'jl. hasanuddin dilem', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(6, 5, 'ayam spesial', 5000, 81, 'ayamspesial.jpeg', 'MIE SEDAAP AYAM SPESIAL 69GR Mie Sedaap Ayam Spesial Merupakan salah satu varian mie yang diolah dengan bumbu kaldu lengkap dan rasa kaldu ayam spesial yang gurih. Mie Sedap juga diproses secara higienis dengan memiliki tekstur mie yang kenyal dan tidak cepat lunak.', 3),
(7, 5, 'Cheese buldak', 5000, 81, 'Cheesebuldak.jpeg', 'Mie Sedaap Korean Cheese Buldak memiliki tekstur mie yang menyerupai mie instan Korea, yaitu tebal dan kenyal. Varian rasa barunya ini juga jarang kamu jumpai pada mie instan lokal lainnya, yaitu rasa ayam buldak khas Korea yang spicy dengan ekstra bubuk keju gurih yang menambah keSedaapan Korean Cheese Buldak.', 3),
(8, 2, 'Korean Cheese Buldak', 5000, 81, 'KoreanCheeseBuldak.jpeg', 'Mie Sedaap Korean Cheese Buldak memiliki tekstur mie yang menyerupai mie instan Korea, yaitu tebal dan kenyal. Varian rasa barunya ini juga jarang kamu jumpai pada mie instan lokal lainnya, yaitu rasa ayam buldak khas Korea yang spicy dengan ekstra bubuk keju gurih yang menambah keSedaapan Korean Cheese Buldak.', 5),
(9, 4, 'ayamc rispy', 5000, 81, 'ayamcrispy.jpeg', 'Mie Sedaap adalah salah satu merek mie instan yang terkenal. Mie Sedaap dibuat dengan bahan berkualitas unggul dari rempah-rempah alami dan formulasi bahan segar. Mie Sedaap telah diterima secara luas karena pendekatannya yang memuaskan. Ini terkenal dengan mie springiness dan bawang goreng goreng kriuk-kruik. Mie Sedaap adalah mie instan terbaik di kota karena lidah Anda hanya menemukan rasa terbaik dan tidak pernah berbohong pada resep Anda. Mie Sedaap adalah satu-satunya mie intan yang mendapat pengakuan dari ISO 22000. Mie Sedaap akan terus mengembangkan rasa baru yang menarik untuk memenuhi permintaan konsumen yang berbeda.\r\n\r\nMie Sedaap sebagai satu-satunya produk mie yang memiliki sertifikasi ISO 22000 dan menjadi salah satu produk mie instan terkemuka di Indonesia, hadir dengan berbagai varian rasa yang lezat dan nikmat untuk menjadi alternatif hidangan praktis di meja makan Anda.  ', 4),
(10, 4, 'cup rawit', 5000, 81, 'cuprawit.jpeg', 'Sedaap Mie Instant Kuah Rawit Bingit Rasa Ayam Jerit merupakan salah satu varian mie instan rebus yang diolah dengan bumbu cabe rawit asli. Diproses secara higienis dengan tekstur mie yang kenyal dan tidak cepat lunak. Ideal di nikmati bersama keluarga saat cuaca dingin atau hujan.', 5),
(11, 3, 'whitecurry', 5000, 81, 'whitecurry.jpeg', 'Salah satu varian unik yang dikeluarkan oleh Mie Sedaap adalah Mie Sedaap White Curry. Adapun varian ini hadir dengan kuah berwarna putih yang sangat gurih dan creamy. Mie Sedaap White Curry hadir dengan 3 jenis bumbu yaitu bumbu bubuk, minyak, dan bubuk kari putih tanpa bubuk cabai atau saus sambal.', 5),
(12, 6, 'cup cury', 5000, 81, 'cupcury.jpeg', 'Mie Sedaap Instan Kuah Rasa Kari Spesial merupakan salah satu varian mie instan rebus yang diolah dengan bumbu rempah kari asli dengan tambahan saripati ayam untuk memperkaya citarasa selera kari di dalam mulut anda. Diproses secara higienis dengan tekstur mie yang kenyal dan tidak cepat lunak.', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
