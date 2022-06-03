-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 03, 2022 at 12:08 PM
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
-- Database: `inventory_db`
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
(86, 'staff_infos', 1, 'DELETE', 'full_name,slug,description,featured_image,appointed_date,\r\ntemp_address, permanent_address,country_code,contact,email,\r\ncreated_on,created_by,updated_on,updated_by,status', 'Chelina Maharjan;;;;;;;;;;;;2020-01-01;;;Gwarko ,Lalitpur;;;Gwarko ,Lalitpur;;;nepa;;;9860013046;;;cheleena.maharjan.3@gmail.com;;;2022-04-18 00:00:00;;;3;;;0000-00-00 00:00:00;;;0;;;1', NULL, 0, '2022-05-12 14:41:32'),
(87, 'depreciation_para', 2, 'DELETE', ' depreciation_rate  , created_on  , created_by  , updated_on  , updated_by,  status   ', '10;;;2022-04-13 00:00:00;;;3;;;2022-04-13 00:00:00;;;2;;;1', NULL, 2, '2022-05-19 12:44:07'),
(88, 'depreciation_para', 1, 'DELETE', ' depreciation_rate  , created_on  , created_by  , updated_on  , updated_by,  status   ', '10;;;0000-00-00 00:00:00;;;0;;;0000-00-00 00:00:00;;;0;;;1', NULL, 0, '2022-05-19 12:44:14');

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
-- Table structure for table `charge_parameter`
--

CREATE TABLE `charge_parameter` (
  `id` int(11) NOT NULL,
  `charge_name` varchar(50) NOT NULL,
  `charge_code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `display_in_list` enum('Yes','No') NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charge_parameter`
--

INSERT INTO `charge_parameter` (`id`, `charge_name`, `charge_code`, `description`, `display_in_list`, `status`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'Transportation cost', 'CHCD26052022-0001', '<p>Transportation cost</p>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-rig', 'Yes', '1', 3, '2022-05-26 20:32:12', 3, '2022-05-26 20:51:35'),
(2, 'Load/Onload Cost', 'CHCD26052022-0002', '<p>Load/Onload Cost</p>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-right:', 'Yes', '1', 3, '2022-05-26 20:51:08', 0, '0000-00-00 00:00:00');

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

--
-- Dumping data for table `client_infos`
--

INSERT INTO `client_infos` (`id`, `client_name`, `remarks`, `address`, `country_code`, `email`, `telephone`, `contact_person`, `cp_mobile`, `DocPath`, `meta_keyword`, `meta_desc`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'Client one', '<p>d asdsadas das bvsdfdsfdsafsdf</p>\r\n', 'Kaushaltar', 'nepa', 'clientone@gmail.com', '9898989898', 'asd sada fas', '63463464366', 'http://localhost:7777/stock/uploads/download.png', 'dasdsa dsad', 'as dasd asdasd', 3, '2022-05-30', 0, '0000-00-00 00:00:00', '1'),
(2, 'Client Two', '<p>d sadsa dsa sdag feadgds fsd</p>\r\n', 'Tikathali', 'nepa', 'clienttwo@gmail.com', '9898989898', 'dasdsadsadsa', '5764545645645', 'http://localhost:7777/stock/uploads/download.png', 'dasdsadsadsa', 'asdsadsadsadas', 3, '2022-05-30', 0, '0000-00-00 00:00:00', '1');

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
  `depreciation_rate` varchar(25) NOT NULL,
  `fiscal_year` varchar(10) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `remarks` varchar(150) NOT NULL,
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
(1, '2022/2023', '2022-03-13', '2023-03-12', 'Y', 3, '2022-04-14', 3, '2022-06-03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE `gate_pass` (
  `id` int(11) NOT NULL,
  `gate_pass_no` varchar(25) NOT NULL,
  `sales_no` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
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
-- Table structure for table `grn_charges`
--

CREATE TABLE `grn_charges` (
  `id` int(11) NOT NULL,
  `grn_no` varchar(25) NOT NULL,
  `charge_code` varchar(50) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_charges`
--

INSERT INTO `grn_charges` (`id`, `grn_no`, `charge_code`, `amount`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(0, 'GRN26052022-0001', 'CHCD26052022-0002', '1000.00', 'load/onload cost', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0'),
(0, 'GRN26052022-0001', 'CHCD26052022-0001', '1000.00', 'Transportation Cost', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0');

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
  `actual_unit_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_details`
--

INSERT INTO `grn_details` (`id`, `grn_no`, `item_code`, `qty`, `unit_price`, `actual_unit_price`, `actual_total_price`, `total_price`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'GRN26052022-0001', 'IC19042022-0002', 9, '1000.00', '0.00', '0.00', '9000.00', 3, '2022-05-26 20:55:07', 0, '0000-00-00 00:00:00', '1'),
(2, 'GRN26052022-0001', 'IC19042022-0001', 9, '2000.00', '0.00', '0.00', '18000.00', 3, '2022-05-26 20:55:07', 0, '0000-00-00 00:00:00', '1'),
(5, 'GRN26052022-0002', 'IC19042022-0002', 1, '1000.00', '0.00', '0.00', '1000.00', 3, '2022-05-26 22:19:57', 0, '0000-00-00 00:00:00', '1'),
(6, 'GRN26052022-0002', 'IC19042022-0001', 2, '2000.00', '0.00', '0.00', '4000.00', 3, '2022-05-26 22:19:57', 0, '0000-00-00 00:00:00', '1');

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
  `type_no` varchar(25) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `payment_type` enum('CH','CQ','CR') NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `advance_paid` decimal(11,2) DEFAULT NULL,
  `discount_per` decimal(11,2) DEFAULT NULL,
  `discount_amt` decimal(11,2) DEFAULT NULL,
  `total` decimal(11,2) NOT NULL,
  `sub_total` decimal(11,2) NOT NULL,
  `vat_percent` decimal(11,2) DEFAULT NULL,
  `vat_amount` decimal(11,3) NOT NULL,
  `grand_total` decimal(11,2) DEFAULT NULL,
  `total_charge` decimal(11,2) DEFAULT NULL,
  `approved_on` date NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `posted_on` date DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_master`
--

INSERT INTO `grn_master` (`id`, `grn_no`, `type`, `grn_date`, `supplier_id`, `type_no`, `invoice_no`, `payment_type`, `bank_name`, `advance_paid`, `discount_per`, `discount_amt`, `total`, `sub_total`, `vat_percent`, `vat_amount`, `grand_total`, `total_charge`, `approved_on`, `approved_by`, `posted_on`, `posted_by`, `posted_tag`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'GRN26052022-0001', 'DR', '2022-05-26', 1, '', '', 'CQ', 'Global IME', '5000.00', '15.00', '4050.00', '27000.00', '22950.00', '13.00', '2983.500', '25933.50', '2000.00', '2022-05-26', '3', '2022-05-26', NULL, '1', '0', NULL, NULL, 3, '2022-05-26 20:55:07', 0, '0000-00-00 00:00:00', '1'),
(3, 'GRN26052022-0002', 'DR', '2022-05-26', 2, '', '', 'CQ', 'Gbl', '5000.00', '0.00', '0.00', '5000.00', '5000.00', '13.00', '650.000', '5650.00', NULL, '2022-05-26', '3', '2022-05-26', NULL, '1', '0', NULL, NULL, 3, '2022-05-26 22:19:57', 0, '0000-00-00 00:00:00', '1');

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
  `posted_by` int(11) DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `approved_on` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `total_amt` decimal(11,2) NOT NULL,
  `return_date` date NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_return`
--

INSERT INTO `grn_return` (`id`, `grn_return_no`, `grn_no`, `supplier_id`, `posted_on`, `posted_by`, `posted_tag`, `approved_on`, `approved_by`, `total_amt`, `return_date`, `remarks`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'GRR26052022-0001', 'GRN26052022-0001', 1, '2022-05-30', 3, '1', '2022-05-26', 3, '0.00', '2022-05-26', 'firta yeuta gareko hai', '0', NULL, NULL, 3, '2022-05-26 22:28:19', 0, '0000-00-00 00:00:00', '1'),
(2, 'GRR26052022-0002', 'GRN26052022-0002', 2, '2022-05-27', 3, '1', '2022-05-26', 3, '0.00', '2022-05-26', 'sabai firta gareko hai', '0', NULL, NULL, 3, '2022-05-26 22:33:02', 0, '0000-00-00 00:00:00', '1');

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
  `actual_unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) DEFAULT NULL,
  `actual_total_price` decimal(11,2) DEFAULT NULL,
  `remarks` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_return_details`
--

INSERT INTO `grn_return_details` (`id`, `grn_return_no`, `item_code`, `qty`, `unit_price`, `actual_unit_price`, `total_price`, `actual_total_price`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'GRR26052022-0001', 'IC19042022-0001', 1, '2000.00', '0.00', '2000.00', NULL, 'firta yeuta gareko hai', '2022-05-26 22:28:19', 3, '0000-00-00 00:00:00', 0, '1'),
(2, 'GRR26052022-0001', 'IC19042022-0002', 1, '1000.00', '0.00', '1000.00', NULL, 'firta yeuta gareko hai', '2022-05-26 22:28:19', 3, '0000-00-00 00:00:00', 0, '1'),
(3, 'GRR26052022-0002', 'IC19042022-0001', 2, '2000.00', '0.00', '4000.00', NULL, 'sabai firta gareko hai', '2022-05-26 22:33:02', 3, '0000-00-00 00:00:00', 0, '1'),
(4, 'GRR26052022-0002', 'IC19042022-0002', 1, '1000.00', '0.00', '1000.00', NULL, 'sabai firta gareko hai', '2022-05-26 22:33:02', 3, '0000-00-00 00:00:00', 0, '1');

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
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
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
  `location_id` int(11) NOT NULL,
  `remarks` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_return_details`
--

INSERT INTO `issue_return_details` (`id`, `issue_return_no`, `item_code`, `issued_qty`, `returned_qty`, `location_id`, `remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'IR26052022-0001', 'IC19042022-0002', 1, 1, 2, 'ghd hhg', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(2, 'IR26052022-0001', 'IC19042022-0001', 1, 1, 2, 'hdgfdgf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(3, 'IR30052022-0002', 'IC19042022-0001', 19, 9, 2, 'dasdasda sfsafssaas asdas', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(4, 'IR30052022-0002', 'IC19042022-0002', 19, 9, 2, ' sassaasdasas as wsdaa  s', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1');

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
  `approved_on` date NOT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `posted_on` date NOT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_return_master`
--

INSERT INTO `issue_return_master` (`id`, `issue_return_no`, `issue_no`, `return_date`, `department_id`, `staff_id`, `prepared_by`, `prepared_date`, `approved_on`, `approved_by`, `posted_on`, `posted_by`, `posted_tag`, `remarks`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'IR26052022-0001', 'IS26052022-0001', '2022-05-26', 2, 2, 'rajesh dai', '2022-05-26', '2022-05-30', '3', '2022-05-30', 3, '1', 'ghfghhf', '0', NULL, NULL, '2022-05-26 18:38:01', 3, '0000-00-00 00:00:00', 0, '1'),
(2, 'IR30052022-0002', 'IS26052022-0002', '2022-05-30', 2, 2, 'Rajesh Gurung Dai', '2022-05-30', '2022-05-30', '3', '2022-05-30', 3, '1', 'fsf sdfsdfsdf f fd ', '0', NULL, NULL, '2022-05-30 10:57:10', 3, '0000-00-00 00:00:00', 0, '1');

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
(1, 'IS26052022-0001', 'IC19042022-0001', 1, 'issue handeko', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(2, 'IS26052022-0001', 'IC19042022-0002', 1, 'issue handeko', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(3, 'IS26052022-0002', 'IC19042022-0002', 19, '98 ota remaining', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(4, 'IS26052022-0002', 'IC19042022-0001', 19, '98 ota remaining', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1');

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
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `posted_by` varchar(55) NOT NULL,
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

INSERT INTO `issue_slip_master` (`id`, `issue_slip_no`, `requisition_no`, `issue_date`, `issue_type`, `department_id`, `staff_id`, `issued_by`, `issued_on`, `approved_by`, `approved_on`, `cancel_tag`, `canceled_by`, `canceled_on`, `posted_by`, `posted_tag`, `posted_on`, `remarks`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'IS26052022-0001', 'RQ26052022-0001', '2022-05-26', 'RQ', 2, 2, 'Rajesh Dai', '2022-05-26', '3', '2022-05-26', '0', NULL, NULL, '3', '1', '2022-05-26', 'issue handeko hai hai', 3, '2022-05-26 21:24:48', 0, '0000-00-00 00:00:00', '1'),
(2, 'IS26052022-0002', NULL, '2022-05-26', 'DR', 2, 2, 'Rajesh Dai', '2022-05-26', '3', '2022-05-26', '0', NULL, NULL, '3', '1', '2022-05-26', '98 ota remaining', 3, '2022-05-26 21:38:53', 0, '0000-00-00 00:00:00', '1');

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
(8, 6, 1, 'IC30052022-0003', 'Tablet', 'I', 'dasd asdas sadsadsadasdas', 'bex068', 1000, 10, 25, 4, 'Y', NULL, 10, 'http://localhost:7777/stock/uploads/tablet.jpg', NULL, 3, '2022-05-30 00:00:00', 0, '0000-00-00 00:00:00', '1');

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
-- Table structure for table `item_scrap`
--

CREATE TABLE `item_scrap` (
  `id` int(11) NOT NULL,
  `scrap_code` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) NOT NULL,
  `canceled_on` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` date NOT NULL,
  `posted_on` date NOT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_scrap_detail`
--

CREATE TABLE `item_scrap_detail` (
  `id` int(11) NOT NULL,
  `scrap_code` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `location_id` int(11) NOT NULL,
  `type` enum('Scrap','Damage','Lost') NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `actual_unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) NOT NULL,
  `depreciated_amt` decimal(11,2) NOT NULL,
  `total_depreciated_amt` decimal(11,2) NOT NULL,
  `book_value` decimal(11,2) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
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
  `transfer_code` varchar(50) NOT NULL,
  `posted_tag` enum('0','1') DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `from_loc` varchar(255) NOT NULL,
  `to_loc` varchar(255) NOT NULL,
  `transfered_on` date NOT NULL,
  `transfered_by` int(11) NOT NULL,
  `remarks` varchar(155) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1',
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_transfer`
--

INSERT INTO `location_transfer` (`id`, `transfer_code`, `posted_tag`, `posted_on`, `posted_by`, `from_loc`, `to_loc`, `transfered_on`, `transfered_by`, `remarks`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_on`, `updated_by`, `status`, `approved_by`, `approved_on`) VALUES
(1, 'TRAN31052022-0001', '1', '2022-05-31', 3, '1', '2', '2022-05-31', 3, 'half half garna aateko hai', '0', NULL, NULL, 3, '2022-05-31 00:00:00', '2022-05-31 00:00:00', 3, '1', '3', '2022-05-31'),
(2, 'TRAN31052022-0002', '1', '2022-05-31', 3, '1', '2', '2022-05-31', 3, '30/70 1/2', '0', NULL, NULL, 3, '2022-05-31 00:00:00', '0000-00-00 00:00:00', 0, '1', '3', '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `location_transfer_detail`
--

CREATE TABLE `location_transfer_detail` (
  `id` int(11) NOT NULL,
  `transfer_code` varchar(50) NOT NULL,
  `item_code` varchar(150) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `actual_unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_transfer_detail`
--

INSERT INTO `location_transfer_detail` (`id`, `transfer_code`, `item_code`, `unit_price`, `qty`, `actual_unit_price`, `total_price`, `actual_total_price`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(3, 'TRAN31052022-0001', 'IC30052022-0003', '50000.00', 60, '55000.00', '2500000.00', '2750000.00', '2022-05-31 00:00:00', 3, '0000-00-00 00:00:00', 0),
(4, 'TRAN31052022-0002', 'IC30052022-0003', '50000.00', 10, '55000.00', '500000.00', '550000.00', '2022-05-31 00:00:00', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mrn_details`
--

CREATE TABLE `mrn_details` (
  `id` int(11) NOT NULL,
  `mrn_no` varchar(25) NOT NULL,
  `item_code` varchar(50) NOT NULL,
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
  `approved_by` int(11) DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `opening_detail`
--

CREATE TABLE `opening_detail` (
  `id` int(11) NOT NULL,
  `opening_master_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty` int(6) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `actual_unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) NOT NULL,
  `depreciated_amt` decimal(11,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `book_value` decimal(11,2) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opening_detail`
--

INSERT INTO `opening_detail` (`id`, `opening_master_id`, `supplier_id`, `location_id`, `item_code`, `qty`, `unit_price`, `actual_unit_price`, `total_price`, `actual_total_price`, `depreciated_amt`, `purchase_date`, `book_value`, `remarks`, `batch_no`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 1, 1, 1, 'IC19042022-0002', 1, '1000.00', '1050.00', '1000.00', '1050.00', '50.00', '2022-01-01', '1000.00', '', 'ABC123', 0, '2022-06-03 11:14:09', 0, '0000-00-00 00:00:00', '1'),
(2, 1, 1, 1, 'IC19042022-0001', 1, '1000.00', '1050.00', '1000.00', '1050.00', '50.00', '2022-01-01', '1000.00', '', 'ABC123', 0, '2022-06-03 11:14:09', 0, '0000-00-00 00:00:00', '1'),
(3, 2, 1, 1, 'IC30052022-0003', 100, '1000.00', '1050.00', '100000.00', '105000.00', '0.00', '0000-00-00', '0.00', '', 'ABCD123', 0, '2022-06-03 11:15:22', 0, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `opening_master`
--

CREATE TABLE `opening_master` (
  `id` int(11) NOT NULL,
  `opening_code` varchar(55) NOT NULL,
  `type` enum('Assets','Inventory') NOT NULL,
  `fiscal_year` varchar(10) NOT NULL,
  `opening_date` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` date NOT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_by` varchar(255) NOT NULL,
  `posted_on` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opening_master`
--

INSERT INTO `opening_master` (`id`, `opening_code`, `type`, `fiscal_year`, `opening_date`, `approved_by`, `approved_on`, `posted_tag`, `posted_by`, `posted_on`, `remarks`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'OPE03062022-0001', 'Assets', '2022', '2022-01-01', 3, '2022-06-03', '1', '3', '2022-06-03', 'assets', '0', NULL, NULL, 3, '2022-06-03 07:29:09', 0, '2022-06-03 11:14:15', '1'),
(2, 'OPE03062022-0002', 'Inventory', '2022', '2022-02-01', 3, '2022-06-03', '1', '3', '2022-06-03', 'inventory', '0', NULL, NULL, 3, '2022-06-03 07:30:22', 0, '2022-06-03 11:15:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_request_no` varchar(25) DEFAULT NULL,
  `purchase_order_no` varchar(25) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `request_type` enum('DR','MRN','REQ','PR') NOT NULL,
  `requisition_no` varchar(25) DEFAULT NULL,
  `mrn_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `requested_on` date NOT NULL,
  `requested_by` varchar(25) NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
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
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'RQ19042022-0001', 'IC19042022-0002', 1, 0, NULL, 'Dell Inspiron 3511 ', 0, '2022-04-19 12:02:32', 0, '0000-00-00 00:00:00', '1'),
(3, 'RQ19042022-0002', 'IC19042022-0002', 2, 0, NULL, 'Dell Inspiron 3511-2qty', 0, '2022-04-19 12:04:00', 0, '0000-00-00 00:00:00', '1'),
(4, 'RQ19042022-0002', 'IC19042022-0001', 2, 0, NULL, 'Computer Wifi Core i5-2qty', 0, '2022-04-19 12:04:00', 0, '0000-00-00 00:00:00', '1'),
(5, 'RQ26052022-0001', 'IC19042022-0002', 1, 1, 0, 'yeuta matra', 0, '2022-05-26 21:21:35', 0, '0000-00-00 00:00:00', '1'),
(6, 'RQ26052022-0001', 'IC19042022-0001', 1, 1, 0, 'yeuta matra', 0, '2022-05-26 21:21:35', 0, '0000-00-00 00:00:00', '1'),
(7, 'RQ01062022-0002', 'IC30052022-0003', 1, 0, 1, 'yeuta naya staff lai chaiyo hai ta ...', 0, '2022-06-01 12:44:24', 0, '0000-00-00 00:00:00', '1');

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
  `requested_by` varchar(11) NOT NULL,
  `requested_date` date NOT NULL,
  `approved_by` varchar(25) NOT NULL,
  `approved_on` date NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_master`
--

INSERT INTO `requisition_master` (`id`, `requisition_no`, `requisition_date`, `department_id`, `staff_id`, `remarks`, `requested_by`, `requested_date`, `approved_by`, `approved_on`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(3, 'RQ26052022-0001', '2022-05-26', 2, 2, 'duitai ma yeuta matra hai', 'Rajesh Dai', '2022-05-26', '3', '2022-05-26', '0', NULL, NULL, 3, '2022-05-26 17:36:34', 0, '0000-00-00 00:00:00', '1'),
(4, 'RQ01062022-0002', '2022-06-01', 2, 2, 'dami dami hai', 'Rajesh Dai', '2022-06-02', '', '0000-00-00', '1', NULL, NULL, 3, '2022-06-01 08:59:24', 0, '0000-00-00 00:00:00', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sale_no`, `item_code`, `qty`, `actual_unit_price`, `unit_price`, `grand_total`, `actual_total_price`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'SN30052022-0001', 'IC19042022-0002', 9, NULL, '100.00', '900.00', NULL, '2022-05-30 11:43:16', '3', '0000-00-00 00:00:00', 0, '1'),
(2, 'SN30052022-0001', 'IC19042022-0001', 9, NULL, '100.00', '900.00', NULL, '2022-05-30 11:43:16', '3', '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales_master`
--

CREATE TABLE `sales_master` (
  `id` int(11) NOT NULL,
  `sale_no` varchar(25) NOT NULL,
  `sales_code` varchar(25) NOT NULL,
  `sales_date` date DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(25) NOT NULL,
  `remarks` varchar(155) NOT NULL,
  `received_by` varchar(25) DEFAULT NULL,
  `posted_tag` enum('0','1') NOT NULL DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `payment_type` enum('CH','CQ','CR') NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `advance_amt` decimal(11,2) DEFAULT NULL,
  `discount_amt` varchar(25) DEFAULT NULL,
  `discount_per` decimal(11,2) DEFAULT NULL,
  `vat_percent` decimal(11,2) NOT NULL,
  `vat_amount` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `remaining_amt` decimal(11,2) NOT NULL,
  `other_charges` decimal(11,2) DEFAULT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_master`
--

INSERT INTO `sales_master` (`id`, `sale_no`, `sales_code`, `sales_date`, `client_id`, `client_name`, `remarks`, `received_by`, `posted_tag`, `posted_on`, `posted_by`, `payment_type`, `bank_name`, `advance_amt`, `discount_amt`, `discount_per`, `vat_percent`, `vat_amount`, `total`, `remaining_amt`, `other_charges`, `approved_by`, `approved_on`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'SN30052022-0001', 'sales1234', '2022-05-30', 2, 'Client Two', 'dami bechideko yar', 'Rajesh Dai', '1', '2022-05-30', 3, 'CQ', 'Prabhu Bank', '800.00', '270', '15.00', '13.00', '198.90', '1800.00', '0.00', '100.00', '3', '2022-05-30', '0', NULL, NULL, '2022-05-30 11:43:16', 3, '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL,
  `s_return_no` varchar(25) NOT NULL,
  `sale_no` varchar(50) NOT NULL,
  `sales_rtn_date` date NOT NULL,
  `approved_by` varchar(25) DEFAULT NULL,
  `approved_on` date DEFAULT NULL,
  `posted_tag` enum('0','1') DEFAULT '0',
  `posted_on` date DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `remarks` varchar(150) NOT NULL,
  `cancel_tag` enum('0','1') NOT NULL DEFAULT '0',
  `canceled_by` int(11) DEFAULT NULL,
  `canceled_on` date DEFAULT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`id`, `s_return_no`, `sale_no`, `sales_rtn_date`, `approved_by`, `approved_on`, `posted_tag`, `posted_on`, `posted_by`, `remarks`, `cancel_tag`, `canceled_by`, `canceled_on`, `created_by`, `created_on`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'SR30052022-0001', 'SN30052022-0001', '2022-05-30', '3', '2022-05-30', '1', '2022-05-30', 3, 'sales return testing hai', '0', NULL, NULL, '3', '2022-05-30 13:26:16', '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_details`
--

CREATE TABLE `sales_return_details` (
  `id` int(11) NOT NULL,
  `s_return_no` varchar(25) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `qty_return` int(6) NOT NULL,
  `unit_price` decimal(11,2) DEFAULT NULL,
  `actual_unit_price` decimal(11,2) NOT NULL,
  `actual_total_price` decimal(11,2) DEFAULT NULL,
  `total_price` decimal(11,2) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `return_remarks` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_return_details`
--

INSERT INTO `sales_return_details` (`id`, `s_return_no`, `item_code`, `qty_return`, `unit_price`, `actual_unit_price`, `actual_total_price`, `total_price`, `location_id`, `return_remarks`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'SR30052022-0001', 'IC19042022-0001', 4, '100.00', '0.00', NULL, '400.00', 2, 'dami teting hai', '2022-05-30 13:26:16', '3', '0000-00-00 00:00:00', 0, '1'),
(2, 'SR30052022-0001', 'IC19042022-0002', 4, '100.00', '0.00', NULL, '400.00', 1, 'dami teting hai hai', '2022-05-30 13:26:16', '3', '0000-00-00 00:00:00', 0, '1');

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
(1, 'Inventory', 'Inventory Management', 'http://localhost:7777/stock', 'Prasuti Marga -509, Kathmandu, Nepal', '+977-1-4102299, 4102213 ,4102239', '+977-1-4102299, 4102213 ,4102239', '', '<p>Prasuti Marga -509,</p>\r\n\r\n<p>Kathmandu, Nepal</p>\r\n\r\n<p><strong>Fax:&nbsp;</strong>+977-1-4102299<br />\r\n<strong>Phone:&nbsp;</strong>+977-1-4102299<br />\r\n<strong>Email:</strong>&nbsp;info@nyatapol.com</p>\r\n', 'info@nyatapol.com', 'https://www.facebook.com/', 'whatsup.com', 'skype.com', 'twitter.com', 'instagram.com', 'youtube.com', 'google.com', 'linked_in.com', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', 'http://localhost:7777/stock/uploads/svg/barLoading.svg', 'Stock Management (Inventory)', '<p>Best Stock Management</p>', 'stock, stock management, inventory', '2022-06-03', 3, '1');

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
(2, 1, 'Mana', 'Mar', '2020-02-01', '0000-00-00', 1, '2022-04-19 00:00:00', 0, '0000-00-00 00:00:00', '1'),
(3, 2, 'Mana', 'Dev', '2022-03-01', '0000-00-00', 3, '2022-05-26 00:00:00', 0, '0000-00-00 00:00:00', '1');

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
(2, 'Rajesh Gurung', '', '<p>adasdasdas</p>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}\r\n</style>\r\n', 'http://localhost:7777/stock/uploads/logo/inventory_logo.png', '2022-03-01', 'Kaushaltar, Bhaktapur', 'Kawasoti,Nawalpur', 'nepa', '9898989898', 'gurungrajesh1992@gmail.com', '2022-05-26', 3, '0000-00-00', 0, '1');

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
(1, 'LEDG03062022-0001', 'IC19042022-0001', '2022-01-01', 'OPN', 1, 0, 1, '1000.00', '1000.00', '1050.00', '1050.00', '0.00', '0.00', '0.00', '0.00', 1, 'ABC123', 1, 0, 'posted from opening', 'OPE03062022-0001', '2022-06-03', '3', '0000-00-00', 0, 0, '1'),
(3, 'LEDG03062022-0003', 'IC30052022-0003', '2022-02-01', 'OPN', 100, 0, 100, '1000.00', '100000.00', '1050.00', '105000.00', '0.00', '0.00', '0.00', '0.00', 1, 'ABCD123', 1, 0, 'posted from opening', 'OPE03062022-0002', '2022-06-03', '3', '0000-00-00', 0, 0, '1');

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

--
-- Dumping data for table `supplier_infos`
--

INSERT INTO `supplier_infos` (`id`, `supplier_name`, `remarks`, `address`, `country_code`, `email`, `telephone`, `contact_person`, `cp_mobile`, `docpath`, `meta_keyword`, `meta_desc`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'Supplier one', '<p>supplier oned</p>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}\r\n</style>\r\n', 'Kaushaltar', 'nepa', 'supplierone@gmail.com', '9898989898', 'sagdagdjagd asdgasd jagd', '768768768687', 'http://localhost:7777/stock/uploads/download.png', 'dsadmnsbadm sdhsd', 'fgsdh gshdgjfs', '3', '2022-05-26 00:00:00', NULL, '0000-00-00', '1'),
(2, 'Spplier Two', '<p>Supplier Two</p>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}\r\n</style>\r\n', 'Gattha ghar', 'nepa', 'stwo@gmail.com', '9898988998', 'dasghjdags gjh', ' 879789798797', 'http://localhost:7777/stock/uploads/download.png', 'hjkhd jshdkj k', 'j hkjh kjhkjh kj', '3', '2022-05-26 00:00:00', NULL, '0000-00-00', '1');

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
(1, 'nyatapol', 'c7098dd01fd11866dcb79e33d03ecfc5', '820682a7c8be57db72638233737fabf2', 1, NULL, 'HRM', 3, NULL, 'Nyatapol', 'https://nyatapol.biz/shine/uploads/logo/download.png', 'Babarmahal', '', 'nepa', '+977 1-4102299', '', 'nyatapol@gmail.com', '2022-01-19', 0, '2022-02-07', 1, 'Yes', '1'),
(2, 'rajesh', 'c7098dd01fd11866dcb79e33d03ecfc5', 'b41f1ae8bc8aeb8b467612ba63ef34b0', 1, NULL, 'HRM', 3, NULL, 'Rajesh Gurung', 'https://nyatapol.biz/shine/uploads/logo/download.png', 'Tikathali', '', 'nepa', '98119561913', '<h1>dami hai sss</h1>\r\n', 'gurungrajesh1992@gmail.com', '2022-01-28', 1, '2022-02-07', 1, 'Yes', '1'),
(3, 'admin', '482c811da5d5b4bc6d497ffa98491e38', '6c91e7111d429dc780d047977077d6d2', 1, NULL, 'HRM', 3, '2022-03-01', 'admin', 'http://localhost:7777/stock/uploads/logo/admin.jpg', 'babarmahal', 'nawalparasi', 'nepa', '9856767678978', '<p>dashdga hagsdhgas jdhgas hdas</p>\r\n', 'admin@gmail.com', '2022-02-24', 1, '2022-03-28', 3, 'Yes', '1'),
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
(2133, 'dashboard', NULL, 3, '2022-05-26 09:38:42'),
(2134, 'opening_master', 'all', 3, '2022-05-26 10:13:06'),
(2135, 'opening_master', 'form', 3, '2022-05-26 10:13:26'),
(2136, 'opening_master', 'getForm', 3, '2022-05-26 10:13:35'),
(2137, 'supplier', 'all', 3, '2022-05-26 10:13:54'),
(2138, 'supplier', 'form', 3, '2022-05-26 10:14:18'),
(2139, 'dashboard', NULL, 3, '2022-05-26 12:47:43'),
(2140, 'dashboard', NULL, 3, '2022-05-26 15:05:57'),
(2141, 'opening_master', 'form', 3, '2022-05-26 15:06:32'),
(2142, 'opening_master', 'getForm', 3, '2022-05-26 15:07:15'),
(2143, 'supplier', 'all', 3, '2022-05-26 15:07:24'),
(2144, 'supplier', 'form', 3, '2022-05-26 15:07:55'),
(2145, 'supplier', 'form', 3, '2022-05-26 15:09:14'),
(2146, 'supplier', 'all', 3, '2022-05-26 15:09:14'),
(2147, 'supplier', 'form', 3, '2022-05-26 15:09:21'),
(2148, 'supplier', 'form', 3, '2022-05-26 15:10:33'),
(2149, 'supplier', 'all', 3, '2022-05-26 15:10:33'),
(2150, 'opening_master', 'form', 3, '2022-05-26 15:10:50'),
(2151, 'opening_master', 'getForm', 3, '2022-05-26 15:11:18'),
(2152, 'opening_master', 'getForm', 3, '2022-05-26 15:12:09'),
(2153, 'opening_master', 'form', 3, '2022-05-26 15:12:52'),
(2154, 'opening_master', 'form', 3, '2022-05-26 15:13:51'),
(2155, 'opening_master', 'all', 3, '2022-05-26 15:13:51'),
(2156, 'opening_master', 'all', 3, '2022-05-26 15:14:38'),
(2157, 'site_settings', NULL, 3, '2022-05-26 15:14:48'),
(2158, 'site_settings', NULL, 3, '2022-05-26 15:15:12'),
(2159, 'site_settings', NULL, 3, '2022-05-26 15:15:12'),
(2160, 'opening_master', 'all', 3, '2022-05-26 15:15:23'),
(2161, 'opening_master', 'form', 3, '2022-05-26 15:15:26'),
(2162, 'opening_master', 'getForm', 3, '2022-05-26 15:16:01'),
(2163, 'opening_master', 'getForm', 3, '2022-05-26 15:16:52'),
(2164, 'opening_master', 'getForm', 3, '2022-05-26 15:16:54'),
(2165, 'opening_master', 'form', 3, '2022-05-26 15:17:38'),
(2166, 'opening_master', 'all', 3, '2022-05-26 15:17:39'),
(2167, 'opening_master', 'form', 3, '2022-05-26 15:17:44'),
(2168, 'opening_master', 'all', 3, '2022-05-26 15:17:46'),
(2169, 'opening_master', 'view', 3, '2022-05-26 15:17:49'),
(2170, 'opening_master', 'opening_post', 3, '2022-05-26 15:17:53'),
(2171, 'opening_master', 'change_status', 3, '2022-05-26 15:17:57'),
(2172, 'opening_master', 'view', 3, '2022-05-26 15:17:57'),
(2173, 'opening_master', 'opening_post', 3, '2022-05-26 15:18:00'),
(2174, 'opening_master', 'view', 3, '2022-05-26 15:18:00'),
(2175, 'opening_master', 'opening_post', 3, '2022-05-26 15:28:12'),
(2176, 'requisition', 'cancel_row', 3, '2022-05-26 15:28:15'),
(2177, 'requisition', 'all', 3, '2022-05-26 15:28:25'),
(2178, 'requisition', 'form', 3, '2022-05-26 15:28:30'),
(2179, 'requisition', 'getStaffOfDepartment', 3, '2022-05-26 15:28:37'),
(2180, 'staff', 'all', 3, '2022-05-26 15:28:47'),
(2181, 'requisition', 'getForm', 3, '2022-05-26 15:28:51'),
(2182, 'staff', 'form', 3, '2022-05-26 15:28:55'),
(2183, 'staff', 'form', 3, '2022-05-26 15:30:16'),
(2184, 'staff', 'all', 3, '2022-05-26 15:30:16'),
(2185, 'opening_master', 'form', 3, '2022-05-26 15:30:27'),
(2186, 'opening_master', 'getForm', 3, '2022-05-26 15:31:11'),
(2187, 'opening_master', 'getForm', 3, '2022-05-26 15:31:14'),
(2188, 'opening_master', 'form', 3, '2022-05-26 15:33:07'),
(2189, 'opening_master', 'all', 3, '2022-05-26 15:33:08'),
(2190, 'opening_master', 'view', 3, '2022-05-26 15:34:07'),
(2191, 'opening_master', 'opening_post', 3, '2022-05-26 15:34:11'),
(2192, 'opening_master', 'change_status', 3, '2022-05-26 15:34:12'),
(2193, 'opening_master', 'view', 3, '2022-05-26 15:34:13'),
(2194, 'opening_master', 'opening_post', 3, '2022-05-26 15:34:14'),
(2195, 'opening_master', 'view', 3, '2022-05-26 15:34:15'),
(2196, 'requisition', 'form', 3, '2022-05-26 15:35:20'),
(2197, 'requisition', 'getStaffOfDepartment', 3, '2022-05-26 15:35:26'),
(2198, 'requisition', 'getForm', 3, '2022-05-26 15:35:50'),
(2199, 'requisition', 'getForm', 3, '2022-05-26 15:36:00'),
(2200, 'requisition', 'form', 3, '2022-05-26 15:36:34'),
(2201, 'requisition', 'all', 3, '2022-05-26 15:36:35'),
(2202, 'issue', 'all', 3, '2022-05-26 15:36:47'),
(2203, 'issue', 'form', 3, '2022-05-26 15:36:50'),
(2204, 'requisition', 'view', 3, '2022-05-26 15:37:03'),
(2205, 'opening_master', 'change_status', 3, '2022-05-26 15:37:06'),
(2206, 'requisition', 'view', 3, '2022-05-26 15:37:07'),
(2207, 'requisition', 'cancel_row', 3, '2022-05-26 15:37:08'),
(2208, 'issue', 'form', 3, '2022-05-26 15:37:14'),
(2209, 'issue', 'form', 3, '2022-05-26 15:37:24'),
(2210, 'issue', 'add', 3, '2022-05-26 15:37:24'),
(2211, 'issue', 'add', 3, '2022-05-26 15:38:30'),
(2212, 'issue', 'all', 3, '2022-05-26 15:38:30'),
(2213, 'issue', 'edit', 3, '2022-05-26 15:38:36'),
(2214, 'issue', 'form', 3, '2022-05-26 15:38:46'),
(2215, 'issue', 'form', 3, '2022-05-26 15:38:51'),
(2216, 'issue', 'direct_add', 3, '2022-05-26 15:38:52'),
(2217, 'requisition', 'getStaffOfDepartment', 3, '2022-05-26 15:39:12'),
(2218, 'issue', 'getForm', 3, '2022-05-26 15:39:18'),
(2219, 'issue', 'view', 3, '2022-05-26 15:39:39'),
(2220, 'issue', 'issue_post', 3, '2022-05-26 15:39:43'),
(2221, 'issue', 'view', 3, '2022-05-26 15:39:44'),
(2222, 'opening_master', 'change_status', 3, '2022-05-26 15:39:45'),
(2223, 'issue', 'view', 3, '2022-05-26 15:39:46'),
(2224, 'issue', 'issue_post', 3, '2022-05-26 15:39:48'),
(2225, 'issue', 'view', 3, '2022-05-26 15:39:48'),
(2226, 'issue', 'view', 3, '2022-05-26 15:39:48'),
(2227, 'issue', 'all', 3, '2022-05-26 15:44:38'),
(2228, 'issue', 'form', 3, '2022-05-26 15:44:41'),
(2229, 'issue', 'form', 3, '2022-05-26 15:44:46'),
(2230, 'issue', 'direct_add', 3, '2022-05-26 15:44:46'),
(2231, 'issue', 'direct_add', 3, '2022-05-26 15:52:48'),
(2232, 'requisition', 'getStaffOfDepartment', 3, '2022-05-26 15:53:09'),
(2233, 'issue', 'getForm', 3, '2022-05-26 15:53:13'),
(2234, 'issue', 'getForm', 3, '2022-05-26 15:53:15'),
(2235, 'issue', 'direct_add', 3, '2022-05-26 15:53:42'),
(2236, 'issue', 'all', 3, '2022-05-26 15:53:42'),
(2237, 'issue', 'direct_view', 3, '2022-05-26 15:53:46'),
(2238, 'issue', 'issue_post', 3, '2022-05-26 15:53:49'),
(2239, 'issue', 'direct_view', 3, '2022-05-26 15:53:49'),
(2240, 'opening_master', 'change_status', 3, '2022-05-26 15:53:50'),
(2241, 'issue', 'direct_view', 3, '2022-05-26 15:53:50'),
(2242, 'issue', 'issue_post', 3, '2022-05-26 15:53:52'),
(2243, 'issue', 'direct_view', 3, '2022-05-26 15:53:53'),
(2244, 'issue', 'direct_view', 3, '2022-05-26 15:53:53'),
(2245, 'issue_return', 'all', 3, '2022-05-26 15:56:59'),
(2246, 'issue_return', 'form', 3, '2022-05-26 15:57:02'),
(2247, 'issue_return', 'form', 3, '2022-05-26 15:57:08'),
(2248, 'issue_return', 'add', 3, '2022-05-26 15:57:08'),
(2249, 'issue_return', 'add', 3, '2022-05-26 16:38:01'),
(2250, 'issue_return', 'all', 3, '2022-05-26 16:38:01'),
(2251, 'issue_return', 'edit', 3, '2022-05-26 16:38:41'),
(2252, 'issue_return', 'all', 3, '2022-05-26 16:38:47'),
(2253, 'issue_return', 'view', 3, '2022-05-26 16:38:50'),
(2254, 'opening_master', 'change_status', 3, '2022-05-26 16:39:02'),
(2255, 'opening_master', 'change_status', 3, '2022-05-26 16:39:04'),
(2256, 'opening_master', 'change_status', 3, '2022-05-26 16:39:05'),
(2257, 'opening_master', 'change_status', 3, '2022-05-26 16:39:05'),
(2258, 'opening_master', 'change_status', 3, '2022-05-26 16:39:05'),
(2259, 'opening_master', 'change_status', 3, '2022-05-26 16:39:05'),
(2260, 'opening_master', 'change_status', 3, '2022-05-26 16:39:05'),
(2261, 'opening_master', 'change_status', 3, '2022-05-26 16:39:06'),
(2262, 'opening_master', 'change_status', 3, '2022-05-26 16:39:06'),
(2263, 'opening_master', 'change_status', 3, '2022-05-26 16:55:10'),
(2264, 'issue_return', 'view', 3, '2022-05-26 16:58:32'),
(2265, 'opening_master', 'change_status', 3, '2022-05-26 16:58:40'),
(2266, 'issue_return', 'view', 3, '2022-05-26 16:58:40'),
(2267, 'issue', 'all', 3, '2022-05-26 17:41:51'),
(2268, 'issue', 'direct_view', 3, '2022-05-26 17:41:59'),
(2269, 'sales_return', 'all', 3, '2022-05-26 17:43:20'),
(2270, 'sales_return', 'form', 3, '2022-05-26 17:43:24'),
(2271, 'issue_return', 'all', 3, '2022-05-26 17:43:30'),
(2272, 'issue_return', 'view', 3, '2022-05-26 17:43:34'),
(2273, 'issue_return', 'all', 3, '2022-05-26 17:46:30'),
(2274, 'issue_return', 'form', 3, '2022-05-26 17:46:33'),
(2275, 'issue_return', 'form', 3, '2022-05-26 17:46:36'),
(2276, 'issue_return', 'add', 3, '2022-05-26 17:46:36'),
(2277, 'issue_return', 'add', 3, '2022-05-26 17:47:37'),
(2278, 'issue_return', 'all', 3, '2022-05-26 17:47:48'),
(2279, 'issue_return', 'view', 3, '2022-05-26 17:47:50'),
(2280, 'opening_master', 'form', 3, '2022-05-26 17:48:41'),
(2281, 'issue', 'form', 3, '2022-05-26 17:48:51'),
(2282, 'issue', 'form', 3, '2022-05-26 17:48:57'),
(2283, 'issue', 'direct_add', 3, '2022-05-26 17:48:57'),
(2284, 'issue_return', 'form', 3, '2022-05-26 17:53:22'),
(2285, 'issue_return', 'form', 3, '2022-05-26 17:53:55'),
(2286, 'issue_return', 'add', 3, '2022-05-26 17:53:56'),
(2287, 'issue', 'form', 3, '2022-05-26 17:56:16'),
(2288, 'issue', 'form', 3, '2022-05-26 17:56:21'),
(2289, 'issue', 'direct_add', 3, '2022-05-26 17:56:21'),
(2290, 'issue', 'direct_add', 3, '2022-05-26 17:58:26'),
(2291, 'issue_return', 'form', 3, '2022-05-26 17:59:01'),
(2292, 'issue_return', 'form', 3, '2022-05-26 17:59:26'),
(2293, 'issue_return', 'add', 3, '2022-05-26 17:59:26'),
(2294, 'issue_return', 'all', 3, '2022-05-26 17:59:43'),
(2295, 'issue_return', 'view', 3, '2022-05-26 18:00:19'),
(2296, 'issue_return', 'view', 3, '2022-05-26 18:00:43'),
(2297, 'issue_return', 'form', 3, '2022-05-26 18:01:14'),
(2298, 'issue_return', 'form', 3, '2022-05-26 18:01:17'),
(2299, 'issue_return', 'add', 3, '2022-05-26 18:01:17'),
(2300, 'issue_return', 'form', 3, '2022-05-26 18:03:21'),
(2301, 'issue_return', 'form', 3, '2022-05-26 18:03:24'),
(2302, 'issue_return', 'add', 3, '2022-05-26 18:03:24'),
(2303, 'issue_return', 'view', 3, '2022-05-26 18:28:07'),
(2304, 'requisition', 'cancel_row', 3, '2022-05-26 18:28:30'),
(2305, 'issue_return', 'issue_return_post', 3, '2022-05-26 18:28:37'),
(2306, 'issue_return', 'view', 3, '2022-05-26 18:28:37'),
(2307, 'charge_parameter', 'all', 3, '2022-05-26 18:31:43'),
(2308, 'charge_parameter', 'form', 3, '2022-05-26 18:31:46'),
(2309, 'charge_parameter', 'form', 3, '2022-05-26 18:32:12'),
(2310, 'charge_parameter', 'all', 3, '2022-05-26 18:32:13'),
(2311, 'charge_parameter', 'all', 3, '2022-05-26 18:32:27'),
(2312, 'charge_parameter', 'all', 3, '2022-05-26 18:32:51'),
(2313, 'charge_parameter', 'form', 3, '2022-05-26 18:32:57'),
(2314, 'charge_parameter', 'all', 3, '2022-05-26 18:33:10'),
(2315, 'charge_parameter', 'all', 3, '2022-05-26 18:33:23'),
(2316, 'charge_parameter', 'form', 3, '2022-05-26 18:34:04'),
(2317, 'supplier', 'all', 3, '2022-05-26 18:34:09'),
(2318, 'charge_parameter', 'all', 3, '2022-05-26 18:34:18'),
(2319, 'charge_parameter', 'all', 3, '2022-05-26 18:35:08'),
(2320, 'charge_parameter', 'all', 3, '2022-05-26 18:35:20'),
(2321, 'charge_parameter', 'all', 3, '2022-05-26 18:35:36'),
(2322, 'charge_parameter', 'all', 3, '2022-05-26 18:36:13'),
(2323, 'charge_parameter', 'all', 3, '2022-05-26 18:36:24'),
(2324, 'charge_parameter', 'all', 3, '2022-05-26 18:37:01'),
(2325, 'charge_parameter', 'all', 3, '2022-05-26 18:37:22'),
(2326, 'charge_parameter', 'all', 3, '2022-05-26 18:38:47'),
(2327, 'charge_parameter', 'all', 3, '2022-05-26 18:39:03'),
(2328, 'charge_parameter', 'all', 3, '2022-05-26 18:39:47'),
(2329, 'charge_parameter', 'all', 3, '2022-05-26 18:40:18'),
(2330, 'grn', 'all', 3, '2022-05-26 18:40:27'),
(2331, 'grn', 'direct_add', 3, '2022-05-26 18:40:30'),
(2332, 'grn', 'form', 3, '2022-05-26 18:40:44'),
(2333, 'grn', 'direct_add', 3, '2022-05-26 18:40:44'),
(2334, 'issue', 'all', 3, '2022-05-26 18:41:09'),
(2335, 'issue', 'form', 3, '2022-05-26 18:41:09'),
(2336, 'grn', 'getForm', 3, '2022-05-26 18:42:14'),
(2337, 'grn', 'getForm', 3, '2022-05-26 18:42:16'),
(2338, 'grn', 'getForm_charges', 3, '2022-05-26 18:49:52'),
(2339, 'charge_parameter', 'all', 3, '2022-05-26 18:50:44'),
(2340, 'charge_parameter', 'form', 3, '2022-05-26 18:50:47'),
(2341, 'charge_parameter', 'form', 3, '2022-05-26 18:51:08'),
(2342, 'charge_parameter', 'all', 3, '2022-05-26 18:51:09'),
(2343, 'charge_parameter', 'form', 3, '2022-05-26 18:51:14'),
(2344, 'charge_parameter', 'form', 3, '2022-05-26 18:51:20'),
(2345, 'charge_parameter', 'all', 3, '2022-05-26 18:51:20'),
(2346, 'grn', 'direct_add', 3, '2022-05-26 18:51:22'),
(2347, 'charge_parameter', 'form', 3, '2022-05-26 18:51:29'),
(2348, 'charge_parameter', 'form', 3, '2022-05-26 18:51:35'),
(2349, 'charge_parameter', 'all', 3, '2022-05-26 18:51:35'),
(2350, 'grn', 'direct_add', 3, '2022-05-26 18:51:41'),
(2351, 'grn', 'getForm', 3, '2022-05-26 18:52:00'),
(2352, 'grn', 'getForm', 3, '2022-05-26 18:52:02'),
(2353, 'grn', 'getForm_charges', 3, '2022-05-26 18:53:02'),
(2354, 'grn', 'getForm_charges', 3, '2022-05-26 18:53:20'),
(2355, 'grn', 'getForm', 3, '2022-05-26 18:53:54'),
(2356, 'grn', 'direct_add', 3, '2022-05-26 18:55:07'),
(2357, 'grn', 'all', 3, '2022-05-26 18:55:08'),
(2358, 'grn', 'view', 3, '2022-05-26 18:55:19'),
(2359, 'grn', 'direct_add', 3, '2022-05-26 18:55:30'),
(2360, 'charge_parameter', 'all', 3, '2022-05-26 18:55:37'),
(2361, 'grn', 'direct_add', 3, '2022-05-26 18:55:43'),
(2362, 'opening_master', 'change_status', 3, '2022-05-26 18:56:21'),
(2363, 'grn', 'view', 3, '2022-05-26 18:56:21'),
(2364, 'requisition', 'cancel_row', 3, '2022-05-26 18:56:23'),
(2365, 'grn', 'view', 3, '2022-05-26 18:58:29'),
(2366, 'requisition', 'cancel_row', 3, '2022-05-26 19:02:33'),
(2367, 'grn', 'view', 3, '2022-05-26 19:25:15'),
(2368, 'issue_return', 'all', 3, '2022-05-26 19:30:27'),
(2369, 'issue_return', 'view', 3, '2022-05-26 19:30:32'),
(2370, 'issue_return', 'view', 3, '2022-05-26 19:31:15'),
(2371, 'issue_return', 'view', 3, '2022-05-26 19:32:09'),
(2372, 'issue_return', 'issue_return_post', 3, '2022-05-26 19:32:12'),
(2373, 'issue_return', 'view', 3, '2022-05-26 19:32:12'),
(2374, 'issue_return', 'view', 3, '2022-05-26 19:32:57'),
(2375, 'issue_return', 'view', 3, '2022-05-26 19:33:48'),
(2376, 'issue_return', 'issue_return_post', 3, '2022-05-26 19:33:50'),
(2377, 'issue', 'all', 3, '2022-05-26 19:33:56'),
(2378, 'issue', 'direct_view', 3, '2022-05-26 19:33:59'),
(2379, 'issue', 'issue_post', 3, '2022-05-26 19:34:01'),
(2380, 'issue', 'direct_view', 3, '2022-05-26 19:34:02'),
(2381, 'grn', 'all', 3, '2022-05-26 19:34:07'),
(2382, 'grn', 'view', 3, '2022-05-26 19:34:12'),
(2383, 'issue_return', 'all', 3, '2022-05-26 19:34:40'),
(2384, 'issue_return', 'view', 3, '2022-05-26 19:34:46'),
(2385, 'issue_return', 'issue_return_post', 3, '2022-05-26 19:34:49'),
(2386, 'issue_return', 'all', 3, '2022-05-26 19:37:41'),
(2387, 'issue_return', 'view', 3, '2022-05-26 19:37:44'),
(2388, 'issue_return', 'issue_return_post', 3, '2022-05-26 19:37:48'),
(2389, 'issue_return', 'view', 3, '2022-05-26 19:37:48'),
(2390, 'issue_return', 'view', 3, '2022-05-26 19:37:50'),
(2391, 'issue_return', 'view', 3, '2022-05-26 19:38:14'),
(2392, 'issue_return', 'view', 3, '2022-05-26 19:38:27'),
(2393, 'issue_return', 'issue_return_post', 3, '2022-05-26 19:38:30'),
(2394, 'grn', 'direct_add', 3, '2022-05-26 19:41:27'),
(2395, 'grn', 'form', 3, '2022-05-26 19:44:00'),
(2396, 'grn', 'direct_add', 3, '2022-05-26 19:44:00'),
(2397, 'grn', 'getForm', 3, '2022-05-26 19:44:07'),
(2398, 'grn', 'view', 3, '2022-05-26 20:16:56'),
(2399, 'grn', 'getForm', 3, '2022-05-26 20:17:27'),
(2400, 'grn', 'direct_add', 3, '2022-05-26 20:17:56'),
(2401, 'grn', 'all', 3, '2022-05-26 20:17:56'),
(2402, 'grn', 'view', 3, '2022-05-26 20:18:03'),
(2403, 'opening_master', 'change_status', 3, '2022-05-26 20:18:12'),
(2404, 'grn', 'view', 3, '2022-05-26 20:18:12'),
(2405, 'grn', 'direct_add', 3, '2022-05-26 20:19:15'),
(2406, 'grn', 'getForm', 3, '2022-05-26 20:19:29'),
(2407, 'grn', 'getForm', 3, '2022-05-26 20:19:31'),
(2408, 'grn', 'direct_add', 3, '2022-05-26 20:19:57'),
(2409, 'grn', 'all', 3, '2022-05-26 20:19:57'),
(2410, 'grn', 'view', 3, '2022-05-26 20:20:03'),
(2411, 'grn', 'view', 3, '2022-05-26 20:20:59'),
(2412, 'grn', 'view', 3, '2022-05-26 20:21:15'),
(2413, 'grn', 'all', 3, '2022-05-26 20:21:15'),
(2414, 'grn', 'view', 3, '2022-05-26 20:21:23'),
(2415, 'grn', 'grn_post', 3, '2022-05-26 20:21:32'),
(2416, 'opening_master', 'change_status', 3, '2022-05-26 20:21:35'),
(2417, 'grn', 'view', 3, '2022-05-26 20:21:35'),
(2418, 'grn', 'grn_post', 3, '2022-05-26 20:21:38'),
(2419, 'grn', 'view', 3, '2022-05-26 20:21:38'),
(2420, 'grn', 'all', 3, '2022-05-26 20:22:22'),
(2421, 'grn', 'view', 3, '2022-05-26 20:22:50'),
(2422, 'grn', 'grn_post', 3, '2022-05-26 20:22:55'),
(2423, 'grn', 'view', 3, '2022-05-26 20:22:55'),
(2424, 'grn', 'all', 3, '2022-05-26 20:23:56'),
(2425, 'grn_return', 'all', 3, '2022-05-26 20:24:03'),
(2426, 'grn_return', 'form', 3, '2022-05-26 20:24:06'),
(2427, 'charge_parameter', 'all', 3, '2022-05-26 20:25:44'),
(2428, 'grn', 'all', 3, '2022-05-26 20:25:48'),
(2429, 'grn', 'view', 3, '2022-05-26 20:25:52'),
(2430, 'grn', 'grn_post', 3, '2022-05-26 20:26:05'),
(2431, 'grn', 'view', 3, '2022-05-26 20:26:05'),
(2432, 'grn', 'view', 3, '2022-05-26 20:26:43'),
(2433, 'grn', 'grn_post', 3, '2022-05-26 20:26:45'),
(2434, 'grn', 'all', 3, '2022-05-26 20:26:49'),
(2435, 'grn', 'view', 3, '2022-05-26 20:26:53'),
(2436, 'grn', 'grn_post', 3, '2022-05-26 20:26:58'),
(2437, 'grn', 'view', 3, '2022-05-26 20:26:58'),
(2438, 'grn', 'view', 3, '2022-05-26 20:27:00'),
(2439, 'grn_return', 'all', 3, '2022-05-26 20:27:16'),
(2440, 'grn_return', 'form', 3, '2022-05-26 20:27:19'),
(2441, 'grn_return', 'form', 3, '2022-05-26 20:27:24'),
(2442, 'grn_return', 'add', 3, '2022-05-26 20:27:24'),
(2443, 'grn_return', 'add', 3, '2022-05-26 20:28:19'),
(2444, 'grn_return', 'all', 3, '2022-05-26 20:28:19'),
(2445, 'grn_return', 'view', 3, '2022-05-26 20:28:24'),
(2446, 'grn_return', 'all', 3, '2022-05-26 20:28:29'),
(2447, 'grn_return', 'all', 3, '2022-05-26 20:32:15'),
(2448, 'grn_return', 'form', 3, '2022-05-26 20:32:20'),
(2449, 'grn_return', 'form', 3, '2022-05-26 20:32:24'),
(2450, 'grn_return', 'add', 3, '2022-05-26 20:32:24'),
(2451, 'grn_return', 'add', 3, '2022-05-26 20:33:01'),
(2452, 'grn_return', 'all', 3, '2022-05-26 20:33:02'),
(2453, 'grn_return', 'view', 3, '2022-05-26 20:33:08'),
(2454, 'grn_return', 'view', 3, '2022-05-26 20:33:09'),
(2455, 'opening_master', 'change_status', 3, '2022-05-26 20:33:13'),
(2456, 'grn_return', 'view', 3, '2022-05-26 20:33:13'),
(2457, 'requisition', 'cancel_row', 3, '2022-05-26 20:33:15'),
(2458, 'opening_master', 'change_status', 3, '2022-05-26 20:33:18'),
(2459, 'grn_return', 'view', 3, '2022-05-26 20:33:19'),
(2460, 'requisition', 'cancel_row', 3, '2022-05-26 20:33:20'),
(2461, 'grn_return', 'all', 3, '2022-05-26 20:33:24'),
(2462, 'grn_return', 'all', 3, '2022-05-26 20:33:47'),
(2463, 'grn_return', 'view', 3, '2022-05-26 20:33:52'),
(2464, 'dashboard', NULL, 3, '2022-05-27 02:47:45'),
(2465, 'grn_return', 'all', 3, '2022-05-27 02:48:31'),
(2466, 'grn_return', 'view', 3, '2022-05-27 02:48:36'),
(2467, 'grn_return', 'form', 3, '2022-05-27 03:13:34'),
(2468, 'grn_return', 'form', 3, '2022-05-27 03:13:38'),
(2469, 'grn_return', 'add', 3, '2022-05-27 03:13:38'),
(2470, 'grn_return', 'all', 3, '2022-05-27 03:23:08'),
(2471, 'grn_return', 'view', 3, '2022-05-27 03:23:12'),
(2472, 'grn_return', 'grn_return_post', 3, '2022-05-27 03:23:16'),
(2473, 'grn_return', 'view', 3, '2022-05-27 03:23:17'),
(2474, 'grn_return', 'view', 3, '2022-05-27 03:24:23'),
(2475, 'requisition', 'cancel_row', 3, '2022-05-27 03:26:17'),
(2476, 'grn_return', 'grn_return_post', 3, '2022-05-27 03:26:19'),
(2477, 'dashboard', NULL, 3, '2022-05-27 05:39:45'),
(2478, 'opening_master', 'all', 3, '2022-05-27 05:40:41'),
(2479, 'opening_master', 'view', 3, '2022-05-27 05:40:44'),
(2480, 'opening_master', 'all', 3, '2022-05-27 05:40:47'),
(2481, 'opening_master', 'view', 3, '2022-05-27 05:40:50'),
(2482, 'opening_master', 'view', 3, '2022-05-27 05:40:51'),
(2483, 'opening_master', 'form', 3, '2022-05-27 05:42:50'),
(2484, 'opening_master', 'all', 3, '2022-05-27 05:42:55'),
(2485, 'opening_master', 'form', 3, '2022-05-27 05:43:17'),
(2486, 'opening_master', 'all', 3, '2022-05-27 05:43:24'),
(2487, 'opening_master', 'form', 3, '2022-05-27 05:46:23'),
(2488, 'opening_master', 'all', 3, '2022-05-27 05:46:28'),
(2489, 'opening_master', 'form', 3, '2022-05-27 05:51:06'),
(2490, 'items', 'all', 3, '2022-05-27 06:02:48'),
(2491, 'items', 'form', 3, '2022-05-27 06:02:51'),
(2492, 'items', 'form', 3, '2022-05-27 06:02:51'),
(2493, 'issue', 'all', 3, '2022-05-27 06:06:27'),
(2494, 'issue', 'view', 3, '2022-05-27 06:06:34'),
(2495, 'issue', 'direct_view', 3, '2022-05-27 06:06:36'),
(2496, 'issue_return', 'all', 3, '2022-05-27 06:08:33'),
(2497, 'issue_return', 'view', 3, '2022-05-27 06:08:36'),
(2498, 'grn', 'all', 3, '2022-05-27 06:13:53'),
(2499, 'grn', 'view', 3, '2022-05-27 06:14:02'),
(2500, 'grn', 'view', 3, '2022-05-27 06:14:03'),
(2501, 'grn', 'direct_add', 3, '2022-05-27 06:14:06'),
(2502, 'grn', 'all', 3, '2022-05-27 06:14:35'),
(2503, 'opening_master', 'all', 3, '2022-05-27 06:49:20'),
(2504, 'opening_master', 'view', 3, '2022-05-27 06:49:26'),
(2505, 'opening_master', 'form', 3, '2022-05-27 06:49:32'),
(2506, 'dashboard', NULL, 3, '2022-05-30 08:41:36'),
(2507, 'issue_return', 'all', 3, '2022-05-30 08:41:42'),
(2508, 'issue_return', 'view', 3, '2022-05-30 08:41:46'),
(2509, 'issue_return', 'form', 3, '2022-05-30 08:42:47'),
(2510, 'issue_return', 'form', 3, '2022-05-30 08:43:03'),
(2511, 'issue_return', 'add', 3, '2022-05-30 08:43:03'),
(2512, 'grn', 'direct_add', 3, '2022-05-30 08:43:51'),
(2513, 'grn', 'form', 3, '2022-05-30 08:43:55'),
(2514, 'grn', 'direct_add', 3, '2022-05-30 08:43:55'),
(2515, 'grn', 'getForm', 3, '2022-05-30 08:43:59'),
(2516, 'grn', 'direct_add', 3, '2022-05-30 08:44:08'),
(2517, 'grn', 'direct_add', 3, '2022-05-30 08:44:11'),
(2518, 'grn', 'form', 3, '2022-05-30 08:44:24'),
(2519, 'grn', 'direct_add', 3, '2022-05-30 08:44:24'),
(2520, 'grn', 'getForm', 3, '2022-05-30 08:44:29'),
(2521, 'issue_return', 'add', 3, '2022-05-30 08:46:46'),
(2522, 'issue_return', 'all', 3, '2022-05-30 08:47:00'),
(2523, 'issue_return', 'view', 3, '2022-05-30 08:47:04'),
(2524, 'issue_return', 'edit', 3, '2022-05-30 08:47:06'),
(2525, 'issue_return', 'edit', 3, '2022-05-30 08:50:43'),
(2526, 'issue_return', 'edit', 3, '2022-05-30 08:51:45'),
(2527, 'issue_return', 'edit', 3, '2022-05-30 08:52:16'),
(2528, 'issue_return', 'edit', 3, '2022-05-30 08:52:37'),
(2529, 'issue_return', 'add', 3, '2022-05-30 08:53:15'),
(2530, 'issue_return', 'add', 3, '2022-05-30 08:56:27'),
(2531, 'issue_return', 'add', 3, '2022-05-30 08:57:10'),
(2532, 'issue_return', 'all', 3, '2022-05-30 08:57:10'),
(2533, 'issue_return', 'edit', 3, '2022-05-30 08:57:18'),
(2534, 'issue_return', 'edit', 3, '2022-05-30 08:57:18'),
(2535, 'issue_return', 'view', 3, '2022-05-30 08:57:33'),
(2536, 'issue_return', 'view', 3, '2022-05-30 08:57:33'),
(2537, 'opening_master', 'change_status', 3, '2022-05-30 08:57:39'),
(2538, 'issue_return', 'view', 3, '2022-05-30 08:57:39'),
(2539, 'issue_return', 'view', 3, '2022-05-30 09:01:28'),
(2540, 'issue_return', 'view', 3, '2022-05-30 09:01:30'),
(2541, 'issue_return', 'issue_return_post', 3, '2022-05-30 09:01:36'),
(2542, 'issue_return', 'view', 3, '2022-05-30 09:01:36'),
(2543, 'issue_return', 'view', 3, '2022-05-30 09:02:38'),
(2544, 'opening_master', 'change_status', 3, '2022-05-30 09:02:44'),
(2545, 'issue_return', 'view', 3, '2022-05-30 09:02:44'),
(2546, 'issue_return', 'issue_return_post', 3, '2022-05-30 09:02:46'),
(2547, 'issue_return', 'view', 3, '2022-05-30 09:02:46'),
(2548, 'grn_return', 'all', 3, '2022-05-30 09:04:32'),
(2549, 'grn_return', 'view', 3, '2022-05-30 09:04:47'),
(2550, 'grn_return', 'view', 3, '2022-05-30 09:04:48'),
(2551, 'grn_return', 'view', 3, '2022-05-30 09:20:29'),
(2552, 'grn_return', 'form', 3, '2022-05-30 09:20:36'),
(2553, 'grn_return', 'form', 3, '2022-05-30 09:20:45'),
(2554, 'grn_return', 'add', 3, '2022-05-30 09:20:45'),
(2555, 'grn_return', 'all', 3, '2022-05-30 09:20:52'),
(2556, 'grn_return', 'view', 3, '2022-05-30 09:20:55'),
(2557, 'grn_return', 'view', 3, '2022-05-30 09:20:55'),
(2558, 'grn_return', 'grn_return_post', 3, '2022-05-30 09:21:57'),
(2559, 'grn_return', 'view', 3, '2022-05-30 09:21:57'),
(2560, 'sales', 'all', 3, '2022-05-30 09:23:13'),
(2561, 'sales', 'add', 3, '2022-05-30 09:23:22'),
(2562, 'client', 'all', 3, '2022-05-30 09:23:49'),
(2563, 'client', 'form', 3, '2022-05-30 09:23:51'),
(2564, 'client', 'form', 3, '2022-05-30 09:24:40'),
(2565, 'client', 'all', 3, '2022-05-30 09:24:40'),
(2566, 'client', 'form', 3, '2022-05-30 09:24:42'),
(2567, 'client', 'form', 3, '2022-05-30 09:25:16'),
(2568, 'client', 'all', 3, '2022-05-30 09:25:16'),
(2569, 'sales', 'add', 3, '2022-05-30 09:25:22'),
(2570, 'items', 'form', 3, '2022-05-30 09:25:59'),
(2571, 'sales', 'add', 3, '2022-05-30 09:27:39'),
(2572, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-30 09:27:53'),
(2573, 'items', 'form', 3, '2022-05-30 09:28:31'),
(2574, 'items', 'all', 3, '2022-05-30 09:28:31'),
(2575, 'sales', 'add', 3, '2022-05-30 09:28:37'),
(2576, 'sales', 'getForm', 3, '2022-05-30 09:29:08'),
(2577, 'sales', 'getForm', 3, '2022-05-30 09:29:12'),
(2578, 'sales', 'add', 3, '2022-05-30 09:29:35'),
(2579, 'sales', 'getForm', 3, '2022-05-30 09:30:11'),
(2580, 'sales', 'getForm', 3, '2022-05-30 09:30:12'),
(2581, 'sales', 'getForm', 3, '2022-05-30 09:30:13'),
(2582, 'sales', 'getForm', 3, '2022-05-30 09:31:38'),
(2583, 'sales', 'getForm', 3, '2022-05-30 09:31:42'),
(2584, 'sales', 'add', 3, '2022-05-30 09:31:54'),
(2585, 'sales', 'add', 3, '2022-05-30 09:41:34'),
(2586, 'sales', 'add', 3, '2022-05-30 09:43:16'),
(2587, 'sales', 'all', 3, '2022-05-30 09:43:16'),
(2588, 'sales', 'edit', 3, '2022-05-30 09:43:21'),
(2589, 'sales', 'view', 3, '2022-05-30 09:44:10'),
(2590, 'opening_master', 'change_status', 3, '2022-05-30 09:44:31'),
(2591, 'sales', 'view', 3, '2022-05-30 09:44:31'),
(2592, 'requisition', 'cancel_row', 3, '2022-05-30 09:44:32'),
(2593, 'sales', 'view', 3, '2022-05-30 09:46:11'),
(2594, 'sales', 'view', 3, '2022-05-30 09:48:35'),
(2595, 'issue', 'all', 3, '2022-05-30 09:53:19'),
(2596, 'issue', 'direct_view', 3, '2022-05-30 09:54:23'),
(2597, 'sales', 'add', 3, '2022-05-30 09:54:40'),
(2598, 'sales', 'getForm', 3, '2022-05-30 09:54:44'),
(2599, 'sales', 'getForm', 3, '2022-05-30 09:54:46'),
(2600, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2601, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2602, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2603, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2604, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2605, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2606, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2607, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2608, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2609, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2610, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2611, 'sales', 'edit', 3, '2022-05-30 09:54:53'),
(2612, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2613, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2614, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2615, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2616, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2617, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2618, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2619, 'sales', 'edit', 3, '2022-05-30 09:54:54'),
(2620, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2621, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2622, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2623, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2624, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2625, 'sales', 'edit', 3, '2022-05-30 09:54:55'),
(2626, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2627, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2628, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2629, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2630, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2631, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2632, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2633, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2634, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2635, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2636, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2637, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2638, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2639, 'sales', 'edit', 3, '2022-05-30 09:54:56'),
(2640, 'sales', 'all', 3, '2022-05-30 09:55:03'),
(2641, 'sales', 'view', 3, '2022-05-30 09:55:23'),
(2642, 'sales', 'all', 3, '2022-05-30 09:56:02'),
(2643, 'sales', 'edit', 3, '2022-05-30 09:56:04'),
(2644, 'sales', 'view', 3, '2022-05-30 09:56:19'),
(2645, 'sales', 'view', 3, '2022-05-30 09:59:12'),
(2646, 'sales', 'view', 3, '2022-05-30 09:59:31'),
(2647, 'issue', 'form', 3, '2022-05-30 10:00:33'),
(2648, 'issue', 'form', 3, '2022-05-30 10:00:38'),
(2649, 'issue', 'direct_add', 3, '2022-05-30 10:00:38'),
(2650, 'issue', 'getForm', 3, '2022-05-30 10:00:43'),
(2651, 'issue', 'getForm', 3, '2022-05-30 10:00:46'),
(2652, 'issue', 'getForm', 3, '2022-05-30 10:00:50'),
(2653, 'sales', 'view', 3, '2022-05-30 10:04:58'),
(2654, 'sales', 'view', 3, '2022-05-30 10:38:59'),
(2655, 'sales', 'all', 3, '2022-05-30 10:39:01'),
(2656, 'sales', 'all', 3, '2022-05-30 10:39:19'),
(2657, 'opening_master', 'change_status', 3, '2022-05-30 10:39:22'),
(2658, 'sales', 'view', 3, '2022-05-30 10:39:22'),
(2659, 'sales', 'view', 3, '2022-05-30 10:40:35'),
(2660, 'sales', 'sales_post', 3, '2022-05-30 10:40:44'),
(2661, 'sales', 'view', 3, '2022-05-30 10:40:44'),
(2662, 'sales', 'view', 3, '2022-05-30 10:40:44'),
(2663, 'sales', 'sales_post', 3, '2022-05-30 10:42:26'),
(2664, 'sales', 'view', 3, '2022-05-30 10:42:26'),
(2665, 'requisition', 'cancel_row', 3, '2022-05-30 10:42:27'),
(2666, 'opening_master', 'change_status', 3, '2022-05-30 10:42:28'),
(2667, 'sales', 'view', 3, '2022-05-30 10:42:28'),
(2668, 'sales', 'all', 3, '2022-05-30 10:42:38'),
(2669, 'sales', 'view', 3, '2022-05-30 10:42:40'),
(2670, 'sales', 'all', 3, '2022-05-30 10:43:57'),
(2671, 'sales_return', 'all', 3, '2022-05-30 10:45:48'),
(2672, 'sales_return', 'form', 3, '2022-05-30 10:45:51'),
(2673, 'sales_return', 'form', 3, '2022-05-30 10:45:54'),
(2674, 'sales_return', 'add', 3, '2022-05-30 10:45:54'),
(2675, 'sales_return', 'add', 3, '2022-05-30 10:46:09'),
(2676, 'sales_return', 'add', 3, '2022-05-30 10:49:25'),
(2677, 'sales_return', 'add', 3, '2022-05-30 10:52:09'),
(2678, 'sales_return', 'add', 3, '2022-05-30 10:52:46'),
(2679, 'sales_return', 'all', 3, '2022-05-30 10:52:46'),
(2680, 'sales_return', 'edit', 3, '2022-05-30 10:52:49'),
(2681, 'sales_return', 'all', 3, '2022-05-30 10:52:53'),
(2682, 'sales_return', 'view', 3, '2022-05-30 10:52:56'),
(2683, 'sales_return', 'all', 3, '2022-05-30 10:53:03'),
(2684, 'sales_return', 'view', 3, '2022-05-30 10:53:33'),
(2685, 'sales_return', 'view', 3, '2022-05-30 10:54:13'),
(2686, 'sales_return', 'all', 3, '2022-05-30 10:54:17'),
(2687, 'sales_return', 'edit', 3, '2022-05-30 10:54:19'),
(2688, 'sales_return', 'all', 3, '2022-05-30 10:54:21'),
(2689, 'sales_return', 'view', 3, '2022-05-30 10:54:23'),
(2690, 'sales_return', 'view', 3, '2022-05-30 10:54:50'),
(2691, 'opening_master', 'change_status', 3, '2022-05-30 10:54:58'),
(2692, 'sales_return', 'view', 3, '2022-05-30 10:54:58'),
(2693, 'sales_return', 'all', 3, '2022-05-30 10:55:46'),
(2694, 'sales_return', 'form', 3, '2022-05-30 10:55:48'),
(2695, 'sales_return', 'form', 3, '2022-05-30 10:55:50'),
(2696, 'sales_return', 'add', 3, '2022-05-30 10:55:50'),
(2697, 'sales_return', 'form', 3, '2022-05-30 11:04:47'),
(2698, 'sales_return', 'all', 3, '2022-05-30 11:04:50'),
(2699, 'sales_return', 'view', 3, '2022-05-30 11:04:52'),
(2700, 'sales_return', 'form', 3, '2022-05-30 11:06:49'),
(2701, 'sales_return', 'form', 3, '2022-05-30 11:06:51'),
(2702, 'sales_return', 'add', 3, '2022-05-30 11:06:51'),
(2703, 'issue_return', 'all', 3, '2022-05-30 11:08:16'),
(2704, 'issue_return', 'form', 3, '2022-05-30 11:08:19'),
(2705, 'issue_return', 'form', 3, '2022-05-30 11:08:22'),
(2706, 'issue_return', 'add', 3, '2022-05-30 11:08:22'),
(2707, 'sales_return', 'getForm', 3, '2022-05-30 11:08:44'),
(2708, 'sales_return', 'add', 3, '2022-05-30 11:11:35'),
(2709, 'sales_return', 'form', 3, '2022-05-30 11:11:42'),
(2710, 'sales_return', 'all', 3, '2022-05-30 11:11:43'),
(2711, 'sales_return', 'view', 3, '2022-05-30 11:11:47'),
(2712, 'sales_return', 'all', 3, '2022-05-30 11:11:49'),
(2713, 'sales_return', 'all', 3, '2022-05-30 11:12:07'),
(2714, 'sales_return', 'edit', 3, '2022-05-30 11:12:08'),
(2715, 'sales_return', 'edit', 3, '2022-05-30 11:12:48'),
(2716, 'sales_return', 'edit', 3, '2022-05-30 11:13:08'),
(2717, 'sales_return', 'edit', 3, '2022-05-30 11:13:24'),
(2718, 'sales_return', 'getForm', 3, '2022-05-30 11:13:36'),
(2719, 'issue_return', 'all', 3, '2022-05-30 11:15:10'),
(2720, 'issue_return', 'form', 3, '2022-05-30 11:15:13'),
(2721, 'issue_return', 'form', 3, '2022-05-30 11:15:15'),
(2722, 'issue_return', 'add', 3, '2022-05-30 11:15:15'),
(2723, 'sales_return', 'edit', 3, '2022-05-30 11:20:27'),
(2724, 'sales_return', 'edit', 3, '2022-05-30 11:20:29'),
(2725, 'sales_return', 'getForm', 3, '2022-05-30 11:20:34'),
(2726, 'sales_return', 'edit', 3, '2022-05-30 11:21:57'),
(2727, 'sales_return', 'all', 3, '2022-05-30 11:22:08'),
(2728, 'sales_return', 'getForm', 3, '2022-05-30 11:22:14'),
(2729, 'sales_return', 'edit', 3, '2022-05-30 11:22:25'),
(2730, 'sales_return', 'all', 3, '2022-05-30 11:22:25'),
(2731, 'sales_return', 'edit', 3, '2022-05-30 11:22:27'),
(2732, 'sales_return', 'all', 3, '2022-05-30 11:22:32'),
(2733, 'sales_return', 'form', 3, '2022-05-30 11:22:34'),
(2734, 'sales_return', 'form', 3, '2022-05-30 11:22:36'),
(2735, 'sales_return', 'add', 3, '2022-05-30 11:22:36'),
(2736, 'sales_return', 'getForm', 3, '2022-05-30 11:22:46'),
(2737, 'sales_return', 'edit', 3, '2022-05-30 11:24:46'),
(2738, 'sales_return', 'edit', 3, '2022-05-30 11:24:52'),
(2739, 'sales_return', 'all', 3, '2022-05-30 11:24:52'),
(2740, 'sales_return', 'edit', 3, '2022-05-30 11:24:54'),
(2741, 'sales_return', 'all', 3, '2022-05-30 11:24:59'),
(2742, 'sales_return', 'form', 3, '2022-05-30 11:25:02'),
(2743, 'sales_return', 'form', 3, '2022-05-30 11:25:11'),
(2744, 'sales_return', 'form', 3, '2022-05-30 11:25:13'),
(2745, 'sales_return', 'add', 3, '2022-05-30 11:25:13'),
(2746, 'sales_return', 'add', 3, '2022-05-30 11:25:44'),
(2747, 'sales_return', 'getForm', 3, '2022-05-30 11:25:48'),
(2748, 'sales_return', 'add', 3, '2022-05-30 11:26:16'),
(2749, 'sales_return', 'all', 3, '2022-05-30 11:26:16'),
(2750, 'sales_return', 'edit', 3, '2022-05-30 11:26:18'),
(2751, 'sales_return', 'all', 3, '2022-05-30 11:26:21'),
(2752, 'sales_return', 'view', 3, '2022-05-30 11:26:23'),
(2753, 'opening_master', 'change_status', 3, '2022-05-30 11:26:27'),
(2754, 'sales_return', 'view', 3, '2022-05-30 11:26:27'),
(2755, 'sales_return', 'all', 3, '2022-05-30 11:27:30'),
(2756, 'sales_return', 'all', 3, '2022-05-30 11:27:32'),
(2757, 'sales_return', 'view', 3, '2022-05-30 11:27:35'),
(2758, 'issue_return', 'all', 3, '2022-05-30 11:33:29'),
(2759, 'issue_return', 'view', 3, '2022-05-30 11:33:32'),
(2760, 'opening_master', 'change_status', 3, '2022-05-30 11:33:34'),
(2761, 'issue_return', 'view', 3, '2022-05-30 11:33:34'),
(2762, 'issue_return', 'issue_return_post', 3, '2022-05-30 11:33:35'),
(2763, 'issue_return', 'issue_return_post', 3, '2022-05-30 11:33:36'),
(2764, 'issue_return', 'issue_return_post', 3, '2022-05-30 11:33:37'),
(2765, 'issue_return', 'all', 3, '2022-05-30 11:37:43'),
(2766, 'sales_return', 'all', 3, '2022-05-30 11:37:48'),
(2767, 'sales_return', 'form', 3, '2022-05-30 11:37:51'),
(2768, 'sales_return', 'form', 3, '2022-05-30 11:37:53'),
(2769, 'sales_return', 'add', 3, '2022-05-30 11:37:53'),
(2770, 'sales_return', 'form', 3, '2022-05-30 11:42:13'),
(2771, 'sales_return', 'all', 3, '2022-05-30 11:42:17'),
(2772, 'sales_return', 'all', 3, '2022-05-30 11:42:18'),
(2773, 'sales_return', 'view', 3, '2022-05-30 11:42:20'),
(2774, 'sales_return', 'sales_return_post', 3, '2022-05-30 11:42:23'),
(2775, 'sales_return', 'view', 3, '2022-05-30 11:42:24'),
(2776, 'sales_return', 'view', 3, '2022-05-30 11:42:39'),
(2777, 'sales_return', 'all', 3, '2022-05-30 11:43:32'),
(2778, 'sales_return', 'view', 3, '2022-05-30 11:43:34'),
(2779, 'sales_return', 'sales_return_post', 3, '2022-05-30 11:43:36'),
(2780, 'sales_return', 'view', 3, '2022-05-30 11:43:36'),
(2781, 'sales_return', 'view', 3, '2022-05-30 11:43:39'),
(2782, 'sales_return', 'sales_return_post', 3, '2022-05-30 11:43:41'),
(2783, 'dashboard', NULL, 3, '2022-05-31 05:17:02'),
(2784, 'location_transfer', 'all', 3, '2022-05-31 05:20:10'),
(2785, 'location_transfer', 'form', 3, '2022-05-31 05:20:14'),
(2786, 'location_transfer', 'getItems', 3, '2022-05-31 05:20:23'),
(2787, 'location_transfer', 'getItems', 3, '2022-05-31 05:20:45'),
(2788, 'location_transfer', 'getItems', 3, '2022-05-31 05:20:49'),
(2789, 'items', 'all', 3, '2022-05-31 05:20:58'),
(2790, 'opening_master', 'form', 3, '2022-05-31 05:21:21'),
(2791, 'items', 'all', 3, '2022-05-31 05:21:40'),
(2792, 'items', 'form', 3, '2022-05-31 05:21:45'),
(2793, 'items', 'form', 3, '2022-05-31 05:21:45'),
(2794, 'items', 'form', 3, '2022-05-31 05:21:46'),
(2795, 'items', 'form', 3, '2022-05-31 05:22:14'),
(2796, 'items', 'form', 3, '2022-05-31 05:22:15'),
(2797, 'items', 'form', 3, '2022-05-31 05:22:16'),
(2798, 'opening_master', 'form', 3, '2022-05-31 05:22:57'),
(2799, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-31 05:24:12'),
(2800, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-31 05:24:16'),
(2801, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-31 05:24:21'),
(2802, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-31 05:24:25'),
(2803, 'opening_master', 'getItemsAndHeadings', 3, '2022-05-31 05:24:36'),
(2804, 'opening_master', 'getForm', 3, '2022-05-31 05:24:40'),
(2805, 'location_transfer', 'form', 3, '2022-05-31 05:25:29'),
(2806, 'location_transfer', 'getItems', 3, '2022-05-31 05:25:36'),
(2807, 'opening_master', 'form', 3, '2022-05-31 05:25:51'),
(2808, 'opening_master', 'form', 3, '2022-05-31 05:27:18'),
(2809, 'opening_master', 'form', 3, '2022-05-31 05:27:22'),
(2810, 'opening_master', 'form', 3, '2022-05-31 05:28:17'),
(2811, 'opening_master', 'all', 3, '2022-05-31 05:28:17'),
(2812, 'opening_master', 'all', 3, '2022-05-31 05:29:39'),
(2813, 'opening_master', 'form', 3, '2022-05-31 05:29:42'),
(2814, 'opening_master', 'getForm', 3, '2022-05-31 05:30:00'),
(2815, 'opening_master', 'form', 3, '2022-05-31 05:30:30'),
(2816, 'opening_master', 'form', 3, '2022-05-31 05:31:02'),
(2817, 'opening_master', 'all', 3, '2022-05-31 05:31:02'),
(2818, 'opening_master', 'form', 3, '2022-05-31 05:31:20'),
(2819, 'opening_master', 'view', 3, '2022-05-31 05:31:33'),
(2820, 'opening_master', 'opening_post', 3, '2022-05-31 05:31:37'),
(2821, 'opening_master', 'change_status', 3, '2022-05-31 05:31:38'),
(2822, 'opening_master', 'view', 3, '2022-05-31 05:31:38'),
(2823, 'opening_master', 'opening_post', 3, '2022-05-31 05:31:39'),
(2824, 'opening_master', 'view', 3, '2022-05-31 05:31:40'),
(2825, 'location_transfer', 'form', 3, '2022-05-31 05:31:52'),
(2826, 'location_transfer', 'getItems', 3, '2022-05-31 05:31:59'),
(2827, 'location_transfer', 'getItems', 3, '2022-05-31 05:32:06'),
(2828, 'location_transfer', 'getForm', 3, '2022-05-31 05:32:08'),
(2829, 'location_transfer', 'form', 3, '2022-05-31 05:32:46'),
(2830, 'location_transfer', 'all', 3, '2022-05-31 05:32:47'),
(2831, 'location_transfer', 'form', 3, '2022-05-31 05:32:59'),
(2832, 'location_transfer', 'form', 3, '2022-05-31 05:33:06'),
(2833, 'location_transfer', 'all', 3, '2022-05-31 05:33:06'),
(2834, 'location_transfer', 'all', 3, '2022-05-31 05:38:42'),
(2835, 'location_transfer', 'soft_delete', 3, '2022-05-31 05:38:44'),
(2836, 'location_transfer', 'all', 3, '2022-05-31 05:38:44'),
(2837, 'location_transfer', 'all', 3, '2022-05-31 05:38:52'),
(2838, 'location_transfer', 'form', 3, '2022-05-31 05:38:58'),
(2839, 'location_transfer', 'all', 3, '2022-05-31 05:40:35'),
(2840, 'location_transfer', 'form', 3, '2022-05-31 05:40:41'),
(2841, 'location_transfer', 'form', 3, '2022-05-31 05:40:46'),
(2842, 'location_transfer', 'form', 3, '2022-05-31 05:40:46'),
(2843, 'location_transfer', 'form', 3, '2022-05-31 05:40:56'),
(2844, 'location_transfer', 'all', 3, '2022-05-31 05:40:56'),
(2845, 'location_transfer', 'view', 3, '2022-05-31 05:40:59'),
(2846, 'opening_master', 'change_status', 3, '2022-05-31 05:41:01'),
(2847, 'opening_master', 'change_status', 3, '2022-05-31 05:41:02'),
(2848, 'opening_master', 'change_status', 3, '2022-05-31 05:41:14'),
(2849, 'location_transfer', 'view', 3, '2022-05-31 05:44:23'),
(2850, 'opening_master', 'change_status', 3, '2022-05-31 05:44:26'),
(2851, 'location_transfer', 'view', 3, '2022-05-31 05:44:26'),
(2852, 'requisition', 'cancel_row', 3, '2022-05-31 05:44:28'),
(2853, 'requisition', 'cancel_row', 3, '2022-05-31 05:54:41'),
(2854, 'sales', 'all', 3, '2022-05-31 05:56:16'),
(2855, 'sales', 'view', 3, '2022-05-31 05:56:37'),
(2856, 'sales', 'view', 3, '2022-05-31 05:57:39'),
(2857, 'sales', 'view', 3, '2022-05-31 05:57:57'),
(2858, 'location_transfer', 'view', 3, '2022-05-31 05:59:20'),
(2859, 'location_transfer', 'form', 3, '2022-05-31 05:59:51'),
(2860, 'location_transfer', 'getForm', 3, '2022-05-31 05:59:55'),
(2861, 'location_transfer', 'all', 3, '2022-05-31 06:00:08'),
(2862, 'dashboard', NULL, 3, '2022-05-31 08:49:33'),
(2863, 'location_transfer', 'view', 3, '2022-05-31 08:49:36'),
(2864, 'location_transfer', 'view', 3, '2022-05-31 08:54:44'),
(2865, 'opening_master', 'change_status', 3, '2022-05-31 08:54:49'),
(2866, 'location_transfer', 'view', 3, '2022-05-31 08:54:49'),
(2867, 'location_transfer', 'location_transfer_post', 3, '2022-05-31 08:54:54'),
(2868, 'location_transfer', 'view', 3, '2022-05-31 08:56:40'),
(2869, 'location_transfer', 'all', 3, '2022-05-31 08:56:40'),
(2870, 'location_transfer', 'location_transfer_post', 3, '2022-05-31 08:56:48'),
(2871, 'location_transfer', 'view', 3, '2022-05-31 08:56:49'),
(2872, 'location_transfer', 'view', 3, '2022-05-31 08:56:49'),
(2873, 'location_transfer', 'form', 3, '2022-05-31 08:58:36'),
(2874, 'location_transfer', 'getItems', 3, '2022-05-31 08:58:42'),
(2875, 'location_transfer', 'getForm', 3, '2022-05-31 08:58:46'),
(2876, 'location_transfer', 'form', 3, '2022-05-31 08:59:08'),
(2877, 'location_transfer', 'getForm', 3, '2022-05-31 08:59:11'),
(2878, 'location_transfer', 'getItems', 3, '2022-05-31 08:59:14'),
(2879, 'location_transfer', 'getForm', 3, '2022-05-31 08:59:16'),
(2880, 'location_transfer', 'getItems', 3, '2022-05-31 09:00:42'),
(2881, 'location_transfer', 'getForm', 3, '2022-05-31 09:00:45'),
(2882, 'location_transfer', 'form', 3, '2022-05-31 09:01:06'),
(2883, 'location_transfer', 'all', 3, '2022-05-31 09:01:06'),
(2884, 'location_transfer', 'view', 3, '2022-05-31 09:01:09'),
(2885, 'location_transfer', 'location_transfer_post', 3, '2022-05-31 09:01:12'),
(2886, 'location_transfer', 'view', 3, '2022-05-31 09:01:12'),
(2887, 'opening_master', 'change_status', 3, '2022-05-31 09:01:14');
INSERT INTO `user_log` (`id`, `module`, `function`, `user_id`, `date_time`) VALUES
(2888, 'location_transfer', 'view', 3, '2022-05-31 09:01:14'),
(2889, 'location_transfer', 'location_transfer_post', 3, '2022-05-31 09:01:16'),
(2890, 'location_transfer', 'view', 3, '2022-05-31 09:01:16'),
(2891, 'location_transfer', 'view', 3, '2022-05-31 09:01:16'),
(2892, 'location_transfer', 'location_transfer_post', 3, '2022-05-31 09:01:18'),
(2893, 'location_transfer', 'view', 3, '2022-05-31 09:01:18'),
(2894, 'location_transfer', 'form', 3, '2022-05-31 09:01:36'),
(2895, 'location_transfer', 'getForm', 3, '2022-05-31 09:01:40'),
(2896, 'location_transfer', 'getItems', 3, '2022-05-31 09:01:42'),
(2897, 'location_transfer', 'getForm', 3, '2022-05-31 09:01:43'),
(2898, 'requisition', 'all', 3, '2022-05-31 09:05:54'),
(2899, 'requisition', 'getStaffOfDepartment', 3, '2022-05-31 09:06:04'),
(2900, 'requisition', 'getStaffOfDepartment', 3, '2022-05-31 09:06:07'),
(2901, 'requisition', 'search', 3, '2022-05-31 09:06:23'),
(2902, 'requisition', 'search', 3, '2022-05-31 09:06:48'),
(2903, 'requisition', 'search', 3, '2022-05-31 09:06:53'),
(2904, 'requisition', 'search', 3, '2022-05-31 09:07:04'),
(2905, 'requisition', 'all', 3, '2022-05-31 09:08:02'),
(2906, 'requisition', 'all', 3, '2022-05-31 09:09:37'),
(2907, 'requisition', 'search', 3, '2022-05-31 09:09:45'),
(2908, 'requisition', 'search', 3, '2022-05-31 09:09:50'),
(2909, 'requisition', 'search', 3, '2022-05-31 09:09:57'),
(2910, 'requisition', 'search', 3, '2022-05-31 09:10:02'),
(2911, 'requisition', 'search', 3, '2022-05-31 09:10:16'),
(2912, 'requisition', 'search', 3, '2022-05-31 09:10:28'),
(2913, 'requisition', 'search', 3, '2022-05-31 09:10:35'),
(2914, 'requisition', 'search', 3, '2022-05-31 09:34:26'),
(2915, 'requisition', 'search', 3, '2022-05-31 09:34:52'),
(2916, 'requisition', 'search', 3, '2022-05-31 09:35:39'),
(2917, 'requisition', 'all', 3, '2022-05-31 09:36:11'),
(2918, 'requisition', 'all', 3, '2022-05-31 09:36:11'),
(2919, 'requisition', 'all', 3, '2022-05-31 09:37:13'),
(2920, 'requisition', 'search', 3, '2022-05-31 09:37:19'),
(2921, 'requisition', 'search', 3, '2022-05-31 09:37:29'),
(2922, 'requisition', 'all', 3, '2022-05-31 09:39:55'),
(2923, 'requisition', 'search', 3, '2022-05-31 10:00:35'),
(2924, 'requisition', 'search', 3, '2022-05-31 10:00:40'),
(2925, 'requisition', 'search', 3, '2022-05-31 10:00:57'),
(2926, 'requisition', 'all', 3, '2022-05-31 10:05:13'),
(2927, 'requisition', 'all', 3, '2022-05-31 10:05:14'),
(2928, 'requisition', 'all', 3, '2022-05-31 10:05:24'),
(2929, 'requisition', 'all', 3, '2022-05-31 10:05:58'),
(2930, 'requisition', 'all', 3, '2022-05-31 10:10:45'),
(2931, 'requisition', 'all', 3, '2022-05-31 10:11:14'),
(2932, 'requisition', 'all', 3, '2022-05-31 10:11:19'),
(2933, 'requisition', 'all', 3, '2022-05-31 10:12:50'),
(2934, 'requisition', 'all', 3, '2022-05-31 10:12:57'),
(2935, 'requisition', 'all', 3, '2022-05-31 10:18:59'),
(2936, 'requisition', 'all', 3, '2022-05-31 10:19:08'),
(2937, 'requisition', 'all', 3, '2022-05-31 10:20:05'),
(2938, 'requisition', 'all', 3, '2022-05-31 10:29:50'),
(2939, 'requisition', 'search', 3, '2022-05-31 10:30:32'),
(2940, 'requisition', 'search', 3, '2022-05-31 10:45:09'),
(2941, 'requisition', 'search', 3, '2022-05-31 10:45:16'),
(2942, 'requisition', 'search', 3, '2022-05-31 10:45:51'),
(2943, 'requisition', 'search', 3, '2022-05-31 10:45:57'),
(2944, 'requisition', 'search', 3, '2022-05-31 10:46:18'),
(2945, 'dashboard', NULL, 3, '2022-06-01 06:13:31'),
(2946, 'location_transfer', 'all', 3, '2022-06-01 06:13:50'),
(2947, 'location_transfer', 'form', 3, '2022-06-01 06:38:33'),
(2948, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:38'),
(2949, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:42'),
(2950, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:44'),
(2951, 'location_transfer', 'getItems', 3, '2022-06-01 06:38:49'),
(2952, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:51'),
(2953, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:53'),
(2954, 'location_transfer', 'getForm', 3, '2022-06-01 06:38:55'),
(2955, 'location_transfer', 'getItems', 3, '2022-06-01 06:39:27'),
(2956, 'location_transfer', 'getForm', 3, '2022-06-01 06:39:29'),
(2957, 'location_transfer', 'getItems', 3, '2022-06-01 06:39:32'),
(2958, 'location_transfer', 'getForm', 3, '2022-06-01 06:39:34'),
(2959, 'scrap', 'all', 3, '2022-06-01 06:39:40'),
(2960, 'scrap', 'form', 3, '2022-06-01 06:39:43'),
(2961, 'scrap', 'getForm', 3, '2022-06-01 06:39:53'),
(2962, 'requisition', 'all', 3, '2022-06-01 06:58:30'),
(2963, 'requisition', 'form', 3, '2022-06-01 06:58:36'),
(2964, 'requisition', 'getStaffOfDepartment', 3, '2022-06-01 06:58:51'),
(2965, 'requisition', 'getForm', 3, '2022-06-01 06:58:55'),
(2966, 'requisition', 'form', 3, '2022-06-01 06:59:24'),
(2967, 'requisition', 'all', 3, '2022-06-01 06:59:24'),
(2968, 'requisition', 'search', 3, '2022-06-01 06:59:31'),
(2969, 'requisition', 'search', 3, '2022-06-01 06:59:43'),
(2970, 'requisition', 'search', 3, '2022-06-01 07:00:20'),
(2971, 'requisition', 'search', 3, '2022-06-01 07:00:29'),
(2972, 'requisition', 'search', 3, '2022-06-01 07:00:34'),
(2973, 'requisition', 'search', 3, '2022-06-01 07:01:42'),
(2974, 'requisition', 'search', 3, '2022-06-01 07:01:57'),
(2975, 'requisition', 'search', 3, '2022-06-01 07:03:46'),
(2976, 'requisition', 'search', 3, '2022-06-01 07:03:57'),
(2977, 'requisition', 'search', 3, '2022-06-01 07:04:09'),
(2978, 'requisition', 'search', 3, '2022-06-01 07:04:18'),
(2979, 'requisition', 'all', 3, '2022-06-01 07:04:23'),
(2980, 'requisition', 'form', 3, '2022-06-01 07:04:23'),
(2981, 'requisition', 'all', 3, '2022-06-01 07:04:23'),
(2982, 'requisition', 'search', 3, '2022-06-01 07:04:30'),
(2983, 'requisition', 'all', 3, '2022-06-01 07:04:35'),
(2984, 'requisition', 'search', 3, '2022-06-01 07:04:39'),
(2985, 'requisition', 'search', 3, '2022-06-01 07:06:45'),
(2986, 'requisition', 'search', 3, '2022-06-01 07:07:28'),
(2987, 'requisition', 'search', 3, '2022-06-01 07:08:16'),
(2988, 'requisition', 'search', 3, '2022-06-01 07:09:15'),
(2989, 'requisition', 'search', 3, '2022-06-01 07:09:23'),
(2990, 'requisition', 'search', 3, '2022-06-01 07:09:53'),
(2991, 'requisition', 'search', 3, '2022-06-01 07:10:04'),
(2992, 'requisition', 'search', 3, '2022-06-01 07:10:59'),
(2993, 'requisition', 'search', 3, '2022-06-01 07:11:24'),
(2994, 'requisition', 'all', 3, '2022-06-01 07:13:42'),
(2995, 'requisition', 'all', 3, '2022-06-01 07:13:42'),
(2996, 'requisition', 'search', 3, '2022-06-01 07:13:46'),
(2997, 'requisition', 'all', 3, '2022-06-01 07:14:31'),
(2998, 'requisition', 'search', 3, '2022-06-01 07:14:34'),
(2999, 'requisition', 'search', 3, '2022-06-01 07:15:00'),
(3000, 'requisition', 'search', 3, '2022-06-01 07:15:21'),
(3001, 'requisition', 'search', 3, '2022-06-01 07:15:29'),
(3002, 'requisition', 'search', 3, '2022-06-01 07:15:34'),
(3003, 'requisition', 'search', 3, '2022-06-01 07:15:40'),
(3004, 'requisition', 'view', 3, '2022-06-01 07:15:43'),
(3005, 'requisition', 'cancel_row', 3, '2022-06-01 07:15:46'),
(3006, 'requisition', 'view', 3, '2022-06-01 07:15:46'),
(3007, 'opening_master', 'change_status', 3, '2022-06-01 07:15:47'),
(3008, 'requisition', 'all', 3, '2022-06-01 07:15:58'),
(3009, 'requisition', 'search', 3, '2022-06-01 07:16:16'),
(3010, 'requisition', 'search', 3, '2022-06-01 07:16:24'),
(3011, 'requisition', 'search', 3, '2022-06-01 07:16:29'),
(3012, 'requisition', 'search', 3, '2022-06-01 07:16:34'),
(3013, 'requisition', 'search', 3, '2022-06-01 08:23:24'),
(3014, 'requisition', 'search', 3, '2022-06-01 08:28:14'),
(3015, 'requisition', 'search', 3, '2022-06-01 08:28:27'),
(3016, 'location_transfer', 'all', 3, '2022-06-01 08:28:39'),
(3017, 'user_role', 'all', 3, '2022-06-01 08:28:52'),
(3018, 'user_role', 'all', 3, '2022-06-01 08:30:19'),
(3019, 'user_role', 'form', 3, '2022-06-01 08:30:25'),
(3020, 'staff', 'all', 3, '2022-06-01 08:30:47'),
(3021, 'staff', 'form', 3, '2022-06-01 08:31:34'),
(3022, 'staff', 'all', 3, '2022-06-01 08:31:58'),
(3023, 'staff', 'form', 3, '2022-06-01 08:32:04'),
(3024, 'staff', 'all', 3, '2022-06-01 08:32:13'),
(3025, 'fiscal_year', 'all', 3, '2022-06-01 08:32:25'),
(3026, 'fiscal_year', 'all', 3, '2022-06-01 08:32:40'),
(3027, 'scrap', 'all', 3, '2022-06-01 08:32:45'),
(3028, 'scrap', 'form', 3, '2022-06-01 08:32:48'),
(3029, 'scrap', 'getForm', 3, '2022-06-01 08:32:52'),
(3030, 'opening_master', 'form', 3, '2022-06-01 08:33:21'),
(3031, 'opening_master', 'getForm', 3, '2022-06-01 08:33:27'),
(3032, 'opening_master', 'getItemsAndHeadings', 3, '2022-06-01 08:33:29'),
(3033, 'opening_master', 'getItemsAndHeadings', 3, '2022-06-01 08:33:31'),
(3034, 'opening_master', 'getForm', 3, '2022-06-01 08:35:23'),
(3035, 'items', 'all', 3, '2022-06-01 08:50:44'),
(3036, 'items', 'form', 3, '2022-06-01 08:50:50'),
(3037, 'items', 'all', 3, '2022-06-01 08:50:58'),
(3038, 'items', 'form', 3, '2022-06-01 08:51:01'),
(3039, 'items', 'form', 3, '2022-06-01 08:51:03'),
(3040, 'items', 'form', 3, '2022-06-01 08:51:21'),
(3041, 'items', 'form', 3, '2022-06-01 08:51:23'),
(3042, 'items', 'form', 3, '2022-06-01 08:51:24'),
(3043, 'opening_master', 'form', 3, '2022-06-01 08:52:06'),
(3044, 'opening_master', 'getForm', 3, '2022-06-01 08:52:24'),
(3045, 'purchase_order', 'form', 3, '2022-06-01 08:53:29'),
(3046, 'purchase_order', 'form', 3, '2022-06-01 08:53:35'),
(3047, 'purchase_order', 'direct_add', 3, '2022-06-01 08:53:35'),
(3048, 'purchase_order', 'getForm', 3, '2022-06-01 08:53:45'),
(3049, 'items', 'form', 3, '2022-06-01 08:55:29'),
(3050, 'purchase_order', 'getForm', 3, '2022-06-01 08:56:08'),
(3051, 'purchase_order', 'direct_add', 3, '2022-06-01 10:32:49'),
(3052, 'purchase_order', 'getForm', 3, '2022-06-01 10:32:56'),
(3053, 'opening_master', 'form', 3, '2022-06-01 10:43:21'),
(3054, 'dashboard', NULL, 3, '2022-06-03 05:16:31'),
(3055, 'dashboard', NULL, 3, '2022-06-03 05:27:21'),
(3056, 'opening_master', 'all', 3, '2022-06-03 05:27:28'),
(3057, 'opening_master', 'form', 3, '2022-06-03 05:27:30'),
(3058, 'opening_master', 'getForm', 3, '2022-06-03 05:27:54'),
(3059, 'opening_master', 'getForm', 3, '2022-06-03 05:27:55'),
(3060, 'opening_master', 'form', 3, '2022-06-03 05:29:09'),
(3061, 'opening_master', 'all', 3, '2022-06-03 05:29:09'),
(3062, 'opening_master', 'view', 3, '2022-06-03 05:29:11'),
(3063, 'opening_master', 'opening_post', 3, '2022-06-03 05:29:13'),
(3064, 'opening_master', 'change_status', 3, '2022-06-03 05:29:14'),
(3065, 'opening_master', 'view', 3, '2022-06-03 05:29:14'),
(3066, 'opening_master', 'opening_post', 3, '2022-06-03 05:29:15'),
(3067, 'opening_master', 'view', 3, '2022-06-03 05:29:15'),
(3068, 'opening_master', 'all', 3, '2022-06-03 05:29:47'),
(3069, 'opening_master', 'form', 3, '2022-06-03 05:29:50'),
(3070, 'opening_master', 'getItemsAndHeadings', 3, '2022-06-03 05:29:59'),
(3071, 'opening_master', 'getForm', 3, '2022-06-03 05:30:05'),
(3072, 'opening_master', 'form', 3, '2022-06-03 05:30:22'),
(3073, 'opening_master', 'all', 3, '2022-06-03 05:30:22'),
(3074, 'opening_master', 'view', 3, '2022-06-03 05:30:25'),
(3075, 'opening_master', 'opening_post', 3, '2022-06-03 05:30:27'),
(3076, 'opening_master', 'change_status', 3, '2022-06-03 05:30:27'),
(3077, 'opening_master', 'view', 3, '2022-06-03 05:30:27'),
(3078, 'requisition', 'cancel_row', 3, '2022-06-03 05:30:28'),
(3079, 'opening_master', 'opening_post', 3, '2022-06-03 05:30:30'),
(3080, 'opening_master', 'view', 3, '2022-06-03 05:30:30'),
(3081, 'opening_master', 'form', 3, '2022-06-03 05:41:14'),
(3082, 'grn', 'all', 3, '2022-06-03 06:40:28'),
(3083, 'grn', 'direct_add', 3, '2022-06-03 06:40:32'),
(3084, 'grn', 'form', 3, '2022-06-03 06:40:34'),
(3085, 'grn', 'direct_add', 3, '2022-06-03 06:40:34'),
(3086, 'grn', 'getForm', 3, '2022-06-03 06:40:40'),
(3087, 'grn', 'getForm', 3, '2022-06-03 06:40:42'),
(3088, 'purchase_request', 'form', 3, '2022-06-03 06:42:05'),
(3089, 'purchase_request', 'form', 3, '2022-06-03 06:42:40'),
(3090, 'purchase_request', 'direct_add', 3, '2022-06-03 06:42:41'),
(3091, 'purchase_request', 'getForm', 3, '2022-06-03 06:42:44'),
(3092, 'sales_return', 'add', 3, '2022-06-03 06:42:58'),
(3093, 'sales_return', 'form', 3, '2022-06-03 06:42:58'),
(3094, 'sales_return', 'form', 3, '2022-06-03 06:43:01'),
(3095, 'sales_return', 'add', 3, '2022-06-03 06:43:01'),
(3096, 'year_end', 'all', 3, '2022-06-03 07:04:07'),
(3097, 'fiscal_year', 'all', 3, '2022-06-03 07:05:08'),
(3098, 'year_end', 'all', 3, '2022-06-03 07:07:13'),
(3099, 'year_end', 'all', 3, '2022-06-03 07:12:35'),
(3100, 'year_end', 'form', 3, '2022-06-03 07:12:51'),
(3101, 'year_end', 'all', 3, '2022-06-03 07:12:56'),
(3102, 'year_end', 'all', 3, '2022-06-03 07:14:38'),
(3103, 'year_end', 'all', 3, '2022-06-03 07:16:02'),
(3104, 'year_end', 'all', 3, '2022-06-03 07:18:53'),
(3105, 'year_end', 'all', 3, '2022-06-03 07:19:04'),
(3106, 'year_end', 'all', 3, '2022-06-03 07:19:14'),
(3107, 'year_end', 'all', 3, '2022-06-03 08:31:56'),
(3108, 'year_end', 'all', 3, '2022-06-03 08:32:34'),
(3109, 'year_end', 'all', 3, '2022-06-03 08:33:10'),
(3110, 'year_end', 'all', 3, '2022-06-03 08:34:14'),
(3111, 'year_end', 'all', 3, '2022-06-03 08:34:47'),
(3112, 'year_end', 'all', 3, '2022-06-03 08:35:54'),
(3113, 'year_end', 'all', 3, '2022-06-03 08:37:13'),
(3114, 'year_end', 'all', 3, '2022-06-03 08:37:21'),
(3115, 'year_end', 'all', 3, '2022-06-03 08:38:03'),
(3116, 'year_end', 'all', 3, '2022-06-03 08:38:18'),
(3117, 'year_end', 'all', 3, '2022-06-03 08:38:18'),
(3118, 'year_end', 'all', 3, '2022-06-03 08:38:25'),
(3119, 'fiscal_year', 'all', 3, '2022-06-03 08:39:21'),
(3120, 'fiscal_year', 'form', 3, '2022-06-03 08:39:24'),
(3121, 'fiscal_year', 'form', 3, '2022-06-03 08:41:18'),
(3122, 'fiscal_year', 'all', 3, '2022-06-03 08:41:18'),
(3123, 'fiscal_year', 'all', 3, '2022-06-03 08:42:12'),
(3124, 'fiscal_year', 'all', 3, '2022-06-03 08:42:49'),
(3125, 'fiscal_year', 'all', 3, '2022-06-03 08:42:52'),
(3126, 'fiscal_year', 'all', 3, '2022-06-03 08:43:17'),
(3127, 'year_end', 'all', 3, '2022-06-03 08:43:23'),
(3128, 'year_end', 'all', 3, '2022-06-03 08:43:35'),
(3129, 'year_end', 'all', 3, '2022-06-03 08:43:46'),
(3130, 'year_end', 'all', 3, '2022-06-03 08:43:57'),
(3131, 'year_end', 'all', 3, '2022-06-03 08:46:40'),
(3132, 'purchase_request', 'direct_add', 3, '2022-06-03 08:49:22'),
(3133, 'year_end', 'all', 3, '2022-06-03 08:50:57'),
(3134, 'year_end', 'all', 3, '2022-06-03 08:56:16'),
(3135, 'year_end', 'all', 3, '2022-06-03 08:57:21'),
(3136, 'year_end', 'all', 3, '2022-06-03 08:58:33'),
(3137, 'year_end', 'all', 3, '2022-06-03 08:59:46'),
(3138, 'year_end', 'all', 3, '2022-06-03 08:59:51'),
(3139, 'site_settings', NULL, 3, '2022-06-03 09:01:31'),
(3140, 'supplier', 'form', 3, '2022-06-03 09:02:19'),
(3141, 'site_settings', NULL, 3, '2022-06-03 09:04:12'),
(3142, 'site_settings', NULL, 3, '2022-06-03 09:04:12'),
(3143, 'supplier', 'form', 3, '2022-06-03 09:07:30'),
(3144, 'year_end', 'all', 3, '2022-06-03 09:07:43'),
(3145, 'year_end', 'all', 3, '2022-06-03 09:07:51'),
(3146, 'year_end', 'all', 3, '2022-06-03 09:09:51'),
(3147, 'year_end', 'all', 3, '2022-06-03 09:10:57'),
(3148, 'year_end', 'all', 3, '2022-06-03 09:11:41'),
(3149, 'year_end', 'all', 3, '2022-06-03 09:11:48'),
(3150, 'year_end', 'all', 3, '2022-06-03 09:12:02'),
(3151, 'year_end', 'all', 3, '2022-06-03 09:13:39'),
(3152, 'year_end', 'all', 3, '2022-06-03 09:14:13'),
(3153, 'site_settings', NULL, 3, '2022-06-03 09:19:33'),
(3154, 'site_settings', NULL, 3, '2022-06-03 09:19:37'),
(3155, 'site_settings', NULL, 3, '2022-06-03 09:22:29'),
(3156, 'site_settings', NULL, 3, '2022-06-03 09:22:42'),
(3157, 'site_settings', NULL, 3, '2022-06-03 09:22:42'),
(3158, 'year_end', 'all', 3, '2022-06-03 09:24:37'),
(3159, 'year_end', 'all', 3, '2022-06-03 09:28:13'),
(3160, 'year_end', 'all', 3, '2022-06-03 09:28:43'),
(3161, 'year_end', 'all', 3, '2022-06-03 09:29:15'),
(3162, 'year_end', 'all', 3, '2022-06-03 09:29:37'),
(3163, 'year_end', 'all', 3, '2022-06-03 09:30:22'),
(3164, 'year_end', 'all', 3, '2022-06-03 09:30:33'),
(3165, 'year_end', 'all', 3, '2022-06-03 09:32:14'),
(3166, 'year_end', 'all', 3, '2022-06-03 09:42:52'),
(3167, 'year_end', 'all', 3, '2022-06-03 09:43:36'),
(3168, 'year_end', 'generate_year_end', 3, '2022-06-03 09:43:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `year_end`
--

CREATE TABLE `year_end` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(10) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_amt` decimal(11,2) NOT NULL,
  `depreciated_amt` decimal(11,2) NOT NULL,
  `book_value` decimal(11,2) NOT NULL,
  `total_depreciated_amt` decimal(11,2) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `charge_parameter`
--
ALTER TABLE `charge_parameter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charge_code` (`charge_code`);

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
  ADD KEY `fk_fiscal_yr_deprec_para_fiscal_yr` (`fiscal_year`);

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
-- Indexes for table `grn_charges`
--
ALTER TABLE `grn_charges`
  ADD KEY `fk_grn_no_grn_chrgs_grn_mstr` (`grn_no`),
  ADD KEY `fk_charge_code_grn_chrgs_chrg_para` (`charge_code`);

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
-- Indexes for table `item_scrap`
--
ALTER TABLE `item_scrap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scrap_code` (`scrap_code`);

--
-- Indexes for table `item_scrap_detail`
--
ALTER TABLE `item_scrap_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scrap_code_itm_scrap_dtls_itm_scrap` (`scrap_code`),
  ADD KEY `fk_item_code_itm_scrap_dtls_item_infos` (`item_code`),
  ADD KEY `fk_location_id_itm_scrap_dtl_location_para` (`location_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfer_code` (`transfer_code`);

--
-- Indexes for table `location_transfer_detail`
--
ALTER TABLE `location_transfer_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_code_loc_trans_dtls_itm_infos` (`item_code`),
  ADD KEY `transfer_code` (`transfer_code`);

--
-- Indexes for table `mrn_details`
--
ALTER TABLE `mrn_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mrn_no_mrn_mstr_mrn_dtl` (`mrn_no`),
  ADD KEY `fk_item_code_mrn_dtls_item_infos` (`item_code`);

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
  ADD KEY `fk_supplier_id_opnin_dtl_supp_info` (`supplier_id`),
  ADD KEY `fk_location_id_opnin_dtl_loc_para` (`location_id`);

--
-- Indexes for table `opening_master`
--
ALTER TABLE `opening_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fsyr_opmt_fspr` (`fiscal_year`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_order_no` (`purchase_order_no`),
  ADD KEY `fk_purchase_request_no_pur_rqst_pur_rqst_ord` (`purchase_request_no`),
  ADD KEY `fk_department_id_dprtmnt_para_pur_rqst` (`department_id`),
  ADD KEY `fk_staff_id_staff_info_pur_req` (`staff_id`),
  ADD KEY `fk_mrn_no_pur_ordr_mrn_master` (`mrn_no`),
  ADD KEY `fk_requisition_no_por_ordr_requisi_mstr` (`requisition_no`);

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
  ADD KEY `fk_staff_id_staff_info_pur_req` (`staff_id`),
  ADD KEY `fk_requisition_no_pur_rqst_requi_mastr` (`requisition_no`),
  ADD KEY `fk_mrn_no_pur_rqst_mrn_master` (`mrn_no`);

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
  ADD KEY `fk_staff_id_requi_mstr_staff_infos` (`staff_id`),
  ADD KEY `fk_department_id_requi_mstrdprtmnt_para` (`department_id`);

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
  ADD UNIQUE KEY `s_return_no` (`s_return_no`),
  ADD KEY `fk_sale_no_sales_rtrn_sales_mstr` (`sale_no`);

--
-- Indexes for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s_return_no_sales_rtn_srtn_dtls` (`s_return_no`),
  ADD KEY `fk_item_code_itm_inf_srtn_dtls` (`item_code`);

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
-- Indexes for table `year_end`
--
ALTER TABLE `year_end`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fiscal_yr_year_end_fiscal_yr` (`fiscal_year`),
  ADD KEY `fk_item_code_year_end_item-infos` (`item_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `charge_parameter`
--
ALTER TABLE `charge_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grn_master`
--
ALTER TABLE `grn_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grn_return`
--
ALTER TABLE `grn_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grn_return_details`
--
ALTER TABLE `grn_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue_return_master`
--
ALTER TABLE `issue_return_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue_slip_details`
--
ALTER TABLE `issue_slip_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue_slip_master`
--
ALTER TABLE `issue_slip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `item_scrap`
--
ALTER TABLE `item_scrap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_scrap_detail`
--
ALTER TABLE `item_scrap_detail`
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
-- AUTO_INCREMENT for table `location_transfer`
--
ALTER TABLE `location_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location_transfer_detail`
--
ALTER TABLE `location_transfer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mrn_details`
--
ALTER TABLE `mrn_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mrn_master`
--
ALTER TABLE `mrn_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opening_detail`
--
ALTER TABLE `opening_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opening_master`
--
ALTER TABLE `opening_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_request_details`
--
ALTER TABLE `purchase_request_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requisition_master`
--
ALTER TABLE `requisition_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_master`
--
ALTER TABLE `sales_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_return_details`
--
ALTER TABLE `sales_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_desig_depart`
--
ALTER TABLE `staff_desig_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_infos`
--
ALTER TABLE `staff_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_ledger`
--
ALTER TABLE `stock_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_cat`
--
ALTER TABLE `supplier_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_infos`
--
ALTER TABLE `supplier_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3169;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `year_end`
--
ALTER TABLE `year_end`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
