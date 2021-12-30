-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_ID`) VALUES
(1),
(5),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `animalcarefund`
--

CREATE TABLE `animalcarefund` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `accountnumber` text DEFAULT NULL,
  `accountholder` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `branchname` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='AnimalCareFunds';

--
-- Dumping data for table `animalcarefund`
--

INSERT INTO `animalcarefund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `accountnumber`, `accountholder`, `bankname`, `branchname`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'katunayaka', 'colombo', 'Animal Welfare in Sri Lanka: How and Where to help.', 'We are an Animal welfare organization and we are caring street dogs. So we need your help to afford their costs.', 5000000, 200000, 'Animal Welfare Street Dogs', '5145484564', 'wathsala', 'BOC', 'homagama', 0, '2021-02-06', 11, 0, 0, 0, 0),
(2, 'image2.png', 'Borella', 'Colombo', 'Animal SOS Sri Lanka', 'Our mission is to alleviate the suffering of stray animals in Sri Lanka by providing life-saving veterinary care, rehabilitation, homing and refuge. join us with a donation.', 800000, 150000, 'Animal Welfare Street Dogs stray animals ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(3, 'image3.png', 'Kahathuduwa', 'Kaluthara', 'Animal Welfare and Protection Association', 'AWPA is a registered association in Sri Lanka, committed to the caring of stray, abandoned and abused dogs and cats on a non-for-profit basis. AWPA is governed by a committee of volunteers. We perform a vital service of conducting sterilization programs across the country, rescuing and sheltering these domestic animals. We hope your donations to our organization.', 1000000, 300000, 'AWPA Animal Welfare and Protection Association ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(4, 'image4.png', 'Homagama', 'Colombo', 'Let\'s save stray pups in Sri Lanka.', 'Baw Baw is committed to build a compassionate world where every little life is valued. We focus on creating a better life for stray dogs and cats in Sri Lanka through various projects. Donate now :)', 900000, 125000, 'Baw Baw stray dogs', NULL, NULL, NULL, NULL, 0, '0000-00-00', 6, 0, 0, 0, 0),
(5, 'image5.png', 'Katunayake', 'Colombo', 'Animal Welfare in Sri Lanka: How and Where to help.', 'We are an Animal welfare organization and we are caring street dogs. So we need your help to afford their costs.', 500000, 20000, 'Animal Welfare Street Dogs', NULL, NULL, NULL, NULL, 0, '0000-00-00', 7, 0, 0, 0, 0),
(6, 'image6.png', 'Borella', 'Colombo', 'Animal SOS Sri Lanka', 'Our mission is to alleviate the suffering of stray animals in Sri Lanka by providing life-saving veterinary care, rehabilitation, homing and refuge', 800000, 150000, 'Animal Welfare Street Dogs stray animals ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(7, 'image7.png', 'Kahathuduwa', 'Kaluthara', 'Animal Welfare and Protection Association', 'AWPA is a registered association in Sri Lanka, committed to the caring of stray, abandoned and abused dogs and cats on a non-for-profit basis. AWPA is governed by a committee of volunteers. We perform a vital service of conducting sterilization programs across the country, rescuing and sheltering these domestic animals. We hope your donations to our organization.', 1000000, 300000, 'AWPA Animal Welfare and Protection Association ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 2, 0, 0, 0, 0),
(8, 'image8.png', 'Homagama', 'Colombo', 'Let\'s save stray pups in Sri Lanka.', 'Baw Baw is committed to build a compassionate world where every little life is valued. We focus on creating a better life for stray dogs and cats in Sri Lanka through various projects. Donate now :)', 900000, 125000, 'Baw Baw stray dogs', NULL, NULL, NULL, NULL, 0, '0000-00-00', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `animalcarefund_comment`
--

CREATE TABLE `animalcarefund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animalcarefund_donate`
--

CREATE TABLE `animalcarefund_donate` (
  `ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `donor_name` text NOT NULL,
  `visibility` text DEFAULT NULL,
  `tip` int(5) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `animalcarefund_report`
--

CREATE TABLE `animalcarefund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animalcarepost`
--

CREATE TABLE `animalcarepost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalcarepost`
--

INSERT INTO `animalcarepost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `visibility`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Katunayake', 'Colombo', 'dog', 'We are an Animal welfare organization and we are caring street dogs. You also can join with us by adopting a puppy from us.', 'Giftee', 'adopt stray dogs', '', 0, '0000-00-00', 6, 2, 5, 0, 1),
(2, 'image2.png', 'Borella', 'Colombo', 'food', 'Our mission is to alleviate the suffering of stray animals in Sri Lanka by providing life-saving veterinary care, rehabilitation, homing and refuge. join us with a food item.', 'Giftee', 'Animal Welfare Street Dogs stray animals ', '', 0, '0000-00-00', 11, 0, 0, 0, 0),
(3, 'image3.png', 'Pothuvil', 'Ampara', 'puppy', 'There is a little dog family near the Sri Bhodirajaramaya Temple in Pothuvil. I will bring them to your door step if you are an animal lover who would like to adopt a puppy.', 'Donor', 'Adopt Puupy Dog Stray Pothuvil', '', 0, '0000-00-00', 12, 0, 0, 0, 1),
(4, 'image4.png', 'Dambulla', 'Mathale', 'puppy', 'I have got 6 Doberman puppies from my Ruby\'s first liter. I would like to donate them to the Doberman lovers who are unable to by a puppy :) ', 'Donor', 'Doberman free puppy', '', 0, '0000-00-00', 13, 0, 0, 0, 1),
(5, 'image5.png', 'Katunayake', 'Colombo', 'dog', 'We are an Animal welfare organization and we are caring street dogs. You also can join with us by adopting a puppy from us.', 'Giftee', 'adopt stray dogs', '', 0, '0000-00-00', 5, 0, 0, 0, 1),
(6, 'image6.png', 'Borella', 'Colombo', 'food', 'Our mission is to alleviate the suffering of stray animals in Sri Lanka by providing life-saving veterinary care, rehabilitation, homing and refuge. join us with a food item.', 'Giftee', 'Animal Welfare Street Dogs stray animals ', '', 0, '0000-00-00', 8, 0, 0, 0, 0),
(7, 'image7.png', 'Pothuvil', 'Ampara', 'puppy', 'There is a little dog family near the Sri Bhodirajaramaya Temple in Pothuvil. I will bring them to your door step if you are an animal lover who would like to adopt a puppy.', 'Donor', 'Adopt Puupy Dog Stray Pothuvil', '', 0, '0000-00-00', 9, 0, 0, 0, 1),
(8, 'image8.png', 'Dambulla', 'Mathale', 'puppy', 'I have got 6 Doberman puppies from my Ruby\'s first liter. I would like to donate them to the Doberman lovers who are unable to by a puppy :) ', 'Donor', 'Doberman free puppy', '', 0, '0000-00-00', 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `animalcarepost_comment`
--

CREATE TABLE `animalcarepost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animalcarepost_report`
--

CREATE TABLE `animalcarepost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalcarepost_report`
--

INSERT INTO `animalcarepost_report` (`ID`, `post_ID`, `user_ID`, `date`, `time`, `feedback`) VALUES
(1, 2, 12, '2021-11-25 00:00:00', '04:00:51', 'mnbdsc jsbc sdjchbsn dckjsdc nmsd c');

-- --------------------------------------------------------

--
-- Table structure for table `childrenfund`
--

CREATE TABLE `childrenfund` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `accountnumber` text DEFAULT NULL,
  `accountholder` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `branchname` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ChildrenFunds';

--
-- Dumping data for table `childrenfund`
--

INSERT INTO `childrenfund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `accountnumber`, `accountholder`, `bankname`, `branchname`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Bandarawela', 'Badulla', 'Himaya needs your help.', 'Himaya is a 15 years old girl who spends a very hard life style. Her Father got injured and disabled after he fallen down from a tree. But Himaya is very talented in athletics and she hope to start a fund to afford her costs. ', 500000, 145000, 'Himaya athletics talented girl', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(2, 'image2.png', 'Maharagama', 'Colombo', 'Sucharithodaya Niwasaya', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating a small money to us. ', 100000, 25000, 'children child care center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 10, 0, 0, 0, 0),
(3, 'image3.png', 'Embilipitiya', 'Hambantota', 'need a help', 'I am Saman I need a mobile phone to participate my online classes. So help me to buy a phone by donating to my fund.', 30000, 11000, 'mobile phone online lessons', NULL, NULL, NULL, NULL, 0, '0000-00-00', 11, 0, 0, 0, 0),
(4, 'image4.png', 'Sri Jayawadenepura Kotte', 'Colombo', 'Vajira Sri Children\'s Development Center', 'We need a financial help to look after the children in our child care center. So please help us.', 5000000, 200000, 'Child care center Vajira Sri Children\'s Development Center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 12, 0, 0, 0, 0),
(5, 'image5.png', 'Bandarawela', 'Badulla', 'Himaya needs your help.', 'Himaya is a 15 years old girl who spends a very hard life style. Her Father got injured and disabled after he fallen down from a tree. But Himaya is very talented in athletics and she hope to start a fund to afford her costs. ', 500000, 145000, 'Himaya athletics talented girl', NULL, NULL, NULL, NULL, 0, '0000-00-00', 7, 0, 0, 0, 0),
(6, 'image6.png', 'Maharagama', 'Colombo', 'Sucharithodaya Niwasaya', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating a small money to us. ', 100000, 25000, 'children child care center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 8, 0, 0, 0, 0),
(7, 'image7.png', 'Embilipitiya', 'Hambantota', 'need a help', 'I am Saman I need a mobile phone to participate my online classes. So help me to buy a phone by donating to my fund.', 30000, 11000, 'mobile phone online lessons', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(8, 'image8.png', 'Sri Jayawadenepura Kotte', 'Colombo', 'Vajira Sri Children\'s Development Center', 'We need a financial help to look after the children in our child care center. So please help us.', 5000000, 200000, 'Child care center Vajira Sri Children\'s Development Center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `childrenfund_comment`
--

CREATE TABLE `childrenfund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `childrenfund_donate`
--

CREATE TABLE `childrenfund_donate` (
  `ID` int(5) NOT NULL,
  `date` int(5) NOT NULL,
  `donor_name` int(5) NOT NULL,
  `visibility` int(5) DEFAULT NULL,
  `tip` int(11) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `childrenfund_report`
--

CREATE TABLE `childrenfund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `childrenpost`
--

CREATE TABLE `childrenpost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childrenpost`
--

INSERT INTO `childrenpost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `visibility`, `report_count`, `create_date`, `status`) VALUES
(1, 'image1.png', 'Karadiyanaru', 'Batticoloa', 'swimming equipment', 'Shavini is a little girl who got the championship of Sri Lanka swimming contest. She needs swimming equipment to participate the Asian competitions. Please help her to bring a proud to Sri Lanka.', 'Giftee', 'Swimming Shavini equipment', 10, 1, 2, 0, '', 0, '0000-00-00', 1),
(2, 'image2.png', 'Maharagama', 'Colombo', 'new books, school bags, purse, stationeries ', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating them.', 'Giftee', 'children child care center', 11, 0, 0, 0, '', 0, '0000-00-00', 1),
(3, 'image3.png', 'Embilipitiya', 'Hambantota', 'mobile phone', 'I am Saman I need a mobile phone to participate my online classes. So help me witha phone to continue my studies.', 'Giftee', 'mobile phone online lessons', 12, 0, 0, 0, '', 0, '0000-00-00', 1),
(4, 'image4.png', 'Poonakary', 'Kilinochchi', 'mobile phones', 'I would like to distribute 10 mobile phones who are the school children and need a mobile phone to participate the online lessons in Kilinochchi District. If you need a mobile phone contact me.', 'Donor', 'Mobile phone Kilinochchi district', 13, 0, 0, 0, '', 0, '0000-00-00', 1),
(5, 'image5.png', 'Karadiyanaru', 'Batticoloa', 'swimming equipment', 'Shavini is a little girl who got the championship of Sri Lanka swimming contest. She needs swimming equipment to participate the Asian competitions. Please help her to bring a proud to Sri Lanka.', 'Giftee', 'Swimming Shavini equipment', 10, 0, 0, 0, '', 0, '0000-00-00', 0),
(6, 'image6.png', 'Maharagama', 'Colombo', 'new books, school bags, purse, stationeries ', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating them.', 'Giftee', 'children child care center', 9, 0, 0, 0, '', 0, '0000-00-00', 0),
(7, 'image7.png', 'Embilipitiya', 'Hambantota', 'mobile phone', 'I am Saman I need a mobile phone to participate my online classes. So help me witha phone to continue my studies.', 'Giftee', 'mobile phone online lessons', 5, 0, 0, 0, '', 0, '0000-00-00', 0),
(8, 'image8.png', 'Poonakary', 'Kilinochchi', 'Mobile phones', 'I would like to distribute 10 mobile phones who are the school children and need a mobile phone to participate the online lessons in Kilinochchi District. If you need a mobile phone contact me.', 'Donor', 'Mobile phone Kilinochchi district', 4, 0, 0, 0, '', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `childrenpost_comment`
--

CREATE TABLE `childrenpost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `childrenpost_report`
--

CREATE TABLE `childrenpost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationfund`
--

CREATE TABLE `educationfund` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `account_holder` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `branch_name` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='EducationFunds';

--
-- Dumping data for table `educationfund`
--

INSERT INTO `educationfund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `account_number`, `account_holder`, `bank_name`, `branch_name`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Bandarawela', 'Badulla', 'Himaya needs your help.', 'Himaya is a 15 years old girl who spends a very hard life style. Her Father got injured and disabled after he fallen down from a tree. But Himaya is very talented in athletics and she hope to start a fund to afford her costs. ', 500000, 145000, 'Himaya athletics talented girl', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(2, 'image2.png', 'Maharagama', 'Colombo', 'Sucharithodaya Niwasaya', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating a small money to us. ', 100000, 25000, 'children child care center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 4, 0, 0, 0, 0),
(3, 'image3.png', 'Embilipitiya', 'Hambantota', 'Need a help', 'I am Saman I need a mobile phone to participate my online classes. So help me to buy a phone by donating to my fund.', 30000, 11000, 'mobile phone online lessons', NULL, NULL, NULL, NULL, 0, '0000-00-00', 9, 0, 0, 0, 0),
(4, 'image4.png', 'Nagoda', 'Galle', 'Need a help.', 'I am Sumeth and my parents are unable to afford the cost for my studies and I hope a help from you to continue my studies.', 60000, 15000, 'Sumeth studies', NULL, NULL, NULL, NULL, 0, '0000-00-00', 6, 0, 0, 0, 0),
(5, 'image5.png', 'Bandarawela', 'Badulla', 'Himaya needs your help.', 'Himaya is a 15 years old girl who spends a very hard life style. Her Father got injured and disabled after he fallen down from a tree. But Himaya is very talented in athletics and she hope to start a fund to afford her costs. ', 500000, 145000, 'Himaya athletics talented girl', NULL, NULL, NULL, NULL, 0, '0000-00-00', 2, 0, 0, 0, 0),
(6, 'image6.png', 'Maharagama', 'Colombo', 'Sucharithodaya Niwasaya', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating a small money to us. ', 100000, 25000, 'children child care center', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(7, 'image7.png', 'Embilipitiya', 'Hambantota', 'Need a help', 'I am Saman I need a mobile phone to participate my online classes. So help me to buy a phone by donating to my fund.', 30000, 11000, 'mobile phone online lessons', NULL, NULL, NULL, NULL, 0, '0000-00-00', 11, 0, 0, 0, 0),
(8, 'image8.png', 'Nagoda', 'Galle', 'Need a help.', 'I am Sumeth and my parents are unable to afford the cost for my studies and I hope a help from you to continue my studies.', 60000, 15000, 'Sumeth studies', NULL, NULL, NULL, NULL, 0, '0000-00-00', 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `educationfund_comment`
--

CREATE TABLE `educationfund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationfund_donate`
--

CREATE TABLE `educationfund_donate` (
  `ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `donor_name` text NOT NULL,
  `visibility` text DEFAULT NULL,
  `tip` int(5) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educationfund_report`
--

CREATE TABLE `educationfund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationpost`
--

CREATE TABLE `educationpost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educationpost`
--

INSERT INTO `educationpost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `visibility`, `report_count`, `create_date`, `status`) VALUES
(1, 'image1.png', 'Karadiyanaru', 'Batticoloa', 'swimming equipment', 'Shavini is a little girl who got the championship of Sri Lanka swimming contest. She needs swimming equipment to participate the Asian competitions. Please help her to bring a proud to Sri Lanka.', 'Giftee', 'Swimming Shavini equipment', 5, 0, 0, 0, '', 0, '0000-00-00', 1),
(2, 'image2.png', 'Maharagama', 'Colombo', 'new books, school bags, purse, stationeries ', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating them.', 'Giftee', 'children child care center', 4, 0, 0, 0, '', 0, '0000-00-00', 0),
(3, 'image3.png', 'Embilipitiya', 'Hambantota', 'mobile phone', 'I am Saman I need a mobile phone to participate my online classes. So help me witha phone to continue my studies.', 'Giftee', 'mobile phone online lessons', 1, 0, 0, 0, '', 0, '0000-00-00', 1),
(4, 'image4.png', 'Poonakary', 'Kilinochchi', 'mobile phone', 'I would like to distribute 10 mobile phones who are the school children and need a mobile phone to participate the online lessons in Kilinochchi District. If you need a mobile phone contact me.', 'Donor', 'Mobile phone Kilinochchi district', 6, 0, 0, 0, '', 0, '0000-00-00', 1),
(5, 'image5.png', 'Karadiyanaru', 'Batticoloa', 'swimming equipment', 'Shavini is a little girl who got the championship of Sri Lanka swimming contest. She needs swimming equipment to participate the Asian competitions. Please help her to bring a proud to Sri Lanka.', 'Giftee', 'Swimming Shavini equipment', 2, 0, 0, 0, '', 0, '0000-00-00', 1),
(6, 'image6.png', 'Maharagama', 'Colombo', 'new books, school bags, purse, stationeries ', 'For the next year we need to buy new books, school bags, purse, stationeries for the children in our child care center. So we are going you can join with us by donating them.', 'Giftee', 'children child care center', 7, 0, 0, 0, '', 0, '0000-00-00', 1),
(7, 'image7.png', 'Embilipitiya', 'Hambantota', 'mobile phone', 'I am Saman I need a mobile phone to participate my online classes. So help me witha phone to continue my studies.', 'Giftee', 'mobile phone online lessons', 8, 0, 0, 0, '', 0, '0000-00-00', 1),
(8, 'image8.png', 'Poonakary', 'Kilinochchi', 'mobile phone', 'I would like to distribute 10 mobile phones who are the school children and need a mobile phone to participate the online lessons in Kilinochchi District. If you need a mobile phone contact me.', 'Donor', 'Mobile phone Kilinochchi district', 2, 0, 0, 0, '', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `educationpost_comment`
--

CREATE TABLE `educationpost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationpost_report`
--

CREATE TABLE `educationpost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_ID` int(5) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `time` time NOT NULL,
  `district` text NOT NULL,
  `town` text NOT NULL,
  `tittle` text NOT NULL,
  `content` text NOT NULL,
  `picture` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID_1` int(5) NOT NULL,
  `member_ID_2` int(5) NOT NULL,
  `member_ID_3` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicalfund`
--

CREATE TABLE `medicalfund` (
  `ID` int(5) NOT NULL,
  `picture` text DEFAULT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `accountnumber` text DEFAULT NULL,
  `accountholder` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `branchname` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='MedicalFunds';

--
-- Dumping data for table `medicalfund`
--

INSERT INTO `medicalfund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `accountnumber`, `accountholder`, `bankname`, `branchname`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Welimada', 'Bandarawela', 'Little Shenaya needs your help', 'Shenaya, an 8 year old girl from rural area who needs immediate treatments for Lucamia. So we are group of doctors at cancer hospital who are gladly welcome any of your kind help. ', 32000, 10000, 'Lucamia Cancer ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 2, 0, 0, 0, 0),
(2, 'image2.jpg', 'Thalpe', 'Galle', 'Heart patient wants your help', 'I\'m Rashmika and I\'m a heart patient. I lost all the income due to my health situation. I should face my heart operation as soon as possible to save my life. But I need more money so I need your help.', 200000, 10000, 'Heart patient', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(3, 'image3.png', 'Wadduwa', 'Kaluthara', 'Read for a while', 'Hasmi is a 7 years old lottle girl who suffers alot due to the weakness of her vision. It can be cured by lens transplant. Nagoda General Hospital operate her eyes free of charge. But we should buy the lenses. So we are looking for your help to give back her clear vision.', 50000, 0, 'vision Lense transplant', NULL, NULL, NULL, NULL, 0, '0000-00-00', 7, 0, 0, 0, 0),
(4, 'image4.jpg', 'Godagama', 'Colombo', 'Ranjani needs your warm help', 'Ranjini is 54 years old woman who has a trouble in her hip bone. It can be cured by transplanting an artificial hip bone. But her family is unable to afford for it. We are the staff members of Homagama Base Hospital. We are looking for the helpful who would like to afford the costs for Mrs. Ranjani\'s operation.', 400000, 275000, 'hip bone transplanting', NULL, NULL, NULL, NULL, 0, '0000-00-00', 8, 0, 0, 0, 0),
(5, 'image5.png', 'Welimada', 'Bandarawela', 'Little Shenaya needs your help', 'Shenaya, an 8 year old girl from rural area who needs immediate treatments for Lucamia. So we are group of doctors at cancer hospital who are gladly welcome any of your kind help. ', 32000, 10000, 'Lucamia Cancer ', NULL, NULL, NULL, NULL, 0, '0000-00-00', 4, 0, 0, 0, 0),
(6, 'image6.png', 'Wadduwa', 'Kaluthara', 'Read for a while', 'Hasmi is a 7 years old lottle girl who suffers alot due to the weakness of her vision. It can be cured by lens transplant. Nagoda General Hospital operate her eyes free of charge. But we should buy the lenses. So we are looking for your help to give back her clear vision.', 50000, 0, 'vision Lense transplant', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(7, 'image7.jpg', 'Thalpe', 'Galle', 'Heart patient wants your help', 'I\'m Rashmika and I\'m a heart patient. I lost all the income due to my health situation. I should face my heart operation as soon as possible to save my life. But I need more money so I need your help.', 200000, 10000, 'Heart patient', NULL, NULL, NULL, NULL, 0, '0000-00-00', 6, 0, 0, 0, 0),
(8, 'image8.jpg', 'Godagama', 'Colombo', 'Ranjani needs your warm help', 'Ranjini is 54 years old woman who has a trouble in her hip bone. It can be cured by transplanting an artificial hip bone. But her family is unable to afford for it. We are the staff members of Homagama Base Hospital. We are looking for the helpful who would like to afford the costs for Mrs. Ranjani\'s operation.', 400000, 275000, 'hip bone transplanting', NULL, NULL, NULL, NULL, 0, '0000-00-00', 9, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalfund_comment`
--

CREATE TABLE `medicalfund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicalfund_donate`
--

CREATE TABLE `medicalfund_donate` (
  `ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `donor_name` text NOT NULL,
  `visibility` text DEFAULT NULL,
  `tip` int(11) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicalfund_report`
--

CREATE TABLE `medicalfund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicalpost`
--

CREATE TABLE `medicalpost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalpost`
--

INSERT INTO `medicalpost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `visibility`, `report_count`, `create_date`, `status`) VALUES
(1, 'image1.png', 'Welimada', 'Bandarawela', 'wheelchair', 'Shenaya, an 8 year old girl from rural area who is getting treatments for Lucamia. She needs a wheel chair because it is hard for her to walk herself. ', 'Giftee', 'Lucamia Cancer', 4, 0, 0, 0, '', 0, '0000-00-00', 1),
(2, 'image2.jpg', 'Gallambarawa', 'Polonnaruwa', 'A+ Kidney', 'Sunil is a 45 years old farmer who needs a A+ kidney to save the life. He is looking for a generous donator who likes to help him.', 'Giftee', 'A+ Kidney', 3, 0, 0, 0, '', 0, '0000-00-00', 1),
(3, 'image3.png', 'Mihinthale', 'Anuradhapura', 'artifitial leg', 'I am Lasantha. I am a disabled Army soldier and got injured by a bomb. I need a artificial leg to walk as earlier and looking for a generous person to donate me a artificial leg.\r\n', 'Giftee', 'Disabled Army Soldier Artificial leg', 7, 0, 0, 0, '', 0, '0000-00-00', 1),
(4, 'image4.png', 'Narammala', 'Kurunagala', 'blood', 'My daughter Harini is a thalassemia patient. We have to transfuse blood once a month. So we request your help to find B+ blood.\r\n', 'Giftee', 'thalassemia patient transfuse blood B+ Blood', 8, 0, 0, 0, '', 0, '0000-00-00', 0),
(5, 'image5.png', 'Welimada', 'Bandarawela', 'wheelchair', 'Shenaya, an 8 year old girl from rural area who is getting treatments for Lucamia. She needs a wheel chair because it is hard for her to walk herself. ', 'Giftee', 'Lucamia Cancer', 5, 0, 0, 0, '', 0, '0000-00-00', 1),
(6, 'image6.jpg', 'Gallambarawa', 'Polonnaruwa', 'A+ Kidney', 'Sunil is a 45 years old farmer who needs a A+ kidney to save the life. He is looking for a generous donator who likes to help him.', 'Giftee', 'A+ Kidney', 2, 0, 0, 0, '', 0, '0000-00-00', 0),
(7, 'image7.png', 'Mihinthale', 'Anuradhapura', 'artifitial leg', 'I am Lasantha. I am a disabled soldier and got injured by a bomb. I need a artificial leg to walk as earlier and looking for a generous person to donate me a artificial leg.\r\n', 'Giftee', 'Disabled Army Soldier Artificial leg', 1, 0, 0, 0, '', 0, '0000-00-00', 0),
(8, 'image8.png', 'Narammala', 'Kurunagala', 'blood', 'My daughter Harini is a thalassemia patient. We have to transfuse blood once a month. So we request your help to find B+ blood.\r\n', 'Giftee', 'thalassemia patient transfuse blood B+ Blood', 6, 0, 0, 0, '', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalpost_comment`
--

CREATE TABLE `medicalpost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicalpost_report`
--

CREATE TABLE `medicalpost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherfund`
--

CREATE TABLE `otherfund` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `accountnumber` text DEFAULT NULL,
  `accountholder` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `branchname` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='OtherFunds';

--
-- Dumping data for table `otherfund`
--

INSERT INTO `otherfund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `accountnumber`, `accountholder`, `bankname`, `branchname`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Dehiwala', 'Colombo', 'cleaning lakes', 'We are the volunteer group and we decide to clean the lakes in anuradhapura and need your help to find the equipments.', 300000, 45000, 'Equipments lakes', NULL, NULL, NULL, NULL, 0, '0000-00-00', 2, 0, 0, 0, 0),
(2, 'image2.png', 'Horana', 'Kaluthara', 'need a help', 'we need your help to construct a building in our temple.', 500000, 136000, 'temple building', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(3, 'image3.png', 'Panadura', 'Colombo', 'need instruments', 'we need to your help to take the instruments to the church', 400000, 152000, 'church instruments', NULL, NULL, NULL, NULL, 0, '0000-00-00', 9, 0, 0, 0, 0),
(4, 'image4.png', 'Rathmalvita', 'Gampaha', 'lets plant a tree', 'we are going to arrange a tree planting and distributing campaign. any nature lover can help us with a little donation.', 350000, 45000, 'tree planting campaign', NULL, NULL, NULL, NULL, 0, '0000-00-00', 4, 0, 0, 0, 0),
(5, 'image5.png', 'Dehiwala', 'Colombo', 'cleaning lakes', 'We are the volunteer group and we decide to clean the lakes in anuradhapura and need your help to find the equipment.', 300000, 45000, 'Equipments lakes', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(6, 'image6.png', 'Horana', 'Kaluthara', 'need a help', 'we need your help to construct a building in our temple.', 500000, 136000, 'temple building', NULL, NULL, NULL, NULL, 0, '0000-00-00', 8, 0, 0, 0, 0),
(7, 'image7.png', 'Panadura', 'Colombo', 'need instruments', 'we need to your help to take the instruments to the church', 400000, 152000, 'church instruments', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(8, 'image8.png', 'Rathmalvita', 'Gampaha', 'lets plant a tree', 'we are going to arrange a tree planting and distributing campaign. any nature lover can help us with a little donation.', 350000, 45000, 'tree planting campaign', NULL, NULL, NULL, NULL, 0, '0000-00-00', 6, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `otherfund_comment`
--

CREATE TABLE `otherfund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherfund_donate`
--

CREATE TABLE `otherfund_donate` (
  `ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `donor_name` text NOT NULL,
  `visibility` text DEFAULT NULL,
  `tip` int(11) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otherfund_report`
--

CREATE TABLE `otherfund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherpost`
--

CREATE TABLE `otherpost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherpost`
--

INSERT INTO `otherpost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `visibility`, `report_count`, `create_date`, `status`) VALUES
(1, 'image1.png', 'Dehiwala', 'Colombo', 'equipments to clean the lakes', 'We are the volunteer group and we decide to clean the lakes in anuradhapura and need your help to find the equipments', 'Giftee', 'Equipments lakes', 2, 0, 0, 0, '', 0, '0000-00-00', 1),
(2, 'image2.png', 'Horana', 'Kaluthara', 'materials for construct', 'we need your help to construct a building in our temple.', 'Giftee', 'temple building', 5, 0, 0, 0, '', 0, '0000-00-00', 1),
(3, 'image3.png', 'Panadura', 'Colombo', 'church instruments', 'we need to your help to take the instruments to the church', 'Giftee', 'church instruments', 9, 0, 0, 0, '', 0, '0000-00-00', 0),
(4, 'image4.png', 'Rathmalvita', 'Gampaha', 'plants', 'we are going to arrange a tree planting and distributing campaign. any nature lover can help us with providing plants.', 'Giftee', 'tree planting campaign', 4, 0, 0, 0, '', 0, '0000-00-00', 0),
(5, 'image5.png', 'Dehiwala', 'Colombo', 'equipments to clean the lakes', 'We are the volunteer group and we decide to clean the lakes in anuradhapura and need your help to find the equipments', 'Giftee', 'Equipments lakes', 5, 0, 0, 0, '', 0, '0000-00-00', 1),
(6, 'image6.png', 'Horana', 'Kaluthara', 'materials for construct', 'we need your help to construct a building in our temple.', 'Giftee', 'temple building', 8, 0, 0, 0, '', 0, '0000-00-00', 1),
(7, 'image7.png', 'Panadura', 'Colombo', 'church instruments', 'we need to your help to take the instruments to the church', 'Giftee', 'church instruments', 3, 0, 0, 0, '', 0, '0000-00-00', 1),
(8, 'image8.png', 'Rathmalvita', 'Gampaha', 'plants', 'we are going to arrange a tree planting and distributing campaign. any nature lover can help us with providing plants', 'Giftee', 'tree planting campaign', 6, 0, 0, 0, '', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `otherpost_comment`
--

CREATE TABLE `otherpost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherpost_report`
--

CREATE TABLE `otherpost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `user_ID` int(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `DOB` date NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `fundCount` int(10) NOT NULL,
  `postCount` int(10) NOT NULL,
  `donateCount` int(10) NOT NULL,
  `removed_count` int(11) NOT NULL,
  `donateAmount` int(15) NOT NULL,
  `balance` int(15) NOT NULL,
  `account_number` text NOT NULL,
  `branch_name` text NOT NULL,
  `bank_name` text NOT NULL,
  `picture` text NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `ID_image` text NOT NULL,
  `selfie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`user_ID`, `first_name`, `last_name`, `password`, `email`, `DOB`, `NIC`, `fundCount`, `postCount`, `donateCount`, `removed_count`, `donateAmount`, `balance`, `account_number`, `branch_name`, `bank_name`, `picture`, `address`, `contact_no`, `ID_image`, `selfie`) VALUES
(1, 'Wasundara', 'Silva', 'jellybean', 'wasundara@gmail.com', '1996-09-08', '967584253v', 0, 2, 5, 0, 0, 0, '2586421105', 'homagama', 'BOC', 'img1.jpg', '102/25, samanala mawatha, Godagama.', '0715962563', '', ''),
(2, 'Matheesha', 'Perera', 'artificial', 'math24fer@gmail.com', '1990-10-06', '845251845', 0, 0, 10, 2, 75000, 1000, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(3, 'Matheesha', 'Perera', 'artificialKite123', 'math245fer@gmail.com', '1990-10-06', '845251845', 0, 0, 0, 2, 0, 0, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(4, 'Matheesha', 'Perera', 'artificialKites', 'math4fer@gmail.com', '1990-10-06', '845251845', 6, 5, 0, 2, 0, 0, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(5, 'Vihas', 'Perera', 'artifacts125', 'Vihas24fer@gmail.com', '1990-10-06', '845251845', 7, 0, 0, 2, 0, 0, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(6, 'Bhawantha', 'Perera', 'BeautifulKite', 'Bhawa24fer@gmail.com', '1990-10-06', '845251845', 0, 0, 15, 2, 100000, 12000, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(7, 'Bhawantha', 'Perera', 'artificialKite123', 'bawa24fer@gmail.com', '1990-10-06', '845251845', 0, 0, 12, 2, 80000, 3000, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', ''),
(8, 'Maheema', 'sewwandi', 'artificialniceKite', 'mahee24fer@gmail.com', '1990-10-06', '845251825', 0, 0, 36, 2, 300000, 42000, '1516426544351535', 'Meegoda', 'BOC', 'img.png', '25/c, meegoda', '0783423876', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarefund`
--

CREATE TABLE `seniorcarefund` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `amount` double NOT NULL,
  `filled` double NOT NULL,
  `keywords` text DEFAULT NULL,
  `accountnumber` text DEFAULT NULL,
  `accountholder` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `branchname` text DEFAULT NULL,
  `report_count` int(2) NOT NULL,
  `create_date` date NOT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='SeniorCareFunds';

--
-- Dumping data for table `seniorcarefund`
--

INSERT INTO `seniorcarefund` (`ID`, `picture`, `town`, `district`, `title`, `content`, `amount`, `filled`, `keywords`, `accountnumber`, `accountholder`, `bankname`, `branchname`, `report_count`, `create_date`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `status`) VALUES
(1, 'image1.png', 'Dehiwala', 'Colombo', 'Sahana Udaya Elders Retreat Home', 'We are the management panel of Sahana Udaya Elders Retreat Home. We hope to buy new clothes for the new year for our mothers and fathers. So donate us and join with us.', 300000, 45000, 'Sahana Udaya Elders Retreat Home new cloths\r\n', NULL, NULL, NULL, NULL, 0, '0000-00-00', 1, 0, 0, 0, 0),
(2, 'image2.png', 'Horana', 'Kaluthara', 'Mahameth Ma-Piya Sewana Elders Home', 'We need your help to look after our mothers and fathers in our elders home. So donate us to look after them.', 500000, 136000, 'Mahameth Ma-Piya Sewana Elders Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 3, 0, 0, 0, 0),
(3, 'image3.png', 'Panadura', 'Colombo', 'Davit Jayasundara Elders Home', 'We need to buy some beds, cloth racks and cupboards to our Elders home. If you are interesting with this join with us by a small donation.', 400000, 152000, 'Davit Jayasundara Elders Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 4, 0, 0, 0, 0),
(4, 'image4.png', 'Rathmalvita', 'Gampaha', 'Kosovita Suwa Sevana Elder Home', 'We should do some repairs in our buildings. So we need your help for that. So donate us as you can.', 350000, 45000, 'Kosovita Suwa Sevana Elder Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 8, 0, 0, 0, 0),
(5, 'image5.png', 'Dehiwala', 'Colombo', 'Sahana Udaya Elders Retreat Home', 'We are the management panel of Sahana Udaya Elders Retreat Home. We hope to buy new clothes for the new year for our mothers and fathers. So donate us and join with us.', 300000, 45000, 'Sahana Udaya Elders Retreat Home new cloths\r\n', NULL, NULL, NULL, NULL, 0, '0000-00-00', 5, 0, 0, 0, 0),
(6, 'image6.png', 'Horana', 'Kaluthara', 'Mahameth Ma-Piya Sewana Elders Home', 'We need your help to look after our mothers and fathers in our elders home. So donate us to look after them.', 500000, 136000, 'Mahameth Ma-Piya Sewana Elders Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 2, 0, 0, 0, 0),
(7, 'image7.png', 'Panadura', 'Colombo', 'Davit Jayasundara Elders Home', 'We need to buy some beds, cloth racks and cupboards to our Elders home. If you are interesting with this join with us by a small donation.', 400000, 152000, 'Davit Jayasundara Elders Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 9, 0, 0, 0, 0),
(8, 'image8.png', 'Rathmalvita', 'Gampaha', 'Kosovita Suwa Sevana Elder Home', 'We should do some repairs in our buildings. So we need your help for that. So donate us as you can.', 350000, 45000, 'Kosovita Suwa Sevana Elder Home', NULL, NULL, NULL, NULL, 0, '0000-00-00', 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarefund_comment`
--

CREATE TABLE `seniorcarefund_comment` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarefund_donate`
--

CREATE TABLE `seniorcarefund_donate` (
  `ID` int(5) NOT NULL,
  `date` date NOT NULL,
  `donor_name` text NOT NULL,
  `visibility` text DEFAULT NULL,
  `tip` int(11) DEFAULT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarefund_report`
--

CREATE TABLE `seniorcarefund_report` (
  `ID` int(5) NOT NULL,
  `fund_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarepost`
--

CREATE TABLE `seniorcarepost` (
  `ID` int(5) NOT NULL,
  `picture` text NOT NULL,
  `town` text NOT NULL,
  `district` text NOT NULL,
  `item` text NOT NULL,
  `content` text NOT NULL,
  `post_type` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `user_ID` int(5) NOT NULL,
  `member_ID1` int(5) NOT NULL,
  `member_ID2` int(5) NOT NULL,
  `member_ID3` int(5) NOT NULL,
  `visibility` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seniorcarepost`
--

INSERT INTO `seniorcarepost` (`ID`, `picture`, `town`, `district`, `item`, `content`, `post_type`, `keywords`, `user_ID`, `member_ID1`, `member_ID2`, `member_ID3`, `visibility`, `report_count`, `create_date`, `status`) VALUES
(1, 'image1.png', 'Dehiwala', 'Colombo', 'new clothes', 'We are the management panel of Sahana Udaya Elders Retreat Home. We hope to buy new clothes for the new year for our mothers and fathers. So donate us and join with us.', 'Giftee', 'Sahana Udaya Elders Retreat Home', 5, 0, 0, 0, '', 0, '0000-00-00', 1),
(2, 'image2.png', 'Horana', 'Kaluthara', 'beds, cloth racks and cupboards', 'We need to buy some beds, cloth racks and cupboards to our Elders home. If you are interesting with this join with us as you can.', 'Giftee', 'Mahameth Ma-Piya Sewana Elders Home', 3, 0, 0, 0, '', 0, '0000-00-00', 1),
(3, 'image3.png', 'Kotagala', 'Nuwara-Eliya', 'beds', 'I would like donate 10 beds for elders home If anyone interesting with this contact me.', 'Donor', 'Beds Elders Home', 4, 0, 0, 0, '', 0, '0000-00-00', 1),
(4, 'image4.png', 'Doluwa', 'Kandy', 'lunch', 'I am looking for a Elders home to give a lunch for the mothers and fathers on my birthday. So if there is no sponsor already for the 10 th October Lunch contact me.', 'Donor', 'Lunch Birthday Elders Home 10 th October', 6, 0, 0, 0, '', 0, '0000-00-00', 1),
(5, 'image5.png', 'Dehiwala', 'Colombo', 'new clothes', 'We are the management panel of Sahana Udaya Elders Retreat Home. We hope to buy new clothes for the new year for our mothers and fathers. So donate us and join with us.', 'Giftee', 'Sahana Udaya Elders Retreat Home', 9, 0, 0, 0, '', 0, '0000-00-00', 1),
(6, 'image6.png', 'Horana', 'Kaluthara', 'beds, cloth racks and cupboards', 'We need to buy some beds, cloth racks and cupboards to our Elders home. If you are interesting with this join with us as you can.', 'Giftee', 'Mahameth Ma-Piya Sewana Elders Home', 2, 0, 0, 0, '', 0, '0000-00-00', 0),
(7, 'image7.png', 'Kotagala', 'Nuwara-Eliya', 'beds', 'I would like donate 10 beds for elders home If anyone interesting with this contact me.', 'Donor', 'Beds Elders Home', 8, 0, 0, 0, '', 0, '0000-00-00', 0),
(8, 'image8.png', 'Doluwa', 'Kandy', 'lunch', 'I am looking for a Elders home to give a lunch for the mothers and fathers on my birthday. So if there is no sponsor already for the 10 th October Lunch contact me.', 'Donor', 'Lunch Birthday Elders Home 10 th October', 7, 0, 0, 0, '', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarepost_comment`
--

CREATE TABLE `seniorcarepost_comment` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seniorcarepost_report`
--

CREATE TABLE `seniorcarepost_report` (
  `ID` int(5) NOT NULL,
  `post_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarefund`
--
ALTER TABLE `animalcarefund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_animalcarefunds` (`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarefund_comment`
--
ALTER TABLE `animalcarefund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE,
  ADD KEY `fk_animalcarefunds` (`fund_ID`) USING BTREE;

--
-- Indexes for table `animalcarefund_donate`
--
ALTER TABLE `animalcarefund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_animal_care_fund_animalcarefunds1` (`fund_ID`,`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarefund_report`
--
ALTER TABLE `animalcarefund_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_animalcarefunds` (`fund_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarepost`
--
ALTER TABLE `animalcarepost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_animalcareposts` (`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarepost_comment`
--
ALTER TABLE `animalcarepost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_animalcarepost_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `animalcarepost_report`
--
ALTER TABLE `animalcarepost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_animalcarepost` (`post_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `childrenfund`
--
ALTER TABLE `childrenfund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD UNIQUE KEY `fk_childrenfunds` (`user_ID`);

--
-- Indexes for table `childrenfund_comment`
--
ALTER TABLE `childrenfund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_childrenfund_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `childrenfund_donate`
--
ALTER TABLE `childrenfund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_children_fund_childrenfunds1` (`fund_ID`,`user_ID`);

--
-- Indexes for table `childrenfund_report`
--
ALTER TABLE `childrenfund_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_childrenfunds` (`fund_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `childrenpost`
--
ALTER TABLE `childrenpost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_childrenposts` (`user_ID`) USING BTREE;

--
-- Indexes for table `childrenpost_comment`
--
ALTER TABLE `childrenpost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_childrenpost_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `childrenpost_report`
--
ALTER TABLE `childrenpost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_childrenpost` (`post_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `educationfund`
--
ALTER TABLE `educationfund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_educationfunds_registered_user1` (`user_ID`);

--
-- Indexes for table `educationfund_comment`
--
ALTER TABLE `educationfund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_educationfund_registered_user` (`user_ID`);

--
-- Indexes for table `educationfund_donate`
--
ALTER TABLE `educationfund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_education_fund_educationfunds1` (`fund_ID`,`user_ID`);

--
-- Indexes for table `educationfund_report`
--
ALTER TABLE `educationfund_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_educationfunds` (`fund_ID`) USING BTREE,
  ADD KEY `fk_educationfund_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `educationpost`
--
ALTER TABLE `educationpost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_educationposts_registered_user1` (`user_ID`);

--
-- Indexes for table `educationpost_comment`
--
ALTER TABLE `educationpost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_educationpost_registered_user` (`user_ID`);

--
-- Indexes for table `educationpost_report`
--
ALTER TABLE `educationpost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_educationpost` (`post_ID`) USING BTREE,
  ADD KEY `fk_educationpost_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_ID`,`user_ID`),
  ADD KEY `fk_events_registered_user1` (`user_ID`);

--
-- Indexes for table `medicalfund`
--
ALTER TABLE `medicalfund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_medicalfunds_registered_user1` (`user_ID`) USING BTREE;

--
-- Indexes for table `medicalfund_comment`
--
ALTER TABLE `medicalfund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_medicalfund_registered_user` (`user_ID`);

--
-- Indexes for table `medicalfund_donate`
--
ALTER TABLE `medicalfund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_medical_fund_medicalfunds1` (`fund_ID`,`user_ID`);

--
-- Indexes for table `medicalfund_report`
--
ALTER TABLE `medicalfund_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_medicalfunds` (`fund_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `medicalpost`
--
ALTER TABLE `medicalpost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_medicalposts_registered_user1` (`user_ID`) USING BTREE;

--
-- Indexes for table `medicalpost_comment`
--
ALTER TABLE `medicalpost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_medicalpost_registered_user` (`user_ID`);

--
-- Indexes for table `medicalpost_report`
--
ALTER TABLE `medicalpost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_medicalpost` (`post_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `otherfund`
--
ALTER TABLE `otherfund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_otherfunds_registered_user1` (`user_ID`);

--
-- Indexes for table `otherfund_comment`
--
ALTER TABLE `otherfund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_otherfund_registered_user` (`user_ID`);

--
-- Indexes for table `otherfund_donate`
--
ALTER TABLE `otherfund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_other_fund_otherfunds1` (`fund_ID`,`user_ID`);

--
-- Indexes for table `otherfund_report`
--
ALTER TABLE `otherfund_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_otherfunds` (`fund_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `otherpost`
--
ALTER TABLE `otherpost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_otherposts_registered_user1` (`user_ID`);

--
-- Indexes for table `otherpost_comment`
--
ALTER TABLE `otherpost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_otherpost_registered_user` (`user_ID`);

--
-- Indexes for table `otherpost_report`
--
ALTER TABLE `otherpost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_otherpost` (`post_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `seniorcarefund`
--
ALTER TABLE `seniorcarefund`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_seniorcarefunds_registered_user1` (`user_ID`);

--
-- Indexes for table `seniorcarefund_comment`
--
ALTER TABLE `seniorcarefund_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_seniorfund_registered_user` (`user_ID`);

--
-- Indexes for table `seniorcarefund_donate`
--
ALTER TABLE `seniorcarefund_donate`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_donate_senior_care_fund_seniorcarefunds1` (`fund_ID`,`user_ID`);

--
-- Indexes for table `seniorcarefund_report`
--
ALTER TABLE `seniorcarefund_report`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `fk_registered_user` (`user_ID`),
  ADD KEY `fk_seniorcarefunds` (`fund_ID`) USING BTREE;

--
-- Indexes for table `seniorcarepost`
--
ALTER TABLE `seniorcarepost`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_seniorcareposts_registered_user1` (`user_ID`);

--
-- Indexes for table `seniorcarepost_comment`
--
ALTER TABLE `seniorcarepost_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_seniorcarepost_registered_user` (`user_ID`);

--
-- Indexes for table `seniorcarepost_report`
--
ALTER TABLE `seniorcarepost_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_seniorcarepost` (`post_ID`) USING BTREE,
  ADD KEY `fk_registered_user` (`user_ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animalcarefund`
--
ALTER TABLE `animalcarefund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `animalcarefund_report`
--
ALTER TABLE `animalcarefund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animalcarepost`
--
ALTER TABLE `animalcarepost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `animalcarepost_report`
--
ALTER TABLE `animalcarepost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `childrenfund`
--
ALTER TABLE `childrenfund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `childrenfund_report`
--
ALTER TABLE `childrenfund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `childrenpost`
--
ALTER TABLE `childrenpost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `childrenpost_report`
--
ALTER TABLE `childrenpost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationfund`
--
ALTER TABLE `educationfund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `educationfund_report`
--
ALTER TABLE `educationfund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationpost`
--
ALTER TABLE `educationpost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `educationpost_report`
--
ALTER TABLE `educationpost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalfund`
--
ALTER TABLE `medicalfund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `medicalfund_report`
--
ALTER TABLE `medicalfund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `medicalpost`
--
ALTER TABLE `medicalpost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `medicalpost_report`
--
ALTER TABLE `medicalpost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherfund`
--
ALTER TABLE `otherfund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otherfund_report`
--
ALTER TABLE `otherfund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherpost`
--
ALTER TABLE `otherpost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `otherpost_report`
--
ALTER TABLE `otherpost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `user_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seniorcarefund`
--
ALTER TABLE `seniorcarefund`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seniorcarefund_report`
--
ALTER TABLE `seniorcarefund_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seniorcarepost`
--
ALTER TABLE `seniorcarepost`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seniorcarepost_report`
--
ALTER TABLE `seniorcarepost_report`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
