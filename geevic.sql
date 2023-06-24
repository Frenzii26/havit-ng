-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 02:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geevic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `_id` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`_id`, `cat_id`, `category_name`, `category_image`, `date_created`) VALUES
(11, 'SdG37rMm2oI9T', 'baked foods', 'SdG37rMm2oI9T.jpg', '2023-04-19 05:51:56'),
(12, 'ZbkqOaewG2V76', 'spices', 'ZbkqOaewG2V76.jpg', '2023-04-19 05:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
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
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(16, '9669275999', 'aEdl2hxWvHZwp', 5, '1500.00', '2023-06-02 11:55:09', '2023-06-02 11:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `_id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`_id`, `product_id`, `product_image`, `date_created`) VALUES
(11, 'hclyb6UtnqRXk', 'IMD6KYUiFwZk4-4rXmEu5Vy7GcHvR2nNpl.jpg', '2023-01-05 21:23:15'),
(12, 'hclyb6UtnqRXk', 'U9oIufVgPEeTw-wdCtQkF2Ma5YR310NlsA.jpg', '2023-01-05 21:23:32'),
(13, 'yHURzWGeDX4qT', 'QFgodLRJGyrPH-HY7tSBavA6MNZn1K408s.png', '2023-01-05 21:29:58'),
(14, 'GTNpe4HhtUJwC', 'b9IV56t34PWJe-eqMBzdkLvo2QXTCfigE1.jpg', '2023-01-05 21:35:49'),
(16, 'Otzvd0aL2j6Iu', 'loPmt6qhyTcvS-SUf2juHX4eGn1M90ZsOJ.webp', '2023-01-05 21:41:55'),
(17, 'Otzvd0aL2j6Iu', 's28cGQq1TlMua-aoOSWPDgX9xzHp3idI4y.webp', '2023-01-05 21:42:10'),
(18, 'Otzvd0aL2j6Iu', 'zumATP8aOfXZk-ke9BLVNg6KME5HxQ4y0i.webp', '2023-01-05 21:42:21'),
(19, 'XnvljpwS5GMQo', 'arvcu30mzti57-7pwDeQH1yKBL4MhgnGE9.webp', '2023-01-06 12:56:56'),
(20, 'XnvljpwS5GMQo', 'ntBq2HzVawvhZ-Zglp4mKSoYWerjEQs65O.webp', '2023-01-06 12:57:12'),
(21, 'xlN5KvMiTwr1V', 'cDhA9gd4N0QOI-IlH7wnbtyGijSEPoTksr.webp', '2023-01-06 13:10:41'),
(22, 'xlN5KvMiTwr1V', '8V3WIzw49yZbj-jBdeEulNXPpf0RrisHS6.webp', '2023-01-06 13:11:02'),
(23, 'xlN5KvMiTwr1V', 'QcZvK6T4RDw29-93FehWsJ8tkzGCSVidu5.webp', '2023-01-06 13:11:13'),
(24, 'UuvXR1anTbol7', 'YdmNERXqJo6SI-IgyiG2h3aKLBCPZ9wFcH.webp', '2023-01-06 13:54:39'),
(25, 'UuvXR1anTbol7', 'paV6t14PXlOsu-udAFfogMNIqHZ3Y9mh08.webp', '2023-01-06 13:54:48'),
(26, 'UuvXR1anTbol7', 'qPFfi8alrDXLC-CnumQz0kTJxwh7WeBZ5M.jpg', '2023-01-06 13:54:59'),
(27, 'rVhQCx8ykPX9l', 'xVu6to124HUD0-05QSBer3JGniP9khgZmw.webp', '2023-01-06 14:10:46'),
(28, 'rVhQCx8ykPX9l', 'Rc0HaPstijBTE-E6pgGvdKSuxZ8Xm5nk3y.webp', '2023-01-06 14:10:57'),
(29, 'M6Dq0jLdePtpX', 'l6mOZvpEx4PRd-djcruF1JD7CSIMV3NQfq.webp', '2023-01-06 14:16:55'),
(30, 'Ke4QgBiN92kuW', 'cyoYIaGm3iUHp-pWurVdLBTJQvOD9N8feS.webp', '2023-01-06 14:21:45'),
(31, 'cFLOtBv2eHP1Z', 'OGD3uVxeJFoaX-Xv07E4pHLNikcM59WIfh.webp', '2023-01-06 14:25:38'),
(32, 'I0bgtPA9pa2Uf', 'JcwB0RaUiPj3M-MSEe6KvtpX7uQTxdyAZl.jpg', '2023-01-08 20:28:02'),
(33, 'I0bgtPA9pa2Uf', 'bTevthCM4k9yr-rVzRnXFWP1lJdK26qUoD.jpg', '2023-01-08 20:28:28'),
(34, 'cQJZf1RP9UzGn', 'a1wse7YTVX8IR-RCdGUuxoZK2hFgWAmjfb.png', '2023-01-26 22:38:46'),
(35, 'DYBmMs93KXc1V', 'jy0ZtLQkbdzah-hRVNiCfMTJ7Hsx2YKErU.webp', '2023-01-29 15:15:44'),
(36, 'DYBmMs93KXc1V', 'VhvHESoTXx6I5-5FYBK3yiwpc8augb9WNA.webp', '2023-01-29 15:16:08'),
(37, 'DYBmMs93KXc1V', 'vl1XWboQaeZqU-UK3uyszCGdSNI97RBxAL.webp', '2023-01-29 15:16:28'),
(38, 'gGLrBb4Pd31M6', 'N7xuA3cZ0YyDt-tSpPGFB69iWJLaqHIeRh.webp', '2023-01-29 15:30:19'),
(39, 'gGLrBb4Pd31M6', 'gTqY83tKSnyDF-F1cfzodkAa6JCV2rpNO7.webp', '2023-01-29 15:30:48'),
(40, 'gGLrBb4Pd31M6', 'SEodRlGQhsZPJ-JAUyHX51YBpwnKu7q8mV.webp', '2023-01-29 15:31:26'),
(41, 'aEdl2hxWvHZwp', 'APSKcIn2NlDG1-1EtMzamBrRuJsCxLZgyH.jpg', '2023-05-03 19:35:22'),
(42, 'upvcEsUBJqXLw', 'ZltivgP2j4WYf-fSDFoTEKkHr0AXUp7h8G.jpg', '2023-05-03 19:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rate`
--

CREATE TABLE `shipping_rate` (
  `id` int(11) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_rate`
--

INSERT INTO `shipping_rate` (`id`, `origin`, `destination`, `rate`) VALUES
(65545, 'Nigeria', 'Afghanistan', '13.85'),
(65546, 'Nigeria', 'Albania', '61.73'),
(65547, 'Nigeria', 'Algeria', '67.12'),
(65548, 'Nigeria', 'American Samoa', '50.39'),
(65549, 'Nigeria', 'Andorra', '50.61'),
(65550, 'Nigeria', 'Angola', '1.85'),
(65551, 'Nigeria', 'Anguilla', '57.43'),
(65552, 'Nigeria', 'Antarctica', '81.61'),
(65553, 'Nigeria', 'Antigua and Barbuda', '35.77'),
(65554, 'Nigeria', 'Argentina', '34.01'),
(65555, 'Nigeria', 'Armenia', '62.73'),
(65556, 'Nigeria', 'Aruba', '11.63'),
(65557, 'Nigeria', 'Australia', '69.95'),
(65558, 'Nigeria', 'Austria', '14.86'),
(65559, 'Nigeria', 'Azerbaijan', '64.47'),
(65560, 'Nigeria', 'Bahamas', '77.75'),
(65561, 'Nigeria', 'Bahrain', '95.36'),
(65562, 'Nigeria', 'Bangladesh', '43.54'),
(65563, 'Nigeria', 'Barbados', '31.64'),
(65564, 'Nigeria', 'Belarus', '27.56'),
(65565, 'Nigeria', 'Belgium', '42.89'),
(65566, 'Nigeria', 'Belize', '31.78'),
(65567, 'Nigeria', 'Benin', '30.23'),
(65568, 'Nigeria', 'Bermuda', '55.82'),
(65569, 'Nigeria', 'Bhutan', '88.38'),
(65570, 'Nigeria', 'Bolivia', '74.45'),
(65571, 'Nigeria', 'Bosnia and Herzegovina', '7.11'),
(65572, 'Nigeria', 'Botswana', '12.21'),
(65573, 'Nigeria', 'Bouvet Island', '39.70'),
(65574, 'Nigeria', 'Brazil', '61.89'),
(65575, 'Nigeria', 'British Indian Ocean Territory', '90.35'),
(65576, 'Nigeria', 'Brunei Darussalam', '66.06'),
(65577, 'Nigeria', 'Bulgaria', '59.25'),
(65578, 'Nigeria', 'Burkina Faso', '98.07'),
(65579, 'Nigeria', 'Burundi', '12.62'),
(65580, 'Nigeria', 'Cambodia', '68.86'),
(65581, 'Nigeria', 'Cameroon', '6.47'),
(65582, 'Nigeria', 'Canada', '25.76'),
(65583, 'Nigeria', 'Cape Verde', '9.41'),
(65584, 'Nigeria', 'Cayman Islands', '69.76'),
(65585, 'Nigeria', 'Central African Republic', '20.55'),
(65586, 'Nigeria', 'Chad', '93.47'),
(65587, 'Nigeria', 'Chile', '5.71'),
(65588, 'Nigeria', 'China', '48.15'),
(65589, 'Nigeria', 'Christmas Island', '23.60'),
(65590, 'Nigeria', 'Cocos (Keeling) Islands', '73.55'),
(65591, 'Nigeria', 'Colombia', '96.97'),
(65592, 'Nigeria', 'Comoros', '64.19'),
(65593, 'Nigeria', 'Congo', '30.05'),
(65594, 'Nigeria', 'Congo, the Democratic Republic of the', '57.67'),
(65595, 'Nigeria', 'Cook Islands', '98.20'),
(65596, 'Nigeria', 'Costa Rica', '17.98'),
(65597, 'Nigeria', 'Cote D\'Ivoire', '95.30'),
(65598, 'Nigeria', 'Croatia', '22.58'),
(65599, 'Nigeria', 'Cuba', '27.01'),
(65600, 'Nigeria', 'Cyprus', '67.29'),
(65601, 'Nigeria', 'Czech Republic', '55.43'),
(65602, 'Nigeria', 'Denmark', '75.29'),
(65603, 'Nigeria', 'Djibouti', '10.14'),
(65604, 'Nigeria', 'Dominica', '24.84'),
(65605, 'Nigeria', 'Dominican Republic', '93.78'),
(65606, 'Nigeria', 'Ecuador', '94.38'),
(65607, 'Nigeria', 'Egypt', '90.55'),
(65608, 'Nigeria', 'El Salvador', '69.62'),
(65609, 'Nigeria', 'Equatorial Guinea', '76.45'),
(65610, 'Nigeria', 'Eritrea', '73.40'),
(65611, 'Nigeria', 'Estonia', '37.65'),
(65612, 'Nigeria', 'Ethiopia', '68.07'),
(65613, 'Nigeria', 'Falkland Islands (Malvinas)', '27.36'),
(65614, 'Nigeria', 'Faroe Islands', '32.62'),
(65615, 'Nigeria', 'Fiji', '81.01'),
(65616, 'Nigeria', 'Finland', '7.18'),
(65617, 'Nigeria', 'France', '92.86'),
(65618, 'Nigeria', 'French Guiana', '42.78'),
(65619, 'Nigeria', 'French Polynesia', '35.31'),
(65620, 'Nigeria', 'French Southern Territories', '48.21'),
(65621, 'Nigeria', 'Gabon', '35.10'),
(65622, 'Nigeria', 'Gambia', '30.90'),
(65623, 'Nigeria', 'Georgia', '49.19'),
(65624, 'Nigeria', 'Germany', '53.26'),
(65625, 'Nigeria', 'Ghana', '18.74'),
(65626, 'Nigeria', 'Gibraltar', '33.90'),
(65627, 'Nigeria', 'Greece', '13.28'),
(65628, 'Nigeria', 'Greenland', '64.71'),
(65629, 'Nigeria', 'Grenada', '83.72'),
(65630, 'Nigeria', 'Guadeloupe', '24.47'),
(65631, 'Nigeria', 'Guam', '71.19'),
(65632, 'Nigeria', 'Guatemala', '82.56'),
(65633, 'Nigeria', 'Guinea', '99.19'),
(65634, 'Nigeria', 'Guinea-Bissau', '48.30'),
(65635, 'Nigeria', 'Guyana', '43.93'),
(65636, 'Nigeria', 'Haiti', '74.75'),
(65637, 'Nigeria', 'Heard Island and Mcdonald Islands', '41.94'),
(65638, 'Nigeria', 'Holy See (Vatican City State)', '85.48'),
(65639, 'Nigeria', 'Honduras', '1.57'),
(65640, 'Nigeria', 'Hong Kong', '51.42'),
(65641, 'Nigeria', 'Hungary', '52.38'),
(65642, 'Nigeria', 'Iceland', '7.63'),
(65643, 'Nigeria', 'India', '81.02'),
(65644, 'Nigeria', 'Indonesia', '82.22'),
(65645, 'Nigeria', 'Iran, Islamic Republic of', '68.05'),
(65646, 'Nigeria', 'Iraq', '93.58'),
(65647, 'Nigeria', 'Ireland', '63.76'),
(65648, 'Nigeria', 'Israel', '38.04'),
(65649, 'Nigeria', 'Italy', '98.93'),
(65650, 'Nigeria', 'Jamaica', '80.54'),
(65651, 'Nigeria', 'Japan', '5.91'),
(65652, 'Nigeria', 'Jordan', '87.90'),
(65653, 'Nigeria', 'Kazakhstan', '21.80'),
(65654, 'Nigeria', 'Kenya', '45.29'),
(65655, 'Nigeria', 'Kiribati', '61.07'),
(65656, 'Nigeria', 'Korea, Democratic People\'s Republic of', '69.46'),
(65657, 'Nigeria', 'Korea, Republic of', '64.08'),
(65658, 'Nigeria', 'Kuwait', '12.04'),
(65659, 'Nigeria', 'Kyrgyzstan', '67.95'),
(65660, 'Nigeria', 'Lao People\'s Democratic Republic', '3.65'),
(65661, 'Nigeria', 'Latvia', '14.40'),
(65662, 'Nigeria', 'Lebanon', '61.02'),
(65663, 'Nigeria', 'Lesotho', '61.94'),
(65664, 'Nigeria', 'Liberia', '26.60'),
(65665, 'Nigeria', 'Libyan Arab Jamahiriya', '47.20'),
(65666, 'Nigeria', 'Liechtenstein', '56.21'),
(65667, 'Nigeria', 'Lithuania', '39.44'),
(65668, 'Nigeria', 'Luxembourg', '28.59'),
(65669, 'Nigeria', 'Macao', '24.63'),
(65670, 'Nigeria', 'Macedonia, the Former Yugoslav Republic of', '37.35'),
(65671, 'Nigeria', 'Madagascar', '12.89'),
(65672, 'Nigeria', 'Malawi', '52.37'),
(65673, 'Nigeria', 'Malaysia', '23.20'),
(65674, 'Nigeria', 'Maldives', '58.91'),
(65675, 'Nigeria', 'Mali', '24.92'),
(65676, 'Nigeria', 'Malta', '47.87'),
(65677, 'Nigeria', 'Marshall Islands', '64.59'),
(65678, 'Nigeria', 'Martinique', '79.35'),
(65679, 'Nigeria', 'Mauritania', '2.98'),
(65680, 'Nigeria', 'Mauritius', '76.83'),
(65681, 'Nigeria', 'Mayotte', '75.22'),
(65682, 'Nigeria', 'Mexico', '45.63'),
(65683, 'Nigeria', 'Micronesia, Federated States of', '2.48'),
(65684, 'Nigeria', 'Moldova, Republic of', '75.51'),
(65685, 'Nigeria', 'Monaco', '70.11'),
(65686, 'Nigeria', 'Mongolia', '24.03'),
(65687, 'Nigeria', 'Montserrat', '9.82'),
(65688, 'Nigeria', 'Morocco', '77.01'),
(65689, 'Nigeria', 'Mozambique', '55.59'),
(65690, 'Nigeria', 'Myanmar', '46.94'),
(65691, 'Nigeria', 'Namibia', '67.91'),
(65692, 'Nigeria', 'Nauru', '98.73'),
(65693, 'Nigeria', 'Nepal', '89.91'),
(65694, 'Nigeria', 'Netherlands', '53.36'),
(65695, 'Nigeria', 'Netherlands Antilles', '97.09'),
(65696, 'Nigeria', 'New Caledonia', '25.35'),
(65697, 'Nigeria', 'New Zealand', '35.50'),
(65698, 'Nigeria', 'Nicaragua', '1.44'),
(65699, 'Nigeria', 'Niger', '0.69'),
(65700, 'Nigeria', 'Niue', '99.12'),
(65701, 'Nigeria', 'Norfolk Island', '93.53'),
(65702, 'Nigeria', 'Northern Mariana Islands', '70.32'),
(65703, 'Nigeria', 'Norway', '70.98'),
(65704, 'Nigeria', 'Oman', '43.94'),
(65705, 'Nigeria', 'Pakistan', '6.75'),
(65706, 'Nigeria', 'Palau', '1.92'),
(65707, 'Nigeria', 'Palestinian Territory, Occupied', '89.38'),
(65708, 'Nigeria', 'Panama', '41.15'),
(65709, 'Nigeria', 'Papua New Guinea', '37.58'),
(65710, 'Nigeria', 'Paraguay', '64.46'),
(65711, 'Nigeria', 'Peru', '9.56'),
(65712, 'Nigeria', 'Philippines', '54.42'),
(65713, 'Nigeria', 'Pitcairn', '43.43'),
(65714, 'Nigeria', 'Poland', '53.89'),
(65715, 'Nigeria', 'Portugal', '39.14'),
(65716, 'Nigeria', 'Puerto Rico', '34.05'),
(65717, 'Nigeria', 'Qatar', '52.83'),
(65718, 'Nigeria', 'Reunion', '61.98'),
(65719, 'Nigeria', 'Romania', '51.40'),
(65720, 'Nigeria', 'Russian Federation', '71.09'),
(65721, 'Nigeria', 'Rwanda', '1.24'),
(65722, 'Nigeria', 'Saint Helena', '92.92'),
(65723, 'Nigeria', 'Saint Kitts and Nevis', '60.89'),
(65724, 'Nigeria', 'Saint Lucia', '25.67'),
(65725, 'Nigeria', 'Saint Pierre and Miquelon', '45.71'),
(65726, 'Nigeria', 'Saint Vincent and the Grenadines', '51.51'),
(65727, 'Nigeria', 'Samoa', '20.42'),
(65728, 'Nigeria', 'San Marino', '47.60'),
(65729, 'Nigeria', 'Sao Tome and Principe', '76.71'),
(65730, 'Nigeria', 'Saudi Arabia', '40.77'),
(65731, 'Nigeria', 'Senegal', '73.73'),
(65732, 'Nigeria', 'Serbia and Montenegro', '46.32'),
(65733, 'Nigeria', 'Seychelles', '10.42'),
(65734, 'Nigeria', 'Sierra Leone', '13.15'),
(65735, 'Nigeria', 'Singapore', '34.48'),
(65736, 'Nigeria', 'Slovakia', '32.95'),
(65737, 'Nigeria', 'Slovenia', '61.30'),
(65738, 'Nigeria', 'Solomon Islands', '7.64'),
(65739, 'Nigeria', 'Somalia', '54.30'),
(65740, 'Nigeria', 'South Africa', '48.59'),
(65741, 'Nigeria', 'South Georgia and the South Sandwich Islands', '80.05'),
(65742, 'Nigeria', 'Spain', '54.48'),
(65743, 'Nigeria', 'Sri Lanka', '32.26'),
(65744, 'Nigeria', 'Sudan', '97.84'),
(65745, 'Nigeria', 'Suriname', '92.43'),
(65746, 'Nigeria', 'Svalbard and Jan Mayen', '68.62'),
(65747, 'Nigeria', 'Swaziland', '65.80'),
(65748, 'Nigeria', 'Sweden', '23.14'),
(65749, 'Nigeria', 'Switzerland', '18.30'),
(65750, 'Nigeria', 'Syrian Arab Republic', '22.07'),
(65751, 'Nigeria', 'Taiwan, Province of China', '55.48'),
(65752, 'Nigeria', 'Tajikistan', '11.16'),
(65753, 'Nigeria', 'Tanzania, United Republic of', '89.37'),
(65754, 'Nigeria', 'Thailand', '13.37'),
(65755, 'Nigeria', 'Timor-Leste', '98.76'),
(65756, 'Nigeria', 'Togo', '53.68'),
(65757, 'Nigeria', 'Tokelau', '72.12'),
(65758, 'Nigeria', 'Tonga', '99.54'),
(65759, 'Nigeria', 'Trinidad and Tobago', '81.36'),
(65760, 'Nigeria', 'Tunisia', '8.17'),
(65761, 'Nigeria', 'Turkey', '96.79'),
(65762, 'Nigeria', 'Turkmenistan', '59.41'),
(65763, 'Nigeria', 'Turks and Caicos Islands', '6.70'),
(65764, 'Nigeria', 'Tuvalu', '55.27'),
(65765, 'Nigeria', 'Uganda', '56.27'),
(65766, 'Nigeria', 'Ukraine', '15.51'),
(65767, 'Nigeria', 'United Arab Emirates', '8.73'),
(65768, 'Nigeria', 'United Kingdom', '97.13'),
(65769, 'Nigeria', 'United States', '59.47'),
(65770, 'Nigeria', 'United States Minor Outlying Islands', '5.95'),
(65771, 'Nigeria', 'Uruguay', '51.34'),
(65772, 'Nigeria', 'Uzbekistan', '38.83'),
(65773, 'Nigeria', 'Vanuatu', '40.16'),
(65774, 'Nigeria', 'Venezuela', '84.28'),
(65775, 'Nigeria', 'Viet Nam', '0.95'),
(65776, 'Nigeria', 'Virgin Islands, British', '51.88'),
(65777, 'Nigeria', 'Virgin Islands, U.s.', '56.57'),
(65778, 'Nigeria', 'Wallis and Futuna', '27.20'),
(65779, 'Nigeria', 'Western Sahara', '66.29'),
(65780, 'Nigeria', 'Yemen', '49.84'),
(65781, 'Nigeria', 'Zambia', '50.32'),
(65782, 'Nigeria', 'Zimbabwe', '2.11'),
(65783, 'USA', 'Afghanistan', '59.56'),
(65784, 'USA', 'Albania', '91.48'),
(65785, 'USA', 'Algeria', '78.72'),
(65786, 'USA', 'American Samoa', '19.14'),
(65787, 'USA', 'Andorra', '59.57'),
(65788, 'USA', 'Angola', '40.44'),
(65789, 'USA', 'Anguilla', '23.46'),
(65790, 'USA', 'Antarctica', '95.97'),
(65791, 'USA', 'Antigua and Barbuda', '9.50'),
(65792, 'USA', 'Argentina', '59.57'),
(65793, 'USA', 'Armenia', '69.38'),
(65794, 'USA', 'Aruba', '68.16'),
(65795, 'USA', 'Australia', '32.68'),
(65796, 'USA', 'Austria', '58.93'),
(65797, 'USA', 'Azerbaijan', '96.60'),
(65798, 'USA', 'Bahamas', '6.23'),
(65799, 'USA', 'Bahrain', '41.32'),
(65800, 'USA', 'Bangladesh', '87.92'),
(65801, 'USA', 'Barbados', '15.66'),
(65802, 'USA', 'Belarus', '14.53'),
(65803, 'USA', 'Belgium', '25.68'),
(65804, 'USA', 'Belize', '84.81'),
(65805, 'USA', 'Benin', '47.00'),
(65806, 'USA', 'Bermuda', '80.58'),
(65807, 'USA', 'Bhutan', '61.89'),
(65808, 'USA', 'Bolivia', '67.73'),
(65809, 'USA', 'Bosnia and Herzegovina', '52.96'),
(65810, 'USA', 'Botswana', '61.62'),
(65811, 'USA', 'Bouvet Island', '49.23'),
(65812, 'USA', 'Brazil', '61.29'),
(65813, 'USA', 'British Indian Ocean Territory', '58.75'),
(65814, 'USA', 'Brunei Darussalam', '9.87'),
(65815, 'USA', 'Bulgaria', '73.11'),
(65816, 'USA', 'Burkina Faso', '35.93'),
(65817, 'USA', 'Burundi', '60.35'),
(65818, 'USA', 'Cambodia', '93.93'),
(65819, 'USA', 'Cameroon', '88.60'),
(65820, 'USA', 'Canada', '61.22'),
(65821, 'USA', 'Cape Verde', '40.29'),
(65822, 'USA', 'Cayman Islands', '17.79'),
(65823, 'USA', 'Central African Republic', '68.10'),
(65824, 'USA', 'Chad', '87.14'),
(65825, 'USA', 'Chile', '31.37'),
(65826, 'USA', 'China', '95.42'),
(65827, 'USA', 'Christmas Island', '83.00'),
(65828, 'USA', 'Cocos (Keeling) Islands', '28.75'),
(65829, 'USA', 'Colombia', '94.74'),
(65830, 'USA', 'Comoros', '87.47'),
(65831, 'USA', 'Congo', '53.11'),
(65832, 'USA', 'Congo, the Democratic Republic of the', '3.15'),
(65833, 'USA', 'Cook Islands', '56.42'),
(65834, 'USA', 'Costa Rica', '72.63'),
(65835, 'USA', 'Cote D\'Ivoire', '93.90'),
(65836, 'USA', 'Croatia', '51.63'),
(65837, 'USA', 'Cuba', '76.45'),
(65838, 'USA', 'Cyprus', '27.34'),
(65839, 'USA', 'Czech Republic', '7.36'),
(65840, 'USA', 'Denmark', '54.78'),
(65841, 'USA', 'Djibouti', '51.84'),
(65842, 'USA', 'Dominica', '94.83'),
(65843, 'USA', 'Dominican Republic', '18.65'),
(65844, 'USA', 'Ecuador', '8.76'),
(65845, 'USA', 'Egypt', '87.84'),
(65846, 'USA', 'El Salvador', '12.90'),
(65847, 'USA', 'Equatorial Guinea', '1.02'),
(65848, 'USA', 'Eritrea', '66.37'),
(65849, 'USA', 'Estonia', '28.78'),
(65850, 'USA', 'Ethiopia', '44.82'),
(65851, 'USA', 'Falkland Islands (Malvinas)', '37.76'),
(65852, 'USA', 'Faroe Islands', '54.33'),
(65853, 'USA', 'Fiji', '58.39'),
(65854, 'USA', 'Finland', '28.93'),
(65855, 'USA', 'France', '69.49'),
(65856, 'USA', 'French Guiana', '60.64'),
(65857, 'USA', 'French Polynesia', '94.75'),
(65858, 'USA', 'French Southern Territories', '91.81'),
(65859, 'USA', 'Gabon', '74.82'),
(65860, 'USA', 'Gambia', '98.67'),
(65861, 'USA', 'Georgia', '68.90'),
(65862, 'USA', 'Germany', '48.48'),
(65863, 'USA', 'Ghana', '35.68'),
(65864, 'USA', 'Gibraltar', '32.99'),
(65865, 'USA', 'Greece', '57.89'),
(65866, 'USA', 'Greenland', '90.49'),
(65867, 'USA', 'Grenada', '78.79'),
(65868, 'USA', 'Guadeloupe', '22.47'),
(65869, 'USA', 'Guam', '75.97'),
(65870, 'USA', 'Guatemala', '12.44'),
(65871, 'USA', 'Guinea', '34.31'),
(65872, 'USA', 'Guinea-Bissau', '34.23'),
(65873, 'USA', 'Guyana', '68.20'),
(65874, 'USA', 'Haiti', '38.34'),
(65875, 'USA', 'Heard Island and Mcdonald Islands', '87.09'),
(65876, 'USA', 'Holy See (Vatican City State)', '20.41'),
(65877, 'USA', 'Honduras', '40.80'),
(65878, 'USA', 'Hong Kong', '42.75'),
(65879, 'USA', 'Hungary', '91.35'),
(65880, 'USA', 'Iceland', '28.50'),
(65881, 'USA', 'India', '68.44'),
(65882, 'USA', 'Indonesia', '56.69'),
(65883, 'USA', 'Iran, Islamic Republic of', '78.14'),
(65884, 'USA', 'Iraq', '20.64'),
(65885, 'USA', 'Ireland', '68.79'),
(65886, 'USA', 'Israel', '82.03'),
(65887, 'USA', 'Italy', '3.75'),
(65888, 'USA', 'Jamaica', '72.69'),
(65889, 'USA', 'Japan', '52.18'),
(65890, 'USA', 'Jordan', '42.83'),
(65891, 'USA', 'Kazakhstan', '57.62'),
(65892, 'USA', 'Kenya', '59.58'),
(65893, 'USA', 'Kiribati', '25.08'),
(65894, 'USA', 'Korea, Democratic People\'s Republic of', '46.64'),
(65895, 'USA', 'Korea, Republic of', '57.98'),
(65896, 'USA', 'Kuwait', '49.98'),
(65897, 'USA', 'Kyrgyzstan', '75.95'),
(65898, 'USA', 'Lao People\'s Democratic Republic', '29.81'),
(65899, 'USA', 'Latvia', '21.19'),
(65900, 'USA', 'Lebanon', '16.52'),
(65901, 'USA', 'Lesotho', '19.04'),
(65902, 'USA', 'Liberia', '45.63'),
(65903, 'USA', 'Libyan Arab Jamahiriya', '71.05'),
(65904, 'USA', 'Liechtenstein', '18.36'),
(65905, 'USA', 'Lithuania', '78.64'),
(65906, 'USA', 'Luxembourg', '38.12'),
(65907, 'USA', 'Macao', '54.68'),
(65908, 'USA', 'Macedonia, the Former Yugoslav Republic of', '59.06'),
(65909, 'USA', 'Madagascar', '31.23'),
(65910, 'USA', 'Malawi', '78.98'),
(65911, 'USA', 'Malaysia', '1.20'),
(65912, 'USA', 'Maldives', '69.08'),
(65913, 'USA', 'Mali', '41.80'),
(65914, 'USA', 'Malta', '1.75'),
(65915, 'USA', 'Marshall Islands', '83.37'),
(65916, 'USA', 'Martinique', '11.58'),
(65917, 'USA', 'Mauritania', '7.78'),
(65918, 'USA', 'Mauritius', '4.19'),
(65919, 'USA', 'Mayotte', '97.58'),
(65920, 'USA', 'Mexico', '75.34'),
(65921, 'USA', 'Micronesia, Federated States of', '83.97'),
(65922, 'USA', 'Moldova, Republic of', '93.81'),
(65923, 'USA', 'Monaco', '17.13'),
(65924, 'USA', 'Mongolia', '4.25'),
(65925, 'USA', 'Montserrat', '69.84'),
(65926, 'USA', 'Morocco', '36.45'),
(65927, 'USA', 'Mozambique', '72.74'),
(65928, 'USA', 'Myanmar', '54.33'),
(65929, 'USA', 'Namibia', '53.46'),
(65930, 'USA', 'Nauru', '4.29'),
(65931, 'USA', 'Nepal', '61.08'),
(65932, 'USA', 'Netherlands', '92.51'),
(65933, 'USA', 'Netherlands Antilles', '79.33'),
(65934, 'USA', 'New Caledonia', '19.13'),
(65935, 'USA', 'New Zealand', '57.64'),
(65936, 'USA', 'Nicaragua', '30.81'),
(65937, 'USA', 'Niger', '81.13'),
(65938, 'USA', 'Nigeria', '13.22'),
(65939, 'USA', 'Niue', '22.72'),
(65940, 'USA', 'Norfolk Island', '73.94'),
(65941, 'USA', 'Northern Mariana Islands', '1.55'),
(65942, 'USA', 'Norway', '85.92'),
(65943, 'USA', 'Oman', '24.94'),
(65944, 'USA', 'Pakistan', '66.96'),
(65945, 'USA', 'Palau', '59.98'),
(65946, 'USA', 'Palestinian Territory, Occupied', '99.02'),
(65947, 'USA', 'Panama', '15.16'),
(65948, 'USA', 'Papua New Guinea', '78.74'),
(65949, 'USA', 'Paraguay', '48.21'),
(65950, 'USA', 'Peru', '4.85'),
(65951, 'USA', 'Philippines', '79.61'),
(65952, 'USA', 'Pitcairn', '83.48'),
(65953, 'USA', 'Poland', '78.60'),
(65954, 'USA', 'Portugal', '42.57'),
(65955, 'USA', 'Puerto Rico', '77.03'),
(65956, 'USA', 'Qatar', '57.42'),
(65957, 'USA', 'Reunion', '56.05'),
(65958, 'USA', 'Romania', '7.96'),
(65959, 'USA', 'Russian Federation', '71.65'),
(65960, 'USA', 'Rwanda', '34.36'),
(65961, 'USA', 'Saint Helena', '56.86'),
(65962, 'USA', 'Saint Kitts and Nevis', '81.22'),
(65963, 'USA', 'Saint Lucia', '35.53'),
(65964, 'USA', 'Saint Pierre and Miquelon', '33.97'),
(65965, 'USA', 'Saint Vincent and the Grenadines', '63.28'),
(65966, 'USA', 'Samoa', '14.49'),
(65967, 'USA', 'San Marino', '82.60'),
(65968, 'USA', 'Sao Tome and Principe', '69.54'),
(65969, 'USA', 'Saudi Arabia', '99.89'),
(65970, 'USA', 'Senegal', '90.82'),
(65971, 'USA', 'Serbia and Montenegro', '54.43'),
(65972, 'USA', 'Seychelles', '99.71'),
(65973, 'USA', 'Sierra Leone', '35.26'),
(65974, 'USA', 'Singapore', '77.15'),
(65975, 'USA', 'Slovakia', '80.00'),
(65976, 'USA', 'Slovenia', '68.53'),
(65977, 'USA', 'Solomon Islands', '2.65'),
(65978, 'USA', 'Somalia', '7.65'),
(65979, 'USA', 'South Africa', '30.29'),
(65980, 'USA', 'South Georgia and the South Sandwich Islands', '28.50'),
(65981, 'USA', 'Spain', '51.66'),
(65982, 'USA', 'Sri Lanka', '72.77'),
(65983, 'USA', 'Sudan', '8.87'),
(65984, 'USA', 'Suriname', '26.07'),
(65985, 'USA', 'Svalbard and Jan Mayen', '3.71'),
(65986, 'USA', 'Swaziland', '40.34'),
(65987, 'USA', 'Sweden', '90.58'),
(65988, 'USA', 'Switzerland', '31.86'),
(65989, 'USA', 'Syrian Arab Republic', '87.59'),
(65990, 'USA', 'Taiwan, Province of China', '42.37'),
(65991, 'USA', 'Tajikistan', '49.05'),
(65992, 'USA', 'Tanzania, United Republic of', '18.16'),
(65993, 'USA', 'Thailand', '43.66'),
(65994, 'USA', 'Timor-Leste', '63.83'),
(65995, 'USA', 'Togo', '88.16'),
(65996, 'USA', 'Tokelau', '49.33'),
(65997, 'USA', 'Tonga', '82.14'),
(65998, 'USA', 'Trinidad and Tobago', '62.70'),
(65999, 'USA', 'Tunisia', '67.11'),
(66000, 'USA', 'Turkey', '47.42'),
(66001, 'USA', 'Turkmenistan', '35.78'),
(66002, 'USA', 'Turks and Caicos Islands', '36.64'),
(66003, 'USA', 'Tuvalu', '75.85'),
(66004, 'USA', 'Uganda', '69.35'),
(66005, 'USA', 'Ukraine', '19.17'),
(66006, 'USA', 'United Arab Emirates', '87.82'),
(66007, 'USA', 'United Kingdom', '81.57'),
(66008, 'USA', 'United States', '44.41'),
(66009, 'USA', 'United States Minor Outlying Islands', '77.32'),
(66010, 'USA', 'Uruguay', '53.36'),
(66011, 'USA', 'Uzbekistan', '34.86'),
(66012, 'USA', 'Vanuatu', '14.22'),
(66013, 'USA', 'Venezuela', '66.51'),
(66014, 'USA', 'Viet Nam', '89.90'),
(66015, 'USA', 'Virgin Islands, British', '49.96'),
(66016, 'USA', 'Virgin Islands, U.s.', '80.10'),
(66017, 'USA', 'Wallis and Futuna', '50.63'),
(66018, 'USA', 'Western Sahara', '12.84'),
(66019, 'USA', 'Yemen', '12.33'),
(66020, 'USA', 'Zambia', '23.14'),
(66021, 'USA', 'Zimbabwe', '78.67');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `_id` int(11) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE `tbl_ads` (
  `_id` int(11) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `ad_image` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `total` varchar(100) NOT NULL,
  `order_status` varchar(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `user_address_id` int(10) NOT NULL,
  `order_status` enum('pending','processing','shipped','delivered','cancelled','refunded','on_hold','completed') NOT NULL DEFAULT 'pending',
  `date_updated` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`_id`, `user_id`, `order_id`, `total_amount`, `user_address_id`, `order_status`, `date_updated`, `date_created`) VALUES
(61, 9, '9669275999', 1596, 11, 'pending', '2023-06-02 12:55:09', '2023-06-02 11:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `_id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `cat_id` varchar(30) NOT NULL,
  `sub_id` varchar(30) NOT NULL,
  `price` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `weight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`_id`, `product_id`, `product_name`, `cat_id`, `sub_id`, `price`, `stock`, `details`, `date_created`, `weight`) VALUES
(22, 'upvcEsUBJqXLw', 'adminstrative', 'sdg37rmm2oi9t', '1', '500', '66', 'dfghhj', '2023-05-03 19:10:35', 20),
(23, 'SQL68pdxqVYjT', 'dylan salazar', 'zbkqoaewg2v76', '', '64', '35', 'Non ullamco et moles', '2023-05-03 19:10:40', 20),
(24, 'aEdl2hxWvHZwp', 'johncode', 'sdg37rmm2oi9t', '1', '300', '11', 'vh vihi huih iuknuk', '2023-05-07 19:07:27', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `full_name`, `email`, `phone`, `user_password`, `user_role`, `date_created`) VALUES
(5, 'clinton', 'clintonmaduakor7@gmail.com', '08100936162', '$2y$10$SkLCYGz1mJY5Se/3Miu/seVNU9/ue3vlv142zJramMNxa8nfBRvrm', 'user', '2022-07-21 01:26:10'),
(8, 'GEEVIC ADMIN', 'geevichfoods@gmail.com', '08139998229', '$2y$10$YJ2hkm9QVKbG2iq8Cn2pvOWvQPZiCEPq19czMTbe4dhVLiherbcd.', 'admin', '2023-04-19 05:44:14'),
(9, 'Ifeanyichukwu John', 'ifeanyichukwujohn70@gmail.com', '8083292538', '$2y$10$cXddHwfdqfD/6jOs1z0iV.Sse1oAiJbaT9pLhP.wS4BwaEP3dxqxW', 'admin', '2023-04-20 04:45:56'),
(11, 'Mr John', 'john@gmail.com', '567766556775', '$2y$10$U.gkf.rhLWbZ6qlmjVgLueVHxdKHR/J.EIQ6iH9l7Gds6XV0Jd92y', 'user', '2023-05-22 11:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `_id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `user_address` varchar(400) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`_id`, `userid`, `user_address`, `country`, `state`, `city`, `zip_code`, `date_created`) VALUES
(11, '9', 'New York', 'USA', 'New York', 'city a', 12345, '2023-04-20 05:17:21'),
(19, '9', 'Abakaliki', 'Nigeria', 'Ebonyi', 'Ezzamgbo', 480, '2023-06-01 11:32:55'),
(20, '9', 'no 2 africa lane', 'Antarctica', 'Moron', 'Babelic', 56753, '2023-06-01 04:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66022;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
