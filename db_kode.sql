-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 11:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kode`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '2017-11-26 08:34:09', '2017-11-26 08:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status_article` varchar(7) NOT NULL,
  `cover_article` varchar(225) NOT NULL,
  `slug_article` varchar(225) NOT NULL,
  `date_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `category_id`, `user_id`, `title`, `content`, `status_article`, `cover_article`, `slug_article`, `date_post`) VALUES
(2, 12, 1, 'asdasd', '<p>sadasdasd</p>', 'publish', 'Penguins.jpg', 'asdasd', '2018-02-08'),
(3, 12, 1, 'asdasd', '<p>asdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdasasdasasdas asdasasdas asdas asdasasdasasdas asdasasdas asdas asdasasdas</p>', 'publish', 'Lighthouse.jpg', '3-asdasd', '2018-02-08'),
(4, 13, 1, 'asdsdsd', '<p>sadsad</p>', 'publish', 'Chrysanthemum.jpg', 'asdsdsd', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `slug_category` varchar(225) NOT NULL,
  `category_description` text NOT NULL,
  `status` enum('active','not_active') NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `user_id`, `category_name`, `slug_category`, `category_description`, `status`, `created`, `modified`) VALUES
(12, 1, 'Bisnis', 'bisnis', 'kacang\r\n', 'active', '2017-10-15 19:29:15', '2017-10-19 04:07:34'),
(13, 1, 'Umum', 'umum', 'umum', 'active', '2017-10-16 15:27:13', '2017-10-19 04:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories_upload`
--

CREATE TABLE `categories_upload` (
  `id_category` int(11) NOT NULL,
  `categories_name` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `slug_cat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_upload`
--

INSERT INTO `categories_upload` (`id_category`, `categories_name`, `icon`, `slug_cat`) VALUES
(1, 'asdasd', 'Tulips.jpg', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `nameweb` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `keywords` text NOT NULL,
  `google_maps` text NOT NULL,
  `logo` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `metatext` text NOT NULL,
  `fax` text NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `text_1` text NOT NULL,
  `img_1` varchar(225) NOT NULL,
  `title_2` varchar(100) NOT NULL,
  `text_2` text NOT NULL,
  `img_2` varchar(100) NOT NULL,
  `img_faq` varchar(225) NOT NULL,
  `title_3` varchar(100) NOT NULL,
  `text_3` text NOT NULL,
  `title_4` varchar(100) NOT NULL,
  `text_4` text NOT NULL,
  `title_5` varchar(100) NOT NULL,
  `text_5` text NOT NULL,
  `title_6` varchar(100) NOT NULL,
  `text_6` text NOT NULL,
  `title_7` varchar(100) NOT NULL,
  `text_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `nameweb`, `email`, `keywords`, `google_maps`, `logo`, `icon`, `about`, `phone_number`, `metatext`, `fax`, `facebook`, `twitter`, `instagram`, `title_1`, `text_1`, `img_1`, `title_2`, `text_2`, `img_2`, `img_faq`, `title_3`, `text_3`, `title_4`, `text_4`, `title_5`, `text_5`, `title_6`, `text_6`, `title_7`, `text_7`) VALUES
(1, 'Sedot Kode ', 'contact@sedotkode.com', 'Sedot Kode', '', 'logo_fb1.png', 'logo_fb.png', '<p>Lorem Ipsum Idoor</p>', '3465456', 'Sedot Kode', '46545', 'https://facebook.com/indrkmna', 'https://facebook.com/indrkmna', 'https://facebook.com/indrkmna', 'Selamat datang di bengkel SDM1', 'Silahkan daftar ', 'logo_fb4.png', 'judul 1', '', 'logo_fb2.png', 'logo_fb5.png', 'judul 2', 'isi 2', 'judul 3', 'judul 3\r\n', 'judul 4', 'judul 4', 'judul 5', 'judul 5', 'judul 6', 'isi 6');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `sender` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_name` varchar(225) NOT NULL,
  `faq_description` text NOT NULL,
  `faq_order` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `review` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `kode_id`, `vote`, `review`, `post_date`) VALUES
(1, 1, 11, 3, 'asdasd', '2018-02-09'),
(2, 1, 11, 5, 'asdasd', '2018-02-09'),
(3, 1, 11, 5, 'asdasd', '2018-02-09'),
(4, 1, 11, 5, 'asdasd', '2018-02-09'),
(5, 1, 11, 5, 'asdasd', '2018-02-09'),
(6, 1, 11, 5, 'asdasd', '2018-02-09'),
(7, 1, 11, 5, 'asdasdsad', '2018-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `screenshoot`
--

CREATE TABLE `screenshoot` (
  `id` int(11) NOT NULL,
  `nama_foto` varchar(250) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `upload_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screenshoot`
--

INSERT INTO `screenshoot` (`id`, `nama_foto`, `token`, `upload_kode`) VALUES
(1, 'Chrysanthemum1.jpg', '0.8818194648038675', 11),
(2, 'Hydrangeas.jpg', '0.0734011400165171', 11),
(3, 'Penguins1.jpg', '0.5173952762944276', 11),
(4, 'Hydrangeas1.jpg', '0.8351747281995898', 11);

-- --------------------------------------------------------

--
-- Table structure for table `upload_kode`
--

CREATE TABLE `upload_kode` (
  `upload_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `screenshoot` varchar(225) NOT NULL,
  `slug_upload` varchar(225) NOT NULL,
  `status_upload` varchar(10) NOT NULL,
  `date_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_kode`
--

INSERT INTO `upload_kode` (`upload_id`, `category_id`, `user_id`, `title`, `description`, `screenshoot`, `slug_upload`, `status_upload`, `date_post`) VALUES
(11, 1, 1, 'asdasd', 'asdasd', '', '-asdasd', 'publish', '2018-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `gender`, `phone`, `company`, `address`, `photo`, `bio`, `profile_url`, `status`, `created`, `modified`) VALUES
(1, 'rizky', 'wirdani', 'rzkwrdn', 'rzkwrdn@gmail.com', 'd29cf8cf0c03b6d99511e4781438ab140fe94dc3', '', '', '', '', '', '', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `categories_upload`
--
ALTER TABLE `categories_upload`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `screenshoot`
--
ALTER TABLE `screenshoot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_kode`
--
ALTER TABLE `upload_kode`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories_upload`
--
ALTER TABLE `categories_upload`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `screenshoot`
--
ALTER TABLE `screenshoot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
