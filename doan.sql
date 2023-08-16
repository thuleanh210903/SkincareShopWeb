-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2023 at 02:53 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id_cate_post` int NOT NULL,
  `cate_post_name` varchar(255) NOT NULL,
  `cate_post_status` int NOT NULL,
  `cate_post_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id_cate_post`, `cate_post_name`, `cate_post_status`, `cate_post_desc`) VALUES
(1, 'Skincare tips', 1, 'Good for your skin');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id_category_product` int NOT NULL,
  `name_category_product` varchar(255) NOT NULL,
  `show` tinyint(1) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id_category_product`, `name_category_product`, `show`, `image`) VALUES
(10, 'Cleanser', 1, 'cleanser1679659539.png'),
(11, 'Mask', 1, 'mask1679659784.png'),
(12, 'Remover', 1, 'remover1679659799.png'),
(13, 'Suncream', 1, 'suncream1679659815.png'),
(14, 'Serum', 1, 'suncream16796598151679905584.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int UNSIGNED NOT NULL,
  `admin` int UNSIGNED NOT NULL,
  `idUsers` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_product` int NOT NULL,
  `parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `admin`, `idUsers`, `created_at`, `updated_at`, `id_product`, `parent_id`) VALUES
(2, 1, 11, '2022-12-16 09:48:48', '2022-12-16 09:48:48', 18, 0),
(3, 1, 11, '2022-12-16 10:29:30', '2022-12-16 10:29:30', 1, 0),
(6, 1, 11, '2022-12-16 11:03:17', '2022-12-16 11:03:17', 1, 3),
(7, 1, 11, '2022-12-16 11:26:21', '2022-12-16 11:26:21', 1, 3),
(8, 1, 11, '2022-12-16 11:26:53', '2022-12-16 11:26:53', 1, 0),
(9, 1, 11, '2022-12-16 11:42:32', '2022-12-16 11:42:32', 1, 3),
(10, 1, 11, '2022-12-16 12:09:12', '2022-12-16 12:09:12', 1, 3),
(11, 1, 11, '2022-12-16 12:58:00', '2022-12-16 12:58:00', 10, 0),
(12, 1, 11, '2022-12-17 14:14:12', '2022-12-17 14:14:12', 22, 0),
(13, 1, 11, '2022-12-17 14:17:25', '2022-12-17 14:17:25', 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_content`
--

CREATE TABLE `comment_content` (
  `id` int UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idContact` int UNSIGNED NOT NULL,
  `idAuthur` int UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_content`
--

INSERT INTO `comment_content` (`id`, `content`, `idContact`, `idAuthur`, `seen`, `created_at`, `updated_at`) VALUES
(1, '123', 2, 11, 0, '2022-12-16 09:48:48', '2022-12-16 09:48:48'),
(2, '123', 3, 11, 0, '2022-12-16 10:29:30', '2022-12-16 10:29:30'),
(5, '123', 6, 1, 0, '2022-12-16 11:03:17', '2022-12-16 11:03:17'),
(6, '123123', 7, 1, 0, '2022-12-16 11:26:21', '2022-12-16 11:26:21'),
(7, '???', 8, 11, 0, '2022-12-16 11:26:53', '2022-12-16 11:26:53'),
(8, 'cc', 9, 1, 0, '2022-12-16 11:42:32', '2022-12-16 11:42:32'),
(9, 'hi', 10, 1, 0, '2022-12-16 12:09:12', '2022-12-16 12:09:12'),
(10, 'hii', 11, 11, 0, '2022-12-16 12:58:00', '2022-12-16 12:58:00'),
(11, 'good', 12, 11, 0, '2022-12-17 14:14:12', '2022-12-17 14:14:12'),
(12, 'hmm', 13, 11, 0, '2022-12-17 14:17:25', '2022-12-17 14:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_time` int DEFAULT NULL,
  `coupon_number` int NOT NULL,
  `coupon_condition` int NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `coupon_name`, `coupon_time`, `coupon_number`, `coupon_condition`, `coupon_code`, `date_start`, `date_end`) VALUES
(16, 'Aniversary', NULL, 15, 0, 'A111', '2022-11-24', '2022-11-25'),
(17, 'Aniversary', 30, 15, 0, 'A123', '2022-11-18', '2022-11-22'),
(18, 'Aniversary', 30, 15, 0, 'A122', '2022-11-01', '2022-11-27'),
(19, 'Aniversary', 30, 15, 0, 'A1111', '2022-11-29', '2022-12-04'),
(20, 'Aniversary', 12, 15000, 1, 'ffh', '2023-05-19', '2023-05-21'),
(21, 'Christmas', 255, 15, 1, 'AAA', '2023-08-16', '2023-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int NOT NULL,
  `gallery_name` text NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_11_040657_create_tb_user_table', 1),
(3, '2022_11_22_133155_create_product_table', 1),
(4, '2022_12_16_145519_create_comment_table', 1),
(5, '2022_12_16_145934_create_comment_content_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `order_status` int NOT NULL,
  `order_total` double NOT NULL,
  `order_date` datetime NOT NULL,
  `id_shipping` int NOT NULL,
  `id_coupon` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `order_status`, `order_total`, `order_date`, `id_shipping`, `id_coupon`, `user_id`) VALUES
(63, 0, 181, '2022-12-01 00:02:22', 24, 0, 0),
(64, 0, 199, '2022-12-01 00:23:52', 25, 0, 0),
(65, 0, 199, '2022-12-01 00:25:33', 26, 0, 0),
(66, 0, 199, '2022-12-01 00:32:03', 27, 0, 0),
(67, 0, 199, '2022-12-01 00:32:52', 28, 0, 0),
(68, 0, 199, '2022-12-01 00:48:02', 29, 0, 0),
(128, 1, 150000, '2023-05-16 22:42:16', 123, 0, 0),
(129, 0, 419985, '2023-05-17 06:22:48', 124, 0, 0),
(134, 0, 149985, '2023-05-17 09:34:11', 129, 0, 0),
(135, 0, 149985, '2023-05-17 10:50:21', 130, 0, 0),
(136, 1, 150000, '2023-05-18 11:00:15', 131, 0, 0),
(137, 0, 300000, '2023-05-19 07:57:15', 132, 0, 0),
(138, 0, 135000, '2023-05-19 08:30:51', 133, 0, 0),
(139, 1, 185000, '2023-05-19 11:17:12', 134, 0, 0),
(140, 1, 363, '2023-08-16 19:02:02', 138, NULL, 45),
(141, 0, 121, '2023-08-16 21:45:42', 139, NULL, 46);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_product`, `product_name`, `price`, `quantity`) VALUES
(6, 51, 1, 'Cetaphil', 100000, 6),
(7, 52, 1, 'Cetaphil', 100000, 1),
(8, 53, 10, 'Nivea', 100000, 1),
(9, 54, 10, 'Nivea', 100000, 1),
(10, 55, 10, 'Nivea', 100000, 1),
(11, 56, 10, 'Nivea', 100000, 1),
(12, 57, 5, 'Laneigh', 150000, 1),
(13, 58, 5, 'Laneigh', 150000, 1),
(14, 59, 5, 'Laneigh', 150000, 1),
(15, 60, 5, 'Laneigh', 150000, 1),
(16, 61, 5, 'Laneigh', 150000, 1),
(17, 62, 5, 'Laneigh', 150000, 1),
(18, 63, 5, 'Laneigh', 150000, 1),
(19, 67, 5, 'Laneigh', 150000, 1),
(20, 67, 3, 'Acne', 15000, 1),
(21, 70, 5, 'Laneigh', 150000, 1),
(22, 70, 3, 'Acne', 15000, 1),
(23, 71, 18, 'Rosea Crystal', 150, 2),
(24, 73, 18, 'Rosea Crystal', 150, 1),
(25, 74, 18, 'Rosea Crystal', 150, 1),
(26, 75, 18, 'Rosea Crystal', 150, 1),
(27, 76, 18, 'Rosea Crystal', 150, 1),
(28, 77, 18, 'Rosea Crystal', 150, 1),
(29, 78, 18, 'Rosea Crystal', 150, 1),
(30, 79, 18, 'Rosea Crystal', 150, 1),
(31, 80, 3, 'Acne', 15000, 1),
(32, 81, 1, 'Cetaphil', 100000, 1),
(33, 82, 22, 'Laneige', 120000, 2),
(34, 140, 30, 'Sulwhasoo', 150000, 1),
(35, 140, 27, 'Laneigh', 150000, 1),
(36, 141, 26, 'Aloe Soothing Sun Cream', 100000, 1);

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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int NOT NULL,
  `post_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_cate_post` int NOT NULL,
  `post_sum` text NOT NULL,
  `post_meta_desc` text NOT NULL,
  `post_status` int NOT NULL,
  `post_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `post_title`, `content`, `id_cate_post`, `post_sum`, `post_meta_desc`, `post_status`, `post_image`) VALUES
(5, 'Skincare tips for your skin', '<h3>&nbsp;</h3>\r\n\r\n<h3>1. Protect yourself from the sun</h3>\r\n\r\n<p>One of the most important ways to take care of your skin is to protect it from the sun. A lifetime of sun exposure can cause wrinkles, age spots and other skin problems &mdash; as well as increase the risk of skin cancer.</p>\r\n\r\n<p>For the most complete sun protection:</p>\r\n\r\n<ul>\r\n	<li><strong>Use sunscreen.</strong>&nbsp;Use a broad-spectrum sunscreen with an SPF of at least 15. Apply sunscreen generously, and reapply every two hours &mdash; or more often if you&#39;re swimming or perspiring.</li>\r\n	<li><strong>Seek shade.</strong>&nbsp;Avoid the sun between 10 a.m. and 4 p.m., when the sun&#39;s rays are strongest.</li>\r\n	<li><strong>Wear protective clothing.</strong>&nbsp;Cover your skin with tightly woven long-sleeved shirts, long pants and wide-brimmed hats. Also consider laundry additives, which give clothing an additional layer of ultraviolet protection for a certain number of washings, or special sun-protective clothing &mdash; which is specifically designed to block ultraviolet rays.</li>\r\n</ul>\r\n\r\n<h3>2. Don&#39;t smoke</h3>\r\n\r\n<p>Smoking makes your skin look older and contributes to wrinkles. Smoking narrows the tiny blood vessels in the outermost layers of skin, which decreases blood flow and makes skin paler. This also depletes the skin of oxygen and nutrients that are important to skin health.</p>\r\n\r\n<p>Smoking also damages collagen and elastin &mdash; the fibers that give your skin strength and elasticity. In addition, the repetitive facial expressions you make when smoking &mdash; such as pursing your lips when inhaling and squinting your eyes to keep out smoke &mdash; can contribute to wrinkles.</p>\r\n\r\n<p>In addition, smoking increases your risk of squamous cell skin cancer. If you smoke, the best way to protect your skin is to quit. Ask your doctor for tips or treatments to help you stop smoking.</p>\r\n\r\n<h3>3. Treat your skin gently</h3>\r\n\r\n<p>Daily cleansing and shaving can take a toll on your skin. To keep it gentle:</p>\r\n\r\n<ul>\r\n	<li><strong>Limit bath time.</strong>&nbsp;Hot water and long showers or baths remove oils from your skin. Limit your bath or shower time, and use warm &mdash; rather than hot &mdash; water.</li>\r\n	<li><strong>Avoid strong soaps.</strong>&nbsp;Strong soaps and detergents can strip oil from your skin. Instead, choose mild cleansers.</li>\r\n	<li><strong>Shave carefully.</strong>&nbsp;To protect and lubricate your skin, apply shaving cream, lotion or gel before shaving. For the closest shave, use a clean, sharp razor. Shave in the direction the hair grows, not against it.</li>\r\n	<li><strong>Pat dry.</strong>&nbsp;After washing or bathing, gently pat or blot your skin dry with a towel so that some moisture remains on your skin.</li>\r\n	<li><strong>Moisturize dry skin.</strong>&nbsp;If your skin is dry, use a moisturizer that fits your skin type. For daily use, consider a moisturizer that contains SPF.</li>\r\n</ul>\r\n\r\n<h3>4. Eat a healthy diet</h3>\r\n\r\n<p>A healthy diet can help you look and feel your best. Eat plenty of fruits, vegetables, whole grains and lean proteins. The association between diet and acne isn&#39;t clear &mdash; but some research suggests that a diet rich in fish oil or fish oil supplements and low in unhealthy fats and processed or refined carbohydrates might promote younger looking skin. Drinking plenty of water helps keep your skin hydrated.</p>\r\n\r\n<h3>5. Manage stress</h3>\r\n\r\n<p>Uncontrolled stress can make your skin more sensitive and trigger acne breakouts and other skin problems. To encourage healthy skin &mdash; and a healthy state of mind &mdash; take steps to manage your stress. Get enough sleep, set reasonable limits, scale back your to-do list and make time to do the things you enjoy. The results might be more dramatic than you expect.</p>', 1, '<p>Good skin care &mdash; including sun protection and gentle cleansing &mdash; can keep your skin healthy and glowing.</p>', '<p>Don&#39;t have time for intensive skin care? You can still pamper yourself by acing the basics. Good skin care and healthy lifestyle choices can help delay natural aging and prevent various skin problems. Get started with these five no-nonsense tips.</p>', 1, 'Morning-Routine21671293557.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `show_product` int NOT NULL,
  `price` double NOT NULL,
  `describe_product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category_product` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `number`, `show_product`, `price`, `describe_product`, `id_category_product`, `created_at`, `updated_at`, `product_image`) VALUES
(26, 'Aloe Soothing Sun Cream', 13, 0, 100000, 'Sun-moisturizer: The aloe soothing sun cream is similar to a light moisturizer unlike other sunblocks that leave the skin dry and stripped Key Ingredient Aloe Arborescens Leaf Extract soothes and moisturizes skin at the same time', 13, NULL, NULL, '41JGrbwwqDL35.jpg'),
(27, 'Laneigh', 13, 0, 150000, 'Water Sleeping Mask', 11, NULL, NULL, '1612321739728-kem-duong-da-laneige-water-bank-cream-moisture-ex-01-600x60083.png'),
(29, 'EGF', 13, 0, 100000, 'Balll', 14, NULL, NULL, 'drceutics-serum-egf-30g59.png'),
(30, 'Sulwhasoo', 1000, 0, 150000, 'Gentle Cleansing Foam Mousse Netioyante douceur', 10, NULL, NULL, 'fileAsset85.jpg'),
(31, 'Real Hyaluronic Ampoule', 13, 0, 100000, '<p>One day one drop</p>', 14, NULL, NULL, 'one-day-one-drop-real-hyaluronic-ampoule50.jpg'),
(32, 'Some by mi', 13, 1, 150000, '<p>Mineral Calming</p>', 13, NULL, NULL, '840b2b48f8cc822ccb781d087eae0eb268.jpg'),
(33, 'Purito', 100, 0, 100000, '<p>hmm</p>', 13, NULL, NULL, '38c8188bd66d1474f8d729f5fe8e365392.png'),
(34, 'Aveda', 12, 0, 120000, '<p>Shampoo</p>', 10, NULL, NULL, '21640223.jpg'),
(35, 'Fresh', 100, 1, 100000, 'Sugar Strawberry', 10, NULL, NULL, '89c58f7c550cc6ce5f9eb4c4ef41c3a51679906204.jpg'),
(36, 'Simple', 25, 1, 100000, '<p>dfdgdgdhrthv</p>', 10, NULL, NULL, 'cleanser1684284867.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id_product` int NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id_product`, `image`) VALUES
(22, '1671299252_510wajKkEFL._SL1000_.jpg'),
(22, '1671299252_my-pham-simple-9.jpeg'),
(23, '1671306219_1671299252_510wajKkEFL._SL1000_.jpg'),
(23, '1671306219_1671299252_my-pham-simple-9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `idComment` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id_shipping` int NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id_shipping`, `shipping_address`, `shipping_name`, `shipping_phone`, `shipping_note`) VALUES
(18, 'Tam Ky', 'Lê Anh Thư', '12345', 'không'),
(103, 'tâm kỳ', 'lê anh thư', '123456', 'ko'),
(104, 'tk', 'thu', '123', 'ko'),
(105, 'tam kỳ ', 'thu', '12345', 'ko'),
(106, 'tam kỳ', 'thư ', '12345', 'ko'),
(107, 'tam kỳ ', 'thư', '12345', 'ko'),
(108, 'tam kỳ', 'thu', '123456', 'ko'),
(109, 'wrhwthjwt', 'wrhtwhwt', 'wtjwtjwte', 'we wtjwt'),
(110, 'fafhtanstn', 'twjsgjgsjs', 'ahfajsfjs', 'fnafn'),
(111, 'hdabarharha', 'sfjsgnstjw', 'dảnatnha', 'rahafhaf'),
(112, 'gĩiyoucpi', 'guofpufpu', 'youfouc', 'xjgih'),
(113, 'agnsgnsgj', 'fhafnatnw', 'fsnsfnwtjq', 'fbafnqr'),
(114, 'gndgnsgnsf', 'twhetjet', 'nsgnstnwtjwr', 'rhqrhwrhw'),
(115, 'gvh', 'thu', 'fghy', 'edthh'),
(116, 'th rh thì rh', 'Trung Yên ', 'gếnggb', 'wrhwtbnet'),
(117, 'thư', 'thư', 'thư', 'thư'),
(118, 'thư', 'thư', 'thư', 'thư'),
(119, 'wthwtjwtjtw', 'tẹdyntente', 'adbadbrqhqrh', 'fabafbwf'),
(120, 'áhrwjjwt', 'wthtjwtjwt', 'hfanafjatja', 'dbafhafba'),
(121, 'thu', 'thu', 'thu', 'thu'),
(122, 'Quang Nam', 'Le Anh Thu', '12345', 'khong'),
(123, 'tam kỳ', 'thule', '12345', 'ko'),
(124, 'tam kỳ', 'Thư', '123456', 'ko'),
(125, 'twjstj', 'dhhfa', 'gewtjetj', 'nsfnsf'),
(126, 'hrhrrh', 'thubf', 'hdbrhr', 'dbbdb'),
(127, 'gdksgjgsj', 'srjtjar', 'fshfjar', 'fbafh'),
(128, 'nfndbd', 'rgehrh', 'bdbdbdn', 'đbbsb'),
(129, 'tam kỳ', 'Thư', '12345', 'ko'),
(130, 'Tam Kỳ', 'Lê Anh Thư', '12345', 'không'),
(131, 'twhwtjt', 't', '12345', 'qrab'),
(132, 'tam kỳ', 'thư', '12345', 'ko'),
(133, 'yhu', 'thu', 'thu', 'ghh'),
(134, 'thud', 'thư', '12345', 'ko'),
(135, 'Tam Ky', 'Lê Anh Thư', '123', 'không'),
(136, 'Tam Ky', 'Lê Anh Thư', '123', 'không'),
(137, 'Tam Ky', 'Lê Anh Thư', '123', 'không'),
(138, 'Tam Ky', 'Lê Anh Thư', '123', 'không'),
(139, '21', 'Lê Anh Thư', '3456789', 'không');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `created_at`, `updated_at`, `address`, `numberphone`, `otp`, `status`, `name`) VALUES
(1, 'Admin', '123', '2022-09-08 17:00:00', '2022-09-08 17:00:00', NULL, NULL, 1231232, 0, ''),
(34, 'thu', '123', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(38, 'thu', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(39, 'thư', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(40, 'viên', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(41, 'thư\n', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(42, 'viên\n', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(43, 'vien', '123456', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(44, 'thư21', '$2y$10$HLr6IOkJ6gqpUY/SJSTb/.JKjqdKJcWxMRTIBqMg6pfhfKKDcdfDe', '2023-08-16 04:36:34', '2023-08-16 04:36:34', NULL, NULL, 181936, 0, 'Lê Anh Thư'),
(45, 'thula.21it@vku.udn.vn', '$2y$10$2uKu4ByCjK2.wDVAPzNZzOIe8OPQNxKPHjcDyMZJG6q9lhGhuJAIO', '2023-08-16 04:38:40', '2023-08-16 04:39:07', NULL, NULL, 271462, 1, 'Lê Anh Thư'),
(46, 'thule210903@gmail.com', '$2y$10$/mcv70oa8ZTwNu0dAp2DH.2duaATZUVki0e7ibR2uB6gr44BvKMfy', '2023-08-16 07:17:50', '2023-08-16 07:18:06', NULL, NULL, 615337, 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id_cate_post`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_content`
--
ALTER TABLE `comment_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `FK_hoadon_khachhang` (`id_order`),
  ADD KEY `FK_chitiet_sanpham` (`id_product`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `FK_post_cate` (`id_cate_post`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id_cate_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment_content`
--
ALTER TABLE `comment_content`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_shipping` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
