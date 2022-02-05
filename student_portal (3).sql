-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 12:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_card`
--

CREATE TABLE `exam_card` (
  `id` int(11) NOT NULL,
  `regno` varchar(40) NOT NULL,
  `names` varchar(255) NOT NULL,
  `semester_no` int(1) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year_of_study` int(1) NOT NULL,
  `units_codes_names` varchar(10000) NOT NULL,
  `exam_card_no` varchar(49) NOT NULL,
  `unique_no` varchar(40) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_slip`
--

CREATE TABLE `result_slip` (
  `id` int(11) NOT NULL,
  `unit_code_name_marks_grade` mediumtext NOT NULL,
  `semester_no` int(1) NOT NULL,
  `reg_no` varchar(80) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` int(1) NOT NULL,
  `email` varchar(80) NOT NULL,
  `course` varchar(40) NOT NULL,
  `result_no` varchar(255) NOT NULL,
  `exam_card_no` varchar(255) NOT NULL,
  `unique_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester_reg`
--

CREATE TABLE `semester_reg` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(40) NOT NULL,
  `year` int(1) NOT NULL,
  `reg_date` varchar(40) NOT NULL,
  `semester_no` int(1) NOT NULL,
  `unique_no` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_reg`
--

INSERT INTO `semester_reg` (`id`, `reg_no`, `year`, `reg_date`, `semester_no`, `unique_no`) VALUES
(0, 'ccs/00215/019', 3, '2022', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `school` varchar(200) NOT NULL,
  `course` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `reg_no` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`id`, `fname`, `other_names`, `school`, `course`, `email`, `DOB`, `reg_no`, `pass`) VALUES
(0, 'Sheila', 'Wambui', 'School Of Computing And Informatics', 'Bsc Computer Science', 'wendies@gmail.com', '2021-12-30', 'ccs/00215/019', '123');

-- --------------------------------------------------------

--
-- Table structure for table `unit_reg`
--

CREATE TABLE `unit_reg` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(40) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_of_study` int(1) NOT NULL,
  `semester_no` int(1) NOT NULL,
  `school` varchar(255) NOT NULL,
  `unique_no` varchar(255) NOT NULL,
  `unit_codes_and_names` text NOT NULL,
  `year_reg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_reg`
--

INSERT INTO `unit_reg` (`id`, `reg_no`, `course`, `year_of_study`, `semester_no`, `school`, `unique_no`, `unit_codes_and_names`, `year_reg`) VALUES
(1, 'ccs/00215/019', 'Bsc Computer Science', 3, 1, 'School Of Computing And Informatics', '', 'CCS 307 Computer Networks', '2022'),
(2, 'ccs/00215/019', 'Bsc Computer Science', 3, 1, 'School Of Computing And Informatics', '', 'CCS 317 Computer Networks Lab I (CISCO),CCS 319 Database Administration,', '2022'),
(3, 'ccs/00215/019', 'Bsc Computer Science', 3, 1, 'School Of Computing And Informatics', '', 'CCS 301 Principles of programming languages,CCS 303 Design and Analysis of algorithms,', '2022-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_card`
--
ALTER TABLE `exam_card`
  ADD PRIMARY KEY (`exam_card_no`),
  ADD KEY `unique_no` (`unique_no`);

--
-- Indexes for table `result_slip`
--
ALTER TABLE `result_slip`
  ADD PRIMARY KEY (`exam_card_no`);

--
-- Indexes for table `semester_reg`
--
ALTER TABLE `semester_reg`
  ADD PRIMARY KEY (`unique_no`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `unit_reg`
--
ALTER TABLE `unit_reg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_no` (`unique_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unit_reg`
--
ALTER TABLE `unit_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_card`
--
ALTER TABLE `exam_card`
  ADD CONSTRAINT `exam_card_ibfk_1` FOREIGN KEY (`unique_no`) REFERENCES `unit_reg` (`unique_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_slip`
--
ALTER TABLE `result_slip`
  ADD CONSTRAINT `result_slip_ibfk_1` FOREIGN KEY (`exam_card_no`) REFERENCES `exam_card` (`exam_card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester_reg`
--
ALTER TABLE `semester_reg`
  ADD CONSTRAINT `semester_reg_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student_reg` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_reg`
--
ALTER TABLE `unit_reg`
  ADD CONSTRAINT `unit_reg_ibfk_1` FOREIGN KEY (`unique_no`) REFERENCES `semester_reg` (`unique_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
