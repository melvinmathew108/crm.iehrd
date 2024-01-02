-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 03:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `name`, `status`) VALUES
(1, '2023 -2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activitylogs`
--

CREATE TABLE `activitylogs` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `followup` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitylogs`
--

INSERT INTO `activitylogs` (`id`, `lead_id`, `user_id`, `status_id`, `message`, `created`, `followup`) VALUES
(1, 18, 4, NULL, '<b>robinmon roy</b> created new lead', '2023-11-30 07:09:29', NULL),
(2, 18, 4, NULL, '<b>robinmon roy Edited lead  Details </b>', '2023-11-30 07:31:23', NULL),
(3, 18, 4, NULL, '<b>robinmon roy Edited lead  Details </b>', '2023-11-30 07:31:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `status`) VALUES
(1, 'Thodupuzha', 1),
(2, 'Ernakulam', 1),
(3, 'trissur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 => Active, 2 => Suspend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='products';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'MG University', 1),
(2, 'Kerala University', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cgroups`
--

CREATE TABLE `cgroups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 => Active, 2 => Suspend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cgroups`
--

INSERT INTO `cgroups` (`id`, `name`, `status`) VALUES
(2, 'HOT LEAD', 1),
(3, 'WARM LEAD', 1),
(4, 'COLD LEAD', 1),
(6, 'JUNK', 1),
(7, 'NO RESPONSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`) VALUES
(7, 12, 'Ahmedabad'),
(8, 12, 'Amreli'),
(9, 12, 'Anand'),
(10, 12, 'Banaskantha'),
(11, 12, 'Baroda'),
(12, 12, 'Bharuch'),
(13, 12, 'Bhavnagar'),
(14, 12, 'Dahod'),
(15, 12, 'Dang'),
(16, 12, 'Dwarka'),
(17, 12, 'Gandhinagar'),
(18, 12, 'Jamnagar'),
(19, 12, 'Junagadh'),
(20, 12, 'Kheda'),
(21, 12, 'Kutch'),
(22, 12, 'Mehsana'),
(23, 12, 'Nadiad'),
(24, 12, 'Narmada'),
(25, 12, 'Navsari'),
(26, 12, 'Panchmahals'),
(27, 12, 'Patan'),
(28, 12, 'Porbandar'),
(29, 12, 'Rajkot'),
(30, 12, 'Sabarkantha'),
(31, 12, 'Surat'),
(32, 12, 'Surendranagar'),
(33, 12, 'Vadodara'),
(34, 12, 'Valsad'),
(35, 12, 'Vapi');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cgroup_id` int(11) DEFAULT NULL,
  `bookmark` int(1) NOT NULL DEFAULT 0 COMMENT '0->No, 1->Yes',
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `insta` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `customization` text DEFAULT NULL,
  `discount_offer` decimal(10,0) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_website` varchar(100) DEFAULT NULL,
  `company_facebook` varchar(100) DEFAULT NULL,
  `company_twitter` varchar(100) DEFAULT NULL,
  `company_insta` varchar(100) DEFAULT NULL,
  `company_linkedin` varchar(100) DEFAULT NULL,
  `company_trade` varchar(100) DEFAULT NULL,
  `company_phone` varchar(100) DEFAULT NULL,
  `company_industry` varchar(200) DEFAULT NULL,
  `company_strength` varchar(200) DEFAULT NULL,
  `private_note` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `city_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cost` float(8,2) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `touch_date` date NOT NULL,
  `final_status` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `models` varchar(255) NOT NULL,
  `invoice_value` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `academic_id` int(11) NOT NULL DEFAULT 1,
  `course_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `country_id`, `state_id`, `city_id`, `source_id`, `status_id`, `type_id`, `user_id`, `cgroup_id`, `bookmark`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, `facebook`, `twitter`, `insta`, `linkedin`, `company_name`, `customization`, `discount_offer`, `address`, `company_email`, `company_website`, `company_facebook`, `company_twitter`, `company_insta`, `company_linkedin`, `company_trade`, `company_phone`, `company_industry`, `company_strength`, `private_note`, `created`, `modified`, `city_name`, `product_id`, `cost`, `lead_id`, `touch_date`, `final_status`, `invoice_no`, `models`, `invoice_value`, `brand_name`, `reason`, `academic_id`, `course_id`, `stream_id`) VALUES
(18, 99, 12, 7, 6, 3, 5, 5, 2, 0, 'John doe', NULL, NULL, 'robinmon3618@gmail.com', '9074656202', NULL, NULL, NULL, NULL, NULL, 'goe', NULL, NULL, NULL, 'doe@gmail.com', 'father', NULL, NULL, NULL, NULL, NULL, '9074656202', NULL, NULL, 'test purpose', '2023-11-30 07:09:29', NULL, 'vadodhara', 1, 10000.00, '', '2023-11-30', 0, '', '', '', '', '', 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts_followups`
--

CREATE TABLE `contacts_followups` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `followup_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts_followups`
--

INSERT INTO `contacts_followups` (`id`, `contact_id`, `remark`, `type`, `reply`, `followup_date`) VALUES
(1, 18, 'test purpose', '1', NULL, '2023-11-30 05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_products`
--

CREATE TABLE `contacts_products` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cost` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

CREATE TABLE `core` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gstin` varchar(255) NOT NULL,
  `invoice_prefix` varchar(50) NOT NULL,
  `invoice_start` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `header_logo` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `is_smtp` tinyint(1) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `connection_prefix` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `core`
--

INSERT INTO `core` (`id`, `site_name`, `email`, `phone`, `gstin`, `invoice_prefix`, `invoice_start`, `tax`, `address`, `header_logo`, `logo`, `is_smtp`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `connection_prefix`) VALUES
(1, 'LeadApp', 'robinroyabraham@gmail.com', '9074656202', '', '', 0, 0, '', 'no-image2.png', 'no-image1.png', 1, 'mail.lvfdigital.com', '587', 'robin@lvfdigital.com', 'aq1sw2de3123', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `university_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `status`, `university_id`) VALUES
(1, 'B tech', 1, 1),
(2, 'MA', 1, 1),
(3, 'BA', 2, 1),
(4, 'M Tech', 1, 1),
(5, 'B A', 1, 2),
(6, 'M tech', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Thiruvananthapuram'),
(4, 'Kollam'),
(5, 'Alappuzha'),
(6, 'Ernakulam'),
(7, 'Idukki'),
(8, 'Kannur'),
(9, 'Kasaragod'),
(10, 'Kottayam'),
(11, 'Kozhikode'),
(12, 'Malappuram'),
(13, 'Palakkad'),
(14, 'Pathanamthitta'),
(15, 'Thrissur'),
(16, 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `variables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `slug`, `subject`, `body`, `variables`) VALUES
(1, 'welcome', 'Welcome To Lead App', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Welcome and Congratulations,<br />\r\n									<br />\r\n									<br />\r\n									<br />\r\n									Once again, congratulations and we look forward to working for you.<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,email,login-url,site_name,site_email'),
(2, 'forgot-password', '[Lead App] Password Reset', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									We received a request to reset your password. If you did not make this request, simply ignore this email. If you did make this request, please click the link below to reset your password:<br />\r\n									<br />\r\n									<strong>[*reset-url*]</strong><br />\r\n									<br />\r\n									If the link above does not work, try copying and pasting it into your browser.<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,reset-url,site_name,site_email'),
(3, 'password-changed', 'Password Change Confirmation', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									You have successfully changed your password.<br />\r\n									<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,site_name,site_email'),
(10, 'invite-user', 'You\'ve been added Lead App', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									You have added to [*site_name*], please click the below link to get started<br />\r\n									<br />\r\n									<strong>[*invite-url*]</strong><br />\r\n									<br />\r\n									If the link above does not work, try copying and pasting it into your browser.<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,invite-url,site_name,site_email'),
(12, 'email-otp', 'OTP for PIN change Lead App', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									<strong>[*otpmessage*]</strong><br />\r\n									<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,otpmessage,site_name,site_email,name');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`) VALUES
(1, 'Sooper Admin'),
(2, 'Counselling Staff'),
(3, 'Branch Manager'),
(4, 'Administration Manager'),
(5, 'Admin Staff');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session_simple_pos`
--

CREATE TABLE `session_simple_pos` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_simple_pos`
--

INSERT INTO `session_simple_pos` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6menfknlmp7e7d3kqe0gi115gnihb4ea', '::1', 1700892492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839323435383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a31313a2266617669636f6e2e69636f223b7365617263687c613a303a7b7d),
('8fsu10a7uvh153olhtlge9ml5jbq9b9p', '::1', 1700892950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839323934333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a31313a2266617669636f6e2e69636f223b),
('77j4iqtbh72ranpeftqga6vde3569v4c', '::1', 1700893588, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839333538383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a31313a2266617669636f6e2e69636f223b),
('sukb5rdarhpnsfk2prfhpqrt5ipilh3u', '::1', 1700894396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839343339363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b7365617263687c613a303a7b7d6d61696e5f6d656e755f736573737c733a31313a2266617669636f6e2e69636f223b),
('hohuaso51i05ak00idjnvnn66j3njnrt', '::1', 1700895572, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839353537323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('irkmhko5a802gcsr5pmhmb2i92o147af', '::1', 1700895873, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839353837333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('90qarmolipo674pdu4a8j3lg7qg7c140', '::1', 1700896341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839363334313b),
('27n0una8b74m5m1tnp18v69ecjf0bt9l', '::1', 1700896503, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303839363338383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b7365617263687c613a303a7b7d6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('i40oh4qmkevkh3o3qr3pmcfat4ck7io6', '::1', 1701062210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313036323231303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('b2uqnafe9g05to47qk37usp8u86qmv73', '::1', 1701062831, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313036323833313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('achetjqekfq4g4svc4q9bn2d8f15qk2i', '::1', 1701063858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313036333835383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('jine2iiv60n6neeh9i55gdnmtcfk14av', '::1', 1701065042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313036353034323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b7365617263687c613a303a7b7d6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('gjbkv1agthkrvak4r3sukomjv7rit3iv', '::1', 1701065042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313036353034323b),
('e3tr2foev8ltdks3t3en18rne0gc49j8', '::1', 1701227711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313232373731313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('49m7dutthf2rih3roncvl402r783dgde', '::1', 1701228549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313232383534393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a31313a226170706c69636174696f6e223b),
('gkjgg659hvoc8nkj0sm5iodki22lov5a', '::1', 1701228745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313232383534393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('2krrrt2fsnljtgp7me75kmj4dc3mh4os', '::1', 1701239811, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313233393831313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('ou18th5ajgk6g4rqrc06fi1o8umv8818', '::1', 1701241683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313234313638333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('ehnpos7neafienk6hmgqhgfue6756042', '::1', 1701241761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313234313638333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('b37d6ra45nvet7lhog5v8sqiitbn0afs', '::1', 1701252510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235323531303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('ohjau13ckv0m1g27jp5nu8dkkfpingfb', '::1', 1701253684, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235333638343b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('0369jgl0e768ii2oi468ckkjuei5pa15', '::1', 1701253996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235333939363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('nsdrvjd62d6pi18jbcpf2o0g8t5gb9h9', '::1', 1701254837, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235343833373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d6d73677c733a32373a22436f757273652064656c65746564207375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('rjbtu13th0fp3jv71uaitcvpi7u34udd', '::1', 1701255265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235353236353b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('711ak7aedua93r12l2lm3a44794u860l', '::1', 1701255890, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235353839303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('t3mv5op6he2445j4agmqj8nol7vjjun5', '::1', 1701256260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313235363236303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('5induaj2tjo02hc5s4llr7nhs4m9dfqu', '::1', 1701261106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313236313130363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('7s4u0oq3toch273bmrd8op1nm9rhjd4m', '::1', 1701261275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313236313130363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('o06u86g8h5cas4eh7ir4edsd3p2t3o7a', '::1', 1701317177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313331373137373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('3id3d5diek1q04bko5nu44f8n5r4pcp9', '::1', 1701322181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332323138313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('spe65tffo00joeil83mbtrkdp0lo3mtt', '::1', 1701322821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332323832313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('duf9cbr93h0kjbru4ov0kekd6vb3di39', '::1', 1701323341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332333334313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('f32f8m9fvlbt8uaj53invm4vte5v2qqu', '::1', 1701323938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332333933383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('8as6pe607072jsvonqnk743coj9aarol', '::1', 1701324569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332343536393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d6d73677c733a363a22536176656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226e6577223b7d),
('q7n7k62ei9uphrpuqbn4cpqqk31f3f9d', '::1', 1701325722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332353732323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('nu93gdlgb40akl37cg0s5bt23bdvki78', '::1', 1701325960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313332353732323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('vjl85qnnttmf75mhk6mchs70053fr5ct', '::1', 1701401079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313430313037393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('bevcd4tf9dqi8cfg0htt1rgp4kq491dh', '::1', 1701401552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313430313535323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('qi8rdikpmsk8fuvpj9h2b3jmgg5urmg7', '::1', 1701401826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313430313535323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('0k2kca0rfqahqlosplpqqo12cmrl6dig', '::1', 1701410825, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313431303832353b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('c2vrb2errfoa8aqukgmjivn8eobcr2t1', '::1', 1701411460, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313431313436303b757365726e616d657c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b656d61696c7c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b757365725f69647c733a313a2236223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2233223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('01v0biikrs7ip2f1qnmgo786t3v85g3o', '::1', 1701411878, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313431313638373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('ajeur1hadur2vci0tid7u9c00uhph480', '::1', 1701421584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313432313538343b757365726e616d657c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b656d61696c7c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b757365725f69647c733a313a2236223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2233223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('k3md9qp00raij0vas196jtkirs94bff3', '::1', 1701421908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313432313930383b757365726e616d657c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b656d61696c7c733a32343a22726f62696e2e736d61727469707a40676d61696c2e636f6d223b757365725f69647c733a313a2236223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2233223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('l5o2dfa0kqhu20vcle6cd90sfn20r03u', '::1', 1701423001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313432333030313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('u66lei9thscd2l0aqif8550tmgtuv1jq', '::1', 1701423356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313432333239303b757365726e616d657c733a31373a22696e666f40636f72656d696e64732e696e223b656d61696c7c733a31373a22696e666f40636f72656d696e64732e696e223b757365725f69647c733a313a2237223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2234223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('9pgg6eg41oogh936uucc7iofdf5lg6jc', '::1', 1701507845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313530373834353b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('8h88vftaktio1f1cgdfd05559pctcjpa', '::1', 1701508271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313530383237313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('1050q7ft7k4dkkjqaob2lfeh3jg0f2eg', '::1', 1701508589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313530383538393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('12kgtendrc3lqtkft5clmu4l5e1v64bc', '::1', 1701509322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313530393332323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b6d73677c733a383a225570646174656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('79b7oldln6qovl1les5osj20li8n1pqt', '::1', 1701509829, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313530393832393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('8dtsqdr77oh4sf7q3gb7h3b9tj6uemca', '::1', 1701510232, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313531303233323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('74u20sn1rbt5tq5sul7qptptacmdoca3', '::1', 1701511392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313531313339323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('s0c8c5brt2b62912n2dsvg8c78gahf0l', '::1', 1701512594, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313531323539343b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d6d73677c733a363a22536176656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('jnd0ofiliidvgo63kk4jdv5oi74jj760', '::1', 1701512896, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313531323839363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('lmhssvip3ee10c5fk022jht3kpm5bssb', '::1', 1701512925, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313531323839363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b7365617263687c613a303a7b7d),
('jhvtog11591pkaup6e24c7v9hd4ndk0a', '::1', 1701665125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313636353132353b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('affo10knf8m6h7bt72ah6m6m6ommr6qn', '::1', 1701665981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313636353938313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('borm2mk5b7bd73113fe0erug5b5nall1', '::1', 1701666317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313636363331373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('6ovqbi1nit3uoqgepfaa8f24ejksp081', '::1', 1701669838, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313636393833383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('kpfle98kpeqj9ol4ql9ropoqs9cuder5', '::1', 1701669913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313636393833383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('agaq6jr773d6f7pncm8bkkcd2kv6f8i3', '::1', 1701927690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313932373639303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b),
('9u3fe4qdqtds61vcemvk8omi6inmjcho', '::1', 1701927961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730313932373639303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2234223b61636164656d69635f796561727c733a313a2231223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d61696e5f6d656e755f736573737c733a353a226c65616473223b);

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 => Active, 2 => Suspend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `name`, `status`) VALUES
(6, 'Google Lead', 1),
(7, 'Channel Partner Lead', 1),
(8, 'Sales Team Lead', 1),
(9, 'Partner Lead', 1),
(10, 'Social Media Lead', 1),
(11, 'Website Lead', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`) VALUES
(6, 'CHATTISGARH', 99),
(5, 'BIHAR', 99),
(4, 'ASSAM', 99),
(3, 'ARUNACHAL PRADESH', 99),
(2, 'ANDHRA PRADESH', 99),
(1, 'ANDAMAN AND NICOBAR ISLANDS', 99),
(7, 'CHANDIGARH', 99),
(8, 'DAMAN AND DIU', 99),
(9, 'DELHI', 99),
(10, 'DADRA AND NAGAR HAVELI', 99),
(11, 'GOA', 99),
(12, 'GUJARAT', 99),
(13, 'HIMACHAL PRADESH', 99),
(14, 'HARYANA', 99),
(15, 'JAMMU AND KASHMIR', 99),
(16, 'JHARKHAND', 99),
(17, 'KERALA', 99),
(18, 'KARNATAKA', 99),
(19, 'LAKSHADWEEP', 99),
(20, 'MEGHALAYA', 99),
(21, 'MAHARASHTRA', 99),
(22, 'MANIPUR', 99),
(23, 'MADHYA PRADESH', 99),
(24, 'MIZORAM', 99),
(25, 'NAGALAND', 99),
(26, 'ORISSA', 99),
(27, 'PUNJAB', 99),
(28, 'PONDICHERRY', 99),
(29, 'RAJASTHAN', 99),
(30, 'SIKKIM', 99),
(31, 'TAMIL NADU', 99),
(32, 'TRIPURA', 99),
(33, 'UTTARAKHAND', 99),
(34, 'UTTAR PRADESH', 99),
(35, 'WEST BENGAL', 99),
(36, 'TELANGANA', 99);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 => Active, 2 => Suspend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`, `status`) VALUES
(1, 'Active', '#80ff80', 1),
(2, 'Closed', '#e44e1b', 1),
(3, 'Confirm', '#8fbbef', 1),
(4, 'Dead', '#8fb97d', 1),
(7, 'Delivered', '#00ff40', 1),
(8, 'Following UP', '#4ea016', 1),
(9, 'In Process', '#4fc13e', 1),
(10, 'Pending', '#b1980a', 1),
(11, 'Quote', '#000000', 1),
(12, 'Delay', '#f1cd0f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `min_price` int(50) NOT NULL,
  `max_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `name`, `course_id`, `min_price`, `max_price`) VALUES
(2, 'Malayalam', 3, 500, 1000),
(3, 'Malayalam', 2, 50, 100),
(4, 'IT', 6, 200, 600);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 => Active, 2 => Suspend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `status`) VALUES
(4, '10 th', 1),
(5, '12 th', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL,
  `password_reset_key` varchar(255) NOT NULL,
  `password_reset_key_expiration` datetime DEFAULT NULL,
  `invite_key` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `pin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `is_active`, `group_id`, `password_reset_key`, `password_reset_key_expiration`, `invite_key`, `image`, `last_login`, `created_at`, `branch_id`, `pin`) VALUES
(4, 'robinmon', 'roy', 'robinmon3618@gmail.com', '22aa183ef2b011fc1b1081e010c57d4b', '', 1, 1, '', NULL, '', '', '2023-12-07 06:36:23', '2021-12-15 04:03:48', '', ''),
(5, 'Sales', 'Staff', 'robinroyabraham@gmail.com', '22aa183ef2b011fc1b1081e010c57d4b', '9074656202', 1, 2, '', NULL, 'KwfPACUHr84Pscl', '', '2023-11-29 07:23:44', '2023-11-29 07:23:06', '1', ''),
(6, 'branch', 'admin', 'robin.smartipz@gmail.com', '22aa183ef2b011fc1b1081e010c57d4b', '', 1, 3, '', NULL, 'GUwjnAUGMSWfNZm', '', '2023-12-07 06:35:54', '2023-11-30 05:07:31', '1', ''),
(7, 'core', 'minds', 'info@coreminds.in', '22aa183ef2b011fc1b1081e010c57d4b', '', 1, 4, '', NULL, 'SlKvwuTwHWWidiz', '', '2023-12-01 10:35:23', '2023-11-30 05:08:18', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitylogs`
--
ALTER TABLE `activitylogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lead_id` (`lead_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgroups`
--
ALTER TABLE `cgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `source_id` (`source_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cgroup_id` (`cgroup_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `contacts_followups`
--
ALTER TABLE `contacts_followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `contacts_products`
--
ALTER TABLE `contacts_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `core`
--
ALTER TABLE `core`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `session_simple_pos`
--
ALTER TABLE `session_simple_pos`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activitylogs`
--
ALTER TABLE `activitylogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cgroups`
--
ALTER TABLE `cgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts_followups`
--
ALTER TABLE `contacts_followups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts_products`
--
ALTER TABLE `contacts_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `core`
--
ALTER TABLE `core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
