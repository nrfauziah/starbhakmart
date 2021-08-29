-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 06:27 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starbhakmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `produk_id`, `quantity`, `jumlah_harga`) VALUES
(1, 0, 1, 10000),
(2, 15, 1, 10000),
(3, 16, 1, 10000),
(4, 17, 1, 7000),
(5, 18, 1, 11000),
(6, 0, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`, `gambar`) VALUES
(0, 'Ice Boba', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsVe7_CwKYj9mavIVKr6h5T-9lfopIOwMCHQ&usqp=CAU'),
(15, 'Ice Boba', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsVe7_CwKYj9mavIVKr6h5T-9lfopIOwMCHQ&usqp=CAU'),
(16, 'Batagor Kuah', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC0HXkqISp9vTsEFDw4L7WaXnr612AtzF5nw&usqp=CAU'),
(17, 'Vanilla Ice', 7000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP6Q-qS7oM0gQU6qybmg7kDtexmhUL1NdmUQ&usqp=CAU'),
(18, 'Mie Ayam', 11000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmBssp-5eCi0qPewRTqGPgDZCME1dBlk7cpw&usqp=CAU'),
(19, 'Ham Cheese', 30000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXaLGiOXKg97ZQ5xUATI-Jq9WGcEZ99Bqq4Q&usqp=CAU'),
(20, 'Es Campur', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLBrkqz3cMhZasBypRVNcBAEk9B_b-ZwLJJA&usqp=CAU'),
(21, 'Egg Sandwich', 35000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROWzLo9jeH2RDuP_Mp-wpFZSi9VaQq_9MyUA&usqp=CAU'),
(22, 'Kopi', 18000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRztDQCOMh1rrvsT456aBcPHGXtu-nruAZwhQ&usqp=CAU'),
(23, 'Jus Jeruk', 8000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8XgZ1VNo8FLUUMEUbsrE7dtTpK63R4u9FcA&usqp=CAU'),
(24, 'Kebab', 15000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgjTCJ39Lrt8IPXB_5_3HWErlDPvZNKd1drA&usqp=CAU'),
(25, 'Jus Mangga', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLUo07dwPUqVKSHI415fRhRxfasdgddUoCvw&usqp=CAU'),
(26, 'Pizza', 40000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxrG3pRREMJ6Iv1qZ5tqaRmB8pWQatXAh3nA&usqp=CAU'),
(27, 'Bakso', 12000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_r7kwQKQkIJzM1L-FegUAMASFE_5_K0Q_fg&usqp=CAU'),
(28, 'Es Kelapa', 9000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiyEOR0UurcE-NCJTu2uF0FcPaawytG1RaCg&usqp=CAU'),
(29, 'Rujak Serut', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkVLfYkb4naR_1WfO8zxCMa-VrIXUM4r5IXg&usqp=CAU'),
(30, 'Sop Buah', 12000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7ZwgkoTsW5ls-eks2E1ikCyqZX0-VoPS3xw&usqp=CAU'),
(31, 'Roti Bakar', 7000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5QYKv3YcxpjlbyRHFP4GbnTFGz4LZ52SM8Q&usqp=CAU'),
(32, 'Lumpia Basah', 8000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTxb0ohlZJJYUBHdRc00WnF7Vxa9-ueUlp7Q&usqp=CAU'),
(33, 'Es Teh', 6000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpqqcLjm9bb2hn9SnuIfyZHjvBh7rYhP5W5w&usqp=CAU'),
(34, 'Dessert Oreo', 25000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoMVEnbRiLBnZOEjKTNO0BruN9_0aOpJhgxQ&usqp=CAU'),
(37, 'Es Krim', 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzEx4XUQxKyKy5NzAO-PwBYUXjC9ESkvrhSA&usqp=CAU'),
(38, 'Es Krim', 30000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHj_WoBQ504yBB_cnDtZ9OOF188F7HrViiNg&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `diskon`, `ppn`, `total_bayar`) VALUES
(1, 5800, 1044, 53244);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
