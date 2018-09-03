-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2018 at 06:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e4it`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `idactivity` int(11) NOT NULL,
  `activityname` varchar(100) NOT NULL,
  `descriptionleft` varchar(500) DEFAULT NULL,
  `descriptionright` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`idactivity`, `activityname`, `descriptionleft`, `descriptionright`) VALUES
(2, 'Shopping PC', '1.In this  section  you  will  learn  how  to:  1.1.Simple  Present  Tense  1.2.Plural  nouns', '2.In  this  section  you  will  also  learn vocabulary  related  to:2.2.  Basic  Vocabulary  related  to  programming ');

-- --------------------------------------------------------

--
-- Table structure for table `activity_has_unity`
--

CREATE TABLE `activity_has_unity` (
  `activity_idactivity` int(11) NOT NULL,
  `unity_idunity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_has_unity`
--

INSERT INTO `activity_has_unity` (`activity_idactivity`, `unity_idunity`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `idadministrator` int(11) NOT NULL,
  `idnumber` varchar(10) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idadministrator`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(2, '222222222', 'Admin', 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@admin.cl', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `idanswer` int(11) NOT NULL,
  `answername` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `value_idvalue` int(11) NOT NULL,
  `question_idquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `idclass` int(11) NOT NULL,
  `classname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) DEFAULT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`idclass`, `classname`, `descriptioncenter`, `descriptionleft`, `descriptionright`) VALUES
(2, 'English II', '', '', ''),
(4, 'English III', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `idcoordinator` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `idexam` int(11) NOT NULL,
  `examname` varchar(45) NOT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_has_unity`
--

CREATE TABLE `exam_has_unity` (
  `exam_idexam` int(11) NOT NULL,
  `unity_idunity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `idgender` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`idgender`, `name`) VALUES
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `glosary`
--

CREATE TABLE `glosary` (
  `idglosary` int(11) NOT NULL,
  `wordname` varchar(45) NOT NULL,
  `description` varchar(200) NOT NULL,
  `aditionaldescription` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `role_idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`idlog`, `start`, `end`, `username`, `role_idrole`) VALUES
(1, '2018-07-16 22:56:43', NULL, 'maga', 7),
(2, '2018-07-16 22:56:46', NULL, 'maga', 7),
(3, '2018-07-16 22:56:48', '2018-07-16 22:56:58', 'maga', 7),
(4, '2018-07-16 22:57:29', NULL, 'maga', 7),
(5, '2018-07-16 22:57:31', NULL, 'maga', 7),
(6, '2018-07-16 22:57:33', '2018-07-16 22:58:19', 'maga', 7),
(7, '2018-07-22 19:36:46', NULL, 'maga', 7),
(8, '2018-07-22 19:36:48', '2018-07-22 19:38:08', 'maga', 7),
(9, '2018-07-22 19:39:13', NULL, 'maga', 7),
(10, '2018-07-22 19:39:26', NULL, 'maga', 7),
(11, '2018-07-22 19:39:28', NULL, 'maga', 7),
(12, '2018-07-22 19:39:30', '2018-07-22 19:39:58', 'maga', 7),
(13, '2018-07-25 00:16:05', '2018-07-25 00:16:23', 'lalaoa', 7);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `materialname` varchar(45) NOT NULL,
  `descriptionleft` varchar(200) NOT NULL,
  `descriptionright` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `route` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `materialtype_idmaterialtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idmaterial`, `materialname`, `descriptionleft`, `descriptionright`, `link`, `route`, `url`, `materialtype_idmaterialtype`) VALUES
(1, 'Metal.mp3', '', '', '', 'Metal.mp3', '', 2),
(2, 'UCHIRO GERI', 'KARATE ', 'PATADAS', 'https://www.youtube.com/watch?v=6jEoWCiMTI8', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `materialtype`
--

CREATE TABLE `materialtype` (
  `idmaterialtype` int(11) NOT NULL,
  `materialtypename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materialtype`
--

INSERT INTO `materialtype` (`idmaterialtype`, `materialtypename`) VALUES
(1, 'PDF'),
(2, 'Audio'),
(3, 'Video'),
(4, 'Youtube');

-- --------------------------------------------------------

--
-- Table structure for table `material_has_class`
--

CREATE TABLE `material_has_class` (
  `material_idmaterial` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `idmode` int(11) NOT NULL,
  `namemode` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`idmode`, `namemode`, `description`) VALUES
(1, 'Selection', NULL),
(2, 'DragAndDrop', NULL),
(3, 'Complete', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `idquestion` int(11) NOT NULL,
  `questionname` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `questiontype_idquestiontype` int(11) NOT NULL,
  `mode_idmode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questiontype`
--

CREATE TABLE `questiontype` (
  `idquestiontype` int(11) NOT NULL,
  `typename` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questiontype`
--

INSERT INTO `questiontype` (`idquestiontype`, `typename`, `description`) VALUES
(1, 'Listening', NULL),
(2, 'Reading', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_has_activity`
--

CREATE TABLE `question_has_activity` (
  `question_idquestion` int(11) NOT NULL,
  `question_questiontype_idquestiontype` int(11) NOT NULL,
  `activity_idactivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_has_exam`
--

CREATE TABLE `question_has_exam` (
  `question_idquestion` int(11) NOT NULL,
  `question_questiontype_idquestiontype` int(11) NOT NULL,
  `exam_idexam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `idrecord` int(11) NOT NULL,
  `recordname` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `rolename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `rolename`) VALUES
(4, 'Administrator'),
(5, 'Coordinator'),
(6, 'Teacher'),
(7, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `idsection` int(11) NOT NULL,
  `sectionname` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`idsection`, `sectionname`, `description`) VALUES
(2, '651-7D', '');

-- --------------------------------------------------------

--
-- Table structure for table `section_has_class`
--

CREATE TABLE `section_has_class` (
  `section_idsection` int(11) NOT NULL,
  `class_idclass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_has_class`
--

INSERT INTO `section_has_class` (`section_idsection`, `class_idclass`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idstudent`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(9, '15153155-5', 'OSCAR ALFONSO', 'LAGOS LAGOS', 'lalaoa', '81dc9bdb52d04dc20036dbd8313ed055', 'oscar.alfonso@inacapmail.cl', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_log`
--

CREATE TABLE `student_has_log` (
  `student_idstudent` int(11) NOT NULL,
  `log_idlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_has_section`
--

CREATE TABLE `student_has_section` (
  `student_idstudent` int(11) NOT NULL,
  `section_idsection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_has_section`
--

INSERT INTO `student_has_section` (`student_idstudent`, `section_idsection`) VALUES
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` int(11) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role_idrole` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`idteacher`, `idnumber`, `name`, `lastname`, `username`, `password`, `email`, `role_idrole`, `gender_idgender`) VALUES
(4, '17669373-8', 'BELÉN ELIZABETH', 'PEREZ DURÁN', 'beped', '81dc9bdb52d04dc20036dbd8313ed055', 'belen.perez@inacapmail.cl', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_has_log`
--

CREATE TABLE `teacher_has_log` (
  `teacher_idteacher` int(11) NOT NULL,
  `log_idlog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_has_section`
--

CREATE TABLE `teacher_has_section` (
  `teacher_idteacher` int(11) NOT NULL,
  `section_idsection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_has_section`
--

INSERT INTO `teacher_has_section` (`teacher_idteacher`, `section_idsection`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `unity`
--

CREATE TABLE `unity` (
  `idunity` int(11) NOT NULL,
  `unityname` varchar(45) NOT NULL,
  `descriptioncenter` varchar(200) DEFAULT NULL,
  `descriptionleft` varchar(200) DEFAULT NULL,
  `descriptionright` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unity`
--

INSERT INTO `unity` (`idunity`, `unityname`, `descriptioncenter`, `descriptionleft`, `descriptionright`) VALUES
(3, 'UNIT I', 'Shopping', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unity_has_section`
--

CREATE TABLE `unity_has_section` (
  `unity_idunity` int(11) NOT NULL,
  `section_idsection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unity_has_section`
--

INSERT INTO `unity_has_section` (`unity_idunity`, `section_idsection`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

CREATE TABLE `value` (
  `idvalue` int(11) NOT NULL,
  `valuename` varchar(45) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `value`
--

INSERT INTO `value` (`idvalue`, `valuename`, `val`) VALUES
(1, 'Good', 100),
(2, 'Regular', 50),
(3, 'Bad', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idactivity`),
  ADD UNIQUE KEY `activityname_UNIQUE` (`activityname`);

--
-- Indexes for table `activity_has_unity`
--
ALTER TABLE `activity_has_unity`
  ADD PRIMARY KEY (`activity_idactivity`,`unity_idunity`),
  ADD KEY `fk_activity_has_unity_unity1_idx` (`unity_idunity`),
  ADD KEY `fk_activity_has_unity_activity1_idx` (`activity_idactivity`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idadministrator`,`role_idrole`,`gender_idgender`),
  ADD KEY `fk_administrator_role1_idx` (`role_idrole`),
  ADD KEY `fk_administrator_gender1_idx` (`gender_idgender`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`idanswer`,`value_idvalue`,`question_idquestion`),
  ADD KEY `fk_answer_value1_idx` (`value_idvalue`),
  ADD KEY `fk_answer_question1_idx` (`question_idquestion`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idclass`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`idcoordinator`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  ADD KEY `fk_teacher_role1_idx` (`role_idrole`),
  ADD KEY `fk_teacher_gender1_idx` (`gender_idgender`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`idexam`),
  ADD UNIQUE KEY `examname_UNIQUE` (`examname`);

--
-- Indexes for table `exam_has_unity`
--
ALTER TABLE `exam_has_unity`
  ADD PRIMARY KEY (`exam_idexam`,`unity_idunity`),
  ADD KEY `fk_exam_has_unity_unity1_idx` (`unity_idunity`),
  ADD KEY `fk_exam_has_unity_exam1_idx` (`exam_idexam`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`idgender`);

--
-- Indexes for table `glosary`
--
ALTER TABLE `glosary`
  ADD PRIMARY KEY (`idglosary`),
  ADD UNIQUE KEY `wordname_UNIQUE` (`wordname`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`,`materialtype_idmaterialtype`),
  ADD KEY `fk_material_materialtype1_idx` (`materialtype_idmaterialtype`);

--
-- Indexes for table `materialtype`
--
ALTER TABLE `materialtype`
  ADD PRIMARY KEY (`idmaterialtype`);

--
-- Indexes for table `material_has_class`
--
ALTER TABLE `material_has_class`
  ADD PRIMARY KEY (`material_idmaterial`,`class_idclass`),
  ADD KEY `fk_material_has_class_class1_idx` (`class_idclass`),
  ADD KEY `fk_material_has_class_material1_idx` (`material_idmaterial`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`idmode`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idquestion`,`questiontype_idquestiontype`,`mode_idmode`),
  ADD KEY `fk_question_questiontype1_idx` (`questiontype_idquestiontype`),
  ADD KEY `fk_question_mode1_idx` (`mode_idmode`);

--
-- Indexes for table `questiontype`
--
ALTER TABLE `questiontype`
  ADD PRIMARY KEY (`idquestiontype`);

--
-- Indexes for table `question_has_activity`
--
ALTER TABLE `question_has_activity`
  ADD PRIMARY KEY (`question_idquestion`,`question_questiontype_idquestiontype`,`activity_idactivity`),
  ADD KEY `fk_question_has_activity_activity1_idx` (`activity_idactivity`),
  ADD KEY `fk_question_has_activity_question1_idx` (`question_idquestion`,`question_questiontype_idquestiontype`);

--
-- Indexes for table `question_has_exam`
--
ALTER TABLE `question_has_exam`
  ADD PRIMARY KEY (`question_idquestion`,`question_questiontype_idquestiontype`,`exam_idexam`),
  ADD KEY `fk_question_has_exam_exam1_idx` (`exam_idexam`),
  ADD KEY `fk_question_has_exam_question1_idx` (`question_idquestion`,`question_questiontype_idquestiontype`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`idrecord`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idsection`);

--
-- Indexes for table `section_has_class`
--
ALTER TABLE `section_has_class`
  ADD PRIMARY KEY (`section_idsection`,`class_idclass`),
  ADD KEY `fk_section_has_class_class1_idx` (`class_idclass`),
  ADD KEY `fk_section_has_class_section1_idx` (`section_idsection`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `idnumber_UNIQUE` (`idnumber`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `fk_student_role1_idx` (`role_idrole`),
  ADD KEY `fk_student_gender1_idx` (`gender_idgender`);

--
-- Indexes for table `student_has_log`
--
ALTER TABLE `student_has_log`
  ADD PRIMARY KEY (`student_idstudent`,`log_idlog`),
  ADD KEY `fk_student_has_log_log1_idx` (`log_idlog`),
  ADD KEY `fk_student_has_log_student1_idx` (`student_idstudent`);

--
-- Indexes for table `student_has_section`
--
ALTER TABLE `student_has_section`
  ADD PRIMARY KEY (`student_idstudent`,`section_idsection`),
  ADD KEY `fk_student_has_section_section1_idx` (`section_idsection`),
  ADD KEY `fk_student_has_section_student1_idx` (`student_idstudent`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`,`role_idrole`,`gender_idgender`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `rut_UNIQUE` (`idnumber`),
  ADD KEY `fk_teacher_role1_idx` (`role_idrole`),
  ADD KEY `fk_teacher_gender1_idx` (`gender_idgender`);

--
-- Indexes for table `teacher_has_log`
--
ALTER TABLE `teacher_has_log`
  ADD PRIMARY KEY (`teacher_idteacher`,`log_idlog`),
  ADD KEY `fk_teacher_has_log_log1_idx` (`log_idlog`),
  ADD KEY `fk_teacher_has_log_teacher1_idx` (`teacher_idteacher`);

--
-- Indexes for table `teacher_has_section`
--
ALTER TABLE `teacher_has_section`
  ADD PRIMARY KEY (`teacher_idteacher`,`section_idsection`),
  ADD KEY `fk_teacher_has_section_section1_idx` (`section_idsection`),
  ADD KEY `fk_teacher_has_section_teacher1_idx` (`teacher_idteacher`);

--
-- Indexes for table `unity`
--
ALTER TABLE `unity`
  ADD PRIMARY KEY (`idunity`);

--
-- Indexes for table `unity_has_section`
--
ALTER TABLE `unity_has_section`
  ADD PRIMARY KEY (`unity_idunity`,`section_idsection`),
  ADD KEY `fk_unity_has_section_section1_idx` (`section_idsection`),
  ADD KEY `fk_unity_has_section_unity1_idx` (`unity_idunity`);

--
-- Indexes for table `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`idvalue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `idactivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `idadministrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `idanswer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `idclass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `idcoordinator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `idexam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `idgender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `glosary`
--
ALTER TABLE `glosary`
  MODIFY `idglosary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materialtype`
--
ALTER TABLE `materialtype`
  MODIFY `idmaterialtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `idmode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `idquestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questiontype`
--
ALTER TABLE `questiontype`
  MODIFY `idquestiontype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `idrecord` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unity`
--
ALTER TABLE `unity`
  MODIFY `idunity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `value`
--
ALTER TABLE `value`
  MODIFY `idvalue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_has_unity`
--
ALTER TABLE `activity_has_unity`
  ADD CONSTRAINT `fk_activity_has_unity_activity1` FOREIGN KEY (`activity_idactivity`) REFERENCES `activity` (`idactivity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activity_has_unity_unity1` FOREIGN KEY (`unity_idunity`) REFERENCES `unity` (`idunity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `fk_administrator_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_administrator_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_idquestion`) REFERENCES `question` (`idquestion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_value1` FOREIGN KEY (`value_idvalue`) REFERENCES `value` (`idvalue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `fk_teacher_gender10` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_role10` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam_has_unity`
--
ALTER TABLE `exam_has_unity`
  ADD CONSTRAINT `fk_exam_has_unity_exam1` FOREIGN KEY (`exam_idexam`) REFERENCES `exam` (`idexam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exam_has_unity_unity1` FOREIGN KEY (`unity_idunity`) REFERENCES `unity` (`idunity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_materialtype1` FOREIGN KEY (`materialtype_idmaterialtype`) REFERENCES `materialtype` (`idmaterialtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `material_has_class`
--
ALTER TABLE `material_has_class`
  ADD CONSTRAINT `fk_material_has_class_class1` FOREIGN KEY (`class_idclass`) REFERENCES `class` (`idclass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_material_has_class_material1` FOREIGN KEY (`material_idmaterial`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_mode1` FOREIGN KEY (`mode_idmode`) REFERENCES `mode` (`idmode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_questiontype1` FOREIGN KEY (`questiontype_idquestiontype`) REFERENCES `questiontype` (`idquestiontype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_has_activity`
--
ALTER TABLE `question_has_activity`
  ADD CONSTRAINT `fk_question_has_activity_activity1` FOREIGN KEY (`activity_idactivity`) REFERENCES `activity` (`idactivity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_activity_question1` FOREIGN KEY (`question_idquestion`,`question_questiontype_idquestiontype`) REFERENCES `question` (`idquestion`, `questiontype_idquestiontype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_has_exam`
--
ALTER TABLE `question_has_exam`
  ADD CONSTRAINT `fk_question_has_exam_exam1` FOREIGN KEY (`exam_idexam`) REFERENCES `exam` (`idexam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_exam_question1` FOREIGN KEY (`question_idquestion`,`question_questiontype_idquestiontype`) REFERENCES `question` (`idquestion`, `questiontype_idquestiontype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `section_has_class`
--
ALTER TABLE `section_has_class`
  ADD CONSTRAINT `fk_section_has_class_class1` FOREIGN KEY (`class_idclass`) REFERENCES `class` (`idclass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_section_has_class_section1` FOREIGN KEY (`section_idsection`) REFERENCES `section` (`idsection`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_has_log`
--
ALTER TABLE `student_has_log`
  ADD CONSTRAINT `fk_student_has_log_log1` FOREIGN KEY (`log_idlog`) REFERENCES `log` (`idlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_log_student1` FOREIGN KEY (`student_idstudent`) REFERENCES `student` (`idstudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_has_section`
--
ALTER TABLE `student_has_section`
  ADD CONSTRAINT `fk_student_has_section_section1` FOREIGN KEY (`section_idsection`) REFERENCES `section` (`idsection`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_section_student1` FOREIGN KEY (`student_idstudent`) REFERENCES `student` (`idstudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_has_log`
--
ALTER TABLE `teacher_has_log`
  ADD CONSTRAINT `fk_teacher_has_log_log1` FOREIGN KEY (`log_idlog`) REFERENCES `log` (`idlog`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_has_log_teacher1` FOREIGN KEY (`teacher_idteacher`) REFERENCES `teacher` (`idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_has_section`
--
ALTER TABLE `teacher_has_section`
  ADD CONSTRAINT `fk_teacher_has_section_section1` FOREIGN KEY (`section_idsection`) REFERENCES `section` (`idsection`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_has_section_teacher1` FOREIGN KEY (`teacher_idteacher`) REFERENCES `teacher` (`idteacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unity_has_section`
--
ALTER TABLE `unity_has_section`
  ADD CONSTRAINT `fk_unity_has_section_section1` FOREIGN KEY (`section_idsection`) REFERENCES `section` (`idsection`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unity_has_section_unity1` FOREIGN KEY (`unity_idunity`) REFERENCES `unity` (`idunity`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
