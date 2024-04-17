-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2024 at 11:16 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frontbii_rahyabcarpet`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

/*CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;*/

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `code`) VALUES
(1, 'علی توفیقی', 'aliT'),
(2, 'زهره دهقانی', 'dehq'),
(3, 'اکبر خانی', 'AKBR'),
(4, 'dfghjkl', '1234'),
(5, 'احسان مرادی', 'EMRD'),
(6, 'الهه گندمی', 'ELHE'),
(8, 'Hosseini', 'Ho12'),
(9, 'mr saidi', 'said'),
(10, 'amir moshiri', 'amir'),
(11, 'shahr farsh', 'shar'),
(12, 'saeedi', 'sadi'),
(13, 'zargar zadeh', 'zarg'),
(14, 'TOFIGH', 'TOFI'),
(15, 'khageh ghomi', 'khag'),
(16, 'agha milani', 'agha'),
(17, 'meysam saeedi', 'mesa'),
(18, 'MOHAMMD ALI YOSOF POR', 'YOSO'),
(19, 'Ghanbari', 'Ghan'),
(20, 'sharife', 'shaf'),
(21, 'انبار داخلی', 'ANBR'),
(22, 'اکبری', 'ABRY'),
(23, 'ابریشم', 'silk'),
(24, 'راحتی', 'SR36'),
(25, 'توفیقی', 'tfgh'),
(26, 'انبار بکتاش', 'BKTS'),
(27, 'saray irani', 'sara'),
(28, 'پردازش هوشمند ', 'prhs'),
(29, 'anbar1', 'anba'),
(30, 'anbar', 'anba1'),
(31, 'اکبر یاوری', 'akya'),
(32, 'حسین حسینی', 'HSIN'),
(33, 'انبار 1', 'abr1'),
(36, 'نیاز به بررسی 1', 'GRD1'),
(37, 'نیاز به بررسی 2', 'GRD2'),
(38, 'نیاز به بررسی 3', 'GRD3'),
(39, 'نیاز به بررسی 4', 'GRD4'),
(40, 'نیاز به بررسی 5', 'GRD5'),
(43, 'ورود موقت انبار ابریشم', 'STEN'),
(44, 'mr moshiri', 'reza'),
(45, 'kozeh chi', 'koze'),
(48, 'shahgholi', 'sh12'),
(51, 'آقای شریفی اراک', 'srak'),
(52, 'شهسواری', 'shsr'),
(53, 'بکتاش ', 'BKTH'),
(54, 'جلالی ', 'JALA'),
(55, 'اقای حسنی (شیراز)', 'hasn'),
(56, 'محمد مشیری ', 'MOHA'),
(57, 'انبار رنگرزی', 'DING'),
(58, 'ZAKARIA', 'ZAKA'),
(59, 'انبار رنگی', 'RANG'),
(60, 'قزاقستان', 'khaz'),
(61, 'wool', 'wool'),
(62, 'شارما', 'SHAR'),
(63, 'مهدیان ', 'MAHD'),
(64, 'حیدر زاده', 'HIDR'),
(65, 'MOSAVI', 'MOSA'),
(66, 'SAEEDI', '6100'),
(67, 'TURKEY', 'TURK'),
(68, 'انبارپشم', 'abre'),
(69, 'مشفق', 'SHFF'),
(70, 'کاظمی', 'Kzme'),
(71, 'طارق', 'Trgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
