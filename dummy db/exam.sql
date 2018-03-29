-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2018 lúc 10:37 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `exam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  `contest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `content`, `contest_id`) VALUES
(9, 4, 'Dung', 1),
(10, 4, 'Sai', 1),
(11, 4, 'Ca 2 deu dung', 1),
(12, 4, 'Ca 2 deu sai', 1),
(13, 5, '21', 1),
(14, 5, '40', 1),
(15, 5, '22', 1),
(16, 5, '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contest`
--

CREATE TABLE `contest` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `contest`
--

INSERT INTO `contest` (`id`, `subject_id`, `title`, `date`) VALUES
(1, 1, 'Kiem tra toan 15\'', '2018-03-29 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `contest_id`, `content`) VALUES
(4, 1, '2 va 3 la so nguyen to'),
(5, 1, '(7-3)*4+6 = ?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result`
--

CREATE TABLE `result` (
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `result`
--

INSERT INTO `result` (`contest_id`, `question_id`, `answer_id`) VALUES
(1, 4, 11),
(1, 5, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Toan'),
(2, 'Ly'),
(3, 'Hoa'),
(4, 'Van'),
(5, 'Anh Van');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `remember_token` text,
  `timestamp` time DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `address` text,
  `img` text,
  `birthday` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `timestamp`, `updated_at`, `created_at`, `type`, `address`, `img`, `birthday`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$lTqN3EFK/sVpKrGKqCXtOOoV3c2.CyVT.PmwI6GBsIdw20TMusCua', 'n47azatpzQN5Kh0OQgeOFqpghIGkpRJWzqb6GSsnhHeJTtEhnt9U5Cb6StaW', NULL, '2018-03-24 09:59:54', '2018-03-17 10:20:40', 1, 'Distric 7, Tan Phu Ward, HCMC', '', '1996-11-03 00:00:00'),
(3, 'root', 'root@root.com', '$2y$10$n6xSG0E3AZhTeta0G64/7.tjbdkfC/XTCfCWc5T7cnztJWNU6HiOa', '4DVLXcPXvsOGszjBK0KBenOlorVK1SUxJmdASxWe85zcB6MpVJGRP2oDfhXj', NULL, '2018-03-25 07:00:03', '2018-03-17 10:33:44', 1, 'Vinh Long City', '', '1996-03-11 00:00:00'),
(4, 'Son T Luu', 'son.lt1103@gmail.com', '$2y$10$gxABOMWklYQBpP26.aoHquIoI.gnNrVe8t/PIXOlu/6qeCf4YEpWi', 'jvosndnhoPmM3qggT3UYFhX6va6csP62H4LHjirI8C44bFSs2ryDqmCNXO2E', NULL, '2018-03-17 12:54:25', '2018-03-17 12:54:25', 0, NULL, NULL, NULL),
(5, 'Luu Thanh Son', 'sonlam1102@hotmail.com', '$2y$10$ZANiosdqOkTrG8wjEHhMBeBILae4K7SHGUBJJ3mHhz2utmYdSFCoC', 'Jru8rvmFWGmQiTGWcFcmA46hGRe5070kaQ2dfOegnSqdSU9Qp8gxII1VW7zW', NULL, '2018-03-17 10:47:39', '2018-03-17 10:47:39', 0, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Chỉ mục cho bảng `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Chỉ mục cho bảng `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `one_result` (`contest_id`,`question_id`,`answer_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`(100));

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`);

--
-- Các ràng buộc cho bảng `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
