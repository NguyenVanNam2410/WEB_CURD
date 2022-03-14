-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2022 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `name`, `teacher`) VALUES
(1, 'PHP', 'Nam khang'),
(2, 'java', 'Văn Nam'),
(3, 'python', 'Vân Anh 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `msv` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `name`, `msv`, `address`, `class`, `date`) VALUES
(5, 'Vũ Ngọc Huyên', 1821050652, 'Hà Nam', 2, '21-10-2000'),
(7, 'nguyễn Việt Hưng', 1821050732, 'Nam định', 3, '15-7-2000'),
(8, 'Nguyễn Văn Hoàn', 1821050792, 'Thái Bình', 2, '21-10-2000'),
(9, 'Nguyễn Thị Hoàng Yến', 1821051010, 'Yên Bái', 2, '10-2-2000'),
(10, 'Vũ Trọng Đại ', 1821050655, 'Hà Nội', 1, '04-05-2000'),
(11, 'Nguyễn Văn Nam', 1821050123, 'Hà Nam', 3, '11-02-2000'),
(12, 'Trần Thị Thảo', 1821050506, 'Hà Nội', 1, '23-10-2000'),
(13, 'Nguyễn Văn Trường', 1821050763, 'Hà Nội', 1, '29-10-2000'),
(18, 'Nguyễn Văn A', 1821050703, 'Vụ bản', 1, '04-05-2000'),
(19, 'Nguyễn Văn B', 1821050723, 'Hà Nam', 2, '15-6-2000'),
(20, 'nguyễn văn khang', 1821050707, 'Nam định', 2, '24-10-2000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vd`
--

CREATE TABLE `tbl_vd` (
  `ID` int(11) NOT NULL,
  `sale` varchar(100) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_vd`
--

INSERT INTO `tbl_vd` (`ID`, `sale`, `price_sale`, `price`) VALUES
(1, 'HOT', 0, 56000),
(2, '23', 0, 47000),
(3, '30', 0, 30000),
(4, '15', 0, 18000),
(5, 'đang sale', 0, 56000),
(6, '34%', 0, 34000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_vd`
--
ALTER TABLE `tbl_vd`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_vd`
--
ALTER TABLE `tbl_vd`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
