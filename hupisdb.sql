-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2019 at 01:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hupisdb`
--
CREATE DATABASE IF NOT EXISTS `hupisdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hupisdb`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atime` varchar(10) NOT NULL,
  `adate` date NOT NULL,
  `docid` bigint(4) NOT NULL,
  PRIMARY KEY (`appointid`),
  KEY `patid` (`patid`),
  KEY `docid` (`docid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `docappointment`
--

CREATE TABLE IF NOT EXISTS `docappointment` (
  `apptid` int(10) NOT NULL AUTO_INCREMENT,
  `patid` bigint(10) NOT NULL,
  `datetime` datetime NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(50) NOT NULL,
  `docid` bigint(10) NOT NULL,
  PRIMARY KEY (`apptid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `docappointment`
--

INSERT INTO `docappointment` (`apptid`, `patid`, `datetime`, `adate`, `atime`, `docid`) VALUES
(1, 109, '0000-00-00 00:00:00', '2019-06-26', '4:30 PM', 1115),
(2, 110, '0000-00-00 00:00:00', '2019-06-30', '11:00 AM', 1124),
(3, 110, '0000-00-00 00:00:00', '2019-06-30', '11:00 AM', 1124);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` bigint(4) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(50) NOT NULL,
  `quali` varchar(50) NOT NULL,
  `specialistin` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1128 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `doctorname`, `quali`, `specialistin`, `contactno`, `emailid`, `biodata`, `password`) VALUES
(1115, 'Chaltu Taressa Lamessa', 'MD DM', 'neurologist', '0932216376', 'chaltutaressa@gmail.com', 'new graduate', '123456'),
(1117, 'Mandefiro Sintayehu Belay', 'MD DM', 'Operology', '251910447788', 'mande@gmail.com', 'He is an eye specialist', '123456'),
(1124, 'Chaltu Bekele Tolasa', 'MDoc', 'neurologist', '0960666999', 'ChaltuIS@yahoo.com', 'new graduate', '12345'),
(1125, 'Fatuma Seid Mohammed', 'MDoc', 'Dentist', '0922356874', 'fatuma@gmail.com', 'She is a good dentist', '12345'),
(1126, 'bulcha tulu tsegaye', 'MDoc', 'dermatology', '3456789023', 'bulcha@gmil.com', 'good experiance', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` bigint(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `designation` varchar(59) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11120 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `password`, `empname`, `address`, `contactno`, `emailid`, `designation`) VALUES
(11111, '111111', 'Melkamu Tola Bijiga', 'Rift vally University', '0956865478', 'melkamu@hotmail.com', 'Clerk'),
(11112, '111112', 'William Mitiku Gamada', 'Rift vally University', '0935789645', 'williamm@yahoo.com', 'Lab Technician'),
(11114, '111114', 'Kadir Hussien Malhima', 'Bishoftu', '0936547889', 'kadirhussien@hotmail.com', 'Lab Technician'),
(11115, '12345', 'Chaltu Taressa Lamessa', 'Rift vally University', '0932216376', 'chaltutaressa@gmail.com', 'Clerk'),
(11116, '12345', 'Fatuma Seid Mohammed', 'Rift vally University', '0922356874', 'fatuma@gmail.com', 'Administrator'),
(11118, '', 'Kebede Getachew Demeke', 'Addis Abeba Ethiopia', '0956865478', 'kebede@gmail.com', 'Lab Technician'),
(11119, '', 'Musa Ousman Abdella', 'Adama', '0925417893', '', 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `labrequest`
--

CREATE TABLE IF NOT EXISTS `labrequest` (
  `labreqid` int(10) NOT NULL AUTO_INCREMENT,
  `patid` bigint(20) NOT NULL,
  `docid` bigint(20) NOT NULL,
  `testtype` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`labreqid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `labrequest`
--

INSERT INTO `labrequest` (`labreqid`, `patid`, `docid`, `testtype`, `status`) VALUES
(2, 108, 1117, 'BP, X-Ray, Blood Group', 'result not sent'),
(3, 104, 1115, 'BP, X-Ray, Blood Group', 'Request sent');

-- --------------------------------------------------------

--
-- Table structure for table `labresult`
--

CREATE TABLE IF NOT EXISTS `labresult` (
  `patid` bigint(20) NOT NULL,
  `docid` bigint(20) NOT NULL,
  `testtype` text NOT NULL,
  `testresult` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labresult`
--

INSERT INTO `labresult` (`patid`, `docid`, `testtype`, `testresult`) VALUES
(108, 1117, 'BP,x-ray,blood group', 'BP is very high\r\nx-ray is sent to your office\r\nBlood group is ABC'),
(104, 1115, 'BP, X-Ray, Blood Goup', 'hhhhhhhhhhhhhhhhhhhh\r\nfdddddddddddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE IF NOT EXISTS `labtest` (
  `testid` bigint(4) NOT NULL AUTO_INCREMENT,
  `ttypeid` bigint(4) NOT NULL,
  `patid` bigint(4) NOT NULL,
  `empid` bigint(4) NOT NULL DEFAULT '0',
  `labfee` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `treid` bigint(4) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`testid`),
  KEY `ttypeid` (`ttypeid`),
  KEY `patid` (`patid`),
  KEY `empid` (`empid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine`, `description`) VALUES
('ddddddddddddd', 'ffffffffffffffffffffffff'),
('Amoxacisliin ', 'antibiotics for different diseases');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patfname` varchar(25) NOT NULL,
  `patlname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bloodgroup` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`patid`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `contactno` (`contactno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patid`, `patfname`, `patlname`, `password`, `dob`, `gender`, `emailid`, `contactno`, `address`, `city`, `state`, `country`, `bloodgroup`, `status`) VALUES
(112, 'Abebe', 'Getachew', '000002', '1976-05-07', 'Male', 'mohandas@yahoo.com', '0925417893', 'Harar, Ethiopia', 'Mangalore', 'Karnataka', 'India', 'B+ve', 'Amoxacillin'),
(114, 'Abdella', 'Kedir', '000004', '1992-06-16', 'Male', 'nizarabdulla@gmail.com', '0955674896', 'Arsi, Ethiopia', 'Mangalore', 'Karnataka', 'India', 'O+ve', 'Parastamol, simple headac'),
(115, 'Meron', 'Alebachew', '123456', '1999-06-10', 'Female', 'meri@gmail.com', '0966554477', 'Dire Dawa, Ethiopia', '', '', '', '', 'Fever, take hot drinks');

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

CREATE TABLE IF NOT EXISTS `patientinfo` (
  `patid` int(20) NOT NULL AUTO_INCREMENT,
  `patfname` varchar(30) NOT NULL,
  `patmname` varchar(30) NOT NULL,
  `patlname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contactno` bigint(12) NOT NULL,
  `status` varchar(99) NOT NULL,
  PRIMARY KEY (`patid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`patid`, `patfname`, `patmname`, `patlname`, `dob`, `gender`, `address`, `contactno`, `status`) VALUES
(104, 'kk', 'jjj', 'ooo', '0000-00-00', 'Male', 'kkk', 911478596, 'Untreated'),
(105, 'jjj', 'ffff', 'gtt', '1997-06-25', 'Male', 'jjjj', 911478596, 'Treated'),
(108, 'Martha', 'Assefa', 'Belete', '2016-06-30', 'Female', 'Addis Ababa', 922356874, 'Treated'),
(109, 'besrat', 'nbv', 'mnhb', '2006-06-21', 'Male', 'dddd', 1234567890678765, 'untreated'),
(110, 'abba', 'tulu', 'kebede', '2003-06-10', 'Male', 'Addis Abeba Ethiopia', 978563432, 'untreated'),
(111, 'abba', 'tulu', 'kebede', '2003-06-10', 'Male', 'Addis Abeba Ethiopia', 978563432, 'noop'),
(112, 'cala', 'kebede', 'tsegaye', '1981-06-20', 'Male', 'Bishoftu', 97856345623, 'untreated');

-- --------------------------------------------------------

--
-- Table structure for table `patientold`
--

CREATE TABLE IF NOT EXISTS `patientold` (
  `patid` int(20) NOT NULL,
  `patfname` varchar(30) NOT NULL,
  `patmname` varchar(30) NOT NULL,
  `patlname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` bigint(13) NOT NULL,
  `status` varchar(99) NOT NULL,
  PRIMARY KEY (`patid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientold`
--

INSERT INTO `patientold` (`patid`, `patfname`, `patmname`, `patlname`, `dob`, `gender`, `address`, `contactno`, `status`) VALUES
(101, 'Abebech', 'Kebede', 'Geremew', '1993-06-24', 'Female', 'Harar', 945123654, 'Treated'),
(102, 'Abdella', 'Kadier', 'Hussen', '0000-00-00', 'Male', 'Harar, Ethiopia', 956865478, 'Treated'),
(103, 'jjj', 'kk', 'kk', '0000-00-00', 'Female', 'kk', 922356874, 'Treated'),
(106, 'Abebech', 'Kebede', 'Geremew', '1993-06-24', 'Female', 'Harar', 945123654, 'Treated'),
(107, 'Kasech', 'Sinishaw', 'Asnake', '1998-06-11', 'Female', 'Addis Ababa', 922356874, 'Treated');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `presid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `medicine` text NOT NULL,
  `treid` bigint(4) NOT NULL,
  PRIMARY KEY (`presid`),
  KEY `patid` (`patid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testtype`
--

CREATE TABLE IF NOT EXISTS `testtype` (
  `ttypeid` bigint(4) NOT NULL AUTO_INCREMENT,
  `testtype` varchar(25) NOT NULL,
  `descript` varchar(100) NOT NULL,
  PRIMARY KEY (`ttypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testtype`
--

INSERT INTO `testtype` (`ttypeid`, `testtype`, `descript`) VALUES
(1, 'Blood Test', 'Testing of Blood'),
(2, 'Blood Group', 'Testing of Blood Group'),
(3, 'BP', 'Testing of Blood Pleasure'),
(4, 'Sugar', 'Testing of Sugar'),
(5, 'X-RAY', 'X-Ray is Taking');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE IF NOT EXISTS `timings` (
  `docid` bigint(4) DEFAULT NULL,
  `timings` text NOT NULL,
  `fromtime` time DEFAULT NULL,
  `totime` time DEFAULT NULL,
  `session` varchar(25) NOT NULL,
  `tstatus` varchar(25) DEFAULT NULL,
  KEY `docid` (`docid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`docid`, `timings`, `fromtime`, `totime`, `session`, `tstatus`) VALUES
(1117, '8:30 AM to 12:00 AM \r\n1:30 PM to 5:00 PM', NULL, NULL, '', NULL),
(1124, '8:30 AM to 12:00 AM \r\n1:30 PM to 5:00 PM', NULL, NULL, '', NULL),
(1125, '8:30 AM to 12:00 AM \r\n1:30 PM to 5:00 PM\r\n6:00 PM to 10:00 PM', NULL, NULL, '', NULL),
(1115, '8:30 To 5:00PM', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatedpatient`
--

CREATE TABLE IF NOT EXISTS `treatedpatient` (
  `treatid` bigint(10) NOT NULL AUTO_INCREMENT,
  `patid` bigint(20) NOT NULL,
  `docid` bigint(20) NOT NULL,
  `symptoms` text NOT NULL,
  `prescription` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`treatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `treatedpatient`
--

INSERT INTO `treatedpatient` (`treatid`, `patid`, `docid`, `symptoms`, `prescription`, `date`, `time`) VALUES
(1, 104, 1115, 'fever, coughing, sneezing, no appitite', 'Amoxicillin for one week and paracetamol when feeling a headache', '2016-06-28', '6:30 PM'),
(2, 103, 1115, 'simple fever, and headache', 'paracetamol\r\n', '2016-06-30', '8:00 PM'),
(3, 105, 1115, 'simple headache, coughing', 'paracetamol. shirop\r\n', '2016-06-30', '4:00 PM'),
(5, 106, 1115, 'headache, fever, coughing ', 'amoxicillin, parastamol', '2016-06-30', '11:30 AM'),
(6, 102, 1117, 'sniffing, coughing, headache', 'paracetamol, amoxicillin\r\n', '2016-06-29', '4:00 PM'),
(7, 106, 1117, 'dfghjkldfghjklghjkl', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhggggggggggggggggggggggggggffffffffffffffffffffffffffffffff', '2016-07-10', '4:30 PM'),
(8, 103, 1117, 'gggggggggggggggggggggg\r\nddddddddddddddddddddd\r\nssssssssssssssssssssssss', 'vvvvvvvvvvvvvvvvvv\r\nvvvvvvvvvvvvvvvvvv\r\nbbbbbbbbbbbbbbbb\r\nvvvvvvvvvvvvvvvvvvv', '2016-07-08', '10:30 AM'),
(9, 107, 1117, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\niiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii\r\nllllllllllllllllllllllllllllllllllll', 'pppppppppppppppppppppppppp\r\noooooooooooooooooooooooooo\r\ngggggggggggggggggggggggggggg', '2016-07-04', '2:00 PM'),
(10, 105, 1115, 'hhhhhhhhhhhhhhhhhhhhhhhhhh\r\nkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'tttttttttttttttttttttttttttttttt\r\neeeeeeeeeeeeeeeeeeeeeee', '2016-07-05', '8:00 PM'),
(11, 108, 1115, 'hhhhhhhhhhhhhhhhhhh\r\nkkkkkkkkkkkkkkkkkkkk\r\nggggggggggggggggggg', 'tttttttttttttttttttttt\r\nuuuuuuuuuuuuuuuuuuuu\r\nooooooooooooooo', '2016-07-04', '6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `treid` bigint(4) NOT NULL AUTO_INCREMENT,
  `docid` bigint(4) NOT NULL,
  `treatfee` float NOT NULL,
  `treatment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointid` bigint(4) NOT NULL,
  PRIMARY KEY (`treid`),
  KEY `docid` (`docid`),
  KEY `appointid` (`appointid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `userId` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userId`, `password`, `usertype`) VALUES
(1, 1234, '12345', 'administrator'),
(2, 1115, '12345', 'doctor'),
(4, 1122, '12345', 'Clerk'),
(5, 1133, '12345', 'Lab Technician'),
(13, 1144, '12345', 'Doctor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `labtest_ibfk_1` FOREIGN KEY (`ttypeid`) REFERENCES `testtype` (`ttypeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_2` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_4` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_ibfk_3` FOREIGN KEY (`appointid`) REFERENCES `appointment` (`appointid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
