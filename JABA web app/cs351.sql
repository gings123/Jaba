-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 11:17 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs351`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityID` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `className` varchar(20) NOT NULL,
  `input` varchar(50) NOT NULL,
  `output` varchar(50) NOT NULL,
  `activityName` varchar(30) NOT NULL,
  `correspondingGrade` int(3) NOT NULL,
  `content` varchar(500) NOT NULL,
  `expiration` date NOT NULL,
  `active` varchar(3) NOT NULL,
  `timeLimit` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityID`, `description`, `createDate`, `className`, `input`, `output`, `activityName`, `correspondingGrade`, `content`, `expiration`, `active`, `timeLimit`) VALUES
('zsyic1qkpt', 'Factorial Program using loop', '2018-04-16 06:46:06', 'csdvg', '10', '3628800', 'Factorial', 100, 'Factorial Program in Java: Factorial of n is the product of all positive descending integers. Factorial of n is denoted by n!. For example:\r\n\r\n4! = 4*3*2*1 = 24  \r\n5! = 5*4*3*2*1 = 120 \r\n', '2018-04-28', '', '00:00:00.000000'),
('03vhbzds2w', 'test', '2018-04-16 06:46:21', 'csdvg', 'test', 'test', 'test', 100, 'test', '2018-04-28', '', '00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `activitycreated`
--

CREATE TABLE `activitycreated` (
  `activityName` varchar(30) NOT NULL,
  `instructorId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitycreated`
--

INSERT INTO `activitycreated` (`activityName`, `instructorId`) VALUES
('Factorial', '12001560000'),
('Alex', '12001560000'),
('Fibonacci', '14002789900'),
('test', '14002789900'),
('Alex', '12001560000'),
('For loop', '12001560000'),
('looping', '14002789900'),
('test', '12001560000'),
('Factorial', '12001560000'),
('test', '12001560000');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classId` varchar(10) NOT NULL,
  `instructorId` varchar(11) NOT NULL,
  `className` varchar(20) NOT NULL,
  `classCode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classId`, `instructorId`, `className`, `classCode`) VALUES
('0318100422', '12001560000', 'csdvg', '77jhmv'),
('0318100737', '12001560000', 'cs101', 'chljn9'),
('0408050107', '14002789900', 'programming2', '8li8du'),
('0416075525', '14002789900', 'cs202', 'e1mv2r');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `activityName` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`activityName`, `fname`, `comment`, `comDate`) VALUES
('Factorial', 'Jay Pril', 'test comment', '2018-04-08 19:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `gender`, `job`, `Nationality`) VALUES
(1, 'Stacie', 'Heavens', 'sheavens0@dyndns.org', 'Female', 'Librarian', 'Ottawa'),
(2, 'Haslett', 'Darycott', 'hdarycott1@4shared.com', 'Male', 'Project Manager', 'Mexican'),
(3, 'Thorn', 'Cottesford', 'tcottesford2@virginia.edu', 'Male', 'Assistant Manager', 'Potawatomi'),
(4, 'Niven', 'Benedicte', 'nbenedicte3@columbia.edu', 'Male', 'Administrative Assistant II', 'Taiwanese'),
(5, 'Wilhelmine', 'Allflatt', 'wallflatt4@upenn.edu', 'Female', 'Database Administrator III', 'Tlingit-Haida'),
(6, 'Mireille', 'Whisson', 'mwhisson5@youku.com', 'Female', 'Social Worker', 'Tongan'),
(7, 'Lorinda', 'Camous', 'lcamous6@t.co', 'Female', 'Pharmacist', 'Puerto Rican'),
(8, 'Winonah', 'Eymor', 'weymor7@dmoz.org', 'Female', 'Product Engineer', 'Cree'),
(9, 'Amalie', 'Mc Kellen', 'amckellen8@tripod.com', 'Female', 'Speech Pathologist', 'Asian Indian'),
(10, 'Kinnie', 'Buckles', 'kbuckles9@ca.gov', 'Male', 'Quality Control Specialist', 'Aleut'),
(11, 'Rona', 'Adie', 'radiea@prnewswire.com', 'Female', 'VP Accounting', 'Tongan'),
(12, 'Chere', 'Moreside', 'cmoresideb@unesco.org', 'Female', 'Automation Specialist I', 'Latin American Indian'),
(13, 'Jock', 'Batistelli', 'jbatistellic@nhs.uk', 'Male', 'Geologist III', 'Nicaraguan'),
(14, 'Tiffani', 'Willacot', 'twillacotd@washingtonpost.com', 'Female', 'Junior Executive', 'Laotian'),
(15, 'Alanson', 'Bacchus', 'abacchuse@microsoft.com', 'Male', 'Account Representative II', 'Comanche'),
(16, 'Helga', 'Leggett', 'hleggettf@amazon.co.uk', 'Female', 'Safety Technician III', 'Dominican (Dominican Republic)'),
(17, 'Jo', 'Rochford', 'jrochfordg@webeden.co.uk', 'Female', 'Internal Auditor', 'Black or African American'),
(18, 'Hannis', 'Bodycote', 'hbodycoteh@europa.eu', 'Female', 'Registered Nurse', 'Nicaraguan'),
(19, 'Brittney', 'Orts', 'bortsi@g.co', 'Female', 'Programmer Analyst IV', 'Panamanian'),
(20, 'Lulita', 'Vasquez', 'lvasquezj@sun.com', 'Female', 'Physical Therapy Assistant', 'Taiwanese'),
(21, 'Roselia', 'Abson', 'rabsonk@cloudflare.com', 'Female', 'Electrical Engineer', 'Venezuelan'),
(22, 'Raimondo', 'Bruster', 'rbrusterl@ted.com', 'Male', 'Assistant Manager', 'Pakistani'),
(23, 'Teena', 'Laird-Craig', 'tlairdcraigm@prnewswire.com', 'Female', 'Pharmacist', 'Samoan'),
(24, 'Matty', 'Harvey', 'mharveyn@myspace.com', 'Female', 'Mechanical Systems Engineer', 'Indonesian'),
(25, 'Deny', 'Muirden', 'dmuirdeno@constantcontact.com', 'Female', 'Media Manager IV', 'Seminole'),
(26, 'Bone', 'Ivons', 'bivonsp@deliciousdays.com', 'Male', 'Software Consultant', 'South American'),
(27, 'Mattie', 'Ruddock', 'mruddockq@gmpg.org', 'Female', 'Director of Sales', 'Dominican (Dominican Republic)'),
(28, 'Merrel', 'Croasdale', 'mcroasdaler@gravatar.com', 'Male', 'Assistant Professor', 'Chippewa'),
(29, 'Nola', 'Kave', 'nkaves@admin.ch', 'Female', 'Professor', 'Alaskan Athabascan'),
(30, 'Clayson', 'Cheevers', 'ccheeverst@printfriendly.com', 'Male', 'Senior Quality Engineer', 'Hmong'),
(31, 'Dreddy', 'Di Domenico', 'ddidomenicou@bbc.co.uk', 'Female', 'Account Representative II', 'Honduran'),
(32, 'Adrianna', 'Dugget', 'aduggetv@chron.com', 'Female', 'Senior Quality Engineer', 'Lumbee'),
(33, 'Rhoda', 'Ranscombe', 'rranscombew@cloudflare.com', 'Female', 'Administrative Officer', 'Vietnamese'),
(34, 'Aidan', 'Trattles', 'atrattlesx@zdnet.com', 'Female', 'VP Product Management', 'Cambodian'),
(35, 'Arabela', 'Gulliver', 'agullivery@google.com.hk', 'Female', 'Associate Professor', 'Chippewa'),
(36, 'Catina', 'Garnam', 'cgarnamz@soundcloud.com', 'Female', 'Programmer Analyst III', 'Chinese'),
(37, 'Viviene', 'Duding', 'vduding10@diigo.com', 'Female', 'Actuary', 'Cherokee'),
(38, 'May', 'Van Velden', 'mvanvelden11@princeton.edu', 'Female', 'Software Consultant', 'Salvadoran'),
(39, 'Emlynn', 'Vereker', 'evereker12@discuz.net', 'Female', 'Actuary', 'Tongan'),
(40, 'Jocelyn', 'Fidgin', 'jfidgin13@google.com.br', 'Female', 'Design Engineer', 'Menominee'),
(41, 'Yule', 'Killner', 'ykillner14@youku.com', 'Male', 'Automation Specialist III', 'Indonesian'),
(42, 'Abe', 'Gold', 'agold15@nbcnews.com', 'Male', 'Physical Therapy Assistant', 'Crow'),
(43, 'Arlin', 'Ciciari', 'aciciari16@icq.com', 'Male', 'Help Desk Technician', 'Colombian'),
(44, 'Reamonn', 'Ellph', 'rellph17@printfriendly.com', 'Male', 'Sales Representative', 'Samoan'),
(45, 'Marlin', 'Ubee', 'mubee18@xing.com', 'Male', 'Information Systems Manager', 'Micronesian'),
(46, 'Inigo', 'Odby', 'iodby19@umn.edu', 'Male', 'Junior Executive', 'Panamanian'),
(47, 'Gwyneth', 'Fabler', 'gfabler1a@columbia.edu', 'Female', 'Staff Scientist', 'Iroquois'),
(48, 'Stanislaus', 'Francesco', 'sfrancesco1b@tuttocitta.it', 'Male', 'Electrical Engineer', 'Costa Rican'),
(49, 'Sharity', 'Siemens', 'ssiemens1c@lycos.com', 'Female', 'Payment Adjustment Coordinator', 'Seminole'),
(50, 'Somerset', 'Blakemore', 'sblakemore1d@hexun.com', 'Male', 'Paralegal', 'Ottawa'),
(51, 'Denis', 'de Verson', 'ddeverson1e@yellowpages.com', 'Male', 'Statistician I', 'Central American'),
(52, 'Conchita', 'Wash', 'cwash1f@barnesandnoble.com', 'Female', 'Senior Quality Engineer', 'Micronesian'),
(53, 'Rea', 'Franzewitch', 'rfranzewitch1g@springer.com', 'Female', 'Sales Representative', 'Apache'),
(54, 'Karlyn', 'MacLese', 'kmaclese1h@usda.gov', 'Female', 'Actuary', 'Ecuadorian'),
(55, 'Aubine', 'Cosgrave', 'acosgrave1i@privacy.gov.au', 'Female', 'VP Product Management', 'Cherokee'),
(56, 'Tremain', 'Kelmere', 'tkelmere1j@rambler.ru', 'Male', 'Tax Accountant', 'Cambodian'),
(57, 'Reinaldos', 'Northam', 'rnortham1k@senate.gov', 'Male', 'Programmer Analyst II', 'Malaysian'),
(58, 'Galven', 'Ruscoe', 'gruscoe1l@vimeo.com', 'Male', 'Dental Hygienist', 'Crow'),
(59, 'Jorie', 'Bedward', 'jbedward1m@goo.gl', 'Female', 'Occupational Therapist', 'Chippewa'),
(60, 'Killie', 'Lamar', 'klamar1n@skyrock.com', 'Male', 'Marketing Manager', 'Sioux'),
(61, 'Clarabelle', 'Gulley', 'cgulley1o@vimeo.com', 'Female', 'Administrative Officer', 'Puget Sound Salish'),
(62, 'Dynah', 'Dufall', 'ddufall1p@gmpg.org', 'Female', 'Information Systems Manager', 'Black or African American'),
(63, 'Antonin', 'Clabburn', 'aclabburn1q@nature.com', 'Male', 'Safety Technician II', 'Japanese'),
(64, 'Jacqueline', 'Wormstone', 'jwormstone1r@loc.gov', 'Female', 'Analyst Programmer', 'Navajo'),
(65, 'Ninon', 'Espinho', 'nespinho1s@paypal.com', 'Female', 'Biostatistician IV', 'Aleut'),
(66, 'Rafaelia', 'Milbourn', 'rmilbourn1t@telegraph.co.uk', 'Female', 'Software Test Engineer III', 'Chippewa'),
(67, 'Lillian', 'Coombe', 'lcoombe1u@unblog.fr', 'Female', 'Geologist II', 'Dominican (Dominican Republic)'),
(68, 'Carling', 'Brudenell', 'cbrudenell1v@odnoklassniki.ru', 'Male', 'Recruiter', 'Apache'),
(69, 'Hart', 'Burras', 'hburras1w@dion.ne.jp', 'Male', 'Legal Assistant', 'Mexican'),
(70, 'Clayborn', 'Grimwad', 'cgrimwad1x@istockphoto.com', 'Male', 'Junior Executive', 'Samoan'),
(71, 'Delano', 'Pittem', 'dpittem1y@over-blog.com', 'Male', 'Staff Accountant IV', 'Crow'),
(72, 'Andonis', 'Mc Gaughey', 'amcgaughey1z@hexun.com', 'Male', 'Teacher', 'Korean'),
(73, 'Lois', 'Mann', 'lmann20@sourceforge.net', 'Female', 'Food Chemist', 'Hmong'),
(74, 'Richmond', 'Klaves', 'rklaves21@altervista.org', 'Male', 'Assistant Professor', 'Mexican'),
(75, 'Faina', 'Zamora', 'fzamora22@fema.gov', 'Female', 'Senior Sales Associate', 'Melanesian'),
(76, 'Gianna', 'Goggins', 'ggoggins23@spotify.com', 'Female', 'Data Coordiator', 'American Indian'),
(77, 'Kary', 'Hallaways', 'khallaways24@jalbum.net', 'Female', 'Desktop Support Technician', 'Seminole'),
(78, 'Sander', 'Meadmore', 'smeadmore25@youtube.com', 'Male', 'Administrative Assistant IV', 'Eskimo'),
(79, 'Granthem', 'Kordes', 'gkordes26@unicef.org', 'Male', 'Civil Engineer', 'Guamanian'),
(80, 'Glad', 'Pavinese', 'gpavinese27@alibaba.com', 'Female', 'Programmer II', 'Seminole'),
(81, 'Margarita', 'Seely', 'mseely28@pagesperso-orange.fr', 'Female', 'Compensation Analyst', 'Tlingit-Haida'),
(82, 'Dorthea', 'Heugel', 'dheugel29@gmpg.org', 'Female', 'Human Resources Manager', 'Colombian'),
(83, 'Halie', 'Beauman', 'hbeauman2a@mayoclinic.com', 'Female', 'Registered Nurse', 'White'),
(84, 'Fenelia', 'Moger', 'fmoger2b@biblegateway.com', 'Female', 'Human Resources Assistant IV', 'Native Hawaiian and Other Pacific Islander (NHPI)'),
(85, 'Harry', 'Florey', 'hflorey2c@ebay.co.uk', 'Male', 'Pharmacist', 'Honduran'),
(86, 'Tabby', 'Muscroft', 'tmuscroft2d@wsj.com', 'Female', 'Marketing Manager', 'Aleut'),
(87, 'Madeleine', 'Domanski', 'mdomanski2e@i2i.jp', 'Female', 'Automation Specialist I', 'Panamanian'),
(88, 'Helenka', 'Shepheard', 'hshepheard2f@craigslist.org', 'Female', 'Structural Analysis Engineer', 'Kiowa'),
(89, 'Clementina', 'Nern', 'cnern2g@sbwire.com', 'Female', 'Clinical Specialist', 'Nicaraguan'),
(90, 'Morley', 'Starking', 'mstarking2h@seattletimes.com', 'Male', 'Senior Cost Accountant', 'Native Hawaiian and Other Pacific Islander (NHPI)'),
(91, 'Ripley', 'Barts', 'rbarts2i@nymag.com', 'Male', 'VP Accounting', 'Chilean'),
(92, 'Vilma', 'Wilmott', 'vwilmott2j@blogtalkradio.com', 'Female', 'Data Coordiator', 'Native Hawaiian and Other Pacific Islander (NHPI)'),
(93, 'Timothea', 'Ahlf', 'tahlf2k@jimdo.com', 'Female', 'Office Assistant II', 'Malaysian'),
(94, 'Chad', 'Heild', 'cheild2l@accuweather.com', 'Male', 'Registered Nurse', 'Aleut'),
(95, 'Fernande', 'Dearlove', 'fdearlove2m@imageshack.us', 'Female', 'Account Executive', 'Sri Lankan'),
(96, 'Shandee', 'Hulett', 'shulett2n@symantec.com', 'Female', 'Desktop Support Technician', 'Cree'),
(97, 'Isidora', 'Joffe', 'ijoffe2o@unblog.fr', 'Female', 'Research Associate', 'Comanche'),
(98, 'Galvin', 'Frizzell', 'gfrizzell2p@samsung.com', 'Male', 'Sales Representative', 'South American'),
(99, 'Augusta', 'Kirby', 'akirby2q@china.com.cn', 'Female', 'Recruiting Manager', 'Menominee'),
(100, 'Carlynn', 'McGeoch', 'cmcgeoch2r@baidu.com', 'Female', 'Health Coach III', 'Asian');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `studentId` varchar(11) NOT NULL,
  `activityName` varchar(11) NOT NULL,
  `Grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joinclass`
--

CREATE TABLE `joinclass` (
  `className` varchar(20) DEFAULT NULL,
  `studentId` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joinclass`
--

INSERT INTO `joinclass` (`className`, `studentId`) VALUES
('cs101', '14001178800'),
('gwaposialex', '20139901400'),
('programming2', '14001178800'),
('csdvg', '14001178800'),
('csdvg', '12001559700'),
('cs202', '13002789900');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructor`
--

CREATE TABLE `tbl_instructor` (
  `instructorId` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instructor`
--

INSERT INTO `tbl_instructor` (`instructorId`, `fname`, `lname`, `mi`, `email`, `gender`, `password`) VALUES
('12001560000', 'Andrew', 'Mangco', 'D', 'andrewmangco@gmail.com', 'male', 'BMN000200'),
('14002789900', 'Jay', 'Piala', 'K', 'jaypiala505@gmail.com', 'male', 'amaama123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `studentId` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mi` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`studentId`, `fname`, `lname`, `gender`, `email`, `password`, `mi`) VALUES
('14005188300', 'Stephen', 'Laganson', 'male', 'StephenLaganson@cute.gwapo', 'gwapoko', 'T'),
('14000317200', 'Luoie', 'Yuso', 'male', 'Louieyuso@friendster.com', 'bebs123', 'L'),
('14003988800', 'Elijah', 'Ang', 'male', 'elijahang@gmail.com', 'gwapoang', 'B'),
('14001178800', 'Jay Pril', 'Enot', 'male', 'jayenot@gmail.com', 'enot123', 'J'),
('14002497400', 'Jonuel', 'Pulido', 'male', 'junjun@yahoo.com', 'junjun', 'P'),
('20139901400', 'sheena', 'mangco', 'female', 'sheenamangco@gmail.com', 'meperfect', 'd'),
('13002976900', 'Alec', 'Caina', 'male', 'aleccaina@gmail.com', 'alec123', 'A'),
('12001559700', 'jay', 'villahermosa', 'male', 'jayvillzzz@gmail.com', 'jay123', 'o'),
('13002789900', 'nesteir', 'piala', 'male', 'jaypiala505@gmai.com', 'bpn900400', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(7) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `mi`, `email`, `password`, `status`, `gender`) VALUES
('', '', '', '', '', '', '', ''),
('12001560000', 'Andrew', 'Mangco', 'D', 'andrewmangco@gmail.com', 'BMN000200', 'teacher', 'male'),
('14002789900', 'Jay', 'Piala', 'K', 'jaypiala505@gmail.com', 'AMAAMA123', 'student', 'male'),
('14005188300', 'Stephen', 'Laganson', 'C', 'StephenLaganson@cute.gwapo', 'gwapoko', 'teacher', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
