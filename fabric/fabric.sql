-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 10:37 AM
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
-- Database: `fabric`
--

-- --------------------------------------------------------

--
-- Table structure for table `border`
--

CREATE TABLE `border` (
  `orderid` varchar(50) NOT NULL,
  `ordername` varchar(50) NOT NULL,
  `jobnoid` varchar(50) NOT NULL,
  `styleid` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `border`
--

INSERT INTO `border` (`orderid`, `ordername`, `jobnoid`, `styleid`, `buyerid`) VALUES
('20230129071050', 'ED-1', '20230129061021', '20230129063646', '20230119065420'),
('20230129071502', 'Ca-1', '20230129060829', '20230129063702', '20230119065420'),
('20230129071522', 'Ca-2', '20230129060829', '20230129063702', '20230119065420'),
('20230129074605', 'Pr-1', '20230129060829', '20230129062835', '20230119065420');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyerid` varchar(50) NOT NULL,
  `buyername` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerid`, `buyername`) VALUES
('20230119065420', 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `colorid` varchar(50) NOT NULL,
  `colorcode` varchar(50) NOT NULL,
  `colorname` varchar(50) NOT NULL,
  `bqty` float NOT NULL,
  `gsm` float NOT NULL,
  `fabrictypeid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `styleid` varchar(50) NOT NULL,
  `jobnoid` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorid`, `colorcode`, `colorname`, `bqty`, `gsm`, `fabrictypeid`, `orderid`, `styleid`, `jobnoid`, `buyerid`) VALUES
('20230129073226', 'A', 'Red', 200, 2, 1, '20230129071502', '20230129063702', '20230129060829', '20230119065420'),
('20230129074344', 'B', 'White', 150, 3, 1, '20230129071502', '20230129063702', '20230129060829', '20230119065420'),
('20230129074424', 'A', 'Blue', 2000, 12, 1, '20230129071050', '20230129063646', '20230129061021', '20230119065420'),
('20230129074637', 'A', 'White', 1200, 5, 2, '20230129074605', '20230129062835', '20230129060829', '20230119065420');

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
(1, 'Store');

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
(1, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_delivery`
--

CREATE TABLE `fabric_delivery` (
  `fabricdeliveryid` varchar(50) NOT NULL,
  `fabricreceivedid` varchar(50) NOT NULL,
  `fabricdeliverytypeid` varchar(50) NOT NULL,
  `deliveryamount` float NOT NULL,
  `deliverychallanno` varchar(50) NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_delivery`
--

INSERT INTO `fabric_delivery` (`fabricdeliveryid`, `fabricreceivedid`, `fabricdeliverytypeid`, `deliveryamount`, `deliverychallanno`, `ddate`) VALUES
('20230130051754', '20230129080506', '1', 11, 'd-1', '2023-01-29'),
('20230130051922', '20230129125925', '1', 15, 'd-2', '2023-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_delivery_type`
--

CREATE TABLE `fabric_delivery_type` (
  `fabricideliverytypeid` int(11) NOT NULL,
  `fabricdeliverytype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_delivery_type`
--

INSERT INTO `fabric_delivery_type` (`fabricideliverytypeid`, `fabricdeliverytype`) VALUES
(1, 'Cutting'),
(2, 'Internal'),
(3, 'External');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_received`
--

CREATE TABLE `fabric_received` (
  `fabricreceivedid` varchar(50) NOT NULL,
  `frcdate` date NOT NULL,
  `challanno` varchar(10) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `jobnoid` varchar(50) NOT NULL,
  `styleid` varchar(50) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `colorid` varchar(50) NOT NULL,
  `lotno` varchar(10) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `frqty` float NOT NULL,
  `racknoid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_received`
--

INSERT INTO `fabric_received` (`fabricreceivedid`, `frcdate`, `challanno`, `buyerid`, `jobnoid`, `styleid`, `orderid`, `colorid`, `lotno`, `dia`, `frqty`, `racknoid`) VALUES
('20230129080506', '2023-01-25', '1', '20230119065420', '20230129060829', '20230129063702', '20230129071502', '20230129073226', '1', '2', 200, '20230120150925'),
('20230129113826', '2023-01-29', 'r-1', '20230119065420', '20230129060829', '20230129063702', '20230129071502', '20230129073226', 'b-1', '2', 100, '20230120150925'),
('20230129125925', '2023-01-29', 'r-5', '20230119065420', '20230129060829', '20230129063702', '20230129071502', '20230129073226', 'b-1', '2', 300, '20230129125827');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE `fabric_type` (
  `fabrictypeid` int(11) NOT NULL,
  `fabrictype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_type`
--

INSERT INTO `fabric_type` (`fabrictypeid`, `fabrictype`) VALUES
(1, 'Lacra'),
(2, 'Single Jersy');

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
('AKL', 'AKL', 'Hemayetpur');

-- --------------------------------------------------------

--
-- Table structure for table `jobno`
--

CREATE TABLE `jobno` (
  `jobnoid` varchar(50) NOT NULL,
  `jobno` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `jobnostatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobno`
--

INSERT INTO `jobno` (`jobnoid`, `jobno`, `buyerid`, `jobnostatus`) VALUES
('20230129060829', '1', '20230119065420', 1),
('20230129061021', '2', '20230119065420', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_uom_insert`
--

CREATE TABLE `product_uom_insert` (
  `puomid` int(11) NOT NULL,
  `puom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_uom_insert`
--

INSERT INTO `product_uom_insert` (`puomid`, `puom`) VALUES
(1, 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `rackno`
--

CREATE TABLE `rackno` (
  `racknoid` varchar(50) NOT NULL,
  `rackno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rackno`
--

INSERT INTO `rackno` (`racknoid`, `rackno`) VALUES
('20230120150925', '3-4-1'),
('20230129125827', '1-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `styleid` varchar(50) NOT NULL,
  `jobnoid` varchar(50) NOT NULL,
  `stylename` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`styleid`, `jobnoid`, `stylename`, `buyerid`) VALUES
('20230129062835', '20230129060829', 'Pria Tee', '20230119065420'),
('20230129063646', '20230129061021', 'Evelina Dress', '20230119065420'),
('20230129063702', '20230129060829', 'Camdeen Tee', '20230119065420');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_fab_delivery`
-- (See below for the actual view)
--
CREATE TABLE `total_fab_delivery` (
`fabricreceivedid` varchar(50)
,`deliveryamount` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_fab_received`
-- (See below for the actual view)
--
CREATE TABLE `total_fab_received` (
`fabricreceivedid` varchar(50)
,`buyername` varchar(20)
,`jobno` varchar(50)
,`stylename` varchar(50)
,`ordername` varchar(50)
,`colorname` varchar(50)
,`bqty` float
,`frqty` double
,`lotno` varchar(10)
,`rackno` varchar(50)
,`racknoid` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `factoryid` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `designationid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ustatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`factoryid`, `departmentid`, `designationid`, `name`, `email`, `mobile`, `user_type`, `userid`, `password`, `ustatus`) VALUES
('AKL', 1, 1, 'ABC', '', '', '1', 'AKL1', '123456', '1'),
('HO', 0, 0, 'MD. Mushfequr Rahman', '', '', '1', 'HO926', '123456', '1');

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
(1, 'Active');

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
(1, 'Admin');

-- --------------------------------------------------------

--
-- Structure for view `total_fab_delivery`
--
DROP TABLE IF EXISTS `total_fab_delivery`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_fab_delivery`  AS  select `fabric_delivery`.`fabricreceivedid` AS `fabricreceivedid`,sum(`fabric_delivery`.`deliveryamount`) AS `deliveryamount` from (`fabric_delivery` join `fabric_received` on(`fabric_received`.`fabricreceivedid` = `fabric_delivery`.`fabricreceivedid`)) group by `fabric_delivery`.`fabricreceivedid` ;

-- --------------------------------------------------------

--
-- Structure for view `total_fab_received`
--
DROP TABLE IF EXISTS `total_fab_received`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_fab_received`  AS  select `fabric_received`.`fabricreceivedid` AS `fabricreceivedid`,`buyer`.`buyername` AS `buyername`,`jobno`.`jobno` AS `jobno`,`style`.`stylename` AS `stylename`,`border`.`ordername` AS `ordername`,`color`.`colorname` AS `colorname`,`color`.`bqty` AS `bqty`,sum(`fabric_received`.`frqty`) AS `frqty`,`fabric_received`.`lotno` AS `lotno`,`rackno`.`rackno` AS `rackno`,`fabric_received`.`racknoid` AS `racknoid` from (((((((`fabric_received` join `color` on(`color`.`colorid` = `fabric_received`.`colorid`)) join `rackno` on(`rackno`.`racknoid` = `fabric_received`.`racknoid`)) join `fabric_type` on(`fabric_type`.`fabrictypeid` = `color`.`fabrictypeid`)) join `border` on(`border`.`orderid` = `fabric_received`.`orderid`)) join `jobno` on(`jobno`.`jobnoid` = `fabric_received`.`jobnoid`)) join `style` on(`style`.`styleid` = `fabric_received`.`styleid`)) join `buyer` on(`buyer`.`buyerid` = `fabric_received`.`buyerid`)) group by `fabric_received`.`colorid`,`fabric_received`.`racknoid`,`fabric_received`.`orderid`,`fabric_received`.`jobnoid`,`fabric_received`.`styleid`,`fabric_received`.`buyerid`,`fabric_received`.`lotno` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `border`
--
ALTER TABLE `border`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyerid`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorid`);

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
-- Indexes for table `fabric_delivery`
--
ALTER TABLE `fabric_delivery`
  ADD PRIMARY KEY (`fabricdeliveryid`);

--
-- Indexes for table `fabric_delivery_type`
--
ALTER TABLE `fabric_delivery_type`
  ADD PRIMARY KEY (`fabricideliverytypeid`) USING BTREE;

--
-- Indexes for table `fabric_received`
--
ALTER TABLE `fabric_received`
  ADD PRIMARY KEY (`fabricreceivedid`);

--
-- Indexes for table `fabric_type`
--
ALTER TABLE `fabric_type`
  ADD PRIMARY KEY (`fabrictypeid`);

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`factoryid`) USING BTREE;

--
-- Indexes for table `jobno`
--
ALTER TABLE `jobno`
  ADD PRIMARY KEY (`jobnoid`);

--
-- Indexes for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  ADD PRIMARY KEY (`puomid`);

--
-- Indexes for table `rackno`
--
ALTER TABLE `rackno`
  ADD PRIMARY KEY (`racknoid`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleid`) USING BTREE;

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
-- AUTO_INCREMENT for table `fabric_delivery_type`
--
ALTER TABLE `fabric_delivery_type`
  MODIFY `fabricideliverytypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fabric_type`
--
ALTER TABLE `fabric_type`
  MODIFY `fabrictypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  MODIFY `puomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `userstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
