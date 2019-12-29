-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2018 at 02:58 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iq`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'آذربایجان شرقی'),
(2, 'آذربایجان غربی'),
(3, 'اردبیل'),
(4, 'اصفهان'),
(5, 'البرز'),
(6, 'ایلام'),
(7, 'بوشهر'),
(8, 'تهران'),
(9, 'چهارمحال وبختیاری'),
(10, 'خراسان جنوبی'),
(11, 'خراسان رضوی'),
(12, 'خراسان شمالی'),
(13, 'خوزستان'),
(14, 'زنجان'),
(15, 'سمنان'),
(16, 'سیستان وبلوچستان'),
(17, 'فارس'),
(18, 'قزوین'),
(19, 'قم'),
(20, 'کردستان'),
(21, 'کرمان'),
(22, 'کرمانشاه'),
(23, 'کهگیلویه وبویراحمد'),
(24, 'گلستان'),
(25, 'گیلان'),
(26, 'لرستان'),
(27, 'مازندران'),
(28, 'مرکزی'),
(29, 'هرمزگان'),
(30, 'همدان'),
(31, 'یزد');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
