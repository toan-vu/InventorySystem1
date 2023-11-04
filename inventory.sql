-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2023 lúc 10:24 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `inventory`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `email`, `user_id`, `password`, `user_role`) VALUES
('', 'admin@gmail.com', '', '12345', ''),
('', 'admin1@gmail.com', '', '12345', ''),
('tin', 'admin12@gmail.com', '', '$2y$10$ICMqZO.Yr1M49pS7dubgnecozzWn.GGQGRQnVtoEeNFiMtW.Wqzlq', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_mail`) VALUES
(1, 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
(2, 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
(3, 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
(4, 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
(5, 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
(6, 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com'),
(7, 'Nguyễn Văn A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'nguyenvana@example.com'),
(8, 'Trần Thị B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'tranthibb@example.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `export`
--

CREATE TABLE `export` (
  `export_id` int(10) UNSIGNED NOT NULL,
  `export_date` date NOT NULL,
  `export_price` decimal(10,2) NOT NULL,
  `export_quantity` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import`
--

CREATE TABLE `import` (
  `import_id` int(10) UNSIGNED NOT NULL,
  `import_date` date NOT NULL,
  `import_price` decimal(10,2) NOT NULL,
  `import_quantity` int(11) NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_price`, `product_quantity`, `product_status`, `supplier_id`) VALUES
(1, 'Máy tính xách tay', 'Điện tử', 20000000.00, 100, 'Còn hàng', 1),
(2, 'Điện thoại thông minh', 'Điện tử', 10000000.00, 200, 'Còn hàng', 1),
(3, 'Tivi', 'Điện tử', 30000000.00, 50, 'Còn hàng', 1),
(4, 'Tủ lạnh', 'Điện tử', 25000000.00, 100, 'Còn hàng', 2),
(5, 'Máy giặt', 'Điện tử', 20000000.00, 200, 'Còn hàng', 2),
(6, 'Máy tính xách tay', 'Điện tử', 20000000.00, 100, 'Còn hàng', 1),
(7, 'Điện thoại thông minh', 'Điện tử', 10000000.00, 200, 'Còn hàng', 1),
(8, 'Tivi', 'Điện tử', 30000000.00, 50, 'Còn hàng', 1),
(9, 'Tủ lạnh', 'Điện tử', 25000000.00, 100, 'Còn hàng', 2),
(10, 'Máy giặt', 'Điện tử', 20000000.00, 200, 'Còn hàng', 2),
(11, 'Máy tính xách tay', 'Điện tử', 20000000.00, 100, 'Còn hàng', 1),
(12, 'Điện thoại thông minh', 'Điện tử', 10000000.00, 200, 'Còn hàng', 1),
(13, 'Tivi', 'Điện tử', 30000000.00, 50, 'Còn hàng', 1),
(14, 'Tủ lạnh', 'Điện tử', 25000000.00, 100, 'Còn hàng', 2),
(15, 'Máy giặt', 'Điện tử', 20000000.00, 200, 'Còn hàng', 2),
(16, 'Máy tính xách tay', 'Điện tử', 20000000.00, 100, 'Còn hàng', 1),
(17, 'Điện thoại thông minh', 'Điện tử', 10000000.00, 200, 'Còn hàng', 1),
(18, 'Tivi', 'Điện tử', 30000000.00, 50, 'Còn hàng', 1),
(19, 'Tủ lạnh', 'Điện tử', 25000000.00, 100, 'Còn hàng', 2),
(20, 'Máy giặt', 'Điện tử', 20000000.00, 200, 'Còn hàng', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_mail`) VALUES
(1, 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
(2, 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
(3, 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
(4, 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
(5, 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
(6, 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com'),
(7, 'Công ty A', '123 ABC Street, Ho Chi Minh City, Vietnam', '0912345678', 'companya@example.com'),
(8, 'Công ty B', '456 DEF Street, Hanoi, Vietnam', '0923456789', 'companyb@example.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_department` varchar(255) NOT NULL,
  `user_office` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_address`, `user_department`, `user_office`) VALUES
(1, 'Nguyễn Văn A', 'Bình', '123 ABC Street, Ho Chi Minh City, Vietnam', 'Sale', '101'),
(2, 'Trần Thị B', 'Chung', '456 DEF Street, Hanoi, Vietnam', 'Marketing', '202');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`export_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`import_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `export`
--
ALTER TABLE `export`
  MODIFY `export_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `import`
--
ALTER TABLE `import`
  MODIFY `import_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `export_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `export_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `import_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
