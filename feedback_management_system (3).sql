-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 11:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Ccode` varchar(6) NOT NULL,
  `CName` varchar(50) DEFAULT NULL,
  `C_MAID` varchar(10) DEFAULT NULL,
  `C_LID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Ccode`, `CName`, `C_MAID`, `C_LID`) VALUES
('CE5012', 'Mechanics of material', NULL, NULL),
('CE5070', 'Database', NULL, NULL),
('CE5080', 'Software', NULL, NULL),
('EC5030', 'Control System', NULL, NULL),
('EC5110', 'Architecture', NULL, NULL),
('MP3010', 'Discrete Mathematics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_feedback`
--

CREATE TABLE `course_feedback` (
  `CourseCode` varchar(6) DEFAULT NULL,
  `CourseName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_ID` varchar(10) NOT NULL,
  `FType` varchar(30) DEFAULT NULL,
  `FS_ID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `L_ID` varchar(10) NOT NULL,
  `LName` varchar(150) DEFAULT NULL,
  `L_MAID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`L_ID`, `LName`, `L_MAID`) VALUES
('L002', 'Nethmi', NULL),
('L005', 'Janani', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_feedback`
--

CREATE TABLE `lecturer_feedback` (
  `LecturerID` varchar(10) NOT NULL,
  `LectureName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_ID` varchar(8) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_ID`, `UserName`, `Department`) VALUES
('12345', '2021e110@eng.jfn.ac.lk', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `ma`
--

CREATE TABLE `ma` (
  `MID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_login`
--

CREATE TABLE `ma_login` (
  `MA_ID` varchar(10) NOT NULL,
  `MA_Name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RollNo` int(11) NOT NULL,
  `RName` varchar(150) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `RDepartment` varchar(100) DEFAULT NULL,
  `RS_ID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` varchar(100) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Semester` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `S_UserID` varchar(8) DEFAULT NULL,
  `S_MA_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Ccode`),
  ADD KEY `C_MAID` (`C_MAID`),
  ADD KEY `C_LID` (`C_LID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `FS_ID` (`FS_ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`L_ID`),
  ADD KEY `L_MAID` (`L_MAID`);

--
-- Indexes for table `lecturer_feedback`
--
ALTER TABLE `lecturer_feedback`
  ADD PRIMARY KEY (`LecturerID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `ma`
--
ALTER TABLE `ma`
  ADD KEY `MID` (`MID`);

--
-- Indexes for table `ma_login`
--
ALTER TABLE `ma_login`
  ADD PRIMARY KEY (`MA_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RollNo`),
  ADD KEY `RS_ID` (`RS_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `S_UserID` (`S_UserID`),
  ADD KEY `S_MA_ID` (`S_MA_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RollNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`C_MAID`) REFERENCES `ma_login` (`MA_ID`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`C_LID`) REFERENCES `lecturer` (`L_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`FS_ID`) REFERENCES `student` (`S_ID`);

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`L_MAID`) REFERENCES `ma_login` (`MA_ID`);

--
-- Constraints for table `ma`
--
ALTER TABLE `ma`
  ADD CONSTRAINT `ma_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `ma_login` (`MA_ID`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`RS_ID`) REFERENCES `student` (`S_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`S_UserID`) REFERENCES `login` (`User_ID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`S_MA_ID`) REFERENCES `ma_login` (`MA_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
