-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2016 at 02:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `chef`
--
CREATE DATABASE IF NOT EXISTS `chef` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `chef`;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_cart`
--

CREATE TABLE `buyer_cart` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `servings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_cart`
--

INSERT INTO `buyer_cart` (`id`, `buyer`, `meal`, `status`, `time`, `servings`) VALUES
(1, 1, 1, 0, 1460050412, 10),
(2, 1, 5, 0, 1460050446, 3),
(3, 2, 1, 0, 1460060539, 1),
(4, 2, 5, 0, 1460061045, 4),
(5, 12, 1, 0, 1460647145, 1),
(6, 12, 5, 0, 1460647160, 4),
(7, 13, 1, 0, 1460657892, 1),
(8, 14, 1, 0, 1460903171, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `auth_id` varchar(200) NOT NULL COMMENT 'the users unique id',
  `auth_type` varchar(200) NOT NULL COMMENT 'This holds the authentication website name',
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `auth_id`, `auth_type`, `email`) VALUES
(1, '41.184.176.43', 'GUEST', ''),
(2, '197.255.164.72', 'GUEST', ''),
(3, '197.242.102.36', 'GUEST', ''),
(4, '204.236.226.210', 'GUEST', ''),
(5, '50.28.9.117', 'GUEST', ''),
(6, '66.249.69.11', 'GUEST', ''),
(7, '66.102.9.44', 'GUEST', ''),
(8, '154.120.97.222', 'GUEST', ''),
(9, '66.249.83.238', 'GUEST', ''),
(10, '66.249.69.27', 'GUEST', ''),
(11, '41.206.1.11', 'GUEST', ''),
(12, '154.120.89.11', 'GUEST', ''),
(13, '197.253.32.170', 'GUEST', ''),
(14, '154.120.81.205', 'GUEST', ''),
(15, '66.249.69.121', 'GUEST', ''),
(16, '66.249.69.111', 'GUEST', ''),
(17, '66.249.69.119', 'GUEST', ''),
(18, '66.249.75.146', 'GUEST', ''),
(19, '66.249.75.138', 'GUEST', ''),
(20, '66.249.75.238', 'GUEST', ''),
(21, '66.249.75.248', 'GUEST', ''),
(22, '66.249.69.240', 'GUEST', ''),
(23, '66.249.69.245', 'GUEST', ''),
(24, '154.120.70.152', 'GUEST', ''),
(25, '66.249.65.57', 'GUEST', ''),
(26, '66.249.65.37', 'GUEST', ''),
(27, '66.249.65.175', 'GUEST', ''),
(28, '66.249.65.181', 'GUEST', ''),
(29, '66.249.65.136', 'GUEST', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `chef` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `buyer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chef_images`
--

CREATE TABLE `chef_images` (
  `id` int(11) NOT NULL,
  `chef` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `image_alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef_images`
--

INSERT INTO `chef_images` (`id`, `chef`, `image_url`, `image_alt`) VALUES
(1, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL3Byb2ZpbGVfaW1hZ2VzLzY1MzMwOTY2NzQ4MTkxOTQ4OC9XNHNsV0tMbC5qcGc=', ''),
(2, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL21lZGlhL0JjX1FiLThDSUFFNGtqOC5qcGc=', ''),
(3, 1, 'aHR0cHM6Ly93d3cuYmVsbGFuYWlqYS5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTYvMDUvQ2hlZnMtR1QtQmFuay1Gb29kLUFuZC1Ecmluay1GYWlyLU1heS0yMDE2LUJlbGxhTmFpamEwMDAxLmpwZWc=', ''),
(4, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL21lZGlhL0NMOW8xcGtXZ0FBMWswSS5qcGc=', ''),
(5, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL21lZGlhL0NMLUY5aDRXY0FBMUU5di5qcGc=', ''),
(6, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL21lZGlhL0NMX0E5TDBXVUFFb2haai5qcGc=', ''),
(7, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL21lZGlhL0NNOVV3WXZWQUFBVTE5eC5qcGc=', ''),
(8, 1, 'aHR0cHM6Ly9wYnMudHdpbWcuY29tL3Byb2ZpbGVfaW1hZ2VzLzY1MzMwOTY2NzQ4MTkxOTQ4OC9XNHNsV0tMbC5qcGc=', '');

-- --------------------------------------------------------

--
-- Table structure for table `chef_of_the_month`
--

CREATE TABLE `chef_of_the_month` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `main_picture` text NOT NULL,
  `description` text NOT NULL,
  `year` year(4) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef_of_the_month`
--

INSERT INTO `chef_of_the_month` (`id`, `name`, `main_picture`, `description`, `year`, `month`) VALUES
(1, 'VElZQU4gQUxJTEU=', 'aHR0cDovL2Jsb2cudGhldXBwZXJkZWNrbHguY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE1LzAzLzMwNzE0ODctTFItd2ViLmpwZw==', 'PHAgY2xhc3M9ImZvbnQtMTYiPlRpeWFuIEFsaWxlIGlzIHRoZSBjdXJyZW50IFByZXNpZGVudCBvZiBUaGUgQ3VsaW5hcnkgQXJ0cyBQcmFjdGl0aW9uZXJzIEFzc29jaWF0aW9uIGluIE5pZ2VyaWEsIHRoZSBmb3VuZGVyIGFuZCBwcm9tb3RlciBvZiBDdWxpbmFyeSBBY2FkZW15IGFuZCB0aGUgRXhlY3V0aXZlIENoZWYgb2YgVGFycmFnb24sIGEgZmluZSBkaW5pbmcgYW5kIHJlc3RhdXJhbnQgYW5kIHdpbmUgY2x1Yi4gSGVyIG9iamVjdGl2ZSBpcyB0byBjaGFuZ2UgYW5kIGltcHJvdmUgdGhlIHN0YW5kYXJkIG9mIEN1bGluYXJ5IEFydHMgRWR1Y2F0aW9uIGFuZCBDdWxpbmFyeSBhd2FyZW5lc3MgZ2xvYmFsbHkuIFdpdGggY29ycG9yYXRlIGxhdyBjb25zdWx0YW5jeSBiYWNrZ3JvdW5kLCBoZXIgbWFuYWdlcmlhbCBleHBlcmllbmNlIGlzIGJyb3VnaHQgdG8gdGhlIGZvcmVmcm9udCBvZiBhY2hpZXZpbmcgaGVyIHNldCBvYmplY3RpdmVzLiBBcm1lZCB3aXRoIHRoZSBzbG9nYW4g4oCcV2hlcmUgR3JlYXQgTWluZHMgQ3JlYXRlIEdyZWF0IEZvb2TigJ0gVGl5YW4gQWxpbGUgYmVsaWV2ZXMgc2hlIGlzIGNhcGFibGUgb2YgdGVhY2hpbmcgYW55b25lIHRvIGNyZWF0ZSBncmVhdCBmb29kLiBTaGUgd29ya3Mgd2l0aCB0aGUgcHJpbmNpcGxlIHRoYXQgd2UgY3JlYXRlIHdpdGggb3VyIG1pbmRzIGFuZCBpbnRlcnByZXQgd2l0aCBvdXIgaGFuZHMgc28gc2hlIHRhcHMgaW50byB0aGUgcmVzaWR1YWwgY3JlYXRpdml0eSBpbiBldmVyeW9uZeKAmXMgbWluZCBhbmQgdHJhbnNsYXRlcyBpdCB0byBncmVhdCBmb29kIGluIHRoZSBraXRjaGVuLjwvcD4NCjxwIGNsYXNzPSJmb250LTE2Ij5Gcm9tIHRoZSBmb3VyIHdhbGxzIG9mIGhlciBtb3RoZXJzIGtpdGNoZW4sIFRpeWFuIEFsaWxl4oCZcyBjaGVmIGxpZmUgYmVnYW4gd2l0aCBtYW55IGN1bGluYXJ5IGV4cGVyaW1lbnRzLCBzaGUgd2VudCBvbiB0byBzZXQgdXAgVGVhIFRpbWUgQ2FrZXMgaW4gMTk5MyBzZWxsaW5nIGN1cGNha2VzIGluIFNlY29uZGFyeSBTY2hvb2wsIHNoZSBsYXRlciBvbiBzZXQgdXAgVGVlcyBIb3QgQml0ZXMsIGEgZmxhbWluZyBCYXJiZWN1ZSBHcmlsbCBhdCB0aGUgSWJhZGFuIEdvbGYgQ2x1YiB3aXRoIGEgc3VwZXIgaGl0IHNlY3JldCBiYXJiZWN1ZSBzYXVjZSByZWNpcGUsIFNoZSBtb3ZlZCBvbiB0byBNYXRjaHN0aWNrcyB3aGljaCBpcyBhIGNvbmNlcHQgdGhhdCBtYWRlIE5pZ2VyaWFuIGZvb2QgaW4gYSByZWZpbmVkIG1vZGVybmlzdCBmdXNpb24gc3R5bGUuPC9wPg0KPHAgY2xhc3M9ImZvbnQtMTYiPlNoZSBtYWRlIHRoZSBkZWNpc2lvbiB0byBzZWFsIGhlciBpZGVudGl0eSBhcyBhIGNoZWYgYW5kIGdhcm5lciBtb3JlIGV4cGVyaWVuY2Ugc28gc2hlIGF0dGVuZGVkIHRoZSBwcmVzdGlnaW91cyBzY2hvb2wgQWNhZGVtaWUgROKAmSBDdWlzaW5lIGluIHRoZSBVbml0ZWQgU3RhdGVzIHRvIG9idGFpbiBhIFByb0NlcnRpZmljYXRpb24gaW4gQWR2YW5jZWQgQ3VsaW5hcnkgQXJ0cyBhbmQgdGhlbiBmb3VuZGVkIGhlciBvd24gQ3VsaW5hcnkgc2Nob29sLSBDdWxpbmFyeSBBY2FkZW15LCBhIHBlZGVzdGFsIGZyb20gd2hlcmUgc2hlIGlzIGNoYW5naW5nIHRoZSBwYWxhdGUgYW5kIGZvb2QgbGlmZXN0eWxlIG9mIG1hbnkuIEF0IHRoZSBDdWxpbmFyeSBBY2FkZW15IHNoZSB0ZWFjaGVzIERpcGxvbWEgU3R1ZGVudHMgaW4gQ3VsaW5hcnkgYW5kIFBhc3RyeSBBcnRzIGFzIHdlbGwgYXMgRnJvbnQgb2YgSG91c2UgTWFuYWdlbWVudCBhbmQgZnJvbSBhIGxpZmVzdHlsZSBwZXJzcGVjdGl2ZSBzaGUgdGVhY2hlcyB0aGVtZWQgcmVjcmVhdGlvbmFsIGNvb2tpbmcgY2xhc3NlczsgZW5nYWdpbmcgZm9vZCBlbnRodXNpYXN0cyBhbmQgZXBpY3VyZWFucyBvbiBhIHRhc3RlZnVsIGN1bGluYXJ5IGpvdXJuZXkuPC9wPg0KPHA+Q3VybGVkIGZyb20gPGEgaHJlZj0iaHR0cDovL2Zvb2RhbmRkcmluay5ndGJhbmsuY29tL2NoZWZzL3RpeWFuLWFsaWxlLyI+aHR0cDovL2Zvb2RhbmRkcmluay5ndGJhbmsuY29tL2NoZWZzL3RpeWFuLWFsaWxlLzwvYT48L3A+', 2016, 7),
(2, 'Z3JhY2UgSGFtZWVk', 'aHR0cDovL2xvY2FsaG9zdC9teXBlcnNvbmFsY2hlZi5jb20ubmcvaW1hZ2VzL21lYWxzL2NkZjQ2MjlmNTYyZmUwNDA3NzAzZTA2ZjVjOWMzMDdhLmpwZw==', 'PHA+c2hlIGlzIGEgY3V0ZSBjaGVmPC9wPg==', 2016, 8);

-- --------------------------------------------------------

--
-- Table structure for table `cooking_tips`
--

CREATE TABLE `cooking_tips` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `text` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `author`, `text`, `ts`) VALUES
(9, 1, 'aGVsbG8=', '2016-09-08 21:21:30'),
(10, 1, 'c2FtcGxl', '2016-09-08 21:22:51'),
(11, 1, 'd29ya2luZyB0aWdodA==', '2016-09-08 21:23:05'),
(12, 1, 'dGhpcyBpcyB0byB0ZXN0IHRoZSB3b3JrYWJpbGl0eQ==', '2016-09-08 21:25:44'),
(13, 9, 'aGV5IGd1eXM=', '2016-09-10 03:16:46'),
(14, 9, 'd2VsY29tZSBkZWFyIGZyaWVuZHM=', '2016-09-10 04:01:11'),
(15, 9, 'd2VsY29tZSBkZWFyIGZyaWVuZHM=', '2016-09-10 04:01:21'),
(16, 9, 'd29ya2luZyB0ZXN0', '2016-09-10 04:07:07'),
(17, 9, 'ZHJlYW0gY2hhc2Vy', '2016-09-10 04:40:03'),
(18, 9, 'd2F0aW4gZGU/', '2016-09-10 04:42:59'),
(19, 9, 'd2lja2VkIHdvcmxk', '2016-09-10 04:46:51'),
(20, 9, 'aGFiYQ==', '2016-09-10 04:57:02'),
(21, 9, 'aG1t', '2016-09-10 04:59:46'),
(22, 9, 'YXJlIHlvdSB0aGVyZT8=', '2016-09-10 05:04:27'),
(23, 9, 'dmlsbGFnZSBwYXJvbHMgb28=', '2016-09-10 05:06:22'),
(24, 9, 'bGV0cyB0ZXN0IHdpdGggdGhhdA==', '2016-09-10 05:06:51'),
(25, 9, 'aXRzIHNvIHNoYXJw', '2016-09-10 05:07:03'),
(26, 1, 'd2hhdCBhIHByb2ZpbGUgcGhvdG8=', '2016-09-10 05:33:19'),
(39, 10, '', '2016-09-10 06:38:39'),
(40, 10, 'Z3JlZW4gd2F2ZXM=', '2016-09-10 06:43:13'),
(41, 10, '', '2016-09-10 06:47:17'),
(42, 10, 'dGhpcyBpcyBhIHRleHQgYW5kIHR3byBpbWFnZXMgZHVoISE=', '2016-09-10 06:57:43'),
(45, 10, 'aGVsbG8=', '2016-09-24 22:39:02'),
(51, 10, 'SSBhbSBoZXJlIGFnYWlu', '2016-09-24 22:45:09'),
(53, 10, 'aGVsbG8gYnJv', '2016-09-24 22:46:23'),
(54, 10, 'aGVsbG8gYnJv', '2016-09-24 22:46:40'),
(55, 10, 'aGVsbG8gYnJvIHdhdHM=', '2016-09-24 22:47:58'),
(59, 10, 'd3d3', '2016-09-24 23:11:52'),
(60, 10, 'd2VsY29tZQ==', '2016-09-24 23:13:05'),
(61, 10, 'd2lsZA==', '2016-09-24 23:14:37'),
(62, 10, 'ZHNkc2Rz', '2016-09-24 23:29:31'),
(63, 10, 'ZmY=', '2016-09-24 23:30:58'),
(64, 10, 'ZmZmZg==', '2016-09-24 23:31:36'),
(65, 10, 'd3Jl', '2016-09-24 23:31:58'),
(66, 10, 'd29yaw==', '2016-09-24 23:32:15'),
(67, 10, 'dHJy', '2016-09-24 23:33:16'),
(68, 10, 'dHJlZQ==', '2016-09-24 23:34:12'),
(69, 10, 'd29yaw==', '2016-09-24 23:37:37'),
(70, 10, 'ZWU=', '2016-09-24 23:37:56'),
(71, 10, 'cmVlcw==', '2016-09-24 23:38:25'),
(72, 10, 'cmU=', '2016-09-24 23:39:09'),
(73, 10, 'd2VlZA==', '2016-09-24 23:49:36'),
(74, 10, 'YW5kIG5vdz8=', '2016-09-24 23:50:46'),
(75, 10, 'bGVtb25z', '2016-09-24 23:53:52'),
(76, 10, 'ZnJlZWRvbQ==', '2016-09-24 23:54:14'),
(77, 10, 'YWdhaW4=', '2016-09-24 23:54:42'),
(78, 10, 'ZXJy', '2016-09-24 23:55:12'),
(79, 10, 'ZGlkIHlvdSBnZXQgdGhpcz8=', '2016-09-24 23:58:10'),
(80, 10, 'd2hpY2g/', '2016-09-24 23:59:06'),
(81, 10, 'ZnJlZQ==', '2016-09-25 00:00:20'),
(82, 10, 'd2hlbg==', '2016-09-25 00:01:31'),
(83, 10, 'ZGlkIGl0IGNvbWUgaW4/', '2016-09-25 00:02:23'),
(84, 10, 'aSBqdXN0IHNlbnQgdGhpcyBndXlz', '2016-09-25 00:02:55'),
(85, 10, 'c2luZ2xlIG1lc3NhZ2U=', '2016-09-25 00:05:03'),
(86, 10, 'YW5vdGhlciBzaW5nbGUgbWVzc2FnZSBjb21pbmcgaW4=', '2016-09-25 00:07:05'),
(87, 10, 'bm8gbW9yZSBkdXBsaWNhdGVzIGFyZSBtZWFudCB0byBiZSBwYXJ0IG9mIHRoaXMgbmV3IG1lc3NhZ2U=', '2016-09-25 00:10:04'),
(88, 10, 'ZHVwbGVz', '2016-09-25 00:11:25'),
(89, 10, 'cmVk', '2016-09-25 00:12:27'),
(90, 10, 'Z3JlZW4=', '2016-09-25 00:45:50'),
(91, 10, 'dw==', '2016-09-25 00:47:55'),
(92, 10, 'dw==', '2016-09-25 00:48:24'),
(93, 10, 'cg==', '2016-09-25 00:48:48'),
(94, 10, 'dA==', '2016-09-25 00:49:14'),
(95, 10, 'cGxzIHdvcms=', '2016-09-25 00:53:46'),
(96, 10, 'd2Vha25lc3M=', '2016-09-25 00:57:42'),
(97, 10, 'a3VzaGlu', '2016-09-25 00:58:40'),
(98, 10, 'aXQgZGlkbnQgc2Nyb2xsIGRvd24gYXQgYWxs', '2016-09-25 00:58:52'),
(99, 10, 'b2theSBsZXRzIHNlZSB3aGF0cyBhdCB0aGUgYm90dG9t', '2016-09-25 01:01:51'),
(100, 10, 'dGhpcyBpcyBtZWFudCB0byBiZSBmYXN0ZXI=', '2016-09-25 01:02:19'),
(101, 1, 'aGVsbG8=', '2016-09-25 12:41:59'),
(102, 1, 'c2VuZGluZyB0aGlzIGFzIGEgbWVzc2FnZQ==', '2016-09-25 12:43:23'),
(103, 1, 'b2theSBtZXNzYWdlcyB3b3Jr', '2016-09-25 12:43:36'),
(104, 1, 'dGVzdGluZyBhZ2Fpbg==', '2016-09-25 20:40:08'),
(105, 1, 'd2hhdA==', '2016-09-25 22:35:11'),
(108, 1, '', '2016-09-25 23:34:52'),
(109, 1, '', '2016-09-25 23:53:38'),
(110, 1, '', '2016-09-25 23:53:38'),
(111, 1, 'YXJlIHlvdSBnZXR0aW5nIG1lPw==', '2016-09-25 23:54:48'),
(112, 1, 'b2dhIHdhdGluIGhhcHBlbj8=', '2016-09-26 00:07:24'),
(113, 1, 'bGVtb25z', '2016-09-26 00:08:34'),
(114, 1, '', '2016-09-26 00:08:53'),
(115, 1, '', '2016-09-26 00:08:53'),
(116, 1, 'ZnJlZQ==', '2016-09-26 00:09:25'),
(117, 1, 'Y2hhdCByb29tIHRvbiBiYWQ=', '2016-09-26 00:10:00'),
(118, 1, 'YWdhaW4gbGV0cyB0ZXN0', '2016-09-26 00:10:12'),
(119, 1, '', '2016-09-26 00:10:25'),
(120, 1, 'YWdhaW4=', '2016-09-26 00:11:07'),
(121, 1, 'aG1tbW0=', '2016-09-26 00:11:20'),
(122, 1, 'aXRzIG5vdCBzY3JvbGxpbmcgb29vbw==', '2016-09-26 00:11:36'),
(123, 1, 'd2hhdCBwYXVzZWQgaXQ/', '2016-09-26 00:11:45'),
(124, 1, 'SSBndWVzcyBvbmUgd291bGQgaGF2ZSBvIHNlbmQgdHdvIG1lc3NhZ2VzIGJlZm9yZSBpdCBzY2lyb2xscw==', '2016-09-26 00:12:14'),
(125, 1, '', '2016-09-26 00:12:31'),
(126, 1, '', '2016-09-26 00:12:53'),
(127, 1, '', '2016-09-26 00:12:53'),
(128, 1, 'bGV0cyB0cnkgb25lIG1vcmU=', '2016-09-26 00:17:56'),
(129, 1, '', '2016-09-26 00:18:05'),
(130, 1, '', '2016-09-26 00:18:16'),
(131, 1, '', '2016-09-26 00:18:16'),
(132, 10, 'aSBob3BlIHRoaXMgZ2V0cyB0byB5b3U=', '2016-09-26 00:34:13'),
(133, 10, 'aG1tIHdhdGluIGhhcHBlbj8=', '2016-09-26 00:35:36'),
(134, 1, 'aGV5IHJvb20=', '2016-09-26 00:36:19'),
(135, 10, 'b2theSBpdCBjYW1lIGhlcmU=', '2016-09-26 00:36:43'),
(136, 10, 'aXRzIG5vdCBzY3JvbGxpbmc=', '2016-09-26 00:37:25'),
(137, 1, 'YW5kIG5vdz8=', '2016-09-26 00:37:35'),
(138, 10, 'aG1t', '2016-09-26 00:39:25'),
(139, 10, 'b25jZSBtb3Jl', '2016-09-26 00:40:09'),
(140, 10, 'ZWF0IHRoaXM=', '2016-09-26 00:47:11'),
(141, 10, 'bGVhZ3Vl', '2016-09-26 00:48:34'),
(142, 10, 'YW5vdGhlciBtZXNzYWdl', '2016-09-26 00:49:05'),
(143, 10, 'bGV0cyB0cnkgdSBub3c=', '2016-09-26 00:50:05'),
(144, 10, 'd2hhdCBhYm91dCBub3c/', '2016-09-26 00:50:22'),
(145, 10, 'Z28gbG9vayBvZ2E=', '2016-09-26 01:23:19'),
(146, 10, 'aG1tIHRoaXMgaXMgc2VyaW91cw==', '2016-09-26 01:24:45'),
(147, 10, 'eWVhIGl0IGlz', '2016-09-26 01:24:51'),
(148, 10, 'd3Rm', '2016-09-26 01:25:08'),
(149, 10, 'c2VuZGluZyB0aGlz', '2016-09-26 01:28:10'),
(150, 10, 'YW5vdGhlciBvbmU=', '2016-09-26 01:28:31'),
(151, 10, 'ZmVlbGluZ3M=', '2016-09-26 01:29:13'),
(152, 10, 'YWt3YXJkIGZlZWxpbmdz', '2016-09-26 01:29:34'),
(153, 10, 'bGVtb24gZ3Jhc3M=', '2016-09-26 01:34:30'),
(154, 10, 'dmlsbGFnZSBsaWZl', '2016-09-26 01:37:04'),
(155, 10, 'Z2Jva28gYm95cw==', '2016-09-26 01:37:17'),
(156, 10, 'd2F0aW4gZGU=', '2016-09-26 01:39:03'),
(157, 10, 'bm90aGluZyBuZXc=', '2016-09-26 01:39:12'),
(158, 10, 'dGhhdCBpcyBuaWNl', '2016-09-26 01:39:22'),
(159, 10, 'aGFiYQ==', '2016-09-26 01:39:40'),
(160, 10, 'Z3JlZW4gZ3Jhc3M=', '2016-09-26 01:39:50'),
(161, 10, 'eW91IGFyZSBtZWFudCB0byB3b3JrIG5vdw==', '2016-09-26 01:41:06'),
(162, 10, 'cGVyZmVjdGx5', '2016-09-26 01:41:16'),
(163, 10, 'b2Rl', '2016-09-26 01:41:20'),
(164, 10, 'bXVtdSBib3k=', '2016-09-26 01:41:25'),
(165, 10, 'ZnJlYWs=', '2016-09-26 01:43:19'),
(166, 10, 'd2FpdCBmaXJzdA==', '2016-09-26 01:47:09'),
(167, 10, 'ZGlkIGl0IGdvIGlu', '2016-09-26 01:47:25'),
(168, 10, 'd2F0Y2ggY2xvc2VseSBub3c=', '2016-09-26 01:50:18'),
(169, 10, 'YWdhaW4=', '2016-09-26 01:50:36'),
(170, 10, 'bGlxdWlk', '2016-09-26 01:53:13'),
(171, 10, 'c291cA==', '2016-09-26 01:56:36'),
(172, 10, 'aGFuZCB3YXNo', '2016-09-26 01:56:48'),
(175, 9, 'dGhpcyBpcyBob3cgd2UgZG8gaXQ=', '2016-09-27 18:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `forum_extras`
--

CREATE TABLE `forum_extras` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `item_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forum_extras`
--

INSERT INTO `forum_extras` (`id`, `forum_id`, `url`, `item_type`) VALUES
(1, 41, '3456d49e7bd8a1af9be2904ebf1a20b0.jpg', 1),
(2, 42, '3ab9d31d1ebc8b9fc49d8a3fe3fde2b4.jpg', 1),
(3, 42, 'fbd4cd1a02ba0a36ffda1fb9294306af.jpg', 1),
(4, 108, '722d286114ae8e1ce88af85fedae63f7.jpg', 1),
(5, 109, '7998ca78cc95bb6ab4932b3dbd68b4e3.jpg', 1),
(6, 110, '6eb64aa252c9d842519fb98ae32de76b.jpg', 1),
(7, 114, 'facab95326942ea276926dba4a230d5c.jpg', 1),
(8, 115, '8e49ec9e7402796b03f2a7a60d2c0f3c.jpg', 1),
(9, 119, '4c4a9c551677943384d4b2a4cd649fad.jpg', 1),
(10, 125, 'a6fdfdd49af8d52b6fdb3223a255b71c.jpg', 1),
(11, 126, 'c3d648fea767b9675babbe676e7f79f6.jpg', 1),
(12, 127, 'd6b0461d24490e8b4d77811ff4992bfa.jpg', 1),
(13, 129, '086c85e569b5f400ad954243b959e1e0.jpg', 1),
(14, 130, '8d08099ada193fff7e9632b6306ed10c.jpg', 1),
(15, 131, 'c9eae1c7c898d1e19569fd0375ae1480.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_follow`
--

CREATE TABLE `forum_follow` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_item_type`
--

CREATE TABLE `forum_item_type` (
  `id` int(11) NOT NULL,
  `value` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forum_item_type`
--

INSERT INTO `forum_item_type` (`id`, `value`) VALUES
(3, 'AUDIO'),
(1, 'IMAGE'),
(2, 'VIDEO');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this hold data of all guests';

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `email`, `date`) VALUES
(1, '', '', '2016-05-01 08:41:35'),
(2, '', '', '2016-05-01 08:43:41'),
(3, '', '', '2016-05-01 08:44:18'),
(4, '', '', '2016-05-01 08:46:05'),
(5, '', '', '2016-05-01 08:48:40'),
(6, '', '', '2016-05-01 08:50:51'),
(7, '', '', '2016-05-01 08:51:57'),
(8, 'gdsgsfgf', 'fsafdsf@gfsgf.com', '2016-05-01 08:53:28'),
(9, 'Hirekaan%20Micheal%20H', 'mikkytrionze@gmail.com', '2016-06-01 05:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_of_the_month`
--

CREATE TABLE `ingredients_of_the_month` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image_url` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients_of_the_month`
--

INSERT INTO `ingredients_of_the_month` (`id`, `name`, `image_url`, `comments`) VALUES
(1, 'Qm9pbC1pbi1CYWcgQnJvd24gUmljZTogUXVpY2sgUGFlbGxh', 'aHR0cDovL2ltZzEuY29va2luZ2xpZ2h0LnRpbWVpbmMubmV0L3NpdGVzL2RlZmF1bHQvZmlsZXMvc3R5bGVzLzUwMHh2YXJpYWJsZS9wdWJsaWMvaW1hZ2UvMjAxMC8wOS8xMDA5cDE4Mi1xdWljay1wYWVsbGEteC5qcGc/aXRvaz1VUVVnelhLSA0K', 'PHAgY2xhc3M9ImZvbnQtMTQiPkJvaWwtaW4tYmFnIGJyb3duIHJpY2UgaXMgb25lIG9mIHRoZSBxdWlja2VzdCB3YXlzIHRvIGdldCBtb3JlIHdob2xlIGdyYWlucyBpbiB5b3VyIGRpZXQuPC9wPg0KPHAgY2xhc3M9ImZvbnQtMTMiPlVzZSBmb3I6IHJpY2UgcGlsYWYsIHJpY2Ugc2FsYWQsIHNvdXBzLCBhbmQgc3Rld3M8L3A+DQogDQo8cCBjbGFzcz0iZm9udC0xNCI+WWVzLCBpdCdzIHBvc3NpYmxlIHRvIHJpZmYgb24gdGhlIGZsYXZvcnMgb2YgU3BhaW4ncyBtb3N0IGZhbW91cyBkaXNoIGFuZCBtYWtlIGEgZGVsaWNpb3VzIFF1aWNrIFBhZWxsYSEgQm9pbC1pbi1iYWcgYnJvd24gcmljZSBtYWtlcyBhIGZhc3QsIG51dHR5LCBhbmQgbnV0cml0aW91cyBmb3VuZGF0aW9uLg0KPC9wPg0KPHAgY2xhc3M9ImZvbnQtMTIiPkN1cmxlZCBGcm9tOiA8YSBocmVmPSJodHRwOi8vd3d3LmNvb2tpbmdsaWdodC5jb20vIiBjbGFzcz0idGV4dC1yZWQiPnd3dy5jb29raW5nbGlnaHQuY29tPC9hPjwvcD4='),
(2, 'Q2FubmVkIERpY2VkIFRvbWF0b2VzIFJlY2lwZTogU2F1c2FnZSwgUGVwcGVyLCBhbmQgT25pb24gUGl6emE=', 'aHR0cDovL2ltZzEuY29va2luZ2xpZ2h0LnRpbWVpbmMubmV0L3NpdGVzL2RlZmF1bHQvZmlsZXMvc3R5bGVzLzUwMHh2YXJpYWJsZS9wdWJsaWMvaW1hZ2UvMjAwMi8xMi8wMjEyLXNhdXNhZ2UtcGl6emEteC5qcGc/aXRvaz1NUG5EOGV4VQ==', 'PHAgY2xhc3M9ImZvbnQtMTQiPkNhbm5lZCBuby1zYWx0LWFkZGVkIGRpY2VkIHRvbWF0b2VzIHNhdmUgeW91IHRoZSB0aW1lIGFuZCBlZmZvcnQgb2Ygc2VlZGluZywgY2hvcHBpbmcsIGFuZCBwZWVsaW5nIGZyZXNoIHRvbWF0b2VzLiA8L3A+DQo8cCBjbGFzcz0iZm9udC0xMyI+VXNlIGZvcjogbWFyaW5hcmEgc2F1Y2UsIGJydXNjaGV0dGEsIHNhbHNhIDwvcD4NCiANCjxwIGNsYXNzPSJmb250LTE0Ij5BIHJvYnVzdCB0b3BwaW5nIG9mIHR1cmtleSBzYXVzYWdlLCBvbmlvbnMsIGRpY2VkIHRvbWF0b2VzLCBhbmQgcGVwcGVycyBjcm93biB0aGlzIHNhdGlzZnlpbmcgQ2hpY2Fnby1zdHlsZSBwaXp6YS4gRnJlbmNoIGJhZ3VldHRlIGhhbHZlcyBtaW1pYyB0aGUgdHJhZGl0aW9uYWwgZGVlcC1kaXNoIGNydXN0LWEgcmVhbCB0aW1lc2F2ZXIuDQo8L3A+DQo8cCBjbGFzcz0iZm9udC0xMiI+Q3VybGVkIEZyb206IDxhIGhyZWY9Imh0dHA6Ly93d3cuY29va2luZ2xpZ2h0LmNvbS8iIGNsYXNzPSJ0ZXh0LXJlZCI+d3d3LmNvb2tpbmdsaWdodC5jb208L2E+PC9wPg=='),
(3, 'Q2FubmVkIEJsYWNrIEJlYW5zIFJlY2lwZTogUXVpY2sgQmxhY2sgQmVhbiBhbmQgQ29ybiBTb3Vw', 'aHR0cDovL2ltZzEuY29va2luZ2xpZ2h0LnRpbWVpbmMubmV0L3NpdGVzL2RlZmF1bHQvZmlsZXMvc3R5bGVzLzUwMHh2YXJpYWJsZS9wdWJsaWMvaW1hZ2UvMjAxMC8wOS8xMDA5cDE4Mi1xdWljay1iZWFuLWNvcm4tc291cC14LmpwZz9pdG9rPWFQdC1jQkFI', 'PHAgY2xhc3M9ImZvbnQtMTQiPg0KQ2FubmVkIG9yZ2FuaWMgYmxhY2sgYmVhbnMgb2ZmZXIgb3B0aW9ucyBmb3IgbWFpbiBkaXNoZXMgYW5kIHNpZGVzLCBhbmQgZ29pbmcgd2l0aCBvcmdhbmljIGVuc3VyZXMgdGhlcmUncyBtaW5pbWFsIGFkZGVkIHNhbHQuDQo8L3A+DQoNCjxwIGNsYXNzPSJmb250LTEzIj5Vc2VkIGZvcjogYmxhY2sgYmVhbiBjYWtlcywgZmlsbGluZyBmb3IgdGFjb3Mgb3IgYnVycml0b3MsIHNhbHNhIDwvcD4NCiANCjxwIGNsYXNzPSJmb250LTE0Ij4NClVzaW5nIHNpeCBvZiBvdXIgdG9wIHF1aWNrIGluZ3JlZGllbnRzLCBRdWljayBCbGFjayBCZWFuIGFuZCBDb3JuIFNvdXAgaXMgcmVhZHkgaW4gbGVzcyB0aGFuIDMwIG1pbnV0ZXMuIFNlcnZlIHdpdGggYSBkb2xsb3Agb2YgR3JlZWstc3R5bGUgcGxhaW4geW9ndXJ0IHRvIGNvdW50ZXJhY3QgdGhlIHNwaWN5IGNoaWxlIHBhc3RlLg0KPC9wPg0KPHAgY2xhc3M9ImZvbnQtMTIiPkN1cmxlZCBGcm9tOiA8YSBocmVmPSJodHRwOi8vd3d3LmNvb2tpbmdsaWdodC5jb20vIiBjbGFzcz0idGV4dC1yZWQiPnd3dy5jb29raW5nbGlnaHQuY29tPC9hPjwvcD4='),
(4, 'RnJvemVuIFNoZWxsZWQgRWRhbWFtZSBSZWNpcGU6IEVkYW1hbWUgU3VjY290YXNo', 'aHR0cDovL2ltZzEuY29va2luZ2xpZ2h0LnRpbWVpbmMubmV0L3NpdGVzL2RlZmF1bHQvZmlsZXMvc3R5bGVzLzUwMHh2YXJpYWJsZS9wdWJsaWMvaW1hZ2UvMjAxMC8wOS8xMDA5cDE5Mi1lZGFtYW1lLXN1Y2NvdGFzaC14LmpwZz9pdG9rPWVyQWhWMlM0', 'PHAgY2xhc3M9ImZvbnQtMTQiPg0KRnJvemVuIHNoZWxsZWQgZWRhbWFtZSAoc295YmVhbnMpIGFyZSBhIHN1cGVyIGNvbnZlbmllbnQgd2F5IHRvIGFkZCBjb2xvdXIsIHRleHR1cmUsIGFuZCBwcm90ZWluIHRvIG1vc3QgYW55IGRpc2guDQo8L3A+DQoNCjxwIGNsYXNzPSJmb250LTEzIj5Vc2VkIGZvcjogc2FsYWRzLCAocHVyZWVkKSBkaXAgb3Igc3ByZWFkLCB3aG9sZS1ncmFpbiBzYWxhZHMgIDwvcD4NCiANCjxwIGNsYXNzPSJmb250LTE0Ij4NCkZyb3plbiBzaGVsbGVkIGVkYW1hbWUgbWFrZXMgYSBoZWFydHkgYWRkaXRpb24gdG8gdGhpcyBzdW1tZXIgc3RhcGxlLg0KPC9wPg0KDQo8cCBjbGFzcz0iZm9udC0xMiI+Q3VybGVkIEZyb206IDxhIGhyZWY9Imh0dHA6Ly93d3cuY29va2luZ2xpZ2h0LmNvbS8iIGNsYXNzPSJ0ZXh0LXJlZCI+d3d3LmNvb2tpbmdsaWdodC5jb208L2E+PC9wPg==');

-- --------------------------------------------------------

--
-- Table structure for table `meal_images`
--

CREATE TABLE `meal_images` (
  `id` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `image_url` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_images`
--

INSERT INTO `meal_images` (`id`, `meal`, `image_url`, `date`) VALUES
(1, 1, 'http://mypersonalchef.com.ng/images/meals/5c49d60b64ac2478f63d489c127a8b43.jpg', '2016-03-29 15:16:33'),
(2, 2, 'http://mypersonalchef.com.ng/images/meals/637b103c9fcacbeda702f4f5b3c3aea0.jpg', '2016-03-29 15:17:14'),
(3, 3, 'http://mypersonalchef.com.ng/images/meals/ca493effeb34b8e79f54c15bc50028ce.jpg', '2016-03-29 15:20:24'),
(4, 4, 'http://mypersonalchef.com.ng/images/meals/2b9a7600f36156e5c27da267be725d92.jpg', '2016-03-29 15:21:11'),
(5, 5, 'http://mypersonalchef.com.ng/images/meals/c391bdfce0ab5678935dfaec89a619fe.jpg', '2016-03-29 15:27:36'),
(6, 6, 'http://mypersonalchef.com.ng/images/meals/a1cfe2249dbf16ea0fcd22f6fabf4dea.jpeg', '2016-03-29 15:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

CREATE TABLE `mealplan` (
  `id` int(11) NOT NULL,
  `day_time` varchar(10) NOT NULL,
  `buyer` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `servings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `name` text NOT NULL,
  `ingredients` longtext,
  `comment` longtext,
  `activated` int(11) NOT NULL DEFAULT '1',
  `price` double NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `start_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `owner`, `name`, `ingredients`, `comment`, `activated`, `price`, `type`, `start_time`, `end_time`, `likes`) VALUES
(1, 2, 'Pounded yam & Egusi', 'Yam, Egusi, maggi etc', 'Tm8gQ29tbWVudHM=', 1, 1000, 2, '', '', 0),
(2, 2, 'Bobotie', 'No Idea', 'Tm8gQ29tbWVudA==', 1, 500, 2, '', '', 0),
(3, 2, 'Chicken Biryani', 'Chicken, Maggi, Salt, Biryani, Alefu', 'VGhpcyBpcyBhIE1leGljYW4gbWVhbCBtYWRlIHdpdGggYWZyaWNhbiBpbmdyaWRpZW50cw==', 1, 2500, 1, '08:00', '14:00', 0),
(4, 2, 'Fried Rice', 'Rice, Green Peas', 'Tm9ybWFsIE5pZ2VyaWFuIEZyaWVkIFJpY2U=', 1, 300, 1, '13:00', '16:00', 0),
(5, 2, 'Bread and Tea', 'Bread', 'Tm9ybWFsIEJyZWFrZmFzdA==', 1, 950, 1, '04:00', '09:00', 0),
(6, 2, 'Choco Bread with Lipton', 'Lipton, Chocolate', 'Tm8gQ29tbWVudHM=', 1, 1200, 1, '04:00', '07:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `chef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `meal`, `day`, `chef`) VALUES
(1, 5, 2, 2),
(2, 3, 2, 2),
(3, 1, 2, 2),
(8, 6, 0, 2),
(9, 4, 0, 2),
(10, 1, 0, 2),
(11, 1, 1, 2),
(12, 5, 1, 2),
(13, 6, 3, 2),
(14, 1, 3, 2),
(15, 1, 4, 2),
(16, 5, 4, 2),
(17, 2, 5, 2),
(18, 3, 5, 2),
(19, 5, 5, 2),
(20, 1, 5, 2),
(21, 5, 6, 2),
(22, 6, 6, 2),
(23, 3, 6, 2),
(24, 1, 6, 2),
(25, 2, 6, 2),
(26, 4, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `new_meals`
--

CREATE TABLE `new_meals` (
  `id` int(11) NOT NULL,
  `Heading` text NOT NULL,
  `substring` text NOT NULL,
  `image` text NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_meals`
--

INSERT INTO `new_meals` (`id`, `Heading`, `substring`, `image`, `comment`, `date`) VALUES
(1, 'YXJha28gbWVzaGk=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701154210-1-kibo---harako-meshi-exlarge-169.jpg', 'U2FsbW9uIGhhcyBhbHdheXMgcGxheWVkIGFuIGltcG9ydGFudCByb2xlIGluIFRvaG9rdSBjdWlzaW5lIGFuZCBoYXJha28gbWVzaGkgKGxpdGVyYWxseSAic2FsbW9uIGNoaWxkIHJpY2UiKSBpcyBhICJzaWduYXR1cmUgZGlzaCIgb2YgdGhlIHJlZ2lvbi4gT2Z0ZW4gZmVhdHVyZWQgYXQgZmFtaWx5IGdhdGhlcmluZ3MsIGV2ZXJ5IGhvdXNlaG9sZCBzZWVtcyB0byBoYXZlIGl0cyBvd24gcmVuZGl0aW9uLg==', '2016-07-13 03:19:16'),
(2, 'TWF0c3Ugbm8gbWkgc2hpcmEgYWUsIGtha2kgdXRzdXdh', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701164259-7-kibo---perisimmons-fall-fruit-exlarge-169.jpg', 'VGhlIGRpY2VkIHBlcnNpbW1vbiBpcyBzZXJ2ZWQgb24gaXRzIG93biBvciBpbiBjb21iaW5hdGlvbiB3aXRoIG90aGVyIGZhbGwgZnJ1aXRzIC0tIGdyYXBlcywgcGVhcnMsIGNyaXNwIGFwcGxlcyAtLSB0aGF0IGhhdmUgYmVlbiBjb3ZlcmVkIHdpdGggYSBjbGFzc2ljIHNhdWNlIG9mIHBpbmUgbnV0cyBhbmQgdG9mdSBjYWxsZWQgc2hpcmEgYWUu', '2016-07-13 03:19:16'),
(3, 'T25pZ2lyaQ==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701163200-5-kibo-onigiri-exlarge-169.jpg', 'U2FsdGVkLCBwcmVzc2VkIHJpY2Ugc2FuZHdpY2hlcyAtLSBvbmlnaXJpIC0tIGFyZSBlYXN5IHRvIHBhY2sgdXAsIHRyYW5zcG9ydCBhbmQgZWF0LCBtYWtpbmcgdGhlbSBhIHN1YnN0YW50aWFsLCBzYXRpc2Z5aW5nIGZpbmdlciBmb29kLg==', '2016-07-13 03:27:25'),
(4, 'SGl0dHN1bWktamlydQ==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701160050-2-kibo-hittsumi-jiru-exlarge-169.jpg', 'UGluY2hlZCBub29kbGUgc291cCB3aXRoIHBvcmsgaXMgYSBjbGFzc2ljIFRvaG9rdSBjb21mb3J0IGZvb2QuIEluIGxvY2FsIEl3YXRlIGRpYWxlY3QsIHRoZSB3b3JkIGhpdHRzdW1pIG1lYW5zICJ0byBwaW5jaCIgYW5kIGRlc2NyaWJlcyBob3cgdGhlIG5vb2RsZXMgYXJlIG1hZGUuIA==', '2016-07-13 03:27:25'),
(5, 'S2FraSBubyBkb3RlIG5hYmU=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701161603-3-kibo-kaki-no-dote-nabe--exlarge-169.jpg', 'T3lzdGVycy1vbi10aGUtcml2ZXJiYW5rIGhvdCBwb3QuIEluIHRoaXMgZGlzaCwgcmljaCBlYXJ0aC1jb2xvcmVkIG1pc28gaXMgc21lYXJlZCBhcm91bmQgdGhlIHJpbSBvZiB0aGUgcG90LiBBcyB0aGUgYnJvdGggYnViYmxlcywgdGhlIG1pc28gaXMgZHJhd24gaW50byB0aGUgcG90LCBsaXR0bGUgYnkgbGl0dGxlLCBmbGF2b3JpbmcgYW5kIHRoaWNrZW5pbmcgdGhlIHNvdXAuIA==', '2016-07-13 03:39:04'),
(6, 'TWljaGlub2t1IGtva2VzaGkgYmVudG8=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701162339-4-kibo-michinoku-kokeshi-bento-exlarge-169.jpg', 'VGhpcyBmcmllZCB0b2Z1IGFuZCBtb3VudGFpbiB2ZWdldGFibGUgcGlsYWYgaXMgc2VydmVkIGluIGEgc3BlY2lhbCBrb2tlc2hpLXNoYXBlZCBiZW50byBib3guIEtva2VzaGkgZG9sbHMgYXJlIG9uZSBvZiB0aGUgbW9zdCBwb3B1bGFyIHNvdXZlbmlycyBpbiBUb2hva3Uu', '2016-07-13 03:39:04'),
(7, 'S29idSBtYWtp', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701163703-6-kibo-osechi-exlarge-169.jpg', 'U3BlY2lhbCBkaXNoZXMgZWF0ZW4gZHVyaW5nIHRoZSBOZXcgWWVhciBob2xpZGF5cyBhcmUgY29sbGVjdGl2ZWx5IGNhbGxlZCBvc2VjaGkuIEFycmFuZ2VkIGluIGEgbXVsdGktdGllcmVkIGp1YmFrbyBib3gsIHRoZSBkaXN0aW5jdGl2ZSBtZW51IG9mZmVycyBnbGltcHNlcyBpbnRvIEphcGFuJ3MgY3VsaW5hcnkgY3VsdHVyZS4gVGlueSBwaWVjZXMgb2Ygc2hha2Ugbm8ga29idSBtYWtpIC0tIHNhbG1vbi1zdHVmZmVkIGtlbHAgcm9sbHMgLS0gYXJlIGluY2x1ZGVkIGluIHRoaXMgb25lLCBhcyBzZWVuIGluIHRoZSBsb3dlciBsZWZ0IGNvcm5lciBvZiB0aGUgYm94LiA=', '2016-07-13 03:39:04'),
(8, 'U2hpc28gbWFraQ==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701170128-7-kibo-shiso-leaves-exlarge-169.jpg', 'SW4gdGhpcyBkaXNoLCB3YWxudXRzIGFuZCBtaXNvIGFyZSBjb21iaW5lZCB3aXRoIHRvYXN0ZWQgc2VzYW1lIHRvIG1ha2UgYW4gYWRkaWN0aXZlbHkgdGFzdHkgZmlsbGluZyBmb3Igc2hpc28gbGVhdmVzLiBUaGUgbGVhdmVzIGFyZSB3cmFwcGVkLCBza2V3ZXJlZCBhbmQgdGhlbiBsaWdodGx5IHNlYXJlZCBpbiBzZXNhbWUgb2lsLiA=', '2016-07-13 03:50:18'),
(9, 'SGl0dHN1bWktamlydTogUGluY2hlZCBub29kbGUgc291cCB3aXRoIHBvcms', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701160050-2-kibo-hittsumi-jiru-exlarge-169.jpg', 'SGl0dHN1bWktamlydSxhIGNsYXNzaWMgVG9ob2t1IGNvbWZvcnQgZm9vZCwgaXMgYSBjaHVua3kgY2hvd2Rlci1saWtlIHNvdXAgLS0gdGhlIHNvcnQgb2YgZmFyZSBzZXJ2ZWQgYXQgaGFwcHkgY29tbXVuaXR5IGV2ZW50cy4NCkluIGxvY2FsIEl3YXRlIGRpYWxlY3QsIHRoZSB3b3JkIGhpdHRzdW1pIG1lYW5zICJ0byBwaW5jaCIgYW5kIGRlc2NyaWJlcyBob3cgdGhlIG5vb2RsZXMgYXJlIG1hZGUuDQpTb21lIFRvaG9rdSBjb29rcyB3aWxsIHBpbmNoIG9mZiBiaXRzIG9mIHN0cmV0Y2h5IGRvdWdoIGFuZCBhZGQgdGhlbSB0byB0aGUgc291cCBkaXJlY3RseSwgb3RoZXJzIHdpbGwgc2hhcGUgKGFuZCBwYXJib2lsKSB0aGUgcGluY2hlZCBub29kbGVzLCB0aGVuIGFkZCB0aGVtIHRvIHRoZSBzb3VwIHNob3J0bHkgYmVmb3JlIHNlcnZpbmcuDQpUaGUgZGlyZWN0LXRvLXRoZS1zb3VwLWZyb20tdGhlLXN0YXJ0IG1ldGhvZCBjcmVhdGVzIHNvZnQgbm9vZGxlcyBpbiBhIHRoaWNrIHN0ZXcuIEFzIHRoZSBwaW5jaGVkIG5vb2RsZXMgY29vaywgdGhlIGZsb3VyIHRoaWNrZW5zIHRoZSBicm90aC4NClBhcmJvaWxlZCBwaW5jaGVkIG5vb2RsZXMsIG9uIHRoZSBvdGhlciBoYW5kLCB0ZW5kIHRvIGJlIGZpcm0gYW5kIGEgYml0IGNoZXd5OyB0aGUgc291cCBpcyBtb3JlIGNob3dkZXItbGlrZSwgYnJpbW1pbmcgd2l0aCBiaXRzIG9mIHZlZ2V0YWJsZSBhbmQgbWVhdC4=', '2016-07-13 03:50:18'),
(10, 'T25pZ2lyaTogUHJlc3NlZCByaWNlICJzYW5kd2ljaGVzIg==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701163200-5-kibo-onigiri-exlarge-169.jpg', 'UmljZSAic2FuZHdpY2hlcyIgYXJlIGEgcG9wdWxhciB0cmF2ZWwgc25hY2suDQpTYWx0ZWQsIHByZXNzZWQgcmljZSBzYW5kd2ljaGVzIC0tIG9uaWdpcmkgLS0gYXJlIGVhc3kgdG8gcGFjayB1cCwgdHJhbnNwb3J0IGFuZCBlYXQsIG1ha2luZyB0aGVtIGEgc3Vic3RhbnRpYWwsIHNhdGlzZnlpbmcgZmluZ2VyIGZvb2QuDQpNb3N0IGFyZSBzaGFwZWQgaW50byB0cmlhbmdsZXMsIHRob3VnaCBsb2dzIGNhbGxlZCB0YXdhcmEsIG9yICJyaWNlIHNoZWF0aCwiIGFuZCBiYWxscyBhcmUgYWxzbyBjb21tb24uDQpQbGFpbiwgd2hpdGUgcmljZSBzdHVmZmVkIChsaWtlIGEgc2FuZHdpY2gpIHdpdGggYSBmaWxsaW5nIGlzIHRoZSBub3JtLCBidXQgbWF6ZSBnb2hhbiAoY29va2VkIHJpY2UgdGhhdCBoYXMgYmVlbiB0b3NzZWQgd2l0aCBvdGhlciBjb29rZWQgZm9vZHMpIGlzIGFsc28gdXNlZCBpbiBtYWtpbmcgb25pZ2lyaS4NClJpY2UgInNhbmR3aWNoZXMiIGFyZSB1c3VhbGx5IHdyYXBwZWQgd2l0aCBzdHJpcHMgb2Ygbm9yaSAobGF2ZXIpLCB0aG91Z2ggb25pZ2lyaSBhcmUgc29tZXRpbWVzIHNsYXRoZXJlZCB3aXRoIG1pc28gb3IgYnJ1c2hlZCB3aXRoIHNveSBzYXVjZSBhbmQgZ3JpbGxlZC4NClRoZXNlIGFyZSBjYWxsZWQgeWFraSBvbmlnaXJpLCBvciBncmlsbGVkIHByZXNzZWQtcmljZS4=', '2016-07-13 03:50:18'),
(11, 'TGlxdWlkIGdvbGQ=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160624114149-portugal-food-oil-porto-convention--visitors-bureau-exlarge-169.jpg', 'RHJpdmUgdGhlIGJhY2tyb2FkcyBvZiB0aGUgQWxlbnRlam8sIEJlaXJhIEludGVyaW9yIGFuZCBUcmFzLW9zLU1vbnRlcyByZWdpb25zIGFuZCB5b3UnbGwgd2VhdmUgdGhyb3VnaCBlbmRsZXNzIG9saXZlIGdyb3Zlcy4NCk9saXZlIG9pbCBpcyB0aGUgYmFzaXMgb2YgUG9ydHVndWVzZSBjb29raW5nLCB3aGV0aGVyIGl0J3MgdXNlZCB0byBzbG93LWNvb2sgc2FsdC1jb2QsIGRyaWJibGVkIGludG8gc291cHMgb3Igc2ltcGx5IHNvYWtlZCB1cCB3aXRoIGhvdC1mcm9tLXRoZS1vdmVuIGJyZWFkLg0KRXhwb3J0cyBoYXZlIHF1YWRydXBsZWQgb3ZlciB0aGUgcGFzdCBkZWNhZGUgYXMgdGhlIHdvcmxkIHdha2VzIHVwIHRvIHRoZSBxdWFsaXR5IG9mIFBvcnR1Z2FsJ3MgbGlxdWlkIGdvbGQsIGVpdGhlciBmcm9tIGJpZy10aW1lIHByb2R1Y2VycyBsaWtlIEdhbGxvIGFuZCBPbGl2ZWlyYSBkYSBTZXJyYSwgb3IgaGFuZC1jcmFmdGVkLCBzaW5nbGUtZmFybSBvaWxzLg==', '2016-07-13 04:09:02'),
(12, 'U2F5IFF1ZWlqbw==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160624113320-portugal-food-cheese-paulo-magalhaes-exlarge-169.jpg', 'V2h5IFBvcnR1Z2FsJ3MgY2hlZXNlcyBhcmUgbm90IGJldHRlciBrbm93biBpcyBhIG15c3RlcnkuDQpUcnVlLCBhbWFyZWxvIGRhIEJlaXJhIEJhaXhhIC0tIGEgaGVyYnkgZ29hdC1hbmQtc2hlZXAtbWlsayBtaXgsIHdhcyBqdWRnZWQgdGhlIHdvcmxkJ3MgZ3JlYXRlc3QgaW4gYSB0YXN0aW5nIG9yZ2FuaXplZCBieSBXaW5lIFNwZWN0YXRvciBhbmQgVmFuaXR5IEZhaXIgYSBmZXcgeWVhcnMgYmFjay4NCllldCBjcmVhbXkgU2VycmEgZGEgRXN0cmVsYSBmcm9tIHRoZSBtaWxrIG9mIGV3ZXMgcmFpc2VkIGluIFBvcnR1Z2FsJ3MgbG9mdGllc3QgbW91bnRhaW4gcmFuZ2U7IGhhcmQsIHB1bmdlbnQgY293J3MtbWlsayBjaGVlc2VzIG1hZGUgb24gdGhlIHByZWNpcGl0b3VzIG1pZC1BdGxhbnRpYyBzbG9wZXMgb2YgU2FvIEpvcmdlIGlzbGFuZDsgb3IgcGVwcGVyeSBUZXJyaW5jaG8gcHJvZHVjZWQgaW4gcmVtb3RlIFRyYXMtb3MtTW9udGVzLCByZW1haW4gbGFyZ2VseSB1bmtub3duLg0KU3VjaCBkYWlyeSBkZWxpZ2h0cyBtYXkgYmUgc2VydmVkIGFzIGFwcGV0aXplcnMgb3IgYWZ0ZXIgYSBtZWFsIHdpdGggcmVkIHdpbmUgb3IgcG9ydCwgc29tZXRpbWVzIGFjY29tcGFuaWVkIHdpdGggcXVpbmNlIGphbSAobWFybWVsYWRhKS4NCg0KU29tZSBvZiB0aGUgYmVzdCBjaGVlc2VzIChvciBxdWVpam8pIGluIFBvcnR1Z2FsIGluY2x1ZGUgYW1hcmVsbyBkYSBCZWlyYSBCYWl4YSAtLSBhIGhlcmJ5IGdvYXQtYW5kLXNoZWVwLW1pbGsgbWl4IHRoYXQgd2FzIG9uY2UganVkZ2VkIHRoZSB3b3JsZCdzIGdyZWF0ZXN0IGNoZWVzZSAtLSBhbmQgdGhlIGNyZWFteSBTZXJyYSBkYSBFc3RyZWxhIGZyb20gdGhlIG1pbGsgb2YgZXdlcy4NCg==', '2016-07-13 04:09:02'),
(13, 'QmlmYW5hIHZzLiBwcmVnbw==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160624141421-portugal-food-bifana-alberto-gonzlez-cc-exlarge-169.jpg', 'VG8gbWFrZSBhIGJpZmFuYSwgbWFyaW5hdGUgdGhpbiBzbGljZXMgb2YgcG9yayBpbiB3aGl0ZSB3aW5lIGFuZCBnYXJsaWMsIGZyeSwgc2xhcCBpdCBpbnRvIGEgYnJlYWQgcm9sbCwgYWRkIG11c3RhcmQgb3IgaG90IHNhdWNlIHRvIHRhc3RlLg0KRm9yIGEgcHJlZ28sIHRoZSBwcm9jZXNzIGlzIHByZXR0eSBzaW1pbGFyLCBidXQgdGhlIG1haW4gaW5ncmVkaWVudCBpcyBiZWVmIHN0ZWFrLg0KVGhlc2UgYXJlIFBvcnR1Z2FsJ3Mgc25hY2tzIG9mIHByZWZlcmVuY2UuDQpEb25lIHJpZ2h0LCB3aXRoIHF1YWxpdHkgbWVhdCBhbmQganVpY2VzIHRoYXQgc29hayBpbnRvIHRoZSBzb2Z0IHdoaXRlIGJyZWFkLCB0aGV5IGFyZSB1bmJlYXRhYmxlLg0KQWNjb21wYW55IHdpdGggY29sZCBiZWVyLg0KUHJlZ29zIGFyZSBhbHNvIGN1c3RvbWFyaWx5IHVzZWQgdG8gcm91bmQgb2ZmIGEgZmVhc3Qgb2YgY2xhbXMsIHNocmltcCBvciBjcmFiIGluIG1hcmlzcXVlaXJhcyAtLSBzcGVjaWFsaXplZCBzZWFmb29kIGpvaW50cy4=', '2016-07-13 04:09:02'),
(14, 'U2FpbnRseSBzYXJkaW5lcw==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160623163948-15-sardines-2-gettyimages-459683280-exlarge-169.jpg', 'Tm90IHRoYXQgcGFzdGVpcyBkZSBuYXRhIGFyZSBwYXNzZS4NClRoZSBjaW5uYW1vbi1zcHJpbmtsZWQgY3VzdGFyZCB0YXJ0cyBpbnZlbnRlZCBieSBtb25rcyBpbiBMaXNib24ncyBCZWxlbSBkaXN0cmljdCBhcmUgc3RpbGwgeXVtbXksIGJ1dCBQb3J0dWdhbCdzIHBhc3RyeS1tYWtpbmcgZWZmb3J0cyBnbyBzbyBtdWNoIGZ1cnRoZXIuDQpJdCdzIHRpbWUgdG8gZW1icmFjZSBzdGlja3kgTWFkZWlyYSBtb2xhc3NlcyBjYWtlczsgZmlnLCBhbG1vbmQgYW5kIGNhcm9iIGNyZWF0aW9ucyBmcm9tIHRoZSBBbGdhcnZlOyBmaWxvLXBhc3RyeSB0dWJlcyB3aXRoIHN3ZWV0LCBlZ2d5IGZpbGxpbmdzIG9yaWdpbmF0aW5nIGluIHRoZSB2aWxsYWdlIG9mIFRlbnR1Z2FsLg0KVGhlIG5hbWVzIG9mIG1hbnkgc2luZnVsIGNvbmZlY3Rpb25zIHJlZmxlY3QgdGhlaXIgb3JpZ2lucyBpbiBjb252ZW50IGtpdGNoZW5zIC0tIGxpa2UgYmFjb24tZnJvbS1oZWF2ZW4gKHRvdWNpbmhvIGRvIGNldSkgb3IgbnVuJ3MgYmVsbHkgKGJhcnJpZ2EgZGUgZnJlaXJhKS4=', '2016-07-13 04:20:12'),
(15, 'UGFzdGVsIGRlIG5hdGEncyByaXZhbHM=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160624113155-portugal-food-pastry-ehtl-exlarge-169.jpg', 'TWVhbGhhZGEgaXMgYSB0b3duIGJ1aWx0IG9uIHN1Y2tsaW5nIHBpZy4NClRoZSBtYWluIHN0cmVldCBpcyBsaW5lZCB3aXRoIGluZHVzdHJpYWwtc2NhbGUgcmVzdGF1cmFudHMgc2VydmluZyB1cCBodW5kcmVkcyBvZiBzcGl0LXJvYXN0ZWQgcGlnbGV0cyBldmVyeSBkYXkuDQpUbyBiZWNvbWUgbGVpdGFvIGRhIEJhaXJyYWRhIHRoZSBhbmltYWxzIGFyZSBiYXN0ZWQgaW4gYSBnYXJsaWMtYW5kLWJsYWNrLXBlcHBlciBzYXVjZSBhbmQgY29va2VkIHNsb3dseSB0byBwcm9kdWNlIHRlbmRlciBwaW5rIGZsZXNoIHdyYXBwZWQgaW4gYSBjcmlzcHkgc2tpbi4NClVzdWFsbHkgc2VydmVkIHdpdGggZnJpZWQgcG90YXRvZXMsIHNsaWNlcyBvZiBvcmFuZ2VzIGFuZCBsb2NhbCBzcGFya2xpbmcgd2luZSwgYWx0aG91Z2ggcHVyaXN0cyBwcmVmZXIgdGhlIEJhaXJyYWRhIHJlZ2lvbidzIGV4Y2VsbGVudCByZWRzLg==', '2016-07-13 04:20:12'),
(16, 'TGl0dGxlIHBpZ2dpZXM=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160624141421-portugal-food-bifana-alberto-gonzlez-cc-exlarge-169.jpg', 'TWVhbGhhZGEgaXMgYSB0b3duIGJ1aWx0IG9uIHN1Y2tsaW5nIHBpZy4NClRoZSBtYWluIHN0cmVldCBpcyBsaW5lZCB3aXRoIGluZHVzdHJpYWwtc2NhbGUgcmVzdGF1cmFudHMgc2VydmluZyB1cCBodW5kcmVkcyBvZiBzcGl0LXJvYXN0ZWQgcGlnbGV0cyBldmVyeSBkYXkuDQpUbyBiZWNvbWUgbGVpdGFvIGRhIEJhaXJyYWRhIHRoZSBhbmltYWxzIGFyZSBiYXN0ZWQgaW4gYSBnYXJsaWMtYW5kLWJsYWNrLXBlcHBlciBzYXVjZSBhbmQgY29va2VkIHNsb3dseSB0byBwcm9kdWNlIHRlbmRlciBwaW5rIGZsZXNoIHdyYXBwZWQgaW4gYSBjcmlzcHkgc2tpbi4NClVzdWFsbHkgc2VydmVkIHdpdGggZnJpZWQgcG90YXRvZXMsIHNsaWNlcyBvZiBvcmFuZ2VzIGFuZCBsb2NhbCBzcGFya2xpbmcgd2luZSwgYWx0aG91Z2ggcHVyaXN0cyBwcmVmZXIgdGhlIEJhaXJyYWRhIHJlZ2lvbidzIGV4Y2VsbGVudCByZWRzLg==', '2016-07-13 04:20:12'),
(17, 'SGFsYXlhbmcgdWJl', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520184121-36-filipino-dishes-halayang-ube-exlarge-169.jpg', 'VGhlIHViZSBvciBwdXJwbGUgeWFtIGlzIGEgcG9wdWxhciBpbmdyZWRpZW50IHVzZWQgZm9yIGRlc3NlcnRzIGFuZCBoZXJlIGl0J3MgbWFkZSBpbnRvIGEgc3dlZXQgaGFsYXlhbmcgdWJlICh1YmUgamFtKS4NCkZvciBkZWNhZGVzIHRoZSBudW5zIG9mIHRoZcKgR29vZCBTaGVwaGVyZCBDb252ZW50wqBpbiBUYWdheXRheSBoYXZlIGJlZW4gcHJvZHVjaW5nIHRoaXMgamFtLg0KVGhlaXIgcHJvZHVjdCBpcyBzbW9vdGggYW5kIGNyZWFteSwgYW5kIGhlbHBzIHByb3ZpZGUgYSBsaXZlbGlob29kIHRvIHRoZSBzaW5nbGUgbW90aGVycyB3aG8gbWFrZSB0aGVtLg0K', '2016-07-13 04:39:40'),
(18, 'QXJyb3ogQ2FsZG8=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520183203-09-filipino-dishes-arroz-caldo-exlarge-169.jpg', 'V2hpbGUgY2hpY2tlbiBzb3VwIHNvb3RoZXMgc2ljayBXZXN0ZXJuZXJzLCBGaWxpcGlub3MgdHVybiB0byBhcnJveiBjYWxkbywgYSB0aGljayBjaGlja2VuIHJpY2UgcG9ycmlkZ2UuDQpDb29rZWQgd2l0aCBnaW5nZXIgYW5kIHNvbWV0aW1lcyBnYXJuaXNoZWQgd2l0aCBhIGhhcmQtYm9pbGVkIGVnZywgdG9hc3RlZCBnYXJsaWMgYW5kIGdyZWVuIG9uaW9ucywgdGhpcyBGaWxpcGlubyBmb29kIGlzIHNvbGQgaW4gc3RyZWV0LXNpZGUgc3RhbGxzLg==', '2016-07-13 04:39:40'),
(19, 'TGFpbmc=', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520183259-20-filipino-dishes-laing-exlarge-169.jpg', 'VGhpcyBkaXNoIG9mIHRhcm8gbGVhdmVzIGNvb2tlZCBpbiByaWNoIGNvY29udXQgbWlsayBpcyBhbiBldmVyeWRheSBzdGFwbGUgaW4gQmljb2wuDQpNb3JzZWxzIG9mIG1lYXQgYW5kIGNoaWxpIGFyZSBhZGRlZCB0byBnaXZlIHB1bmNoIHRvIHRoZSBMYWluZy4NCkl0J3MgZWF0ZW4gd2l0aCBzdGVhbWVkIHJpY2Uu', '2016-07-13 04:39:40'),
(20, 'SW5paGF3IG5hIExpZW1wbw==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520190217-33-filipino-dishes-inihaw-na-liempo-1-exlarge-169.jpg', 'QSBGaWxpcGluby1zdHlsZSBiYXJiZWN1ZSB1c2luZyBhIHBvcHVsYXIgcG9yayBwYXJ0OiBsaWVtcG8gKHBvcmsgYmVsbHkpLg0KQXJndWFibHksIHRoZSBiZXN0IGlzIENlYnVhbm8gc3R5bGUgLS0gYSBzbGFiIG9mIGxpZW1wbyBzdHVmZmVkIHdpdGggaGVyYnMgYW5kIHNwaWNlcyBhbmQgcm9hc3RlZC4NClRoZSByZXN1bHQgaXMganVpY3kgZmxhdm9yc29tZSBtZWF0IGluc2lkZSBhbmQgY3JhY2tsaW5nIHNraW4gb3V0c2lkZS4=', '2016-07-13 04:39:40'),
(21, 'UHV0byBidW1ib25n', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520184029-28-filipino-dishes-puto-bumbong-exlarge-169.jpg', 'VGhlc2UgbWF5IGxvb2sgbGlrZSBtaW5pYXR1cmUgY2hpbW5leXMgYWxvbmcgdGhlIHJvYWRzaWRlIHN0YWxscywgYnV0IHRoYXQncyB3aGF0IGdpdmVzIHRoZSBjaGV3eSBwdXJwbGUgc25hY2tzIHRoZWlyIG5hbWUuDQpUcmFkaXRpb25hbGx5LCBwdXJwbGUgbW91bnRhaW4gcmljZSB3YXMgdXNlZCB0byBtYWtlIHRoZXNlLCBzdGVhbWVkIGluIGJhbWJvbyB0dWJlcywgdGhlbiBzZXJ2ZWQgd2l0aCBidXR0ZXIsIHBhbm9jaGEgKGJyb3duIGNvbmNlbnRyYXRlZCBzdWdhcikgYW5kIGdyYXRlZCBjb2NvbnV0Lg==', '2016-07-13 04:50:07'),
(22, 'THVtcGlhbmcgdWJvZA==', '', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160520183951-25-filipino-dishes-lumpiang-ubod-exlarge-169.jpg', 'VGhlIGZydWl0LCBsZWF2ZXMgYW5kIGV2ZW4gdGhlIHBpdGggb2YgdGhlIGNvY29udXQgdHJlZSBpcyB1c2VkIGluIEZpbGlwaW5vIGZvb2QuDQpUaGUgcGl0aCBtYWtlcyBhIHN3ZWV0IGFuZCB0ZW5kZXIgZmlsbGluZyBmb3IgdGhlIGZyZXNoIGx1bXBpYSwgb3VyIHZlcnNpb24gb2YgdGhlIHNwcmluZyByb2xsLg0KQSBkZWxpY2F0ZSBlZ2cgd3JhcHBlciBjb250YWlucyBhIHNhdm9yeSBmaWxsaW5nIG9mIHVib2QgKHRoZSBwaXRoIG9mIHRoZSBjb2NvbnV0IHRyZWUpLCBzaHJpbXBzLCBwb3JrLCBvbmlvbnMgYW5kIGEgZ2FybGlja3kgc3dlZXQgc2F1Y2UuDQpCYWNvbG9kIGNpdHkgaXMga25vd24gZm9yIGl0cyBwZXRpdGUgdmVyc2lvbiBvZiB0aGlzIHNwcmluZyByb2xsLg==', '2016-07-13 04:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `new_places`
--

CREATE TABLE `new_places` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_places`
--

INSERT INTO `new_places` (`id`, `title`, `description`, `date_added`, `image_url`) VALUES
(2, 'd2FpdCBhbmQgc2Vl', 'PHA+dGhpcyBzaG91bGQgZG8gaXQ8L3A+', '2016-09-27 01:18:25', 'http://localhost/mypersonalchef.com.ng/images/meals/994e33c49689f66e6daaf90325e7aa1b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `url` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_markets`
--

CREATE TABLE `shopping_markets` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `address` text NOT NULL,
  `geoLocation` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_markets`
--

INSERT INTO `shopping_markets` (`id`, `title`, `description`, `url`, `address`, `geoLocation`, `dateTime`) VALUES
(2, 'c2FtcGxlIHRpdGxlIDI=', 'PHA+ZGVzY3JpcHRpb248L3A+', 'http://localhost/mypersonalchef.com.ng/images/meals/1f3830ee742ab8650fbb2d05b5185b9b.jpg', 'PHA+YWRkcmVzcyAyPC9wPg==', 0, '2016-09-27 03:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'chef');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` longtext NOT NULL,
  `username` varchar(250) NOT NULL,
  `type` int(11) NOT NULL,
  `image_url` text,
  `activated` int(11) NOT NULL DEFAULT '0',
  `tel` varchar(20) DEFAULT NULL,
  `fullname` varchar(240) DEFAULT NULL,
  `address` text,
  `open_time` int(11) DEFAULT NULL,
  `close_time` int(11) DEFAULT NULL,
  `activation_code` text NOT NULL,
  `delivery_time` varchar(200) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `type`, `image_url`, `activated`, `tel`, `fullname`, `address`, `open_time`, `close_time`, `activation_code`, `delivery_time`, `last_activity`) VALUES
(1, 'mikkytrionze@yahoo.com', '4e6ca650f52383d9054a826b0b4db1f5', 'administrator', 1, 'https://z-m-scontent.xx.fbcdn.net/v/t1.0-1/p200x200/1499430_10154105765994256_1588166844772381142_n.jpg?_nc_eui2=v1%3AAeGHp5yyOADdr6H59uUMYAs8AK0InIregbTMK9wkKvNZSht8C50i-aHQDoFoWCO0gA8ypAXBnzlaVTkzJmEdbU2AKtLdEmhSKryxw82Oedockg&_nc_ad=z-m&oh=5eb20da33a2240ea965ea8590018d5f8&oe=58744F08', 1, NULL, NULL, NULL, NULL, NULL, '0', NULL, '2016-09-16 01:01:58'),
(2, 'cookies@yahoo.com', '22a65a4454c6f08417b54da33e3b3101', 'cookies101', 3, '/images/chef/1457718276.jpg', 1, '+2345676543', 'John Doe', 'QWJ1amEsIGxhZ29zLCBOaWdlcmlhLg==', 6, 15, '0', NULL, '2016-09-10 03:06:56'),
(3, 'tthealthycuisine@gmail.com', '25e0b9e2561d6ffc236036255a64f259', 'TT Healthy', 3, '/images/chef/1459715085.jpg', 1, '08091114079', 'TT Healthy Cuisine', 'T3lpYm8gQWRqYXJobywgb2ZmIEFkbWlyYWx0eSB3YXksIExla2tpIFBoYXNlIG9uZS4=', 7, 14, '01459715085', NULL, '2016-09-10 03:06:56'),
(4, 'hirekaanmicheal@gmail.com', 'a2550eeab0724a691192ca13982e6ebd', 'johndoe', 3, '/images/chef/1460041512.jpg', 1, '0902464737', 'John Doe', 'bGFnb3MsIE5pZ2VyaWE=', 0, 24, '01460041512', NULL, '2016-09-10 03:06:56'),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 3, '/images/chef/1460898732.jpg', 0, '', '', '', 0, 0, '', '', '2016-09-10 03:06:56'),
(7, 'flexmania@hotmail.com', '40aa9852d6248d17023dbe46543607e2', 'dookies', 3, '/images/chef/1460899400.jpg', 0, '09020464737', 'John Doe', 'U3VpdGUgNCAmIDUgVmV0ZXJhbnMgUGxhemE=', 6, 15, '', '', '2016-09-10 03:06:56'),
(8, 'salamatu@hotmail.com', '40aa9852d6248d17023dbe46543607e2', 'doe.john', 3, '/images/chef/1460899619.jpg', 0, '08020464737', 'Doe John', 'U3VpdGUgNCAmIDUgVmV0ZXJhbnMgUGxhemE=', 6, 15, '', '', '2016-09-10 03:06:56'),
(9, 'mikkytrionze@gmail.com', '9a48ddc4453fed2bff16c95fe23472ee', 'mikkytrionze@gmail.com', 2, NULL, 1, NULL, 'Amen Mike', NULL, NULL, NULL, '', NULL, '2016-09-10 05:31:09'),
(10, 'amen.angels@gmail.com', '36cdedcedfaddb2d15e44817b819b5cb', 'amen.angels@gmail.com', 2, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xaf1/v/t1.0-1/p200x200/387108_399725756759908_541067972_n.jpg?oh=224a1e39ab10876c91276844aba66e0f&oe=58719B7E&__gda__=1482657522_b305148a2c26b315af6d51d38f5ac159', 1, NULL, 'Micheal Amen', NULL, NULL, NULL, '', NULL, '2016-09-26 01:40:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_cart`
--
ALTER TABLE `buyer_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer` (`buyer`,`meal`),
  ADD KEY `meal` (`meal`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_id` (`auth_id`),
  ADD UNIQUE KEY `email_id` (`email`,`auth_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_2` (`meal`),
  ADD KEY `chef` (`chef`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `chef_images`
--
ALTER TABLE `chef_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef` (`id`),
  ADD KEY `chef_2` (`chef`);

--
-- Indexes for table `chef_of_the_month`
--
ALTER TABLE `chef_of_the_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooking_tips`
--
ALTER TABLE `cooking_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `ts` (`ts`);

--
-- Indexes for table `forum_extras`
--
ALTER TABLE `forum_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_type` (`item_type`),
  ADD KEY `url` (`url`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `forum_follow`
--
ALTER TABLE `forum_follow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `follower_followed` (`follower`,`followed`) USING BTREE,
  ADD KEY `follower` (`follower`),
  ADD KEY `followed` (`followed`);

--
-- Indexes for table `forum_item_type`
--
ALTER TABLE `forum_item_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients_of_the_month`
--
ALTER TABLE `ingredients_of_the_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_images`
--
ALTER TABLE `meal_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal` (`meal`);

--
-- Indexes for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day_time` (`day_time`,`buyer`),
  ADD KEY `meal` (`meal`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu` (`meal`,`day`),
  ADD KEY `chef` (`chef`);

--
-- Indexes for table `new_meals`
--
ALTER TABLE `new_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_places`
--
ALTER TABLE `new_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster` (`poster`),
  ADD KEY `meal` (`meal`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `shopping_markets`
--
ALTER TABLE `shopping_markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_cart`
--
ALTER TABLE `buyer_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chef_images`
--
ALTER TABLE `chef_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `chef_of_the_month`
--
ALTER TABLE `chef_of_the_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cooking_tips`
--
ALTER TABLE `cooking_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `forum_extras`
--
ALTER TABLE `forum_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `forum_follow`
--
ALTER TABLE `forum_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_item_type`
--
ALTER TABLE `forum_item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ingredients_of_the_month`
--
ALTER TABLE `ingredients_of_the_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `meal_images`
--
ALTER TABLE `meal_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mealplan`
--
ALTER TABLE `mealplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `new_meals`
--
ALTER TABLE `new_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `new_places`
--
ALTER TABLE `new_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shopping_markets`
--
ALTER TABLE `shopping_markets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer_cart`
--
ALTER TABLE `buyer_cart`
  ADD CONSTRAINT `buyers_id` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meals_id` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `order_buyer` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_chef` FOREIGN KEY (`chef`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_meal` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chef_images`
--
ALTER TABLE `chef_images`
  ADD CONSTRAINT `chef_of_the_month` FOREIGN KEY (`chef`) REFERENCES `chef_of_the_month` (`id`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_extras`
--
ALTER TABLE `forum_extras`
  ADD CONSTRAINT `forum_extras_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_extras_ibfk_2` FOREIGN KEY (`item_type`) REFERENCES `forum_item_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_follow`
--
ALTER TABLE `forum_follow`
  ADD CONSTRAINT `forum_follow_ibfk_1` FOREIGN KEY (`followed`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_follow_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meal_images`
--
ALTER TABLE `meal_images`
  ADD CONSTRAINT `meal_images_fk` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD CONSTRAINT `mealplan_BUYER` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mealplan_meal` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meal_owner_fk` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `xq` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `xw` FOREIGN KEY (`chef`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `meal_order_fk` FOREIGN KEY (`meal`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poster_order_fk` FOREIGN KEY (`poster`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `picture_owner_fk` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type_fk` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
