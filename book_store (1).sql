-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 08:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`, `admin_img`) VALUES
(1, 'wlaa', 'wlaa@wlaa', '123', 'assets/img/1589148645_79208670_2428267424082071_8491559714704850944_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_dec` varchar(2000) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_dec`, `category_img`) VALUES
(11, 'Arts & Photography', 'Artists books explore ideas and concepts through form as much as content', 'Arts&Photography/1589395922_product-7.jpg'),
(12, 'Biographies', 'is a detailed description of a person life It involves more than just the basic facts like education', 'Biographies/1589395883_product-3.jpg'),
(13, 'Business & Money', 'explain to your kids that owning shares of stock in that company makes them a partowner of the company', 'Business&Money/1589393464_product-6.jpg'),
(14, 'Childrens Books', 'When you jjjj jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjjjjjjj ijjjjj ijmoijio uhioh uhiolh uhihnkj  uhih hui huiuhj ijoijo jiojoi ijoji ioomlkm kmm kjiojo kojioj knujujuj ijim kkkk jjjjjjjjjjjjj kjjjjjjjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjj ggggggggggggg nnnnnnnnnnnnnnnnnnnnnn uuuuuuuuuuuuuuuuuu mmmmmmmmmmmmmmmmm ', 'ChildrensBooks/1589663094_donor-relations-graphic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cat_discount_pro`
--

CREATE TABLE `cat_discount_pro` (
  `id` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_discount_pro`
--

INSERT INTO `cat_discount_pro` (`id`, `id_dis`, `id_cat`, `id_pro`) VALUES
(4, 50, 11, 60),
(5, 50, 13, 60),
(6, 50, 12, 61),
(7, 20, 14, 62),
(8, 20, 14, 63),
(9, 20, 12, 61),
(10, 50, 13, 65),
(11, 50, 12, 66);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `replay` varchar(500) NOT NULL,
  `msg_tim` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `replay`, `msg_tim`, `msg_date`) VALUES
(1, 'baha', 'heloo', '', '2020-02-14 00:33:21', '0000-00-00'),
(2, 'baha', 'wdq', '', '2020-02-14 19:19:17', '0000-00-00'),
(3, 'baha', 'dd', '', '2020-02-14 19:19:21', '0000-00-00'),
(4, 'baha', 'wwww', '', '2020-02-14 19:19:25', '0000-00-00'),
(5, 'baha', 'werf', '', '2020-02-14 19:33:34', '0000-00-00'),
(6, 'baha', 'ddd', '', '2020-02-14 19:33:42', '0000-00-00'),
(7, '', '', '', '2020-02-14 19:48:58', '0000-00-00'),
(8, 'baha', '', '', '2020-02-14 19:49:02', '0000-00-00'),
(9, 'baha', 'dfsdf', '', '2020-02-14 19:49:10', '0000-00-00'),
(10, 'baha', 'dfsddd', '', '2020-02-14 19:49:27', '0000-00-00'),
(11, 'baha', 'Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ… Ø¨Ø¯ÙŠ Ø§Ø³ØªÙØ³Ø± Ø³ÙˆØ§Ù„\n', '', '2020-02-14 19:52:21', '0000-00-00'),
(12, 'Ù…Ø­Ù…Ø¯', 'ÙˆØ¹Ù„ÙŠÙƒÙ… Ø§Ù„Ø³Ù„Ø§Ù… Ø§Ù‚Ù„Ø¨ ÙˆØ¬Ù‡Ùƒ Ù…Ø§ÙÙŠ Ø³ÙˆØ§Ù„', '', '2020-02-14 19:52:49', '0000-00-00'),
(13, '', '\\Ø³Ø¨Ø±Ø³Ø±Ø¨Ø±Ø¨Ø±', '', '2020-02-14 19:52:59', '0000-00-00'),
(14, 'baha', 'ergrgerg\n', '', '2020-02-14 21:31:53', '0000-00-00'),
(15, 'baha', 'hi\n', '', '2020-02-16 12:07:09', '0000-00-00'),
(16, '', 'ffffff', '', '2020-02-18 11:53:01', '0000-00-00'),
(17, '', 'hi\n', '', '2020-02-18 11:55:33', '0000-00-00'),
(18, '', 'heloo\n', '', '2020-02-18 11:59:03', '0000-00-00'),
(19, '', 'helllo', '', '2020-02-18 12:00:25', '0000-00-00'),
(20, '', 'baha', '', '2020-02-18 12:05:51', '0000-00-00'),
(21, '', '', '', '2020-02-18 20:50:22', '0000-00-00'),
(22, '', 'AHBFJHEBFWJKEFBWKEFWLF', '', '2020-02-19 14:22:27', '0000-00-00'),
(23, '', 'PIEHFEHJRGERJHGBEIRGBE\n', '', '2020-02-19 14:23:21', '0000-00-00'),
(24, '', 'hi \n', '', '2020-02-24 09:12:57', '0000-00-00'),
(25, '', 'jkdqhwkdhqkdqkwdqwdgug', '', '2020-02-24 09:35:14', '0000-00-00'),
(26, '', 'zdfsdfsdfsd', '', '2020-02-24 11:02:23', '0000-00-00'),
(27, '', '', '', '2020-02-24 11:02:43', '0000-00-00'),
(28, '', 'ifjeoifjweof', '', '2020-02-27 09:49:02', '0000-00-00'),
(29, 'bobo', 'hello', '', '2020-03-03 22:24:05', '0000-00-00'),
(30, 'bobo', 'hello', '', '2020-03-03 22:24:08', '0000-00-00'),
(31, 'bobo', 'hello', '', '2020-03-03 22:24:10', '0000-00-00'),
(32, 'bobo', 'hello', '', '2020-03-03 22:24:10', '0000-00-00'),
(33, 'bobo', 'hello', '', '2020-03-03 22:24:10', '0000-00-00'),
(34, 'bobo', 'hello', '', '2020-03-03 22:24:10', '0000-00-00'),
(35, 'bobo', 'hello', '', '2020-03-03 22:24:11', '0000-00-00'),
(36, 'bobo', 'hello', '', '2020-03-03 22:24:11', '0000-00-00'),
(37, 'bobo', 'hello', '', '2020-03-03 22:24:11', '0000-00-00'),
(38, 'bobo', 'hello', '', '2020-03-03 22:24:11', '0000-00-00'),
(39, 'bobo', 'hello', '', '2020-03-03 22:24:11', '0000-00-00'),
(40, 'bobo', 'hello', '', '2020-03-03 22:24:12', '0000-00-00'),
(41, 'bobo', 'hello', '', '2020-03-03 22:24:12', '0000-00-00'),
(42, 'bobo', 'hello', '', '2020-03-03 22:24:12', '0000-00-00'),
(43, 'bobo', 'hello', '', '2020-03-03 22:24:12', '0000-00-00'),
(44, 'bobo', 'hello', '', '2020-03-03 22:24:13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(51, 4, 5, 'hi\n\n', '2018-09-28 15:32:57', 0),
(52, 4, 5, 'hi 📦', '2018-09-28 15:33:06', 0),
(53, 5, 4, '🤣', '2018-09-28 15:45:35', 0),
(54, 5, 4, 'lol\n\n', '2018-09-28 15:45:42', 0),
(55, 4, 5, 'wwww', '2020-03-28 22:52:58', 1),
(56, 4, 5, '😍😍😍', '2020-03-28 22:53:07', 1),
(57, 11, 1, 'ggfgfgf', '2020-03-29 00:45:19', 1),
(58, 11, 1, 'ffff', '2020-03-29 00:45:28', 1),
(59, 11, 1, 'fff\n\n', '2020-03-29 00:45:38', 1),
(60, 11, 1, 'ddd\n\n', '2020-03-29 00:49:14', 1),
(61, 11, 1, 'ghhghghghghghghghhghg', '2020-03-29 00:51:01', 1),
(62, 11, 1, 'ffgfggfgf', '2020-03-29 00:52:25', 1),
(63, 11, 1, 'ffffdfd', '2020-03-29 00:56:17', 1),
(64, 11, 1, 'fffff\n\n', '2020-03-29 00:56:28', 1),
(65, 11, 1, 'fffddfdf', '2020-03-29 00:57:12', 1),
(66, 11, 1, '😍😍😍', '2020-03-29 00:59:46', 1),
(67, 43, 1, '💗💗', '2020-03-29 01:28:58', 1),
(68, 29, 1, '😍', '2020-03-29 01:29:21', 1),
(69, 11, 1, 'jhnk', '2020-03-29 11:57:30', 1),
(70, 11, 1, '655', '2020-03-29 15:56:14', 1),
(71, 11, 1, 'lkmlo', '2020-03-29 15:58:45', 1),
(72, 123, 1, 'mkklm\n\n', '2020-03-29 16:57:30', 1),
(73, 123, 1, 'kjnkjm', '2020-03-29 16:57:39', 1),
(74, 123456789, 1, 'mijo\n\n', '2020-03-29 16:58:12', 0),
(75, 0, 1, 'dcdsedc\n\n', '2020-03-29 17:04:27', 0),
(76, 0, 1, 'jgbjbj', '2020-03-29 17:06:39', 0),
(77, 0, 1, 'gvyggikjk', '2020-03-29 17:07:01', 0),
(78, 123456789, 1, 'mklmkllkklmkkjjk', '2020-03-29 17:12:35', 0),
(79, 788320226, 1, 'jhbikmjkl', '2020-03-29 17:40:34', 0),
(80, 123456789, 1, 'hbhikm', '2020-03-29 17:54:05', 0),
(81, 788320226, 1, 'bhnjlk;kjhbgfdghbjkml;', '2020-03-29 17:55:36', 0),
(82, 123456789, 1, 'byinkujk', '2020-03-29 18:15:53', 0),
(83, 788320226, 1, 'vb jhnkml,;kmjhbg', '2020-03-29 18:16:03', 0),
(84, 33, 123456789, 'jnlkmjbhnk', '2020-03-29 18:20:50', 1),
(85, 1, 123456789, 'knjmllmkjhgbnjk', '2020-03-29 18:23:51', 0),
(86, 788320226, 123456789, 'hgvbhnjmkmjn', '2020-03-29 18:30:53', 0),
(87, 799999999, 123456789, 'vc bnm,.,mn', '2020-03-29 18:31:03', 0),
(88, 1, 788320226, 'ihijlmokoijojojiojo', '2020-03-29 20:08:58', 0),
(89, 1, 788320226, 'vbhjjnm', '2020-03-29 20:09:13', 0),
(90, 1, 788320226, '🙃', '2020-03-30 22:39:59', 0),
(91, 1, 788320226, '😁', '2020-03-30 22:40:21', 0),
(92, 1, 788320226, '🙃', '2020-03-30 22:40:47', 0),
(93, 123456789, 788320226, 'klmk', '2020-03-30 23:37:49', 1),
(94, 123456789, 1, 'kjnlijkm', '2020-03-31 00:07:09', 0),
(95, 1, 788320226, 'gvujhikok', '2020-04-03 16:38:35', 0),
(96, 44, 788320226, 'jhni', '2020-04-03 16:39:22', 1),
(97, 45, 788320226, 'tyuguy', '2020-04-03 16:39:31', 1),
(98, 1, 788320226, '😍😁🙃', '2020-04-03 16:39:51', 0),
(99, 788320226, 1, 'ihujoio', '2020-04-03 16:40:10', 0),
(100, 788320226, 1, 'hbkjl', '2020-04-03 16:40:28', 0),
(101, 1, 788320226, 'ddfreferfewdwdew', '2020-04-03 16:44:56', 0),
(102, 788320226, 1, '🙃', '2020-04-08 01:25:00', 0),
(103, 123456, 788320226, 'nkjj', '2020-04-10 14:27:43', 1),
(104, 123456, 788320226, '😋', '2020-04-10 14:27:49', 1),
(105, 123456789, 788320226, '🙃', '2020-04-10 14:28:00', 1),
(106, 1, 7, '😃', '2020-05-11 04:21:11', 0),
(107, 7, 1, '😚', '2020-05-11 15:39:59', 0),
(108, 7, 1, '😇', '2020-05-11 15:51:33', 0),
(109, 1, 7, '🙃', '2020-05-11 16:03:56', 0),
(110, 8, 1, '😜\n\n', '2020-05-11 20:28:04', 0),
(111, 7, 1, 'bkjn', '2020-05-11 20:40:32', 0),
(112, 7, 1, 'jknknj', '2020-05-11 20:40:41', 0),
(113, 7, 1, '🤣', '2020-05-11 20:40:47', 0),
(114, 8, 7, '', '2020-05-11 21:02:31', 0),
(115, 8, 7, '🙂', '2020-05-11 21:02:41', 0),
(116, 8, 7, 'kjnjnknj', '2020-05-11 21:02:47', 0),
(117, 7, 7, '', '2020-05-11 21:04:17', 0),
(118, 7, 7, '', '2020-05-11 21:04:20', 0),
(119, 7, 7, '', '2020-05-11 21:04:23', 0),
(120, 7, 7, '', '2020-05-11 21:04:27', 0),
(121, 7, 7, '', '2020-05-11 21:04:28', 0),
(122, 7, 7, '', '2020-05-11 21:04:29', 0),
(123, 7, 7, '', '2020-05-11 21:04:29', 0),
(124, 7, 7, '', '2020-05-11 21:04:29', 0),
(125, 8, 7, '', '2020-05-11 21:04:39', 0),
(126, 8, 7, '', '2020-05-11 21:04:40', 0),
(127, 8, 7, '', '2020-05-11 21:04:40', 0),
(128, 8, 7, '', '2020-05-11 21:04:40', 0),
(129, 8, 7, '', '2020-05-11 21:04:40', 0),
(130, 8, 7, '😉😉😉😉😉', '2020-05-11 21:04:59', 0),
(131, 7, 7, '😉😉😉😉😉', '2020-05-11 21:05:22', 0),
(132, 8, 1, 'wdedwwede', '2020-05-11 21:23:10', 0),
(133, 8, 1, '😉', '2020-05-11 21:47:43', 0),
(134, 1, 1, 'hi', '2020-05-12 16:33:40', 0),
(135, 1, 1, 'kkmklk', '2020-05-12 17:10:30', 0),
(136, 8, 1, 'lkmkl', '2020-05-12 17:12:09', 0),
(137, 7, 1, ';kml.', '2020-05-12 17:12:17', 0),
(138, 1, 1, 'erferf', '2020-05-12 17:14:50', 0),
(139, 8, 1, 'kjnknkj', '2020-05-12 17:15:33', 0),
(140, 7, 1, 'huijokip', '2020-05-12 17:15:41', 0),
(141, 7, 1, 'kjjjjjjjjjjjjjjjjjjjjjjjj', '2020-05-12 17:16:05', 0),
(142, 7, 1, 'ooooooooooooooooo', '2020-05-12 17:16:14', 0),
(143, 7, 1, 'klml', '2020-05-12 17:46:06', 0),
(144, 8, 1, 'lkm;', '2020-05-12 17:46:31', 0),
(145, 8, 1, 'wfefwefwef', '2020-05-14 14:14:13', 0),
(146, 1, 8, 'kjnknk', '2020-05-14 14:15:58', 0),
(147, 8, 1, 'kmfoawi', '2020-05-14 14:18:21', 0),
(148, 1, 8, 'ijoiji', '2020-05-14 14:19:04', 0),
(149, 8, 1, 'oijsqwdjw', '2020-05-14 14:19:20', 0),
(150, 8, 1, 'oijoj', '2020-05-14 14:26:52', 0),
(151, 8, 1, 'klml🙃', '2020-05-14 14:27:16', 0),
(152, 1, 8, 'lkml', '2020-05-14 14:31:53', 0),
(153, 8, 1, 'hbhnkiui', '2020-05-14 14:32:05', 0),
(154, 1, 8, 'kjnk', '2020-05-14 14:33:14', 0),
(155, 8, 1, 'dfvd', '2020-05-16 19:05:36', 1),
(156, 7, 1, 'ioiokio', '2020-05-16 19:06:59', 0),
(157, 1, 7, 'jyhjgy', '2020-05-16 23:35:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `id_comment` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id_comment`, `name`, `email`, `comment`, `id_product`, `date`) VALUES
(1, 'alaa Omar', 'alo2.omar92@gamil.com', 'this book is very interesting', 60, '2020-05-07'),
(2, 'hnaa omar', 'hnaa@gmail.com', 'its very exciting', 60, '2020-05-15'),
(3, 'mo', 'ff@ff', 'ioiko', 60, '0000-00-00'),
(4, 'ffff', 'wlaa@wlaa', 'hyyyyyyyyyyyyyyyy', 60, '0000-00-00'),
(5, 'lijo', 'vboyle@example.com', 'uygu', 60, '0000-00-00'),
(6, 'منةم', 'wlaa@wlaa', 'تاه', 60, '2020-05-15'),
(7, 'صصثجمي', 'alo2@gmail.com', 'صخهتيصخ', 61, '2020-05-17'),
(8, 'alaa', 'alo2@gmail.com', 'hello this book new?', 60, '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `id_customer` int(11) NOT NULL,
  `full_name_customer` varchar(255) NOT NULL,
  `phone_customer` int(10) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `street_customer` varchar(255) NOT NULL,
  `city_customer` varchar(255) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `promo_code` varchar(6) DEFAULT NULL,
  `status_promo` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`id_customer`, `full_name_customer`, `phone_customer`, `email_customer`, `street_customer`, `city_customer`, `password_customer`, `promo_code`, `status_promo`) VALUES
(7, 'alaa', 2147483647, 'alo2.omar92i@gmail.com', 'amman', 'amman', '123456', 'SPptLI', 0),
(8, 'hnaa', 123456789, 'alaaomaralshobaki@gmail.com', 'hhhh', 'hhh', '123456', 'qzY2Yx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_value` int(11) NOT NULL,
  `discount_unit` varchar(255) DEFAULT NULL,
  `start_disc` date DEFAULT NULL,
  `end_disc` date DEFAULT NULL,
  `disc_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_value`, `discount_unit`, `start_disc`, `end_disc`, `disc_desc`) VALUES
(20, '20%', '2020-05-14', '2020-05-14', 'discount'),
(50, '50%', '2020-05-13', '2020-05-20', 'discount for this week on sections');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `pro_id`, `image`) VALUES
(39, 59, 'uploads/Arts&photography/AbstractArt/1589391806_product-details-1.jpg'),
(40, 59, 'uploads/Arts&photography/AbstractArt/1589391806_product-details-2.jpg'),
(41, 59, 'uploads/Arts&photography/AbstractArt/1589392623_product-1.jpg'),
(42, 59, 'uploads/Arts&photography/AbstractArt/1589392623_product-2.jpg'),
(43, 59, 'uploads/Arts&photography/AbstractArt/1589392741_product-1.jpg'),
(44, 59, 'uploads/Arts&photography/AbstractArt/1589392741_product-2.jpg'),
(45, 60, 'uploads/Arts & Photography/Monet/1589394581_product-4.jpg'),
(46, 60, 'uploads/Arts&photography/Monet/1589392971_product-10.jpg'),
(47, 60, 'uploads/Arts&photography/Monet/1589394979_product-9.jpg'),
(48, 61, 'uploads/Biographies/OnBecomingALeader/1589395073_product-3.jpg'),
(49, 61, 'uploads/Biographies/OnBecomingALeader/1589395073_product-5.jpg'),
(50, 62, 'uploads/Childrensbooks/QuantiomPhisich/1589468037_51pNYbuPA9L._AC_SX184_.jpg'),
(52, 64, 'uploads/Biographies/Horror/1589503599_wb1.jpg'),
(53, 65, 'uploads/Business&money/ShortStory/1589504010_91aW1-EYKDL.SR160,240_BG243,243,243.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(7, 5, '2018-09-26 22:11:46', 'no'),
(8, 4, '2018-09-26 21:33:26', 'no'),
(9, 4, '2018-09-28 10:15:31', 'no'),
(10, 4, '2018-09-28 11:39:06', 'no'),
(11, 4, '2018-09-28 10:15:49', 'no'),
(12, 5, '2018-09-28 16:45:04', 'no'),
(13, 4, '2018-09-28 16:45:03', 'no'),
(14, 5, '2020-03-29 02:04:55', 'no'),
(15, 5, '2020-03-29 22:10:45', 'no'),
(16, 799999999, '2020-03-29 23:09:08', 'no'),
(17, 799999999, '2020-03-29 23:12:37', 'no'),
(18, 1, '2020-03-29 23:21:00', 'no'),
(19, 123456789, '2020-03-29 23:26:58', 'no'),
(20, 1, '2020-03-29 23:33:15', 'no'),
(21, 1, '2020-03-29 23:40:34', 'no'),
(22, 1, '2020-03-30 00:24:06', 'no'),
(23, 788320226, '2020-03-30 20:30:16', 'no'),
(24, 1, '2020-03-30 23:37:54', 'no'),
(25, 1, '2020-03-31 00:08:27', 'no'),
(26, 123456789, '2020-03-31 00:09:21', 'no'),
(27, 788320226, '2020-03-31 00:12:13', 'no'),
(28, 788320226, '2020-03-31 21:20:44', 'no'),
(29, 123456789, '2020-04-01 00:25:47', 'no'),
(30, 123456789, '2020-04-01 19:32:28', 'no'),
(31, 123456789, '2020-04-01 20:55:13', 'no'),
(32, 123456789, '2020-04-01 20:56:03', 'no'),
(33, 1, '2020-04-01 21:03:11', 'no'),
(34, 788320226, '2020-04-01 21:07:12', 'no'),
(35, 788320226, '2020-04-01 21:33:44', 'no'),
(36, 1, '2020-04-03 15:11:18', 'no'),
(37, 1, '2020-04-03 16:05:09', 'no'),
(38, 1, '2020-04-03 16:37:46', 'no'),
(39, 788320226, '2020-04-03 16:51:07', 'no'),
(40, 1, '2020-04-03 16:53:37', 'no'),
(41, 123456789, '2020-04-03 16:56:24', 'no'),
(42, 788320226, '2020-04-03 18:01:16', 'no'),
(43, 1, '2020-04-06 13:46:49', 'no'),
(44, 1, '2020-04-06 17:27:58', 'no'),
(45, 1, '2020-04-07 00:36:34', 'no'),
(46, 1, '2020-04-07 13:00:34', 'no'),
(47, 1, '2020-04-07 21:36:10', 'no'),
(48, 1, '2020-04-08 01:33:15', 'no'),
(49, 1, '2020-04-09 18:24:10', 'yes'),
(50, 123456789, '2020-04-09 18:33:28', 'no'),
(51, 123456789, '2020-04-09 18:43:44', 'no'),
(52, 123456789, '2020-04-09 18:53:05', 'no'),
(53, 123456789, '2020-04-09 18:53:44', 'no'),
(54, 1, '2020-04-09 18:58:11', 'no'),
(55, 123456789, '2020-04-09 18:58:26', 'no'),
(56, 123456789, '2020-04-09 22:17:26', 'no'),
(57, 788320226, '2020-04-09 22:37:10', 'no'),
(58, 123456789, '2020-04-09 22:40:02', 'no'),
(59, 123456789, '2020-04-09 23:15:15', 'no'),
(60, 1, '2020-04-10 14:42:03', 'no'),
(61, 123456789, '2020-04-10 14:43:05', 'no'),
(62, 7, '2020-05-11 18:02:15', 'no'),
(63, 8, '2020-05-11 18:03:06', 'yes'),
(64, 7, '2020-05-11 19:19:55', 'no'),
(65, 1, '2020-05-11 20:52:39', 'no'),
(66, 7, '2020-05-11 21:20:30', 'no'),
(67, 1, '2020-05-11 21:58:28', 'no'),
(68, 1, '2020-05-11 22:04:57', 'no'),
(69, 1, '2020-05-12 17:47:46', 'no'),
(70, 1, '2020-05-12 19:45:41', 'no'),
(71, 1, '2020-05-13 13:15:48', 'no'),
(72, 1, '2020-05-14 13:32:02', 'no'),
(73, 1, '2020-05-14 14:15:33', 'no'),
(74, 8, '2020-05-14 14:47:22', 'no'),
(75, 1, '2020-05-15 01:47:28', 'no'),
(76, 1, '2020-05-15 02:28:31', 'no'),
(77, 7, '2020-05-15 22:13:58', 'no'),
(78, 7, '2020-05-16 06:06:41', 'no'),
(79, 8, '2020-05-16 13:41:57', 'no'),
(80, 8, '2020-05-16 19:08:36', 'yes'),
(81, 1, '2020-05-16 19:09:27', 'no'),
(82, 1, '2020-05-16 19:42:39', 'no'),
(83, 1, '2020-05-16 20:44:27', 'no'),
(84, 7, '2020-05-16 21:52:53', 'no'),
(85, 7, '2020-05-16 22:00:18', 'no'),
(86, 7, '2020-05-16 23:36:32', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `list_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `list_price`) VALUES
(5, 4, 63, 2, 0),
(6, 4, 62, 2, 0),
(7, 4, 59, 3, 0),
(8, 4, 65, 5, 0),
(9, 4, 66, 2, 0),
(10, 5, 60, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id_order` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` double NOT NULL,
  `order_date` date NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id_order`, `customer_id`, `order_status`, `order_date`, `total`) VALUES
(4, 8, 1, '2020-05-11', 90),
(5, 7, 1, '2020-05-06', 200);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `price_prod` float NOT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `prod_name`, `prod_desc`, `author_name`, `price_prod`, `product_qty`, `id_cat`) VALUES
(59, 'Abstract Art', 'Since the early years of the 20th century Western abstract art has fascinated, outraged and bewildered audiences its path to acceptance within the artistic mainstream was slow Anna Moszynska traces the origins and evolution of abstract art', 'Anna Moszynska', 30, 20, 11),
(60, 'Monet', 'is one of the most admired and famous painters of all time and the architect of Impressionism a revolution that gave birth to modern art. His technique  painting out of doors', 'james H Rubian', 30, 40, 11),
(61, 'ON BECOMING A LEADER', 'Deemed the dean of leadership gurus by Forbes magazine Warren Bennis has for years persuasively argued that leaders are not born they are made', ' Warren G', 20, 30, 12),
(62, 'quantiom phisich', 'quantiom phisich', 'Chris Ferrie', 20, 10, 14),
(63, 'Iggy Peck and the Mysterious Mansion', 'Iggy Peck and the Mysterious Mansion Iggy Peck and the Mysterious Mansion', 'Andrea Beaty', 10, 20, 14),
(64, 'Horror', 'Horror Horror Horror Horror', 'Horror', 30, 20, 12),
(65, 'Short story', 'Short story Short story Short story', 'Short story', 30, 20, 13),
(66, 'Mystery', 'Mystery Mystery Mystery Mystery Mystery', 'Mystery', 90, 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `slider_table`
--

CREATE TABLE `slider_table` (
  `slider_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `slider_descr` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_table`
--

INSERT INTO `slider_table` (`slider_id`, `img`, `slider_descr`, `status`) VALUES
(10, 'uploads/slider/1589408512_home-slider-1-ai.png', 'Buy 3. Get Free 1.', 1),
(11, 'uploads/slider/1589408531_home-slider-2-ai.png', 'Deal of the week up to 50% off Special offer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_discount_pro`
--
ALTER TABLE `cat_discount_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dis` (`id_dis`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_value`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `slider_table`
--
ALTER TABLE `slider_table`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cat_discount_pro`
--
ALTER TABLE `cat_discount_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `slider_table`
--
ALTER TABLE `slider_table`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cat_discount_pro`
--
ALTER TABLE `cat_discount_pro`
  ADD CONSTRAINT `cat_discount_pro_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `cat_discount_pro_ibfk_2` FOREIGN KEY (`id_dis`) REFERENCES `discount` (`discount_value`),
  ADD CONSTRAINT `cat_discount_pro_ibfk_3` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `comment_table_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`id_order`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`id_customer`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
