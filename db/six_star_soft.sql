-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 06:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `six_star_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET utf8 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f23fae4b91a324aff1d6ddbbf179ead0', '::1', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1501561074, 'a:4:{s:8:"BRANCHid";s:1:"1";s:8:"FullName";s:21:"Six Star Electronics ";s:10:"userBrunch";s:1:"1";s:11:"Brunch_name";s:21:"Six Star Electronics ";}'),
('ee01632bbc4fe96c1629c39e51cb9ebe', '::1', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1496907091, 'a:13:{s:9:"user_data";s:0:"";s:8:"BRANCHid";s:1:"1";s:8:"FullName";s:21:"Six Star Electronics ";s:10:"userBrunch";s:1:"1";s:11:"Brunch_name";s:21:"Six Star Electronics ";s:14:"lastidforprint";i:45;s:7:"SalesID";s:2:"45";s:8:"invoices";s:14:"RC2017-06-0845";s:9:"startdate";s:10:"2010-06-08";s:7:"enddate";s:10:"2017-06-08";s:6:"userId";s:1:"2";s:9:"User_Name";s:5:"admin";s:11:"accountType";s:1:"a";}'),
('e7a5621b6455af280780fc4a49a36d9a', '::1', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1497455313, 'a:8:{s:9:"user_data";s:0:"";s:8:"BRANCHid";s:1:"1";s:8:"FullName";s:21:"Six Star Electronics ";s:10:"userBrunch";s:1:"1";s:11:"Brunch_name";s:21:"Six Star Electronics ";s:14:"lastidforprint";i:46;s:7:"SalesID";s:2:"46";s:8:"invoices";s:14:"RC2017-06-1446";}'),
('8c3c6529ef3656010892d03ba6209a37', '::1', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1497457251, 'a:8:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"2";s:8:"BRANCHid";s:1:"1";s:8:"FullName";s:21:"Six Star Electronics ";s:9:"User_Name";s:5:"admin";s:11:"accountType";s:1:"a";s:10:"userBrunch";s:1:"1";s:11:"Brunch_name";s:21:"Six Star Electronics ";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE IF NOT EXISTS `tbl_account` (
`Acc_SlNo` int(11) NOT NULL,
  `Acc_Code` varchar(50) NOT NULL,
  `Acc_Name` varchar(200) NOT NULL,
  `Acc_Type` varchar(50) NOT NULL,
  `Acc_Description` varchar(255) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`Acc_SlNo`, `Acc_Code`, `Acc_Name`, `Acc_Type`, `Acc_Description`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 'A1001', 'payments', 'Official', 'pay', '', 'Six Star Electronics & Furniture', '2017-03-09 12:17:58', NULL, NULL),
(2, 'A1002', 'Other', 'Official', 'Other', '', 'Six Star Electronics & Furniture', '2017-03-09 12:18:13', NULL, NULL),
(3, 'A1003', 'Paper Bill', 'Official', 'Paper bill', '', 'Six Star Electronics & Furniture', '2017-03-09 12:18:29', NULL, NULL),
(4, 'A1004', 'DBBL ', 'Official', 'DBBL ', '', 'Six Star Electronics & Furniture', '2017-03-09 12:18:53', NULL, NULL),
(5, 'A1005', 'UCB', 'Official', 'UCB', '', 'Six Star Electronics & Furniture', '2017-03-09 12:19:24', NULL, NULL),
(6, 'A1006', 'Islami Bank', 'Official', 'Islami Bank', '', 'Six Star Electronics & Furniture', '2017-03-09 12:19:43', NULL, NULL),
(7, 'A1007', 'IOU', 'Official', '', '', 'Six Star Electronics ', '2017-04-27 01:43:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branchwise_product`
--

CREATE TABLE IF NOT EXISTS `tbl_branchwise_product` (
`id` int(11) NOT NULL,
  `pro_codes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `total_branchqty` int(11) NOT NULL DEFAULT '0',
  `branch_ids` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branchwise_product`
--

INSERT INTO `tbl_branchwise_product` (`id`, `pro_codes`, `total_branchqty`, `branch_ids`) VALUES
(1, '1', 3, 1),
(2, '1', 2, 2),
(3, '1', 1, 6),
(4, '2', 82, 1),
(5, '2', 1, 2),
(6, '3', 106, 1),
(7, '3', 2, 2),
(8, '3', 2, 6),
(9, '7', 25, 1),
(10, '7', 2, 2),
(11, '6', 20, 1),
(12, '6', 2, 2),
(13, '6', 1, 6),
(14, '5', 28, 1),
(15, '5', 8, 2),
(16, '5', 5, 6),
(17, '4', 25, 1),
(18, '4', 5, 2),
(19, '9', 9, 1),
(20, '8', 20, 1),
(21, '8', 5, 2),
(22, '8', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brunch`
--

CREATE TABLE IF NOT EXISTS `tbl_brunch` (
`brunch_id` int(11) NOT NULL,
  `Brunch_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Brunch_title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Brunch_address` text CHARACTER SET utf8 NOT NULL,
  `Brunch_sales` varchar(1) CHARACTER SET utf8 NOT NULL COMMENT 'Wholesales = 1, Retail = 2'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brunch`
--

INSERT INTO `tbl_brunch` (`brunch_id`, `Brunch_name`, `Brunch_title`, `Brunch_address`, `Brunch_sales`) VALUES
(1, 'Six Star Electronics ', 'Electronics', 'Six Star Electronics &amp; Furniture\nZamir Super Market\nBaipail Mosque,DEPZ,Ashulia,Dhaka\nPhone: 019-7744-4870', '1'),
(2, 'Shahbag Outlet', 'Six Star Electronics and Furniture', 'Six Star Electronics &amp; Furniture\nZamir Super Market\nBaipail Mosque,DEPZ,Ashulia,Dhaka\nPhone: 019-7744-4870', '1'),
(6, 'Branch3', 'Bipile', 'Six Star Electronics &amp; Furniture\nZamir Super Market\nBaipail Mosque,DEPZ,Ashulia,Dhaka\nPhone: 019-7744-4870', '1'),
(7, 'Nabinagor', '', 'g\ng\ng\ng\ngf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashregister`
--

CREATE TABLE IF NOT EXISTS `tbl_cashregister` (
`Transaction_ID` int(11) NOT NULL,
  `Transaction_Date` varchar(20) NOT NULL,
  `IdentityNo` varchar(50) DEFAULT NULL,
  `Narration` varchar(100) NOT NULL,
  `InAmount` varchar(20) NOT NULL,
  `OutAmount` varchar(20) NOT NULL,
  `Description` longtext NOT NULL,
  `Status` char(1) DEFAULT NULL,
  `Saved_By` varchar(50) DEFAULT NULL,
  `Saved_Time` datetime DEFAULT NULL,
  `Edited_By` varchar(50) DEFAULT NULL,
  `Edited_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashtransaction`
--

CREATE TABLE IF NOT EXISTS `tbl_cashtransaction` (
`Tr_SlNo` int(11) NOT NULL,
  `Tr_Id` varchar(50) NOT NULL,
  `Tr_date` date NOT NULL,
  `Tr_Type` varchar(20) NOT NULL,
  `Tr_account_Type` varchar(50) NOT NULL,
  `Supplier_SlID` int(11) NOT NULL,
  `Customer_SlID` int(11) NOT NULL,
  `Acc_SlID` int(11) NOT NULL,
  `Acc_Code` varchar(50) DEFAULT NULL,
  `Tr_Description` varchar(255) NOT NULL,
  `In_Amount` varchar(20) NOT NULL,
  `Out_Amount` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(100) NOT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `Tr_branchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cashtransaction`
--

INSERT INTO `tbl_cashtransaction` (`Tr_SlNo`, `Tr_Id`, `Tr_date`, `Tr_Type`, `Tr_account_Type`, `Supplier_SlID`, `Customer_SlID`, `Acc_SlID`, `Acc_Code`, `Tr_Description`, `In_Amount`, `Out_Amount`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Tr_branchid`) VALUES
(2, 'T1002', '2017-03-09', 'Cash Receive', 'Official', 0, 0, 2, NULL, 'sdfdsf', '3000', '0', '', 'Six Star Electronics & Furniture', '2017-03-09 12:20:26', NULL, NULL, 1),
(3, 'T1003', '2017-03-09', 'Deposit To Bank', 'Official', 0, 0, 4, NULL, 'rewr', '5000', '0', '', 'Six Star Electronics & Furniture', '2017-03-09 12:20:41', NULL, NULL, 1),
(4, 'T1004', '2017-03-09', 'Withdraw Form Bank', 'Official', 0, 0, 4, NULL, 'dsfgfg', '0', '2000', '', 'Six Star Electronics & Furniture', '2017-03-09 12:20:58', NULL, NULL, 1),
(5, 'T1005', '2017-03-09', 'Cash Payment', 'Official', 0, 0, 3, NULL, 'dsf', '0', '300', '', 'Six Star Electronics & Furniture', '2017-03-09 12:21:12', NULL, NULL, 1),
(6, 'T1006', '2017-04-30', 'Cash Receive', 'Official', 0, 0, 2, NULL, 'Aminul islam', '500000', '0', '', 'Six Star Electronics ', '2017-04-30 12:16:05', NULL, NULL, 1),
(7, 'T1007', '2017-05-21', 'Cash Payment', 'Official', 0, 0, 7, NULL, 'Akter', '0', '1000', '', 'Six Star Electronics ', '2017-05-21 11:07:10', 'Six Star Electronics ', '2017-05-21 11:08:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
`Company_SlNo` int(11) NOT NULL,
  `Company_Name` varchar(150) NOT NULL,
  `Repot_Heading` text NOT NULL,
  `Company_Logo_org` varchar(250) NOT NULL,
  `Company_Logo_thum` varchar(250) NOT NULL,
  `Invoice_Type` int(11) NOT NULL,
  `Currency_Name` varchar(50) DEFAULT NULL,
  `Currency_Symbol` varchar(10) DEFAULT NULL,
  `SubCurrency_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`Company_SlNo`, `Company_Name`, `Repot_Heading`, `Company_Logo_org`, `Company_Logo_thum`, `Invoice_Type`, `Currency_Name`, `Currency_Symbol`, `SubCurrency_Name`) VALUES
(1, 'Link-Up Techn 12022222222222222', 'Captain Mohiuddin Jhangir Road - 123,\r\nBibir Pukur Par, Barisal Sadar,\r\nBarisal\r\nPhone: 01717 996243, 01745396045', '1104182.jpg', '1104182.jpg', 1, 'BDT\0', '৳\0RT INTO ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
`Country_SlNo` int(11) NOT NULL,
  `CountryName` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`Country_SlNo`, `CountryName`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(6, 'Bangladesh', '', 'Ashiqe ', '2016-02-02 11:42:21', 'Ashiqe ', '2016-02-03 01:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currentinventory`
--

CREATE TABLE IF NOT EXISTS `tbl_currentinventory` (
`CurrentInventory_SlNo` int(11) NOT NULL,
  `Product_SlNo` int(11) NOT NULL,
  `CurrentInventory_CurrentQuantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`Customer_SlNo` int(11) NOT NULL,
  `Customer_Code` varchar(50) NOT NULL,
  `Customer_Name` varchar(150) NOT NULL,
  `Customer_Type` varchar(50) NOT NULL,
  `Customer_Phone` varchar(50) NOT NULL,
  `Customer_Mobile` varchar(15) NOT NULL,
  `Customer_Email` varchar(50) NOT NULL,
  `Customer_OfficePhone` varchar(50) NOT NULL,
  `Customer_Address` varchar(300) NOT NULL,
  `permanent_address` text NOT NULL,
  `Gurantor_Name` varchar(255) NOT NULL,
  `Gurantor_Contact` varchar(255) NOT NULL,
  `Gurantor_Address` text NOT NULL,
  `disttrict` int(11) NOT NULL,
  `Country_SlNo` int(11) NOT NULL,
  `Customer_Web` varchar(50) NOT NULL,
  `biodata` varchar(255) NOT NULL,
  `customerpic` varchar(255) NOT NULL,
  `Customer_Credit_Limit` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'c',
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `Customer_brunchid` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`Customer_SlNo`, `Customer_Code`, `Customer_Name`, `Customer_Type`, `Customer_Phone`, `Customer_Mobile`, `Customer_Email`, `Customer_OfficePhone`, `Customer_Address`, `permanent_address`, `Gurantor_Name`, `Gurantor_Contact`, `Gurantor_Address`, `disttrict`, `Country_SlNo`, `Customer_Web`, `biodata`, `customerpic`, `Customer_Credit_Limit`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Customer_brunchid`, `notes`) VALUES
(1, 'C1001', 'Ashiqe', 'Local', '', '0172617985648', '', '', 'Dhaka', '', '', '', '', 0, 6, '', '', '', '5000', 'c', 'Ashiqe ', '2016-04-10 07:08:53', 'Ashiqe ', '2016-04-10 07:25:32', 1, ''),
(2, 'C1002', 'Balal Khan', 'Local', '', '24234', '', '', 'Kulna', '', '', '', '', 0, 6, '', '', '', '234', 'c', 'Ashiqe ', '2016-04-18 11:07:59', NULL, NULL, 3, ''),
(3, 'C1003', 'Ashiqe Ahammed', 'Local', '', '01726179589', '', '', 'Dhaka', '', '', '', '', 0, 6, '', '', '', '0', 'c', 'shahbag', '2016-04-20 04:45:08', NULL, NULL, 2, ''),
(4, 'C1004', 'Mahum Hossain', 'Local', '', '01755711488', '', '', '175 Dhaka Bangladesh', '', '', '', '', 0, 6, '', '', '', '100000', 'c', 'Bell Bangladesh', '2016-04-29 04:50:47', NULL, NULL, 1, ''),
(10, 'C1006', 'testcs', 'undefined', '1717426371', '456456', 'tesewt34@gmail.com', '4646', 'sdfs', '', '', '', '', 0, 6, 'cbcvbvcb', 'web_theme.docx', '', '40000000', 'c', 'Six Star Electronics & Furniture', '2017-03-12 09:03:58', 'Six Star Electronics & Furniture', '2017-03-12 09:03:58', 1, ''),
(11, 'C1007', 'Hanif', 'undefined', '01977444865', '01977444865', '', '', 'baipail, Dhaka\n', '', '', '', '', 0, 6, '', 'Chrysanthemum.jpg', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-03-16 11:16:49', NULL, NULL, 1, ''),
(12, 'C1008', 'Shamoli', 'undefined', '01917583939', '01687642410', '', '', 'Dhaka', '', '', '', '', 0, 6, '', 'Hydrangeas.jpg', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-03-16 02:58:34', NULL, NULL, 1, ''),
(13, 'C1008', 'Shamoli', 'undefined', '01917583939', '01687642410', '', '', 'Dhaka', '', '', '', '', 0, 6, '', 'Hydrangeas1.jpg', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-03-16 02:58:39', NULL, NULL, 1, ''),
(14, 'C1009', 'Jolil ', 'undefined', '01915735805', '01687642410', '', '', 'Dhaka', '', '', '', '', 0, 6, '', 'Koala.jpg', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-03-16 06:45:07', NULL, NULL, 1, ''),
(16, 'C1010', 'জামিল হাসান', 'undefined', '', '012547', '', '', 'বাইপাইল', '', '', '', '', 0, 6, '', '', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-04-12 01:51:32', NULL, NULL, 1, ''),
(17, 'C1011', 'আবুল কাশেম', 'undefined', '', '458', '', '', 'হপলুন', '', '', '', '', 0, 6, '', '', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-04-12 01:52:32', NULL, NULL, 1, ''),
(18, 'C1012', 'হাবিবুর রহমান', 'undefined', '', '789', '', '', 'ইপিজেড', '', '', '', '', 0, 6, '', '', '', '0', 'c', 'Six Star Electronics & Furniture', '2017-04-12 01:53:21', NULL, NULL, 1, ''),
(19, 'C1013', 'sdsd', 'undefined', 'ghg', 'hgh', 'hghg@gmail.com', '0', 'dsdsds', 'sfdfdf', 'dfdfdf Edit', 'df1212 Edit', 'fdfdfd Edit', 0, 6, '', '', '', '', 'c', 'Six Star Electronics ', '2017-06-08 01:31:55', 'Six Star Electronics ', '2017-06-08 01:31:55', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_payment` (
`CPayment_id` int(11) NOT NULL,
  `CPayment_date` date NOT NULL,
  `CPayment_invoice` varchar(20) NOT NULL,
  `CPayment_customerID` varchar(20) NOT NULL,
  `CPayment_amount` varchar(20) NOT NULL,
  `CPayment_Paymentby` varchar(50) NOT NULL,
  `CPayment_notes` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `CPayment_brunchid` int(11) NOT NULL,
  `CPayment_Addby` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_payment`
--

INSERT INTO `tbl_customer_payment` (`CPayment_id`, `CPayment_date`, `CPayment_invoice`, `CPayment_customerID`, `CPayment_amount`, `CPayment_Paymentby`, `CPayment_notes`, `status`, `CPayment_brunchid`, `CPayment_Addby`) VALUES
(1, '2017-03-07', 'RC2017-03-071', '1', '6000', '', 'sfd', 3, 1, 'Six Star Electronics & Furniture'),
(2, '2017-03-08', 'RC2017-03-082', '3', '24000', '', 'dssda', 1, 1, 'Six Star Electronics & Furniture'),
(3, '2017-03-08', 'RC2017-03-083', '2', '20300', '', 'dssfds', 1, 1, 'Six Star Electronics & Furniture'),
(4, '2017-03-08', 'WC2017-03-084', '4', '14500', '', '', 2, 1, 'Six Star Electronics & Furniture'),
(5, '2017-03-08', 'WC2017-03-085', '4', '17500', '', 'fhgfhf', 2, 1, 'Six Star Electronics & Furniture'),
(6, '2017-03-08', 'RC2017-03-086', '1', '10000', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(7, '2017-03-09', 'RC2017-03-097', '5', '1800', '', 'sale', 1, 1, 'Six Star Electronics & Furniture'),
(8, '2017-03-09', 'RC2017-03-098', '5', '9000', '', 'sasa', 1, 1, 'Six Star Electronics & Furniture'),
(9, '2017-03-09', 'WC2017-03-099', '4', '43100', '', 'sdffg', 2, 1, 'Six Star Electronics & Furniture'),
(10, '2017-03-09', 'WC2017-03-0910', '2', '2500', '', '', 2, 1, 'Six Star Electronics & Furniture'),
(11, '2017-03-09', 'RC2017-03-0911', '1', '1500', '', 'test', 3, 1, 'Six Star Electronics & Furniture'),
(12, '2017-03-09', 'RC2017-03-071', '1', '1000', 'By Cash', '0', 3, 1, 'Six Star Electronics & Furniture'),
(13, '2017-03-14', 'RC2017-03-1412', '2', '12900', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(14, '2017-03-14', 'WC2017-03-1413', '4', '7000', '', '', 2, 1, 'Six Star Electronics & Furniture'),
(15, '2017-03-14', 'RC2017-03-071', '1', '10000', 'By Cash', '0', 3, 1, 'Six Star Electronics & Furniture'),
(16, '2017-03-15', 'RC2017-03-1514', '10', '115000', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(17, '2017-03-15', 'RC2017-03-1515', '1', '200000', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(18, '2017-03-15', 'RC2017-03-1516', '2', '46000', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(19, '2017-03-16', 'RC2017-03-1617', '14', '1000', '', '', 3, 1, 'Six Star Electronics & Furniture'),
(20, '2017-04-08', 'RC2017-04-0818', '3', '20000', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(21, '2017-04-12', 'WC2017-04-1219', '11', '2800', '', '', 2, 1, 'Six Star Electronics & Furniture'),
(22, '2017-04-12', 'RC2017-04-1220', '11', '12900', '', '', 1, 1, 'Six Star Electronics & Furniture'),
(23, '2017-04-12', 'RC2017-04-1221', '11', '16000', '', '', 3, 1, 'Six Star Electronics & Furniture'),
(24, '2017-04-24', 'WC2017-04-2422', '12', '8400', '', '', 2, 1, 'Six Star Electronics '),
(25, '2017-04-24', 'RC2017-04-2423', '1', '3600', '', '', 1, 1, 'Six Star Electronics '),
(26, '2017-04-26', 'RC2017-04-2624', '1', '1500', '', '\n\n\n\n', 1, 1, 'Six Star Electronics '),
(27, '2017-04-26', 'WC2017-04-2625', '11', '45000', '', '', 2, 1, 'Six Star Electronics '),
(28, '2017-04-26', 'RC2017-04-2626', '2', '11000', '', '', 1, 1, 'Six Star Electronics '),
(29, '2017-04-27', 'RC2017-04-2727', '2', '400', '', '', 1, 1, 'Six Star Electronics '),
(30, '2017-04-27', 'RC2017-04-2728', '3', '8600', '', '', 1, 1, 'Six Star Electronics '),
(31, '2017-04-27', 'WC2017-04-2729', '3', '45000', '', '', 2, 1, 'Six Star Electronics '),
(32, '2017-04-27', 'RC2017-04-2730', '12', '13500', '', '', 3, 1, 'Six Star Electronics '),
(33, '2017-04-29', 'WC2017-03-084', '4', '1000', 'By Cash', '0', 2, 1, 'Six Star Electronics '),
(34, '2017-04-29', 'RC2017-03-083', '2', '200', 'By Cash', '0', 1, 1, 'Six Star Electronics '),
(35, '2017-04-29', 'RC2017-03-071', '1', '3000', 'By Cash', '0', 3, 1, 'Six Star Electronics '),
(36, '2017-04-29', 'RC2017-03-071', '1', '1000', 'By Cash', '0', 3, 1, 'Six Star Electronics '),
(37, '2017-04-29', 'RC2017-03-071', '1', '1000', 'By Cash', '0', 3, 1, 'Six Star Electronics '),
(38, '2017-04-29', 'RC2017-04-2931', '11', '600', '', '', 3, 1, 'Six Star Electronics '),
(39, '2017-04-29', 'RC2017-04-2932', '2', '1600', '', '', 3, 1, 'Six Star Electronics '),
(40, '2017-04-29', 'RC2017-04-2933', '2', '300', '', '', 3, 1, 'Six Star Electronics '),
(41, '2017-04-29', 'RC2017-04-2934', '14', '1300', '', '', 1, 1, 'Six Star Electronics '),
(42, '2017-04-29', 'RC2017-04-2935', '13', '1300', '', '', 3, 1, 'Six Star Electronics '),
(43, '2017-04-29', 'RC2017-04-2936', '18', '500', '', '', 3, 1, 'Six Star Electronics '),
(44, '2017-04-30', 'RC2017-04-3037', '17', '1500', '', '', 1, 1, 'Six Star Electronics '),
(45, '2017-04-30', 'WC2017-04-3038', '13', '1400', '', '', 2, 1, 'Six Star Electronics '),
(46, '2017-04-30', 'RC2017-04-3039', '2', '160000', '', '', 1, 1, 'Six Star Electronics '),
(47, '2017-05-07', 'RC2017-05-0740', '14', '3000', '', '', 3, 1, 'Six Star Electronics '),
(48, '2017-05-10', 'WC2017-05-1041', '3', '0', '', '', 2, 1, 'Six Star Electronics '),
(49, '2017-05-22', 'RC2017-05-2242', '1', '21500', '', '', 1, 1, 'Six Star Electronics '),
(50, '2017-05-25', 'RC2017-05-2543', '3', '33380', '', 'Test Sales', 1, 1, 'Six Star Electronics '),
(51, '2017-05-29', 'WC2017-05-2944', '14', '132450', '', 'Test reward discount', 2, 1, 'Six Star Electronics '),
(52, '2017-06-08', 'RC2017-06-0845', '0', '33515', '', 'Test', 1, 1, 'Six Star Electronics '),
(53, '2017-06-14', 'RC2017-06-1446', '1', '4300', '', 'rttrtr', 1, 1, 'Six Star Electronics ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_damage`
--

CREATE TABLE IF NOT EXISTS `tbl_damage` (
`Damage_SlNo` int(11) NOT NULL,
  `Damage_InvoiceNo` varchar(50) NOT NULL,
  `Damage_Date` date NOT NULL,
  `Damage_Description` varchar(300) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `Damage_brunchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_damage`
--

INSERT INTO `tbl_damage` (`Damage_SlNo`, `Damage_InvoiceNo`, `Damage_Date`, `Damage_Description`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Damage_brunchid`) VALUES
(1, 'D1001', '2017-04-24', '', '', 'Six Star Electronics ', '2017-04-24 10:55:34', NULL, NULL, 1),
(2, 'D1002', '2017-04-26', 't\nt\nt', '', 'Six Star Electronics ', '2017-04-26 01:54:21', NULL, NULL, 1),
(3, 'D1003', '2017-04-27', '', '', 'Six Star Electronics ', '2017-04-27 02:59:04', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_damagedetails`
--

CREATE TABLE IF NOT EXISTS `tbl_damagedetails` (
`DamageDetails_SlNo` int(11) NOT NULL,
  `Damage_SlNo` int(11) NOT NULL,
  `Product_SlNo` int(11) NOT NULL,
  `DamageDetails_DamageQuantity` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_damagedetails`
--

INSERT INTO `tbl_damagedetails` (`DamageDetails_SlNo`, `Damage_SlNo`, `Product_SlNo`, `DamageDetails_DamageQuantity`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 3, '2', '', 'Six Star Electronics ', '2017-04-24 10:55:34', NULL, NULL),
(2, 2, 3, '2', '', 'Six Star Electronics ', '2017-04-26 01:54:21', NULL, NULL),
(3, 3, 6, '2', '', 'Six Star Electronics ', '2017-04-27 02:59:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
`Department_SlNo` int(11) NOT NULL,
  `Department_Name` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`Department_SlNo`, `Department_Name`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(2, 'Account', '', 'Ashiqe ', '2016-02-03 07:07:50', NULL, NULL),
(3, 'Director', '', 'Ashiqe ', '2016-02-03 07:07:55', 'Ashiqe ', '2016-02-03 07:13:42'),
(4, 'Maneger', '', 'Ashiqe ', '2016-02-03 07:14:50', NULL, NULL),
(5, 'Programmer', '', 'Ashiqe ', '2016-02-08 05:09:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE IF NOT EXISTS `tbl_designation` (
`Designation_SlNo` int(11) NOT NULL,
  `Designation_Name` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`Designation_SlNo`, `Designation_Name`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 'Principal', '', 'Ashiqe ', '2016-02-03 06:23:25', NULL, NULL),
(3, 'Engineer', '', 'Ashiqe ', '2016-02-03 06:31:21', NULL, NULL),
(4, 'Account', '', 'Ashiqe ', '2016-02-08 05:23:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
`District_SlNo` int(11) NOT NULL,
  `District_Name` varchar(50) NOT NULL,
  `Status` char(10) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`District_SlNo`, `District_Name`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 'Rangpur', '', 'Ashiqe ', '2016-02-02 05:15:33', 'Ashiqe ', '2016-02-02 05:28:37'),
(2, 'Bogra', '', 'Ashiqe ', '2016-02-02 05:16:14', NULL, NULL),
(3, 'Dhaka', '', 'Ashiqe ', '2016-02-02 05:19:43', NULL, NULL),
(6, 'Dinajpur', '', 'Ashiqe ', '2016-02-02 06:15:44', NULL, NULL),
(11, 'Dhakas', '', 'Ashiqe ', '2016-02-02 09:59:41', NULL, NULL),
(12, 'Bogras', '', 'Ashiqe ', '2016-02-02 10:10:39', NULL, NULL),
(13, 'Barishal', '', 'Ashiqe ', '2016-02-03 01:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
`Employee_SlNo` int(11) NOT NULL,
  `Designation_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Employee_ID` varchar(50) NOT NULL,
  `Employee_Name` varchar(150) NOT NULL,
  `Employee_JoinDate` date NOT NULL,
  `Employee_Gender` varchar(20) NOT NULL,
  `Employee_BirthDate` date NOT NULL,
  `Employee_NID` varchar(50) NOT NULL,
  `Employee_ContactNo` varchar(20) NOT NULL,
  `Employee_Email` varchar(50) NOT NULL,
  `Employee_MaritalStatus` varchar(50) NOT NULL,
  `Employee_FatherName` varchar(150) NOT NULL,
  `Employee_MotherName` varchar(150) NOT NULL,
  `Employee_PrasentAddress` text NOT NULL,
  `Employee_PermanentAddress` text NOT NULL,
  `Employee_Pic_org` varchar(250) NOT NULL,
  `Employee_Pic_thum` varchar(250) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `AddBy` varchar(50) NOT NULL,
  `AddTime` varchar(50) NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateTime` varchar(50) NOT NULL,
  `Employee_brinchid` int(11) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `bloodgrp` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`Employee_SlNo`, `Designation_ID`, `Department_ID`, `Employee_ID`, `Employee_Name`, `Employee_JoinDate`, `Employee_Gender`, `Employee_BirthDate`, `Employee_NID`, `Employee_ContactNo`, `Employee_Email`, `Employee_MaritalStatus`, `Employee_FatherName`, `Employee_MotherName`, `Employee_PrasentAddress`, `Employee_PermanentAddress`, `Employee_Pic_org`, `Employee_Pic_thum`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Employee_brinchid`, `religion`, `nationality`, `bloodgrp`, `height`, `notes`) VALUES
(1, 4, 3, 'E1001', 'জামিল', '2017-04-03', 'Male', '2017-04-04', '', '452', '', 'married', '', '', '', '', '3R_(1_Copy).jpg', '3R_(1_Copy).jpg', '', 'Six Star Electronics ', '2017-04-27 06:09:32', '', '', 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_installment`
--

CREATE TABLE IF NOT EXISTS `tbl_installment` (
`inspayid` int(11) NOT NULL,
  `invoice` varchar(255) CHARACTER SET utf8 NOT NULL,
  `custid` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_date` date NOT NULL,
  `comments` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_installment`
--

INSERT INTO `tbl_installment` (`inspayid`, `invoice`, `custid`, `payment_amount`, `pay_date`, `comments`) VALUES
(1, 'RC2017-03-071', 1, '1000.00', '2017-03-09', ''),
(2, 'RC2017-03-071', 1, '10000.00', '2017-03-14', ''),
(3, 'RC2017-03-071', 1, '3000.00', '2017-04-29', ''),
(4, 'RC2017-03-071', 1, '1000.00', '2017-04-29', ''),
(5, 'RC2017-03-071', 1, '1000.00', '2017-04-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_installment_date`
--

CREATE TABLE IF NOT EXISTS `tbl_installment_date` (
`insid` int(11) NOT NULL,
  `invoiceid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fistdate` date NOT NULL,
  `secondate` date NOT NULL,
  `thirdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_installment_date`
--

INSERT INTO `tbl_installment_date` (`insid`, `invoiceid`, `fistdate`, `secondate`, `thirdate`) VALUES
(1, 'RC2017-03-071', '2017-04-07', '2017-05-07', '2017-06-07'),
(2, 'RC2017-03-0911', '2017-04-09', '2017-05-09', '2017-06-09'),
(3, 'RC2017-03-1617', '2017-04-16', '2017-05-16', '2017-06-16'),
(4, 'RC2017-04-1221', '2017-05-12', '2017-06-12', '2017-07-12'),
(5, 'RC2017-04-2730', '2017-05-27', '2017-06-27', '2017-07-27'),
(6, 'RC2017-04-2931', '2017-05-29', '2017-06-29', '2017-07-29'),
(7, 'RC2017-04-2932', '2017-05-29', '2017-06-29', '2017-07-29'),
(8, 'RC2017-04-2933', '2017-05-29', '2017-06-29', '2017-07-29'),
(9, 'RC2017-04-2935', '2017-05-29', '2017-06-29', '2017-07-29'),
(10, 'RC2017-04-2936', '2017-05-29', '2017-06-29', '2017-07-29'),
(11, 'RC2017-05-0740', '2017-06-07', '2017-07-07', '2017-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menuaccess`
--

CREATE TABLE IF NOT EXISTS `tbl_menuaccess` (
`menu_id` int(11) NOT NULL COMMENT '1 = Active, 2Deactive',
  `branch_id` int(11) NOT NULL,
  `Accounts` int(11) NOT NULL,
  `Cash_Transaction` int(11) NOT NULL,
  `Add_Account` int(11) NOT NULL,
  `Current_Stock` int(11) NOT NULL,
  `Add_Supplier` int(11) NOT NULL,
  `Add_Customer` int(11) NOT NULL,
  `Employee` int(11) NOT NULL,
  `Add_Employee` int(11) NOT NULL,
  `Employee_List` int(11) NOT NULL,
  `Add_Designation` int(11) NOT NULL,
  `Add_Department` int(11) NOT NULL,
  `Sales` int(11) NOT NULL,
  `Product_Sales` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `installment_record` int(11) NOT NULL,
  `Sales_Return` int(11) NOT NULL,
  `Sales_Stock` int(11) NOT NULL,
  `Purchase` int(11) NOT NULL,
  `Purchase_Order` int(11) NOT NULL,
  `Purchase_Return` int(11) NOT NULL,
  `Damage_Entry` int(11) NOT NULL,
  `Purchase_Stock` int(11) NOT NULL,
  `Settings` int(11) NOT NULL,
  `Add_Category` int(11) NOT NULL,
  `Add_Product` int(11) NOT NULL,
  `User_Profile` int(11) NOT NULL,
  `Add_Unit` int(11) NOT NULL,
  `Add_Branch` int(11) NOT NULL,
  `Add_District` int(11) NOT NULL,
  `Add_Country` int(11) NOT NULL,
  `Supplier_List` int(11) NOT NULL,
  `Customer_List` int(11) NOT NULL,
  `rpSales` int(11) NOT NULL,
  `Sales_Invoice` int(11) NOT NULL,
  `Customer_Due_Report` int(11) NOT NULL,
  `Customer_Payment` int(11) NOT NULL,
  `Sales_Record` int(11) NOT NULL,
  `Sales_Return_List` int(11) NOT NULL,
  `rpPurchase` int(11) NOT NULL,
  `Purchase_Bill` int(11) NOT NULL,
  `Supplier_Due_Report` int(11) NOT NULL,
  `Supplier_Payment` int(11) NOT NULL,
  `Purchase_Record` int(11) NOT NULL,
  `Purchase_Return_List` int(11) NOT NULL,
  `rpAccounts` int(11) NOT NULL,
  `Expense_View` int(11) NOT NULL,
  `Cash_View` int(11) NOT NULL,
  `monthlysummery` int(11) NOT NULL,
  `lossprofit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menuaccess`
--

INSERT INTO `tbl_menuaccess` (`menu_id`, `branch_id`, `Accounts`, `Cash_Transaction`, `Add_Account`, `Current_Stock`, `Add_Supplier`, `Add_Customer`, `Employee`, `Add_Employee`, `Employee_List`, `Add_Designation`, `Add_Department`, `Sales`, `Product_Sales`, `installment`, `installment_record`, `Sales_Return`, `Sales_Stock`, `Purchase`, `Purchase_Order`, `Purchase_Return`, `Damage_Entry`, `Purchase_Stock`, `Settings`, `Add_Category`, `Add_Product`, `User_Profile`, `Add_Unit`, `Add_Branch`, `Add_District`, `Add_Country`, `Supplier_List`, `Customer_List`, `rpSales`, `Sales_Invoice`, `Customer_Due_Report`, `Customer_Payment`, `Sales_Record`, `Sales_Return_List`, `rpPurchase`, `Purchase_Bill`, `Supplier_Due_Report`, `Supplier_Payment`, `Purchase_Record`, `Purchase_Return_List`, `rpAccounts`, `Expense_View`, `Cash_View`, `monthlysummery`, `lossprofit`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(9, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 1, 1),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE IF NOT EXISTS `tbl_package` (
`package_ID` int(11) NOT NULL,
  `package_name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `package_categoryid` int(11) NOT NULL,
  `package_purchPrice` varchar(20) CHARACTER SET latin1 NOT NULL,
  `package_sellPrice` varchar(20) CHARACTER SET latin1 NOT NULL,
  `package_ProCode` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_create`
--

CREATE TABLE IF NOT EXISTS `tbl_package_create` (
`create_ID` int(11) NOT NULL,
  `create_pacageID` varchar(20) CHARACTER SET latin1 NOT NULL,
  `create_item` varchar(250) NOT NULL,
  `create_purch_price` varchar(20) CHARACTER SET latin1 NOT NULL,
  `create_sell_price` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cteate_qty` varchar(20) NOT NULL,
  `create_proCode` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`Product_SlNo` int(11) NOT NULL,
  `Product_Code` varchar(50) NOT NULL,
  `Product_Name` varchar(150) NOT NULL,
  `Product_type` varchar(15) NOT NULL,
  `Product_BarCode` varchar(100) NOT NULL,
  `ProductCategory_ID` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `Product_IsRawMaterial` varchar(100) NOT NULL,
  `Product_IsFinishedGoods` varchar(100) NOT NULL,
  `Product_ReOrederLevel` int(11) NOT NULL,
  `Product_Purchase_Rate` float NOT NULL,
  `Product_SellingPrice` float NOT NULL,
  `Product_WholesaleRate` float NOT NULL,
  `Product_InstallmentRate` float NOT NULL,
  `Unit_ID` int(11) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(100) NOT NULL,
  `AddTime` varchar(30) NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateTime` varchar(30) NOT NULL,
  `Product_packageID` int(11) NOT NULL,
  `product_create_pack_id` int(11) NOT NULL,
  `Product_branchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`Product_SlNo`, `Product_Code`, `Product_Name`, `Product_type`, `Product_BarCode`, `ProductCategory_ID`, `sizeId`, `Product_IsRawMaterial`, `Product_IsFinishedGoods`, `Product_ReOrederLevel`, `Product_Purchase_Rate`, `Product_SellingPrice`, `Product_WholesaleRate`, `Product_InstallmentRate`, `Unit_ID`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Product_packageID`, `product_create_pack_id`, `Product_branchid`) VALUES
(1, 'P1001', 'Color TV', 'Product', '', 1, 2, '', '', 10, 22000, 24000, 22500, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-05 11:48:43', '', '', 0, 0, 1),
(2, 'P1002', 'FAN', 'Product', '', 2, 1, '', '', 5, 4000, 4300, 4200, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-05 11:49:17', '', '', 0, 0, 1),
(3, 'P1003', 'Wooden Khat', 'Product', '', 3, 3, '', '', 5, 14000, 16000, 14500, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-05 11:49:51', '', '', 0, 0, 1),
(4, 'P1004', 'Kitchen rak', 'Product', '', 5, 5, '', '', 10, 1200, 1500, 1400, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-09 04:41:39', '', '', 0, 0, 1),
(5, 'P1005', 'Sound Box', 'Product', '', 6, 5, '', '', 10, 1600, 1800, 1750, 0, 4, '', 'Six Star Electronics & Furniture', '2017-03-09 04:42:41', '', '', 0, 0, 1),
(6, 'P1006', '32" Led TV', 'Product', '', 7, 4, '', '', 10, 26000, 28000, 27500, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-09 04:43:41', '', '', 0, 0, 1),
(7, 'P1007', 'Prasser cooker', 'Product', '', 4, 6, '', '', 5, 4000, 4500, 4300, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-09 04:45:16', '', '', 0, 0, 1),
(8, 'P1008', 'cry tv', 'Product', '', 1, 2, '', '', 44, 5000, 5500, 5200, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-14 12:12:59', '', '', 0, 0, 1),
(9, 'P1009', 'Color TV', 'Product', '', 1, 0, '', '', 5, 18000, 23000, 18500, 0, 3, '', 'Six Star Electronics & Furniture', '2017-03-15 11:09:47', 'Six Star Electronics & Furniture', '2017-03-15 11:11:17', 0, 0, 1),
(10, 'P1010', 'Sewing Machine', 'Product', '', 7, 7, '', '', 5, 6500, 7000, 6800, 0, 3, '', 'Six Star Electronics & Furniture', '2017-04-05 09:07:53', '', '', 0, 0, 1),
(13, 'P1011', 'LED TV', 'Product', '', 9, 4, '', '', 0, 17500, 22000, 18000, 0, 3, '', 'Six Star Electronics & Furniture', '2017-04-18 04:53:12', '', '', 0, 0, 1),
(15, 'P1012', 'Ciling Fan', 'Product', '', 10, 1, '', '', 15, 1800, 2200, 2000, 0, 3, '', 'Six Star Electronics ', '2017-04-24 11:45:07', '', '', 0, 0, 1),
(16, 'P1013', 'ABCD', 'Product', '', 5, 1, '', '', 10, 200, 300, 250, 350, 3, '', 'Six Star Electronics ', '2017-05-31 05:12:46', 'Six Star Electronics ', '2017-05-31 05:34:38', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_productcategory` (
`ProductCategory_SlNo` int(11) NOT NULL,
  `ProductCategory_Name` varchar(150) NOT NULL,
  `ProductCategory_Description` varchar(300) NOT NULL,
  `company` varchar(255) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) NOT NULL,
  `AddTime` varchar(30) NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateTime` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`ProductCategory_SlNo`, `ProductCategory_Name`, `ProductCategory_Description`, `company`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 'Sony', 'Sony Brand TV', '', '', 'Six Star Electronics & Furniture', '2017-03-05 11:46:00', '', ''),
(2, 'KoncA', 'Fan', '', '', 'Six Star Electronics & Furniture', '2017-03-05 11:46:17', '', ''),
(3, 'MTF', 'Wood', '', '', 'Six Star Electronics & Furniture', '2017-03-05 11:46:48', '', ''),
(4, 'Topper', 'desxr', '', '', 'Six Star Electronics & Furniture', '2017-03-09 09:37:04', '', ''),
(5, 'RFL', 'desxr', '', '', 'Six Star Electronics & Furniture', '2017-03-09 09:37:43', '', ''),
(6, 'Microlab', 'desxr', '', '', 'Six Star Electronics & Furniture', '2017-03-09 09:38:09', '', ''),
(7, 'Butterfly', 'desxr', 'test', '', 'Six Star Electronics & Furniture', '2017-03-09 09:38:20', 'Six Star Electronics & Furniture', '2017-04-08 01:04:04'),
(8, 'EVL 261', 'Toshoba Iron', '', '', 'Six Star Electronics & Furniture', '2017-03-16 02:56:52', '', ''),
(9, 'Vision', '', 'RFL', '', 'Six Star Electronics & Furniture', '2017-04-18 04:45:41', 'Six Star Electronics ', '2017-04-25 12:16:59'),
(10, 'Air Cool', 'demo', 'RFL', '', 'Six Star Electronics ', '2017-04-24 11:41:18', 'Six Star Electronics ', '2017-04-25 12:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produsize`
--

CREATE TABLE IF NOT EXISTS `tbl_produsize` (
`Productsize_SlNo` int(11) NOT NULL,
  `Productsize_Name` varchar(150) NOT NULL,
  `Productsize_Description` varchar(300) NOT NULL,
  `Status` char(1) NOT NULL,
  `addby` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_produsize`
--

INSERT INTO `tbl_produsize` (`Productsize_SlNo`, `Productsize_Name`, `Productsize_Description`, `Status`, `addby`) VALUES
(1, '56"', 'Fan', '', 'Six Star Electronics & Furniture'),
(2, '21"', '21" LED TV', '', 'Six Star Electronics & Furniture'),
(3, '6/7"', 'wood', '', 'Six Star Electronics & Furniture'),
(4, '32"', 'butter fly', '', 'Six Star Electronics & Furniture'),
(5, 'common', 'saad', '', 'Six Star Electronics & Furniture'),
(6, '4.5kg', '', '', 'Six Star Electronics & Furniture'),
(7, 'Non', '', '', 'Six Star Electronics & Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasedetails`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasedetails` (
`PurchaseDetails_SlNo` int(11) NOT NULL,
  `PurchaseMaster_IDNo` int(11) NOT NULL,
  `Product_IDNo` int(11) NOT NULL,
  `PurchaseDetails_TotalQuantity` varchar(20) NOT NULL,
  `PurchaseDetail_ReceiveQuantity` varchar(20) NOT NULL,
  `PurchaseDetails_Rate` varchar(20) NOT NULL,
  `PurchaseDetails_Unit` varchar(20) NOT NULL,
  `PurchaseDetails_ExpireDate` datetime NOT NULL,
  `PurchaseDetails_Discount` varchar(20) NOT NULL,
  `PurchaseDetails_Tax` varchar(20) NOT NULL,
  `PurchaseDetails_Freight` varchar(20) NOT NULL,
  `PurchaseDetails_TotalAmount` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `PurchaseDetails_branchID` int(11) NOT NULL,
  `PackName` varchar(200) NOT NULL,
  `PackPice` varchar(20) NOT NULL,
  `Pack_qty` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchasedetails`
--

INSERT INTO `tbl_purchasedetails` (`PurchaseDetails_SlNo`, `PurchaseMaster_IDNo`, `Product_IDNo`, `PurchaseDetails_TotalQuantity`, `PurchaseDetail_ReceiveQuantity`, `PurchaseDetails_Rate`, `PurchaseDetails_Unit`, `PurchaseDetails_ExpireDate`, `PurchaseDetails_Discount`, `PurchaseDetails_Tax`, `PurchaseDetails_Freight`, `PurchaseDetails_TotalAmount`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `PurchaseDetails_branchID`, `PackName`, `PackPice`, `Pack_qty`) VALUES
(1, 1, 1, '7', '', '22000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(2, 1, 1, '2', '', '22000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(3, 1, 1, '1', '', '22000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(4, 1, 2, '5', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(5, 1, 2, '1', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(6, 1, 3, '4', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(7, 1, 3, '1', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(8, 1, 3, '2', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(9, 2, 7, '10', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(10, 2, 7, '2', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(11, 2, 6, '12', '', '26000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(12, 2, 6, '2', '', '26000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(13, 2, 6, '1', '', '26000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(14, 2, 5, '15', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(15, 2, 5, '3', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(16, 2, 5, '2', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(17, 2, 4, '20', '', '1200', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(18, 2, 4, '5', '', '1200', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(19, 3, 9, '15', '', '18000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(20, 4, 2, '10', '', '1500', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(21, 5, 5, '12', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(22, 6, 2, '1', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(23, 8, 7, '12', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(24, 9, 2, '3', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(25, 10, 6, '10', '', '26000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(26, 11, 4, '3', '', '1200', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(27, 12, 8, '5', '', '5000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(28, 12, 8, '5', '', '5000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(29, 12, 8, '5', '', '5000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(30, 13, 2, '2', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(31, 14, 2, '25', '', '200', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(32, 15, 2, '10', '', '25375', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(33, 16, 3, '2', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(34, 17, 2, '20', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(35, 18, 2, '5', '', '4000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(36, 19, 3, '50', '', '24254', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(37, 20, 3, '12', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(38, 21, 8, '10', '', '5000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(39, 22, 8, '5', '', '3000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(40, 23, 3, '4', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(41, 23, 3, '1', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(42, 23, 5, '2', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(43, 23, 5, '5', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 2, '', '', ''),
(44, 23, 5, '3', '', '1600', 'set', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 6, '', '', ''),
(45, 24, 3, '12', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(46, 25, 3, '2', '', '16000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(47, 26, 3, '10', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', ''),
(48, 27, 3, '10', '', '14000', 'pcs', '0000-00-00 00:00:00', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseinventory`
--

CREATE TABLE IF NOT EXISTS `tbl_purchaseinventory` (
`PurchaseInventory_SlNo` int(11) NOT NULL,
  `purchProduct_IDNo` int(11) NOT NULL,
  `PurchaseInventory_TotalQuantity` double NOT NULL,
  `PurchaseInventory_ReceiveQuantity` double NOT NULL,
  `PurchaseInventory_ReturnQuantity` double NOT NULL,
  `PurchaseInventory_DamageQuantity` double NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `PurchaseInventory_packqty` varchar(20) NOT NULL,
  `PurchaseInventory_packname` varchar(200) NOT NULL,
  `PurchaseInventory_returnqty` varchar(20) NOT NULL,
  `PurchaseInventory_brunchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchaseinventory`
--

INSERT INTO `tbl_purchaseinventory` (`PurchaseInventory_SlNo`, `purchProduct_IDNo`, `PurchaseInventory_TotalQuantity`, `PurchaseInventory_ReceiveQuantity`, `PurchaseInventory_ReturnQuantity`, `PurchaseInventory_DamageQuantity`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `PurchaseInventory_packqty`, `PurchaseInventory_packname`, `PurchaseInventory_returnqty`, `PurchaseInventory_brunchid`) VALUES
(1, 1, 7, 0, 5, 0, NULL, NULL, NULL, NULL, '', '', '5', 1),
(2, 1, 2, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(3, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 6),
(4, 2, 81, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '0', 1),
(5, 2, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(6, 3, 106, 0, 1, 4, NULL, NULL, NULL, NULL, '', '', '1', 1),
(7, 3, 2, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(8, 3, 2, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 6),
(9, 7, 22, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '0', 1),
(10, 7, 2, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(11, 6, 22, 0, 2, 2, NULL, NULL, NULL, NULL, '', '', '2', 1),
(12, 6, 2, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(13, 6, 1, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 6),
(14, 5, 29, 0, 1, 0, NULL, NULL, NULL, NULL, '', '', '1', 1),
(15, 5, 8, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(16, 5, 5, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 6),
(17, 4, 23, 0, 2, 0, NULL, NULL, NULL, NULL, '', '', '2', 1),
(18, 4, 5, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(19, 9, 15, 0, 6, 0, NULL, NULL, NULL, NULL, '', '', '6', 1),
(20, 8, 20, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 1),
(21, 8, 5, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 2),
(22, 8, 5, 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasemaster`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasemaster` (
`PurchaseMaster_SlNo` int(11) NOT NULL,
  `Supplier_SlNo` int(11) NOT NULL,
  `Employee_SlNo` int(11) NOT NULL,
  `PurchaseMaster_InvoiceNo` varchar(50) NOT NULL,
  `PurchaseMaster_OrderDate` date NOT NULL,
  `PurchaseMaster_Description` longtext NOT NULL,
  `PurchaseMaster_PurchaseType` varchar(50) NOT NULL,
  `PurchaseMaster_TotalAmount` varchar(20) NOT NULL,
  `PurchaseMaster_DiscountAmount` varchar(20) NOT NULL,
  `PurchaseMaster_Tax` varchar(20) NOT NULL,
  `PurchaseMaster_Freight` varchar(20) NOT NULL,
  `PurchaseMaster_LabourCost` varchar(20) NOT NULL,
  `PurchaseMaster_SubTotalAmount` varchar(20) NOT NULL,
  `PurchaseMaster_PaidAmount` varchar(20) NOT NULL,
  `PurchaseMaster_DueAmount` varchar(20) NOT NULL,
  `PurchaseMaster_ReceiveDate` datetime NOT NULL,
  `PurchaseMaster_Status` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `PurchaseMaster_GUID` varchar(64) NOT NULL,
  `PurchaseMaster_BranchID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchasemaster`
--

INSERT INTO `tbl_purchasemaster` (`PurchaseMaster_SlNo`, `Supplier_SlNo`, `Employee_SlNo`, `PurchaseMaster_InvoiceNo`, `PurchaseMaster_OrderDate`, `PurchaseMaster_Description`, `PurchaseMaster_PurchaseType`, `PurchaseMaster_TotalAmount`, `PurchaseMaster_DiscountAmount`, `PurchaseMaster_Tax`, `PurchaseMaster_Freight`, `PurchaseMaster_LabourCost`, `PurchaseMaster_SubTotalAmount`, `PurchaseMaster_PaidAmount`, `PurchaseMaster_DueAmount`, `PurchaseMaster_ReceiveDate`, `PurchaseMaster_Status`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `PurchaseMaster_GUID`, `PurchaseMaster_BranchID`) VALUES
(1, 2, 0, '2017-03-60002', '2017-03-06', '', '', '342000', '0', '0', '0', '0', '342000', '342000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-03-06 08:56:06', NULL, NULL, '', 1),
(2, 1, 0, '2017-03-60003', '2017-03-09', 'sfdsdf', '', '500000', '0', '0', '0', '0', '500000', '500000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-03-09 04:47:07', NULL, NULL, '', 1),
(3, 1, 0, '2017-03-60004', '2017-03-15', '', '', '270000', '0', '0', '1200', '0', '271200', '271200', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-03-15 11:13:45', NULL, NULL, '', 1),
(4, 2, 0, '2017-03-60005', '2017-03-15', '', '', '15000', '0', '0', '0', '0', '15000', '15000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-03-15 11:30:05', NULL, NULL, '', 1),
(5, 4, 0, '2017-04-60006', '2017-04-12', '', '', '19200', '0', '0', '0', '0', '19200', '19200', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-04-12 03:06:55', NULL, NULL, '', 1),
(6, 4, 0, '2017-04-60007', '2017-04-12', '', '', '8000', '0', '0', '0', '0', '8000', '8000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-04-12 03:23:10', NULL, NULL, '', 1),
(7, 4, 0, '2017-04-60007', '2017-04-12', '', '', '8000', '0', '0', '0', '0', '8000', '8000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-04-12 03:23:43', NULL, NULL, '', 1),
(8, 1, 0, '2017-04-60008', '2017-04-12', '', '', '48000', '0', '0', '0', '0', '48000', '48000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics & Furniture', '2017-04-12 04:00:30', NULL, NULL, '', 1),
(9, 2, 0, '2017-04-60009', '2017-04-24', '', '', '20000', '0', '0', '0', '0', '20000', '20000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-24 12:37:08', NULL, NULL, '', 1),
(10, 1, 0, '2017-04-60010', '2017-04-24', '', '', '260000', '0', '0', '0', '0', '260000', '260000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-24 12:41:36', NULL, NULL, '', 1),
(11, 5, 0, '2017-04-60011', '2017-04-25', '', '', '3600', '0', '0', '0', '0', '3600', '3600', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-25 03:18:30', NULL, NULL, '', 1),
(12, 3, 0, '2017-04-60012', '2017-04-25', '', '', '75000', '0', '0', '0', '0', '75000', '75000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-25 03:20:33', NULL, NULL, '', 1),
(13, 1, 0, '2017-04-60013', '2017-04-26', '', '', '8000', '0', '0', '0', '0', '8000', '8000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-26 04:48:06', NULL, NULL, '', 1),
(14, 2, 0, '2017-04-60014', '2017-04-27', '', '', '5000', '0', '0', '0', '0', '5000', '5000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-27 12:34:49', NULL, NULL, '', 1),
(15, 3, 0, '2017-04-60015', '2017-04-27', '', '', '253750', '0', '0', '0', '0', '253750', '253750', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-27 12:36:37', NULL, NULL, '', 1),
(16, 2, 0, '2017-04-60016', '2017-04-29', '', '', '28000', '0', '0', '0', '0', '28000', '28000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-29 01:44:42', NULL, NULL, '', 1),
(17, 1, 0, '2017-04-60017', '2017-04-30', '', '', '80000', '0', '0', '0', '0', '80000', '5000', '75000', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-30 03:25:49', NULL, NULL, '', 1),
(18, 2, 0, '2017-04-60018', '2017-04-30', '', '', '20000', '0', '0', '0', '0', '20000', '20000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-30 04:11:32', NULL, NULL, '', 1),
(19, 1, 0, '2017-04-60019', '2017-04-30', '', '', '1212700', '0', '0', '0', '0', '1212700', '1212700', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-04-30 04:14:14', NULL, NULL, '', 1),
(20, 6, 0, '2017-05-60020', '2017-05-07', '', '', '168000', '0', '0', '0', '0', '168000', '168000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-07 02:04:46', NULL, NULL, '', 1),
(21, 3, 0, '2017-05-60021', '2017-05-09', '', '', '50000', '0', '0', '0', '0', '50000', '50000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-09 10:59:17', NULL, NULL, '', 1),
(22, 3, 0, '2017-05-60022', '2017-05-09', '', '', '15000', '0', '0', '0', '0', '15000', '15000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-09 10:59:49', NULL, NULL, '', 1),
(23, 2, 0, '2017-05-60023', '2017-05-10', '', '', '86000', '0', '0', '0', '0', '86000', '86000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-10 12:30:02', NULL, NULL, '', 1),
(24, 2, 0, '2017-05-60024', '2017-05-10', '', '', '168000', '0', '0', '0', '0', '168000', '168000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-10 01:22:38', NULL, NULL, '', 1),
(25, 3, 0, '2017-05-60025', '2017-05-10', '', '', '32000', '0', '0', '0', '0', '32000', '32000', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-10 01:23:44', NULL, NULL, '', 1),
(26, 1, 0, '2017-05-60026', '2017-05-29', 'rerererere', '', '140000', '1000', '1.5', '500', '0', '141600', '101600', '40000', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-05-29 11:23:20', NULL, NULL, '', 1),
(27, 2, 0, '2017-06-60027', '2017-06-01', '', '', '140000', '500', '2.5', '500', '1000', '144500', '144500', '0', '0000-00-00 00:00:00', '', '', 'Six Star Electronics ', '2017-06-01 01:39:58', NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasereturn`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasereturn` (
`PurchaseReturn_SlNo` int(11) NOT NULL,
  `PurchaseMaster_InvoiceNo` varchar(50) NOT NULL,
  `Supplier_IDdNo` int(11) NOT NULL,
  `PurchaseReturn_ReturnDate` date NOT NULL,
  `PurchaseReturn_ReturnQuantity` varchar(20) NOT NULL,
  `PurchaseReturn_ReturnAmount` varchar(20) NOT NULL,
  `PurchaseReturn_Description` varchar(300) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `PurchaseReturn_brunchID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchasereturn`
--

INSERT INTO `tbl_purchasereturn` (`PurchaseReturn_SlNo`, `PurchaseMaster_InvoiceNo`, `Supplier_IDdNo`, `PurchaseReturn_ReturnDate`, `PurchaseReturn_ReturnQuantity`, `PurchaseReturn_ReturnAmount`, `PurchaseReturn_Description`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `PurchaseReturn_brunchID`) VALUES
(1, '2017-03-60002', 2, '2017-03-14', '4', '56', '', '', 'Six Star Electronics & Furniture', '2017-03-14 01:12:05', NULL, NULL, 1),
(2, '2017-03-60003', 1, '2017-03-11', '1', '0', 'assdf', '', 'Six Star Electronics & Furniture', '2017-03-11 09:22:50', NULL, NULL, 1),
(3, '2017-03-60004', 1, '2017-03-16', '6', '110000', '', '', 'Six Star Electronics & Furniture', '2017-03-16 07:01:17', NULL, NULL, 1),
(4, '2017-04-60010', 1, '2017-03-02', '2', '200', '', '', 'Six Star Electronics ', '2017-04-26 01:45:25', NULL, NULL, 1),
(5, '2017-04-60017', 1, '2017-04-30', '0', '0', '', '', 'Six Star Electronics ', '2017-04-30 04:18:56', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasereturndetails`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasereturndetails` (
`PurchaseReturnDetails_SlNo` int(11) NOT NULL,
  `PurchaseReturn_SlNo` int(11) NOT NULL,
  `PurchaseReturnDetails_ReturnDate` date NOT NULL,
  `PurchaseReturnDetailsProduct_SlNo` int(11) NOT NULL,
  `PurchaseReturnDetails_ReceiveQuantity` varchar(20) NOT NULL,
  `PurchaseReturnDetails_ReturnQuantity` varchar(20) NOT NULL,
  `PurchaseReturnDetails_ReturnAmount` varchar(19) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `PurchaseReturnDetails_brachid` int(11) NOT NULL,
  `PurchaseReturnDetails_pacQty` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchasereturndetails`
--

INSERT INTO `tbl_purchasereturndetails` (`PurchaseReturnDetails_SlNo`, `PurchaseReturn_SlNo`, `PurchaseReturnDetails_ReturnDate`, `PurchaseReturnDetailsProduct_SlNo`, `PurchaseReturnDetails_ReceiveQuantity`, `PurchaseReturnDetails_ReturnQuantity`, `PurchaseReturnDetails_ReturnAmount`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `PurchaseReturnDetails_brachid`, `PurchaseReturnDetails_pacQty`) VALUES
(1, 1, '2017-03-11', 1, '', '1', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:15:36', NULL, NULL, 1, ''),
(2, 1, '2017-03-11', 2, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:15:36', NULL, NULL, 1, ''),
(3, 1, '2017-03-11', 3, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:15:36', NULL, NULL, 1, ''),
(4, 2, '2017-03-11', 4, '', '1', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:22:50', NULL, NULL, 1, ''),
(5, 2, '2017-03-11', 5, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:22:50', NULL, NULL, 1, ''),
(6, 2, '2017-03-11', 6, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:22:51', NULL, NULL, 1, ''),
(7, 2, '2017-03-11', 7, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 09:22:51', NULL, NULL, 1, ''),
(8, 1, '2017-03-14', 1, '', '3', '56', '', 'Six Star Electronics & Furniture', '2017-03-14 01:12:05', NULL, NULL, 1, ''),
(9, 1, '2017-03-14', 2, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-14 01:12:05', NULL, NULL, 1, ''),
(10, 1, '2017-03-14', 3, '', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-14 01:12:05', NULL, NULL, 1, ''),
(11, 3, '2017-03-16', 9, '', '5', '0100000', '', 'Six Star Electronics & Furniture', '2017-03-16 03:05:01', NULL, NULL, 1, ''),
(12, 3, '2017-03-16', 9, '', '1', '010000', '', 'Six Star Electronics & Furniture', '2017-03-16 07:01:17', NULL, NULL, 1, ''),
(13, 4, '2017-03-02', 6, '', '2', '200', '', 'Six Star Electronics ', '2017-04-26 01:45:25', NULL, NULL, 1, ''),
(14, 5, '2017-04-30', 2, '', '0', '0', '', 'Six Star Electronics ', '2017-04-30 04:18:56', NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saledetails`
--

CREATE TABLE IF NOT EXISTS `tbl_saledetails` (
`SaleDetails_SlNo` int(11) NOT NULL,
  `SaleMaster_IDNo` int(11) NOT NULL,
  `Product_IDNo` int(11) NOT NULL,
  `SaleDetails_TotalQuantity` varchar(20) NOT NULL,
  `Purchase_Rate` varchar(19) DEFAULT NULL,
  `SaleDetails_Rate` varchar(19) NOT NULL,
  `SaleDetails_unit` varchar(20) NOT NULL,
  `SaleDetails_Discount` varchar(19) NOT NULL,
  `SaleDetails_Tax` varchar(19) NOT NULL,
  `SaleDetails_Freight` varchar(19) NOT NULL,
  `SaleDetails_TotalAmount` varchar(19) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `packageName` varchar(200) NOT NULL,
  `packSellPrice` varchar(20) NOT NULL,
  `SeleDetails_qty` varchar(20) NOT NULL,
  `saledetailbrids` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saledetails`
--

INSERT INTO `tbl_saledetails` (`SaleDetails_SlNo`, `SaleMaster_IDNo`, `Product_IDNo`, `SaleDetails_TotalQuantity`, `Purchase_Rate`, `SaleDetails_Rate`, `SaleDetails_unit`, `SaleDetails_Discount`, `SaleDetails_Tax`, `SaleDetails_Freight`, `SaleDetails_TotalAmount`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `packageName`, `packSellPrice`, `SeleDetails_qty`, `saledetailbrids`) VALUES
(1, 1, 1, '1', '22000', '24000', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(2, 2, 1, '1', '22000', '24000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(3, 3, 2, '1', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(4, 3, 3, '1', '14000', '16000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(5, 4, 3, '1', '14000', '14500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(6, 5, 1, '1', '22000', '22500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(7, 6, 3, '1', '14000', '16000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(8, 7, 5, '1', '1600', '1800', 'set', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(9, 8, 7, '2', '4000', '4500', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(10, 9, 5, '4', '1600', '1750', 'set', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(11, 9, 7, '2', '4000', '4300', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(12, 9, 6, '1', '26000', '27500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(13, 10, 5, '2', '1600', '1750', 'set', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(14, 11, 7, '1', '4000', '4500', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(15, 12, 2, '3', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(16, 13, 4, '5', '1200', '1400', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(17, 14, 9, '5', '18000', '23000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(18, 15, 9, '8', '18000', '25000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(19, 16, 9, '2', '18000', '23000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(20, 17, 4, '2', '1200', '1600', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(21, 18, 3, '1', '14000', '16000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(22, 19, 4, '2', '1200', '1400', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(23, 20, 2, '3', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(24, 21, 3, '1', '14000', '16000', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(25, 22, 2, '2', '4000', '4200', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(26, 23, 5, '2', '1600', '1800', 'set', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(27, 24, 4, '1', '1200', '1500', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(28, 25, 1, '2', '22000', '22500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(29, 26, 8, '2', '5000', '5500', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(30, 27, 2, '2', '4000', '200', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(31, 28, 2, '2', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(32, 29, 1, '2', '22000', '22500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(33, 30, 7, '3', '4000', '4500', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(34, 31, 2, '2', '4000', '4300', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(35, 32, 2, '2', '4000', '4300', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(36, 33, 5, '1', '1600', '1800', 'set', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(37, 34, 2, '1', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(38, 35, 2, '1', '4000', '4300', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(39, 36, 4, '1', '1200', '1500', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(40, 37, 4, '1', '1200', '1500', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(41, 38, 4, '1', '1200', '1400', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(42, 39, 3, '10', '14000', '16000', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(43, 40, 2, '5', '4000', '4300', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(44, 40, 4, '2', '1200', '1500', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(45, 40, 7, '3', '4000', '4500', 'pcs', '', '', '', '', '3', NULL, NULL, NULL, NULL, '', '', '', 0),
(46, 41, 7, '1', '4000', '98000', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(47, 42, 2, '5', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(48, 43, 2, '10', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(49, 44, 3, '10', '14000', '14500', 'pcs', '', '', '', '', '2', NULL, NULL, NULL, NULL, '', '', '', 0),
(50, 45, 2, '10', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1),
(51, 46, 2, '1', '4000', '4300', 'pcs', '', '', '', '', '1', NULL, NULL, NULL, NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saleinventory`
--

CREATE TABLE IF NOT EXISTS `tbl_saleinventory` (
`SaleInventory_SlNo` int(11) NOT NULL,
  `sellProduct_IdNo` int(11) NOT NULL,
  `SaleInventory_TotalQuantity` double NOT NULL,
  `SaleInventory_ReceiveQuantity` double NOT NULL,
  `SaleInventory_ReturnQuantity` double NOT NULL,
  `SaleInventory_DamageQuantity` double NOT NULL,
  `Status` int(11) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `SaleInventory_packname` varchar(200) NOT NULL,
  `SaleInventory_qty` varchar(20) NOT NULL,
  `SaleInventory_returnqty` varchar(20) NOT NULL,
  `SaleInventory_brunchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saleinventory`
--

INSERT INTO `tbl_saleinventory` (`SaleInventory_SlNo`, `sellProduct_IdNo`, `SaleInventory_TotalQuantity`, `SaleInventory_ReceiveQuantity`, `SaleInventory_ReturnQuantity`, `SaleInventory_DamageQuantity`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `SaleInventory_packname`, `SaleInventory_qty`, `SaleInventory_returnqty`, `SaleInventory_brunchid`) VALUES
(1, 1, 7, 0, 0, 0, 0, 'Six Star Electronics & Furniture', '2017-03-07 06:43:34', 'Six Star Electronics ', '2017-04-27 01:11:16', '', '', '', 1),
(2, 2, 50, 0, 1, 0, 0, 'Six Star Electronics & Furniture', '2017-03-08 05:19:01', 'Six Star Electronics ', '2017-06-14 09:20:08', '', '', '', 1),
(3, 3, 25, 0, 0, 0, 0, 'Six Star Electronics & Furniture', '2017-03-08 05:19:01', 'Six Star Electronics ', '2017-05-29 10:49:07', '', '', '', 1),
(4, 5, 10, 0, 0, 0, 0, 'Six Star Electronics & Furniture', '2017-03-09 04:56:45', 'Six Star Electronics ', '2017-04-29 06:25:47', '', '', '', 1),
(5, 7, 12, 0, 3, 0, 0, 'Six Star Electronics & Furniture', '2017-03-09 04:57:29', 'Six Star Electronics ', '2017-05-10 01:16:19', '', '', '', 1),
(6, 6, 1, 0, 0, 0, 0, 'Six Star Electronics & Furniture', '2017-03-09 04:58:22', NULL, NULL, '', '', '', 1),
(7, 4, 15, 0, 3, 0, 0, 'Six Star Electronics & Furniture', '2017-03-14 11:20:16', 'Six Star Electronics ', '2017-05-07 02:21:46', '', '', '', 1),
(8, 9, 15, 0, 0, 0, 0, 'Six Star Electronics & Furniture', '2017-03-15 11:16:41', 'Six Star Electronics & Furniture', '2017-03-15 11:33:29', '', '', '', 1),
(9, 8, 2, 0, 0, 0, 0, 'Six Star Electronics ', '2017-04-26 04:49:26', NULL, NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salereturn`
--

CREATE TABLE IF NOT EXISTS `tbl_salereturn` (
`SaleReturn_SlNo` int(11) NOT NULL,
  `SaleMaster_InvoiceNo` varchar(50) NOT NULL,
  `SaleReturn_ReturnDate` date NOT NULL,
  `SaleReturn_ReturnQuantity` varchar(20) NOT NULL,
  `SaleReturn_ReturnAmount` varchar(20) NOT NULL,
  `SaleReturn_Description` varchar(300) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `SaleReturn_brunchId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_salereturn`
--

INSERT INTO `tbl_salereturn` (`SaleReturn_SlNo`, `SaleMaster_InvoiceNo`, `SaleReturn_ReturnDate`, `SaleReturn_ReturnQuantity`, `SaleReturn_ReturnAmount`, `SaleReturn_Description`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `SaleReturn_brunchId`) VALUES
(1, 'RC2017-03-083', '2017-03-11', '1', '0', 'fhh', '', 'Six Star Electronics & Furniture', '2017-03-11 06:25:04', NULL, NULL, 1),
(2, 'RC2017-03-098', '2017-03-14', '1', '0', '', '', 'Six Star Electronics & Furniture', '2017-03-14 01:08:06', NULL, NULL, 1),
(3, 'WC2017-03-1413', '2017-03-08', '2', '500', '', '', 'Six Star Electronics ', '2017-04-26 01:46:14', NULL, NULL, 1),
(4, 'WC2017-03-099', '2017-03-08', '2', '300', '', '', 'Six Star Electronics ', '2017-04-27 11:38:28', NULL, NULL, 1),
(5, 'WC2017-04-3038', '2017-05-23', '1', '1400', '', '', 'Six Star Electronics ', '2017-05-23 04:55:03', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salereturndetails`
--

CREATE TABLE IF NOT EXISTS `tbl_salereturndetails` (
`SaleReturnDetails_SlNo` int(11) NOT NULL,
  `SaleReturn_IdNo` int(11) NOT NULL,
  `SaleReturnDetails_ReturnDate` date NOT NULL,
  `SaleReturnDetailsProduct_SlNo` int(11) NOT NULL,
  `SaleReturnDetails_SaleQuantity` varchar(20) NOT NULL,
  `SaleReturnDetails_ReturnQuantity` varchar(20) NOT NULL,
  `SaleReturnDetails_ReturnAmount` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `SaleReturnDetails_brunchID` int(11) NOT NULL,
  `SaleReturnDetails_Qty` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_salereturndetails`
--

INSERT INTO `tbl_salereturndetails` (`SaleReturnDetails_SlNo`, `SaleReturn_IdNo`, `SaleReturnDetails_ReturnDate`, `SaleReturnDetailsProduct_SlNo`, `SaleReturnDetails_SaleQuantity`, `SaleReturnDetails_ReturnQuantity`, `SaleReturnDetails_ReturnAmount`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `SaleReturnDetails_brunchID`, `SaleReturnDetails_Qty`) VALUES
(1, 1, '2017-03-11', 2, '1', '1', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 06:25:04', NULL, NULL, 1, ''),
(2, 1, '2017-03-11', 3, '1', '0', '0', '', 'Six Star Electronics & Furniture', '2017-03-11 06:25:04', NULL, NULL, 1, ''),
(3, 2, '2017-03-14', 7, '2', '1', '0', '', 'Six Star Electronics & Furniture', '2017-03-14 01:08:06', NULL, NULL, 1, ''),
(4, 3, '2017-03-08', 4, '5', '2', '500', '', 'Six Star Electronics ', '2017-04-26 01:46:14', NULL, NULL, 1, ''),
(5, 4, '2017-03-08', 5, '4', '0', '0', '', 'Six Star Electronics ', '2017-04-27 11:38:28', NULL, NULL, 1, ''),
(6, 4, '2017-03-08', 7, '2', '2', '300', '', 'Six Star Electronics ', '2017-04-27 11:38:28', NULL, NULL, 1, ''),
(7, 4, '2017-03-08', 6, '1', '0', '0', '', 'Six Star Electronics ', '2017-04-27 11:38:28', NULL, NULL, 1, ''),
(8, 5, '2017-05-23', 4, '1', '1', '1400', '', 'Six Star Electronics ', '2017-05-23 04:55:03', NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesmaster`
--

CREATE TABLE IF NOT EXISTS `tbl_salesmaster` (
`SaleMaster_SlNo` int(11) NOT NULL,
  `SaleMaster_InvoiceNo` varchar(50) NOT NULL,
  `SalseCustomer_IDNo` int(11) DEFAULT NULL,
  `SalseCustomer_Name` varchar(255) NOT NULL,
  `SalseCustomer_Contact` varchar(255) NOT NULL,
  `SalseCustomer_Address` text NOT NULL,
  `SaleMaster_SaleDate` date NOT NULL,
  `SaleMaster_Description` longtext,
  `SaleMaster_SaleType` varchar(50) NOT NULL,
  `SaleMaster_TotalSaleAmount` varchar(20) NOT NULL,
  `SaleMaster_TotalDiscountAmount` varchar(20) NOT NULL,
  `SaleMaster_RewordDiscount` float NOT NULL,
  `SaleMaster_TaxAmount` varchar(20) NOT NULL,
  `SaleMaster_Freight` varchar(20) NOT NULL,
  `SaleMaster_SubTotalAmount` varchar(255) NOT NULL,
  `SaleMaster_PaidAmount` varchar(20) NOT NULL,
  `SaleMaster_DueAmount` varchar(20) NOT NULL,
  `SaleMaster_TotalDue` varchar(20) NOT NULL DEFAULT '0.00',
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `SaleMaster_branchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_salesmaster`
--

INSERT INTO `tbl_salesmaster` (`SaleMaster_SlNo`, `SaleMaster_InvoiceNo`, `SalseCustomer_IDNo`, `SalseCustomer_Name`, `SalseCustomer_Contact`, `SalseCustomer_Address`, `SaleMaster_SaleDate`, `SaleMaster_Description`, `SaleMaster_SaleType`, `SaleMaster_TotalSaleAmount`, `SaleMaster_TotalDiscountAmount`, `SaleMaster_RewordDiscount`, `SaleMaster_TaxAmount`, `SaleMaster_Freight`, `SaleMaster_SubTotalAmount`, `SaleMaster_PaidAmount`, `SaleMaster_DueAmount`, `SaleMaster_TotalDue`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `SaleMaster_branchid`) VALUES
(1, 'RC2017-03-071', 1, '', '', '', '2017-03-07', 'sfd', '', '24000', '0', 0, '0', '0', '24000', '6000', '18000', '0.00', '3', 'Six Star Electronics & Furniture', '2017-03-07 06:43:34', NULL, NULL, 1),
(2, 'RC2017-03-082', 3, '', '', '', '2017-03-08', 'dssda', '', '24000', '0', 0, '0', '0', '24000', '24000', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-08 05:18:35', NULL, NULL, 1),
(3, 'RC2017-03-083', 2, '', '', '', '2017-03-08', 'dssfds', '', '20300', '0', 0, '0', '0', '20300', '20300', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-08 05:19:01', NULL, NULL, 1),
(4, 'WC2017-03-084', 4, '', '', '', '2017-03-08', '', '', '14500', '0', 0, '0', '0', '14500', '14500', '0', '0.00', '2', 'Six Star Electronics & Furniture', '2017-03-08 05:19:27', NULL, NULL, 1),
(5, 'WC2017-03-085', 4, '', '', '', '2017-03-08', 'fhgfhf', '', '22500', '0', 0, '0', '0', '22500', '17500', '5000', '0.00', '2', 'Six Star Electronics & Furniture', '2017-03-08 05:23:13', NULL, NULL, 1),
(6, 'RC2017-03-086', 1, '', '', '', '2017-03-08', '', '', '16000', '0', 0, '0', '0', '16000', '10000', '6000', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-08 12:21:29', NULL, NULL, 1),
(7, 'RC2017-03-097', 5, '', '', '', '2017-03-09', 'sale', '', '1800', '0', 0, '0', '0', '1800', '1800', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-09 04:56:45', NULL, NULL, 1),
(8, 'RC2017-03-098', 5, '', '', '', '2017-03-09', 'sasa', '', '9000', '0', 0, '0', '0', '9000', '9000', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-09 04:57:29', NULL, NULL, 1),
(9, 'WC2017-03-099', 4, '', '', '', '2017-03-09', 'sdffg', '', '43100', '0', 0, '0', '0', '43100', '43100', '0', '0.00', '2', 'Six Star Electronics & Furniture', '2017-03-09 04:58:21', NULL, NULL, 1),
(10, 'WC2017-03-0910', 2, '', '', '', '2017-03-09', '', '', '3500', '0', 0, '0', '0', '3500', '2500', '1000', '0.00', '2', 'Six Star Electronics & Furniture', '2017-03-09 05:01:26', NULL, NULL, 1),
(11, 'RC2017-03-0911', 1, '', '', '', '2017-03-09', 'test', '', '4500', '0', 0, '0', '0', '4500', '1500', '3000', '0.00', '3', 'Six Star Electronics & Furniture', '2017-03-09 05:08:02', NULL, NULL, 1),
(12, 'RC2017-03-1412', 2, '', '', '', '2017-03-14', '', '', '12900', '0', 0, '0', '0', '12900', '12900', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-14 11:07:49', NULL, NULL, 1),
(13, 'WC2017-03-1413', 4, '', '', '', '2017-03-14', '', '', '7000', '0', 0, '0', '0', '7000', '7000', '0', '0.00', '2', 'Six Star Electronics & Furniture', '2017-03-14 11:20:15', NULL, NULL, 1),
(14, 'RC2017-03-1514', 10, '', '', '', '2017-03-15', '', '', '115000', '0', 0, '0', '0', '115000', '115000', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-15 11:16:41', NULL, NULL, 1),
(15, 'RC2017-03-1515', 1, '', '', '', '2017-03-15', '', '', '200000', '0', 0, '0', '0', '200000', '200000', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-15 11:18:21', NULL, NULL, 1),
(16, 'RC2017-03-1516', 2, '', '', '', '2017-03-15', '', '', '46000', '0', 0, '0', '0', '46000', '46000', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-03-15 11:33:29', NULL, NULL, 1),
(17, 'RC2017-03-1617', 14, '', '', '', '2017-03-16', '', '', '3200', '050', 0, '4', '100', '3378', '1000', '2378', '0.00', '3', 'Six Star Electronics & Furniture', '2017-03-16 08:49:46', NULL, NULL, 1),
(18, 'RC2017-04-0818', 3, '', '', '', '2017-04-08', '', '', '16000', '0', 0, '0', '0', '16000', '20000', '-4000', '0.00', '1', 'Six Star Electronics & Furniture', '2017-04-08 11:29:45', NULL, NULL, 1),
(19, 'WC2017-04-1219', 11, '', '', '', '2017-04-12', '', '', '2800', '0', 0, '0', '0', '2800', '2800', '0', '0.00', '2', 'Six Star Electronics & Furniture', '2017-04-12 03:20:29', NULL, NULL, 1),
(20, 'RC2017-04-1220', 11, '', '', '', '2017-04-12', '', '', '12900', '0', 0, '0', '0', '12900', '12900', '0', '0.00', '1', 'Six Star Electronics & Furniture', '2017-04-12 04:02:30', NULL, NULL, 1),
(21, 'RC2017-04-1221', 11, '', '', '', '2017-04-12', '', '', '16000', '0', 0, '0', '0', '16000', '16000', '0', '0.00', '3', 'Six Star Electronics & Furniture', '2017-04-12 04:22:34', NULL, NULL, 1),
(22, 'WC2017-04-2422', 12, '', '', '', '2017-04-24', '', '', '8400', '0', 0, '0', '0', '8400', '8400', '0', '0.00', '2', 'Six Star Electronics ', '2017-04-24 12:39:02', NULL, NULL, 1),
(23, 'RC2017-04-2423', 1, '', '', '', '2017-04-24', '', '', '3600', '0', 0, '0', '0', '3600', '3600', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-24 12:52:47', NULL, NULL, 1),
(24, 'RC2017-04-2624', 1, '', '', '', '2017-04-26', '\n\n\n\n', '', '1500', '1', 0, '1', '0', '1500', '1500', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-26 09:49:25', NULL, NULL, 1),
(25, 'WC2017-04-2625', 11, '', '', '', '2017-04-26', '', '', '45000', '0', 0, '0', '0', '45000', '45000', '0', '0.00', '2', 'Six Star Electronics ', '2017-04-26 01:52:41', NULL, NULL, 1),
(26, 'RC2017-04-2626', 2, '', '', '', '2017-04-26', '', '', '11000', '0', 0, '0', '0', '11000', '11000', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-26 04:49:26', NULL, NULL, 1),
(27, 'RC2017-04-2727', 2, '', '', '', '2017-04-27', '', '', '400', '0', 0, '0', '0', '400', '400', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-27 01:02:27', NULL, NULL, 1),
(28, 'RC2017-04-2728', 3, '', '', '', '2017-04-27', '', '', '8600', '0', 0, '0', '0', '8600', '8600', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-27 01:10:29', NULL, NULL, 1),
(29, 'WC2017-04-2729', 3, '', '', '', '2017-04-27', '', '', '45000', '0', 0, '0', '0', '45000', '45000', '0', '0.00', '2', 'Six Star Electronics ', '2017-04-27 01:11:16', NULL, NULL, 1),
(30, 'RC2017-04-2730', 12, '', '', '', '2017-04-27', '', '', '13500', '0', 0, '0', '0', '13500', '13500', '0', '0.00', '3', 'Six Star Electronics ', '2017-04-27 03:11:51', NULL, NULL, 1),
(31, 'RC2017-04-2931', 11, '', '', '', '2017-04-29', '', '', '8600', '0', 0, '0', '0', '8600', '600', '8000', '0.00', '3', 'Six Star Electronics ', '2017-04-29 05:58:58', NULL, NULL, 1),
(32, 'RC2017-04-2932', 2, '', '', '', '2017-04-29', '', '', '8600', '0', 0, '0', '0', '8600', '1600', '7000', '0.00', '3', 'Six Star Electronics ', '2017-04-29 06:03:00', NULL, NULL, 1),
(33, 'RC2017-04-2933', 2, '', '', '', '2017-04-29', '', '', '1800', '0', 0, '0', '0', '1800', '300', '1500', '0.00', '3', 'Six Star Electronics ', '2017-04-29 06:25:47', NULL, NULL, 1),
(34, 'RC2017-04-2934', 14, '', '', '', '2017-04-29', '', '', '4300', '0', 0, '0', '0', '4300', '1300', '3000', '0.00', '1', 'Six Star Electronics ', '2017-04-29 04:28:53', NULL, NULL, 1),
(35, 'RC2017-04-2935', 13, '', '', '', '2017-04-29', '', '', '4300', '0', 0, '0', '0', '4300', '1300', '3000', '0.00', '3', 'Six Star Electronics ', '2017-04-29 06:29:40', NULL, NULL, 1),
(36, 'RC2017-04-2936', 18, '', '', '', '2017-04-29', '', '', '1500', '0', 0, '0', '0', '1500', '500', '1000', '0.00', '3', 'Six Star Electronics ', '2017-04-29 07:10:56', NULL, NULL, 1),
(37, 'RC2017-04-3037', 17, '', '', '', '2017-04-30', '', '', '1500', '0', 0, '0', '0', '1500', '1500', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-30 12:00:44', NULL, NULL, 1),
(38, 'WC2017-04-3038', 13, '', '', '', '2017-04-30', '', '', '1400', '0', 0, '0', '0', '1400', '1400', '0', '0.00', '2', 'Six Star Electronics ', '2017-04-30 12:04:41', NULL, NULL, 1),
(39, 'RC2017-04-3039', 2, '', '', '', '2017-04-30', '', '', '160000', '0', 0, '0', '0', '160000', '160000', '0', '0.00', '1', 'Six Star Electronics ', '2017-04-30 04:16:52', NULL, NULL, 1),
(40, 'RC2017-05-0740', 14, '', '', '', '2017-05-07', '', '', '38000', '0', 0, '0', '0', '38000', '3000', '35000', '0.00', '3', 'Six Star Electronics ', '2017-05-07 02:21:46', NULL, NULL, 1),
(41, 'WC2017-05-1041', 3, '', '', '', '2017-05-10', '', '', '98000', '0', 0, '0', '0', '98000', '0', '98000', '0.00', '2', 'Six Star Electronics ', '2017-05-10 01:16:19', NULL, NULL, 1),
(42, 'RC2017-05-2242', 1, '', '', '', '2017-05-22', '', '', '21500', '0', 0, '0', '0', '21500', '21500', '0', '0.00', '1', 'Six Star Electronics ', '2017-05-22 06:52:19', NULL, NULL, 1),
(43, 'RC2017-05-2543', 3, '', '', '', '2017-05-25', 'Test Sales', '', '43000', '1.5', 200, '2.5', '150', '43380', '33380', '10000', '0.00', '1', 'Six Star Electronics ', '2017-05-25 10:42:58', NULL, NULL, 1),
(44, 'WC2017-05-2944', 14, '', '', '', '2017-05-29', 'Test reward discount', '', '145000', '1.5', 5000, '2.5', '1000', '142450', '132450', '10000', '0.00', '2', 'Six Star Electronics ', '2017-05-29 10:49:07', NULL, NULL, 1),
(45, 'RC2017-06-0845', 0, 'Lokman', '01712314259', 'Mirpur, Dhaka', '2017-06-08', 'Test', '', '43000', '2', 200, '2.5', '500', '43515', '33515', '10000', '0.00', '1', 'Six Star Electronics ', '2017-06-08 12:23:39', NULL, NULL, 1),
(46, 'RC2017-06-1446', 1, '', '', '', '2017-06-14', 'rttrtr', '', '4300', '0', 0, '0', '0', '4300', '4300', '0', '0.00', '1', 'Six Star Electronics ', '2017-06-14 09:20:08', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
`Supplier_SlNo` int(11) NOT NULL,
  `Supplier_Code` varchar(50) NOT NULL,
  `Supplier_Name` varchar(150) NOT NULL,
  `Supplier_Type` varchar(50) NOT NULL,
  `Supplier_Phone` varchar(50) NOT NULL,
  `Supplier_Mobile` varchar(15) NOT NULL,
  `Supplier_Email` varchar(50) NOT NULL,
  `Supplier_OfficePhone` varchar(50) NOT NULL,
  `Supplier_Address` varchar(300) NOT NULL,
  `District_SlNo` int(11) NOT NULL,
  `Country_SlNo` int(11) NOT NULL,
  `Supplier_Web` varchar(150) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `Supplier_brinchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`Supplier_SlNo`, `Supplier_Code`, `Supplier_Name`, `Supplier_Type`, `Supplier_Phone`, `Supplier_Mobile`, `Supplier_Email`, `Supplier_OfficePhone`, `Supplier_Address`, `District_SlNo`, `Country_SlNo`, `Supplier_Web`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Supplier_brinchid`) VALUES
(1, 'S1001', 'Jara Electronic', 'Local', '', '01726173198', '', '', 'Dhaka', 3, 6, '', '', 'Ashiqe ', '2016-04-10 07:08:04', NULL, NULL, 1),
(2, 'S1002', 'Asha Enterprise', 'undefined', '', '01756498677', '', '', 'Dhakaজগত\nজামিল\nততকক', 3, 6, '', '', 'Ashiqe ', '2016-04-19 02:40:24', 'Six Star Electronics & Furniture', '2017-03-14 03:06:47', 1),
(3, 'S1003', 'Amin Fashion', 'Local', '', '01254987954', '', '', 'Dhaka 1000', 3, 6, '', '', 'shahbag', '2016-04-20 04:45:44', NULL, NULL, 2),
(4, 'S1004', 'রবিউল ইসলাম', 'undefined', '', '21478', '', '', 'ঢাকা', 3, 6, '', '', 'Six Star Electronics & Furniture', '2017-04-12 03:03:38', NULL, NULL, 1),
(5, 'S1005', 'ওসমান উল্লাহ', 'undefined', '', '785', '', '', 'আশুলিয়া', 2, 6, '', '', 'Six Star Electronics & Furniture', '2017-04-12 03:05:01', NULL, NULL, 1),
(6, 'S1006', 'Polas Eletronics', 'undefined', '', '01713174400', '', ' ', 'Baipail, Ashulia\n', 3, 6, '', '', 'Six Star Electronics ', '2017-04-30 12:36:44', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier_payment` (
`SPayment_id` int(11) NOT NULL,
  `SPayment_date` date NOT NULL,
  `SPayment_invoice` varchar(20) CHARACTER SET utf8 NOT NULL,
  `SPayment_customerID` varchar(20) CHARACTER SET utf8 NOT NULL,
  `SPayment_amount` varchar(20) CHARACTER SET utf8 NOT NULL,
  `SPayment_Paymentby` varchar(20) CHARACTER SET utf8 NOT NULL,
  `SPayment_notes` varchar(225) CHARACTER SET utf8 NOT NULL,
  `SPayment_brunchid` int(11) NOT NULL,
  `SPayment_Addby` varchar(100) CHARACTER SET ucs2 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier_payment`
--

INSERT INTO `tbl_supplier_payment` (`SPayment_id`, `SPayment_date`, `SPayment_invoice`, `SPayment_customerID`, `SPayment_amount`, `SPayment_Paymentby`, `SPayment_notes`, `SPayment_brunchid`, `SPayment_Addby`) VALUES
(1, '2017-03-06', '2017-03-60002', '2', '342000', '', '', 1, 'Six Star Electronics & Furniture'),
(2, '2017-03-09', '2017-03-60003', '1', '500000', '', 'sfdsdf', 1, 'Six Star Electronics & Furniture'),
(3, '2017-03-15', '2017-03-60004', '1', '271200', '', '', 1, 'Six Star Electronics & Furniture'),
(4, '2017-03-15', '2017-03-60005', '2', '15000', '', '', 1, 'Six Star Electronics & Furniture'),
(5, '2017-04-12', '2017-04-60006', '4', '19200', '', '', 1, 'Six Star Electronics & Furniture'),
(6, '2017-04-12', '2017-04-60007', '4', '8000', '', '', 1, 'Six Star Electronics & Furniture'),
(7, '2017-04-12', '2017-04-60007', '4', '8000', '', '', 1, 'Six Star Electronics & Furniture'),
(8, '2017-04-12', '2017-04-60008', '1', '48000', '', '', 1, 'Six Star Electronics & Furniture'),
(9, '2017-04-24', '2017-04-60009', '2', '20000', '', '', 1, 'Six Star Electronics '),
(10, '2017-04-24', '2017-04-60010', '1', '260000', '', '', 1, 'Six Star Electronics '),
(11, '2017-04-25', '2017-04-60011', '5', '3600', '', '', 1, 'Six Star Electronics '),
(12, '2017-04-25', '2017-04-60012', '3', '75000', '', '', 1, 'Six Star Electronics '),
(13, '2017-04-26', '2017-04-60013', '1', '8000', '', '', 1, 'Six Star Electronics '),
(14, '2017-04-27', '2017-04-60014', '2', '5000', '', '', 1, 'Six Star Electronics '),
(15, '2017-04-27', '2017-04-60015', '3', '253750', '', '', 1, 'Six Star Electronics '),
(16, '2017-04-29', '2017-04-60016', '2', '28000', '', '', 1, 'Six Star Electronics '),
(17, '2017-04-30', '2017-04-60017', '1', '5000', '', '', 1, 'Six Star Electronics '),
(18, '2017-04-30', '2017-04-60018', '2', '20000', '', '', 1, 'Six Star Electronics '),
(19, '2017-04-30', '2017-04-60019', '1', '1212700', '', '', 1, 'Six Star Electronics '),
(20, '2017-05-07', '2017-05-60020', '6', '168000', '', '', 1, 'Six Star Electronics '),
(21, '2017-05-09', '2017-05-60021', '3', '50000', '', '', 1, 'Six Star Electronics '),
(22, '2017-05-09', '2017-05-60022', '3', '15000', '', '', 1, 'Six Star Electronics '),
(23, '2017-05-10', '2017-05-60023', '2', '86000', '', '', 1, 'Six Star Electronics '),
(24, '2017-05-10', '2017-05-60024', '2', '168000', '', '', 1, 'Six Star Electronics '),
(25, '2017-05-10', '2017-05-60025', '3', '32000', '', '', 1, 'Six Star Electronics '),
(26, '2017-05-29', '2017-05-60026', '1', '101600', '', 'rerererere', 1, 'Six Star Electronics '),
(27, '2017-06-01', '2017-06-60027', '2', '144500', '', '', 1, 'Six Star Electronics ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfer`
--

CREATE TABLE IF NOT EXISTS `tbl_transfer` (
`trans_id` int(11) NOT NULL,
  `tobranch_id` int(11) NOT NULL,
  `from_branch` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pro_codes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `trans_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_unit` (
`Unit_SlNo` int(11) NOT NULL,
  `Unit_Name` varchar(150) NOT NULL,
  `Status` char(1) NOT NULL,
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`Unit_SlNo`, `Unit_Name`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`) VALUES
(2, 'Kg', 'A', NULL, NULL, 'Ashiqe ', '2016-04-09 08:57:25'),
(3, 'pcs', '', 'Ashiqe ', '2016-04-10 12:08:24', NULL, NULL),
(4, 'set', '', 'Ashiqe ', '2016-04-10 09:06:29', NULL, NULL),
(5, 'Kg1', '', 'Bell Bangladesh', '2016-04-29 04:45:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`User_SlNo` int(11) NOT NULL,
  `User_ID` varchar(50) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `User_Name` varchar(150) NOT NULL,
  `userBrunch_id` int(11) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'a',
  `AddBy` varchar(50) DEFAULT NULL,
  `AddTime` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `Brunch_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_SlNo`, `User_ID`, `FullName`, `User_Name`, `userBrunch_id`, `User_Password`, `UserType`, `Status`, `AddBy`, `AddTime`, `UpdateBy`, `UpdateTime`, `Brunch_ID`) VALUES
(2, '', 'Six Star Electronics ', 'admin', 1, '21232f297a57a5a743894a0e4a801fc3', 'a', 'a', NULL, '2017-04-20 17:40:32', NULL, NULL, 0),
(3, '', 'Test User', 'test', 1, '098f6bcd4621d373cade4e832627b4f6', 'a', 'a', NULL, '2017-05-25 21:24:29', NULL, NULL, 0),
(4, '', 'ABC', 'abc', 1, '900150983cd24fb0d6963f7d28e17f72', 'a', 'a', NULL, '2017-05-25 21:24:59', NULL, NULL, 0),
(5, '', 'XYZ', 'xyz', 1, '202cb962ac59075b964b07152d234b70', 'a', 'a', NULL, '2017-05-25 21:26:19', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
 ADD PRIMARY KEY (`Acc_SlNo`);

--
-- Indexes for table `tbl_branchwise_product`
--
ALTER TABLE `tbl_branchwise_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brunch`
--
ALTER TABLE `tbl_brunch`
 ADD PRIMARY KEY (`brunch_id`);

--
-- Indexes for table `tbl_cashregister`
--
ALTER TABLE `tbl_cashregister`
 ADD PRIMARY KEY (`Transaction_ID`);

--
-- Indexes for table `tbl_cashtransaction`
--
ALTER TABLE `tbl_cashtransaction`
 ADD PRIMARY KEY (`Tr_SlNo`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
 ADD PRIMARY KEY (`Company_SlNo`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
 ADD PRIMARY KEY (`Country_SlNo`);

--
-- Indexes for table `tbl_currentinventory`
--
ALTER TABLE `tbl_currentinventory`
 ADD PRIMARY KEY (`CurrentInventory_SlNo`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`Customer_SlNo`);

--
-- Indexes for table `tbl_customer_payment`
--
ALTER TABLE `tbl_customer_payment`
 ADD PRIMARY KEY (`CPayment_id`);

--
-- Indexes for table `tbl_damage`
--
ALTER TABLE `tbl_damage`
 ADD PRIMARY KEY (`Damage_SlNo`);

--
-- Indexes for table `tbl_damagedetails`
--
ALTER TABLE `tbl_damagedetails`
 ADD PRIMARY KEY (`DamageDetails_SlNo`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
 ADD PRIMARY KEY (`Department_SlNo`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
 ADD PRIMARY KEY (`Designation_SlNo`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
 ADD PRIMARY KEY (`District_SlNo`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
 ADD PRIMARY KEY (`Employee_SlNo`);

--
-- Indexes for table `tbl_installment`
--
ALTER TABLE `tbl_installment`
 ADD PRIMARY KEY (`inspayid`);

--
-- Indexes for table `tbl_installment_date`
--
ALTER TABLE `tbl_installment_date`
 ADD PRIMARY KEY (`insid`);

--
-- Indexes for table `tbl_menuaccess`
--
ALTER TABLE `tbl_menuaccess`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
 ADD PRIMARY KEY (`package_ID`);

--
-- Indexes for table `tbl_package_create`
--
ALTER TABLE `tbl_package_create`
 ADD PRIMARY KEY (`create_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`Product_SlNo`);

--
-- Indexes for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
 ADD PRIMARY KEY (`ProductCategory_SlNo`);

--
-- Indexes for table `tbl_produsize`
--
ALTER TABLE `tbl_produsize`
 ADD PRIMARY KEY (`Productsize_SlNo`);

--
-- Indexes for table `tbl_purchasedetails`
--
ALTER TABLE `tbl_purchasedetails`
 ADD PRIMARY KEY (`PurchaseDetails_SlNo`);

--
-- Indexes for table `tbl_purchaseinventory`
--
ALTER TABLE `tbl_purchaseinventory`
 ADD PRIMARY KEY (`PurchaseInventory_SlNo`);

--
-- Indexes for table `tbl_purchasemaster`
--
ALTER TABLE `tbl_purchasemaster`
 ADD PRIMARY KEY (`PurchaseMaster_SlNo`);

--
-- Indexes for table `tbl_purchasereturn`
--
ALTER TABLE `tbl_purchasereturn`
 ADD PRIMARY KEY (`PurchaseReturn_SlNo`);

--
-- Indexes for table `tbl_purchasereturndetails`
--
ALTER TABLE `tbl_purchasereturndetails`
 ADD PRIMARY KEY (`PurchaseReturnDetails_SlNo`);

--
-- Indexes for table `tbl_saledetails`
--
ALTER TABLE `tbl_saledetails`
 ADD PRIMARY KEY (`SaleDetails_SlNo`);

--
-- Indexes for table `tbl_saleinventory`
--
ALTER TABLE `tbl_saleinventory`
 ADD PRIMARY KEY (`SaleInventory_SlNo`);

--
-- Indexes for table `tbl_salereturn`
--
ALTER TABLE `tbl_salereturn`
 ADD PRIMARY KEY (`SaleReturn_SlNo`);

--
-- Indexes for table `tbl_salereturndetails`
--
ALTER TABLE `tbl_salereturndetails`
 ADD PRIMARY KEY (`SaleReturnDetails_SlNo`);

--
-- Indexes for table `tbl_salesmaster`
--
ALTER TABLE `tbl_salesmaster`
 ADD PRIMARY KEY (`SaleMaster_SlNo`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
 ADD PRIMARY KEY (`Supplier_SlNo`);

--
-- Indexes for table `tbl_supplier_payment`
--
ALTER TABLE `tbl_supplier_payment`
 ADD PRIMARY KEY (`SPayment_id`);

--
-- Indexes for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
 ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
 ADD PRIMARY KEY (`Unit_SlNo`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`User_SlNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
MODIFY `Acc_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_branchwise_product`
--
ALTER TABLE `tbl_branchwise_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_brunch`
--
ALTER TABLE `tbl_brunch`
MODIFY `brunch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_cashregister`
--
ALTER TABLE `tbl_cashregister`
MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cashtransaction`
--
ALTER TABLE `tbl_cashtransaction`
MODIFY `Tr_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
MODIFY `Company_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
MODIFY `Country_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_currentinventory`
--
ALTER TABLE `tbl_currentinventory`
MODIFY `CurrentInventory_SlNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `Customer_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_customer_payment`
--
ALTER TABLE `tbl_customer_payment`
MODIFY `CPayment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_damage`
--
ALTER TABLE `tbl_damage`
MODIFY `Damage_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_damagedetails`
--
ALTER TABLE `tbl_damagedetails`
MODIFY `DamageDetails_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
MODIFY `Department_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
MODIFY `Designation_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
MODIFY `District_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
MODIFY `Employee_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_installment`
--
ALTER TABLE `tbl_installment`
MODIFY `inspayid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_installment_date`
--
ALTER TABLE `tbl_installment_date`
MODIFY `insid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_menuaccess`
--
ALTER TABLE `tbl_menuaccess`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1 = Active, 2Deactive',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
MODIFY `package_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_package_create`
--
ALTER TABLE `tbl_package_create`
MODIFY `create_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `Product_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
MODIFY `ProductCategory_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_produsize`
--
ALTER TABLE `tbl_produsize`
MODIFY `Productsize_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_purchasedetails`
--
ALTER TABLE `tbl_purchasedetails`
MODIFY `PurchaseDetails_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_purchaseinventory`
--
ALTER TABLE `tbl_purchaseinventory`
MODIFY `PurchaseInventory_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_purchasemaster`
--
ALTER TABLE `tbl_purchasemaster`
MODIFY `PurchaseMaster_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_purchasereturn`
--
ALTER TABLE `tbl_purchasereturn`
MODIFY `PurchaseReturn_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_purchasereturndetails`
--
ALTER TABLE `tbl_purchasereturndetails`
MODIFY `PurchaseReturnDetails_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_saledetails`
--
ALTER TABLE `tbl_saledetails`
MODIFY `SaleDetails_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_saleinventory`
--
ALTER TABLE `tbl_saleinventory`
MODIFY `SaleInventory_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_salereturn`
--
ALTER TABLE `tbl_salereturn`
MODIFY `SaleReturn_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_salereturndetails`
--
ALTER TABLE `tbl_salereturndetails`
MODIFY `SaleReturnDetails_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_salesmaster`
--
ALTER TABLE `tbl_salesmaster`
MODIFY `SaleMaster_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
MODIFY `Supplier_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_supplier_payment`
--
ALTER TABLE `tbl_supplier_payment`
MODIFY `SPayment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
MODIFY `Unit_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `User_SlNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
