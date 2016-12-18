-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 08:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsly`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionalinformation`
--

CREATE TABLE `additionalinformation` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `dposition` varchar(40) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `plevel` int(10) NOT NULL,
  `esalary` int(11) NOT NULL,
  `pworkloc` varchar(40) DEFAULT NULL,
  `yexp` int(10) NOT NULL DEFAULT '0',
  `wtravel` varchar(5) NOT NULL DEFAULT '',
  `wrelocate` varchar(5) NOT NULL,
  `pholder` varchar(5) NOT NULL,
  `languages` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additionalinformation`
--

INSERT INTO `additionalinformation` (`id`, `userid`, `dposition`, `specialization`, `plevel`, `esalary`, `pworkloc`, `yexp`, `wtravel`, `wrelocate`, `pholder`, `languages`) VALUES
(1, 1, 'Senior programmer', 'information technology', 6, 100000, 'makati', 9, 'on', 'on', 'off', 'filipino, english');

-- --------------------------------------------------------

--
-- Table structure for table `educationandtraining`
--

CREATE TABLE `educationandtraining` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `hsschool` varchar(50) DEFAULT NULL,
  `hsadd` varchar(50) DEFAULT NULL,
  `hsgraddate` date DEFAULT '0000-00-00',
  `hsawards` text,
  `coluni` varchar(50) DEFAULT NULL,
  `coladd` varchar(50) DEFAULT NULL,
  `colgpa` varchar(10) DEFAULT NULL,
  `colgraddate` date DEFAULT '0000-00-00',
  `colmajor` varchar(30) DEFAULT NULL,
  `colawards` text,
  `pgrad1uni` varchar(50) DEFAULT NULL,
  `pgrad1add` varchar(50) DEFAULT NULL,
  `pgrad1gpa` varchar(10) DEFAULT NULL,
  `pgrad1graddate` date DEFAULT '0000-00-00',
  `pgrad1course` varchar(40) DEFAULT NULL,
  `pgrad1awards` text,
  `othersawards` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationandtraining`
--

INSERT INTO `educationandtraining` (`id`, `userid`, `hsschool`, `hsadd`, `hsgraddate`, `hsawards`, `coluni`, `coladd`, `colgpa`, `colgraddate`, `colmajor`, `colawards`, `pgrad1uni`, `pgrad1add`, `pgrad1gpa`, `pgrad1graddate`, `pgrad1course`, `pgrad1awards`, `othersawards`) VALUES
(9, 1, 'Colegio San Agustin', 'Dasma village', '2016-08-27', '<p>Loyalty Awarad</p>', 'Del La Salle University', 'Taft Ave Manila', '4', '2016-11-07', 'Bachelor in Political Science', '<p>gfgfg</p>', 'AITI', 'Salcedo vill Makati', '4', '2016-12-11', 'Master in Information Technology', '<p>fdfsf</p><p>ggh</p><p>j</p>', '<p>gggggggggggg</p><p>rrrrrrrrrrr</p><p>eeeeeeee</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jobads`
--

CREATE TABLE `jobads` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `jobtitle` varchar(40) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `plevel` int(10) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `msalary` int(11) NOT NULL,
  `startappdate` date NOT NULL DEFAULT '0000-00-00',
  `endappdate` date NOT NULL DEFAULT '0000-00-00',
  `nvacancies` int(5) NOT NULL,
  `jobdesc` text,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `yrsexp` int(5) NOT NULL DEFAULT '0',
  `mineduc` varchar(10) DEFAULT NULL,
  `prefcourse` varchar(30) DEFAULT NULL,
  `languages` varchar(40) DEFAULT NULL,
  `skills` varchar(40) DEFAULT NULL,
  `licenses` varchar(50) DEFAULT NULL,
  `wtravel` varchar(5) DEFAULT NULL,
  `wrelocate` varchar(5) DEFAULT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobads`
--

INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `specialization`, `plevel`, `jobtype`, `msalary`, `startappdate`, `endappdate`, `nvacancies`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `skills`, `licenses`, `wtravel`, `wrelocate`, `dateadded`) VALUES
(1, 28, 'title', 'specail', 1, 'full', 233333, '2016-11-29', '2016-12-30', 1, '<p>asd</p><p>as</p><p>d</p><p>asd</p><p>g</p><p>fgth</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'col', 'pref', 'filipino, english', NULL, '', 'on', 'on', '2016-12-18'),
(10, 28, 'title', 'sds', 1, 'full', 33, '2016-11-29', '2016-12-03', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(11, 28, 'title', 'specail33', 1, 'full', 33, '2016-11-29', '2016-12-15', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(12, 28, 'title', 'dsd', 1, 'full', 333, '2016-11-28', '2016-12-10', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(13, 28, 'title', 'specail', 1, 'full', 3333, '2016-11-30', '2016-12-29', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(14, 28, 'title', 'specail', 1, 'full', 3333, '2016-11-30', '2016-12-30', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(15, 28, 'title', 'specail', 1, 'full', 3333, '2016-11-28', '2016-11-30', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(16, 28, 'title', 'specail', 1, 'full', 3333, '2016-11-28', '2016-12-29', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19'),
(17, 28, 'title', 'specail', 1, 'full', 3333, '2016-11-29', '2016-12-10', 0, '<p><br></p>', '', '', '', 0, '', '', '', NULL, '', 'on', 'on', '2016-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `jobskills`
--

CREATE TABLE `jobskills` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `jobid` int(10) NOT NULL,
  `jobskill` varchar(40) NOT NULL,
  `jobskilltag` varchar(40) NOT NULL,
  `jobskilltagdate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobskills`
--

INSERT INTO `jobskills` (`id`, `userid`, `jobid`, `jobskill`, `jobskilltag`, `jobskilltagdate`) VALUES
(12, 28, 16, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-19'),
(13, 28, 17, 'Guadeloupe', '#Guadeloupe', '2016-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE `personalinformation` (
  `id` int(11) NOT NULL,
  `userid` int(10) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `street` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `province` varchar(20) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `mnumber` varchar(15) NOT NULL,
  `myemail` varchar(40) NOT NULL,
  `landline` varchar(15) DEFAULT NULL,
  `age` int(5) NOT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`id`, `userid`, `lname`, `fname`, `mname`, `street`, `city`, `province`, `country`, `mnumber`, `myemail`, `landline`, `age`, `birthday`, `gender`, `nationality`) VALUES
(7, 1, 'Santiago', 'Regidor', 'Hernandez', '87 Spain st., Better Living Subd', 'Paranaque', 'Metro Manila', 'Philippines', '  (23)3343', 'reggie1@gmail.com', ' 6391770018451', 39, '2016-11-09', 'female', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `skilltags`
--

CREATE TABLE `skilltags` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `skill` varchar(40) NOT NULL,
  `skilltag` varchar(40) NOT NULL,
  `skilltagdate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltags`
--

INSERT INTO `skilltags` (`id`, `userid`, `skill`, `skilltag`, `skilltagdate`) VALUES
(1, 1, 'software engineerf', '#softwareengineerf', '2016-12-05'),
(2, 1, 'agile scrum', '#agilescrum', '2016-12-05'),
(3, 1, 'java development', '#javadevelopment', '2016-12-05'),
(4, 1, 'j2ee', '#j2ee', '2016-12-05'),
(5, 1, 'bootstrap', '#bootstrap', '2016-12-05'),
(6, 1, 'responsive', '#responsive', '2016-12-05'),
(7, 1, 'object oriented programming', '#objectorientedprogramming', '2016-12-05'),
(14, 1, 'American Samoa', '#AmericanSamoa', '2016-12-06'),
(15, 1, 'Nigeria', '#Nigeria', '2016-12-06'),
(16, 1, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-06'),
(17, 1, 'Cape Verde', '#CapeVerde', '2016-12-06'),
(18, 1, 'French Southern Territories', '#FrenchSouthernTerritories', '2016-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` int(5) NOT NULL DEFAULT '2',
  `companyname` varchar(50) DEFAULT NULL,
  `verifyhash` varchar(40) NOT NULL,
  `signupdate` date NOT NULL DEFAULT '0000-00-00',
  `isverified` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `email`, `password`, `usertype`, `companyname`, `verifyhash`, `signupdate`, `isverified`) VALUES
(1, 'reg@jobsly.net', 'regsam', 2, NULL, '11111', '2016-11-07', 1),
(28, 'reggie1@gmail.com', 'samreece', 1, 'T4K', '222', '2016-12-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workexperience`
--

CREATE TABLE `workexperience` (
  `id` int(11) NOT NULL,
  `userid` int(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `position` varchar(40) NOT NULL,
  `startdate` date NOT NULL DEFAULT '0000-00-00',
  `msalary` int(10) NOT NULL,
  `industry` varchar(40) DEFAULT NULL,
  `plevel` varchar(30) NOT NULL,
  `enddate` date DEFAULT '0000-00-00',
  `currentemployer` varchar(5) DEFAULT NULL,
  `jobdescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workexperience`
--

INSERT INTO `workexperience` (`id`, `userid`, `company`, `position`, `startdate`, `msalary`, `industry`, `plevel`, `enddate`, `currentemployer`, `jobdescription`) VALUES
(7, 1, 'CHAMP Cargosystems Inc.', 'Senior Software Engineer', '2016-11-07', 85000, 'Airline Cargo', 'Senior', '2016-11-24', 'on', '<p>Accomplishments:</p><ul><li>Architecture Committee reviewer</li><li>Developer for Handling and Airline modules</li><li>Trains new joiners</li><li>Refactoring group</li></ul>'),
(15, 1, 'Rappler', 'Metrics Manager', '2016-12-09', 3333, 'industry', 'Manager1', '2016-11-16', 'off', '<p>Hello Summernote</p>'),
(16, 1, 'ASTI', 'System Engineer', '2016-11-25', 30000, 'IT', 'Mid level programmer', '2016-12-23', 'off', '<p>fsdf</p><p>sd</p><p>f</p><p>sdf</p><p>sd</p><p>fsdfsdf</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionalinformation`
--
ALTER TABLE `additionalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationandtraining`
--
ALTER TABLE `educationandtraining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobads`
--
ALTER TABLE `jobads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skilltags`
--
ALTER TABLE `skilltags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workexperience`
--
ALTER TABLE `workexperience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionalinformation`
--
ALTER TABLE `additionalinformation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `educationandtraining`
--
ALTER TABLE `educationandtraining`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jobads`
--
ALTER TABLE `jobads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jobskills`
--
ALTER TABLE `jobskills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `skilltags`
--
ALTER TABLE `skilltags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `workexperience`
--
ALTER TABLE `workexperience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
