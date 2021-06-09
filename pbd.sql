-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 10:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `Pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `Pesan`) VALUES
(1, 'yuyuuyuyuy\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 4),
(5, 2, 3),
(6, 2, 4),
(9, 1, 3),
(10, 1, 5),
(12, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `id_book` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(123) NOT NULL,
  `uploader` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahunterbit` varchar(128) NOT NULL,
  `ISBN` varchar(128) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`id_book`, `cat`, `title`, `uploader`, `penulis`, `penerbit`, `tahunterbit`, `ISBN`, `Foto`, `date`) VALUES
(1, 1, 'Sihir Kelam (A Darker Shade of Magic)', 'thoriqaziz.muhammad@gmail.com', 'V.E Schwab', 'Gramedia Pustaka Utama', '2018', '9786020623313', 'DxwqcjiXQAACgrk.jpg', 1568547545),
(2, 2, 'I want To Eat Your Pancreas - Kimi no suizou wo tabetai', 'Riki_Kuro17@gmail.com', 'Sumino Yoru', 'Penerbit Haru', '2018', '9786026383457', '5253686_06f3671f-9f21-4863-8677-b20e53659d59.jpg', 1568963492),
(3, 4, 'Ryuugajou Nananas Buried Treasure', 'Riki_Kuro17@gmail.com', 'Ootorino Kazuma', 'Shining Rose Media', '2016', '9786027358430', 'cover-ryuugajou.jpg', 1568963824),
(4, 2, 'Kisses to Remember', 'thoriqaziz.muhammad@gmail.com', 'Kurumi Tasaki', 'M&C Publisher', '2017', '9786024282875', 'Kisses-to-Remember-681x1032.jpg', 1568964418),
(5, 1, 'Dua Dunia', 'Riki_Kuro17@gmail.com', 'Luna Torashyngu', 'Gramedia Pustaka Utama', '2018', '9786020380384', '105029_f.jpg', 1568547516),
(6, 1, 'Air Mata Bulan - Malapetaka Dimulai', 'kuroyamafukka@gmail.com', 'Ziggy Zezsyazeoviennazabrizkie', 'Mizan Publishing', '2016', '9789794339343', 'cover-air-mata-bulan-malapetaka-dimulai.jpg', 1568547645),
(7, 1, 'Ther Melian Revelation', 'thoriqaziz.muhammad@gmail.com', 'Shienny M,s', 'Elex Media Komputindo', '2016', '9786020292021', '0_e80fe014-afe6-43ae-86d1-2fcbb7487f2f_387_516.jpg', 1568857961),
(8, 1, 'Ther Melian Chronicle', 'thoriqaziz.muhammad@gmail.com', 'Shienny M,s', 'Elex Media Komputindo', '2016', '9786020292076', 'ID_EMK2016MTH08TMCE_B.jpg', 1568858131),
(9, 1, 'Ther Melian Recollection', 'thoriqaziz.muhammad@gmail.com', 'Shienny M,s', 'Elex Media Komputindo', '2017', '9786020412658', 'ID_EMK2017MTH04TMRE_B.jpg', 1568858252),
(10, 10, '10 November 1945', 'thoriqaziz.muhammad@gmail.com', 'Bung Tomo (Sutomo)', 'VisiMedia Pustaka', '2008', '9791044314', '5978072.jpg', 1568965015),
(12, 2, 'Tulisan Ghani', 'Riki_Kuro17@gmail.com', 'Radin Azkia', 'Love Able', '2018', '9786025406560', '9786025406560_tulisan-ghani__w600_hauto.jpg', 1568966031),
(13, 11, '99 Cara Bebas Finansial', 'Riki_Kuro17@gmail.com', 'Slamet Ristanto', 'Asdamedia', '2014', '9786021542576', '74483_f.jpg', 1568966201),
(14, 4, 'Psychic Detective Yakumo - The Light Beyond the Darkness', 'kuroyamafukka@gmail.com', 'Manabu Kaminaga', 'M&C Publisher', '2017', '9786024280185', '9786024280185_psychic-detective-yakumo-the-light-beyond-the-darkness__w600_hauto.jpg', 1568967308),
(15, 4, 'Pshycic Detective Yakumo - Connected Feelings', 'kuroyamafukka@gmail.com', 'Manabu Kaminaga', 'Gramedia Pustaka Utama', '2017', '9786024286446', '103061_f.jpg', 1568967407),
(16, 5, 'Salah Jurusan - Tentukan Pilihan, Temukan Tujuan', 'kuroyamafukka@gmail.com', 'Rusydan Ubaidi Hamdani', 'Transmedia', '2014', '978602103601', 'BUKUSALAHJURUSAN.jpg', 1568968276),
(17, 5, 'Goodbye, Things: Hidup Minimalis ala Orang Jepang', 'kuroyamafukka@gmail.com', 'Fumio Sasaki', 'Gramedia Pustaka Utama', '2018', '9786024526986', 'ID_GTHM2018MTH11GTHM.jpg', 1568967632),
(18, 1, 'Salju Pertama Di Hokkaido', 'Riki_Kuro17@gmail.com', 'Angelique Puspadewi', 'Gramedia Pustaka Utama', '2018', '9786020376684', '36501732._SX318_.jpg', 1568968094),
(19, 2, 'Cloud Above My bed', 'Riki_Kuro17@gmail.com', 'Malashantii', 'Elex Media Komputindo', '2018', '9786020497921', '45434240._UY645_SS645_.jpg', 1568968028),
(20, 6, 'Tips dan Trik Jaringan Wireless', 'thoriqaziz.muhammad@gmail.com', 'Victoria', 'Elex Media Komputindo', '2014', '9786020261820', '20181117_152044_scaled.jpg', 1568968381),
(21, 6, '24 Jam Belajar PHP', 'thoriqaziz.muhammad@gmail.com', 'Edy Winarno ST, M.Eng', 'Elex Media Komputindo', '2014', '9786020249483', 'GRAMEDIANA98267_B_.jpg', 1568968478),
(22, 6, 'Kolaborasi Code Igniter dan AJAX dalam Perancangan CMS', 'admin@admin.com', 'Anton Subagia', 'Elex Media Komputindo', '2018', '9786020459332', 'ID_KCAP2018MTH04KCAP.jpg', 1568968608),
(23, 5, 'Mangetsu', 'kuroyamafukka@gmail.com', 'Imam Robandi', 'Andi Publishers', '2015', '9789792953282', '11430494_0bf9db57_8999_43c2_9277_244cc52d2ec6_300_445.jpg', 1568968904),
(24, 1, 'Eternal Forces', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2016', '0', 'default.png', 1568969028),
(25, 1, 'Virtual Reality - Not About a Game', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2016', '0', 'default.png', 1568969113),
(26, 3, 'Happiness In an Unfair World', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2017', '0', 'default.png', 1568969169),
(27, 2, 'Happiness In an Unfair World - Love and Lies', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2017', '0', 'default.png', 1568969221),
(28, 2, 'Something Inside Your Eyes', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2018', '0', 'default.png', 1568969250),
(29, 2, 'You\'ve Changed My Life', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Private Collection', '2019', '0', 'default.png', 1568969294),
(30, 1, 'World After the Apocalypse', 'Riki_Kuro17@gmail.com', 'Riki Kuro', 'Wattpad (Online)', '2017', '0', 'hfhfhfhg.jpg', 1568969383);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `nama_kategori` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `nama_kategori`) VALUES
(1, 'Fantasy'),
(2, 'Romance'),
(3, 'Fiction'),
(4, 'Mystery'),
(5, 'Non-Fiction'),
(6, 'Technology'),
(9, 'Science'),
(10, 'History'),
(11, 'Financial');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'Data'),
(4, 'User'),
(5, 'About');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'My Profile', 'user', 'fas fa-fw fa-user-circle', 1),
(3, 4, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'Menu Management', 'menu', 'fas fa-fw fa-bars', 1),
(5, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-minus', 1),
(7, 1, 'Role Management', 'admin/role', 'fas fa-user-lock', 1),
(8, 4, 'Change Password', 'user/change', 'fas fa-fw fa-user-cog', 1),
(9, 3, 'Book List', 'data', 'fas fa-fw fa-book-reader', 1),
(11, 3, 'Category Management', 'data/category', 'fab fa-fw fa-cuttlefish', 1),
(12, 3, 'Add Books', 'data/add', 'fas fa-fw fa-book', 1),
(13, 5, 'About this Site', 'about', 'fas fa-fw fa-info', 1),
(14, 5, 'thanks to..', 'about/thanks', 'fas fa-fw fa-thumbs-up', 1),
(15, 1, 'Update to About Menu', 'admin/about', 'fas fa-fw fa-info-circle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thanks`
--

CREATE TABLE `thanks` (
  `id` int(11) NOT NULL,
  `content` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanks`
--

INSERT INTO `thanks` (`id`, `content`) VALUES
(1, 'Bootstrap 4'),
(2, 'Code Igniter 3.1.10'),
(3, 'Sb Admin- (dashboard template)'),
(4, 'Font Awesome'),
(5, 'And Several Tutorial Video');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(22) NOT NULL,
  `date_created` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES
(1, 'Atthoriq Aziz', 'thoriqaziz.muhammad@gmail.com', '$2y$10$jhWI.sCrlkNkCsC4825w6emXMXsIEKUqilVt5h3vlTke0vkBdQTYW', '20663763_529766920688897_2381396132829994293_n.png', 1, 1567992296),
(2, 'Riki Kuro', 'Riki_Kuro17@gmail.com', '$2y$10$uMMmPOYHH6jN4tfdbWooeO0bWKoBd/OkAkE8nnKvdGuUlh/SQwvTC', 'LNID_BLACK.png', 2, 1567992332),
(3, 'Fukaru', 'kuroyamafukka@gmail.com', '$2y$10$CrtFMu2yj0bvflKFi9RU2Or9SRahtGrnsMuIS72y6ws/Nj9lN/rYK', 'log.png', 2, 1568540341),
(4, '樺乃ちゃん押し', 'admin@admin.com', '$2y$10$1EOHVXuzejXol1L6vgG51.gB3OvsBWUl1YlO6zU9VcOn6i0cVRbra', '0dcb484e-6d7a-4f5b-a3e7-0336a315d0c1.jpg', 1, 1568548274),
(5, 'Admin', 'lalal@lala.com', '$2y$10$6kSRGi4Y8qu5saOWrV6eh.v4GJNeX35iiZ.3fCUgjGF76lpjAXDs6', 'default.png', 1, 1615127121),
(6, 'user', 'user@usertolol.com', '$2y$10$B8cIf5ODx.g/Btq6Mqxzl.MPy1YMtTGuscilegjDfuXZ.Bu1XA2Cu', 'default.png', 1, 1615127144),
(7, 'admin2', 'setasdawas@asdwads.vv', '$2y$10$DqrmEVWPKLb47OoTt7UeeeaVAWIGvWAnf5jcuzVGYdaIrd6jDyPxi', 'default.png', 1, 1615200635);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanks`
--
ALTER TABLE `thanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `thanks`
--
ALTER TABLE `thanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
