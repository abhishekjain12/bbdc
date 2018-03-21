-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2018 at 04:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4488549_bitbotdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administration`
--

CREATE TABLE `Administration` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administration`
--

INSERT INTO `Administration` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Fees Structure for ACPC', 'ad01', 6),
(2, 'Fees Structure for MQ', 'ad02', 6),
(3, 'Security deposit', 'ad03', 5),
(4, 'Overall placement from college', 'ad04', 5),
(5, 'Library inquiry', 'ad05', 5),
(6, 'Under which University', 'ad06', 5),
(7, 'Colleges under GTU', 'ad07', 5),
(8, 'Lunch or Break timing', 'ad08', 5),
(9, 'Number of rooms in Boys hostel', 'ad09', 5),
(10, 'Number of rooms in Girls hostel', 'ad10', 5),
(11, 'TFW students', 'ad11', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Civil_Engineering`
--

CREATE TABLE `Civil_Engineering` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Civil_Engineering`
--

INSERT INTO `Civil_Engineering` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Number of seats', 'ce01', 5),
(2, 'ACPC or MQ seats available', 'ce02', 5),
(3, 'Shifts and its timing', 'ce03', 4),
(4, 'Timings', 'ce04', 8),
(5, 'Placements in Civil', 'ce05', 5),
(6, 'Arriving companies info', 'ce06', 3),
(7, 'Package info', 'ce07', 4),
(8, 'Number of staff/faculty', 'ce08', 5),
(9, 'Number of Labs', 'ce09', 2),
(10, 'Number of instruments per Lab', 'ce10', 2),
(11, 'Lab Facilities', 'ce11', 3),
(12, 'Daily Schedule', 'ce12', 3),
(13, 'Number of class', 'ce13', 3),
(14, 'Number of students per class', 'ce14', 3),
(15, 'Extra Activity', 'ce15', 3),
(16, 'Syllabus', 'ce16', 4),
(17, 'Collaborations with Abroad colleges', 'ce17', 0),
(18, 'Girl boy ratio', 'ce18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Computer_Engineering`
--

CREATE TABLE `Computer_Engineering` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Computer_Engineering`
--

INSERT INTO `Computer_Engineering` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Seats', 'cse01', 4),
(2, 'ACPC and Management Seats', 'cse02', 4),
(3, 'Shifts', 'cse03', 0),
(4, 'Timings', 'cse04', 6),
(5, 'Placements/Jobs/recruitment', 'cse05', 4),
(6, 'Placements/Jobs/recruitments', 'cse06', 4),
(7, 'Companies', 'cse07', 3),
(8, 'Packages/Salary', 'cse08', 4),
(9, 'Number of Staff/faculty', 'cse09', 3),
(10, 'Number of Labs', 'cse10', 3),
(11, 'Number of PC per lab', 'cse11', 3),
(12, 'Lab Facility', 'cse12', 3),
(13, 'PCs', 'cse13', 1),
(14, 'Day Schedule', 'cse14', 0),
(15, 'Number of classes', 'cse15', 3),
(16, 'Number of student per class', 'cse16', 0),
(17, 'Extra Activity', 'cse17', 0),
(18, 'Syllabus', 'cse18', 0),
(19, 'Difference between CSE and CE', 'cse19', 0),
(20, 'Abroad Studies', 'cse20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Electrical_Engineering`
--

CREATE TABLE `Electrical_Engineering` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Electrical_Engineering`
--

INSERT INTO `Electrical_Engineering` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Seats', 'ee01', 7),
(2, 'ACPC/MQ Seats', 'ee02', 5),
(3, 'Shifts', 'ee03', 3),
(4, 'Timings', 'ee04', 5),
(5, 'Placements', 'ee05', 4),
(6, 'Companies', 'ee06', 3),
(7, 'Package/Salary', 'ee07', 4),
(8, 'Number of Staff(faculty)', 'ee08', 5),
(9, 'Number of Labs', 'ee09', 2),
(10, 'Number of Instruments per lab', 'ee10', 2),
(11, 'Lab Facilities', 'ee11', 1),
(12, 'Scope of the department', 'ee12', 2),
(13, 'Day Schedule', 'ee13', 0),
(14, 'Number of classes', 'ee14', 3),
(15, 'Number of students per class', 'ee15', 3),
(16, 'Extra Activities', 'ee16', 3),
(17, 'Syllabus', 'ee17', 1),
(18, 'International/Abroad Student Exchange', 'ee18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Electronic_Communication_Engineering`
--

CREATE TABLE `Electronic_Communication_Engineering` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Electronic_Communication_Engineering`
--

INSERT INTO `Electronic_Communication_Engineering` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Availability of seats', 'ec01', 6),
(2, 'Acpc/Management quota', 'ec02', 7),
(3, 'Shifts available in degree course', 'ec03', 3),
(4, 'Daily college timings', 'ec04', 8),
(5, 'Placements/jobs/recruitment inquiry', 'ec05', 5),
(6, 'Arriving companies information', 'ec06', 2),
(7, 'Faculties/teachers details', 'ec07', 4),
(8, 'Facilities provided in Labs/on campus', 'ec08', 3),
(9, 'Number of labs allocated to EC department', 'ec09', 1),
(10, 'Equipments provided in labs', 'ec10', 2),
(11, 'Number of computers allocated to EC department', 'ec11', 0),
(12, 'Daily hours for Lectures/Labs/Extracurricular', 'ec12', 0),
(13, 'Total classes/sections per semester', 'ec13', 0),
(14, 'Number of students per class in EC', 'ec14', 0),
(15, 'Technology-Supported Environments for Learning', 'ec15', 0),
(16, 'Details about courses/syllabus/number of credits', 'ec16', 0),
(17, 'Overall ranking of department', 'ec17', 0),
(18, 'Collaborations with Abroad colleges/universities', 'ec18', 0),
(19, 'Number of seats for D2D students', 'ec19', 0),
(20, 'Inquiry of working staffs/faculties', 'ec20', 3),
(21, 'Difference between EC and EE', 'ec21', 0),
(22, 'Future government scopes', 'ec22', 0),
(23, 'Inquiry related to scholarships on campus', 'ec23', 0),
(24, 'Achievements/Highlights of passed out EC students', 'ec24', 0),
(25, 'Funding related to startups in field of EC', 'ec25', 0),
(26, 'Available intership programs for BE students', 'ec116', 0),
(27, 'Ratio of boys vs girls per class/department', 'ec117', 0),
(28, 'Scope in field market', 'ec118', 0),
(29, 'Details about white collar/field jobs in EC dept', 'ec119', 0);

-- --------------------------------------------------------

--
-- Table structure for table `General`
--

CREATE TABLE `General` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `General`
--

INSERT INTO `General` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Add random/ Your suggestion', 'g01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Mechanical_Engineering`
--

CREATE TABLE `Mechanical_Engineering` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Mechanical_Engineering`
--

INSERT INTO `Mechanical_Engineering` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Seats availability in mechanical', 'me01', 9),
(2, 'Admission criteria ACPC/Management quota', 'me02', 4),
(3, 'Shifts available in degree course', 'me03', 0),
(4, 'Daily timings', 'me04', 5),
(5, 'Placement/job/recruitment inquiry', 'me05', 5),
(6, 'Arriving companies info', 'me06', 2),
(7, 'Faculties/teachers inquiry', 'me07', 4),
(8, 'Facilities provided in Labs/on campus', 'me08', 3),
(9, 'Number of labs allocated to Mechanical department', 'me09', 0),
(10, 'Machinery provided in labs', 'me10', 2),
(11, 'Number of computers allocated to Mechanical', 'me11', 0),
(12, 'Daily hours for Lectures/Labs/extracurricular', 'me12', 0),
(13, 'Total classes/sections per semester', 'me13', 0),
(14, 'Number of students per class in Mechanical', 'me14', 0),
(15, 'Technology-Supported Environments for Learning', 'me15', 0),
(16, 'Details about courses/syllabus/number of credits ', 'me16', 0),
(17, 'Overall ranking of department/college', 'me17', 0),
(18, 'Collaborations with Abroad colleges ', 'me18', 0),
(19, 'Number of seats for D2D students', 'me19', 4),
(20, 'Total working staff/faculties', 'me20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Pharmacy`
--

CREATE TABLE `Pharmacy` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pharmacy`
--

INSERT INTO `Pharmacy` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Number of Seats', 'ph01', 4),
(2, 'ACPC or MQ seats available', 'ph02', 2),
(3, 'Shifts and its timing', 'ph03', 3),
(4, 'Timings', 'ph04', 2),
(5, 'Placements in Pharmacy', 'ph05', 3),
(6, 'Arriving Companies info.', 'ph06', 3),
(7, 'Package info', 'ph07', 2),
(8, 'Number of staff/faculty', 'ph08', 3),
(9, 'Number of Labs', 'ph09', 2),
(10, 'Lab Facilities', 'ph10', 2),
(11, 'Daily Schedule', 'ph11', 2),
(12, 'Number of classes', 'ph12', 1),
(13, 'Number of students per class', 'ph13', 1),
(14, 'Extra Activity', 'ph14', 1),
(15, 'Syllabus', 'ph15', 3),
(16, 'Organizing camps', 'ph16', 2),
(17, 'Achievements', 'ph17', 1),
(18, 'Industry Training', 'ph18', 2),
(19, 'Course Duration', 'ph19', 2),
(20, 'Eligible for Admission in Pharmacy', 'ph20', 2),
(21, 'Fees in Pharmacy', 'ph21', 2),
(22, 'University Accreditation', 'ph22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Physiotherapy`
--

CREATE TABLE `Physiotherapy` (
  `id` int(6) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Physiotherapy`
--

INSERT INTO `Physiotherapy` (`id`, `pattern`, `filename`, `count`) VALUES
(1, 'Number of seats', 'py01', 4),
(2, 'ACPC or MQ Seats available', 'py02', 2),
(3, 'Shifts and its timing', 'py03', 3),
(4, 'Timings', 'py04', 2),
(5, 'Placement in Physiotherapy', 'py05', 3),
(6, 'Arriving companies info', 'py06', 3),
(7, 'Package info', 'py07', 2),
(8, 'Number of staff/faculty', 'py08', 2),
(9, 'Number of Labs', 'py09', 2),
(10, 'Lab Facilities', 'py10', 2),
(11, 'Daily Schedule', 'py11', 2),
(12, 'Number of classes', 'py12', 1),
(13, 'Number of students per class', 'py13', 1),
(14, 'Extra Activity', 'py14', 1),
(15, 'Syllabus', 'py15', 2),
(16, 'Clinic/Hospitals', 'py16', 1),
(17, 'Availability of Training/Clinic', 'py17', 2),
(18, 'Hospital Attachments', 'py18', 0),
(19, 'Fees in Physiotherapy', 'py19', 2),
(20, 'Library availablity', 'py20', 2),
(21, 'Course Duration', 'py21', 2),
(22, 'University Accreditation', 'py22', 2),
(23, 'Eligible for Admission in Physiotherapy', 'py23', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administration`
--
ALTER TABLE `Administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Civil_Engineering`
--
ALTER TABLE `Civil_Engineering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Computer_Engineering`
--
ALTER TABLE `Computer_Engineering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Electrical_Engineering`
--
ALTER TABLE `Electrical_Engineering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Electronic_Communication_Engineering`
--
ALTER TABLE `Electronic_Communication_Engineering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `General`
--
ALTER TABLE `General`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Mechanical_Engineering`
--
ALTER TABLE `Mechanical_Engineering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Physiotherapy`
--
ALTER TABLE `Physiotherapy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administration`
--
ALTER TABLE `Administration`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Civil_Engineering`
--
ALTER TABLE `Civil_Engineering`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Computer_Engineering`
--
ALTER TABLE `Computer_Engineering`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Electrical_Engineering`
--
ALTER TABLE `Electrical_Engineering`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Electronic_Communication_Engineering`
--
ALTER TABLE `Electronic_Communication_Engineering`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `General`
--
ALTER TABLE `General`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Mechanical_Engineering`
--
ALTER TABLE `Mechanical_Engineering`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Physiotherapy`
--
ALTER TABLE `Physiotherapy`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
