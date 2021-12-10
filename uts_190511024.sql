-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 01:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_190511024`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode` varchar(25) DEFAULT NULL,
  `nama` varchar(129) DEFAULT NULL,
  `direktur` varchar(129) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `kode`, `nama`, `direktur`, `tahun`, `created_at`) VALUES
(1, 'META', 'META', 'Mark Zuckerberg', '2021', '2021-11-21 08:46:14'),
(2, 'FB', 'Facebook', 'Mark Zuckerberg', '2010', '2021-11-21 08:46:25'),
(3, 'MICROSOFT', 'Microsoft Corporation', 'Bill Gatess', '2001', '2021-11-21 08:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `judul`, `deskripsi`, `tanggal`, `visible`, `created_at`) VALUES
(1, 'LOMBA WEB DESIGN', 'ada lomba web design tingkat kabupaten', '2021-12-03', 1, '2021-11-21 08:59:23'),
(2, 'ADA MEETUP TECH LEADER', 'ada meetup tech leader di UMC besok ', '2021-11-22', 0, '2021-11-21 08:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(5) UNSIGNED NOT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama` varchar(129) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gender` char(2) DEFAULT 'L',
  `company_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `nik`, `nama`, `alamat`, `gender`, `company_id`, `skill_id`, `created_at`) VALUES
(1, '3210121803010887', 'Muhamad Ahmadin', 'Majalengka', 'L', 3, 1, '2021-11-21 08:53:22'),
(2, '3210121803010666', 'Drakath Lord', 'Land of Dawn', 'L', 1, 2, '2021-11-21 08:53:45'),
(3, '3210121803010883', 'Lancellot', 'Cirebon', 'P', 2, 3, '2021-11-21 08:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `lokers`
--

CREATE TABLE `lokers` (
  `id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lokers`
--

INSERT INTO `lokers` (`id`, `judul`, `deskripsi`, `tanggal`, `visible`, `created_at`) VALUES
(1, 'ADA LOKER WEB DEV', 'silahkan apply jika memenuhi syarat', '2021-11-21', 1, '2021-11-21 08:57:46'),
(2, 'LOKER ANDROID DEVELOPER', 'kotlin\r\njava\r\nflutter\r\nsilahkan applys', '2021-11-15', 1, '2021-11-21 08:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-11-20-202718', 'App\\Database\\Migrations\\Company', 'default', 'App', 1637458417, 1),
(2, '2021-11-20-221853', 'App\\Database\\Migrations\\Event', 'default', 'App', 1637458418, 1),
(3, '2021-11-20-223548', 'App\\Database\\Migrations\\Loker', 'default', 'App', 1637458418, 1),
(4, '2021-11-20-223552', 'App\\Database\\Migrations\\Freelancer', 'default', 'App', 1637458418, 1),
(5, '2021-11-20-223555', 'App\\Database\\Migrations\\Skill', 'default', 'App', 1637458418, 1),
(6, '2021-12-10-115313', 'App\\Database\\Migrations\\User', 'default', 'App', 1639137296, 2);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode` varchar(25) DEFAULT NULL,
  `nama` varchar(129) DEFAULT NULL,
  `bidang` varchar(129) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `kode`, `nama`, `bidang`, `keterangan`, `created_at`) VALUES
(1, 'WEBDEV', 'Web Development', 'Website', 'Website application development', '2021-11-21 08:48:34'),
(2, 'BE', 'Backend Developer', 'Database', 'Designing Database and creaitn APIs', '2021-11-21 08:48:54'),
(3, 'FE', 'Frontend Development', 'Front End', 'Creating User Interface', '2021-11-21 08:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`) VALUES
(1, 'MUHAMAD AHMADIN', 'ahmadinations@gmail.com', '$2y$10$uop33NLgKYJ6RTfHSaJXxOFTEEBY.j3veiMAqsAcapjfxXOFTnExm', '2021-12-10 18:55:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokers`
--
ALTER TABLE `lokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokers`
--
ALTER TABLE `lokers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
