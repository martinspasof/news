-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2017 at 01:06 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_full` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_lang` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang`, `lang_full`, `icon`, `default_lang`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', '', 0, 1, 1, NULL, '2017-11-30 08:34:17'),
(2, 'aa', 'Afar', '', 0, 0, 0, NULL, NULL),
(3, 'ab', 'Abkhazian', '', 0, 0, 0, NULL, NULL),
(4, 'af', 'Afrikaans', '', 0, 1, 0, NULL, '2017-11-29 12:39:57'),
(5, 'am', 'Amharic', '', 0, 1, 0, NULL, '2017-11-29 12:39:54'),
(6, 'ar', 'Arabic', '', 0, 1, 0, NULL, '2017-11-27 13:49:35'),
(7, 'as', 'Assamese', '', 0, 0, 0, NULL, '2017-11-27 13:49:30'),
(8, 'ay', 'Aymara', '', 0, 0, 0, NULL, NULL),
(9, 'az', 'Azerbaijani', '', 0, 0, 0, NULL, '2017-12-08 07:05:51'),
(10, 'ba', 'Bashkir', '', 0, 0, 0, NULL, NULL),
(11, 'be', 'Belarusian', '', 0, 1, 0, NULL, '2017-11-25 16:07:09'),
(12, 'bg', 'Bulgarian', '', 1, 1, 1, NULL, '2017-11-30 08:34:17'),
(13, 'bh', 'Bihari', '', 0, 0, 0, NULL, NULL),
(14, 'bi', 'Bislama', '', 0, 0, 0, NULL, NULL),
(15, 'bn', 'Bengali/Bangla', '', 0, 0, 0, NULL, NULL),
(16, 'bo', 'Tibetan', '', 0, 0, 0, NULL, NULL),
(17, 'br', 'Breton', '', 0, 0, 0, NULL, NULL),
(18, 'ca', 'Catalan', '', 0, 0, 0, NULL, NULL),
(19, 'co', 'Corsican', '', 0, 1, 0, NULL, '2017-11-25 16:07:06'),
(20, 'cz', 'Czech', '', 0, 1, 0, NULL, '2017-11-29 12:39:49'),
(21, 'cy', 'Welsh', '', 0, 0, 0, NULL, NULL),
(22, 'da', 'Danish', '', 0, 0, 0, NULL, NULL),
(23, 'de', 'German', '', 0, 0, 0, NULL, NULL),
(24, 'dz', 'Bhutani', '', 0, 0, 0, NULL, NULL),
(25, 'el', 'Greek', '', 0, 0, 0, NULL, NULL),
(26, 'eo', 'Esperanto', '', 0, 0, 0, NULL, NULL),
(27, 'es', 'Spanish', '', 0, 1, 0, NULL, '2017-11-25 16:07:03'),
(28, 'et', 'Estonian', '', 0, 0, 0, NULL, NULL),
(29, 'eu', 'Basque', '', 0, 0, 0, NULL, NULL),
(30, 'fa', 'Persian', '', 0, 0, 0, NULL, NULL),
(31, 'fi', 'Finnish', '', 0, 0, 0, NULL, NULL),
(32, 'fj', 'Fiji', '', 0, 0, 0, NULL, NULL),
(33, 'fo', 'Faeroese', '', 0, 0, 0, NULL, NULL),
(34, 'fr', 'French', '', 0, 0, 0, NULL, NULL),
(35, 'fy', 'Frisian', '', 0, 0, 0, NULL, NULL),
(36, 'ga', 'Irish', '', 0, 0, 0, NULL, NULL),
(37, 'gd', 'Scots/Gaelic', '', 0, 0, 0, NULL, NULL),
(38, 'gl', 'Galician', '', 0, 0, 0, NULL, NULL),
(39, 'gn', 'Guarani', '', 0, 0, 0, NULL, NULL),
(40, 'gu', 'Gujarati', '', 0, 0, 0, NULL, NULL),
(41, 'ha', 'Hausa', '', 0, 0, 0, NULL, '2017-11-25 16:04:05'),
(42, 'hi', 'Hindi', '', 0, 0, 0, NULL, NULL),
(43, 'hr', 'Croatian', '', 0, 0, 0, NULL, NULL),
(44, 'hu', 'Hungarian', '', 0, 0, 0, NULL, NULL),
(45, 'hy', 'Armenian', '', 0, 0, 0, NULL, NULL),
(46, 'ia', 'Interlingua', '', 0, 0, 0, NULL, NULL),
(47, 'ie', 'Interlingue', '', 0, 0, 0, NULL, NULL),
(48, 'ik', 'Inupiak', '', 0, 0, 0, NULL, NULL),
(49, 'in', 'Indonesian', '', 0, 0, 0, NULL, NULL),
(50, 'is', 'Icelandic', '', 0, 0, 0, NULL, NULL),
(51, 'it', 'Italian', '', 0, 0, 0, NULL, NULL),
(52, 'iw', 'Hebrew', '', 0, 0, 0, NULL, NULL),
(53, 'ja', 'Japanese', '', 0, 0, 0, NULL, '2017-11-25 16:03:55'),
(54, 'ji', 'Yiddish', '', 0, 0, 0, NULL, NULL),
(55, 'jw', 'Javanese', '', 0, 0, 0, NULL, NULL),
(56, 'ka', 'Georgian', '', 0, 0, 0, NULL, NULL),
(57, 'kk', 'Kazakh', '', 0, 0, 0, NULL, NULL),
(58, 'kl', 'Greenlandic', '', 0, 0, 0, NULL, NULL),
(59, 'km', 'Cambodian', '', 0, 0, 0, NULL, NULL),
(60, 'kn', 'Kannada', '', 0, 0, 0, NULL, NULL),
(61, 'kr', 'Korean', '', 0, 1, 0, NULL, '2017-11-29 12:39:14'),
(62, 'ks', 'Kashmiri', '', 0, 0, 0, NULL, NULL),
(63, 'ku', 'Kurdish', '', 0, 0, 0, NULL, NULL),
(64, 'ky', 'Kirghiz', '', 0, 0, 0, NULL, NULL),
(65, 'la', 'Latin', '', 0, 0, 0, NULL, NULL),
(66, 'ln', 'Lingala', '', 0, 0, 0, NULL, NULL),
(67, 'lo', 'Laothian', '', 0, 0, 0, NULL, NULL),
(68, 'lt', 'Lithuanian', '', 0, 0, 0, NULL, NULL),
(69, 'lv', 'Latvian/Lettish', '', 0, 0, 0, NULL, NULL),
(70, 'mg', 'Malagasy', '', 0, 0, 0, NULL, NULL),
(71, 'mi', 'Maori', '', 0, 0, 0, NULL, NULL),
(72, 'mk', 'Macedonian', '', 0, 0, 0, NULL, NULL),
(73, 'ml', 'Malayalam', '', 0, 0, 0, NULL, NULL),
(74, 'mn', 'Mongolian', '', 0, 0, 0, NULL, NULL),
(75, 'mo', 'Moldavian', '', 0, 0, 0, NULL, NULL),
(76, 'mr', 'Marathi', '', 0, 0, 0, NULL, NULL),
(77, 'ms', 'Malay', '', 0, 0, 0, NULL, NULL),
(78, 'mt', 'Maltese', '', 0, 0, 0, NULL, NULL),
(79, 'my', 'Burmese', '', 0, 0, 0, NULL, NULL),
(80, 'na', 'Nauru', '', 0, 0, 0, NULL, NULL),
(81, 'ne', 'Nepali', '', 0, 0, 0, NULL, NULL),
(82, 'nl', 'Dutch', '', 0, 0, 0, NULL, NULL),
(83, 'no', 'Norwegian', '', 0, 0, 0, NULL, NULL),
(84, 'oc', 'Occitan', '', 0, 0, 0, NULL, NULL),
(85, 'om', '(Afan)/Oromoor/Oriya', '', 0, 0, 0, NULL, NULL),
(86, 'pa', 'Punjabi', '', 0, 0, 0, NULL, NULL),
(87, 'pl', 'Polish', '', 0, 0, 0, NULL, NULL),
(88, 'ps', 'Pashto/Pushto', '', 0, 0, 0, NULL, NULL),
(89, 'pt', 'Portuguese', '', 0, 0, 0, NULL, NULL),
(90, 'qu', 'Quechua', '', 0, 0, 0, NULL, NULL),
(91, 'rm', 'Rhaeto-Romance', '', 0, 0, 0, NULL, NULL),
(92, 'rn', 'Kirundi', '', 0, 0, 0, NULL, NULL),
(93, 'ro', 'Romanian', '', 0, 0, 0, NULL, NULL),
(94, 'ru', 'Russian', '', 0, 0, 0, NULL, NULL),
(95, 'rw', 'Kinyarwanda', '', 0, 0, 0, NULL, NULL),
(96, 'sa', 'Sanskrit', '', 0, 0, 0, NULL, NULL),
(97, 'sd', 'Sindhi', '', 0, 0, 0, NULL, NULL),
(98, 'sg', 'Sangro', '', 0, 0, 0, NULL, NULL),
(99, 'sh', 'Serbo-Croatian', '', 0, 0, 0, NULL, NULL),
(100, 'si', 'Singhalese', '', 0, 0, 0, NULL, NULL),
(101, 'sk', 'Slovak', '', 0, 0, 0, NULL, NULL),
(102, 'sl', 'Slovenian', '', 0, 0, 0, NULL, NULL),
(103, 'sm', 'Samoan', '', 0, 0, 0, NULL, NULL),
(104, 'sn', 'Shona', '', 0, 0, 0, NULL, NULL),
(105, 'so', 'Somali', '', 0, 0, 0, NULL, NULL),
(106, 'sq', 'Albanian', '', 0, 0, 0, NULL, NULL),
(107, 'sr', 'Serbian', '', 0, 0, 0, NULL, NULL),
(108, 'ss', 'Siswati', '', 0, 0, 0, NULL, NULL),
(109, 'st', 'Sesotho', '', 0, 0, 0, NULL, NULL),
(110, 'su', 'Sundanese', '', 0, 0, 0, NULL, NULL),
(111, 'sv', 'Swedish', '', 0, 0, 0, NULL, NULL),
(112, 'sw', 'Swahili', '', 0, 0, 0, NULL, NULL),
(113, 'ta', 'Tamil', '', 0, 0, 0, NULL, NULL),
(114, 'te', 'Telugu', '', 0, 0, 0, NULL, NULL),
(115, 'tg', 'Tajik', '', 0, 0, 0, NULL, NULL),
(116, 'th', 'Thai', '', 0, 0, 0, NULL, NULL),
(117, 'ti', 'Tigrinya', '', 0, 0, 0, NULL, NULL),
(118, 'tk', 'Turkmen', '', 0, 0, 0, NULL, NULL),
(119, 'tl', 'Tagalog', '', 0, 0, 0, NULL, NULL),
(120, 'tn', 'Setswana', '', 0, 0, 0, NULL, NULL),
(121, 'to', 'Tonga', '', 0, 0, 0, NULL, NULL),
(122, 'tr', 'Turkish', '', 0, 0, 0, NULL, NULL),
(123, 'ts', 'Tsonga', '', 0, 0, 0, NULL, NULL),
(124, 'tt', 'Tatar', '', 0, 0, 0, NULL, NULL),
(125, 'tw', 'Twi', '', 0, 0, 0, NULL, NULL),
(126, 'uk', 'Ukrainian', '', 0, 0, 0, NULL, NULL),
(127, 'ur', 'Urdu', '', 0, 0, 0, NULL, NULL),
(128, 'uz', 'Uzbek', '', 0, 0, 0, NULL, NULL),
(129, 'vi', 'Vietnamese', '', 0, 0, 0, NULL, NULL),
(130, 'vo', 'Volapuk', '', 0, 0, 0, NULL, NULL),
(131, 'wo', 'Wolof', '', 0, 0, 0, NULL, NULL),
(132, 'xh', 'Xhosa', '', 0, 0, 0, NULL, NULL),
(133, 'yo', 'Yoruba', '', 0, 0, 0, NULL, NULL),
(134, 'zh', 'Chinese', '', 0, 0, 0, NULL, NULL),
(135, 'zu', 'Zulu', '', 0, 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
