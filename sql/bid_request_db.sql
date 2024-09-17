-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 05:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bid_request_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `campaign_id`, `user_id`, `price`, `device`) VALUES
(1, 6, 8, 45.00, ''),
(2, 5, 8, 46.00, ''),
(3, 5, 8, 40.00, ''),
(4, 5, 8, 47.00, ''),
(5, 5, 8, 41.00, ''),
(6, 1, 8, 0.20, ''),
(7, 1, 8, 0.22, ''),
(8, 1, 8, 0.21, ''),
(9, 6, 8, 49.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `advertiser` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `appid` varchar(255) NOT NULL,
  `tld` varchar(255) NOT NULL,
  `portal_name` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `creative_type` tinyint(1) NOT NULL DEFAULT 1,
  `creative_id` varchar(20) NOT NULL,
  `day_capping` tinyint(1) NOT NULL DEFAULT 0,
  `attribute` varchar(255) NOT NULL,
  `billing_id` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `bidtype` varchar(100) NOT NULL,
  `image_url` text NOT NULL,
  `htmltag` varchar(255) DEFAULT NULL,
  `from_hour` varchar(10) NOT NULL,
  `to_hour` varchar(10) NOT NULL,
  `hs_os` int(3) NOT NULL,
  `operator` int(3) NOT NULL,
  `device_make` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `user_list_id` int(3) NOT NULL DEFAULT 0,
  `adplay_logo` int(3) NOT NULL DEFAULT 1,
  `vast_video_duration` varchar(255) DEFAULT NULL,
  `logo_placement` int(2) NOT NULL DEFAULT 1,
  `hs_model` varchar(255) DEFAULT NULL,
  `is_rewarded_inventory` tinyint(1) NOT NULL DEFAULT 0,
  `pixel_tag` varchar(255) DEFAULT NULL,
  `dmp_campaign_audience` tinyint(1) NOT NULL DEFAULT 0,
  `platform` varchar(255) DEFAULT NULL,
  `open_publisher` tinyint(1) NOT NULL DEFAULT 1,
  `audience_targeting` tinyint(1) NOT NULL DEFAULT 0,
  `native_title` varchar(255) DEFAULT NULL,
  `native_type` varchar(255) DEFAULT NULL,
  `native_data_value` varchar(255) DEFAULT NULL,
  `native_data_cta` varchar(255) DEFAULT NULL,
  `native_data_rating` varchar(255) DEFAULT NULL,
  `expire_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign_name`, `advertiser`, `code`, `appid`, `tld`, `portal_name`, `dimension`, `creative_type`, `creative_id`, `day_capping`, `attribute`, `billing_id`, `price`, `bidtype`, `image_url`, `htmltag`, `from_hour`, `to_hour`, `hs_os`, `operator`, `device_make`, `country`, `city`, `lat`, `lng`, `app_name`, `user_list_id`, `adplay_logo`, `vast_video_duration`, `logo_placement`, `hs_model`, `is_rewarded_inventory`, `pixel_tag`, `dmp_campaign_audience`, `platform`, `open_publisher`, `audience_targeting`, `native_title`, `native_type`, `native_data_value`, `native_data_cta`, `native_data_rating`, `expire_date`) VALUES
(1, '3th-19st_april_Developer', 'TestBL', '229', '519', 'PlayAdd Tech', 'dfgxd', 'dxrgdrg', 1, '689', 0, 'drgdrg', '226', 0.10, 'MSD', 'https://placehold.co/600x400', NULL, '0', '20', 2, 2, 'fgghfh', 'bd', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726437600'),
(3, '13th-31st_march_Developer', 'TestGP', '577', '533', 'Logic Software', 'placehold', '320X320', 1, '604', 0, 'Aattribute', '569', 0.20, 'CMR', 'https://placehold.co/600x400', NULL, '0', '23', 2, 2, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726524000'),
(4, '20th-31st_jun_Developer	', 'TestBH', '265', '720', 'https://placehold.co/', 'placehold', '320X320', 1, '538', 0, 'Aattribute', '832', 0.15, 'MND', 'https://placehold.co/600x400', NULL, '0', '21', 1, 2, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726696800'),
(5, 'Test_Banner_13th-31st_march_Developer', 'fthrtd', '927', '153', 'https://placehold.co/', 'placehold', 'dxrgdrg', 1, '985', 0, 'Aattribute', '383', 0.20, 'cmr', 'https://placehold.co/600x400', NULL, '0', '44', 2, 2, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726696800'),
(6, '20th-31st_jun_Developer	', 'TestGP', '777', '955', 'https://placehold.co/', 'placehold', '320X320', 1, '729', 0, 'Aattribute', '525', 0.20, 'MND', 'https://placehold.co/600x400', NULL, '0', '44', 2, 1, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726783200'),
(7, '21th-31st_jun_Developer	', 'TestGP', '899', '372', 'https://placehold.co/', 'placehold', '320X320', 1, '580', 0, 'Aattribute', '481', 0.20, 'cmr', 'https://placehold.co/600x400', NULL, '0', '44', 2, 2, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1726783200'),
(8, 'Test_Banner_13th-31st_march_Soft', 'TestGP', '293', '309', 'https://placehold.co/', 'placehold', '320X320', 1, '908', 0, 'Aattribute', '516', 0.20, 'MND', 'https://placehold.co/600x400', NULL, '0', '44', 1, 2, 'No Filter', 'Bangladesh', NULL, NULL, NULL, NULL, 0, 1, NULL, 1, NULL, 0, NULL, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '1727042400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL COMMENT 'admin= 1;customer=2',
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `phone`, `password`, `status`) VALUES
(1, 1, 'Al Hassan', 'admin@gmail.com', '01710410490', '25d55ad283aa400af464c76d713c07ad', 1),
(8, 2, 'Al Hassan', 'alhassan.cse@gmail.com', '01710410490', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(9, 2, 'Al Hassan', 'poshora@proedge-asso.com', '01710410490', 'fcea920f7412b5da7be0cf42b8c93759', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
