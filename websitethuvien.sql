-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2022 lúc 05:57 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitethuvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `ten` varchar(250) NOT NULL,
  `nganh` varchar(250) NOT NULL,
  `nhaxb` varchar(250) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tacgia` varchar(250) NOT NULL,
  `masach` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `ten`, `nganh`, `nhaxb`, `soluong`, `tacgia`, `masach`, `status`) VALUES
(32, 'Tình Yêu Của Huy', 'Tình cảm', 'GIA HUY ', 10, 'Huy', 'H01', 1),
(33, 'Tình Yêu Của Huy 2', 'Tình cảm', 'GIA HUY ', 10, 'Huy', 'H02', 1),
(34, 'Tình Yêu Của Huy 3', 'Tình cảm', 'GIA HUY ', 10, 'Huy', 'H03', 1),
(35, 'Tình Yêu Của Huy 4', 'Tình cảm', 'GIA HUY ', 10, 'Huy', 'H04', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `id` int(11) NOT NULL,
  `madocgia` varchar(250) NOT NULL,
  `tendocgia` varchar(250) NOT NULL,
  `nganhdocgia` varchar(250) NOT NULL,
  `sodienthoai` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`id`, `madocgia`, `tendocgia`, `nganhdocgia`, `sodienthoai`, `username`, `password`, `email`) VALUES
(23, '01', 'Huy', 'IT', '1234567890', 'Huy123', 'Huy123456789', 'H@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieumuon`
--

CREATE TABLE `phieumuon` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `madocgia` varchar(250) NOT NULL,
  `tendocgia` varchar(250) NOT NULL,
  `nganhdocgia` varchar(250) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `ngaymuon` date NOT NULL,
  `ngaytra` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieumuon`
--

INSERT INTO `phieumuon` (`id`, `book_id`, `madocgia`, `tendocgia`, `nganhdocgia`, `sodienthoai`, `ngaymuon`, `ngaytra`, `status`) VALUES
(54, 32, '01', 'Huy', 'IT', 123456789, '2022-02-26', '2022-02-27', 2),
(55, 33, '01', 'Huy', 'IT', 123456789, '2022-02-26', '2022-02-28', 2),
(56, 32, '01', 'Huy', 'IT', 123456789, '2022-02-26', '2022-02-27', 2),
(57, 32, '01', 'Huy', 'IT', 1234567890, '2022-03-05', '2022-03-07', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `role`, `status`) VALUES
(1, 'Huy Đẹp Trai', 'admin', 'admin', 1, 1),
(6, 'LeeHuy', 'Huy', 'Huy123456', 2, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `docgia`
--
ALTER TABLE `docgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
