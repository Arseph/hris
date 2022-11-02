-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 04:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris2`
--
CREATE DATABASE IF NOT EXISTS `hris2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hris2`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(255) NOT NULL,
  `depart_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depart_name`) VALUES
(1, 'IT'),
(2, 'Human Resource'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `agency_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pob` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `bloodtype` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulevel` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `residential_house` varchar(255) NOT NULL,
  `residential_subdivision` varchar(255) NOT NULL,
  `residential_city` varchar(255) NOT NULL,
  `residential_contactnum` varchar(255) NOT NULL,
  `residential_street` varchar(255) NOT NULL,
  `residential_barangay` varchar(255) NOT NULL,
  `residential_province` varchar(255) NOT NULL,
  `permanent_house` varchar(255) NOT NULL,
  `permanent_subdivision` varchar(255) NOT NULL,
  `permanent_city` varchar(255) NOT NULL,
  `permanent_contactnum` varchar(255) NOT NULL,
  `permanent_Street` varchar(255) NOT NULL,
  `permanent_barangay` varchar(255) NOT NULL,
  `permanent_province` varchar(255) NOT NULL,
  `gsis` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `spouse_surname` varchar(255) NOT NULL,
  `spouse_firstname` varchar(255) NOT NULL,
  `spouse_middlename` varchar(255) NOT NULL,
  `spouse_contact` varchar(255) NOT NULL,
  `spouse_occupation` varchar(255) NOT NULL,
  `spouse_business_add` varchar(255) NOT NULL,
  `spouse_dob` varchar(255) NOT NULL,
  `father_surname` varchar(255) NOT NULL,
  `father_fname` varchar(255) NOT NULL,
  `father_mname` varchar(255) NOT NULL,
  `father_dob` varchar(255) NOT NULL,
  `mother_maiden_name` varchar(255) NOT NULL,
  `mother_surname` varchar(255) NOT NULL,
  `mother_fname` varchar(255) NOT NULL,
  `mother_mname` varchar(255) NOT NULL,
  `mother_dob` varchar(255) NOT NULL,
  `children_name` varchar(255) NOT NULL,
  `other_skills` text NOT NULL,
  `other_nac` text NOT NULL,
  `other_memberships` text NOT NULL,
  `other_referrence` text NOT NULL,
  `other_third` text NOT NULL,
  `other_fourth` text NOT NULL,
  `other_details1` text NOT NULL,
  `other_offence` text NOT NULL,
  `other_details2` text NOT NULL,
  `other_charge` text NOT NULL,
  `other_details3` text NOT NULL,
  `other_convict` text NOT NULL,
  `other_details4` text NOT NULL,
  `other_separate` text NOT NULL,
  `other_details5` text NOT NULL,
  `other_candidate` text NOT NULL,
  `other_details6` text NOT NULL,
  `other_service` text NOT NULL,
  `other_details7` text NOT NULL,
  `other_immigrant` text NOT NULL,
  `other_details8` text NOT NULL,
  `other_indigenous` text NOT NULL,
  `other_details9` text NOT NULL,
  `other_disability` text NOT NULL,
  `other_details10` text NOT NULL,
  `other_parent` text NOT NULL,
  `other_details11` text NOT NULL,
  `other_passport_id` text NOT NULL,
  `other_passport_date` text NOT NULL,
  `other_gsis_id` text NOT NULL,
  `other_gsis_date` text NOT NULL,
  `other_sss_id` text NOT NULL,
  `other_sss_date` text NOT NULL,
  `other_prc_id` text NOT NULL,
  `other_prc_date` text NOT NULL,
  `other_driver_id` text NOT NULL,
  `other_driver_date` text NOT NULL,
  `mother_unit` text NOT NULL,
  `mother_station` text NOT NULL,
  `designated_unit` text NOT NULL,
  `designated_station` text NOT NULL,
  `inactive_reason` text NOT NULL,
  `nonperm_type` text NOT NULL,
  `eligible` text NOT NULL,
  `eligibility1` text NOT NULL,
  `eligibility2` text NOT NULL,
  `eligibility3` text NOT NULL,
  `eligibility4` text NOT NULL,
  `eligibility5` text NOT NULL,
  `eligibility6` text NOT NULL,
  `eligibility7` text NOT NULL,
  `eligibility8` text NOT NULL,
  `eligibility9` text NOT NULL,
  `eligibility10` text NOT NULL,
  `eligibility11` text NOT NULL,
  `eligibility12` text NOT NULL,
  `eligibility_level3` text NOT NULL,
  `position` text NOT NULL,
  `salary_grade` text NOT NULL,
  `basic_salary` text NOT NULL,
  `step` text NOT NULL,
  `item_no` text NOT NULL,
  `designation_type` text NOT NULL,
  `designation` text NOT NULL,
  `highest_level` text NOT NULL,
  `work_exp` text NOT NULL,
  `personality` text NOT NULL,
  `special_info` text NOT NULL,
  `last_promotion_date` text NOT NULL,
  `gov_entry_date` text NOT NULL,
  `201_files` text NOT NULL,
  `remarks` text NOT NULL,
  `field_experience` text NOT NULL,
  `foe_lvl` text DEFAULT NULL,
  `gapno` text NOT NULL,
  `required_competency` text NOT NULL,
  `required_competency_level` text NOT NULL,
  `current_competency_level` text NOT NULL,
  `actionno` text NOT NULL,
  `gaps_identified` text NOT NULL,
  `gap_targetdate` text NOT NULL,
  `action_taken` text NOT NULL,
  `competency_level` text NOT NULL,
  `gad_intervension` text NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `agency_id`, `firstname`, `suffix`, `middlename`, `birthday`, `lastname`, `pob`, `sex`, `civilstatus`, `citizenship`, `weight`, `height`, `bloodtype`, `username`, `password`, `ulevel`, `imagepath`, `residential_house`, `residential_subdivision`, `residential_city`, `residential_contactnum`, `residential_street`, `residential_barangay`, `residential_province`, `permanent_house`, `permanent_subdivision`, `permanent_city`, `permanent_contactnum`, `permanent_Street`, `permanent_barangay`, `permanent_province`, `gsis`, `pagibig`, `philhealth`, `sss`, `email`, `mobile`, `tin`, `spouse_surname`, `spouse_firstname`, `spouse_middlename`, `spouse_contact`, `spouse_occupation`, `spouse_business_add`, `spouse_dob`, `father_surname`, `father_fname`, `father_mname`, `father_dob`, `mother_maiden_name`, `mother_surname`, `mother_fname`, `mother_mname`, `mother_dob`, `children_name`, `other_skills`, `other_nac`, `other_memberships`, `other_referrence`, `other_third`, `other_fourth`, `other_details1`, `other_offence`, `other_details2`, `other_charge`, `other_details3`, `other_convict`, `other_details4`, `other_separate`, `other_details5`, `other_candidate`, `other_details6`, `other_service`, `other_details7`, `other_immigrant`, `other_details8`, `other_indigenous`, `other_details9`, `other_disability`, `other_details10`, `other_parent`, `other_details11`, `other_passport_id`, `other_passport_date`, `other_gsis_id`, `other_gsis_date`, `other_sss_id`, `other_sss_date`, `other_prc_id`, `other_prc_date`, `other_driver_id`, `other_driver_date`, `mother_unit`, `mother_station`, `designated_unit`, `designated_station`, `inactive_reason`, `nonperm_type`, `eligible`, `eligibility1`, `eligibility2`, `eligibility3`, `eligibility4`, `eligibility5`, `eligibility6`, `eligibility7`, `eligibility8`, `eligibility9`, `eligibility10`, `eligibility11`, `eligibility12`, `eligibility_level3`, `position`, `salary_grade`, `basic_salary`, `step`, `item_no`, `designation_type`, `designation`, `highest_level`, `work_exp`, `personality`, `special_info`, `last_promotion_date`, `gov_entry_date`, `201_files`, `remarks`, `field_experience`, `foe_lvl`, `gapno`, `required_competency`, `required_competency_level`, `current_competency_level`, `actionno`, `gaps_identified`, `gap_targetdate`, `action_taken`, `competency_level`, `gad_intervension`, `department`) VALUES
(1, '', 'charlie magne', '', '0', '', 'martinez', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(2, '', 'ALVIN', '', '0', '', 'sample lastname', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2'),
(118, '336', 'charlie magne', '', 'alcazaren', '1993-08-05', 'martinez', 'cotabato city', '', 'Single', 'filipino', '70', '3', 'A+', 'admin', 'password', 'IT', '../uploads/1646877721.jpg', '#8.', 'a', 'Cotabato City', '09561204359', 'F.millan', 'RH XIII', 'Maguindanao', '8', 'a', 'Cotabato City', '09561204359', 'F.millan', 'RH XIII', 'Maguindanao', 'none', 'none', 'none', 'none', 'itcharlofficial@gmail.com', '09561204359', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '', 'martinez', 'christopher', 'aldana', '1965-08-07', 'umbao', 'martinez', 'chiella', 'alcazaren', '1965-02-13', 'none', 'electronics', '', '', '', 'no', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'none', '2022-03-18', 'none', '2022-03-26', 'none', '2022-03-25', 'none', '2022-03-24', 'none', '2022-03-22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '3333', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648447663.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '5', '3', '4', '5', 'Dropped from the roll', 'Temporary ', 'yes', 'Registered nurse', 'RA 1080', 'Licensure Exam for Teacher', 'Environmental Planning', 'CS Sub-Professional', 'Midwifery Board', 'Barangay Eligibility', 'National Competency TESDA', 'CS Professional', 'Sanitation Board10', 'Cvil Engineering', 'Others', 'CESO V', 'CESE', '1', '231231231', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '66666666', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648448606.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '3', '19', '2', '9', 'AWOL', 'Coterminous ', 'yes', 'Registered nurse', 'RA 1080', 'Licensure Exam for Teacher', 'Environmental Planning', 'CS Sub-Professional', 'Midwifery Board', 'Barangay Eligibility', 'National Competency TESDA', 'CS Professional', 'Sanitation Board10', 'Cvil Engineering', 'Others', 'CESO V', 'CESO IV', '1', '23123', '1', '123123', '1', '123123', '2', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '44444444444444', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648449052.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '2', '9', '2', '9', 'AWOL', 'Coterminous ', 'yes', 'Registered nurse', 'RA 1080', 'Licensure Exam for Teacher', 'Environmental Planning', 'CS Sub-Professional', 'Midwifery Board', 'Barangay Eligibility', 'National Competency TESDA', 'CS Professional', 'Sanitation Board10', 'Cvil Engineering', 'Others', 'CESE', 'CESO V', '1', '23123', '3', '123123', '1', '123123', '2', '1', '2', '1', '2022-03-02', '2022-03-03', '123123123123', '123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, '2222222222222222', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648449136.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '1', '2', '1', '2', 'AWOL', 'Temporary ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESE', '1', '23123', '1', '123123', '1', '123123', '1', '2', '2', '2', '2022-03-10', '2022-03-18', '123123', '123123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, '3333333', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648449444.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '1', '2', '1', '2', 'Dropped from the roll', 'Temporary ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESE', '1', '213123', '1', '123', '2', '123123', '2', '2', '1', '1', '2022-03-18', '2022-03-05', '1231', '123123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, '111', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648449663.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '1', '2', '2', '9', 'Dropped from the roll', 'Coterminous ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESO V', '2', '123123', '2', '123', '1', '123', '1', '2', '2', '1', '2022-03-04', '2022-03-17', '123123', '123123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, '88888', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648449779.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '3', '19', '2', '9', 'Secondment', 'Temporary ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESO V', '1', '123', '1', '123123', '1', '123', '1', '2', '1', '2', '2022-03-16', '2022-03-12', '123123', '123123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, '75757575757575', 'ertrter', 'qweqweq', 'tertert', '2022-03-23', 'weqweqwe', 'ertert', '', 'Single', 'ertert', '123123', '3', 'O', 'kekw', 'ham', 'IT', '../uploads/1648450589.png', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sdasd', 'asdasd', 'asd', 'asd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasda', 'sdasd', 'asdas', 'dasdasdasd', 'asda', '2022-03-02', 'asdas', 'dasd', 'asdasd', '2022-03-17', 'asd', 'asd', 'asdasd', 'asdasd', '2022-03-18', 'asdasd', 'asd', 'asd', 'asdasd', 'asdasd', 'yes', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', '123123', '2022-03-10', '123123', '2022-03-24', '123123', '2022-03-26', '123123', '2022-03-11', 'asdasdasd', '2022-03-25', '2', '9', '2', '9', 'Dropped from the roll', 'Temporary ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESE', '2', 'qweq23123', '2', '12312', '2', '1231', '3', '1', '2', '1', '2022-03-02', '2022-03-05', '123123', '123123', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, '555', 'zzzzzzzz', 'zzzzzzzz', 'zzzzzzzz', '2022-03-11', 'zzzzzzzz', 'zzzzzzzz', '', 'Single', 'filipino', '123', '3', 'O', '123', '123', 'IT', '../uploads/1648514371.png', 'asd', 'sdasd', 'asdasd', 'asd', 'asdasd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', 'asd', '2022-03-03', 'asd', 'asd', 'asd', '2022-03-04', 'asd', 'asd', 'asd', 'asd', '2022-03-11', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'yes', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasdas', '123', '2022-03-16', '123123', '2022-03-19', '123123', '2022-03-15', '123123123', '2022-03-12', '123123123', '2022-03-25', '1', '2', '2', '9', 'Dropped from the roll', 'Coterminous ', 'yes', 'Registered nurse', '', '', '', '', '', '', '', '', '', '', '', 'CESE', 'CESE', '1', '123123', '1', '123123', '1', '123123', '2', '2', '1', '1', '2022-03-11', '2022-03-10', '123123', '123123213', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, '6666', 'zzzzzzzz', 'zzzzzzzz', 'zzzzzzzz', '2022-03-11', 'zzzzzzzz', 'zzzzzzzz', '', 'Single', 'filipino', '123', '3', 'O', '123', '123', 'IT', '../uploads/1648522242.png', 'asd', 'sdasd', 'asdasd', 'asd', 'asdasd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', 'asd', '2022-03-03', 'asd', 'asd', 'asd', '2022-03-04', 'asd', 'asd', 'asd', 'asd', '2022-03-11', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'yes', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasdas', '123', '2022-03-16', '123123', '2022-03-19', '123123', '2022-03-15', '123123123', '2022-03-12', '123123123', '2022-03-25', '1', '2', '2', '9', 'Dropped from the roll', 'Coterminous ', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', 'CESE', 'CESO V', '2', '123123', '0', '123123', '2', '123123', '1', '2', '1', '2', '2022-03-11', '2022-03-10', '123123', '123123213', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, '777', 'zzzzzzzz', 'zzzzzzzz', 'zzzzzzzz', '2022-03-11', 'zzzzzzzz', 'zzzzzzzz', '', 'Single', 'filipino', '123', '3', 'O', '123', '123', 'IT', '../uploads/1648522477.png', 'asd', 'sdasd', 'asdasd', 'asd', 'asdasd', 'asda', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', 'asd', '2022-03-03', 'asd', 'asd', 'asd', '2022-03-04', 'asd', 'asd', 'asd', 'asd', '2022-03-11', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'yes', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasd', 'yes', 'asdasdas', '123', '2022-03-16', '123123', '2022-03-19', '123123', '2022-03-15', '123123123', '2022-03-12', '123123123', '2022-03-25', '2', '9', '2', '9', 'Dropped from the roll', 'Coterminous ', 'yes', 'Registered nurse, RA 1080', '', '', '', '', '', '', '', '', '', '', '', 'CESE', 'CESO V', '1', '123123', '1', '123123', '1', '123123', '1', '1', '1', '1', '2022-03-19', '2022-03-19', '123123', '123123213', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, '12313', 'ASD', 'ASD', 'ASD', '2022-03-03', 'ASDASD', 'ASDA', '', 'Single', 'filipino', '1231', '3', 'A', 'ASD', 'ASD', 'IT', '../uploads/1648523943.png', 'WEQWE', 'QWEQWE', 'QWEQ', 'QWE', 'QWEQWE', 'QWEQWE', 'WEQWEQWE', 'QWE', 'QWEQW', 'EQWE', 'QWE', 'QWEQ', 'QWEQWE', 'QWEQWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'WE', '2022-03-09', 'QWE', 'QWE', 'QWE', '2022-04-01', 'QWE', 'QWE', 'QWE', 'QWE', '2022-03-04', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'yes', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'QWE', '2022-03-10', '', '2022-03-18', 'QWEQWE', '2022-03-12', 'QWE', '2022-03-10', 'QWE', '2022-03-17', '1', '2', '2', '9', 'AWOL', 'Temporary ', 'no', 'Registered nurse, RA 1080', '', '', '', '', '', '', '', '', '', '', '', 'CESO V', 'CESE', '1', '4234234', '2', '234', '1', '234234', '1', '1', '1', '1', '2022-03-09', '2022-03-10', '234234', '234234', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, '1993', 'ASD', 'ASD', 'ASD', '2022-03-03', 'ASDASD', 'ASDA', '', 'Single', '123', '1231', '3', 'A', 'ASD', 'ASD', 'IT', '../uploads/1648530850.png', 'WEQWE', 'QWEQWE', 'QWEQ', 'QWE', 'QWEQWE', 'QWEQWE', 'WEQWEQWE', 'QWE', 'QWEQW', 'EQWE', 'QWE', 'QWEQ', 'QWEQWE', 'QWEQWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'WE', '2022-03-09', 'QWE', 'QWE', 'QWE', '2022-04-01', 'QWE', 'QWE', 'QWE', 'QWE', '2022-03-04', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'yes', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'QWE', '2022-03-10', '', '2022-03-18', 'QWEQWE', '2022-03-12', 'QWE', '2022-03-10', 'QWE', '2022-03-17', '1', '2', '1', '2', 'AWOL', 'Coterminous ', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'CESE', 'CESE', '1', '4234234', '0', '234', '1', '234234', '2', '2', '1', '1', '2022-03-09', '2022-03-10', '234234', '234234', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, '1994', 'ASD', 'ASD', 'ASD', '2022-03-03', 'ASDASD', 'ASDA', '', 'Single', '123', '1231', '3', 'A', 'ASD', 'ASD', 'IT', '../uploads/1648531039.png', 'WEQWE', 'QWEQWE', 'QWEQ', 'QWE', 'QWEQWE', 'QWEQWE', 'WEQWEQWE', 'QWE', 'QWEQW', 'EQWE', 'QWE', 'QWEQ', 'QWEQWE', 'QWEQWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'WE', '2022-03-09', 'QWE', 'QWE', 'QWE', '2022-04-01', 'QWE', 'QWE', 'QWE', 'QWE', '2022-03-04', 'QWE', 'QWE', 'QWE', 'QWE', 'QWE', 'yes', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'no', 'QWE', 'QWE', '2022-03-10', '', '2022-03-18', 'QWEQWE', '2022-03-12', 'QWE', '2022-03-10', 'QWE', '2022-03-17', '1', '2', '1', '2', 'Dropped from the roll', 'Coterminous ', 'no', 'Registered nurse, RA 1080, Licensure Exam for Teacher, Environmental Planning, CS Sub-Professional, Midwifery Board, Barangay Eligibility, National Competency TESDA, CS Professional, Sanitation Board10, Cvil Engineering, Others', '', '', '', '', '', '', '', '', '', '', '', 'CESE', 'CESE', '1', '4234234', '2', '234', '2', '234234', '2', '1', '1', '1', '2022-03-09', '2022-03-10', '234234', '234234', '', NULL, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `id` int(255) NOT NULL,
  `r_house` int(255) DEFAULT NULL,
  `r_street` int(255) DEFAULT NULL,
  `r_village` int(255) DEFAULT NULL,
  `r_barangay` int(255) DEFAULT NULL,
  `r_city` int(255) DEFAULT NULL,
  `r_province` int(255) DEFAULT NULL,
  `r_contact` int(255) DEFAULT NULL,
  `p_house` int(255) DEFAULT NULL,
  `p_street` int(255) DEFAULT NULL,
  `p_village` int(255) DEFAULT NULL,
  `p_barangay` int(255) DEFAULT NULL,
  `p_city` int(255) DEFAULT NULL,
  `p_province` text DEFAULT NULL,
  `p_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_basic`
--

CREATE TABLE `employee_basic` (
  `id` int(255) NOT NULL,
  `imagepath` text DEFAULT NULL,
  `agencyid` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `suffix` text DEFAULT NULL,
  `firstname` text DEFAULT NULL,
  `middlename` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `pob` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `civil` text DEFAULT NULL,
  `citizenship` text DEFAULT NULL,
  `multi` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `bloodtype` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `userlevel` text DEFAULT NULL,
  `hrinfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_basic`
--

INSERT INTO `employee_basic` (`id`, `imagepath`, `agencyid`, `surname`, `suffix`, `firstname`, `middlename`, `dob`, `pob`, `gender`, `civil`, `citizenship`, `multi`, `height`, `weight`, `bloodtype`, `username`, `password`, `userlevel`, `hrinfo`) VALUES
(74, 'uploads/1649387484.png', '336', 'martinez', '', 'charlie magne', 'alcazaren', '1993-08-05', 'cotabato city', 'male', 'single', 'dual', 'filipino malaysian', '176', '65', 'O+', 'admin', 'password', 'user', 'unset'),
(87, 'uploads/1649390259.png', '777', 'omar', '', 'suharto', '', '2022-04-21', 'cotabato city', 'male', 'single', 'filipino', '', '123', '123', 'AB+', 'admin', 'password', 'user', 'unset'),
(88, 'uploads/1649390371.png', '778', 'bra', '', 'aron', '', '2022-04-21', 'cotabato city', 'male', 'single', 'filipino', '', '123', '123', 'AB+', 'admin', 'password', 'user', 'unset'),
(89, 'uploads/1649390437.png', '779', 'indol', '', 'masala', '', '2022-04-21', 'cotabato city', 'male', 'single', 'filipino', '', '123', '123', 'AB+', 'admin', 'password', 'user', 'unset'),
(90, 'uploads/1649496563.png', '999', 'lorenzo', '', 'john ismael', '', '2022-04-13', '', 'male', 'single', 'dual', '', '190', '72', 'A+', 'admin', 'password', 'user', 'unset'),
(91, 'uploads/1649497064.png', '0001', 'nacional', '', 'john philip', '', '2022-04-05', 'cotabato city', 'male', 'single', 'filipino', '', '160', '65', 'A+', 'admin', 'password', 'user', 'unset');

-- --------------------------------------------------------

--
-- Table structure for table `mstation`
--

CREATE TABLE `mstation` (
  `id` int(255) NOT NULL,
  `mother_station` text NOT NULL,
  `mother_unit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstation`
--

INSERT INTO `mstation` (`id`, `mother_station`, `mother_unit`) VALUES
(2, 'OFFICE OF THE DIRECTOR III', 1),
(3, 'OFFICE OF THE DIRECTOR IV', 5),
(4, 'REGULATION, LICENSING AND ENFORCEMENT DIVISION', 6),
(5, 'NORTH COTABATO', 4),
(6, 'SARANGANI / GENERAL SANTOS CITY', 4),
(7, 'SOUTH COTABATO', 4),
(8, 'SULTAN KUDARAT', 4),
(9, 'ENVIRONMENTAL & OCCUPATIONAL HEALTH CLUSTER', 2),
(10, 'FAMILY HEALTH CLUSTER', 2),
(11, 'HEALTH EMERGENCY MANAGEMENT SYSTEMS', 2),
(12, 'HEALTH FACILITY DEVELOPMENT CLUSTER', 2),
(13, 'HEALTH FACILITY ENHANCEMENT PROGRAM', 2),
(14, 'HEALTH SYSTEMS DEVELOPMENT CLUSTER', 2),
(15, 'INFECTIOUS DISEASE CLUSTER', 2),
(16, 'NON COMMUNICABLE DISEASE CLUSTER', 2),
(17, 'OFFICE OF THE CHIEF LOCAL HEALTH SUPPORT DIVISION', 2),
(18, 'REGIONAL EPIDEMIOLOGY & SURVEILLANCE UNIT\r\n', 2),
(19, 'ACCOUNTING SECTION', 3),
(20, 'BUDGET SECTION', 3),
(21, 'CASHIER SECTION', 3),
(22, 'COLD ROOM', 3),
(23, 'GENERAL SERVICES', 3),
(24, 'HEALTH EDUCATION & PROMOTION OFFICE', 3),
(25, 'HUMAN RESOURCE DEVELOPMENT UNIT', 3),
(26, 'INFORMATION & COMMUNICATION TECHNOLOGY UNIT', 3),
(27, 'LEGAL UNIT', 3),
(28, 'OFFICE OF THE CHIEF ADMINISTRATIVE OFFICER', 3),
(29, 'OFFICE OF THE SUPERVISING ADMINISTRATIVE OFFICER', 3),
(30, 'PERSONNEL SECTION', 3),
(31, 'PLANNING SECTION', 3),
(32, 'PROCUREMENT SECTION', 3),
(33, 'RECORDS SECTION', 3),
(34, 'SUPPLY SECTION', 3);

-- --------------------------------------------------------

--
-- Table structure for table `munit`
--

CREATE TABLE `munit` (
  `id` int(255) NOT NULL,
  `mother_unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `munit`
--

INSERT INTO `munit` (`id`, `mother_unit`) VALUES
(1, 'ARD'),
(2, 'LHSD'),
(3, 'MSD'),
(4, 'Prov. DOH Office'),
(5, 'RD'),
(6, 'RLED');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(255) NOT NULL,
  `position_name` text NOT NULL,
  `mother_station` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `id` int(255) NOT NULL,
  `levelname` varchar(255) NOT NULL,
  `powerlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`id`, `levelname`, `powerlevel`) VALUES
(1, 'superadmin', '1'),
(2, 'admin', '2'),
(3, 'user', '3'),
(4, 'guest', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `creator_id` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL,
  `userlevel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `employee_id`, `creator_id`, `date_created`, `userlevel`) VALUES
(1, 'admin', 'password', '1', '1', '02/08/2022', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_basic`
--
ALTER TABLE `employee_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstation`
--
ALTER TABLE `mstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `munit`
--
ALTER TABLE `munit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `employee_address`
--
ALTER TABLE `employee_address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_basic`
--
ALTER TABLE `employee_basic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `mstation`
--
ALTER TABLE `mstation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `munit`
--
ALTER TABLE `munit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
