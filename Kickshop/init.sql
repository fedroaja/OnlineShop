-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Bulan Mei 2019 pada 07.05
-- Versi server: 10.3.14-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9593869_kickshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Adi Wirya', 'adiwirya777@gmail.com', 'humming_bird-01.png', '$2y$10$UAp1GsOHKG0BoP7zybDnC.Kdv9/iuLxfwHGBwWEd5JnEzAppmgATK', 1, 1, 1557293317),
(12, 'Adi', 'adi123@gmail.com', 'default.jpg', '$2y$10$UAp1GsOHKG0BoP7zybDnC.Kdv9/iuLxfwHGBwWEd5JnEzAppmgATK', 2, 1, 1557293317),
(15, 'abcd', 'abcd@yahoo.com', 'default.jpg', '$2y$10$MKJrfR7N3SFG9N7la5srauXgQ5333F27yn4jd.AmhTWwrMYukXgNK', 2, 1, 1558142158),
(16, 'Aldo', 'richardyoseph37@gmail.com', 'default.jpg', '$2y$10$WWkjt6//SuCkgjKtBChm9OPcf1sispeAI1UkwfRxvPw9UfHKFoRNG', 2, 0, 1558333909),
(18, 'adi wirya', 'dreagustinus11@gmail.com', 'default.jpg', '$2y$10$dsrbDpL6h6HL0oQVy6mJgOPrxyMejtFufUY2SpPN6xZcCyZeajHxq', 2, 0, 1558417162),
(21, 'Gusdur', 'fedraja@gmail.com', 'default.jpg', '$2y$10$.PFJfVxtEwJh7BxbEhcWmupMOhksHWXLuq2F2Yp8TXWzy5CAsIFpi', 2, 1, 1558421079);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` varchar(20) NOT NULL,
  `B_Brand` varchar(20) NOT NULL,
  `B_name` varchar(100) NOT NULL,
  `B_color` varchar(100) NOT NULL,
  `B_category` varchar(100) NOT NULL,
  `B_size` varchar(50) NOT NULL,
  `B_stock` int(11) NOT NULL,
  `B_photo` longtext NOT NULL,
  `B_description` longtext NOT NULL,
  `B_photo2` longtext NOT NULL,
  `B_photo3` longtext NOT NULL,
  `B_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `B_Brand`, `B_name`, `B_color`, `B_category`, `B_size`, `B_stock`, `B_photo`, `B_description`, `B_photo2`, `B_photo3`, `B_price`) VALUES
('B0019', 'Adidas', 'Force 7', 'WH_BLCK', 'WN_CS', '37', 10, '1_(1)4.jpg', 'Sneaker era 70-an ini muncul pertama kali sebagai sepatu basket yang mendominasi permainan. Tidak butuh waktu yang lama, sepatu ini juga menjadi bagian dari dunia skateboarding dan street style (belum lagi kiprah dalam budaya hip-hop). Sepatu ini mempertahankan tampilan yang klasik dengan upper yang dibuat dari bahan kulit berlapis. Dilengkapi semua detail autentik, termasuk tepi 3-stripes model zigzag dan shell toe berbahan karet yang khas.', '1_(1)5.jpg', '1_(1)6.jpg', 1100000),
('B0020', 'Vans', 'Old Skool', 'WH_BLCK', 'MN_CS', '41', 4, 'VansOldSkool.jpg', 'The Old Skool, Vans classic skate shoe and the first to bear the iconic side stripe, has a low-top lace-up silhouette with a durable suede and canvas upper with padded tongue and lining and Vans signature Waffle Outsole. ', 'vansOldSchool.jpg', 'VansOldSkool1.jpg', 850000),
('B0021', 'Vans', 'Old Skool', 'WH_BLCK', 'MN_CS', '42', 7, 'VansOldSkool.jpg', 'The Old Skool, Vans classic skate shoe and the first to bear the iconic side stripe, has a low-top lace-up silhouette with a durable suede and canvas upper with padded tongue and lining and Vans signature Waffle Outsole. ', 'vansOldSchool1.jpg', 'VansOldSkool3.jpg', 850000),
('B0022', 'Vans', 'Old Skool', 'WH_BLCK', 'MN_CS', '43', 9, 'VansOldSkool.jpg', 'The Old Skool, Vans classic skate shoe and the first to bear the iconic side stripe, has a low-top lace-up silhouette with a durable suede and canvas upper with padded tongue and lining and Vans signature Waffle Outsole. ', 'vansOldSchool2.jpg', 'VansOldSkool5.jpg', 850000),
('B0023', 'Vans', 'Checkerboard Slip-On', 'WH_BLCK', 'MN_CS', '40', 2, 'vansSliponMain.png', 'The Classic Slip-On has a low profile, slip-on canvas upper with all-over checker print, elastic side accents, Vans flag label and Vans original Waffle Outsole.', 'vansCheckerboard(2).jpg', 'vansCheckerboard(3).jpg', 950000),
('B0025', 'Nike', 'Air Force 1', 'WH_BLCK_BLU_RD_GR', 'MN_SP', '42', 8, 'NikeAirForce1.jpg', 'The legend lives on in the Nike Air Force 1 \'07, a modern take on the iconic AF-1 that blends classic style and fresh details.', 'NikeAirForce1.png', 'NikeAirForce1(2).jpg', 1250000),
('B0026', 'Nike', 'Phantom React', 'PR_BR', 'WN_SP', '40', 6, 'NikePhantomReact.jpg', 'Soft to the touch, the Nike Epic Phantom React Flyknit is lace-free for a slip-on style that gets you up and running in no time. A snug, secure, sock-like fit within a breathable Flyknit upper will make you feel as though the Phantom \"disappears\" as you run.', 'NikePhantomReact(2)1.jpg', 'NikePhantomReact(3).jpg', 1300000),
('B0027', 'Nike', 'Zoom Pegasus Turbo', 'WH_PR_RD', 'MN_CS_SP', '39', 5, 'NikeZoomPegasus.jpg', 'The Nike Zoom Pegasus Turbo is the Pegasus you know and love with major upgrades for speed. The feather-light upper looks as fast as it feels, while the revolutionary Nike ZoomX foam that was designed for elite Nike runners during the Breaking 2 attempt brings record-breaking speed and responsiveness to your daily training runs.', 'NikeZoomPegasus(2).jpg', 'NikeZoomPegasus(3).jpg', 2600000),
('B0028', 'Nike', 'Classic Cortez', 'WH_BLCK_GR', 'WN_CS_SP', '38', 4, 'NikeClassicCortez.jpg', 'The Nike Classic Cortez Women\'s Shoe is Nike\'s original running shoe, designed by Bill Bowerman and released in 1972. This version features a leather and synthetic leather construction for added durability.', 'NikeClassicCortez(2).jpg', 'NikeClassicCortez1.jpg', 1200000),
('B0029', 'Air Jordan', '1', 'WH_RD', 'MN_CS', '39_43', 0, 'AirJordan1(2).jpg', 'A black and red colorway violated the league’s uniform policy, earning a stern letter from league officials and generating a $5,000 fine each time the player wore the shoes on court. It is with this brazen charisma that the Air Jordan lineage was born.', 'AirJordan1(2)1.jpg', 'AirJordan1.jpg', 1000000),
('B0030', 'Air Jordan', 'X', 'BLCK_BLU', 'MN_WN_SP', '38_40_42', 5, 'AirJordan10(2).jpg', 'The Air Jordan X wasn’t solely built as a tribute to its eponymous legend. Just like the other nine shoes in the series, its superior performance translated to the court, and MJ proved it with his 55-point onslaught in his first game back in New York City on March 18th in 1995, the infamous “double nickel” game.', 'AirJordan10.png', 'AirJordan10(3).jpg', 1300000),
('B0031', 'Air Jordan', 'XXXI', 'WH_BLCK_RD', 'CS_SP', '40_42_46', 7, 'AirJordanXXXI.jpg', 'At the hands of designer Tate Kuerbis, three decades of Air Jordan footwear innovation come together as the Air Jordan XXXI. For the first time ever, the iconic swoosh meets the legendary Jordan Jumpman and Wings logos on a single silhouette. With Flyweave, modern construction finds its voice and the runway for the future of Jordan is cleared.', 'AirJordanXXXI(3).png', 'AirJordanXXXI(2).jpg', 1700000),
('B0032', 'Yeezy', '350V2', 'BLU_PR_RD', 'WN_CS', '37_40', 4, 'Yeezy350V2.jpg', 'The YEEZY BOOST 350 V2 Clay features an upper composed of two-toned re-engineered Primeknit. The post-dyed monofilament side stripe is woven into the beautiful design', 'Yeezy350V2(2).jpg', 'Yeezy350V2(3).jpg', 750000),
('B0033', 'Yeezy', 'Boost 700 Analog', 'WH_BLU_RD_GR', 'MN_CS_SP', '38_42_44', 7, 'YeezyBoost700.jpg', ' As one of the harbingers of the ever-present dad shoe trend, the adidas Yeezy Boost 700 continues its reign as one of the line-up\'s many poster', 'YeezyBoost700(2).jpg', 'YeezyBoost700.jpg', 1650000),
('B0034', 'Yeezy', 'Boost 500 Inertia', 'BLCK_YL_PR', 'MN_WN_CS', '37_42', 9, 'YeezyBoost500.jpg', 'Add heavy pressure on your favorite sneakerhead and cop the adidas Yeezy Boost 700 Inertia. This Yeezy Boost 700 comes with a grey upper, grey midsole with orange accents, and a white sole', 'YeezyBoost500(3)1.jpg', 'YeezyBoost500(2).jpg', 1850000),
('B0035', 'Reebok', 'Crossfit Nano 8', 'BLCK_YL_GR', 'MN_CS', '40_42_45', 0, 'ReebokCrossfit.jpg', 'Since 2010, Reebok has forged the Nano through sweat, testing, re-designing and re-testing to create our most versatile and dependable CrossFit shoe in the box. The Nano 8 was developed with insight from the CrossFit community, and has been engineered for maximum comfort. The re-engineered Flexweave upper provides breathability, stability, and durability, and the added cushioning in the forefoot help keep you comfortable. The CrossFit-specific outsole gives you grip in the box so you can hit your PRs.', 'ReebokCrossfit(2).jpg', 'ReebokCrossfit(3).jpg', 1200000),
('B0036', 'Reebok', 'Zig Pulse 3', 'WH_BLCK_BLU_PR', 'MN_CS_SP', '39_43', 3, 'ReebokZigPulse.jpg', 'These men\'s training shoes feature an innovative Zig outsole that disperses energy for enhanced heel-to-toe comfort on every stride. A synthetic midfoot cage offers lightweight support and stability. The breathable, two-tone mesh upper adds extra pop whether you\'re at the gym or out on the track.', 'ReebokZigPulse(2).jpg', 'ReebokZigPulse1.jpg', 2100000),
('B0037', 'Reebok', 'Club C 85 Vintage', 'WH_YL_RD', 'WN_CS', '40_41_42', 5, 'ReebokClubC.jpg', 'Take it down to pure essence with clean lines and a classic lineage. A Union Jack symbol along the side profile calls up heritage style. No excess, no riffraff. Made for icons.', 'ReebokClubC(2).jpg', 'ReebokClubC1.jpg', 1450000),
('B0038', 'Reebok', 'Crossfit Grace', 'BLCK_BLU_RD', 'WN_SP', '39_40_41', 2, 'ReebokCrossfitGrace.jpg', 'Built for the women of the CrossFit community, the durable Reebok CrossFit Grace helps you fly through your workout with agility and support. Workout-tested, yet sleek in design, the Grace is built just as strong as it is beautiful.', 'ReebokCrossfitGrace(2).jpg', 'ReebokCrossfitGrace1.jpg', 1400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `C_index` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Barang` varchar(10) NOT NULL,
  `C_Jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`C_index`, `ID_User`, `ID_Barang`, `C_Jumlah`, `harga`, `done`) VALUES
(1, 15, 'B0020', 1, 850000, 1),
(8, 15, 'B0017', 1, 3000000, 1),
(9, 12, 'B0020', 2, 850000, 1),
(11, 12, 'B0021', 2, 850000, 1),
(12, 1, 'B0017', 10, 100000, 1),
(15, 12, 'B0024', 1, 850000, 1),
(16, 1, 'B0031', 1, 1700000, 1),
(17, 1, 'B0038', 1, 1400000, 1),
(18, 1, 'B0029', 1, 1000000, 1),
(19, 1, 'B0036', 1, 2100000, 1),
(20, 1, 'B0029', 1, 1000000, 1),
(21, 1, 'B0020', 1, 850000, 1),
(22, 1, 'B0038', 2, 1400000, 1),
(23, 1, 'B0038', 2, 1400000, 1),
(24, 1, 'B0030', 1, 1300000, 1),
(25, 1, 'B0038', 1, 1400000, 1),
(26, 1, 'B0029', 1, 1000000, 1),
(27, 21, 'B0035', 6, 1200000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderbarang`
--

CREATE TABLE `orderbarang` (
  `O_index` int(11) NOT NULL,
  `ID_Order` varchar(50) NOT NULL,
  `ID_User` varchar(10) NOT NULL,
  `ID_Barang` varchar(10) NOT NULL,
  `O_harga` int(11) NOT NULL,
  `O_jumlah` int(11) NOT NULL,
  `O_tgl` date NOT NULL,
  `O_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderbarang`
--

INSERT INTO `orderbarang` (`O_index`, `ID_Order`, `ID_User`, `ID_Barang`, `O_harga`, `O_jumlah`, `O_tgl`, `O_address`) VALUES
(24, 'O0001', '1', 'B0031', 1700000, 1, '2019-05-20', 'fedro, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(25, 'O0001', '1', 'B0038', 1400000, 1, '2019-05-20', 'fedro, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(26, 'O0001', '1', 'B0029', 1000000, 1, '2019-05-20', 'fedro, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(27, 'O0001', '1', 'B0036', 2100000, 1, '2019-05-20', 'fedro, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(28, 'O0002', '1', 'B0029', 1000000, 1, '2019-05-20', 'fedro, budi@gmail.com, curug, tangerang, banten, 152991'),
(29, 'O0003', '1', 'B0020', 850000, 1, '2019-05-20', 'fedro, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(30, 'O0004', '1', 'B0038', 1400000, 2, '2019-05-20', 'testing, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(31, 'O0005', '1', 'B0038', 1400000, 2, '2019-05-21', 'guntur, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(32, 'O0005', '1', 'B0030', 1300000, 1, '2019-05-21', 'guntur, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(33, 'O0006', '1', 'B0038', 1400000, 1, '2019-05-21', 'Agus, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(34, 'O0006', '1', 'B0029', 1000000, 1, '2019-05-21', 'Agus, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209'),
(35, 'O0007', '21', 'B0035', 1200000, 6, '2019-05-21', 'gusdur, fedro_aja@yahoo.com, curug wetan rt03/09, tangerng, banten, 18209');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_info`
--

CREATE TABLE `user_info` (
  `ID_User` varchar(5) NOT NULL,
  `akses` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_info`
--

INSERT INTO `user_info` (`ID_User`, `akses`) VALUES
('A001', 'A'),
('A002', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Products', 'admin1', 'fas fa-fw fa-dolly', 1),
(11, 1, 'Transaction', 'customer', 'fas fa-fw fa-dolly', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'abcd@yahoo.com', 'o0PLYBQKPELcn1w9ymYe5NAuPiBjVsuvI6s9V2zWZQk=', 1558142158),
(2, 'richardyoseph37@gmail.com', '889qY/AQDlwcpNb6SQ+gYSNZN4FqXe8UQOOf+xhTYOI=', 1558333909),
(4, 'dreagustinus11@gmail.com', 'uU0ZHJ1kBuDouAFWTsyTh4hfyA/exKoyhEX4KXsQGF4=', 1558417162),
(5, 'adiwirya7@gmail.com', '6lBwIXVJ1CajZGOSRRQsPBaQKqeqfXQTAJvOTUMCcWc=', 1558417359);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`C_index`);

--
-- Indeks untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD PRIMARY KEY (`O_index`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `C_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  MODIFY `O_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
