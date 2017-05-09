-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 03:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(35) NOT NULL,
  `cCountry` int(11) NOT NULL,
  `cState` text NOT NULL,
  `cDistrict` text NOT NULL,
  `cIndustry` int(11) NOT NULL,
  `cContact` text NOT NULL,
  `cWebsite` text NOT NULL,
  PRIMARY KEY (`cId`),
  KEY `cCountry` (`cCountry`,`cIndustry`),
  KEY `cCountry_2` (`cCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cId`, `cName`, `cCountry`, `cState`, `cDistrict`, `cIndustry`, `cContact`, `cWebsite`) VALUES
(2, 'Legion Enterprises', 221, 'Abu Dhabi', 'Bhurj Khalifa', 15, '1219731939', 'http://legiomn.com'),
(3, 'Dexos Inc.', 223, 'Illinois', 'Washington', 14, '9876543211', 'http://dexos.com');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(64) NOT NULL DEFAULT '',
  `countries_iso_code` varchar(2) NOT NULL,
  `countries_isd_code` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`countries_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code`, `countries_isd_code`) VALUES
(1, 'Afghanistan', 'AF', '93'),
(2, 'Albania', 'AL', '355'),
(3, 'Algeria', 'DZ', '213'),
(4, 'American Samoa', 'AS', '1-684'),
(5, 'Andorra', 'AD', '376'),
(6, 'Angola', 'AO', '244'),
(7, 'Anguilla', 'AI', '1-264'),
(8, 'Antarctica', 'AQ', '672'),
(9, 'Antigua and Barbuda', 'AG', '1-268'),
(10, 'Argentina', 'AR', '54'),
(11, 'Armenia', 'AM', '374'),
(12, 'Aruba', 'AW', '297'),
(13, 'Australia', 'AU', '61'),
(14, 'Austria', 'AT', '43'),
(15, 'Azerbaijan', 'AZ', '994'),
(16, 'Bahamas', 'BS', '1-242'),
(17, 'Bahrain', 'BH', '973'),
(18, 'Bangladesh', 'BD', '880'),
(19, 'Barbados', 'BB', '1-246'),
(20, 'Belarus', 'BY', '375'),
(21, 'Belgium', 'BE', '32'),
(22, 'Belize', 'BZ', '501'),
(23, 'Benin', 'BJ', '229'),
(24, 'Bermuda', 'BM', '1-441'),
(25, 'Bhutan', 'BT', '975'),
(26, 'Bolivia', 'BO', '591'),
(27, 'Bosnia and Herzegowina', 'BA', '387'),
(28, 'Botswana', 'BW', '267'),
(29, 'Bouvet Island', 'BV', '47'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'Brunei Darussalam', 'BN', '673'),
(33, 'Bulgaria', 'BG', '359'),
(34, 'Burkina Faso', 'BF', '226'),
(35, 'Burundi', 'BI', '257'),
(36, 'Cambodia', 'KH', '855'),
(37, 'Cameroon', 'CM', '237'),
(38, 'Canada', 'CA', '1'),
(39, 'Cape Verde', 'CV', '238'),
(40, 'Cayman Islands', 'KY', '1-345'),
(41, 'Central African Republic', 'CF', '236'),
(42, 'Chad', 'TD', '235'),
(43, 'Chile', 'CL', '56'),
(44, 'China', 'CN', '86'),
(45, 'Christmas Island', 'CX', '61'),
(46, 'Cocos (Keeling) Islands', 'CC', '61'),
(47, 'Colombia', 'CO', '57'),
(48, 'Comoros', 'KM', '269'),
(49, 'Congo Democratic Republic of', 'CG', '242'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Cote D''Ivoire', 'CI', '225'),
(53, 'Croatia', 'HR', '385'),
(54, 'Cuba', 'CU', '53'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Denmark', 'DK', '45'),
(58, 'Djibouti', 'DJ', '253'),
(59, 'Dominica', 'DM', '1-767'),
(60, 'Dominican Republic', 'DO', '1-809'),
(61, 'Timor-Leste', 'TL', '670'),
(62, 'Ecuador', 'EC', '593'),
(63, 'Egypt', 'EG', '20'),
(64, 'El Salvador', 'SV', '503'),
(65, 'Equatorial Guinea', 'GQ', '240'),
(66, 'Eritrea', 'ER', '291'),
(67, 'Estonia', 'EE', '372'),
(68, 'Ethiopia', 'ET', '251'),
(69, 'Falkland Islands (Malvinas)', 'FK', '500'),
(70, 'Faroe Islands', 'FO', '298'),
(71, 'Fiji', 'FJ', '679'),
(72, 'Finland', 'FI', '358'),
(73, 'France', 'FR', '33'),
(75, 'French Guiana', 'GF', '594'),
(76, 'French Polynesia', 'PF', '689'),
(77, 'French Southern Territories', 'TF', NULL),
(78, 'Gabon', 'GA', '241'),
(79, 'Gambia', 'GM', '220'),
(80, 'Georgia', 'GE', '995'),
(81, 'Germany', 'DE', '49'),
(82, 'Ghana', 'GH', '233'),
(83, 'Gibraltar', 'GI', '350'),
(84, 'Greece', 'GR', '30'),
(85, 'Greenland', 'GL', '299'),
(86, 'Grenada', 'GD', '1-473'),
(87, 'Guadeloupe', 'GP', '590'),
(88, 'Guam', 'GU', '1-671'),
(89, 'Guatemala', 'GT', '502'),
(90, 'Guinea', 'GN', '224'),
(91, 'Guinea-bissau', 'GW', '245'),
(92, 'Guyana', 'GY', '592'),
(93, 'Haiti', 'HT', '509'),
(94, 'Heard Island and McDonald Islands', 'HM', '011'),
(95, 'Honduras', 'HN', '504'),
(96, 'Hong Kong', 'HK', '852'),
(97, 'Hungary', 'HU', '36'),
(98, 'Iceland', 'IS', '354'),
(99, 'India', 'IN', '91'),
(100, 'Indonesia', 'ID', '62'),
(101, 'Iran (Islamic Republic of)', 'IR', '98'),
(102, 'Iraq', 'IQ', '964'),
(103, 'Ireland', 'IE', '353'),
(104, 'Israel', 'IL', '972'),
(105, 'Italy', 'IT', '39'),
(106, 'Jamaica', 'JM', '1-876'),
(107, 'Japan', 'JP', '81'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Korea, Democratic People''s Republic of', 'KP', '850'),
(113, 'South Korea', 'KR', '82'),
(114, 'Kuwait', 'KW', '965'),
(115, 'Kyrgyzstan', 'KG', '996'),
(116, 'Lao People''s Democratic Republic', 'LA', '856'),
(117, 'Latvia', 'LV', '371'),
(118, 'Lebanon', 'LB', '961'),
(119, 'Lesotho', 'LS', '266'),
(120, 'Liberia', 'LR', '231'),
(121, 'Libya', 'LY', '218'),
(122, 'Liechtenstein', 'LI', '423'),
(123, 'Lithuania', 'LT', '370'),
(124, 'Luxembourg', 'LU', '352'),
(125, 'Macao', 'MO', '853'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', '389'),
(127, 'Madagascar', 'MG', '261'),
(128, 'Malawi', 'MW', '265'),
(129, 'Malaysia', 'MY', '60'),
(130, 'Maldives', 'MV', '960'),
(131, 'Mali', 'ML', '223'),
(132, 'Malta', 'MT', '356'),
(133, 'Marshall Islands', 'MH', '692'),
(134, 'Martinique', 'MQ', '596'),
(135, 'Mauritania', 'MR', '222'),
(136, 'Mauritius', 'MU', '230'),
(137, 'Mayotte', 'YT', '262'),
(138, 'Mexico', 'MX', '52'),
(139, 'Micronesia, Federated States of', 'FM', '691'),
(140, 'Moldova', 'MD', '373'),
(141, 'Monaco', 'MC', '377'),
(142, 'Mongolia', 'MN', '976'),
(143, 'Montserrat', 'MS', '1-664'),
(144, 'Morocco', 'MA', '212'),
(145, 'Mozambique', 'MZ', '258'),
(146, 'Myanmar', 'MM', '95'),
(147, 'Namibia', 'NA', '264'),
(148, 'Nauru', 'NR', '674'),
(149, 'Nepal', 'NP', '977'),
(150, 'Netherlands', 'NL', '31'),
(151, 'Netherlands Antilles', 'AN', '599'),
(152, 'New Caledonia', 'NC', '687	'),
(153, 'New Zealand', 'NZ', '64'),
(154, 'Nicaragua', 'NI', '505'),
(155, 'Niger', 'NE', '227'),
(156, 'Nigeria', 'NG', '234'),
(157, 'Niue', 'NU', '683'),
(158, 'Norfolk Island', 'NF', '672'),
(159, 'Northern Mariana Islands', 'MP', '1-670'),
(160, 'Norway', 'NO', '47'),
(161, 'Oman', 'OM', '968'),
(162, 'Pakistan', 'PK', '92'),
(163, 'Palau', 'PW', '680'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787'),
(173, 'Qatar', 'QA', '974'),
(174, 'Reunion', 'RE', '262'),
(175, 'Romania', 'RO', '40'),
(176, 'Russian Federation', 'RU', '7'),
(177, 'Rwanda', 'RW', '250'),
(178, 'Saint Kitts and Nevis', 'KN', '1-869'),
(179, 'Saint Lucia', 'LC', '1-758'),
(180, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(181, 'Samoa', 'WS', '685'),
(182, 'San Marino', 'SM', '378'),
(183, 'Sao Tome and Principe', 'ST', '239'),
(184, 'Saudi Arabia', 'SA', '966'),
(185, 'Senegal', 'SN', '221'),
(186, 'Seychelles', 'SC', '248'),
(187, 'Sierra Leone', 'SL', '232'),
(188, 'Singapore', 'SG', '65'),
(189, 'Slovakia (Slovak Republic)', 'SK', '421'),
(190, 'Slovenia', 'SI', '386'),
(191, 'Solomon Islands', 'SB', '677'),
(192, 'Somalia', 'SO', '252'),
(193, 'South Africa', 'ZA', '27'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', '500'),
(195, 'Spain', 'ES', '34'),
(196, 'Sri Lanka', 'LK', '94'),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '290'),
(198, 'St. Pierre and Miquelon', 'PM', '508'),
(199, 'Sudan', 'SD', '249'),
(200, 'Suriname', 'SR', '597'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', '47'),
(202, 'Swaziland', 'SZ', '268'),
(203, 'Sweden', 'SE', '46'),
(204, 'Switzerland', 'CH', '41'),
(205, 'Syrian Arab Republic', 'SY', '963'),
(206, 'Taiwan', 'TW', '886'),
(207, 'Tajikistan', 'TJ', '992'),
(208, 'Tanzania, United Republic of', 'TZ', '255'),
(209, 'Thailand', 'TH', '66'),
(210, 'Togo', 'TG', '228'),
(211, 'Tokelau', 'TK', '690'),
(212, 'Tonga', 'TO', '676'),
(213, 'Trinidad and Tobago', 'TT', '1-868'),
(214, 'Tunisia', 'TN', '216'),
(215, 'Turkey', 'TR', '90'),
(216, 'Turkmenistan', 'TM', '993'),
(217, 'Turks and Caicos Islands', 'TC', '1-649'),
(218, 'Tuvalu', 'TV', '688'),
(219, 'Uganda', 'UG', '256'),
(220, 'Ukraine', 'UA', '380'),
(221, 'United Arab Emirates', 'AE', '971'),
(222, 'United Kingdom', 'GB', '44'),
(223, 'United States', 'US', '1'),
(224, 'United States Minor Outlying Islands', 'UM', '246'),
(225, 'Uruguay', 'UY', '598'),
(226, 'Uzbekistan', 'UZ', '998'),
(227, 'Vanuatu', 'VU', '678'),
(228, 'Vatican City State (Holy See)', 'VA', '379'),
(229, 'Venezuela', 'VE', '58'),
(230, 'Vietnam', 'VN', '84'),
(231, 'Virgin Islands (British)', 'VG', '1-284'),
(232, 'Virgin Islands (U.S.)', 'VI', '1-340'),
(233, 'Wallis and Futuna Islands', 'WF', '681'),
(234, 'Western Sahara', 'EH', '212'),
(235, 'Yemen', 'YE', '967'),
(236, 'Serbia', 'RS', '381'),
(238, 'Zambia', 'ZM', '260'),
(239, 'Zimbabwe', 'ZW', '263'),
(240, 'Aaland Islands', 'AX', '358'),
(241, 'Palestine', 'PS', '970'),
(242, 'Montenegro', 'ME', '382'),
(243, 'Guernsey', 'GG', '44-1481'),
(244, 'Isle of Man', 'IM', '44-1624'),
(245, 'Jersey', 'JE', '44-1534'),
(247, 'Curaçao', 'CW', '599'),
(248, 'Ivory Coast', 'CI', '225'),
(249, 'Kosovo', 'XK', '383');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `expId` int(11) NOT NULL AUTO_INCREMENT,
  `expYear` int(11) NOT NULL,
  `industry` int(11) NOT NULL,
  `upId` int(11) NOT NULL,
  PRIMARY KEY (`expId`),
  KEY `upId` (`upId`),
  KEY `industry` (`industry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`expId`, `expYear`, `industry`, `upId`) VALUES
(26, 2, 4, 27),
(29, 3, 15, 30),
(30, 6, 14, 31);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `indId` int(11) NOT NULL AUTO_INCREMENT,
  `indName` varchar(35) NOT NULL,
  PRIMARY KEY (`indId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`indId`, `indName`) VALUES
(1, 'Aerospace Industry'),
(2, 'Agriculture'),
(3, 'Chemical Industry'),
(4, 'Computer Industry'),
(5, 'Construction Industry'),
(6, 'Defence Industry'),
(7, 'Education Industry'),
(8, 'Energy Industry'),
(9, 'Entertainment Industry'),
(10, 'Financial Industry'),
(11, 'Food Industry'),
(12, 'Health care Industry'),
(13, 'Hospitality Industry'),
(14, 'Information Industry'),
(15, 'Manufacturing'),
(16, 'Mass Media'),
(17, 'Telecommunications Industry'),
(18, 'Transport Industry'),
(19, 'Water Industry');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `jobName` varchar(50) NOT NULL,
  `jobDomain` int(11) NOT NULL,
  `jobExp` int(11) NOT NULL,
  `jobSkills` int(11) NOT NULL,
  `jobCountry` int(11) NOT NULL,
  `jobCompany` int(11) NOT NULL,
  `jobDesig` int(11) NOT NULL,
  `jobDesc` text NOT NULL,
  `jobApplyDate` date NOT NULL,
  `jobEndDate` date NOT NULL,
  `jobIncome` int(11) NOT NULL,
  `jobContact` text NOT NULL,
  PRIMARY KEY (`jobId`),
  KEY `jobDomain` (`jobDomain`,`jobCountry`),
  KEY `jobCountry` (`jobCountry`),
  KEY `jobDesig` (`jobDesig`),
  KEY `jobCompany` (`jobCompany`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_skills_relations`
--

CREATE TABLE IF NOT EXISTS `job_skills_relations` (
  `jobSkillId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  PRIMARY KEY (`jobSkillId`),
  KEY `jobId` (`jobId`,`skillId`),
  KEY `skillId` (`skillId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skillId` int(11) NOT NULL AUTO_INCREMENT,
  `skillName` text NOT NULL,
  PRIMARY KEY (`skillId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillId`, `skillName`) VALUES
(1, 'Programming'),
(2, 'Graphics'),
(3, 'Painting'),
(4, 'Teaching'),
(5, 'Web Development'),
(6, 'Database Administration'),
(7, 'Management'),
(8, 'Human Resource Development'),
(9, 'UI Designing'),
(10, 'Content Writing'),
(11, 'Freelancing');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `uId` int(11) NOT NULL AUTO_INCREMENT,
  `uName` varchar(25) NOT NULL,
  `uEmail` varchar(30) NOT NULL,
  `uPass` varchar(15) NOT NULL,
  `uType` varchar(9) NOT NULL,
  `uSex` varchar(1) NOT NULL,
  `uDob` date NOT NULL,
  PRIMARY KEY (`uId`),
  UNIQUE KEY `uName` (`uName`,`uEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uId`, `uName`, `uEmail`, `uPass`, `uType`, `uSex`, `uDob`) VALUES
(27, 'Ashish1131', 'ash@a.in', '123', 'User', 'M', '1999-12-23'),
(30, 'Paras', 'paras@ya.in', '123', 'Recruiter', 'M', '1999-12-22'),
(31, 'HackFord', 'hackford95@gmail.com', '123123', 'Recruiter', 'M', '1995-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `upId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `upName` varchar(35) NOT NULL,
  `upMobile` varchar(10) NOT NULL,
  `upCountry` int(11) NOT NULL,
  `upState` varchar(20) NOT NULL,
  `upDistt` varchar(20) NOT NULL,
  `upIndustry` int(11) NOT NULL,
  `upProjects` text NOT NULL,
  `upBio` text NOT NULL,
  `upPic` text NOT NULL,
  PRIMARY KEY (`upId`),
  KEY `upIndustry` (`upIndustry`),
  KEY `upCountry` (`upCountry`),
  KEY `uId` (`uId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`upId`, `uId`, `upName`, `upMobile`, `upCountry`, `upState`, `upDistt`, `upIndustry`, `upProjects`, `upBio`, `upPic`) VALUES
(34, 27, 'Ashish Ekka', '8602184707', 99, 'Chhattisgarh', 'Durg', 4, 'http://technofever.in', 'CSE UnderGrad At Bhilai Institute Of Technology. Interested in working in Companies with a superb work and code culture.                                                                                                                                                                                                                                                                ', ''),
(37, 30, 'Paras Sahu', '9876554621', 99, 'Chhattisgarh', 'Rajnandgaon', 15, '', '', ''),
(38, 31, 'HackFord Swift', '1234569870', 223, 'Illinois', 'Washington', 14, 'This Is My Project Actually', 'This Is My Area', '699583.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills_relations`
--

CREATE TABLE IF NOT EXISTS `user_skills_relations` (
  `usrSkillId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  PRIMARY KEY (`usrSkillId`),
  KEY `empId` (`empId`,`skillId`),
  KEY `skillId` (`skillId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `user_skills_relations`
--

INSERT INTO `user_skills_relations` (`usrSkillId`, `empId`, `skillId`) VALUES
(92, 27, 1),
(93, 27, 2),
(94, 27, 3),
(95, 27, 4),
(96, 27, 5),
(97, 27, 6),
(98, 27, 7),
(99, 27, 8),
(100, 27, 9),
(101, 27, 10),
(102, 27, 11),
(21, 30, 2),
(22, 30, 10),
(43, 31, 1),
(44, 31, 2),
(45, 31, 3),
(46, 31, 4),
(47, 31, 5),
(48, 31, 6),
(49, 31, 7),
(50, 31, 8),
(51, 31, 9),
(52, 31, 10),
(53, 31, 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`cCountry`) REFERENCES `countries` (`countries_id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk_industry` FOREIGN KEY (`industry`) REFERENCES `industries` (`indId`),
  ADD CONSTRAINT `fk_user_profileId` FOREIGN KEY (`upId`) REFERENCES `user_master` (`uId`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`jobDomain`) REFERENCES `industries` (`indId`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`jobCountry`) REFERENCES `countries` (`countries_id`),
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`jobCompany`) REFERENCES `companies` (`cId`);

--
-- Constraints for table `job_skills_relations`
--
ALTER TABLE `job_skills_relations`
  ADD CONSTRAINT `job_skills_relations_ibfk_1` FOREIGN KEY (`jobId`) REFERENCES `jobs` (`jobId`),
  ADD CONSTRAINT `job_skills_relations_ibfk_2` FOREIGN KEY (`skillId`) REFERENCES `skills` (`skillId`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`upCountry`) REFERENCES `countries` (`countries_id`),
  ADD CONSTRAINT `user_profile_ibfk_3` FOREIGN KEY (`upIndustry`) REFERENCES `industries` (`indId`),
  ADD CONSTRAINT `user_profile_ibfk_4` FOREIGN KEY (`uId`) REFERENCES `user_master` (`uId`);

--
-- Constraints for table `user_skills_relations`
--
ALTER TABLE `user_skills_relations`
  ADD CONSTRAINT `user_skills_relations_ibfk_1` FOREIGN KEY (`empId`) REFERENCES `user_master` (`uId`),
  ADD CONSTRAINT `user_skills_relations_ibfk_2` FOREIGN KEY (`skillId`) REFERENCES `skills` (`skillId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
