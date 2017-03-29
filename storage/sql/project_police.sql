-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 06:32 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_police`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressoffice`
--

CREATE TABLE `addressoffice` (
  `id` int(11) NOT NULL,
  `office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_address` text COLLATE utf8_unicode_ci,
  `office_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `criminalhistory_id` int(11) DEFAULT NULL,
  `guesthistory_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addressoriginal`
--

CREATE TABLE `addressoriginal` (
  `id` int(11) NOT NULL,
  `original_address` text COLLATE utf8_unicode_ci,
  `original_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresspresent`
--

CREATE TABLE `addresspresent` (
  `id` int(11) NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci,
  `present_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criminalhistory`
--

CREATE TABLE `criminalhistory` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `typepeople` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeidcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shape` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teeth` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skin` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hairstyles` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `head` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `face` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eyebrow` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eye` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ear` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nose` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mouth` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chin` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mirror` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accent` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nature` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_gallivent` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataspouse_id` int(11) DEFAULT NULL,
  `datamother_id` int(11) DEFAULT NULL,
  `datafather_id` int(11) DEFAULT NULL,
  `addressoriginal_id` int(11) DEFAULT NULL,
  `addresspresent_id` int(11) DEFAULT NULL,
  `policeimmigration_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criminalhistory_datacase`
--

CREATE TABLE `criminalhistory_datacase` (
  `criminalhistory_id` int(11) NOT NULL,
  `datacase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datacase`
--

CREATE TABLE `datacase` (
  `id` int(11) NOT NULL,
  `file_case` text COLLATE utf8_unicode_ci,
  `name_case` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_number_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `station_number_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `circumstances_case` text COLLATE utf8_unicode_ci,
  `date_case` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `houseno_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `villageno_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `road_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lane_alley_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subdistrict_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disreict_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_case` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name_police` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_police` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank_police` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_police` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datachild`
--

CREATE TABLE `datachild` (
  `id` int(11) NOT NULL,
  `child_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_age` int(11) DEFAULT NULL,
  `child_live_died` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_address` text COLLATE utf8_unicode_ci,
  `child_career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_nameoffice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_nameoffice_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `criminalhistory_id` int(11) DEFAULT NULL,
  `guesthistory_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datafather`
--

CREATE TABLE `datafather` (
  `id` int(11) NOT NULL,
  `father_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_age` int(11) DEFAULT NULL,
  `father_live_died` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_address` text COLLATE utf8_unicode_ci,
  `father_career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_nameoffice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_nameoffice_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datamother`
--

CREATE TABLE `datamother` (
  `id` int(11) NOT NULL,
  `mother_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_age` int(11) DEFAULT NULL,
  `mother_live_died` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_address` text COLLATE utf8_unicode_ci,
  `mother_career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_nameoffice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_nameoffice_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataspouse`
--

CREATE TABLE `dataspouse` (
  `id` int(11) NOT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_age` int(11) DEFAULT NULL,
  `spouse_live_died` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_address` text COLLATE utf8_unicode_ci,
  `spouse_career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_nameoffice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_nameoffice_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_idnumber` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_age` int(11) DEFAULT NULL,
  `employee_address` text COLLATE utf8_unicode_ci,
  `guesthistory_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_name` text COLLATE utf8_unicode_ci,
  `origin_ext` text COLLATE utf8_unicode_ci,
  `mime_type` text COLLATE utf8_unicode_ci,
  `datacase_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guesthistory`
--

CREATE TABLE `guesthistory` (
  `id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `idcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeidcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8_unicode_ci,
  `career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataspouse_id` int(11) DEFAULT NULL,
  `datamother_id` int(11) DEFAULT NULL,
  `datafather_id` int(11) DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressoriginal_id` int(11) DEFAULT NULL,
  `addresspresent_id` int(11) DEFAULT NULL,
  `policeimmigration_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `typepeople` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_09_10_104932_init_system', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mylog`
--

CREATE TABLE `mylog` (
  `id` int(11) NOT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personfamily`
--

CREATE TABLE `personfamily` (
  `id` int(11) NOT NULL,
  `personfamily_idnumber` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personfamily_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personfamily_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personfamily_age` int(11) DEFAULT NULL,
  `personfamily_address` text COLLATE utf8_unicode_ci,
  `personfamily_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personfamily_nameoffice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personfamily_nameoffice_tel` varchar(45) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `personfamily_career` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guesthistory_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nametitle` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place_general`
--

CREATE TABLE `place_general` (
  `id` int(11) NOT NULL,
  `place_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_amphur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_age` int(11) DEFAULT NULL,
  `owner_idcard` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_age` int(11) DEFAULT NULL,
  `admin_idcard` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_adress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_present_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_address_tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_activity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_info` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `police_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `policeimmigration`
--

CREATE TABLE `policeimmigration` (
  `id` int(11) NOT NULL,
  `name_police` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_police` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_police` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `position_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `policeimmigration`
--

INSERT INTO `policeimmigration` (`id`, `name_police`, `surname_police`, `tel_police`, `username`, `password`, `created_at`, `updated_at`, `rank_id`, `deleted_at`, `photo`, `position_id`, `role_id`, `remember_token`) VALUES
(67, 'NemeAdmin', 'SurnameAdmin', '08x-xxxxxxx', 'admin', '$2y$10$Gu2yuEpKdWuvU1nBdzXg4OYXlUK1EFc/l3jBSo81pzE0LBq7I3RHK', '2015-10-07 14:34:03', '2016-09-11 14:09:48', 199, NULL, '/photo/police/67/099526e3-1aa6-4770-9efa-5fb16774a842.jpg', 267, 42, 'J0s5aNkRjiFON49aVP0jwA6gsOIRFFpr1t6ZCI445C86J5ybasBmk3o6HYgm'),
(68, 'ประทวน', 'ประทวน', '08x-xxxxxxx', 'member1', '$2y$10$k6tug3N4B15wKnGdSi9oSOGj1KSD9nxGl6UtCsatUg4sJirey8Gd2', '2015-10-07 14:34:03', '2016-08-28 14:10:34', 192, NULL, '/photo/police/68/2b9089e7-6bd8-4ddd-ae1b-49532f6ddc3c.jpg', 267, 44, 'DugfHdGiw2S1c7cibEllPVB7JkTmXfDRbAP284IF1UGlNm7HiHrubxrB2C66'),
(69, 'สัญญาบัตร', 'สัญญาบัตร', '08x-xxxxxxx', 'member2', '$2y$10$/LNIZDI8geQLWeObtIBtFels9pQCUL6ryQGvjGU6k4NzvgVBxMOm2', '2015-10-07 14:34:03', '2016-09-11 16:55:42', 199, NULL, '/photo/police/69/2023722e-daaa-424d-b723-675e8e40ad37.jpg', 267, 43, '2bYfYsJtE9Z1yUwNrWKVkwQ3JSorPIn3l0xyWReAye61pXIMSgMcZNBx2Bt3');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name_position` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name_position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(267, 'ลูกแถว', '2015-10-07 14:34:01', '2015-10-07 14:34:01', NULL),
(268, 'ผู้บังคับหมู่', '2015-10-07 14:34:01', '2015-10-07 14:34:01', NULL),
(269, 'รองสารวัตร', '2015-10-07 14:34:01', '2015-10-07 14:34:01', NULL),
(270, 'สารวัตร', '2015-10-07 14:34:01', '2015-10-07 14:34:01', NULL),
(278, 'รองผู้กำกับการ', '2015-10-07 14:34:01', '2015-10-07 14:34:01', NULL),
(279, 'ผู้กำกับการ', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `rank` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `rank`, `created_at`, `updated_at`, `deleted_at`) VALUES
(191, 'พลตำรวจ', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(192, 'สิบตำรวจตรี', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(193, 'สิบตำรวจโท', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(194, 'สิบตำรวจเอก', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(195, 'จ่าสิบตำรวจ', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(196, 'นายดาบตำรวจ', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(197, 'ร้อยตำรวจตรี', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(198, 'ร้อยตำรวจโท', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(199, 'ร้อยตำรวจเอก', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(200, 'พันตำรวจตรี', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(201, 'พันตำรวจโท', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(202, 'พันตำรวจเอก', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(203, 'พลตำรวจจัตวา', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(204, 'พลตำรวจตรี', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(205, 'พลตำรวจโท', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL),
(206, 'พลตำรวจเอก', '2015-10-07 14:34:02', '2015-10-07 14:34:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `key`, `name`, `description`, `created_at`, `updated_at`) VALUES
(42, 'admin', 'Administrator', 'Administrator', '2015-10-07 14:34:02', '2015-10-07 14:34:02'),
(43, 'Member_Commissioned_Officers', 'สิทธิการเข้าใช้งาน ตำรวจชั้นสัญญาบัตร', 'ตำรวจชั้นสัญญาบัตร', '2015-10-07 14:34:02', '2015-10-07 14:34:02'),
(44, 'Member_Non-Commissioned_Officer', 'สิทธิการเข้าใช้งาน ตำรวจชั้นประทวน', 'ตำรวจชั้นประทวน', '2015-10-07 14:34:02', '2015-10-07 14:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_brand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_generation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_group` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_province` varchar(45) CHARACTER SET utf16 DEFAULT NULL,
  `vehicl_color` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `guesthistory_id` int(11) DEFAULT NULL,
  `datacase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `id` int(11) NOT NULL,
  `name_weapon` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `datacase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressoffice`
--
ALTER TABLE `addressoffice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_addressoffice_criminalhistory1_idx` (`criminalhistory_id`),
  ADD KEY `fk_addressoffice_guesthistory1_idx` (`guesthistory_id`);

--
-- Indexes for table `addressoriginal`
--
ALTER TABLE `addressoriginal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresspresent`
--
ALTER TABLE `addresspresent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminalhistory`
--
ALTER TABLE `criminalhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criminalhistory_dataspouse1_idx` (`dataspouse_id`),
  ADD KEY `fk_criminalhistory_datamother1_idx` (`datamother_id`),
  ADD KEY `fk_criminalhistory_datafather1_idx` (`datafather_id`),
  ADD KEY `fk_criminalhistory_nametitle1_idx` (`nametitle`),
  ADD KEY `fk_criminalhistory_addressoriginal1_idx` (`addressoriginal_id`),
  ADD KEY `fk_criminalhistory_addresspresent1_idx` (`addresspresent_id`),
  ADD KEY `fk_criminalhistory_policeimmigration1_idx` (`policeimmigration_id`);

--
-- Indexes for table `criminalhistory_datacase`
--
ALTER TABLE `criminalhistory_datacase`
  ADD PRIMARY KEY (`criminalhistory_id`,`datacase_id`),
  ADD KEY `fk_criminalhistory_has_datacase_datacase1_idx` (`datacase_id`),
  ADD KEY `fk_criminalhistory_has_datacase_criminalhistory1_idx` (`criminalhistory_id`);

--
-- Indexes for table `datacase`
--
ALTER TABLE `datacase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datachild`
--
ALTER TABLE `datachild`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_datachild_criminalhistory1_idx` (`criminalhistory_id`),
  ADD KEY `fk_datachild_guesthistory1_idx` (`guesthistory_id`),
  ADD KEY `fk_datachild_nametitle1_idx` (`nametitle`);

--
-- Indexes for table `datafather`
--
ALTER TABLE `datafather`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datamother`
--
ALTER TABLE `datamother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataspouse`
--
ALTER TABLE `dataspouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dataspouse_nametitle1_idx` (`nametitle`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_guesthistory1_idx` (`guesthistory_id`),
  ADD KEY `fk_employee_nametitle1_idx` (`nametitle`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guesthistory`
--
ALTER TABLE `guesthistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guesthistory_dataspouse1_idx` (`dataspouse_id`),
  ADD KEY `fk_guesthistory_datafather1_idx` (`datafather_id`),
  ADD KEY `fk_guesthistory_datamother1_idx` (`datamother_id`),
  ADD KEY `fk_guesthistory_nametitle1_idx` (`nametitle`),
  ADD KEY `fk_guesthistory_addressoriginal1_idx` (`addressoriginal_id`),
  ADD KEY `fk_guesthistory_addresspresent1_idx` (`addresspresent_id`),
  ADD KEY `fk_guesthistory_policeimmigration1_idx` (`policeimmigration_id`),
  ADD KEY `nametitle_id` (`nametitle`);

--
-- Indexes for table `mylog`
--
ALTER TABLE `mylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personfamily`
--
ALTER TABLE `personfamily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personfamily_guesthistory1_idx` (`guesthistory_id`),
  ADD KEY `fk_personfamily_nametitle1_idx` (`nametitle`);

--
-- Indexes for table `place_general`
--
ALTER TABLE `place_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policeimmigration`
--
ALTER TABLE `policeimmigration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_policeimmigration_rank1_idx` (`rank_id`),
  ADD KEY `fk_policeimmigration_position1_idx` (`position_id`),
  ADD KEY `fk_policeimmigration_access1_idx` (`role_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehicle_guesthistory1_idx` (`guesthistory_id`),
  ADD KEY `fk_vehicle_datacase1_idx` (`datacase_id`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_weapon_datacase1_idx` (`datacase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressoffice`
--
ALTER TABLE `addressoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addressoriginal`
--
ALTER TABLE `addressoriginal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addresspresent`
--
ALTER TABLE `addresspresent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criminalhistory`
--
ALTER TABLE `criminalhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datacase`
--
ALTER TABLE `datacase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datachild`
--
ALTER TABLE `datachild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datafather`
--
ALTER TABLE `datafather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datamother`
--
ALTER TABLE `datamother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dataspouse`
--
ALTER TABLE `dataspouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guesthistory`
--
ALTER TABLE `guesthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mylog`
--
ALTER TABLE `mylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personfamily`
--
ALTER TABLE `personfamily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place_general`
--
ALTER TABLE `place_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `policeimmigration`
--
ALTER TABLE `policeimmigration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addressoffice`
--
ALTER TABLE `addressoffice`
  ADD CONSTRAINT `fk_addressoffice_criminalhistory1` FOREIGN KEY (`criminalhistory_id`) REFERENCES `criminalhistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_addressoffice_guesthistory1` FOREIGN KEY (`guesthistory_id`) REFERENCES `guesthistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `criminalhistory`
--
ALTER TABLE `criminalhistory`
  ADD CONSTRAINT `fk_criminalhistory_addressoriginal1` FOREIGN KEY (`addressoriginal_id`) REFERENCES `addressoriginal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_addresspresent1` FOREIGN KEY (`addresspresent_id`) REFERENCES `addresspresent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_datafather1` FOREIGN KEY (`datafather_id`) REFERENCES `datafather` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_datamother1` FOREIGN KEY (`datamother_id`) REFERENCES `datamother` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_dataspouse1` FOREIGN KEY (`dataspouse_id`) REFERENCES `dataspouse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_policeimmigration1` FOREIGN KEY (`policeimmigration_id`) REFERENCES `policeimmigration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `criminalhistory_datacase`
--
ALTER TABLE `criminalhistory_datacase`
  ADD CONSTRAINT `fk_criminalhistory_has_datacase_criminalhistory1` FOREIGN KEY (`criminalhistory_id`) REFERENCES `criminalhistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criminalhistory_has_datacase_datacase1` FOREIGN KEY (`datacase_id`) REFERENCES `datacase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `datachild`
--
ALTER TABLE `datachild`
  ADD CONSTRAINT `fk_datachild_criminalhistory1` FOREIGN KEY (`criminalhistory_id`) REFERENCES `criminalhistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datachild_guesthistory1` FOREIGN KEY (`guesthistory_id`) REFERENCES `guesthistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_guesthistory1` FOREIGN KEY (`guesthistory_id`) REFERENCES `guesthistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guesthistory`
--
ALTER TABLE `guesthistory`
  ADD CONSTRAINT `fk_guesthistory_addressoriginal1` FOREIGN KEY (`addressoriginal_id`) REFERENCES `addressoriginal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guesthistory_addresspresent1` FOREIGN KEY (`addresspresent_id`) REFERENCES `addresspresent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guesthistory_datafather1` FOREIGN KEY (`datafather_id`) REFERENCES `datafather` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guesthistory_datamother1` FOREIGN KEY (`datamother_id`) REFERENCES `datamother` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guesthistory_dataspouse1` FOREIGN KEY (`dataspouse_id`) REFERENCES `dataspouse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guesthistory_policeimmigration1` FOREIGN KEY (`policeimmigration_id`) REFERENCES `policeimmigration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personfamily`
--
ALTER TABLE `personfamily`
  ADD CONSTRAINT `fk_personfamily_guesthistory1` FOREIGN KEY (`guesthistory_id`) REFERENCES `guesthistory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `policeimmigration`
--
ALTER TABLE `policeimmigration`
  ADD CONSTRAINT `fk_policeimmigration_position1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_policeimmigration_rank1` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_policeimmigration_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
