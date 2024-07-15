-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2024 at 06:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dafgasdfgds`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `course_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `tag_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `description`, `image`, `svg`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `user_id`, `category_id`, `subcategory_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 'How to manage Facebook ads for clients the right way', 'how-to-manage-facebook-ads-for-clients-the-right-way', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938590.jpg', '', 'How to manage Facebook ads for clients the right way', 'Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.', '', 'active', 3, 6, NULL, NULL, '2023-10-05 04:06:38', '2024-04-24 06:03:10'),
(2, '14 Facebook Ad Examples for Ad Creative Inspiration', '14-facebook-ad-examples-for-ad-creative-inspiration-1713938584', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938584.jpg', '', '14 Facebook Ad Examples for Ad Creative Inspiration', 'Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.', '', 'active', 3, 5, NULL, NULL, '2023-10-05 04:08:15', '2024-04-24 06:03:04'),
(3, 'Google Ads certifications: Are they worth it?', 'google-ads-certifications-are-they-worth-it-1713938577', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938577.jpg', '', 'Meta Title', 'Meta', '', 'active', 3, 7, NULL, NULL, '2023-10-05 04:10:01', '2024-04-24 06:02:57'),
(4, 'New Chicago school budget relies on state pension', 'new-chicago-school-budget-relies-on-state-pension-1713938569', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938569.jpg', '', 'New Chicago school budget relies on state pension', 'Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.', '', 'active', 3, 4, NULL, NULL, '2023-10-05 04:10:40', '2024-04-24 06:02:49'),
(5, 'Exactly How Technology Can Make Reading Better', 'exactly-how-technology-can-make-reading-better', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938562.jpg', '', '', '', '', 'active', 3, 3, NULL, NULL, '2023-10-05 04:11:14', '2024-04-24 06:02:42'),
(6, 'The Challenge Of Global Learning In Public Education', 'the-challenge-of-global-learning-in-public-education', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938555.jpg', '', '', '', '', 'active', 3, 2, NULL, NULL, '2023-10-05 04:11:38', '2024-04-24 06:02:35'),
(8, 'How to manage Facebook ads for clients the right way', 'how-to-manage-facebook-ads-for-clients-the-right-way-1713938548', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938548.jpg', '', '', '', '', 'active', 3, 3, NULL, NULL, '2023-10-05 04:16:55', '2024-04-24 06:02:28'),
(9, 'New Chicago school budget relies on state pension', 'new-chicago-school-budget-relies-on-state-pension', '<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.<br></span></p>\n<p><span style=\"color:#6a727f;font-family:Hind, sans-serif;font-size:16px;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</span></p>\n<h3>Educal is the only theme you will ever need</h3>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Are you taking the piss young delinquent wellies absolutely bladdered the Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot.</p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\"><strong><span style=\"color:#070337;font-size:20px;\">Tosser argy-bargy mush loo at public school Elizabeth up the duff buggered chinwag on your bike mate don’t get shirty with me super, Jeffrey bobby Richard cheesed off spend a penny a load of old tosh blag horse.</span></strong></p>\n<p style=\"font-family:Hind, sans-serif;font-size:16px;color:#6a727f;\">Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/blogs/1713938540.jpg', '', '', '', '', 'active', 3, 4, NULL, NULL, '2023-10-05 04:19:03', '2024-04-24 06:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `description`, `image`, `svg`, `icon`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 'uncategorized', 'This is uncategorized category', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2023-09-24 05:07:05', '2023-09-24 05:07:05'),
(2, 'Business', 'business', '', 'default.png', '/uploads/blog_category/1713766879.svg', NULL, '', '', '', 'active', 3, '2023-10-05 03:58:57', '2024-04-22 06:21:19'),
(3, 'E-Learning', 'e-learning', '', 'default.png', '/uploads/blog_category/1713766873.svg', NULL, '', '', '', 'active', 3, '2023-10-05 03:59:28', '2024-04-22 06:21:13'),
(4, 'Development', 'development', '', 'default.png', '/uploads/blog_category/1713766866.svg', NULL, '', '', '', 'active', 3, '2023-10-05 04:00:53', '2024-04-22 06:21:06'),
(5, 'It Software', 'it-software', '', 'default.png', '/uploads/blog_category/1713766858.svg', NULL, '', '', '', 'active', 3, '2023-10-05 04:01:22', '2024-04-22 06:20:58'),
(6, 'Lifestyle', 'lifestyle', '', 'default.png', '/uploads/blog_category/1713766850.svg', NULL, '', '', '', 'active', 3, '2023-10-05 04:01:55', '2024-04-22 06:20:50'),
(7, 'Academics', 'academics', '', 'default.png', '/uploads/blog_category/1713766843.svg', NULL, '', '', '', 'active', 3, '2023-10-05 04:02:20', '2024-04-22 06:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sub_categories`
--

CREATE TABLE `blog_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sub_categories`
--

INSERT INTO `blog_sub_categories` (`id`, `title`, `slug`, `description`, `image`, `svg`, `icon`, `status`, `user_id`, `blog_category_id`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(3, 'Lms', 'lms', 'Lms Category', 'default.png', '/uploads/blog_subcategory/1713766906.svg', NULL, 'active', 3, 3, '', '', '', '2024-03-25 05:42:15', '2024-04-22 06:21:46'),
(4, 'Learning', 'learning', '', 'default.png', '/uploads/blog_subcategory/1713766897.svg', NULL, 'active', 3, 3, '', '', '', '2024-03-25 05:42:31', '2024-04-22 06:21:37'),
(5, 'Web dev', 'web-dev', '', 'default.png', '/uploads/blog_subcategory/1713766889.svg', NULL, 'active', 3, 7, '', '', '', '2024-03-25 05:43:00', '2024-04-22 06:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `title`, `slug`, `description`, `image`, `svg`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'App', 'app', NULL, 'default.png', NULL, 'active', '2023-10-05 04:02:45', '2023-10-05 04:02:45', NULL),
(2, 'Art', 'art', NULL, 'default.png', NULL, 'active', '2023-10-05 04:02:49', '2023-10-05 04:02:49', NULL),
(3, 'Design', 'design', NULL, 'default.png', NULL, 'active', '2023-10-05 04:02:54', '2023-10-05 04:02:54', NULL),
(4, 'Development', 'development', NULL, 'default.png', NULL, 'active', '2023-10-05 04:03:00', '2023-10-05 04:03:00', NULL),
(5, 'Game', 'game', NULL, 'default.png', NULL, 'active', '2023-10-05 04:03:05', '2023-10-05 04:03:05', NULL),
(6, 'Music', 'music', NULL, 'default.png', NULL, 'active', '2023-10-05 04:03:11', '2023-10-05 04:03:11', NULL),
(7, 'Photography', 'photography', NULL, 'default.png', NULL, 'active', '2023-10-05 04:03:24', '2023-10-05 04:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('approved','pending','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `content`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'This Blog Is Good', NULL, 'approved', '2024-03-25 05:48:37', '2024-03-25 05:48:37'),
(2, 3, 6, 'Thenks For Your comment', 1, 'approved', '2024-03-25 05:49:39', '2024-03-25 05:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `percentage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `user_id`, `course_id`, `percentage`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30.00, 63000.00, '2023-09-25 22:40:37', '2023-09-25 22:40:37'),
(2, 1, 1, 30.00, 141120.00, '2023-09-25 22:41:00', '2023-09-25 22:41:00'),
(3, 1, 1, 30.00, 840.00, '2023-09-25 23:12:03', '2023-09-25 23:12:03'),
(4, 1, 1, 30.00, 63000.00, '2023-09-25 23:24:56', '2023-09-25 23:24:56'),
(5, 1, 2, 30.00, 420.00, '2023-09-27 04:57:27', '2023-09-27 04:57:27'),
(6, 1, 10, 30.00, 2800.00, '2024-03-25 06:06:44', '2024-03-25 06:06:44'),
(7, 10, 18, 30.00, 525.00, '2024-03-27 04:47:14', '2024-03-27 04:47:14'),
(8, 1, 2, 30.00, 1330.00, '2024-03-27 04:52:50', '2024-03-27 04:52:50'),
(9, 10, 18, 30.00, 525.00, '2024-03-28 08:14:25', '2024-03-28 08:14:25'),
(10, 10, 18, 30.00, 0.00, '2024-04-22 23:39:31', '2024-04-22 23:39:31'),
(11, 3, 12, 30.00, 210.00, '2024-04-25 05:28:35', '2024-04-25 05:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `commission_percents`
--

CREATE TABLE `commission_percents` (
  `id` bigint UNSIGNED NOT NULL,
  `percent` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_percents`
--

INSERT INTO `commission_percents` (`id`, `percent`, `created_at`, `updated_at`) VALUES
(1, 30, '2023-09-24 05:07:05', '2023-09-24 05:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `ammount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `ammount`, `description`, `status`, `count`, `expired_at`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'AMARNAM', 'fixed', '300', 'fsa', 'active', 'unlimited', '2023-09-28', 3, '2023-09-24 21:37:00', '2024-03-25 05:33:04'),
(2, 'SHOP22', 'percentage', '30', '<p>Shop 22 In 22&nbsp;</p>', 'active', '300', '2024-04-27', 3, '2023-10-08 09:26:38', '2023-10-08 09:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `level` enum('beginner','intermediate','advanced') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'beginner',
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','approved','pending','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `tag_id` bigint UNSIGNED DEFAULT NULL,
  `language_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `description`, `image`, `svg`, `video`, `video_thumbnail`, `price`, `discount_price`, `duration`, `duration_type`, `type`, `level`, `requirements`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `user_id`, `category_id`, `subcategory_id`, `tag_id`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'Product Manager Learn the Skills &amp; job.', 'product-manager-learn-the-skills-amp-job', '<h2>About Course</h2>\n<div>\n<p style=\"color:#6d6e75;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>\n</div>', '/uploads/courses/1713940986.jpg', NULL, '', NULL, '1200', '1000', '90060', NULL, 'free', 'intermediate', NULL, 'Meta Title', '', '', 'approved', 1, 1, NULL, NULL, 3, '2023-09-24 20:34:31', '2024-04-24 06:43:06'),
(2, 'The business Intelligence analyst Course 2022', 'the-business-intelligence-analyst-course-2022', '<h2>About Course</h2>\n<div>\n<p style=\"color:#6d6e75;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>\n</div>', '/uploads/courses/1713940592.jpg', NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, '600', '500', '180122', NULL, 'free', 'intermediate', NULL, 'Meta ttle', '', '', 'approved', 1, 8, NULL, NULL, 3, '2023-09-25 22:39:16', '2024-04-24 06:36:32'),
(6, 'The Challenge Of Global Learning In Public Education', 'the-challenge-of-global-learning-in-public-education', '<p><span style=\"color:#53545b;font-family:Hind, sans-serif;font-size:18px;background-color:#ffffff;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how\'s your father David skive off sloshed, don\'t get shirty with me chip shop vagabond crikey bugger Queen\'s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it\'s your round don\'t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen\'s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I\'m telling crikey burke I don\'t want no agro A bit of how\'s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot brolly wellies excuse my french.</span></p>\n<ul>\n<li>Business\'s managers, leaders</li>\n<li>Downloadable lectures, code and design assets for all projects</li>\n<li>Anyone who is finding a chance to get the promotion</li>\n</ul>', '/uploads/courses/1713940584.jpg', NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, '3000', '2500', '176460', NULL, 'free', 'intermediate', NULL, 'Business\'s managers, leaders', 'Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how\'s your father David skive off sloshed, don\'t get shirty with me chip shop vagabond crikey bugger Queen\'s English chap', 'html , css , javascript', 'approved', 3, 10, NULL, NULL, 1, '2023-10-08 09:27:22', '2024-04-24 06:36:24'),
(8, 'New Chicago school budget relies on state pension', 'new-chicago-school-budget-relies-on-state-pension', '<p><span style=\"color:#53545b;font-family:Hind, sans-serif;font-size:18px;background-color:#ffffff;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how\'s your father David skive off sloshed, don\'t get shirty with me chip shop vagabond crikey bugger Queen\'s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it\'s your round don\'t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen\'s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I\'m telling crikey burke I don\'t want no agro A bit of how\'s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot brolly wellies excuse my french.</span></p>\n<ul>\n<li>Business\'s managers, leaders</li>\n<li>Downloadable lectures, code and design assets for all projects</li>\n<li>Anyone who is finding a chance to get the promotion</li>\n</ul>', '/uploads/courses/1713940574.jpg', NULL, 'https://youtu.be/TYYf8zYjP5k?si=h9k1nwl6FqaevlQa', NULL, '7800', '5900', '349260', NULL, 'free', 'advanced', NULL, '', '', '', 'approved', 1, 3, NULL, NULL, 3, '2023-10-08 09:58:11', '2024-04-24 06:36:14'),
(10, '14 Facebook Ad Examples for Ad Creative Inspiration', '14-facebook-ad-examples-for-ad-creative-inspiration', '<p><span style=\"color:#53545b;font-family:Hind, sans-serif;font-size:18px;background-color:#ffffff;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how\'s your father David skive off sloshed, don\'t get shirty with me chip shop vagabond crikey bugger Queen\'s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it\'s your round don\'t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen\'s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I\'m telling crikey burke I don\'t want no agro A bit of how\'s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot brolly wellies excuse my french.</span></p>\n<ul>\n<li>Business\'s managers, leaders</li>\n<li>Downloadable lectures, code and design assets for all projects</li>\n<li>Anyone who is finding a chance to get the promotion</li>\n</ul>', '/uploads/courses/1713940565.jpg', NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, '9000', '4000', '352861', NULL, 'free', 'advanced', NULL, '', '', '', 'approved', 1, 6, NULL, NULL, 1, '2023-10-08 10:17:54', '2024-04-24 06:36:05'),
(12, 'Fundamentals of music theory Learn new', 'fundamentals-of-music-theory-learn-new', '<p><span style=\"color:#53545b;font-family:Hind, sans-serif;font-size:18px;background-color:#ffffff;\">Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how\'s your father David skive off sloshed, don\'t get shirty with me chip shop vagabond crikey bugger Queen\'s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it\'s your round don\'t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen\'s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I\'m telling crikey burke I don\'t want no agro A bit of how\'s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot brolly wellies excuse my french.</span></p>\n<ul>\n<li>Business\'s managers, leaders</li>\n<li>Downloadable lectures, code and design assets for all projects</li>\n<li>Anyone who is finding a chance to get the promotion</li>\n</ul>', '/uploads/courses/1713940556.jpg', NULL, 'https://youtu.be/TYYf8zYjP5k?si=f6dCNSo2M_5JeoXz', NULL, '400', '300', '176400', NULL, 'free', 'beginner', NULL, '', '', '', 'approved', 3, 7, NULL, NULL, 1, '2024-03-18 03:19:17', '2024-04-24 06:35:56'),
(13, 'Laravel Theme Development And Creative Inspiration', 'laravel-theme-development-and-creative-inspiration', '<p>Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot. Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/courses/1713940546.jpg', NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, '3000', '2000', '176400', NULL, 'free', 'intermediate', NULL, '', '', '', 'approved', 1, 10, 1, NULL, 1, '2024-03-25 05:59:59', '2024-04-24 06:35:46'),
(15, 'Become a product Manager learn the skills', 'become-a-product-manager-learn-the-skills', '<p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>', '/uploads/courses/1713940537.jpg', NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, '400', '300', '0', NULL, 'free', 'beginner', NULL, '', '', '', 'approved', 11, 10, 1, NULL, 3, '2024-03-27 03:54:32', '2024-04-24 06:35:37'),
(16, 'Bases Matemáticas dios Álgebra Ecuacion', 'bases-matematicas-dios-algebra-ecuacion', '<p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>', '/uploads/courses/1713940531.jpg', NULL, 'https://youtu.be/5RcE1i_HjJw?si=cTVYbAOqNTfh37IP', NULL, '900', '300', '176400', NULL, 'free', 'intermediate', NULL, '', '', '', 'approved', 8, 3, NULL, NULL, 3, '2024-03-27 04:04:52', '2024-04-24 06:35:31'),
(17, 'Build your media and Public presence', 'build-your-media-and-public-presence', '<p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>', '/uploads/courses/1713940524.jpg', NULL, 'https://youtu.be/5RcE1i_HjJw?si=cTVYbAOqNTfh37IP', NULL, '900', '800', '0', NULL, 'free', 'beginner', NULL, '', '', '', 'approved', 9, 8, NULL, NULL, 3, '2024-03-27 04:31:23', '2024-04-24 06:35:24'),
(18, 'Strategy law and organization Foundation', 'strategy-law-and-organization-foundation', '<p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how’s your father David skive off sloshed, don’t get shirty with me chip shop vagabond crikey bugger Queen’s English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it’s your round don’t get shirty with me down the pub well. Give us a bell bits and bobs Charles he lost his bottle super my lady cras starkers bite your arm off Queen’s English, pardon me horse play Elizabeth a blinding shot chinwag knees up do one David, blag cup of tea Eaton so I said bleeding haggle James Bond cup of char. Gosh William ummm I’m telling crikey burke I don’t want no agro A bit of how’s your father bugger all mate off his nut that, what a plonker cuppa owt to do with me nancy boy show off show off pick your nose and blow off spiffing good time lavatory me old mucker, chimney pot what a load of rubbish boot squiffy lost the plot. brolly.wellies excuse my french.</p>', '/uploads/courses/1713940513.jpg', NULL, 'https://youtu.be/8tdnAAaU0GY?si=CmJChNRjFk5TG2pi', NULL, '', '', '262860', NULL, 'free', 'intermediate', NULL, '', '', '', 'approved', 10, 2, NULL, NULL, 3, '2024-03-27 04:40:20', '2024-04-24 06:35:13'),
(22, 'Wordpress Theme Development And Creative Inspiration', 'wordpress-theme-development-and-creative-inspiration', '<p>Nancy boy Charles down the pub get stuffed mate easy peasy brown bread car boot squiffy loo, blimey arse over tit it’s your round cup of char horse play chimney pot old. Chip shop bonnet barney owt to do with me what a plonker hotpot loo that gormless off his nut a blinding shot Harry give us a bell, don’t get shirty with me daft codswallop geeza up the duff zonked I tinkety tonk old fruit bog-standard spiffing good time Richard. Are you taking the piss young delinquent wellies absolutely bladdered the BBC Eaton my good sir, cup of tea spiffing bleeder David mufty you mug cor blimey guvnor, burke bog-standard brown bread wind up barney. Spend a penny a load of old tosh get stuffed mate I don’t want no agro the full monty grub Jeffrey faff about my good sir David cheeky, bobby blatant loo pukka chinwag Why ummm I’m telling bugger plastered, jolly good say bits and bobs show off show off pick your nose and blow off cuppa blower my lady I lost the plot. Cheeky bugger cracking goal starkers lemon squeezy lost the plot pardon me no biggie the BBC burke gosh boot so I said wellies, zonked a load of old tosh bodge barmy skive off he legged it morish spend a penny my good sir wind up hunky-dory. Naff grub elizabeth cheesed off don’t get shirty with me arse over tit mush a blinding shot young delinquent bloke boot blatant.</p>', '/uploads/courses/1714023269.jpg', NULL, 'https://www.youtube.com/watch?v=zEETxKl3Fks', NULL, '400', '300', '176400', NULL, 'free', 'intermediate', NULL, '', '', '', 'pending', 1, 9, NULL, NULL, 1, '2024-04-25 05:32:37', '2024-04-25 05:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `title`, `slug`, `description`, `image`, `svg`, `icon`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 'uncategorized', 'This is uncategorized category', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2023-09-24 05:07:05', '2023-09-24 05:07:05'),
(2, 'Data Science', 'data-science', 'Data is Everything', 'default.png', '/uploads/course_category/1713767046.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:47:12', '2024-04-22 06:24:06'),
(3, 'Business', 'business', 'Improve your business', 'default.png', '/uploads/course_category/1713767034.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:48:22', '2024-04-22 06:23:54'),
(4, 'Art Design', 'art-design', 'Fun and Challenging', 'default.png', '/uploads/course_category/1713767024.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:48:48', '2024-04-25 00:44:59'),
(5, 'Lifestyle', 'lifestyle', 'New Skills, New You', 'default.png', '/uploads/course_category/1713767012.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:49:13', '2024-04-22 06:23:32'),
(6, 'Marketing', 'marketing', 'Improve your business', 'default.png', '/uploads/course_category/1713767002.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:49:54', '2024-04-22 06:23:22'),
(7, 'Finance', 'finance', 'Fun &amp; Challenging', 'default.png', '/uploads/course_category/1713766991.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:50:23', '2024-04-22 06:23:11'),
(8, 'Health Fitness', 'health-fitness', 'Invest to Your Body', 'default.png', '/uploads/course_category/1713766975.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:52:22', '2024-04-24 05:46:28'),
(9, 'Music', 'music', 'Major or Minor', 'default.png', '/uploads/course_category/1713766955.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:52:47', '2024-04-22 06:22:35'),
(10, 'Academics', 'academics', 'High Education Level', 'default.png', '/uploads/course_category/1713766939.svg', NULL, '', '', '', 'active', 3, '2023-10-08 02:53:09', '2024-04-22 06:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `course_category_users`
--

CREATE TABLE `course_category_users` (
  `id` bigint UNSIGNED NOT NULL,
  `course_category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_languages`
--

CREATE TABLE `course_languages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_languages`
--

INSERT INTO `course_languages` (`id`, `title`, `slug`, `image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 'bangla-1713940357', '/uploads/courses/language/1713940357.png', 'active', 3, '2023-10-08 09:23:24', '2024-04-24 06:32:37'),
(3, 'India', 'india-1713940350', '/uploads/courses/language/1713940350.png', 'active', 3, '2023-10-08 09:24:53', '2024-04-24 06:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_categories`
--

CREATE TABLE `course_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `course_category_id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sub_categories`
--

INSERT INTO `course_sub_categories` (`id`, `title`, `slug`, `description`, `image`, `svg`, `icon`, `status`, `course_category_id`, `meta_title`, `meta_description`, `meta_keywords`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Wordpress', 'wordpress', '', 'default.png', '/uploads/course_subcategory/1713767096.svg', NULL, 'active', 10, '', '', '', 3, '2024-03-25 05:43:39', '2024-04-22 06:24:56'),
(2, 'Html', 'html', '', 'default.png', '/uploads/course_subcategory/1713767090.svg', NULL, 'active', 10, '', '', '', 3, '2024-03-25 05:44:02', '2024-04-22 06:24:50'),
(4, 'Laravel', 'laravel', '', 'default.png', '/uploads/course_subcategory/1713767084.svg', NULL, 'active', 10, '', '', '', 3, '2024-03-25 05:44:29', '2024-04-22 06:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `course_tags`
--

CREATE TABLE `course_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,4) DEFAULT '1.0000',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_default` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `exchange_rate`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'US Dollar', '$', 1.0000, 'active', 'no', NULL, NULL),
(2, 'EUR', 'Euro', '€', 0.8400, 'active', 'no', NULL, NULL),
(3, 'INR', 'Indian Rupee', '₹', 75.0000, 'active', 'no', NULL, NULL),
(4, 'BDT', 'Bangladeshi Taka', '৳', 84.0000, 'active', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `curriculam`
--

CREATE TABLE `curriculam` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curriculum` longtext COLLATE utf8mb4_unicode_ci,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaker_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaker_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `video`, `start_date`, `end_date`, `start_time`, `end_time`, `location`, `sponsor_name`, `sponsor_logo`, `sponsor_website`, `sponsor_email`, `sponsor_phone`, `sponsor_facebook`, `sponsor_twitter`, `sponsor_pinterest`, `ticket_price`, `ticket_discount_price`, `speaker_name`, `speaker_image`, `speaker_designation`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Digital transformation conference', '<p>He legged it up the kyver have it mush super me old mucker cheeky naff that are you taking the piss, blow off down the pub bite your arm off the wireless boot cor blimey guvnor happy days bender what a load of rubbish, say pardon me horse play spiffing Why car boot gosh bubble and squeak. Cheers Richard bugger show off show off pick your nose and blow off get stuffed mate chancer in my flat loo, bevvy amongst hunky-dory bender bubble and squeak me old mucker vagabond, barmy spend a penny chimney pot young delinquent bum bag the bee\'s knees chap, gosh nice one knees up the wireless Charles such a fibber. Mush barmy bleeding Jeffrey pardon me barney grub loo cup of tea bubble and squeak bugger all mate say, I bloke matie boy tickety-boo give us a bell up the duff bugger lurgy wind up I don\'t want no agro.  This event will allow participants to: Business\'s managers, leaders Downloadable lectures, code and design assets for all projects Anyone who is finding a chance to get the promotion      Big data,   Data analysis,  Data modeling                                              </p>', '/uploads/events/1713950988.jpg', NULL, '2023-10-26', '2023-10-08', '10:31', '02:28', 'Dhaka , Bangladesh', 'Thomas R. Toe', '/uploads/events/sponsor/1713950988.png', 'https://educal.weblearnbd.net/', 'support@educal.com', '123231', '#', '#', '#', '1400', '1000', 'Fleece Marigold', '/uploads/events/speaker/1713950988.jpg', 'Host &amp; Speaker', NULL, '2023-10-08 04:42:09', '2024-04-24 09:29:48'),
(2, 'World education day conference', '<p>He legged it up the kyver have it mush super me old mucker cheeky naff that are you taking the piss, blow off down the pub bite your arm off the wireless boot cor blimey guvnor happy days bender what a load of rubbish, say pardon me horse play spiffing Why car boot gosh bubble and squeak. Cheers Richard bugger show off show off pick your nose and blow off get stuffed mate chancer in my flat loo, bevvy amongst hunky-dory bender bubble and squeak me old mucker vagabond, barmy spend a penny chimney pot young delinquent bum bag the bee\'s knees chap, gosh nice one knees up the wireless Charles such a fibber. Mush barmy bleeding Jeffrey pardon me barney grub loo cup of tea bubble and squeak bugger all mate say, I bloke matie boy tickety-boo give us a bell up the duff bugger lurgy wind up I don\'t want no agro.  This event will allow participants to: Business\'s managers, leaders Downloadable lectures, code and design assets for all projects Anyone who is finding a chance to get the promotion      Big data,   Data analysis,  Data modeling</p>', '/uploads/events/1713951010.jpg', NULL, '2023-11-03', '2023-12-30', '04:17', '05:18', 'Dhaka , Bangladesh', 'Thomas R. Toe', '/uploads/events/sponsor/1713951010.png', 'https://educal.weblearnbd.net/', 'support@educal.com', '123231', '#', '#', '#', '12000', '10000', 'Fleece Marigold', '/uploads/events/speaker/1713951072.jpg', 'Host &amp; Speaker', NULL, '2023-10-08 05:14:42', '2024-04-24 09:31:12'),
(11, 'Foundations of global health', '<p>He legged it up the kyver have it mush super me old mucker cheeky naff that are you taking the piss, blow off down the pub bite your arm off the wireless boot cor blimey guvnor happy days bender what a load of rubbish, say pardon me horse play spiffing Why car boot gosh bubble and squeak. Cheers Richard bugger show off show off pick your nose and blow off get stuffed mate chancer in my flat loo, bevvy amongst hunky-dory bender bubble and squeak me old mucker vagabond, barmy spend a penny chimney pot young delinquent bum bag the bee\'s knees chap, gosh nice one knees up the wireless Charles such a fibber. Mush barmy bleeding Jeffrey pardon me barney grub loo cup of tea bubble and squeak bugger all mate say, I bloke matie boy tickety-boo give us a bell up the duff bugger lurgy wind up I don\'t want no agro.  This event will allow participants to: Business\'s managers, leaders Downloadable lectures, code and design assets for all projects Anyone who is finding a chance to get the promotion      Big data,   Data analysis,  Data modeling</p>', '/uploads/events/1713951021.jpg', NULL, '2023-10-18', '2024-05-04', '15:00', '18:00', 'Dhaka , Bangladesh', 'Thomas R. Toe', '/uploads/events/sponsor/1713951021.png', 'https://educal.weblearnbd.net/', 'support@educal.com', '123231', '#', '#', '#', '10000', '7800', 'Fleece Marigold', '/uploads/events/speaker/1713951064.jpg', 'Host &amp; Speaker', NULL, '2023-10-08 06:01:55', '2024-04-24 09:31:04'),
(12, 'Business creativity workshops', '<p>He legged it up the kyver have it mush super me old mucker cheeky naff that are you taking the piss, blow off down the pub bite your arm off the wireless boot cor blimey guvnor happy days bender what a load of rubbish, say pardon me horse play spiffing Why car boot gosh bubble and squeak. Cheers Richard bugger show off show off pick your nose and blow off get stuffed mate chancer in my flat loo, bevvy amongst hunky-dory bender bubble and squeak me old mucker vagabond, barmy spend a penny chimney pot young delinquent bum bag the bee\'s knees chap, gosh nice one knees up the wireless Charles such a fibber. Mush barmy bleeding Jeffrey pardon me barney grub loo cup of tea bubble and squeak bugger all mate say, I bloke matie boy tickety-boo give us a bell up the duff bugger lurgy wind up I don\'t want no agro.  This event will allow participants to: Business\'s managers, leaders Downloadable lectures, code and design assets for all projects Anyone who is finding a chance to get the promotion      Big data,   Data analysis,  Data modeling</p>', '/uploads/events/1713951031.jpg', NULL, '2023-10-18', '2024-03-01', '16:02', '18:02', 'Dhaka , Bangladesh', 'Thomas R. Toe', '/uploads/events/sponsor/1713951031.png', 'https://educal.weblearnbd.net/', 'support@educal.com', '123231', '#', '#', '#', '200000', '18000', 'Fleece Marigold', '/uploads/events/speaker/1713951056.jpg', 'Host &amp; Speaker', NULL, '2023-10-08 06:03:36', '2024-04-24 09:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insructor_applies`
--

CREATE TABLE `insructor_applies` (
  `id` bigint UNSIGNED NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insructor_applies`
--

INSERT INTO `insructor_applies` (`id`, `button_text`, `bg_image`, `created_at`, `updated_at`) VALUES
(1, 'Start teaching', '/uploads/instructor/1713950355.png', '2024-04-24 09:19:15', '2024-04-24 09:19:15'),
(2, 'Apply As Instractor', '/uploads/instructor/1713950367.png', '2024-04-24 09:19:27', '2024-04-24 09:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `insructor_banners`
--

CREATE TABLE `insructor_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insructor_banners`
--

INSERT INTO `insructor_banners` (`id`, `title`, `description`, `button_text`, `button_link`, `icon`, `bg_color`, `created_at`, `updated_at`) VALUES
(1, '4,000  Online courses', 'Arse over tit morish wind up gormless butty.!', 'button', '/course', '/uploads/system/instructor/1713950567.svg', '#0cae74', '2024-04-24 09:22:47', '2024-04-24 09:22:47'),
(2, 'Job placement Support', 'Arse over tit morish wind up gormless butty.!', 'Buy Now', '/course', '/uploads/system/instructor/1713950600.svg', '#8007e6', '2024-04-24 09:23:20', '2024-04-24 09:23:20'),
(3, 'Lifetime Slack chat support', 'Arse over tit morish wind up gormless butty.!', 'Buy Know', '/course', '/uploads/system/instructor/1713950640.png', '#dd246e', '2024-04-24 09:24:00', '2024-04-24 09:24:00'),
(4, 'Research and Innovation', 'Arse over tit morish wind up gormless butty.!', 'Buy now', '/course', '/uploads/system/instructor/1713950675.png', '#2d69f0', '2024-04-24 09:24:35', '2024-04-24 09:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `sereal` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `slug`, `description`, `duration`, `type`, `video`, `video_type`, `video_id`, `video_thumbnail`, `video_url`, `audio`, `audio_type`, `ppt`, `ppt_type`, `pdf`, `pdf_type`, `attachment`, `visibility`, `topic_id`, `course_id`, `sereal`, `created_at`, `updated_at`) VALUES
(1, 'Lesson 1', 'lesson-1', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-09-25 22:40:14', '2023-09-25 22:40:14'),
(2, 'Greetings and introduction', 'greetings-and-introduction', 'Lesson 1', '176460', 'video', '/uploads/courses/lessons/1696757679.mp4', NULL, NULL, '/uploads/courses/lessons/1696757679.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 3, 6, NULL, '2023-10-08 09:34:39', '2023-10-08 09:34:39'),
(3, 'Lesson 2', 'lesson-2', NULL, '262860', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 3, 6, NULL, '2023-10-08 09:35:22', '2023-10-08 09:35:22'),
(4, 'Fundamental Lessons', 'fundamental-lessons', NULL, '262800', 'audio', NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1696757770.mp3', NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 4, 6, NULL, '2023-10-08 09:36:10', '2023-10-08 09:36:10'),
(7, 'Lesson Demo Porpose', 'lesson-demo-porpose', 'Lesson system', '176460', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/TYYf8zYjP5k?si=h9k1nwl6FqaevlQa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 6, 8, NULL, '2023-10-08 09:59:46', '2023-10-08 09:59:46'),
(9, 'Lesson 1', 'lesson-1-1710754352', NULL, '172800', 'pdf', NULL, NULL, NULL, '/uploads/courses/lessons/1710754352.png', NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754352.pdf', NULL, NULL, 'lock', 8, 12, NULL, '2024-03-18 09:32:32', '2024-03-18 09:32:32'),
(12, 'Lesson 2', 'lesson-2-1710754391', NULL, '259200', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754391.pdf', NULL, NULL, 'lock', 8, 12, NULL, '2024-03-18 09:33:11', '2024-03-18 09:33:11'),
(13, 'Lesson 3', 'lesson-3', NULL, '86400', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 9, 12, NULL, '2024-03-18 09:33:58', '2024-03-18 09:33:58'),
(14, 'Lesson 4', 'lesson-4', NULL, '86400', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 9, 12, NULL, '2024-03-18 09:34:15', '2024-03-18 09:34:15'),
(15, 'Lesson 1', 'lesson-1-1710754491', NULL, '90000', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 10, 10, NULL, '2024-03-18 09:34:51', '2024-03-18 09:34:51'),
(16, 'Lesson 2', 'lesson-2-1710754511', NULL, '90000', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unlock', 10, 10, NULL, '2024-03-18 09:35:11', '2024-03-18 09:35:11'),
(17, 'Lesson 3', 'lesson-3-1710754540', NULL, '86400', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754540.pdf', NULL, NULL, 'lock', 11, 10, NULL, '2024-03-18 09:35:40', '2024-03-18 09:35:40'),
(18, 'Lesson demo 2', 'lesson-demo-2', NULL, NULL, 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 6, 8, NULL, '2024-03-18 09:36:02', '2024-03-18 09:36:02'),
(19, 'Lesson 3', 'lesson-3-1710754587', NULL, '86400', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754587.pdf', NULL, NULL, 'lock', 12, 8, NULL, '2024-03-18 09:36:27', '2024-03-18 09:36:27'),
(20, 'Course Managment', 'course-managment', NULL, '86400', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/u8TB7kA4K0E?si=gPBwIyRJH-IluqXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 2, 2, NULL, '2024-03-18 09:37:27', '2024-03-18 09:37:27'),
(21, 'Course Section', 'course-section', NULL, '86400', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754676.pdf', NULL, NULL, 'lock', 2, 2, NULL, '2024-03-18 09:37:56', '2024-03-18 09:37:56'),
(22, 'Course Section', 'course-section-1710754677', NULL, '86400', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754677.pdf', NULL, NULL, 'lock', 2, 2, NULL, '2024-03-18 09:37:57', '2024-03-18 09:37:57'),
(23, 'Mangments', 'mangments', NULL, NULL, 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754712.pdf', NULL, NULL, 'lock', 13, 2, NULL, '2024-03-18 09:38:32', '2024-03-18 09:38:32'),
(24, 'Audio Session', 'audio-session', NULL, NULL, 'audio', NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754738.mp3', NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 13, 2, NULL, '2024-03-18 09:38:58', '2024-03-18 09:38:58'),
(25, 'Audio Session', 'audio-session-1710754739', NULL, NULL, 'audio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 13, NULL, NULL, '2024-03-18 09:38:59', '2024-03-18 09:38:59'),
(26, 'Introduction Course', 'introduction-course', NULL, '86400', 'audio', NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754806.mp3', NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 1, 1, NULL, '2024-03-18 09:40:06', '2024-03-18 09:40:06'),
(27, 'Introduction Course', 'introduction-course-1710754807', NULL, NULL, 'audio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 09:40:07', '2024-03-18 09:40:07'),
(28, 'Course part 2', 'course-part-2', NULL, '86400', 'pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/uploads/courses/lessons/1710754833.pdf', NULL, NULL, 'lock', 1, 1, NULL, '2024-03-18 09:40:33', '2024-03-18 09:40:33'),
(29, 'Lesson 1', 'lesson-1-1711346534', 'Lesson Video', '172800', 'url', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 15, 13, NULL, '2024-03-25 06:02:14', '2024-03-25 06:02:14'),
(31, 'Lesson 1', 'lesson-1-1711512031', '', '172800', 'url', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=vdNrPdeEuYQ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 17, 15, NULL, '2024-03-27 04:00:31', '2024-03-27 04:00:31'),
(32, 'Lesson 1', 'lesson-1-1711512471', '', '0', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/5RcE1i_HjJw?si=cTVYbAOqNTfh37IP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 19, 16, NULL, '2024-03-27 04:07:51', '2024-03-27 04:07:51'),
(33, 'Lesson 1', 'lesson-1-1711514040', '', '0', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/5RcE1i_HjJw?si=cTVYbAOqNTfh37IP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 21, 17, NULL, '2024-03-27 04:34:00', '2024-03-27 04:34:00'),
(34, 'Lesson 2', 'lesson-2-1711514093', '', '', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/QZZEzyQJ7kQ?si=q6jyWG72-mAS7w2f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 22, 17, NULL, '2024-03-27 04:34:53', '2024-03-27 04:34:53'),
(35, 'Lesson 1', 'lesson-1-1711514619', '', '86400', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/8tdnAAaU0GY?si=CmJChNRjFk5TG2pi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 23, 18, NULL, '2024-03-27 04:43:39', '2024-03-27 04:43:39'),
(36, 'Lesson 3', 'lesson-3-1711514663', '', '172800', 'url', NULL, NULL, NULL, NULL, 'https://youtu.be/8tdnAAaU0GY?si=CmJChNRjFk5TG2pi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 23, 18, NULL, '2024-03-27 04:43:40', '2024-03-27 04:44:23'),
(37, 'Lesson 1', 'lesson-1-1714023295', '', '176400', 'url', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=zEETxKl3Fks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lock', 25, 22, NULL, '2024-04-25 05:34:55', '2024-04-25 05:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `location`, `content`, `slug`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Header Menu', 'header', '[{\"target\":\"_self\",\"name\":\"Home\",\"id\":\"/\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Courses\",\"id\":\"/course\",\"type\":\"custom_link\",\"children\":[{\"target\":\"#menu-modal\",\"name\":\"Courses\",\"id\":\"/course\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Course Details\",\"url\":\"/course-details/fundamentals-of-music-theory-learn-new\",\"id\":\"/course-details/fundamentals-of-music-theory-learn-new\",\"type\":\"custom_link\"}]},{\"target\":\"_self\",\"name\":\"Blog\",\"id\":\"/blog\",\"type\":\"custom_link\",\"children\":[{\"target\":\"_self\",\"name\":\"Blog\",\"id\":\"/blog\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Blog Details\",\"url\":\"/blog-details/new-chicago-school-budget-relies-on-state-pension\",\"id\":\"/blog-details/new-chicago-school-budget-relies-on-state-pension\",\"type\":\"custom_link\"}]},{\"target\":\"_self\",\"name\":\"Pages\",\"id\":\"#\",\"type\":\"custom_link\",\"children\":[{\"target\":\"_self\",\"name\":\"About\",\"id\":\"/about\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Cart\",\"id\":\"/cart\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Checkout\",\"id\":\"/checkout\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Sign In\",\"id\":\"/login\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Sign Up\",\"id\":\"/register\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Error\",\"id\":\"/404\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Instructor\",\"id\":\"/instructor\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Apply As Instractor\",\"id\":\"/dashboard/instructor/apply\",\"type\":\"custom_link\"}]},{\"target\":\"_self\",\"name\":\"Contact\",\"id\":\"/contact\",\"type\":\"custom_link\"}]', 'header-menu', NULL, 'active', '2023-09-24 20:22:55', '2024-04-25 05:06:09'),
(2, 'Footer 1', 'footer_1', '[{\"target\":\"_self\",\"name\":\"About Us\",\"id\":\"/about\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Contact\",\"id\":\"/contact\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Instructor\",\"url\":\"/instructor\",\"id\":\"/instructor\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Terms conditions\",\"url\":\"/page/terms-and-conditions\",\"id\":\"/page/terms-and-conditions\",\"type\":\"custom_link\"}]', 'footer-1', NULL, 'active', '2023-09-24 20:24:23', '2024-04-25 00:46:59'),
(3, 'Footer 2 menu', 'footer_2', '[{\"target\":\"_self\",\"name\":\"Home\",\"id\":\"/\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Login\",\"id\":\"/login\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"Register\",\"id\":\"/register\",\"type\":\"custom_link\"},{\"target\":\"_self\",\"name\":\"courses\",\"url\":\"/course\",\"id\":\"/course\",\"type\":\"custom_link\"}]', 'footer-2-menu', NULL, 'active', '2023-09-24 20:27:41', '2024-04-25 00:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_22_053534_create_blog_categories_table', 1),
(6, '2023_07_22_103150_create_blog_tags_table', 1),
(7, '2023_07_23_034550_create_blog_sub_categories_table', 1),
(8, '2023_07_23_054946_create_blogs_table', 1),
(9, '2023_07_25_030151_create_permission_tables', 1),
(10, '2023_08_02_065629_create_course_categories_table', 1),
(11, '2023_08_02_065644_create_course_sub_categories_table', 1),
(12, '2023_08_02_065655_create_course_tags_table', 1),
(13, '2023_08_12_043329_create_sidebar_infos_table', 1),
(14, '2023_08_14_031759_create_course_languages_table', 1),
(15, '2023_08_17_042114_create_courses_table', 1),
(16, '2023_08_17_042345_create_topics_table', 1),
(17, '2023_08_17_042650_create_curriculam_table', 1),
(18, '2023_08_17_042750_create_lessons_table', 1),
(19, '2023_08_17_042850_create_quizzes_table', 1),
(20, '2023_08_17_042950_create_quize_questions_table', 1),
(21, '2023_08_17_063405_create_resources_table', 1),
(22, '2023_08_17_070034_create_assignments_table', 1),
(23, '2023_08_21_053212_create_quize_question_options_table', 1),
(24, '2023_08_21_053213_create_quize_answers_table', 1),
(25, '2023_08_26_053152_create_carts_table', 1),
(26, '2023_08_26_102529_create_coupons_table', 1),
(27, '2023_08_28_081223_create_orders_table', 1),
(28, '2023_08_28_100949_create_order_items_table', 1),
(29, '2023_09_02_094620_create_system_settings_table', 1),
(30, '2023_09_07_083344_create_notifications_table', 1),
(31, '2023_09_11_104146_create_payouts_table', 1),
(32, '2023_09_12_043836_create_withdraws_table', 1),
(33, '2023_09_12_110535_create_events_table', 1),
(34, '2023_09_13_031007_create_ticket_orders_table', 1),
(35, '2023_09_13_041636_create_newsletters_table', 1),
(36, '2023_09_13_081534_create_jobs_table', 1),
(37, '2023_09_13_100840_create_menus_table', 1),
(38, '2023_09_13_100845_create_menuitems_table', 1),
(39, '2023_09_14_032444_create_pages_table', 1),
(40, '2023_09_15_084716_create_comments_table', 1),
(41, '2023_09_15_134714_create_reviews_table', 1),
(42, '2023_09_17_091652_create_course_category_users_table', 1),
(43, '2023_09_18_030245_create_commissions_table', 1),
(44, '2023_09_18_054129_create_commission_percents_table', 1),
(45, '2023_09_18_114939_create_currencies_table', 1),
(46, '2023_09_23_141346_create_user_orders_table', 1),
(47, '2023_09_26_050059_create_user_courses_table', 1),
(48, '2023_09_26_051403_create_user_orderitems_table', 1),
(49, '2023_11_12_100545_create_testimonials_table', 1),
(50, '2023_12_21_035018_create_insructor_applies_table', 1),
(51, '2023_12_21_044927_create_insructor_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'theme@gmail.com', '2024-04-25 05:24:23', '2024-04-25 05:24:23'),
(2, 'envato@gmail.com', '2024-04-25 05:24:32', '2024-04-25 05:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(136) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','canceled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `payment_status` enum('pending','paid') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `payment_method` enum('cash_on_delivery','paypal','stripe','razorpay','mollie','manual_payment','paytm','amarpay') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `status`, `payment_status`, `payment_method`, `payment_id`, `total`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '6629db78bb829', 3, 'pending', 'pending', 'manual_payment', NULL, '0', NULL, '2024-04-25 04:26:32', '2024-04-25 04:26:32'),
(2, '6629db9f3d845', 3, 'pending', 'pending', 'manual_payment', NULL, '0', NULL, '2024-04-25 04:27:11', '2024-04-25 04:27:11'),
(3, '6629dbb5ecd51', 3, 'pending', 'pending', 'manual_payment', NULL, '0', NULL, '2024-04-25 04:27:33', '2024-04-25 04:27:33'),
(4, '6629e9e1660ee', 2, 'approved', 'pending', 'stripe', 'cs_test_a1HlVtE5z2aBt1c70Ns8Xl5VLiZI6aJvkfj18UVlQQql3hADCLO3QgNnFF', '300', NULL, '2024-04-25 05:28:01', '2024-04-25 05:28:35'),
(5, '6629f0c56f0fe', 3, 'pending', 'pending', 'manual_payment', NULL, '0', NULL, '2024-04-25 05:57:25', '2024-04-25 05:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('enrolled','active','pending','complete','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `course_id`, `order_id`, `user_id`, `price`, `quantity`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 4, 2, '300', '1', '300', 'enrolled', '2024-04-25 05:28:01', '2024-04-25 05:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'terms and conditions', 'terms-and-conditions', '<h4>Introduction</h4>\n<p>By using the Site, you hereby accept these terms and conditions and represent that you agree to comply with these terms and conditions. This User Agreement is deemed effective upon your use of the Site which signifies your acceptance of these terms. If you do not agree to be bound by this User Agreement please do not access, register with or use this Site.</p>\n<h4>Product download</h4>\n<p>Before you register and access or utilize ThemePure’s downloadable product(s) for your personal needs, it’s essential to ensure that you’ve thoroughly reviewed, comprehended, and consented to all the terms. When you use ThemePure or any other products, we consider it an acknowledgment of your acceptance of the following terms of use.</p>\n<h4>PRIVACY</h4>\n<p>Please review our Privacy Agreement, which also governs your visit to the Site. The personal information / data provided to us by you or your use of the Site will be treated as strictly confidential, in accordance with the Privacy Agreement and applicable laws and regulations. If you object to your information being transferred or used in the manner specified in the Privacy Agreement, please do not use the Site.</p>\n<h4>Modifications</h4>\n<p>You have the freedom to customize any of our products to suit your specific needs. Nevertheless, we advise you to review our documentation page and reach out to us via email to explore potential, simpler solutions before making modifications.</p>', NULL, 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 'active', '2024-04-24 04:28:58', '2024-04-24 06:52:40'),
(2, 'Privacy Policy', 'privacy-policy', '<h4>Introduction</h4>\n<p>At Educal, we value your privacy and are committed to protecting your personal information. This Privacy Policy is designed to help you understand how we collect, use, disclose, and safeguard your data. By using our website or services, you consent to the practices described in this policy.</p>\n<h4>Information We Collect</h4>\n<p>We may collect various types of information from you, including:</p>\n<ul>\n<li>1. Personal Information: Name, email address, contact details.</li>\n<li>2. Billing Information: Payment card details, billing address.</li>\n<li>3. Usage Data: Information about how you use our website.</li>\n<li>4. Cookies and Tracking Data: Data collected through cookies, web beacons, and similar technologies.</li>\n</ul>\n<h4>What Will We Do With Your Information</h4>\n<p>You agree to receive emails from us by submitting your your address on this page. You can unsubscribe from any of these email lists at any time by clicking the opt-out link or other unsubscribe option contained in the relevant email. We only contact those who have given us permission to do so, either directly or through a third party. We don\'t send unsolicited commercial emails because, like you, we despise spam. You agree to enable us to use your email address for customer audience targeting on sites like Facebook, where we display bespoke advertising to users who have opted-in to receive messages from us, by submitting your email address. Email addresses supplied solely through the order processing page will be used for the exclusive purpose of sending you order-related information and updates. If you have provided us with the same email address via another manner, we may use it for any of the purposes listed in this Policy. .</p>\n<h4>Changes to this Privacy Policy</h4>\n<p>We reserve the right to update or change this Privacy Policy at any time. When we do, we will revise the \"Effective Date\" at the beginning of this policy. We encourage you to periodically review this page for the latest information on our privacy practices.</p>', NULL, 'Privacy Policy Educal', 'Privacy Policy', 'Privacy Policy', 'active', '2024-04-24 04:28:58', '2024-04-24 06:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_passcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected','paid','processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `amount`, `payment_method`, `bank_name`, `bank_branch`, `account_number`, `routing_number`, `swift_code`, `bank_passcode`, `account_holder_name`, `transaction_id`, `transaction_details`, `transaction_proof`, `fees`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'bank', 'Env', 'comil', '21433143413431', '343143', '344134', '3143343', 'Jhon Relod', NULL, NULL, NULL, NULL, 'pending', 3, '2024-04-25 05:26:07', '2024-04-25 05:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(2, 'blog-category-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(3, 'blog-category-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(4, 'blog-category-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(5, 'blog-category-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(6, 'blog-sub-category-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(7, 'blog-sub-category-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(8, 'blog-sub-category-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(9, 'blog-sub-category-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(10, 'blog-tag-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(11, 'blog-tag-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(12, 'blog-tag-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(13, 'blog-tag-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(14, 'blog-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(15, 'blog-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(16, 'blog-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(17, 'blog-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(18, 'blog-comment-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(19, 'blog-comment-approve', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(20, 'blog-comment-reject', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(21, 'blog-comment-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(22, 'course-category-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(23, 'course-category-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(24, 'course-category-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(25, 'course-category-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(26, 'course-sub-category-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(27, 'course-sub-category-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(28, 'course-sub-category-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(29, 'course-sub-category-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(30, 'course-tag-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(31, 'course-tag-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(32, 'course-tag-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(33, 'course-tag-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(34, 'course-language-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(35, 'course-language-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(36, 'course-language-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(37, 'course-language-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(38, 'course-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(39, 'course-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(40, 'course-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(41, 'course-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(42, 'course-approve', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(43, 'course-reject', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(44, 'course-pending', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(45, 'course-status', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(46, 'course-resourse-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(47, 'course-resourse-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(48, 'course-resourse-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(49, 'course-resourse-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(50, 'course-quiz-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(51, 'course-quiz-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(52, 'course-quiz-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(53, 'course-quiz-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(54, 'course-assignment-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(55, 'course-assignment-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(56, 'course-assignment-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(57, 'course-assignment-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(58, 'course-review-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(59, 'course-review-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(60, 'course-review-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(61, 'course-review-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(62, 'course-coupon-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(63, 'course-coupon-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(64, 'course-coupon-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(65, 'course-coupon-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(66, 'order-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(67, 'order-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(68, 'order-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(69, 'order-status-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(70, 'order-status-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(71, 'order-status-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(72, 'user-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(73, 'user-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(74, 'user-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(75, 'user-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(76, 'role-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(77, 'role-create', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(78, 'role-edit', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(79, 'role-delete', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(80, 'instructor-list', 'web', '2024-04-24 04:28:57', '2024-04-24 04:28:57'),
(81, 'instructor-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(82, 'instructor-edit', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(83, 'instructor-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(84, 'pending-instructor-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(85, 'pending-instructor-approve', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(86, 'pending-instructor-reject', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(87, 'pending-instructor-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(88, 'withdraw-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(89, 'withdraw-approve', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(90, 'withdraw-reject', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(91, 'withdraw-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(92, 'page-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(93, 'page-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(94, 'page-edit', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(95, 'page-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(96, 'page-show', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(97, 'home-page', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(98, 'hero-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(99, 'category-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(100, 'banner-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(101, 'find-course-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(102, 'event-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(103, 'price-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(104, 'about-page', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(105, 'about-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(106, 'brand-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(107, 'testimonial-section', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(108, 'menu-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(109, 'menu-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(110, 'menu-edit', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(111, 'menu-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(112, 'subscriber-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(113, 'subscriber-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(114, 'bulk-email-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(115, 'bulk-email-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(116, 'event-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(117, 'event-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(118, 'event-edit', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(119, 'event-delete', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(120, 'profile', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(121, 'update-admin-info', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(122, 'update-admin-password', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(123, 'general-setting', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(124, 'smtp-setting', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(125, 'sidebar-setting', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(126, 'payout-setting', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(127, 'withdrow-create', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(128, 'clear-cache', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(129, 'language-change', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(130, 'currency-change', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(131, 'notification-show', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(132, 'commission-setting', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(133, 'payment-method-list', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quize_answers`
--

CREATE TABLE `quize_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint UNSIGNED DEFAULT NULL,
  `option_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quize_questions`
--

CREATE TABLE `quize_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_negative_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quize_questions`
--

INSERT INTO `quize_questions` (`id`, `question`, `options`, `answer`, `question_type`, `question_marks`, `question_negative_marks`, `question_status`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 'What are two rights of everyone living in the United States ?', '[\"Freedom to petition the government and freedom to disobey traffic laws\",\"Freedom of worship and freedom to make treaties with other countries\",\"Freedom of speech and freedom to run for president\",\"Freedom of speech and freedom of worship.\"]', '4', NULL, NULL, NULL, NULL, 1, '2024-03-27 06:35:46', '2024-03-27 06:35:46'),
(2, 'What is freedom of religion? Choose one', '[\"You can\\u2019t choose the time you practice your religion.\",\"You must choose a religion\",\"You can practice any religion, or not practice a religion.\",\"No one can practice a religion.\"]', '3', NULL, NULL, NULL, NULL, 1, '2024-03-27 06:36:30', '2024-03-27 06:36:30'),
(3, 'Who is in charge of the executive branch?', '[\"The Speaker of the House.\",\"The Prime Minister.\",\"The President.\",\"The Chief Justice.\"]', '3', NULL, NULL, NULL, NULL, 1, '2024-03-27 06:37:09', '2024-03-27 06:37:09'),
(4, 'Name one branch or part of the government.', '[\"State government.\",\"Legislative.\",\"Parliament\",\"United Nations.\"]', '2', NULL, NULL, NULL, NULL, 2, '2024-03-27 06:38:10', '2024-03-27 06:38:10'),
(5, 'What do we call the first ten amendments to the Constitution?', '[\"The Articles of Confederation.\",\"The inalienable rights.\",\"The Declaration of Independence\",\"The Bill of Rights.\"]', '4', NULL, NULL, NULL, NULL, 2, '2024-03-27 06:38:56', '2024-03-27 06:38:56'),
(6, 'Under our Constitution, some powers belong to the states. What is one power of the states?', '[\"Make treaties.\",\"Provide schooling and education.\",\"Create an army.\",\"Coin or print money.\"]', '2', NULL, NULL, NULL, NULL, 3, '2024-03-27 06:40:56', '2024-03-27 06:40:56'),
(7, 'Who is the Commander in Chief of the military?', '[\"The President.\",\"The Vice-President\",\"The Secretary of Defense.\",\"The Attorney General.\"]', '1', NULL, NULL, NULL, NULL, 4, '2024-03-27 06:41:51', '2024-03-27 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `quize_question_options`
--

CREATE TABLE `quize_question_options` (
  `id` bigint UNSIGNED NOT NULL,
  `option` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quiz_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_per_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_passing_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_show_marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_show_passed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_show_rank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_show_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_show_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sereal` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `slug`, `description`, `quiz_type`, `quiz_time`, `quiz_duration`, `quiz_status`, `marks_per_question`, `quiz_passing_marks`, `quiz_certificate`, `quiz_show_marks`, `quiz_show_passed`, `quiz_show_rank`, `quiz_show_percentage`, `quiz_show_time`, `sereal`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'living in the United States?', 'living-in-the-united-states', NULL, 'multiple', NULL, '86400', 'active', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, '2024-03-27 05:02:14', '2024-03-27 05:02:14'),
(2, 'government', 'government', NULL, 'multiple', NULL, '90000', 'active', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, '2024-03-27 06:37:32', '2024-03-27 06:37:32'),
(3, 'powers belong to the states', 'powers-belong-to-the-states', NULL, 'multiple', NULL, '86400', 'active', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, '2024-03-27 06:39:28', '2024-03-27 06:39:28'),
(4, 'military', 'military', NULL, 'multiple', NULL, '86400', 'active', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, '2024-03-27 06:41:19', '2024-03-27 06:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `file`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Freedom of speech and freedom of worship', '/uploads/courses/resource/1711515840.pdf', 18, NULL, '2024-03-27 05:04:00', '2024-03-27 05:04:00'),
(5, 'freedom of religion', '/uploads/courses/resource/1711515965.pdf', 17, NULL, '2024-03-27 05:06:05', '2024-03-27 05:06:05'),
(7, 'Name one branch or part of the government', '/uploads/courses/resource/1711516019.pdf', 16, NULL, '2024-03-27 05:06:59', '2024-03-27 05:06:59'),
(8, 'first ten amendments to the Constitution', '/uploads/courses/resource/1711516071.pdf', 15, NULL, '2024-03-27 05:07:51', '2024-03-27 05:07:51'),
(9, 'Laravel educal SRS', '/uploads/courses/resource/1711516121.pdf', 13, NULL, '2024-03-27 05:08:41', '2024-03-27 05:08:41'),
(10, 'Finance SRS Hear', '/uploads/courses/resource/1711516141.pdf', 12, NULL, '2024-03-27 05:09:01', '2024-03-27 05:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `rating` int DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `course_id`, `title`, `body`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 10, 'Awesome Course', 'Awesome Course', 4, 'approved', '2023-10-09 04:51:06', '2024-03-25 05:30:03'),
(3, 2, 18, 'Course Quality', 'This Is Best course', 4, 'approved', '2024-03-27 04:47:58', '2024-03-27 04:48:29'),
(4, 2, 1, 'Teaching Quality', 'He Is The Best Instructor', 5, 'approved', '2024-03-27 04:50:13', '2024-03-27 04:50:22'),
(5, 2, 2, 'Intelligent', 'This course instructor so much intelligent', 5, 'approved', '2024-03-27 04:55:07', '2024-03-27 04:58:44'),
(6, 2, 15, 'Learning Path', 'I learn Many thins from this course', 4, 'approved', '2024-03-27 04:56:06', '2024-03-27 04:58:42'),
(7, 2, 16, 'This Course is masterpiece', 'This course change my mind and future', 3, 'approved', '2024-03-27 04:57:09', '2024-03-27 04:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58'),
(2, 'instructor', 'web', '2024-04-24 04:28:58', '2024-04-24 04:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(1, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(88, 2),
(120, 2),
(126, 2),
(127, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_infos`
--

CREATE TABLE `sidebar_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `search` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `category` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `tag` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `recent_post` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `popular_post` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `recent_comment` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `archives` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `banner` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `category_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Category',
  `category_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tags',
  `tag_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recent_post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Recent posts',
  `recent_post_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular_post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Populer posts',
  `popular_post_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recent_comment_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Recent Comment',
  `recent_comment_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebar_infos`
--

INSERT INTO `sidebar_infos` (`id`, `search`, `category`, `tag`, `recent_post`, `popular_post`, `recent_comment`, `archives`, `banner`, `category_title`, `category_count`, `tag_title`, `tag_count`, `recent_post_title`, `recent_post_count`, `popular_post_title`, `popular_post_count`, `recent_comment_title`, `recent_comment_count`, `banner_title`, `banner_image`, `banner_link`, `created_at`, `updated_at`) VALUES
(1, 'on', 'on', 'on', 'on', 'off', 'off', 'off', 'on', 'Category', '5', 'Tag', '8', 'Recent Post', '5', 'Popular Post', '5', 'Recent Comment', '5', 'Banner', '/uploads/banner/1713940260.jpg', NULL, '2024-04-24 04:28:58', '2024-04-24 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'hero_sliders', '{\"hero_title\":\"Online Tutorial From Top Instructor.\",\"hero_subtitle\":\"Access 2700+\",\"hero_discription\":\"Meet university, and cultural institutions, who\'ll share their experience.\",\"hero_button_text\":\"view all course\",\"hero_button_link\":\"\\/course\",\"hero_shapes\":\"on\",\"hero_info_title\":\"Tomorrow is our\",\"hero_info_discription\":\"\\u201cWhen I Grow Up\\u201d Spirit Day!\",\"image1\":\"\\/uploads\\/hero\\/1713934126.jpg\",\"image2\":\"\\/uploads\\/hero\\/17139341262.jpg\"}', '2023-09-01 10:00:00', '2024-04-24 04:48:46'),
(2, 'home_categories', '{\"category_title\":\"Explore Popular Courses\",\"categories\":[\"10\",\"4\",\"3\",\"2\",\"7\",\"8\",\"5\",\"6\",\"9\"]}', '2023-09-01 10:00:00', '2024-04-24 06:05:46'),
(3, 'banner', '{\"1\":{\"sub_title\":\"Free\",\"title\":\"Germany Foundation\",\"button_title\":\"View Courses\",\"button_url\":\"\\/courses\",\"side_image\":\"\\/uploads\\/banner\\/1713936225.png\",\"bg_image\":\"\\/uploads\\/banner\\/17139362252.jpg\",\"id\":550647},\"2\":{\"sub_title\":\"New\",\"title\":\"Online Courses\",\"button_title\":\"Find Out More\",\"button_url\":\"\\/course\",\"side_image\":\"\\/uploads\\/banner\\/1713936185.png\",\"bg_image\":\"\\/uploads\\/banner\\/17139361852.jpg\",\"id\":841086}}', '2023-09-01 10:00:00', '2024-04-24 05:23:45'),
(4, 'home_find_course', '{\"title\":\"Find the Right Online Course for you\",\"categories\":[\"10\",\"3\",\"8\"],\"courses\":[]}', '2023-09-01 10:00:00', '2024-04-24 06:06:42'),
(5, 'home_event', '{\"title\":\"Current Events\",\"description\":\"We found 13 events available for you.\"}', '2023-09-01 10:00:00', '2024-04-24 05:26:30'),
(6, 'home_price_plan', '{\n                    \"title\": \"price\",\n                    \"description\": \"Show\"\n                }', '2023-09-01 10:00:00', '2023-09-01 10:00:00'),
(7, 'about_about', '{\"title\":\"Achieve Your Goals With Educal\",\"description\":\"Lost the plot bobby such a fibber bleeding bits and bobs don\'t get shirty with me bugger all mate chinwag super pukka william barney, horse play buggered.\",\"button_title\":\"apply now\",\"button_url\":\"\\/contact\",\"skillTitle\":[\"Upskill your organization.\",\"Access more then 100K online courses\",\"Learn the latest skills\"],\"image1\":\"\\/uploads\\/about\\/1713941760.jpg\"}', '2023-09-01 10:00:00', '2024-04-24 06:56:00'),
(8, 'brand', '[{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942006.png\",\"id\":164974},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942033.png\",\"id\":924495},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942039.png\",\"id\":448404},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942047.png\",\"id\":735293},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942055.png\",\"id\":927587},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942056.png\",\"id\":365478},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942076.png\",\"id\":362307},{\"url\":\"https:\\/\\/educal.hixstudio.net\\/\",\"logo\":\"\\/uploads\\/brand\\/1713942117.png\",\"id\":365227}]', '2023-09-01 10:00:00', '2024-04-24 07:01:57'),
(9, 'about_banner', '[{\"sub_title\":\"New\",\"title\":\"Online Courses\",\"button_title\":\"Find Out More\",\"button_url\":\"\\/course\",\"side_image\":\"\\/uploads\\/banner\\/1713942273.png\",\"bg_image\":\"\\/uploads\\/banner\\/17139422732.jpg\",\"id\":650872},{\"sub_title\":\"Free\",\"title\":\"Germany Foundation\",\"button_title\":\"View Courses\",\"button_url\":\"\\/courses\",\"side_image\":\"\\/uploads\\/banner\\/1713942325.png\",\"bg_image\":\"\\/uploads\\/banner\\/17139423252.jpg\",\"id\":242965}]', '2023-09-01 10:00:00', '2024-04-24 07:05:25'),
(10, 'testimonial', '{\"title\":\"Student  Community Feedback\",\"videoTitle\":\"Course Outcome\",\"videoUrl\":\"https:\\/\\/www.youtube.com\\/watch?v=Rr0uFzAOQus\",\"videoDesc\":\"Faff about A bit of how\'s your father getmate cack codswallop crikey argy-bargy cobblers lost his bottle.\"}', '2023-09-01 10:00:00', '2024-04-24 07:06:08'),
(11, 'header', '{\"header_shape\":\"on\",\"header_categories\":[\"1\",\"2\",\"3\",\"5\",\"7\",\"9\"],\"header_logo\":\"\\/uploads\\/header\\/1713939957_logo.png\",\"header_logo_2\":\"\\/uploads\\/header\\/1713939957_logo_2.png\",\"header_favicon\":\"\\/uploads\\/header\\/1713939957_favicon.png\",\"header_title\":\"\",\"header_description\":\"\",\"header_cta_title\":\"\",\"header_cta_btn_text\":\"\",\"header_cta_btn_link\":\"\",\"header_main_desc\":\"\",\"header_copy_right\":\"\",\"header_facebook\":\"\",\"header_twitter\":\"\",\"header_pinterest\":\"\",\"header_office_address\":\"\",\"header_email_one\":\"\",\"header_email_two\":\"\",\"header_phone_one\":\"\",\"header_phone_two\":\"\"}', '2023-09-01 10:00:00', '2024-04-24 06:26:34'),
(12, 'footer', '{\"footer_shape\":\"off\",\"footer_categories\":[],\"footer_title\":\"\",\"footer_description\":\"\",\"footer_cta_title\":\"You can be your own Guiding star with our help\",\"footer_cta_btn_text\":\"Get Started\",\"footer_cta_btn_link\":\"\\/contact\",\"footer_main_desc\":\"Great lesson ideas and lesson plans for ESL teachers! Educators can customize lesson plans to best.\",\"footer_copy_right\":\"\\u00a9 2024 Educal, All Rights Reserved. Developed By Themepure\",\"footer_main_logo\":\"\\/uploads\\/footer\\/1713940078_main_logo.png\",\"footer_facebook\":\"\",\"footer_twitter\":\"\",\"footer_pinterest\":\"\",\"footer_office_address\":\"\",\"footer_email_one\":\"\",\"footer_email_two\":\"\",\"footer_phone_one\":\"\",\"footer_phone_two\":\"\"}', '2023-09-01 10:00:00', '2024-04-24 06:28:38'),
(13, 'social', '{\"social_shape\":\"off\",\"social_categories\":[],\"social_title\":\"\",\"social_description\":\"\",\"social_cta_title\":\"\",\"social_cta_btn_text\":\"\",\"social_cta_btn_link\":\"\",\"social_main_desc\":\"\",\"social_copy_right\":\"\",\"social_facebook\":\"facebook.com\",\"social_twitter\":\"twitter.com\",\"social_pinterest\":\"pinterest.com\"}', '2023-09-01 10:00:00', '2023-10-01 10:00:00'),
(14, 'meta', '{\"meta_shape\":\"off\",\"meta_categories\":[],\"meta_title\":\"meta title\",\"meta_description\":\"meta desc\",\"meta_cta_title\":\"\",\"meta_cta_btn_text\":\"\",\"meta_cta_btn_link\":\"\",\"meta_main_desc\":\"\",\"meta_copy_right\":\"\",\"meta_facebook\":\"\",\"meta_twitter\":\"\",\"meta_pinterest\":\"\"}', '2023-09-01 10:00:00', '2023-10-01 10:00:00'),
(15, 'contact', '{\"contact_shape\":\"off\",\"contact_categories\":[],\"contact_title\":\"\",\"contact_description\":\"\",\"contact_cta_title\":\"\",\"contact_cta_btn_text\":\"\",\"contact_cta_btn_link\":\"\",\"contact_main_desc\":\"\",\"contact_copy_right\":\"\",\"contact_facebook\":\"\",\"contact_twitter\":\"\",\"contact_pinterest\":\"\",\"contact_office_address\":\"Maypole Crescent 70-80 Upper St Norwich NR2 1LT\",\"contact_email_one\":\"support@educal.com\",\"contact_email_two\":\"info@educal.com\",\"contact_phone_one\":\"+(426) 742 26 44\",\"contact_phone_two\":\"+(224) 762 442 32\"}', '2023-09-01 10:00:00', '2023-10-01 10:00:00'),
(16, 'home_counter', '{\"title\":\"We are Proud\",\"description\":\"You don\'t have to struggle alone, you\'ve got our assistance and help.\",\"counter\":{\"counter_icon\":[\"\\/uploads\\/system\\/counter\\/17139398160.svg\",\"\\/uploads\\/system\\/counter\\/17139398161.svg\",\"\\/uploads\\/system\\/counter\\/17139398162.svg\",\"\\/uploads\\/system\\/counter\\/17139398163.svg\"],\"counter_amount\":[\"345421\",\"2485\",\"2480\",\"202\"],\"counter_desc\":[\"Students Enrolled\",\"Online Learners\",\"Online Learners\",\"Foreign Followers\"]},\"counter_icon\":[[\"wfgd\",\"asd\",\"sdfca\",\"fdaf\",\"icon\"],[\"wfgd\",\"asd\",\"sdfca\"]],\"counter_amount\":[[\"dfac\",\"asdfs\",\"rdfsac\",\"sdfgsdf\",\"1000\"],[\"dfac\",\"asdfs\",\"rdfsac\"]],\"counter_desc\":[[\"dfac\",\"asdfs\",\"rdfsac\",\"sdfgsdf\",\"desc\"],[\"dfac\",\"asdfs\",\"rdfsac\"]]}', '2023-09-01 10:00:00', '2024-04-24 06:23:36'),
(17, 'about_counter', '{\"title\":\"We are Proud\",\"description\":\"You don\'t have to struggle alone, you\'ve got our assistance and help.\",\"counter\":{\"counter_icon\":[\"\\/uploads\\/system\\/counter\\/17139426120.svg\",\"\\/uploads\\/system\\/counter\\/17139426121.svg\",\"\\/uploads\\/system\\/counter\\/17139426122.svg\",\"\\/uploads\\/system\\/counter\\/17139426123.svg\"],\"counter_amount\":[\"345421\",\"202\",\"24085\",\"202\"],\"counter_desc\":[\"Students Enrolled\",\"Foreign Followers\",\"Online Learners\",\"Total Courses\"]},\"counter_icon\":[[\"wfgd\",\"asd\",\"sdfca\",\"fdaf\",\"icon\"],[\"wfgd\",\"asd\",\"sdfca\"]],\"counter_amount\":[[\"dfac\",\"asdfs\",\"rdfsac\",\"sdfgsdf\",\"1000\"],[\"dfac\",\"asdfs\",\"rdfsac\"]],\"counter_desc\":[[\"dfac\",\"asdfs\",\"rdfsac\",\"sdfgsdf\",\"desc\"],[\"dfac\",\"asdfs\",\"rdfsac\"]]}', '2023-09-01 10:00:00', '2024-04-24 07:10:12'),
(18, 'about_why', '{\"sub_title\":\"Why Choses Me\",\"title\":\"Tools for Teachers and Learners\",\"description\":\"Oxford chimney pot Eaton faff about blower blatant brilliant, bubble and squeak he legged it Charles bonnet arse at public school bamboozled.\",\"why_button_1\":\"Join for Free\",\"why_button_url_1\":\"\\/about\",\"why_button_2\":\"Learn More\",\"why_button_url_2\":\"\\/about\",\"image1\":\"\\/uploads\\/about\\/1713942530.png\"}', '2023-09-01 10:00:00', '2024-04-24 07:08:50'),
(19, 'become_instructor', '{\"title\":\"What Is Skilline?\",\"description\":\"Sloshed faff about me old mucker blatant bubble and squeak hanky panky some dodgy chav bevvy arse chimney pot I, ruddy plastered buggered smashing blow off Im telling up the kyver he legged it bleeder jolly good,\"}', '2023-09-01 10:00:00', '2023-10-01 10:00:00'),
(20, 'instructor_service', '{\"title\":\"Why An Scholercity Out Of The Ordinary\",\"description\":\"You don\'t have to struggle alone, you\'ve got our assistance and help.\"}', '2023-09-01 10:00:00', '2024-04-24 09:20:17'),
(21, 'others', '{\"others_shape\":\"off\",\"others_categories\":[],\"others_title\":\"\",\"others_description\":\"\",\"others_cta_title\":\"\",\"others_cta_btn_text\":\"\",\"others_cta_btn_link\":\"\",\"others_main_desc\":\"\",\"others_copy_right\":\"\",\"others_facebook\":\"\",\"others_twitter\":\"\",\"others_pinterest\":\"\",\"others_office_address\":\"\",\"others_email_one\":\"\",\"others_email_two\":\"\",\"others_phone_one\":\"\",\"others_phone_two\":\"\",\"others_breadcrumb_image\":\"\\/uploads\\/others\\/1713955544_breadcrumb_image.jpg\",\"others_auth_template_image\":\"\\/uploads\\/others\\/1713955723_auth_template_image.jpg\"}', '2024-04-24 10:45:44', '2024-04-24 10:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hasad Melendez', '“After I started learning design with Quillow, I realized that I had improved to very advanced levels. While I am studying at my university, I design as an additional income and I am sure that I will do this professionally.”', 'Admin @Educal University', '/uploads/testimonial/1713942413.png', '2024-04-24 07:06:53', '2024-04-24 07:06:53'),
(2, 'Macey Jefferson', '“After I started learning design with Quillow, I realized that I had improved to very advanced levels. While I am studying at my university, I design as an additional income and I am sure that I will do this professionally.”', 'Teacher @Educal University', '/uploads/testimonial/1713942436.png', '2024-04-24 07:07:16', '2024-04-24 07:07:16'),
(3, 'James Lee,', '“After I started learning design with Quillow, I realized that I had improved to very advanced levels. While I am studying at my university, I design as an additional\n income and I am sure that I will do this professionally.”', 'Student @Educal University', '/uploads/testimonial/1713942457.png', '2024-04-24 07:07:37', '2024-04-24 07:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_orders`
--

CREATE TABLE `ticket_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `event_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','canceled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `sereal` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `slug`, `description`, `sereal`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Week 1', 'week-1', 'Desc', NULL, 1, '2023-09-24 20:35:18', '2023-09-24 20:35:18'),
(2, 'Week 1', 'week-1-1695703205', NULL, NULL, 2, '2023-09-25 22:40:05', '2023-09-25 22:40:05'),
(3, 'Week 1', 'week-1-1696757577', 'Week 1 desc', NULL, 6, '2023-10-08 09:32:57', '2023-10-08 09:32:57'),
(4, 'Week 2', 'week-2', NULL, NULL, 6, '2023-10-08 09:35:36', '2023-10-08 09:35:36'),
(6, 'TOpic 2', 'topic-2', 'Topic desc', NULL, 8, '2023-10-08 09:59:23', '2023-10-08 09:59:23'),
(8, 'Topic 1', 'topic-1', NULL, NULL, 12, '2024-03-18 09:31:51', '2024-03-18 09:31:51'),
(9, 'Topic 2', 'topic-2-1710754411', NULL, NULL, 12, '2024-03-18 09:33:31', '2024-03-18 09:33:31'),
(10, 'Topic 1', 'topic-1-1710754474', NULL, NULL, 10, '2024-03-18 09:34:34', '2024-03-18 09:34:34'),
(11, 'Topic 2', 'topic-2-1710754522', NULL, NULL, 10, '2024-03-18 09:35:22', '2024-03-18 09:35:22'),
(12, 'Week 2', 'week-2-1710754570', NULL, NULL, 8, '2024-03-18 09:36:10', '2024-03-18 09:36:10'),
(13, 'Getting Started', 'getting-started', NULL, NULL, 2, '2024-03-18 09:38:06', '2024-03-18 09:38:06'),
(14, 'Week 2', 'week-2-1710754846', NULL, NULL, 1, '2024-03-18 09:40:46', '2024-03-18 09:40:46'),
(15, 'Week 1', 'week-1-1711346509', '', NULL, 13, '2024-03-25 06:01:49', '2024-03-25 06:01:49'),
(16, 'Week 2', 'week-2-1711346550', '', NULL, 13, '2024-03-25 06:02:30', '2024-03-25 06:02:30'),
(17, 'Topic 1', 'topic-1-1711512002', '', NULL, 15, '2024-03-27 04:00:02', '2024-03-27 04:00:02'),
(18, 'Topic 2', 'topic-2-1711512017', '', NULL, 15, '2024-03-27 04:00:17', '2024-03-27 04:00:17'),
(19, 'Week 1', 'week-1-1711512455', '', NULL, 16, '2024-03-27 04:07:35', '2024-03-27 04:07:35'),
(20, 'Week 2', 'week-2-1711512478', '', NULL, 16, '2024-03-27 04:07:58', '2024-03-27 04:07:58'),
(21, 'Topic 1', 'topic-1-1711514018', 'Topic Desc', NULL, 17, '2024-03-27 04:33:38', '2024-03-27 04:33:38'),
(22, 'Topic 2', 'topic-2-1711514026', 'Topic Desc', NULL, 17, '2024-03-27 04:33:39', '2024-03-27 04:33:46'),
(23, 'Topic 1', 'topic-1-1711514592', '', NULL, 18, '2024-03-27 04:43:12', '2024-03-27 04:43:12'),
(24, 'Topic 2', 'topic-2-1711514599', '', NULL, 18, '2024-03-27 04:43:19', '2024-03-27 04:43:19'),
(25, 'Topic 1', 'topic-1-1714023281', '', NULL, 22, '2024-04-25 05:34:41', '2024-04-25 05:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('admin','user','instructor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `usertype`, `image`, `phone`, `country`, `address`, `city`, `postal_code`, `status`, `facebook`, `twitter`, `linkedin`, `youtube`, `vimeo`, `instagram`, `website`, `bio`, `designation`, `experience`, `cv`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James', 'Dopli', 'teacher@gmail.com', NULL, '$2y$10$ikDrMK8BKc8vfzQqtW20Ku/SS4Y2AqmfzSmFmouFmMSQj3tSjvuf6', 'instructor', '/uploads/users/1713941351.jpg', '123456789', 'Bangladesh', 'Dhaka', 'Dhaka', '1200', 'active', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://vimeo.com/', 'https://www.instagram.com/', 'https://www.google.com/', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'Web Developer', '5 Years', NULL, NULL, NULL, '2024-04-24 06:49:11'),
(2, 'Siarhei', 'Dzenisenka', 'student@gmail.com', NULL, '$2y$10$Q2kQAHFx0ucsPiZQAY3p7.eWP5mY9y.x9pH479ranV1FhhdHL2MwK', 'user', '/uploads/users/1713941340.jpg', '123456789', 'Bangladesh', 'Dhaka', 'Dhaka', '1200', 'active', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://vimeo.com/', 'https://www.instagram.com/', 'https://www.google.com/', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'Web Developer', '5 Years', NULL, NULL, NULL, '2024-04-24 06:49:00'),
(3, 'john', 'doe', 'admin@gmail.com', NULL, '$2y$10$lxs0RNQ7r4Q.Rui1RV1HYun0cm9zK9qqAixZQhr/Vf13b55FstPIq', 'admin', '/uploads/users/1713941329.jpg', '123456789', 'Bangladesh', 'Dhaka', 'Dhaka', '1200', 'active', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://vimeo.com/', 'https://www.instagram.com/', 'https://www.google.com/', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'Web Developer', '4 Years', NULL, 'J1cpqyE63MNNuiUP4LuZTDF2MaYwIYkZOThrm0nxqrpkWtsJDU8R33l7tb0U', '2023-09-24 05:07:04', '2024-04-24 06:48:49'),
(6, 'Mojahid', 'Islam', 'mojahid@gmail.com', NULL, '$2y$10$9XWiAlDBRU9bVh36PwCh3Ojn68Ybe2p1W9xPkRKFsOFjH0nSByZBq', 'user', '/uploads/users/1696913119.jpg', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', '', '', NULL, NULL, '2023-10-09 04:03:10', '2024-03-26 09:35:27'),
(7, 'mojahid', 'Islam', 'raofahmedmojahid@gmail.com', NULL, '$2y$10$hansEp/v65NdigPXvR69K.TlfegoUWkxO6dLU9JVPJIVLfLZDd9PK', 'user', '/uploads/users/1713941316.jpg', '', '', '', '', '', 'active', 'https://www.facebook.com/', 'https://twitter.com/', '', '', 'https://vimeo.com/', '', '', '', '', '', '/uploads/instructor/1711346902.pdf', NULL, '2024-03-25 06:07:48', '2024-04-24 06:48:36'),
(8, 'Kelly', 'Franklin', 'kelly@gmail.com', NULL, '$2y$10$3Wrijz4SOWE/gDUxPvZwBOIWRplGC7eFytv1P11WpoQf4teA9yMi6', 'instructor', '/uploads/users/1713941303.jpg', '', '', '', '', '', 'active', 'https://www.facebook.com/', 'https://twitter.com/', '', '', 'https://vimeo.com/', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'Web Developer', '', NULL, NULL, '2024-03-26 09:08:35', '2024-04-24 06:48:23'),
(9, 'Robert', 'Downy Jr.', 'lillian@gmail.com', NULL, '$2y$10$Hj3q32yTHakX8t.Pnp2oMeFs7tEkbrIiIFOPlBywLXKmiw8j1Spdy', 'instructor', '/uploads/users/1713941281.jpg', '', '', '', '', '', 'active', 'https://www.facebook.com/', 'https://twitter.com/', '', '', 'https://vimeo.com/', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'CO Founder', '4 Years', NULL, NULL, '2024-03-26 09:10:31', '2024-04-24 06:48:01'),
(10, 'Lillian', 'Walsh', 'firosillian@gmail.com', NULL, '$2y$10$qGsH3jZZZutvBpSB2smAw.4SdQB63Ib1gaHyu7b68D2F0CQosP6fK', 'instructor', '/uploads/users/1713941265.jpg', '', '', '', '', '', 'active', 'https://www.facebook.com/', 'https://twitter.com/', '', '', 'https://vimeo.com/', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'CO Founder', '3 years', NULL, NULL, '2024-03-26 09:14:02', '2024-04-24 06:47:45'),
(11, 'Hilary', 'Ouse', 'hilary@gmail.com', NULL, '$2y$10$L5DaDDLlKsggsqM53A59VepZEbRhxhSo2Vg4zL/WXSMTA7CT6JE7W', 'instructor', '/uploads/users/1713941254.jpg', '', '', '', '', '', 'active', 'https://www.facebook.com/', 'https://twitter.com/', '', '', 'https://vimeo.com/', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.', 'Markater', '', NULL, NULL, '2024-03-26 09:30:31', '2024-04-24 06:47:34'),
(15, 'Hak', 'Mawla', 'hakmawla@gmail.com', NULL, '$2y$10$pGZbB8l.3gl4QLGlBOWzSuf7ks7ajAcWUR8X3GZ.W4f6.KNS7S1fC', 'user', '/uploads/users/1713941240.jpg', '', '', '', '', '', 'active', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2024-04-22 09:17:28', '2024-04-24 06:47:20'),
(16, 'mojahid', 'islam', 'user@gmail.com', NULL, '$2y$10$SgfgwQH5PHv6kZDuoZ1G6O59PqbyCDj/tchZm6al1fqwCXD5z1QM.', 'user', '/uploads/users/1713941229.jpg', '131324', 'fadf s', 'comilla s', 'sdgf s', '4314', 'active', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2024-04-22 22:38:54', '2024-04-24 06:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, 12, '2024-04-25 05:28:01', '2024-04-25 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_orderitems`
--

CREATE TABLE `user_orderitems` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('processing','pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `amount`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2.00, 'asd', 'approved', 1, '2023-09-26 00:55:05', '2023-09-26 03:27:06'),
(2, 100.00, 'Please Approved', 'pending', 1, '2024-03-25 06:07:06', '2024-03-25 06:07:06'),
(3, 200.00, 'Description', 'pending', 3, '2024-04-25 05:29:23', '2024-04-25 05:29:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_course_id_foreign` (`course_id`),
  ADD KEY `assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `blogs_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_sub_categories`
--
ALTER TABLE `blog_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_sub_categories_slug_unique` (`slug`),
  ADD KEY `blog_category_id` (`blog_category_id`),
  ADD KEY `blog_sub_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_tags_slug_unique` (`slug`),
  ADD KEY `blog_tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_course_id_foreign` (`course_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commissions_user_id_foreign` (`user_id`),
  ADD KEY `commissions_course_id_foreign` (`course_id`);

--
-- Indexes for table `commission_percents`
--
ALTER TABLE `commission_percents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_user_id_foreign` (`user_id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `courses_tag_id_foreign` (`tag_id`),
  ADD KEY `courses_language_id_foreign` (`language_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_categories_slug_unique` (`slug`),
  ADD KEY `course_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_category_users`
--
ALTER TABLE `course_category_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_category_users_course_category_id_foreign` (`course_category_id`),
  ADD KEY `course_category_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_languages`
--
ALTER TABLE `course_languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_languages_slug_unique` (`slug`),
  ADD KEY `course_languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_sub_categories_slug_unique` (`slug`),
  ADD KEY `course_sub_categories_course_category_id_foreign` (`course_category_id`),
  ADD KEY `course_sub_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_tags`
--
ALTER TABLE `course_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_tags_slug_unique` (`slug`),
  ADD KEY `course_tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculam`
--
ALTER TABLE `curriculam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculam_course_id_foreign` (`course_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insructor_applies`
--
ALTER TABLE `insructor_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insructor_banners`
--
ALTER TABLE `insructor_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessons_slug_unique` (`slug`),
  ADD KEY `lessons_topic_id_foreign` (`topic_id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuitems_slug_unique` (`slug`),
  ADD KEY `menuitems_menu_id_foreign` (`menu_id`),
  ADD KEY `menuitems_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_course_id_foreign` (`course_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_answers_question_id_foreign` (`question_id`),
  ADD KEY `quize_answers_option_id_foreign` (`option_id`);

--
-- Indexes for table `quize_questions`
--
ALTER TABLE `quize_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quize_question_options`
--
ALTER TABLE `quize_question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quizzes_slug_unique` (`slug`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_course_id_foreign` (`course_id`),
  ADD KEY `resources_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sidebar_infos`
--
ALTER TABLE `sidebar_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `system_settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_orders_order_number_unique` (`order_number`),
  ADD KEY `ticket_orders_user_id_foreign` (`user_id`),
  ADD KEY `ticket_orders_event_id_foreign` (`event_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_slug_unique` (`slug`),
  ADD KEY `topics_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_courses_user_id_foreign` (`user_id`),
  ADD KEY `user_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `user_orderitems`
--
ALTER TABLE `user_orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orderitems_user_id_foreign` (`user_id`),
  ADD KEY `user_orderitems_course_id_foreign` (`course_id`),
  ADD KEY `user_orderitems_order_id_foreign` (`order_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orders_user_id_foreign` (`user_id`),
  ADD KEY `user_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog_sub_categories`
--
ALTER TABLE `blog_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `commission_percents`
--
ALTER TABLE `commission_percents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_category_users`
--
ALTER TABLE `course_category_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_languages`
--
ALTER TABLE `course_languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_tags`
--
ALTER TABLE `course_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `curriculam`
--
ALTER TABLE `curriculam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insructor_applies`
--
ALTER TABLE `insructor_applies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insructor_banners`
--
ALTER TABLE `insructor_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quize_answers`
--
ALTER TABLE `quize_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quize_questions`
--
ALTER TABLE `quize_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quize_question_options`
--
ALTER TABLE `quize_question_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sidebar_infos`
--
ALTER TABLE `sidebar_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_orderitems`
--
ALTER TABLE `user_orderitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `blog_sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_sub_categories`
--
ALTER TABLE `blog_sub_categories`
  ADD CONSTRAINT `blog_sub_categories_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commissions`
--
ALTER TABLE `commissions`
  ADD CONSTRAINT `commissions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `course_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `course_sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `course_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD CONSTRAINT `course_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_category_users`
--
ALTER TABLE `course_category_users`
  ADD CONSTRAINT `course_category_users_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_category_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_languages`
--
ALTER TABLE `course_languages`
  ADD CONSTRAINT `course_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  ADD CONSTRAINT `course_sub_categories_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_sub_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_tags`
--
ALTER TABLE `course_tags`
  ADD CONSTRAINT `course_tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `curriculam`
--
ALTER TABLE `curriculam`
  ADD CONSTRAINT `curriculam_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menuitems_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menuitems` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `payouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD CONSTRAINT `quize_answers_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `quize_question_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quize_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quize_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quize_questions`
--
ALTER TABLE `quize_questions`
  ADD CONSTRAINT `quize_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quize_question_options`
--
ALTER TABLE `quize_question_options`
  ADD CONSTRAINT `quize_question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `quize_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD CONSTRAINT `ticket_orders_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_orderitems`
--
ALTER TABLE `user_orderitems`
  ADD CONSTRAINT `user_orderitems_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_orderitems_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_orderitems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
