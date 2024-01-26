-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 09:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshayatabroad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Naeem', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `domiciliation`
--

CREATE TABLE `domiciliation` (
  `did` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domiciliation`
--

INSERT INTO `domiciliation` (`did`, `cid`, `filename`, `status`, `rdate`) VALUES
(1, 2, 0x325f4e6165656d5f383733345f4953462046696c652e7064662c325f4e6165656d5f383930315f496e766f6963652d363631393035202832292e706466, 'Pending', '10-12-2023'),
(2, 3, 0x335f48616469615f383439365f4953462046696c652e7064662c335f48616469615f393433385f496e766f6963652d363631393035202831292e706466, 'Pending', '10-12-2023');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `iid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`iid`, `cid`, `filename`, `status`, `rdate`) VALUES
(14, 3, 0x335f48616469615f383234315f4953462046696c652e7064662c335f48616469615f343932355f496e766f6963652d363631393035202832292e706466, 'Pending', '10-12-2023'),
(16, 4, 0x345f536f6c6f6d6979615f333136335f4953462046696c652e7064662c345f536f6c6f6d6979615f313036335f496e766f6963652d363631393035202832292e706466, 'Pending', '10-12-2023'),
(17, 5, 0x355f686f6f725f343235355f4953462046696c652e7064662c355f686f6f725f383736335f496e766f6963652d363631393035202832292e706466, 'Pending', '11-12-2023'),
(19, 21, 0x32315f4d49484f55425f313139385f477569615f646f63656e74655f353434375f323032332d32303234202832292e7064662c32315f4d49484f55425f323234345f477569615f646f63656e74655f353434375f323032332d323032342e7064662c32315f4d49484f55425f313135355f477569615f646f63656e74655f353434375f323032332d323032342e706466, 'Pending', '18-01-2024'),
(20, 24, 0x32345f66616861645f333039375f696e766f696365202839292e7064662c32345f66616861645f353737395f696e766f696365202838292e706466, 'Pending', '22-01-2024'),
(21, 2, 0x325f4e6165656d5f343138395f45525f4469616772616d2e7064662c325f4e6165656d5f383539345f45525f4469616772616d2e706466, 'Pending', '26-01-2024'),
(22, 2, 0x325f4e6165656d5f363939325f45525f4469616772616d2e7064662c325f4e6165656d5f333331395f4552202831292e706466, 'Pending', '26-01-2024'),
(23, 2, 0x325f4e6165656d5f383732345f45525f4469616772616d202831292e7376672c325f4e6165656d5f323437375f496d6167656e2e706e67, 'Pending', '26-01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `otherlegal`
--

CREATE TABLE `otherlegal` (
  `lid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subject` text NOT NULL,
  `rdate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otherlegal`
--

INSERT INTO `otherlegal` (`lid`, `cid`, `subject`, `rdate`, `status`) VALUES
(1, 3, 'I want to take advice on some legal issues.', '10-12-2023', 'Pending'),
(9, 5, 'checking everything again', '11-12-2023', 'Pending'),
(13, 2, 'checking everything so far', '11-12-2023', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `recognition`
--

CREATE TABLE `recognition` (
  `rid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recognition`
--

INSERT INTO `recognition` (`rid`, `cid`, `choice`, `filename`, `status`, `rdate`) VALUES
(1, 3, 'High School', 0x335f48616469615f393434395f4953462046696c652e7064662c335f48616469615f333933365f496e766f6963652d363631393035202832292e706466, 'Pending', '10-12-2023'),
(3, 4, 'Bachelors', 0x345f536f6c6f6d6979615f323435385f4953462046696c652e7064662c345f536f6c6f6d6979615f323937325f4953462046696c652e706466, 'Pending', '10-12-2023'),
(4, 5, 'Masters', 0x355f686f6f725f353339365f4953462046696c652e7064662c355f686f6f725f383435305f4953462046696c652e706466, 'Pending', '11-12-2023'),
(5, 10, 'Bachelors', 0x31305f4f6d6172205f333632395f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f373530385f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f363436395f43565f536f6c6f6d6979612056656e6772796e6f767963682e706466, 'Pending', '03-01-2024'),
(6, 10, 'Bachelors', 0x31305f4f6d6172205f393432345f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f323335365f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f343938365f43565f536f6c6f6d6979612056656e6772796e6f767963682e706466, 'Pending', '03-01-2024'),
(7, 10, 'Bachelors', 0x31305f4f6d6172205f393436375f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f313931385f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f393538355f43565f536f6c6f6d6979612056656e6772796e6f767963682e706466, 'Pending', '03-01-2024'),
(8, 10, 'High School', 0x31305f4f6d6172205f333932395f4765747479496d616765732d313336323539333638322e776562702c31305f4f6d6172205f363730395f4765747479496d616765732d313336323539333638322e776562702c31305f4f6d6172205f373430335f4765747479496d616765732d313336323539333638322e776562702c31305f4f6d6172205f313136345f4765747479496d616765732d313336323539333638322e77656270, 'Pending', '04-01-2024'),
(9, 10, 'High School', 0x31305f4f6d6172205f313537345f477569615f646f63656e74655f353434375f323032332d323032342e7064662c31305f4f6d6172205f333131385f477569615f646f63656e74655f353434375f323032332d32303234202831292e706466, 'Pending', '17-01-2024'),
(10, 10, 'High School', 0x31305f4f6d6172205f393335315f477569615f646f63656e74655f353434375f323032332d323032342e7064662c31305f4f6d6172205f363631315f477569615f646f63656e74655f353434375f323032332d32303234202831292e706466, 'Pending', '17-01-2024'),
(11, 2, 'High School', 0x325f4e6165656d5f383433395f45525f4469616772616d2e7064662c325f4e6165656d5f383930345f45525f4469616772616d2e706466, 'Pending', '26-01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

CREATE TABLE `renewal` (
  `renid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `expiry` varchar(255) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`renid`, `cid`, `start`, `expiry`, `filename`, `status`, `rdate`) VALUES
(2, 2, '2023-12-20', '2027-11-19', 0x325f4e6165656d5f313434375f4953462046696c652e7064662c325f4e6165656d5f393336315f496e766f6963652d363631393035202832292e7064662c325f4e6165656d5f383037355f4953462046696c652e7064662c325f4e6165656d5f333931335f4953462046696c652e7064662c325f4e6165656d5f373039385f4953462046696c652e7064662c325f4e6165656d5f393831305f4953462046696c652e7064662c325f4e6165656d5f363639325f4953462046696c652e706466, 'Pending', '10-12-2023');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `rid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `dcity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`rid`, `cid`, `degree`, `field`, `choice`, `dcity`, `status`, `rdate`) VALUES
(4, 3, 'Professional Formation', 'Environmental Protection Conservation', 'High School Student', 'Barcelona', 'Pending', '10-12-2023'),
(5, 3, 'Bachelors Degree', 'Computing Information', 'High School Student', 'Barcelona', 'Pending', '10-12-2023'),
(6, 5, 'PHD degree', 'Graphic Design', 'High School Student', 'Madrid', 'Pending', '11-12-2023'),
(7, 5, 'Language School', 'Humanities', 'High School Student', 'Barcelona', 'Pending', '11-12-2023'),
(9, 9, 'Language School', 'Arts Design', 'Graduated Student', 'Barcelona', 'Pending', '31-12-2023'),
(10, 10, 'Bachelors Degree', 'Arts Design', 'High School Student', 'Madrid', 'Pending', '03-01-2024'),
(11, 10, 'Bachelors Degree', 'Agriculture Veterinary', 'Graduated Student', 'madrid', 'Pending', '03-01-2024'),
(12, 24, 'Language School', 'Accounting Finance', 'High School Student', 'span', 'Pending', '22-01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `resid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `expiry` varchar(255) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency`
--

INSERT INTO `residency` (`resid`, `cid`, `choice`, `start`, `expiry`, `filename`, `status`, `rdate`) VALUES
(2, 5, 'Yes', '2023-12-13', '2026-11-12', 0x355f686f6f725f343233375f4953462046696c652e7064662c355f686f6f725f333537375f4953462046696c652e7064662c355f686f6f725f343036355f4953462046696c652e706466, 'Pending', '11-12-2023');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subject` text NOT NULL,
  `rdate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`sid`, `cid`, `subject`, `rdate`, `status`) VALUES
(1, 3, 'I am just looking for financial aid.', '10-12-2023', 'Pending'),
(2, 5, 'I need some support for the current semester fee. ', '11-12-2023', 'Pending'),
(5, 3, 'Just need assistance.', '12-12-2023', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `regdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `birthdate`, `country`, `city`, `status`, `regdate`) VALUES
(2, 'Naeem', 'muhammadnaeem137@gmail.com', '123123', '+923121853261', '2023-12-12', 'Pakistan', 'Islamabad', 'PhD student', '10-12-2023'),
(3, 'Hadia', 'hadiatahir495@gmail.com', 'hello123', '+923085882194', '2023-12-24', 'Pakistan', 'Peshawar', 'high school student', '10-12-2023'),
(4, 'Solomiya', 'sol@gmail.com', '123123', '0231235532', '2023-12-08', 'Spain', 'Barcelona', 'graduated student', '10-12-2023'),
(5, 'hoor', 'hoor@gmail.com', '123123', '+923142342124', '2023-12-27', 'Pakistan', 'Taxila', 'PhD student', '11-12-2023'),
(7, 'Tabish', 'tab123@gmail.com', 'tab123', '+0239232234e', '2023-12-10', 'Pakistan', 'Islamabad', 'working professional', '25-12-2023'),
(8, 'Zumla', 'zumla@gmail.com', 'Zum123*', '', '', '', '', '', '30-12-2023'),
(9, 'jawad', 'jawadahmed65@gmail.com', 'jawad123', '03222806019', '1995-12-06', 'Pakistan', 'Islamabad', 'working professional', '31-12-2023'),
(10, 'Omar ', 'mihoubomar74@gmail.com', 'omarfarah198', '+34666710856', '2001-04-30', 'Tunisia', 'Madrid', 'bachelor student', '31-12-2023'),
(11, 'hachemmazhoudi', 'hachemmazhoudi9@gmail.com', 'hachem1234', '111222', '2000-07-08', 'Italia', 'Roma', 'bachelor student', '03-01-2024'),
(12, 'Naeem', 'omaromar@hachem.com', 'admin321', '', '', '', '', '', '03-01-2024'),
(14, 'Solomiya', 'solomiya123@gmail.com', 'omaromar1', '', '', '', '', '', '03-01-2024'),
(20, 'Naeem', 'naeem2@gmail.com', 'Hello123', '', '', '', '', '', '18-01-2024'),
(21, 'MIHOUB', 'mihoubomar30@gmail.com', 'omarfarah198', '', '', '', '', '', '18-01-2024'),
(22, 'reis', 'azizkarray23@gmail.com', 'azizaziz1', '', '', '', '', '', '18-01-2024'),
(23, 'zyyz', 'karrayaziz772@gmail.com', 'karrayaziz', '', '', '', '', '', '19-01-2024'),
(24, 'fahad', 'fahadbinbashar@gmail.com', '123456', '+8801741260792', '2024-01-23', 'BD', 'Dhaka', 'high school student', '22-01-2024'),
(25, 'Fahad_cox', 'fahadb@gmail.com', '123456', '', '', '', '', '', '25-01-2024'),
(26, 'akash', 'akash@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(27, 'test', 'test@gmail.com', 'test123', '', '', '', '', '', '26-01-2024'),
(28, 'teasd', 'testdd@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(29, 'teasdf', 'asdf@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(31, 'asdf', 'asddddf@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(32, 'asdfasdf', 'oooo@gamil.com', '123456', '', '', '', '', '', '26-01-2024'),
(33, 'lklk', 'lklk@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(34, 'gotokal', 'goto@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(35, 'Fahadd', 'fas@gmail.com', '123456', '', '', '', '', '', '26-01-2024'),
(36, 'asdf', 'eef@asdf', '123', '', '', '', '', '', '26-01-2024'),
(37, 'asdf', 'wewr@gasdf', '123', '', '', '', '', '', '26-01-2024'),
(38, 'qww', 'qw@asdf', '1234', '', '', '', '', '', '26-01-2024'),
(39, 'asdf', 'asdfddd@fasdf', '1234', '', '', '', '', '', '26-01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `vid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `filename` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`vid`, `cid`, `filename`, `status`, `rdate`) VALUES
(1, 2, 0x325f4e6165656d5f383436335f4953462046696c652e7064662c325f4e6165656d5f363238385f496e766f6963652d363631393035202832292e706466, 'Pending', '10-12-2023'),
(3, 11, 0x31315f68616368656d6d617a686f7564695f363330355f524f5441535452494b452049492045444954494f4e2e7064662c31315f68616368656d6d617a686f7564695f333233345f524f5441535452494b452049492045444954494f4e2e706466, 'Pending', '03-01-2024'),
(4, 11, 0x31315f68616368656d6d617a686f7564695f343730395f3336393731373731305f31303231383639373238323232333536385f343732353133393339373938303338383935325f6e2e6a70672c31315f68616368656d6d617a686f7564695f383437315f3336393731373731305f31303231383639373238323232333536385f343732353133393339373938303338383935325f6e2e6a7067, 'Pending', '03-01-2024'),
(5, 11, 0x31315f68616368656d6d617a686f7564695f393931315f4974696e65726172792e7064662c31315f68616368656d6d617a686f7564695f343833335f4974696e65726172792e706466, 'Pending', '03-01-2024'),
(6, 10, 0x31305f4f6d6172205f363533305f43565f536f6c6f6d6979612056656e6772796e6f767963682e7064662c31305f4f6d6172205f343433335f43565f536f6c6f6d6979612056656e6772796e6f767963682e706466, 'Pending', '03-01-2024'),
(7, 10, 0x31305f4f6d6172205f363238365f477569615f646f63656e74655f353434375f323032332d32303234202833292e7064662c31305f4f6d6172205f313533375f477569615f646f63656e74655f353435305f323032332d323032342e706466, 'Pending', '18-01-2024'),
(8, 22, 0x32325f726569735f383836355f477569615f646f63656e74655f353434375f323032332d323032342e7064662c32325f726569735f333035315f477569615f646f63656e74655f353434375f323032332d32303234202832292e706466, 'Pending', '18-01-2024'),
(9, 24, 0x32345f66616861645f343137325f696e766f696365202839292e7064662c32345f66616861645f313233375f696e766f696365202838292e706466, 'Pending', '22-01-2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domiciliation`
--
ALTER TABLE `domiciliation`
  ADD PRIMARY KEY (`did`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `otherlegal`
--
ALTER TABLE `otherlegal`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `cid` (`cid`) USING BTREE;

--
-- Indexes for table `recognition`
--
ALTER TABLE `recognition`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`renid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `residency`
--
ALTER TABLE `residency`
  ADD PRIMARY KEY (`resid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domiciliation`
--
ALTER TABLE `domiciliation`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `otherlegal`
--
ALTER TABLE `otherlegal`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recognition`
--
ALTER TABLE `recognition`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `renid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domiciliation`
--
ALTER TABLE `domiciliation`
  ADD CONSTRAINT `domiciliation_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `institution_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otherlegal`
--
ALTER TABLE `otherlegal`
  ADD CONSTRAINT `otherlegal_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recognition`
--
ALTER TABLE `recognition`
  ADD CONSTRAINT `recognition_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renewal`
--
ALTER TABLE `renewal`
  ADD CONSTRAINT `renewal_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `residency`
--
ALTER TABLE `residency`
  ADD CONSTRAINT `residency_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `visa_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
