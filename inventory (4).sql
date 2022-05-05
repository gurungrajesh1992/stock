-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 05, 2022 at 08:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

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
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `audit_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `field_name` text NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`audit_id`, `table_name`, `id_no`, `operation`, `field_name`, `old_value`, `new_value`, `created_by`, `created_on`) VALUES
(15, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;water;;hi;1;2;2022-03-28;1;2022-04-10;1', '1;water;;;1;2;2022-03-28;1;2022-04-10;1', 1, '2022-04-12 11:42:51'),
(16, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;water;;;1;2;2022-03-28;1;2022-04-10;1', '1;;watermelon;;1;2;2022-03-28;1;2022-04-10;1', 1, '2022-04-12 11:42:51'),
(17, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;;watermelon;;1;2;2022-03-28;1;2022-04-10;1', '1;watermelon;watermelon;hi this is watermelon;1;2;2022-03-28;1;2022-04-11;1', 1, '2022-04-12 11:42:51'),
(18, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;watermelon;watermelon;hi this is watermelon;1;2;2022-03-28;1;2022-04-11;1', '1;watermelon;;;1;2;2022-03-28;1;2022-04-11;1', 1, '2022-04-12 11:42:51'),
(19, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;;;;watermelon;;;;;;;;;;;;1;;;;2;;;;2022-03-28;;;;1;;;;2022-04-11;;;;1', '1;;;;watermelon;;;;vehicle;;;;paragraph here;;;;1;;;;2;2022-03-28;;;;1;;;;2022-04-11;;;;1', 1, '2022-04-12 11:42:51'),
(20, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;;;;watermelon;;;;vehicle;;;;paragraph here;;;;1;;;;2;;;;2022-03-28;;;;1;;;;2022-04-11;;;;1', '1;;;;watermelon;;;;vehicle;;;;;;;;1;;;;2;2022-03-28;;;;1;;;;2022-04-11;;;;1', 1, '2022-04-12 11:42:51'),
(21, 'categories', 5, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;;;;watermelon;;;;vehicle;;;;;;;;1;;;;2;;;;2022-03-28;;;;1;;;;2022-04-11;;;;1', '1;;;;watermelon;;;;vehicle;;;;this is vh water;;;;1;;;;2;2022-03-28;;;;1;;;;2022-04-11;;;;1', 1, '2022-04-12 11:42:51'),
(22, 'categories', 5, 'DELETE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '1;watermelon;vehicle;this is vh water;1;2;2022-03-28;1;2022-04-11;1', '', 1, '2022-04-12 11:42:51'),
(23, 'client_infos', 2, 'UPDATE', 'client_name ,  remarks ,  address ,  country_code ,  email ,  telephone ,  contact_person ,  cp_mobile ,  DocPath ,  meta_keyword ,  meta_desc ,  created_by ,  created_on ,  updated_on ,updated_by,  status ', '', NULL, 3, '2022-04-12 11:42:51'),
(24, 'client_infos', 2, 'UPDATE', 'client_name', 'Rajesh Gurung', 'Rajesh', 3, '2022-04-12 11:42:51'),
(25, 'client_infos', 2, 'UPDATE', 'client_name,remarks', 'Rajesh;;;<p>testingclient&nbsp;</p>\r\n', 'Rajesh;;;\r\n', 3, '2022-04-12 11:42:51'),
(26, 'client_infos', 2, 'UPDATE', 'client_name ,  remarks ,  address ,  country_code ,  email ,  telephone ,  contact_person ,  cp_mobile ,  DocPath ,  meta_keyword ,  meta_desc ', 'Rajesh;\r\n;Kaushaltar;nepa;gurungrajesh1992@gmail.com;2147483647;Sushant KC;9898989891;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;meta description for rajesh gurung', 'Rajesh;\r\n;Kaushaltar;nepa;gurungrajesh1992@gmail.com;0;Sushant;9898989890;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;', 3, '2022-04-12 11:42:51'),
(27, 'client_infos', 2, 'UPDATE', 'client_name ,  remarks ,  address ,  country_code ,  email ,  telephone ,  contact_person ,  cp_mobile ,  DocPath ,  meta_keyword ,  meta_desc ,  created_by ,  created_on , status ', 'Rajesh;\r\n;Kaushaltar;nepa;gurungrajesh1992@gmail.com;0;Sushant;9898989890;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;;3;2022-03-28;1', 'Rajesh Gurung;\r\n;Kaushaltar;nepa;gurungrajesh1992@gmail.com;1253666985;Sushant;9898989890;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;This is meta dsc;3;2022-03-28;1', 3, '2022-04-12 11:42:51'),
(28, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by  status   ', 'nepa;nepal;nepali;2022-02-07 00:00:00;1;2022-02-07 00:00:00;0;1', 'nepa;nepal;nepali;2022-02-07 00:00:00;1;0000-00-00 00:00:00;0;1', 1, '2022-04-12 11:49:53'),
(29, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by  status   ', 'nepa;nepal;nepali;2022-02-07 00:00:00;1;0000-00-00 00:00:00;0;1', 'nepa;nepalii;nepali;2022-02-07 00:00:00;1;0000-00-00 00:00:00;0;1', 1, '2022-04-12 11:50:13'),
(30, 'client_infos', 2, 'UPDATE', 'client_name ,  remarks ,  address ,  country_code ,  email ,  telephone ,  contact_person ,  cp_mobile ,  DocPath ,  meta_keyword ,  meta_desc ,  created_by ,  created_on ,  updated_on ,updated_by,  status ', 'Rajesh Gurung;\r\n;Kaushaltar;nepa;gurungrajesh1992@gmail.com;1253666985;Sushant;9898989890;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;This is meta dsc;3;2022-03-28;2022-04-12;0;1', 'Rajesh Gurung;\r\nthis is rajesh;Kaushaltar;nepa;gurungrajesh1992@gmail.com;1253666985;Sushant;9898989890;http://localhost:7777/stock/uploads/download.png;rajesh gurung, rajesh , gurung ;This is meta dsc;3;2022-03-28;2022-04-12;0;1', 3, '2022-04-12 11:51:59'),
(31, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,staff_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin', 'admin', 3, '2022-04-13 11:35:47'),
(32, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,staff_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;c7a709c3a7e16adfb3dab09502a70648', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;a9e3133a0748f54a7d2a488fdd9a3ffa', 3, '2022-04-13 11:38:20'),
(33, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,staff_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;a9e3133a0748f54a7d2a488fdd9a3ffa;;;1', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;c24422b7800d1e62efd3bb713fc07d7f;;;1', 3, '2022-04-13 11:43:30'),
(34, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;c24422b7800d1e62efd3bb713fc07d7f;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-02-24 00:00:00;;;1;;;2022-03-28 00:00:00;;;3;;;1', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;48aed44b5bb41a47357d994bfae0641c;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-02-24 00:00:00;;;1;;;2022-03-28 00:00:00;;;3;;;1', 3, '2022-04-13 11:51:21'),
(35, 'categories', 3, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  order_no , created_by ,  created_on ,  updated_on ,updated_by,  status ', '2;;;Personal Computer;;;personal-computer;;;<p>Personal Computer</p>\r\n;;;0;;;1;;;2022-04-12;;;2022-04-12;;;1;;;1', NULL, 1, '2022-04-13 12:10:25'),
(36, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  order_no , created_by ,  created_on ,  updated_on ,updated_by,  status ', '2;;;Heaters;;;heaters;;;<p>keeps you warm</p>\r\n;;;0;;;3;;;2022-04-13;;;1', NULL, 2, '2022-04-13 12:15:20'),
(43, 'categories', 7, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  order_no , created_by ,  created_on ,  updated_on ,updated_by,  status ', '2;;;Laptop;;;laptop;;;;;;0;;;1;;;2022-04-12;;;1', NULL, 0, '2022-04-13 12:16:01'),
(44, 'categories', 7, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  order_no , created_by ,  created_on ,  updated_on ,updated_by,  status ', '2;;;Laptop;;;laptop;;;;;;0;;;1;;;2022-04-12;;;1', NULL, 0, '2022-04-13 12:16:01'),
(45, 'categories', 7, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  order_no , created_by ,  created_on ,  updated_on ,updated_by,  status ', '2;;;Laptop;;;laptop;;;;;;0;;;1;;;2022-04-12;;;1', NULL, 0, '2022-04-13 12:16:44'),
(46, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;Heaters;heaters;<p>warm</p>\r\n;1;0;2022-04-13;3;2022-04-13;2', NULL, 2, '2022-04-13 12:30:06'),
(47, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>hi warm</p>\r\n;;;;1;;;0;;;2022-04-13;;;3;;;2022-04-13;;;2', NULL, 3, '2022-04-13 12:34:31'),
(48, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm weather</p>\r\n;;;;1;;;0;;;2022-04-13;;;3;;;2022-04-13;;;3', NULL, 3, '2022-04-13 12:35:50'),
(49, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm weather heather forever</p>\r\n;;;;1;;;0;;;2022-04-13;;;3', NULL, 3, '2022-04-13 12:40:42'),
(50, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm weather&nbsp;</p>\r\n;;;;1;;;0;;;2022-04-13;;;3', NULL, 3, '2022-04-13 12:42:12'),
(51, 'categories', 8, 'UPDATE', 'parent_id,category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm&nbsp;</p>\r\n;;;;1;;;0;;;2022-04-13;;;3', '2;;;Heaters;;;heaters;;;<p>warm and cold&nbsp;</p>\r\n;;;1;;;0;;;2022-04-13;;;3', 3, '2022-04-13 12:50:14'),
(52, 'categories', 8, 'UPDATE', 'parent_id,category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm and cold&nbsp;</p>\r\n;;;;1;;;0;;;2022-04-13;;;3', '2;;;Heaters;;;heaters;;;<p>warm</p>\r\n;;;1;;;0;;;2022-04-13;;;3', 3, '2022-04-13 12:52:07'),
(53, 'categories', 8, 'UPDATE', 'parent_id,category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by', '2;;;Heaters;;;heaters;;;<p>warm</p>\r\n;;;;1;;;0;;;2022-04-13;;;3', '2;;;Heaters;;;heaters;;;;;;1;;;0;;;2022-04-13;;;3', 3, '2022-04-13 12:55:11'),
(54, 'categories', 2, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Electronics;;;electronics;;;;;;;1;;;0;;;2022-04-12;;;1', NULL, 0, '2022-04-13 14:50:34'),
(55, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;;;;;1;;;0;;;2022-04-13;;;3', NULL, 3, '2022-04-13 14:51:43'),
(56, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm heaters</p>\r\n;;;1;;;0;;;2022-04-13;;;3', NULL, 3, '2022-04-13 14:56:42'),
(57, 'categories', 2, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Electronics;;;electronic;;;;;;1;;;0;;;2022-04-12;;;1;;;0000-00-00;;;0', NULL, 0, '2022-04-13 15:28:33'),
(58, 'categories', 2, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Electronics;;;electronics;;;;;;1;;;0;;;2022-04-12;;;1;;;0000-00-00;;;0', '0;;;Electronics;;;electronic;;;;;;1;;;0;;;2022-04-13;;;1', 1, '2022-04-13 15:32:50'),
(59, 'categories', 1, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Furniture;;;furniture;;;<p>category furniture</p>\r\n;;;1;;;0;;;2022-04-12;;;1;;;0000-00-00;;;0', '0;;;Furniture;;;furniture;;;<p>category furniture is my furniture</p>\r\n;;;1;;;0;;;2022-04-14;;;3', 3, '2022-04-13 15:36:07'),
(60, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by  status   ', 'nepa;;;nepalii;;;nepali;;;2022-02-07 00:00:00;;;1;;;0000-00-00 00:00:00;;;0;;;1', 'nepa;;;nepali;;;nepali;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;0;;;1', 0, '2022-04-13 15:43:30'),
(61, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by  status   ', 'nepa;;;nepali;;;nepali;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;0;;;1', 'nepa;;;nepali;;;nepalese;;;2022-04-14 00:00:00;;;0;;;1', 0, '2022-04-13 15:45:05'),
(62, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by  status   ', 'nepa;;;nepali;;;nepalese;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;0;;;1', 'nepa;;;nepali;;;nepali;;;2022-04-14 00:00:00;;;0;;;1', 0, '2022-04-13 15:48:52'),
(63, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm</p>\r\n;;;1;;;0;;;2022-04-13;;;3;;;2022-04-13;;;3', '2;;;Heaters;;;heaters;;;<p>warm heaters</p>\r\n;;;1;;;0;;;2022-04-14;;;2022-04-13;;;3;;;3', 3, '2022-04-13 15:58:21'),
(64, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by , status   ', 'nepa;;;nepali;;;nepali;;;2022-02-07 00:00:00;;;1;;;1', 'nepa;;;nepali;;;np;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;0;;;1', 0, '2022-04-13 16:10:58'),
(65, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by , status   ', 'nepa;;;nepali;;;np;;;2022-02-07 00:00:00;;;1;;;1', 'nepa;;;nepali;;;nepalese;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;0;;;1', 0, '2022-04-13 16:12:23'),
(66, 'country_para', 1, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by , status   ', 'nepa;;;nepali;;;nepalese;;;2022-02-07 00:00:00;;;1;;;1', 'nepa;;;nepali;;;nepali;;;2022-02-07 00:00:00;;;1;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:15:06'),
(67, 'country_para', 2, 'UPDATE', ' country_code , country_name  , nationality  , created_on  , created_by  , updated_on  , updated_by , status   ', 'Aust;;;Austria;;;austria;;;2022-04-14 00:00:00;;;3;;;1', 'Aust;;;Austria;;;austrian;;;2022-04-14 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:15:28'),
(68, 'deaprtment_para', 1, 'UPDATE', ' department_name , department_code  , remarks  , created_on  , created_by  , updated_on  , updated_by,  status   ', 'Accounting;;;Acco;;;;;;2022-03-28 00:00:00;;;3;;;2022-03-28 00:00:00;;;0;;;1', 'Accounting;;;Acc;;;develop;;;2022-03-28 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:25:06'),
(69, 'deaprtment_para', 2, 'UPDATE', ' department_name , department_code  , remarks  , created_on  , created_by  , updated_on  , updated_by,  status   ', 'Developmen;;;Deve;;;;;;2022-03-28 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', 'Developmen;;;Dev;;;develop;;;2022-03-28 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:26:36'),
(70, 'deaprtment_para', 3, 'UPDATE', ' department_name , department_code  , remarks  , created_on  , created_by  , updated_on  , updated_by,  status   ', 'Marketing;;;Mar;;;lorem ipsum;;;2022-03-28 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', 'Marketing;;;Mar;;;lorem ipsum;;;2022-03-28 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:27:05'),
(71, 'depreciation_para', 2, 'UPDATE', ' item_code , depreciation_rate  , created_on  , created_by  , updated_on  , updated_by,  status   ', '1;;;10;;;2022-04-13 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', '1;;;10;;;2022-04-13 00:00:00;;;3;;;2022-04-13 00:00:00;;;2;;;1', 2, '2022-04-13 16:35:02'),
(72, 'designation_para', 9, 'UPDATE', ' designation_code , designation_name  ,position, remarks created_on  , created_by  , updated_on  , updated_by,  status   ', 'Mana;;;Manager;;;manager;;;;;;2022-04-14 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', 'Mana;;;Manager;;;2;;;manager;;;2022-04-14 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:50:07'),
(73, 'fiscal_year_para', 1, 'UPDATE', ' fiscal_year , start_date  ,end_date, current_tag, created_on  , created_by  , updated_on  , updated_by,  status   ', '2022;;;2022-03-13;;;2023-03-13;;;Y;;;2022-04-14 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', '2022;;;2022-03-13;;;2023-03-12;;;Y;;;2022-04-14 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', 3, '2022-04-13 16:55:25'),
(74, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;48aed44b5bb41a47357d994bfae0641c;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-02-24 00:00:00;;;1;;;2022-03-28 00:00:00;;;3;;;1', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;504a4be027611204ff993fd5d945a5c9;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-03-28 00:00:00;;;3;;;1', 3, '2022-04-15 11:35:49'),
(75, 'item_amc', 1, 'UPDATE', 'amc_code, item_code, amount,company_name,valid_from,valid_to,\r\ncreated_on  , created_by  , updated_on  , updated_by,  status   ', 'AMC16042022-0001;;;IC12042022-0002;;;22.00;;;Colors company;;;2022-04-03;;;2022-05-07;;;2022-04-16 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', 'AMC16042022-0001;;;IC12042022-0002;;;25.00;;;Colors company;;;2022-04-03;;;2022-05-07;;;2022-04-16 00:00:00;;;3;;;2022-04-16 00:00:00;;;3;;;1', 3, '2022-04-15 15:53:03'),
(76, 'item_amc', 1, 'UPDATE', 'amc_code, item_code, amount,company_name,valid_from,valid_to,\r\ncreated_on  , created_by  , updated_on  , updated_by,  status   ', 'AMC16042022-0001;;;IC12042022-0002;;;25.00;;;Colors company;;;2022-04-03;;;2022-05-07;;;2022-04-16 00:00:00;;;3;;;2022-04-16 00:00:00;;;3;;;1', 'AMC16042022-0001;;;IC12042022-0002;;;25.00;;;Colors company;;;2022-04-03;;;2022-05-07;;;2022-04-16 00:00:00;;;3;;;2022-04-16 00:00:00;;;3;;;2', 3, '2022-04-15 15:53:10'),
(77, 'categories', 8, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '2;;;Heaters;;;heaters;;;<p>warm heaters</p>\r\n;;;1;;;0;;;2022-04-13;;;3;;;2022-04-14;;;3', '2;;;Heaters;;;heaters;;;<p>warm heaters</p>\r\n;;;2;;;0;;;2022-04-14;;;2022-04-13;;;3;;;3', 3, '2022-04-15 15:54:40'),
(78, 'categories', 9, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Heaters;;;heaters1650063371;;;<p>heater</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;0000-00-00;;;0', '0;;;Heaters;;;heaters1650063371;;;<p>heaters</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', 3, '2022-04-15 15:59:06'),
(79, 'categories', 9, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Heaters;;;heaters1650063371;;;<p>heaters</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', '0;;;Heaters;;;heaters1650063371;;;<p>heaterin</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', 3, '2022-04-15 15:59:26'),
(80, 'categories', 9, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Heaters;;;heaters1650063371;;;<p>heaterin</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', '0;;;Heaters;;;heaters1650063371;;;<p>heaterin</p>\r\n;;;2;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', 3, '2022-04-15 15:59:45'),
(81, 'categories', 10, 'UPDATE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;hair brushes;;;hair-brushes;;;<p>helo</p>\r\n;;;1;;;0;;;2022-04-16;;;3;;;0000-00-00;;;0', '0;;;hair brushes;;;hair-brushes;;;<p>helo</p>\r\n;;;2;;;0;;;2022-04-16;;;3;;;0000-00-00;;;0', 0, '2022-04-15 16:01:19'),
(83, 'categories', 9, 'DELETE', 'parent_id ,  category_name ,  slug ,  description ,  status ,  order_no ,  created_on ,  created_by ,  updated_on ,  updated_by', '0;;;Heaters;;;heaters1650063371;;;<p>heaterin</p>\r\n;;;;2;;;0;;;2022-04-16;;;3;;;2022-04-16;;;3', NULL, 3, '2022-04-15 16:03:57'),
(84, 'users', 3, 'UPDATE', 'user_name,password,auth_code,role_id,designation_code,\r\ndepart_id,appointed_date,full_name, profile_image,temp_address,permanent_address,\r\ncountry_code,contact, description,email,currently_working', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;504a4be027611204ff993fd5d945a5c9;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-02-24 00:00:00;;;1;;;2022-03-28 00:00:00;;;3;;;1', 'admin;;;482c811da5d5b4bc6d497ffa98491e38;;;2035c112425a855d645932bbe60c8a42;;;1;;;HRM;;;3;;;2022-03-01;;;admin;;;http://localhost:7777/stock/uploads/logo/admin.jpg;;;babarmahal;;;nawalparasi;;;nepa;;;9856767678978;;;<p>dashdga hagsdhgas jdhgas hdas</p>\r\n;;;admin@gmail.com;;;Yes;;;2022-03-28 00:00:00;;;3;;;1', 3, '2022-04-18 16:55:16'),
(85, 'staff_design_depart', 1, 'UPDATE', 'staff_id, designation_code, department_code, from,to,\r\ncreated_on  , created_by  , updated_on  , updated_by,  status   ', '1;;;Mana;;;Dev;;;2020-01-01;;;0000-00-00;;;2022-04-18 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', '1;;;Mana;;;Dev;;;2020-01-01;;;2020-02-01;;;2022-04-18 00:00:00;;;3;;;2022-04-19 00:00:00;;;1;;;2', 1, '2022-04-19 11:45:23'),
(86, 'fiscal_year_para', 1, 'UPDATE', ' fiscal_year , start_date  ,end_date, current_tag, created_on  , created_by  , updated_on  , updated_by,  status   ', '2022;;;2022-03-13;;;2023-03-12;;;Y;;;2022-04-14 00:00:00;;;3;;;2022-04-14 00:00:00;;;3;;;1', '2022/23;;;2022-03-13;;;2023-03-12;;;Y;;;2022-04-14 00:00:00;;;3;;;2022-04-19 00:00:00;;;3;;;1', 3, '2022-04-19 15:12:07'),
(87, 'requisition_master', 1, 'UPDATE', 'requisition_no,requisition_date, department_id,cancel_tag, requested_by,requested_date,approved_by, approved_date,remarks,\r\ncreated_on  , created_by  , updated_on  , updated_by,  status', 'RQ19042022-0001;;;2022-04-19;;;3;;;0;;;1;;;0000-00-00;;;0;;;0000-00-00;;;requisition1;;;2022-04-19 06:17:32;;;1;;;0000-00-00 00:00:00;;;0;;;1', 'RQ19042022-0001;;;2022-04-19;;;3;;;0;;;2;;;0000-00-00;;;0;;;0000-00-00;;;requisition1;;;2022-04-19 06:17:32;;;1;;;2022-04-19 11:01:03;;;1;;;1', 1, '2022-04-19 16:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `slug`, `description`, `order_no`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 0, 'Furniture', 'furniture', '<p>category furniture is my furniture</p>\r\n', 0, '2022-04-12', 1, '2022-04-14', 3, '1'),
(2, 0, 'Electronics', 'electronic', '', 0, '2022-04-12', 1, '2022-04-13', 1, '1'),
(3, 2, 'Personal Computer', 'personal-computer', '<p>Personal Compute PCr</p>\r\n', 0, '2022-04-12', 1, '2022-04-12', 1, '1'),
(4, 1, 'Seating and Comfort Furniture', 'seating-and-comfort-furniture', '<p><strong>Seating and Comfort Furniture</strong></p>\r\n', 0, '2022-04-12', 1, '0000-00-00', 0, '1'),
(5, 1, 'Tables and Desks Furniture', 'tables-and-desks-furniture', '<p><strong>Tables and Desks Furniture</strong></p>\r\n', 0, '2022-04-12', 1, '0000-00-00', 0, '1'),
(6, 2, 'Tablet', 'tablet', '', 0, '2022-04-12', 1, '0000-00-00', 0, '1'),
(7, 2, 'Laptop', 'laptop', 'all laptops', 0, '2022-04-12', 1, '0000-00-00', 0, '1'),
(8, 2, 'Heaters', 'heaters', '<p>warm heaters</p>\r\n', 0, '2022-04-13', 3, '2022-04-14', 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `remarks` mediumtext DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `country_code` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `contact_person` varchar(25) DEFAULT NULL,
  `cp_mobile` varchar(255) DEFAULT NULL,
  `DocPath` mediumtext DEFAULT NULL,
  `meta_keyword` varchar(155) DEFAULT NULL,
  `meta_desc` varchar(155) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `type` enum('about','contact','policy','terms','others') NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `show_on_menu` enum('Yes','No') NOT NULL,
  `show_on_footer_menu` enum('Yes','No') NOT NULL DEFAULT 'No',
  `external_url` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `slug`, `description`, `featured_image`, `sub_title`, `type`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`, `show_on_menu`, `show_on_footer_menu`, `external_url`, `parent_id`, `order_no`) VALUES
(1, 'About Us', 'about-us', '<p>Shine Trade Private Limited, has been working in development projects in Nepal since 2008. It has established strong resources to accommodate demand of local resources in Energy, Telecom and Industrial sector. The decade of persistence effort, we have well balanced team to deliver project on time with quality delivery. We have gathered experience working with many world best companies in similar sectors. Shine Trade Private Limited, implements best business practice to conduct strategic business operations for development projects. Shine Trade can help turn ideas into action. We have well balanced team to deliver project on time with quality delivery. The team of entrepreneurs who strongly believes in implementation of technologies which makes daily life of people easier keeping it at economically sustainable to a better life. We have vision and focus on the road map which leads to the successful ventures and a better future and we believe in meticulously planning to build new ideas intended for nurturing resources binding with cutting edge technology from global leaders to endeavor for achievement. We pride ourselves contributing in development projects and being associated with leading companies and being successful in their expectation since the incorporation of our company. We take pride in claiming that we provide new and futuristic technology, few of which are first of it&rsquo;s kind in Nepal such as VAS, IP CCTV monitoring, DCIM, Power Systems.</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'About Us', 'about', '2022-01-30', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 4),
(2, 'Contact Us', 'contact-us', '<p>Shine Trade Private Limited, has been working in development projects in Nepal since 2008. It has established strong resources to accommodate demand of local resources in Energy, Telecom and Industrial sector. The decade of persistence effort, we have well balanced team to deliver project on time with quality delivery. We have gathered experience working with many world best companies in similar sectors.</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Contact us', 'contact', '2022-01-30', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 5),
(3, 'Team', 'team', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>hjkl</li>\r\n	<li>ghjkl</li>\r\n	<li>\r\n	<h1>hjkl;ghjkl</h1>\r\n	</li>\r\n</ul>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Team', 'others', '2022-01-30', 1, '2022-03-25', 3, '1', 'No', 'No', 'http://localhost/shine/team', 0, 10),
(5, 'Services', 'services', '', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Services', 'others', '2022-02-15', 1, '2022-03-25', 3, '1', 'Yes', 'No', 'Services', 0, 1),
(6, 'Clients', 'clients', '', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Clients', 'others', '2022-02-15', 1, '2022-03-25', 3, '1', 'Yes', 'No', 'Clients', 0, 2),
(7, 'News & Articles', 'news-articles', '', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'News & Articles', 'others', '2022-02-15', 1, '2022-03-25', 3, '1', 'Yes', 'No', 'News & Articles', 0, 3),
(13, 'Portfolio', 'portfolio', '', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'portfolio', 'others', '2022-02-18', 1, '2022-03-25', 3, '1', 'No', 'No', 'portfolio', 0, 8),
(14, 'Terms of service', 'terms-of-service', '<p>Shine Trade Private Limited, implements best business practice to conduct strategic business operations for development projects. We have been providing futuristic business services in Nepal to promote various development projects. As being one of the first companies to provide managed services for value added services (VAS) to Telecom operators including Nepal Telecom, it has always been facilitating development of new technologies in the market.</p>\r\n\r\n<p>The team of entrepreneurs who strongly believes in implementation of technologies which makes daily life of people easier keeping it at economically sustainable to a better life. We have vision and focus on the road map which leads to the successful ventures and a better future.</p>\r\n\r\n<p>We believe in meticulously planning to build new ideas intended for nurturing resources binding with cutting edge technology from global leaders to endeavor for achievement.</p>\r\n\r\n<p>We pride ourselves contributing in development projects and being associated with leading companies in Nepal and being successful in their expectation since the incorporation of our company.</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Terms of service', 'terms', '2022-02-23', 1, '2022-03-25', 3, '1', 'No', 'Yes', '', 0, 7),
(15, 'Privacy policy', 'privacy-policy', '<p>Shine Trade Private Limited, implements best business practice to conduct strategic business operations for development projects. We have been providing futuristic business services in Nepal to promote various development projects. As being one of the first companies to provide managed services for value added services (VAS) to Telecom operators including Nepal Telecom, it has always been facilitating development of new technologies in the market.</p>\r\n\r\n<p>The team of entrepreneurs who strongly believes in implementation of technologies which makes daily life of people easier keeping it at economically sustainable to a better life. We have vision and focus on the road map which leads to the successful ventures and a better future.</p>\r\n\r\n<p>We believe in meticulously planning to build new ideas intended for nurturing resources binding with cutting edge technology from global leaders to endeavor for achievement.</p>\r\n\r\n<p>We pride ourselves contributing in development projects and being associated with leading companies in Nepal and being successful in their expectation since the incorporation of our company.</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', ' Privacy policy', 'policy', '2022-02-23', 1, '2022-03-25', 3, '0', 'No', 'No', '', 0, 4),
(16, 'Anti corruption policy', 'anti-corruption-policy', '<p>Anti corruption policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Anti corruption policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'No', '', 0, 6),
(17, 'CSR Policy', 'csr-policy', '<p>CSR Policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'CSR Policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '0', 'No', 'No', '', 0, 6),
(18, 'Environment Policy', 'environment-policy', '<p>Environment Policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Environment Policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 9),
(19, 'Health and safety policy', 'health-and-safety-policy', '<p>Health and safety policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Health and safety policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 11),
(20, 'Human Right Policy', 'human-right-policy', '<p>Human Right Policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Human Right Policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 12),
(21, 'Recruitment policy', 'recruitment-policy', '<p>Recruitment policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Recruitment policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 14),
(22, 'Code of Ethics', 'code-of-ethics', '<p>Code of Ethics</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Code of Ethics', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 13),
(23, 'Sustainable Policy', 'sustainable-policy', '<p>Sustainable Policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Sustainable Policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 0, 15),
(24, 'Sustainable Procurement Policy', 'sustainable-procurement-policy', '<p>Sustainable Procurement Policy</p>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Sustainable Procurement Policy', 'policy', '2022-02-24', 1, '2022-03-25', 3, '1', 'Yes', 'Yes', '', 23, 16);

-- --------------------------------------------------------

--
-- Table structure for table `country_para`
--

CREATE TABLE `country_para` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_para`
--

INSERT INTO `country_para` (`id`, `country_code`, `country_name`, `nationality`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'nepa', 'nepali', 'nepali', '2022-02-07', 1, '2022-04-14', 3, '1'),
(2, 'Aust', 'Austria', 'austrian', '2022-04-14', 3, '2022-04-14', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `department_para`
--

CREATE TABLE `department_para` (
  `id` int(11) NOT NULL,
  `department_name` varchar(25) NOT NULL,
  `department_code` varchar(20) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_para`
--

INSERT INTO `department_para` (`id`, `department_name`, `department_code`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'Accounting', 'Acc', 'develop', 3, '2022-03-28', 3, '2022-04-14', '1'),
(2, 'Development', 'Dev', 'develop', 3, '2022-03-28', 3, '2022-04-14', '1'),
(3, 'Marketing', 'Mar', 'lorem ipsum', 3, '2022-03-28', 3, '2022-04-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `depreciation_para`
--

CREATE TABLE `depreciation_para` (
  `id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `depreciation_rate` varchar(25) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `designation_para`
--

CREATE TABLE `designation_para` (
  `id` int(11) NOT NULL,
  `designation_code` varchar(20) NOT NULL,
  `designation_name` varchar(25) NOT NULL,
  `position` varchar(25) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_para`
--

INSERT INTO `designation_para` (`id`, `designation_code`, `designation_name`, `position`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(7, 'HRM', 'Human Resource Manager', '1', '', 1, '2022-03-03', 0, '2022-03-28', '1'),
(8, 'WDV', 'Web Developer', '2', NULL, 3, '2022-03-28', 0, '0000-00-00', '2'),
(9, 'Mana', 'Manager', '2', 'manager', 3, '2022-04-14', 3, '2022-04-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_year_para`
--

CREATE TABLE `fiscal_year_para` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `current_tag` enum('Y','N') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiscal_year_para`
--

INSERT INTO `fiscal_year_para` (`id`, `fiscal_year`, `start_date`, `end_date`, `current_tag`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, '2022/23', '2022-03-13', '2023-03-12', 'Y', 3, '2022-04-14', 3, '2022-04-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE `gate_pass` (
  `id` int(11) NOT NULL,
  `gate_pass_no` varchar(25) NOT NULL,
  `sales_no` varchar(25) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass_details`
--

CREATE TABLE `gate_pass_details` (
  `id` int(11) NOT NULL,
  `gate_pass_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_details`
--

CREATE TABLE `grn_details` (
  `id` int(11) NOT NULL,
  `grn_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_master`
--

CREATE TABLE `grn_master` (
  `id` int(11) NOT NULL,
  `grn_no` varchar(25) NOT NULL,
  `type` enum('DR','INV','PO','PRQ') NOT NULL,
  `grn_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `payment_type` enum('CH','CQ','CR') NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `advance_paid` decimal(11,2) DEFAULT NULL,
  `discount_per` decimal(11,2) DEFAULT NULL,
  `discount_amt` decimal(11,2) DEFAULT NULL,
  `grand_total` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `travel_charges` decimal(11,2) DEFAULT NULL,
  `other_charges` decimal(11,2) DEFAULT NULL,
  `approved_date` date NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `posted_on` date DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_return`
--

CREATE TABLE `grn_return` (
  `id` int(11) NOT NULL,
  `grn_return_no` varchar(25) NOT NULL,
  `grn_no` varchar(25) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `posted_on` date DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `total_amt` decimal(11,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_return_details`
--

CREATE TABLE `grn_return_details` (
  `id` int(11) NOT NULL,
  `grn_return_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `unit_price` decimal(11,2) DEFAULT NULL,
  `actual_total_price` decimal(11,2) DEFAULT NULL,
  `total_price` decimal(11,2) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `type` enum('DR','RQ') NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_return_details`
--

CREATE TABLE `issue_return_details` (
  `id` int(11) NOT NULL,
  `issue_return_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `issued_qty` int(11) NOT NULL,
  `returned_qty` int(11) NOT NULL,
  `remarks` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_return_master`
--

CREATE TABLE `issue_return_master` (
  `id` int(11) NOT NULL,
  `issue_return_no` varchar(25) NOT NULL,
  `issue_no` varchar(25) NOT NULL,
  `return_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `prepared_by` varchar(25) DEFAULT NULL,
  `prepared_date` date NOT NULL,
  `approved_date` date NOT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `posted_on` date NOT NULL,
  `posted_tag` enum('0','1') NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_slip_details`
--

CREATE TABLE `issue_slip_details` (
  `id` int(11) NOT NULL,
  `issue_slip_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `issued_qnty` int(11) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_slip_details`
--

INSERT INTO `issue_slip_details` (`id`, `issue_slip_no`, `item_code`, `issued_qnty`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(3, 'IS20042022-0002', 'IC19042022-0003', 1, 'dsadsa sdsdasdasdas sa sa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(4, 'IS20042022-0002', 'IC19042022-0001', 550, 'sad sad as sa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(7, 'IS20042022-0001', 'IC19042022-0002', 20, 'ggg ggg hhhh', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(8, 'IS20042022-0001', 'IC19042022-0003', 10, 'hjhjh jhjjhjhj', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(9, 'IS20042022-0003', 'IC19042022-0001', 1, 'issued Remarks hai', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `issue_slip_master`
--

CREATE TABLE `issue_slip_master` (
  `id` int(11) NOT NULL,
  `issue_slip_no` varchar(25) NOT NULL,
  `requisition_no` varchar(25) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `issue_type` enum('DR','RQ') NOT NULL,
  `department_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `issued_by` varchar(25) DEFAULT NULL,
  `issued_on` date NOT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_by` varchar(100) NOT NULL,
  `posted_tag` enum('1','0') DEFAULT '0',
  `posted_on` date NOT NULL,
  `remarks` mediumtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_slip_master`
--

INSERT INTO `issue_slip_master` (`id`, `issue_slip_no`, `requisition_no`, `issue_date`, `issue_type`, `department_id`, `staff_id`, `issued_by`, `issued_on`, `approved_by`, `approved_on`, `cancel_tag`, `posted_by`, `posted_tag`, `posted_on`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'IS20042022-0001', 'RQ20042022-0001', '2022-04-20', 'RQ', 3, 1, 'Rajesh Dai', '2022-04-20', NULL, NULL, '0', '', '0', '0000-00-00', 'dsad asd sadadasd sa', 3, '2022-04-28 10:48:18', 3, '2022-04-20 12:08:43', '1'),
(2, 'IS20042022-0002', NULL, '2022-04-20', 'DR', 3, 1, 'Rajesh Dai', '2022-04-20', '3', '2022-05-01', '0', '3', '1', '2022-05-01', 'd asdsadsadsada s', 3, '2022-05-01 15:54:20', 0, '0000-00-00 00:00:00', '1'),
(3, 'IS20042022-0003', 'RQ20042022-0002', '2022-03-01', 'RQ', 3, 1, 'Rajesh DAqi', '2022-04-20', '3', '2022-04-29', '0', '3', '1', '2022-04-28', 'ghjdas dashjdhasg dhas', 3, '2022-04-29 10:57:21', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item_accessories`
--

CREATE TABLE `item_accessories` (
  `id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `accessories_code` varchar(25) NOT NULL,
  `accessories_name` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` varchar(25) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_amc`
--

CREATE TABLE `item_amc` (
  `id` int(11) NOT NULL,
  `amc_code` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_amc`
--

INSERT INTO `item_amc` (`id`, `amc_code`, `item_code`, `amount`, `company_name`, `valid_from`, `valid_to`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'AMC16042022-0001', 'IC12042022-0002', '25.00', 'Colors company', '2022-04-03', '2022-05-07', '2022-04-16 00:00:00', 3, '2022-04-16 00:00:00', 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `item_infos`
--

CREATE TABLE `item_infos` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_type` enum('A','I') NOT NULL DEFAULT 'A',
  `specification` varchar(255) DEFAULT NULL,
  `model_no` varchar(255) DEFAULT NULL,
  `max_qty` int(6) NOT NULL,
  `min_qty` int(6) NOT NULL,
  `reorder_level` int(6) NOT NULL,
  `shelf_life_no` int(3) NOT NULL,
  `shelf_life_ym` enum('Y','M') NOT NULL DEFAULT 'Y',
  `purchases_date` datetime DEFAULT NULL,
  `depreciation_rate` int(11) NOT NULL,
  `item_image` mediumtext DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_infos`
--

INSERT INTO `item_infos` (`id`, `category_id`, `location_id`, `item_code`, `item_name`, `item_type`, `specification`, `model_no`, `max_qty`, `min_qty`, `reorder_level`, `shelf_life_no`, `shelf_life_ym`, `purchases_date`, `depreciation_rate`, `item_image`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(6, 3, 2, 'IC19042022-0001', 'Computer Wifi Core i5', 'A', '', 'IC19042022-0001', 50, 3, 10, 4, 'Y', NULL, 10, '', NULL, 1, '2022-04-19 00:00:00', 0, '0000-00-00 00:00:00', '1'),
(7, 6, 2, 'IC19042022-0002', 'Dell Inspiron 3511', 'A', '', 'IC19042022-0002', 50, 5, 10, 2, 'Y', NULL, 10, '', NULL, 1, '2022-04-19 00:00:00', 0, '2022-04-19 00:00:00', '1'),
(8, 7, 1, 'IC19042022-0003', 'Dell Inspiron 3511', 'A', 'This is trestsitt', 'Dell Inspiron 5310 IC17042022-0012', 50, 5, 3, 5, 'Y', NULL, 13, '', NULL, 1, '2022-04-19 00:00:00', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item_insurance`
--

CREATE TABLE `item_insurance` (
  `id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `insurance_no` varchar(30) NOT NULL,
  `insurance_company` varchar(25) NOT NULL,
  `tenuer` varchar(25) NOT NULL,
  `tenuer_ym` enum('Y','M') NOT NULL DEFAULT 'Y',
  `premium_amt` varchar(120) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_warranty`
--

CREATE TABLE `item_warranty` (
  `id` int(11) NOT NULL,
  `warranty_code` varchar(20) NOT NULL,
  `item_code` varchar(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location_para`
--

CREATE TABLE `location_para` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_para`
--

INSERT INTO `location_para` (`id`, `parent_id`, `store_name`, `address`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 0, 'warehouse one', 'Babarmahal, Kathmandu, Nepal', '2022-03-28 00:00:00', 1, '0000-00-00 00:00:00', 0, '1'),
(2, 0, 'warehouse two', 'Balkumar, Lalitpur , Nepal', '2022-03-28 00:00:00', 1, '2022-03-31 00:00:00', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `location_transfer`
--

CREATE TABLE `location_transfer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `posted_tag` enum('0','1') DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `from_loc` int(11) NOT NULL,
  `to_loc` int(11) NOT NULL,
  `remark` varchar(155) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mrn_details`
--

CREATE TABLE `mrn_details` (
  `id` int(11) NOT NULL,
  `mrn_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `stock_qty` int(6) NOT NULL,
  `ordered_qty` int(6) NOT NULL,
  `mrn_qty` int(6) NOT NULL,
  `remaining_qty` int(6) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mrn_details`
--

INSERT INTO `mrn_details` (`id`, `mrn_no`, `item_code`, `stock_qty`, `ordered_qty`, `mrn_qty`, `remaining_qty`, `remark`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'MRN22042022-0001', 'IC19042022-0003', 0, 5, 0, 5, 'xito hai', '2022-04-22', 0, '0000-00-00', 0, '1'),
(2, 'MRN22042022-0001', 'IC19042022-0001', 0, 20, 0, 20, 'dami dami hai ta', '2022-04-22', 0, '0000-00-00', 0, '1'),
(3, 'MRN28042022-0002', 'IC19042022-0001', 0, 2000, 0, 2000, 'demand dherai vayo stock kami vayo hai', '2022-04-28', 0, '0000-00-00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mrn_master`
--

CREATE TABLE `mrn_master` (
  `id` int(11) NOT NULL,
  `mrn_no` varchar(25) NOT NULL,
  `mrn_date` date NOT NULL,
  `remarks` varchar(25) NOT NULL,
  `prepared_date` date NOT NULL,
  `approved_on` date NOT NULL,
  `prepared_by` varchar(25) NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mrn_master`
--

INSERT INTO `mrn_master` (`id`, `mrn_no`, `mrn_date`, `remarks`, `prepared_date`, `approved_on`, `prepared_by`, `approved_by`, `cancel_tag`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'MRN22042022-0001', '2022-04-22', 'Sabai kura dami chaiyo ha', '2022-04-22', '2022-04-28', 'Rajesh Dai', '3', '0', '2022-04-22', 3, '0000-00-00', 0, '1'),
(2, 'MRN28042022-0002', '2022-04-28', 'la la xito xito lyaunu pa', '2022-04-28', '2022-04-28', 'Rajesh Dai', '', '1', '2022-04-28', 3, '0000-00-00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `opening_detail`
--

CREATE TABLE `opening_detail` (
  `id` int(11) NOT NULL,
  `opening_master_id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `location_id` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opening_detail`
--

INSERT INTO `opening_detail` (`id`, `opening_master_id`, `item_code`, `qty`, `unit_price`, `total_price`, `location_id`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 1, 'IC19042022-0003', 5000, '100000.00', '500000000.00', 2, 'dami xa hai yo', 0, '2022-04-26 12:39:50', 0, '0000-00-00 00:00:00', '1'),
(2, 1, 'IC19042022-0002', 6000, '90000.00', '540000000.00', 2, 'yo jhan dami hai', 0, '2022-04-26 12:39:50', 0, '0000-00-00 00:00:00', '1'),
(3, 1, 'IC19042022-0001', 5, '3000.00', '1500000.00', 2, 'yo jhan babal hai', 0, '2022-04-26 16:04:11', 0, '0000-00-00 00:00:00', '1'),
(4, 2, 'IC19042022-0001', 100, '4000.00', '400000.00', 2, '4000 wala hai yo', 0, '2022-04-26 16:11:04', 0, '0000-00-00 00:00:00', '1'),
(5, 3, 'IC19042022-0001', 400, '2500.00', '1000000.00', 1, 'adas assfasa', 0, '2022-04-28 12:23:46', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `opening_master`
--

CREATE TABLE `opening_master` (
  `id` int(11) NOT NULL,
  `opening_code` varchar(100) NOT NULL,
  `fiscal_year` varchar(10) NOT NULL,
  `opening_date` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` date NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_by` varchar(255) NOT NULL,
  `posted_on` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opening_master`
--

INSERT INTO `opening_master` (`id`, `opening_code`, `fiscal_year`, `opening_date`, `approved_by`, `approved_on`, `cancel_tag`, `posted_tag`, `posted_by`, `posted_on`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'OPE26042022-0001', '2022/23', '2022-01-01', 3, '2022-04-26', '0', '1', '3', '2022-04-26', 'January', 3, '2022-04-26 08:54:50', 0, '2022-04-26 12:40:07', '1'),
(2, 'OPE26042022-0002', '2022/23', '2022-01-01', 3, '2022-04-26', '0', '1', '3', '2022-04-26', 'wifi router only hai', 3, '2022-04-26 12:26:04', 0, '2022-04-26 16:14:50', '1'),
(3, 'OPE28042022-0003', '2022/23', '2022-01-10', NULL, '0000-00-00', '1', '0', '', '0000-00-00', 'feri wifi', 3, '2022-04-28 08:38:46', 3, '2022-04-28 15:15:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_request_no` varchar(25) NOT NULL,
  `purchase_order_no` varchar(25) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `request_type` enum('DR','MRN','REQ','PR') NOT NULL,
  `requisition_no` varchar(25) NOT NULL,
  `mrn_no` varchar(25) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `requested_on` date NOT NULL,
  `requested_by` varchar(25) NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` int(11) NOT NULL,
  `purchase_order_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `requested_qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(11) NOT NULL,
  `purchase_request_no` varchar(25) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `request_type` enum('DR','MRN','REQ') NOT NULL,
  `requisition_no` varchar(25) DEFAULT NULL,
  `mrn_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `requested_on` date NOT NULL,
  `requested_by` varchar(25) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `purchase_request_no`, `department_id`, `staff_id`, `request_type`, `requisition_no`, `mrn_no`, `remarks`, `requested_on`, `requested_by`, `cancel_tag`, `approved_by`, `approved_on`, `created_on`, `created_by`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'PR02052022-0001', 3, 2, 'DR', NULL, NULL, 'chado chado hai yekdam fast chaiyeko xa hailala la la la', '2022-05-02', 'Rajesh Dai', '0', '', '0000-00-00', '2022-05-02 11:32:36', 3, 3, '2022-05-02 11:50:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_details`
--

CREATE TABLE `purchase_request_details` (
  `id` int(11) NOT NULL,
  `purchase_request_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `requested_qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_request_details`
--

INSERT INTO `purchase_request_details` (`id`, `purchase_request_no`, `item_code`, `item_name`, `requested_qty`, `received_qty`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(4, 'PR02052022-0001', 'IC19042022-0003', 'Dell Inspiron 3511', 500, 0, 'fast hai', '2022-05-02 11:50:42', '3', '0000-00-00 00:00:00', 0, '1'),
(5, 'PR02052022-0001', 'IC19042022-0002', 'Dell Inspiron 3511', 500, 0, 'fast hai', '2022-05-02 11:50:42', '3', '0000-00-00 00:00:00', 0, '1'),
(6, 'PR02052022-0001', 'IC19042022-0001', 'Computer Wifi Core i5', 500, 0, 'fast hai fast', '2022-05-02 11:50:42', '3', '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_details`
--

CREATE TABLE `requisition_details` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `quantity_requested` int(6) NOT NULL,
  `received_qnty` int(6) NOT NULL,
  `remaining_qnty` int(6) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_details`
--

INSERT INTO `requisition_details` (`id`, `requisition_no`, `item_code`, `quantity_requested`, `received_qnty`, `remaining_qnty`, `remark`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'RQ20042022-0001', 'IC19042022-0003', 100, 0, 100, 'sad sadsasadsasdfs dfsdfsdfsd', 0, '2022-04-20 15:11:49', 0, '0000-00-00 00:00:00', '1'),
(2, 'RQ20042022-0001', 'IC19042022-0002', 200, 0, 200, 'da sdajshda sdgsajhdsajh', 0, '2022-04-20 15:11:49', 0, '0000-00-00 00:00:00', '1'),
(3, 'RQ20042022-0002', 'IC19042022-0001', 1, 1, 0, 'asgdhasg hjasgdhsajdasdasass asdgjsaasas', 0, '2022-04-20 15:12:44', 0, '0000-00-00 00:00:00', '1'),
(4, 'RQ28042022-0003', 'IC19042022-0001', 10, 0, 10, '10 ota fast hai', 0, '2022-04-28 12:28:39', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_master`
--

CREATE TABLE `requisition_master` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(25) NOT NULL,
  `requisition_date` date NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  `remarks` varchar(155) DEFAULT NULL,
  `cancel_tag` enum('0','1') DEFAULT '0',
  `requested_by` varchar(11) NOT NULL,
  `requested_date` date NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_master`
--

INSERT INTO `requisition_master` (`id`, `requisition_no`, `requisition_date`, `department_id`, `staff_id`, `remarks`, `cancel_tag`, `requested_by`, `requested_date`, `approved_by`, `approved_on`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'RQ20042022-0001', '2022-04-20', 3, 0, 'dami dami', '0', '1', '0000-00-00', '1', '0000-00-00', 3, '2022-04-20 11:26:49', 0, '0000-00-00 00:00:00', '1'),
(2, 'RQ20042022-0002', '2022-04-19', 3, 0, ' wdsfwdsfsd fsdf dssdfsdfsdf', '0', '1', '0000-00-00', '3', '2022-04-28', 3, '2022-04-20 11:27:44', 0, '0000-00-00 00:00:00', '1'),
(3, 'RQ28042022-0003', '2022-04-28', 3, 0, 'tset 3 hai', '1', '1', '0000-00-00', '', '0000-00-00', 3, '2022-04-28 08:43:39', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `actual_unit_price` decimal(11,2) DEFAULT NULL,
  `unit_price` decimal(11,2) DEFAULT NULL,
  `grand_total` decimal(11,2) DEFAULT NULL,
  `actual_total_price` decimal(11,2) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_master`
--

CREATE TABLE `sales_master` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(25) NOT NULL,
  `sales_code` int(11) NOT NULL,
  `sales_date` date DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(25) NOT NULL,
  `remarks` varchar(155) NOT NULL,
  `received_by` varchar(25) DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `payment_type` enum('CH','CQ','CR') NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `advance_amt` decimal(11,2) DEFAULT NULL,
  `discount_amt` varchar(25) DEFAULT NULL,
  `discount_per` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `other_charges` decimal(11,2) DEFAULT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `created_on` varchar(25) NOT NULL,
  `created_by` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL,
  `s_return_no` varchar(25) NOT NULL,
  `sales_rtn_date` date NOT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `posted_tag` enum('0','1') DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `qty` int(6) NOT NULL,
  `discount_per` decimal(11,2) DEFAULT NULL,
  `discount_amt` decimal(11,2) DEFAULT NULL,
  `grand_total` decimal(11,2) DEFAULT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_details`
--

CREATE TABLE `sales_return_details` (
  `id` int(11) NOT NULL,
  `s_return_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `sale_no` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `unit_price` decimal(11,2) DEFAULT NULL,
  `actual_total_price` decimal(11,2) DEFAULT NULL,
  `total_price` decimal(11,2) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_slogan` varchar(150) NOT NULL,
  `web_url` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `map_location` text NOT NULL,
  `contact_detail` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `linked_in` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `fav` varchar(255) NOT NULL,
  `default_img` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_key_words` varchar(255) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_slogan`, `web_url`, `address`, `mobile`, `telephone`, `map_location`, `contact_detail`, `email`, `facebook`, `whatsapp`, `skype`, `twitter`, `instagram`, `youtube`, `googleplus`, `linked_in`, `logo`, `fav`, `default_img`, `meta_title`, `meta_description`, `meta_key_words`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Inventory', 'Inventory Management', 'http://localhost:7777/stock', 'Prasuti Marga -509, Kathmandu, Nepal', '+977-1-4102299, 4102213 ,4102239', '+977-1-4102299, 4102213 ,4102239', '', '<p>Prasuti Marga -509,</p>\r\n\r\n<p>Kathmandu, Nepal</p>\r\n\r\n<p><strong>Fax:&nbsp;</strong>+977-1-4102299<br />\r\n<strong>Phone:&nbsp;</strong>+977-1-4102299<br />\r\n<strong>Email:</strong>&nbsp;info@nyatapol.com</p>\r\n', 'info@nyatapol.com', 'https://www.facebook.com/', 'whatsup.com', 'skype.com', 'twitter.com', 'instagram.com', 'youtube.com', 'google.com', 'linked_in.com', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'Stock Management (Inventory)', '<p>Best Stock Management</p>', 'stock, stock management, inventory', '2022-04-20', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff_desig_depart`
--

CREATE TABLE `staff_desig_depart` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `designation_code` varchar(25) NOT NULL,
  `department_code` varchar(25) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_desig_depart`
--

INSERT INTO `staff_desig_depart` (`id`, `staff_id`, `designation_code`, `department_code`, `from`, `to`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 1, 'Mana', 'Dev', '2020-01-01', '2020-02-01', 3, '2022-04-18 00:00:00', 1, '2022-04-19 00:00:00', '2'),
(2, 1, 'Mana', 'Mar', '2020-02-01', '0000-00-00', 1, '2022-04-19 00:00:00', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff_infos`
--

CREATE TABLE `staff_infos` (
  `id` int(11) NOT NULL,
  `full_name` varchar(155) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `appointed_date` date DEFAULT NULL,
  `temp_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `country_code` varchar(25) NOT NULL,
  `contact` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_infos`
--

INSERT INTO `staff_infos` (`id`, `full_name`, `slug`, `description`, `featured_image`, `appointed_date`, `temp_address`, `permanent_address`, `country_code`, `contact`, `email`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Chelina Maharjan', '', '', '', '2020-01-01', 'Gwarko ,Lalitpur', 'Gwarko ,Lalitpur', 'nepa', '9860013046', 'cheleena.maharjan.3@gmail.com', '2022-04-18', 3, '0000-00-00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock_ledger`
--

CREATE TABLE `stock_ledger` (
  `id` int(11) NOT NULL,
  `ledger_code` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_type` enum('OPN','GRN','GRR','ISS','ISR','LCI','LCO','SCP','SAL','SAR') NOT NULL,
  `in_qty` int(6) NOT NULL,
  `out_qty` int(6) NOT NULL,
  `rem_qty` int(11) NOT NULL,
  `in_unit_price` decimal(11,2) NOT NULL,
  `in_total_price` decimal(11,2) NOT NULL,
  `in_actual_unit_price` decimal(11,2) NOT NULL,
  `in_actual_total_price` decimal(11,2) NOT NULL,
  `out_unit_price` decimal(11,2) NOT NULL,
  `out_total_price` decimal(11,2) NOT NULL,
  `out_actual_unit_price` decimal(11,2) NOT NULL,
  `out_actual_total_price` decimal(11,2) NOT NULL,
  `location_id` int(11) NOT NULL,
  `batch_no` varchar(25) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `transactioncode` varchar(25) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_ledger`
--

INSERT INTO `stock_ledger` (`id`, `ledger_code`, `item_code`, `transaction_date`, `transaction_type`, `in_qty`, `out_qty`, `rem_qty`, `in_unit_price`, `in_total_price`, `in_actual_unit_price`, `in_actual_total_price`, `out_unit_price`, `out_total_price`, `out_actual_unit_price`, `out_actual_total_price`, `location_id`, `batch_no`, `vendor_id`, `client_id`, `remarks`, `transactioncode`, `created_on`, `created_by`, `updated_on`, `updated_by`, `staff_id`, `status`) VALUES
(1, 'LEDG26042022-0001', 'IC19042022-0001', '2022-01-01', 'OPN', 500, 0, 0, '3000.00', '1500000.00', '3500.00', '1750000.00', '0.00', '0.00', '0.00', '0.00', 2, '', 0, 0, 'posted from opening', 'OPE26042022-0001', '2022-04-26', '3', '0000-00-00', 0, 0, '1'),
(2, 'LEDG26042022-0002', 'IC19042022-0002', '2022-01-01', 'OPN', 6000, 0, 6000, '90000.00', '540000000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 2, '', 0, 0, 'posted from opening', 'OPE26042022-0001', '2022-04-26', '3', '0000-00-00', 0, 0, '1'),
(3, 'LEDG26042022-0003', 'IC19042022-0003', '2022-01-01', 'OPN', 5, 0, 4, '100000.00', '500000000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 2, '', 0, 0, 'posted from opening', 'OPE26042022-0001', '2022-04-26', '3', '0000-00-00', 0, 0, '1'),
(8, 'LEDG26042022-0004', 'IC19042022-0001', '2022-01-01', 'OPN', 100, 0, 49, '4000.00', '400000.00', '4500.00', '450000.00', '0.00', '0.00', '0.00', '0.00', 2, '', 0, 0, 'posted from opening', 'OPE26042022-0002', '2022-04-26', '3', '0000-00-00', 0, 0, '1'),
(12, 'LEDG28042022-0005', 'IC19042022-0001', '2022-03-01', 'ISS', 0, 1, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '', 0, 0, 'posted from issue', 'IS20042022-0003', '2022-04-28', '3', '0000-00-00', 0, 0, '1'),
(25, 'LEDG01052022-0006', 'IC19042022-0001', '2022-04-20', 'ISS', 0, 550, 0, '0.00', '0.00', '0.00', '0.00', '3092.73', '1701000.00', '3592.73', '1976000.00', 0, '', 0, 0, 'posted from issue', 'IS20042022-0002', '2022-05-01', '3', '0000-00-00', 0, 0, '1'),
(26, 'LEDG01052022-0007', 'IC19042022-0003', '2022-04-20', 'ISS', 0, 1, 0, '0.00', '0.00', '0.00', '0.00', '100000.00', '100000.00', '0.00', '0.00', 0, '', 0, 0, 'posted from issue', 'IS20042022-0002', '2022-05-01', '3', '0000-00-00', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_cat`
--

CREATE TABLE `supplier_cat` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_infos`
--

CREATE TABLE `supplier_infos` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `remarks` mediumtext DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `contact_person` varchar(25) DEFAULT NULL,
  `cp_mobile` varchar(255) DEFAULT NULL,
  `docpath` mediumtext DEFAULT NULL,
  `meta_keyword` varchar(155) DEFAULT NULL,
  `meta_desc` varchar(155) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `temp_id` int(11) NOT NULL,
  `table_name` varchar(55) NOT NULL,
  `row_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_data`
--

INSERT INTO `temp_data` (`temp_id`, `table_name`, `row_id`, `value`) VALUES
(1, 'categories', 6, 'root@localhost;;;root@localhost'),
(2, 'categories', 1, 'root@localhost;;;root@localhost'),
(3, 'categories', 2, 'root@localhost;;;root@localhost'),
(4, 'categories', 3, 'root@localhost;;;root@localhost'),
(5, 'categories', 4, 'root@localhost;;;root@localhost'),
(6, 'categories', 5, 'root@localhost;;;root@localhost'),
(7, 'categories', 6, 'root@localhost;;;root@localhost'),
(8, 'categories', 7, 'root@localhost;;;root@localhost'),
(9, 'categories', 8, 'root@localhost;;;root@localhost'),
(10, 'categories', 9, 'root@localhost;;;root@localhost'),
(11, 'categories', 10, 'root@localhost;;;root@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `auth_code` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `designation_code` varchar(20) DEFAULT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `appointed_date` date DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `temp_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `currently_working` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `auth_code`, `role_id`, `staff_id`, `designation_code`, `depart_id`, `appointed_date`, `full_name`, `profile_image`, `temp_address`, `permanent_address`, `country_code`, `contact`, `description`, `email`, `created_on`, `created_by`, `updated_on`, `updated_by`, `currently_working`, `status`) VALUES
(1, 'nyatapol', 'c7098dd01fd11866dcb79e33d03ecfc5', '2fea04ab2467cf94f8b31c1fbdffe0a7', 1, NULL, 'HRM', 3, NULL, 'Nyatapol', 'https://nyatapol.biz/shine/uploads/logo/download.png', 'Babarmahal', '', 'nepa', '+977 1-4102299', '', 'nyatapol@gmail.com', '2022-01-19', 0, '2022-02-07', 1, 'Yes', '1'),
(2, 'rajesh', 'c7098dd01fd11866dcb79e33d03ecfc5', 'b41f1ae8bc8aeb8b467612ba63ef34b0', 1, NULL, 'HRM', 3, NULL, 'Rajesh Gurung', 'https://nyatapol.biz/shine/uploads/logo/download.png', 'Tikathali', '', 'nepa', '98119561913', '<h1>dami hai sss</h1>\r\n', 'gurungrajesh1992@gmail.com', '2022-01-28', 1, '2022-02-07', 1, 'Yes', '1'),
(3, 'admin', '482c811da5d5b4bc6d497ffa98491e38', '2fc92014b26c655dc76e400b7d58f480', 1, NULL, 'HRM', 3, '2022-03-01', 'admin', 'http://localhost:7777/stock/uploads/logo/admin.jpg', 'babarmahal', 'nawalparasi', 'nepa', '9856767678978', '<p>dashdga hagsdhgas jdhgas hdas</p>\r\n', 'admin@gmail.com', '2022-02-24', 1, '2022-03-28', 3, 'Yes', '1'),
(6, 'chelina', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 1, 1, NULL, NULL, NULL, '', '', '', '', '', '', '', 'cheleena.maharjan.3@gmail.com', '2022-04-18', 3, '0000-00-00', 0, 'Yes', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(1, 'blog', 'form', 1, '2022-02-02 10:06:45'),
(2, 'blog', 'all', 1, '2022-02-02 10:07:03'),
(3, 'content', 'menu', 1, '2022-02-06 08:52:08'),
(4, 'content', 'menu', 1, '2022-02-06 08:52:21'),
(5, 'site_settings', NULL, 1, '2022-02-06 08:54:02'),
(6, 'site_settings', NULL, 1, '2022-02-06 08:54:46'),
(7, 'site_settings', NULL, 1, '2022-02-06 08:55:01'),
(8, 'site_settings', NULL, 1, '2022-02-06 08:55:14'),
(9, 'site_settings', NULL, 1, '2022-02-06 08:55:14'),
(10, 'site_settings', NULL, 1, '2022-02-06 08:55:59'),
(11, 'content', 'menu', 1, '2022-02-06 08:56:41'),
(12, 'user', 'all', 1, '2022-02-06 08:56:54'),
(13, 'user', 'all', 1, '2022-02-06 08:57:29'),
(14, 'user', 'all', 1, '2022-02-06 08:57:52'),
(15, 'user', 'all', 1, '2022-02-06 08:58:03'),
(16, 'user', 'all', 1, '2022-02-06 08:58:33'),
(17, 'user', 'all', 1, '2022-02-06 08:58:40'),
(18, 'user', 'all', 1, '2022-02-06 08:59:02'),
(19, 'site_settings', NULL, 1, '2022-02-06 08:59:32'),
(20, 'site_settings', NULL, 1, '2022-02-06 09:00:02'),
(21, 'user', 'all', 1, '2022-02-06 09:00:05'),
(22, 'user', 'all', 1, '2022-02-06 09:00:22'),
(23, 'site_settings', NULL, 1, '2022-02-06 09:00:28'),
(24, 'site_settings', NULL, 1, '2022-02-06 09:00:42'),
(25, 'site_settings', NULL, 1, '2022-02-06 09:01:04'),
(26, 'user', 'all', 1, '2022-02-06 09:04:40'),
(27, 'user', 'all', 1, '2022-02-06 09:04:58'),
(28, 'user', 'all', 1, '2022-02-06 09:09:18'),
(29, 'user', 'form', 1, '2022-02-06 09:09:23'),
(30, 'user', 'form', 1, '2022-02-06 09:09:32'),
(31, 'user', 'all', 1, '2022-02-06 09:09:32'),
(32, 'site_settings', NULL, 1, '2022-02-06 09:10:18'),
(33, 'user', 'all', 1, '2022-02-06 09:10:26'),
(34, 'site_settings', NULL, 1, '2022-02-06 09:10:29'),
(35, 'site_settings', NULL, 1, '2022-02-06 09:11:27'),
(36, 'user', 'all', 1, '2022-02-06 09:14:52'),
(37, 'user', 'all', 1, '2022-02-06 09:15:14'),
(38, 'user', 'all', 1, '2022-02-06 09:15:48'),
(39, 'user', 'all', 1, '2022-02-06 09:16:56'),
(40, 'user', 'all', 1, '2022-02-06 09:17:11'),
(41, 'user', 'all', 1, '2022-02-06 09:18:30'),
(42, 'user', 'all', 1, '2022-02-06 09:19:23'),
(43, 'user', 'all', 1, '2022-02-06 09:19:46'),
(44, 'user', 'all', 1, '2022-02-06 09:20:21'),
(45, 'user', 'all', 1, '2022-02-06 09:20:23'),
(46, 'dashboard', NULL, 1, '2022-02-06 09:20:38'),
(47, 'dashboard', NULL, 1, '2022-02-06 09:23:17'),
(48, 'dashboard', NULL, 1, '2022-02-06 10:29:27'),
(49, 'content', 'all', 1, '2022-02-06 10:29:32'),
(50, 'dashboard', NULL, 1, '2022-02-07 05:23:23'),
(51, 'dashboard', NULL, 1, '2022-02-07 05:23:33'),
(52, 'dashboard', NULL, 1, '2022-02-07 05:25:09'),
(53, 'dashboard', NULL, 1, '2022-02-07 05:25:24'),
(54, 'dashboard', NULL, 1, '2022-02-07 05:26:04'),
(55, 'dashboard', NULL, 1, '2022-02-07 05:26:36'),
(56, 'dashboard', NULL, 1, '2022-02-07 05:26:48'),
(57, 'dashboard', NULL, 1, '2022-02-07 05:28:04'),
(58, 'dashboard', NULL, 1, '2022-02-07 05:29:36'),
(59, 'dashboard', NULL, 1, '2022-02-07 05:30:17'),
(60, 'dashboard', NULL, 1, '2022-02-07 05:30:57'),
(61, 'dashboard', NULL, 1, '2022-02-07 05:31:55'),
(62, 'dashboard', NULL, 1, '2022-02-07 05:33:43'),
(63, 'blog', 'all', 1, '2022-02-07 05:37:21'),
(64, 'blog', 'all', 1, '2022-02-07 05:37:53'),
(65, 'dashboard', NULL, 1, '2022-02-07 05:39:35'),
(66, 'dashboard', NULL, 1, '2022-02-07 05:40:12'),
(67, 'blog', 'all', 1, '2022-02-07 05:40:19'),
(68, 'blog', 'all', 1, '2022-02-07 05:40:23'),
(69, 'dashboard', NULL, 1, '2022-02-07 05:42:38'),
(70, 'blog', 'all', 1, '2022-02-07 05:43:36'),
(71, 'dashboard', NULL, 1, '2022-02-07 05:45:33'),
(72, 'dashboard', NULL, 1, '2022-02-07 05:46:03'),
(73, 'dashboard', NULL, 1, '2022-02-07 05:46:32'),
(74, 'dashboard', NULL, 1, '2022-02-07 05:57:57'),
(75, 'dashboard', NULL, 1, '2022-02-07 05:58:56'),
(76, 'dashboard', NULL, 1, '2022-02-07 06:00:18'),
(77, 'dashboard', NULL, 1, '2022-02-07 06:00:21'),
(78, 'dashboard', NULL, 1, '2022-02-07 06:00:22'),
(79, 'dashboard', NULL, 1, '2022-02-07 06:00:23'),
(80, 'dashboard', NULL, 1, '2022-02-07 06:01:56'),
(81, 'dashboard', NULL, 1, '2022-02-07 06:01:56'),
(82, 'dashboard', NULL, 1, '2022-02-07 06:01:56'),
(83, 'dashboard', NULL, 1, '2022-02-07 06:01:57'),
(84, 'dashboard', NULL, 1, '2022-02-07 06:01:57'),
(85, 'dashboard', NULL, 1, '2022-02-07 06:01:57'),
(86, 'dashboard', NULL, 1, '2022-02-07 06:01:57'),
(87, 'dashboard', NULL, 1, '2022-02-07 06:01:57'),
(88, 'dashboard', NULL, 1, '2022-02-07 06:01:58'),
(89, 'dashboard', NULL, 1, '2022-02-07 06:01:58'),
(90, 'dashboard', NULL, 1, '2022-02-07 06:01:58'),
(91, 'dashboard', NULL, 1, '2022-02-07 06:01:58'),
(92, 'dashboard', NULL, 1, '2022-02-07 06:01:58'),
(93, 'dashboard', NULL, 1, '2022-02-07 06:01:59'),
(94, 'dashboard', NULL, 1, '2022-02-07 06:01:59'),
(95, 'dashboard', NULL, 1, '2022-02-07 06:11:33'),
(96, 'dashboard', NULL, 1, '2022-02-07 06:11:50'),
(97, 'content', 'all', 1, '2022-02-07 06:11:59'),
(98, 'content', 'soft_delete', 1, '2022-02-07 06:12:08'),
(99, 'content', 'all', 1, '2022-02-07 06:12:09'),
(100, 'content', 'all', 1, '2022-02-07 06:13:49'),
(101, 'content', 'form', 1, '2022-02-07 06:13:53'),
(102, 'content', 'form', 1, '2022-02-07 06:14:20'),
(103, 'content', 'all', 1, '2022-02-07 06:14:20'),
(104, 'content', 'all', 1, '2022-02-07 06:16:42'),
(105, 'content', 'form', 1, '2022-02-07 06:17:30'),
(106, 'content', 'form', 1, '2022-02-07 06:17:45'),
(107, 'content', 'all', 1, '2022-02-07 06:17:45'),
(108, 'content', 'form', 1, '2022-02-07 06:17:52'),
(109, 'content', 'form', 1, '2022-02-07 06:18:03'),
(110, 'content', 'all', 1, '2022-02-07 06:18:03'),
(111, 'content', 'all', 1, '2022-02-07 06:18:27'),
(112, 'blog', 'all', 1, '2022-02-07 06:18:44'),
(113, 'blog', 'all', 1, '2022-02-07 06:19:19'),
(114, 'blog', 'all', 1, '2022-02-07 06:20:20'),
(115, 'site_settings', NULL, 1, '2022-02-07 06:20:31'),
(116, 'site_settings', NULL, 1, '2022-02-07 06:21:16'),
(117, 'site_settings', NULL, 1, '2022-02-07 06:21:16'),
(118, 'user', 'all', 1, '2022-02-07 06:21:37'),
(119, 'user', 'form', 1, '2022-02-07 06:21:48'),
(120, 'user', 'form', 1, '2022-02-07 06:21:48'),
(121, 'user', 'form', 1, '2022-02-07 06:22:11'),
(122, 'user', 'all', 1, '2022-02-07 06:22:11'),
(123, 'user', 'form', 1, '2022-02-07 06:22:17'),
(124, 'user', 'all', 1, '2022-02-07 06:22:18'),
(125, 'faq', 'all', 1, '2022-02-07 06:22:44'),
(126, 'faq', 'all', 1, '2022-02-07 06:23:18'),
(127, 'slider', 'all', 1, '2022-02-07 06:23:23'),
(128, 'slider', 'all', 1, '2022-02-07 06:23:46'),
(129, 'testimonials', 'all', 1, '2022-02-07 06:23:51'),
(130, 'testimonials', 'all', 1, '2022-02-07 06:24:15'),
(131, 'team', 'all', 1, '2022-02-07 06:24:20'),
(132, 'team', 'all', 1, '2022-02-07 06:24:49'),
(133, 'client', 'all', 1, '2022-02-07 06:24:57'),
(134, 'client', 'all', 1, '2022-02-07 06:25:23'),
(135, 'content', 'menu', 1, '2022-02-07 06:25:34'),
(136, 'user_role', 'all', 1, '2022-02-07 06:26:29'),
(137, 'user', 'all', 1, '2022-02-07 06:26:35'),
(138, 'user', 'all', 1, '2022-02-07 06:29:05'),
(139, 'dashboard', NULL, 1, '2022-02-07 06:29:09'),
(140, 'blog', 'all', 1, '2022-02-07 06:29:15'),
(141, 'blog', 'all', 1, '2022-02-07 06:29:21'),
(142, 'site_settings', NULL, 1, '2022-02-07 06:30:30'),
(143, 'slider', 'all', 1, '2022-02-07 06:34:35'),
(144, 'test', 'all', 1, '2022-02-07 06:34:39'),
(145, 'test', 'form', 1, '2022-02-07 06:34:44'),
(146, 'test', 'form', 1, '2022-02-07 06:35:08'),
(147, 'test', 'all', 1, '2022-02-07 06:35:09'),
(148, 'test', 'soft_delete', 1, '2022-02-07 06:35:32'),
(149, 'test', 'all', 1, '2022-02-07 06:35:32'),
(150, 'test', 'all', 1, '2022-02-07 06:36:07'),
(151, 'test', 'form', 1, '2022-02-07 06:36:11'),
(152, 'test', 'form', 1, '2022-02-07 06:36:24'),
(153, 'test', 'all', 1, '2022-02-07 06:36:24'),
(154, 'user_role', 'all', 1, '2022-02-07 06:37:06'),
(155, 'user_role', 'all', 1, '2022-02-07 06:37:12'),
(156, 'site_settings', NULL, 1, '2022-02-07 06:37:46'),
(157, 'content', 'menu', 1, '2022-02-07 06:38:07'),
(158, 'dashboard', NULL, 1, '2022-02-07 08:47:33'),
(159, 'dashboard', NULL, 1, '2022-02-07 09:36:23'),
(160, 'dashboard', NULL, 1, '2022-02-13 05:52:41'),
(161, 'dashboard', NULL, 1, '2022-02-13 05:56:21'),
(162, 'blog', 'all', 1, '2022-02-13 05:56:26'),
(163, 'blog', 'form', 1, '2022-02-13 05:56:30'),
(164, 'blog', 'form', 1, '2022-02-13 05:56:36'),
(165, 'blog', 'form', 1, '2022-02-13 05:57:22'),
(166, 'blog', 'form', 1, '2022-02-13 05:57:28'),
(167, 'blog', 'form', 1, '2022-02-13 06:00:04'),
(168, 'blog', 'form', 1, '2022-02-13 06:00:14'),
(169, 'client', 'form', 1, '2022-02-13 06:01:00'),
(170, 'client', 'form', 1, '2022-02-13 06:01:05'),
(171, 'client', 'form', 1, '2022-02-13 06:03:58'),
(172, 'client', 'form', 1, '2022-02-13 06:04:12'),
(173, 'client', 'form', 1, '2022-02-13 06:04:43'),
(174, 'client', 'form', 1, '2022-02-13 06:05:17'),
(175, 'faq', 'form', 1, '2022-02-13 06:06:01'),
(176, 'faq', 'form', 1, '2022-02-13 06:06:06'),
(177, 'faq', 'form', 1, '2022-02-13 06:08:04'),
(178, 'slider', 'form', 1, '2022-02-13 06:08:43'),
(179, 'slider', 'form', 1, '2022-02-13 06:08:51'),
(180, 'slider', 'form', 1, '2022-02-13 06:10:24'),
(181, 'slider', 'form', 1, '2022-02-13 06:10:37'),
(182, 'subscriber', 'all', 1, '2022-02-13 06:12:11'),
(183, 'subscriber', 'all', 1, '2022-02-13 06:16:11'),
(184, 'subscriber', 'all', 1, '2022-02-13 06:16:19'),
(185, 'subscriber', 'all', 1, '2022-02-13 06:17:48'),
(186, 'subscriber', 'all', 1, '2022-02-13 06:17:55'),
(187, 'subscriber', 'all', 1, '2022-02-13 06:18:05'),
(188, 'team', 'form', 1, '2022-02-13 06:19:33'),
(189, 'team', 'form', 1, '2022-02-13 06:19:47'),
(190, 'team', 'form', 1, '2022-02-13 06:22:26'),
(191, 'team', 'form', 1, '2022-02-13 06:23:22'),
(192, 'testimonials', 'form', 1, '2022-02-13 06:28:23'),
(193, 'testimonials', 'form', 1, '2022-02-13 06:28:33'),
(194, 'testimonials', 'form', 1, '2022-02-13 06:28:50'),
(195, 'subscriber', 'all', 1, '2022-02-13 06:28:58'),
(196, 'site_settings', NULL, 1, '2022-02-13 06:29:28'),
(197, 'dashboard', NULL, 1, '2022-02-13 10:21:50'),
(198, 'site_settings', NULL, 1, '2022-02-13 10:22:05'),
(199, 'site_settings', NULL, 1, '2022-02-13 10:48:13'),
(200, 'site_settings', NULL, 1, '2022-02-13 10:53:28'),
(201, 'site_settings', NULL, 1, '2022-02-13 10:58:55'),
(202, 'dashboard', NULL, 1, '2022-02-14 09:01:06'),
(203, 'blog', 'all', 1, '2022-02-14 09:01:21'),
(204, 'blog', 'form', 1, '2022-02-14 09:02:03'),
(205, 'blog', 'form', 1, '2022-02-14 09:02:10'),
(206, 'blog', 'form', 1, '2022-02-14 09:02:24'),
(207, 'blog', 'form', 1, '2022-02-14 09:02:33'),
(208, 'blog', 'form', 1, '2022-02-14 09:04:45'),
(209, 'blog', 'form', 1, '2022-02-14 09:06:24'),
(210, 'blog', 'form', 1, '2022-02-14 09:07:17'),
(211, 'blog', 'form', 1, '2022-02-14 09:08:12'),
(212, 'blog', 'form', 1, '2022-02-14 09:08:32'),
(213, 'blog', 'form', 1, '2022-02-14 09:09:08'),
(214, 'blog', 'form', 1, '2022-02-14 09:09:28'),
(215, 'client', 'form', 1, '2022-02-14 09:09:56'),
(216, 'client', 'form', 1, '2022-02-14 09:11:57'),
(217, 'client', 'form', 1, '2022-02-14 09:12:01'),
(218, 'client', 'form', 1, '2022-02-14 09:12:32'),
(219, 'client', 'form', 1, '2022-02-14 09:12:40'),
(220, 'client', 'form', 1, '2022-02-14 09:13:05'),
(221, 'client', 'form', 1, '2022-02-14 09:13:26'),
(222, 'faq', 'form', 1, '2022-02-14 09:13:58'),
(223, 'faq', 'form', 1, '2022-02-14 09:15:16'),
(224, 'faq', 'form', 1, '2022-02-14 09:15:33'),
(225, 'slider', 'form', 1, '2022-02-14 09:17:16'),
(226, 'slider', 'form', 1, '2022-02-14 09:17:40'),
(227, 'subscriber', 'all', 1, '2022-02-14 09:17:52'),
(228, 'team', 'form', 1, '2022-02-14 09:20:03'),
(229, 'team', 'form', 1, '2022-02-14 09:20:41'),
(230, 'testimonials', 'form', 1, '2022-02-14 09:24:21'),
(231, 'testimonials', 'form', 1, '2022-02-14 09:24:59'),
(232, 'testimonials', 'form', 1, '2022-02-14 09:26:55'),
(233, 'testimonials', 'form', 1, '2022-02-14 09:27:01'),
(234, 'testimonials', 'form', 1, '2022-02-14 09:27:36'),
(235, 'testimonials', 'form', 1, '2022-02-14 09:27:54'),
(236, 'dashboard', NULL, 1, '2022-02-14 11:02:01'),
(237, 'content', 'all', 1, '2022-02-14 11:02:58'),
(238, 'content', 'menu', 1, '2022-02-14 11:03:15'),
(239, 'content', 'menu', 1, '2022-02-14 11:03:25'),
(240, 'dashboard', NULL, 1, '2022-02-15 05:53:05'),
(241, 'site_settings', NULL, 1, '2022-02-15 05:53:44'),
(242, 'site_settings', NULL, 1, '2022-02-15 06:01:25'),
(243, 'site_settings', NULL, 1, '2022-02-15 06:03:45'),
(244, 'site_settings', NULL, 1, '2022-02-15 06:04:15'),
(245, 'site_settings', NULL, 1, '2022-02-15 06:05:01'),
(246, 'site_settings', NULL, 1, '2022-02-15 06:06:07'),
(247, 'site_settings', NULL, 1, '2022-02-15 06:07:04'),
(248, 'site_settings', NULL, 1, '2022-02-15 06:07:32'),
(249, 'site_settings', NULL, 1, '2022-02-15 06:10:25'),
(250, 'site_settings', NULL, 1, '2022-02-15 06:12:00'),
(251, 'site_settings', NULL, 1, '2022-02-15 06:15:15'),
(252, 'site_settings', NULL, 1, '2022-02-15 06:17:41'),
(253, 'site_settings', NULL, 1, '2022-02-15 06:18:34'),
(254, 'site_settings', NULL, 1, '2022-02-15 06:18:34'),
(255, 'site_settings', NULL, 1, '2022-02-15 06:18:39'),
(256, 'site_settings', NULL, 1, '2022-02-15 06:38:57'),
(257, 'site_settings', NULL, 1, '2022-02-15 06:38:57'),
(258, 'dashboard', NULL, 1, '2022-02-15 06:39:20'),
(259, 'dashboard', NULL, 1, '2022-02-15 08:45:40'),
(260, 'content', 'menu', 1, '2022-02-15 08:45:48'),
(261, 'content', 'all', 1, '2022-02-15 08:46:09'),
(262, 'content', 'form', 1, '2022-02-15 08:47:30'),
(263, 'content', 'form', 1, '2022-02-15 08:47:31'),
(264, 'content', 'form', 1, '2022-02-15 08:47:32'),
(265, 'content', 'form', 1, '2022-02-15 08:47:33'),
(266, 'content', 'form', 1, '2022-02-15 08:47:39'),
(267, 'content', 'all', 1, '2022-02-15 08:47:39'),
(268, 'content', 'form', 1, '2022-02-15 08:47:58'),
(269, 'content', 'all', 1, '2022-02-15 08:47:58'),
(270, 'content', 'form', 1, '2022-02-15 08:51:25'),
(271, 'content', 'all', 1, '2022-02-15 08:51:26'),
(272, 'content', 'form', 1, '2022-02-15 08:51:35'),
(273, 'content', 'all', 1, '2022-02-15 08:51:35'),
(274, 'content', 'all', 1, '2022-02-15 08:52:20'),
(275, 'content', 'form', 1, '2022-02-15 08:53:28'),
(276, 'content', 'form', 1, '2022-02-15 08:56:01'),
(277, 'content', 'form', 1, '2022-02-15 08:56:42'),
(278, 'content', 'all', 1, '2022-02-15 08:56:42'),
(279, 'content', 'form', 1, '2022-02-15 08:56:49'),
(280, 'content', 'form', 1, '2022-02-15 08:56:56'),
(281, 'content', 'all', 1, '2022-02-15 08:56:56'),
(282, 'content', 'form', 1, '2022-02-15 08:57:03'),
(283, 'content', 'form', 1, '2022-02-15 08:58:50'),
(284, 'content', 'all', 1, '2022-02-15 08:58:51'),
(285, 'content', 'form', 1, '2022-02-15 08:59:24'),
(286, 'content', 'form', 1, '2022-02-15 08:59:50'),
(287, 'content', 'all', 1, '2022-02-15 08:59:51'),
(288, 'content', 'form', 1, '2022-02-15 09:00:03'),
(289, 'content', 'form', 1, '2022-02-15 09:00:11'),
(290, 'content', 'all', 1, '2022-02-15 09:00:12'),
(291, 'content', 'form', 1, '2022-02-15 09:00:19'),
(292, 'content', 'form', 1, '2022-02-15 09:00:23'),
(293, 'content', 'all', 1, '2022-02-15 09:00:24'),
(294, 'content', 'form', 1, '2022-02-15 09:00:51'),
(295, 'content', 'form', 1, '2022-02-15 09:01:15'),
(296, 'content', 'all', 1, '2022-02-15 09:01:16'),
(297, 'content', 'form', 1, '2022-02-15 09:01:38'),
(298, 'content', 'form', 1, '2022-02-15 09:02:00'),
(299, 'content', 'all', 1, '2022-02-15 09:02:01'),
(300, 'content', 'form', 1, '2022-02-15 09:02:03'),
(301, 'content', 'form', 1, '2022-02-15 09:02:30'),
(302, 'content', 'all', 1, '2022-02-15 09:02:30'),
(303, 'content', 'form', 1, '2022-02-15 09:02:38'),
(304, 'content', 'form', 1, '2022-02-15 09:02:55'),
(305, 'content', 'all', 1, '2022-02-15 09:02:56'),
(306, 'content', 'form', 1, '2022-02-15 09:03:01'),
(307, 'content', 'form', 1, '2022-02-15 09:03:26'),
(308, 'content', 'all', 1, '2022-02-15 09:03:27'),
(309, 'content', 'form', 1, '2022-02-15 09:03:29'),
(310, 'content', 'form', 1, '2022-02-15 09:03:50'),
(311, 'content', 'all', 1, '2022-02-15 09:03:51'),
(312, 'content', 'menu', 1, '2022-02-15 09:03:54'),
(313, 'content', 'menu', 1, '2022-02-15 09:56:34'),
(314, 'content', 'save_order', 1, '2022-02-15 10:01:07'),
(315, 'content', 'save_order', 1, '2022-02-15 10:02:14'),
(316, 'content', 'save_order', 1, '2022-02-15 10:03:07'),
(317, 'content', 'save_order', 1, '2022-02-15 10:03:07'),
(318, 'content', 'all', 1, '2022-02-15 10:10:23'),
(319, 'content', 'save_order', 1, '2022-02-15 10:10:33'),
(320, 'content', 'save_order', 1, '2022-02-15 10:11:00'),
(321, 'content', 'save_order', 1, '2022-02-15 10:11:25'),
(322, 'content', 'save_order', 1, '2022-02-15 10:11:54'),
(323, 'content', 'all', 1, '2022-02-15 10:13:24'),
(324, 'slider', 'all', 1, '2022-02-15 10:14:21'),
(325, 'slider', 'all', 1, '2022-02-15 10:16:10'),
(326, 'slider', 'form', 1, '2022-02-15 10:16:14'),
(327, 'slider', 'form', 1, '2022-02-15 10:17:54'),
(328, 'slider', 'all', 1, '2022-02-15 10:17:54'),
(329, 'slider', 'form', 1, '2022-02-15 10:20:53'),
(330, 'slider', 'all', 1, '2022-02-15 10:23:29'),
(331, 'slider', 'form', 1, '2022-02-15 10:23:43'),
(332, 'slider', 'form', 1, '2022-02-15 10:23:50'),
(333, 'slider', 'all', 1, '2022-02-15 10:23:50'),
(334, 'slider', 'all', 1, '2022-02-15 10:24:44'),
(335, 'slider', 'all', 1, '2022-02-15 10:24:48'),
(336, 'slider', 'all', 1, '2022-02-15 10:25:08'),
(337, 'slider', 'all', 1, '2022-02-15 10:25:50'),
(338, 'slider', 'all', 1, '2022-02-15 10:26:22'),
(339, 'slider', 'form', 1, '2022-02-15 10:26:25'),
(340, 'slider', 'form', 1, '2022-02-15 10:26:36'),
(341, 'slider', 'all', 1, '2022-02-15 10:26:36'),
(342, 'slider', 'form', 1, '2022-02-15 10:26:39'),
(343, 'slider', 'form', 1, '2022-02-15 10:46:29'),
(344, 'slider', 'form', 1, '2022-02-15 10:53:09'),
(345, 'slider', 'all', 1, '2022-02-15 10:53:10'),
(346, 'site_settings', NULL, 1, '2022-02-15 11:04:23'),
(347, 'site_settings', NULL, 1, '2022-02-15 11:10:37'),
(348, 'site_settings', NULL, 1, '2022-02-15 11:10:37'),
(349, 'site_settings', NULL, 1, '2022-02-15 11:13:14'),
(350, 'site_settings', NULL, 1, '2022-02-15 11:16:39'),
(351, 'site_settings', NULL, 1, '2022-02-15 11:16:39'),
(352, 'site_settings', NULL, 1, '2022-02-15 11:20:59'),
(353, 'site_settings', NULL, 1, '2022-02-15 11:22:07'),
(354, 'site_settings', NULL, 1, '2022-02-15 11:22:07'),
(355, 'client', 'all', 1, '2022-02-15 11:44:15'),
(356, 'client', 'form', 1, '2022-02-15 11:44:19'),
(357, 'client', 'form', 1, '2022-02-15 11:44:43'),
(358, 'client', 'all', 1, '2022-02-15 11:44:43'),
(359, 'client', 'form', 1, '2022-02-15 11:44:56'),
(360, 'client', 'form', 1, '2022-02-15 11:45:38'),
(361, 'client', 'all', 1, '2022-02-15 11:45:38'),
(362, 'client', 'form', 1, '2022-02-15 11:45:43'),
(363, 'client', 'form', 1, '2022-02-15 11:46:42'),
(364, 'client', 'all', 1, '2022-02-15 11:46:42'),
(365, 'client', 'form', 1, '2022-02-15 11:46:58'),
(366, 'client', 'form', 1, '2022-02-15 11:47:38'),
(367, 'client', 'all', 1, '2022-02-15 11:47:38'),
(368, 'content', 'menu', 1, '2022-02-15 11:49:03'),
(369, 'content', 'all', 1, '2022-02-15 11:51:10'),
(370, 'content', 'form', 1, '2022-02-15 11:51:19'),
(371, 'content', 'form', 1, '2022-02-15 11:51:30'),
(372, 'content', 'all', 1, '2022-02-15 11:51:31'),
(373, 'content', 'form', 1, '2022-02-15 11:52:20'),
(374, 'content', 'form', 1, '2022-02-15 12:01:53'),
(375, 'content', 'all', 1, '2022-02-15 12:01:54'),
(376, 'content', 'form', 1, '2022-02-15 12:02:14'),
(377, 'content', 'form', 1, '2022-02-15 12:02:26'),
(378, 'content', 'all', 1, '2022-02-15 12:02:27'),
(379, 'blog', 'all', 1, '2022-02-15 12:10:38'),
(380, 'content', 'all', 1, '2022-02-15 12:15:22'),
(381, 'content', 'form', 1, '2022-02-15 12:15:30'),
(382, 'content', 'form', 1, '2022-02-15 12:15:39'),
(383, 'content', 'all', 1, '2022-02-15 12:15:39'),
(384, 'blog', 'form', 1, '2022-02-15 12:22:28'),
(385, 'blog', 'form', 1, '2022-02-15 12:22:38'),
(386, 'blog', 'all', 1, '2022-02-15 12:22:39'),
(387, 'dashboard', NULL, 1, '2022-02-15 14:44:36'),
(388, 'content', 'menu', 1, '2022-02-15 14:44:42'),
(389, 'content', 'save_order', 1, '2022-02-15 14:44:59'),
(390, 'content', 'menu', 1, '2022-02-15 16:07:30'),
(391, 'dashboard', NULL, 1, '2022-02-17 05:47:27'),
(392, 'blog', 'all', 1, '2022-02-17 05:47:35'),
(393, 'blog', 'form', 1, '2022-02-17 05:47:40'),
(394, 'blog', 'form', 1, '2022-02-17 05:49:43'),
(395, 'blog', 'all', 1, '2022-02-17 05:49:43'),
(396, 'blog', 'form', 1, '2022-02-17 05:49:48'),
(397, 'blog', 'form', 1, '2022-02-17 05:53:27'),
(398, 'blog', 'all', 1, '2022-02-17 05:53:28'),
(399, 'blog', 'form', 1, '2022-02-17 05:53:30'),
(400, 'blog', 'form', 1, '2022-02-17 05:54:42'),
(401, 'blog', 'all', 1, '2022-02-17 05:54:43'),
(402, 'blog', 'form', 1, '2022-02-17 05:55:08'),
(403, 'blog', 'form', 1, '2022-02-17 06:01:39'),
(404, 'blog', 'all', 1, '2022-02-17 06:01:39'),
(405, 'blog', 'form', 1, '2022-02-17 06:01:43'),
(406, 'blog', 'form', 1, '2022-02-17 06:02:04'),
(407, 'blog', 'all', 1, '2022-02-17 06:02:04'),
(408, 'blog', 'form', 1, '2022-02-17 06:02:07'),
(409, 'blog', 'all', 1, '2022-02-17 06:02:10'),
(410, 'blog', 'form', 1, '2022-02-17 06:02:12'),
(411, 'blog', 'form', 1, '2022-02-17 06:02:19'),
(412, 'blog', 'all', 1, '2022-02-17 06:02:20'),
(413, 'blog', 'form', 1, '2022-02-17 06:02:22'),
(414, 'blog', 'form', 1, '2022-02-17 06:02:38'),
(415, 'blog', 'all', 1, '2022-02-17 06:02:38'),
(416, 'blog', 'form', 1, '2022-02-17 06:19:43'),
(417, 'blog', 'form', 1, '2022-02-17 06:19:44'),
(418, 'blog', 'form', 1, '2022-02-17 06:19:45'),
(419, 'blog', 'form', 1, '2022-02-17 06:20:02'),
(420, 'blog', 'all', 1, '2022-02-17 06:20:03'),
(421, 'blog', 'form', 1, '2022-02-17 06:20:33'),
(422, 'blog', 'all', 1, '2022-02-17 06:20:38'),
(423, 'blog', 'form', 1, '2022-02-17 06:20:39'),
(424, 'blog', 'all', 1, '2022-02-17 06:20:46'),
(425, 'dashboard', NULL, 1, '2022-02-17 07:45:53'),
(426, 'site_settings', NULL, 1, '2022-02-17 07:45:58'),
(427, 'site_settings', NULL, 1, '2022-02-17 07:58:02'),
(428, 'site_settings', NULL, 1, '2022-02-17 07:58:03'),
(429, 'site_settings', NULL, 1, '2022-02-17 07:58:37'),
(430, 'site_settings', NULL, 1, '2022-02-17 07:58:38'),
(431, 'site_settings', NULL, 1, '2022-02-17 08:05:37'),
(432, 'dashboard', NULL, 1, '2022-02-18 05:38:02'),
(433, 'blog', 'form', 1, '2022-02-18 05:38:54'),
(434, 'service', 'form', 1, '2022-02-18 05:53:21'),
(435, 'service', 'all', 1, '2022-02-18 05:54:58'),
(436, 'service', 'form', 1, '2022-02-18 05:55:10'),
(437, 'service', 'form', 1, '2022-02-18 05:55:54'),
(438, 'content', 'all', 1, '2022-02-18 05:56:31'),
(439, 'content', 'form', 1, '2022-02-18 05:56:40'),
(440, 'content', 'form', 1, '2022-02-18 05:57:02'),
(441, 'content', 'all', 1, '2022-02-18 05:57:02'),
(442, 'service', 'form', 1, '2022-02-18 05:58:32'),
(443, 'service', 'form', 1, '2022-02-18 06:00:34'),
(444, 'service', 'form', 1, '2022-02-18 06:41:23'),
(445, 'service', 'all', 1, '2022-02-18 06:41:25'),
(446, 'service', 'form', 1, '2022-02-18 06:41:28'),
(447, 'service', 'form', 1, '2022-02-18 06:42:14'),
(448, 'service', 'all', 1, '2022-02-18 06:42:15'),
(449, 'service', 'form', 1, '2022-02-18 06:42:18'),
(450, 'service', 'form', 1, '2022-02-18 06:43:08'),
(451, 'service', 'all', 1, '2022-02-18 06:43:08'),
(452, 'service', 'form', 1, '2022-02-18 06:43:17'),
(453, 'service', 'form', 1, '2022-02-18 06:44:02'),
(454, 'service', 'all', 1, '2022-02-18 06:44:03'),
(455, 'service', 'all', 1, '2022-02-18 06:46:32'),
(456, 'service', 'all', 1, '2022-02-18 06:47:55'),
(457, 'service', 'all', 1, '2022-02-18 06:48:25'),
(458, 'service', 'all', 1, '2022-02-18 06:48:59'),
(459, 'service', 'all', 1, '2022-02-18 06:49:02'),
(460, 'service', 'all', 1, '2022-02-18 06:49:07'),
(461, 'service', 'form', 1, '2022-02-18 06:49:14'),
(462, 'content', 'menu', 1, '2022-02-18 07:04:57'),
(463, 'content', 'save_order', 1, '2022-02-18 07:05:07'),
(464, 'content', 'save_order', 1, '2022-02-18 07:05:26'),
(465, 'content', 'all', 1, '2022-02-18 08:40:39'),
(466, 'content', 'form', 1, '2022-02-18 08:42:19'),
(467, 'content', 'form', 1, '2022-02-18 08:44:18'),
(468, 'content', 'menu', 1, '2022-02-18 08:45:06'),
(469, 'content', 'save_order', 1, '2022-02-18 08:45:22'),
(470, 'content', 'menu', 1, '2022-02-18 08:52:42'),
(471, 'content', 'menu', 1, '2022-02-18 08:53:04'),
(472, 'content', 'menu', 1, '2022-02-18 08:53:42'),
(473, 'portfolio', 'form', 1, '2022-02-18 08:53:47'),
(474, 'portfolio', 'all', 1, '2022-02-18 08:53:47'),
(475, 'portfolio', 'form', 1, '2022-02-18 08:54:52'),
(476, 'portfolio', 'form', 1, '2022-02-18 08:55:18'),
(477, 'portfolio', 'form', 1, '2022-02-18 08:56:37'),
(478, 'portfolio', 'all', 1, '2022-02-18 08:56:38'),
(479, 'portfolio', 'form', 1, '2022-02-18 08:56:48'),
(480, 'portfolio', 'form', 1, '2022-02-18 09:00:23'),
(481, 'portfolio', 'all', 1, '2022-02-18 09:00:24'),
(482, 'portfolio', 'form', 1, '2022-02-18 09:00:28'),
(483, 'portfolio', 'form', 1, '2022-02-18 09:01:03'),
(484, 'portfolio', 'all', 1, '2022-02-18 09:01:04'),
(485, 'portfolio', 'form', 1, '2022-02-18 09:01:09'),
(486, 'portfolio', 'form', 1, '2022-02-18 09:01:37'),
(487, 'portfolio', 'all', 1, '2022-02-18 09:01:38'),
(488, 'portfolio', 'form', 1, '2022-02-18 09:01:48'),
(489, 'portfolio', 'form', 1, '2022-02-18 09:02:12'),
(490, 'portfolio', 'all', 1, '2022-02-18 09:02:13'),
(491, 'portfolio', 'form', 1, '2022-02-18 09:02:15'),
(492, 'portfolio', 'form', 1, '2022-02-18 09:02:42'),
(493, 'portfolio', 'all', 1, '2022-02-18 09:02:43'),
(494, 'portfolio', 'form', 1, '2022-02-18 09:02:48'),
(495, 'portfolio', 'form', 1, '2022-02-18 09:03:12'),
(496, 'portfolio', 'all', 1, '2022-02-18 09:03:12'),
(497, 'portfolio', 'form', 1, '2022-02-18 09:03:16'),
(498, 'portfolio', 'form', 1, '2022-02-18 09:03:41'),
(499, 'portfolio', 'all', 1, '2022-02-18 09:03:42'),
(500, 'content', 'all', 1, '2022-02-18 09:08:42'),
(501, 'content', 'all', 1, '2022-02-18 09:08:47'),
(502, 'content', 'form', 1, '2022-02-18 09:08:51'),
(503, 'content', 'form', 1, '2022-02-18 09:10:10'),
(504, 'content', 'all', 1, '2022-02-18 09:10:10'),
(505, 'content', 'form', 1, '2022-02-18 09:10:16'),
(506, 'content', 'form', 1, '2022-02-18 09:10:21'),
(507, 'content', 'all', 1, '2022-02-18 09:10:22'),
(508, 'subscriber', 'all', 1, '2022-02-18 10:32:33'),
(509, 'subscriber', 'all', 1, '2022-02-18 10:32:40'),
(510, 'subscriber', 'all', 1, '2022-02-18 10:32:54'),
(511, 'feedback', 'all', 1, '2022-02-18 10:36:04'),
(512, 'feedback', 'all', 1, '2022-02-18 10:36:40'),
(513, 'subscriber', 'all', 1, '2022-02-18 10:36:45'),
(514, 'blog', 'all', 1, '2022-02-18 11:31:41'),
(515, 'blog', 'form', 1, '2022-02-18 11:31:44'),
(516, 'blog', 'all', 1, '2022-02-18 11:39:41'),
(517, 'blog', 'form', 1, '2022-02-18 12:02:08'),
(518, 'blog', 'form', 1, '2022-02-18 12:02:21'),
(519, 'blog', 'all', 1, '2022-02-18 12:02:21'),
(520, 'dashboard', NULL, 1, '2022-02-22 05:05:53'),
(521, 'portfolio', 'all', 1, '2022-02-22 05:34:45'),
(522, 'portfolio', 'form', 1, '2022-02-22 05:34:52'),
(523, 'portfolio', 'form', 1, '2022-02-22 05:35:10'),
(524, 'portfolio', 'all', 1, '2022-02-22 05:35:11'),
(525, 'client', 'all', 1, '2022-02-22 05:38:28'),
(526, 'client', 'form', 1, '2022-02-22 05:38:41'),
(527, 'client', 'form', 1, '2022-02-22 05:38:56'),
(528, 'client', 'all', 1, '2022-02-22 05:38:56'),
(529, 'service', 'all', 1, '2022-02-22 05:45:43'),
(530, 'site_settings', NULL, 1, '2022-02-22 05:52:24'),
(531, 'blog', 'all', 1, '2022-02-22 06:52:55'),
(532, 'blog', 'form', 1, '2022-02-22 06:53:00'),
(533, 'blog', 'form', 1, '2022-02-22 06:53:46'),
(534, 'blog', 'all', 1, '2022-02-22 06:53:47'),
(535, 'blog', 'form', 1, '2022-02-22 06:54:13'),
(536, 'dashboard', NULL, 1, '2022-02-23 05:14:00'),
(537, 'site_settings', NULL, 1, '2022-02-23 05:30:25'),
(538, 'site_settings', NULL, 1, '2022-02-23 05:33:22'),
(539, 'site_settings', NULL, 1, '2022-02-23 05:33:23'),
(540, 'site_settings', NULL, 1, '2022-02-23 05:34:43'),
(541, 'site_settings', NULL, 1, '2022-02-23 05:34:43'),
(542, 'content', 'all', 1, '2022-02-23 05:40:05'),
(543, 'content', 'form', 1, '2022-02-23 05:40:10'),
(544, 'content', 'form', 1, '2022-02-23 05:41:47'),
(545, 'content', 'form', 1, '2022-02-23 05:42:17'),
(546, 'content', 'form', 1, '2022-02-23 05:46:13'),
(547, 'content', 'all', 1, '2022-02-23 05:46:19'),
(548, 'content', 'all', 1, '2022-02-23 05:46:28'),
(549, 'content', 'form', 1, '2022-02-23 05:46:32'),
(550, 'content', 'form', 1, '2022-02-23 05:46:32'),
(551, 'content', 'all', 1, '2022-02-23 05:47:00'),
(552, 'content', 'form', 1, '2022-02-23 05:47:05'),
(553, 'content', 'form', 1, '2022-02-23 05:47:14'),
(554, 'content', 'form', 1, '2022-02-23 05:53:09'),
(555, 'content', 'all', 1, '2022-02-23 05:53:10'),
(556, 'content', 'form', 1, '2022-02-23 05:53:16'),
(557, 'content', 'all', 1, '2022-02-23 05:53:17'),
(558, 'content', 'form', 1, '2022-02-23 05:53:22'),
(559, 'content', 'all', 1, '2022-02-23 05:53:22'),
(560, 'content', 'form', 1, '2022-02-23 05:53:27'),
(561, 'content', 'all', 1, '2022-02-23 05:53:27'),
(562, 'content', 'form', 1, '2022-02-23 05:53:41'),
(563, 'content', 'form', 1, '2022-02-23 05:54:04'),
(564, 'content', 'form', 1, '2022-02-23 05:54:15'),
(565, 'content', 'all', 1, '2022-02-23 05:54:15'),
(566, 'content', 'form', 1, '2022-02-23 05:54:29'),
(567, 'content', 'all', 1, '2022-02-23 05:54:46'),
(568, 'content', 'menu', 1, '2022-02-23 05:54:50'),
(569, 'content', 'menu', 1, '2022-02-23 05:56:33'),
(570, 'content', 'save_order', 1, '2022-02-23 05:58:32'),
(571, 'content', 'menu', 1, '2022-02-23 05:58:34'),
(572, 'content', 'form', 1, '2022-02-23 05:58:58'),
(573, 'content', 'form', 1, '2022-02-23 05:59:58'),
(574, 'content', 'all', 1, '2022-02-23 05:59:58'),
(575, 'content', 'menu', 1, '2022-02-23 06:00:06'),
(576, 'content', 'save_order', 1, '2022-02-23 06:00:40'),
(577, 'content', 'menu', 1, '2022-02-23 06:02:03'),
(578, 'content', 'change_show_on_menu_status', 1, '2022-02-23 06:02:12'),
(579, 'content', 'menu', 1, '2022-02-23 06:02:14'),
(580, 'content', 'all', 1, '2022-02-23 06:02:20'),
(581, 'content', 'all', 1, '2022-02-23 06:02:28'),
(582, 'content', 'form', 1, '2022-02-23 06:02:39'),
(583, 'content', 'form', 1, '2022-02-23 06:02:46'),
(584, 'content', 'all', 1, '2022-02-23 06:02:46'),
(585, 'content', 'menu', 1, '2022-02-23 06:02:48'),
(586, 'content', 'all', 1, '2022-02-23 06:05:06'),
(587, 'content', 'form', 1, '2022-02-23 06:05:13'),
(588, 'content', 'form', 1, '2022-02-23 06:05:14'),
(589, 'content', 'menu', 1, '2022-02-23 06:05:28'),
(590, 'content', 'save_order', 1, '2022-02-23 06:22:48'),
(591, 'content', 'form', 1, '2022-02-23 06:56:46'),
(592, 'content', 'form', 1, '2022-02-23 06:56:46'),
(593, 'content', 'form', 1, '2022-02-23 06:56:52'),
(594, 'content', 'form', 1, '2022-02-23 06:57:15'),
(595, 'content', 'form', 1, '2022-02-23 06:57:15'),
(596, 'content', 'all', 1, '2022-02-23 06:57:16'),
(597, 'content', 'form', 1, '2022-02-23 06:57:20'),
(598, 'content', 'all', 1, '2022-02-23 06:57:20'),
(599, 'content', 'all', 1, '2022-02-23 06:57:28'),
(600, 'content', 'form', 1, '2022-02-23 06:57:31'),
(601, 'content', 'form', 1, '2022-02-23 06:57:32'),
(602, 'content', 'form', 1, '2022-02-23 06:58:16'),
(603, 'content', 'all', 1, '2022-02-23 06:58:17'),
(604, 'content', 'form', 1, '2022-02-23 06:58:26'),
(605, 'content', 'all', 1, '2022-02-23 06:58:26'),
(606, 'content', 'form', 1, '2022-02-23 06:58:45'),
(607, 'content', 'form', 1, '2022-02-23 06:58:45'),
(608, 'content', 'form', 1, '2022-02-23 06:59:00'),
(609, 'content', 'all', 1, '2022-02-23 06:59:01'),
(610, 'content', 'form', 1, '2022-02-23 06:59:12'),
(611, 'content', 'all', 1, '2022-02-23 06:59:13'),
(612, 'content', 'form', 1, '2022-02-23 07:08:32'),
(613, 'content', 'form', 1, '2022-02-23 07:08:33'),
(614, 'content', 'form', 1, '2022-02-23 07:08:42'),
(615, 'content', 'all', 1, '2022-02-23 07:08:42'),
(616, 'content', 'form', 1, '2022-02-23 07:08:51'),
(617, 'content', 'all', 1, '2022-02-23 07:08:52'),
(618, 'site_settings', NULL, 1, '2022-02-23 07:22:12'),
(619, 'site_settings', NULL, 1, '2022-02-23 08:26:01'),
(620, 'site_settings', NULL, 1, '2022-02-23 08:26:01'),
(621, 'site_settings', NULL, 1, '2022-02-23 08:26:01'),
(622, 'blog', 'all', 1, '2022-02-23 08:37:15'),
(623, 'dashboard', NULL, 1, '2022-02-23 11:11:20'),
(624, 'dashboard', NULL, 1, '2022-02-23 11:12:50'),
(625, 'dashboard', NULL, 1, '2022-02-23 11:13:58'),
(626, 'dashboard', NULL, 1, '2022-02-23 11:14:36'),
(627, 'content', 'all', 1, '2022-02-23 11:14:41'),
(628, 'content', 'all', 1, '2022-02-23 11:14:46'),
(629, 'content', 'form', 1, '2022-02-23 11:14:50'),
(630, 'content', 'form', 1, '2022-02-23 11:17:28'),
(631, 'content', 'form', 1, '2022-02-23 11:17:52'),
(632, 'content', 'all', 1, '2022-02-23 11:17:53'),
(633, 'dashboard', NULL, 1, '2022-02-23 11:19:21'),
(634, 'client', 'all', 1, '2022-02-23 11:19:36'),
(635, 'client', 'form', 1, '2022-02-23 11:19:45'),
(636, 'dashboard', NULL, 1, '2022-02-23 11:20:39'),
(637, 'client', 'all', 1, '2022-02-23 11:20:53'),
(638, 'client', 'form', 1, '2022-02-23 11:20:57'),
(639, 'client', 'form', 1, '2022-02-23 11:21:06'),
(640, 'client', 'all', 1, '2022-02-23 11:21:06'),
(641, 'client', 'form', 1, '2022-02-23 11:21:09'),
(642, 'client', 'form', 1, '2022-02-23 11:21:18'),
(643, 'client', 'all', 1, '2022-02-23 11:21:19'),
(644, 'client', 'form', 1, '2022-02-23 11:21:27'),
(645, 'client', 'form', 1, '2022-02-23 11:22:08'),
(646, 'client', 'all', 1, '2022-02-23 11:22:08'),
(647, 'client', 'form', 1, '2022-02-23 11:22:13'),
(648, 'client', 'form', 1, '2022-02-23 11:28:31'),
(649, 'client', 'all', 1, '2022-02-23 11:28:32'),
(650, 'client', 'form', 1, '2022-02-23 11:28:37'),
(651, 'dashboard', NULL, 1, '2022-02-23 11:36:11'),
(652, 'client', 'all', 1, '2022-02-23 11:36:16'),
(653, 'client', 'form', 1, '2022-02-23 11:36:22'),
(654, 'client', 'form', 1, '2022-02-23 11:36:32'),
(655, 'client', 'all', 1, '2022-02-23 11:36:33'),
(656, 'client', 'form', 1, '2022-02-23 11:36:38'),
(657, 'client', 'form', 1, '2022-02-23 11:37:55'),
(658, 'client', 'all', 1, '2022-02-23 11:37:55'),
(659, 'dashboard', NULL, 1, '2022-02-24 05:12:10'),
(660, 'site_settings', NULL, 1, '2022-02-24 05:12:27'),
(661, 'site_settings', NULL, 1, '2022-02-24 05:13:00'),
(662, 'site_settings', NULL, 1, '2022-02-24 05:13:00'),
(663, 'client', 'all', 1, '2022-02-24 05:13:31'),
(664, 'client', 'form', 1, '2022-02-24 05:13:35'),
(665, 'client', 'form', 1, '2022-02-24 05:13:36'),
(666, 'client', 'form', 1, '2022-02-24 05:13:37'),
(667, 'client', 'form', 1, '2022-02-24 05:13:38'),
(668, 'client', 'form', 1, '2022-02-24 05:13:50'),
(669, 'client', 'all', 1, '2022-02-24 05:13:50'),
(670, 'client', 'form', 1, '2022-02-24 05:14:04'),
(671, 'client', 'all', 1, '2022-02-24 05:14:04'),
(672, 'dashboard', NULL, 1, '2022-02-24 05:56:40'),
(673, 'portfolio', 'all', 1, '2022-02-24 05:56:45'),
(674, 'portfolio', 'all', 1, '2022-02-24 05:57:34'),
(675, 'portfolio', 'form', 1, '2022-02-24 05:57:37'),
(676, 'portfolio', 'form', 1, '2022-02-24 06:00:10'),
(677, 'portfolio', 'all', 1, '2022-02-24 06:00:10'),
(678, 'portfolio', 'form', 1, '2022-02-24 06:00:34'),
(679, 'portfolio', 'form', 1, '2022-02-24 06:02:07'),
(680, 'portfolio', 'all', 1, '2022-02-24 06:02:08'),
(681, 'dashboard', NULL, 1, '2022-02-24 06:23:06'),
(682, 'portfolio', 'all', 1, '2022-02-24 06:23:17'),
(683, 'service', 'all', 1, '2022-02-24 06:23:26'),
(684, 'dashboard', NULL, 1, '2022-02-24 06:26:56'),
(685, 'service', 'all', 1, '2022-02-24 06:27:04'),
(686, 'service', 'form', 1, '2022-02-24 06:27:37'),
(687, 'dashboard', NULL, 1, '2022-02-24 08:53:40'),
(688, 'service', 'all', 1, '2022-02-24 08:53:46'),
(689, 'service', 'form', 1, '2022-02-24 08:53:48'),
(690, 'dashboard', NULL, 1, '2022-02-24 08:57:44'),
(691, 'dashboard', NULL, 1, '2022-02-24 08:57:50'),
(692, 'service', 'form', 1, '2022-02-24 08:57:56'),
(693, 'service', 'all', 1, '2022-02-24 08:57:56'),
(694, 'service', 'form', 1, '2022-02-24 09:00:06'),
(695, 'service', 'form', 1, '2022-02-24 09:00:30'),
(696, 'service', 'all', 1, '2022-02-24 09:00:30'),
(697, 'service', 'form', 1, '2022-02-24 09:00:44'),
(698, 'dashboard', NULL, 1, '2022-02-24 09:10:50'),
(699, 'dashboard', NULL, 1, '2022-02-24 09:12:56'),
(700, 'service', 'form', 1, '2022-02-24 09:13:13'),
(701, 'service', 'form', 1, '2022-02-24 09:15:17'),
(702, 'service', 'all', 1, '2022-02-24 09:15:18'),
(703, 'dashboard', NULL, 1, '2022-02-24 09:16:39'),
(704, 'service', 'all', 1, '2022-02-24 09:16:45'),
(705, 'service', 'form', 1, '2022-02-24 09:16:48'),
(706, 'dashboard', NULL, 1, '2022-02-24 09:23:56'),
(707, 'service', 'form', 1, '2022-02-24 09:24:05'),
(708, 'service', 'all', 1, '2022-02-24 09:24:05'),
(709, 'service', 'form', 1, '2022-02-24 09:26:08'),
(710, 'dashboard', NULL, 1, '2022-02-24 09:36:22'),
(711, 'dashboard', NULL, 1, '2022-02-24 09:36:25'),
(712, 'service', 'form', 1, '2022-02-24 09:36:28'),
(713, 'service', 'all', 1, '2022-02-24 09:36:29'),
(714, 'dashboard', NULL, 1, '2022-02-24 09:43:41'),
(715, 'content', 'all', 1, '2022-02-24 09:43:55'),
(716, 'content', 'form', 1, '2022-02-24 09:44:04'),
(717, 'dashboard', NULL, 1, '2022-02-24 09:47:06'),
(718, 'content', 'all', 1, '2022-02-24 09:47:11'),
(719, 'content', 'form', 1, '2022-02-24 09:49:16'),
(720, 'content', 'form', 1, '2022-02-24 09:50:41'),
(721, 'content', 'form', 1, '2022-02-24 09:54:21'),
(722, 'content', 'form', 1, '2022-02-24 09:54:35'),
(723, 'content', 'form', 1, '2022-02-24 09:54:54'),
(724, 'content', 'all', 1, '2022-02-24 09:54:55'),
(725, 'content', 'form', 1, '2022-02-24 09:55:00'),
(726, 'content', 'all', 1, '2022-02-24 09:55:02'),
(727, 'content', 'form', 1, '2022-02-24 09:55:11'),
(728, 'content', 'form', 1, '2022-02-24 09:55:16'),
(729, 'content', 'all', 1, '2022-02-24 09:55:16'),
(730, 'content', 'form', 1, '2022-02-24 09:55:25'),
(731, 'dashboard', NULL, 1, '2022-02-24 09:55:47'),
(732, 'content', 'form', 1, '2022-02-24 09:55:51'),
(733, 'dashboard', NULL, 1, '2022-02-24 09:57:20'),
(734, 'content', 'all', 1, '2022-02-24 09:57:26'),
(735, 'content', 'form', 1, '2022-02-24 09:57:28'),
(736, 'content', 'form', 1, '2022-02-24 09:58:04'),
(737, 'content', 'all', 1, '2022-02-24 09:58:04'),
(738, 'content', 'form', 1, '2022-02-24 09:58:09'),
(739, 'dashboard', NULL, 1, '2022-02-24 09:58:38'),
(740, 'content', 'form', 1, '2022-02-24 09:58:43'),
(741, 'content', 'form', 1, '2022-02-24 09:58:45'),
(742, 'dashboard', NULL, 1, '2022-02-24 10:02:03'),
(743, 'dashboard', NULL, 1, '2022-02-24 10:05:08'),
(744, 'content', 'form', 1, '2022-02-24 10:05:21'),
(745, 'content', 'form', 1, '2022-02-24 10:05:51'),
(746, 'content', 'all', 1, '2022-02-24 10:05:52'),
(747, 'dashboard', NULL, 1, '2022-02-24 10:06:08'),
(748, 'content', 'all', 1, '2022-02-24 10:06:16'),
(749, 'content', 'form', 1, '2022-02-24 10:06:18'),
(750, 'content', 'form', 1, '2022-02-24 10:06:54'),
(751, 'content', 'all', 1, '2022-02-24 10:06:55'),
(752, 'dashboard', NULL, 1, '2022-02-24 10:36:38'),
(753, 'content', 'form', 1, '2022-02-24 10:38:07'),
(754, 'content', 'all', 1, '2022-02-24 10:38:13'),
(755, 'content', 'form', 1, '2022-02-24 10:39:10'),
(756, 'content', 'all', 1, '2022-02-24 10:39:10'),
(757, 'content', 'form', 1, '2022-02-24 10:39:14'),
(758, 'dashboard', NULL, 1, '2022-02-24 10:39:28'),
(759, 'content', 'form', 1, '2022-02-24 10:41:53'),
(760, 'content', 'all', 1, '2022-02-24 10:41:53'),
(761, 'content', 'form', 1, '2022-02-24 10:41:57'),
(762, 'dashboard', NULL, 1, '2022-02-24 10:42:34'),
(763, 'content', 'form', 1, '2022-02-24 10:42:39'),
(764, 'dashboard', NULL, 1, '2022-02-24 10:43:10'),
(765, 'content', 'form', 1, '2022-02-24 10:43:20'),
(766, 'content', 'all', 1, '2022-02-24 10:43:20'),
(767, 'content', 'form', 1, '2022-02-24 10:43:23'),
(768, 'dashboard', NULL, 1, '2022-02-24 10:44:10'),
(769, 'content', 'form', 1, '2022-02-24 10:44:15'),
(770, 'content', 'form', 1, '2022-02-24 10:44:44'),
(771, 'content', 'all', 1, '2022-02-24 10:44:44'),
(772, 'content', 'form', 1, '2022-02-24 10:44:47'),
(773, 'dashboard', NULL, 1, '2022-02-24 10:45:28'),
(774, 'content', 'form', 1, '2022-02-24 10:45:33'),
(775, 'dashboard', NULL, 1, '2022-02-24 10:46:24'),
(776, 'content', 'form', 1, '2022-02-24 10:46:39'),
(777, 'content', 'all', 1, '2022-02-24 10:46:40'),
(778, 'content', 'menu', 1, '2022-02-24 10:46:45'),
(779, 'content', 'save_order', 1, '2022-02-24 10:47:09'),
(780, 'dashboard', NULL, 1, '2022-02-24 11:03:16'),
(781, 'feedback', 'all', 1, '2022-02-24 11:03:37'),
(782, 'subscriber', 'all', 1, '2022-02-24 11:03:37'),
(783, 'content', 'all', 1, '2022-02-24 11:04:41'),
(784, 'content', 'all', 1, '2022-02-24 11:04:47'),
(785, 'content', 'form', 1, '2022-02-24 11:08:16'),
(786, 'content', 'form', 1, '2022-02-24 11:08:37'),
(787, 'content', 'all', 1, '2022-02-24 11:08:37'),
(788, 'dashboard', NULL, 1, '2022-02-24 11:09:54'),
(789, 'content', 'all', 1, '2022-02-24 11:10:23'),
(790, 'service', 'all', 1, '2022-02-24 11:10:29'),
(791, 'service', 'form', 1, '2022-02-24 11:10:34'),
(792, 'dashboard', NULL, 1, '2022-02-24 11:23:24'),
(793, 'dashboard', NULL, 1, '2022-02-24 11:27:53'),
(794, 'dashboard', NULL, 1, '2022-02-24 11:28:58'),
(795, 'portfolio', 'all', 1, '2022-02-24 11:29:05'),
(796, 'portfolio', 'form', 1, '2022-02-24 11:29:09'),
(797, 'portfolio', 'form', 1, '2022-02-24 11:30:16'),
(798, 'portfolio', 'all', 1, '2022-02-24 11:30:17'),
(799, 'portfolio', 'form', 1, '2022-02-24 11:30:21'),
(800, 'portfolio', 'form', 1, '2022-02-24 11:30:21'),
(801, 'portfolio', 'form', 1, '2022-02-24 11:30:30'),
(802, 'portfolio', 'all', 1, '2022-02-24 11:30:30'),
(803, 'portfolio', 'form', 1, '2022-02-24 11:30:37'),
(804, 'portfolio', 'all', 1, '2022-02-24 11:30:38'),
(805, 'portfolio', 'all', 1, '2022-02-24 11:30:43'),
(806, 'portfolio', 'form', 1, '2022-02-24 11:30:46'),
(807, 'portfolio', 'form', 1, '2022-02-24 11:31:15'),
(808, 'portfolio', 'form', 1, '2022-02-24 11:32:19'),
(809, 'portfolio', 'form', 1, '2022-02-24 11:32:23'),
(810, 'portfolio', 'form', 1, '2022-02-24 11:33:07'),
(811, 'portfolio', 'all', 1, '2022-02-24 11:33:08'),
(812, 'blog', 'all', 1, '2022-02-24 11:34:22'),
(813, 'blog', 'all', 1, '2022-02-24 11:35:19'),
(814, 'blog', 'form', 1, '2022-02-24 11:35:22'),
(815, 'dashboard', NULL, 1, '2022-02-24 11:35:49'),
(816, 'blog', 'all', 1, '2022-02-24 11:35:53'),
(817, 'blog', 'form', 1, '2022-02-24 11:35:55'),
(818, 'dashboard', NULL, 1, '2022-02-24 11:38:56'),
(819, 'blog', 'all', 1, '2022-02-24 11:39:00'),
(820, 'blog', 'form', 1, '2022-02-24 11:39:03'),
(821, 'blog', 'form', 1, '2022-02-24 11:39:26'),
(822, 'blog', 'all', 1, '2022-02-24 11:39:26'),
(823, 'blog', 'form', 1, '2022-02-24 11:39:30'),
(824, 'dashboard', NULL, 1, '2022-02-24 11:41:09'),
(825, 'blog', 'form', 1, '2022-02-24 11:41:43'),
(826, 'blog', 'all', 1, '2022-02-24 11:41:43'),
(827, 'blog', 'form', 1, '2022-02-24 11:43:57'),
(828, 'dashboard', NULL, 1, '2022-02-24 11:46:27'),
(829, 'blog', 'form', 1, '2022-02-24 11:46:58'),
(830, 'blog', 'all', 1, '2022-02-24 11:46:59'),
(831, 'slider', 'all', 1, '2022-02-24 11:47:37'),
(832, 'slider', 'form', 1, '2022-02-24 11:47:42'),
(833, 'slider', 'form', 1, '2022-02-24 12:07:27'),
(834, 'slider', 'all', 1, '2022-02-24 12:07:28'),
(835, 'slider', 'all', 1, '2022-02-24 12:13:09'),
(836, 'user', 'all', 1, '2022-02-24 12:13:16'),
(837, 'user', 'form', 1, '2022-02-24 12:13:20'),
(838, 'user', 'form', 1, '2022-02-24 12:14:08'),
(839, 'user', 'all', 1, '2022-02-24 12:14:08'),
(840, 'dashboard', NULL, 3, '2022-02-24 12:14:22'),
(841, 'dashboard', NULL, 3, '2022-02-25 05:38:00'),
(842, 'user', 'all', 3, '2022-02-25 05:38:14'),
(843, 'user', 'form', 3, '2022-02-25 05:38:20'),
(844, 'user', 'form', 3, '2022-02-25 05:39:00'),
(845, 'user', 'all', 3, '2022-02-25 05:39:00'),
(846, 'content', 'all', 3, '2022-02-25 05:39:11'),
(847, 'dashboard', NULL, 3, '2022-02-28 05:54:10'),
(848, 'content', 'all', 3, '2022-02-28 05:57:16'),
(849, 'blog', 'all', 3, '2022-02-28 05:59:56'),
(850, 'blog', 'form', 3, '2022-02-28 05:59:59'),
(851, 'dashboard', NULL, 3, '2022-02-28 08:35:50'),
(852, 'content', 'all', 3, '2022-02-28 08:35:58'),
(853, 'content', 'form', 3, '2022-02-28 08:52:33'),
(854, 'content', 'all', 3, '2022-02-28 08:58:46'),
(855, 'content', 'form', 3, '2022-02-28 09:38:21'),
(856, 'content', 'form', 3, '2022-02-28 10:05:08'),
(857, 'content', 'form', 3, '2022-02-28 11:15:08'),
(858, 'dashboard', NULL, 3, '2022-03-02 04:56:19'),
(859, 'content', 'form', 3, '2022-03-02 04:56:42'),
(860, 'dashboard', NULL, 3, '2022-03-02 16:20:25'),
(861, 'dashboard', NULL, 3, '2022-03-02 16:21:22'),
(862, 'content', 'menu', 3, '2022-03-02 16:21:38'),
(863, 'content', 'menu', 3, '2022-03-02 16:22:10'),
(864, 'content', 'save_order', 3, '2022-03-02 16:22:33'),
(865, 'content', 'save_order', 3, '2022-03-02 16:23:47'),
(866, 'content', 'save_order', 3, '2022-03-02 16:24:15'),
(867, 'dashboard', NULL, 3, '2022-03-02 20:00:52'),
(868, 'subscriber', 'all', 3, '2022-03-02 20:00:57'),
(869, 'subscriber', 'all', 3, '2022-03-02 20:01:10'),
(870, 'feedback', 'all', 3, '2022-03-02 20:01:16'),
(871, 'testimonials', 'all', 3, '2022-03-02 20:01:26'),
(872, 'site_settings', NULL, 3, '2022-03-02 20:01:34'),
(873, 'site_settings', NULL, 3, '2022-03-02 20:01:47'),
(874, 'slider', 'all', 3, '2022-03-02 20:01:57'),
(875, 'slider', 'form', 3, '2022-03-02 20:02:02'),
(876, 'blog', 'all', 3, '2022-03-02 20:02:12'),
(877, 'blog', 'form', 3, '2022-03-02 20:02:18'),
(878, 'content', 'all', 3, '2022-03-02 20:02:30'),
(879, 'content', 'form', 3, '2022-03-02 20:02:39'),
(880, 'dashboard', NULL, 3, '2022-03-02 20:02:45'),
(881, 'dashboard', NULL, 3, '2022-03-04 11:33:21'),
(882, 'dashboard', NULL, 3, '2022-03-04 11:34:49'),
(883, 'dashboard', NULL, 3, '2022-03-06 05:38:01'),
(884, 'content', 'all', 3, '2022-03-06 05:47:28'),
(885, 'content', 'all', 3, '2022-03-06 05:47:40'),
(886, 'dashboard', NULL, 3, '2022-03-06 05:47:43'),
(887, 'content', 'all', 3, '2022-03-06 05:47:49'),
(888, 'dashboard', NULL, 3, '2022-03-06 05:47:54'),
(889, 'content', 'all', 3, '2022-03-06 05:47:59'),
(890, 'content', 'form', 3, '2022-03-06 05:48:21'),
(891, 'slider', 'form', 3, '2022-03-06 05:48:35'),
(892, 'service', 'all', 3, '2022-03-06 05:56:05'),
(893, 'service', 'form', 3, '2022-03-06 05:56:17'),
(894, 'portfolio', 'form', 3, '2022-03-06 06:39:04'),
(895, 'portfolio', 'form', 3, '2022-03-06 06:55:09'),
(896, 'client', 'all', 3, '2022-03-06 07:03:58'),
(897, 'client', 'form', 3, '2022-03-06 07:04:08'),
(898, 'testimonials', 'all', 3, '2022-03-06 07:04:50'),
(899, 'testimonials', 'form', 3, '2022-03-06 07:04:55'),
(900, 'user_role', 'all', 3, '2022-03-06 08:34:04'),
(901, 'client', 'all', 3, '2022-03-06 08:43:00'),
(902, 'client', 'form', 3, '2022-03-06 08:43:06'),
(903, 'subscriber', 'all', 3, '2022-03-06 09:47:30'),
(904, 'subscriber', 'all', 3, '2022-03-06 10:00:34'),
(905, 'feedback', 'all', 3, '2022-03-06 10:01:16'),
(906, 'user_role', 'all', 3, '2022-03-06 10:12:19'),
(907, 'user_role', 'form', 3, '2022-03-06 10:16:40'),
(908, 'dashboard', NULL, 3, '2022-03-07 05:47:47'),
(909, 'content', 'menu', 3, '2022-03-07 05:48:11'),
(910, 'dashboard', NULL, 1, '2022-03-08 05:41:51'),
(911, 'site_settings', NULL, 1, '2022-03-08 05:42:12'),
(912, 'site_settings', NULL, 1, '2022-03-08 05:42:55'),
(913, 'site_settings', NULL, 1, '2022-03-08 05:42:56'),
(914, 'dashboard', NULL, 3, '2022-03-08 10:27:17'),
(915, 'site_settings', NULL, 3, '2022-03-08 10:27:22'),
(916, 'site_settings', NULL, 3, '2022-03-08 10:27:41'),
(917, 'site_settings', NULL, 3, '2022-03-08 10:27:41'),
(918, 'site_settings', NULL, 3, '2022-03-08 10:28:22'),
(919, 'site_settings', NULL, 3, '2022-03-08 10:28:22'),
(920, 'dashboard', NULL, 3, '2022-03-09 07:04:25'),
(921, 'content', 'menu', 3, '2022-03-09 07:04:45'),
(922, 'dashboard', NULL, 3, '2022-03-09 07:05:17'),
(923, 'dashboard', NULL, 3, '2022-03-09 07:05:24'),
(924, 'dashboard', NULL, 3, '2022-03-09 09:54:19'),
(925, 'content', 'all', 3, '2022-03-09 09:54:56'),
(926, 'content', 'all', 3, '2022-03-09 09:55:02'),
(927, 'content', 'form', 3, '2022-03-09 09:55:06'),
(928, 'content', 'form', 3, '2022-03-09 09:56:47'),
(929, 'content', 'all', 3, '2022-03-09 09:56:48'),
(930, 'dashboard', NULL, 3, '2022-03-09 10:01:22'),
(931, 'service', 'all', 3, '2022-03-09 10:01:29'),
(932, 'service', 'form', 3, '2022-03-09 10:01:41'),
(933, 'service', 'all', 3, '2022-03-09 10:17:07'),
(934, 'service', 'form', 3, '2022-03-09 10:17:12'),
(935, 'service', 'form', 3, '2022-03-09 10:17:21'),
(936, 'service', 'all', 3, '2022-03-09 10:17:22'),
(937, 'service', 'form', 3, '2022-03-09 10:18:49'),
(938, 'service', 'form', 3, '2022-03-09 10:18:56'),
(939, 'service', 'all', 3, '2022-03-09 10:18:57'),
(940, 'service', 'all', 3, '2022-03-09 10:21:40'),
(941, 'service', 'form', 3, '2022-03-09 10:21:42'),
(942, 'service', 'form', 3, '2022-03-09 10:23:16'),
(943, 'service', 'all', 3, '2022-03-09 10:23:16'),
(944, 'service', 'form', 3, '2022-03-09 10:23:35'),
(945, 'service', 'form', 3, '2022-03-09 10:23:50'),
(946, 'service', 'all', 3, '2022-03-09 10:23:50'),
(947, 'service', 'form', 3, '2022-03-09 10:24:30'),
(948, 'service', 'form', 3, '2022-03-09 10:24:43'),
(949, 'service', 'all', 3, '2022-03-09 10:24:43'),
(950, 'service', 'form', 3, '2022-03-09 10:24:54'),
(951, 'service', 'form', 3, '2022-03-09 10:30:00'),
(952, 'service', 'all', 3, '2022-03-09 10:30:00'),
(953, 'service', 'form', 3, '2022-03-09 10:30:25'),
(954, 'service', 'form', 3, '2022-03-09 10:30:54'),
(955, 'service', 'all', 3, '2022-03-09 10:30:55'),
(956, 'service', 'form', 3, '2022-03-09 10:31:06'),
(957, 'service', 'form', 3, '2022-03-09 10:32:11'),
(958, 'service', 'all', 3, '2022-03-09 10:32:12'),
(959, 'service', 'form', 3, '2022-03-09 10:32:31'),
(960, 'service', 'form', 3, '2022-03-09 10:32:41'),
(961, 'service', 'all', 3, '2022-03-09 10:32:42'),
(962, 'service', 'form', 3, '2022-03-09 10:32:55'),
(963, 'service', 'form', 3, '2022-03-09 10:33:04'),
(964, 'service', 'all', 3, '2022-03-09 10:33:04'),
(965, 'service', 'form', 3, '2022-03-09 10:33:26'),
(966, 'service', 'form', 3, '2022-03-09 10:33:47'),
(967, 'service', 'all', 3, '2022-03-09 10:33:48'),
(968, 'service', 'form', 3, '2022-03-09 10:34:17'),
(969, 'service', 'form', 3, '2022-03-09 10:34:40'),
(970, 'service', 'all', 3, '2022-03-09 10:34:40'),
(971, 'service', 'form', 3, '2022-03-09 10:35:08'),
(972, 'service', 'form', 3, '2022-03-09 10:35:15'),
(973, 'service', 'all', 3, '2022-03-09 10:35:15'),
(974, 'service', 'form', 3, '2022-03-09 10:35:50'),
(975, 'service', 'form', 3, '2022-03-09 10:36:17'),
(976, 'service', 'all', 3, '2022-03-09 10:36:18'),
(977, 'service', 'form', 3, '2022-03-09 10:37:29'),
(978, 'service', 'form', 3, '2022-03-09 10:37:36'),
(979, 'service', 'all', 3, '2022-03-09 10:37:37'),
(980, 'service', 'form', 3, '2022-03-09 10:37:56'),
(981, 'service', 'all', 3, '2022-03-09 10:38:29'),
(982, 'service', 'form', 3, '2022-03-09 10:38:32'),
(983, 'service', 'form', 3, '2022-03-09 10:38:41'),
(984, 'service', 'all', 3, '2022-03-09 10:38:42'),
(985, 'service', 'form', 3, '2022-03-09 10:39:09'),
(986, 'service', 'form', 3, '2022-03-09 10:39:27'),
(987, 'service', 'all', 3, '2022-03-09 10:39:27'),
(988, 'service', 'form', 3, '2022-03-09 10:39:51'),
(989, 'service', 'form', 3, '2022-03-09 10:40:08'),
(990, 'service', 'all', 3, '2022-03-09 10:40:09'),
(991, 'service', 'form', 3, '2022-03-09 10:41:04'),
(992, 'service', 'form', 3, '2022-03-09 10:41:11'),
(993, 'service', 'all', 3, '2022-03-09 10:41:11'),
(994, 'service', 'form', 3, '2022-03-09 10:41:19'),
(995, 'service', 'form', 3, '2022-03-09 10:41:32'),
(996, 'service', 'all', 3, '2022-03-09 10:41:33'),
(997, 'service', 'form', 3, '2022-03-09 10:42:07'),
(998, 'service', 'form', 3, '2022-03-09 10:42:13'),
(999, 'service', 'all', 3, '2022-03-09 10:42:13'),
(1000, 'service', 'form', 3, '2022-03-09 10:43:50'),
(1001, 'service', 'form', 3, '2022-03-09 10:44:22'),
(1002, 'service', 'all', 3, '2022-03-09 10:44:22'),
(1003, 'service', 'form', 3, '2022-03-09 10:44:49'),
(1004, 'service', 'form', 3, '2022-03-09 10:44:56'),
(1005, 'service', 'all', 3, '2022-03-09 10:44:56');
INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(1006, 'service', 'form', 3, '2022-03-09 10:45:14'),
(1007, 'service', 'form', 3, '2022-03-09 10:45:23'),
(1008, 'service', 'all', 3, '2022-03-09 10:45:23'),
(1009, 'service', 'form', 3, '2022-03-09 10:45:39'),
(1010, 'service', 'all', 3, '2022-03-09 10:45:41'),
(1011, 'service', 'form', 3, '2022-03-09 10:45:43'),
(1012, 'service', 'form', 3, '2022-03-09 10:45:50'),
(1013, 'service', 'all', 3, '2022-03-09 10:45:50'),
(1014, 'service', 'form', 3, '2022-03-09 10:46:41'),
(1015, 'service', 'form', 3, '2022-03-09 10:47:09'),
(1016, 'service', 'all', 3, '2022-03-09 10:47:10'),
(1017, 'service', 'all', 3, '2022-03-09 10:48:13'),
(1018, 'service', 'form', 3, '2022-03-09 10:48:17'),
(1019, 'service', 'form', 3, '2022-03-09 10:48:41'),
(1020, 'service', 'all', 3, '2022-03-09 10:48:42'),
(1021, 'service', 'form', 3, '2022-03-09 10:49:47'),
(1022, 'service', 'form', 3, '2022-03-09 10:50:14'),
(1023, 'service', 'all', 3, '2022-03-09 10:50:14'),
(1024, 'service', 'form', 3, '2022-03-09 10:51:05'),
(1025, 'service', 'form', 3, '2022-03-09 10:51:52'),
(1026, 'service', 'all', 3, '2022-03-09 10:51:52'),
(1027, 'service', 'form', 3, '2022-03-09 10:52:15'),
(1028, 'service', 'form', 3, '2022-03-09 10:52:24'),
(1029, 'service', 'all', 3, '2022-03-09 10:52:24'),
(1030, 'service', 'form', 3, '2022-03-09 10:52:44'),
(1031, 'service', 'form', 3, '2022-03-09 10:52:49'),
(1032, 'service', 'all', 3, '2022-03-09 10:52:50'),
(1033, 'service', 'form', 3, '2022-03-09 10:53:30'),
(1034, 'service', 'form', 3, '2022-03-09 10:53:59'),
(1035, 'service', 'all', 3, '2022-03-09 10:54:00'),
(1036, 'service', 'form', 3, '2022-03-09 10:54:24'),
(1037, 'service', 'form', 3, '2022-03-09 10:54:29'),
(1038, 'service', 'all', 3, '2022-03-09 10:54:29'),
(1039, 'service', 'form', 3, '2022-03-09 10:55:06'),
(1040, 'service', 'form', 3, '2022-03-09 10:55:12'),
(1041, 'service', 'all', 3, '2022-03-09 10:55:13'),
(1042, 'service', 'form', 3, '2022-03-09 10:55:38'),
(1043, 'service', 'form', 3, '2022-03-09 10:55:44'),
(1044, 'service', 'all', 3, '2022-03-09 10:55:44'),
(1045, 'service', 'form', 3, '2022-03-09 10:57:36'),
(1046, 'service', 'all', 3, '2022-03-09 10:57:48'),
(1047, 'service', 'form', 3, '2022-03-09 10:58:22'),
(1048, 'service', 'form', 3, '2022-03-09 10:58:42'),
(1049, 'service', 'all', 3, '2022-03-09 10:58:42'),
(1050, 'service', 'form', 3, '2022-03-09 11:02:12'),
(1051, 'service', 'all', 3, '2022-03-09 11:02:18'),
(1052, 'service', 'form', 3, '2022-03-09 11:02:28'),
(1053, 'service', 'form', 3, '2022-03-09 11:02:36'),
(1054, 'service', 'all', 3, '2022-03-09 11:02:36'),
(1055, 'service', 'form', 3, '2022-03-09 11:03:00'),
(1056, 'service', 'form', 3, '2022-03-09 11:03:33'),
(1057, 'service', 'all', 3, '2022-03-09 11:03:34'),
(1058, 'service', 'form', 3, '2022-03-09 11:04:09'),
(1059, 'service', 'form', 3, '2022-03-09 11:04:19'),
(1060, 'service', 'all', 3, '2022-03-09 11:04:19'),
(1061, 'content', 'all', 3, '2022-03-09 11:05:00'),
(1062, 'content', 'all', 3, '2022-03-09 11:05:08'),
(1063, 'content', 'form', 3, '2022-03-09 11:05:13'),
(1064, 'content', 'form', 3, '2022-03-09 11:05:21'),
(1065, 'content', 'all', 3, '2022-03-09 11:05:21'),
(1066, 'content', 'all', 3, '2022-03-09 11:06:01'),
(1067, 'content', 'form', 3, '2022-03-09 11:06:06'),
(1068, 'content', 'form', 3, '2022-03-09 11:07:05'),
(1069, 'content', 'all', 3, '2022-03-09 11:07:05'),
(1070, 'content', 'all', 3, '2022-03-09 11:08:37'),
(1071, 'content', 'form', 3, '2022-03-09 11:08:41'),
(1072, 'content', 'form', 3, '2022-03-09 11:09:07'),
(1073, 'content', 'all', 3, '2022-03-09 11:09:07'),
(1074, 'content', 'all', 3, '2022-03-09 11:09:33'),
(1075, 'content', 'form', 3, '2022-03-09 11:09:39'),
(1076, 'content', 'form', 3, '2022-03-09 11:09:45'),
(1077, 'content', 'all', 3, '2022-03-09 11:09:45'),
(1078, 'client', 'all', 3, '2022-03-09 11:11:57'),
(1079, 'client', 'form', 3, '2022-03-09 11:12:44'),
(1080, 'client', 'all', 3, '2022-03-09 11:14:40'),
(1081, 'client', 'form', 3, '2022-03-09 11:14:43'),
(1082, 'client', 'form', 3, '2022-03-09 11:20:10'),
(1083, 'client', 'form', 3, '2022-03-09 11:22:43'),
(1084, 'client', 'all', 3, '2022-03-09 11:22:51'),
(1085, 'client', 'form', 3, '2022-03-09 11:22:58'),
(1086, 'client', 'form', 3, '2022-03-09 11:23:24'),
(1087, 'client', 'all', 3, '2022-03-09 11:23:25'),
(1088, 'client', 'form', 3, '2022-03-09 11:23:50'),
(1089, 'client', 'form', 3, '2022-03-09 11:23:58'),
(1090, 'client', 'all', 3, '2022-03-09 11:23:59'),
(1091, 'portfolio', 'all', 3, '2022-03-09 11:24:47'),
(1092, 'portfolio', 'form', 3, '2022-03-09 11:25:51'),
(1093, 'portfolio', 'form', 3, '2022-03-09 11:26:06'),
(1094, 'portfolio', 'all', 3, '2022-03-09 11:26:06'),
(1095, 'site_settings', NULL, 3, '2022-03-09 11:27:48'),
(1096, 'site_settings', NULL, 3, '2022-03-09 11:33:26'),
(1097, 'site_settings', NULL, 3, '2022-03-09 11:33:27'),
(1098, 'site_settings', NULL, 3, '2022-03-09 11:34:00'),
(1099, 'site_settings', NULL, 3, '2022-03-09 11:34:01'),
(1100, 'portfolio', 'all', 3, '2022-03-09 11:50:37'),
(1101, 'portfolio', 'form', 3, '2022-03-09 11:51:18'),
(1102, 'portfolio', 'form', 3, '2022-03-09 11:51:32'),
(1103, 'portfolio', 'all', 3, '2022-03-09 11:51:33'),
(1104, 'portfolio', 'form', 3, '2022-03-09 11:51:40'),
(1105, 'portfolio', 'form', 3, '2022-03-09 11:52:01'),
(1106, 'portfolio', 'all', 3, '2022-03-09 11:52:01'),
(1107, 'portfolio', 'form', 3, '2022-03-09 11:52:49'),
(1108, 'portfolio', 'form', 3, '2022-03-09 11:53:29'),
(1109, 'portfolio', 'all', 3, '2022-03-09 11:53:29'),
(1110, 'portfolio', 'form', 3, '2022-03-09 11:54:38'),
(1111, 'portfolio', 'form', 3, '2022-03-09 11:55:14'),
(1112, 'portfolio', 'all', 3, '2022-03-09 11:55:15'),
(1113, 'portfolio', 'form', 3, '2022-03-09 11:55:38'),
(1114, 'portfolio', 'form', 3, '2022-03-09 11:56:43'),
(1115, 'portfolio', 'all', 3, '2022-03-09 11:56:43'),
(1116, 'content', 'all', 3, '2022-03-09 11:57:43'),
(1117, 'content', 'all', 3, '2022-03-09 11:57:49'),
(1118, 'content', 'form', 3, '2022-03-09 11:57:53'),
(1119, 'content', 'form', 3, '2022-03-09 11:58:01'),
(1120, 'content', 'all', 3, '2022-03-09 11:58:02'),
(1121, 'content', 'all', 3, '2022-03-09 11:58:17'),
(1122, 'content', 'form', 3, '2022-03-09 11:58:21'),
(1123, 'content', 'form', 3, '2022-03-09 11:58:30'),
(1124, 'content', 'all', 3, '2022-03-09 11:58:30'),
(1125, 'dashboard', NULL, 3, '2022-03-10 05:57:26'),
(1126, 'slider', 'all', 3, '2022-03-10 05:57:43'),
(1127, 'slider', 'form', 3, '2022-03-10 05:58:26'),
(1128, 'service', 'all', 3, '2022-03-10 06:00:08'),
(1129, 'service', 'form', 3, '2022-03-10 06:01:12'),
(1130, 'service', 'form', 3, '2022-03-10 06:03:12'),
(1131, 'service', 'all', 3, '2022-03-10 06:03:12'),
(1132, 'service', 'form', 3, '2022-03-10 06:03:26'),
(1133, 'service', 'form', 3, '2022-03-10 06:03:38'),
(1134, 'service', 'all', 3, '2022-03-10 06:03:38'),
(1135, 'service', 'form', 3, '2022-03-10 06:04:07'),
(1136, 'service', 'form', 3, '2022-03-10 06:04:17'),
(1137, 'service', 'all', 3, '2022-03-10 06:04:17'),
(1138, 'content', 'all', 3, '2022-03-10 06:06:37'),
(1139, 'content', 'menu', 3, '2022-03-10 06:06:54'),
(1140, 'content', 'all', 3, '2022-03-10 06:07:28'),
(1141, 'content', 'all', 3, '2022-03-10 06:08:00'),
(1142, 'content', 'all', 3, '2022-03-10 06:08:09'),
(1143, 'content', 'form', 3, '2022-03-10 06:08:39'),
(1144, 'content', 'form', 3, '2022-03-10 06:09:03'),
(1145, 'content', 'all', 3, '2022-03-10 06:09:04'),
(1146, 'content', 'all', 3, '2022-03-10 06:09:29'),
(1147, 'content', 'form', 3, '2022-03-10 06:09:35'),
(1148, 'content', 'form', 3, '2022-03-10 06:09:47'),
(1149, 'content', 'all', 3, '2022-03-10 06:09:48'),
(1150, 'feedback', 'all', 3, '2022-03-10 06:11:26'),
(1151, 'site_settings', NULL, 3, '2022-03-10 06:11:45'),
(1152, 'user', 'all', 3, '2022-03-10 06:13:49'),
(1153, 'feedback', 'all', 3, '2022-03-10 06:15:15'),
(1154, 'subscriber', 'all', 3, '2022-03-10 06:16:33'),
(1155, 'client', 'all', 3, '2022-03-10 06:18:42'),
(1156, 'dashboard', NULL, 3, '2022-03-10 06:19:32'),
(1157, 'client', 'all', 3, '2022-03-10 06:19:38'),
(1158, 'client', 'form', 3, '2022-03-10 06:19:41'),
(1159, 'portfolio', 'all', 3, '2022-03-10 06:20:31'),
(1160, 'blog', 'all', 3, '2022-03-10 06:21:40'),
(1161, 'content', 'all', 3, '2022-03-10 06:23:20'),
(1162, 'content', 'form', 3, '2022-03-10 06:24:27'),
(1163, 'content', 'form', 3, '2022-03-10 06:25:16'),
(1164, 'content', 'all', 3, '2022-03-10 06:25:16'),
(1165, 'content', 'all', 3, '2022-03-10 06:25:46'),
(1166, 'content', 'all', 3, '2022-03-10 06:26:08'),
(1167, 'content', 'form', 3, '2022-03-10 06:26:23'),
(1168, 'content', 'form', 3, '2022-03-10 06:26:35'),
(1169, 'content', 'all', 3, '2022-03-10 06:26:35'),
(1170, 'content', 'menu', 3, '2022-03-10 06:27:22'),
(1171, 'content', 'save_order', 3, '2022-03-10 06:27:31'),
(1172, 'content', 'save_order', 3, '2022-03-10 06:27:46'),
(1173, 'site_settings', NULL, 3, '2022-03-10 06:32:54'),
(1174, 'site_settings', NULL, 3, '2022-03-10 06:35:26'),
(1175, 'dashboard', NULL, 3, '2022-03-11 09:14:46'),
(1176, 'feedback', 'all', 3, '2022-03-11 09:14:58'),
(1177, 'feedback', 'all', 3, '2022-03-11 09:26:49'),
(1178, 'feedback', 'all', 3, '2022-03-11 09:52:10'),
(1179, 'dashboard', NULL, 3, '2022-03-13 07:11:58'),
(1180, 'dashboard', NULL, 3, '2022-03-15 05:29:52'),
(1181, 'content', 'all', 3, '2022-03-15 05:30:09'),
(1182, 'content', 'all', 3, '2022-03-15 05:30:38'),
(1183, 'content', 'form', 3, '2022-03-15 05:30:45'),
(1184, 'content', 'form', 3, '2022-03-15 05:31:11'),
(1185, 'content', 'all', 3, '2022-03-15 05:31:12'),
(1186, 'dashboard', NULL, 3, '2022-03-15 05:40:56'),
(1187, 'content', 'form', 3, '2022-03-15 05:41:16'),
(1188, 'dashboard', NULL, 3, '2022-03-15 05:41:20'),
(1189, 'content', 'menu', 3, '2022-03-15 05:41:22'),
(1190, 'dashboard', NULL, 3, '2022-03-15 05:43:35'),
(1191, 'dashboard', NULL, 3, '2022-03-15 06:16:20'),
(1192, 'slider', 'all', 3, '2022-03-15 06:16:34'),
(1193, 'dashboard', NULL, 3, '2022-03-15 06:16:41'),
(1194, 'dashboard', NULL, 3, '2022-03-15 06:24:54'),
(1195, 'dashboard', NULL, 3, '2022-03-18 09:16:00'),
(1196, 'client', 'all', 3, '2022-03-18 09:16:10'),
(1197, 'dashboard', NULL, 3, '2022-03-18 09:17:12'),
(1198, 'client', 'all', 3, '2022-03-18 09:35:16'),
(1199, 'client', 'all', 3, '2022-03-18 09:35:19'),
(1200, 'client', 'all', 3, '2022-03-18 09:35:21'),
(1201, 'dashboard', NULL, 3, '2022-03-18 09:42:51'),
(1202, 'site_settings', NULL, 3, '2022-03-18 09:43:07'),
(1203, 'site_settings', NULL, 3, '2022-03-18 09:43:50'),
(1204, 'site_settings', NULL, 3, '2022-03-18 09:43:51'),
(1205, 'client', 'all', 3, '2022-03-18 09:43:59'),
(1206, 'dashboard', NULL, 3, '2022-03-18 09:44:06'),
(1207, 'dashboard', NULL, 3, '2022-03-18 10:25:37'),
(1208, 'dashboard', NULL, 3, '2022-03-18 10:26:19'),
(1209, 'dashboard', NULL, 3, '2022-03-18 10:26:23'),
(1210, 'user_role', 'all', 3, '2022-03-18 10:26:40'),
(1211, 'user', 'all', 3, '2022-03-18 10:26:56'),
(1212, 'dashboard', NULL, 3, '2022-03-18 10:27:29'),
(1213, 'dashboard', NULL, 3, '2022-03-18 10:27:41'),
(1214, 'content', 'menu', 3, '2022-03-18 10:27:49'),
(1215, 'site_settings', NULL, 3, '2022-03-18 10:28:01'),
(1216, 'dashboard', NULL, 3, '2022-03-18 10:36:56'),
(1217, 'dashboard', NULL, 3, '2022-03-18 10:38:20'),
(1218, 'blog', 'all', 3, '2022-03-18 10:38:46'),
(1219, 'dashboard', NULL, 3, '2022-03-18 10:38:50'),
(1220, 'slider', 'all', 3, '2022-03-18 10:39:51'),
(1221, 'dashboard', NULL, 3, '2022-03-18 10:40:04'),
(1222, 'content', 'all', 3, '2022-03-18 10:40:11'),
(1223, 'dashboard', NULL, 3, '2022-03-18 10:40:21'),
(1224, 'site_settings', NULL, 3, '2022-03-18 10:40:40'),
(1225, 'site_settings', NULL, 3, '2022-03-18 10:42:48'),
(1226, 'site_settings', NULL, 3, '2022-03-18 10:42:48'),
(1227, 'dashboard', NULL, 3, '2022-03-18 10:44:31'),
(1228, 'slider', 'all', 3, '2022-03-18 10:45:00'),
(1229, 'dashboard', NULL, 3, '2022-03-18 10:45:13'),
(1230, 'dashboard', NULL, 3, '2022-03-18 10:47:09'),
(1231, 'slider', 'all', 3, '2022-03-18 10:47:14'),
(1232, 'slider', 'form', 3, '2022-03-18 10:47:25'),
(1233, 'dashboard', NULL, 3, '2022-03-18 10:47:30'),
(1234, 'slider', 'all', 3, '2022-03-18 10:47:39'),
(1235, 'slider', 'form', 3, '2022-03-18 10:47:42'),
(1236, 'slider', 'form', 3, '2022-03-18 10:47:59'),
(1237, 'slider', 'all', 3, '2022-03-18 10:48:00'),
(1238, 'dashboard', NULL, 3, '2022-03-18 10:48:30'),
(1239, 'site_settings', NULL, 3, '2022-03-18 10:48:37'),
(1240, 'dashboard', NULL, 3, '2022-03-18 10:49:21'),
(1241, 'site_settings', NULL, 3, '2022-03-18 10:49:31'),
(1242, 'dashboard', NULL, 3, '2022-03-18 10:53:06'),
(1243, 'site_settings', NULL, 3, '2022-03-18 11:01:55'),
(1244, 'dashboard', NULL, 3, '2022-03-18 11:02:21'),
(1245, 'slider', 'all', 3, '2022-03-18 11:05:17'),
(1246, 'slider', 'form', 3, '2022-03-18 11:05:22'),
(1247, 'slider', 'all', 3, '2022-03-18 11:05:37'),
(1248, 'dashboard', NULL, 3, '2022-03-20 08:01:45'),
(1249, 'content', 'all', 3, '2022-03-20 08:06:46'),
(1250, 'dashboard', NULL, 3, '2022-03-20 08:07:02'),
(1251, 'site_settings', NULL, 3, '2022-03-20 08:15:46'),
(1252, 'dashboard', NULL, 3, '2022-03-20 08:16:42'),
(1253, 'slider', 'all', 3, '2022-03-20 08:16:53'),
(1254, 'slider', 'form', 3, '2022-03-20 08:16:58'),
(1255, 'slider', 'all', 3, '2022-03-20 08:17:19'),
(1256, 'service', 'all', 3, '2022-03-20 08:17:30'),
(1257, 'client', 'all', 3, '2022-03-20 08:18:42'),
(1258, 'client', 'form', 3, '2022-03-20 08:19:00'),
(1259, 'client', 'all', 3, '2022-03-20 08:19:12'),
(1260, 'service', 'all', 3, '2022-03-20 08:20:25'),
(1261, 'client', 'all', 3, '2022-03-20 08:20:36'),
(1262, 'portfolio', 'all', 3, '2022-03-20 08:21:09'),
(1263, 'portfolio', 'form', 3, '2022-03-20 08:21:20'),
(1264, 'portfolio', 'all', 3, '2022-03-20 08:21:55'),
(1265, 'content', 'all', 3, '2022-03-20 08:22:30'),
(1266, 'content', 'form', 3, '2022-03-20 08:22:44'),
(1267, 'content', 'all', 3, '2022-03-20 08:22:53'),
(1268, 'dashboard', NULL, 3, '2022-03-20 08:23:04'),
(1269, 'content', 'menu', 3, '2022-03-20 08:23:19'),
(1270, 'content', 'all', 3, '2022-03-20 08:24:59'),
(1271, 'portfolio', 'all', 3, '2022-03-20 08:25:40'),
(1272, 'portfolio', 'form', 3, '2022-03-20 08:25:50'),
(1273, 'portfolio', 'all', 3, '2022-03-20 08:26:01'),
(1274, 'testimonials', 'all', 3, '2022-03-20 08:26:49'),
(1275, 'portfolio', 'all', 3, '2022-03-20 08:27:00'),
(1276, 'site_settings', NULL, 3, '2022-03-20 08:27:11'),
(1277, 'portfolio', 'all', 3, '2022-03-20 08:27:23'),
(1278, 'slider', 'all', 3, '2022-03-20 08:27:39'),
(1279, 'slider', 'form', 3, '2022-03-20 08:27:43'),
(1280, 'slider', 'form', 3, '2022-03-20 08:28:00'),
(1281, 'slider', 'all', 3, '2022-03-20 08:28:01'),
(1282, 'content', 'menu', 3, '2022-03-20 08:29:52'),
(1283, 'content', 'all', 3, '2022-03-20 08:31:43'),
(1284, 'content', 'all', 3, '2022-03-20 08:31:50'),
(1285, 'content', 'form', 3, '2022-03-20 08:32:01'),
(1286, 'content', 'form', 3, '2022-03-20 08:32:15'),
(1287, 'content', 'all', 3, '2022-03-20 08:32:16'),
(1288, 'content', 'all', 3, '2022-03-20 08:32:23'),
(1289, 'content', 'form', 3, '2022-03-20 08:32:31'),
(1290, 'content', 'form', 3, '2022-03-20 08:32:46'),
(1291, 'content', 'all', 3, '2022-03-20 08:32:47'),
(1292, 'content', 'all', 3, '2022-03-20 08:32:52'),
(1293, 'content', 'form', 3, '2022-03-20 08:32:57'),
(1294, 'content', 'form', 3, '2022-03-20 08:33:10'),
(1295, 'content', 'all', 3, '2022-03-20 08:33:10'),
(1296, 'content', 'all', 3, '2022-03-20 08:33:53'),
(1297, 'content', 'form', 3, '2022-03-20 08:33:59'),
(1298, 'content', 'form', 3, '2022-03-20 08:34:13'),
(1299, 'content', 'all', 3, '2022-03-20 08:34:14'),
(1300, 'content', 'all', 3, '2022-03-20 08:34:58'),
(1301, 'content', 'form', 3, '2022-03-20 08:35:17'),
(1302, 'content', 'all', 3, '2022-03-20 08:35:30'),
(1303, 'content', 'all', 3, '2022-03-20 08:35:43'),
(1304, 'content', 'all', 3, '2022-03-20 08:35:49'),
(1305, 'content', 'form', 3, '2022-03-20 08:36:01'),
(1306, 'content', 'all', 3, '2022-03-20 08:36:17'),
(1307, 'content', 'form', 3, '2022-03-20 08:36:43'),
(1308, 'content', 'all', 3, '2022-03-20 08:37:08'),
(1309, 'content', 'all', 3, '2022-03-20 08:38:39'),
(1310, 'content', 'all', 3, '2022-03-20 08:38:46'),
(1311, 'content', 'form', 3, '2022-03-20 08:39:35'),
(1312, 'content', 'form', 3, '2022-03-20 08:39:47'),
(1313, 'content', 'all', 3, '2022-03-20 08:39:47'),
(1314, 'content', 'all', 3, '2022-03-20 08:39:54'),
(1315, 'content', 'all', 3, '2022-03-20 08:40:12'),
(1316, 'content', 'all', 3, '2022-03-20 08:40:25'),
(1317, 'content', 'form', 3, '2022-03-20 08:40:45'),
(1318, 'content', 'form', 3, '2022-03-20 08:40:57'),
(1319, 'content', 'all', 3, '2022-03-20 08:40:58'),
(1320, 'content', 'all', 3, '2022-03-20 08:41:56'),
(1321, 'content', 'menu', 3, '2022-03-20 08:42:44'),
(1322, 'slider', 'all', 3, '2022-03-20 08:42:51'),
(1323, 'slider', 'form', 3, '2022-03-20 08:42:57'),
(1324, 'slider', 'all', 3, '2022-03-20 08:43:09'),
(1325, 'team', 'all', 3, '2022-03-20 08:43:18'),
(1326, 'slider', 'all', 3, '2022-03-20 08:43:24'),
(1327, 'dashboard', NULL, 3, '2022-03-20 08:43:45'),
(1328, 'blog', 'all', 3, '2022-03-20 08:45:14'),
(1329, 'dashboard', NULL, 3, '2022-03-20 09:45:28'),
(1330, 'dashboard', NULL, 3, '2022-03-25 05:41:25'),
(1331, 'user_role', 'all', 3, '2022-03-25 05:45:36'),
(1332, 'user', 'all', 3, '2022-03-25 05:45:45'),
(1333, 'user_role', 'all', 3, '2022-03-25 05:46:03'),
(1334, 'site_settings', NULL, 3, '2022-03-25 05:50:19'),
(1335, 'dashboard', NULL, 3, '2022-03-25 06:07:56'),
(1336, 'site_settings', NULL, 3, '2022-03-25 06:08:06'),
(1337, 'dashboard', NULL, 3, '2022-03-25 06:10:15'),
(1338, 'site_settings', NULL, 3, '2022-03-25 06:10:22'),
(1339, 'site_settings', NULL, 3, '2022-03-25 06:11:16'),
(1340, 'dashboard', NULL, 3, '2022-03-25 06:28:59'),
(1341, 'site_settings', NULL, 3, '2022-03-25 06:29:05'),
(1342, 'site_settings', NULL, 3, '2022-03-25 06:30:17'),
(1343, 'site_settings', NULL, 3, '2022-03-25 06:30:33'),
(1344, 'site_settings', NULL, 3, '2022-03-25 06:30:51'),
(1345, 'site_settings', NULL, 3, '2022-03-25 06:31:20'),
(1346, 'site_settings', NULL, 3, '2022-03-25 06:31:33'),
(1347, 'site_settings', NULL, 3, '2022-03-25 06:33:20'),
(1348, 'site_settings', NULL, 3, '2022-03-25 06:34:53'),
(1349, 'site_settings', NULL, 3, '2022-03-25 06:40:18'),
(1350, 'site_settings', NULL, 3, '2022-03-25 06:42:08'),
(1351, 'site_settings', NULL, 3, '2022-03-25 06:42:40'),
(1352, 'site_settings', NULL, 3, '2022-03-25 06:46:29'),
(1353, 'site_settings', NULL, 3, '2022-03-25 06:46:29'),
(1354, 'site_settings', NULL, 3, '2022-03-25 06:46:49'),
(1355, 'site_settings', NULL, 3, '2022-03-25 06:46:49'),
(1356, 'user', 'all', 3, '2022-03-25 06:50:15'),
(1357, 'user', 'form', 3, '2022-03-25 06:50:37'),
(1358, 'user', 'form', 3, '2022-03-25 06:51:41'),
(1359, 'user', 'all', 3, '2022-03-25 06:51:41'),
(1360, 'user', 'all', 3, '2022-03-25 06:54:15'),
(1361, 'content', 'menu', 3, '2022-03-25 06:55:55'),
(1362, 'content', 'menu', 3, '2022-03-25 06:57:40'),
(1363, 'content', 'menu', 3, '2022-03-25 06:57:54'),
(1364, 'dashboard', NULL, 3, '2022-03-25 06:57:58'),
(1365, 'site_settings', NULL, 3, '2022-03-25 06:58:03'),
(1366, 'site_settings', NULL, 3, '2022-03-25 07:00:43'),
(1367, 'site_settings', NULL, 3, '2022-03-25 07:01:55'),
(1368, 'site_settings', NULL, 3, '2022-03-25 07:04:04'),
(1369, 'site_settings', NULL, 3, '2022-03-25 07:04:34'),
(1370, 'dashboard', NULL, 3, '2022-03-25 07:05:56'),
(1371, 'dashboard', NULL, 3, '2022-03-25 07:06:59'),
(1372, 'dashboard', NULL, 3, '2022-03-25 07:07:27'),
(1373, 'dashboard', NULL, 3, '2022-03-25 07:08:53'),
(1374, 'dashboard', NULL, 3, '2022-03-25 07:09:19'),
(1375, 'user_role', 'all', 3, '2022-03-25 07:09:45'),
(1376, 'user_role', 'form', 3, '2022-03-25 07:09:47'),
(1377, 'user', 'all', 3, '2022-03-25 07:10:12'),
(1378, 'user', 'form', 3, '2022-03-25 07:10:14'),
(1379, 'content', 'menu', 3, '2022-03-25 07:14:22'),
(1380, 'content', 'menu', 3, '2022-03-25 07:15:36'),
(1381, 'content', 'all', 3, '2022-03-25 07:15:39'),
(1382, 'content', 'all', 3, '2022-03-25 07:15:46'),
(1383, 'content', 'form', 3, '2022-03-25 07:15:50'),
(1384, 'content', 'form', 3, '2022-03-25 07:15:57'),
(1385, 'content', 'all', 3, '2022-03-25 07:15:57'),
(1386, 'content', 'all', 3, '2022-03-25 07:16:02'),
(1387, 'content', 'form', 3, '2022-03-25 07:16:06'),
(1388, 'content', 'form', 3, '2022-03-25 07:16:08'),
(1389, 'content', 'form', 3, '2022-03-25 07:16:09'),
(1390, 'content', 'form', 3, '2022-03-25 07:16:10'),
(1391, 'content', 'form', 3, '2022-03-25 07:16:11'),
(1392, 'content', 'form', 3, '2022-03-25 07:16:13'),
(1393, 'content', 'form', 3, '2022-03-25 07:16:15'),
(1394, 'content', 'form', 3, '2022-03-25 07:16:21'),
(1395, 'content', 'all', 3, '2022-03-25 07:16:21'),
(1396, 'content', 'form', 3, '2022-03-25 07:16:30'),
(1397, 'content', 'all', 3, '2022-03-25 07:16:30'),
(1398, 'content', 'form', 3, '2022-03-25 07:16:40'),
(1399, 'content', 'all', 3, '2022-03-25 07:16:40'),
(1400, 'content', 'form', 3, '2022-03-25 07:16:47'),
(1401, 'content', 'all', 3, '2022-03-25 07:16:47'),
(1402, 'content', 'form', 3, '2022-03-25 07:16:55'),
(1403, 'content', 'all', 3, '2022-03-25 07:16:55'),
(1404, 'content', 'form', 3, '2022-03-25 07:17:02'),
(1405, 'content', 'all', 3, '2022-03-25 07:17:02'),
(1406, 'content', 'form', 3, '2022-03-25 07:17:10'),
(1407, 'content', 'all', 3, '2022-03-25 07:17:10'),
(1408, 'content', 'all', 3, '2022-03-25 07:17:14'),
(1409, 'content', 'all', 3, '2022-03-25 07:17:20'),
(1410, 'content', 'form', 3, '2022-03-25 07:17:25'),
(1411, 'content', 'form', 3, '2022-03-25 07:17:26'),
(1412, 'content', 'form', 3, '2022-03-25 07:17:27'),
(1413, 'content', 'form', 3, '2022-03-25 07:17:28'),
(1414, 'content', 'form', 3, '2022-03-25 07:17:30'),
(1415, 'content', 'form', 3, '2022-03-25 07:17:34'),
(1416, 'content', 'form', 3, '2022-03-25 07:17:34'),
(1417, 'content', 'form', 3, '2022-03-25 07:17:35'),
(1418, 'content', 'form', 3, '2022-03-25 07:17:36'),
(1419, 'content', 'form', 3, '2022-03-25 07:17:39'),
(1420, 'content', 'form', 3, '2022-03-25 07:17:44'),
(1421, 'content', 'all', 3, '2022-03-25 07:17:44'),
(1422, 'content', 'form', 3, '2022-03-25 07:17:49'),
(1423, 'content', 'all', 3, '2022-03-25 07:17:49'),
(1424, 'content', 'form', 3, '2022-03-25 07:17:57'),
(1425, 'content', 'all', 3, '2022-03-25 07:17:57'),
(1426, 'content', 'form', 3, '2022-03-25 07:18:03'),
(1427, 'content', 'all', 3, '2022-03-25 07:18:04'),
(1428, 'content', 'form', 3, '2022-03-25 07:18:10'),
(1429, 'content', 'all', 3, '2022-03-25 07:18:10'),
(1430, 'content', 'form', 3, '2022-03-25 07:18:16'),
(1431, 'content', 'all', 3, '2022-03-25 07:18:17'),
(1432, 'content', 'form', 3, '2022-03-25 07:18:22'),
(1433, 'content', 'all', 3, '2022-03-25 07:18:22'),
(1434, 'content', 'form', 3, '2022-03-25 07:18:29'),
(1435, 'content', 'all', 3, '2022-03-25 07:18:29'),
(1436, 'content', 'form', 3, '2022-03-25 07:18:38'),
(1437, 'content', 'all', 3, '2022-03-25 07:18:38'),
(1438, 'content', 'form', 3, '2022-03-25 07:18:50'),
(1439, 'content', 'all', 3, '2022-03-25 07:18:50'),
(1440, 'content', 'all', 3, '2022-03-25 07:19:15'),
(1441, 'content', 'menu', 3, '2022-03-25 07:19:32'),
(1442, 'content', 'save_order', 3, '2022-03-25 07:19:38'),
(1443, 'content', 'menu', 3, '2022-03-25 07:19:42'),
(1444, 'content', 'all', 3, '2022-03-25 08:49:27'),
(1445, 'dashboard', NULL, 3, '2022-03-25 08:49:49'),
(1446, 'content', 'menu', 3, '2022-03-25 08:49:52'),
(1447, 'dashboard', NULL, 3, '2022-03-25 08:50:17'),
(1448, 'user_role', 'all', 3, '2022-03-25 08:54:01'),
(1449, 'user_role', 'all', 3, '2022-03-25 08:55:31'),
(1450, 'user_role', 'all', 3, '2022-03-25 08:57:55'),
(1451, NULL, NULL, 3, '2022-03-25 09:08:58'),
(1452, NULL, NULL, 3, '2022-03-25 09:08:59'),
(1453, 'user_role', 'all', 3, '2022-03-25 09:44:35'),
(1454, 'user', 'all', 3, '2022-03-25 09:45:01'),
(1455, 'blog', 'all', 3, '2022-03-25 10:01:52'),
(1456, 'blog', 'all', 3, '2022-03-25 10:02:42'),
(1457, 'blog', 'all', 3, '2022-03-25 10:03:04'),
(1458, 'blog', 'all', 3, '2022-03-25 10:03:16'),
(1459, 'blog', 'all', 3, '2022-03-25 10:03:38'),
(1460, 'blog', 'all', 3, '2022-03-25 10:03:50'),
(1461, 'blog', 'all', 3, '2022-03-25 10:03:59'),
(1462, 'blog', 'all', 3, '2022-03-25 10:05:25'),
(1463, 'blog', 'all', 3, '2022-03-25 10:05:50'),
(1464, 'blog', 'all', 3, '2022-03-25 10:17:14'),
(1465, 'blog', 'all', 3, '2022-03-25 10:17:32'),
(1466, 'blog', 'all', 3, '2022-03-25 10:17:48'),
(1467, 'blog', 'all', 3, '2022-03-25 10:21:19'),
(1468, 'blog', 'all', 3, '2022-03-25 10:21:25'),
(1469, 'blog', 'all', 3, '2022-03-25 10:22:01'),
(1470, 'site_settings', NULL, 3, '2022-03-25 10:41:57'),
(1471, 'dashboard', NULL, 3, '2022-03-25 10:55:59'),
(1472, 'blog', 'all', 3, '2022-03-25 10:56:04'),
(1473, 'blog', 'all', 3, '2022-03-25 11:03:09'),
(1474, 'blog', 'form', 3, '2022-03-25 11:03:40'),
(1475, 'blog', 'form', 3, '2022-03-25 11:10:55'),
(1476, 'blog', 'form', 3, '2022-03-25 11:11:14'),
(1477, 'blog', 'form', 3, '2022-03-25 11:33:04'),
(1478, 'blog', 'form', 3, '2022-03-25 11:33:45'),
(1479, 'blog', 'form', 3, '2022-03-25 11:34:12'),
(1480, 'blog', 'all', 3, '2022-03-25 11:34:13'),
(1481, 'blog', 'all', 3, '2022-03-25 11:35:07'),
(1482, 'blog', 'all', 3, '2022-03-25 11:35:32'),
(1483, 'blog', 'form', 3, '2022-03-25 11:35:35'),
(1484, 'blog', 'form', 3, '2022-03-25 11:35:52'),
(1485, 'blog', 'all', 3, '2022-03-25 11:35:52'),
(1486, 'blog', 'form', 3, '2022-03-25 11:36:13'),
(1487, 'blog', 'form', 3, '2022-03-25 11:36:22'),
(1488, 'blog', 'form', 3, '2022-03-25 11:37:16'),
(1489, 'blog', 'all', 3, '2022-03-25 11:37:16'),
(1490, 'blog', 'all', 3, '2022-03-25 11:39:03'),
(1491, 'blog', 'form', 3, '2022-03-25 11:39:08'),
(1492, 'blog', 'form', 3, '2022-03-25 11:39:25'),
(1493, 'blog', 'all', 3, '2022-03-25 11:39:25'),
(1494, 'blog', 'form', 3, '2022-03-25 11:39:30'),
(1495, 'blog', 'form', 3, '2022-03-25 11:39:48'),
(1496, 'blog', 'all', 3, '2022-03-25 11:39:48'),
(1497, 'blog', 'all', 3, '2022-03-25 11:45:43'),
(1498, 'blog', 'all', 3, '2022-03-25 11:46:38'),
(1499, 'blog', 'soft_delete', 3, '2022-03-25 11:46:47'),
(1500, 'blog', 'all', 3, '2022-03-25 11:46:47'),
(1501, 'slider', 'all', 3, '2022-03-25 11:57:09'),
(1502, 'slider', 'all', 3, '2022-03-25 11:58:39'),
(1503, 'slider', 'form', 3, '2022-03-25 11:58:42'),
(1504, 'slider', 'form', 3, '2022-03-25 11:58:50'),
(1505, 'slider', 'all', 3, '2022-03-25 11:58:50'),
(1506, 'slider', 'form', 3, '2022-03-25 11:58:53'),
(1507, 'slider', 'form', 3, '2022-03-25 11:59:03'),
(1508, 'slider', 'all', 3, '2022-03-25 11:59:03'),
(1509, 'portfolio', 'all', 3, '2022-03-25 12:01:24'),
(1510, 'portfolio', 'form', 3, '2022-03-25 12:01:59'),
(1511, 'portfolio', 'form', 3, '2022-03-25 12:02:09'),
(1512, 'portfolio', 'all', 3, '2022-03-25 12:02:09'),
(1513, 'portfolio', 'all', 3, '2022-03-25 12:02:29'),
(1514, 'portfolio', 'form', 3, '2022-03-25 12:02:33'),
(1515, 'portfolio', 'form', 3, '2022-03-25 12:02:40'),
(1516, 'portfolio', 'all', 3, '2022-03-25 12:02:40'),
(1517, 'user', 'all', 3, '2022-03-25 12:03:38'),
(1518, 'dashboard', NULL, 3, '2022-03-27 04:56:21'),
(1519, 'user_role', 'all', 3, '2022-03-27 04:56:39'),
(1520, 'user_role', 'all', 3, '2022-03-27 04:56:59'),
(1521, 'user_role', 'all', 3, '2022-03-27 04:57:13'),
(1522, 'user_role', 'all', 3, '2022-03-27 04:57:22'),
(1523, 'user_role', 'all', 3, '2022-03-27 04:57:25'),
(1524, 'user_role', 'all', 3, '2022-03-27 04:57:27'),
(1525, 'user_role', 'all', 3, '2022-03-27 04:57:34'),
(1526, 'user_role', 'all', 3, '2022-03-27 04:57:58'),
(1527, 'user_role', 'all', 3, '2022-03-27 04:58:01'),
(1528, 'user_role', 'all', 3, '2022-03-27 04:59:09'),
(1529, 'user_role', 'all', 3, '2022-03-27 04:59:19'),
(1530, 'user_role', 'all', 3, '2022-03-27 05:02:14'),
(1531, 'user_role', 'all', 3, '2022-03-27 05:03:33'),
(1532, 'user_role', 'all', 3, '2022-03-27 05:03:49'),
(1533, 'user_role', 'all', 3, '2022-03-27 05:03:53'),
(1534, 'user_role', 'all', 3, '2022-03-27 05:03:57'),
(1535, 'portfolio', 'all', 3, '2022-03-27 05:23:19'),
(1536, 'portfolio', 'all', 3, '2022-03-27 05:24:10'),
(1537, 'portfolio', 'all', 3, '2022-03-27 05:24:36'),
(1538, 'portfolio', 'all', 3, '2022-03-27 05:25:39'),
(1539, 'portfolio', 'all', 3, '2022-03-27 05:25:44'),
(1540, 'portfolio', 'all', 3, '2022-03-27 05:26:03'),
(1541, 'portfolio', 'all', 3, '2022-03-27 05:26:22'),
(1542, 'portfolio', 'all', 3, '2022-03-27 05:26:39'),
(1543, 'portfolio', 'all', 3, '2022-03-27 05:26:47'),
(1544, 'portfolio', 'all', 3, '2022-03-27 05:27:44'),
(1545, 'user', 'all', 3, '2022-03-27 05:28:02'),
(1546, 'portfolio', 'all', 3, '2022-03-27 05:28:08'),
(1547, 'portfolio', 'all', 3, '2022-03-27 05:28:45'),
(1548, 'portfolio', 'all', 3, '2022-03-27 05:28:58'),
(1549, 'portfolio', 'all', 3, '2022-03-27 05:29:39'),
(1550, 'portfolio', 'all', 3, '2022-03-27 05:30:39'),
(1551, 'portfolio', 'all', 3, '2022-03-27 05:30:43'),
(1552, 'portfolio', 'all', 3, '2022-03-27 05:30:57'),
(1553, 'portfolio', 'all', 3, '2022-03-27 05:32:01'),
(1554, 'portfolio', 'all', 3, '2022-03-27 05:32:21'),
(1555, 'portfolio', 'form', 3, '2022-03-27 05:32:23'),
(1556, 'portfolio', 'form', 3, '2022-03-27 05:32:31'),
(1557, 'portfolio', 'all', 3, '2022-03-27 05:32:31'),
(1558, 'portfolio', 'all', 3, '2022-03-27 05:33:14'),
(1559, 'portfolio', 'all', 3, '2022-03-27 05:37:38'),
(1560, 'portfolio', 'all', 3, '2022-03-27 05:38:12'),
(1561, 'portfolio', 'all', 3, '2022-03-27 05:38:17'),
(1562, 'portfolio', 'all', 3, '2022-03-27 05:41:26'),
(1563, 'portfolio', 'all', 3, '2022-03-27 05:42:45'),
(1564, 'dashboard', NULL, 3, '2022-03-28 04:53:29'),
(1565, 'user_role', 'all', 3, '2022-03-28 05:12:22'),
(1566, 'user_role', 'all', 3, '2022-03-28 05:59:46'),
(1567, 'supplier', 'all', 3, '2022-03-28 05:59:51'),
(1568, 'supplier', 'all', 3, '2022-03-28 06:01:10'),
(1569, 'supplier', 'all', 3, '2022-03-28 06:05:15'),
(1570, 'supplier', 'form', 3, '2022-03-28 06:05:41'),
(1571, 'supplier', 'all', 3, '2022-03-28 06:06:28'),
(1572, 'supplier', 'form', 3, '2022-03-28 06:06:30'),
(1573, 'supplier', 'form', 3, '2022-03-28 06:10:39'),
(1574, 'user', 'form', 3, '2022-03-28 06:11:15'),
(1575, 'supplier', 'all', 3, '2022-03-28 06:11:45'),
(1576, 'user', 'form', 3, '2022-03-28 06:29:10'),
(1577, 'supplier', 'form', 3, '2022-03-28 07:50:27'),
(1578, 'supplier', 'form', 3, '2022-03-28 07:51:22'),
(1579, 'supplier', 'form', 3, '2022-03-28 07:51:33'),
(1580, 'user', 'form', 3, '2022-03-28 07:55:03'),
(1581, 'supplier', 'form', 3, '2022-03-28 07:55:10'),
(1582, 'supplier', 'form', 3, '2022-03-28 07:56:57'),
(1583, 'supplier', 'form', 3, '2022-03-28 08:00:42'),
(1584, 'supplier', 'form', 3, '2022-03-28 08:02:02'),
(1585, 'supplier', 'all', 3, '2022-03-28 08:17:39'),
(1586, 'supplier', 'form', 3, '2022-03-28 08:17:52'),
(1587, 'supplier', 'form', 3, '2022-03-28 08:35:32'),
(1588, 'supplier', 'form', 3, '2022-03-28 08:41:34'),
(1589, 'supplier', 'form', 3, '2022-03-28 08:42:44'),
(1590, 'supplier', 'form', 3, '2022-03-28 08:43:21'),
(1591, 'supplier', 'form', 3, '2022-03-28 08:46:27'),
(1592, 'supplier', 'all', 3, '2022-03-28 08:46:27'),
(1593, 'supplier', 'form', 3, '2022-03-28 08:46:40'),
(1594, 'supplier', 'form', 3, '2022-03-28 08:47:31'),
(1595, 'supplier', 'form', 3, '2022-03-28 08:48:20'),
(1596, 'supplier', 'form', 3, '2022-03-28 08:48:46'),
(1597, 'supplier', 'form', 3, '2022-03-28 08:49:01'),
(1598, 'supplier', 'form', 3, '2022-03-28 08:49:18'),
(1599, 'supplier', 'form', 3, '2022-03-28 08:49:21'),
(1600, 'user_role', 'all', 3, '2022-03-28 08:49:28'),
(1601, 'supplier', 'form', 3, '2022-03-28 08:49:30'),
(1602, 'supplier', 'form', 3, '2022-03-28 08:50:06'),
(1603, 'user_role', 'all', 3, '2022-03-28 08:50:13'),
(1604, 'supplier', 'all', 3, '2022-03-28 08:50:16'),
(1605, 'supplier', 'form', 3, '2022-03-28 08:50:19'),
(1606, 'supplier', 'all', 3, '2022-03-28 08:50:22'),
(1607, 'supplier', 'form', 3, '2022-03-28 08:50:24'),
(1608, 'supplier', 'form', 3, '2022-03-28 08:52:13'),
(1609, 'supplier', 'all', 3, '2022-03-28 08:52:13'),
(1610, 'supplier', 'form', 3, '2022-03-28 08:52:18'),
(1611, 'supplier', 'form', 3, '2022-03-28 08:53:10'),
(1612, 'supplier', 'all', 3, '2022-03-28 08:53:11'),
(1613, 'supplier', 'form', 3, '2022-03-28 08:53:14'),
(1614, 'supplier', 'all', 3, '2022-03-28 08:53:21'),
(1615, 'supplier', 'soft_delete', 3, '2022-03-28 08:53:23'),
(1616, 'supplier', 'all', 3, '2022-03-28 08:53:23'),
(1617, 'user_role', 'all', 3, '2022-03-28 08:58:26'),
(1618, 'client', 'all', 3, '2022-03-28 08:58:30'),
(1619, 'client', 'form', 3, '2022-03-28 08:58:34'),
(1620, 'client', 'form', 3, '2022-03-28 08:58:47'),
(1621, 'client', 'form', 3, '2022-03-28 08:59:58'),
(1622, 'client', 'all', 3, '2022-03-28 08:59:58'),
(1623, 'supplier', 'all', 3, '2022-03-28 09:00:12'),
(1624, 'supplier', 'all', 3, '2022-03-28 09:01:03'),
(1625, 'supplier', 'all', 3, '2022-03-28 09:01:19'),
(1626, 'supplier', 'all', 3, '2022-03-28 09:01:21'),
(1627, 'supplier', 'all', 3, '2022-03-28 09:01:28'),
(1628, 'supplier', 'form', 3, '2022-03-28 09:15:49'),
(1629, 'client', 'all', 3, '2022-03-28 09:21:41'),
(1630, 'client', 'all', 3, '2022-03-28 09:22:56'),
(1631, 'client', 'form', 3, '2022-03-28 09:23:23'),
(1632, 'client', 'form', 3, '2022-03-28 09:25:20'),
(1633, 'client', 'all', 3, '2022-03-28 09:25:20'),
(1634, 'client', 'all', 3, '2022-03-28 09:25:24'),
(1635, 'client', 'all', 3, '2022-03-28 09:25:30'),
(1636, 'client', 'all', 3, '2022-03-28 09:25:34'),
(1637, 'user', 'all', 3, '2022-03-28 09:26:06'),
(1638, 'user', 'form', 3, '2022-03-28 09:30:06'),
(1639, 'user', 'form', 3, '2022-03-28 09:31:18'),
(1640, 'user', 'all', 3, '2022-03-28 09:52:52'),
(1641, 'user', 'form', 3, '2022-03-28 09:53:01'),
(1642, 'supplier', 'all', 3, '2022-03-28 10:01:29'),
(1643, 'staff', 'all', 3, '2022-03-28 10:01:45'),
(1644, 'staff', 'all', 3, '2022-03-28 10:02:28'),
(1645, 'staff', 'all', 3, '2022-03-28 10:02:39'),
(1646, 'staff', 'all', 3, '2022-03-28 10:02:42'),
(1647, 'staff', 'all', 3, '2022-03-28 10:02:49'),
(1648, 'staff', 'all', 3, '2022-03-28 10:03:41'),
(1649, 'user_role', 'all', 3, '2022-03-28 10:03:44'),
(1650, 'staff', 'all', 3, '2022-03-28 10:03:48'),
(1651, 'staff', 'all', 3, '2022-03-28 10:04:09'),
(1652, 'staff', 'all', 3, '2022-03-28 10:04:11'),
(1653, 'staff', 'form', 3, '2022-03-28 10:04:13'),
(1654, 'staff', 'form', 3, '2022-03-28 10:28:44'),
(1655, 'staff', 'form', 3, '2022-03-28 10:41:43'),
(1656, 'staff', 'form', 3, '2022-03-28 10:47:58'),
(1657, 'staff', 'form', 3, '2022-03-28 10:51:06'),
(1658, 'staff', 'form', 3, '2022-03-28 11:12:52'),
(1659, 'staff', 'form', 3, '2022-03-28 11:13:20'),
(1660, 'staff', 'form', 3, '2022-03-28 11:14:05'),
(1661, 'staff', 'form', 3, '2022-03-28 11:17:24'),
(1662, 'staff', 'all', 3, '2022-03-28 11:17:34'),
(1663, 'staff', 'all', 3, '2022-03-28 11:18:59'),
(1664, 'staff', 'all', 3, '2022-03-28 11:23:35'),
(1665, 'staff', 'all', 3, '2022-03-28 11:23:57'),
(1666, 'staff', 'all', 3, '2022-03-28 11:24:14'),
(1667, 'staff', 'form', 3, '2022-03-28 11:24:16'),
(1668, 'staff', 'form', 3, '2022-03-28 11:24:49'),
(1669, 'staff', 'form', 3, '2022-03-28 11:25:25'),
(1670, 'staff', 'all', 3, '2022-03-28 11:25:30'),
(1671, 'staff', 'all', 3, '2022-03-28 11:51:43'),
(1672, 'country', 'all', 3, '2022-03-28 11:51:51'),
(1673, 'country', 'all', 3, '2022-03-28 11:53:27'),
(1674, 'location', 'all', 3, '2022-03-28 11:53:39'),
(1675, 'categories', 'all', 3, '2022-03-28 11:53:48'),
(1676, 'department', 'all', 3, '2022-03-28 12:02:21'),
(1677, 'content', 'form', 3, '2022-03-28 12:03:20'),
(1678, 'content', 'menu', 3, '2022-03-28 12:03:27'),
(1679, 'content', 'menu', 3, '2022-03-28 12:04:25'),
(1680, 'dashboard', NULL, 3, '2022-03-29 06:04:40'),
(1681, 'staff', 'all', 3, '2022-03-29 06:05:23'),
(1682, 'staff', 'form', 3, '2022-03-29 06:05:26'),
(1683, 'dashboard', NULL, 3, '2022-03-29 10:15:33'),
(1684, 'supplier', 'all', 3, '2022-03-29 10:15:38'),
(1685, 'supplier', 'form', 3, '2022-03-29 10:15:48'),
(1686, 'supplier', 'form', 3, '2022-03-29 10:17:22'),
(1687, 'supplier', 'all', 3, '2022-03-29 11:04:02'),
(1688, 'supplier', 'form', 3, '2022-03-29 11:04:07'),
(1689, 'supplier', 'form', 3, '2022-03-29 11:04:08'),
(1690, 'supplier', 'all', 3, '2022-03-29 11:05:41'),
(1691, 'supplier', 'all', 3, '2022-03-29 11:14:21'),
(1692, 'supplier', 'form', 3, '2022-03-29 11:18:10'),
(1693, 'dashboard', NULL, 3, '2022-03-31 06:25:23'),
(1694, 'dashboard', NULL, 3, '2022-03-31 09:10:06'),
(1695, 'location', 'all', 3, '2022-03-31 09:10:14'),
(1696, 'location', 'form', 3, '2022-03-31 09:10:17'),
(1697, 'items', 'all', 3, '2022-03-31 09:11:15'),
(1698, 'location', 'all', 3, '2022-03-31 09:11:19'),
(1699, 'location', 'form', 3, '2022-03-31 09:11:24'),
(1700, 'categories', 'all', 3, '2022-03-31 09:11:30'),
(1701, 'items', 'all', 3, '2022-03-31 09:11:38'),
(1702, 'items', 'form', 3, '2022-03-31 09:11:40'),
(1703, 'items', 'form', 3, '2022-03-31 09:15:38'),
(1704, 'items', 'all', 3, '2022-03-31 09:15:38'),
(1705, 'items', 'form', 3, '2022-03-31 09:15:41'),
(1706, 'location', 'all', 3, '2022-03-31 09:15:56'),
(1707, 'location', 'form', 3, '2022-03-31 09:15:59'),
(1708, 'location', 'form', 3, '2022-03-31 09:16:03'),
(1709, 'location', 'all', 3, '2022-03-31 09:16:03'),
(1710, 'location', 'form', 3, '2022-03-31 09:16:06'),
(1711, 'location', 'form', 3, '2022-03-31 09:16:22'),
(1712, 'location', 'all', 3, '2022-03-31 09:16:22'),
(1713, 'location', 'all', 3, '2022-03-31 09:18:44'),
(1714, 'location', 'form', 3, '2022-03-31 09:18:55'),
(1715, 'location', 'all', 3, '2022-03-31 09:18:59'),
(1716, 'location', 'form', 3, '2022-03-31 10:32:34'),
(1717, 'location', 'all', 3, '2022-03-31 10:32:46'),
(1718, 'content', 'menu', 3, '2022-03-31 10:39:29'),
(1719, 'site_settings', NULL, 3, '2022-03-31 10:41:08'),
(1720, 'dashboard', NULL, 1, '2022-04-03 05:24:20'),
(1721, 'dashboard', NULL, 1, '2022-04-06 10:55:22'),
(1722, 'dashboard', NULL, 1, '2022-04-06 10:55:37'),
(1723, 'supplier', 'all', 1, '2022-04-06 10:55:54'),
(1724, 'supplier', 'form', 1, '2022-04-06 10:56:04'),
(1725, 'supplier', 'form', 1, '2022-04-06 10:56:19'),
(1726, 'site_settings', NULL, 1, '2022-04-06 10:56:39'),
(1727, 'site_settings', NULL, 1, '2022-04-06 10:57:49'),
(1728, 'site_settings', NULL, 1, '2022-04-06 10:57:49'),
(1729, 'location', 'form', 1, '2022-04-06 10:58:04'),
(1730, 'supplier', 'form', 1, '2022-04-06 11:02:42'),
(1731, 'dashboard', NULL, 1, '2022-04-07 04:53:37'),
(1732, 'dashboard', NULL, 1, '2022-04-07 04:54:21'),
(1733, 'dashboard', NULL, 1, '2022-04-07 05:47:42'),
(1734, 'user', 'form', 1, '2022-04-07 05:47:55'),
(1735, 'staff', 'form', 1, '2022-04-07 05:48:01'),
(1736, 'staff', 'form', 1, '2022-04-07 06:00:41'),
(1737, 'staff', 'form', 1, '2022-04-07 06:01:40'),
(1738, 'staff', 'form', 1, '2022-04-07 06:02:30'),
(1739, 'staff', 'form', 1, '2022-04-07 06:02:43'),
(1740, 'staff', 'form', 1, '2022-04-07 06:02:47'),
(1741, 'staff', 'form', 1, '2022-04-07 06:02:49'),
(1742, 'staff', 'form', 1, '2022-04-07 06:02:49'),
(1743, 'staff', 'form', 1, '2022-04-07 06:03:11'),
(1744, 'staff', 'form', 1, '2022-04-07 06:03:55'),
(1745, 'staff', 'form', 1, '2022-04-07 06:05:17'),
(1746, 'staff', 'form', 1, '2022-04-07 06:05:53'),
(1747, 'staff', 'form', 1, '2022-04-07 06:06:21'),
(1748, 'staff', 'form', 1, '2022-04-07 06:06:49'),
(1749, 'staff', 'form', 1, '2022-04-07 06:07:10'),
(1750, 'staff', 'form', 1, '2022-04-07 06:10:20'),
(1751, 'staff', 'form', 1, '2022-04-07 06:11:14'),
(1752, 'staff', 'form', 1, '2022-04-07 06:20:00'),
(1753, 'staff', 'form', 1, '2022-04-07 06:20:38'),
(1754, 'country', 'all', 1, '2022-04-07 06:21:56'),
(1755, 'designation', 'all', 1, '2022-04-07 06:22:08'),
(1756, 'designation', 'all', 1, '2022-04-07 06:25:37'),
(1757, 'staff', 'all', 1, '2022-04-07 06:25:44'),
(1758, 'staff', 'form', 1, '2022-04-07 06:25:47'),
(1759, 'staff', 'form', 1, '2022-04-07 06:26:36'),
(1760, 'staff', 'form', 1, '2022-04-07 06:27:12'),
(1761, 'staff', 'form', 1, '2022-04-07 06:29:36'),
(1762, 'staff', 'form', 1, '2022-04-07 06:29:57'),
(1763, 'staff', 'form', 1, '2022-04-07 06:31:30'),
(1764, 'staff', 'form', 1, '2022-04-07 06:39:49'),
(1765, 'staff', 'form', 1, '2022-04-07 06:41:11'),
(1766, 'staff', 'form', 1, '2022-04-07 06:44:55'),
(1767, 'staff', 'form', 1, '2022-04-07 06:46:31'),
(1768, 'staff', 'form', 1, '2022-04-07 06:47:44'),
(1769, 'dashboard', NULL, 1, '2022-04-08 09:54:20'),
(1770, 'items', 'all', 1, '2022-04-08 09:54:28'),
(1771, 'items', 'all', 1, '2022-04-08 10:04:24'),
(1772, 'dashboard', NULL, 3, '2022-04-13 18:04:25'),
(1773, 'categories', 'form', 3, '2022-04-13 18:04:37'),
(1774, 'categories', 'all', 3, '2022-04-13 18:18:16'),
(1775, 'categories', 'form', 3, '2022-04-13 18:18:33'),
(1776, 'categories', 'form', 3, '2022-04-13 18:19:07'),
(1777, 'categories', 'all', 3, '2022-04-13 18:19:07'),
(1778, 'categories', 'all', 3, '2022-04-13 18:23:38'),
(1779, 'dashboard', NULL, 3, '2022-04-13 18:23:46'),
(1780, 'content', 'menu', 3, '2022-04-13 18:24:05'),
(1781, 'dashboard', NULL, 3, '2022-04-13 18:24:11'),
(1782, 'dashboard', NULL, 3, '2022-04-13 18:24:18'),
(1783, 'dashboard', NULL, 3, '2022-04-13 18:24:50'),
(1784, 'dashboard', NULL, 3, '2022-04-13 18:25:01'),
(1785, 'dashboard', NULL, 3, '2022-04-13 18:26:19'),
(1786, 'dashboard', NULL, 3, '2022-04-13 18:35:47'),
(1787, 'dashboard', NULL, 3, '2022-04-13 18:35:52'),
(1788, 'dashboard', NULL, 3, '2022-04-13 18:38:09'),
(1789, 'dashboard', NULL, 3, '2022-04-13 18:38:11'),
(1790, 'dashboard', NULL, 3, '2022-04-13 18:38:21'),
(1791, 'dashboard', NULL, 3, '2022-04-13 18:43:30'),
(1792, 'dashboard', NULL, 3, '2022-04-13 18:44:53'),
(1793, 'dashboard', NULL, 3, '2022-04-13 18:51:21'),
(1794, 'item_accessories', 'all', 3, '2022-04-13 19:00:08'),
(1795, 'content', 'menu', 3, '2022-04-13 19:00:19'),
(1796, 'content', 'all', 3, '2022-04-13 19:00:55'),
(1797, 'staff', 'form', 3, '2022-04-13 19:01:38'),
(1798, 'content', 'all', 3, '2022-04-13 19:04:28'),
(1799, 'content', 'all', 3, '2022-04-13 19:05:07'),
(1800, 'content', 'all', 3, '2022-04-13 19:05:59'),
(1801, 'content', 'all', 3, '2022-04-13 19:06:02'),
(1802, 'categories', 'form', 3, '2022-04-13 19:07:45'),
(1803, 'categories', 'form', 3, '2022-04-13 19:33:22'),
(1804, 'content', 'all', 3, '2022-04-13 19:33:23'),
(1805, 'staff', 'form', 3, '2022-04-13 19:33:26'),
(1806, 'categories', 'all', 3, '2022-04-13 19:33:31'),
(1807, 'categories', 'form', 3, '2022-04-13 19:33:40'),
(1808, 'categories', 'form', 3, '2022-04-13 19:33:53'),
(1809, 'categories', 'form', 3, '2022-04-13 19:34:07'),
(1810, 'categories', 'all', 3, '2022-04-13 19:34:10'),
(1811, 'categories', 'form', 3, '2022-04-13 19:34:15'),
(1812, 'categories', 'form', 3, '2022-04-13 19:34:31'),
(1813, 'categories', 'all', 3, '2022-04-13 19:34:31'),
(1814, 'categories', 'form', 3, '2022-04-13 19:35:36'),
(1815, 'categories', 'form', 3, '2022-04-13 19:35:50'),
(1816, 'categories', 'all', 3, '2022-04-13 19:35:50'),
(1817, 'categories', 'form', 3, '2022-04-13 19:38:53'),
(1818, 'categories', 'form', 3, '2022-04-13 19:40:42'),
(1819, 'categories', 'all', 3, '2022-04-13 19:40:42'),
(1820, 'dashboard', NULL, 3, '2022-04-13 19:51:41'),
(1821, 'categories', 'all', 3, '2022-04-13 19:51:49'),
(1822, 'categories', 'form', 3, '2022-04-13 19:51:56'),
(1823, 'categories', 'form', 3, '2022-04-13 19:52:07'),
(1824, 'categories', 'all', 3, '2022-04-13 19:52:07'),
(1825, 'categories', 'form', 3, '2022-04-13 19:55:02'),
(1826, 'categories', 'form', 3, '2022-04-13 19:55:10'),
(1827, 'categories', 'all', 3, '2022-04-13 19:55:11'),
(1828, 'categories', 'form', 3, '2022-04-13 21:51:32'),
(1829, 'categories', 'form', 3, '2022-04-13 21:51:43'),
(1830, 'categories', 'all', 3, '2022-04-13 21:51:43'),
(1831, 'categories', 'form', 3, '2022-04-13 21:56:22'),
(1832, 'dashboard', NULL, 3, '2022-04-13 22:34:01'),
(1833, 'categories', 'all', 3, '2022-04-13 22:35:46'),
(1834, 'categories', 'form', 3, '2022-04-13 22:35:54'),
(1835, 'categories', 'form', 3, '2022-04-13 22:36:07'),
(1836, 'categories', 'all', 3, '2022-04-13 22:36:07'),
(1837, 'content', 'all', 3, '2022-04-13 22:39:34'),
(1838, 'content', 'form', 3, '2022-04-13 22:39:49'),
(1839, 'content', 'form', 3, '2022-04-13 22:40:04'),
(1840, 'content', 'form', 3, '2022-04-13 22:40:59'),
(1841, 'country', 'all', 3, '2022-04-13 22:43:08'),
(1842, 'country', 'form', 3, '2022-04-13 22:43:18'),
(1843, 'country', 'form', 3, '2022-04-13 22:43:30'),
(1844, 'country', 'all', 3, '2022-04-13 22:43:30'),
(1845, 'country', 'form', 3, '2022-04-13 22:44:57'),
(1846, 'country', 'form', 3, '2022-04-13 22:45:05'),
(1847, 'country', 'all', 3, '2022-04-13 22:45:05'),
(1848, 'country', 'all', 3, '2022-04-13 22:48:33'),
(1849, 'country', 'form', 3, '2022-04-13 22:48:41'),
(1850, 'country', 'form', 3, '2022-04-13 22:48:52'),
(1851, 'country', 'all', 3, '2022-04-13 22:48:52'),
(1852, 'country', 'form', 3, '2022-04-13 22:50:57'),
(1853, 'country', 'form', 3, '2022-04-13 22:51:12'),
(1854, 'country', 'all', 3, '2022-04-13 22:51:12'),
(1855, 'country', 'form', 3, '2022-04-13 22:51:21'),
(1856, 'country', 'form', 3, '2022-04-13 22:51:30'),
(1857, 'country', 'form', 3, '2022-04-13 22:51:46'),
(1858, 'country', 'form', 3, '2022-04-13 22:53:42'),
(1859, 'country', 'form', 3, '2022-04-13 22:57:53'),
(1860, 'categories', 'all', 3, '2022-04-13 22:58:04'),
(1861, 'categories', 'form', 3, '2022-04-13 22:58:11'),
(1862, 'categories', 'form', 3, '2022-04-13 22:58:21'),
(1863, 'categories', 'all', 3, '2022-04-13 22:58:21'),
(1864, 'country', 'all', 3, '2022-04-13 23:01:23'),
(1865, 'country', 'form', 3, '2022-04-13 23:01:32'),
(1866, 'country', 'form', 3, '2022-04-13 23:01:44'),
(1867, 'country', 'form', 3, '2022-04-13 23:03:10'),
(1868, 'country', 'form', 3, '2022-04-13 23:03:16'),
(1869, 'country', 'form', 3, '2022-04-13 23:03:19'),
(1870, 'country', 'form', 3, '2022-04-13 23:03:20'),
(1871, 'country', 'form', 3, '2022-04-13 23:03:22'),
(1872, 'country', 'form', 3, '2022-04-13 23:03:27'),
(1873, 'country', 'form', 3, '2022-04-13 23:04:50'),
(1874, 'country', 'form', 3, '2022-04-13 23:04:56'),
(1875, 'country', 'form', 3, '2022-04-13 23:05:07'),
(1876, 'country', 'form', 3, '2022-04-13 23:07:24'),
(1877, 'country', 'form', 3, '2022-04-13 23:07:28'),
(1878, 'country', 'form', 3, '2022-04-13 23:07:31'),
(1879, 'country', 'form', 3, '2022-04-13 23:09:37'),
(1880, 'country', 'all', 3, '2022-04-13 23:09:43'),
(1881, 'country', 'form', 3, '2022-04-13 23:10:07'),
(1882, 'country', 'form', 3, '2022-04-13 23:10:13'),
(1883, 'country', 'form', 3, '2022-04-13 23:10:34'),
(1884, 'country', 'all', 3, '2022-04-13 23:10:40'),
(1885, 'country', 'form', 3, '2022-04-13 23:10:47'),
(1886, 'country', 'form', 3, '2022-04-13 23:10:58'),
(1887, 'country', 'all', 3, '2022-04-13 23:10:58'),
(1888, 'country', 'form', 3, '2022-04-13 23:12:14'),
(1889, 'country', 'form', 3, '2022-04-13 23:12:23'),
(1890, 'country', 'all', 3, '2022-04-13 23:12:23'),
(1891, 'country', 'all', 3, '2022-04-13 23:14:51'),
(1892, 'country', 'form', 3, '2022-04-13 23:14:57'),
(1893, 'country', 'form', 3, '2022-04-13 23:15:06'),
(1894, 'country', 'all', 3, '2022-04-13 23:15:07'),
(1895, 'country', 'form', 3, '2022-04-13 23:15:21'),
(1896, 'country', 'form', 3, '2022-04-13 23:15:28'),
(1897, 'country', 'all', 3, '2022-04-13 23:15:28'),
(1898, 'department', 'all', 3, '2022-04-13 23:16:05'),
(1899, 'department', 'form', 3, '2022-04-13 23:16:14'),
(1900, 'department', 'form', 3, '2022-04-13 23:16:25'),
(1901, 'department', 'form', 3, '2022-04-13 23:18:13'),
(1902, 'department', 'form', 3, '2022-04-13 23:18:15'),
(1903, 'department', 'form', 3, '2022-04-13 23:18:22'),
(1904, 'department', 'form', 3, '2022-04-13 23:19:41'),
(1905, 'department', 'form', 3, '2022-04-13 23:19:48'),
(1906, 'department', 'form', 3, '2022-04-13 23:21:46'),
(1907, 'department', 'form', 3, '2022-04-13 23:21:53'),
(1908, 'department', 'form', 3, '2022-04-13 23:23:48'),
(1909, 'department', 'all', 3, '2022-04-13 23:23:54'),
(1910, 'department', 'form', 3, '2022-04-13 23:24:02'),
(1911, 'department', 'form', 3, '2022-04-13 23:24:13'),
(1912, 'department', 'form', 3, '2022-04-13 23:25:06'),
(1913, 'department', 'all', 3, '2022-04-13 23:25:06'),
(1914, 'department', 'form', 3, '2022-04-13 23:25:19'),
(1915, 'department', 'all', 3, '2022-04-13 23:25:26'),
(1916, 'department', 'soft_delete', 3, '2022-04-13 23:25:33'),
(1917, 'department', 'all', 3, '2022-04-13 23:25:36'),
(1918, 'department', 'form', 3, '2022-04-13 23:25:42'),
(1919, 'department', 'form', 3, '2022-04-13 23:25:51'),
(1920, 'department', 'form', 3, '2022-04-13 23:26:36'),
(1921, 'department', 'all', 3, '2022-04-13 23:26:37'),
(1922, 'department', 'form', 3, '2022-04-13 23:26:51'),
(1923, 'department', 'form', 3, '2022-04-13 23:27:05'),
(1924, 'department', 'all', 3, '2022-04-13 23:27:05'),
(1925, 'items', 'form', 3, '2022-04-13 23:30:28'),
(1926, 'designation', 'all', 3, '2022-04-13 23:35:08'),
(1927, 'designation', 'form', 3, '2022-04-13 23:35:33'),
(1928, 'designation', 'form', 3, '2022-04-13 23:35:45'),
(1929, 'designation', 'form', 3, '2022-04-13 23:36:33'),
(1930, 'designation', 'form', 3, '2022-04-13 23:45:20'),
(1931, 'designation', 'form', 3, '2022-04-13 23:45:38'),
(1932, 'designation', 'form', 3, '2022-04-13 23:45:52'),
(1933, 'designation', 'form', 3, '2022-04-13 23:46:11'),
(1934, 'designation', 'all', 3, '2022-04-13 23:46:19'),
(1935, 'designation', 'form', 3, '2022-04-13 23:48:05'),
(1936, 'designation', 'form', 3, '2022-04-13 23:48:32'),
(1937, 'designation', 'all', 3, '2022-04-13 23:48:32'),
(1938, 'designation', 'form', 3, '2022-04-13 23:48:41'),
(1939, 'designation', 'form', 3, '2022-04-13 23:49:06'),
(1940, 'designation', 'form', 3, '2022-04-13 23:50:07'),
(1941, 'designation', 'all', 3, '2022-04-13 23:50:07'),
(1942, 'designation', 'form', 3, '2022-04-13 23:50:17'),
(1943, 'designation', 'all', 3, '2022-04-13 23:50:37'),
(1944, 'fiscal_year', 'all', 3, '2022-04-13 23:51:38'),
(1945, 'fiscal_year', 'form', 3, '2022-04-13 23:52:49'),
(1946, 'fiscal_year', 'form', 3, '2022-04-13 23:53:24'),
(1947, 'fiscal_year', 'all', 3, '2022-04-13 23:53:24'),
(1948, 'fiscal_year', 'form', 3, '2022-04-13 23:53:33'),
(1949, 'fiscal_year', 'form', 3, '2022-04-13 23:53:46'),
(1950, 'fiscal_year', 'form', 3, '2022-04-13 23:54:08'),
(1951, 'fiscal_year', 'form', 3, '2022-04-13 23:54:10'),
(1952, 'fiscal_year', 'form', 3, '2022-04-13 23:54:16'),
(1953, 'fiscal_year', 'form', 3, '2022-04-13 23:54:58'),
(1954, 'fiscal_year', 'form', 3, '2022-04-13 23:55:04'),
(1955, 'fiscal_year', 'form', 3, '2022-04-13 23:55:25'),
(1956, 'fiscal_year', 'all', 3, '2022-04-13 23:55:25'),
(1957, 'dashboard', NULL, 3, '2022-04-15 18:35:49'),
(1958, 'requisition', 'all', 3, '2022-04-15 18:36:05'),
(1959, 'requisition', 'form', 3, '2022-04-15 18:36:12'),
(1960, 'requisition', 'getStaffOfDepartment', 3, '2022-04-15 18:38:58'),
(1961, 'categories', 'all', 3, '2022-04-15 18:44:23'),
(1962, 'opening_master', 'form', 3, '2022-04-15 18:45:19'),
(1963, 'categories', 'all', 3, '2022-04-15 18:45:23'),
(1964, 'requisition', 'form', 3, '2022-04-15 18:55:50'),
(1965, 'item_amc', 'all', 3, '2022-04-15 19:24:41'),
(1966, 'requisition', 'form', 3, '2022-04-15 19:24:45'),
(1967, 'item_amc', 'form', 3, '2022-04-15 19:24:48'),
(1968, 'content', 'menu', 3, '2022-04-15 19:30:49'),
(1969, 'staff_dep_deg', 'all', 3, '2022-04-15 19:31:09'),
(1970, 'designation', 'form', 3, '2022-04-15 19:31:28'),
(1971, 'staff_dep_deg', 'all', 3, '2022-04-15 19:31:32'),
(1972, 'client', 'form', 3, '2022-04-15 19:31:47'),
(1973, 'location', 'all', 3, '2022-04-15 19:34:54'),
(1974, 'location', 'form', 3, '2022-04-15 19:35:03'),
(1975, 'items', 'form', 3, '2022-04-15 19:41:15'),
(1976, 'client', 'form', 3, '2022-04-15 19:41:39'),
(1977, 'location', 'form', 3, '2022-04-15 21:41:03'),
(1978, 'categories', 'form', 3, '2022-04-15 21:56:14'),
(1979, 'client', 'form', 3, '2022-04-15 22:13:21'),
(1980, 'categories', 'all', 3, '2022-04-15 22:14:15'),
(1981, 'requisition', 'all', 3, '2022-04-15 22:14:27');
INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(1982, 'user_role', 'all', 3, '2022-04-15 22:17:26'),
(1983, 'user_role', 'all', 3, '2022-04-15 22:24:05'),
(1984, 'user', 'form', 3, '2022-04-15 22:24:17'),
(1985, 'user_role', 'all', 3, '2022-04-15 22:24:23'),
(1986, 'user', 'all', 3, '2022-04-15 22:24:32'),
(1987, 'user', 'all', 3, '2022-04-15 22:27:19'),
(1988, 'items', 'all', 3, '2022-04-15 22:37:22'),
(1989, 'categories', 'all', 3, '2022-04-15 22:37:29'),
(1990, 'item_accessories', 'all', 3, '2022-04-15 22:37:38'),
(1991, 'item_accessories', 'all', 3, '2022-04-15 22:37:44'),
(1992, 'item_insurance', 'all', 3, '2022-04-15 22:49:49'),
(1993, 'item_amc', 'form', 3, '2022-04-15 22:52:13'),
(1994, 'item_amc', 'form', 3, '2022-04-15 22:52:42'),
(1995, 'item_amc', 'all', 3, '2022-04-15 22:52:42'),
(1996, 'item_amc', 'form', 3, '2022-04-15 22:52:51'),
(1997, 'item_amc', 'form', 3, '2022-04-15 22:53:03'),
(1998, 'item_amc', 'all', 3, '2022-04-15 22:53:03'),
(1999, 'item_amc', 'soft_delete', 3, '2022-04-15 22:53:10'),
(2000, 'item_amc', 'all', 3, '2022-04-15 22:53:11'),
(2001, 'categories', 'all', 3, '2022-04-15 22:54:25'),
(2002, 'categories', 'soft_delete', 3, '2022-04-15 22:54:39'),
(2003, 'categories', 'all', 3, '2022-04-15 22:54:40'),
(2004, 'categories', 'all', 3, '2022-04-15 22:54:55'),
(2005, 'categories', 'form', 3, '2022-04-15 22:55:39'),
(2006, 'categories', 'form', 3, '2022-04-15 22:56:11'),
(2007, 'categories', 'all', 3, '2022-04-15 22:56:11'),
(2008, 'categories', 'soft_delete', 3, '2022-04-15 22:56:31'),
(2009, 'categories', 'all', 3, '2022-04-15 22:56:44'),
(2010, 'categories', 'form', 3, '2022-04-15 22:56:48'),
(2011, 'categories', 'all', 3, '2022-04-15 22:56:52'),
(2012, 'categories', 'form', 3, '2022-04-15 22:57:00'),
(2013, 'categories', 'form', 3, '2022-04-15 22:57:09'),
(2014, 'categories', 'form', 3, '2022-04-15 22:59:06'),
(2015, 'categories', 'all', 3, '2022-04-15 22:59:06'),
(2016, 'categories', 'form', 3, '2022-04-15 22:59:14'),
(2017, 'categories', 'form', 3, '2022-04-15 22:59:26'),
(2018, 'categories', 'all', 3, '2022-04-15 22:59:26'),
(2019, 'categories', 'soft_delete', 3, '2022-04-15 22:59:45'),
(2020, 'categories', 'all', 3, '2022-04-15 22:59:45'),
(2021, 'categories', 'form', 3, '2022-04-15 23:00:32'),
(2022, 'categories', 'form', 3, '2022-04-15 23:00:56'),
(2023, 'categories', 'all', 3, '2022-04-15 23:00:56'),
(2024, 'categories', 'soft_delete', 3, '2022-04-15 23:01:19'),
(2025, 'categories', 'all', 3, '2022-04-15 23:01:19'),
(2026, 'dashboard', NULL, 3, '2022-04-15 23:34:06'),
(2027, 'dashboard', NULL, 3, '2022-04-15 23:34:08'),
(2028, 'dashboard', NULL, 3, '2022-04-15 23:39:39'),
(2029, 'dashboard', NULL, 3, '2022-04-18 11:10:16'),
(2030, 'staff', 'all', 3, '2022-04-18 11:11:19'),
(2031, 'staff', 'all', 3, '2022-04-18 11:11:27'),
(2032, 'user', 'all', 3, '2022-04-18 11:11:37'),
(2033, 'staff', 'form', 3, '2022-04-18 11:11:56'),
(2034, 'staff', 'form', 3, '2022-04-18 11:12:53'),
(2035, 'staff', 'all', 3, '2022-04-18 11:12:53'),
(2036, 'user', 'all', 3, '2022-04-18 11:13:03'),
(2037, 'user', 'form', 3, '2022-04-18 11:13:12'),
(2038, 'user', 'form', 3, '2022-04-18 11:13:38'),
(2039, 'user', 'form', 3, '2022-04-18 11:14:08'),
(2040, 'items', 'form', 3, '2022-04-18 11:14:56'),
(2041, 'items', 'form', 3, '2022-04-18 11:15:12'),
(2042, 'user', 'form', 3, '2022-04-18 11:15:18'),
(2043, 'user', 'form', 3, '2022-04-18 11:15:42'),
(2044, 'user', 'form', 3, '2022-04-18 11:17:56'),
(2045, 'user', 'all', 3, '2022-04-18 11:17:57'),
(2046, 'dashboard', NULL, 1, '2022-04-19 05:24:12'),
(2047, 'dashboard', NULL, 1, '2022-04-19 05:53:39'),
(2048, 'requisition', 'all', 1, '2022-04-19 05:55:18'),
(2049, 'requisition', 'form', 1, '2022-04-19 05:55:22'),
(2050, 'requisition', 'all', 1, '2022-04-19 05:55:27'),
(2051, 'country', 'all', 1, '2022-04-19 05:55:39'),
(2052, 'categories', 'all', 1, '2022-04-19 05:58:07'),
(2053, 'items', 'all', 1, '2022-04-19 05:58:14'),
(2054, 'items', 'form', 1, '2022-04-19 05:58:21'),
(2055, 'staff_dep_deg', 'all', 1, '2022-04-19 05:59:28'),
(2056, 'staff_dep_deg', 'form', 1, '2022-04-19 05:59:40'),
(2057, 'staff_dep_deg', 'form', 1, '2022-04-19 06:00:03'),
(2058, 'staff_dep_deg', 'form', 1, '2022-04-19 06:00:23'),
(2059, 'staff_dep_deg', 'all', 1, '2022-04-19 06:00:23'),
(2060, 'staff_dep_deg', 'all', 1, '2022-04-19 06:00:31'),
(2061, 'staff_dep_deg', 'all', 1, '2022-04-19 06:00:52'),
(2062, 'categories', 'all', 1, '2022-04-19 06:02:26'),
(2063, 'items', 'all', 1, '2022-04-19 06:02:35'),
(2064, 'items', 'form', 1, '2022-04-19 06:02:41'),
(2065, 'items', 'form', 1, '2022-04-19 06:03:41'),
(2066, 'items', 'all', 1, '2022-04-19 06:03:41'),
(2067, 'items', 'form', 1, '2022-04-19 06:03:47'),
(2068, 'items', 'all', 1, '2022-04-19 06:03:53'),
(2069, 'items', 'form', 1, '2022-04-19 06:03:57'),
(2070, 'items', 'form', 1, '2022-04-19 06:04:03'),
(2071, 'items', 'all', 1, '2022-04-19 06:04:11'),
(2072, 'items', 'all', 1, '2022-04-19 06:04:13'),
(2073, 'items', 'all', 1, '2022-04-19 06:04:13'),
(2074, 'items', 'all', 1, '2022-04-19 06:04:13'),
(2075, 'items', 'form', 1, '2022-04-19 06:04:18'),
(2076, 'items', 'all', 1, '2022-04-19 06:04:21'),
(2077, 'items', 'all', 1, '2022-04-19 06:12:36'),
(2078, 'items', 'form', 1, '2022-04-19 06:12:38'),
(2079, 'items', 'form', 1, '2022-04-19 06:13:29'),
(2080, 'items', 'all', 1, '2022-04-19 06:13:29'),
(2081, 'items', 'all', 1, '2022-04-19 06:14:26'),
(2082, 'items', 'form', 1, '2022-04-19 06:14:29'),
(2083, 'items', 'form', 1, '2022-04-19 06:15:08'),
(2084, 'items', 'all', 1, '2022-04-19 06:15:08'),
(2085, 'items', 'form', 1, '2022-04-19 06:15:18'),
(2086, 'items', 'form', 1, '2022-04-19 06:15:25'),
(2087, 'items', 'form', 1, '2022-04-19 06:15:27'),
(2088, 'items', 'all', 1, '2022-04-19 06:15:30'),
(2089, 'items', 'form', 1, '2022-04-19 06:15:33'),
(2090, 'items', 'form', 1, '2022-04-19 06:15:41'),
(2091, 'items', 'form', 1, '2022-04-19 06:15:55'),
(2092, 'items', 'form', 1, '2022-04-19 06:15:57'),
(2093, 'opening_master', 'all', 1, '2022-04-19 06:16:20'),
(2094, 'opening_master', 'form', 1, '2022-04-19 06:16:22'),
(2095, 'opening_master', 'all', 1, '2022-04-19 06:16:28'),
(2096, 'requisition', 'all', 1, '2022-04-19 06:16:42'),
(2097, 'requisition', 'form', 1, '2022-04-19 06:16:44'),
(2098, 'requisition', 'getStaffOfDepartment', 1, '2022-04-19 06:16:58'),
(2099, 'requisition', 'getForm', 1, '2022-04-19 06:17:17'),
(2100, 'requisition', 'form', 1, '2022-04-19 06:17:32'),
(2101, 'requisition', 'all', 1, '2022-04-19 06:17:32'),
(2102, 'requisition', 'form', 1, '2022-04-19 06:17:38'),
(2103, 'requisition', 'getStaffOfDepartment', 1, '2022-04-19 06:17:45'),
(2104, 'requisition', 'getStaffOfDepartment', 1, '2022-04-19 06:17:49'),
(2105, 'requisition', 'getStaffOfDepartment', 1, '2022-04-19 06:17:51'),
(2106, 'requisition', 'getForm', 1, '2022-04-19 06:17:59'),
(2107, 'requisition', 'getForm', 1, '2022-04-19 06:18:28'),
(2108, 'requisition', 'form', 1, '2022-04-19 06:19:00'),
(2109, 'requisition', 'all', 1, '2022-04-19 06:19:00'),
(2110, 'requisition', 'all', 1, '2022-04-19 06:22:43'),
(2111, 'issue', 'all', 1, '2022-04-19 06:22:50'),
(2112, 'issue', 'form', 1, '2022-04-19 06:22:56'),
(2113, 'items', 'all', 1, '2022-04-19 06:25:07'),
(2114, 'items', 'all', 1, '2022-04-19 06:25:11'),
(2115, 'issue', 'form', 1, '2022-04-19 06:25:19'),
(2116, 'issue', 'direct_add', 1, '2022-04-19 06:25:19'),
(2117, 'issue', 'form', 1, '2022-04-19 06:25:25'),
(2118, 'requisition', 'all', 1, '2022-04-19 06:25:45'),
(2119, 'requisition', 'view', 1, '2022-04-19 06:25:52'),
(2120, 'requisition', 'view', 1, '2022-04-19 06:27:29'),
(2121, 'requisition', 'view', 1, '2022-04-19 06:27:36'),
(2122, 'requisition', 'view', 1, '2022-04-19 06:30:30'),
(2123, 'requisition', 'view', 1, '2022-04-19 06:31:23'),
(2124, 'requisition', 'view', 1, '2022-04-19 06:32:03'),
(2125, 'requisition', 'view', 1, '2022-04-19 06:32:08'),
(2126, 'requisition', 'all', 1, '2022-04-19 06:32:10'),
(2127, 'requisition', 'view', 1, '2022-04-19 06:32:14'),
(2128, 'requisition', 'view', 1, '2022-04-19 06:33:56'),
(2129, 'requisition', 'view', 1, '2022-04-19 08:22:11'),
(2130, 'items', 'all', 1, '2022-04-19 08:22:17'),
(2131, 'items', 'all', 1, '2022-04-19 08:33:16'),
(2132, 'items', 'form', 1, '2022-04-19 08:33:18'),
(2133, 'opening_master', 'view', 1, '2022-04-19 09:26:04'),
(2134, 'opening_master', 'all', 1, '2022-04-19 09:26:30'),
(2135, 'categories', 'all', 1, '2022-04-19 09:26:41'),
(2136, 'items', 'all', 1, '2022-04-19 09:26:48'),
(2137, 'fiscal_year', 'all', 1, '2022-04-19 09:26:56'),
(2138, 'fiscal_year', 'form', 1, '2022-04-19 09:27:00'),
(2139, 'fiscal_year', 'form', 1, '2022-04-19 09:27:07'),
(2140, 'fiscal_year', 'all', 1, '2022-04-19 09:27:07'),
(2141, 'location', 'all', 1, '2022-04-19 09:27:18'),
(2142, 'opening_master', 'all', 1, '2022-04-19 09:27:39'),
(2143, 'opening_master', 'form', 1, '2022-04-19 09:27:42'),
(2144, 'opening_master', 'getForm', 1, '2022-04-19 09:27:52'),
(2145, 'opening_master', 'getForm', 1, '2022-04-19 09:28:08'),
(2146, 'opening_master', 'form', 1, '2022-04-19 09:28:23'),
(2147, 'opening_master', 'all', 1, '2022-04-19 09:28:23'),
(2148, 'opening_master', 'form', 1, '2022-04-19 09:28:26'),
(2149, 'opening_master', 'getForm', 1, '2022-04-19 09:28:34'),
(2150, 'opening_master', 'form', 1, '2022-04-19 09:28:44'),
(2151, 'opening_master', 'all', 1, '2022-04-19 09:28:44'),
(2152, 'opening_master', 'view', 1, '2022-04-19 09:28:51'),
(2153, 'opening_master', 'view', 1, '2022-04-19 09:31:32'),
(2154, 'opening_master', 'view', 1, '2022-04-19 09:32:03'),
(2155, 'opening_master', 'view', 1, '2022-04-19 09:32:56'),
(2156, 'opening_master', 'view', 1, '2022-04-19 09:34:27'),
(2157, 'opening_master', 'view', 1, '2022-04-19 09:35:15'),
(2158, 'opening_master', 'view', 1, '2022-04-19 09:35:48'),
(2159, 'opening_master', 'view', 1, '2022-04-19 09:35:54'),
(2160, 'opening_master', 'view', 1, '2022-04-19 09:36:26'),
(2161, 'opening_master', 'view', 1, '2022-04-19 09:36:47'),
(2162, 'dashboard', NULL, 1, '2022-04-19 09:43:40'),
(2163, 'dashboard', NULL, 1, '2022-04-19 09:43:41'),
(2164, 'items', 'form', 1, '2022-04-19 09:46:19'),
(2165, 'items', 'form', 1, '2022-04-19 09:46:25'),
(2166, 'items', 'form', 1, '2022-04-19 09:47:45'),
(2167, 'items', 'all', 1, '2022-04-19 09:47:45'),
(2168, 'items', 'form', 1, '2022-04-19 09:48:33'),
(2169, 'items', 'form', 1, '2022-04-19 09:48:39'),
(2170, 'items', 'form', 1, '2022-04-19 09:48:55'),
(2171, 'opening_master', 'all', 1, '2022-04-19 10:00:39'),
(2172, 'opening_master', 'view', 1, '2022-04-19 10:00:45'),
(2173, 'opening_master', 'view', 1, '2022-04-19 10:01:40'),
(2174, 'opening_master', 'view', 1, '2022-04-19 10:14:28'),
(2175, 'opening_master', 'view', 1, '2022-04-19 10:16:19'),
(2176, 'opening_master', 'view', 1, '2022-04-19 10:16:35'),
(2177, 'opening_master', 'all', 1, '2022-04-19 10:17:04'),
(2178, 'opening_master', 'view', 1, '2022-04-19 10:17:07'),
(2179, 'opening_master', 'view', 1, '2022-04-19 10:17:24'),
(2180, 'opening_master', 'view', 1, '2022-04-19 10:17:57'),
(2181, 'opening_master', 'view', 1, '2022-04-19 10:18:19'),
(2182, 'opening_master', 'view', 1, '2022-04-19 10:18:59'),
(2183, 'opening_master', 'view', 1, '2022-04-19 10:19:01'),
(2184, 'opening_master', 'view', 1, '2022-04-19 10:19:31'),
(2185, 'opening_master', 'view', 1, '2022-04-19 10:19:37'),
(2186, 'opening_master', 'view', 1, '2022-04-19 10:20:44'),
(2187, 'opening_master', 'view', 1, '2022-04-19 10:21:03'),
(2188, 'opening_master', 'view', 1, '2022-04-19 10:22:42'),
(2189, 'opening_master', 'view', 1, '2022-04-19 10:25:04'),
(2190, 'opening_master', 'view', 1, '2022-04-19 10:27:31'),
(2191, 'opening_master', 'view', 1, '2022-04-19 10:29:14'),
(2192, 'opening_master', 'view', 1, '2022-04-19 10:30:38'),
(2193, 'opening_master', 'view', 1, '2022-04-19 10:30:54'),
(2194, 'opening_master', 'view', 1, '2022-04-19 10:31:19'),
(2195, 'opening_master', 'view', 1, '2022-04-19 10:32:25'),
(2196, 'opening_master', 'view', 1, '2022-04-19 10:32:37'),
(2197, 'opening_master', 'view', 1, '2022-04-19 10:33:04'),
(2198, 'opening_master', 'view', 1, '2022-04-19 10:33:33'),
(2199, 'opening_master', 'all', 1, '2022-04-19 10:33:59'),
(2200, 'opening_master', 'view', 1, '2022-04-19 10:34:06'),
(2201, 'opening_master', 'all', 1, '2022-04-19 10:34:16'),
(2202, 'opening_master', 'view', 1, '2022-04-19 10:34:18'),
(2203, 'opening_master', 'view', 1, '2022-04-19 10:36:39'),
(2204, 'opening_master', 'view', 1, '2022-04-19 10:36:46'),
(2205, 'opening_master', 'view', 1, '2022-04-19 10:40:45'),
(2206, 'opening_master', 'view', 1, '2022-04-19 10:41:16'),
(2207, 'opening_master', 'view', 1, '2022-04-19 10:41:39'),
(2208, 'opening_master', 'view', 1, '2022-04-19 10:45:11'),
(2209, 'opening_master', 'view', 1, '2022-04-19 10:45:24'),
(2210, 'opening_master', 'view', 1, '2022-04-19 10:46:14'),
(2211, 'opening_master', 'view', 1, '2022-04-19 10:46:19'),
(2212, 'opening_master', 'view', 1, '2022-04-19 10:46:25'),
(2213, 'opening_master', 'view', 1, '2022-04-19 10:46:50'),
(2214, 'opening_master', 'view', 1, '2022-04-19 10:47:12'),
(2215, 'opening_master', 'view', 1, '2022-04-19 10:47:43'),
(2216, 'opening_master', 'view', 1, '2022-04-19 10:48:23'),
(2217, 'opening_master', 'view', 1, '2022-04-19 10:48:39'),
(2218, 'opening_master', 'view', 1, '2022-04-19 10:49:06'),
(2219, 'opening_master', 'view', 1, '2022-04-19 10:49:10'),
(2220, 'opening_master', 'view', 1, '2022-04-19 10:49:21'),
(2221, 'opening_master', 'view', 1, '2022-04-19 10:49:59'),
(2222, 'opening_master', 'view', 1, '2022-04-19 10:50:18'),
(2223, 'opening_master', 'view', 1, '2022-04-19 10:50:22'),
(2224, 'opening_master', 'all', 1, '2022-04-19 10:51:44'),
(2225, 'opening_master', 'form', 1, '2022-04-19 10:52:29'),
(2226, 'opening_master', 'all', 1, '2022-04-19 10:52:33'),
(2227, 'opening_master', 'view', 1, '2022-04-19 10:52:36'),
(2228, 'opening_master', 'view', 1, '2022-04-19 10:53:46'),
(2229, 'opening_master', 'view', 1, '2022-04-19 10:54:47'),
(2230, 'opening_master', 'view', 1, '2022-04-19 10:55:01'),
(2231, 'items', 'all', 1, '2022-04-19 10:56:27'),
(2232, 'opening_master', 'all', 1, '2022-04-19 10:57:32'),
(2233, 'opening_master', 'view', 1, '2022-04-19 10:57:36'),
(2234, 'opening_master', 'all', 1, '2022-04-19 10:57:47'),
(2235, 'opening_master', 'form', 1, '2022-04-19 10:57:51'),
(2236, 'opening_master', 'form', 1, '2022-04-19 10:58:05'),
(2237, 'opening_master', 'form', 1, '2022-04-19 10:58:09'),
(2238, 'opening_master', 'form', 1, '2022-04-19 11:00:13'),
(2239, 'requisition', 'all', 1, '2022-04-19 11:00:21'),
(2240, 'requisition', 'view', 1, '2022-04-19 11:00:24'),
(2241, 'requisition', 'all', 1, '2022-04-19 11:00:37'),
(2242, 'requisition', 'view', 1, '2022-04-19 11:00:39'),
(2243, 'requisition', 'all', 1, '2022-04-19 11:00:42'),
(2244, 'requisition', 'form', 1, '2022-04-19 11:00:44'),
(2245, 'requisition', 'all', 1, '2022-04-19 11:00:48'),
(2246, 'requisition', 'form', 1, '2022-04-19 11:00:51'),
(2247, 'requisition', 'form', 1, '2022-04-19 11:01:03'),
(2248, 'requisition', 'form', 1, '2022-04-19 11:01:05'),
(2249, 'opening_master', 'view', 1, '2022-04-19 11:02:37'),
(2250, 'requisition', 'form', 1, '2022-04-19 11:02:44'),
(2251, 'requisition', 'form', 1, '2022-04-19 11:02:44'),
(2252, 'requisition', 'form', 1, '2022-04-19 11:02:47'),
(2253, 'requisition', 'all', 1, '2022-04-19 11:02:55'),
(2254, 'requisition', 'form', 1, '2022-04-19 11:02:59'),
(2255, 'requisition', 'form', 1, '2022-04-19 11:03:06'),
(2256, 'requisition', 'form', 1, '2022-04-19 11:04:16'),
(2257, 'requisition', 'form', 1, '2022-04-19 11:04:22'),
(2258, 'requisition', 'all', 1, '2022-04-19 11:05:43'),
(2259, 'requisition', 'form', 1, '2022-04-19 11:05:46'),
(2260, 'requisition', 'getStaffOfDepartment', 1, '2022-04-19 11:05:53'),
(2261, 'requisition', 'getForm', 1, '2022-04-19 11:06:58'),
(2262, 'requisition', 'getForm', 1, '2022-04-19 11:07:02'),
(2263, 'requisition', 'form', 1, '2022-04-19 11:08:13'),
(2264, 'requisition', 'all', 1, '2022-04-19 11:08:13'),
(2265, 'requisition', 'view', 1, '2022-04-19 11:08:20'),
(2266, 'requisition', 'view', 1, '2022-04-19 11:19:37'),
(2267, 'requisition', 'all', 1, '2022-04-19 11:19:53'),
(2268, 'requisition', 'all', 1, '2022-04-19 11:20:37'),
(2269, 'requisition', 'form', 1, '2022-04-19 11:20:40'),
(2270, 'requisition', 'form', 1, '2022-04-19 11:20:45'),
(2271, 'requisition', 'form', 1, '2022-04-19 11:22:18'),
(2272, 'requisition', 'form', 1, '2022-04-19 11:22:28'),
(2273, 'requisition', 'form', 1, '2022-04-19 11:23:33'),
(2274, 'requisition', 'form', 1, '2022-04-19 11:32:50'),
(2275, 'requisition', 'all', 1, '2022-04-19 11:32:57'),
(2276, 'requisition', 'view', 1, '2022-04-19 11:33:00'),
(2277, 'dashboard', NULL, 1, '2022-04-20 06:04:53'),
(2278, 'requisition', 'all', 1, '2022-04-20 06:09:05'),
(2279, 'requisition', 'view', 1, '2022-04-20 06:09:07'),
(2280, 'requisition', 'view', 1, '2022-04-20 06:11:55'),
(2281, 'requisition', 'view', 1, '2022-04-20 06:12:53'),
(2282, 'requisition', 'view', 1, '2022-04-20 06:13:23'),
(2283, 'requisition', 'view', 1, '2022-04-20 06:14:16'),
(2284, 'requisition', 'view', 1, '2022-04-20 06:15:35'),
(2285, 'requisition', 'view', 1, '2022-04-20 06:20:58'),
(2286, 'requisition', 'view', 1, '2022-04-20 06:21:31'),
(2287, 'requisition', 'view', 1, '2022-04-20 06:22:28'),
(2288, 'requisition', 'view', 1, '2022-04-20 06:22:58'),
(2289, 'requisition', 'view', 1, '2022-04-20 06:23:03'),
(2290, 'requisition', 'view', 1, '2022-04-20 06:23:27'),
(2291, 'requisition', 'view', 1, '2022-04-20 06:23:42'),
(2292, 'requisition', 'view', 1, '2022-04-20 06:24:36'),
(2293, 'requisition', 'view', 1, '2022-04-20 06:25:19'),
(2294, 'requisition', 'view', 1, '2022-04-20 06:25:22'),
(2295, 'requisition', 'view', 1, '2022-04-20 06:25:47'),
(2296, 'requisition', 'view', 1, '2022-04-20 06:25:56'),
(2297, 'requisition', 'view', 1, '2022-04-20 06:26:21'),
(2298, 'requisition', 'view', 1, '2022-04-20 06:26:52'),
(2299, 'requisition', 'view', 1, '2022-04-20 06:30:14'),
(2300, 'requisition', 'view', 1, '2022-04-20 06:30:14'),
(2301, 'requisition', 'view', 1, '2022-04-20 06:30:29'),
(2302, 'requisition', 'view', 1, '2022-04-20 06:31:29'),
(2303, 'requisition', 'view', 1, '2022-04-20 06:32:41'),
(2304, 'requisition', 'view', 1, '2022-04-20 06:33:15'),
(2305, 'requisition', 'view', 1, '2022-04-20 06:33:50'),
(2306, 'requisition', 'view', 1, '2022-04-20 06:34:42'),
(2307, 'requisition', 'all', 1, '2022-04-20 06:41:35'),
(2308, 'requisition', 'form', 1, '2022-04-20 06:41:42'),
(2309, 'requisition', 'form', 1, '2022-04-20 06:41:46'),
(2310, 'requisition', 'form', 1, '2022-04-20 06:41:58'),
(2311, 'requisition', 'all', 1, '2022-04-20 06:41:58'),
(2312, 'requisition', 'all', 1, '2022-04-20 06:43:08'),
(2313, 'requisition', 'form', 1, '2022-04-20 06:43:16'),
(2314, 'requisition', 'form', 1, '2022-04-20 06:43:20'),
(2315, 'requisition', 'form', 1, '2022-04-20 06:43:26'),
(2316, 'requisition', 'form', 1, '2022-04-20 06:43:26'),
(2317, 'dashboard', NULL, 3, '2022-04-20 09:21:15'),
(2318, 'opening_master', 'all', 3, '2022-04-20 09:21:26'),
(2319, 'opening_master', 'view', 3, '2022-04-20 09:21:32'),
(2320, 'requisition', 'all', 3, '2022-04-20 09:21:50'),
(2321, 'issue', 'all', 3, '2022-04-20 09:22:05'),
(2322, 'issue', 'form', 3, '2022-04-20 09:22:12'),
(2323, 'requisition', 'all', 3, '2022-04-20 09:22:23'),
(2324, 'requisition', 'all', 3, '2022-04-20 09:24:55'),
(2325, 'site_settings', NULL, 3, '2022-04-20 09:25:10'),
(2326, 'site_settings', NULL, 3, '2022-04-20 09:25:32'),
(2327, 'site_settings', NULL, 3, '2022-04-20 09:25:32'),
(2328, 'opening_master', 'all', 3, '2022-04-20 09:25:42'),
(2329, 'requisition', 'all', 3, '2022-04-20 09:26:13'),
(2330, 'requisition', 'form', 3, '2022-04-20 09:26:16'),
(2331, 'requisition', 'getStaffOfDepartment', 3, '2022-04-20 09:26:23'),
(2332, 'requisition', 'getForm', 3, '2022-04-20 09:26:31'),
(2333, 'requisition', 'getForm', 3, '2022-04-20 09:26:41'),
(2334, 'requisition', 'form', 3, '2022-04-20 09:26:49'),
(2335, 'requisition', 'all', 3, '2022-04-20 09:26:49'),
(2336, 'requisition', 'form', 3, '2022-04-20 09:26:53'),
(2337, 'requisition', 'all', 3, '2022-04-20 09:26:57'),
(2338, 'requisition', 'form', 3, '2022-04-20 09:26:59'),
(2339, 'requisition', 'getStaffOfDepartment', 3, '2022-04-20 09:27:06'),
(2340, 'requisition', 'getStaffOfDepartment', 3, '2022-04-20 09:27:08'),
(2341, 'requisition', 'getForm', 3, '2022-04-20 09:27:15'),
(2342, 'requisition', 'form', 3, '2022-04-20 09:27:44'),
(2343, 'requisition', 'all', 3, '2022-04-20 09:27:44'),
(2344, 'issue', 'all', 3, '2022-04-20 09:28:00'),
(2345, 'issue', 'form', 3, '2022-04-20 09:28:02'),
(2346, 'issue', 'form', 3, '2022-04-20 09:28:21'),
(2347, 'issue', 'form', 3, '2022-04-20 09:28:27'),
(2348, 'issue', 'add', 3, '2022-04-20 09:28:27'),
(2349, 'issue', 'add', 3, '2022-04-20 09:32:00'),
(2350, 'issue', 'all', 3, '2022-04-20 09:32:01'),
(2351, 'issue', 'view', 3, '2022-04-20 09:32:04'),
(2352, 'issue', 'form', 3, '2022-04-20 09:32:29'),
(2353, 'issue', 'form', 3, '2022-04-20 09:32:32'),
(2354, 'issue', 'direct_add', 3, '2022-04-20 09:32:32'),
(2355, 'requisition', 'getStaffOfDepartment', 3, '2022-04-20 09:32:41'),
(2356, 'issue', 'getForm', 3, '2022-04-20 09:32:44'),
(2357, 'issue', 'getForm', 3, '2022-04-20 09:32:52'),
(2358, 'issue', 'getForm', 3, '2022-04-20 09:33:01'),
(2359, 'issue', 'direct_add', 3, '2022-04-20 09:34:25'),
(2360, 'issue', 'all', 3, '2022-04-20 09:34:25'),
(2361, 'issue', 'direct_view', 3, '2022-04-20 09:34:28'),
(2362, 'issue', 'direct_add', 3, '2022-04-20 09:34:38'),
(2363, 'issue', 'edit', 3, '2022-04-20 09:34:55'),
(2364, 'issue', 'getAllStock', 3, '2022-04-20 09:37:06'),
(2365, 'items', 'all', 3, '2022-04-20 09:38:23'),
(2366, 'issue', 'edit', 3, '2022-04-20 09:46:22'),
(2367, 'issue', 'edit', 3, '2022-04-20 09:55:11'),
(2368, 'issue', 'edit', 3, '2022-04-20 09:56:42'),
(2369, 'issue', 'edit', 3, '2022-04-20 09:58:23'),
(2370, 'issue', 'getAllStock', 3, '2022-04-20 09:58:55'),
(2371, 'issue', 'edit', 3, '2022-04-20 10:00:32'),
(2372, 'issue', 'edit', 3, '2022-04-20 10:02:23'),
(2373, 'issue', 'getAllStock', 3, '2022-04-20 10:03:10'),
(2374, 'issue', 'getAllStock', 3, '2022-04-20 10:03:16'),
(2375, 'issue', 'getAllStock', 3, '2022-04-20 10:03:31'),
(2376, 'issue', 'edit', 3, '2022-04-20 10:05:36'),
(2377, 'issue', 'getAllStock', 3, '2022-04-20 10:05:46'),
(2378, 'issue', 'getAllStock', 3, '2022-04-20 10:05:51'),
(2379, 'issue', 'getAllStock', 3, '2022-04-20 10:05:55'),
(2380, 'issue', 'edit', 3, '2022-04-20 10:06:29'),
(2381, 'issue', 'edit', 3, '2022-04-20 10:07:32'),
(2382, 'issue', 'getAllStock', 3, '2022-04-20 10:07:39'),
(2383, 'issue', 'edit', 3, '2022-04-20 10:07:54'),
(2384, 'issue', 'all', 3, '2022-04-20 10:07:55'),
(2385, 'issue', 'edit', 3, '2022-04-20 10:08:00'),
(2386, 'issue', 'edit', 3, '2022-04-20 10:08:09'),
(2387, 'issue', 'edit', 3, '2022-04-20 10:08:26'),
(2388, 'issue', 'getAllStock', 3, '2022-04-20 10:08:35'),
(2389, 'issue', 'edit', 3, '2022-04-20 10:08:43'),
(2390, 'issue', 'all', 3, '2022-04-20 10:08:43'),
(2391, 'issue', 'edit', 3, '2022-04-20 10:08:47'),
(2392, 'issue', 'getAllStock', 3, '2022-04-20 10:14:11'),
(2393, 'issue', 'getAllStock', 3, '2022-04-20 10:14:36'),
(2394, 'issue', 'edit', 3, '2022-04-20 10:20:26'),
(2395, 'issue', 'edit', 3, '2022-04-20 10:21:04'),
(2396, 'issue', 'edit', 3, '2022-04-20 10:22:22'),
(2397, 'issue', 'edit', 3, '2022-04-20 10:23:38'),
(2398, 'issue', 'edit', 3, '2022-04-20 10:30:09'),
(2399, 'issue', 'edit', 3, '2022-04-20 10:30:49'),
(2400, 'issue', 'edit', 3, '2022-04-20 10:31:04'),
(2401, 'issue', 'edit', 3, '2022-04-20 10:31:29'),
(2402, 'issue', 'getAllStock', 3, '2022-04-20 10:32:08'),
(2403, 'issue', 'getAllStock', 3, '2022-04-20 10:33:39'),
(2404, 'issue', 'edit', 3, '2022-04-20 10:33:42'),
(2405, 'issue', 'getAllStock', 3, '2022-04-20 10:34:30'),
(2406, 'issue', 'getAllStock', 3, '2022-04-20 10:48:37'),
(2407, 'issue', 'getAllStock', 3, '2022-04-20 10:48:50'),
(2408, 'issue', 'edit', 3, '2022-04-20 10:48:54'),
(2409, 'issue', 'getAllStock', 3, '2022-04-20 10:49:03'),
(2410, 'issue', 'getAllStock', 3, '2022-04-20 10:49:10'),
(2411, 'issue', 'getAllStock', 3, '2022-04-20 10:49:34'),
(2412, 'issue', 'edit', 3, '2022-04-20 10:51:17'),
(2413, 'issue', 'edit', 3, '2022-04-20 10:51:43'),
(2414, 'issue', 'getAllStock', 3, '2022-04-20 10:51:51'),
(2415, 'issue', 'getAllStock', 3, '2022-04-20 10:51:57'),
(2416, 'issue', 'all', 3, '2022-04-20 10:55:33'),
(2417, 'issue', 'form', 3, '2022-04-20 10:55:36'),
(2418, 'issue', 'all', 3, '2022-04-20 10:55:58'),
(2419, 'issue', 'form', 3, '2022-04-20 10:56:09'),
(2420, 'issue', 'form', 3, '2022-04-20 10:56:15'),
(2421, 'issue', 'add', 3, '2022-04-20 10:56:15'),
(2422, 'issue', 'edit', 3, '2022-04-20 10:56:22'),
(2423, 'issue', 'add', 3, '2022-04-20 11:13:44'),
(2424, 'issue', 'getAllStock', 3, '2022-04-20 11:14:31'),
(2425, 'issue', 'getAllStock', 3, '2022-04-20 11:14:47'),
(2426, 'issue', 'getAllStock', 3, '2022-04-20 11:15:14'),
(2427, 'issue', 'add', 3, '2022-04-20 11:15:28'),
(2428, 'issue', 'getAllStock', 3, '2022-04-20 11:15:45'),
(2429, 'issue', 'getAllStock', 3, '2022-04-20 11:16:07'),
(2430, 'issue', 'add', 3, '2022-04-20 11:16:45'),
(2431, 'issue', 'all', 3, '2022-04-20 11:16:45'),
(2432, 'issue', 'edit', 3, '2022-04-20 11:16:53'),
(2433, 'issue', 'direct_add', 3, '2022-04-20 11:17:09'),
(2434, 'issue', 'direct_add', 3, '2022-04-20 11:18:54'),
(2435, 'issue', 'direct_add', 3, '2022-04-20 11:19:02'),
(2436, 'issue', 'direct_add', 3, '2022-04-20 11:28:27'),
(2437, 'issue', 'direct_add', 3, '2022-04-20 11:30:25'),
(2438, 'issue', 'direct_add', 3, '2022-04-20 11:30:45'),
(2439, 'issue', 'direct_add', 3, '2022-04-20 11:31:53'),
(2440, 'issue', 'getAllStock', 3, '2022-04-20 11:31:59'),
(2441, 'issue', 'getAllStock', 3, '2022-04-20 11:32:13'),
(2442, 'issue', 'direct_add', 3, '2022-04-20 11:33:20'),
(2443, 'issue', 'getAllStock', 3, '2022-04-20 11:33:25'),
(2444, 'issue', 'getAllStock', 3, '2022-04-20 11:33:37'),
(2445, 'issue', 'direct_add', 3, '2022-04-20 11:34:25'),
(2446, 'issue', 'direct_add', 3, '2022-04-20 11:37:16'),
(2447, 'issue', 'getAllStock', 3, '2022-04-20 11:37:22'),
(2448, 'issue', 'getAllStock', 3, '2022-04-20 11:37:29'),
(2449, 'issue', 'direct_add', 3, '2022-04-20 11:41:04'),
(2450, 'issue', 'direct_add', 3, '2022-04-20 11:41:42'),
(2451, 'issue', 'getAllStock', 3, '2022-04-20 11:41:58'),
(2452, 'issue', 'direct_add', 3, '2022-04-20 11:42:15'),
(2453, 'issue', 'all', 3, '2022-04-20 11:42:23'),
(2454, 'issue', 'direct_add', 3, '2022-04-20 11:42:40'),
(2455, 'issue', 'getAllStock', 3, '2022-04-20 11:42:55'),
(2456, 'issue', 'getAllStock', 3, '2022-04-20 11:43:04'),
(2457, 'requisition', 'getStaffOfDepartment', 3, '2022-04-20 11:43:07'),
(2458, 'issue', 'getForm', 3, '2022-04-20 11:43:10'),
(2459, 'issue', 'direct_add', 3, '2022-04-20 11:47:27'),
(2460, 'issue', 'getAllStock', 3, '2022-04-20 11:47:46'),
(2461, 'issue', 'getAllStock', 3, '2022-04-20 11:47:52'),
(2462, 'issue', 'direct_add', 3, '2022-04-20 11:48:18'),
(2463, 'issue', 'getForm', 3, '2022-04-20 11:48:23'),
(2464, 'issue', 'direct_add', 3, '2022-04-20 11:53:45'),
(2465, 'issue', 'direct_add', 3, '2022-04-20 11:57:15'),
(2466, 'issue', 'getForm', 3, '2022-04-20 11:57:20'),
(2467, 'issue', 'getForm', 3, '2022-04-20 11:57:31'),
(2468, 'issue', 'getForm', 3, '2022-04-20 11:57:34'),
(2469, 'issue', 'direct_add', 3, '2022-04-20 11:58:51'),
(2470, 'issue', 'getForm', 3, '2022-04-20 11:58:58'),
(2471, 'issue', 'getAllStock', 3, '2022-04-20 11:59:20'),
(2472, 'issue', 'getAllStock', 3, '2022-04-20 11:59:27'),
(2473, 'issue', 'getForm', 3, '2022-04-20 11:59:32'),
(2474, 'issue', 'getForm', 3, '2022-04-20 11:59:35'),
(2475, 'issue', 'direct_add', 3, '2022-04-20 11:59:39'),
(2476, 'issue', 'getForm', 3, '2022-04-20 11:59:46'),
(2477, 'issue', 'getAllStock', 3, '2022-04-20 11:59:51'),
(2478, 'dashboard', NULL, 3, '2022-04-22 06:21:10'),
(2479, 'mrn', 'all', 3, '2022-04-22 06:21:15'),
(2480, 'mrn', 'all', 3, '2022-04-22 06:24:36'),
(2481, 'mrn', 'form', 3, '2022-04-22 06:24:38'),
(2482, 'mrn', 'getForm', 3, '2022-04-22 06:25:02'),
(2483, 'dashboard', NULL, 3, '2022-04-22 08:38:48'),
(2484, 'opening_master', 'all', 3, '2022-04-22 08:38:57'),
(2485, 'opening_master', 'view', 3, '2022-04-22 08:38:59'),
(2486, 'opening_master', 'view', 3, '2022-04-22 08:39:39'),
(2487, 'issue', 'all', 3, '2022-04-22 08:39:45'),
(2488, 'issue', 'edit', 3, '2022-04-22 08:39:50'),
(2489, 'issue', 'getAllStock', 3, '2022-04-22 08:40:05'),
(2490, 'issue', 'all', 3, '2022-04-22 08:41:56'),
(2491, 'issue', 'direct_add', 3, '2022-04-22 08:41:59'),
(2492, 'issue', 'getAllStock', 3, '2022-04-22 08:42:14'),
(2493, 'issue', 'direct_add', 3, '2022-04-22 08:42:22'),
(2494, 'issue', 'direct_add', 3, '2022-04-22 08:42:51'),
(2495, 'opening_master', 'all', 3, '2022-04-22 08:42:55'),
(2496, 'opening_master', 'view', 3, '2022-04-22 08:42:58'),
(2497, 'opening_master', 'view', 3, '2022-04-22 08:42:59'),
(2498, 'opening_master', 'form', 3, '2022-04-22 08:43:24'),
(2499, 'opening_master', 'all', 3, '2022-04-22 08:43:27'),
(2500, 'requisition', 'all', 3, '2022-04-22 08:46:22'),
(2501, 'requisition', 'view', 3, '2022-04-22 08:46:31'),
(2502, 'issue', 'all', 3, '2022-04-22 08:46:54'),
(2503, 'issue', 'view', 3, '2022-04-22 08:46:57'),
(2504, 'issue', 'direct_view', 3, '2022-04-22 08:46:58'),
(2505, 'requisition', 'form', 3, '2022-04-22 08:48:17'),
(2506, 'requisition', 'all', 3, '2022-04-22 08:48:26'),
(2507, 'requisition', 'view', 3, '2022-04-22 08:48:28'),
(2508, 'mrn', 'all', 3, '2022-04-22 08:49:47'),
(2509, 'opening_master', 'form', 3, '2022-04-22 08:51:52'),
(2510, 'opening_master', 'getForm', 3, '2022-04-22 08:52:00'),
(2511, 'opening_master', 'form', 3, '2022-04-22 08:52:08'),
(2512, 'opening_master', 'all', 3, '2022-04-22 08:52:08'),
(2513, 'opening_master', 'view', 3, '2022-04-22 08:52:11'),
(2514, 'opening_master', 'all', 3, '2022-04-22 08:52:19'),
(2515, 'mrn', 'all', 3, '2022-04-22 08:53:05'),
(2516, 'mrn', 'form', 3, '2022-04-22 08:53:07'),
(2517, 'mrn', 'form', 3, '2022-04-22 08:55:01'),
(2518, 'mrn', 'getForm', 3, '2022-04-22 08:55:13'),
(2519, 'mrn', 'getForm', 3, '2022-04-22 08:55:22'),
(2520, 'mrn', 'getForm', 3, '2022-04-22 08:55:26'),
(2521, 'mrn', 'form', 3, '2022-04-22 08:56:00'),
(2522, 'mrn', 'all', 3, '2022-04-22 08:56:00'),
(2523, 'mrn', 'view', 3, '2022-04-22 08:56:08'),
(2524, 'mrn', 'all', 3, '2022-04-22 08:56:11'),
(2525, 'opening_master', 'all', 3, '2022-04-22 08:56:41'),
(2526, 'opening_master', 'view', 3, '2022-04-22 08:56:43'),
(2527, 'requisition', 'all', 3, '2022-04-22 08:56:47'),
(2528, 'requisition', 'view', 3, '2022-04-22 08:56:51'),
(2529, 'issue', 'all', 3, '2022-04-22 08:56:58'),
(2530, 'issue', 'view', 3, '2022-04-22 08:57:23'),
(2531, 'issue', 'direct_view', 3, '2022-04-22 08:57:24'),
(2532, 'opening_master', 'view', 3, '2022-04-22 10:40:58'),
(2533, 'opening_master', 'view', 3, '2022-04-22 10:41:02'),
(2534, 'opening_master', 'view', 3, '2022-04-22 10:45:27'),
(2535, 'opening_master', 'view', 3, '2022-04-22 10:46:03'),
(2536, 'opening_master', 'view', 3, '2022-04-22 10:46:36'),
(2537, 'opening_master', 'view', 3, '2022-04-22 10:48:27'),
(2538, 'opening_master', 'view', 3, '2022-04-22 10:49:05'),
(2539, 'opening_master', 'view', 3, '2022-04-22 10:50:13'),
(2540, 'opening_master', 'view', 3, '2022-04-22 10:50:32'),
(2541, 'opening_master', 'view', 3, '2022-04-22 11:02:19'),
(2542, 'opening_master', 'change_status', 3, '2022-04-22 11:02:24'),
(2543, 'opening_master', 'view', 3, '2022-04-22 11:02:24'),
(2544, 'opening_master', 'all', 3, '2022-04-22 11:02:34'),
(2545, 'opening_master', 'view', 3, '2022-04-22 11:02:40'),
(2546, 'opening_master', 'change_status', 3, '2022-04-22 11:02:42'),
(2547, 'opening_master', 'view', 3, '2022-04-22 11:02:42'),
(2548, 'requisition', 'view', 3, '2022-04-22 11:04:40'),
(2549, 'opening_master', 'change_status', 3, '2022-04-22 11:04:46'),
(2550, 'opening_master', 'change_status', 3, '2022-04-22 11:04:47'),
(2551, 'opening_master', 'change_status', 3, '2022-04-22 11:04:55'),
(2552, 'requisition', 'view', 3, '2022-04-22 11:05:43'),
(2553, 'requisition', 'view', 3, '2022-04-22 11:06:49'),
(2554, 'opening_master', 'change_status', 3, '2022-04-22 11:06:55'),
(2555, 'requisition', 'view', 3, '2022-04-22 11:07:26'),
(2556, 'requisition', 'view', 3, '2022-04-22 11:12:32'),
(2557, 'opening_master', 'change_status', 3, '2022-04-22 11:12:42'),
(2558, 'requisition', 'view', 3, '2022-04-22 11:12:42'),
(2559, 'issue', 'direct_view', 3, '2022-04-22 11:16:04'),
(2560, 'opening_master', 'change_status', 3, '2022-04-22 11:16:18'),
(2561, 'issue', 'direct_view', 3, '2022-04-22 11:16:18'),
(2562, 'issue', 'view', 3, '2022-04-22 11:16:51'),
(2563, 'issue', 'view', 3, '2022-04-22 11:17:16'),
(2564, 'opening_master', 'change_status', 3, '2022-04-22 11:17:19'),
(2565, 'issue', 'view', 3, '2022-04-22 11:17:19'),
(2566, 'issue', 'edit', 3, '2022-04-22 11:17:19'),
(2567, 'issue', 'edit', 3, '2022-04-22 11:17:19'),
(2568, 'issue', 'edit', 3, '2022-04-22 11:17:19'),
(2569, 'issue', 'edit', 3, '2022-04-22 11:17:19'),
(2570, 'issue', 'edit', 3, '2022-04-22 11:17:19'),
(2571, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2572, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2573, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2574, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2575, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2576, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2577, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2578, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2579, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2580, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2581, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2582, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2583, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2584, 'issue', 'edit', 3, '2022-04-22 11:17:20'),
(2585, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2586, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2587, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2588, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2589, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2590, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2591, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2592, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2593, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2594, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2595, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2596, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2597, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2598, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2599, 'issue', 'edit', 3, '2022-04-22 11:17:22'),
(2600, 'issue', 'edit', 3, '2022-04-22 11:17:23'),
(2601, 'issue', 'edit', 3, '2022-04-22 11:17:23'),
(2602, 'issue', 'edit', 3, '2022-04-22 11:17:23'),
(2603, 'issue', 'edit', 3, '2022-04-22 11:17:23'),
(2604, 'issue', 'edit', 3, '2022-04-22 11:17:23'),
(2605, 'issue', 'edit', 3, '2022-04-22 11:17:26'),
(2606, 'issue', 'edit', 3, '2022-04-22 11:17:26'),
(2607, 'issue', 'edit', 3, '2022-04-22 11:17:26'),
(2608, 'issue', 'edit', 3, '2022-04-22 11:17:26'),
(2609, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2610, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2611, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2612, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2613, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2614, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2615, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2616, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2617, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2618, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2619, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2620, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2621, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2622, 'issue', 'edit', 3, '2022-04-22 11:17:27'),
(2623, 'issue', 'edit', 3, '2022-04-22 11:17:28'),
(2624, 'issue', 'edit', 3, '2022-04-22 11:17:28'),
(2625, 'issue', 'edit', 3, '2022-04-22 11:17:30'),
(2626, 'issue', 'edit', 3, '2022-04-22 11:17:30'),
(2627, 'issue', 'edit', 3, '2022-04-22 11:17:30'),
(2628, 'issue', 'edit', 3, '2022-04-22 11:17:30'),
(2629, 'issue', 'edit', 3, '2022-04-22 11:17:30'),
(2630, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2631, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2632, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2633, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2634, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2635, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2636, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2637, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2638, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2639, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2640, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2641, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2642, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2643, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2644, 'issue', 'edit', 3, '2022-04-22 11:17:31'),
(2645, 'issue', 'all', 3, '2022-04-22 11:17:36'),
(2646, 'opening_master', 'all', 3, '2022-04-22 11:17:58'),
(2647, 'issue', 'all', 3, '2022-04-22 11:18:15'),
(2648, 'issue', 'all', 3, '2022-04-22 11:18:16'),
(2649, 'issue', 'all', 3, '2022-04-22 11:18:16'),
(2650, 'issue', 'all', 3, '2022-04-22 11:19:52'),
(2651, 'issue', 'view', 3, '2022-04-22 11:19:57'),
(2652, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2653, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2654, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2655, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2656, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2657, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2658, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2659, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2660, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2661, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2662, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2663, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2664, 'issue', 'edit', 3, '2022-04-22 11:19:57'),
(2665, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2666, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2667, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2668, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2669, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2670, 'issue', 'edit', 3, '2022-04-22 11:19:58'),
(2671, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2672, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2673, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2674, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2675, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2676, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2677, 'issue', 'edit', 3, '2022-04-22 11:19:59'),
(2678, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2679, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2680, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2681, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2682, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2683, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2684, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2685, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2686, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2687, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2688, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2689, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2690, 'issue', 'edit', 3, '2022-04-22 11:20:00'),
(2691, 'issue', 'all', 3, '2022-04-22 11:20:04'),
(2692, 'issue', 'view', 3, '2022-04-22 11:20:12'),
(2693, 'issue', 'edit', 3, '2022-04-22 11:20:12'),
(2694, 'issue', 'edit', 3, '2022-04-22 11:20:12'),
(2695, 'issue', 'edit', 3, '2022-04-22 11:20:12'),
(2696, 'issue', 'edit', 3, '2022-04-22 11:20:12'),
(2697, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2698, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2699, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2700, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2701, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2702, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2703, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2704, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2705, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2706, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2707, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2708, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2709, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2710, 'issue', 'edit', 3, '2022-04-22 11:20:13'),
(2711, 'issue', 'edit', 3, '2022-04-22 11:20:14'),
(2712, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2713, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2714, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2715, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2716, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2717, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2718, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2719, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2720, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2721, 'issue', 'edit', 3, '2022-04-22 11:20:15'),
(2722, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2723, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2724, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2725, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2726, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2727, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2728, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2729, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2730, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2731, 'issue', 'edit', 3, '2022-04-22 11:20:16'),
(2732, 'issue', 'all', 3, '2022-04-22 11:20:18'),
(2733, 'issue', 'all', 3, '2022-04-22 11:21:29'),
(2734, 'issue', 'view', 3, '2022-04-22 11:21:36'),
(2735, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2736, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2737, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2738, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2739, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2740, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2741, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2742, 'issue', 'edit', 3, '2022-04-22 11:21:36'),
(2743, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2744, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2745, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2746, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2747, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2748, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2749, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2750, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2751, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2752, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2753, 'issue', 'edit', 3, '2022-04-22 11:21:37'),
(2754, 'issue', 'edit', 3, '2022-04-22 11:21:38'),
(2755, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2756, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2757, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2758, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2759, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2760, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2761, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2762, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2763, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2764, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2765, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2766, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2767, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2768, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2769, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2770, 'issue', 'edit', 3, '2022-04-22 11:21:39'),
(2771, 'issue', 'edit', 3, '2022-04-22 11:21:40'),
(2772, 'issue', 'edit', 3, '2022-04-22 11:21:40'),
(2773, 'issue', 'edit', 3, '2022-04-22 11:21:40'),
(2774, 'issue', 'all', 3, '2022-04-22 11:21:42'),
(2775, 'issue', 'direct_view', 3, '2022-04-22 11:21:51'),
(2776, 'issue', 'all', 3, '2022-04-22 11:21:55'),
(2777, 'issue', 'all', 3, '2022-04-22 11:22:22'),
(2778, 'issue', 'view', 3, '2022-04-22 11:22:24'),
(2779, 'opening_master', 'change_status', 3, '2022-04-22 11:22:30'),
(2780, 'issue', 'view', 3, '2022-04-22 11:22:30'),
(2781, 'opening_master', 'view', 3, '2022-04-22 11:33:26'),
(2782, 'opening_master', 'view', 3, '2022-04-22 11:34:25'),
(2783, 'opening_master', 'change_status', 3, '2022-04-22 11:34:27'),
(2784, 'opening_master', 'view', 3, '2022-04-22 11:34:27'),
(2785, 'opening_master', 'change_status', 3, '2022-04-22 11:34:30'),
(2786, 'opening_master', 'view', 3, '2022-04-22 11:34:30'),
(2787, 'opening_master', 'view', 3, '2022-04-22 11:34:35'),
(2788, 'opening_master', 'change_status', 3, '2022-04-22 11:34:37'),
(2789, 'opening_master', 'view', 3, '2022-04-22 11:35:16'),
(2790, 'opening_master', 'change_status', 3, '2022-04-22 11:35:18'),
(2791, 'opening_master', 'change_status', 3, '2022-04-22 11:35:24'),
(2792, 'opening_master', 'view', 3, '2022-04-22 11:35:50'),
(2793, 'opening_master', 'change_status', 3, '2022-04-22 11:35:52'),
(2794, 'opening_master', 'view', 3, '2022-04-22 11:36:42'),
(2795, 'opening_master', 'change_status', 3, '2022-04-22 11:36:46'),
(2796, 'opening_master', 'view', 3, '2022-04-22 11:37:13'),
(2797, 'opening_master', 'view', 3, '2022-04-22 11:38:04'),
(2798, 'opening_master', 'change_status', 3, '2022-04-22 11:38:07'),
(2799, 'opening_master', 'view', 3, '2022-04-22 11:38:07'),
(2800, 'opening_master', 'view', 3, '2022-04-22 11:38:18'),
(2801, 'opening_master', 'change_status', 3, '2022-04-22 11:38:20'),
(2802, 'opening_master', 'view', 3, '2022-04-22 11:38:20'),
(2803, 'opening_master', 'view', 3, '2022-04-22 11:38:26'),
(2804, 'opening_master', 'change_status', 3, '2022-04-22 11:38:28'),
(2805, 'opening_master', 'change_status', 3, '2022-04-22 11:38:30'),
(2806, 'opening_master', 'change_status', 3, '2022-04-22 11:38:31'),
(2807, 'opening_master', 'view', 3, '2022-04-22 11:41:33'),
(2808, 'opening_master', 'change_status', 3, '2022-04-22 11:41:35'),
(2809, 'opening_master', 'view', 3, '2022-04-22 11:41:35'),
(2810, 'opening_master', 'view', 3, '2022-04-22 11:42:39'),
(2811, 'opening_master', 'change_status', 3, '2022-04-22 11:42:41'),
(2812, 'opening_master', 'view', 3, '2022-04-22 11:42:41'),
(2813, 'dashboard', NULL, 3, '2022-04-25 05:18:46'),
(2814, 'opening_master', 'all', 3, '2022-04-25 05:19:25'),
(2815, 'opening_master', 'view', 3, '2022-04-25 05:19:30'),
(2816, 'opening_master', 'change_status', 3, '2022-04-25 05:19:35'),
(2817, 'opening_master', 'view', 3, '2022-04-25 05:19:36'),
(2818, 'opening_master', 'change_status', 3, '2022-04-25 05:19:38'),
(2819, 'opening_master', 'view', 3, '2022-04-25 05:19:38'),
(2820, 'opening_master', 'change_status', 3, '2022-04-25 05:19:39'),
(2821, 'opening_master', 'view', 3, '2022-04-25 05:19:39'),
(2822, 'opening_master', 'change_status', 3, '2022-04-25 05:19:40'),
(2823, 'opening_master', 'view', 3, '2022-04-25 05:19:40'),
(2824, 'opening_master', 'change_status', 3, '2022-04-25 05:19:41'),
(2825, 'opening_master', 'view', 3, '2022-04-25 05:19:41'),
(2826, 'opening_master', 'change_status', 3, '2022-04-25 05:19:49'),
(2827, 'opening_master', 'view', 3, '2022-04-25 05:19:49'),
(2828, 'opening_master', 'change_status', 3, '2022-04-25 05:19:53'),
(2829, 'opening_master', 'view', 3, '2022-04-25 05:19:53'),
(2830, 'opening_master', 'change_status', 3, '2022-04-25 05:19:55'),
(2831, 'opening_master', 'view', 3, '2022-04-25 05:19:56'),
(2832, 'opening_master', 'change_status', 3, '2022-04-25 05:19:57'),
(2833, 'opening_master', 'view', 3, '2022-04-25 05:19:57'),
(2834, 'opening_master', 'change_status', 3, '2022-04-25 05:20:03'),
(2835, 'opening_master', 'view', 3, '2022-04-25 05:20:03'),
(2836, 'opening_master', 'change_status', 3, '2022-04-25 05:20:04'),
(2837, 'opening_master', 'view', 3, '2022-04-25 05:20:04'),
(2838, 'opening_master', 'change_status', 3, '2022-04-25 05:20:05'),
(2839, 'opening_master', 'view', 3, '2022-04-25 05:20:05'),
(2840, 'opening_master', 'change_status', 3, '2022-04-25 05:20:06'),
(2841, 'opening_master', 'view', 3, '2022-04-25 05:20:06'),
(2842, 'opening_master', 'change_status', 3, '2022-04-25 05:20:06'),
(2843, 'opening_master', 'view', 3, '2022-04-25 05:20:07'),
(2844, 'opening_master', 'change_status', 3, '2022-04-25 05:20:07'),
(2845, 'opening_master', 'view', 3, '2022-04-25 05:20:07'),
(2846, 'opening_master', 'change_status', 3, '2022-04-25 05:20:07'),
(2847, 'opening_master', 'view', 3, '2022-04-25 05:20:07'),
(2848, 'opening_master', 'change_status', 3, '2022-04-25 05:20:08'),
(2849, 'opening_master', 'view', 3, '2022-04-25 05:20:08'),
(2850, 'opening_master', 'change_status', 3, '2022-04-25 05:20:11'),
(2851, 'opening_master', 'view', 3, '2022-04-25 05:20:11'),
(2852, 'opening_master', 'change_status', 3, '2022-04-25 05:20:13'),
(2853, 'opening_master', 'view', 3, '2022-04-25 05:20:14'),
(2854, 'opening_master', 'change_status', 3, '2022-04-25 05:20:15'),
(2855, 'opening_master', 'view', 3, '2022-04-25 05:20:15'),
(2856, 'opening_master', 'change_status', 3, '2022-04-25 05:20:15'),
(2857, 'opening_master', 'view', 3, '2022-04-25 05:20:15'),
(2858, 'opening_master', 'change_status', 3, '2022-04-25 05:20:16'),
(2859, 'opening_master', 'view', 3, '2022-04-25 05:20:16'),
(2860, 'opening_master', 'change_status', 3, '2022-04-25 05:20:16'),
(2861, 'opening_master', 'view', 3, '2022-04-25 05:20:17'),
(2862, 'opening_master', 'change_status', 3, '2022-04-25 05:20:17'),
(2863, 'opening_master', 'view', 3, '2022-04-25 05:20:17'),
(2864, 'opening_master', 'change_status', 3, '2022-04-25 05:20:18'),
(2865, 'opening_master', 'view', 3, '2022-04-25 05:20:18'),
(2866, 'opening_master', 'change_status', 3, '2022-04-25 05:20:18'),
(2867, 'opening_master', 'view', 3, '2022-04-25 05:20:18'),
(2868, 'opening_master', 'change_status', 3, '2022-04-25 05:20:19'),
(2869, 'opening_master', 'view', 3, '2022-04-25 05:20:19'),
(2870, 'opening_master', 'change_status', 3, '2022-04-25 05:20:19'),
(2871, 'opening_master', 'view', 3, '2022-04-25 05:20:19'),
(2872, 'opening_master', 'change_status', 3, '2022-04-25 05:20:20'),
(2873, 'opening_master', 'view', 3, '2022-04-25 05:20:20'),
(2874, 'opening_master', 'change_status', 3, '2022-04-25 05:20:21'),
(2875, 'opening_master', 'view', 3, '2022-04-25 05:20:21'),
(2876, 'opening_master', 'change_status', 3, '2022-04-25 05:20:21'),
(2877, 'opening_master', 'view', 3, '2022-04-25 05:20:21'),
(2878, 'opening_master', 'change_status', 3, '2022-04-25 05:20:22'),
(2879, 'opening_master', 'view', 3, '2022-04-25 05:20:22'),
(2880, 'opening_master', 'change_status', 3, '2022-04-25 05:20:23'),
(2881, 'opening_master', 'view', 3, '2022-04-25 05:20:23'),
(2882, 'opening_master', 'change_status', 3, '2022-04-25 05:20:23'),
(2883, 'opening_master', 'view', 3, '2022-04-25 05:20:24'),
(2884, 'opening_master', 'change_status', 3, '2022-04-25 05:20:24'),
(2885, 'opening_master', 'view', 3, '2022-04-25 05:20:24'),
(2886, 'opening_master', 'change_status', 3, '2022-04-25 05:20:25'),
(2887, 'opening_master', 'view', 3, '2022-04-25 05:20:25'),
(2888, 'opening_master', 'change_status', 3, '2022-04-25 05:20:25'),
(2889, 'opening_master', 'view', 3, '2022-04-25 05:20:25'),
(2890, 'opening_master', 'change_status', 3, '2022-04-25 05:20:26'),
(2891, 'opening_master', 'view', 3, '2022-04-25 05:20:26'),
(2892, 'opening_master', 'change_status', 3, '2022-04-25 05:20:27'),
(2893, 'opening_master', 'view', 3, '2022-04-25 05:20:27'),
(2894, 'opening_master', 'change_status', 3, '2022-04-25 05:20:27'),
(2895, 'opening_master', 'view', 3, '2022-04-25 05:20:27'),
(2896, 'opening_master', 'change_status', 3, '2022-04-25 05:20:28'),
(2897, 'opening_master', 'view', 3, '2022-04-25 05:20:28'),
(2898, 'opening_master', 'change_status', 3, '2022-04-25 05:20:28'),
(2899, 'opening_master', 'view', 3, '2022-04-25 05:20:29'),
(2900, 'opening_master', 'change_status', 3, '2022-04-25 05:20:29'),
(2901, 'opening_master', 'view', 3, '2022-04-25 05:20:29'),
(2902, 'opening_master', 'change_status', 3, '2022-04-25 05:20:30'),
(2903, 'opening_master', 'view', 3, '2022-04-25 05:20:30');
INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(2904, 'opening_master', 'change_status', 3, '2022-04-25 05:20:31'),
(2905, 'opening_master', 'view', 3, '2022-04-25 05:20:31'),
(2906, 'opening_master', 'change_status', 3, '2022-04-25 05:20:32'),
(2907, 'opening_master', 'view', 3, '2022-04-25 05:20:32'),
(2908, 'opening_master', 'change_status', 3, '2022-04-25 05:20:35'),
(2909, 'opening_master', 'view', 3, '2022-04-25 05:20:35'),
(2910, 'opening_master', 'view', 3, '2022-04-25 05:20:38'),
(2911, 'opening_master', 'change_status', 3, '2022-04-25 05:20:40'),
(2912, 'opening_master', 'view', 3, '2022-04-25 05:20:40'),
(2913, 'opening_master', 'change_status', 3, '2022-04-25 05:20:42'),
(2914, 'opening_master', 'view', 3, '2022-04-25 05:20:42'),
(2915, 'opening_master', 'change_status', 3, '2022-04-25 05:20:43'),
(2916, 'opening_master', 'view', 3, '2022-04-25 05:20:43'),
(2917, 'opening_master', 'change_status', 3, '2022-04-25 05:20:44'),
(2918, 'opening_master', 'view', 3, '2022-04-25 05:20:44'),
(2919, 'opening_master', 'change_status', 3, '2022-04-25 05:20:44'),
(2920, 'opening_master', 'view', 3, '2022-04-25 05:20:44'),
(2921, 'opening_master', 'change_status', 3, '2022-04-25 05:20:45'),
(2922, 'opening_master', 'view', 3, '2022-04-25 05:20:45'),
(2923, 'opening_master', 'change_status', 3, '2022-04-25 05:20:46'),
(2924, 'opening_master', 'view', 3, '2022-04-25 05:20:46'),
(2925, 'opening_master', 'change_status', 3, '2022-04-25 05:20:46'),
(2926, 'opening_master', 'view', 3, '2022-04-25 05:20:47'),
(2927, 'opening_master', 'change_status', 3, '2022-04-25 05:20:47'),
(2928, 'opening_master', 'view', 3, '2022-04-25 05:20:47'),
(2929, 'opening_master', 'change_status', 3, '2022-04-25 05:20:50'),
(2930, 'opening_master', 'view', 3, '2022-04-25 05:20:50'),
(2931, 'opening_master', 'change_status', 3, '2022-04-25 05:20:51'),
(2932, 'opening_master', 'view', 3, '2022-04-25 05:20:51'),
(2933, 'opening_master', 'change_status', 3, '2022-04-25 05:20:52'),
(2934, 'opening_master', 'view', 3, '2022-04-25 05:20:52'),
(2935, 'opening_master', 'change_status', 3, '2022-04-25 05:20:52'),
(2936, 'opening_master', 'view', 3, '2022-04-25 05:20:52'),
(2937, 'opening_master', 'change_status', 3, '2022-04-25 05:20:53'),
(2938, 'opening_master', 'view', 3, '2022-04-25 05:20:53'),
(2939, 'opening_master', 'change_status', 3, '2022-04-25 05:20:53'),
(2940, 'opening_master', 'view', 3, '2022-04-25 05:20:53'),
(2941, 'opening_master', 'change_status', 3, '2022-04-25 05:20:55'),
(2942, 'opening_master', 'view', 3, '2022-04-25 05:20:55'),
(2943, 'opening_master', 'change_status', 3, '2022-04-25 05:20:56'),
(2944, 'opening_master', 'view', 3, '2022-04-25 05:20:56'),
(2945, 'opening_master', 'view', 3, '2022-04-25 05:20:59'),
(2946, 'opening_master', 'view', 3, '2022-04-25 05:24:32'),
(2947, 'opening_master', 'change_status', 3, '2022-04-25 05:24:35'),
(2948, 'opening_master', 'view', 3, '2022-04-25 05:24:35'),
(2949, 'opening_master', 'change_status', 3, '2022-04-25 05:24:41'),
(2950, 'opening_master', 'view', 3, '2022-04-25 05:24:41'),
(2951, 'opening_master', 'change_status', 3, '2022-04-25 05:24:42'),
(2952, 'opening_master', 'view', 3, '2022-04-25 05:24:42'),
(2953, 'opening_master', 'all', 3, '2022-04-25 05:24:44'),
(2954, 'opening_master', 'view', 3, '2022-04-25 05:34:05'),
(2955, 'opening_master', 'view', 3, '2022-04-25 05:34:28'),
(2956, 'opening_master', 'view', 3, '2022-04-25 05:40:20'),
(2957, 'opening_master', 'change_status', 3, '2022-04-25 05:42:55'),
(2958, 'opening_master', 'view', 3, '2022-04-25 05:42:55'),
(2959, 'opening_master', 'change_status', 3, '2022-04-25 05:42:58'),
(2960, 'opening_master', 'view', 3, '2022-04-25 05:42:58'),
(2961, 'opening_master', 'change_status', 3, '2022-04-25 05:43:04'),
(2962, 'opening_master', 'view', 3, '2022-04-25 05:43:04'),
(2963, 'opening_master', 'view', 3, '2022-04-25 05:43:09'),
(2964, 'opening_master', 'change_status', 3, '2022-04-25 05:43:13'),
(2965, 'opening_master', 'view', 3, '2022-04-25 05:43:13'),
(2966, 'opening_master', 'change_status', 3, '2022-04-25 05:43:15'),
(2967, 'opening_master', 'view', 3, '2022-04-25 05:43:15'),
(2968, 'opening_master', 'view', 3, '2022-04-25 05:43:17'),
(2969, 'opening_master', 'view', 3, '2022-04-25 05:51:09'),
(2970, 'opening_master', 'view', 3, '2022-04-25 05:52:01'),
(2971, 'opening_master', 'change_status', 3, '2022-04-25 05:53:44'),
(2972, 'opening_master', 'view', 3, '2022-04-25 05:53:44'),
(2973, 'opening_master', 'view', 3, '2022-04-25 05:54:26'),
(2974, 'opening_master', 'opening_post', 3, '2022-04-25 05:54:31'),
(2975, 'opening_master', 'view', 3, '2022-04-25 06:09:03'),
(2976, 'opening_master', 'change_status', 3, '2022-04-25 06:09:05'),
(2977, 'opening_master', 'view', 3, '2022-04-25 06:09:05'),
(2978, 'opening_master', 'change_status', 3, '2022-04-25 06:09:06'),
(2979, 'opening_master', 'view', 3, '2022-04-25 06:09:06'),
(2980, 'opening_master', 'change_status', 3, '2022-04-25 06:09:08'),
(2981, 'opening_master', 'view', 3, '2022-04-25 06:09:08'),
(2982, 'opening_master', 'view', 3, '2022-04-25 06:10:04'),
(2983, 'opening_master', 'view', 3, '2022-04-25 06:10:08'),
(2984, 'opening_master', 'opening_post', 3, '2022-04-25 06:10:11'),
(2985, 'opening_master', 'view', 3, '2022-04-25 06:10:35'),
(2986, 'opening_master', 'opening_post', 3, '2022-04-25 06:10:39'),
(2987, 'opening_master', 'opening_post', 3, '2022-04-25 06:10:43'),
(2988, 'opening_master', 'opening_post', 3, '2022-04-25 06:10:44'),
(2989, 'opening_master', 'opening_post', 3, '2022-04-25 06:10:44'),
(2990, 'opening_master', 'opening_post', 3, '2022-04-25 06:11:00'),
(2991, 'opening_master', 'all', 3, '2022-04-25 06:33:39'),
(2992, 'opening_master', 'form', 3, '2022-04-25 06:33:41'),
(2993, 'opening_master', 'getForm', 3, '2022-04-25 06:33:59'),
(2994, 'opening_master', 'form', 3, '2022-04-25 06:34:17'),
(2995, 'opening_master', 'all', 3, '2022-04-25 06:34:17'),
(2996, 'opening_master', 'form', 3, '2022-04-25 06:35:05'),
(2997, 'opening_master', 'getForm', 3, '2022-04-25 06:35:26'),
(2998, 'opening_master', 'getForm', 3, '2022-04-25 06:35:48'),
(2999, 'opening_master', 'all', 3, '2022-04-25 06:36:04'),
(3000, 'opening_master', 'view', 3, '2022-04-25 06:36:12'),
(3001, 'opening_master', 'form', 3, '2022-04-25 06:36:33'),
(3002, 'opening_master', 'all', 3, '2022-04-25 06:36:33'),
(3003, 'opening_master', 'view', 3, '2022-04-25 06:36:37'),
(3004, 'opening_master', 'view', 3, '2022-04-25 06:37:00'),
(3005, 'opening_master', 'opening_post', 3, '2022-04-25 06:37:02'),
(3006, 'opening_master', 'opening_post', 3, '2022-04-25 06:37:08'),
(3007, 'dashboard', NULL, 3, '2022-04-25 08:56:24'),
(3008, 'issue', 'form', 3, '2022-04-25 09:02:48'),
(3009, 'issue', 'form', 3, '2022-04-25 09:03:00'),
(3010, 'issue', 'direct_add', 3, '2022-04-25 09:03:00'),
(3011, 'issue', 'getForm', 3, '2022-04-25 09:03:04'),
(3012, 'issue', 'getForm', 3, '2022-04-25 09:03:06'),
(3013, 'issue', 'form', 3, '2022-04-25 09:03:21'),
(3014, 'issue', 'form', 3, '2022-04-25 09:04:09'),
(3015, 'issue', 'add', 3, '2022-04-25 09:04:09'),
(3016, 'issue', 'form', 3, '2022-04-25 09:04:15'),
(3017, 'issue', 'form', 3, '2022-04-25 09:04:20'),
(3018, 'issue', 'direct_add', 3, '2022-04-25 09:04:20'),
(3019, 'issue', 'form', 3, '2022-04-25 09:04:24'),
(3020, 'issue', 'form', 3, '2022-04-25 09:04:28'),
(3021, 'issue', 'add', 3, '2022-04-25 09:04:28'),
(3022, 'opening_master', 'view', 3, '2022-04-25 09:08:25'),
(3023, 'opening_master', 'view', 3, '2022-04-25 09:08:30'),
(3024, 'opening_master', 'opening_post', 3, '2022-04-25 09:08:32'),
(3025, 'opening_master', 'all', 3, '2022-04-25 09:13:40'),
(3026, 'opening_master', 'view', 3, '2022-04-25 09:13:49'),
(3027, 'opening_master', 'view', 3, '2022-04-25 09:21:56'),
(3028, 'opening_master', 'opening_post', 3, '2022-04-25 09:21:59'),
(3029, 'opening_master', 'change_status', 3, '2022-04-25 09:22:04'),
(3030, 'opening_master', 'view', 3, '2022-04-25 09:22:04'),
(3031, 'opening_master', 'view', 3, '2022-04-25 09:22:50'),
(3032, 'opening_master', 'opening_post', 3, '2022-04-25 09:22:52'),
(3033, 'opening_master', 'opening_post', 3, '2022-04-25 09:23:15'),
(3034, 'opening_master', 'view', 3, '2022-04-25 09:24:53'),
(3035, 'opening_master', 'opening_post', 3, '2022-04-25 09:24:58'),
(3036, 'opening_master', 'view', 3, '2022-04-25 09:24:58'),
(3037, 'opening_master', 'view', 3, '2022-04-25 09:28:05'),
(3038, 'opening_master', 'view', 3, '2022-04-25 09:30:42'),
(3039, 'opening_master', 'opening_post', 3, '2022-04-25 09:30:50'),
(3040, 'opening_master', 'view', 3, '2022-04-25 09:30:58'),
(3041, 'opening_master', 'view', 3, '2022-04-25 09:31:02'),
(3042, 'opening_master', 'view', 3, '2022-04-25 09:33:51'),
(3043, 'opening_master', 'opening_post', 3, '2022-04-25 09:34:02'),
(3044, 'opening_master', 'view', 3, '2022-04-25 09:34:16'),
(3045, 'opening_master', 'opening_post', 3, '2022-04-25 09:34:20'),
(3046, 'opening_master', 'view', 3, '2022-04-25 09:35:50'),
(3047, 'opening_master', 'view', 3, '2022-04-25 09:36:30'),
(3048, 'opening_master', 'opening_post', 3, '2022-04-25 09:36:43'),
(3049, 'opening_master', 'view', 3, '2022-04-25 09:36:58'),
(3050, 'opening_master', 'view', 3, '2022-04-25 09:37:02'),
(3051, 'opening_master', 'opening_post', 3, '2022-04-25 09:37:11'),
(3052, 'opening_master', 'view', 3, '2022-04-25 09:37:11'),
(3053, 'opening_master', 'view', 3, '2022-04-25 09:40:36'),
(3054, 'opening_master', 'opening_post', 3, '2022-04-25 09:40:41'),
(3055, 'opening_master', 'view', 3, '2022-04-25 09:42:23'),
(3056, 'opening_master', 'view', 3, '2022-04-25 09:43:15'),
(3057, 'opening_master', 'view', 3, '2022-04-25 09:43:23'),
(3058, 'opening_master', 'opening_post', 3, '2022-04-25 09:43:29'),
(3059, 'opening_master', 'view', 3, '2022-04-25 09:43:29'),
(3060, 'opening_master', 'view', 3, '2022-04-25 09:43:44'),
(3061, 'opening_master', 'opening_post', 3, '2022-04-25 09:43:48'),
(3062, 'opening_master', 'change_status', 3, '2022-04-25 09:43:51'),
(3063, 'opening_master', 'view', 3, '2022-04-25 09:43:51'),
(3064, 'opening_master', 'opening_post', 3, '2022-04-25 09:43:55'),
(3065, 'opening_master', 'view', 3, '2022-04-25 09:43:55'),
(3066, 'opening_master', 'view', 3, '2022-04-25 09:44:16'),
(3067, 'opening_master', 'view', 3, '2022-04-25 09:46:33'),
(3068, 'opening_master', 'view', 3, '2022-04-25 09:47:31'),
(3069, 'opening_master', 'opening_post', 3, '2022-04-25 09:47:34'),
(3070, 'opening_master', 'change_status', 3, '2022-04-25 09:47:37'),
(3071, 'opening_master', 'view', 3, '2022-04-25 09:47:37'),
(3072, 'opening_master', 'opening_post', 3, '2022-04-25 09:47:41'),
(3073, 'opening_master', 'change_status', 3, '2022-04-25 09:47:49'),
(3074, 'opening_master', 'view', 3, '2022-04-25 09:47:49'),
(3075, 'opening_master', 'change_status', 3, '2022-04-25 09:47:50'),
(3076, 'opening_master', 'view', 3, '2022-04-25 09:47:50'),
(3077, 'opening_master', 'opening_post', 3, '2022-04-25 09:47:50'),
(3078, 'opening_master', 'view', 3, '2022-04-25 09:47:57'),
(3079, 'opening_master', 'opening_post', 3, '2022-04-25 09:47:59'),
(3080, 'opening_master', 'opening_post', 3, '2022-04-25 09:48:20'),
(3081, 'mrn', 'all', 3, '2022-04-25 09:48:29'),
(3082, 'mrn', 'view', 3, '2022-04-25 09:48:39'),
(3083, 'issue', 'all', 3, '2022-04-25 09:48:44'),
(3084, 'issue', 'view', 3, '2022-04-25 09:48:50'),
(3085, 'issue', 'direct_view', 3, '2022-04-25 09:48:52'),
(3086, 'opening_master', 'change_status', 3, '2022-04-25 09:49:12'),
(3087, 'issue', 'direct_view', 3, '2022-04-25 09:49:12'),
(3088, 'issue', 'direct_view', 3, '2022-04-25 09:49:14'),
(3089, 'issue', 'edit', 3, '2022-04-25 09:50:47'),
(3090, 'issue', 'edit', 3, '2022-04-25 09:51:45'),
(3091, 'issue', 'view', 3, '2022-04-25 09:55:11'),
(3092, 'issue', 'view', 3, '2022-04-25 10:33:42'),
(3093, 'issue', 'issue_post', 3, '2022-04-25 10:33:45'),
(3094, 'issue', 'view', 3, '2022-04-25 10:33:50'),
(3095, 'issue', 'all', 3, '2022-04-25 10:33:53'),
(3096, 'issue', 'view', 3, '2022-04-25 10:33:56'),
(3097, 'issue', 'view', 3, '2022-04-25 10:36:11'),
(3098, 'issue', 'issue_post', 3, '2022-04-25 10:36:13'),
(3099, 'issue', 'issue_post', 3, '2022-04-25 10:36:21'),
(3100, 'issue', 'edit', 3, '2022-04-25 10:36:45'),
(3101, 'issue', 'view', 3, '2022-04-25 10:39:36'),
(3102, 'issue', 'issue_post', 3, '2022-04-25 10:39:41'),
(3103, 'issue', 'view', 3, '2022-04-25 10:39:42'),
(3104, 'issue', 'view', 3, '2022-04-25 10:42:27'),
(3105, 'issue', 'view', 3, '2022-04-25 10:43:35'),
(3106, 'issue', 'view', 3, '2022-04-25 10:43:47'),
(3107, 'issue', 'view', 3, '2022-04-25 10:43:50'),
(3108, 'issue', 'view', 3, '2022-04-25 10:44:09'),
(3109, 'issue', 'issue_post', 3, '2022-04-25 10:44:11'),
(3110, 'opening_master', 'change_status', 3, '2022-04-25 10:44:13'),
(3111, 'issue', 'view', 3, '2022-04-25 10:44:13'),
(3112, 'issue', 'all', 3, '2022-04-25 10:44:20'),
(3113, 'issue', 'direct_view', 3, '2022-04-25 10:44:46'),
(3114, 'issue', 'direct_view', 3, '2022-04-25 10:45:08'),
(3115, 'opening_master', 'change_status', 3, '2022-04-25 10:45:11'),
(3116, 'issue', 'direct_view', 3, '2022-04-25 10:45:11'),
(3117, 'issue', 'issue_post', 3, '2022-04-25 10:45:13'),
(3118, 'issue', 'direct_view', 3, '2022-04-25 10:45:13'),
(3119, 'issue', 'all', 3, '2022-04-25 10:45:47'),
(3120, 'issue', 'view', 3, '2022-04-25 10:45:51'),
(3121, 'issue', 'view', 3, '2022-04-25 11:03:40'),
(3122, 'issue', 'issue_post', 3, '2022-04-25 11:03:43'),
(3123, 'issue', 'view', 3, '2022-04-25 11:04:14'),
(3124, 'issue', 'edit', 3, '2022-04-25 11:05:02'),
(3125, 'issue', 'view', 3, '2022-04-25 11:06:29'),
(3126, 'issue', 'view', 3, '2022-04-25 11:15:35'),
(3127, 'issue', 'view', 3, '2022-04-25 11:22:46'),
(3128, 'issue', 'issue_post', 3, '2022-04-25 11:22:52'),
(3129, 'dashboard', NULL, 3, '2022-04-26 06:41:20'),
(3130, 'issue', 'all', 3, '2022-04-26 06:41:51'),
(3131, 'issue', 'view', 3, '2022-04-26 06:41:53'),
(3132, 'issue', 'direct_view', 3, '2022-04-26 06:41:54'),
(3133, 'issue', 'view', 3, '2022-04-26 06:41:56'),
(3134, 'issue', 'all', 3, '2022-04-26 06:52:52'),
(3135, 'issue', 'edit', 3, '2022-04-26 06:52:58'),
(3136, 'opening_master', 'all', 3, '2022-04-26 06:53:09'),
(3137, 'opening_master', 'form', 3, '2022-04-26 06:53:15'),
(3138, 'opening_master', 'getForm', 3, '2022-04-26 06:53:54'),
(3139, 'opening_master', 'getForm', 3, '2022-04-26 06:54:13'),
(3140, 'opening_master', 'getForm', 3, '2022-04-26 06:54:30'),
(3141, 'opening_master', 'form', 3, '2022-04-26 06:54:50'),
(3142, 'opening_master', 'all', 3, '2022-04-26 06:54:51'),
(3143, 'opening_master', 'view', 3, '2022-04-26 06:54:57'),
(3144, 'opening_master', 'opening_post', 3, '2022-04-26 06:55:00'),
(3145, 'opening_master', 'change_status', 3, '2022-04-26 06:55:04'),
(3146, 'opening_master', 'view', 3, '2022-04-26 06:55:04'),
(3147, 'opening_master', 'opening_post', 3, '2022-04-26 06:55:07'),
(3148, 'opening_master', 'view', 3, '2022-04-26 06:55:07'),
(3149, 'opening_master', 'opening_post', 3, '2022-04-26 06:55:28'),
(3150, 'opening_master', 'change_status', 3, '2022-04-26 06:55:30'),
(3151, 'opening_master', 'view', 3, '2022-04-26 06:55:30'),
(3152, 'opening_master', 'all', 3, '2022-04-26 06:55:34'),
(3153, 'opening_master', 'all', 3, '2022-04-26 06:55:36'),
(3154, 'requisition', 'all', 3, '2022-04-26 06:56:07'),
(3155, 'issue', 'direct_view', 3, '2022-04-26 06:56:35'),
(3156, 'issue', 'all', 3, '2022-04-26 06:56:42'),
(3157, 'issue', 'view', 3, '2022-04-26 06:56:44'),
(3158, 'issue', 'direct_view', 3, '2022-04-26 06:56:46'),
(3159, 'issue', 'view', 3, '2022-04-26 06:56:46'),
(3160, 'dashboard', NULL, 3, '2022-04-26 09:12:22'),
(3161, 'issue', 'all', 3, '2022-04-26 09:18:02'),
(3162, 'issue', 'view', 3, '2022-04-26 09:18:20'),
(3163, 'issue', 'direct_view', 3, '2022-04-26 09:18:22'),
(3164, 'issue', 'issue_post', 3, '2022-04-26 09:18:24'),
(3165, 'issue', 'issue_post', 3, '2022-04-26 09:18:27'),
(3166, 'opening_master', 'change_status', 3, '2022-04-26 09:18:30'),
(3167, 'issue', 'view', 3, '2022-04-26 09:18:30'),
(3168, 'issue', 'view', 3, '2022-04-26 09:19:21'),
(3169, 'issue', 'direct_view', 3, '2022-04-26 09:19:26'),
(3170, 'issue', 'view', 3, '2022-04-26 09:19:31'),
(3171, 'issue', 'view', 3, '2022-04-26 09:19:39'),
(3172, 'issue', 'view', 3, '2022-04-26 09:19:58'),
(3173, 'issue', 'issue_post', 3, '2022-04-26 09:21:29'),
(3174, 'issue', 'view', 3, '2022-04-26 09:21:43'),
(3175, 'issue', 'issue_post', 3, '2022-04-26 09:22:03'),
(3176, 'opening_master', 'change_status', 3, '2022-04-26 09:22:09'),
(3177, 'issue', 'view', 3, '2022-04-26 09:22:09'),
(3178, 'issue', 'issue_post', 3, '2022-04-26 09:22:13'),
(3179, 'issue', 'view', 3, '2022-04-26 09:36:03'),
(3180, 'issue', 'view', 3, '2022-04-26 09:37:48'),
(3181, 'issue', 'view', 3, '2022-04-26 09:38:20'),
(3182, 'issue', 'direct_view', 3, '2022-04-26 09:45:50'),
(3183, 'issue', 'direct_view', 3, '2022-04-26 09:47:09'),
(3184, 'issue', 'view', 3, '2022-04-26 09:49:35'),
(3185, 'issue', 'view', 3, '2022-04-26 09:49:54'),
(3186, 'issue', 'view', 3, '2022-04-26 09:49:55'),
(3187, 'issue', 'view', 3, '2022-04-26 10:01:04'),
(3188, 'issue', 'direct_view', 3, '2022-04-26 10:01:10'),
(3189, 'issue', 'view', 3, '2022-04-26 10:03:49'),
(3190, 'issue', 'view', 3, '2022-04-26 10:04:56'),
(3191, 'issue', 'view', 3, '2022-04-26 10:06:41'),
(3192, 'issue', 'issue_post', 3, '2022-04-26 10:06:45'),
(3193, 'issue', 'view', 3, '2022-04-26 10:07:59'),
(3194, 'issue', 'view', 3, '2022-04-26 10:08:22'),
(3195, 'issue', 'direct_view', 3, '2022-04-26 10:08:24'),
(3196, 'issue', 'direct_add', 3, '2022-04-26 10:08:33'),
(3197, 'issue', 'view', 3, '2022-04-26 10:10:33'),
(3198, 'issue', 'direct_view', 3, '2022-04-26 10:12:02'),
(3199, 'issue', 'view', 3, '2022-04-26 10:13:18'),
(3200, 'issue', 'view', 3, '2022-04-26 10:13:21'),
(3201, 'issue', 'view', 3, '2022-04-26 10:13:43'),
(3202, 'issue', 'view', 3, '2022-04-26 10:13:55'),
(3203, 'issue', 'issue_post', 3, '2022-04-26 10:14:03'),
(3204, 'issue', 'view', 3, '2022-04-26 10:14:03'),
(3205, 'issue', 'view', 3, '2022-04-26 10:14:41'),
(3206, 'issue', 'view', 3, '2022-04-26 10:16:08'),
(3207, 'issue', 'view', 3, '2022-04-26 10:16:47'),
(3208, 'issue', 'direct_view', 3, '2022-04-26 10:16:55'),
(3209, 'issue', 'direct_view', 3, '2022-04-26 10:17:20'),
(3210, 'opening_master', 'all', 3, '2022-04-26 10:24:55'),
(3211, 'opening_master', 'form', 3, '2022-04-26 10:24:59'),
(3212, 'opening_master', 'getForm', 3, '2022-04-26 10:25:36'),
(3213, 'opening_master', 'form', 3, '2022-04-26 10:26:04'),
(3214, 'opening_master', 'all', 3, '2022-04-26 10:26:04'),
(3215, 'opening_master', 'view', 3, '2022-04-26 10:26:09'),
(3216, 'opening_master', 'change_status', 3, '2022-04-26 10:26:12'),
(3217, 'opening_master', 'view', 3, '2022-04-26 10:26:12'),
(3218, 'opening_master', 'opening_post', 3, '2022-04-26 10:26:14'),
(3219, 'opening_master', 'view', 3, '2022-04-26 10:26:14'),
(3220, 'opening_master', 'view', 3, '2022-04-26 10:26:18'),
(3221, 'issue', 'view', 3, '2022-04-26 10:26:38'),
(3222, 'issue', 'view', 3, '2022-04-26 10:26:45'),
(3223, 'issue', 'view', 3, '2022-04-26 10:26:50'),
(3224, 'issue', 'direct_view', 3, '2022-04-26 10:26:57'),
(3225, 'issue', 'view', 3, '2022-04-26 10:27:21'),
(3226, 'issue', 'direct_view', 3, '2022-04-26 10:27:29'),
(3227, 'issue', 'view', 3, '2022-04-26 10:27:39'),
(3228, 'issue', 'view', 3, '2022-04-26 10:29:38'),
(3229, 'opening_master', 'all', 3, '2022-04-26 10:29:43'),
(3230, 'opening_master', 'view', 3, '2022-04-26 10:29:47'),
(3231, 'opening_master', 'opening_post', 3, '2022-04-26 10:29:49'),
(3232, 'opening_master', 'view', 3, '2022-04-26 10:29:50'),
(3233, 'issue', 'view', 3, '2022-04-26 10:29:58'),
(3234, 'issue', 'direct_view', 3, '2022-04-26 10:30:04'),
(3235, 'issue', 'direct_view', 3, '2022-04-26 11:09:46'),
(3236, 'issue', 'direct_view', 3, '2022-04-26 11:10:47'),
(3237, 'opening_master', 'change_status', 3, '2022-04-26 11:10:55'),
(3238, 'issue', 'direct_view', 3, '2022-04-26 11:10:55'),
(3239, 'issue', 'issue_post', 3, '2022-04-26 11:11:07'),
(3240, 'issue', 'view', 3, '2022-04-26 11:40:52'),
(3241, 'issue', 'view', 3, '2022-04-26 11:40:56'),
(3242, 'issue', 'direct_view', 3, '2022-04-26 11:40:57'),
(3243, 'dashboard', NULL, 3, '2022-04-28 04:48:23'),
(3244, 'issue', 'all', 3, '2022-04-28 04:48:56'),
(3245, 'issue', 'view', 3, '2022-04-28 04:49:04'),
(3246, 'issue', 'direct_view', 3, '2022-04-28 04:49:05'),
(3247, 'mrn', 'all', 3, '2022-04-28 04:52:17'),
(3248, 'mrn', 'view', 3, '2022-04-28 04:52:22'),
(3249, 'issue', 'form', 3, '2022-04-28 04:56:12'),
(3250, 'requisition', 'form', 3, '2022-04-28 04:56:21'),
(3251, 'requisition', 'getForm', 3, '2022-04-28 04:57:17'),
(3252, 'issue', 'all', 3, '2022-04-28 05:00:43'),
(3253, 'issue', 'view', 3, '2022-04-28 05:00:46'),
(3254, 'issue', 'all', 3, '2022-04-28 05:01:09'),
(3255, 'issue', 'view', 3, '2022-04-28 05:01:13'),
(3256, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3257, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3258, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3259, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3260, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3261, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3262, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3263, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3264, 'issue', 'edit', 3, '2022-04-28 05:01:19'),
(3265, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3266, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3267, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3268, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3269, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3270, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3271, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3272, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3273, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3274, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3275, 'issue', 'edit', 3, '2022-04-28 05:01:20'),
(3276, 'issue', 'edit', 3, '2022-04-28 05:01:21'),
(3277, 'issue', 'edit', 3, '2022-04-28 05:01:21'),
(3278, 'issue', 'edit', 3, '2022-04-28 05:01:21'),
(3279, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3280, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3281, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3282, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3283, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3284, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3285, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3286, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3287, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3288, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3289, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3290, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3291, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3292, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3293, 'issue', 'edit', 3, '2022-04-28 05:01:22'),
(3294, 'issue', 'edit', 3, '2022-04-28 05:01:23'),
(3295, 'issue', 'edit', 3, '2022-04-28 05:01:23'),
(3296, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3297, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3298, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3299, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3300, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3301, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3302, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3303, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3304, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3305, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3306, 'issue', 'edit', 3, '2022-04-28 05:01:28'),
(3307, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3308, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3309, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3310, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3311, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3312, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3313, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3314, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3315, 'issue', 'edit', 3, '2022-04-28 05:01:29'),
(3316, 'issue', 'view', 3, '2022-04-28 05:01:35'),
(3317, 'issue', 'all', 3, '2022-04-28 05:03:31'),
(3318, 'issue', 'edit', 3, '2022-04-28 05:03:33'),
(3319, 'issue', 'direct_add', 3, '2022-04-28 05:08:41'),
(3320, 'issue', 'view', 3, '2022-04-28 05:11:56'),
(3321, 'issue', 'direct_view', 3, '2022-04-28 05:11:57'),
(3322, 'issue', 'view', 3, '2022-04-28 05:13:17'),
(3323, 'mrn', 'all', 3, '2022-04-28 05:13:24'),
(3324, 'mrn', 'view', 3, '2022-04-28 05:13:32'),
(3325, 'mrn', 'all', 3, '2022-04-28 05:13:39'),
(3326, 'requisition', 'all', 3, '2022-04-28 05:14:17'),
(3327, 'requisition', 'view', 3, '2022-04-28 05:14:20'),
(3328, 'issue', 'all', 3, '2022-04-28 05:15:25'),
(3329, 'mrn', 'all', 3, '2022-04-28 05:15:30'),
(3330, 'mrn', 'view', 3, '2022-04-28 05:15:33'),
(3331, 'issue', 'all', 3, '2022-04-28 05:17:47'),
(3332, 'mrn', 'all', 3, '2022-04-28 05:17:51'),
(3333, 'mrn', 'view', 3, '2022-04-28 05:17:54'),
(3334, 'issue', 'all', 3, '2022-04-28 05:18:56'),
(3335, 'issue', 'view', 3, '2022-04-28 05:20:06'),
(3336, 'issue', 'direct_view', 3, '2022-04-28 05:20:07'),
(3337, 'issue', 'issue_post', 3, '2022-04-28 05:20:26'),
(3338, 'opening_master', 'change_status', 3, '2022-04-28 05:20:30'),
(3339, 'issue', 'view', 3, '2022-04-28 05:20:30'),
(3340, 'issue', 'issue_post', 3, '2022-04-28 05:20:34'),
(3341, 'issue', 'issue_post', 3, '2022-04-28 05:20:44'),
(3342, 'issue', 'view', 3, '2022-04-28 05:20:52'),
(3343, 'issue', 'all', 3, '2022-04-28 05:21:22'),
(3344, 'issue', 'direct_view', 3, '2022-04-28 05:23:07'),
(3345, 'issue', 'view', 3, '2022-04-28 05:25:18'),
(3346, 'issue', 'view', 3, '2022-04-28 05:35:10'),
(3347, 'issue', 'issue_post', 3, '2022-04-28 05:35:18'),
(3348, 'issue', 'view', 3, '2022-04-28 05:35:18'),
(3349, 'opening_master', 'change_status', 3, '2022-04-28 05:35:33'),
(3350, 'issue', 'view', 3, '2022-04-28 05:35:33'),
(3351, 'issue', 'issue_post', 3, '2022-04-28 05:35:40'),
(3352, 'issue', 'edit', 3, '2022-04-28 05:37:36'),
(3353, 'issue', 'direct_add', 3, '2022-04-28 05:37:44'),
(3354, 'issue', 'getForm', 3, '2022-04-28 05:38:00'),
(3355, 'issue', 'form', 3, '2022-04-28 05:39:47'),
(3356, 'issue', 'all', 3, '2022-04-28 05:40:08'),
(3357, 'issue', 'edit', 3, '2022-04-28 05:42:59'),
(3358, 'issue', 'view', 3, '2022-04-28 05:52:19'),
(3359, 'issue', 'issue_post', 3, '2022-04-28 05:52:24'),
(3360, 'issue', 'view', 3, '2022-04-28 05:52:24'),
(3361, 'issue', 'issue_post', 3, '2022-04-28 05:52:30'),
(3362, 'issue', 'view', 3, '2022-04-28 05:52:30'),
(3363, 'issue', 'issue_post', 3, '2022-04-28 05:52:34'),
(3364, 'issue', 'view', 3, '2022-04-28 05:52:34'),
(3365, 'issue', 'issue_post', 3, '2022-04-28 05:52:36'),
(3366, 'issue', 'view', 3, '2022-04-28 05:52:36'),
(3367, 'issue', 'issue_post', 3, '2022-04-28 05:52:43'),
(3368, 'issue', 'view', 3, '2022-04-28 05:52:43'),
(3369, 'opening_master', 'change_status', 3, '2022-04-28 05:52:48'),
(3370, 'issue', 'view', 3, '2022-04-28 05:52:48'),
(3371, 'issue', 'issue_post', 3, '2022-04-28 05:53:00'),
(3372, 'issue', 'view', 3, '2022-04-28 05:56:26'),
(3373, 'issue', 'issue_post', 3, '2022-04-28 05:56:31'),
(3374, 'issue', 'view', 3, '2022-04-28 05:56:31'),
(3375, 'opening_master', 'change_status', 3, '2022-04-28 05:56:37'),
(3376, 'issue', 'view', 3, '2022-04-28 05:56:37'),
(3377, 'issue', 'issue_post', 3, '2022-04-28 05:56:47'),
(3378, 'issue', 'view', 3, '2022-04-28 05:56:48'),
(3379, 'issue', 'view', 3, '2022-04-28 05:57:02'),
(3380, 'issue', 'direct_view', 3, '2022-04-28 05:58:21'),
(3381, 'issue', 'issue_post', 3, '2022-04-28 05:58:45'),
(3382, 'issue', 'direct_view', 3, '2022-04-28 05:58:45'),
(3383, 'opening_master', 'change_status', 3, '2022-04-28 05:58:49'),
(3384, 'issue', 'direct_view', 3, '2022-04-28 05:58:49'),
(3385, 'issue', 'issue_post', 3, '2022-04-28 05:58:51'),
(3386, 'issue', 'direct_view', 3, '2022-04-28 05:59:27'),
(3387, 'issue', 'issue_post', 3, '2022-04-28 05:59:36'),
(3388, 'issue', 'direct_view', 3, '2022-04-28 06:00:51'),
(3389, 'issue', 'issue_post', 3, '2022-04-28 06:00:59'),
(3390, 'issue', 'issue_post', 3, '2022-04-28 06:05:07'),
(3391, 'issue', 'view', 3, '2022-04-28 06:05:07'),
(3392, 'issue', 'direct_view', 3, '2022-04-28 06:05:10'),
(3393, 'issue', 'issue_post', 3, '2022-04-28 06:05:32'),
(3394, 'issue', 'direct_view', 3, '2022-04-28 06:05:32'),
(3395, 'issue', 'direct_view', 3, '2022-04-28 06:05:32'),
(3396, 'issue', 'all', 3, '2022-04-28 06:06:03'),
(3397, 'opening_master', 'all', 3, '2022-04-28 06:06:31'),
(3398, 'opening_master', 'view', 3, '2022-04-28 06:06:37'),
(3399, 'opening_master', 'view', 3, '2022-04-28 06:09:18'),
(3400, 'issue', 'view', 3, '2022-04-28 06:13:03'),
(3401, 'issue', 'direct_view', 3, '2022-04-28 06:13:07'),
(3402, 'issue', 'view', 3, '2022-04-28 06:20:17'),
(3403, 'issue', 'view', 3, '2022-04-28 06:21:27'),
(3404, 'issue', 'direct_view', 3, '2022-04-28 06:22:01'),
(3405, 'issue', 'issue_post', 3, '2022-04-28 06:22:03'),
(3406, 'issue', 'direct_view', 3, '2022-04-28 06:22:03'),
(3407, 'opening_master', 'change_status', 3, '2022-04-28 06:22:05'),
(3408, 'issue', 'direct_view', 3, '2022-04-28 06:22:05'),
(3409, 'issue', 'issue_post', 3, '2022-04-28 06:22:08'),
(3410, 'issue', 'direct_view', 3, '2022-04-28 06:22:08'),
(3411, 'issue', 'direct_view', 3, '2022-04-28 06:22:08'),
(3412, 'issue', 'direct_view', 3, '2022-04-28 06:23:49'),
(3413, 'issue', 'view', 3, '2022-04-28 06:23:56'),
(3414, 'issue', 'direct_view', 3, '2022-04-28 06:24:00'),
(3415, 'issue', 'all', 3, '2022-04-28 06:24:21'),
(3416, 'issue', 'all', 3, '2022-04-28 06:28:19'),
(3417, 'issue', 'view', 3, '2022-04-28 06:28:23'),
(3418, 'issue', 'direct_view', 3, '2022-04-28 06:28:26'),
(3419, 'issue', 'direct_view', 3, '2022-04-28 06:29:41'),
(3420, 'issue', 'direct_view', 3, '2022-04-28 06:30:14'),
(3421, 'issue', 'all', 3, '2022-04-28 06:30:22'),
(3422, 'issue', 'all', 3, '2022-04-28 06:32:55'),
(3423, 'issue', 'issue_post', 3, '2022-04-28 06:33:05'),
(3424, 'issue', 'direct_view', 3, '2022-04-28 06:33:05'),
(3425, 'issue', 'direct_view', 3, '2022-04-28 06:33:07'),
(3426, 'issue', 'direct_view', 3, '2022-04-28 06:33:36'),
(3427, 'issue', 'issue_post', 3, '2022-04-28 06:33:41'),
(3428, 'issue', 'direct_view', 3, '2022-04-28 06:33:41'),
(3429, 'opening_master', 'change_status', 3, '2022-04-28 06:33:45'),
(3430, 'issue', 'direct_view', 3, '2022-04-28 06:33:45'),
(3431, 'issue', 'all', 3, '2022-04-28 06:33:48'),
(3432, 'opening_master', 'all', 3, '2022-04-28 06:34:20'),
(3433, 'opening_master', 'all', 3, '2022-04-28 06:37:49'),
(3434, 'opening_master', 'form', 3, '2022-04-28 06:37:55'),
(3435, 'opening_master', 'getForm', 3, '2022-04-28 06:38:24'),
(3436, 'opening_master', 'form', 3, '2022-04-28 06:38:46'),
(3437, 'opening_master', 'all', 3, '2022-04-28 06:38:46'),
(3438, 'opening_master', 'soft_delete', 3, '2022-04-28 06:39:24'),
(3439, 'opening_master', 'all', 3, '2022-04-28 06:39:24'),
(3440, 'opening_master', 'all', 3, '2022-04-28 06:40:07'),
(3441, 'opening_master', 'view', 3, '2022-04-28 06:40:09'),
(3442, 'opening_master', 'form', 3, '2022-04-28 06:40:15'),
(3443, 'opening_master', 'form', 3, '2022-04-28 06:40:22'),
(3444, 'opening_master', 'all', 3, '2022-04-28 06:40:34'),
(3445, 'requisition', 'all', 3, '2022-04-28 06:40:51'),
(3446, 'requisition', 'all', 3, '2022-04-28 06:43:05'),
(3447, 'requisition', 'form', 3, '2022-04-28 06:43:09'),
(3448, 'requisition', 'getStaffOfDepartment', 3, '2022-04-28 06:43:15'),
(3449, 'requisition', 'getForm', 3, '2022-04-28 06:43:26'),
(3450, 'requisition', 'form', 3, '2022-04-28 06:43:39'),
(3451, 'requisition', 'all', 3, '2022-04-28 06:43:39'),
(3452, 'issue', 'all', 3, '2022-04-28 06:43:51'),
(3453, 'mrn', 'all', 3, '2022-04-28 06:43:57'),
(3454, 'mrn', 'view', 3, '2022-04-28 06:44:01'),
(3455, 'issue', 'view', 3, '2022-04-28 06:45:23'),
(3456, 'mrn', 'view', 3, '2022-04-28 06:45:31'),
(3457, 'mrn', 'view', 3, '2022-04-28 06:46:22'),
(3458, 'opening_master', 'change_status', 3, '2022-04-28 06:46:30'),
(3459, 'mrn', 'view', 3, '2022-04-28 06:46:30'),
(3460, 'mrn', 'view', 3, '2022-04-28 06:46:40'),
(3461, 'mrn', 'view', 3, '2022-04-28 06:47:05'),
(3462, 'mrn', 'view', 3, '2022-04-28 06:47:54'),
(3463, 'opening_master', 'change_status', 3, '2022-04-28 06:47:56'),
(3464, 'mrn', 'view', 3, '2022-04-28 06:47:56'),
(3465, 'mrn', 'all', 3, '2022-04-28 06:48:06'),
(3466, 'mrn', 'all', 3, '2022-04-28 06:50:51'),
(3467, 'mrn', 'form', 3, '2022-04-28 06:50:57'),
(3468, 'mrn', 'getForm', 3, '2022-04-28 06:51:03'),
(3469, 'mrn', 'form', 3, '2022-04-28 06:51:48'),
(3470, 'mrn', 'all', 3, '2022-04-28 06:51:48'),
(3471, 'mrn', 'form', 3, '2022-04-28 06:52:18'),
(3472, 'mrn', 'all', 3, '2022-04-28 06:52:27'),
(3473, 'mrn', 'view', 3, '2022-04-28 06:52:44'),
(3474, 'mrn', 'all', 3, '2022-04-28 06:52:50'),
(3475, 'mrn', 'view', 3, '2022-04-28 06:52:52'),
(3476, 'opening_master', 'change_status', 3, '2022-04-28 06:52:54'),
(3477, 'mrn', 'view', 3, '2022-04-28 06:52:54'),
(3478, 'opening_master', 'change_status', 3, '2022-04-28 06:52:55'),
(3479, 'mrn', 'view', 3, '2022-04-28 06:52:55'),
(3480, 'opening_master', 'change_status', 3, '2022-04-28 06:52:55'),
(3481, 'mrn', 'view', 3, '2022-04-28 06:52:55'),
(3482, 'opening_master', 'all', 3, '2022-04-28 06:53:02'),
(3483, 'requisition', 'all', 3, '2022-04-28 06:53:33'),
(3484, 'requisition', 'view', 3, '2022-04-28 06:55:49'),
(3485, 'issue', 'all', 3, '2022-04-28 06:56:06'),
(3486, 'issue', 'direct_view', 3, '2022-04-28 06:56:08'),
(3487, 'requisition', 'view', 3, '2022-04-28 06:58:33'),
(3488, 'requisition', 'view', 3, '2022-04-28 06:58:42'),
(3489, 'issue', 'all', 3, '2022-04-28 06:58:55'),
(3490, 'issue', 'view', 3, '2022-04-28 06:58:57'),
(3491, 'requisition', 'view', 3, '2022-04-28 06:59:34'),
(3492, 'requisition', 'view', 3, '2022-04-28 06:59:47'),
(3493, 'requisition', 'view', 3, '2022-04-28 07:06:13'),
(3494, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:17'),
(3495, 'requisition', 'view', 3, '2022-04-28 07:06:17'),
(3496, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:22'),
(3497, 'requisition', 'view', 3, '2022-04-28 07:06:22'),
(3498, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:24'),
(3499, 'requisition', 'view', 3, '2022-04-28 07:06:24'),
(3500, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:25'),
(3501, 'requisition', 'view', 3, '2022-04-28 07:06:25'),
(3502, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:27'),
(3503, 'requisition', 'view', 3, '2022-04-28 07:06:27'),
(3504, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:29'),
(3505, 'requisition', 'view', 3, '2022-04-28 07:06:29'),
(3506, 'requisition', 'cancel_row', 3, '2022-04-28 07:06:30'),
(3507, 'requisition', 'view', 3, '2022-04-28 07:06:30'),
(3508, 'issue', 'form', 3, '2022-04-28 07:07:28'),
(3509, 'mrn', 'all', 3, '2022-04-28 08:34:54'),
(3510, 'mrn', 'view', 3, '2022-04-28 08:34:59'),
(3511, 'requisition', 'all', 3, '2022-04-28 08:35:14'),
(3512, 'requisition', 'view', 3, '2022-04-28 08:35:18'),
(3513, 'requisition', 'all', 3, '2022-04-28 08:35:21'),
(3514, 'issue', 'all', 3, '2022-04-28 08:37:51'),
(3515, 'requisition', 'view', 3, '2022-04-28 08:39:06'),
(3516, 'issue', 'view', 3, '2022-04-28 08:39:18'),
(3517, 'requisition', 'view', 3, '2022-04-28 08:45:36'),
(3518, 'requisition', 'all', 3, '2022-04-28 08:45:38'),
(3519, 'requisition', 'all', 3, '2022-04-28 08:46:47'),
(3520, 'requisition', 'view', 3, '2022-04-28 08:46:50'),
(3521, 'requisition', 'cancel_row', 3, '2022-04-28 08:46:55'),
(3522, 'requisition', 'view', 3, '2022-04-28 08:47:01'),
(3523, 'requisition', 'cancel_row', 3, '2022-04-28 08:47:14'),
(3524, 'requisition', 'view', 3, '2022-04-28 08:47:14'),
(3525, 'requisition', 'all', 3, '2022-04-28 08:49:59'),
(3526, 'opening_master', 'all', 3, '2022-04-28 08:53:16'),
(3527, 'opening_master', 'view', 3, '2022-04-28 08:53:21'),
(3528, 'requisition', 'view', 3, '2022-04-28 08:54:11'),
(3529, 'requisition', 'all', 3, '2022-04-28 08:54:21'),
(3530, 'requisition', 'view', 3, '2022-04-28 08:54:24'),
(3531, 'requisition', 'all', 3, '2022-04-28 08:54:27'),
(3532, 'requisition', 'view', 3, '2022-04-28 08:54:30'),
(3533, 'requisition', 'cancel_row', 3, '2022-04-28 08:54:34'),
(3534, 'requisition', 'cancel_row', 3, '2022-04-28 08:54:37'),
(3535, 'requisition', 'cancel_row', 3, '2022-04-28 08:54:38'),
(3536, 'requisition', 'cancel_row', 3, '2022-04-28 08:54:38'),
(3537, 'issue', 'all', 3, '2022-04-28 08:55:01'),
(3538, 'issue', 'view', 3, '2022-04-28 08:58:38'),
(3539, 'issue', 'view', 3, '2022-04-28 09:01:32'),
(3540, 'issue', 'view', 3, '2022-04-28 09:01:58'),
(3541, 'requisition', 'cancel_row', 3, '2022-04-28 09:02:02'),
(3542, 'issue', 'view', 3, '2022-04-28 09:02:02'),
(3543, 'issue', 'view', 3, '2022-04-28 09:02:05'),
(3544, 'issue', 'view', 3, '2022-04-28 09:02:45'),
(3545, 'requisition', 'cancel_row', 3, '2022-04-28 09:02:47'),
(3546, 'issue', 'view', 3, '2022-04-28 09:02:47'),
(3547, 'issue', 'view', 3, '2022-04-28 09:02:56'),
(3548, 'issue', 'view', 3, '2022-04-28 09:03:21'),
(3549, 'issue', 'view', 3, '2022-04-28 09:05:34'),
(3550, 'requisition', 'cancel_row', 3, '2022-04-28 09:05:36'),
(3551, 'issue', 'view', 3, '2022-04-28 09:09:55'),
(3552, 'requisition', 'cancel_row', 3, '2022-04-28 09:09:58'),
(3553, 'issue', 'view', 3, '2022-04-28 09:10:04'),
(3554, 'issue', 'direct_view', 3, '2022-04-28 09:10:14'),
(3555, 'requisition', 'cancel_row', 3, '2022-04-28 09:10:19'),
(3556, 'issue', 'direct_view', 3, '2022-04-28 09:11:03'),
(3557, 'requisition', 'cancel_row', 3, '2022-04-28 09:11:07'),
(3558, 'issue', 'direct_view', 3, '2022-04-28 09:11:07'),
(3559, 'issue', 'direct_view', 3, '2022-04-28 09:21:37'),
(3560, 'opening_master', 'change_status', 3, '2022-04-28 09:21:40'),
(3561, 'requisition', 'cancel_row', 3, '2022-04-28 09:21:46'),
(3562, 'issue', 'view', 3, '2022-04-28 09:21:51'),
(3563, 'opening_master', 'change_status', 3, '2022-04-28 09:26:08'),
(3564, 'requisition', 'cancel_row', 3, '2022-04-28 09:26:11'),
(3565, 'issue', 'view', 3, '2022-04-28 09:26:31'),
(3566, 'issue', 'direct_view', 3, '2022-04-28 09:26:32'),
(3567, 'opening_master', 'change_status', 3, '2022-04-28 09:26:38'),
(3568, 'requisition', 'cancel_row', 3, '2022-04-28 09:26:46'),
(3569, 'opening_master', 'change_status', 3, '2022-04-28 09:26:49'),
(3570, 'issue', 'direct_view', 3, '2022-04-28 09:27:02'),
(3571, 'opening_master', 'change_status', 3, '2022-04-28 09:27:05'),
(3572, 'requisition', 'cancel_row', 3, '2022-04-28 09:27:11'),
(3573, 'opening_master', 'all', 3, '2022-04-28 09:27:25'),
(3574, 'opening_master', 'view', 3, '2022-04-28 09:28:30'),
(3575, 'opening_master', 'all', 3, '2022-04-28 09:28:42'),
(3576, 'opening_master', 'view', 3, '2022-04-28 09:28:50'),
(3577, 'opening_master', 'view', 3, '2022-04-28 09:30:42'),
(3578, 'opening_master', 'view', 3, '2022-04-28 09:30:49'),
(3579, 'requisition', 'cancel_row', 3, '2022-04-28 09:30:53'),
(3580, 'requisition', 'cancel_row', 3, '2022-04-28 09:30:59'),
(3581, 'opening_master', 'view', 3, '2022-04-28 09:30:59'),
(3582, 'opening_master', 'change_status', 3, '2022-04-28 09:31:02'),
(3583, 'opening_master', 'opening_post', 3, '2022-04-28 09:31:06'),
(3584, 'opening_master', 'change_status', 3, '2022-04-28 09:31:09'),
(3585, 'opening_master', 'view', 3, '2022-04-28 09:31:21'),
(3586, 'opening_master', 'view', 3, '2022-04-28 09:31:21'),
(3587, 'requisition', 'cancel_row', 3, '2022-04-28 09:31:25'),
(3588, 'opening_master', 'change_status', 3, '2022-04-28 09:31:29'),
(3589, 'requisition', 'cancel_row', 3, '2022-04-28 09:31:31'),
(3590, 'opening_master', 'view', 3, '2022-04-28 09:31:31'),
(3591, 'requisition', 'cancel_row', 3, '2022-04-28 09:31:32'),
(3592, 'opening_master', 'view', 3, '2022-04-28 09:31:32'),
(3593, 'requisition', 'cancel_row', 3, '2022-04-28 09:31:33'),
(3594, 'opening_master', 'view', 3, '2022-04-28 09:31:33'),
(3595, 'requisition', 'cancel_row', 3, '2022-04-28 09:31:34'),
(3596, 'opening_master', 'view', 3, '2022-04-28 09:31:34'),
(3597, 'requisition', 'all', 3, '2022-04-28 09:31:41'),
(3598, 'requisition', 'view', 3, '2022-04-28 09:32:09'),
(3599, 'requisition', 'view', 3, '2022-04-28 09:32:10'),
(3600, 'requisition', 'cancel_row', 3, '2022-04-28 09:32:16'),
(3601, 'opening_master', 'change_status', 3, '2022-04-28 09:32:19'),
(3602, 'requisition', 'view', 3, '2022-04-28 09:32:24'),
(3603, 'opening_master', 'change_status', 3, '2022-04-28 09:32:40'),
(3604, 'opening_master', 'change_status', 3, '2022-04-28 09:32:42'),
(3605, 'opening_master', 'change_status', 3, '2022-04-28 09:32:43'),
(3606, 'requisition', 'view', 3, '2022-04-28 09:33:56'),
(3607, 'opening_master', 'change_status', 3, '2022-04-28 09:33:59'),
(3608, 'requisition', 'view', 3, '2022-04-28 09:33:59'),
(3609, 'opening_master', 'change_status', 3, '2022-04-28 09:34:01'),
(3610, 'requisition', 'view', 3, '2022-04-28 09:34:01'),
(3611, 'opening_master', 'change_status', 3, '2022-04-28 09:34:01'),
(3612, 'requisition', 'view', 3, '2022-04-28 09:34:01'),
(3613, 'requisition', 'cancel_row', 3, '2022-04-28 09:34:02'),
(3614, 'requisition', 'view', 3, '2022-04-28 09:34:24'),
(3615, 'requisition', 'cancel_row', 3, '2022-04-28 09:34:29'),
(3616, 'requisition', 'view', 3, '2022-04-28 09:34:29'),
(3617, 'opening_master', 'change_status', 3, '2022-04-28 09:34:31'),
(3618, 'opening_master', 'change_status', 3, '2022-04-28 09:34:34'),
(3619, 'requisition', 'view', 3, '2022-04-28 09:34:41'),
(3620, 'opening_master', 'change_status', 3, '2022-04-28 09:34:44'),
(3621, 'requisition', 'cancel_row', 3, '2022-04-28 09:34:47'),
(3622, 'opening_master', 'change_status', 3, '2022-04-28 09:34:48'),
(3623, 'requisition', 'view', 3, '2022-04-28 09:34:48'),
(3624, 'issue', 'all', 3, '2022-04-28 09:35:00'),
(3625, 'issue', 'direct_view', 3, '2022-04-28 09:35:08'),
(3626, 'issue', 'view', 3, '2022-04-28 09:35:09'),
(3627, 'requisition', 'cancel_row', 3, '2022-04-28 09:35:20'),
(3628, 'opening_master', 'change_status', 3, '2022-04-28 09:35:40'),
(3629, 'opening_master', 'change_status', 3, '2022-04-28 09:35:44'),
(3630, 'issue', 'view', 3, '2022-04-28 09:35:44'),
(3631, 'requisition', 'cancel_row', 3, '2022-04-28 09:35:45'),
(3632, 'issue', 'issue_post', 3, '2022-04-28 09:35:47'),
(3633, 'issue', 'view', 3, '2022-04-28 09:35:47'),
(3634, 'issue', 'issue_post', 3, '2022-04-28 09:35:52'),
(3635, 'issue', 'direct_view', 3, '2022-04-28 09:35:52'),
(3636, 'mrn', 'all', 3, '2022-04-28 09:36:08'),
(3637, 'mrn', 'view', 3, '2022-04-28 09:36:13'),
(3638, 'mrn', 'view', 3, '2022-04-28 09:36:14'),
(3639, 'requisition', 'all', 3, '2022-04-28 09:36:23'),
(3640, 'mrn', 'all', 3, '2022-04-28 09:37:46'),
(3641, 'opening_master', 'all', 3, '2022-04-28 09:45:32'),
(3642, 'requisition', 'all', 3, '2022-04-28 10:01:27'),
(3643, 'issue', 'all', 3, '2022-04-28 10:01:35'),
(3644, 'issue', 'view', 3, '2022-04-28 10:01:39'),
(3645, 'requisition', 'cancel_row', 3, '2022-04-28 10:01:43'),
(3646, 'issue', 'issue_post', 3, '2022-04-28 10:01:47'),
(3647, 'issue', 'view', 3, '2022-04-28 10:01:47'),
(3648, 'opening_master', 'change_status', 3, '2022-04-28 10:01:48'),
(3649, 'issue', 'view', 3, '2022-04-28 10:01:48'),
(3650, 'issue', 'all', 3, '2022-04-28 10:01:55'),
(3651, 'issue', 'direct_view', 3, '2022-04-28 10:01:59'),
(3652, 'issue', 'issue_post', 3, '2022-04-28 10:02:16'),
(3653, 'issue', 'direct_view', 3, '2022-04-28 10:02:16'),
(3654, 'opening_master', 'change_status', 3, '2022-04-28 10:02:17'),
(3655, 'issue', 'view', 3, '2022-04-28 10:02:25'),
(3656, 'requisition', 'cancel_row', 3, '2022-04-28 10:02:28'),
(3657, 'opening_master', 'all', 3, '2022-04-28 10:02:32'),
(3658, 'opening_master', 'view', 3, '2022-04-28 10:02:35'),
(3659, 'opening_master', 'view', 3, '2022-04-28 10:02:36'),
(3660, 'opening_master', 'change_status', 3, '2022-04-28 10:02:40'),
(3661, 'requisition', 'cancel_row', 3, '2022-04-28 10:02:42'),
(3662, 'opening_master', 'view', 3, '2022-04-28 10:02:42'),
(3663, 'requisition', 'cancel_row', 3, '2022-04-28 10:02:45'),
(3664, 'opening_master', 'opening_post', 3, '2022-04-28 10:02:47'),
(3665, 'opening_master', 'opening_post', 3, '2022-04-28 10:02:49'),
(3666, 'requisition', 'all', 3, '2022-04-28 10:03:00'),
(3667, 'requisition', 'view', 3, '2022-04-28 10:03:03'),
(3668, 'requisition', 'view', 3, '2022-04-28 10:03:04'),
(3669, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:08'),
(3670, 'requisition', 'view', 3, '2022-04-28 10:03:08'),
(3671, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:10'),
(3672, 'requisition', 'view', 3, '2022-04-28 10:03:10'),
(3673, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:12'),
(3674, 'requisition', 'view', 3, '2022-04-28 10:03:12'),
(3675, 'opening_master', 'change_status', 3, '2022-04-28 10:03:13'),
(3676, 'opening_master', 'change_status', 3, '2022-04-28 10:03:20'),
(3677, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:22'),
(3678, 'requisition', 'view', 3, '2022-04-28 10:03:22'),
(3679, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:24'),
(3680, 'requisition', 'view', 3, '2022-04-28 10:03:24'),
(3681, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:27'),
(3682, 'requisition', 'view', 3, '2022-04-28 10:03:27'),
(3683, 'requisition', 'cancel_row', 3, '2022-04-28 10:03:33'),
(3684, 'opening_master', 'change_status', 3, '2022-04-28 10:03:34'),
(3685, 'requisition', 'view', 3, '2022-04-28 10:03:34'),
(3686, 'mrn', 'all', 3, '2022-04-28 10:03:45'),
(3687, 'mrn', 'view', 3, '2022-04-28 10:03:57'),
(3688, 'mrn', 'view', 3, '2022-04-28 10:03:58'),
(3689, 'mrn', 'all', 3, '2022-04-28 10:05:14'),
(3690, 'mrn', 'view', 3, '2022-04-28 10:05:15'),
(3691, 'mrn', 'view', 3, '2022-04-28 10:05:19'),
(3692, 'requisition', 'cancel_row', 3, '2022-04-28 10:05:31'),
(3693, 'opening_master', 'change_status', 3, '2022-04-28 10:05:34'),
(3694, 'mrn', 'view', 3, '2022-04-28 10:05:34'),
(3695, 'mrn', 'view', 3, '2022-04-28 10:05:51'),
(3696, 'mrn', 'view', 3, '2022-04-28 10:05:53'),
(3697, 'requisition', 'cancel_row', 3, '2022-04-28 10:05:56'),
(3698, 'opening_master', 'change_status', 3, '2022-04-28 10:05:58'),
(3699, 'mrn', 'view', 3, '2022-04-28 10:05:58'),
(3700, 'requisition', 'cancel_row', 3, '2022-04-28 10:06:00'),
(3701, 'mrn', 'view', 3, '2022-04-28 10:06:06'),
(3702, 'requisition', 'cancel_row', 3, '2022-04-28 10:06:09'),
(3703, 'mrn', 'view', 3, '2022-04-28 10:06:27'),
(3704, 'mrn', 'view', 3, '2022-04-28 10:06:29'),
(3705, 'requisition', 'cancel_row', 3, '2022-04-28 10:06:31'),
(3706, 'requisition', 'cancel_row', 3, '2022-04-28 10:06:35'),
(3707, 'mrn', 'view', 3, '2022-04-28 10:06:35'),
(3708, 'mrn', 'view', 3, '2022-04-28 10:06:37'),
(3709, 'opening_master', 'change_status', 3, '2022-04-28 10:06:41'),
(3710, 'requisition', 'cancel_row', 3, '2022-04-28 10:06:44'),
(3711, 'mrn', 'view', 3, '2022-04-28 10:09:26'),
(3712, 'mrn', 'view', 3, '2022-04-28 10:09:27'),
(3713, 'opening_master', 'change_status', 3, '2022-04-28 10:09:30'),
(3714, 'requisition', 'cancel_row', 3, '2022-04-28 10:09:32'),
(3715, 'mrn', 'view', 3, '2022-04-28 10:09:32'),
(3716, 'opening_master', 'change_status', 3, '2022-04-28 10:09:34'),
(3717, 'mrn', 'view', 3, '2022-04-28 10:09:34'),
(3718, 'requisition', 'cancel_row', 3, '2022-04-28 10:09:35'),
(3719, 'opening_master', 'change_status', 3, '2022-04-28 10:24:28'),
(3720, 'requisition', 'cancel_row', 3, '2022-04-28 10:24:41'),
(3721, 'mrn', 'view', 3, '2022-04-28 10:24:41'),
(3722, 'issue_return', 'all', 3, '2022-04-28 10:24:45'),
(3723, 'issue_return', 'add', 3, '2022-04-28 10:24:50'),
(3724, 'issue_return', 'form', 3, '2022-04-28 10:24:50'),
(3725, 'issue_return', 'form', 3, '2022-04-28 10:25:09'),
(3726, 'issue_return', 'add', 3, '2022-04-28 10:25:09'),
(3727, 'issue_return', 'all', 3, '2022-04-28 10:26:37'),
(3728, 'mrn', 'all', 3, '2022-04-28 10:35:29'),
(3729, 'issue_return', 'add', 3, '2022-04-28 10:35:30'),
(3730, 'issue', 'form', 3, '2022-04-28 10:35:53'),
(3731, 'issue', 'form', 3, '2022-04-28 10:35:58'),
(3732, 'issue', 'add', 3, '2022-04-28 10:35:58'),
(3733, 'issue', 'form', 3, '2022-04-28 10:37:20'),
(3734, 'issue', 'form', 3, '2022-04-28 10:49:15'),
(3735, 'issue', 'form', 3, '2022-04-28 10:49:23'),
(3736, 'issue', 'add', 3, '2022-04-28 10:49:23'),
(3737, 'issue', 'form', 3, '2022-04-28 10:51:08'),
(3738, 'issue', 'form', 3, '2022-04-28 10:51:41'),
(3739, 'purchase_request', 'form', 3, '2022-04-28 10:52:30'),
(3740, 'purchase_request', 'form', 3, '2022-04-28 10:58:27'),
(3741, 'purchase_request', 'form', 3, '2022-04-28 10:58:45'),
(3742, 'purchase_request', 'form', 3, '2022-04-28 10:59:08'),
(3743, 'purchase_request', 'form', 3, '2022-04-28 10:59:40'),
(3744, 'purchase_request', 'form', 3, '2022-04-28 11:01:15'),
(3745, 'purchase_request', 'form', 3, '2022-04-28 11:02:06'),
(3746, 'purchase_request', 'form', 3, '2022-04-28 11:17:44'),
(3747, 'purchase_request', 'form', 3, '2022-04-28 11:18:26'),
(3748, 'purchase_request', 'form', 3, '2022-04-28 11:19:50'),
(3749, 'purchase_request', 'form', 3, '2022-04-28 11:20:07'),
(3750, 'purchase_request', 'form', 3, '2022-04-28 11:20:49'),
(3751, 'purchase_request', 'form', 3, '2022-04-28 11:21:28'),
(3752, 'purchase_request', 'form', 3, '2022-04-28 11:22:04'),
(3753, 'purchase_request', 'form', 3, '2022-04-28 11:32:10'),
(3754, 'purchase_request', 'form', 3, '2022-04-28 11:32:58'),
(3755, 'purchase_request', 'form', 3, '2022-04-28 11:33:39'),
(3756, 'purchase_request', 'form', 3, '2022-04-28 11:34:20'),
(3757, 'purchase_request', 'form', 3, '2022-04-28 11:34:48'),
(3758, 'purchase_request', 'form', 3, '2022-04-28 11:36:06'),
(3759, 'purchase_request', 'form', 3, '2022-04-28 11:36:57'),
(3760, 'purchase_request', 'form', 3, '2022-04-28 11:37:27'),
(3761, 'purchase_request', 'form', 3, '2022-04-28 11:38:14'),
(3762, 'purchase_request', 'form', 3, '2022-04-28 11:39:47'),
(3763, 'purchase_request', 'form', 3, '2022-04-28 11:40:26'),
(3764, 'mrn', 'all', 3, '2022-04-28 11:40:43'),
(3765, 'mrn', 'all', 3, '2022-04-28 11:42:03'),
(3766, 'purchase_request', 'form', 3, '2022-04-28 11:42:18'),
(3767, 'purchase_request', 'form', 3, '2022-04-28 11:46:59'),
(3768, 'purchase_request', 'form', 3, '2022-04-28 11:47:10'),
(3769, 'purchase_request', 'form', 3, '2022-04-28 11:48:10'),
(3770, 'purchase_request', 'add', 3, '2022-04-28 11:48:10'),
(3771, 'purchase_request', 'form', 3, '2022-04-28 11:48:34'),
(3772, 'purchase_request', 'form', 3, '2022-04-28 11:48:38'),
(3773, 'purchase_request', 'direct_add', 3, '2022-04-28 11:48:39'),
(3774, 'issue', 'getForm', 3, '2022-04-28 11:48:45'),
(3775, 'issue', 'getForm', 3, '2022-04-28 11:48:48'),
(3776, 'issue', 'getForm', 3, '2022-04-28 11:48:51'),
(3777, 'dashboard', NULL, 3, '2022-04-29 05:10:53'),
(3778, 'mrn', 'all', 3, '2022-04-29 05:10:58'),
(3779, 'mrn', 'view', 3, '2022-04-29 05:11:01'),
(3780, 'opening_master', 'change_status', 3, '2022-04-29 05:11:05'),
(3781, 'issue_return', 'all', 3, '2022-04-29 05:11:27'),
(3782, 'issue_return', 'all', 3, '2022-04-29 05:11:38'),
(3783, 'issue', 'all', 3, '2022-04-29 05:11:46'),
(3784, 'issue', 'view', 3, '2022-04-29 05:11:52'),
(3785, 'issue_return', 'all', 3, '2022-04-29 05:12:04'),
(3786, 'issue', 'issue_post', 3, '2022-04-29 05:12:15'),
(3787, 'issue', 'view', 3, '2022-04-29 05:12:15'),
(3788, 'requisition', 'cancel_row', 3, '2022-04-29 05:12:16'),
(3789, 'opening_master', 'change_status', 3, '2022-04-29 05:12:21'),
(3790, 'issue', 'view', 3, '2022-04-29 05:12:21'),
(3791, 'issue', 'view', 3, '2022-04-29 05:30:58'),
(3792, 'issue', 'view', 3, '2022-04-29 05:31:05'),
(3793, 'issue', 'direct_view', 3, '2022-04-29 05:31:06'),
(3794, 'opening_master', 'change_status', 3, '2022-04-29 05:31:17'),
(3795, 'requisition', 'cancel_row', 3, '2022-04-29 05:38:47'),
(3796, 'requisition', 'cancel_row', 3, '2022-04-29 05:39:43'),
(3797, 'issue', 'direct_view', 3, '2022-04-29 05:39:43'),
(3798, 'opening_master', 'change_status', 3, '2022-04-29 05:39:45'),
(3799, 'issue', 'issue_post', 3, '2022-04-29 05:39:47'),
(3800, 'issue', 'direct_view', 3, '2022-04-29 05:39:47');
INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(3801, 'issue', 'direct_view', 3, '2022-04-29 05:41:35'),
(3802, 'issue', 'issue_post', 3, '2022-04-29 05:41:39'),
(3803, 'issue', 'direct_view', 3, '2022-04-29 05:41:39'),
(3804, 'opening_master', 'change_status', 3, '2022-04-29 05:41:42'),
(3805, 'issue', 'direct_view', 3, '2022-04-29 05:41:42'),
(3806, 'requisition', 'cancel_row', 3, '2022-04-29 05:41:45'),
(3807, 'requisition', 'cancel_row', 3, '2022-04-29 05:42:04'),
(3808, 'issue', 'direct_view', 3, '2022-04-29 05:42:42'),
(3809, 'issue', 'issue_post', 3, '2022-04-29 05:42:45'),
(3810, 'issue', 'direct_view', 3, '2022-04-29 05:42:45'),
(3811, 'opening_master', 'change_status', 3, '2022-04-29 05:42:50'),
(3812, 'issue', 'direct_view', 3, '2022-04-29 05:42:50'),
(3813, 'requisition', 'cancel_row', 3, '2022-04-29 05:42:53'),
(3814, 'requisition', 'all', 3, '2022-04-29 05:43:10'),
(3815, 'requisition', 'view', 3, '2022-04-29 05:43:14'),
(3816, 'opening_master', 'change_status', 3, '2022-04-29 05:43:22'),
(3817, 'issue', 'direct_view', 3, '2022-04-29 05:46:16'),
(3818, 'requisition', 'cancel_row', 3, '2022-04-29 05:46:55'),
(3819, 'issue', 'issue_post', 3, '2022-04-29 05:46:58'),
(3820, 'issue', 'direct_view', 3, '2022-04-29 05:46:58'),
(3821, 'issue', 'direct_view', 3, '2022-04-29 05:46:58'),
(3822, 'dashboard', NULL, 3, '2022-04-29 08:30:10'),
(3823, 'opening_master', 'all', 3, '2022-04-29 08:30:17'),
(3824, 'opening_master', 'form', 3, '2022-04-29 08:30:19'),
(3825, 'opening_master', 'form', 3, '2022-04-29 09:05:39'),
(3826, 'opening_master', 'form', 3, '2022-04-29 09:36:21'),
(3827, 'requisition', 'form', 3, '2022-04-29 09:45:31'),
(3828, 'issue', 'all', 3, '2022-04-29 10:05:02'),
(3829, 'issue', 'form', 3, '2022-04-29 10:05:05'),
(3830, 'issue', 'form', 3, '2022-04-29 10:05:09'),
(3831, 'issue', 'direct_add', 3, '2022-04-29 10:05:09'),
(3832, 'issue', 'form', 3, '2022-04-29 10:05:13'),
(3833, 'opening_master', 'form', 3, '2022-04-29 10:16:26'),
(3834, 'issue', 'view', 3, '2022-04-29 10:16:42'),
(3835, 'issue', 'direct_view', 3, '2022-04-29 10:16:46'),
(3836, 'issue', 'view', 3, '2022-04-29 10:26:11'),
(3837, 'issue', 'direct_view', 3, '2022-04-29 10:26:22'),
(3838, 'issue', 'direct_view', 3, '2022-04-29 10:28:26'),
(3839, 'issue', 'direct_view', 3, '2022-04-29 10:29:28'),
(3840, 'issue', 'view', 3, '2022-04-29 10:29:29'),
(3841, 'dashboard', NULL, 3, '2022-05-01 05:10:20'),
(3842, 'issue', 'all', 3, '2022-05-01 05:10:48'),
(3843, 'issue', 'view', 3, '2022-05-01 05:10:51'),
(3844, 'issue', 'direct_view', 3, '2022-05-01 05:11:00'),
(3845, 'issue', 'issue_post', 3, '2022-05-01 05:11:05'),
(3846, 'issue', 'direct_view', 3, '2022-05-01 05:11:05'),
(3847, 'requisition', 'cancel_row', 3, '2022-05-01 05:11:06'),
(3848, 'issue', 'direct_view', 3, '2022-05-01 05:11:06'),
(3849, 'opening_master', 'change_status', 3, '2022-05-01 05:11:09'),
(3850, 'issue', 'direct_view', 3, '2022-05-01 05:11:51'),
(3851, 'issue', 'direct_view', 3, '2022-05-01 05:13:16'),
(3852, 'dashboard', NULL, 3, '2022-05-01 09:58:18'),
(3853, 'issue', 'all', 3, '2022-05-01 09:58:23'),
(3854, 'issue', 'direct_view', 3, '2022-05-01 09:58:26'),
(3855, 'issue', 'issue_post', 3, '2022-05-01 09:58:29'),
(3856, 'issue', 'direct_view', 3, '2022-05-01 09:58:29'),
(3857, 'opening_master', 'change_status', 3, '2022-05-01 09:58:31'),
(3858, 'issue', 'direct_view', 3, '2022-05-01 09:58:31'),
(3859, 'issue', 'direct_view', 3, '2022-05-01 10:09:11'),
(3860, 'issue', 'issue_post', 3, '2022-05-01 10:09:20'),
(3861, 'issue', 'direct_view', 3, '2022-05-01 10:09:20'),
(3862, 'issue', 'direct_view', 3, '2022-05-01 10:09:20'),
(3863, 'dashboard', NULL, 3, '2022-05-01 10:09:42'),
(3864, 'issue', 'view', 3, '2022-05-01 10:36:53'),
(3865, 'issue', 'all', 3, '2022-05-01 10:36:55'),
(3866, 'issue', 'view', 3, '2022-05-01 10:36:57'),
(3867, 'issue', 'form', 3, '2022-05-01 10:38:05'),
(3868, 'purchase_request', 'form', 3, '2022-05-01 10:38:15'),
(3869, 'purchase_request', 'form', 3, '2022-05-01 10:38:23'),
(3870, 'purchase_request', 'direct_add', 3, '2022-05-01 10:38:23'),
(3871, 'requisition', 'getStaffOfDepartment', 3, '2022-05-01 10:53:22'),
(3872, 'mrn', 'all', 3, '2022-05-01 10:55:55'),
(3873, 'purchase_request', 'direct_add', 3, '2022-05-01 10:56:52'),
(3874, 'dashboard', NULL, 3, '2022-05-02 06:45:34'),
(3875, 'issue', 'all', 3, '2022-05-02 06:45:43'),
(3876, 'issue', 'form', 3, '2022-05-02 06:47:21'),
(3877, 'purchase_request', 'form', 3, '2022-05-02 06:47:29'),
(3878, 'purchase_request', 'form', 3, '2022-05-02 06:49:25'),
(3879, 'purchase_request', 'direct_add', 3, '2022-05-02 06:49:25'),
(3880, 'purchase_request', 'direct_add', 3, '2022-05-02 06:52:27'),
(3881, 'purchase_request', 'direct_add', 3, '2022-05-02 06:53:27'),
(3882, 'purchase_request', 'direct_add', 3, '2022-05-02 07:09:57'),
(3883, 'issue', 'getForm', 3, '2022-05-02 07:10:04'),
(3884, 'issue', 'getForm', 3, '2022-05-02 08:35:41'),
(3885, 'purchase_request', 'direct_add', 3, '2022-05-02 08:50:50'),
(3886, 'purchase_request', 'getForm', 3, '2022-05-02 08:50:53'),
(3887, 'purchase_request', 'getForm', 3, '2022-05-02 08:51:00'),
(3888, 'purchase_request', 'getForm', 3, '2022-05-02 08:51:04'),
(3889, 'purchase_request', 'direct_add', 3, '2022-05-02 08:52:28'),
(3890, 'purchase_request', 'getForm', 3, '2022-05-02 08:52:31'),
(3891, 'purchase_request', 'getForm', 3, '2022-05-02 08:52:34'),
(3892, 'purchase_request', 'getForm', 3, '2022-05-02 08:52:36'),
(3893, 'purchase_request', 'direct_add', 3, '2022-05-02 08:56:12'),
(3894, 'purchase_request', 'getForm', 3, '2022-05-02 08:56:15'),
(3895, 'purchase_request', 'getForm', 3, '2022-05-02 08:56:18'),
(3896, 'purchase_request', 'direct_add', 3, '2022-05-02 08:56:27'),
(3897, 'purchase_request', 'direct_add', 3, '2022-05-02 08:58:38'),
(3898, 'purchase_request', 'getForm', 3, '2022-05-02 08:58:41'),
(3899, 'purchase_request', 'getForm', 3, '2022-05-02 08:58:44'),
(3900, 'purchase_request', 'getForm', 3, '2022-05-02 08:58:46'),
(3901, 'purchase_request', 'direct_add', 3, '2022-05-02 08:59:15'),
(3902, 'purchase_request', 'direct_add', 3, '2022-05-02 09:02:53'),
(3903, 'purchase_request', 'getForm', 3, '2022-05-02 09:02:57'),
(3904, 'purchase_request', 'getForm', 3, '2022-05-02 09:03:00'),
(3905, 'purchase_request', 'getForm', 3, '2022-05-02 09:06:41'),
(3906, 'purchase_request', 'direct_add', 3, '2022-05-02 09:08:34'),
(3907, 'purchase_request', 'direct_add', 3, '2022-05-02 09:09:10'),
(3908, 'purchase_request', 'direct_add', 3, '2022-05-02 09:09:24'),
(3909, 'purchase_request', 'direct_add', 3, '2022-05-02 09:10:02'),
(3910, 'purchase_request', 'direct_add', 3, '2022-05-02 09:10:23'),
(3911, 'purchase_request', 'getForm', 3, '2022-05-02 09:10:29'),
(3912, 'purchase_request', 'getForm', 3, '2022-05-02 09:10:32'),
(3913, 'purchase_request', 'getForm', 3, '2022-05-02 09:10:34'),
(3914, 'purchase_request', 'direct_add', 3, '2022-05-02 09:14:33'),
(3915, 'purchase_request', 'getForm', 3, '2022-05-02 09:14:36'),
(3916, 'purchase_request', 'getForm', 3, '2022-05-02 09:14:37'),
(3917, 'purchase_request', 'getForm', 3, '2022-05-02 09:14:39'),
(3918, 'requisition', 'getStaffOfDepartment', 3, '2022-05-02 09:14:49'),
(3919, 'purchase_request', 'direct_add', 3, '2022-05-02 09:15:28'),
(3920, 'purchase_request', 'direct_add', 3, '2022-05-02 09:16:38'),
(3921, 'purchase_request', 'getForm', 3, '2022-05-02 09:16:42'),
(3922, 'requisition', 'getStaffOfDepartment', 3, '2022-05-02 09:16:56'),
(3923, 'purchase_request', 'direct_add', 3, '2022-05-02 09:26:42'),
(3924, 'requisition', 'getStaffOfDepartment', 3, '2022-05-02 09:26:47'),
(3925, 'purchase_request', 'getForm', 3, '2022-05-02 09:26:59'),
(3926, 'purchase_request', 'getForm', 3, '2022-05-02 09:27:00'),
(3927, 'purchase_request', 'getForm', 3, '2022-05-02 09:27:01'),
(3928, 'purchase_request', 'direct_add', 3, '2022-05-02 09:28:57'),
(3929, 'requisition', 'getStaffOfDepartment', 3, '2022-05-02 09:29:01'),
(3930, 'purchase_request', 'getForm', 3, '2022-05-02 09:29:07'),
(3931, 'purchase_request', 'getForm', 3, '2022-05-02 09:29:09'),
(3932, 'purchase_request', 'getForm', 3, '2022-05-02 09:29:10'),
(3933, 'purchase_request', 'direct_add', 3, '2022-05-02 09:29:41'),
(3934, 'purchase_request', 'direct_add', 3, '2022-05-02 09:30:01'),
(3935, 'purchase_request', 'direct_add', 3, '2022-05-02 09:30:36'),
(3936, 'requisition', 'getStaffOfDepartment', 3, '2022-05-02 09:30:40'),
(3937, 'purchase_request', 'getForm', 3, '2022-05-02 09:30:48'),
(3938, 'purchase_request', 'getForm', 3, '2022-05-02 09:30:49'),
(3939, 'purchase_request', 'getForm', 3, '2022-05-02 09:30:51'),
(3940, 'purchase_request', 'direct_add', 3, '2022-05-02 09:32:36'),
(3941, 'purchase_request', 'all', 3, '2022-05-02 09:32:36'),
(3942, 'purchase_request', 'all', 3, '2022-05-02 09:48:09'),
(3943, 'purchase_request', 'direct_add', 3, '2022-05-02 09:48:22'),
(3944, 'purchase_request', 'direct_add', 3, '2022-05-02 09:48:33'),
(3945, 'purchase_request', 'direct_add', 3, '2022-05-02 09:49:00'),
(3946, 'purchase_request', 'direct_add', 3, '2022-05-02 09:49:41'),
(3947, 'purchase_request', 'direct_add', 3, '2022-05-02 09:49:44'),
(3948, 'purchase_request', 'getForm', 3, '2022-05-02 09:49:52'),
(3949, 'purchase_request', 'getForm', 3, '2022-05-02 09:49:53'),
(3950, 'purchase_request', 'getForm', 3, '2022-05-02 09:49:54'),
(3951, 'purchase_request', 'direct_add', 3, '2022-05-02 09:50:19'),
(3952, 'purchase_request', 'direct_add', 3, '2022-05-02 09:50:42'),
(3953, 'purchase_request', 'all', 3, '2022-05-02 09:50:42'),
(3954, 'purchase_request', 'direct_add', 3, '2022-05-02 09:50:44'),
(3955, 'purchase_request', 'direct_add', 3, '2022-05-02 09:52:16'),
(3956, 'issue', 'all', 3, '2022-05-02 09:52:27'),
(3957, 'issue', 'edit', 3, '2022-05-02 09:52:31'),
(3958, 'purchase_request', 'all', 3, '2022-05-02 09:53:06'),
(3959, 'purchase_request', 'direct_add', 3, '2022-05-02 09:53:09'),
(3960, 'purchase_request', 'all', 3, '2022-05-02 09:53:15'),
(3961, 'purchase_request', 'form', 3, '2022-05-02 09:59:33'),
(3962, 'purchase_request', 'form', 3, '2022-05-02 10:02:23'),
(3963, 'purchase_request', 'form', 3, '2022-05-02 10:02:30'),
(3964, 'purchase_request', 'add', 3, '2022-05-02 10:02:31'),
(3965, 'purchase_request', 'form', 3, '2022-05-02 10:02:44'),
(3966, 'purchase_request', 'add', 3, '2022-05-02 10:02:44'),
(3967, 'purchase_request', 'form', 3, '2022-05-02 10:03:34'),
(3968, 'purchase_request', 'form', 3, '2022-05-02 10:03:38'),
(3969, 'purchase_request', 'add', 3, '2022-05-02 10:03:38'),
(3970, 'purchase_request', 'form', 3, '2022-05-02 10:03:38'),
(3971, 'purchase_request', 'form', 3, '2022-05-02 10:05:25'),
(3972, 'purchase_request', 'form', 3, '2022-05-02 10:05:34'),
(3973, 'purchase_request', 'add', 3, '2022-05-02 10:05:34'),
(3974, 'purchase_request', 'form', 3, '2022-05-02 10:05:34'),
(3975, 'purchase_request', 'form', 3, '2022-05-02 10:06:20'),
(3976, 'purchase_request', 'form', 3, '2022-05-02 10:06:24'),
(3977, 'purchase_request', 'form', 3, '2022-05-02 10:07:05'),
(3978, 'purchase_request', 'form', 3, '2022-05-02 10:07:41'),
(3979, 'purchase_request', 'add', 3, '2022-05-02 10:07:41'),
(3980, 'purchase_request', 'add', 3, '2022-05-02 10:08:18'),
(3981, 'purchase_request', 'form', 3, '2022-05-02 10:08:21'),
(3982, 'purchase_request', 'add', 3, '2022-05-02 10:08:21'),
(3983, 'purchase_request', 'form', 3, '2022-05-02 10:08:28'),
(3984, 'purchase_request', 'add', 3, '2022-05-02 10:08:28'),
(3985, 'purchase_request', 'form', 3, '2022-05-02 10:29:43'),
(3986, 'purchase_request', 'form', 3, '2022-05-02 10:29:48'),
(3987, 'purchase_request', 'add', 3, '2022-05-02 10:29:48'),
(3988, 'purchase_request', 'form', 3, '2022-05-02 10:30:33'),
(3989, 'purchase_request', 'form', 3, '2022-05-02 10:30:37'),
(3990, 'purchase_request', 'direct_add', 3, '2022-05-02 10:30:38'),
(3991, 'purchase_request', 'form', 3, '2022-05-02 10:30:40'),
(3992, 'purchase_request', 'add', 3, '2022-05-02 10:30:40'),
(3993, 'purchase_request', 'add', 3, '2022-05-02 10:33:43'),
(3994, 'purchase_request', 'add', 3, '2022-05-02 10:34:19'),
(3995, 'purchase_request', 'add', 3, '2022-05-02 10:37:29'),
(3996, 'purchase_request', 'add', 3, '2022-05-02 10:38:31'),
(3997, 'purchase_request', 'add', 3, '2022-05-02 10:42:05'),
(3998, 'purchase_request', 'add', 3, '2022-05-02 10:42:13'),
(3999, 'purchase_request', 'add', 3, '2022-05-02 10:45:28'),
(4000, 'purchase_request', 'add', 3, '2022-05-02 10:45:54'),
(4001, 'purchase_request', 'form', 3, '2022-05-02 10:46:02'),
(4002, 'purchase_request', 'form', 3, '2022-05-02 10:46:10'),
(4003, 'purchase_request', 'add', 3, '2022-05-02 10:46:10'),
(4004, 'purchase_request', 'form', 3, '2022-05-02 10:46:14'),
(4005, 'purchase_request', 'add', 3, '2022-05-02 10:46:14'),
(4006, 'purchase_request', 'add', 3, '2022-05-02 10:51:18'),
(4007, 'purchase_request', 'add', 3, '2022-05-02 10:51:23'),
(4008, 'purchase_request', 'add', 3, '2022-05-02 10:54:17'),
(4009, 'purchase_request', 'add', 3, '2022-05-02 10:57:14'),
(4010, 'purchase_request', 'add', 3, '2022-05-02 10:57:29'),
(4011, 'dashboard', NULL, 3, '2022-05-04 09:22:41'),
(4012, 'issue', 'all', 3, '2022-05-04 09:22:50'),
(4013, 'issue', 'form', 3, '2022-05-04 09:22:52'),
(4014, 'purchase_request', 'form', 3, '2022-05-04 09:22:59'),
(4015, 'purchase_request', 'form', 3, '2022-05-04 09:23:00'),
(4016, 'purchase_request', 'form', 3, '2022-05-04 09:23:06'),
(4017, 'purchase_request', 'add', 3, '2022-05-04 09:23:06'),
(4018, 'purchase_request', 'form', 3, '2022-05-04 09:23:12'),
(4019, 'purchase_request', 'add', 3, '2022-05-04 09:23:12'),
(4020, 'purchase_request', 'form', 3, '2022-05-04 09:23:15'),
(4021, 'purchase_request', 'direct_add', 3, '2022-05-04 09:23:15'),
(4022, 'purchase_request', 'getForm', 3, '2022-05-04 09:24:13'),
(4023, 'purchase_request', 'getForm', 3, '2022-05-04 09:24:16'),
(4024, 'purchase_request', 'all', 3, '2022-05-04 09:24:22'),
(4025, 'purchase_request', 'direct_add', 3, '2022-05-04 09:24:25'),
(4026, 'issue', 'form', 3, '2022-05-04 09:37:39'),
(4027, 'issue', 'form', 3, '2022-05-04 09:37:40'),
(4028, 'issue', 'form', 3, '2022-05-04 09:37:43'),
(4029, 'issue', 'add', 3, '2022-05-04 09:37:44'),
(4030, 'purchase_request', 'form', 3, '2022-05-04 09:38:16'),
(4031, 'purchase_request', 'form', 3, '2022-05-04 09:38:20'),
(4032, 'purchase_request', 'direct_add', 3, '2022-05-04 09:38:20'),
(4033, 'purchase_request', 'getForm', 3, '2022-05-04 09:38:24'),
(4034, 'purchase_request', 'add', 3, '2022-05-04 09:43:33'),
(4035, 'purchase_request', 'add', 3, '2022-05-04 09:47:14'),
(4036, 'purchase_request', 'add', 3, '2022-05-04 09:48:37'),
(4037, 'purchase_request', 'add', 3, '2022-05-04 09:49:08'),
(4038, 'purchase_request', 'add', 3, '2022-05-04 09:52:35'),
(4039, 'purchase_request', 'add', 3, '2022-05-04 09:52:48'),
(4040, 'purchase_request', 'add', 3, '2022-05-04 09:53:24'),
(4041, 'purchase_request', 'add', 3, '2022-05-04 09:53:28'),
(4042, 'purchase_request', 'add', 3, '2022-05-04 09:53:38'),
(4043, 'purchase_request', 'add', 3, '2022-05-04 09:55:57'),
(4044, 'purchase_request', 'add', 3, '2022-05-04 09:57:21'),
(4045, 'purchase_request', 'add', 3, '2022-05-04 09:58:13'),
(4046, 'purchase_request', 'add', 3, '2022-05-04 09:58:14'),
(4047, 'purchase_request', 'add', 3, '2022-05-04 09:59:27'),
(4048, 'purchase_request', 'add', 3, '2022-05-04 09:59:33'),
(4049, 'purchase_request', 'add', 3, '2022-05-04 09:59:53'),
(4050, 'purchase_request', 'add', 3, '2022-05-04 10:00:17'),
(4051, 'purchase_request', 'add', 3, '2022-05-04 10:00:28'),
(4052, 'purchase_request', 'add', 3, '2022-05-04 10:01:14'),
(4053, 'purchase_request', 'add', 3, '2022-05-04 10:03:42'),
(4054, 'purchase_request', 'add', 3, '2022-05-04 10:03:55'),
(4055, 'purchase_request', 'direct_add', 3, '2022-05-04 10:04:35'),
(4056, 'purchase_request', 'add', 3, '2022-05-04 10:05:03'),
(4057, 'purchase_request', 'form', 3, '2022-05-04 10:05:03'),
(4058, 'purchase_request', 'add', 3, '2022-05-04 10:05:08'),
(4059, 'purchase_request', 'add', 3, '2022-05-04 10:08:58'),
(4060, 'purchase_request', 'add', 3, '2022-05-04 10:09:24'),
(4061, 'purchase_request', 'form', 3, '2022-05-04 10:19:21'),
(4062, 'purchase_request', 'form', 3, '2022-05-04 10:19:31'),
(4063, 'purchase_request', 'direct_add', 3, '2022-05-04 10:19:31'),
(4064, 'purchase_request', 'form', 3, '2022-05-04 10:19:36'),
(4065, 'purchase_request', 'add', 3, '2022-05-04 10:19:36'),
(4066, 'purchase_request', 'form', 3, '2022-05-04 10:19:43'),
(4067, 'purchase_request', 'add', 3, '2022-05-04 10:19:43'),
(4068, 'purchase_request', 'getForm', 3, '2022-05-04 10:19:53'),
(4069, 'purchase_request', 'getForm', 3, '2022-05-04 10:19:56'),
(4070, 'purchase_request', 'add', 3, '2022-05-04 10:21:09'),
(4071, 'purchase_request', 'add', 3, '2022-05-04 10:21:14'),
(4072, 'purchase_request', 'direct_add', 3, '2022-05-04 10:21:17'),
(4073, 'purchase_request', 'getForm', 3, '2022-05-04 10:21:21'),
(4074, 'purchase_request', 'getForm', 3, '2022-05-04 10:21:32'),
(4075, 'purchase_request', 'getForm', 3, '2022-05-04 10:21:36'),
(4076, 'purchase_request', 'getForm', 3, '2022-05-04 10:21:39'),
(4077, 'issue', 'all', 3, '2022-05-04 10:38:29'),
(4078, 'issue', 'form', 3, '2022-05-04 10:38:31'),
(4079, 'issue', 'form', 3, '2022-05-04 10:38:37'),
(4080, 'issue', 'add', 3, '2022-05-04 10:38:37'),
(4081, 'issue', 'getAllStock', 3, '2022-05-04 10:38:55'),
(4082, 'issue', 'add', 3, '2022-05-04 10:44:38'),
(4083, 'issue', 'getAllStock', 3, '2022-05-04 10:44:52'),
(4084, 'issue', 'add', 3, '2022-05-04 10:45:01'),
(4085, 'requisition', 'all', 3, '2022-05-04 10:51:24'),
(4086, 'requisition', 'form', 3, '2022-05-04 10:51:27'),
(4087, 'requisition', 'all', 3, '2022-05-04 10:51:44'),
(4088, 'requisition', 'form', 3, '2022-05-04 10:51:47'),
(4089, 'requisition', 'all', 3, '2022-05-04 10:51:59'),
(4090, 'requisition', 'form', 3, '2022-05-04 10:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `status`, `created_by`, `created_on`, `updated_by`, `updated_on`, `description`) VALUES
(1, 'Super Admin', '1', 1, '2022-01-27', 1, '2022-01-27', 'Only For Developer'),
(2, 'Admin', '1', 1, '2022-01-27', 1, '2022-01-27', 'For Admins Only'),
(3, 'test', '1', 1, '2022-01-28', 0, '0000-00-00', 'test'),
(4, 'test test', '1', 1, '2022-01-28', 0, '0000-00-00', 'test test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_country_code_cntry_client` (`country_code`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_para`
--
ALTER TABLE `country_para`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `department_para`
--
ALTER TABLE `department_para`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_code` (`department_code`);

--
-- Indexes for table `depreciation_para`
--
ALTER TABLE `depreciation_para`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_itm_infos_depn_para` (`item_code`) USING BTREE;

--
-- Indexes for table `designation_para`
--
ALTER TABLE `designation_para`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation_code` (`designation_code`);

--
-- Indexes for table `fiscal_year_para`
--
ALTER TABLE `fiscal_year_para`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fiscal_year` (`fiscal_year`);

--
-- Indexes for table `gate_pass`
--
ALTER TABLE `gate_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gate_pass_no` (`gate_pass_no`);

--
-- Indexes for table `gate_pass_details`
--
ALTER TABLE `gate_pass_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_itm_infos_gp_dtls` (`gate_pass_no`);

--
-- Indexes for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grn_no_grnmst_grndtls` (`grn_no`),
  ADD KEY `fk_itmcd_itminfos_grndtls` (`item_code`);

--
-- Indexes for table `grn_master`
--
ALTER TABLE `grn_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grn_no` (`grn_no`),
  ADD KEY `fk_supplier_id_sup_grn_mst` (`supplier_id`);

--
-- Indexes for table `grn_return`
--
ALTER TABLE `grn_return`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grn_return_no` (`grn_return_no`) USING BTREE,
  ADD KEY `fk_grn_no_client_info_grn_rtn` (`grn_no`),
  ADD KEY `fk_supplier_id_sup_infos_grn_rtn` (`supplier_id`);

--
-- Indexes for table `grn_return_details`
--
ALTER TABLE `grn_return_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_item_info_grn_rtn_dtls` (`item_code`),
  ADD KEY `fk_grn_rtn_no_grn_rtn_dtls_grn_rtn` (`grn_return_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_itminf_invdtls` (`item_code`),
  ADD KEY `fk_invoice_no_invms_invdtls` (`invoice_no`) USING BTREE;

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `fk_sup_id_sup_invoice` (`supplier_id`) USING BTREE;

--
-- Indexes for table `issue_return_details`
--
ALTER TABLE `issue_return_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_isslp_mstr_item` (`item_code`),
  ADD KEY `fk_issue_return_no_isslp_mstr_isrtrn_dtl` (`issue_return_no`);

--
-- Indexes for table `issue_return_master`
--
ALTER TABLE `issue_return_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issue_return_no` (`issue_return_no`),
  ADD KEY `fk_department_id_dprtmnt_para_isrtrn_mstr` (`department_id`),
  ADD KEY `fk_issue_no_isslp_mstr_isrtrn_mstr` (`issue_no`),
  ADD KEY `fk_staff_id_stf_infos_iss_rmst` (`staff_id`);

--
-- Indexes for table `issue_slip_details`
--
ALTER TABLE `issue_slip_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_issue_slip_no_isslp_mstr_isslp_dtl` (`issue_slip_no`),
  ADD KEY `fk_item_code_itm_infos_isslp_dtl` (`item_code`);

--
-- Indexes for table `issue_slip_master`
--
ALTER TABLE `issue_slip_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issue_slip_no` (`issue_slip_no`),
  ADD KEY `fk_department_id_isslp_mstr_dprt` (`department_id`),
  ADD KEY `fk_staff_id_staff_isslp_mstr` (`staff_id`) USING BTREE,
  ADD KEY `fk_requisition_no_issslp_mstr_rquistn_mstr` (`requisition_no`);

--
-- Indexes for table `item_accessories`
--
ALTER TABLE `item_accessories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accessories_code` (`accessories_code`),
  ADD KEY `fk_item_code_itm_infos_itm_acc` (`item_code`);

--
-- Indexes for table `item_amc`
--
ALTER TABLE `item_amc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `amc_code` (`amc_code`),
  ADD KEY `fk_item_code_itm_infos_itm_amc` (`item_code`);

--
-- Indexes for table `item_infos`
--
ALTER TABLE `item_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_code` (`item_code`),
  ADD KEY `fk_cat_id_cat_itm_infos` (`category_id`),
  ADD KEY `fk_loc_id_loc_para_itm_infos` (`location_id`);

--
-- Indexes for table `item_insurance`
--
ALTER TABLE `item_insurance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `insurance_no` (`insurance_no`),
  ADD KEY `fk_item_code_itm_infos_itm_insrnc` (`item_code`);

--
-- Indexes for table `item_warranty`
--
ALTER TABLE `item_warranty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warranty_code` (`warranty_code`),
  ADD KEY `fk_item_code_itm_infos_itm_wrnty` (`item_code`);

--
-- Indexes for table `location_para`
--
ALTER TABLE `location_para`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_transfer`
--
ALTER TABLE `location_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrn_details`
--
ALTER TABLE `mrn_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mrn_no_mrn_mstr_mrn_dtl` (`mrn_no`),
  ADD KEY `fk_item_code_itminfo_mrndtls` (`item_code`);

--
-- Indexes for table `mrn_master`
--
ALTER TABLE `mrn_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mrn_no` (`mrn_no`);

--
-- Indexes for table `opening_detail`
--
ALTER TABLE `opening_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_itemcode_itin_opdt` (`item_code`),
  ADD KEY `fk_opnmasterid_opmt_opdt` (`opening_master_id`),
  ADD KEY `fk_loc_id_loc_para_opn_dtl` (`location_id`);

--
-- Indexes for table `opening_master`
--
ALTER TABLE `opening_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fsyr_opmt_fspr` (`fiscal_year`),
  ADD KEY `opening_code` (`opening_code`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_order_no` (`purchase_order_no`),
  ADD KEY `fk_purchase_request_no_pur_rqst_pur_rqst_ord` (`purchase_request_no`),
  ADD KEY `fk_department_id_dprtmnt_para_pur_rqst` (`department_id`),
  ADD KEY `fk_staff_id_staff_info_pur_req` (`staff_id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_itm_infos_pur_req_dtls` (`item_code`),
  ADD KEY `fk_purchase_order_no_pur_rqst_ord_pur_rqst_ord_dtl` (`purchase_order_no`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_request_no` (`purchase_request_no`),
  ADD KEY `fk_department_id_dprtmnt_para_pur_rqst` (`department_id`),
  ADD KEY `fk_staff_id_staff_info_pur_req` (`staff_id`);

--
-- Indexes for table `purchase_request_details`
--
ALTER TABLE `purchase_request_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_request_no_pur_rqst_pur_rqst_dtl` (`purchase_request_no`),
  ADD KEY `fk_item_code_itm_infos_pur_req_dtls` (`item_code`);

--
-- Indexes for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_requistion_no_rqust_mstr_rqust_dtl` (`requisition_no`),
  ADD KEY `fk_item_code_itm_infos_rqust_dtl` (`item_code`);

--
-- Indexes for table `requisition_master`
--
ALTER TABLE `requisition_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `requisition_no` (`requisition_no`),
  ADD KEY `fk_department_id_dprtmnt_para_rqust_mstr` (`department_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sale_no_sales_mst_salesdtls` (`sale_no`),
  ADD KEY `fk_client_id_client_info_sales_dtls` (`item_code`);

--
-- Indexes for table `sales_master`
--
ALTER TABLE `sales_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_no` (`sale_no`),
  ADD UNIQUE KEY `sales_code` (`sales_code`),
  ADD KEY `fk_client_id_client_info_sales_m` (`client_id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_return_no` (`s_return_no`);

--
-- Indexes for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s_return_no_sales_rtn_srtn_dtls` (`s_return_no`),
  ADD KEY `fk_item_code_itm_inf_srtn_dtls` (`item_code`),
  ADD KEY `fk_sales_no_sales_mst_sales_rtn_dtls` (`sale_no`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_desig_depart`
--
ALTER TABLE `staff_desig_depart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_staff_id_stf_info_stf_des_dep` (`staff_id`),
  ADD KEY `fk_des_code_design_stf_des_dep` (`designation_code`),
  ADD KEY `fk_dep_code_depart_stf_des_dep` (`department_code`);

--
-- Indexes for table `staff_infos`
--
ALTER TABLE `staff_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_country_code_country_staff` (`country_code`);

--
-- Indexes for table `stock_ledger`
--
ALTER TABLE `stock_ledger`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ledger_code` (`ledger_code`),
  ADD KEY `fk_item_code_itm_infos_stck_ldgr` (`item_code`),
  ADD KEY `fk_loc_id_loc_para_stck_ldgr` (`location_id`),
  ADD KEY `fk_client_id_client_info_stck_ldgr` (`client_id`),
  ADD KEY `fk_staff_id_stck_ldgr_stff_info` (`staff_id`);

--
-- Indexes for table `supplier_cat`
--
ALTER TABLE `supplier_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplier_id_supp_infos_supp_cat` (`supplier_id`),
  ADD KEY `fk_cat_id_cat_supp_cat` (`cat_id`);

--
-- Indexes for table `supplier_infos`
--
ALTER TABLE `supplier_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_country_code_inv_ctry` (`country_code`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id_usr_role_usr` (`role_id`),
  ADD KEY `fk_designation_code_dsgnt_para_usr` (`designation_code`),
  ADD KEY `fk_department_id_dprtmnt_para_usr` (`depart_id`),
  ADD KEY `fk_staff_id_staff_info_user` (`staff_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_usr_usr_log` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `country_para`
--
ALTER TABLE `country_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_para`
--
ALTER TABLE `department_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `depreciation_para`
--
ALTER TABLE `depreciation_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation_para`
--
ALTER TABLE `designation_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fiscal_year_para`
--
ALTER TABLE `fiscal_year_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gate_pass`
--
ALTER TABLE `gate_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gate_pass_details`
--
ALTER TABLE `gate_pass_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_details`
--
ALTER TABLE `grn_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_master`
--
ALTER TABLE `grn_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_return`
--
ALTER TABLE `grn_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_return_details`
--
ALTER TABLE `grn_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_return_details`
--
ALTER TABLE `issue_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_return_master`
--
ALTER TABLE `issue_return_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_slip_details`
--
ALTER TABLE `issue_slip_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issue_slip_master`
--
ALTER TABLE `issue_slip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_accessories`
--
ALTER TABLE `item_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_amc`
--
ALTER TABLE `item_amc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_infos`
--
ALTER TABLE `item_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_insurance`
--
ALTER TABLE `item_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_warranty`
--
ALTER TABLE `item_warranty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_para`
--
ALTER TABLE `location_para`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mrn_details`
--
ALTER TABLE `mrn_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mrn_master`
--
ALTER TABLE `mrn_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `opening_detail`
--
ALTER TABLE `opening_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opening_master`
--
ALTER TABLE `opening_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_request_details`
--
ALTER TABLE `purchase_request_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisition_master`
--
ALTER TABLE `requisition_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_master`
--
ALTER TABLE `sales_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_desig_depart`
--
ALTER TABLE `staff_desig_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_infos`
--
ALTER TABLE `staff_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_ledger`
--
ALTER TABLE `stock_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier_cat`
--
ALTER TABLE `supplier_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_infos`
--
ALTER TABLE `supplier_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4091;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD CONSTRAINT `fk_country_code_cntry_client` FOREIGN KEY (`country_code`) REFERENCES `country_para` (`country_code`);

--
-- Constraints for table `grn_master`
--
ALTER TABLE `grn_master`
  ADD CONSTRAINT `fk_supplier_id_sup_grn_mst` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_infos` (`id`);

--
-- Constraints for table `grn_return`
--
ALTER TABLE `grn_return`
  ADD CONSTRAINT `fk_grn_no_client_info_grn_rtn` FOREIGN KEY (`grn_no`) REFERENCES `grn_master` (`grn_no`),
  ADD CONSTRAINT `fk_supplier_id_sup_infos_grn_rtn` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_infos` (`id`);

--
-- Constraints for table `grn_return_details`
--
ALTER TABLE `grn_return_details`
  ADD CONSTRAINT `fk_grn_rtn_no_grn_rtn_dtls_grn_rtn` FOREIGN KEY (`grn_return_no`) REFERENCES `grn_return` (`grn_return_no`),
  ADD CONSTRAINT `fk_item_code_item_info_grn_rtn_dtls` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`);

--
-- Constraints for table `issue_return_details`
--
ALTER TABLE `issue_return_details`
  ADD CONSTRAINT `fk_issue_return_no_isslp_mstr_isrtrn_dtl` FOREIGN KEY (`issue_return_no`) REFERENCES `issue_return_master` (`issue_return_no`),
  ADD CONSTRAINT `fk_item_code_isslp_mstr_item` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`);

--
-- Constraints for table `issue_return_master`
--
ALTER TABLE `issue_return_master`
  ADD CONSTRAINT `fk_department_id_dprtmnt_para_isrtrn_mstr` FOREIGN KEY (`department_id`) REFERENCES `department_para` (`id`),
  ADD CONSTRAINT `fk_issue_no_isslp_mstr_isrtrn_mstr` FOREIGN KEY (`issue_no`) REFERENCES `issue_slip_master` (`issue_slip_no`),
  ADD CONSTRAINT `fk_staff_id_stf_infos_iss_rmst` FOREIGN KEY (`staff_id`) REFERENCES `staff_infos` (`id`);

--
-- Constraints for table `issue_slip_details`
--
ALTER TABLE `issue_slip_details`
  ADD CONSTRAINT `fk_issue_slip_no_isslp_mstr_isslp_dtl` FOREIGN KEY (`issue_slip_no`) REFERENCES `issue_slip_master` (`issue_slip_no`),
  ADD CONSTRAINT `fk_item_code_itm_infos_isslp_dtl` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`);

--
-- Constraints for table `issue_slip_master`
--
ALTER TABLE `issue_slip_master`
  ADD CONSTRAINT `fk_department_id_isslp_mstr_dprt` FOREIGN KEY (`department_id`) REFERENCES `department_para` (`id`),
  ADD CONSTRAINT `fk_requisition_no_issslp_mstr_rquistn_mstr` FOREIGN KEY (`requisition_no`) REFERENCES `requisition_master` (`requisition_no`),
  ADD CONSTRAINT `fk_staff_id_usr_isslp_mstr` FOREIGN KEY (`staff_id`) REFERENCES `staff_infos` (`id`);

--
-- Constraints for table `item_accessories`
--
ALTER TABLE `item_accessories`
  ADD CONSTRAINT `fk_item_code_itm_infos_itm_acc` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`);

--
-- Constraints for table `item_infos`
--
ALTER TABLE `item_infos`
  ADD CONSTRAINT `fk_cat_id_cat_itm_infos` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_loc_id_loc_para_itm_infos` FOREIGN KEY (`location_id`) REFERENCES `location_para` (`id`);

--
-- Constraints for table `mrn_details`
--
ALTER TABLE `mrn_details`
  ADD CONSTRAINT `fk_item_code_itminfo_mrndtls` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `fk_department_id_dprtmnt_para_pur_rqst` FOREIGN KEY (`department_id`) REFERENCES `department_para` (`id`),
  ADD CONSTRAINT `fk_purchase_request_no_pur_rqst_pur_rqst_ord` FOREIGN KEY (`purchase_request_no`) REFERENCES `purchase_request` (`purchase_request_no`),
  ADD CONSTRAINT `fk_staff_id_staff_info_pur_req` FOREIGN KEY (`staff_id`) REFERENCES `staff_infos` (`id`);

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `fk_item_code_itm_infos_pur_req_dtls` FOREIGN KEY (`item_code`) REFERENCES `item_infos` (`item_code`),
  ADD CONSTRAINT `fk_purchase_order_no_pur_rqst_ord_pur_rqst_ord_dtl` FOREIGN KEY (`purchase_order_no`) REFERENCES `purchase_order` (`purchase_order_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
