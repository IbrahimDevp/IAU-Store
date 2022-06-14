-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 01:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iau_phone_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'admin', '$2y$10$MH84OUWq3btSXuMHgFGBXesTMtaiR1jfvzugczwkGN0SA6ZOUHrki'),
(2, 'upenas1', '$2y$10$tJMFCIq9rk6G4sUA9kG6keHr//XNiO0iIJzWKNh1AJ88P1ehVOr5S'),
(3, 'dgabbidon2', '$2y$10$nJi6bGp4hibfdhOFgHAsPOHQyzushqHl5dQEfC3jauGvnTAGNXyuS'),
(4, 'ogogerty3', '$2y$10$AcCoDkAw20KWMbMt2Y2MUu4zPHiOKOzTtXHeGR/b430RchJNuMfDW'),
(5, 'jcrysell4', '$2y$10$cLw2WJv2gNkWn7QMUYRyteyOIXweuou.C.a7MVavM2HHfYxeCj3nO'),
(6, 'srickword5', '$2y$10$QYtef2yX1MOujQlkHIgOmObaI977/Yl7NQAXHO/Szl6YUiYt4J.Im'),
(7, 'gdaber6', '$2y$10$NFU5CS1IIb3fTal.ebHqju8Ch0GfY93i/x3HsFOLr/e0E8hO7XJry'),
(8, 'fren7', '$2y$10$E49hkid00kAChwY5htUlJeAkP75xaBSdzhLeF8buUh0Do.zZ5Uf9S'),
(9, 'ztainton8', '$2y$10$e22rafemZz/HjEa1WOIzXOmVZbuA6ZfFJG2Wxa4PpI/rbq/amQjtm'),
(10, 'tkarlqvist9', '$2y$10$zv0kQ4Dd/m4ExlHVZInmJu1rD28cHak5ZiPKFhlqu0tyh3hlEoyGq'),
(11, 'mrestona', '$2y$10$6LBgnL4XFYs3p9xoBS99FOVi1iu1kWcfWEIbKPNySg36Q67wuHoBW'),
(12, 'ejonuzib', '$2y$10$WFkXq/.nzcdR7DuVSPRPNOGpzWrSbnghIOityJJeAK9SqQS9Yl906'),
(13, 'kmcquaidec', '$2y$10$FBTvlb0bQR6sTwcDT2KdWevkFWkKJvQ7z.DET4qWvzC64e8sBlzlO'),
(14, 'cvalekd', '$2y$10$Kf/qQAXf.JV4.4nt9Bzlx.c4gR/62I77S/c9e1yttJjsYZFFwWcVW'),
(15, 'mbontofte', '$2y$10$.NQBpooDFwom0.XOE7yVaex94jdCQdUCPNF3da1qAdsIiXL9O0y4.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Product_Name` varchar(40) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Customer_ID`, `Product_Name`, `Product_Price`, `Quantity`) VALUES
(634, 3, 'Apple AirPods 3rd Gen', 649, 1),
(635, 3, 'Apple AirPods 3rd Gen', 649, 1),
(636, 3, 'iPhone XR Case', 69, 1),
(637, 3, 'iPhone 12 pro Max', 4000, 1),
(638, 3, 'iPhone 11', 2999, 1),
(642, 5, 'iPhone 13 Pro Max', 6599, 1),
(643, 5, 'iPhone 13 Pro Max', 6599, 3),
(644, 5, 'iPhone XR Case', 69, 1),
(645, 7, 'Apple AirPods 3rd Gen', 649, 1),
(646, 7, 'iPhone 13 Pro Max', 6599, 1),
(647, 7, 'iPhone XR Case', 69, 1),
(648, 7, 'iPhone XR Case', 69, 4),
(649, 14, 'iPhone 12 pro Max', 4000, 1),
(650, 14, 'iPhone 13 Case', 149, 5),
(651, 14, 'iPhone XR Case', 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Full_Name` varchar(40) NOT NULL,
  `DOB` date NOT NULL,
  `PhoneNum` varchar(10) NOT NULL,
  `Gender` char(6) NOT NULL,
  `Payment_info` varchar(40) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `CartCustomer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Username`, `Password`, `Email`, `Full_Name`, `DOB`, `PhoneNum`, `Gender`, `Payment_info`, `Street`, `City`, `Country`, `CartCustomer_ID`) VALUES
(1, 'ikema', '$2y$10$UH0etm8go7OAaCrSunxQFecevlmcchoSg1nTZSyCqRS3MqUwpCuMq', 'example1@gmail.com', 'Hussam', '2001-01-17', '0555555123', 'Male', 'Mastercard', 'King Saud Street', 'Dammam', 'Saudi Arabia', 0),
(2, 'lhallows0', '$2y$10$DjjgLW2mDBzECdtvC3eNh./1VnzCBxdFjqhrAK97RsIXRt3DF8o5O', 'example2@gmail.com', 'Lindsy Hallows', '1966-04-30', '0537702882', 'F', 'AMERICAN EXPRESS', 'Center', 'North Perth', 'Canada', 1),
(3, 'mcregan1', '$2y$10$/UI7hoZ1c0Y6iG6bcfNPiuDjyQo7auncXCmMhW9TM9SUW3NMgk83u', 'example3@gmail.com', 'Murvyn Cregan', '1963-01-20', '5244673349', 'M', 'mastercard', 'Basil', 'Napierville', 'Canada', 2),
(4, 'mogley2', '$2y$10$/46jbLPusIHsaVFTlNzgo./AisraLTmQqi4AfTjUMat52ynZ4IeKy', 'example4@gmail.com', 'Morgan Ogley', '1994-01-31', '5747847042', 'M', 'mastercard', 'Cardinal', 'Beaverlodge', 'Canada', 3),
(5, 'rsuffield3', '$2y$10$IDiaMOZAzG7CjMBPWU4LSOhyoG3IZ3U2xqLUsbF52V.AqECUiJ2Ky', 'example5@gmail.com', 'Roxanna Suffield', '1981-02-27', '8605077355', 'F', 'americanexpress', 'Arkansas', 'Hartford', 'United States', 4),
(6, 'mwinch4', '$2y$10$tgXA2EImpOm0BE1tojmGc.b64anOruM1kzkZI0pZq6a7N7QwpzMb2', 'example6@gmail.com', 'Marie-ann Winch', '1975-01-19', '7038283554', 'F', 'mastercard', 'Chive', 'Arlington', 'United States', 5),
(7, 'bperree5', '$2y$10$G5XBbpnRl4M8BQdFZT3vneIqzorpIzCgNOG/XkH3sGKSX1jxf.QU.', 'example7@gmail.com', 'Burt Perree', '1977-07-16', '6516308907', 'M', 'visa', 'Sunnyside', 'Saint Paul', 'United States', 6),
(8, 'tcapstake6', '$2y$10$wRuUrVA6sXsM.hFbuJJbHuSjUfdtjTomKDrR5yz.kX3PKiHn1DJjC', 'example8@gmail.com', 'Tiebold Capstake', '1970-09-03', '9041368619', 'M', 'mastercard', 'Paget', 'Jacksonville', 'United States', 7),
(9, 'mbarensen7', '$2y$10$FmepGn4cszxZYMI28jiC0uksX15eM46F6iI.uL9f1/0fjfsbSF.Eq', 'example9@gmail.com', 'Maurise Barensen', '1950-09-30', '5138600031', 'M', 'americanexpress', 'Novick', 'Cincinnati', 'United States', 8),
(10, 'lrudeforth8', '$2y$10$GEEMYPXvgl0.cPIKCmv/m.qJpQFVkkue4bGXlI0TMp6qVVfmOM0py', 'example10@gmail.com', 'Leigh Rudeforth', '1953-02-05', '9481664989', 'M', 'visa', 'Upham', 'Nackawic', 'Canada', 9),
(11, 'gcleynaert9', '$2y$10$6JEI1V2qZwbSxnyNIoLN/.aZgoL08qaLNdqEa9qmHXyQt7Kt5emA2', 'example11@gmail.com', 'Gerrilee Cleynaert', '1986-12-04', '4109366975', 'F', 'mastercard', 'Algoma', 'Baltimore', 'United States', 10),
(12, 'cstockena', '$2y$10$oMdL0K2Juj5OywrCCuEfnu5Hs0jFRjTdsnroyNI0iPtx2RGUzKOxm', 'example12@gmail.com', 'Codie Stocken', '1998-10-17', '9722444688', 'M', 'bankcard', 'Fairview', 'Garland', 'United States', 11),
(13, 'clenoirb', '$2y$10$e9CJCT8qM2XmOOXHIHJUYOdnH0U0q0XKffbICQZm/ySy4isIvrYdK', 'example13@gmail.com', 'Claudius Lenoir', '1952-01-29', '7389778899', 'M', 'mastercard', 'Pawling', 'Sydney', 'Australia', 12),
(14, 'drichiec', '$2y$10$F9qStSTr8OvGO.p5gfzMrOu/OvOpEmgWi1pBIOmL5BfumOhfMU0/.', 'example14@gmail.com', 'Datha Richie', '1953-08-21', '4782672378', 'F', 'visa', 'Monica', 'Macon', 'United States', 13),
(15, 'lbrimmd', '$2y$10$/GsEnclUyMCYy.cYoQpjH.uSPPpEDHf/neZRS3inx3b29lrfguwXm', 'example15@gmail.com', 'Linda Brimm', '1983-01-18', '8128064798', 'F', 'bankcard', 'Forest Run', 'Evansville', 'United States', 14),
(16, 'bkenneae', '$2y$10$8OzMjLr05xF32LeFJAlC/OAxNGvDEBTMycz84I4Yv2mof7cRnU4k.', 'example16@gmail.com', 'Billi Kennea', '1977-02-09', '9159516717', 'F', 'visa', 'Ohio', 'El Paso', 'United States', 15),
(17, 'csmoutf', '$2y$10$2kzhQ5ufbxMdjIjcC3ueG.FxXKGL1GOc91jSV0.BQkDqsI2ZUfFbq', 'example17@gmail.com', 'Clevie Smout', '1955-03-06', '4092315613', 'M', 'mastercard', 'Beilfuss', 'Beaumont', 'United States', 16),
(18, 'eferrieriog', '$2y$10$9MZnmGjXYxmPOM928DJQTu0oInGmBfXigik5fHR1m1PyKxiHy8e.i', 'example18@gmail.com', 'Edmund Ferrierio', '1953-12-13', '2023429026', 'M', 'mastercard', 'Sachs', 'Washington', 'United States', 17),
(19, 'hharrildh', '$2y$10$XuOgFx89X9.8B6JTLIalCuEEKyV1OQQgntgslQx0shuWi0BqNXdxi', 'example19@gmail.com', 'Hal Harrild', '1995-09-06', '7197876099', 'M', 'bankcard', 'Summerview', 'Colorado Springs', 'United States', 18),
(20, 'gchatwini', '$2y$10$BuX5dU1v48qV5F5HHOn3EOZX5bBTOaXWtXPMiHMc0xZFcV4QThRDu', 'example20@gmail.com', 'Gregor Chatwin', '1964-03-26', '9158850634', 'M', 'americanexpress', 'Portage', 'El Paso', 'United States', 19),
(102, 'ikema214', '$2y$10$V65omKLJpDfu1Exod3wAU.5x/vG5OvkJPkEbwdlNcoi1V6hBMpeg.', 'ikema@outlook.comasdf', 'asdfassadf', '2022-05-06', '0555555555', 'Female', '2134124', 'asdfasdf', 'asdf', 'Australia', 0),
(103, 'hi', '$2y$10$FJgaZMXxuSQubGY19On2..IVTPXYN1jKXbeXgFn6lAK6mQY2f0mkO', 'helo@gmail.com', 'ihi', '2022-05-06', '0555555555', 'Male', 'asdfsadf', 'asdfsadf', 'asdfsad', 'Bahamas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_ID` int(11) NOT NULL,
  `Invoice_Date` date NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Product_Name` longtext NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Payment_Info` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_ID`, `Invoice_Date`, `Customer_ID`, `Product_Name`, `Product_Price`, `Payment_Info`) VALUES
(1, '2021-11-07', 15, 'iPhone 13 Max', 4800, 'visa'),
(3, '2022-01-30', 9, 'Apple Airpods', 899, 'visa'),
(6, '2021-04-22', 18, 'iPhone 13', 3500, 'bankcard'),
(9, '2021-12-25', 13, 'iPhone 13 Case', 149, 'americanexpress'),
(20, '2021-06-04', 7, 'Huawei Nova 9', 1599, 'americanexpress'),
(21, '2022-04-29', 1, '1 x iPhone SE 2020, 1 x iPhone 11, 0 x i', 1434045, 'mastercard'),
(22, '2022-04-29', 1, '2 x Apple Airpods, 2 x iPhone 11', 7196, 'AMERICAN EXPRESS'),
(23, '2022-04-29', 1, '5 x iPhone 11, 10 x iPhone 11', 46485, 'VISA'),
(24, '2022-04-29', 1, '7 x iPhone 11', 21693, 'mada'),
(25, '2022-04-29', 1, '4 x iPhone SE 2020, 3 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 4 x iPhone SE 2020, 3 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020', 41580, 'VISA'),
(26, '2022-05-15', 1, '1 x Xiaomi Note 10, 5 x Huawei P30 Pro', 12294, 'VISA'),
(27, '2022-05-15', 1, '1 x iPhone 11', 3099, 'VISA'),
(28, '2022-05-15', 1, '4 x iPhone 13', 14000, 'VISA'),
(29, '2022-05-15', 1, '3 x iPhone XR Case', 237, 'VISA'),
(30, '2022-05-15', 1, '3 x iPhone SE 2020', 5940, 'VISA'),
(31, '2022-05-15', 1, '4 x iPhone SE 2020', 7920, 'VISA'),
(32, '2022-05-15', 1, '5 x iPhone SE 2020', 9900, 'AMERICAN EXPRESS'),
(33, '2022-05-15', 1, '1 x Galaxy Note 20, 1 x Galaxy Note 20, 1 x Galaxy Note 20', 8100, 'AMERICAN EXPRESS'),
(34, '2022-05-15', 1, '1 x iPhone 11, 1 x iPhone 11, 1 x Huawei P30 Pro', 8497, 'VISA'),
(35, '2022-05-15', 1, '1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone 11, 1 x iPhone 11, 1 x iPhone 11, 1 x Huawei P30 Pro, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone 11, 1 x iPhone 11, 1 x iPhone 11, 1 x Galaxy A72, 1 x Galaxy A72, 1 x Galaxy A72, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x iPhone XR Case, 1 x Huawei P30 Pro, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x Huawei P30 Pro, 1 x Huawei P30 Pro, 1 x Huawei P30 Pro, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone 11, 7 x iPhone XR Case, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 5 x iPhone 14 Max, 5 x iPhone XR Case, 1 x Huawei Nova 9, 1 x Galaxy A72, 4 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 1 x iPhone SE 2020, 5 x iPhone SE 2020, 5 x Galaxy Note 20, 5 x Galaxy Note 20, 5 x Galaxy Note 20, 5 x Galaxy Note 20, 1 x iPhone 11', 300997, 'VISA'),
(36, '2022-05-15', 1, '1 x iPhone 13', 3500, 'VISA'),
(37, '2022-05-15', 1, '6 x Apple Watch, 1 x iPhone 11', 6099, 'AMERICAN EXPRESS'),
(38, '2022-05-15', 1, '1 x Apple Airpods 3, 6 x iPhone 11, 3 x iPhone 11, 1 x iPhone 11, 1 x Huawei P30 Pro, 1 x Xiaomi Note 10, 6 x iPhone XR Case, 4 x Apple Watch', 40177, 'AMERICAN EXPRESS'),
(39, '2022-05-15', 1, '1 x iPhone 13, 1 x iPhone 13, 1 x iPhone 13, 1 x iPhone 13, 5 x lets try, 6 x Apple Airpods, 6 x iPhone XR Case', -4386, 'mada'),
(40, '2022-05-15', 1, '6 x iPhone 13', 22200, 'VISA'),
(41, '2022-05-15', 1, '6 x lets try', 2604, 'VISA'),
(42, '2022-05-15', 1, '5 x Galaxy A72, 4 x Apple Watch', 9495, 'mastercard'),
(43, '2022-05-15', 1, '6 x iPhone 11', 18594, 'VISA'),
(44, '2022-05-16', 1, '5 x iPhone SE 2020, 3 x iPhone 13 Case', 10347, 'VISA'),
(45, '2022-05-16', 1, '4 x iPhone 13', 11600, 'VISA'),
(46, '2022-05-16', 1, '10 x iPhone 13, 4 x iPhone 13, 6 x iPhone 13', 64200, 'VISA'),
(47, '2022-05-16', 1, '5 x Apple Airpods, 4 x iPhone SE 2020, 10 x Huawei P30 Pro, 1 x iPhone 11, 1 x iPhone XR Case, 8 x iPhone XR Case', 19195, 'VISA'),
(48, '2022-05-17', 1, '4 x iPhone SE 2030', 7920, 'mada'),
(49, '2022-05-17', 1, '1 x iPhone SE 2030', 1980, 'VISA'),
(50, '2022-05-17', 1, '7 x iPhone 11', 21693, 'AMERICAN EXPRESS'),
(51, '2022-05-17', 1, '4 x iPhone XR Case, 1 x Apple Airpods 3', 9311, 'AMERICAN EXPRESS'),
(52, '2022-05-18', 103, '1 x iPhone 13 Case', 149, 'AMERICAN EXPRESS'),
(53, '2022-05-18', 1, '4 x Apple Watch', 6796, 'AMERICAN EXPRESS'),
(54, '2022-05-18', 1, '1 x iPhone 12 pro Max', 4000, 'VISA'),
(55, '2022-05-18', 2, '3 x iPhone 13 Case, 1 x Apple AirPods 3rd Gen, 1 x Apple AirPods 3rd Gen, 1 x Huawei P30 Pro, 1 x iPhone 12 pro Max', 8044, 'AMERICAN EXPRESS'),
(56, '2022-05-18', 3, '1 x Apple Watch, 1 x Huawei P30 Pro, 1 x iPhone 13', 7698, 'VISA'),
(57, '2022-05-18', 1, '1 x iPhone 13 Pro Max, 1 x Apple AirPods 3rd Gen, 1 x iPhone XR Case, 3 x iPhone 13, 1 x Apple AirPods 3rd Gen, 1 x Apple AirPods 3rd Gen', 17015, 'AMERICAN EXPRESS'),
(58, '2022-05-18', 1, '1 x Apple AirPods 3rd Gen', 649, 'VISA');

-- --------------------------------------------------------

--
-- Table structure for table `maintains`
--

CREATE TABLE `maintains` (
  `Product_ID` int(11) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintains`
--

INSERT INTO `maintains` (`Product_ID`, `Admin_ID`, `ID`) VALUES
(1, 14, 2),
(2, 15, 3),
(2, 2, 4),
(4, 6, 6),
(5, 4, 7),
(6, 4, 11),
(7, 11, 12),
(8, 3, 14),
(9, 13, 15),
(10, 11, 16),
(11, 11, 17),
(12, 8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(40) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Special` tinyint(1) NOT NULL DEFAULT 0,
  `Category` varchar(40) NOT NULL,
  `Size` varchar(40) NOT NULL,
  `Color` varchar(40) NOT NULL,
  `Capacity` varchar(40) DEFAULT NULL,
  `RAM` varchar(40) DEFAULT NULL,
  `Product_Manuf` varchar(40) NOT NULL,
  `Product_Model` varchar(40) NOT NULL,
  `Description` longtext DEFAULT NULL,
  `img` varchar(120) NOT NULL,
  `Release_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Price`, `Discount`, `Quantity`, `Special`, `Category`, `Size`, `Color`, `Capacity`, `RAM`, `Product_Manuf`, `Product_Model`, `Description`, `img`, `Release_Date`) VALUES
(1, 'iPhone 13 Pro Max', 6699, 100, 0, 0, 'Smartphones', 'Medium', 'Sierra Blue', '512', '8', 'Apple', 'MR4411', 'The new AirPods are an incremental upgrade to an already excellent, fully wireless headphone, but sound quality, design and fit are basically the same.', 'images/products/178010.png', '2021-09-15'),
(2, 'Apple AirPods 3rd Gen', 849, 200, 4, 0, 'Headphones', 'Small', 'White', '', '', 'Apple', 'MR6576', 'The third-generation AirPods provide notably better bass depth and are more rugged than their predecessor. Despite some improvements to how they fit and some neat sensor tricks, we still are not wild about their open earbud design.', 'images/products/111597.png', '2021-07-10'),
(3, 'iPhone SE 3rd Gen', 2299, 0, 0, 1, 'Smartphones', 'Small', 'Black', '128GB', '4GB', 'Apple', 'MR4533', 'The new Apple iPhone SE is indeed one of the most compact smartphones not only within the iPhone ranks but among the Android phones as well. It is thin and lightweight, yet powerful and dependable, with great speakers and a high-quality screen, and impresses with camera performance even if it misses.', 'images/products/581883.png', '2022-01-06'),
(4, 'iPhone XR Case', 79, 10, 5, 1, 'Cases', 'Medium', 'Brown', '', '', 'Apple', 'MR5810', 'A nice protective case for the iPhone XR model. Its quality cannot be described easily my friend.', 'images/products/849273.png', '2019-04-23'),
(5, 'iPhone 13 Case', 149, 0, 6, 0, 'Cases', 'Small', 'Blue', '', '', 'Apple', '    5MR81113', 'A nice protective case for the iPhone 13 model. Its quality cannot be described easily.', 'images/products/839913.png', '2020-06-10'),
(6, 'Huawei P30 Pro', 2299, 0, 7, 0, 'Smartphones', 'Medium', 'Silver', '256GB', '8GB', 'Huawei', 'MR5613', 'The P30 Pro also includes all the technology that we have come to expect from a flagship with a premium price tag. Read on to find out whether Huawei has developed a new camera wonder and how it fares against other current flagships.', 'images/products/476930.png', '2022-02-11'),
(7, 'Huawei Nova 9', 1599, 0, 0, 0, 'Smartphones', 'Medium', 'Black', '256GB', '8GB', 'Huawei', 'MR4463', 'With the nova 9, Huawei again tries to impress with some cleverly designed technology and particularly the camera software. At the same time, it lacks Google Services as well as support for the 5G mobile communication standard. Our review finds out what the Android smartphone can do.', 'images/products/148094.png', '2020-01-01'),
(8, 'Apple Watch', 1899, 200, 0, 0, 'Smartwatches', 'Small', 'Silver', '2GB', '1GB', 'Apple', 'MR5238', 'Apple Watch is a wearable smartwatch that allows users to accomplish a variety of tasks, including making phone calls, sending text messages and reading email.', 'images/products/461431.png', '2021-10-24'),
(9, 'iPhone 13', 3500, 700, 2, 1, 'Smartphones', 'Medium', 'Green', '256GB', '8GB', 'Apple', 'MR4556', 'The 13th generation of one of the mainstays among smartphones is now once again trying to appease Apple fans and convert Android disciples. To accomplish this, it features a new processor, longer battery life and sensor shift image stabilization. In the following review, we will take a closer look at the latest iPhone.', 'images/products/931807.png', '2020-03-18'),
(10, 'iPhone 13', 3700, 0, -3, 0, 'Smartphones', 'Medium', 'White', '256GB', '8GB', 'Apple', 'MR6065', 'The 13th generation of one of the mainstays among smartphones is now once again trying to appease Apple fans and convert Android disciples. To accomplish this, it features a new processor, longer battery life and sensor shift image stabilization. In the following review, we will take a closer look at the latest iPhone.', 'images/products/429116.png', '2019-05-02'),
(11, 'iPhone 12 pro Max', 4000, 0, 3, 0, 'Smartphones', 'Medium', 'Midnight Blue', '512GB', '8GB', 'Apple', 'MR7605', 'Ginormous performance. LiDAR sensor, ceramic shield, 5G, MagSafe. one of the top-of-the-line iPhone 12 Pro Max high-end smartphone features the latest technology, albeit the differences to the iPhone 12 Pro are small. Find out in our test who this ginormous smartphone is for.', 'images/products/294339.png', '2019-05-03'),
(12, 'iPhone 11', 3099, 100, 5, 0, 'Smartphones', 'Medium', 'White', '128GB', '8GB', 'Apple', 'MR5293', 'Apple may have skipped flashy extras on this year phones, but the iPhone 11 is the best midtier model the company ever made. Even faster speed, improved battery life. The iPhone 11 cameras get an excellent new Night Mode and an ultrawide-angle camera that can add extra detail in photos. Fantastic video camera.', 'images/products/511280.png', '2019-09-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`,`Customer_ID`),
  ADD KEY `CCustmer_ID` (`Customer_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_ID`),
  ADD KEY `ICustmer_ID` (`Customer_ID`);

--
-- Indexes for table `maintains`
--
ALTER TABLE `maintains`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CCustmer_ID` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `ICustmer_ID` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintains`
--
ALTER TABLE `maintains`
  ADD CONSTRAINT `MAdmin_ID` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MMobile_ID` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
