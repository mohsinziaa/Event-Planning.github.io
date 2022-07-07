-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 03:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2
-- IMPORT THIS ON XAMPP TO MAKE DATABASES

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyertable`
--

CREATE TABLE `buyertable` (
  `userID` int(3) NOT NULL,
  `productID` int(5) NOT NULL,
  `buyerContact` varchar(20) NOT NULL,
  `cateogary` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyertable`
--

INSERT INTO `buyertable` (`userID`, `productID`, `buyerContact`, `cateogary`, `date`) VALUES
(526, 1, '03217472818', 'Shadi Halls', '2003-02-02'),
(111, 2, '03819231', 'Shadi Halls', '9993-08-22'),
(244, 31, '032180482737', 'Photographers', '2009-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `sNo` int(11) DEFAULT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`sNo`, `queries`, `replies`) VALUES
(NULL, 'Hi|Hello|Salam|Hy|Sup|Hey', 'Hello there!'),
(NULL, 'What\'s your name?|What is your name?|Your name?|What\'s your name|What is your name|Apka naam', 'My name is Leo.'),
(NULL, 'Where are you from?|Where are you from|You from?', 'Well I am from Ghulam Ishaq Khan Institute(GIKI).'),
(NULL, 'Bye|By|Allah Hafiz|Okay bye|CYA', 'Alright take care bye.');

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE `logintable` (
  `userID` int(3) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `userPassword` varchar(15) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`userID`, `userName`, `userPassword`, `timeStamp`) VALUES
(111, 'jawad', 'jawwad', '2022-06-03 06:26:38'),
(244, 'Mohsin Zia', 'myPw', '2022-05-28 05:19:27'),
(256, 'Abdullah', 'qatri', '2022-05-28 06:10:18'),
(474, 'Irtaza Haider', 'password', '2022-05-28 05:02:07'),
(526, 'ZartajAsim', 'zartaj', '2022-06-01 00:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `servicetable`
--

CREATE TABLE `servicetable` (
  `userID` int(3) NOT NULL,
  `productID` int(5) NOT NULL,
  `productName` varchar(25) NOT NULL,
  `cateogary` text NOT NULL,
  `productAddress` text NOT NULL,
  `price` int(50) NOT NULL,
  `image` text NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicetable`
--

INSERT INTO `servicetable` (`userID`, `productID`, `productName`, `cateogary`, `productAddress`, `price`, `image`, `timeStamp`) VALUES
(244, 1, 'Shadi Banquet', 'Shadi Halls', 'Main Shahrahe Faisal, Karachi', 500000, 'hallimg2.jpg', '2022-06-01 21:48:55'),
(256, 2, 'Marriage Hall', 'Shadi Halls', 'Korangi Creek, Karachi', 2000000, 'hallimg1.jpg', '2022-06-01 21:55:04'),
(244, 3, 'Shadman Hall', 'Shadi Halls', 'Unit 8 Latifabad, Hyderabad', 6000000, 'hallimg3.jpg', '2022-06-01 21:55:49'),
(244, 4, 'Best Hall', 'Shadi Halls', 'Address', 384857, 'hallimg4.jpg', '2022-06-01 22:50:09'),
(474, 11, 'Bugatti', 'Cars', 'Karachi', 40000, 'carimg1.jpg', '2022-06-01 21:59:25'),
(526, 12, 'Ferrari', 'Cars', 'Lahore', 50000, 'carimg2.jpg', '2022-06-01 21:59:52'),
(526, 21, 'Pearl Banquet Hotel', 'Hotels', 'Defense, Karachi', 75000, 'hotelimg1.jpg', '2022-06-01 22:06:28'),
(474, 22, 'Airtime Hotel', 'Hotels', 'Near Airport of Karachi', 25000, 'hotelimg2.jpg', '2022-06-01 22:07:05'),
(256, 31, 'Alpha Studio', 'Photographers', 'Peshawar', 90000, 'photographerimg1.jpg', '2022-06-01 22:10:53'),
(474, 32, 'Sigma Studio', 'Photographers', 'Islamabad', 50000, 'photographerimg2.jpg', '2022-06-01 22:11:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyertable`
--
ALTER TABLE `buyertable`
  ADD UNIQUE KEY `productID` (`productID`),
  ADD KEY `U_B_ID` (`userID`);

--
-- Indexes for table `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `servicetable`
--
ALTER TABLE `servicetable`
  ADD UNIQUE KEY `productID` (`productID`),
  ADD KEY `U_S_ID` (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyertable`
--
ALTER TABLE `buyertable`
  ADD CONSTRAINT `S_B_ID` FOREIGN KEY (`productID`) REFERENCES `servicetable` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `U_B_ID` FOREIGN KEY (`userID`) REFERENCES `logintable` (`userID`);

--
-- Constraints for table `servicetable`
--
ALTER TABLE `servicetable`
  ADD CONSTRAINT `U_S_ID` FOREIGN KEY (`userID`) REFERENCES `logintable` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
