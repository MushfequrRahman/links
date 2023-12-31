-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 10:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oom`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `departmentname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `departmentname`) VALUES
(1, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desigid` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desigid`, `designation`) VALUES
(1, 'GM');

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `factoryid` varchar(50) NOT NULL,
  `factoryname` varchar(50) NOT NULL,
  `factory_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`factoryid`, `factoryname`, `factory_address`) VALUES
('AFL', 'Aboni Fashions Ltd.', '23-24, Tetuljhora, Hemayetpur, Savar, Dhaka-1340'),
('AKL', 'Aboni Knit Wear Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
('ATL', 'Aboni Textiles Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
('BADL', 'Babylon Agro & Dairy Ltd.', 'Uttara, Dhaka'),
('BASL', 'Babylon Agri Science Ltd.', 'Uttara, Dhaka'),
('BBSL', 'Babylon Buying Services Ltd.', 'Uttara, Dhaka'),
('BCL', 'Babylon Casualwear Ltd.', '23-24, Tetulzhora, Hemayetpur, Savar, Dhaka'),
('BG', 'Babylon Group', '2-B/1, Darus Salam Road, Mirpur, Dhaka'),
('BGL', 'Babylon Garments Ltd', '2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
('BLL', 'Babylon Logistics Ltd.', 'Holding # 30/1, 2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
('BMV', 'Babylon Marine Venture', '2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
('BPL', 'Babylon Printers Ltd.', 'Horindhora, Hemayetpur, Savar, Dhaka'),
('BRL', 'Babylon Resources Ltd.', 'Lalmatia, Mohammadpur, Dhaka'),
('BTL', 'Babylon Trims Ltd.', '69, Kandi Bailarpur, Horindhora, Hemayetpur, Savar, Dhaka'),
('BWL', 'Babylon Washing Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
('HO', 'Head Office', 'Mirpur'),
('JEL', 'Juniper Embroideries Ltd.', 'Horindhora, Hemayetpur, Savar, Dhaka'),
('NTL', 'Newgen Technology Ltd.', 'Lalmatia, Mohammadpur, Dhaka'),
('SE', 'Sabuj Enterprise', 'Hemayetpur, Savar, Dhaka'),
('Softy', 'Babylon Products', '242-243, South Shampur, Tetulzhora, Hemayetpur, Savar, Dhaka'),
('TNZ', 'Babylon Outfit Ltd. (Trendz)', 'Hemayetpur, Savar, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `line_manager_insert`
--

CREATE TABLE `line_manager_insert` (
  `lmuserid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line_manager_insert`
--

INSERT INTO `line_manager_insert` (`lmuserid`) VALUES
('HO690'),
('HO926');

-- --------------------------------------------------------

--
-- Table structure for table `movement_bill_insert`
--

CREATE TABLE `movement_bill_insert` (
  `mbillid` varchar(50) NOT NULL,
  `mtoken` varchar(50) NOT NULL,
  `transport` float NOT NULL,
  `tiffin` float NOT NULL,
  `accomodation` float NOT NULL,
  `gift` float NOT NULL,
  `others` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movement_bill_insert`
--

INSERT INTO `movement_bill_insert` (`mbillid`, `mtoken`, `transport`, `tiffin`, `accomodation`, `gift`, `others`) VALUES
('20230126133456', '20230126111626', 100, 300, 700, 0, 120),
('20230126143814', '20230126142205', 10, 0, 0, 0, 0),
('20230126152803', '20230126152719', 200, 150, 200, 0, 300);

-- --------------------------------------------------------

--
-- Table structure for table `movement_insert`
--

CREATE TABLE `movement_insert` (
  `mid` varchar(50) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `lmauserid` varchar(10) NOT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `ftime` varchar(50) NOT NULL,
  `ttime` varchar(50) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `mstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movement_insert`
--

INSERT INTO `movement_insert` (`mid`, `userid`, `lmauserid`, `fdate`, `tdate`, `ftime`, `ttime`, `purpose`, `location`, `mstatus`) VALUES
('20230126111626', 'HO926', 'HO690', '2023-01-26', '2023-01-26', '9:30 AM', '11:30 AM', 'Office', 'Uttara', 2),
('20230126142205', 'HO926', 'HO690', '2023-01-26', '2023-01-26', '11:30 AM', '2:30 PM', 'Office', 'Mirpur', 2),
('20230126152719', 'HO926', 'HO690', '2023-01-26', '2023-01-26', '3:30 PM', '3:30 PM', 'Office', 'Mirpur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `factoryid` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `designationid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `lmauserid` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ustatus` varchar(100) NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`factoryid`, `departmentid`, `designationid`, `name`, `mobile`, `user_type`, `userid`, `lmauserid`, `password`, `ustatus`, `indate`) VALUES
('HO', 1, 1, 'Shahajalal Palash', '00000000000', '2', 'HO690', 'HO690', '123456', '1', '0000-00-00'),
('HO', 1, 1, 'MD Mushfequr Rahman', '01914098358', '1', 'HO926', 'HO690', '123456', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `userstatusid` int(11) NOT NULL,
  `userstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`userstatusid`, `userstatus`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeid` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeid`, `usertype`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`) USING BTREE;

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desigid`) USING BTREE;

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`factoryid`) USING BTREE;

--
-- Indexes for table `line_manager_insert`
--
ALTER TABLE `line_manager_insert`
  ADD PRIMARY KEY (`lmuserid`);

--
-- Indexes for table `movement_bill_insert`
--
ALTER TABLE `movement_bill_insert`
  ADD PRIMARY KEY (`mbillid`);

--
-- Indexes for table `movement_insert`
--
ALTER TABLE `movement_insert`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`) USING BTREE;

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`userstatusid`) USING BTREE;

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desigid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `userstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
