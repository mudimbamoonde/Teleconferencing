-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2020 at 09:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teleconference`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

DROP TABLE IF EXISTS `access_level`;
CREATE TABLE IF NOT EXISTS `access_level` (
  `accessID` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(100) NOT NULL,
  PRIMARY KEY (`accessID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`accessID`, `Role`) VALUES
(1, 'System Admin'),
(2, 'Student'),
(3, 'accountant'),
(4, 'admin'),
(5, 'lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nrc` varchar(200) NOT NULL,
  `accessLevel` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `firstname`, `lastname`, `username`, `gender`, `nrc`, `accessLevel`, `address`, `email`, `phone`, `status`) VALUES
(1, 'Moonde', 'Mudimba', 'mudimba', 'Male', '273871/13/1', 'System Admin', 'Mkushi', 'mudimbamoonde@gmail.com', '096584029', 1),
(2, 'Mulambo', 'Maluba', 'malu', 'Female', '33333/12/1', 'accountant', 'kabwe', 'maluba@gmail.com', '096584456', 0),
(3, 'Katongo', 'Tina', 'tinak', 'Female', '554566/66/1', 'lecturer', 'lusaka', 'tinak@mbs.com', '945487845', 1),
(4, 'Makanda', 'Akufuna', 'makanda', 'Male', '487466/66/1', 'lecturer', 'Mkushi', 'akufunam@mbs.com', '945487845', 1),
(5, 'Confort', 'Lewanika', 'confortl', 'Male', '845146/94/1', 'lecturer', 'Mkushi', 'confort@moge.gov', '260965811', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(200) NOT NULL,
  `CourseCode` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `CourseName`, `CourseCode`, `year`, `semester`) VALUES
(1, 'Advanced Physics', 'ICE102', 1, 1),
(2, 'Advanced Chemistry', 'ICE103', 1, 1),
(3, 'Bussiness/Communication Skills', 'ICE153', 1, 1),
(4, 'Project Planning and Management', 'ICE1011', 1, 3),
(5, 'Electronics for Computing 1', 'ICE201', 1, 2),
(6, 'Electronics for Computing 2', 'ICE202', 1, 3),
(7, 'Electronics for Computing 3', 'ICE204', 1, 4),
(8, 'Electronics 1 ', 'ICE205', 1, 5),
(9, 'Basic Electronics 1 ', 'ICE207', 1, 5),
(10, 'Basic Electronics 2', 'ICE208', 1, 5),
(11, 'Basic Electronics 3', 'ICE209', 1, 6),
(12, 'Computer Hacking Forensic Investigator I', 'ICE1041', 1, 1),
(13, 'Fundermentals of Information Security', 'ICE1021', 1, 1),
(14, 'Fundermentals of Computer Forensics', 'ICE1011', 1, 1),
(15, 'Knowledge Management and E-Paradigm', 'ICE1001', 1, 1),
(16, 'Project Planning and Management', 'ICH1011', 1, 1),
(17, 'Research Methodology ', 'ICH1021', 1, 1),
(18, 'Interactive Web Development', 'ICE0121', 1, 3),
(19, 'Introduction to Computer Systems', 'ICE0222', 1, 3),
(20, 'Network Security Administration 1 ', 'ICE0324', 1, 7),
(21, 'Digital Communications I ', 'ICE0322', 1, 8),
(22, 'Artificial Intelligence', 'ICE0321', 1, 7),
(23, 'Final Year Project', 'ICE0411', 1, 8),
(24, 'Software Engineering 1', 'ICE0315', 1, 3),
(25, 'Software Economics', 'ICE0318', 1, 3),
(26, 'Software  Engineering Requirements', 'ICE0320', 1, 2),
(27, 'Special Education 1', 'ICE0322', 1, 3),
(28, 'Special Education 2', 'ICE0322', 1, 3),
(29, 'Special Education 3', 'ICE0322', 1, 3),
(30, 'Special Education', 'ICE0322', 1, 3),
(31, 'Mobile Programming', 'ICE0322', 1, 8),
(32, 'Java Programming', 'ICE0322', 1, 8),
(33, 'Enterprise Management', 'ICE0322', 1, 3),
(34, 'Higher Mathermatics 1', 'ICE0322', 1, 3),
(35, 'Higher Mathermatics 2', 'ICE0322', 1, 4),
(36, 'Mathermatic Methods 1', 'ICE0322', 1, 4),
(37, 'Mathermatic Methods 2', 'ICE0322', 1, 4),
(38, 'Mathermatic Methods 3', 'ICE0322', 1, 6),
(39, 'Mathermatic Methods 4', 'ICE0322', 1, 7),
(40, 'Mathermatic Methods 5', 'ICE0322', 1, 8),
(41, 'Sociology of Education', 'ICD0007', 1, 4),
(42, 'Internetworking Design and LAN/MAN Administration 2', 'ICE0224', 1, 4),
(43, 'Internetworking Design and LAN/MAN Administration 1', 'ICE0214', 1, 2),
(44, 'Operating Systems', 'ICE0124', 1, 3),
(45, 'Educational Administrative Policy Studies', 'ICD0006', 1, 7),
(46, 'LAB CHEM', 'LCH101', 1, 2),
(47, 'LAB CHEM 2', 'LCH102', 1, 3),
(48, 'Accountting', 'ICE4502', 1, 2),
(49, 'Banking and Finance', 'ICE4507', 1, 2),
(50, ' Finance Management', 'ICE4507', 1, 2),
(51, 'Introduction to Robotics', 'ICE4001', 1, 1),
(52, 'Introduction to Automata', 'ICE4002', 1, 2),
(53, 'Introduction to calculus', 'ICE4003', 1, 3),
(54, 'Introduction to Computer thoery', 'ICE4004', 1, 4),
(55, 'Bussiness Management', 'ICE10115', 1, 3),
(56, 'Biochemistry', '0', 1, 2),
(57, 'Medical Physics', '0', 1, 2),
(58, 'Fundamentals of Animal Nutrition', 'ICE319', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_assigned`
--

DROP TABLE IF EXISTS `course_assigned`;
CREATE TABLE IF NOT EXISTS `course_assigned` (
  `assignedcourse` int(100) NOT NULL AUTO_INCREMENT,
  `courseID` int(100) NOT NULL,
  `lecturerID` int(100) NOT NULL,
  PRIMARY KEY (`assignedcourse`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assigned`
--

INSERT INTO `course_assigned` (`assignedcourse`, `courseID`, `lecturerID`) VALUES
(1, 10, 3),
(2, 2, 3),
(6, 16, 3),
(4, 10, 4),
(5, 14, 4),
(7, 27, 3),
(8, 1, 5),
(9, 1, 5),
(10, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `materialcourse`
--

DROP TABLE IF EXISTS `materialcourse`;
CREATE TABLE IF NOT EXISTS `materialcourse` (
  `materialID` int(10) NOT NULL AUTO_INCREMENT,
  `courseID` int(10) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `lectureID` int(10) NOT NULL,
  PRIMARY KEY (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialcourse`
--

INSERT INTO `materialcourse` (`materialID`, `courseID`, `fileName`, `lectureID`) VALUES
(1, 10, 'Thesis Draft 2 v.4.4.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `read` varchar(1) NOT NULL,
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`msg_id`),
  KEY `to` (`from`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`from`, `to`, `subject`, `message`, `date`, `read`, `msg_id`) VALUES
('samuel', 'student', 'Passport sized photo', 'Dear Student, Send an electronic copy of  your passport sized photo to academic@icuzambia.net', '2012-01-20 08:13:05', 'N', 1),
('mudimba', 'all', 'Welcome to ICU', 'ICU strives to become the global ICT Leader', '2012-01-17 00:23:33', 'N', 2),
('admin', 'all', 'Welcome to ICU', 'ICU strives to become the global ICT Leader', '2012-01-17 00:23:33', 'N', 17),
('admin', 'all', 'Welcome to ICU', 'ICU strives to become the global ICT Leader', '2012-01-17 00:23:33', 'N', 20),
('admin', 'student', 'Passport sized photo', 'Dear Student, Send an electronic copy of  your passport sized photo to academic@icuzambia.net', '2012-01-20 08:13:05', 'N', 21);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `programName` varchar(100) NOT NULL,
  `shortname` varchar(200) NOT NULL,
  `SchoolName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `programName`, `shortname`, `SchoolName`) VALUES
(79, 'Mathematics', '6320', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

DROP TABLE IF EXISTS `program_course`;
CREATE TABLE IF NOT EXISTS `program_course` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(200) NOT NULL,
  `programID` int(11) NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_course`
--

INSERT INTO `program_course` (`pc_id`, `CourseID`, `programID`) VALUES
(1, '1', 74),
(2, '2', 74),
(3, '3', 74),
(4, '46', 74),
(5, '47', 74),
(6, '3', 26),
(7, '4', 26),
(8, '17', 26),
(9, '1', 3),
(10, '2', 3),
(11, '3', 3),
(12, '4', 3),
(13, '5', 3),
(14, '6', 3),
(15, '7', 3),
(16, '9', 3),
(17, '13', 3),
(18, '17', 3),
(19, '18', 3),
(20, '19', 3),
(21, '20', 3),
(22, '21', 3),
(23, '22', 3),
(24, '23', 3),
(25, '24', 3),
(26, '27', 3),
(27, '31', 3),
(28, '32', 3),
(29, '33', 3),
(30, '34', 3),
(31, '35', 3),
(32, '36', 3),
(33, '37', 3),
(34, '42', 3),
(35, '43', 3),
(36, '44', 3),
(37, '30', 9),
(38, '5', 5),
(39, '6', 5),
(40, '7', 5),
(41, '9', 5),
(42, '10', 5),
(43, '3', 5),
(44, '1', 25),
(45, '2', 25),
(46, '3', 25),
(47, '4', 25),
(48, '5', 25),
(49, '9', 25),
(50, '10', 25),
(51, '11', 25),
(52, '12', 25),
(53, '13', 25),
(54, '14', 25),
(55, '15', 25),
(56, '17', 25),
(57, '18', 25),
(58, '19', 25),
(59, '20', 25),
(60, '21', 25),
(61, '22', 25),
(62, '23', 25),
(63, '24', 25),
(64, '31', 25),
(65, '32', 25),
(66, '34', 25),
(67, '35', 25),
(68, '42', 25),
(69, '43', 25),
(70, '44', 25),
(71, '3', 7),
(72, '15', 7),
(73, '50', 7),
(74, '48', 7),
(75, '1', 8),
(76, '2', 8),
(77, '3', 8),
(78, '4', 8),
(79, '15', 8),
(80, '17', 8),
(81, '23', 8),
(82, '30', 8),
(83, '41', 8),
(84, '45', 8),
(85, '48', 8),
(86, '49', 8),
(87, '50', 8),
(88, '1', 13),
(89, '2', 13),
(90, '3', 13),
(91, '17', 13),
(92, '23', 13),
(93, '27', 13),
(94, '28', 13),
(95, '29', 13),
(96, '30', 13),
(97, '33', 13),
(98, '34', 13),
(99, '35', 13),
(100, '36', 13),
(101, '37', 13),
(102, '38', 13),
(103, '39', 13),
(104, '40', 13),
(105, '41', 13),
(106, '45', 13),
(107, '49', 13),
(108, '2', 28),
(109, '1', 76),
(110, '2', 76),
(111, '5', 76),
(112, '6', 76),
(113, '7', 76),
(114, '9', 76),
(115, '10', 76),
(116, '11', 76),
(117, '21', 76),
(118, '22', 76),
(119, '23', 76),
(120, '34', 76),
(121, '35', 76),
(122, '36', 76),
(123, '37', 76),
(124, '38', 76),
(125, '39', 76),
(126, '40', 76),
(127, '44', 76),
(128, '51', 76),
(129, '52', 76),
(130, '53', 76),
(131, '54', 76),
(132, '9', 4),
(133, '13', 4),
(134, '14', 4),
(135, '17', 4),
(136, '21', 4),
(137, '22', 4),
(138, '23', 4),
(139, '24', 4),
(140, '25', 4),
(141, '26', 4),
(142, '31', 4),
(143, '33', 4),
(144, '34', 4),
(145, '35', 4),
(146, '36', 4),
(147, '37', 4),
(148, '42', 4),
(149, '43', 4),
(150, '44', 4),
(151, '54', 4),
(152, '1', 77),
(153, '2', 77),
(154, '3', 77),
(155, '23', 77),
(156, '34', 77),
(157, '35', 77),
(158, '46', 77),
(159, '47', 77),
(160, '53', 77),
(161, '56', 77),
(162, '57', 77),
(163, '58', 78),
(164, '2', 78),
(165, '1', 78),
(166, '36', 78),
(167, '37', 78),
(168, '38', 78),
(169, '39', 78),
(170, '46', 78),
(171, '56', 78);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `questionID` int(10) NOT NULL AUTO_INCREMENT,
  `QuestionName` text NOT NULL,
  `answer1` varchar(100) NOT NULL,
  `answer2` varchar(100) NOT NULL,
  `answer3` varchar(100) NOT NULL,
  `answer4` varchar(100) NOT NULL,
  `finalAnswer` varchar(100) NOT NULL,
  `courseID` int(10) NOT NULL,
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `QuestionName`, `answer1`, `answer2`, `answer3`, `answer4`, `finalAnswer`, `courseID`) VALUES
(1, 'What is Matter?', 'is Anything that occupies space', 'is Anything that occupies solid', 'it is the ability to freezy at 0 degrees ', 'The condition at which water freezes', 'answer1', 10),
(2, 'aksjfljasnfkasf?', 'afasfadsa', 'sadasdfasfas', 'asdasxsa', 'scascasfsd', 'answer3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `sch_id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(200) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sch_id`, `schoolName`) VALUES
(1, 'Engineering'),
(2, 'Education'),
(3, 'Humanities'),
(4, 'Bussiness'),
(5, 'Medicine'),
(6, 'Agriculture'),
(7, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

DROP TABLE IF EXISTS `student1`;
CREATE TABLE IF NOT EXISTS `student1` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `othername` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `nrc` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `program` text NOT NULL,
  `programCode` varchar(200) NOT NULL,
  `doe` date NOT NULL,
  `address` text NOT NULL,
  `modeofstudy` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`st_id`, `firstname`, `lastname`, `othername`, `dob`, `nrc`, `age`, `gender`, `program`, `programCode`, `doe`, `address`, `modeofstudy`, `email`, `phone`, `status`) VALUES
(1, 'Mudimba', 'Moonde', 'Alex', '1990-07-31', '273873/13/1', 30, 'Male', 'Bachalor of Information and Communications Technology in System Engineering', 'BSICTSE', '2018-08-20', 'Mkushi secondary School,\np.o box 840020,\nmkushi', 'Distance', 'mudimbamoonde@gmail.com', 965840299, 1),
(2, 'Samuel', 'Judah', 'Ephiram', '1990-05-15', '337895/14/1', 28, 'Male', 'Bachalor of Information and Communications Technology with Education', '0', '2018-01-21', 'lusaka secondary School,\np.o box 550020,\nlusaka', 'Fulltime', 'mpande@gmail.com', 965840458, 0),
(3, 'Choongo', 'Moonde', 'Astorne', '1994-04-04', '287899/12/1', 24, 'Male', 'Bachalor of Science in Agriculture', '0', '2018-03-21', 'Luapula', 'Online', 'icu@icuzambia.net', 976471515, 0),
(4, 'Naddy', 'Munguza', 'Chikatizyo', '1992-08-01', '454566/13/1', 26, 'Female', 'Bachalor of Education in Mathematics', 'BEM', '2018-04-10', 'kabwe', 'Fulltime', 'naddymunguza@gmail.com', 965848569, 0),
(5, 'Chrispine', 'Musonda', 'Nill', '1988-08-05', '569822/14/1', 30, 'Male', 'Master of Social Works', '0', '2018-08-21', 'Kasama', 'Online', 'musondachrispne@gmail.com', 444444444, 0),
(6, 'Esnart', 'Mwiinga', 'Mulamboa', '1984-08-14', '789654/45/1', 34, 'Female', 'Bachalor of Education in Mathematics', 'BEM', '2018-08-21', 'chingola', 'Distance', 'esnartmwiinga@gmail.com', 987451236, 1),
(7, 'Rodgers', 'Moonde', 'Kameli', '1986-12-05', '261313/13/1', 32, 'Male', 'Bachalor of Science in Information Security and Computer Foreignsics', 'BSISCF', '2018-08-21', 'livingstorne', 'Fulltime', 'rodger@gmail.com', 964141442, 1),
(8, 'Patrice', 'Musonda', 'Linda', '1990-08-14', '584966/21/1', 28, 'Male', 'Bachalor of Arts with Commerce and Accounts', 'BACA', '2018-08-21', 'Mwinilunga', 'Distance', 'musondapatrice@gmail.com', 987451444, 1),
(9, 'Issac', 'William', 'Phiri', '1990-08-14', '484466/12/1', 28, 'Male', 'Bachalor of Education in Commerce', '0', '2018-08-21', 'Kasama', 'Online', 'kasamaphiri@gmail.com', 978459998, 0),
(10, 'Chanda', 'Banda', 'Byod', '1995-08-14', '584215/13/1', 23, 'Male', 'Master of Information and Communications Technology', 'MICT', '2018-08-21', 'Monze', 'Fulltime', 'byod@gmail.com', 978454564, 1),
(11, 'Muchindu', 'Moonde', 'Alvin', '2000-04-20', '451224/12/1', 18, 'Male', 'Bachalor of Information and Communications Technology in System Engineering', '0', '2018-08-22', 'Coppermine', 'Fulltime', 'mudimbamoonde11@gmail.com', 965784578, 0),
(12, 'Mervis', 'Mwanza', 'Hello', '1998-08-21', '189145/12/1', 20, 'Female', 'Master of Design and Technology', 'MDT', '2018-08-22', 'Chipata', 'Fulltime', 'mwanzaMervis@gmail.com', 155555555, 1),
(13, 'Phiri', 'Issac', 'Nill', '1978-04-04', '197804/12/1', 40, 'Male', 'Bachalor of Computer Science', 'BCS', '2018-08-22', 'kabwata', 'Fulltime', 'icu@icuzambia.net', 96584029, 0),
(14, 'Muule', 'Handibwe', 'Nill', '1985-08-23', '198511/12/1', 33, 'Female', 'Bachalor of  Arts with Commerce and Accounts with Education', 'BACAEDU', '2018-08-23', 'chooma', 'Fulltime', 'muulehandibwe@gmail.com', 987456112, 0),
(15, 'Bishop', 'Mulenda', 'M', '2019-06-18', '332445/12/1', 0, 'Male', 'Bachalor of Computer Science', 'BCS', '2019-06-16', 'lsk', 'Distance', 'mu@m.com', 965840299, 1),
(16, 'Brian', 'Chiinza', 'Himuusa', '1996-10-08', '245648/54/1', 23, 'Male', 'Bachalor of Medicine and Surgery', 'MBCHB', '2019-06-16', 'Lusaka', 'Fulltime', 'brian.chiinza@mbs.co.zm', 965841264, 1),
(17, 'Maluma', 'Kanyanta', 'Lume', '1995-08-03', '884757/54/1', 25, 'Male', 'Bachelor of agriculter in Animal Nutrition', 'BSAAN', '2020-08-03', 'Mkushi', 'Fulltime', 'malumak@gmail.com', 95844555, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_balance`
--

DROP TABLE IF EXISTS `student_balance`;
CREATE TABLE IF NOT EXISTS `student_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) NOT NULL,
  `semester_id` int(11) UNSIGNED NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `balance` double NOT NULL,
  `date_updated` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
  `asign_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_ID` int(100) NOT NULL,
  `programID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `grade` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`asign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`asign_id`, `student_ID`, `programID`, `course_ID`, `Semester`, `grade`) VALUES
(1, 1808273873, 4, 13, 1, NULL),
(2, 1808273873, 4, 14, 1, NULL),
(3, 1808273873, 4, 17, 1, NULL),
(4, 1808584215, 4, 13, 1, NULL),
(5, 1808584215, 4, 14, 1, NULL),
(6, 1808584215, 4, 17, 1, NULL),
(7, 1808584966, 7, 3, 1, NULL),
(8, 1808584966, 7, 15, 1, NULL),
(9, 1808261313, 25, 1, 1, NULL),
(10, 1808261313, 25, 2, 1, NULL),
(11, 1808261313, 25, 3, 1, NULL),
(12, 1808261313, 25, 12, 1, NULL),
(13, 1808261313, 25, 13, 1, NULL),
(14, 1808261313, 25, 14, 1, NULL),
(15, 1808261313, 25, 15, 1, NULL),
(16, 1808261313, 25, 17, 1, NULL),
(17, 1808584966, 7, 50, 2, NULL),
(18, 1808584966, 7, 48, 2, NULL),
(19, 1906332445, 76, 1, 1, NULL),
(20, 1906332445, 76, 2, 1, NULL),
(21, 1906332445, 76, 51, 1, NULL),
(22, 1906245648, 77, 1, 1, NULL),
(23, 1906245648, 77, 2, 1, NULL),
(24, 1906245648, 77, 3, 1, NULL),
(25, 1906245648, 77, 46, 2, NULL),
(26, 1906245648, 77, 56, 2, NULL),
(27, 1906245648, 77, 57, 2, NULL),
(28, 2008884757, 78, 2, 1, NULL),
(29, 2008884757, 78, 1, 1, NULL),
(30, 2008884757, 78, 58, 2, NULL),
(31, 2008884757, 78, 46, 2, NULL),
(32, 2008884757, 78, 56, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

DROP TABLE IF EXISTS `student_program`;
CREATE TABLE IF NOT EXISTS `student_program` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `student_id` int(100) NOT NULL,
  `studentID` int(100) NOT NULL,
  `programName` varchar(200) NOT NULL,
  `programCode` varchar(200) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_enrolled` date DEFAULT NULL,
  `year` int(100) DEFAULT NULL,
  `program_duration` int(10) DEFAULT NULL,
  `years_studied` int(10) DEFAULT NULL,
  `completed` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_program`
--

INSERT INTO `student_program` (`id`, `student_id`, `studentID`, `programName`, `programCode`, `semester_id`, `type`, `date_enrolled`, `year`, `program_duration`, `years_studied`, `completed`) VALUES
(1, 1808261313, 7, 'Bachalor of Science in Information Security and Computer Foreignsics', 'BSISCF', 1, 'major', '2018-08-21', 1, 4, 1, 0),
(2, 1808273873, 1, 'Master of Information and Communications Technology', 'MICT', 1, 'major', '2018-08-20', 1, 4, 1, 0),
(3, 1808789654, 6, 'Bachalor of Education in Mathematics', 'BEM', 1, 'major', '2018-08-21', 1, 4, 1, 0),
(4, 1808584215, 10, 'Master of Information and Communications Technology', 'MICT', 1, 'major', '2018-08-21', 1, 4, 1, 0),
(5, 1808189145, 12, 'Master of Design and Technology', 'MDT', 1, 'major', '2018-08-22', 1, 4, 1, 0),
(6, 1808584966, 8, 'Bachalor of Arts with Commerce and Accounts', 'BACA', 1, 'major', '2018-08-21', 1, 4, 1, 0),
(7, 1906332445, 15, 'Bachalor of Computer Science', 'BCS', 1, 'major', '2019-06-16', 1, 4, 1, 0),
(8, 1906245648, 16, 'Bachalor of Medicine and Surgery', 'MBCHB', 1, 'major', '2019-06-16', 1, 4, 1, 0),
(9, 2008884757, 17, 'Bachelor of agriculter in Animal Nutrition', 'BSAAN', 1, 'major', '2020-08-03', 1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nrc` varchar(100) DEFAULT NULL,
  `access_level` enum('System Admin','Student','accountant','admin','lecturer') DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `nrc` (`nrc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nrc`, `access_level`, `name`, `email`) VALUES
('1804454566', '6b35ad7fe69c12dae64989e90ccf0b90', '454566/13/1', 'Student', 'Naddy Munguza', 'naddymunguza@gmail.com'),
('1808273873', '85730ebcdefa6697ef03ea8ee65fbe01', '273873/13/1', 'Student', 'Mudimba Moonde', 'mudimbamoonde@gmail.com'),
('1906245648', '83718916894487928f6c62dc5829796c', '245648/54/1', 'Student', 'Brian Chiinza', 'brian.chiinza@mbs.co.zm'),
('1906332445', '0df8377f634318621c64fdfcf5c273d2', '332445/12/1', 'Student', 'Bishop Mulenda', 'mu@m.com'),
('2008884757', '4fe15d195fbc95a6cffcce4e7f05108e', '884757/54/1', 'Student', 'Maluma Kanyanta', 'malumak@gmail.com'),
('confortl', '5e75cb8e3fde0e6d71d7316e841aece4', '845146/94/1', 'lecturer', 'Confort Lewanika', 'confort@moge.gov'),
('makanda', 'd99c7e9f465be01ee203101e1a96c8e6', '487466/66/1', 'lecturer', 'Makanda Akufuna', 'akufunam@mbs.com'),
('mudimba', '41b7fa1956f021a54f3c290ec60e469c', '273871/13/1', 'System Admin', 'Moonde Mudimba', 'mudimbamoonde@gmail.com'),
('tinak', '41b7fa1956f021a54f3c290ec60e469c', '554566/66/1', 'lecturer', 'Katongo Tina', 'tinak@mbs.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
