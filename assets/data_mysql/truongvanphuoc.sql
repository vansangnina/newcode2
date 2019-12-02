-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2018 lúc 12:32 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `truongvanphuoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_album`
--

CREATE TABLE `table_album` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_list` int(11) DEFAULT NULL,
  `highlight` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `view` int(11) DEFAULT NULL,
  `name_vi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_vi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_album`
--

INSERT INTO `table_album` (`id`, `id_list`, `highlight`, `type`, `photo`, `thumb`, `slug`, `title`, `keywords`, `description`, `number`, `shows`, `datecreate`, `dateupdate`, `view`, `name_vi`, `content_vi`, `name_en`, `content_en`, `description_vi`, `description_en`) VALUES
(6, 0, 0, 'album', 'img0406-4403.JPG', 'img0406-4403_375x260.jpg', 'nghiem-thu-pccc', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 0, 'album', 'img0389-1-8128.JPG', 'img0389-1-8128_375x260.jpg', 'phong-bom-pccc', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 0, 'album', 'img0402-6138.JPG', 'img0402-6138_375x260.jpg', 'nghiem-thu-pccc-vincom-q9', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 0, 'album', 'chonchungtoi-6253.png', 'chonchungtoi-6253_375x152.53164556962.png', 'chinh-sach-tra-hang', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 0, 0, 'thicongthucte', 'kiem-soat-du-an-4150.jpg', 'kiem-soat-du-an-4150_375x249.56747404844.jpg', 'thi-cong-vinhome', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, 0, 'mauthietke', '311055designphotos-9025.png', '311055designphotos-9025_301.0094637224x260.png', 'chinh-sach-tra-hang', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'Chính sách trả hàng', '<p>dfgdfg</p>\r\n', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_bgweb`
--

CREATE TABLE `table_bgweb` (
  `id` int(10) UNSIGNED NOT NULL,
  `re_peat` varchar(20) DEFAULT NULL,
  `waytop` varchar(20) DEFAULT NULL,
  `wayleft` varchar(20) DEFAULT NULL,
  `wayright` varchar(20) NOT NULL,
  `waybottom` varchar(20) NOT NULL,
  `fix_bg` varchar(20) DEFAULT NULL,
  `bgcolor` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_bgweb`
--

INSERT INTO `table_bgweb` (`id`, `re_peat`, `waytop`, `wayleft`, `wayright`, `waybottom`, `fix_bg`, `bgcolor`, `type`, `photo`, `thumb`, `number`, `shows`, `datecreate`, `dateupdate`) VALUES
(4, 'repeat', '', '', '', '', NULL, '', 'bgweb', '', '', 1, 1, '0000-00-00 00:00:00', '2018-07-10 10:35:43'),
(6, 'repeat-x', 'top', 'center', '', '', 'fixed', '#ffffff', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'repeat', '', '', '', '', '', '', 'logo', 'bgweb-6963.png', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_cate_cat`
--

CREATE TABLE `table_cate_cat` (
  `id` int(11) NOT NULL,
  `id_list` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `shows` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_cate_cat`
--

INSERT INTO `table_cate_cat` (`id`, `id_list`, `type`, `name_vi`, `name_en`, `slug`, `title`, `keywords`, `description`, `photo`, `thumb`, `number`, `view`, `shows`, `datecreate`, `dateupdate`, `description_vi`, `description_en`) VALUES
(17, 56, 'product', 'Máy xay & máy ép', '', '', '', '', '', 'icon1-2719.jpg', 'icon1-2719_250x250.jpg', 1, 0, 1, '0000-00-00 00:00:00', '2018-08-29 13:40:52', '', ''),
(18, 56, 'product', 'Lò nướng & Lò vi sóng', '', '', '', '', '', NULL, NULL, 1, 0, 1, '2018-07-22 07:59:27', '2018-08-29 13:40:47', '', ''),
(19, 55, 'product', 'Bếp điện - Bếp từ', '', '', '', '', '', NULL, NULL, 1, 0, 1, '2018-07-22 07:59:40', '2018-08-29 13:40:42', '', ''),
(20, 58, 'product', 'Bếp điện - Bếp từ', '', '', '', '', '', NULL, NULL, 1, 0, 1, '2018-07-22 07:59:53', '2018-08-29 13:40:37', '', ''),
(22, 58, 'product', 'InPrintwork', '', '', 'rty', 'rty', 'rty', 'thumb870tongquan-8816.png', 'thumb870tongquan-8816_250x250.png', 1, 0, 1, '2018-08-29 13:20:50', '2018-08-29 13:40:32', 'ytutyu', ''),
(23, 55, 'product', 'InPrintwork', '', '', 'gf', 'hgf', 'h', 'unnamed-161.png', 'unnamed-161_250x250.png', 1, 0, 1, '2018-08-29 13:22:07', '2018-08-29 14:39:11', 'gfhfghh', ''),
(24, 55, 'product', 'fg', '', '', 'h', 'hgf', 'fg', 'thumb870tongquan-1335.png', 'thumb870tongquan-1335_250x250.png', 1, 0, 1, '2018-08-29 13:22:17', '2018-08-29 13:26:45', 'hfgh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_cate_item`
--

CREATE TABLE `table_cate_item` (
  `id` int(11) NOT NULL,
  `id_list` int(11) DEFAULT NULL,
  `id_cat` int(10) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `shows` int(11) DEFAULT NULL,
  `datecreate` int(11) DEFAULT NULL,
  `dateupdate` int(11) DEFAULT NULL,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_cate_item`
--

INSERT INTO `table_cate_item` (`id`, `id_list`, `id_cat`, `type`, `name_vi`, `name_en`, `slug`, `title`, `keywords`, `description`, `photo`, `thumb`, `number`, `view`, `shows`, `datecreate`, `dateupdate`, `description_vi`, `description_en`) VALUES
(4, 58, 22, 'product', 'Máy đếm tiền Xiudun', '', '', 'gh', 'fghf', 'ghgfhgfh', 'thumb870tongquan-9304.png', 'thumb870tongquan-9304_250x250.png', 4, 0, 1, 1445226534, 2018, NULL, NULL),
(5, 41, 17, 'product', 'Máy đếm tiền Xinda', '', 'may-dem-tien-xinda', '', '', '', 'cachthuchienchiendichsmsmarketingsieuthidienmay1-5270.jpg', 'cachthuchienchiendichsmsmarketingsieuthidienmay1-5270_250x200.jpg', 5, 0, 1, 1445226544, 1531193824, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_cate_list`
--

CREATE TABLE `table_cate_list` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `highlight` int(10) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `shortname_vi` varchar(255) DEFAULT NULL,
  `shortname_en` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `adsphoto` varchar(255) DEFAULT NULL,
  `adsphoto_thumb` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT '1',
  `view` int(11) NOT NULL,
  `shows` int(11) DEFAULT '1',
  `showads` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_cate_list`
--

INSERT INTO `table_cate_list` (`id`, `type`, `highlight`, `name_vi`, `name_en`, `shortname_vi`, `shortname_en`, `slug`, `adsphoto`, `adsphoto_thumb`, `color`, `link`, `title`, `keywords`, `description`, `photo`, `thumb`, `number`, `view`, `shows`, `showads`, `datecreate`, `dateupdate`, `description_vi`, `description_en`) VALUES
(51, 'tintuc', NULL, 'Tin trong nước ', '', NULL, NULL, 'tin-trong-nuoc', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 1, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(52, 'tintuc', NULL, 'Tin nước ngoài', '', NULL, NULL, 'tin-nuoc-ngoai', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 1, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(53, 'tintuc', NULL, 'Tin vịt', '', NULL, NULL, 'tin-vit', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 1, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(55, 'product', 1, 'điêu khắc sắc xảo', '', NULL, NULL, 'dieu-khac-sac-xao', NULL, NULL, NULL, NULL, '', '', '', 'dieukhac-2548.png', 'dieukhac-2548_60x55.png', 4, 0, 1, 1, '2018-07-21 19:14:54', '2018-08-06 11:19:09', '', ''),
(56, 'product', 1, 'nội thất cao cấp', '', NULL, NULL, 'noi-that-cao-cap', NULL, NULL, NULL, NULL, '', '', '', 'noithat-1169.png', 'noithat-1169_60x55.png', 5, 0, 1, 1, '2018-07-21 19:15:09', '2018-08-06 11:19:35', '', ''),
(58, 'product', 1, 'Chi Nhánh Thanh khoa - Đà Lạt', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'fdg', 'asdf', 'fghgfhgh', NULL, NULL, 1, 0, 1, 1, '2018-08-29 11:56:36', '2018-08-29 11:56:36', 'fghgfh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_cate_photo`
--

CREATE TABLE `table_cate_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_cate_photo`
--

INSERT INTO `table_cate_photo` (`id`, `id_cate`, `type`, `photo`, `thumb`, `name_vi`, `number`, `shows`, `datecreate`, `dateupdate`) VALUES
(1, 52, 'product', 'thumb870tongquan-3164.png', 'thumb870tongquan-3164_480x360.png', NULL, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 52, 'product', 'unnamed-3862.png', 'unnamed-3862_480x360.png', NULL, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 52, 'product', 'vesoxosopower655vietlott-8592.jpg', 'vesoxosopower655vietlott-8592_480x360.jpg', NULL, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 52, 'product', 'vietlot-1478.jpg', 'vietlot-1478_480x360.jpg', NULL, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_cate_sub`
--

CREATE TABLE `table_cate_sub` (
  `id` int(11) NOT NULL,
  `id_list` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `shows` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_com`
--

CREATE TABLE `table_com` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name_com` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `act_com` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cate` int(10) DEFAULT NULL,
  `type` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `act` varchar(225) COLLATE latin1_general_ci DEFAULT NULL,
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `number` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_com`
--

INSERT INTO `table_com` (`id`, `name`, `name_com`, `act_com`, `cate`, `type`, `act`, `shows`, `number`) VALUES
(1, 'Danh mục cấp 1', 'product', '', 1, 'product', 'list', 1, 1),
(2, 'Danh mục cấp 2', 'product', '', 1, 'product', 'cat', 1, 1),
(3, 'Danh mục cấp 3', 'product', '', 1, 'product', 'item', 1, 1),
(18, 'Giao hàng nhận tiền', 'info', '', 0, 'nhantien', '', 1, 1),
(8, 'Quản lý sản phẩm', 'product', '', 0, 'product', '', 1, 1),
(9, 'Quản lý giá bán', 'gia', '', 0, 'giaban', '', 1, 1),
(11, 'Quản lý tin tức', 'baiviet', '', 0, 'tintuc', '', 1, 1),
(17, 'Giao hàng toàn quốc', 'info', '', 0, 'giaohang', '', 1, 1),
(14, 'Quản lý dịch vụ', 'baiviet', '', 0, 'dichvu', '', 1, 1),
(15, 'Chăm sóc khách hàng', 'baiviet', '', 0, 'chamsoc', '', 1, 1),
(16, 'Xuất nhập khẩu hoàng quân', 'baiviet', '', 0, 'hoangquan', '', 1, 1),
(19, 'Đổi trả hàng', 'info', '', 0, 'doitra', '', 1, 1),
(20, 'Hướng dẩn mua hàng', 'info', '', 0, 'huongdan', '', 1, 1),
(21, 'Banner', 'bannerqc', '', 0, 'banner', '', 1, 1),
(22, 'Quản lý bài viết', 'baiviet', 'man', 1, 'baiviet', '', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_contact`
--

CREATE TABLE `table_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `note` text,
  `view` int(10) DEFAULT NULL,
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_contact`
--

INSERT INTO `table_contact` (`id`, `number`, `name`, `address`, `phone`, `photo`, `thumb`, `email`, `title`, `content`, `note`, `view`, `shows`, `datecreate`, `dateupdate`, `type`) VALUES
(49, 0, '', 'tỷty', '0934068792', '', '', 'nguyenhieunina@gmail.com', 'ty', 'rtỷtytry', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'contact'),
(50, 0, '', 'rty', '0934068792', '', '', 'nguyenhieunina@gmail.com', 'rtỷ', 'ỷty', '', 1, 1, '0000-00-00 00:00:00', '2018-07-12 08:27:20', 'contact'),
(62, 1, NULL, 'Tháng 1', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'erwrwer', NULL, NULL, 1, '2018-07-13 11:45:50', '0000-00-00 00:00:00', ''),
(63, 1, NULL, 'Tháng 1', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'ertert', NULL, NULL, 1, '2018-07-13 11:46:23', '0000-00-00 00:00:00', ''),
(64, 1, NULL, 'Tháng 1', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'ertert', NULL, NULL, 1, '2018-07-13 11:47:13', '0000-00-00 00:00:00', ''),
(65, 1, NULL, 'Tháng 1', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'gfhgfh', NULL, NULL, 1, '2018-08-09 06:52:46', '0000-00-00 00:00:00', ''),
(66, 1, NULL, 'Tháng 1', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'fdgdfg', NULL, NULL, 1, '2018-08-09 08:07:07', '0000-00-00 00:00:00', ''),
(67, 1, NULL, 'Tòa nhà sài gon Tel , CVPM Quang Trung', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'sdfsdf', 'rtytry', NULL, NULL, 1, '2018-08-22 13:54:34', '0000-00-00 00:00:00', ''),
(68, 1, NULL, 'Tòa nhà sài gon Tel , CVPM Quang Trung', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'fghfgh', NULL, NULL, 1, '2018-08-22 14:07:06', '0000-00-00 00:00:00', ''),
(69, 1, NULL, 'Tòa nhà sài gon Tel , CVPM Quang Trung', '0934068792', NULL, NULL, 'nguyenhieunina@gmail.com', 'adfsf', 'fghfgh', NULL, NULL, 1, '2018-08-22 14:13:35', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_counter`
--

CREATE TABLE `table_counter` (
  `id` int(11) NOT NULL,
  `tm` int(11) DEFAULT NULL,
  `ip` varchar(16) COLLATE latin1_general_ci NOT NULL DEFAULT '0.0.0.0',
  `browser` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pageview` int(11) NOT NULL DEFAULT '1',
  `device` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nation` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `fromto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `osdetail` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `website` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `os` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `type` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_counter`
--

INSERT INTO `table_counter` (`id`, `tm`, `ip`, `browser`, `pageview`, `device`, `nation`, `fromto`, `osdetail`, `website`, `os`, `dateupdate`, `type`) VALUES
(1, 1489737787, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(2, 1489738803, '::1', 'Chrome', 31, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(3, 1489742019, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(4, 1489803083, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(5, 1489805126, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(6, 1489985502, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(7, 1489990135, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(8, 1489991333, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(9, 1489992560, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(10, 1489993461, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(11, 1489994452, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(12, 1489995419, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(13, 1489996347, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(14, 1491188351, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(15, 1491189407, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(16, 1491190381, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(17, 1491191299, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(18, 1491193085, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(19, 1491194389, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(20, 1491195355, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(21, 1491200168, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(22, 1491201118, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(23, 1491202018, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(24, 1491202962, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(25, 1491203905, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(26, 1491205748, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(27, 1491206777, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(28, 1491207701, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(29, 1491208686, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(30, 1491210318, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(31, 1491287596, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(32, 1491962870, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(33, 1491964233, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(34, 1491965146, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(35, 1491966294, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(36, 1491967268, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(37, 1491969617, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(38, 1491971178, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(39, 1491972110, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(40, 1491973061, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(41, 1491976968, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(42, 1491977874, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(43, 1491978795, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(44, 1491979951, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(45, 1491980926, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(46, 1491982043, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(47, 1492145581, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(48, 1492149975, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(49, 1492150988, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(50, 1492152018, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(51, 1492153136, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(52, 1492154058, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(53, 1492155196, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(54, 1492156667, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(55, 1497588801, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(56, 1498538303, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(57, 1498539209, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(58, 1498543677, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(59, 1498544583, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(60, 1498545658, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(61, 1498547052, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(62, 1498548149, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(63, 1498549094, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(64, 1498551148, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(65, 1498553785, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(66, 1498612774, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(67, 1498615046, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(68, 1498615965, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(69, 1498616924, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(70, 1498617838, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(71, 1498619440, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(72, 1498620400, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(73, 1498622710, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(74, 1498623620, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(75, 1498624879, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(76, 1498630425, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(77, 1498698819, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(78, 1498699770, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(79, 1498701717, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(80, 1498703565, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(81, 1498705632, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(82, 1498706627, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(83, 1498707586, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(84, 1498711393, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(85, 1498716398, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(86, 1498717323, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(87, 1498718233, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(88, 1498719150, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(89, 1498720214, '::1', 'Chrome', 35, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(90, 1498721115, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(91, 1498722060, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(92, 1498722973, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(93, 1498724279, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(94, 1498726297, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(95, 1498727241, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(96, 1498728397, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(97, 1498729297, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(98, 1498787239, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(99, 1498788531, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(100, 1498790759, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(101, 1498791912, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(102, 1498794431, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(103, 1498795449, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(104, 1498796572, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(105, 1498871338, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(106, 1498877167, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(107, 1499314140, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(108, 1499315887, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(109, 1499316862, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(110, 1499320912, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(111, 1499321883, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(112, 1499322802, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(113, 1499323953, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(114, 1499324855, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(115, 1499325875, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(116, 1499326784, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(117, 1499328078, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(118, 1499329437, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(119, 1499330367, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(120, 1499331298, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(121, 1499332235, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(122, 1499482645, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(123, 1499483644, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(124, 1499486305, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(125, 1499487568, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(126, 1499753270, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(127, 1499754287, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(128, 1499755585, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(129, 1499756525, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(130, 1499763468, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(131, 1499764406, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(132, 1499765315, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(133, 1499766425, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(134, 1499767325, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(135, 1499845969, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(136, 1499848494, '::1', 'Chrome', 49, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(137, 1499849502, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(138, 1499850409, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(139, 1499851348, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(140, 1499852613, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(141, 1500179621, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(142, 1503468222, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(143, 1503473680, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(144, 1504753488, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(145, 1504925973, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(146, 1504931983, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(147, 1505093435, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(148, 1505094606, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(149, 1505095516, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(150, 1505096672, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(151, 1505097637, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(152, 1505098589, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(153, 1505101010, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(154, 1505102135, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(155, 1505105160, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(156, 1505109924, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(157, 1505111045, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(158, 1505113467, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(159, 1505114419, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(160, 1505115611, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(161, 1505116572, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(162, 1505118702, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(163, 1505120138, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(164, 1505121052, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(165, 1505121994, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(166, 1505122900, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(167, 1505123821, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(168, 1505124841, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(169, 1505186800, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(170, 1505188381, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(171, 1505189354, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(172, 1505190299, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(173, 1505191296, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(174, 1505192346, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(175, 1505196528, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(176, 1505197641, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(177, 1505198541, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(178, 1505199472, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(179, 1505201187, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(180, 1505202423, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(181, 1505203329, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(182, 1505204259, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(183, 1505206471, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(184, 1505207393, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(185, 1505208336, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(186, 1505209250, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(187, 1505210227, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(188, 1505268621, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(189, 1505269852, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(190, 1505270905, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(191, 1505273368, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(192, 1505275500, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(193, 1505276407, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(194, 1505277385, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(195, 1505278681, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(196, 1505282700, '::1', 'Chrome', 32, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(197, 1505284083, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(198, 1505285194, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(199, 1505286326, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(200, 1505287268, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(201, 1505288229, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(202, 1505289230, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(203, 1505290882, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(204, 1505291863, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(205, 1505353716, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(206, 1506155623, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(207, 1507013401, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(208, 1507090580, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(209, 1507091631, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(210, 1507092611, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(211, 1507098645, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(212, 1507101976, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(213, 1507105501, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(214, 1507166411, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(215, 1507170053, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(216, 1507171112, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(217, 1507172211, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(218, 1507173144, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(219, 1507174079, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(220, 1507175609, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(221, 1507176592, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(222, 1507178209, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(223, 1507179220, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(224, 1507184284, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(225, 1507185204, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(226, 1507186112, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(227, 1507187113, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(228, 1507188228, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(229, 1507189135, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(230, 1507190956, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(231, 1507192328, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(232, 1507193903, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(233, 1507194838, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(234, 1507197632, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(235, 1507256764, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(236, 1507260537, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(237, 1507261495, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(238, 1507262440, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(239, 1507263361, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(240, 1507264330, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(241, 1507270685, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(242, 1507271589, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(243, 1507272566, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(244, 1507277448, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(245, 1507280794, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(246, 1507281778, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(247, 1507282721, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(248, 1507283986, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(249, 1507339982, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(250, 1507343558, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(251, 1507344935, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(252, 1507346811, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(253, 1507348083, '::1', 'Chrome', 49, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(254, 1507348990, '::1', 'Chrome', 74, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(255, 1507349911, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(256, 1507350826, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(257, 1507351732, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(258, 1507511598, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(259, 1507511598, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(260, 1507512666, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(261, 1507513598, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(262, 1507514589, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(263, 1507515491, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(264, 1507516988, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(265, 1507517888, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(266, 1507518868, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(267, 1507519962, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(268, 1507521652, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(269, 1507523193, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(270, 1507524098, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(271, 1507525112, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(272, 1507529632, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(273, 1507531063, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(274, 1507532015, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(275, 1507533103, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(276, 1507534125, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(277, 1507535029, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(278, 1507540119, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(279, 1507541061, '::1', 'Chrome', 35, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(280, 1507542004, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(281, 1507543096, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(282, 1507544084, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(283, 1511922349, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(284, 1523936813, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(285, 1523937771, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(286, 1523946852, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(287, 1523947785, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(288, 1523948728, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(289, 1523949687, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(290, 1523950943, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(291, 1523951887, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(292, 1523952898, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(293, 1523953913, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(294, 1523954961, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(295, 1523957171, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(296, 1523958093, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(297, 1523959007, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(298, 1524031761, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(299, 1524032718, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(300, 1524033646, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(301, 1524035084, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(302, 1524037346, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(303, 1524038917, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(304, 1524039870, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(305, 1524040863, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(306, 1524041770, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(307, 1524042869, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(308, 1524043769, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(309, 1524044689, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(310, 1524045592, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(311, 1524106898, '::1', 'Chrome', 32, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(312, 1524107821, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(313, 1524108806, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(314, 1524109809, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(315, 1524110729, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(316, 1524111647, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(317, 1524112573, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(318, 1524113896, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(319, 1524120807, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(320, 1524121859, '::1', 'Chrome', 1, 'Phone', '', '', 'Linux', '', 'Linux', '0000-00-00 00:00:00', '0'),
(321, 1524474186, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(322, 1524536858, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(323, 1524537806, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(324, 1524538876, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(325, 1524540041, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(326, 1524543557, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(327, 1524544580, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(328, 1524551558, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(329, 1524552503, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(330, 1524553416, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(331, 1524554331, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(332, 1524555331, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(333, 1524556321, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(334, 1524557231, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(335, 1524558227, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(336, 1524559679, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(337, 1524560587, '::1', 'Chrome', 39, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(338, 1524561493, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(339, 1524563224, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(340, 1524713862, '::1', 'Chrome', 31, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(341, 1524714872, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(342, 1524715802, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(343, 1524716825, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(344, 1524725484, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(345, 1524727147, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(346, 1525317555, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(347, 1525318570, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(348, 1525319799, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(349, 1525321038, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(350, 1525322082, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(351, 1525323017, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(352, 1525327339, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(353, 1525328241, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(354, 1525329143, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(355, 1525330243, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(356, 1525331201, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(357, 1525332890, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(358, 1525333798, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(359, 1525334908, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(360, 1525397899, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(361, 1525399926, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(362, 1525401008, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(363, 1525402119, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(364, 1525403662, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(365, 1525404576, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(366, 1525405488, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(367, 1525406460, '::1', 'Chrome', 38, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(368, 1525407362, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(369, 1525408270, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(370, 1525409850, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(371, 1525414292, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(372, 1525415340, '::1', 'Chrome', 34, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(373, 1525416283, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(374, 1525417196, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(375, 1525418097, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(376, 1525419140, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(377, 1525420072, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(378, 1525420978, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(379, 1525421905, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(380, 1525423154, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(381, 1525424102, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(382, 1525425163, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(383, 1525426110, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(384, 1525427055, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(385, 1525483958, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(386, 1525484860, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(387, 1525496079, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(388, 1525746547, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(389, 1525747506, '::1', 'Chrome', 32, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(390, 1525748438, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(391, 1525749357, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(392, 1525750269, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(393, 1525751528, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(394, 1525752438, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(395, 1525753346, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(396, 1525762154, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(397, 1525763558, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(398, 1525764522, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(399, 1525765598, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(400, 1525766565, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(401, 1525767503, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(402, 1525768479, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(403, 1525769673, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(404, 1525770741, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(405, 1525771641, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(406, 1525772608, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(407, 1525773654, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(408, 1525774834, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(409, 1525829452, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(410, 1525831760, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(411, 1525832694, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(412, 1525833619, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(413, 1525835133, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(414, 1525837098, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(415, 1525838022, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(416, 1525838927, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(417, 1525840393, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(418, 1525841296, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(419, 1525847602, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(420, 1525848558, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(421, 1525849510, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(422, 1525850410, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(423, 1525916622, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(424, 1525925573, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(425, 1525926808, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(426, 1525927863, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(427, 1525931451, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(428, 1525932775, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(429, 1525933825, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(430, 1525934767, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(431, 1525936568, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(432, 1525938562, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(433, 1525940660, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(434, 1525941821, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(435, 1526002276, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(436, 1526003197, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0');
INSERT INTO `table_counter` (`id`, `tm`, `ip`, `browser`, `pageview`, `device`, `nation`, `fromto`, `osdetail`, `website`, `os`, `dateupdate`, `type`) VALUES
(437, 1526004099, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(438, 1526005013, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(439, 1526005918, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(440, 1526006880, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(441, 1526008331, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(442, 1526009314, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(443, 1526010227, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(444, 1526011181, '::1', 'Chrome', 30, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(445, 1526012195, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(446, 1526021644, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(447, 1526022562, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(448, 1526023580, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(449, 1526024573, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(450, 1526025530, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(451, 1526026500, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(452, 1526027474, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(453, 1526031391, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(454, 1526032651, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(455, 1526088377, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(456, 1526089351, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(457, 1526090263, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(458, 1526091164, '::1', 'Chrome', 56, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(459, 1526092067, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(460, 1526093049, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(461, 1526094010, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(462, 1526095528, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(463, 1526096646, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(464, 1526097559, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(465, 1526098696, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(466, 1526099615, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(467, 1526100566, '::1', 'Chrome', 42, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(468, 1526101506, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(469, 1526261724, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(470, 1526262650, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(471, 1526263616, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(472, 1526264611, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(473, 1526265549, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(474, 1526267420, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(475, 1526284419, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(476, 1526531048, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(477, 1526544716, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(478, 1526546076, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(479, 1526546984, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(480, 1526547912, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(481, 1526549168, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(482, 1526550542, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(483, 1526609574, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(484, 1526611198, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(485, 1526613126, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(486, 1526614042, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(487, 1526627527, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(488, 1526628554, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(489, 1526629598, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(490, 1526632895, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(491, 1526633865, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(492, 1526634777, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(493, 1526695528, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(494, 1526697643, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(495, 1526698889, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(496, 1526700709, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(497, 1526702474, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(498, 1526703440, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(499, 1526704495, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(500, 1526705640, '::1', 'Chrome', 35, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(501, 1526972810, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(502, 1526975352, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(503, 1526976797, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(504, 1526977845, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(505, 1526978839, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(506, 1526979741, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(507, 1526980666, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(508, 1526982121, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(509, 1526983022, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(510, 1527038357, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(511, 1527039526, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(512, 1527041188, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(513, 1527042196, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(514, 1527043139, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(515, 1527044827, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(516, 1527045987, '::1', 'Chrome', 18, 'Phone', '', '', 'Linux', '', 'Linux', '0000-00-00 00:00:00', '0'),
(517, 1527046902, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(518, 1527047804, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(519, 1527051478, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(520, 1527059873, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(521, 1527061031, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(522, 1527061944, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(523, 1527063935, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(524, 1527064855, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(525, 1527065762, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(526, 1527066921, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(527, 1527067908, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(528, 1527126733, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(529, 1527127996, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(530, 1527128966, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(531, 1527130729, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(532, 1527131907, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(533, 1527133009, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(534, 1527133928, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(535, 1527134853, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(536, 1527135799, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(537, 1527137083, '::1', 'Chrome', 54, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(538, 1527141906, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(539, 1527142915, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(540, 1527144025, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(541, 1527145131, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(542, 1527146277, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(543, 1527147202, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(544, 1527148121, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(545, 1527149067, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(546, 1527150713, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(547, 1527212372, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(548, 1527213685, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(549, 1527217014, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(550, 1527219181, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(551, 1527220212, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(552, 1527221383, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(553, 1527230298, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(554, 1527297400, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(555, 1527300525, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(556, 1527303364, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(557, 1527304300, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(558, 1527305410, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(559, 1527306315, '::1', 'Chrome', 36, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(560, 1527307685, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(561, 1527308754, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(562, 1527309884, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(563, 1527476069, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(564, 1527575184, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(565, 1527582691, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(566, 1527586413, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(567, 1527644004, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(568, 1527645462, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(569, 1527646363, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(570, 1527647767, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(571, 1527649288, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(572, 1527650495, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(573, 1527651404, '::1', 'Chrome', 32, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(574, 1527652377, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(575, 1527653306, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(576, 1527654207, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(577, 1527655142, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(578, 1527656141, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(579, 1527660273, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(580, 1527661206, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(581, 1527662246, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(582, 1527664634, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(583, 1527665667, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(584, 1527666605, '::1', 'Chrome', 46, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(585, 1527667519, '::1', 'Chrome', 52, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(586, 1527669135, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(587, 1527670334, '113.161.89.144', 'Chrome', 7, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(588, 1527671852, '14.161.23.79', 'Chrome', 12, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(589, 1527672818, '14.161.23.79', 'Chrome', 18, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(590, 1527673584, '113.161.89.144', 'Chrome', 22, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(591, 1527673830, '14.161.23.79', 'Chrome', 15, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(592, 1527674532, '113.161.89.144', 'Chrome', 20, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(593, 1527674756, '14.161.23.79', 'Chrome', 15, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(594, 1527675458, '173.252.84.52', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(595, 1527675677, '14.161.23.79', 'Chrome', 23, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(596, 1527687702, '116.102.16.11', 'Chrome', 1, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(597, 1527694747, '116.109.51.67', 'Chrome', 13, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(598, 1527728374, '14.161.23.79', 'Chrome', 7, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(599, 1527730829, '14.161.23.79', 'Chrome', 18, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(600, 1527731824, '14.161.23.79', 'Chrome', 3, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(601, 1527740648, '14.161.23.79', 'Chrome', 24, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(602, 1527740663, '173.252.85.26', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(603, 1527740823, '69.171.240.212', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(604, 1527741223, '69.171.240.147', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(605, 1527741360, '173.252.86.87', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(606, 1527744326, '14.161.23.79', 'Chrome', 14, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(607, 1527745341, '14.161.23.79', 'Chrome', 1, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(608, 1527746597, '14.161.23.79', 'Chrome', 17, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(609, 1527747394, '171.253.178.97', 'Chrome', 1, 'Phone', 'VN\n', '', 'Linux', '', 'Linux', '0000-00-00 00:00:00', '0'),
(610, 1527747621, '14.161.23.79', 'Chrome', 2, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(611, 1527748162, '113.161.89.144', 'Chrome', 20, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(612, 1527749121, '113.161.89.144', 'Chrome', 10, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(613, 1527749271, '66.220.151.243', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(614, 1527749635, '14.161.23.79', 'Chrome', 15, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(615, 1527749928, '66.220.148.128', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(616, 1527750071, '113.161.89.144', 'Chrome', 30, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(617, 1527751416, '14.161.23.79', 'Safari', 1, 'Phone', 'VN\n', '', 'Mac OS X', '', 'Mac OS', '0000-00-00 00:00:00', '0'),
(618, 1527752734, '14.161.23.79', 'Chrome', 20, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(619, 1527754008, '14.161.23.79', 'Chrome', 48, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(620, 1527754964, '14.161.23.79', 'Chrome', 8, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(621, 1527755661, '113.161.89.144', 'Chrome', 8, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(622, 1527756744, '14.161.23.79', 'Chrome', 6, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(623, 1527757750, '14.161.23.79', 'Chrome', 3, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(624, 1527763163, '103.199.56.189', 'Chrome', 16, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(625, 1527763560, '69.171.240.251', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(626, 1527764499, '103.199.56.189', 'Chrome', 3, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(627, 1527764868, '103.199.33.105', 'Chrome', 2, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(628, 1527765315, '103.199.33.233', 'Chrome', 1, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(629, 1527765551, '113.161.38.133', 'Chrome', 23, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(630, 1527766177, '69.171.225.134', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(631, 1527766427, '69.171.225.215', 'Other', 1, 'Computer', 'US\n', '', 'Other', '', 'Other', '0000-00-00 00:00:00', '0'),
(632, 1527766797, '113.161.38.133', 'Chrome', 10, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(633, 1527846643, '14.161.23.79', 'Chrome', 4, 'Computer', 'VN\n', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(634, 1527957236, '123.20.64.152', 'Safari', 1, 'Phone', 'VN\n', '', 'Mac OS X', '', 'Mac OS', '0000-00-00 00:00:00', '0'),
(635, 1528027485, '171.253.141.82', 'Chrome', 1, 'Phone', 'VN\n', '', 'Linux', '', 'Linux', '0000-00-00 00:00:00', '0'),
(636, 1528166648, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(637, 1528168043, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(638, 1528169106, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(639, 1528170406, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(640, 1528171330, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(641, 1528172305, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(642, 1528173306, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(643, 1528174290, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(644, 1528178680, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(645, 1528179765, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(646, 1528180975, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(647, 1528182994, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(648, 1528183915, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(649, 1528184856, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(650, 1528185834, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(651, 1528187260, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(652, 1528188162, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(653, 1528189227, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(654, 1528190235, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(655, 1528191253, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(656, 1528192281, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(657, 1528251346, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(658, 1528253494, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(659, 1528254549, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(660, 1528255450, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(661, 1528256357, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(662, 1528257320, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(663, 1528258494, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(664, 1528259683, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(665, 1528260622, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(666, 1528265386, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(667, 1528266364, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(668, 1528267304, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(669, 1528268351, '::1', 'Chrome', 38, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(670, 1528269371, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(671, 1528270416, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(672, 1528271502, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(673, 1528272551, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(674, 1528273469, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(675, 1528274874, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(676, 1528428365, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(677, 1528438383, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(678, 1528439822, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(679, 1528440857, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(680, 1528442968, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(681, 1528444030, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(682, 1528445940, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(683, 1528446848, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(684, 1528450955, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(685, 1528451857, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(686, 1528507493, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(687, 1528511279, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(688, 1528512314, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(689, 1528513260, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(690, 1528515810, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(691, 1528516732, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(692, 1528517936, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(693, 1528519359, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(694, 1528685535, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(695, 1528686553, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(696, 1528687467, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(697, 1528688431, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(698, 1528689486, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(699, 1528690387, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(700, 1528691370, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(701, 1528692473, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(702, 1528696995, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(703, 1528698124, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(704, 1528699408, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(705, 1528707464, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(706, 1528708951, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(707, 1529486947, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', '0'),
(708, 1529570084, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(709, 1529574041, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(710, 1529575041, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(711, 1529631411, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(712, 1529652478, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(713, 1529653395, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(714, 1529654311, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(715, 1529657050, '::1', 'Chrome', 44, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(716, 1529658245, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(717, 1529659777, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(718, 1529660911, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(719, 1529894460, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(720, 1529895386, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(721, 1529897157, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(722, 1529898986, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(723, 1529899924, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(724, 1529900897, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(725, 1529901945, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(726, 1529906463, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(727, 1529907871, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(728, 1529914357, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(729, 1529919427, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(730, 1529920463, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(731, 1529997493, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(732, 1529998454, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(733, 1529999402, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(734, 1530000322, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(735, 1530001518, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(736, 1530002536, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(737, 1530003472, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(738, 1530004512, '::1', 'Chrome', 34, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(739, 1530006168, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(740, 1530007110, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(741, 1530008082, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(742, 1530009173, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(743, 1530059997, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(744, 1530061079, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(745, 1530072663, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(746, 1530074337, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(747, 1530075260, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(748, 1530079999, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(749, 1530081004, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(750, 1530082066, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(751, 1530083369, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(752, 1530084312, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(753, 1530087529, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(754, 1530089340, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(755, 1530090306, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(756, 1530091234, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(757, 1530152720, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(758, 1530154791, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(759, 1530158355, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(760, 1530159987, '::1', 'Chrome', 43, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(761, 1530161075, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(762, 1530168926, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(763, 1530175780, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(764, 1530237330, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(765, 1530247464, '::1', 'Chrome', 43, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(766, 1530248385, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(767, 1530252543, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(768, 1530253636, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(769, 1530254947, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(770, 1530255862, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(771, 1530257177, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(772, 1530261208, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(773, 1530262190, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(774, 1530264657, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(775, 1530326973, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(776, 1530328033, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(777, 1530329858, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(778, 1530330866, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(779, 1530332229, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(780, 1530334247, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(781, 1530335732, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(782, 1530494788, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(783, 1530496370, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(784, 1530499034, '::1', 'Chrome', 64, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(785, 1530500191, '::1', 'Chrome', 68, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(786, 1530501129, '::1', 'Chrome', 34, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(787, 1530502051, '::1', 'Chrome', 32, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(788, 1530515276, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(789, 1530522443, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(790, 1530662942, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(791, 1530692988, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(792, 1530758539, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(793, 1530842048, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(794, 1530883828, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(795, 1530937841, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(796, 1530947251, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(797, 1531022471, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(798, 1531108893, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(799, 1531188016, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(800, 1531272837, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(801, 1531312348, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(802, 1531360772, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(803, 1531384747, '::1', 'Chrome', 22, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(804, 1531387175, '::1', 'Chrome', 45, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(805, 1531388090, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(806, 1531389308, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(807, 1531390275, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(808, 1531444436, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(809, 1531445515, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(810, 1531450422, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(811, 1531452075, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(812, 1531454440, '::1', 'Chrome', 38, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(813, 1531455660, '::1', 'Chrome', 31, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(814, 1531456597, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(815, 1531457759, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(816, 1531463086, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(817, 1531466167, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(818, 1531467191, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(819, 1531469379, '::1', 'Chrome', 93, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(820, 1531469552, '127.0.0.1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(821, 1531470853, '::1', 'Chrome', 47, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(822, 1531471907, '::1', 'Chrome', 55, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(823, 1531472850, '::1', 'Chrome', 35, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(824, 1531473155, '127.0.0.1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(825, 1531474095, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(826, 1531475002, '::1', 'Chrome', 38, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(827, 1531476265, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(828, 1531542123, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(829, 1531543099, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(830, 1531544586, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(831, 1531705792, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(832, 1531708814, '::1', 'Chrome', 95, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(833, 1531710019, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(834, 1531715255, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(835, 1531716959, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(836, 1531741216, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(837, 1531809274, '::1', 'Chrome', 50, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(838, 1531810215, '::1', 'Chrome', 44, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(839, 1531811741, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(840, 1531872534, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(841, 1531872536, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(842, 1531874150, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(843, 1531878226, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(844, 1531879737, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(845, 1532019472, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(846, 1532020848, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(847, 1532187807, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(848, 1532194376, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(849, 1532235555, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(850, 1532236518, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(851, 1532237609, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(852, 1532238574, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(853, 1532239486, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(854, 1532240555, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(855, 1532243237, '::1', 'Chrome', 48, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(856, 1532244189, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(857, 1532245494, '::1', 'Chrome', 39, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(858, 1532246482, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(859, 1532248483, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(860, 1532249784, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(861, 1532796007, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(862, 1532797614, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(863, 1532798537, '::1', 'Chrome', 42, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(864, 1532799453, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL);
INSERT INTO `table_counter` (`id`, `tm`, `ip`, `browser`, `pageview`, `device`, `nation`, `fromto`, `osdetail`, `website`, `os`, `dateupdate`, `type`) VALUES
(865, 1532853384, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(866, 1532855798, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(867, 1533445618, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(868, 1533446596, '::1', 'Chrome', 36, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(869, 1533448068, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(870, 1533449001, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(871, 1533450119, '::1', 'Chrome', 30, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(872, 1533451020, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(873, 1533452921, '::1', 'Chrome', 34, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(874, 1533453840, '::1', 'Chrome', 68, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(875, 1533456649, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(876, 1533458896, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(877, 1533530045, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(878, 1533536159, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(879, 1533537059, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(880, 1533541245, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(881, 1533542180, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(882, 1533543136, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(883, 1533544059, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(884, 1533544964, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(885, 1533546853, '::1', 'Chrome', 34, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(886, 1533547957, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(887, 1533624254, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(888, 1533625448, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(889, 1533626359, '::1', 'Chrome', 48, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(890, 1533627913, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(891, 1533628986, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(892, 1533630074, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(893, 1533631038, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(894, 1533632931, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(895, 1533633866, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(896, 1533634873, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(897, 1533691695, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(898, 1533692620, '::1', 'Chrome', 30, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(899, 1533693573, '::1', 'Chrome', 80, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(900, 1533695221, '::1', 'Chrome', 39, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(901, 1533696125, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(902, 1533697097, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(903, 1533698908, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(904, 1533700011, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(905, 1533701011, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(906, 1533701928, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(907, 1533702901, '::1', 'Chrome', 31, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(908, 1533703810, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(909, 1533708391, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(910, 1533709344, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(911, 1533710487, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(912, 1533711505, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(913, 1533712521, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(914, 1533713719, '::1', 'Chrome', 21, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(915, 1533714732, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(916, 1533716621, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(917, 1533717964, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(918, 1533719436, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(919, 1533720840, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(920, 1533722312, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(921, 1533777982, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(922, 1533779044, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(923, 1533780230, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(924, 1533781132, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(925, 1533782958, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(926, 1533783921, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(927, 1533785785, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(928, 1533786692, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(929, 1533787632, '::1', 'Chrome', 47, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(930, 1533788852, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(931, 1533789845, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(932, 1533794671, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(933, 1533796568, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(934, 1533797476, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(935, 1533798530, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(936, 1533800476, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(937, 1533802254, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(938, 1533803205, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(939, 1533804328, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(940, 1533805643, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(941, 1533806775, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(942, 1533814461, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(943, 1533866642, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(944, 1533867556, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(945, 1533870167, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(946, 1533871175, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(947, 1533873604, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(948, 1533874506, '::1', 'Chrome', 88, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(949, 1533875939, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(950, 1533881091, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(951, 1533882462, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(952, 1533883753, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(953, 1533885129, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(954, 1533961744, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(955, 1534122797, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(956, 1534124811, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(957, 1534128576, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(958, 1534488633, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(959, 1534494735, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(960, 1534495921, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(961, 1534497136, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(962, 1534498045, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(963, 1534499173, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(964, 1534500161, '::1', 'Chrome', 5, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(965, 1534556396, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(966, 1534557339, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(967, 1534560576, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(968, 1534562167, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(969, 1534564285, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(970, 1534565268, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(971, 1534566435, '::1', 'Chrome', 33, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(972, 1534567516, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(973, 1534730577, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(974, 1534733629, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(975, 1534734644, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(976, 1534736366, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(977, 1534737588, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(978, 1534738769, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(979, 1534741201, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(980, 1534745466, '::1', 'Chrome', 26, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(981, 1534749165, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(982, 1534750517, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(983, 1534751791, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(984, 1534754122, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(985, 1534755072, '::1', 'Chrome', 12, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(986, 1534755984, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(987, 1534757026, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(988, 1534758141, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(989, 1534759042, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(990, 1534815869, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(991, 1534818547, '::1', 'Chrome', 7, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(992, 1534820693, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(993, 1534822549, '::1', 'Chrome', 25, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(994, 1534823484, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(995, 1534824480, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(996, 1534825747, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(997, 1534827123, '::1', 'Chrome', 15, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(998, 1534831734, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(999, 1534832635, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1000, 1534835636, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1001, 1534837309, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1002, 1534838603, '::1', 'Chrome', 223, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1003, 1534840192, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1004, 1534841213, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1005, 1534842157, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1006, 1534843089, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1007, 1534844126, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1008, 1534845482, '::1', 'Chrome', 107, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1009, 1534896592, '::1', 'Chrome', 40, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1010, 1534897537, '::1', 'Chrome', 82, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1011, 1534898477, '::1', 'Chrome', 4, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1012, 1534899620, '::1', 'Chrome', 71, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1013, 1534903345, '::1', 'Chrome', 159, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1014, 1534904320, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1015, 1534905449, '::1', 'Chrome', 9, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1016, 1534906429, '::1', 'Chrome', 8, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1017, 1534907465, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1018, 1534908520, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1019, 1534909447, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1020, 1534910449, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1021, 1534911354, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1022, 1534912331, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1023, 1534913579, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1024, 1534919931, '::1', 'Chrome', 13, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1025, 1534920874, '::1', 'Chrome', 20, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1026, 1534921954, '::1', 'Chrome', 35, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1027, 1534923050, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1028, 1534924314, '::1', 'Chrome', 38, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1029, 1534925217, '::1', 'Chrome', 14, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1030, 1534926403, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1031, 1534927464, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1032, 1534928647, '::1', 'Chrome', 10, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1033, 1534929694, '::1', 'Chrome', 23, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1034, 1534930604, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1035, 1534931512, '::1', 'Chrome', 27, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1036, 1535025767, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1037, 1535430387, '::1', 'Chrome', 24, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1038, 1535431302, '::1', 'Chrome', 28, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1039, 1535436859, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1040, 1535438051, '::1', 'Chrome', 17, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1041, 1535439844, '::1', 'Chrome', 33, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1042, 1535442878, '::1', 'Chrome', 1, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1043, 1535444105, '::1', 'Chrome', 3, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1044, 1535445400, '::1', 'Chrome', 11, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1045, 1535446311, '::1', 'Chrome', 156, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1046, 1535447217, '::1', 'Chrome', 29, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1047, 1535448674, '::1', 'Chrome', 16, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1048, 1535449635, '::1', 'Chrome', 91, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1049, 1535506614, '::1', 'Chrome', 19, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1050, 1535507518, '::1', 'Chrome', 18, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1051, 1535508609, '::1', 'Chrome', 163, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1052, 1535528903, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1053, 1535536226, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1054, 1535612457, '::1', 'Chrome', 6, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL),
(1055, 1535618206, '::1', 'Chrome', 2, 'Computer', '', '', 'Windows 10', '', 'Windows', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_counter_place`
--

CREATE TABLE `table_counter_place` (
  `id` int(11) NOT NULL,
  `ip` varchar(16) COLLATE latin1_general_ci NOT NULL DEFAULT '0.0.0.0',
  `place` varchar(2000) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_info`
--

CREATE TABLE `table_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_vi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_info`
--

INSERT INTO `table_info` (`id`, `type`, `slug`, `title`, `keywords`, `description`, `photo`, `thumb`, `number`, `shows`, `datecreate`, `dateupdate`, `name_vi`, `content_vi`, `name_en`, `content_en`, `description_vi`, `description_en`) VALUES
(4, 'lienhe', '', NULL, NULL, NULL, '', '', 0, 0, '0000-00-00 00:00:00', '2018-08-09 08:37:02', NULL, '<h2>CANARY DECOR</h2>\r\n\r\n<ul font-size:=\"\" helvetica=\"\" style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; outline: none; list-style-type: none; width: 414.438px; color: rgb(0, 0, 0); font-family: \">\r\n	<li style=\"box-sizing: border-box; margin: 0px; padding: 1px 0px 8px; outline: none;\">Địa chỉ: DP53 Dragon Parc 1 Villa, Nguyễn Hữu Thọ, Nhà Bè, TP.HCM</li>\r\n	<li style=\"box-sizing: border-box; margin: 0px; padding: 1px 0px 8px; outline: none;\">Email: info@canarydecor.vn</li>\r\n	<li style=\"box-sizing: border-box; margin: 0px; padding: 1px 0px 8px; outline: none;\">Hotline: (028) 3620 9259</li>\r\n	<li style=\"box-sizing: border-box; margin: 0px; padding: 1px 0px 8px; outline: none;\">Website: http://canarydecor.vn</li>\r\n	<li style=\"box-sizing: border-box; margin: 0px; padding: 1px 0px 8px; outline: none;\"> </li>\r\n</ul>\r\n\r\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.538099565199!2d106.72768944448104!3d10.846616658988872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527dea84f028b%3A0x82a3bb8e3901f716!2zMjggxJDGsOG7nW5nIFRhbSBCw6xuaCwgSGnhu4dwIELDrG5oIENow6FuaCwgVGjhu6cgxJDhu6ljLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1533796606077\" style=\"border:0\" width=\"600\"></iframe></p>\r\n', NULL, '', NULL, NULL),
(23, 'footer', '', NULL, NULL, NULL, NULL, NULL, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '<p>fd</p>\r\n', NULL, '', NULL, NULL),
(5, 'giaohang', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'gioithieu', 'thu-ky-o-nha-thue-du-co-nhieu-biet-thu-can-ho-trieu-usd', 'Giới thiệu Công Ty TNHH - TM KT AB', 'rty', 'rtỷtỷty', 'icon1-5003.jpg', 'icon1-5003_600x415.jpg', 0, 0, '0000-00-00 00:00:00', '2018-07-28 19:22:27', 'Thư Kỳ ở nhà thuê dù có nhiều biệt thự, căn hộ triệu USD', '<h2 class=\"caption\" style=\"box-sizing: border-box; padding: 0px; margin: 0px; font-family: Quicksand, Arial, sans-serif; line-height: 1.45; color: rgb(50, 96, 130); font-size: 35px;\"><span style=\"font-size:22px;\"><span style=\"font-family:arial,helvetica,sans-serif;\">VỀ CHÚNG TÔI </span></span></h2>\r\n\r\n<p style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; color: rgb(66, 66, 66); font-family: Quicksand, Arial, sans-serif; font-size: 145); text-align: justify;\">Công ty Tư Vấn Thiết kế Kỹ Thuật Xây dựng Techcons là công ty cung cấp dịch vụ tư vấn và thiết kế các giải pháp kết cấu xây dựng với chất lượng cao nhất và giá cả hợp lý nhất. Đừng bận tâm đến ý tưởng phức tạp chúng tôi sẽ tìm giải pháp tối ưu nhất cho công trình. Công ty Tư Vấn Thiết kế Kỹ Thuật Xây dựng Techcons tập trung đội ngũ kỹ sư được đào tạo trong và ngoài nước với chuyên môn trong lĩnh vực thiết kế, xây dựng công trình. Bằng những nỗ lực của toàn thể cán bộ nhân viên, Công ty đã từng bước khẳng định chất lượng dịch vụ và uy tín tuyệt đối với khách hàng trong lĩnh vực tư vấn thiết kế xây dựng. Rất nhiều dự án lớn, yêu cầu cao về chất lượng thiết kế và xây dựng đã được khách hàng tin tưởng giao cho Công ty đảm nhận.</p>\r\n\r\n<p style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; color: rgb(66, 66, 66); font-family: Quicksand, Arial, sans-serif; font-size: 1245); text-align: justify;\">Các dự án tiêu biểu trong thời gian gần đây nhất: Thiết kế công trình Khu Khách Sạn Thể Thao Mỹ Đình Hà Nội, Công trình Văn Phòng Bạch Mã, Công trình Văn Phòng Võ Thị Sáu... và nhiều công trình lớn nhỏ khác.</p>\r\n\r\n<h2 class=\"caption\" style=\"box-sizing: border-box; padding: 0px; margin: 0px; font-family: Quicksand, Arial, sans-serif; line-height: 1.45; color: rgb(50, 96, 130); font-size: 35px;\"><span style=\"font-size:22px;\">THÔNG ĐIỆP TỪ GIÁM ĐỐC</span></h2>\r\n\r\n<p style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; color: rgb(66, 66, 66); font-family: Quicksand, Arial, sans-serif; font-size: 16px; text-align: justify;\">Kính thưa Quý khách hàng, Quý đối tác kinh doanh và các bạn!<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nTrong thời gian xây dựng và phát triển, Công ty Tư Vấn Thiết Kế Kỹ Thuật Xây dựng Techcons đã đóng vai trò là cơ quan tư vấn và thiết kế trong tổ chức tư vấn. Chúng tôi đã tham gia các dự án từ Bắc vào Nam, từ trung du, miền núi đến đồng bằng, vùng Tây nguyên đến vùng sâu, vùng xa... đều có sự tham gia lập dự án, thiết kế, giám sát và xây dựng. Ngoài ra,Techcons còn tham gia tư vấn giám sát tại Nước Cộng Hòa Dân Chủ Nhân Dân LÀO và từng bước mở rộng thị trường sang các nước trong khu vực Đông Dương và sẽ thành lập chi nhánh Cty trong thời gian sắp tới. Những công trình do Công ty Techcons thiết kế, xây dựng ngày nay đang phát huy tích cực, hiệu quả trong sản xuất kinh doanh cũng như đào tạo, nghiên cứu khoa học.<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nVới khả năng phát triển và hợp tác và những kinh nghiệm đã được tích luỹ trong những năm qua, đặc biệt với trình độ năng lực và thiết bị hiện nay có thể khẳng định rằng công ty Techcons đã hội tụ đủ các điều<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nkiện cần thiết để đảm nhiệm các công việc về lập dự án, thiết kế, xây dựng, giám sát công trình, quản lý dự án cho các dự án có qui mô lớn. Công ty Techcons giới thiệu trình độ và năng lực với sự mong muốn được tham gia tư vấn , xây dựng cho các công trình sử dụng có hiệu quả, đội ngũ chuyên gia của công ty được phát huy hết khả năng đồng thời góp thêm một phần sức lực vào sự nghiệp phát triển kinh tế nước<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nnhà.<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nVề phần mình, Công ty Techcons xin cam kết làm hết sức mình để thực hiện nhiệm vụ được giao, đáp ứng các yêu cầu về kỹ thuật và mỹ thuật, chất lượng và tiến độ một cách tốt nhất, mang lại hiệu quả kinh tế xã hội cao nhất.<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nCuối cùng, tôi muốn bày tỏ lòng biết ơn của mình đến Quý vị khách hàng, đến những đối tác kinh doanh và đến tất cả những người đã hỗ trợ cho sự thành công liên tục của chúng tôi.</p>\r\n\r\n<p style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; color: rgb(66, 66, 66); font-family: Quicksand, Arial, sans-serif; font-size: 16px; text-align: justify;\"><span style=\"box-sizing: border-box; padding: 0px; margin: 0px; font-weight: 700;\">NGÔ MINH THÀNH<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />\r\nGiám đốc</span></p>\r\n', '', '', '', NULL),
(24, 'ndkhuyenmai', 'khuyen-mai-hot', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:27:35', '2018-08-10 08:27:35', 'khuyến mãi hot', '<p>Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý hoặc các chất liệu khác. Hãy cùng chúng tôi trải nghiệm sản phẩm.</p>\r\n', '', '', NULL, NULL),
(25, 'nddichvu', 'dich-vu-chinh', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:29:05', '2018-08-10 08:29:05', 'dịch vụ chính', '<p>Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý hoặc các chất liệu khác. Hãy cùng chúng tôi trải nghiệm sản phẩm.</p>\r\n', '', '', NULL, NULL),
(26, 'ndspkhac', 'xem-san-pham-khac', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:30:06', '2018-08-10 08:30:06', 'xem sản phẩm khác', '<p>Chúng tôi có rất nhiều sản phẩm với mẫu mã đẹp và chất lượng đảm bảo. Cùng đén lựa chọn sản phẩm phù hợp.</p>\r\n', '', '', NULL, NULL),
(27, 'ndthietke', 'goi-y-thiet-ke', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:30:49', '2018-08-10 08:30:49', 'gợi ý thiết kế', '<p>Chúng tôi có rất nhiều sản phẩm với mẫu mã đẹp và chất lượng đảm bảo. Cùng đén lựa chọn sản phẩm phù hợp.</p>\r\n', '', '', NULL, NULL),
(28, 'ndspcaocap', '', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:31:45', '2018-08-30 15:41:12', 'sản phẩm cao cấp 1234', '<p>Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý hoặc các chất liệu khác. Hãy cùng chúng tôi trải nghiệm sản phẩm.</p>\r\n', '', '', NULL, NULL),
(29, 'ndtintuc', 'tin-tuc-moi', NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-08-10 08:32:18', '2018-08-10 08:32:18', 'tin tức mới', '<p>Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý hoặc các chất liệu khác. Hãy cùng chúng tôi trải nghiệm sản phẩm.</p>\r\n', '', '', NULL, NULL),
(14, 'banggia', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'tuyendung', '', 'Tuyển nhân viên', 'Tuyển nhân viên,Tuyển nhân viên,Tuyển nhân viên', 'Tuyển nhân viên,Tuyển nhân viên,Tuyển nhân viên,Tuyển nhân viên', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'nhantien', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'daily', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'hoivien', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'trangchu', 'tra-sua-ban-mai', '', '', '', 'cactruonghopduocdieuchinhgiayphepxaydung1-3250.jpg', 'cactruonghopduocdieuchinhgiayphepxaydung1-3250_390x380.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Trà sữa Ban Mai', '<p>Quà Quê hi vọng, với những món ăn mà mình đem lại, sẽ gợi cho mỗi người một chút về hương vị quê hương, hương vị tuổi thơ. Một trong những điều đặc biệt Quà Quê luôn cố gắng khi giới thiệu các đặc sản vùng miền là sự chọn lọc kỹ lưỡng xưởng sản xuất để đảm bảo thuần vị và chất lượng,</p>\r\n', NULL, NULL, NULL, NULL),
(10, 'dichvu_t', 'moi-thu-tot-cho-khach-hang', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'aocuoi', '', '', '', '', 'mauvaycuoimuathu2012-5-7289.jpg', 'mauvaycuoimuathu2012-5-7289_375x495.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'hinhanh', 'luu-lai-tung-khoanh-khac', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_lang`
--

CREATE TABLE `table_lang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `type_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_jp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_kr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_lang`
--

INSERT INTO `table_lang` (`id`, `name`, `type_vi`, `number`, `photo`, `thumb`, `type_fr`, `type_jp`, `type_kr`, `type_en`) VALUES
(1, '_trangchu', 'Trang chủ', 0, '', '', NULL, NULL, NULL, NULL),
(2, '_phongcachthietke', 'Loại hình thiết kế', 0, '', '', NULL, NULL, NULL, NULL),
(3, '_kieumoi', 'New Style', 0, '', '', NULL, NULL, NULL, NULL),
(4, '_vechungtoi', 'Về chúng tôi', 0, '', '', NULL, NULL, NULL, NULL),
(5, '_lienhe', 'Liên Hệ', 0, '', '', NULL, NULL, NULL, NULL),
(6, '_nhanthongtin', 'Nhận thông tin mới nhất của chúng tôi qua email !', 0, '', '', NULL, NULL, NULL, NULL),
(7, '_nhapemail', 'Nhập email', 0, '', '', NULL, NULL, NULL, NULL),
(8, '_dangky', 'Đăng ký', 0, '', '', NULL, NULL, NULL, NULL),
(9, '_dangonline', 'Đang Online', 0, '', '', NULL, NULL, NULL, NULL),
(10, '_tongtruycap', 'Tổng truy cập', 0, '', '', NULL, NULL, NULL, NULL),
(11, '_diachi', 'Địa chỉ', 0, '', '', NULL, NULL, NULL, NULL),
(12, '_dienthoai', 'Điện thoại', 0, '', '', NULL, NULL, NULL, NULL),
(13, '_contact', 'Liên hệ', 0, '', '', NULL, NULL, NULL, NULL),
(14, '_hoten', 'Họ tên', 0, '', '', NULL, NULL, NULL, NULL),
(15, '_tieude', 'Tiêu Đề', 0, '', '', NULL, NULL, NULL, NULL),
(16, '_noidung', 'Nội dung', 0, '', '', NULL, NULL, NULL, NULL),
(17, '_gui', 'Gửi', 0, '', '', NULL, NULL, NULL, NULL),
(18, '_xemtiep', 'Xem tiếp', 0, '', '', NULL, NULL, NULL, NULL),
(19, '_dichvu', 'Dịch vụ', 0, '', '', NULL, NULL, NULL, NULL),
(20, '_cactinkhac', 'Các tin khác', 0, '', '', NULL, NULL, NULL, NULL),
(21, '_congtrinhkhac', 'Công trình khác', 0, '', '', NULL, NULL, NULL, NULL),
(22, '_danhmucsanpham', 'Danh mục sản phẩm', 0, '', '', NULL, NULL, NULL, NULL),
(23, '_nguyenlieu', 'Nguyên liệu', 0, '', '', NULL, NULL, NULL, NULL),
(24, '_khuyenmai', 'Khuyến mãi', 0, '', '', NULL, NULL, NULL, NULL),
(25, '_gioithieu', 'Giới thiệu', 0, '', '', NULL, NULL, NULL, NULL),
(26, '_nhapdienthoai', 'Nhập số điện thoại', 0, '', '', NULL, NULL, NULL, NULL),
(27, '_nhapnoidung', 'Nhập nội dung', 0, '', '', NULL, NULL, NULL, NULL),
(28, '_tintuc', 'Tin tức', 0, '', '', NULL, NULL, NULL, NULL),
(29, '_tuannay', 'Tuần này', 0, '', '', NULL, NULL, NULL, NULL),
(30, '_thangnay', 'Tháng này', 0, '', '', NULL, NULL, NULL, NULL),
(31, '_homnay', 'Hôm nay', 0, '', '', NULL, NULL, NULL, NULL),
(32, '_sanpham', 'Sản phẩm', 0, '', '', NULL, NULL, NULL, NULL),
(33, '_gia', 'Giá', 0, '', '', NULL, NULL, NULL, NULL),
(75, '_xemthem', 'Xem thêm', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(35, '_sanphamkhac', 'Sản phẩm khác', 0, '', '', NULL, NULL, NULL, NULL),
(36, '_chitietsanpham', 'Chi tiết sản phẩm', 0, '', '', NULL, NULL, NULL, NULL),
(37, '_masp', 'Mã SP', 0, '', '', NULL, NULL, NULL, NULL),
(38, '_giaban', 'Giá Bán', 0, '', '', NULL, NULL, NULL, NULL),
(39, '_soluong', 'Số lượng', 0, '', '', NULL, NULL, NULL, NULL),
(40, '_muangay', 'Mua ngay', 0, '', '', NULL, NULL, NULL, NULL),
(41, '_hoac', 'Hoặc', 0, '', '', NULL, NULL, NULL, NULL),
(42, '_themvaogiohang', 'Thêm vào giỏ hàng', 0, '', '', NULL, NULL, NULL, NULL),
(43, '_huongdanmuahang', 'Hướng dẩn mua hàng', 0, '', '', NULL, NULL, NULL, NULL),
(44, '_timkiem', 'Tìm kiếm', 0, '', '', NULL, NULL, NULL, NULL),
(45, '_banchuanhaptukhoatimkiem', 'Bạn chưa nhập từ khóa tìm kiếm', 0, '', '', NULL, NULL, NULL, NULL),
(46, '_chuacosanphamchomucnay', 'Chưa có sản phẩm cho mục này', 0, '', '', NULL, NULL, NULL, NULL),
(47, '_tuvan', 'Tư vấn', 0, '', '', NULL, NULL, NULL, NULL),
(48, '_tinmoinhat', 'Tin mới nhất', 0, '', '', NULL, NULL, NULL, NULL),
(49, '_tintucmoinhat', 'Tin tức mới nhất', 0, '', '', NULL, NULL, NULL, NULL),
(50, '_tintucnoibat', 'Tin tức nổi bặt', 0, '', '', NULL, NULL, NULL, NULL),
(51, '_tintucnoibat', 'Tin tức nổi bật', 0, '', '', NULL, NULL, NULL, NULL),
(52, '_ngaydang', 'Ngày Đăng', 0, '', '', NULL, NULL, NULL, 'Post Date'),
(53, '_ngay', 'Ngày', NULL, NULL, NULL, NULL, NULL, NULL, 'Date'),
(54, '_duan', 'Dự Án', NULL, NULL, NULL, NULL, NULL, NULL, 'Project'),
(55, '_sanphamchitiet', 'thông tin sản phẩm', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(56, '_giacu', 'Giá cũ ', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(57, '_dathemgiohang', 'Đã thêm vào giỏ hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(58, '_thanhtoan', 'Thanh toán', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(59, '_thongtinnguoinhan', 'Thông tin người nhận', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(60, '_tonggia', 'Tổng giá', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(61, '_xoa', 'Xóa', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(76, '_xemngay', 'Xem ngay', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(63, '_chinhsachmuahang', 'Chính sách mua hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(64, '_xacnhanthanhtoan', 'Xác nhận thanh toán', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(65, '_xacnhanthongtingiaohang', 'Xác nhận thông tin giao hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(66, '_thanhtoankhinhanhang', 'Thanh toán khi nhận hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(67, '_thanhtoantaicuahang', 'Thanh toán tại cửa hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(68, '_thanhtoanquanchuyenkhoan', 'Thanh toán qua chuyển khoản', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(69, '_mienphi', 'Miển phí', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(70, '_khuvuchochiminh', 'Khu vực TP HCM', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(71, '_thanhtoantai', 'Thanh toán tại', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(72, '_stt', 'STT', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(73, '_nhaphoten', 'Nhập họ tên', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(74, '_phuongthucthanhtoan', 'Phương thức thanh toán', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(77, '_thamkhao', 'Tham khảo', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(78, '_dangkytuvan', 'Đăng ký tư vấn', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(79, '_nhapemaildangky', 'nhập email đăng ký', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(80, '_sanphamnoibat', 'sản phẩm nổi bật', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(81, '_sanphammoi', 'sản phẩm mới', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(82, '_goichochungtoibatcukhinaobancan', 'gọi cho chúng tôi bất cứ khi nào bạn cần', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(83, '_hotrokhachhang', 'Hỗ trợ khách hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(84, '_dangkynhantin', 'Đăng ký nhận tin', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(85, '_luotdanhgia', 'Lượt đánh giá', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(86, '_luotxemsanpham ', 'Lượt xem sản phẩm', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(87, '_luotmua', 'Lượt mua', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(88, '_dathang', 'Đặt Hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(89, '_giaohangmienphitaitphcm', 'Giao hàng miển phí tại tp hcm', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(90, '_luotxemsanpham', 'Lượt xem sản phẩm', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(91, '_giohangcuaban', 'Giỏ hàng của bạn', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(92, '_xemgiohangvathanhtoan', 'Xem giỏ hàng và thanh toán', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(93, '_xem', 'Xem', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(94, '_dacongthemgiohang', 'Đã cộng thêm vào giỏ hàng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(95, '_dong', 'Đóng', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(96, '_banchuanhaphoten', 'Bạn chưa nhập họ tên', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(97, '_banchuanhapemail', 'Bạn chưa nhập email', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(98, '_banchuanhapnoidung', 'Bạn chưa nhập nội dung', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(99, '_bankhongcosanphamnaotronggiohang', 'Bạn không có sản phẩm nào trong giỏ hàng ', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(100, '_chucmungbandadathangthanhcong', 'Chúc mừng bạn đã đặt hàng thành công', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(101, '_banchuachonphuongthucthanhtoan', 'Bạn chưa chọn phương thức thanh toán', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(102, '_hethongbiloivuilongthuchienlaitrongvaigiay', 'Hệ thống bị lổi vui lòng thực hiện lại sau vài giây', NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_like`
--

CREATE TABLE `table_like` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_product` int(11) NOT NULL DEFAULT '0',
  `iduser` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_like`
--

INSERT INTO `table_like` (`id`, `type`, `id_product`, `iduser`, `ip`, `datecreate`) VALUES
(1, 'review', 11, 0, '::1', '2018-08-09 05:51:32'),
(2, 'review', 10, 0, '::1', '2018-08-09 06:00:48'),
(3, 'review', 7, 0, '::1', '2018-08-09 06:07:16'),
(4, 'review', 8, 0, '::1', '2018-08-09 06:08:08'),
(5, 'review', 9, 0, '::1', '2018-08-09 06:08:34'),
(6, 'review', 14, 0, '::1', '2018-08-09 06:12:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_link`
--

CREATE TABLE `table_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `link` varchar(250) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_link`
--

INSERT INTO `table_link` (`id`, `photo`, `thumb`, `type`, `number`, `shows`, `link`, `slug`, `datecreate`, `dateupdate`, `name_vi`, `name_en`) VALUES
(1, 'fa1-7779.jpg', 'fa1-7779_43x38.jpg', 'lienket', 1, 1, 'http://hethongdienpccc.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(7, 'lk1-2189.png', 'lk1-2189_40x40.png', 'link', 1, 1, 'http://facebook.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Facebook', NULL),
(8, 'la2-4383.png', 'la2-4383_40x40.png', 'link', 1, 1, 'https://www.google.com/', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Google', NULL),
(10, 'lk4-4537.png', 'lk4-4537_40x40.png', 'link', 1, 1, 'http://youtobe.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Youtobe', NULL),
(13, 'fa1-7992.png', 'fa1-7992_36x36.png', 'mangxh', 4, 1, 'http://doithicongpccc.vn', 'facebook', '0000-00-00 00:00:00', '2018-08-08 05:51:47', 'Facebook', ''),
(15, 'fa2-3562.png', 'fa2-3562_36x36.png', 'mangxh', 3, 1, 'http://google.com.vn', 'google', '0000-00-00 00:00:00', '2018-08-08 05:51:38', 'Google', ''),
(16, 'fa4-2380.png', 'fa4-2380_36x36.png', 'mangxh', 2, 1, 'https://livexoso.com/', 'live', '0000-00-00 00:00:00', '2018-08-08 05:51:28', 'Live', ''),
(23, 'lk3-8786.png', 'lk3-8786_40x40.png', 'link', 1, 1, 'https://livexoso.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'trực tiếp kqxs', NULL),
(24, 'fa3-7381.png', 'fa3-7381_36x36.png', 'mangxh', 1, 1, 'http://khocacom.com/3', 'zalo-3', '0000-00-00 00:00:00', '2018-08-08 05:52:00', 'Zalo 3 ', 'ửewr'),
(25, 'lk4-1920.png', 'lk4-1920_40x40.png', 'link', 1, 1, 'http://khocacom.com/', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Youtobe', NULL),
(26, 'fa5-4974.png', 'fa5-4974_36x36.png', 'mangxh', 1, 1, 'http://yahoo.com', 'yahoo', '2018-08-08 05:52:31', '2018-08-08 05:52:31', 'Yahoo', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_member`
--

CREATE TABLE `table_member` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `bcoin` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `birthdate` datetime DEFAULT '0000-00-00 00:00:00',
  `address` text,
  `sex` int(11) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `id_district` int(11) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `date_register` datetime DEFAULT '0000-00-00 00:00:00',
  `lastlogin` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `member_code` varchar(50) DEFAULT NULL,
  `limit_time` int(11) DEFAULT NULL,
  `facebook_auth_id` varchar(100) DEFAULT NULL,
  `google_auth_id` varchar(100) DEFAULT NULL,
  `com` varchar(50) DEFAULT NULL,
  `shows` int(11) DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `block_user` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_member`
--

INSERT INTO `table_member` (`id`, `username`, `email`, `password`, `name`, `bcoin`, `point`, `phone`, `birthdate`, `address`, `sex`, `photo`, `id_district`, `id_city`, `active`, `date_register`, `lastlogin`, `number`, `member_code`, `limit_time`, `facebook_auth_id`, `google_auth_id`, `com`, `shows`, `datecreate`, `dateupdate`, `block_user`) VALUES
(8, '', 'nguyenhieunina@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Quản lý sản phẩm', 0, 0, '0909990990', '0000-00-00 00:00:00', 'Quang Trung , Gò Vấp', 1, '', 0, 0, 1, '0000-00-00 00:00:00', 1461836873, 0, 'TMS_000001', 0, '', '', 'regular', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_meta`
--

CREATE TABLE `table_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `com` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `shows` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_newsletter`
--

CREATE TABLE `table_newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(225) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_newsletter`
--

INSERT INTO `table_newsletter` (`id`, `number`, `name`, `sex`, `phone`, `address`, `title`, `content`, `shows`, `datecreate`, `dateupdate`, `email`) VALUES
(148, 1, '', 'Nam', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nguyenhieunina@gmail.com'),
(149, 1, '', 'Nam', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nhieunina@gmail.co'),
(151, 1, '', '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'an.annevn@gmail.com'),
(155, 1, '', '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'thdg@gmail.com'),
(153, 1, '', '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ewer@adbc.nn'),
(157, 1, '', '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hothuylinh1511@yahoo.com.vn'),
(158, 1, '', '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'longtu1432005@yahoo.com'),
(160, 1, 'Hieu', NULL, NULL, NULL, NULL, 'rêtrtrt', 1, '2018-08-08 06:35:01', '0000-00-00 00:00:00', 'nguyenhieuninaaaa@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_order`
--

CREATE TABLE `table_order` (
  `id` int(11) NOT NULL,
  `order_code` varchar(30) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `district` int(100) DEFAULT NULL,
  `shiping_price` int(11) DEFAULT NULL,
  `member_code` varchar(100) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type_payment` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `content` text,
  `note` text,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_order`
--

INSERT INTO `table_order` (`id`, `order_code`, `city`, `district`, `shiping_price`, `member_code`, `view`, `name`, `phone`, `address`, `email`, `type_payment`, `totalprice`, `content`, `note`, `datecreate`, `dateupdate`, `status`) VALUES
(1, 'DH_000001', 0, 0, 80000, '', 1, 'Nguyễn đình hiếu', '0934068792', 'Huyện Nghĩa Hành', 'nguyenhieunina@gmail.com', 4, 8156000, 'Giao hàng nhanh trong ngày nhé !', '', '2018-08-10 08:53:00', '0000-00-00 00:00:00', 7),
(2, 'DH_000002', 0, 0, 80000, '', 1, 'Nguyễn đình hiếu', '0934068792', 'Long Điền', 'nguyenhieunina@gmail.com', 4, 8156000, 'fghgfhgh', '', '2018-08-10 08:54:00', '0000-00-00 00:00:00', 6),
(3, 'DH_000003', 0, 0, 80000, '', NULL, 'Lẻ Online', '0934068792', 'Bình Giang', 'nguyenhieunina@gmail.com', 3, 341000, 'rtyrtytry', NULL, '2018-08-22 11:17:55', '0000-00-00 00:00:00', 1),
(4, 'DH_000004', 0, 0, 60000, '', NULL, 'Lẻ Online', '0934068792', 'Tòa nhà sài gon Tel , CVPM Quang Trung', 'nguyenhieunina@gmail.com', 4, 306000, 'rtỷtỷty', NULL, '2018-08-28 06:44:19', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_order_detail`
--

CREATE TABLE `table_order_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_order_detail`
--

INSERT INTO `table_order_detail` (`id`, `id_product`, `id_order`, `name`, `price`, `amount`) VALUES
(1, 77, 1, NULL, 0, 4),
(2, 48, 1, NULL, 0, 3),
(3, 52, 1, NULL, 0, 1),
(4, 77, 2, 'InPrintwork', 2000000, 4),
(5, 48, 2, 'Trà sữa trân châu', 35000, 3),
(6, 52, 2, 'Trà sữa trân châu thạch', 51000, 1),
(7, 52, 3, NULL, 51000, 6),
(8, 48, 3, NULL, 35000, 1),
(9, 52, 4, NULL, 51000, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_permission`
--

CREATE TABLE `table_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_list` varchar(255) DEFAULT NULL,
  `id_cat` varchar(255) DEFAULT NULL,
  `id_item` varchar(255) DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(200) DEFAULT NULL,
  `com` text,
  `location` varchar(225) DEFAULT NULL,
  `views` varchar(225) DEFAULT NULL,
  `adds` varchar(225) DEFAULT NULL,
  `edits` varchar(225) DEFAULT NULL,
  `deletes` varchar(225) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_photo`
--

CREATE TABLE `table_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_list` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(50) DEFAULT NULL,
  `photo_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slogan_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_photo`
--

INSERT INTO `table_photo` (`id`, `id_list`, `slug`, `link`, `number`, `shows`, `type`, `photo_vi`, `thumb_vi`, `name_vi`, `photo_en`, `thumb_en`, `name_en`, `datecreate`, `dateupdate`, `slogan_vi`, `slogan_en`, `description_vi`, `description_en`) VALUES
(4, 0, NULL, '', 1, 1, 'banner_top', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(7, 0, NULL, '', 1, 1, 'banner_giua', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(13, 0, NULL, '', 1, 1, 'banner_phai', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(77, 0, NULL, '', 1, 1, 'maumoi', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(64, 0, NULL, '', 3, 1, 'doitac', 'dt2-7881.png', 'dt2-7881_190x110.png', 'dt2', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(102, 0, NULL, '', 1, 0, 'banner_vc', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(96, 0, NULL, '', 1, 1, 'quangcao', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(75, 0, NULL, '', 1, 1, 'maumoi', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(76, 0, NULL, '', 1, 1, 'maumoi', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(31, 0, '', '', 1, 0, 'banner', 'banner-4845.png', 'banner-4845_325x97.png', '', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(32, 0, '', NULL, 1, 0, 'logo', 'logo-9320.png', 'logo-9320_134x81.png', NULL, 'watermark-3517.png', 'watermark-3517_210x124.png', NULL, '0000-00-00 00:00:00', '2018-08-30 15:52:04', NULL, NULL, NULL, NULL),
(33, 0, '', '', 1, 0, 'favicon', 'logo4474254x123-5323.png', 'logo4474254x123-5323_40x19.370078740157.png', '', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(34, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(35, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(36, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(37, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(38, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(39, 0, NULL, '', 1, 1, 'ha_gioithieu', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(44, 0, NULL, '', 1, 1, 'doitac', 'dt6-4192.png', 'dt6-4192_190x110.png', '6', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(142, 0, NULL, '', 1, 1, 'doitac', 'dt2-1092.png', 'dt2-1092_190x110.png', 'â', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(45, 0, NULL, '', 6, 1, 'doitac', 'dt5-4546.png', 'dt5-4546_190x110.png', '5', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(46, 0, NULL, '', 5, 1, 'doitac', 'dt4-8389.png', 'dt4-8389_190x110.png', '4', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(63, 0, NULL, '', 4, 1, 'doitac', 'dt3-6685.png', 'dt3-6685_190x110.png', '3', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(49, 0, NULL, '', 1, 0, 'bando', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(85, 0, NULL, '', 1, 1, 'hinhanh_gt', 'image-1-6284.jpg', 'image-1-6284_583x305.jpg', 'Mẩu nhà', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(80, 0, NULL, '', 1, 1, 'hinhanh1', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(54, 0, NULL, 'http://localhost/ducnguyen/trang-chu.html', 1, 0, 'popup', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(57, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(58, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(59, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(60, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(61, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(62, 0, NULL, 'http://hethongdienpccc.com/', 1, 1, 'hinhanh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(81, 0, NULL, '', 1, 0, 'hinhanh2', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(99, 0, '', NULL, 1, 0, 'banner_footer', '421584x91-8356.png', '421584x91-8356_253x175.png', NULL, 'df86d9d2c2e52dbb74f4-3041.jpg', 'df86d9d2c2e52dbb74f4-3041_253x175.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(78, 0, NULL, '', 1, 1, 'maumoi', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(82, 0, NULL, '', 1, 1, 'hinhanh3', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(83, 0, NULL, '', 1, 0, 'hinhanh_top', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(86, 0, NULL, '', 1, 1, 'hinhanh_gt', 'hinhanhtrasuamatcha-1677.jpg', 'hinhanhtrasuamatcha-1677_583x305.jpg', 'Chúc mừng sinh nhật ', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(87, 0, NULL, '', 1, 1, 'hinhanh_gt', 'banbinhdungtrasuagiarebinhdungtrasuainoxgiulanh8l1-619.jpg', 'banbinhdungtrasuagiarebinhdungtrasuainoxgiulanh8l1-619_583x305.jpg', 'Công trình pccc', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(88, 0, NULL, '', 1, 1, 'hinhanh_gt', '140958061446129762069049101360204836670336n-5019.jpg', '140958061446129762069049101360204836670336n-5019_583x305.jpg', 'Chính sách trả hàng', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(89, 0, NULL, '', 1, 1, 'hinhanh_gt', '3105foodymobilehmbjpg584636098889581416207-3963.jpg', '3105foodymobilehmbjpg584636098889581416207-3963_583x305.jpg', 'Chính sách trả hàng', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(97, 0, NULL, '', 1, 1, 'quangcao', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(98, 0, NULL, '', 1, 1, 'quangcao', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(105, 0, '', '', 1, 0, 'bocongthuong', 'dathongbao1024x388-875.png', 'dathongbao1024x388-875_147x52.png', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-07-28 19:35:19', NULL, NULL, NULL, NULL),
(152, NULL, NULL, 'https://www.youtube.com/watch?v=oOa1HdQsx28', 1, 1, '', '3c06691c3b1a4dc3874098a6292e60b6-1-5251.jpg', '3c06691c3b1a4dc3874098a6292e60b6-1-5251_1349x650.jpg', 'InPrintwork', NULL, NULL, '', '2018-08-06 09:56:14', '2018-08-30 16:57:42', 'TÔN VINH VẺ ĐẸP THUẦN KHIẾT', '', 'Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý.', ''),
(140, 0, NULL, '', 1, 0, 'slider2', '62074vodkaabsolutjewelryblackbackgroundrings-941.jpg', '62074vodkaabsolutjewelryblackbackgroundrings-941_1349x350.jpg', 'nội thất hoàng yến', NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(141, 0, NULL, '', 2, 1, 'doitac', 'dt1-4246.png', 'dt1-4246_190x110.png', 'dt1', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(145, 0, NULL, '', 1, 1, 'slider2', '3c06691c3b1a4dc3874098a6292e60b6-1-8098.jpg', '3c06691c3b1a4dc3874098a6292e60b6-1-8098_1349x350.jpg', 'Chính sách trả hàng', NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(146, 0, NULL, '', 1, 1, 'hinhanh_gt', 'image-3851.jpg', 'image-3851_583x305.jpg', 'Màu đỏ', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(147, NULL, '', NULL, 1, 0, NULL, '421584x91-210.png', '421584x91-210_254x123.png', NULL, 'df86d9d2c2e52dbb74f4-9216.jpg', 'df86d9d2c2e52dbb74f4-9216_254x123.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(148, NULL, '', NULL, 1, 0, NULL, '421584x91-1914.png', '421584x91-1914_254x123.png', NULL, 'df86d9d2c2e52dbb74f4-3104.jpg', 'df86d9d2c2e52dbb74f4-3104_254x123.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(151, NULL, NULL, 'https://www.youtube.com/watch?v=6lUpdGjVRHU', 1, 1, 'slider', 'slider-4911.png', 'slider-4911_1349x650.png', 'Techcons 12', NULL, NULL, '', '2018-07-13 03:19:25', '2018-08-30 16:58:30', 'TÔN VINH VẺ ĐẸP THUẦN KHIẾT', '', 'Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý.', ''),
(153, NULL, NULL, 'https://livexoso.com/', 1, 1, '', '62074vodkaabsolutjewelryblackbackgroundrings-8026.jpg', '62074vodkaabsolutjewelryblackbackgroundrings-8026_1349x650.jpg', 'TRANG SỨC CAO CẤP', NULL, NULL, '', '2018-08-06 10:41:01', '2018-08-30 16:57:30', 'TÔN VINH VẺ ĐẸP THUẦN KHIẾT', '', 'Trang sức (hay còn gọi là nữ trang, là những đồ dùng trang trí cá nhân, ví dụ như: vòng cổ, nhẫn, vòng đeo tay, khuyên, thường được làm từ đá quý, kim loại quý.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_post`
--

CREATE TABLE `table_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_list` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `highlight` int(11) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `view` int(11) DEFAULT '0',
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_vi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_post`
--

INSERT INTO `table_post` (`id`, `id_cat`, `id_list`, `id_item`, `id_sub`, `type`, `highlight`, `photo`, `thumb`, `slug`, `title`, `keywords`, `description`, `icon`, `color`, `number`, `shows`, `datecreate`, `dateupdate`, `view`, `name_vi`, `content_vi`, `name_en`, `content_en`, `description_vi`, `description_en`) VALUES
(1, 2, 2, 4, 0, 'post', 1, 'clqzek201402x464-7928.png', 'clqzek201402x464-7928_173.275862069x200.png', 'vong-deo-tay-bang-cao-su', 'Vòng đeo tay bằng cao su', 'Vòng đeo tay bằng cao su', 'Vòng đeo tay bằng cao su', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 0, 0, 0, 0, 'duan', 1, 'azthanglong-2652.jpg', 'azthanglong-2652_470x315.jpg', '300-mau-cua-nhom-cao-cap-nhap-khau', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 2, 4, 0, 'post', 1, 'clqzek201402x464-3231.png', 'clqzek201402x464-3231_173.275862069x200.png', 'vong-deo-tay-bang-cao-su', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 2, 4, 0, 'post', 1, 'clq749k07402x464-2236.png', 'clq749k07402x464-2236_173.275862069x200.png', 'vai-chui-siden', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, 5, 0, 0, 'post', 1, 'clq6lkh402x464-8234.png', 'clq6lkh402x464-8234_173.275862069x200.png', 'bao-bi-gan-tay', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 4, 5, 6, 0, 'post', 1, 'clq749k07402x464-2410.png', 'clq749k07402x464-2410_173.275862069x200.png', 'may-dem-tien-xiudun-4688-new', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 5, 0, 0, 'post', 1, 'clq749k07402x464-4435.png', 'clq749k07402x464-4435_173.275862069x200.png', 'duoi-500k', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 5, 5, 0, 0, 'post', 1, 'clq6lkh402x464-3516.png', 'clq6lkh402x464-3516_173.275862069x200.png', 'vong-xep-02', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 5, 6, 0, 'post', 1, 'thuysi-1443.jpg', 'thuysi-1443_260x195.jpg', 'hoi-thao-du-hoc-thuy-si-dam-bao-thuc-tap-huong-luong-cao', 'Sinh viên và quý phụ huynh có cơ hội nhận những món quà xinh xắn', 'Sinh viên và quý phụ huynh có cơ hội nhận những món quà xinh xắn', 'Khi đến với Hội thảo, Sinh viên và quý phụ huynh có cơ hội nhận những món quà xinh xắn, hấp dẫn; được tư vấn miễn phí theo nhu cầu. Ngoài ra, những sinh viên đủ điều kiện Visa du học sẽ được miến phí Visa và được nhận học bổng 2000CHF.', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, 0, 0, 0, 'post', 0, 'contact-5746.png', 'contact-5746_221.78217821782x200.png', 'xuyen-ham-800-m-de-cuu-2-cong-nhan-mo-mac-ket', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, 10, 0, 0, 'product', 0, '810original-7561.jpg', '810original-7561_112.676056338x200.jpg', 'chao-mung-den-voi-yen-chi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 0, 0, 0, 0, 'duan', 1, 'azthanglong-8449.jpg', 'azthanglong-8449_470x315.jpg', 'cong-trinh-kinh-nha-pho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 0, 0, 0, 0, 'duan', 1, 'kimvankimlupctq11-8854.jpg', 'kimvankimlupctq11-8854_470x315.jpg', 'cong-trinh-kinh-nha-pho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 0, 0, 0, 0, 'kieumoi', 0, 'xuhuongthietkenoithat2018sofa-8780.jpg', 'xuhuongthietkenoithat2018sofa-8780_250x200.jpg', '10-xu-huong-thiet-ke-noi-that-an-tuong-nam-2018', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '10 XU HƯỚNG THIẾT KẾ NỘI THẤT ẤN TƯỢNG NĂM 2018', '<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Hòa theo dòng chảy của nền kiến trúc đương đại, những mẫu nội thất cũng đang dần chuyển mình thích nghi. Một mặt vẫn đảm bảo được tính thẩm mĩ, đồng thời chúng còn tôn lên được cá tính của gia chủ. Hãy cùng Dr. House điểm qua những xu hướng thiết kế nội thất đang lên ngôi trong năm 2018 này nhé!</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">1. Độc đáo và cá tính với nội thất cửa xoay</span></span></strong></span></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-cua-xoay.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Nội thất cửa xoay là <a href=\"https://drhouse.com.vn/\"><span style=\"text-decoration:none;text-underline:none;\"><span style=\"color:black;\">xu hướng thiết kế mới 2018</span></span></a></span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Nội thất cửa xoay nếu trước đây bạn chỉ có thể bắt gặp trong các trung tâm thương mại hay tòa nhà cao tầng thì nay trào lưu này đã thâm nhập vào trong các không gian kiến trúc nội thất gia đình hiện đại. Kiểu cửa xoay này mang đến sự độc đáo và cá tính cho gia chủ. Ngoài ra chúng cũng đảm bảo độ an toàn cao trong sử dụng. Do đó, nội thất cửa xoay đang ngày càng phổ biến trong việc chọn lựa thiết kế của các gia đình đô thị hiện nay</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">2.Tường sọc ngang</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Tường sọc ngang đang là xu hướng lên ngôi trong năm 2018</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Tường và các vật dụng sọc ngang ngày càng trở nên phổ biến và thân thuộc </span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Thiết kế nhà này không chỉ có tường mà còn mái ngói, đồ nội thất cũng sử dụng sọc trắng. Chỉ với một chút sáng tạo chủ nhân đã thay đổi từ sọc ngang thành dọc nhưng vẫn đảm bảo tính thẩm mỹ và hài hòa cho không gian.</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">3. Phong cách công nghiệp</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Phong cách công nghiệp được nhắc đến nhiều trong những năm trở lại đây với lối thiết kế hiện đại và đầy mạnh mẽ.</span></span></span></p>\r\n\r\n<p style=\"margin-bottom: 7.5pt; line-height: 20.25pt; background: white; text-align: center;\"> </p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/c%C3%A2y-xanh-trong-nh%C3%A0.jpg\" /></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Những sàn bê tông cứng chắc hay những sàn gỗ tự nhiên với nét mộc mạc gần như không có yếu tố màu sắc hay họa tiết sẽ là những điểm thường thấy trong phong cách công nghiệp.</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">4. Nội thất bọc nhung tạo cảm giác ấm cúng dễ chịu</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\"><a href=\"https://drhouse.com.vn/category/tu-van-vi/\"><span style=\"text-decoration:none;text-underline:none;\"><span style=\"color:black;\">Xu hướng thiết kế nội thất </span></span></a>chưa bao giờ lỗi thời là những bộ ghế sofa bọc nhung êm ái. Xu hướng nội thất này có thời gian được đánh giá là lỗi mốt nhưng theo dòng chảy xoay vòng của các phong cách thiết kế nội thất, ghế sofa bọc nhung đã quay trở lại và lợi hại hơn với những màu sắc mạnh đầy ấn tượng</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-sofa.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Ghế sofa êm ái vẫn là xu hướng được ưa chuộng 2018</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">5. Nhà trong vườn, vườn trong nhà</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-vuon-1024x683.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Nhà vườn thanh bình, yên ả giữa lòng phố</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Xu hướng nội thất hòa mình vào thiên nhiên đang chiếm vị thế áp đảo trong các trào lưu nội thất hiện nay và dự báo nhu cầu này sẽ còn gia tăng trong những năm sắp tới trong các kiến trúc của những ngôi nhà phố thị</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">6. Hoa văn đồ họa hình học</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-do-thi-hinh-hoc.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Xu hướng đồ họa hình học với những mảng tường trang trí ấn tượng</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Đồ họa hình học là xu hướng không mới nhưng vẫn còn đang rất “hot” và dự báo sẽ là một trong những lựa chọn yêu thích của các cặp vợ chồng trẻ hiện nay. Với việc lựa chọn xu hướng này thì bạn phải khéo léo chọn ga, thảm, giấy dán tường và rèm cửa sao cho hài hòa với toàn bộ thiết kế nội thất trong căn nhà</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">7. Giấy dán tường</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-giay-dan-tuong-1024x937.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Giấy dán tường ton sur ton với vật dụng nội thất làm không gian hài hòa, tươi tắn</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Xu hướng giấy dán tường bạn có biết đã thịnh hành từ thế kỉ thứ 20 và vẫn còn giữ vững phong độ của mình đến tận hôm nay. Tuy nhiên, hiện nay, giấy dán tường với nhiều kiểu dáng, hoa văn bắt mắt và tinh tế, chất liệu bền đẹp. Một số loại còn có khả năng chống thấm, chống ẩm mốc giúp cho gia chủ dễ dàng lựa chọn cho mình một thiết kế ưng ý cho tất cả các phòng, thậm chí là phòng tắm</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">8. Phòng tắm vintage hoài cổ</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Phòng tắm đôi khi bị quên lãng tuy nhiên, trong năm 2018 này, bạn hãy tạo điểm nhấn cho ngôi nhà của mình bằng cách trang bị phòng tắm với các thiết bị cao cấp cùng thiết kế theo phong cách vintage cổ điển, ngọt ngào đầy hấp dẫn</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/xu-huong-thiet-ke-noi-that-2018-phong-tam-vintage.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Phòng tắm vintage tôn lên vẻ đẹp cổ điển, cuốn hút</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><strong><span style=\"color:#942121;\"><span style=\"font-size:21.0pt;\">9. Xi măng trần và các loại gạch</span></span></strong></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt; line-height:20.25pt; background:white; text-align:center\"><img alt=\"\" src=\"https://drhouse.com.vn/wp-content/uploads/2017/12/gach-tran-trong-thiet-ke-noi-that-va-ngoai-that.jpg\" /></p>\r\n\r\n<p align=\"center\" style=\"margin-bottom:7.5pt;text-align:center;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><em><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Gạch trần trong thiết kế nội thất đẹp</span></span></em></span></p>\r\n\r\n<p style=\"margin-bottom:7.5pt;text-align:justify;line-height:20.25pt;background:white;\"><span style=\"font-family:verdana,geneva,sans-serif;\"><span style=\"color:black;\"><span style=\"font-size:10.5pt;\">Thiết kế xi măng cùng gạch có phần hơi thô nhưng qua bàn tay điêu luyện cùng khả năng sáng tạo tài hoa của các kiến trúc sự, không gian như thổi bừng sức sống. Lối thiết kế này thường hay đi kèm với phong cách công nghiệp mang lại hiệu ứng thẩm mĩ cao. Hơn nữa, bạn còn có thể kết hợp cặp đôi này với những nguyên liệu tự nhiên như gỗ và đá cũng tạo ra những tác phẩm đầy mê hoặc.</span></span></span></p>\r\n\r\n<p style=\"text-align: right;\"><em>Nguồn: Dr.House</em></p>\r\n', NULL, NULL, NULL, NULL),
(192, 0, 0, 0, 0, 'visao', 0, '', '', 'thanh-toan-de-dang-an-toan-bao-mat-cao', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 0, 0, 0, 0, 'chinhsach', 0, 'nhanvienhanhchinhvanphong-3612.png', 'nhanvienhanhchinhvanphong-3612_250x250.png', 'chinh-sach-bao-hanh', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-10 08:38:58', 1, 'Chính sách bảo hành', '', '', '', '', ''),
(195, 0, 0, 0, 0, 'chinhsach', 0, '1367404605549-3201.jpg', '1367404605549-3201_250x250.jpg', 'chinh-sach-thanh-toan', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-10 08:38:45', 6, 'Chính Sách Thanh Toán', '', '', '', '', ''),
(207, 0, 0, 0, 0, 'thongtin', 0, 'v2-3232.png', 'v2-3232_40x40.png', 'noi-that-tai-xuong-tiet-kiem-chi-phi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 0, 0, 0, 0, 'thongtin', 0, 'v1-5793.png', 'v1-5793_40x40.png', 'thiet-ke-mot-khong-gian-ung-y', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 0, 0, 0, 0, 'thongtin', 1, 'v3-8587.png', 'v3-8587_40x40.png', 'dich-vu-tron-goi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 0, 0, 0, 0, 'dichvu', 1, 'image-1-48.jpg', 'image-1-48_250x200.jpg', 'phu-kien-trang-tri-noi-that', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-07 09:21:45', 0, 'PHỤ KIỆN TRANG TRÍ NỘI THẤT', '', '', '', 'Đây là phần công đoạn có vai trò quyết định. Các phần về điện, nước, đóng trần, hoàn thiện các góc cạnh, mảng tường, trang trí lắp đặt các vật tư trong không gian sống. Hoàn thiện nhà xây thô có thể là bước đầu để tạo nên một ngôi nhà đẹp', ''),
(184, 0, 30, 0, 0, 'hoidap', 0, 'hinhanhgt-2532.jpg', 'hinhanhgt-2532_200x160.jpg', 'yeu-cau-lay-hang-nhu-the-nao', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 0, 30, 0, 0, 'hoidap', 0, 'slide-1971.jpg', 'slide-1971_200x160.jpg', 'lay-hang-co-mat-phi-khong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 0, 32, 0, 0, 'hoidap', 0, 'slide-1112.jpg', 'slide-1112_200x160.jpg', 'lay-hang-co-mat-phi-khong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 0, 30, 0, 0, 'hoidap', 0, 'hinhanhgt-4514.jpg', 'hinhanhgt-4514_200x160.jpg', 'khach-hang-tinh-muon-ship-hang-re-nhan-hang-di-giao-phai-lam-nhu-the-nao', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 0, 0, 0, 0, 'visao', 0, '', '', 'giao-hang-toan-quoc-nhan-hang-thanh-toan-tien-tai-nha', '', '', '', '', '', 1, 1, '2015-07-27 06:29:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 0, 0, 0, 0, 'visao', 0, '', '', 'cam-ket-san-pham-gia-tot-canh-tranh', '', '', '', '', '', 1, 1, '2015-07-27 06:46:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 0, 0, 0, 0, 'visao', 0, '', '', 'dich-vu-cham-soc-khach-hang-online-qua-hotline-247', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2015-07-28 08:57:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 0, 0, 0, 0, 'chinhsach', 0, 'imageurl-4445.jpg', 'imageurl-4445_250x250.jpg', 'giao-hang-tan-noi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-10 08:39:06', 0, 'Giao hàng tận nơi', '', '', '', '', ''),
(191, 0, 0, 0, 0, 'visao', 0, '', '', 'dam-bao-hang-hoa-xuat-su-ro-rang-san-pham-chat-luong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cau-hoi-thuong-gap', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 0, 0, 0, 0, 'duan', 1, 'kimvankimlupctq11-9910.jpg', 'kimvankimlupctq11-9910_470x315.jpg', 'cua-nhom-cao-cap', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2015-05-19 20:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 0, 0, 0, 0, 'duan', 1, 'duancanhocitihomebabylonquan2catlai010420165241-7902.jpg', 'duancanhocitihomebabylonquan2catlai010420165241-7902_470x315.jpg', 'cong-trinh-kinh-nha-pho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-ten-mien', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-san-pham', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-email', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-san-pham', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-san-pham', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 0, 0, 0, 0, 'cauhoi', 0, '', '', 'cac-hoi-dap-ve-email', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 0, 0, 0, 0, 'canbiet', 0, '', '', 'quy-dinh-su-dung-dich-vu', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 0, 0, 0, 0, 'canbiet', 0, '', '', 'chinh-sach-rieng-tu', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 0, 0, 0, 0, 'canbiet', 0, '', '', 'tu-van-chon-hosting', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 0, 0, 0, 0, 'canbiet', 0, '', '', 'tu-van-chon-ten-mien-dep', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 0, 0, 0, 0, 'canbiet', 0, '', '', 'tu-van-thiet-ke', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 0, 0, 0, 0, 'canbiet', 0, '', '', 'huongd-an-thanh-toan', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 0, 0, 0, 0, 'canbiet', 0, '', '', 'y-nghia-phan-duoi-ten-mien', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 0, 0, 0, 0, 'phongthuy', 0, 'hinh2-2279.jpg', 'hinh2-2279_200x160.jpg', 'bep-va-cong-trong-phong-thuy-nha-o', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 0, 0, 0, 0, 'phongthuy', 1, 'hinh4-230.jpg', 'hinh4-230_200x160.jpg', 'bo-tri-phong-thuy-ban-tho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 0, 0, 0, 0, 'thongtin', 1, 'v4-1192.png', 'v4-1192_40x40.png', 'chat-luong-vuot-troi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 0, 0, 0, 0, 'gioithieu', 0, 'guongchieuhauhaibenthanotochevroletthudo-4508.jpg', 'guongchieuhauhaibenthanotochevroletthudo-4508_275x180.jpg', 'gioi-thieu-cong-ty', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 0, 0, 0, 0, 'gioithieu', 0, 'bmw6seriesgrancoupe131232e1c-3776.jpg', 'bmw6seriesgrancoupe131232e1c-3776_275x180.jpg', 'so-do-to-chuc', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 0, 0, 0, 0, 'banggia', 0, 'banggia2-7413.png', 'banggia2-7413_73x64.png', 'bao-gia-sua-chua-nha', 'BÁO GIÁ SỬA CHỮA NHÀ', 'BÁO GIÁ SỬA CHỮA NHÀ', 'Các bạn đang muốn sửa chữa nhà của mình, hãy đến với Công ty xây dựng Việt Thắng - công ty chúng tôi sẽ giúp các bạn giải đáp về mọi thắc mắc về việc cải tạo, tân trang lại nhà cửa | Liên Hệ : 0909 017 969', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 0, 0, 0, 0, 'banggia', 0, 'banggia1-8260.png', 'banggia1-8260_73x64.png', 'bao-gia-thi-cong-phan-tho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 0, 0, 0, 0, 'banggia', 0, 'gt10-5170.jpg', 'gt10-5170_73x64.jpg', 'bao-gia-xay-nha-tron-goi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 0, 25, 0, 0, 'xaydung', 1, 'hinh8-904.png', 'hinh8-904_202x182.png', 'nha-pho-dep-quan-tan-binh', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 0, 18, 0, 0, 'xaydung', 1, 'hinh7-3102.png', 'hinh7-3102_202x182.png', 'xay-dung-nha-pho-chuyen-nghiep', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 0, 26, 0, 0, 'thietke', 1, 'ssn-9637.jpg', 'ssn-9637_202x182.jpg', 'son-sua-nha-gia-re', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 0, 26, 0, 0, 'thietke', 1, 'dv-1347.jpg', 'dv-1347_202x182.jpg', 'dich-vu-sua-chua-nha-chuyen-nghiep-tai-hcm', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 0, 0, 0, 0, 'phongthuy', 0, 'hinh3-8702.jpg', 'hinh3-8702_200x160.jpg', 'vi-tri-dat-may-tinh-va-tv-trong-nha', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 0, 0, 0, 0, 'phongthuy', 0, 'hinh1-3880.jpg', 'hinh1-3880_200x160.jpg', 'chon-huong-cong-mo-cong-va-cach-khac-phuc-huong-cong-theo-phong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 0, 0, 0, 0, 'tuyendung', 0, 'td-9823.png', 'td-9823_200x160.png', 'tuyen-ky-su-xay-dung', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 0, 0, 0, 0, 'hdxahoi', 0, 'kn-887.png', 'kn-887_200x160.png', 'hoat-dong-thien-nguyen', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 0, 0, 0, 0, 'knxaydung', 1, 'hinh-14-7324.jpg', 'hinh-14-7324_202x182.jpg', 'dich-vu-sua-chua-nha', 'Dịch Vụ Sửa Chữa Nhà', 'Dịch Vụ Sửa Chữa Nhà', 'Dịch vụ sửa chũa nhà là một trong những dịch vụ được ưa chuộng nhất tại công ty chúng tôi, các bạn đang phải sống trong những ngôi nhà xuống cấp, bong tróc, tường nứt.. Những đều này không chỉ ảnh hưởng đến chất lượng đến cuộc sống của bạn hãy gọi cho chúng tôi : 0909 017 969', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 0, 0, 0, 0, 'knxaydung', 1, 'hinh-41-1472.jpg', 'hinh-41-1472_202x182.jpg', 'sua-chua-nha-cap-4', 'SỬA CHỮA NHÀ CẤP 4', 'SỬA CHỮA NHÀ CẤP 4', 'Bạn đang sống trong một ngôi nhà cấp 4 và đang có tình trạng xuống cấp, bạn mong muốn mình có một ngôi nhà mới thoải mái và tiện nghi hơn và  đang có ý nghĩ sẽ đập bỏ và xây lại, tuy nhiên đây là điều hoàn toàn sai lầm. Hãy gọi chúng tôi để được tư vấn kỷ hơn.', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 0, 0, 0, 0, 'knxaydung', 1, 'hinh-42-9119.jpg', 'hinh-42-9119_202x182.jpg', 'dich-vu-sua-chua-nha-tai-tphcm', 'DỊCH VỤ SỬA CHỮA NHÀ TẠI TP.HCM', 'DỊCH VỤ SỬA CHỮA NHÀ TẠI TP.HCM', 'Dịch vụ sửa chữa nhà tại Sài Gòn đang được rất nhiều khách hàng lựa chọn sử dụng vì những tiện lợi mà chúng mang lại. Tuy nhiên, chúng chỉ thật sự tiện ích khi khách hàng lựa chọn đúng một đơn vị sửa chữa uy tín.', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 0, 0, 0, 0, 'tuyendung', 0, '', '', 'tuyen-ke-toan', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 0, 0, 0, 0, 'tuyendung', 0, 'giithieu-8383.png', 'giithieu-8383_250x200.png', 'tuyen-nhan-su', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 0, 0, 0, 0, 'vandongvien', 0, '1848352-6549.jpg', '1848352-6549_189.96960486322x250.jpg', 'hoang-thi-phuong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 0, 0, 0, 0, 'vandongvien', 0, 'a41423376135575-6534.jpg', 'a41423376135575-6534_174.33751743375x250.jpg', 'mai-trang', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 0, 0, 0, 0, 'vandongvien', 0, 'kieu0408112010-4130.jpg', 'kieu0408112010-4130_181.66666666667x250.jpg', 'phuong-thy', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 0, 0, 0, 0, 'vandongvien', 0, 'a41423376135575-373.jpg', 'a41423376135575-373_174.33751743375x250.jpg', 'mai-nha', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 0, 0, 0, 0, 'thicong', 0, '1zvzh-574.jpg', '1zvzh-574_250x140.5.jpg', 'thi-cong-lap-dat-camera-quan-sat', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 0, 0, 0, 0, 'thicong', 0, 'imgf8f86649d6lapdatcamerachongtromtaibinhduong-7367.jpg', 'imgf8f86649d6lapdatcamerachongtromtaibinhduong-7367_250x207.5.jpg', 'thiet-ke-lap-dat-cac-he-thong-an-ninh-camera', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 0, 0, 0, 0, 'thicong', 0, '1315270623trom-7003.jpg', '1315270623trom-7003_250x165.jpg', 'thi-cong-he-thong-chong-trom', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 0, 0, 0, 0, 'thicong', 0, '1358501362cot-cs-9243.jpg', '1358501362cot-cs-9243_250x187.5.jpg', 'thi-cong-lap-dat-he-thong-chong-set', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 0, 18, 0, 0, 'xaydung', 1, 'hinh3-2685.png', 'hinh3-2685_202x182.png', 'xay-dung-nha-pho-hien-dai', 'Xây dựng nhà phố hiện đại', 'Xây dựng nhà phố hiện đại', 'Xây dựng nhà phố hiện đại', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 0, 25, 0, 0, 'xaydung', 1, 'hinh2-643.png', 'hinh2-643_202x182.png', 'xay-dung-nha-dep-phong-cach-thai', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 0, 18, 0, 0, 'xaydung', 1, 'hinh1-779.png', 'hinh1-779_202x182.png', 'nha-noi-that-chau-au', 'Nhà nội thất Châu Âu', 'Nhà nội thất Châu Âu', 'Nhà nội thất Châu Âu', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 0, 0, 0, 0, 'knxaydung', 1, 'suachuanhagiare1-4693.jpg', 'suachuanhagiare1-4693_202x182.jpg', 'sua-chua-nha-trung-cu', 'SỬA CHỮA NHÀ CHUNG CƯ', 'SỬA CHỮA NHÀ CHUNG CƯ', 'Một chung cư đẹp và sang trọng không hoàn toàn thuộc về vật tư cao cấp mà chúng còn được tạo nên bởi những thiết kế tinh tế, bài trí đẹp mắt và sử dụng các công năng một cách hợp lý. hãy gọi chúng tôi để được tư vấn miễn phí | Hotline: 0909 017 9696', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 0, 18, 0, 0, 'xaydung', 1, 'hinh6-302.png', 'hinh6-302_202x182.png', 'xay-dung-nha-pho-4-tang-quan-12', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 0, 18, 0, 0, 'xaydung', 1, 'hinh5-6238.png', 'hinh5-6238_202x182.png', 'xay-dung-nha-pho-sang-trong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 0, 18, 0, 0, 'xaydung', 1, 'hinh4-5355.png', 'hinh4-5355_202x182.png', 'xay-dung-nha-pho-3-tang', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 0, 26, 0, 0, 'thietke', 1, 'vp-5305.jpg', 'vp-5305_202x182.jpg', 'sua-chua-van-phong-thay-doi-khong-gian-cong-so', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 0, 26, 0, 0, 'thietke', 1, 'ch-3781.JPG', 'ch-3781_202x182.jpg', 'cong-trinh-nha-o-cong-hoa', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 0, 27, 0, 0, 'thietke', 1, 'nc-8075.jpg', 'nc-8075_202x182.jpg', 'sua-chua-nha-chuyen-nghiep-nhanh-chong', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 0, 27, 0, 0, 'thietke', 1, 'nb-9092.jpg', 'nb-9092_202x182.jpg', 'sua-chua-nha-bep', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 0, 27, 0, 0, 'thietke', 1, 'gr-7521.jpg', 'gr-7521_202x182.jpg', 'sua-nha-gia-re-viet-thang', 'SỬA NHÀ GIÁ RẺ VIỆT THẮNG', 'SỬA NHÀ GIÁ RẺ VIỆT THẮNG', 'Bạn đang phải sống trong một ngôi nhà có hiện tượng xuống cấp, ảnh hưởng không nhỏ đến chất lượng cuộc sống của gia đình, bạn đang muốn nâng cấp ngôi nhà mình để có cuộc sống tốt hơn, thoải mái và tiện nghi hơn. Tuy nhiên, vấn đề là số tiền trong tay bạn không quá nhiều để sửa chữa nhà hãy gọi cho chúng tôi | Hotline : 0909 017 969', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 0, 0, 0, 0, 'knxaydung', 1, 'suachuanhagiare01-5371.jpg', 'suachuanhagiare01-5371_202x182.jpg', 'sua-chua-nha-co-can-phai-xin-giay-phep', 'Sửa Chữa Nhà Có Cần Phải Xin Giấy Phép', 'Sửa Chữa Nhà Có Cần Phải Xin Giấy Phép', 'Chúng tôi là công ty xây dựng có đội ngủ kỹ sư, và kiến trúc sư có nhiều năm kinh nghiệm, và quan trọng nhất là có tâm trong nghề, thời gian qua chúng tôi đã thiết kế và thi công sửa chữa hàng trăm căn nhà tại tp HCM Hãy gọi chúng tôi : 0909 017 969', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 0, 0, 0, 0, 'thicong', 0, 'tuvanthietkecungcaplapdathethongdienlanh1-4875.png', 'tuvanthietkecungcaplapdathethongdienlanh1-4875_250x145.41547277937.png', 'thi-cong-he-thong-dien', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 0, 0, 0, 0, 'thicong', 0, 'img0389-1-922.JPG', 'img0389-1-922_250x187.5.jpg', 'thi-cong-he-thong-pccc', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 0, 0, 0, 0, 'thicong', 0, 'img0404-7197.JPG', 'img0404-7197_250x187.5.jpg', 'he-thong-bao-chay-chua-chay', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 0, 0, 0, 0, 'chinhsach', 0, '1436751381tuvantuyensinhtienganh166-2105.jpg', '1436751381tuvantuyensinhtienganh166-2105_250x250.jpg', 'chinh-sach-tra-hang', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-10 08:33:25', 1, 'Chính sách trả hàng', '', '', '', '', ''),
(202, 0, 0, 0, 0, 'vanchuyen', 0, 'i2-675.png', 'i2-675_100x100.png', 'tiep-nhan-cuoc-goi', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 0, 39, 0, 0, 'vechungtoi', 0, 'logo-7552.png', 'logo-7552_250x200.png', 'gioi-thieu-cong-ty', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'GIỚI THIỆU CÔNG TY', '<div class=\"thanh_gt\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: UTMCaviar; font-size: 14px;\">\r\n<h2 style=\"box-sizing: border-box; margin: 10px 0px; padding: 0px; outline: none; font-family: RobotoCondensed; font-size: 36px; color: rgb(31, 36, 255); text-align: center; text-transform: capitalize;\">Giới Thiệu <span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; color: rgb(0, 0, 0);\">La Cà Quán Vũng Tàu</span></h2>\r\n</div>\r\n\r\n<div class=\"noidung_gt\" style=\"box-sizing: border-box; margin: auto; padding: 0px; outline: none; width: 580px; color: rgb(0, 0, 0); font-family: UTMCaviar; font-size: 14px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-size: 20px;\"><span new=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: \" times=\"\">Quán La Cà Vũng Tàu xin kính chào quý khách!</span></span></p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-size: 20px;\"><span new=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: \" times=\"\">Quán La Cà được xây dựng năm 2012 với địa chỉ đầu tiên tại 652 Đường 30-4 TP. Vũng Tàu. Hiện tại, La Cà Quán có ba quán nằm trên ba trục đường chính của thành phố là đường 652, Đường 30-4, số 3 đường Lê Hồng Phong, số 600 đường Bình Giã. La Cà quán là điểm đến thân thuộc của nhiều người dân thành phố Vũng Tàu những dịp cuối tuần và buổi tối các ngày trong tuần.</span></span></p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-size: 20px;\"><span new=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: \" times=\"\"> Với đội ngũ nhân viên thân thiện, vui vẻ và nhiệt tình. Nguồn hải sản tươi sống đánh bắt trong ngày chế biến theo kiểu ẩm thực truyền thống miền biển mà La Cà Quán luôn níu chân thực khách tại Vũng Tàu và khách du lịch từ trong và  ngoài nước khi đến Vũng Tàu du lịch.</span></span></p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-size: 20px;\"><span new=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: none; font-family: \" times=\"\">Tiêu chí của quán</span></span></p>\r\n</div>\r\n', NULL, NULL, NULL, NULL),
(199, 0, 0, 0, 0, 'hotro', 0, '', '', 'cam-ket-chat-luong', '', '', '', 'fab fa-asymmetrik', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 0, 0, 0, 0, 'dichvu', 1, 'banbinhdungtrasuagiarebinhdungtrasuainoxgiulanh8l1-183.jpg', 'banbinhdungtrasuagiarebinhdungtrasuainoxgiulanh8l1-183_250x200.jpg', 'thiet-ke-noi-that', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-07 09:21:40', 1, 'THIẾT KẾ NỘI THẤT', '', '', '', 'Đây là phần công đoạn có vai trò quyết định. Các phần về điện, nước, đóng trần, hoàn thiện các góc cạnh, mảng tường, trang trí lắp đặt các vật tư trong không gian sống. Hoàn thiện nhà xây thô có thể là bước đầu để tạo nên một ngôi nhà đẹp', ''),
(201, 0, 0, 0, 0, 'dichvu', 1, '140958061446129762069049101360204836670336n-7034.jpg', '140958061446129762069049101360204836670336n-7034_250x200.jpg', 'hoan-thien-phan-tho', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-08-07 09:21:35', 2, 'HOÀN THIỆN PHẦN THÔ', '<p>Đây là phần công đoạn có vai trò quyết định. Các phần về điện, nước, đóng trần, hoàn thiện các góc cạnh, mảng tường, trang trí lắp đặt các vật tư trong không gian sống. Hoàn thiện nhà xây thô có thể là bước đầu để tạo nên một ngôi nhà đẹp. Chính vì vậy khi thi công phần thô cần được tính toán chi tiết theo kế hoạch.</p>\r\n', '', '', 'Đây là phần công đoạn có vai trò quyết định. Các phần về điện, nước, đóng trần, hoàn thiện các góc cạnh, mảng tường, trang trí lắp đặt các vật tư trong không gian sống. Hoàn thiện nhà xây thô có thể là bước đầu để tạo nên một ngôi nhà đẹp', ''),
(203, 0, 0, 0, 0, 'vanchuyen', 0, 'i1-7992.png', 'i1-7992_100x100.png', 'khao-sat-bao-gia-ky-hop-dong', '', '', '', '', '', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 0, 0, 0, 0, 'vanchuyen', 0, 'i3-1260.png', 'i3-1260_100x100.png', 'dong-goi-thao-do-van-chuyen', '', '', '', '', '', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 0, 0, 0, 0, 'vanchuyen', 0, 'i4-2913.png', 'i4-2913_100x100.png', 'nghiem-thu-ban-giao', '', '', '', '', '', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 0, 0, 0, 0, 'hotro', 0, '', '', 'thanh-toan-tai-nha', '', '', '', 'fas fa-tachometer-alt', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 0, 0, 0, 0, 'hotro', 0, '', '', 'giao-hang-tan-noi', '', '', '', 'fas fa-shipping-fast', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 0, 0, 0, 0, 'hotro', 0, '', '', 'hotline-0903-362-027', '', '', '', 'fas fa-phone-square', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 0, 0, 0, 0, 'quytrinh', 0, '', '', 'tim-hieu-va-thao-luan-yeu-cau', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 0, 0, 0, 0, 'quytrinh', 0, '', '', 'de-xuat-thao-luan-phuong-an', '', '', '', '', '', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 0, 0, 0, 0, 'quytrinh', 0, '', '', 'duyet-phuong-an-thiet-ke', '', '', '', '', '', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 0, 0, 0, 0, 'quytrinh', 0, '', '', 'duyet-bao-gia-thi-cong', '', '', '', '', '', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 0, 0, 0, 0, 'quytrinh', 0, '', '', 'ky-hop-dong', '', '', '', '', '', 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 0, 0, 0, 0, 'thongtin', 0, 'v5-3795.png', 'v5-3795_40x40.png', 'nhan-dc-gia-tri-cao-hon-chi-phi-bo-ra', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 0, 0, 0, 0, 'thongtin', 0, 'v6-6778.png', 'v6-6778_40x40.png', 'cham-soc-khach-hang-toan-dien', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 0, 51, 0, 0, 'tintuc', 1, '62074vodkaabsolutjewelryblackbackgroundrings-9623.jpg', '62074vodkaabsolutjewelryblackbackgroundrings-9623_285x285.jpg', 'hfele-viet-nam-20-nam-tien-phong-sang-tao', '', '', '', '', '', 4, 1, '0000-00-00 00:00:00', '2018-08-08 04:30:35', 3, 'Häfele Việt Nam – 20 năm tiên phong sáng tạo', '', '', '', 'Công ty TNHH Häfele Việt Nam vừa chính thức khai trương Trung tâm Phân phối Sản phẩm lớn nhấttại Việt Nam', ''),
(232, 0, 0, 0, 0, 'tintuc', 1, 'newgcdntctrangscvngcthitrang-2311.jpg', 'newgcdntctrangscvngcthitrang-2311_285x285.jpg', 'hfele-viet-nam-tro-thanh-doi-tac-chinh-thuc-cua-clb-bayern-munich', '', '', '', NULL, NULL, 1, 1, '2018-07-28 19:05:29', '2018-08-08 04:30:08', 8, 'Häfele Việt Nam trở thành đối tác chính thức của CLB Bayern Munich', '<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 21px;\"><span style=\"line-height: 21px;\">Ngày 4/5/2017 vừa qua đã diễn ra buổi lễ long trọng tại Bangkok, Thái Lan nhằm công bố mối quan hệ hợp tác giữa hai thương hiệu danh tiếng từ Đức là Häfele và CLB bóng đá Bayern Munich. Theo đó, Häfele Việt Nam, cùng với Häfele Thái Lan & Häfele Ấn Độ, sẽ là đối tác khu vực chính thức (Official Regional Partner) của Bayern Munich trong vòng 03 năm tại Châu Á.   </span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 21px;\"><span style=\"line-height: 21px;\">Phát biểu tại buổi lễ ra mắt, ông Dominik Fruth - Tổng Giám Đốc của Häfele Việt Nam, Singapore và Malaysia - cho biết việc Häfele lựa chọn Bayern Munich để hợp tác đến từ nhiều giá trị tương đồng mà hai thương hiệu cùng chia sẻ như đặc tính cốt lõi của văn hóa Đức, mạng lưới khách hàng và fan hâm mộ toàn cầu, uy tín và chất lượng hàng đầu trong lĩnh vực chuyên môn của mỗi bên, cũng như niềm đam mê kiến tạo giá trị mới cho cộng đồng.  </span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 21px;\"><span style=\"line-height: 21px;\">Trong khi Häfele nổi tiếng với những giải pháp nội thất sáng tạo, chất lượng, hoạt động chuẩn xác nhưng dễ dàng tùy chỉnh theo nhu cầu của người dùng, thì Bayern Munich được hâm mộ bởi chiến thuật sáng tạo cũng như tốc độ, sự bền bỉ và dẻo dai trong thi đấu. Đặc biệt, đây còn là những thương hiệu được nhiều người biết đến nhờ sự quan tâm và thấu hiểu sâu sắc đối với khách hàng và người hâm mộ – ông Dominik nói.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 21px;\"><span style=\"line-height: 21px;\">Ông Jörg Wacker, thành viên Ban điều hành Quốc tế và Chiến lược của CLB Bayern Munich nói: “Chúng tôi vui mừng chào đón Häfele trở thành đối tác khu vực. Cả Bayern Munich và Häfele đều là những thương hiệu lớn ở Châu Á và tượng trưng cho chất lượng ‘made in Germany (xuất xứ Đức)’, vì thế đây là mối quan hệ hợp tác vô cùng hoàn hảo”.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 21px;\"><span style=\"line-height: 21px;\">Sự bắt tay giữa hai “người khổng lồ” đến từ Đức này không những giúp mở rộng sức ảnh hưởng của cả hai thương hiệu tại Châu Á nói chung mà còn mang lại nhiều lợi ích cho người hâm mộ bóng đá tại các nước, trong đó có Việt Nam, thông qua những hoạt động thú vị như các buổi họp mặt và giao lưu giữa fan hâm mộ trong nước với các huyền thoại bóng đá đến từ Bayern Munich. Bên cạnh đó, fan hâm mộ sẽ có cơ hội bay đến Đức để xem đội bóng yêu thích của mình thi đấu tại sân vận động Allianz (Munich), cũng như sở hữu quà lưu niệm như nón, áo có chữ ký của thần tượng.</span></span></p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\">“Sau 20 năm hoạt động tại Việt Nam, Häfele không chỉ hiểu rõ thói quen, nhu cầu của người tiêu dùng trong nước, mà còn cả những sở thích của họ, trong đó có sự đam mê cuồng nhiệt đối với bóng đá. Chúng tôi hy vọng mối quan hệ hợp tác với Bayern Munich sẽ mang đến cho người Việt Nam cơ hội tiếp cận câu lạc bộ danh tiếng thế giới, đồng thời hiểu thêm về những giá trị của văn hóa Đức” – ông Dominik nói.</span></p>\r\n', '', '', 'Phát biểu tại buổi lễ ra mắt, ông Dominik Fruth - Tổng Giám Đốc của Häfele Việt Nam, Singapore và Malaysia - cho biết việc Häfele lựa chọn Bayern Munich để hợp tác đến từ nhiều giá trị tương đồng mà hai thương hiệu cùng chia sẻ như đặc tính cốt lõi của văn hóa Đức', '');
INSERT INTO `table_post` (`id`, `id_cat`, `id_list`, `id_item`, `id_sub`, `type`, `highlight`, `photo`, `thumb`, `slug`, `title`, `keywords`, `description`, `icon`, `color`, `number`, `shows`, `datecreate`, `dateupdate`, `view`, `name_vi`, `content_vi`, `name_en`, `content_en`, `description_vi`, `description_en`) VALUES
(233, 0, 0, 0, 0, 'tintuc', 1, 'newfashionbraceletearringschokerdubaitrangscphkinntrangsc-6130.jpg', 'newfashionbraceletearringschokerdubaitrangscphkinntrangsc-6130_285x285.jpg', '', 'dfgdfg', 'dfgdf', 'gfg', NULL, NULL, 1, 1, '2018-07-28 19:06:51', '2018-08-30 15:05:55', 21, 'Trải nghiệm giải pháp bếp toàn diện từ Häfele', '<p style=\"margin: 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Tiếp nối thành công tại VietBuild TP HCM 2017 vừa qua, Häfele Việt Nam sẽ tiếp tục đồng hành cùng triển lãm hàng đầu trong lĩnh vực xây dựng, bất động sản và nội thất này tại Hà Nội từ ngày 10/11 đến ngày 14/11 với nhiều giải pháp tiên tiến dành cho không gian bếp.</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Đến với gian hàng của Häfele Việt Nam, khách tham quan sẽ có cơ hội trải nghiệm phong cách nổi tiếng của Đức qua những gian bếp trưng bày với thiết kế tối giản nhưng tinh tế và khoa học. Đặc biệt, các phụ kiện nội thất và sản phẩm gia dụng được sản xuất với công nghệ và tiêu chuẩn chất lượng của Châu Âu sẽ giúp người dùng nấu nướng, lau dọn và sắp xếp một cách dễ dàng và hiệu quả hơn.</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Bên cạnh đó, Häfele cũng giới thiệu các giải pháp quản lý ra vào nhà thông minh với các sản phẩm khóa điện tử nhiều chức năng tiên tiến như mở khóa bằng vân tay, Bluetooth, ứng dụng di động v.v. để mang đến sự tiện lợi tối đa cho người dùng.</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Đi cùng với vô số giải pháp tối ưu là nhiều hoạt động sôi nổi tại gian hàng như: chương trình đấu giá bếp hấp dẫn dành riêng cho khách dự triển lãm, thưởng thức các món ngon đặc sắc được chế biến từ những thiết bị bếp ưu tú của Häfele, cùng nhiều <a href=\"https://www.hafele.com.vn/vi/info/dich-vu/khuyen-mai/-u-i-c-bi-t/37714/\" style=\"color: rgb(215, 20, 64); text-decoration-line: none; background-color: transparent;\" target=\"_blank\">ưu đãi đặc biệt</a> dành cho các sản phẩm được trưng bày.   </p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Để tìm thấy những sản phẩm gia dụng chất lượng & đẳng cấp Châu Âu cũng như được tư vấn thêm về gian bếp trong mơ của mình, hãy ghé thăm gian hàng Häfele tại:</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><strong>Cung Triển lãm Kiến trúc – Quy hoạch Xây dựng Quốc gia</strong></p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">01 Đỗ Đức Dục, Nam Từ Liêm, Hà Nội</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Khu A5, gian hàng 858 – 866</p>\r\n\r\n<p style=\"margin: 10px 0px 0px; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\">Thời gian: 8:30 – 19:00 từ ngày 10/11 đến ngày 14/11/2017</p>\r\n', 'dfg', '<p>dfg</p>\r\n', 'Đến với gian hàng của Häfele Việt Nam, khách tham quan sẽ có cơ hội trải nghiệm phong cách nổi tiếng của Đức qua những gian bếp trưng bày với thiết kế tối giản nhưng tinh tế và khoa học', 'dfgfdg'),
(231, 0, 51, 0, 0, 'tintuc', 1, 'windchime-2731.jpg', 'windchime-2731_285x285.jpg', 'trien-lam-giai-phap-toan-dien-cho-khong-gian-song-tai-vietbuild-2018-tp-hcm', '', '', '', NULL, NULL, 1, 1, '2018-07-17 08:36:47', '2018-08-08 04:30:17', 2, 'Triển lãm giải pháp toàn diện cho không gian sống tại Vietbuild 2018 TP. HCM', '<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Từ ngày 21-25/6, Häfele Việt Nam tiếp tục tham gia tài trợ triển lãm VietBuild tại TP.HCM – một trong những sự kiện lớn nhất nước về xây dựng và nội thất. Đến với VietBuild lần này, Häfele giới thiệu một loạt những giải pháp tiên tiến và chất lượng dành cho không gian sống hiện đại, trong đó trọng tâm vẫn là không gian bếp.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Bốn gian bếp trưng bày tại gian hàng của Häfele mang thiết kế tối giản nhưng vẫn nổi bật nhờ sự kết hợp khéo léo các vật liệu cao cấp và màu sắc tinh tế. Đồng thời, các thiết bị bếp chất lượng Châu Âu cùng phụ kiện thông minh giúp tối ưu hóa công năng của bếp - từ lưu trữ, nấu nướng đến lau dọn.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Đặc biệt, phối hợp với các chuyên gia nội thất, Häfele còn mang đến dịch vụ tư vấn thiết kế và thi công bếp tại chỗ dành cho khách đến tham quan gian hàng. Cùng với đó là chương trình ưu đãi trọn bộ tủ bếp tặng kèm thiết bị chỉ với giá 50.000.000 VNĐ. </span> </span><span style=\"line-height: 16.1px;\">Xem chi tiết <a href=\"https://www.hafele.com.vn/INTERSHOP/static/WFS/Haefele-HVN-Site/-/Haefele-HVN/vi_VN/opentext/assets/HVN/Block_Kitchen_promotion.pdf\" style=\"color: rgb(215, 20, 64); text-decoration-line: none; background-color: transparent;\">tại đây!</a></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><strong><span style=\"line-height: 16.1px;\">Toàn diện giải pháp</span></strong></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Ngoài bếp, phòng tắm và cửa ra vào là hai không gian quan trọng khác của một ngôi nhà. Vì thế, năm nay Häfele trưng bày các thiết bị và phụ kiện phòng tắm nổi bật với thiết kế sang trọng và công nghệ hiện đại, mang đến sự thư giãn, thoải mái tối đa cho người dùng ngay cả trong những giây phút riêng tư nhất.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Trong khi đó, bộ sưu tập khóa điện tử thông minh dành cho nhà ở tiếp tục được Häfele mở rộng và phát triển. Các sản phẩm được tích hợp công nghệ tiên tiến nhất, cho phép người dùng mở khóa bằng nhiều cách như vân tay, Bluetooth, thẻ từ v.v. Người dùng cũng có thể kiểm soát hiệu quả ra vào từ xa với ứng dụng di động đi kèm và thiết lập thời hạn sử dụng cho mật mã.</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Bên cạnh các giải pháp là nhiều hoạt động sôi nổi tại gian hàng của Häfele như chương trình đấu giá bếp hấp dẫn dành riêng cho khách dự triển lãm, thưởng thức các món ngon đặc sắc được chế biến bởi Á Quân Top Chef Việt Nam 2014 Steven Long với các thiết bị bếp ưu tú của Häfele.   </span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\"><img alt=\"\" height=\"300\" src=\"https://www.hafele.com.vn/INTERSHOP/static/WFS/Haefele-HVN-Site/-/Haefele-HVN/vi_VN/opentext/assets/HVN/Banner-Vietbuild_VN.png\" srcset=\"\" style=\"vertical-align: middle; border: 0px; margin: 0px 10px 10px 0px;\" width=\"700\" /></span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><strong><span style=\"line-height: 16.1px;\">Gian hàng Häfele Việt Nam tại VietBuild 2018 TPHCM</span></strong></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Gian hàng số 445 – 456, Sảnh A2</span></span></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt; color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"line-height: 16.1px;\"><span style=\"line-height: 16.1px;\">Trung tâm hội chợ & triển lãm Sài Gòn SECC,</span></span></p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(0, 0, 0); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify; outline: 0px !important;\"><span style=\"color: rgb(85, 87, 91); font-family: Arial, sans-serif; font-size: 14px; line-height: 16.1px;\">Thời gian: 8:30 – 19:00 từ ngày 21/06 đến ngày 25/06/2018</span></p>\r\n', '', '', 'Ngoài bếp, phòng tắm và cửa ra vào là hai không gian quan trọng khác của một ngôi nhà. Vì thế, năm nay Häfele trưng bày các thiết bị và phụ kiện phòng tắm nổi bật với thiết kế sang trọng và công nghệ hiện đại', ''),
(223, 0, 38, 0, 0, 'mauthietke', 0, 'img1-2579.jpg', 'img1-2579_375x260.jpg', 'biet-thu-tan-co-dien', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'biệt thự tân cổ điển', '', NULL, NULL, NULL, NULL),
(225, 0, 36, 0, 0, 'mauthietke', 0, 'img2-8906.jpg', 'img2-8906_375x260.jpg', 'can-ho-hien-dai-the-park-b3', '', '', '', '', '', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'căn hộ hiện đại The Park  B3', '', NULL, NULL, NULL, NULL),
(226, 0, 37, 0, 0, 'mauthietke', 0, 'ht1-6411.jpg', 'ht1-6411_375x260.jpg', 'nha-hang-phong-cach-tan-co-dien', '', '', '', '', '', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'Nhà hàng phong cach tân cổ điển', '<p>Tại những khu vực thành thị hiện nay, đời sống của mọi người luôn luôn tất bật vì xoáy vào cuộc sống mưu sinh kiếm tiền khiến cho thời gian nghỉ ngơi ăn uống dành cho bản thân và gia đình dường như rất ít ỏi. Chính vì vậy mỗi khi có nhu cầu họ thường tìm đến những nhà hàng để thư giãn.Và cũng từ nhu cầu đó mà những nhà hàng từ nhỏ tới lớn sẽ được hình thành với nhiều lại hình dịch vụ khác nhau từ ăn uống cho tới giải trí. Đi sâu hơn nữa thì nhà hàng không chỉ còn là nơi giải quyết nhu cầu ẩm thực ăn uống vui chơi mà đó còn là nơi làm việc, làm ăn, hợp tác và xây dựng những mối quan hệ. Cũng vì vậy mà thiết kế nội thất nhà hàng đẹp và sang trọng là điều không thể thiếu của các chủ đầu tư theo ngành dịch vụ này.</p>\r\n', NULL, NULL, NULL, NULL),
(227, 0, 0, 0, 0, 'camnhan', 0, '1436751381tuvantuyensinhtienganh166-9619.jpg', '1436751381tuvantuyensinhtienganh166-9619_250x200.jpg', 'nguyen-ngoc-trinh', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'NGUYỄN NGỌC TRINH', '', NULL, NULL, NULL, NULL),
(228, 0, 0, 0, 0, 'camnhan', 0, '1367404605549-7256.jpg', '1367404605549-7256_250x200.jpg', 'ha-phuong-diem', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'HÀ PHƯƠNG DIỄM', '', NULL, NULL, NULL, NULL),
(229, 0, 0, 0, 0, 'camnhan', 0, 'nhanvienhanhchinhvanphong-6770.png', 'nhanvienhanhchinhvanphong-6770_250x200.png', 'nguyen-van-an', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2018-07-13 10:37:47', 0, 'Nguyễn Văn An', '', '', '', 'A JSON path targets values and can be used to extract or modify parts of a document. The JSON_EXTRACT() function demonstrates this by extracting one or more values:', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product`
--

CREATE TABLE `table_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_list` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `id_trademark` int(11) DEFAULT NULL,
  `id_promotion` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `tags` varchar(2000) DEFAULT NULL,
  `rate` int(10) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `highlight` int(11) DEFAULT NULL,
  `selling` int(11) DEFAULT NULL,
  `promotion` int(11) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `view` int(11) DEFAULT NULL,
  `attributes` text NOT NULL,
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_vi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_product`
--

INSERT INTO `table_product` (`id`, `id_cat`, `id_list`, `id_item`, `id_sub`, `id_trademark`, `id_promotion`, `size`, `tags`, `rate`, `type`, `highlight`, `selling`, `promotion`, `photo`, `thumb`, `code`, `amount`, `slug`, `title`, `keywords`, `description`, `price`, `oldprice`, `number`, `shows`, `datecreate`, `dateupdate`, `view`, `attributes`, `name_vi`, `content_vi`, `name_en`, `content_en`, `description_vi`, `description_en`) VALUES
(2, 0, 0, 0, 0, 0, 0, '', '', 0, 'tintuc', 0, 0, 0, '', '', '', 0, '', '', '', '', 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 0, 0, 0, 0, 0, '', '', 0, 'tintuc', 1, 0, 0, '', '', '', 0, '', '', '', '', 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 0, 56, 0, 0, 0, 0, '', '', 0, 'product', 1, 1, 1, 'wemle4oy-4709.jpg', 'wemle4oy-4709_285x285.jpg', '', 0, 'tra-sua-tran-chau', '', 'gỗ sấy biên hòa, mua gỗ sấy tại biên hòa, gỗ sồi ở biên hòa, mua gỗ sồi, gỗ sấy', 'Bạn cần mua gỗ, hãy liên hệ ngay với chúng tôi\r\nCÔNG TY TNHH ANH ĐỨC NGUYỄN\r\nMã số thuế: 3602470826\r\nĐịa chỉ: Số 47B/81, đường Xa Lộ Hà Nội, KP 12, Phường Hố Nai, Phường Hố Nai, Thành phố Biên Hoà, Đồng Nai\r\nĐiện thoại: 0933088889 \r\nGiám đốc: NGUYỄN TRỌNG ANH \r\nEmail: anhduc.nguyen_gobienhoa@gmail.com\r\nWebsite: gosaybienhoa.com', 20000, 0, 7, 1, '0000-00-00 00:00:00', '2018-08-06 11:44:04', 0, 'null', 'Trà sữa trân châu', '', '', '', '', ''),
(50, 0, 56, 0, 0, 0, 0, '', '', 0, 'product', 1, 1, 1, 'nhanvangnutrangsuccaocap4-6301.jpg', 'nhanvangnutrangsuccaocap4-6301_285x285.jpg', '', 0, 'tra-sua-tran-chau', '', 'gỗ sấy biên hòa, mua gỗ sấy tại biên hòa, gỗ sồi ở biên hòa, mua gỗ sồi, gỗ sấy', 'mua gỗ sấy ở đâu, mua gỗ sấy tại biên hòa, gỗ sấy biên hòa', 30000, 0, 6, 1, '0000-00-00 00:00:00', '2018-08-06 11:43:48', 0, 'null', 'Trà sữa trân châu', '', '', '', '', ''),
(51, 0, 56, 0, 0, 0, 0, '', '', 0, 'product', 1, 1, 1, 'eropibotrangsucbacperfectlove21-4744.png', 'eropibotrangsucbacperfectlove21-4744_285x285.png', '', 0, 'long-mi-chon-3d-fashion', '', 'gỗ sấy biên hòa, mua gỗ sấy tại biên hòa, gỗ sồi ở biên hòa, mua gỗ sồi, gỗ sấy', 'MUA GO TAI BIEN HOA, mua gỗ sấy ở biên hòa', 0, 0, 5, 1, '0000-00-00 00:00:00', '2018-08-06 11:43:31', 2, 'null', 'Lông Mi Chồn 3D Fashion', '', '', '', '', ''),
(52, 23, 55, 0, 0, 0, 0, '', '', 0, 'product', 1, 1, 1, 'logo-9945.png', 'logo-9945_480x360.png', '345', 0, '', 'load du an435345', 'gỗ sấy biên hòa, mua gỗ sấy tại biên hòa, gỗ sồi ở biên hòa, mua gỗ sồi, gỗ sấy435', 'MUA GỖ TẠI BIÊN HÒA, GỖ SẤY BIÊN HÒA 34545', 5100044, 345345, 4, 1, '0000-00-00 00:00:00', '2018-08-29 16:29:16', 48, 'null', 'Trà sữa trân châu thạch 345 345 ', '<p>345 35 </p>\r\n', '', '', '43 535 345', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_review`
--

CREATE TABLE `table_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `star` int(11) NOT NULL DEFAULT '1',
  `id_product` int(11) NOT NULL DEFAULT '0',
  `iduser` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `com` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_review`
--

INSERT INTO `table_review` (`id`, `type`, `star`, `id_product`, `iduser`, `ip`, `number`, `shows`, `datecreate`, `dateupdate`, `name`, `content`, `address`, `com`, `link`) VALUES
(1, NULL, 4, 76, 0, NULL, 1, 1, '2018-08-08 11:14:20', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgfdgfdg', NULL, 'san-pham', NULL),
(2, NULL, 4, 76, 0, NULL, 1, 1, '2018-08-08 11:14:24', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgfdgfdg', NULL, 'san-pham', NULL),
(3, NULL, 4, 76, 0, NULL, 1, 1, '2018-08-08 11:14:51', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgfdgfdg', NULL, 'san-pham', NULL),
(4, NULL, 4, 76, 0, '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', 1, 1, '2018-08-08 11:15:53', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgfdgfdg', NULL, 'san-pham', NULL),
(5, NULL, 4, 76, 0, '::1', 1, 1, '2018-08-08 11:17:24', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgfdgfdg', NULL, 'san-pham', NULL),
(6, NULL, 4, 52, 0, '::1', 1, 1, '2018-08-08 11:35:06', '0000-00-00 00:00:00', 'hfghgf', 'hgfhgh', NULL, 'san-pham', NULL),
(7, NULL, 4, 63, 0, '::1', 1, 1, '2018-08-09 03:31:52', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'hhh hhh', NULL, 'san-pham', NULL),
(8, NULL, 5, 63, 0, '::1', 1, 1, '2018-08-09 03:44:53', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'gfgfg', NULL, 'san-pham', NULL),
(9, NULL, 4, 63, 0, '::1', 1, 1, '2018-08-09 03:45:04', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fgdfgfg', NULL, 'san-pham', NULL),
(10, NULL, 4, 63, 0, '::1', 1, 1, '2018-08-09 03:45:15', '0000-00-00 00:00:00', 'Hieu Nguyen', 'dfgdfgfg', NULL, 'san-pham', NULL),
(11, NULL, 1, 63, 0, '::1', 1, 1, '2018-08-09 04:21:46', '0000-00-00 00:00:00', 'Hieu', 'fdgfdg', NULL, 'san-pham', NULL),
(12, 'review', 1, 11, 0, '::1', 1, 1, '2018-08-09 05:50:38', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(13, 'review', 1, 11, 0, '::1', 1, 1, '2018-08-09 05:50:43', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(14, NULL, 4, 63, 0, '::1', 1, 1, '2018-08-09 06:11:01', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'Sản phẩm này rất tốt . Mình sài lâu lắm rồi mà y như lúc mua về kaka !', NULL, 'san-pham', NULL),
(15, NULL, 4, 76, 0, '::1', 1, 1, '2018-08-09 06:17:35', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'fdsfsdf', NULL, 'san-pham', NULL),
(16, NULL, 4, 48, 0, '::1', 1, 1, '2018-08-09 06:34:48', '0000-00-00 00:00:00', 'Nguyễn Đình Hiếu', 'Sản phẩm rất tốt !', NULL, 'san-pham', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_setting`
--

CREATE TABLE `table_setting` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `opentime` varchar(100) DEFAULT NULL,
  `timelive` varchar(100) NOT NULL,
  `support_phone` varchar(50) DEFAULT NULL,
  `slogan_vi` varchar(255) DEFAULT NULL,
  `shortname_vi` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `keymap` varchar(50) DEFAULT NULL,
  `idfacebook` varchar(50) DEFAULT NULL,
  `codebody` text,
  `codehead` text,
  `codebottom` text,
  `consult_phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address_vi` varchar(255) DEFAULT NULL,
  `hotline` varchar(50) DEFAULT NULL,
  `hotline1` varchar(50) DEFAULT NULL,
  `zalo` varchar(30) DEFAULT NULL,
  `location_map` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `analytics` text,
  `vchat` text,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortname_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_setting`
--

INSERT INTO `table_setting` (`id`, `title`, `keywords`, `description`, `photo`, `name_vi`, `opentime`, `timelive`, `support_phone`, `slogan_vi`, `shortname_vi`, `twitter`, `keymap`, `idfacebook`, `codebody`, `codehead`, `codebottom`, `consult_phone`, `email`, `phone`, `address_vi`, `hotline`, `hotline1`, `zalo`, `location_map`, `website`, `facebook`, `googleplus`, `analytics`, `vchat`, `name_en`, `slogan_en`, `address_en`, `shortname_en`, `dateupdate`) VALUES
(1, 'Tewelry Expo', 'Tewelry Expo', 'Tewelry Expo', 'thanhtoan-6679.png', 'Tewelry Expo', 'Sáng 8 - 17h', 'dfg', '0934068792', 'Welcom to  Homemade Milktea !', 'Tewelry Expo', 'g', 'AIzaSyCAbEbhM4pHz9ofKbCQZxNFYRzgHfD85Os', '155676938250099', '', '', '', '0934068792', 'dinhhieunina@gmail.com', '0934068792', 'DP53 Dragon Parc 1 Villa, Nguyễn Hữu Thọ, Nhà Bè, TP.HCM', '0966 952 051', '0913.158.769', '0966952051', '10.7026268,106.7123616', 'http://canarydecor.vn', 'https://www.facebook.com/vitnuonglubinhduong/', 'dfg', NULL, NULL, '', '', '', '', '2018-08-10 08:41:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_tags`
--

CREATE TABLE `table_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_tags`
--

INSERT INTO `table_tags` (`id`, `type`, `photo`, `thumb`, `slug`, `title`, `keywords`, `description`, `number`, `shows`, `datecreate`, `dateupdate`, `name_vi`, `name_en`, `description_vi`, `description_en`) VALUES
(8, '', '', '', '1', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_title`
--

CREATE TABLE `table_title` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_vi` varchar(225) DEFAULT NULL,
  `attributes` text,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `number` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_title`
--

INSERT INTO `table_title` (`id`, `name_vi`, `attributes`, `photo`, `thumb`, `slug`, `type`, `number`, `shows`, `datecreate`, `dateupdate`, `name_en`, `description_vi`, `description_en`) VALUES
(1, 'Chi Nhánh Thanh khoa - Đà Lạt', '{\"diachi\":{\"vi\":\"Chi nhánh Đà Lạt\",\"en\":\"sdfds\"},\"toado\":\"10.787786, 106.663349\",\"email\":\"ry\",\"dienthoai\":\"try\"}', '', '', 'chi-nhanh-thanh-khoa-da-lat', 'chinhanh', 2, 1, '0000-00-00 00:00:00', '2018-07-11 05:13:54', 'sdf', 'fsdfsdf', 'sdfdsf'),
(3, 'Thanh toán tại nhà', 'null', '', '', 'thanh-toan-tai-nha', 'httt', 1, 1, '2018-07-12 08:43:48', '2018-08-10 06:00:01', '', 'Nhân viên giao hàng và thu tiền tận nơi', ''),
(4, 'Thanh toán chuyển khoản', 'null', '', '', 'thanh-toan-chuyen-khoan', 'httt', 1, 1, '2018-07-12 08:44:06', '2018-08-10 06:28:32', '', 'Chuyển khoản qua tài khoản :\r\nChủ tài khoản : Nguyễn Đình Hiếu\r\nStk : 0564464646466\r\nNgân Hàng : ABC chi nhánh xuyên Á', ''),
(5, 'Thanh toán khi nhận hàng', 'null', '', '', 'thanh-toan-khi-nhan-hang', 'httt', 1, 1, '2018-07-12 08:44:28', '2018-08-10 05:24:22', '', 'Miển phí giao hàng tại khu vực nội thành TP HCM', ''),
(6, 'Mới nhận', 'null', '', '', 'moi-nhan', 'tinhtrangdh', 1, 1, '2018-07-12 08:45:13', '2018-07-12 08:45:13', '', NULL, NULL),
(7, 'Đang giao hàng', 'null', '', '', 'dang-giao-hang', 'tinhtrangdh', 2, 1, '2018-07-12 08:45:21', '2018-07-12 08:45:21', '', NULL, NULL),
(8, 'Đã giao', 'null', '', '', 'da-giao', 'tinhtrangdh', 3, 1, '2018-07-12 08:45:39', '2018-07-12 08:45:39', '', NULL, NULL),
(9, 'Đã hủy', 'null', '', '', 'da-huy', 'tinhtrangdh', 4, 1, '2018-07-12 08:45:46', '2018-07-12 08:45:46', '', NULL, NULL),
(10, 'Dưới 500 nghìn', '{\"giatu\":\"0\",\"giaden\":\"500,000\"}', '', '', 'duoi-500-nghin', 'khoangia', 1, 1, '2018-07-12 08:46:46', '2018-07-12 08:46:46', '', NULL, NULL),
(11, 'Từ 500 - 1Triệu', '{\"giatu\":\"500,000\",\"giaden\":\"1,000,000\"}', '', '', 'tu-500-1trieu', 'khoangia', 2, 1, '2018-07-12 08:47:07', '2018-07-12 08:47:07', '', NULL, NULL),
(12, 'Từ 1 - 2 Triệu', '{\"giatu\":\"1,000,000\",\"giaden\":\"2,000,000\"}', '', '', 'tu-1-2-trieu', 'khoangia', 3, 1, '2018-07-12 08:47:23', '2018-07-12 08:47:23', '', NULL, NULL),
(13, 'Từ 2 - 5 Triệu', '{\"giatu\":\"2,000,000\",\"giaden\":\"5,000,000\"}', '', '', 'tu-2-5-trieu', 'khoangia', 4, 1, '2018-07-12 08:47:49', '2018-07-12 08:47:49', '', NULL, NULL),
(17, '41', 'null', '', '', '41', 'size', 1, 1, '2018-07-13 08:30:13', '2018-07-13 08:30:13', '', NULL, NULL),
(18, '42', 'null', '', '', '42', 'size', 1, 1, '2018-07-13 08:30:17', '2018-07-13 08:30:17', '', NULL, NULL),
(19, 'S', 'null', '', '', 's', 'size', 1, 1, '2018-07-13 08:30:21', '2018-07-13 08:30:21', '', NULL, NULL),
(20, 'X', 'null', '', '', 'x', 'size', 1, 1, '2018-07-13 08:30:25', '2018-07-13 08:30:25', '', NULL, NULL),
(21, 'XL', 'null', '', '', 'xl', 'size', 1, 1, '2018-07-13 08:30:32', '2018-07-13 08:30:32', '', NULL, NULL),
(22, 'M', 'null', '', '', 'm', 'size', 1, 1, '2018-07-13 08:30:36', '2018-07-13 08:30:36', '', NULL, NULL),
(23, 'XXL', 'null', '', '', 'xxl', 'size', 2, 1, '2018-07-13 08:30:45', '2018-07-13 08:30:45', '', NULL, NULL),
(24, 'Màu Tím', '{\"color\":\"#830094\"}', '', '', 'mau-tim', 'mausac', 1, 1, '2018-07-13 08:31:01', '2018-07-13 08:31:01', '', NULL, NULL),
(25, 'Màu Hồng', '{\"color\":\"#ed0067\"}', '', '', 'mau-hong', 'mausac', 1, 1, '2018-07-13 08:31:37', '2018-07-13 08:31:37', '', NULL, NULL),
(26, 'Màu Xanh', '{\"color\":\"#00990d\"}', '', '', 'mau-xanh', 'mausac', 1, 1, '2018-07-13 08:32:14', '2018-07-13 08:32:14', '', NULL, NULL),
(27, 'Màu Đen', '{\"color\":\"#000000\"}', '', '', '', 'mausac', 1, 1, '2018-07-13 08:32:29', '2018-08-29 16:58:41', 'd', NULL, NULL),
(28, 'Khu vực nội thành TP HCM', '{\"phiship\":\"20,000\"}', '', '', 'khu-vuc-noi-thanh-tp-hcm', 'shiping', 1, 1, '2018-08-10 05:12:35', '2018-08-10 05:12:35', '', NULL, NULL),
(29, 'Khu vực ngoại thành TP HCM', '{\"phiship\":\"40,000\"}', '', '', 'khu-vuc-ngoai-thanh-tp-hcm', 'shiping', 1, 1, '2018-08-10 05:12:51', '2018-08-10 05:12:51', '', NULL, NULL),
(30, 'Khu vực miền nam', '{\"phiship\":\"60,000\"}', '', '', 'khu-vuc-mien-nam', 'shiping', 1, 1, '2018-08-10 05:13:10', '2018-08-10 05:13:10', '', NULL, NULL),
(31, 'Khu vực miền trung', '{\"phiship\":\"70,000\"}', '', '', 'khu-vuc-mien-trung', 'shiping', 1, 1, '2018-08-10 05:13:25', '2018-08-10 05:13:25', '', NULL, NULL),
(32, 'Khu vực miền bắc', '{\"phiship\":\"80,000\"}', '', '', 'khu-vuc-mien-bac', 'shiping', 1, 1, '2018-08-10 05:13:43', '2018-08-10 05:13:43', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_user`
--

CREATE TABLE `table_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `zalo` varchar(50) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `company` varchar(225) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `permission` varchar(50) DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `com` varchar(20) NOT NULL DEFAULT 'user',
  `type` varchar(50) NOT NULL,
  `dateupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `datecreate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`, `name`, `phone`, `email`, `address`, `sex`, `zalo`, `skype`, `company`, `country`, `city`, `permission`, `role`, `shows`, `com`, `type`, `dateupdate`, `datecreate`, `number`) VALUES
(3, 'admin', '2ad6929a3b885eb50afbb47ec0aba993', 'Nguyễn Đình Hiếu', '01212901191', 'nguyenhieunina@gmail.com', '', '0', '', '', '', '', '', '', 3, 1, 'user', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'dinhhieu', '069758806cb3158e97026f03cc576627', 'Nguyễn đình hiếu', '01212901191', 'nguyenhieunina@gmail.com', 'Tòa nhà SG Tel - Công viên phẩn mền Quang Trung', '1', '', '', '', 'Việt Nam', 'TP Hồ Chí Minh', '', 3, 1, 'user', 'developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'demo48', 'd6ed91b582bb1a5a0774b9ddf37fa757', 'Nguyễn Đình Hiếu', '0934068792', 'nguyenhieunina@gmail.com', 'Tòa nhà sài gon Tel , CVPM Quang Trung', NULL, NULL, NULL, NULL, NULL, NULL, '21', 1, 1, 'user', '', '2018-07-11 11:23:44', '2018-07-11 11:18:26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_video`
--

CREATE TABLE `table_video` (
  `id` int(10) UNSIGNED NOT NULL,
  `highlight` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `thumb` varchar(225) DEFAULT NULL,
  `name_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `shows` tinyint(1) NOT NULL DEFAULT '1',
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `view` int(11) DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_video`
--

INSERT INTO `table_video` (`id`, `highlight`, `type`, `photo`, `thumb`, `name_vi`, `slug`, `link`, `title`, `keywords`, `description`, `number`, `shows`, `datecreate`, `dateupdate`, `view`, `name_en`) VALUES
(28, 0, 'video', '', '', 'Tập huấn công tác phòng cháy chữa cháy', 'tap-huan-cong-tac-phong-chay-chua-chay', 'https://www.youtube.com/watch?v=RQ8ujnmG8F0', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(10, 0, 'tintuc', '', '', 'Adele', 'adele', 'https://www.youtube.com/watch?v=YQHsXMglC9A', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(11, 0, 'tintuc', '', '', 'Gianni Infantino trở thành tân Chủ tịch FIFA', 'gianni-infantino-tro-thanh-tan-chu-tich-fifa', 'https://www.youtube.com/watch?v=V_ivprx42c4', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(29, 0, 'video', '', '', 'Chính sách trả hàng', 'chinh-sach-tra-hang', 'https://www.youtube.com/watch?v=rdO-Sq2eMGM', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(27, 0, 'video', '', '', 'Vụ ch.á.y quán Karaoke ở Cầu Giấy', 'vu-chay-quan-karaoke-o-cau-giay', 'https://www.youtube.com/watch?v=iYLAezImi9M', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(30, 0, 'video', '', '', 'Công trình pccc', 'cong-trinh-pccc', 'https://www.youtube.com/watch?v=HtVLt3z5DtE&feature', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(31, 0, 'video', '', '', 'sơn chống thấm', 'son-chong-tham', 'https://www.youtube.com/watch?v=HtVLt3z5DtE', '', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_album`
--
ALTER TABLE `table_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_bgweb`
--
ALTER TABLE `table_bgweb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_cate_cat`
--
ALTER TABLE `table_cate_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_cate_item`
--
ALTER TABLE `table_cate_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_cate_list`
--
ALTER TABLE `table_cate_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_cate_photo`
--
ALTER TABLE `table_cate_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_cate_sub`
--
ALTER TABLE `table_cate_sub`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_com`
--
ALTER TABLE `table_com`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_contact`
--
ALTER TABLE `table_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_counter`
--
ALTER TABLE `table_counter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_counter_place`
--
ALTER TABLE `table_counter_place`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_lang`
--
ALTER TABLE `table_lang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_like`
--
ALTER TABLE `table_like`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_link`
--
ALTER TABLE `table_link`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_meta`
--
ALTER TABLE `table_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_newsletter`
--
ALTER TABLE `table_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_permission`
--
ALTER TABLE `table_permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_post`
--
ALTER TABLE `table_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_review`
--
ALTER TABLE `table_review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_tags`
--
ALTER TABLE `table_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_title`
--
ALTER TABLE `table_title`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_video`
--
ALTER TABLE `table_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_album`
--
ALTER TABLE `table_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `table_bgweb`
--
ALTER TABLE `table_bgweb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `table_cate_cat`
--
ALTER TABLE `table_cate_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `table_cate_item`
--
ALTER TABLE `table_cate_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `table_cate_list`
--
ALTER TABLE `table_cate_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `table_cate_photo`
--
ALTER TABLE `table_cate_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `table_cate_sub`
--
ALTER TABLE `table_cate_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `table_com`
--
ALTER TABLE `table_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `table_contact`
--
ALTER TABLE `table_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `table_counter`
--
ALTER TABLE `table_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1056;

--
-- AUTO_INCREMENT cho bảng `table_counter_place`
--
ALTER TABLE `table_counter_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_info`
--
ALTER TABLE `table_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `table_lang`
--
ALTER TABLE `table_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `table_like`
--
ALTER TABLE `table_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `table_link`
--
ALTER TABLE `table_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `table_member`
--
ALTER TABLE `table_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `table_meta`
--
ALTER TABLE `table_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_newsletter`
--
ALTER TABLE `table_newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `table_order_detail`
--
ALTER TABLE `table_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `table_permission`
--
ALTER TABLE `table_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT cho bảng `table_post`
--
ALTER TABLE `table_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT cho bảng `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `table_review`
--
ALTER TABLE `table_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `table_tags`
--
ALTER TABLE `table_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `table_title`
--
ALTER TABLE `table_title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `table_video`
--
ALTER TABLE `table_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
