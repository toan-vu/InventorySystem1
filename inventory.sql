-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 03:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` char(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` char(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `username`, `email`, `user_id`, `password`, `user_role`) VALUES
('', 'User3', 'vdt98765@gmail.com', '', '$2y$10$B6cAfA.pDFwJXGpBxuU/mOKhP7SibX7mUJZRKHcP7yEu6GfsIikDe', 'user'),
('Acc001', 'User1', 'admin@gmail.com', 'U00001', '12345', 'user'),
('Acc002', 'User2', 'admin1@gmail.com', 'U00002', '12345', 'user'),
('Acc003', 'tin', 'admin12@gmail.com', 'U00003', '$2y$10$ICMqZO.Yr1M49pS7dubgnecozzWn.GGQGRQnVtoEeNFiMtW.Wqzlq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` char(6) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_phone` char(10) DEFAULT NULL,
  `customer_mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_name`, `customer_address`, `customer_phone`, `customer_mail`) VALUES
('C00001', 'Nguyễn Người Mua', 'Trái đất', '0332209801', 'ngmua@gmail.com'),
('C00002', 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
('C00003', 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
('C00004', 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
('C00005', 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
('C00006', 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
('C00007', 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
('C00008', 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
('C00009', 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `export_ID` char(6) NOT NULL,
  `export_date` date DEFAULT NULL,
  `export_price` float DEFAULT NULL,
  `export_quantity` int(11) DEFAULT NULL,
  `product_ID` char(6) NOT NULL,
  `user_ID` char(6) NOT NULL,
  `customer_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`export_ID`, `export_date`, `export_price`, `export_quantity`, `product_ID`, `user_ID`, `customer_ID`) VALUES
('E00001', '2023-11-01', 10, 2, 'A00001', 'U00002', 'C00001'),
('E00002', '2023-11-01', 15, 1, 'A00001', 'U00001', 'C00001'),
('E00003', '2023-11-02', 10, 5, 'A00001', 'U00002', 'C00001');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `import_ID` char(6) NOT NULL,
  `import_date` date DEFAULT NULL,
  `import_price` float DEFAULT NULL,
  `import_quantity` int(11) DEFAULT NULL,
  `supplier_ID` char(6) NOT NULL,
  `product_ID` char(6) NOT NULL,
  `user_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`import_ID`, `import_date`, `import_price`, `import_quantity`, `supplier_ID`, `product_ID`, `user_ID`) VALUES
('B00001', '2023-11-01', 10, 20, 'S00001', 'A00001', 'U00001'),
('B00004', '2023-11-01', 500, 20, 'S00001', 'A00001', 'U00002');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` char(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_category` varchar(50) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_status` varchar(20) DEFAULT NULL,
  `product_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_category`, `product_quantity`, `product_status`, `product_price`) VALUES
('A00001', 'Áo len', 'Áo', 10, 'Còn hàng', 10.11),
('A00002', 'Quần bò', 'Quần', 20, 'Sale', 10),
('A0003', 'Máy tính xách tay', 'Điện tử', 100, 'Còn hàng', 20000000),
('A0004', 'Điện thoại thông minh', 'Điện tử', 200, 'Còn hàng', 10000000),
('A0005', 'Tivi', 'Điện tử', 50, 'Còn hàng', 30000000),
('A0006', 'Tủ lạnh', 'Điện tử', 100, 'Còn hàng', 25000000),
('A0007', 'Máy giặt', 'Điện tử', 200, 'Còn hàng', 20000000),
('A0008', 'Máy tính xách tay', 'Điện tử', 100, 'Còn hàng', 20000000),
('A0009', 'Điện thoại thông minh', 'Điện tử', 200, 'Còn hàng', 10000000),
('A0010', 'Tivi', 'Điện tử', 50, 'Còn hàng', 30000000),
('A0011', 'Tủ lạnh', 'Điện tử', 100, 'Còn hàng', 25000000),
('A0012', 'Máy giặt', 'Điện tử', 200, 'Còn hàng', 20000000),
('A0013', 'Máy tính xách tay', 'Điện tử', 100, 'Còn hàng', 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_ID` char(6) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_address` varchar(255) DEFAULT NULL,
  `supplier_phone` char(10) DEFAULT NULL,
  `supplier_mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_ID`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_mail`) VALUES
('S00001', 'Sỉ lẻ áo', 'ABC - DEF', '19001009', 'abc@gamil.com'),
('S00002', 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
('S00003', 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
('S00004', 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
('S00005', 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
('S00006', 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
('S00007', 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
('S00008', 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
('S00009', 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` char(6) NOT NULL,
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_office` varchar(50) DEFAULT NULL,
  `user_department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_first_name`, `user_last_name`, `user_address`, `user_office`, `user_department`) VALUES
('U00001', 'Nguyễn Văn ', 'A', 'Hà Nội', 'Cơ sở 1', 'Nhà 1'),
('U00002', 'Nguyễn Văn ', 'B', 'ABC', 'Cơ sở 1', 'Nhà 2'),
('U00003', 'Nguyễn Văn', 'Bình', '123 ABC Street, Ho Chi Minh City, Vietnam', '101', 'Sale'),
('U00004', 'Trần Thị', 'Chung', '456 DEF Street, Hanoi, Vietnam', '202', 'Marketing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`export_ID`),
  ADD KEY `export_ibfk_1` (`user_ID`),
  ADD KEY `export_ibfk_2` (`customer_ID`),
  ADD KEY `export_ibfk_3` (`product_ID`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`import_ID`),
  ADD KEY `import_ibfk_2` (`supplier_ID`),
  ADD KEY `import_ibfk_3` (`product_ID`),
  ADD KEY `import_ibfk_4` (`user_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `export_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `export_ibfk_3` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`supplier_ID`) REFERENCES `supplier` (`supplier_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `import_ibfk_3` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `import_ibfk_4` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
