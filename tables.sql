-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2021 at 03:26 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smileapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `display_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donor_accounts`
--

DROP TABLE IF EXISTS `donor_accounts`;
CREATE TABLE IF NOT EXISTS `donor_accounts` (
  `donor_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `display_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `verified` int NOT NULL DEFAULT '0',
  `donated` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`donor_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donor_post_owners`
--

DROP TABLE IF EXISTS `donor_post_owners`;
CREATE TABLE IF NOT EXISTS `donor_post_owners` (
  `post_id` int NOT NULL,
  `donor_id` int NOT NULL,
  PRIMARY KEY (`post_id`,`donor_id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `donor_id` (`donor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

DROP TABLE IF EXISTS `funds`;
CREATE TABLE IF NOT EXISTS `funds` (
  `fund_id` int NOT NULL AUTO_INCREMENT,
  `giftee_id` int NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'medical',
  `image` varchar(200) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `town` varchar(150) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `district` varchar(150) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `title` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `amount` float NOT NULL,
  `filled` float NOT NULL DEFAULT '0',
  `keywords` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `created_at` int NOT NULL,
  `account_number` varchar(300) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `account_holder` varchar(300) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `bank_name` varchar(300) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `branch_name` varchar(300) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  PRIMARY KEY (`fund_id`),
  KEY `giftee_id` (`giftee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giftee_accounts`
--

DROP TABLE IF EXISTS `giftee_accounts`;
CREATE TABLE IF NOT EXISTS `giftee_accounts` (
  `giftee_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `display_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `verified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`giftee_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giftee_post_owners`
--

DROP TABLE IF EXISTS `giftee_post_owners`;
CREATE TABLE IF NOT EXISTS `giftee_post_owners` (
  `post_id` int NOT NULL,
  `giftee_id` int NOT NULL,
  PRIMARY KEY (`post_id`,`giftee_id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `giftee_id` (`giftee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization_accounts`
--

DROP TABLE IF EXISTS `organization_accounts`;
CREATE TABLE IF NOT EXISTS `organization_accounts` (
  `organization_id` int NOT NULL AUTO_INCREMENT,
  `display_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `register_data` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `verified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`organization_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization_owners`
--

DROP TABLE IF EXISTS `organization_owners`;
CREATE TABLE IF NOT EXISTS `organization_owners` (
  `organization_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`organization_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `visibility` int NOT NULL DEFAULT '0',
  `image` varchar(200) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `town` varchar(200) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `district` varchar(200) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `title` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `keywords` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `created_at` int NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(400) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `first_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `last_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `dob` varchar(20) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `nic` varchar(15) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `tp` varchar(12) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `password` varchar(300) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
