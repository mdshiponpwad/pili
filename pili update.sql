-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 08:00 AM
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
-- Database: `pili`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `link`, `image`, `position`, `status`, `created_at`, `updated_at`) VALUES
(2, 'https://www.pilihoney.com', '162627857.jpg', 'Home Page', 1, '2021-01-13 11:57:19', '2021-01-13 13:53:46'),
(3, 'https://www.pilihoney.com', '1337653334.jpg', 'Job Page', 1, '2021-01-13 12:26:04', '2021-01-13 13:53:56'),
(4, 'https://www.pilihoney.com', '634033826.jpg', 'Blog Page', 1, '2021-01-13 12:26:18', '2021-09-17 07:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_bn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_title_bn` varchar(255) NOT NULL,
  `sub_title_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `category_bn_id`, `sub_title_bn`, `sub_title_en`, `image`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'এটি স্বাস্থ্যের পক্ষে ভাল', 'Its good for health', '1396656454.png', '1174809575.png', '0', '2021-01-05 09:00:09', '2021-01-05 09:00:09'),
(2, 2, NULL, 'এটি স্বাস্থ্যের পক্ষে ভাল', 'Its good for health', '1520556203.png', '741436921.png', '0', '2021-01-05 09:02:00', '2021-01-25 13:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_bn` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_en`, `title_bn`, `image`, `description_en`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'honey comb', 'চাক মধু', '970603209.jpg', '<ul>\r\n	<li>Honey is primarily fructose (38%),</li>\r\n	<li>glucose (31%),</li>\r\n	<li>water (17%),</li>\r\n	<li>maltose (7%), and small amounts of trisaccharides, other higher carbohydrates, sucrose, minerals, vitamins, and enzymes.</li>\r\n</ul>', '<ul>\r\n	<li>\r\n	<pre>\r\nমধু হ&#39;ল মূলত ফ্রুক্টোজ (38%),\r\nগ্লুকোজ (31%),\r\nজল (17%), \r\nমল্টোজ (7%) এবং অল্প পরিমাণে ট্রাইসচারাইডস, অন্যান্য উচ্চতর শর্করা, সুক্রোজ, খনিজ, ভিটামিন এবং এনজাইম।</pre>\r\n	</li>\r\n</ul>', NULL, '2021-01-10 11:07:18', '2021-01-18 01:53:17'),
(2, 'Nature’s Sweetener', 'প্রকৃতির মিষ্টি', '1998584651.jpg', '<ul>\r\n	<li>Honey is sweet &ndash; that&rsquo;s a given.</li>\r\n	<li>But did you know that honey also adds a special touch to almost any recipe? Now more than ever, honey&rsquo;s being recognized as a versatile ingredient and pantry staple in the kitchen.</li>\r\n	<li>All-natural honey gives your recipes unbeatable flavor and unmatched functional benefits.</li>\r\n	<li>From balancing flavors to providing moisture to baked goods, one-ingredient honey performs a slew of tasks, all from one little bottle:</li>\r\n</ul>', '<ul>\r\n	<li>\r\n	<pre>\r\nমধু মিষ্টি - এটি দেওয়া। \r\nতবে আপনি কি জানেন যে মধু প্রায় কোনও রেসিপিতে একটি বিশেষ স্পর্শ যোগ করে? এখনকার চেয়ে আরও বেশি, মধু রান্নাঘরে একটি বহুমুখী উপাদান এবং পেন্ট্রি প্রধান হিসাবে স্বীকৃত। \r\nসর্ব-প্রাকৃতিক মধু আপনার রেসিপিগুলিকে অপরাজেয় স্বাদ এবং তুলনামূলক কার্যকর কার্যকারিতা দেয়। \r\nবেকড পণ্যগুলিতে আর্দ্রতা সরবরাহের স্বাদ থেকে শুরু করে এক উপাদানের মধু একটি ছোট বোতল থেকে সমস্ত কাজ করে:</pre>\r\n	</li>\r\n</ul>', NULL, '2021-01-10 11:43:18', '2021-01-10 11:43:18'),
(3, 'Natural Honey', 'প্রকৃতির মধু', '324799616.png', '<h2>The composition of&nbsp;<strong>honey</strong>&nbsp;is mainly sugars and water (Table 1).</h2>\r\n\r\n<ul>\r\n	<li>In addition, it also&nbsp;<strong>contains</strong>&nbsp;several vitamins and minerals, including B vitamins as shown in Table 2.</li>\r\n	<li>The other constituents of&nbsp;<strong>honey</strong>&nbsp;are amino acids, antibiotic-rich inhibine, proteins, phenol antioxidants,</li>\r\n	<li>and micronutrients [2].The composition of&nbsp;<strong>honey</strong>&nbsp;is mainly sugars and water (Table 1).</li>\r\n	<li>In addition, it also&nbsp;<strong>contains</strong>&nbsp;several vitamins and minerals, including B vitamins as shown in Table 2.</li>\r\n	<li>The other constituents of&nbsp;<strong>honey</strong>&nbsp;are amino acids, antibiotic-rich inhibine, proteins, phenol antioxidants, and micronutrients [2].</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<h2>মধুর সংমিশ্রণটি মূলত চিনি এবং জল (সারণী 1)।</h2>\r\n\r\n<ul>\r\n	<li>এছাড়াও, এতে আরও কয়েকটি ভিটামিন এবং খনিজ রয়েছে,</li>\r\n	<li>বি বি ভিটামিন সহ, টেবিল ২-এ দেখানো হয়েছে মধুর অন্যান্য উপাদানগুলি অ্যামিনো অ্যাসিড,</li>\r\n	<li>অ্যান্টিবায়োটিক সমৃদ্ধ ইনহিবিন, প্রোটিন, ফেনল অ্যান্টিঅক্সিডেন্টস এবং মাইক্রোনিউট্রিয়েন্টস [২]]</li>\r\n</ul>', NULL, '2021-01-14 22:25:15', '2021-01-14 22:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `weight_en` varchar(255) DEFAULT NULL,
  `weight_bn` varchar(255) DEFAULT NULL,
  `price` decimal(50,0) DEFAULT NULL,
  `profit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cat_name_bn` varchar(255) NOT NULL,
  `cat_name_en` varchar(255) NOT NULL,
  `slug_bn` varchar(255) NOT NULL,
  `slug_en` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `menu_id`, `cat_name_bn`, `cat_name_en`, `slug_bn`, `slug_en`, `cover`, `description_en`, `description_bn`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'চাক মধু', 'Honey Comb', 'cak-mdhu', 'honey-comb', '647050848.gif', '<h2>Honeycomb is rich in carbohydrates and antioxidants.</h2>\r\n\r\n<ul>\r\n	<li>It also contains trace amounts of several other nutrients.</li>\r\n	<li>Its main component is&nbsp;<strong>raw honey</strong>, which offers small amounts of protein, vitamins, and minerals.</li>\r\n</ul>', '<h2>মধুচক্র শর্করা এবং অ্যান্টিঅক্সিডেন্ট সমৃদ্ধ।</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<pre>\r\nএটিতে অন্যান্য বেশ কয়েকটি পুষ্টি উপাদানের পরিমাণও রয়েছে। এর প্রধান উপাদান হ&#39;ল কাঁচা মধু, যা অল্প পরিমাণে প্রোটিন, ভিটামিন এবং খনিজ সরবরাহ করে। </pre>\r\n	</li>\r\n</ul>', 'just_for_you', '1', '2021-01-04 19:39:24', '2023-12-06 00:45:32'),
(2, 2, 'কালজিরা মধু', 'Black Cumin', 'kaljira-mdhu', 'black-cumin', '1503868404.png', '<h2>&nbsp;Honey Contains&nbsp;Nutrients&nbsp;</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Honey&nbsp;is a thick, sweet liquid made by&nbsp;honeybees.</p>\r\n	</li>\r\n	<li>It is low in vitamins and minerals but may be high in some plant compounds.</li>\r\n</ul>', '<h2>মধু ধারক পুষ্টিকর।</h2>\r\n\r\n<ul>\r\n	<li>গলা ব্যথা এবং সংক্রমণের মতো &#39;রান ডাউন&#39; হওয়ার সমস্ত লক্ষণ হ্রাস করে প্রতিরোধ ক্ষমতা বাড়ায়।</li>\r\n	<li>আলসার, ক্ষত এবং পোড়াগুলির চিকিত্সা।</li>\r\n	<li>ইরিটেবল বাউয়েল সিনড্রোম (আইবিএস) এবং ইনফ্ল্যামেটরি বাউয়েল ডিজিজ (আইবিডি) পরিচালনায় সহায়তা অ্যালার্জির প্রভাব হ্রাস।</li>\r\n</ul>', 'best_feature', '1', '2021-01-04 19:50:41', '2023-12-06 00:25:14'),
(3, 2, 'গিফট প্যাক', 'Gift Pack', 'gift-pzak', 'gift-pack', '1287752191.png', '<h2>Our Pili Honey Gift Pack can be incomparable to give honey as a gift to a loved one.</h2>', '<h2>প্রিয়জনকে উপহার হিসেবে মধু দিতে আমাদের পিলি মধু গিফট প্যাক-ই হতে পারে অতুলনীয়।</h2>', 'best_feature', '0', '2021-01-04 19:54:14', '2021-01-31 09:17:18'),
(4, 2, 'প্রাকৃতিক মধু', 'Natural Honey', 'prakrritik-mdhu', 'natural-honey', '1874858545.jpg', '<h2><strong>Organic Honey</strong>:&nbsp;</h2>\r\n\r\n<ul>\r\n	<li><strong>Organic honey</strong>&nbsp;is produced from the pollen of organically grown plants, and without chemical miticides to treat the bees.</li>\r\n	<li>Buying&nbsp;<strong>organic honey</strong>&nbsp;ensures that you avoid contact with pesticides that may be sprayed on or near the plants visited by honeybees.</li>\r\n</ul>', '<h2>জৈব মধু:</h2>\r\n\r\n<ul>\r\n	<li>জৈবিক মধু জৈবিকভাবে জন্মায় উদ্ভিদের পরাগ থেকে এবং মৌমাছিদের চিকিত্সার জন্য রাসায়নিক মাইটিসাইড ছাড়াই উত্পাদিত হয়।</li>\r\n	<li>জৈব মধু কেনা নিশ্চিত করে যে আপনি কীটনাশকগুলির সাথে যোগাযোগ এড়াতে পারেন যা মধুচক্র পরিদর্শন করা গাছগুলিতে বা তার কাছাকাছি স্প্রে করা যেতে পারে।</li>\r\n</ul>', 'popular_product', '0', '2021-01-06 09:57:35', '2021-01-29 04:56:36'),
(5, 2, 'সুন্দরবনের মধু', 'Sundarban Honey', 'sundrbner-mdhu', 'sundarban-honey', '69703647.jpg', '<h2><br />\r\nWe trusted by you to get pure&nbsp;Sundarban Honey.</h2>', '<h2>সুন্দর বনের খাঁটি মধু পেতে আমরা আপনার আস্থা-ভাজন ।</h2>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>', 'popular_product', '0', '2021-01-06 10:01:25', '2021-01-29 05:00:07'),
(6, 2, 'মধু জার', 'Honey Jar', 'mdhu-jar', 'honey-jar', '494957085.jpg', '<h2><strong>Honey</strong>&nbsp;is a&nbsp;<strong>forest</strong>&nbsp;commodity that offers many benefits.</h2>\r\n\r\n<ul>\r\n	<li>The thick, golden-brown liquid is produced by the&nbsp;<strong>honey</strong>&nbsp;bee (Apis dorsata) from nectar collected from various plants.</li>\r\n	<li>Aside from being consumed directly,&nbsp;<strong>honey</strong>&nbsp;is also mixed with other foods, drinks and even soap.</li>\r\n</ul>', '<h2>মধু একটি বন পণ্য যা অনেক সুবিধা দেয়।</h2>\r\n\r\n<ul>\r\n	<li>ঘন, সোনালি-বাদামী তরল বিভিন্ন গাছপালা থেকে সংগৃহীত অমৃত থেকে মধু মৌমাছির (এপিস দোরসাতা) উত্পাদিত হয়।</li>\r\n	<li>সরাসরি খাওয়া ছাড়াও মধু অন্যান্য খাবার, পানীয় এবং এমনকি সাবানের সাথেও মিশ্রিত হয়।</li>\r\n</ul>', 'popular_product', '0', '2021-01-06 10:07:31', '2021-09-17 07:18:26'),
(7, 4, 'পূর্ণকালীন চাকুরী', 'Full Time Job', 'puurnkaleen-cakuree', 'full-time', '23799268.jpg', '<ul>\r\n	<li>Full-time status varies between company and is often based on the shift the employee must work during each work week.</li>\r\n	<li>The &quot;standard&quot; work week consists of&nbsp;<strong>five eight</strong>-hour days, commonly served between 9:00 AM to 5:00 PM or 10:00 AM to 6:00 PM totaling 40 hours.</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>পূর্ণ-সময়ের স্থিতি কোম্পানির মধ্যে পরিবর্তিত হয় এবং প্রায়শই কাজের প্রতি কর্মচারীকে প্রতিটি কাজের সপ্তাহে কাজ করতে হবে এমন শিফ্টের ভিত্তিতে।</li>\r\n	<li>&quot;স্ট্যান্ডার্ড&quot; কাজের সপ্তাহটি পাঁচ ঘন্টা সময় নিয়ে গঠিত, সাধারণত 9:00 সকাল থেকে 5:00 অপরাহ্ন বা 10:00 সকাল থেকে 6:00 অপরাহ্ন মোট 40 ঘন্টা সময় পরিবেশন করা হয়।</li>\r\n</ul>', NULL, '0', '2021-01-12 09:05:10', '2021-01-12 09:05:10'),
(8, 4, 'খন্ডকালীন চাকরী', 'Part Time job', 'khndkaleen-cakree', 'part-time-job', '188852404.jpg', '<ul>\r\n	<li>An&nbsp;<strong>example</strong>&nbsp;of&nbsp;<strong>part time</strong>&nbsp;is when a person works for 20 hours and not the customary 40 hours per week. ...</li>\r\n	<li>An&nbsp;<strong>example of a part</strong>-<strong>time job</strong>&nbsp;is a&nbsp;<strong>job</strong>&nbsp;where you work less than the customary 40 hours per week.</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>খণ্ডকালীন সময়ের উদাহরণ হ&#39;ল যখন কোনও ব্যক্তি প্রতি সপ্তাহে 40 ঘন্টা প্রথাগত না হয়ে 20 ঘন্টা কাজ করে। ...</li>\r\n	<li>খণ্ডকালীন কাজের উদাহরণ হ&#39;ল এমন একটি চাকরী যেখানে আপনি প্রতি সপ্তাহে 40 ঘন্টা রীতি তুলনায় কম কাজ করেন।</li>\r\n</ul>', NULL, '0', '2021-01-12 09:07:17', '2021-01-12 09:07:17'),
(9, 4, 'সম্পূর্ণ ফ্রি জব', 'Full Free Job', 'smpuurn-fri-jb', 'full-free', '406656165.jpg', '<ul>\r\n	<li><strong>ZipRecruiter</strong>&nbsp;is&nbsp;<strong>free</strong>&nbsp;for job seekers, but it charges&nbsp;<strong>employers</strong>&nbsp;for posting jobs depending on the number of jobs they post,</li>\r\n	<li>the number of users they need, and other features they may want access to.</li>\r\n</ul>', '<ul>\r\n	<li>\r\n	<pre>\r\nজিপক্রেকার চাকরি প্রার্থীদের জন্য নিখরচায়, তবে নিয়োগকারীরা তাদের পোস্টের কাজের সংখ্যা, \r\nতাদের প্রয়োজনীয় ব্যবহারকারীর সংখ্যা এবং অন্যান্য বৈশিষ্ট্য যা তারা অ্যাক্সেস পেতে পারে তার উপর নির্ভর করে চাকরি পোস্ট করার জন্য ধার্য করে।</pre>\r\n	</li>\r\n</ul>', NULL, '0', '2021-01-12 09:09:36', '2021-01-12 09:09:36'),
(10, 2, 'Honey Dipper', 'Honey Dipper', 'honey-dipper', 'honey-dipper', '433610180.jpg', '<ul>\r\n	<li>Nectar that the bees collect comes from different plants.</li>\r\n	<li>The resulting varieties can vary a lot in flavor and appearance, such as wildflower types.</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>মৌমাছিরা যে অমৃত সংগ্রহ করে তা বিভিন্ন উদ্ভিদ থেকে আসে।</li>\r\n	<li>ফলস্বরূপ বিভিন্ন প্রকারের স্বাদ এবং চেহারাতে অনেকগুলি পৃথক হতে পারে, যেমন বন্যফুলের প্রকার।</li>\r\n</ul>', 'popular_product', '0', '2021-01-19 02:29:38', '2021-09-17 07:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `left_name_en` varchar(100) DEFAULT NULL,
  `left_name_bn` varchar(100) DEFAULT NULL,
  `left_desig_en` varchar(100) DEFAULT NULL,
  `left_desig_bn` varchar(100) DEFAULT NULL,
  `left_company_en` varchar(100) DEFAULT NULL,
  `left_company_bn` varchar(100) DEFAULT NULL,
  `left_cover` varchar(100) DEFAULT NULL,
  `left_logo` varchar(100) DEFAULT NULL,
  `left_description_en` text DEFAULT NULL,
  `left_description_bn` text DEFAULT NULL,
  `right_name_en` varchar(100) DEFAULT NULL,
  `right_name_bn` varchar(100) DEFAULT NULL,
  `right_desig_en` varchar(100) DEFAULT NULL,
  `right_desig_bn` varchar(100) DEFAULT NULL,
  `right_company_en` varchar(100) DEFAULT NULL,
  `right_company_bn` varchar(100) DEFAULT NULL,
  `right_cover` varchar(100) DEFAULT NULL,
  `right_logo` varchar(100) DEFAULT NULL,
  `right_des_en` text DEFAULT NULL,
  `right_des_bn` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `left_name_en`, `left_name_bn`, `left_desig_en`, `left_desig_bn`, `left_company_en`, `left_company_bn`, `left_cover`, `left_logo`, `left_description_en`, `left_description_bn`, `right_name_en`, `right_name_bn`, `right_desig_en`, `right_desig_bn`, `right_company_en`, `right_company_bn`, `right_cover`, `right_logo`, `right_des_en`, `right_des_bn`, `created_at`, `updated_at`) VALUES
(1, 'Ziaul Islam', 'জিয়াউল ইসলাম', 'Manager', 'ম্যানেজার', 'Glorious Bangla', 'গ্লোরিয়াস বাংলা', '1306609320.jpg', '2121019626.png', '<ul>\r\n	<li>Thanks Pili honey for Presenting awesome pure honey with honey comb.</li>\r\n</ul>', '<ul>\r\n	<li>চাকসহ আসল মধুর চমৎকার পরিবেশনার জন্য পিলি&nbsp;মধু কে ধন্যবাদ।</li>\r\n</ul>', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2021-01-10 06:38:39', '2021-01-28 05:42:40'),
(2, 'A.B.M KAWSAR ALAM', 'এ.বি.এম. কাউছার আলম', 'ceo', 'সিএও', NULL, NULL, '1007485076.png', '1288418336.png', '<ul>\r\n	<li>He is the co-founder and former executive chairman of&nbsp;<strong>Alibaba</strong>&nbsp;Group, a multinational technology conglomerate.</li>\r\n	<li>In September 2018, he announced that he&nbsp;<strong>would</strong>&nbsp;retire from&nbsp;<strong>Alibaba</strong>&nbsp;and pursue educational work, philanthropy, and environmental causes; the following year, Daniel Zhang succeeded him as executive chairman.</li>\r\n</ul>', '<ul>\r\n	<li>He is the co-founder and former executive chairman of&nbsp;<strong>Alibaba</strong>&nbsp;Group, a multinational technology conglomerate.</li>\r\n	<li>In September 2018, he announced that he&nbsp;<strong>would</strong>&nbsp;retire from&nbsp;<strong>Alibaba</strong>&nbsp;and pursue educational work, philanthropy, and environmental causes; the following year, Daniel Zhang succeeded him as executive chairman.</li>\r\n</ul>', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2021-01-10 08:26:35', '2021-01-10 08:28:14'),
(3, 'A.B.M KAWSAR ALAM', 'এ.বি.এম. কাউছার আলম', 'ceo', 'সিএও', NULL, NULL, '1142828944.png', '417055933.png', '<ul>\r\n	<li>He is the co-founder and former executive chairman of&nbsp;<strong>Alibaba</strong>&nbsp;Group, a multinational technology conglomerate.</li>\r\n	<li>In September 2018, he announced that he&nbsp;<strong>would</strong>&nbsp;retire from&nbsp;<strong>Alibaba</strong>&nbsp;and pursue educational work, philanthropy, and environmental causes; the following year, Daniel Zhang succeeded him as executive chairman.</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>তিনি বহুজাতিক প্রযুক্তি সংস্থার আলিবাবা গ্রুপের সহ-প্রতিষ্ঠাতা ও প্রাক্তন নির্বাহী চেয়ারম্যান।</li>\r\n	<li>সেপ্টেম্বর 2018 এ, তিনি ঘোষণা করেছিলেন যে তিনি আলিবাবা থেকে অবসর নেবেন এবং শিক্ষামূলক কাজ, সমাজসেবী এবং পরিবেশগত কারণগুলি অনুসরণ করবেন; পরের বছর, ড্যানিয়েল জাং তাকে কার্যনির্বাহী চেয়ারম্যান হিসাবে পদে পদে পদে পদে পদে নিলেন।</li>\r\n</ul>', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2021-01-10 08:35:30', '2021-01-10 08:35:30'),
(4, 'test name', 'test name', 'test name', 'test name', 'test name', 'test name', '355064108.gif', NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be....', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be....', 'test name', 'test name', 'test name', 'test name', 'test name', 'test name', '469206218.gif', NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be....', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be...', '2021-10-15 01:28:34', '2021-10-15 03:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phn_en` varchar(255) DEFAULT NULL,
  `phn_bn` varchar(255) DEFAULT NULL,
  `subject_en` varchar(255) DEFAULT NULL,
  `subject_bn` varchar(255) DEFAULT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `msg_en` text DEFAULT NULL,
  `msg_bn` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(10, '11790541.jpg', '2021-01-21 07:16:12', '2021-01-21 07:16:12'),
(11, '1024131182.jpg', '2021-01-21 07:17:16', '2021-01-21 07:17:16'),
(12, '1076561862.png', '2021-01-21 07:17:35', '2021-01-21 07:17:35'),
(13, '1862790112.jpg', '2021-01-21 07:17:56', '2021-01-21 07:17:56'),
(14, '1010183312.jpg', '2021-01-21 07:19:52', '2021-01-21 07:19:52'),
(15, '587713218.jpg', '2021-01-21 07:21:01', '2021-01-21 07:21:01'),
(16, '403872833.jpg', '2021-01-21 07:22:37', '2021-01-21 07:22:37'),
(17, '1542694356.jpg', '2021-01-21 07:22:49', '2021-01-21 07:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_en` varchar(255) NOT NULL,
  `menu_bn` varchar(255) NOT NULL,
  `slug_en` varchar(255) NOT NULL,
  `slug_bn` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_en`, `menu_bn`, `slug_en`, `slug_bn`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'হোম', 'Home', 'হোম', '/', 1, '2021-01-04 19:27:13', '2021-01-25 01:05:44'),
(2, 'Products', 'পণ্য', 'Products', 'পণ্য', NULL, 1, '2021-01-04 19:27:13', '2021-01-04 19:27:59'),
(3, 'Gallery', 'গ্যালারি', 'Gallery', 'গ্যলারি', '/gallery-list', 1, '2021-01-04 19:27:13', '2021-01-14 08:04:17'),
(4, 'Job', 'চাকরি', 'Job', 'চাকরি', NULL, 1, '2021-01-04 19:27:13', '2021-01-04 19:28:06'),
(5, 'Blog', 'ব্লগ', 'Blog', 'ব্লগ', '/blog-list', 1, '2021-01-04 19:27:13', '2021-01-17 01:04:00'),
(6, 'CSR', 'সামাজিক কর্মকাণ্ড', 'CSR', 'সামাজিক কর্মকাণ্ড', '/social-list', 1, '2021-01-04 19:27:13', '2021-01-04 19:28:13'),
(7, 'Contact', 'যোগাযোগ', 'Contact', 'যোগাযোগ', '/contact-us', 1, '2021-01-04 19:27:13', '2021-01-04 19:28:16'),
(8, 'Language', 'ভাষা', 'Language', 'ভাষা', NULL, 1, '2021-01-04 19:27:13', '2021-01-25 01:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_28_162103_create_menus_table', 1),
(5, '2020_12_28_162242_create_categories_table', 1),
(6, '2020_12_28_162433_create_banners_table', 1),
(7, '2020_12_28_162625_create_products_table', 1),
(8, '2020_12_28_162659_create_product_attributes_table', 1),
(9, '2020_12_28_162859_create_product_avatars_table', 1),
(10, '2020_12_28_162935_create_wish_list_table', 1),
(11, '2020_12_28_163001_create_carts_table', 1),
(12, '2021_01_04_163105_create_jobs_table', 2),
(15, '2021_01_04_163429_create_about_us_table', 2),
(19, '2021_01_09_185101_create_clients_table', 3),
(20, '2021_01_04_163347_create_blogs_table', 4),
(21, '2021_01_04_163146_create_social_activites_table', 5),
(22, '2021_01_11_142723_create_galleries_table', 6),
(25, '2021_01_04_163524_create_settings_table', 8),
(26, '2021_01_13_170550_create_ads_table', 9),
(27, '2021_01_04_163501_create_contact_us_table', 10),
(28, '2023_12_04_163001_create_orders_table', 11),
(31, '2023_12_04_163001_create_order_details_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_no` varchar(255) NOT NULL,
  `total_quantity` decimal(16,0) DEFAULT 0,
  `sub_total` decimal(16,2) DEFAULT 0.00,
  `shipping_cost` decimal(16,2) DEFAULT 0.00,
  `discount_amount` decimal(16,2) DEFAULT 0.00,
  `paid_amount` decimal(16,2) DEFAULT 0.00,
  `grand_total` decimal(16,2) GENERATED ALWAYS AS (`sub_total` + `shipping_cost` - `discount_amount`) VIRTUAL,
  `due_amount` decimal(16,2) GENERATED ALWAYS AS (`grand_total` - `paid_amount`) VIRTUAL,
  `status` varchar(255) DEFAULT NULL COMMENT 'Pending, Confirmed, Delivery on going, Delivered, Return, Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `total_quantity`, `sub_total`, `shipping_cost`, `discount_amount`, `paid_amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 8, '81701717353', 6, 3360.00, 100.00, 0.00, 0.00, 'Pending', '2023-12-04 13:15:53', '2023-12-04 13:15:53'),
(5, 8, '81701755716', 6, 3360.00, 100.00, 0.00, 0.00, 'Pending', '2023-12-04 23:55:16', '2023-12-04 23:55:16'),
(40, 8, '81701758960', 2, 1120.00, 100.00, 0.00, 0.00, 'Pending', '2023-12-05 00:49:20', '2023-12-05 00:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(16,2) DEFAULT 0.00,
  `quantity` decimal(16,0) DEFAULT 0,
  `total_amount` decimal(16,2) GENERATED ALWAYS AS (`price` * `quantity`) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 40, 2, 560.00, 2, '2023-12-05 00:49:20', '2023-12-05 00:49:20'),
(3, 41, 2, 560.00, 5, '2023-12-05 00:53:31', '2023-12-05 00:53:31'),
(4, 42, 2, 560.00, 5, '2023-12-05 00:56:24', '2023-12-05 00:56:24'),
(5, 43, 2, 1090.00, 1, '2023-12-05 01:00:08', '2023-12-05 01:00:08'),
(6, 44, 2, 1090.00, 1, '2023-12-05 01:00:38', '2023-12-05 01:00:38'),
(7, 45, 7, 325.00, 10, '2023-12-05 01:03:05', '2023-12-05 01:03:05'),
(8, 46, 1, 750.00, 3, '2023-12-05 11:35:34', '2023-12-05 11:35:34'),
(9, 46, 3, 950.00, 2, '2023-12-05 11:35:34', '2023-12-05 11:35:34'),
(10, 47, 3, 1050.00, 1, '2023-12-05 23:13:34', '2023-12-05 23:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title_en`, `title_bn`, `slug_en`, `slug_bn`, `description_en`, `description_bn`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Raw Honey', 'কাঁচা মধু', 'raw-honey', 'kannca-mdhu', '<ul>\r\n	<li>Honey is primarily fructose (38%), glucose (31%), water (17%), maltose (7%), and small amounts of trisaccharides,</li>\r\n	<li>other higher carbohydrates, sucrose, minerals, vitamins, and enzymes.</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>মধু হ&#39;ল মূলত ফ্রুক্টোজ (38%), গ্লুকোজ (31%), জল (17%), মল্টোজ (7%) এবং অল্প পরিমাণে ট্রাইসচারাইডস,</li>\r\n	<li>অন্যান্য উচ্চতর শর্করা, সুক্রোজ, খনিজ, ভিটামিন এবং এনজাইম।</li>\r\n</ul>', NULL, 1, '2021-01-17 12:56:22', '2021-01-17 13:04:15'),
(2, 'Honey is a mixture of sugars', 'মধু শর্করার মিশ্রণ', 'honey-is-a-mixture-of-sugars', 'mdhu-srkrar-misrn', '<ul>\r\n	<li>Honey is a mixture of sugars, mostly fructose and glucose. But honey has particular flavours and properties that come from the flowers and the natural processing the bees do. Fake honey is generally some honey mixed with other sugar syrups.</li>\r\n	<li>These syrups come from plants like sugar cane, corn, or rice.</li>\r\n</ul>', '<ul>\r\n	<li>মধু শর্করার মিশ্রণ, বেশিরভাগ ফ্রুটোজ এবং গ্লুকোজ। তবে মধুতে বিশেষ স্বাদ এবং বৈশিষ্ট্য রয়েছে যা ফুল থেকে আসে এবং মৌমাছিদের প্রাকৃতিক প্রক্রিয়াকরণ থেকে আসে।</li>\r\n	<li>নকল মধু সাধারণত অন্যান্য চিনির সিরাপের সাথে কিছুটা মধু মিশ্রিত হয়। এই সিরাপগুলি আখ, ভুট্টা বা ভাতের মতো গাছ থেকে আসে।</li>\r\n</ul>', NULL, 1, '2021-01-17 13:04:11', '2021-01-17 13:04:22'),
(3, 'About Company', 'কোম্পানী সম্পর্কে', 'about-company', 'kompanee-smprke', NULL, NULL, 'At a glance', 1, '2021-01-19 10:10:03', '2021-01-19 10:36:37'),
(4, 'Mission & Vision', 'মিশন & দৃষ্টি', 'mission-vision', 'misn-drrishti', NULL, NULL, 'At a glance', 1, '2021-01-19 11:56:06', '2021-01-19 11:57:04'),
(5, 'Our Best Services', 'আমাদের সেরা পরিষেবা', 'our-best-services', 'amader-sera-prisheba', NULL, NULL, 'At a glance', 1, '2021-01-19 11:57:55', '2021-01-19 11:57:59'),
(6, 'Our Honorable Advisor', 'আমাদের মাননীয় উপদেষ্টা', 'our-honorable-advisor', 'amader-manneez-updeshta', NULL, NULL, 'At a glance', 1, '2021-01-19 11:58:54', '2021-01-19 11:59:28'),
(7, 'Company Policy', 'প্রাতিষ্ঠানিক নীতিমালা', 'company-policy', 'pratishthanik-neetimala', NULL, NULL, 'Company', 1, '2021-01-19 12:00:14', '2021-01-19 12:02:33'),
(8, 'Delivery Policy', 'বিতরণ নীতি', 'delivery-policy', 'bitrn-neeti', NULL, NULL, 'Company', 1, '2021-01-19 12:00:55', '2021-01-19 12:02:37'),
(9, 'Payment Method', 'মূল্যপরিশোধ পদ্ধতি', 'payment-method', 'muulzprisodh-pddhti', NULL, NULL, 'Company', 1, '2021-01-19 12:01:39', '2021-01-19 12:02:43'),
(10, 'Gift Pack Order Policy', 'উপহার প্যাক অর্ডার নীতি', 'gift-pack-order-policy', 'uphar-pzak-ordar-neeti', NULL, NULL, 'Company', 1, '2021-01-19 12:02:28', '2021-01-19 12:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_en_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_bn` varchar(255) NOT NULL,
  `slug_en` varchar(255) NOT NULL,
  `slug_bn` varchar(255) NOT NULL,
  `product_code_en` varchar(255) DEFAULT NULL,
  `product_code_bn` varchar(255) DEFAULT NULL,
  `color_en` varchar(255) DEFAULT NULL,
  `color_bn` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `category_en_id`, `product_name_en`, `product_name_bn`, `slug_en`, `slug_bn`, `product_code_en`, `product_code_bn`, `color_en`, `color_bn`, `description_en`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Honey Comb', 'চাক মধু', 'honey-comb', 'cak-mdhu', 'honey-001', 'মধু-০০১', 'red', 'লাল', 'Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur xcepteur sint occaecat cupidatat non proident, sunt.', 'খুব সহজেই আপনি আপনার মজাদার এবং ম্যাগাজিনের জন্য মজাদার কাজ করতে পারেন। আমাদের পক্ষে সবচেয়ে কম ব্যবহার করা উচিত, তবে আমাদের ব্যায়ামের জন্য আমাদের শ্রমের উপর নির্ভরশীল হতে হবে consequ স্বেচ্ছাসেবী গতিরোধক হিসাবে এই চিকিত্সা কাজ করতে পারেন ডুওর ইউ ফুগিয়েট ন্যূনাল প্যারিয়াটুর এক্সপ্রেসিয়াল সিন্টে কিছুক্ষণ আগেই দেখা যায় না, তবুও এই ঘটনা ঘটে।', 0, '2021-01-05 09:55:10', '2021-01-29 08:56:31'),
(2, 2, NULL, 'Black Cumin', 'কালজিরা মধু', 'black-cumin', 'kaljira-mdhu', 'honey-002', 'মধু-০০২', NULL, NULL, 'Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur xcepteur sint occaecat cupidatat non proident, sunt.', 'খুব সহজেই আপনি আপনার মজাদার এবং ম্যাগাজিনের জন্য মজাদার কাজ করতে পারেন। আমাদের পক্ষে সবচেয়ে কম ব্যবহার করা উচিত, তবে আমাদের ব্যায়ামের জন্য আমাদের শ্রমের উপর নির্ভরশীল হতে হবে consequ স্বেচ্ছাসেবী গতিরোধক হিসাবে এই চিকিত্সা কাজ করতে পারেন ডুওর ইউ ফুগিয়েট ন্যূনাল প্যারিয়াটুর এক্সপ্রেসিয়াল সিন্টে কিছুক্ষণ আগেই দেখা যায় না, তবুও এই ঘটনা ঘটে।', 0, '2021-01-05 10:03:35', '2021-01-29 09:21:18'),
(3, 3, NULL, 'Gift Pack', 'গিফট প্যাক', 'gift-pack', 'gift-pzak', 'pili-001', 'পিলি-০০১', 'red', 'লাল', 'Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur xcepteur sint occaecat cupidatat non proident, sunt.', 'খুব সহজেই আপনি আপনার মজাদার এবং ম্যাগাজিনের জন্য মজাদার কাজ করতে পারেন। আমাদের পক্ষে সবচেয়ে কম ব্যবহার করা উচিত, তবে আমাদের ব্যায়ামের জন্য আমাদের শ্রমের উপর নির্ভরশীল হতে হবে consequ স্বেচ্ছাসেবী গতিরোধক হিসাবে এই চিকিত্সা কাজ করতে পারেন ডুওর ইউ ফুগিয়েট ন্যূনাল প্যারিয়াটুর এক্সপ্রেসিয়াল সিন্টে কিছুক্ষণ আগেই দেখা যায় না, তবুও এই ঘটনা ঘটে।', 0, '2021-01-05 10:07:48', '2021-02-01 12:44:23'),
(4, 10, NULL, 'Multi Flower', 'মাল্টি ফ্লাওয়ার', 'multi-flower', 'malti-flawar', 'honey-008', 'ফ্লাওয়ার-০০১', 'red', 'সবুজ', '<h2>Nectar that the bees collect comes from different plants.</h2>\r\n\r\n<ul>\r\n	<li><strong>The resulting varieties can vary a lot in flavor and appearance, such as wildflower types.</strong></li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<h2>মৌমাছিরা যে অমৃত সংগ্রহ করে তা বিভিন্ন উদ্ভিদ থেকে আসে।</h2>\r\n\r\n<ul>\r\n	<li><strong>ফলস্বরূপ বিভিন্ন প্রকারের স্বাদ এবং চেহারাতে অনেকগুলি পৃথক হতে পারে, যেমন বন্যফুলের প্রকার।</strong></li>\r\n</ul>', 0, '2021-01-19 02:44:10', '2021-01-29 09:50:23'),
(5, 4, NULL, 'Natural Honey', 'প্রাকৃতিক মধু', 'natural-honey', 'prakrritik-mdhu', 'honey-004', 'প্রাকৃতিক মধু-০০৪', 'red', 'লাল', 'Natural Honey', 'প্রাকৃতিক মধু', 0, '2021-01-29 07:28:23', '2021-01-29 08:55:34'),
(6, 5, NULL, 'Sundarban Honey', 'সুন্দরবনের মধু', 'sundarban-honey', 'sundrbner-mdhu', 'honey-006', 'মধু-006', 'red', 'লাল', 'Sundarban Honey', 'সুন্দরবনের মধু', 0, '2021-01-29 08:24:49', '2021-01-29 08:28:05'),
(7, 6, NULL, 'Forest Honey', 'বনের মধু', 'forest-honey', 'bner-mdhu', 'honey-007', 'মধু-007', 'red', 'লাল', NULL, NULL, 0, '2021-01-29 08:27:08', '2021-01-29 08:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `weight_en` varchar(255) NOT NULL,
  `weight_bn` varchar(255) NOT NULL,
  `sku_en` varchar(255) DEFAULT NULL,
  `sku_bn` varchar(255) DEFAULT NULL,
  `sale_price_en` decimal(8,2) DEFAULT NULL,
  `sale_price_bn` varchar(50) DEFAULT NULL,
  `pur_price_en` decimal(8,2) DEFAULT NULL,
  `qty_en` decimal(8,2) DEFAULT NULL,
  `stock_en` decimal(8,2) DEFAULT NULL,
  `total_price_en` decimal(8,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `weight_en`, `weight_bn`, `sku_en`, `sku_bn`, `sale_price_en`, `sale_price_bn`, `pur_price_en`, `qty_en`, `stock_en`, `total_price_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '250 gm', '২৫০ গ্রাম', '715248', '715248', 325.00, '২৫০', 225.00, 0.00, 0.00, NULL, NULL, '2021-01-05 10:14:40', '2021-01-29 05:23:07'),
(2, 1, '500 gm', '৫০০ গ্রাম', '765173', '765173', 750.00, '৫০০', 450.00, 10.00, 10.00, NULL, NULL, '2021-01-05 10:14:41', '2021-01-29 05:50:33'),
(3, 2, '250 gm', '২৫০ গ্রাম', '810401', '810401', 290.00, '২৫০', 200.00, 10.00, 10.00, NULL, NULL, '2021-01-05 10:16:16', '2021-01-29 05:19:42'),
(4, 2, '500 gm', '৫০০ গ্রাম', '631290', '631290', 560.00, '৫০০', 400.00, 10.00, 10.00, NULL, NULL, '2021-01-05 10:16:16', '2021-01-29 05:21:03'),
(5, 4, '100gm', '১০০গ্রাম', '854892', '854892', 100.00, '১০০', 90.00, 10.00, 10.00, NULL, NULL, '2021-01-19 02:46:56', '2021-01-29 07:26:17'),
(6, 4, '250 gm', '২৫০ গ্রাম', '828616', '828616', 250.00, '২৫০', 200.00, 10.00, 10.00, NULL, NULL, '2021-01-19 02:46:56', '2021-01-19 02:46:56'),
(7, 4, '500 gm', '৫০০ গ্রাম', '806650', '806650', 500.00, '৫০০', 450.00, 10.00, 10.00, NULL, NULL, '2021-01-19 02:46:56', '2021-01-19 02:46:56'),
(8, 4, '1 kg', '১ কেজি', '548063', '548063', 750.00, '৭৫০', 700.00, 10.00, 10.00, NULL, NULL, '2021-01-19 02:46:56', '2021-01-19 02:46:56'),
(9, 2, '700gm', '700gm', '956191', '956191', 950.00, '950', 750.00, 1.00, 1.00, NULL, NULL, '2021-01-29 05:39:54', '2021-01-29 05:39:54'),
(10, 2, '1kg', '1kg', '486109', '486109', 1090.00, '1090', 750.00, 1.00, 1.00, NULL, NULL, '2021-01-29 05:42:13', '2023-12-06 00:47:09'),
(11, 1, '750gm', '750gm', '314349', '314349', 1050.00, '1050', 750.00, 1.00, 1.00, NULL, NULL, '2021-01-29 05:52:03', '2021-01-29 05:52:03'),
(12, 1, '1kg', '1kg', '799447', '799447', 1300.00, '1300', 1000.00, 1.00, 1.00, NULL, NULL, '2021-01-29 06:27:57', '2021-01-29 06:32:21'),
(13, 5, '250gm', '250gm', '920845', '920845', 175.00, '175', 125.00, 4.00, 4.00, NULL, NULL, '2021-01-29 08:03:24', '2021-01-29 08:03:24'),
(14, 5, '500gm', '500gm', '700135', '700135', 325.00, '325', 275.00, 2.00, 2.00, NULL, NULL, '2021-01-29 08:05:35', '2021-01-29 08:05:35'),
(15, 5, '1kg', '1kg', '853592', '853592', 625.00, '625', 375.00, 1.00, 1.00, NULL, NULL, '2021-01-29 08:08:53', '2021-01-29 08:08:53'),
(16, 5, '100gm', '3kg', '230301', '230301', 95.00, '1650', 60.00, 10.00, 10.00, NULL, NULL, '2021-01-29 08:09:50', '2021-01-30 08:59:18'),
(17, 3, '250gm', '250gm', '335847', '335847', 325.00, '325', 275.00, 4.00, 4.00, NULL, NULL, '2021-01-29 10:13:11', '2021-01-29 10:16:55'),
(18, 3, '700gm', '500gm', '159905', '159905', 1050.00, '650', 850.00, 1.00, 1.00, NULL, NULL, '2021-01-29 10:18:23', '2021-01-30 08:40:42'),
(19, 3, '600gm', '750gm', '647721', '647721', 950.00, '750', 750.00, 1.00, 1.00, NULL, NULL, '2021-01-29 10:19:04', '2021-01-30 08:39:57'),
(20, 3, '1kg', '1kg', '417147', '417147', 1300.00, '1300', 1000.00, 1.00, 1.00, NULL, NULL, '2021-01-29 10:19:47', '2021-01-29 10:19:47'),
(21, 6, '100gm', '100gm', '362859', '362859', 120.00, '120', 90.00, 10.00, 10.00, NULL, NULL, '2021-01-29 10:21:41', '2021-01-29 10:21:41'),
(22, 6, '250gm', '250gm', '211687', '211687', 275.00, '275', 225.00, 4.00, 4.00, NULL, NULL, '2021-01-29 10:22:47', '2021-01-29 10:22:47'),
(23, 6, '500gm', '500gm', '616456', '616456', 550.00, '550', 450.00, 2.00, 2.00, NULL, NULL, '2021-01-29 10:23:24', '2021-01-29 10:23:24'),
(24, 6, '1kg', '1kg', '533954', '533954', 1050.00, '1050', 750.00, 1.00, 1.00, NULL, NULL, '2021-01-29 10:23:59', '2021-01-29 10:23:59'),
(25, 7, '250gm', '250gm', '274559', '274559', 175.00, '175', 125.00, 4.00, 4.00, NULL, NULL, '2021-01-29 10:25:40', '2021-01-29 10:25:40'),
(26, 7, '500gm', '500gm', '383552', '383552', 325.00, '325', 275.00, 2.00, 2.00, NULL, NULL, '2021-01-29 10:26:17', '2021-01-29 10:26:17'),
(27, 7, '100gm', '100gm', '682421', '682421', 90.00, '90', 70.00, 10.00, 10.00, NULL, NULL, '2021-01-29 10:27:27', '2021-01-29 10:27:27'),
(28, 7, '1kg', '1kg', '899801', '899801', 700.00, '700', 550.00, 1.00, 1.00, NULL, NULL, '2021-01-29 10:28:16', '2021-01-29 10:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_avatars`
--

CREATE TABLE `product_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `front` varchar(255) DEFAULT NULL,
  `back` varchar(255) DEFAULT NULL,
  `left` varchar(255) DEFAULT NULL,
  `right` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_avatars`
--

INSERT INTO `product_avatars` (`id`, `attribute_id`, `product_id`, `front`, `back`, `left`, `right`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '1453045185.jpg', '1893198778.png', '739506073.png', '1928856859.png', 0, '2021-01-05 10:17:39', '2021-01-29 05:28:47'),
(2, 4, 2, '1086545729.jpg', NULL, NULL, NULL, 0, '2021-01-05 10:17:59', '2021-01-29 05:36:49'),
(3, 2, 1, '1553115616.jpg', NULL, NULL, NULL, 0, '2021-01-05 10:19:24', '2021-01-29 06:26:38'),
(4, 1, 1, '391202334.jpg', NULL, NULL, NULL, 0, '2021-01-05 10:19:35', '2021-01-29 05:48:13'),
(5, 5, 4, '1829600605.jpg', NULL, NULL, NULL, 0, '2021-01-19 02:49:12', '2021-01-30 09:59:11'),
(6, 6, 4, '1203821016.jpg', NULL, NULL, NULL, 0, '2021-01-19 02:49:30', '2021-01-30 09:47:11'),
(7, 7, 4, '1116943469.jpg', NULL, NULL, NULL, 0, '2021-01-19 02:50:14', '2021-01-30 09:52:01'),
(8, 8, 4, '21599578.jpg', NULL, NULL, NULL, 0, '2021-01-19 02:52:10', '2021-01-29 08:35:45'),
(9, 9, 2, '58103428.jpg', NULL, NULL, NULL, 0, '2021-01-29 05:40:27', '2021-01-29 05:40:27'),
(11, 10, 2, '559569319.jpg', NULL, NULL, NULL, 0, '2021-01-29 05:42:47', '2021-01-29 05:42:47'),
(12, 11, 1, '178617687.jpg', NULL, NULL, NULL, 0, '2021-01-29 06:13:52', '2021-01-29 06:13:52'),
(14, 12, 1, '705536689.jpg', NULL, NULL, NULL, 0, '2021-01-29 06:28:21', '2021-01-29 06:28:21'),
(15, 13, 5, '395605355.jpg', NULL, NULL, NULL, 0, '2021-01-29 08:16:12', '2021-01-29 08:16:12'),
(16, 22, 6, '159424187.jpg', NULL, NULL, NULL, 0, '2021-01-29 10:30:14', '2021-01-29 10:30:14'),
(19, 26, 7, '1500173308.jpg', NULL, NULL, NULL, 0, '2021-01-29 10:34:00', '2021-01-29 10:34:00'),
(20, 19, 3, '814007998.jpg', NULL, NULL, NULL, 0, '2021-01-29 10:38:15', '2021-01-29 10:38:15'),
(24, 18, 3, '966683829.jpg', NULL, NULL, NULL, 0, '2021-01-30 08:41:40', '2021-01-30 08:41:40'),
(25, 20, 3, '2068839669.jpg', NULL, NULL, NULL, 0, '2021-01-30 08:49:18', '2021-01-30 08:49:18'),
(26, 17, 3, '1202218335.jpg', NULL, NULL, NULL, 0, '2021-01-30 08:52:39', '2021-01-30 08:52:39'),
(27, 16, 5, '941111125.jpg', NULL, NULL, NULL, 0, '2021-01-30 08:58:22', '2021-01-30 08:58:22'),
(28, 14, 5, '2081658521.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:04:26', '2021-01-30 09:04:26'),
(29, 15, 5, '872251965.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:18:54', '2021-01-30 09:18:54'),
(30, 24, 6, '1827590603.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:22:44', '2021-01-30 09:22:44'),
(31, 23, 6, '1662512796.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:23:12', '2021-01-30 09:23:12'),
(32, 21, 6, '1261332254.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:25:31', '2021-01-30 09:25:31'),
(33, 27, 7, '217336186.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:34:10', '2021-01-30 09:34:10'),
(34, 28, 7, '774330390.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:42:23', '2021-01-30 09:42:23'),
(35, 25, 7, '2044063083.jpg', NULL, NULL, NULL, 0, '2021-01-30 09:42:38', '2021-01-30 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_bn` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_en` text DEFAULT NULL,
  `address_bn` text DEFAULT NULL,
  `contact_en` varchar(255) DEFAULT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twitt_link` varchar(255) DEFAULT NULL,
  `tube_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title_en`, `title_bn`, `logo`, `description_en`, `description_bn`, `email`, `address_en`, `address_bn`, `contact_en`, `contact_bn`, `fb_link`, `twitt_link`, `tube_link`, `insta_link`, `created_at`, `updated_at`) VALUES
(1, 'Pili-Honey', 'পিলি-মধু', '1335255111.gif', 'Our main objective is to deliver the real honey including honey comb to the customer. \r\nWe are committed to ensure that 100 per cent healthful pure honey is delivered directly to our esteemed consumers by paying fair remuneration to the people working directly in the field.', 'চাকসহ আসল মধূ গ্রাহকের নিকট পৌছে দেয়াই হলো আমাদের মূল উদ্দেশ্য। সরাসরি  মাঠ পর্যায়ে মধু সংগ্রহে কর্মরত ব্যক্তিগণকে তাদের ন্যায্য পারিশ্রমিক প্রদানের মধ্যমে 100 ভাগ স্বাস্থ্য সম্মত ভাবে খাঁটি মধু সংগ্রহ করে তা আমাদের সম্মানীত ভোক্তাগনের নিকট যথাযথ ভাবে পৌছিয়ে দিতে আমরা বদ্ধ পরিকর।', 'gloriousbangla24@gmail.com', '231 (first floor), Concept Tower, 68-69 Green Road, Panthapath, Dhaka-1205', '231 (প্রথম তল), কনসেপ্ট টাওয়ার, 68-69 গ্রিন রোড, পান্থপথ, ঢকা -1205', '01713 43 20 10', '01713 43 20 10', 'https://www.facebook.com/pilihoneybd/', NULL, 'https://www.youtube.com/pilihoney?fbclid=IwAR0cAJiJAkKInww_9oh6Jw2jLnTM__BwjYaXxKy5nPhnHPE_oKkT1b63dnE', NULL, '2021-01-13 09:34:50', '2021-01-21 08:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `site_metas`
--

CREATE TABLE `site_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` int(11) NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_des_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_des_bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_metas`
--

INSERT INTO `site_metas` (`id`, `page_name`, `title_en`, `title_bn`, `meta_name_en`, `meta_name_bn`, `meta_des_en`, `meta_des_bn`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'test', 'test', 'test', 'test', 'test', '2021-10-16 06:41:39', '2021-10-16 08:37:17'),
(2, 3, 'Raw Honey', 'test', 'test', 'test', 'test', 'test', '2021-10-16 07:16:04', '2021-10-16 07:16:04'),
(3, 1, 'Raw Honey', 'প্রকৃতির মিষ্টি', 'test', 'test', 'test', 'test', '2021-10-16 07:21:54', '2021-10-16 07:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `social_activites`
--

CREATE TABLE `social_activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_bn` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_activites`
--

INSERT INTO `social_activites` (`id`, `title_en`, `title_bn`, `image`, `description_en`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Relief distribution...', 'ত্রান বিত্রন...', '995399659.jpg', '<ul>\r\n	<li>Disaster response activities include, search and rescue operations, first aid medical attention, distribution of critical relief supplies and restoration</li>\r\n	<li>Disaster response activities include, search and rescue operations, first aid medical attention, distribution of critical relief supplies and restoration</li>\r\n	<li>Disaster response activities include, search and rescue operations, first aid medical attention, distribution of critical relief supplies and restoration</li>\r\n</ul>', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>দুর্যোগ প্রতিক্রিয়ামূলক ক্রিয়াকলাপগুলির মধ্যে রয়েছে, অনুসন্ধান এবং উদ্ধার কাজ, প্রাথমিক চিকিত্সার চিকিত্সা যত্ন, গুরুতর ত্রাণ সরবরাহ বিতরণ এবং পুনরুদ্ধার</li>\r\n	<li>দুর্যোগ প্রতিক্রিয়ামূলক ক্রিয়াকলাপগুলির মধ্যে রয়েছে, অনুসন্ধান এবং উদ্ধার কাজ, প্রাথমিক চিকিত্সার চিকিত্সা যত্ন, গুরুতর ত্রাণ সরবরাহ বিতরণ এবং পুনরুদ্ধার</li>\r\n	<li>দুর্যোগ প্রতিক্রিয়ামূলক ক্রিয়াকলাপগুলির মধ্যে রয়েছে, অনুসন্ধান এবং উদ্ধার কাজ, প্রাথমিক চিকিত্সার চিকিত্সা যত্ন, গুরুতর ত্রাণ সরবরাহ বিতরণ এবং পুনরুদ্ধার</li>\r\n</ul>', NULL, '2021-01-10 21:02:37', '2021-01-17 01:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phn_en` varchar(255) DEFAULT NULL,
  `phn_bn` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `address_bn` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `verified` varchar(255) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_en`, `name_bn`, `email`, `phn_en`, `phn_bn`, `address_en`, `address_bn`, `avatar`, `verified`, `verification_token`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', '0987654321', NULL, 'dhaka', NULL, NULL, '1', 'P686WQWfwWfPXXokHB0Wopi8lVjVrpjN', 'admin', NULL, '$2y$10$bNbtJcojYnd9YtqkHkUF2.9wb.DGeRi5xOro.0Vdl20xUxZrcMV5S', NULL, '2021-01-04 10:05:06', '2021-01-04 10:05:06'),
(2, 'sss', NULL, 'sss@gmail.com', '0987654321', NULL, 'dfgdgsdfgfd', NULL, NULL, '1', 'svGkLrlclSkIVKT6eRZPsepjHd8hDWnt', 'user', NULL, '$2y$10$X6UKDzTi648Iq/qB.eqmIexcR8DiMn8Xef3GGuTngfkBa1xq8YAgC', NULL, '2021-01-08 08:01:10', '2021-01-08 08:01:10'),
(5, 'abc', NULL, 'master@gmail.com', '0987654321', NULL, 'gfhfghdfgdfg', NULL, NULL, '1', 'zvR7Z8MBaWHokrHOaSnIxvoUDHtfO4Jz', 'user', NULL, '$2y$10$v1jLODuYEmOGEg66NtGfwOtr01WsE1A5NAIiyX.vjir84Fq7UWc/S', NULL, '2021-01-08 08:05:54', '2021-01-08 08:05:54'),
(6, 'HectorRet', NULL, 'batley.f@aol.com', '87666284275', NULL, 'https://zeenite.com/videos/13949/vampire-bites-multiple-girls/', NULL, NULL, '1', 'SpRjD4WEkYXXZbYstxN6x3lh3EsldEOU', 'user', NULL, '$2y$10$bjmiAufWqPVEVOjogd6XROW.VS6xhD6dxtTPcToRAJGRbn0KeNLW.', NULL, '2022-01-31 08:35:52', '2022-01-31 08:35:52'),
(7, 'HectorRet', NULL, 'appleyard_cavalieri@email.com', '85156452947', NULL, 'https://gay0day.com/search/office-gay/', NULL, NULL, '1', '7p5h0nA1TRHYgpQvAoi6yJ0c59cQrTtj', 'user', NULL, '$2y$10$hs09HsZSBkh/6h96JbvJmOiylw2l8CWFOmqub8lcHh7jsXA56iuhm', NULL, '2022-03-03 23:39:24', '2022-03-03 23:39:24'),
(8, 'mohammad saad', NULL, 'mdshiponpwad@gmail.com', '01571254975', NULL, 'panthapath,Dhaka-2000', NULL, NULL, '1', 'Ac1XubwY2Ue5HRNr9wnDlNy8Vvd9eaPh', 'user', NULL, '$2y$10$FLrLIvheEDELqnE/cSStiOkIexk2PTtGyuKb.3lxwGmSSKH.YBe4S', NULL, '2023-12-03 11:40:08', '2023-12-05 11:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_en_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_category_en_id_foreign` (`category_id`),
  ADD KEY `banners_category_bn_id_foreign` (`category_bn_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_en_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_no_unique` (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_bn_id_foreign` (`category_id`),
  ADD KEY `products_category_en_id_foreign` (`category_en_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_avatars`
--
ALTER TABLE `product_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_avatars_attribute_id_foreign` (`attribute_id`),
  ADD KEY `product_avatars_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_metas`
--
ALTER TABLE `site_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_activites`
--
ALTER TABLE `social_activites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_list_product_en_id_foreign` (`product_en_id`),
  ADD KEY `wish_list_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_avatars`
--
ALTER TABLE `product_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_metas`
--
ALTER TABLE `site_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_activites`
--
ALTER TABLE `social_activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_category_bn_id_foreign` FOREIGN KEY (`category_bn_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `banners_category_en_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_en_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_bn_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_category_en_id_foreign` FOREIGN KEY (`category_en_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_avatars`
--
ALTER TABLE `product_avatars`
  ADD CONSTRAINT `product_avatars_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`),
  ADD CONSTRAINT `product_avatars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_product_en_id_foreign` FOREIGN KEY (`product_en_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wish_list_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
