-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 06:00 PM
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
  `specialization` int(10) NOT NULL,
  `plevel` int(10) NOT NULL,
  `esalary` int(11) NOT NULL,
  `pworkloc` varchar(40) DEFAULT NULL,
  `yexp` int(10) NOT NULL DEFAULT '0',
  `wtravel` varchar(5) NOT NULL DEFAULT '',
  `wrelocate` varchar(5) NOT NULL,
  `pholder` varchar(5) NOT NULL,
  `languages` varchar(50) DEFAULT NULL,
  `profsum` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additionalinformation`
--

INSERT INTO `additionalinformation` (`id`, `userid`, `dposition`, `specialization`, `plevel`, `esalary`, `pworkloc`, `yexp`, `wtravel`, `wrelocate`, `pholder`, `languages`, `profsum`) VALUES
(1, 1, 'Senior programmer', 11, 6, 100000, 'makati', 8, 'off', 'off', 'off', 'filipino, english', '<p>In about one to four sentences, highlight your most relevant strengths, skills, and core competencies that are unique to you as a candidate. In particular, demonstrate how you will add value to the company. Have you saved money for a company in the past? Did you streamline an administrative process? Include skills and experiences that will impress the employer</p>'),
(2, 29, 'Web Developer', 11, 2, 100000, '', 10, 'off', 'off', 'off', '', '<p><br></p>'),
(3, 30, 'Web Developer', 11, 5, 70000, 'Makati', 16, 'on', 'off', 'on', 'English, Filipino', NULL),
(4, 31, 'Senior Vice President', 4, 1, 70000, 'makati', 1, 'on', 'on', 'on', 'Doggie Talk, Barking', NULL),
(5, 32, 'IT Manager', 0, 2, 80000, 'makati', 5, 'on', 'off', 'on', 'Doggie Talk', NULL),
(6, 33, 'Web Analytics Manager', 2, 2, 90000, 'Pasig', 12, 'on', 'off', 'on', 'English, Filipino', NULL),
(7, 35, 'Senior Police Officer', 12, 6, 25000, 'Zootopia', 1, 'on', 'on', 'off', 'English', NULL),
(8, 36, 'Ice Cream Salesman', 15, 5, 50000, 'Zootopia', 5, 'off', 'off', 'off', 'English', NULL),
(9, 37, 'Web Designer', 12, 5, 50000, 'Zootopia', 15, 'off', 'off', 'on', 'English', NULL),
(10, 38, 'CFO', 0, 1, 100000, 'Makati', 7, 'on', 'off', 'on', 'English, Filipino', NULL),
(11, 39, 'Web Analytics Manager', 2, 2, 100000, 'Makati', 18, 'off', 'off', 'on', 'English, Filipino', NULL),
(12, 40, 'Senior Software Engineer', 0, 4, 90000, 'Pasig', 10, 'on', 'on', 'on', 'English, Filipino', NULL),
(13, 41, 'CEO', 4, 1, 500000, 'California', 25, 'on', 'on', 'on', 'English', NULL),
(14, 42, 'Web Developer', 11, 7, 20000, '', 0, 'off', 'off', 'off', 'English', NULL),
(15, 43, 'Web Developer', 11, 6, 30000, '', 3, 'on', 'on', 'on', 'English, Filipino', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminaccounts`
--

CREATE TABLE `adminaccounts` (
  `id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `adminphoto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminaccounts`
--

INSERT INTO `adminaccounts` (`id`, `email`, `password`, `fname`, `adminphoto`) VALUES
(1, 'sam@jobsly.net', 'freya', 'Sam', 'adminphoto/sam.jpg'),
(2, 'reggie@jobsly.net', 'reece', 'Reggie', 'adminphoto/reggie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `companyaddress` varchar(150) NOT NULL,
  `companywebsite` varchar(70) NOT NULL,
  `telno` varchar(20) NOT NULL,
  `companytin` varchar(30) NOT NULL,
  `cperson` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `cpersonemail` varchar(50) NOT NULL,
  `cpersontelno` varchar(20) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `numemp` int(10) NOT NULL,
  `ctype` int(5) NOT NULL,
  `cdesc` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `header` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `userid`, `companyname`, `companyaddress`, `companywebsite`, `telno`, `companytin`, `cperson`, `designation`, `cpersonemail`, `cpersontelno`, `industry`, `numemp`, `ctype`, `cdesc`, `logo`, `header`) VALUES
(5, 28, 'T4K1', '87 Spain St. Better Living Subd.', 'http://www.champ.aero', '343434', '5678', 'Reggie Santiago', 'HR', 'reggie1@gmail.com', '436567', 'IT', 5, 1, '<p>Terra Engineering is a new company that will provide high quality technical and environmental engineering services to it''s clients. Terra Engineering is scheduled to begin operations on July 16, 2005. Terra Engineering will be a partnership, owned and operated by Norm Johnson and Rupert Smith.\r</p><p>\r</p><p>Mr. Johnson and Mr. Smith both have left their respective jobs in order to specialize in environmental engineering consulting to small and medium sized businesses. \r</p><p>\r</p><p>Mr Johnson''s previous employment was with Randolf and Associates acting as an environmental engineer. Mr. Smith''s previous employment was with Barnard and Barry Environmental acting as chief environmental engineer.\r</p><p>\r</p><p>Terra Engineering will target small to medium sized companies and government organizations within the Southern part of Michigan including Detroit and surrounding areas. Terra Engineering will seek major contracts with medium sized firms.</p>', 'logo/20170121180147.jpg', ''),
(6, 34, 'BamBam Corp', '35th floor Ronbinsons Summit', 'http://www.reddit.com', '8234827', '2234567', 'Bam', 'HR Recruiter', 'bambam@gmail.com', '345678', 'Airline', 100, 1, '<p>test</p><p>desc</p><p>regeee</p><p>test2</p>', 'logo/20170206160257.png', ''),
(7, 47, 'reg Corp', '87 spain', 'http://www.yahoo.com', '8234827', '112-343-456', 'Reggie Santiago', 'HR', 'reggie@yahoo.com', '555-9888', 'Recruiter', 9, 2, '<p>test recruiter</p>', '', ''),
(8, 48, 'Tech4Kids', '87 Spain St. Better Living Subd.', '', ' 639175010845', '200-000-000-000', 'Sam', 'CFO', 'sampretty@gmail.com', ' 639175010845', 'IT', 0, 1, '<p>Technology Workshop for Kids</p>', '', ''),
(12, 49, 'Doggie Corp.', '87 Spain St. Better Living Subd.', 'doggiecorp.com', ' 639175010845', '200-000-000-000', 'Wan', 'HR', 'wan@gmail.com', '09175010845', '', 0, 1, 'One stop shop for pets', '', ''),
(15, 50, 'Firestation', '87 Spain St. Better Living Subd.', '', ' 639175010845', '200-000-000-000', 'Dro', 'Firedog', 'dro@gmail.com', '09175010845', '', 0, 1, '<p>Fire station</p>', '', 'header/20170405110419.jpg'),
(16, 52, 'PJ Mask Inc', '87 Spain st., Better Living Subd', '', ' 639177001845', '222', 'gecko', 'hr', 'gecko@gmail.com', '2222', 'hr', 5, 1, '<p><br></p>', '', '');

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
(10, 29, 'CSA', 'Laguna', '1996-03-23', '<p><br></p>', 'UST', 'Manila', '', '2000-03-25', 'BS Accountancy', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(12, 30, 'CSA', 'Laguna', '1996-03-23', '<p><br></p>', 'University of Santo Tomas', 'Espana, Manila', '', '2000-03-25', 'BS Accountancy', '<p><br></p>', 'AGSB', 'Makati', '3.72', '2008-08-01', 'MBA', '<p>Silver Medalist<br></p>', NULL),
(15, 31, NULL, NULL, '0000-00-00', NULL, 'Doggie University', 'Doggie World', '4.0', '2016-03-31', 'Veterinary Medicine', '<p>Suma Cum Laude</p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(16, 32, 'Doggie Science High School', 'Doggie World', '2007-03-25', 'Magna Cum Laude', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(18, 33, 'Colegio San Agustin', 'Makati', '2005-03-27', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(20, 35, 'Zootopia High', 'Bunny Burrows', '2012-03-01', '<p><br></p>', 'Police Academy', 'Zootopia', '', '2016-03-01', 'BS Police ', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(22, 36, 'Zootopia High', 'Fox Land', '2008-03-01', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(25, 37, 'Zootopia High', 'Zootopia', '1998-03-01', '<p><br></p>', 'Police Academy', 'Zootopia', '3.0', '2000-03-01', 'BS Criminal Justice', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, '<p>Criminal Investigation</p><p>HTML</p><p>Web Development</p>'),
(27, 38, 'Dino University', 'Dino Land', '1996-03-01', '<p>Cum Laude</p>', 'Dino University', 'Dino Land', '3.5', '2010-03-01', 'BS Accounting', '<p>Cum Laude</p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(29, 39, 'Dino University', 'Dino Land', '1995-03-31', '<p><br></p>', 'Dino University', 'Dino Land', '3.0', '2009-03-31', 'BS Accountancy', '<p><br></p>', 'AGSB', 'Rockwell, Makati', '3.73', '2008-08-02', 'MBA', '<p><br></p>', NULL),
(30, 40, 'Cars University', 'Makati City', '2002-03-01', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(32, 42, 'Colegio San Agustin', 'Makati City', '2013-03-23', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(35, 43, NULL, NULL, '0000-00-00', NULL, 'Dino University', 'Dino Land', '', '2014-03-31', 'BS Information Systems', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(43, 1, 'Colegio San Agustin', 'Dasmarinas Vill Makati', '1996-01-03', '<p>Loyalty Award</p>', 'Dela Salle University', 'Taft Ave Manila', '3.5', '2000-10-13', 'BA Major in Political Science', '', 'Ateneo Information Technology Institute', 'Salcedo Village Makati', '3', '2004-05-03', 'Master in Information Technology', '', '<ul><li>Sun Certified Java Programmer</li><li>Java Training, Sun Microsystems Inc</li></ul>'),
(44, 44, 'Cars University', 'Car City', '2007-03-25', '<p><br></p>', 'Cars University', 'Car City', '3.6', '2011-03-28', 'BS Math', '<p>Cum Laude</p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(45, 45, 'CSA', 'Makati City, Philippines', '1996-03-23', '<p><br></p>', 'University of Santo Tomas', 'Espana, Manila', '3.5', '2000-03-25', 'BS Accountancy', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
(46, 46, 'Inside Out', 'United States', '2007-03-04', '<p><br></p>', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, '<p>aaaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jobads`
--

CREATE TABLE `jobads` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `jobtitle` varchar(40) NOT NULL,
  `company` varchar(50) NOT NULL,
  `specialization` int(10) NOT NULL,
  `plevel` int(10) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `msalary` int(10) NOT NULL,
  `maxsalary` int(10) NOT NULL,
  `startappdate` date NOT NULL DEFAULT '0000-00-00',
  `endappdate` date NOT NULL DEFAULT '0000-00-00',
  `nvacancies` int(5) NOT NULL,
  `teaser` varchar(150) NOT NULL,
  `jobdesc` text,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `yrsexp` int(5) NOT NULL DEFAULT '0',
  `mineduc` varchar(30) DEFAULT NULL,
  `prefcourse` varchar(30) DEFAULT NULL,
  `languages` varchar(40) DEFAULT NULL,
  `licenses` varchar(50) DEFAULT NULL,
  `wtravel` varchar(5) DEFAULT NULL,
  `wrelocate` varchar(5) DEFAULT NULL,
  `essay` varchar(100) DEFAULT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00',
  `isactive` int(5) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `impressions` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobads`
--

INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `teaser`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`, `isactive`, `views`, `impressions`) VALUES
(69, 28, 'Senior Software Engineer', 'CHAMP Cargosystems Inc.', 11, 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-26', 1, 1, 11),
(84, 28, 'Metrics Manager', 'Rappler', 2, 2, 'full', 40000, 60000, '2017-02-01', '2016-12-29', 1, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">Data Analyst Responsibilities\n</h2><div>\n</div><div>Include:\n</div><div>\n</div><div>Interpreting data, analyzing results using statistical techniques and providing ongoing reports\n</div><div>Developing and implementing databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</div><div>Acquiring data from primary or secondary data sources and maintaining databases/data systems</div><div><br></div><div><b>Job brief\n</b></div><div>\n</div><div>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</div><div>\n</div><div>Data Analyst Job Duties\n</div><div>\n</div><div>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.</div><div><br></div><div>\n</div><div>\n</div><div><b>Responsibilities\n</b></div><div>\n</div><div>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</div><div>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</div><div>Acquire data from primary or secondary data sources and maintain databases/data systems\n</div><div>Identify, analyze, and interpret trends or patterns in complex data sets\n</div><div>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</div><div>Work with management to prioritize business and information needs\n</div><div>Locate and define new process improvement opportunities</div><div><br></div><div>\n</div><div><b>Requirements\n</b></div><div>\n</div><div>Proven working experience as a data analyst or business data analyst\n</div><div>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</div><div>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</div><div>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</div><div>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</div><div>Adept at queries, report writing and presenting findings\n</div><div>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</div>', 'Makati', 'Manila', 'Philippines', 3, 'MAsters', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-27', 1, 2, 6),
(85, 28, 'Account Manager', 'BDO', 0, 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-27', 1, 0, 0),
(86, 28, 'Web Developer', 'Ecommsite', 11, 7, 'full', 20000, 30000, '2017-03-01', '0000-00-00', 2, 'Together, everyone achieves more! That is our motto and how we grow. Join our dynamic and talented team and find out what you''re made of!', '<p><b>Web Developer Responsibilities</b>\n</p><p>\n</p><p>Include:\n</p><p>\n</p><p>Writing well designed, testable, efficient code by using best software development practices\n</p><p>Creating website layout/user interfaces by using standard HTML/CSS practices\n</p><p>Integrating data from various back-end services and databases\n</p><p><br></p><p><b>Job brief</b></p><p>We are looking for an outstanding Web Developer to be responsible for the coding, innovative design and layout of our website.\n</p><p>\n</p><p>Web Developer Job Duties\n</p><p>\n</p><p>Web developer responsibilities include building our website from concept all the way to completion from the bottom up, fashioning everything from the home page to site layout and function.\n</p><p>\n</p><p>Responsibilities\n</p><p>\n</p><p>Write well designed, testable, efficient code by using best software development practices\n</p><p>Create website layout/user interface by using standard HTML/CSS practices\n</p><p>Integrate data from various back-end services and databases\n</p><p>Gather and refine specifications and requirements based on technical needs\n</p><p>Create and maintain software documentation\n</p><p>Be responsibile for maintaining, expanding, and scaling our site\n</p><p>Stay plugged into emerging technologies/industry trends and apply them into operations and activities\n</p><p>Cooperate with web designers to match visual design intent\n</p><p>Requirements\n</p><p>\n</p><p>Proven working experience in web programming\n</p><p>Top-notch programming skills and in-depth knowledge of modern HTML/CSS\n</p><p>Familiarity with at least one of the following programming languages: PHP, ASP.NET, Javascript or Ruby on Rails\n</p><p>A solid understanding of how web applications work including security, session management, and best development practices\n</p><p>Adequate knowledge of relational database systems, Object Oriented Programming and web application development\n</p><p>Hands-on experience with network diagnostics, network analytics tools\n</p><p>Basic knowledge of Search Engine Optimisation process\n</p><p>Aggressive problem diagnosis and creative problem solving skills\n</p><p>Strong organisational skills to juggle multiple tasks within the constraints of  timelines and budgets with business acumen\n</p><p>Ability to work and thrive in a fast-paced environment, learn rapidly and master diverse web technologies and techniques.\n</p><p>BS in computer science or a related field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Computer Science', 'English, Filipino', '', 'on', 'off', 'Describe you greatest challenge in your career. What was the outcome and what steps did you take?', '2017-02-06', 1, 101, 465),
(87, 28, 'Software Engineer', 'Accenture', 0, 6, 'full', 35000, 50000, '2016-11-29', '2016-12-29', 5, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-28', 1, 2, 269),
(88, 28, 'Data analyst', 'IBM', 16, 7, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '', '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28', 1, 1, 263),
(89, 28, 'Recruitment Manager', 'Jobsly', 10, 1, 'full', 40000, 60000, '2017-01-07', '2016-12-29', 1, '', '<p><b>JOB DESCRIPTION\n</b></p><p>\n</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\n</p><p>\n</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\n</p><p>\n</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\n</p><p>\n</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\n</p><p>\n</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\n</p><p>\n</p><p><b>SALARY </b></p>', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28', 1, 18, 256),
(90, 28, 'Game Developer', 'Bethesda', 11, 6, 'full', 60000, 75000, '2017-02-15', '2017-01-31', 3, '', '<p><b>Job Description of a Game Developer\n</b></p><p>Game developers, more specifically known as video game developers or video game designers, are software developers and engineers who create video games. Game developers may be involved in various aspects of a game''s creation from concept and story writing to the coding and programming. Other potential areas of work for a game developer include audio, design, production and visual arts.\n</p><p>\n</p><p><b>Duties of a Game Developer\n</b></p><p>Many components are involved in the development of a video game. Designers, producers and graphic artists all contribute to the final product. However, programmers and software developers turn the idea into code, which provides the game with its operating instructions. Game and software developers create the core features of a video game. Duties of a game developer may include:\n</p><p>\n</p><p>Creating story lines and character biographies\n</p><p>Conducting design reviews\n</p><p>Designing role-play mechanics\n</p><p>Creating prototypes for staff and management\n</p><p>Documenting game design process\n</p><p>Entry level and junior game programmers typically use basic tools and languages, such as C  , to add small elements to games. They are also expected to keep up with changing technology. Lead developers and programmers write more complicated code and manage other programmers.\n</p><p>\n</p><p><b>Game Developer Requirements\n</b></p><p>According to the U.S. Bureau of Labor Statistics, in most cases a bachelor''s degree is preferred for software engineer positions (www.bls.gov). Common majors include computer science, software engineering, mathematics or computer information systems. The ability to use programming language is often the primary requirement. Knowledge of various computer systems is also beneficial. In certain situations, completion of an associate''s degree or certificate program may suffice.\n</p><p>\n</p><p>Currently no major organizations offer certification in video game development. If they do, it''s rare. However, game developers can earn certification in the key programming languages such as C  , visual basic, java and MEL (Maya Scripting Language). Additionally, the Institute of Electrical and Electronics Engineers offers certification for software developers.\n</p><p>\n</p><p><b>Employment Outlook and Salary Information\n</b></p><p>From 2014-2024, the U.S. Bureau of Labor Statistics (BLS) projected 19% employment growth for applications software developers. The BLS reported an annual average salary of $102,160 for these professionals in 2015, with those working in software publishing earning $112,460, on average.\n</p><p>\n</p><p>Game developers create the concept for a video game and develop the program to ensure that it runs correctly. These games are typically used on computers or in video game systems.</p>', 'Paranaque', 'Metro Manila', 'Philippines', 3, 'college', 'BS Computer Science', 'English, Filipino', '', 'on', 'off', 'Ride toto na?', '2016-12-28', 1, 24, 419),
(91, 28, 'Data analyst', 'Globe', 16, 6, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '', '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28', 1, 0, 263),
(92, 28, 'Admin Assistant', 'Ayala Properties Management Corporation', 1, 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '', '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28', 0, 1, 254),
(93, 28, 'Technical Support Representative', '24/7', 6, 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '', '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2016-12-28', 0, 1, 241),
(94, 28, 'Technical Support Representative', 'Telus', 6, 1, 'full', 20000, 30000, '2017-03-15', '2017-01-15', 10, '', '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2017-02-06', 1, 3, 336),
(95, 28, 'Relationship Manager', 'East West', 0, 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28', 1, 1, 16),
(96, 28, 'Accounting Staff', 'SGV', 0, 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '', '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28', 1, 3, 7),
(97, 28, 'Social Media Manager', 'Summit Media', 11, 1, 'full', 15000, 25000, '2017-01-28', '2016-12-14', 2, '', '<p><b>Social Media Manager Job Description\n</b></p><p>\n</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\n</p><p>\n</p><p>Deliberate planning and goal setting\n</p><p>Development of brand awareness and online reputation\n</p><p>Content management\n</p><p>SEO (search engine optimization) and generation of inbound traffic\n</p><p>Cultivation of leads and sales\n</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\n</p><p>\n</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\n</p><p>\n</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\n</p><p>\n</p><p>Content management duties include:\n</p><p>\n</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\n</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\n</p><p>Create a regular publishing schedule.\n</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\n</p><p>Promote content through social advertising.\n</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\n</p><p>\n</p><p>Digital Marketing Manager\n</p><p>Content Marketing Manager\n</p><p>Customer Experience Manager\n</p><p>Community Manager\n</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or</p>', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you', '2016-12-28', 1, 7, 268),
(98, 28, 'Data Miner', 'SAP Philippines Inc', 2, 7, 'full', 25000, 40000, '2017-02-28', '2017-01-15', 1, '', '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What', '2016-12-28', 1, 0, 11),
(99, 28, 'Data Entry Specialists', 'Athena', 1, 7, 'full', 12000, 23000, '2017-04-12', '2017-02-22', 12, '', '<p>Data Entry Operator I Job Responsibilities:\n</p><p>\n</p><p>Maintains database by entering data.\n</p><p></p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'Any 4-year course', 'English', '', 'off', 'off', 'Why should we hire you?', '2016-12-28', 1, 0, 0),
(100, 28, 'Senior Web Developer', 'Cloud sherpa', 11, 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What are your greatest professional strengths?', '2016-12-28', 1, 6, 19),
(101, 28, 'Technical Support Specialists', 'Convergys', 6, 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '', '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 0, 2),
(102, 28, 'Web Developer', 'ASTI', 11, 6, 'full', 30000, 450000, '2016-11-29', '2016-12-29', 1, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 2, '', 'BS Computer Science', 'English', '', 'on', 'off', 'Why should we hire you?', '2016-12-28', 0, 6, 144);
INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `teaser`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`, `isactive`, `views`, `impressions`) VALUES
(103, 28, 'PHP Developer', 'Rappler', 11, 6, 'full', 40000, 50000, '2016-11-29', '2016-12-29', 2, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'off', 'on', 'What are your greatest professional strengths?', '2016-12-28', 1, 3, 16),
(104, 28, 'Big data Engineer', 'ETL Corp', 2, 5, 'full', 50000, 80000, '2017-01-27', '2016-12-29', 1, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'on', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 4, 19),
(105, 28, 'Social Media Staff', 'Summit Media', 1, 7, 'full', 10000, 18000, '2017-01-28', '2016-12-14', 5, '', '<p><b>Social Media Manager Job Description\n</b></p><p>\n</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\n</p><p>\n</p><p>Deliberate planning and goal setting\n</p><p>Development of brand awareness and online reputation\n</p><p>Content management\n</p><p>SEO (search engine optimization) and generation of inbound traffic\n</p><p>Cultivation of leads and sales\n</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\n</p><p>\n</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\n</p><p>\n</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\n</p><p>\n</p><p>Content management duties include:\n</p><p>\n</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\n</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\n</p><p>Create a regular publishing schedule.\n</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\n</p><p>Promote content through social advertising.\n</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\n</p><p>\n</p><p>Digital Marketing Manager\n</p><p>Content Marketing Manager\n</p><p>Customer Experience Manager\n</p><p>Community Manager\n</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or</p>', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 0, 1),
(106, 28, 'Accounting Clerk', 'Metrobank', 0, 6, 'full', 30000, 50000, '2017-01-25', '2016-12-31', 3, '', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28', 0, 2, 4),
(107, 28, 'Office Manager', 'jobsly', 4, 6, 'full', 20000, 30000, '2017-03-15', '2017-02-15', 1, '', '<p>Maintains office services by organizing office operations and procedures; preparing payroll; controlling correspondence; designing filing systems; reviewing and approving supply requisitions; assigning and monitoring clerical functions.\n</p><p>Provides historical reference by defining procedures for retention, protection, retrieval, transfer, and disposal of records.\n</p><p>Maintains office efficiency by planning and implementing office systems, layouts, and equipment procurement.\n</p><p>Designs and implements office policies by establishing standards and procedures; measuring results against standards; making necessary adjustments.\n</p><p>Completes operational requirements by scheduling and assigning employees; following up on work results.\n</p><p>Keeps management informed by reviewing and analyzing special reports; summarizing information; identifying trends.\n</p><p>Maintains office staff by recruiting, selecting, orienting, and training employees.\n</p><p>Maintains office staff job results by coaching, counseling, and disciplining employees; planning, monitoring, and appraising job results.\n</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\n</p><p>Achieves financial objectives by preparing an annual budget; scheduling expenditures; analyzing variances; initiating corrective actions.\n</p><p>Contributes to team effort by accomplishing related results as needed.\n</p><p>Office Manager Skills and Qualifications:\n</p><p>\n</p><p>Supply Management, Informing Others, Tracking Budget Expenses, Delegation, Staffing, Managing Processes, Supervision, Developing Standards, Promoting Process Improvement, Inventory Control, Reporting Skills</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'Why should we hire you?', '2017-02-07', 1, 25, 344),
(108, 28, 'Account Manager', 'Metrobank', 0, 6, 'full', 40000, 50000, '2017-01-21', '2016-12-31', 1, '', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28', 0, 0, 4),
(109, 28, 'Recruitment Specialist', 'HR Network', 10, 1, 'full', 30000, 450000, '2017-01-20', '2016-12-31', 1, '', '<p><b>JOB DESCRIPTION\n</b></p><p>\n</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\n</p><p>\n</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\n</p><p>\n</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\n</p><p>\n</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\n</p><p>\n</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\n</p><p>\n</p><p><b>SALARY </b></p>', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What are your greatest professional strengths?', '2016-12-28', 1, 0, 1),
(110, 28, 'Data Scientist', 'jobsly', 16, 6, 'full', 35000, 45000, '2017-01-31', '2016-12-31', 1, '', '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 3, 'College', 'BS Statistics', 'English, Filipino', '', 'on', 'on', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 2, 8),
(111, 28, 'Java Developer', 'CHAMP Cargosystems Inc.', 11, 6, 'full', 50000, 80000, '2017-01-26', '2016-12-29', 5, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'Why should we hire you?', '2016-12-28', 1, 2, 20),
(112, 28, 'Customer Service Representative', 'HSBC', 6, 6, 'full', 18000, 28000, '2017-02-10', '2017-01-15', 5, '', '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What are your greatest professional strengths?', '2016-12-28', 1, 2, 2),
(113, 28, 'Project Manager', 'Accenture', 4, 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '', '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28', 0, 0, 7),
(114, 28, 'Scrum Master', 'CHAMP Cargosystems Inc.', 4, 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '', '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28', 1, 1, 4),
(115, 28, 'Project Manager', 'ASTI', 4, 5, 'full', 50000, 65000, '2017-02-08', '2016-12-28', 1, '', '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28', 1, 0, 2),
(116, 28, 'Scrum Master', 'Maersk Sealand', 11, 6, 'full', 60000, 80000, '2017-01-06', '2016-12-12', 1, '', '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 16, 87),
(117, 28, 'Senior Scrum Master', 'CHAMP Cargosystems Inc.', 4, 5, 'full', 80000, 100000, '2017-02-15', '2016-12-31', 1, '', '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28', 1, 0, 4),
(118, 34, 'Web Analytics Manager', 'Google', 0, 2, 'full', 90000, 120000, '2017-02-01', '2017-01-25', 1, '', '<p>As Web Analytics Manager your key responsibilities include:\n</p><p>Â·Managing the web analytics agency and ensure all agreed work is successfully completed.\n</p><p>Â·Leading thought process on how to improve customer journeys.\n</p><p>Â·Analysing and implementing A/B and Multivariate testing on the brand website across all devices to improve user experience and conversions.\n</p><p>Â·Reviewing current on-site/on-page optimisation and identify areas of improvement\n</p><p><br></p><p></p>', 'Pasig', '', 'Philippines', 5, 'College De', 'Statistics', 'English', '', 'on', 'on', '', '2017-01-14', 1, 7, 359),
(119, 28, 'Account Manager', 'PBB', 0, 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, 'Join the fastest growing bank today!', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2017-02-21', 1, 6, 412),
(120, 50, 'Fireman', 'Firestation', 12, 6, 'full', 10000, 40000, '2017-04-05', '2017-05-31', 0, 'Save peoples!', '<p>Put out fire</p>', '', '', '', 0, 'College Degree', '', '', 'Civil Service', 'off', 'off', '', '2017-04-05', 1, 7, 181),
(121, 48, 'Operations Manager', 'Tech4Kids', 13, 2, 'full', 90000, 120000, '2017-05-01', '2017-04-30', 0, 'An operations manager is a senior role which involves overseeing the production of goods and/or provision of services. Itâ€™s an operations manager''s ', '<p>Other duties and responsibilities include:\n</p><p>Planning and controlling change. \n</p><p>Managing quality assurance programmes. \n</p><p>Researching new technologies and alternative methods of efficiency. \n</p><p>Setting and reviewing budgets and managing cost. \n</p><p>Overseeing inventory, distribution of goods and facility layout.</p>', '', '', '', 5, '', '', '', 'Mechanical Engineer', 'on', 'off', '', '2017-04-25', 0, 1, 15),
(122, 49, 'Multimedia Reporter', 'Doggie Corp.', 5, 6, 'full', 15000, 20000, '2017-05-01', '0000-00-00', 1, 'Multimedia writers combine creativity and technology. Along with writing online and other interactive content, they may work with computer-aided desig', '<p>Multimedia Writer Job Description\n</p><p>Multimedia writers create content for the Internet as well as smart phones, computers and video game systems, among other technologies. This content may include games, educational tools and advertising materials. Multimedia writers work closely with other multimedia artists throughout the production process.\n</p><p>\n</p><p>Their work is incredibly varied and provides a multitude of challenges and opportunities for creativity. Multimedia writers may create a script for a storyboard developed by a graphic artist or other creative professional. They may also create the text for an online ad campaign.</p>', '', '', 'Philippines', 1, 'College Degree', 'BA Journalism', '', '', 'on', 'off', '', '2017-04-25', 1, 0, 85),
(123, 48, 'Junior Sales Agent', 'Tech4Kids', 15, 6, 'full', 20000, 25000, '2017-05-01', '2017-05-01', 0, 'Serves customers by selling products; meeting customer needs.', '<p>Sales Representative Job Duties:\n</p><p>\n</p><p>Services existing accounts, obtains orders, and establishes new accounts by planning and organizing daily work schedule to call on existing or potential sales outlets and other trade factors.\n</p><p>Adjusts content of sales presentations by studying the type of sales outlet or trade factor.\n</p><p>Focuses sales efforts by studying existing and potential volume of dealers.\n</p><p>Submits orders by referring to price lists and product literature.\n</p><p>Keeps management informed by submitting activity and results reports, such as daily call reports, weekly work plans, and monthly and annual territory analyses.</p><p>Monitors competition by gathering current marketplace information on pricing, products, new products, delivery schedules, merchandising techniques, etc.\n</p><p>Recommends changes in products, service, and policy by evaluating results and competitive developments.\n</p><p>Resolves customer complaints by investigating problems; developing solutions; preparing reports; making recommendations to management.\n</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\n</p><p>Provides historical records by maintaining records on area and customer sales.\n</p><p>Contributes to team effort by accomplishing related results as needed.\n</p><p>Sales Representative Skills and Qualifications:\n</p><p>\n</p><p>Customer Service, Meeting Sales Goals, Closing Skills, Territory Management, Prospecting Skills, Negotiation, Self-Confidence, Product Knowledge, Presentation Skills, Client Relationships, Motivation for Sales.</p>', '', '', '', 1, '', '', '', '', 'off', 'on', '', '2017-04-25', 1, 0, 85),
(124, 49, 'Nurse', 'Doggie Corp.', 9, 6, 'full', 15000, 20000, '2017-05-01', '2017-05-01', 1, 'Company Nurse', '<p>Duties and Responsibilities:', '', '', 'Philippines', 1, 'College Degree', 'BS Nursing', '', '', 'off', 'off', '', '2017-04-25', 1, 0, 83);
INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `teaser`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`, `isactive`, `views`, `impressions`) VALUES
(125, 49, 'HR Training Specialist', 'Doggie Corp.', 7, 5, 'full', 25000, 30000, '2017-05-01', '2017-05-01', 1, 'Responsible for offering training in a job-specific area. Focuses on teaching specific areas of knowledge or on-the-job capabilities needed for certai', '<p>Primary responsibilities\n</p><p>Identify and assess training needs within a company.\n</p><p>Meet with managers and supervisors to ascertain needs.\n</p><p>Conduct surveys.\n</p><p>Train employees for specific jobs.\n</p><p>Develop, organize, conduct and evaluate training programs.\n</p><p>Create teaching materials.\n</p><p>Teach skills such as computer applications, phone systems, product assembly, policies and procedures, and inventory planning.\n</p><p>Direct structured learning experiences.\n</p><p>Hold meetings and presentations on learning material.\n</p><p>Create learning literature.\n</p><p>Plan, organize, and implement a range of training activities.\n</p><p>Train new hires as well as veteran employees.\n</p><p>Conduct orientation sessions to assess level of skills.\n</p><p>Help employees improve upon or enhance existing skills.\n</p><p>Develop programs that groom lower-level employees for executive positions.\n</p><p>Evaluate training effectiveness.\n</p><p>Modify training programs.\n</p><p>Design apprenticeship programs.\n</p><p>Create monitored simulations and problem-solving scenarios.\n</p><p>Create interactive, multimedia presentations.\n</p><p>Hold workshops and lectures.</p>', '', '', 'Philippines', 5, 'College Degree', '', '', '', 'on', 'off', '', '2017-04-25', 1, 1, 85),
(126, 34, 'Architect', 'BamBam Corp', 3, 4, 'full', 25000, 40000, '2017-06-01', '2017-06-01', 0, 'Design new buildings and suggest alterations to existing buildings', '<p>Typical work activities include:\n</p><p>\n</p><p>creating building designs and highly detailed drawings both by hand and by using specialist computer-aided design (CAD) applications\n</p><p>liaising with construction professionals about the feasibility of potential projects\n</p><p>working around constraining factors such as town planning legislation, environmental impact and project budget\n</p><p>working closely with a team of other professionals such as building service engineers, construction managers, quantity surveyors and architectural technologists\n</p><p>applying for planning permission and advice from governmental new build and legal departments\n</p><p>writing and presenting reports, proposals, applications and contracts\n</p><p>specifying the requirements for the project\n</p><p>adapting plans according to circumstances and resolving any problems that may arise during construction\n</p><p>playing a part in project and team management\n</p><p>travelling regularly to building sites, proposed locations and client meetings</p>', '', '', '', 5, 'College Degree', '', '', 'Architecture', 'on', 'off', '', '2017-04-25', 1, 2, 83),
(127, 34, 'Customer Service Representative', 'BamBam Corp', 6, 7, 'project', 18000, 25000, '0000-00-00', '2017-07-01', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-04-26', 1, 8, 84),
(128, 34, 'Bank Manager', 'BamBam Corp', 0, 2, 'part', 0, 0, '0000-00-00', '2017-04-26', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-04-26', 1, 2, 92),
(129, 34, 'Pastry Chef', 'BamBam Corp', 0, 1, 'full', 80000, 100000, '0000-00-00', '2017-07-01', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-05-01', 0, 0, 15),
(130, 28, 'Admin Assistant', 'Ayala Properties Management Corporation', 0, 7, 'full', 20000, 30000, '0000-00-00', '2016-12-31', 2, '', '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2017-05-06', 0, 0, 2),
(131, 34, 'a', 'BamBam Corp', 0, 1, 'full', 0, 0, '0000-00-00', '2017-07-08', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-05-08', 0, 0, 2),
(132, 28, 'Business Analyst', 'T4K1', 4, 6, 'full', 30000, 50000, '2017-05-13', '2017-07-13', 2, '', '<p>Requirements Are the Core of the Business Analystâ€™s Role\n</p><p>Business analysis training teaches requirements management â€“ one of the core skills of business analysts. Developing technical solutions to business problems, or to advance a companyâ€™s sales efforts, begins with defining, analyzing and documenting requirements. Managing requirements at the project level can help fulfill business needs.\n</p><p>\n</p><p>Business analysts typically take the lead role in:\n</p><p>\n</p><p>Assisting with the business case\n</p><p>Planning and monitoring\n</p><p>Eliciting requirements\n</p><p>Requirements organization\n</p><p>Translating and simplifying requirements\n</p><p>Requirements management and communication\n</p><p>Requirements analysis\n</p><p>Skilled business analysts also use requirements to drive the design or review of test cases, process change requests, and manage a projectâ€™s scope, acceptance, installation and deployment.</p>', 'MAnila', 'Metro Manila', 'Philippines', 4, 'College Degree', 'Business', 'English', '', 'on', 'off', '', '2017-05-13', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobapplications`
--

CREATE TABLE `jobapplications` (
  `id` int(10) NOT NULL,
  `jobid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `esalary` int(11) NOT NULL,
  `essayanswer` text,
  `dateapplied` date NOT NULL DEFAULT '0000-00-00',
  `isnew` int(5) NOT NULL DEFAULT '0',
  `isshortlisted` int(5) NOT NULL DEFAULT '0',
  `isreject` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapplications`
--

INSERT INTO `jobapplications` (`id`, `jobid`, `userid`, `esalary`, `essayanswer`, `dateapplied`, `isnew`, `isshortlisted`, `isreject`) VALUES
(13, 86, 1, 3434, NULL, '2016-12-21', 0, 0, 0),
(15, 86, 29, 100000, 'NA', '2016-12-08', 0, 1, 0),
(16, 86, 30, 60000, 'Not', '2016-12-15', 0, 0, 1),
(17, 90, 32, 75000, 'Pimezone na!', '2016-11-12', 1, 0, 0),
(18, 100, 32, 100000, 'The quick brown fox jumped over the lazy dog', '2016-12-05', 1, 0, 0),
(19, 118, 33, 110000, 'undefined', '2016-12-07', 0, 1, 0),
(20, 104, 33, 100000, 'Abbit choo choo chain', '2016-12-20', 1, 0, 0),
(21, 118, 29, 80000, 'undefined', '2016-12-14', 0, 1, 0),
(22, 86, 31, 30000, 'NA', '2017-01-04', 0, 0, 0),
(23, 86, 32, 20000, 'dada dada', '2017-01-06', 0, 1, 0),
(24, 86, 33, 40000, 'mama na', '2017-01-11', 0, 0, 0),
(26, 118, 1, 3333, 'undefined', '2017-01-29', 0, 0, 0),
(27, 118, 37, 50000, 'undefined', '2017-01-29', 0, 0, 0),
(28, 86, 37, 60000, 'aaaa', '2017-01-29', 0, 1, 0),
(29, 89, 37, 40000, 'asdf', '2017-01-29', 1, 0, 0),
(30, 90, 37, 10000, 'awaw', '2017-01-29', 1, 0, 0),
(31, 87, 1, 100000, 'too too train', '2017-02-04', 0, 0, 0),
(32, 107, 44, 40000, 'aaa', '2017-02-07', 1, 0, 0),
(33, 119, 41, 500000, 'a', '2017-04-08', 0, 1, 1),
(34, 107, 46, 100000, 'a', '2017-02-24', 1, 0, 0),
(41, 116, 1, 100000, '2222', '2017-03-01', 0, 0, 0),
(42, 90, 40, 90000, 'Es!', '2017-04-18', 1, 0, 0),
(43, 118, 40, 90000, 'undefined', '2017-04-18', 1, 0, 0),
(44, 118, 32, 80000, 'undefined', '2017-04-18', 0, 0, 0),
(45, 121, 32, 80000, 'undefined', '2017-04-25', 1, 0, 0),
(46, 126, 29, 100000, 'undefined', '2017-04-26', 1, 0, 0),
(47, 126, 37, 50000, 'undefined', '2017-05-03', 1, 0, 0),
(48, 86, 40, 90000, 'aa', '2017-05-03', 0, 0, 0),
(49, 127, 40, 90000, 'undefined', '2017-05-05', 0, 0, 0),
(50, 128, 36, 50000, 'undefined', '2017-05-19', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobessays`
--

CREATE TABLE `jobessays` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobessays`
--

INSERT INTO `jobessays` (`id`, `userid`, `question`) VALUES
(4, 28, 'Ride toto na?'),
(5, 28, 'What is it?'),
(6, 28, 'Why should we hire you?'),
(7, 28, 'What are your greatest professional strengths?'),
(8, 28, 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.'),
(9, 28, 'What''s a time you disagreed with a decision that was made at work?'),
(10, 34, 'What are your strengths?');

-- --------------------------------------------------------

--
-- Table structure for table `jobinvitations`
--

CREATE TABLE `jobinvitations` (
  `id` int(10) NOT NULL,
  `jobid` int(10) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobinvitations`
--

INSERT INTO `jobinvitations` (`id`, `jobid`, `userid`) VALUES
(1, 86, 42);

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
(21, 28, 65, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-21'),
(22, 28, 65, 'Bhutan', '#Bhutan', '2016-12-21'),
(23, 28, 66, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-21'),
(24, 28, 66, 'Bhutan', '#Bhutan', '2016-12-21'),
(25, 28, 67, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-23'),
(26, 28, 67, 'Bhutan', '#Bhutan', '2016-12-23'),
(27, 28, 68, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-23'),
(28, 28, 68, 'Bhutan', '#Bhutan', '2016-12-23'),
(29, 28, 69, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(30, 28, 69, 'Bhutan', '#Bhutan', '2016-12-26'),
(31, 28, 70, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(32, 28, 70, 'Bhutan', '#Bhutan', '2016-12-26'),
(33, 28, 71, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(34, 28, 71, 'Bhutan', '#Bhutan', '2016-12-26'),
(35, 28, 72, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(36, 28, 72, 'Bhutan', '#Bhutan', '2016-12-26'),
(37, 28, 73, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(38, 28, 73, 'Bhutan', '#Bhutan', '2016-12-26'),
(39, 28, 74, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(40, 28, 74, 'Bhutan', '#Bhutan', '2016-12-26'),
(41, 28, 75, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(42, 28, 75, 'Bhutan', '#Bhutan', '2016-12-26'),
(43, 28, 76, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(44, 28, 76, 'Bhutan', '#Bhutan', '2016-12-26'),
(45, 28, 77, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(46, 28, 77, 'Bhutan', '#Bhutan', '2016-12-26'),
(47, 28, 78, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(48, 28, 78, 'Bhutan', '#Bhutan', '2016-12-26'),
(49, 28, 79, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(50, 28, 79, 'Bhutan', '#Bhutan', '2016-12-26'),
(51, 28, 80, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(52, 28, 80, 'Bhutan', '#Bhutan', '2016-12-26'),
(53, 28, 81, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(54, 28, 81, 'Bhutan', '#Bhutan', '2016-12-26'),
(55, 28, 82, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(56, 28, 82, 'Bhutan', '#Bhutan', '2016-12-26'),
(57, 28, 83, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-26'),
(58, 28, 83, 'Bhutan', '#Bhutan', '2016-12-26'),
(59, 28, 84, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-27'),
(60, 28, 84, 'Bhutan', '#Bhutan', '2016-12-27'),
(61, 28, 84, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-27'),
(62, 28, 84, 'Google Scripts', '#GoogleScripts', '2016-12-27'),
(63, 28, 85, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-27'),
(64, 28, 85, 'SAP', '#SAP', '2016-12-27'),
(65, 28, 85, 'ERP', '#ERP', '2016-12-27'),
(66, 28, 86, 'PHP', '#PHP', '2016-12-28'),
(67, 28, 86, 'jQuery', '#jQuery', '2016-12-28'),
(68, 28, 86, 'bootstrap', '#bootstrap', '2016-12-28'),
(69, 28, 86, 'code ignite', '#codeignite', '2016-12-28'),
(70, 28, 86, 'angular js', '#angularjs', '2016-12-28'),
(71, 28, 87, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(72, 28, 87, 'Bhutan', '#Bhutan', '2016-12-28'),
(73, 28, 88, 'SAP', '#SAP', '2016-12-28'),
(74, 28, 88, 'Oracle ERP', '#OracleERP', '2016-12-28'),
(75, 28, 88, 'Excel', '#Excel', '2016-12-28'),
(76, 28, 88, 'SQL', '#SQL', '2016-12-28'),
(77, 28, 89, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(78, 28, 89, 'Google Docs', '#GoogleDocs', '2016-12-28'),
(79, 28, 89, 'MS Excel', '#MSExcel', '2016-12-28'),
(80, 28, 89, 'Orange HRM', '#OrangeHRM', '2016-12-28'),
(81, 28, 90, 'Unreal engine', '#Unrealengine', '2016-12-28'),
(82, 28, 90, 'Android', '#Android', '2016-12-28'),
(83, 28, 90, 'Java', '#Java', '2016-12-28'),
(84, 28, 91, 'SAP', '#SAP', '2016-12-28'),
(85, 28, 91, 'Oracle ERP', '#OracleERP', '2016-12-28'),
(86, 28, 91, 'Excel', '#Excel', '2016-12-28'),
(87, 28, 91, 'SQL', '#SQL', '2016-12-28'),
(88, 28, 92, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(89, 28, 93, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(90, 28, 94, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(91, 28, 95, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-28'),
(92, 28, 95, 'SAP', '#SAP', '2016-12-28'),
(93, 28, 95, 'ERP', '#ERP', '2016-12-28'),
(94, 28, 96, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(95, 28, 97, 'Social Media Apps', '#SocialMediaApps', '2016-12-28'),
(96, 28, 97, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(97, 28, 97, 'Office 365', '#Office365', '2016-12-28'),
(98, 28, 97, 'Google Apps', '#GoogleApps', '2016-12-28'),
(99, 28, 98, 'SAP', '#SAP', '2016-12-28'),
(100, 28, 98, 'Oracle ERP', '#OracleERP', '2016-12-28'),
(101, 28, 98, 'Excel', '#Excel', '2016-12-28'),
(102, 28, 98, 'SQL', '#SQL', '2016-12-28'),
(103, 28, 99, 'Micronesia, Federated States of', '#Micronesia,FederatedStatesof', '2016-12-28'),
(104, 28, 100, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(105, 28, 100, 'Bhutan', '#Bhutan', '2016-12-28'),
(106, 28, 102, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(107, 28, 102, 'Bhutan', '#Bhutan', '2016-12-28'),
(108, 28, 103, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(109, 28, 103, 'Bhutan', '#Bhutan', '2016-12-28'),
(110, 28, 103, 'Iran, Islamic Republic Of', '#Iran,IslamicRepublicOf', '2016-12-28'),
(111, 28, 104, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(112, 28, 104, 'Bhutan', '#Bhutan', '2016-12-28'),
(113, 28, 104, 'Falkland Islands (Malvinas)', '#FalklandIslands(Malvinas)', '2016-12-28'),
(114, 28, 104, 'French Polynesia', '#FrenchPolynesia', '2016-12-28'),
(115, 28, 105, 'Social Media Apps', '#SocialMediaApps', '2016-12-28'),
(116, 28, 105, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(117, 28, 105, 'Office 365', '#Office365', '2016-12-28'),
(118, 28, 105, 'Google Apps', '#GoogleApps', '2016-12-28'),
(119, 28, 106, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-28'),
(120, 28, 106, 'SAP', '#SAP', '2016-12-28'),
(121, 28, 106, 'ERP', '#ERP', '2016-12-28'),
(122, 28, 107, 'Excel', '#Excel', '2016-12-28'),
(123, 28, 107, 'Office365', '#Office365', '2016-12-28'),
(124, 28, 107, 'google docs', '#googledocs', '2016-12-28'),
(125, 28, 108, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-28'),
(126, 28, 108, 'SAP', '#SAP', '2016-12-28'),
(127, 28, 108, 'ERP', '#ERP', '2016-12-28'),
(128, 28, 109, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(129, 28, 109, 'Google Docs', '#GoogleDocs', '2016-12-28'),
(130, 28, 109, 'MS Excel', '#MSExcel', '2016-12-28'),
(131, 28, 109, 'Orange HRM', '#OrangeHRM', '2016-12-28'),
(132, 28, 110, 'SAP', '#SAP', '2016-12-28'),
(133, 28, 110, 'Oracle ERP', '#OracleERP', '2016-12-28'),
(134, 28, 110, 'Excel', '#Excel', '2016-12-28'),
(135, 28, 110, 'SQL', '#SQL', '2016-12-28'),
(136, 28, 111, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(137, 28, 111, 'Bhutan', '#Bhutan', '2016-12-28'),
(138, 28, 111, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(139, 28, 111, 'Bosnia and Herzegovina', '#BosniaandHerzegovina', '2016-12-28'),
(140, 28, 111, 'Holy See (Vatican City State)', '#HolySee(VaticanCityState)', '2016-12-28'),
(141, 28, 111, 'Serbia and Montenegro', '#SerbiaandMontenegro', '2016-12-28'),
(142, 28, 111, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(143, 28, 111, 'Botswana', '#Botswana', '2016-12-28'),
(144, 28, 111, 'Azerbaijan', '#Azerbaijan', '2016-12-28'),
(145, 28, 111, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(146, 28, 111, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(147, 28, 111, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(148, 28, 111, 'Macedonia, The Former Yugoslav Republic ', '#Macedonia,TheFormerYugoslavRepublicof', '2016-12-28'),
(149, 28, 111, 'Equatorial Guinea', '#EquatorialGuinea', '2016-12-28'),
(150, 28, 112, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(151, 28, 112, 'Cote D"Ivoire', '#CoteD"Ivoire', '2016-12-28'),
(152, 28, 112, 'Bosnia and Herzegovina', '#BosniaandHerzegovina', '2016-12-28'),
(153, 28, 112, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(154, 28, 112, 'Brunei Darussalam', '#BruneiDarussalam', '2016-12-28'),
(155, 28, 112, 'Serbia and Montenegro', '#SerbiaandMontenegro', '2016-12-28'),
(156, 28, 112, 'French Polynesia', '#FrenchPolynesia', '2016-12-28'),
(157, 28, 113, 'Congo, The Democratic Republic of the', '#Congo,TheDemocraticRepublicofthe', '2016-12-28'),
(158, 28, 113, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(159, 28, 113, 'Dominican Republic', '#DominicanRepublic', '2016-12-28'),
(160, 28, 113, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(161, 28, 113, 'Korea, Democratic People"S Republic of', '#Korea,DemocraticPeople"SRepublicof', '2016-12-28'),
(162, 28, 113, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(163, 28, 113, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(164, 28, 114, 'Congo, The Democratic Republic of the', '#Congo,TheDemocraticRepublicofthe', '2016-12-28'),
(165, 28, 114, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(166, 28, 114, 'Dominican Republic', '#DominicanRepublic', '2016-12-28'),
(167, 28, 114, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(168, 28, 114, 'Korea, Democratic People"S Republic of', '#Korea,DemocraticPeople"SRepublicof', '2016-12-28'),
(169, 28, 114, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(170, 28, 114, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(171, 28, 115, 'Congo, The Democratic Republic of the', '#Congo,TheDemocraticRepublicofthe', '2016-12-28'),
(172, 28, 115, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(173, 28, 115, 'Dominican Republic', '#DominicanRepublic', '2016-12-28'),
(174, 28, 115, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(175, 28, 115, 'Korea, Democratic People"S Republic of', '#Korea,DemocraticPeople"SRepublicof', '2016-12-28'),
(176, 28, 115, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(177, 28, 115, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(178, 28, 116, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(179, 28, 116, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(180, 28, 116, 'Bosnia and Herzegovina', '#BosniaandHerzegovina', '2016-12-28'),
(181, 28, 116, 'Lithuania', '#Lithuania', '2016-12-28'),
(182, 28, 116, 'New Zealand', '#NewZealand', '2016-12-28'),
(183, 28, 116, 'Christmas Island', '#ChristmasIsland', '2016-12-28'),
(184, 28, 116, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(185, 28, 116, 'Cape Verde', '#CapeVerde', '2016-12-28'),
(186, 28, 117, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(187, 28, 117, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(188, 28, 117, 'Bosnia and Herzegovina', '#BosniaandHerzegovina', '2016-12-28'),
(189, 28, 117, 'Lithuania', '#Lithuania', '2016-12-28'),
(190, 28, 117, 'New Zealand', '#NewZealand', '2016-12-28'),
(191, 28, 117, 'Christmas Island', '#ChristmasIsland', '2016-12-28'),
(192, 28, 117, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(193, 28, 117, 'Cape Verde', '#CapeVerde', '2016-12-28'),
(194, 34, 118, 'Microsoft Office', '#MicrosoftOffice', '2017-01-14'),
(195, 34, 118, 'Data Modelling', '#DataModelling', '2017-01-14'),
(196, 28, 86, 'css', '#css', '2017-02-21'),
(197, 28, 86, 'debug', '#debug', '2017-02-21'),
(198, 28, 86, 'fdfd', '#fdfd', '2017-02-21'),
(199, 28, 86, 'fdfds', '#fdfds', '2017-02-21'),
(200, 28, 94, 'fdf', '#fdf', '2017-02-21'),
(201, 28, 86, 'ssss', '#ssss', '2017-02-21'),
(202, 28, 86, 'gggg', '#gggg', '2017-02-21'),
(203, 28, 86, 'ddd', '#ddd', '2017-02-21'),
(204, 28, 86, 'erere', '#erere', '2017-02-21'),
(205, 28, 86, 'dd', '#dd', '2017-02-21'),
(206, 28, 86, '1234', '#1234', '2017-02-21'),
(207, 28, 86, '456', '#456', '2017-02-21'),
(208, 28, 119, 'Microsoft Excel', '#MicrosoftExcel', '2017-02-21'),
(209, 28, 119, 'SAP', '#SAP', '2017-02-21'),
(210, 28, 119, 'ERP', '#ERP', '2017-02-21'),
(211, 28, 119, 'excel', '#excel', '2017-02-21'),
(212, 28, 89, 'yyy', '#yyy', '2017-02-21'),
(213, 28, 89, 'ttt', '#ttt', '2017-02-21'),
(214, 48, 121, 'machine operation', '#machineoperation', '2017-04-25'),
(215, 49, 122, 'photoshop', '#photoshop', '2017-04-25'),
(216, 48, 123, 'machine operation', '#machineoperation', '2017-04-25'),
(217, 49, 124, 'photoshop', '#photoshop', '2017-04-25'),
(218, 49, 125, 'photoshop', '#photoshop', '2017-04-25'),
(219, 34, 126, 'cad', '#cad', '2017-04-25'),
(220, 34, 126, 'photoshop', '#photoshop', '2017-04-25'),
(221, 28, 130, 'Microsoft Office', '#MicrosoftOffice', '2017-05-06'),
(222, 28, 132, 'Requirements', '#Requirements', '2017-05-13'),
(223, 28, 132, 'Analysis', '#Analysis', '2017-05-13'),
(224, 28, 132, 'Excel', '#Excel', '2017-05-13'),
(225, 28, 132, 'Excel', '#Excel', '2017-05-13'),
(226, 28, 132, 'process improvement', '#processimprovement', '2017-05-13'),
(227, 28, 133, 'Microsoft Excel', '#MicrosoftExcel', '2017-05-13'),
(228, 28, 133, 'SAP', '#SAP', '2017-05-13'),
(229, 28, 133, 'ERP', '#ERP', '2017-05-13'),
(230, 28, 134, 'Microsoft Excel', '#MicrosoftExcel', '2017-05-13'),
(231, 28, 134, 'SAP', '#SAP', '2017-05-13'),
(232, 28, 134, 'ERP', '#ERP', '2017-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `jobskillstemplate`
--

CREATE TABLE `jobskillstemplate` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `templateid` int(10) NOT NULL,
  `jobskill` varchar(40) NOT NULL,
  `jobskilltag` varchar(40) NOT NULL,
  `jobskilltagdate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobskillstemplate`
--

INSERT INTO `jobskillstemplate` (`id`, `userid`, `templateid`, `jobskill`, `jobskilltag`, `jobskilltagdate`) VALUES
(1, 28, 70, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-21'),
(2, 28, 70, 'Bhutan', '#Bhutan', '2016-12-21'),
(3, 28, 71, 'Microsoft Excel', '#MicrosoftExcel', '2016-12-27'),
(4, 28, 71, 'SAP', '#SAP', '2016-12-27'),
(5, 28, 71, 'ERP', '#ERP', '2016-12-27'),
(6, 28, 72, 'PHP', '#PHP', '2016-12-27'),
(7, 28, 72, 'jQuery', '#jQuery', '2016-12-27'),
(8, 28, 72, 'bootstrap', '#bootstrap', '2016-12-27'),
(9, 28, 72, 'code ignite', '#codeignite', '2016-12-27'),
(10, 28, 72, 'angular js', '#angularjs', '2016-12-27'),
(11, 28, 73, 'SAP', '#SAP', '2016-12-28'),
(12, 28, 73, 'Oracle ERP', '#OracleERP', '2016-12-28'),
(13, 28, 73, 'Excel', '#Excel', '2016-12-28'),
(14, 28, 73, 'SQL', '#SQL', '2016-12-28'),
(15, 28, 74, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(16, 28, 74, 'Google Docs', '#GoogleDocs', '2016-12-28'),
(17, 28, 74, 'MS Excel', '#MSExcel', '2016-12-28'),
(18, 28, 74, 'Orange HRM', '#OrangeHRM', '2016-12-28'),
(19, 28, 75, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(20, 28, 77, 'Social Media Apps', '#SocialMediaApps', '2016-12-28'),
(21, 28, 77, 'Microsoft Office', '#MicrosoftOffice', '2016-12-28'),
(22, 28, 77, 'Office 365', '#Office365', '2016-12-28'),
(23, 28, 77, 'Google Apps', '#GoogleApps', '2016-12-28'),
(24, 28, 78, 'Micronesia, Federated States of', '#Micronesia,FederatedStatesof', '2016-12-28'),
(25, 28, 79, 'Excel', '#Excel', '2016-12-28'),
(26, 28, 79, 'Office365', '#Office365', '2016-12-28'),
(27, 28, 79, 'google docs', '#googledocs', '2016-12-28'),
(28, 28, 80, 'Congo, The Democratic Republic of the', '#Congo,TheDemocraticRepublicofthe', '2016-12-28'),
(29, 28, 80, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(30, 28, 80, 'Dominican Republic', '#DominicanRepublic', '2016-12-28'),
(31, 28, 80, 'Trinidad and Tobago', '#TrinidadandTobago', '2016-12-28'),
(32, 28, 80, 'Korea, Democratic People"S Republic of', '#Korea,DemocraticPeople"SRepublicof', '2016-12-28'),
(33, 28, 80, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(34, 28, 80, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2016-12-28'),
(35, 28, 81, 'Central African Republic', '#CentralAfricanRepublic', '2016-12-28'),
(36, 28, 81, 'American Samoa', '#AmericanSamoa', '2016-12-28'),
(37, 28, 81, 'Bosnia and Herzegovina', '#BosniaandHerzegovina', '2016-12-28'),
(38, 28, 81, 'Lithuania', '#Lithuania', '2016-12-28'),
(39, 28, 81, 'New Zealand', '#NewZealand', '2016-12-28'),
(40, 28, 81, 'Christmas Island', '#ChristmasIsland', '2016-12-28'),
(41, 28, 81, 'British Indian Ocean Territory', '#BritishIndianOceanTerritory', '2016-12-28'),
(42, 28, 81, 'Cape Verde', '#CapeVerde', '2016-12-28'),
(43, 34, 82, 'Microsoft Office', '#MicrosoftOffice', '2017-01-14'),
(44, 34, 82, 'Data Modelling', '#DataModelling', '2017-01-14'),
(45, 48, 85, 'machine operation', '#machineoperation', '2017-04-25'),
(46, 49, 86, 'photoshop', '#photoshop', '2017-04-25'),
(47, 34, 83, 'cad', '#cad', '2017-04-25'),
(48, 34, 83, 'photoshop', '#photoshop', '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `jobtemplates`
--

CREATE TABLE `jobtemplates` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `jobtitle` varchar(40) NOT NULL,
  `company` varchar(50) NOT NULL,
  `specialization` int(10) NOT NULL,
  `plevel` int(10) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `msalary` int(10) NOT NULL,
  `maxsalary` int(10) NOT NULL,
  `startappdate` date NOT NULL DEFAULT '0000-00-00',
  `endappdate` date NOT NULL DEFAULT '0000-00-00',
  `nvacancies` int(5) NOT NULL,
  `teaser` varchar(150) NOT NULL,
  `jobdesc` text,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `yrsexp` int(5) NOT NULL DEFAULT '0',
  `mineduc` varchar(30) DEFAULT NULL,
  `prefcourse` varchar(30) DEFAULT NULL,
  `languages` varchar(40) DEFAULT NULL,
  `licenses` varchar(50) DEFAULT NULL,
  `wtravel` varchar(5) DEFAULT NULL,
  `wrelocate` varchar(5) DEFAULT NULL,
  `essay` varchar(100) NOT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtemplates`
--

INSERT INTO `jobtemplates` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `teaser`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`) VALUES
(70, 28, 'Senior Software Engineer', 'Rappler', 0, 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '', '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-23'),
(71, 28, 'Account Manager', 'BDO', 0, 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '', '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-27'),
(72, 28, 'Web Developer', 'Ecommsite', 11, 7, 'full', 20000, 30000, '0000-00-00', '2017-02-01', 2, 'Together, everyone achieves more! That is our motto and how we grow. Join our dynamic and talented team and find out what you''re made of!', '<p><b>Web Developer Responsibilities</b>\n</p><p>\n</p><p>Include:\n</p><p>\n</p><p>Writing well designed, testable, efficient code by using best software development practices\n</p><p>Creating website layout/user interfaces by using standard HTML/CSS practices\n</p><p>Integrating data from various back-end services and databases\n</p><p><br></p><p><b>Job brief</b></p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Computer Science', 'English, Filipino', '', 'off', 'off', 'What is it?', '2016-12-27'),
(74, 28, 'Recruitment Manager', 'Jobsly', 0, 1, 'full', 40000, 60000, '2017-01-07', '2016-12-29', 1, '', '<p><b>JOB DESCRIPTION\r</b></p><p>\r</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\r</p><p>\r</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\r</p><p>\r</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\r</p><p>\r</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\r</p><p>\r</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\r</p><p>\r</p><p><b>SALARY ', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(75, 28, 'Admin Assistant', 'Ayala Properties Management Corporation', 0, 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '', '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(76, 28, 'Technical Support Representative', '24/7', 0, 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '', '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\r</p><p>\r</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\r</p><p>\r</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\r</p><p>\r</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \r</p><p>\r</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\r</p><p>\r</p><p>Some tasks you may be involved in include:\r</p><p>\r</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\r</p><p>â€¢ Logging and keeping records of customer/employee queries\r</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\r</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\r</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\r</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\r</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \r</p><p>\r</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\r</p><p><b>Required skills\r</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\r</p><p>\r</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\r</p><p>â€¢ Ability to deal with difficult callers\r</p><p>â€¢ Logical thinker\r</p><p>â€¢ Good analytical and problem solving skills\r</p><p>â€¢ Up-to-date technical knowledge\r</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\r</p><p>â€¢ Good interpersonal and customer care skills\r</p><p>â€¢ Good accurate records keeping\r</p><p><b>Entry requirements\r</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\r</p><p>\r</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City ', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2016-12-28'),
(77, 28, 'Social Media Manager', 'Summit Media', 0, 1, 'full', 15000, 25000, '2017-01-28', '2016-12-14', 2, '', '<p><b>Social Media Manager Job Description\r</b></p><p>\r</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\r</p><p>\r</p><p>Deliberate planning and goal setting\r</p><p>Development of brand awareness and online reputation\r</p><p>Content management\r</p><p>SEO (search engine optimization) and generation of inbound traffic\r</p><p>Cultivation of leads and sales\r</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\r</p><p>\r</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\r</p><p>\r</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\r</p><p>\r</p><p>Content management duties include:\r</p><p>\r</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\r</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\r</p><p>Create a regular publishing schedule.\r</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\r</p><p>Promote content through social advertising.\r</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\r</p><p>\r</p><p>Digital Marketing Manager\r</p><p>Content Marketing Manager\r</p><p>Customer Experience Manager\r</p><p>Community Manager\r</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you', '2016-12-28'),
(78, 28, 'Data Entry Specialists', 'Athena', 0, 7, 'full', 12000, 23000, '2017-04-12', '2017-02-22', 12, '', '<p>Data Entry Operator I Job Responsibilities:\r</p><p>\r</p><p>Maintains database by entering data.\r</p><p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'Any 4-year course', 'English', '', 'off', 'off', 'Why should we hire you?', '2016-12-28'),
(79, 28, 'Office Manager', 'jobsly', 0, 6, 'full', 20000, 30000, '2017-03-15', '2017-02-15', 1, '', '<p>Maintains office services by organizing office operations and procedures; preparing payroll; controlling correspondence; designing filing systems; reviewing and approving supply requisitions; assigning and monitoring clerical functions.\r</p><p>Provides historical reference by defining procedures for retention, protection, retrieval, transfer, and disposal of records.\r</p><p>Maintains office efficiency by planning and implementing office systems, layouts, and equipment procurement.\r</p><p>Designs and implements office policies by establishing standards and procedures; measuring results against standards; making necessary adjustments.\r</p><p>Completes operational requirements by scheduling and assigning employees; following up on work results.\r</p><p>Keeps management informed by reviewing and analyzing special reports; summarizing information; identifying trends.\r</p><p>Maintains office staff by recruiting, selecting, orienting, and training employees.\r</p><p>Maintains office staff job results by coaching, counseling, and disciplining employees; planning, monitoring, and appraising job results.\r</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\r</p><p>Achieves financial objectives by preparing an annual budget; scheduling expenditures; analyzing variances; initiating corrective actions.\r</p><p>Contributes to team effort by accomplishing related results as needed.\r</p><p>Office Manager Skills and Qualifications:\r</p><p>\r</p><p>Supply Management, Informing Others, Tracking Budget Expenses, Delegation, Staffing, Managing Processes, Supervision, Developing Standards, Promoting Process Improvement, Inventory Control, Reporting Skills</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'Why should we hire you?', '2016-12-28'),
(80, 28, 'Project Manager', 'Accenture', 0, 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '', '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(81, 28, 'Scrum Master', 'Maersk Sealand', 0, 6, 'full', 60000, 80000, '2017-01-06', '2016-12-12', 1, '', '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(82, 34, 'Web Analytics Manager', 'Google', 0, 2, 'full', 90000, 120000, '2017-02-01', '2017-01-25', 1, '', '<p>As Web Analytics Manager your key responsibilities include:\n</p><p>Â·Managing the web analytics agency and ensure all agreed work is successfully completed.\n</p><p>Â·Leading thought process on how to improve customer journeys.\n</p><p>Â·Analysing and implementing A/B and Multivariate testing on the brand website across all devices to improve user experience and conversions.\n</p><p>Â·Reviewing current on-site/on-page optimisation and identify areas of improvement\n</p><p><br></p><p></p>', 'Pasig', '', 'Philippines', 5, 'College Degree', 'Statistics', 'English', '', 'on', 'on', 'Essay Not Required', '2017-01-14'),
(83, 34, 'Architect', 'BamBam Corp', 3, 5, 'full', 25000, 40000, '0000-00-00', '0000-00-00', 0, 'Design new buildings and suggest alterations to existing buildings', '<p>Typical work activities include:\r</p><p>\r</p><p>creating building designs and highly detailed drawings both by hand and by using specialist computer-aided design (CAD) applications\r</p><p>liaising with construction professionals about the feasibility of potential projects\r</p><p>working around constraining factors such as town planning legislation, environmental impact and project budget\r</p><p>working closely with a team of other professionals such as building service engineers, construction managers, quantity surveyors and architectural technologists\r</p><p>applying for planning permission and advice from governmental new build and legal departments\r</p><p>writing and presenting reports, proposals, applications and contracts\r</p><p>specifying the requirements for the project\r</p><p>adapting plans according to circumstances and resolving any problems that may arise during construction\r</p><p>playing a part in project and team management\r</p><p>travelling regularly to building sites, proposed locations and client meetings</p>', '', '', '', 5, 'College Degree', '', '', 'Architecture', 'on', 'off', '', '2017-04-24'),
(85, 48, 'Junior Sales Agent', 'Tech4Kids', 15, 6, 'full', 20000, 25000, '0000-00-00', '0000-00-00', 0, 'Serves customers by selling products; meeting customer needs.', '<p>Sales Representative Job Duties:\r</p><p>\r</p><p>Services existing accounts, obtains orders, and establishes new accounts by planning and organizing daily work schedule to call on existing or potential sales outlets and other trade factors.\r</p><p>Adjusts content of sales presentations by studying the type of sales outlet or trade factor.\r</p><p>Focuses sales efforts by studying existing and potential volume of dealers.\r</p><p>Submits orders by referring to price lists and product literature.\r</p><p>Keeps management informed by submitting activity and results reports, such as daily call reports, weekly work plans, and monthly and annual territory analyses.</p><p>Monitors competition by gathering current marketplace information on pricing, products, new products, delivery schedules, merchandising techniques, etc.\r</p><p>Recommends changes in products, service, and policy by evaluating results and competitive developments.\r</p><p>Resolves customer complaints by investigating problems; developing solutions; preparing reports; making recommendations to management.\r</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\r</p><p>Provides historical records by maintaining records on area and customer sales.\r</p><p>Contributes to team effort by accomplishing related results as needed.\r</p><p>Sales Representative Skills and Qualifications:\r</p><p>\r</p><p>Customer Service, Meeting Sales Goals, Closing Skills, Territory Management, Prospecting Skills, Negotiation, Self-Confidence, Product Knowledge, Presentation Skills, Client Relationships, Motivation for Sales.</p>', '', '', '', 5, '', '', '', 'Mechanical Engineer', 'off', 'on', '', '2017-04-25'),
(86, 49, 'Multimedia Reporter', 'Doggie Corp.', 5, 6, 'full', 15000, 20000, '2017-05-01', '2017-04-30', 1, 'Multimedia writers combine creativity and technology. Along with writing online and other interactive content, they may work with computer-aided desig', '<p>Multimedia Writer Job Description\r</p><p>Multimedia writers create content for the Internet as well as smart phones, computers and video game systems, among other technologies. This content may include games, educational tools and advertising materials. Multimedia writers work closely with other multimedia artists throughout the production process.\r</p><p>\r</p><p>Their work is incredibly varied and provides a multitude of challenges and opportunities for creativity. Multimedia writers may create a script for a storyboard developed by a graphic artist or other creative professional. They may also create the text for an online ad campaign.</p>', '', '', 'Philippines', 1, 'College Degree', 'BA Journalism', '', '', 'on', 'off', '', '2017-04-25'),
(87, 34, 'Bank Manager', 'BamBam Corp', 0, 2, 'full', 0, 0, '0000-00-00', '0000-00-00', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-04-26'),
(88, 34, 'Metrics Manager', 'BamBam Corp', 0, 1, 'full', 0, 0, '0000-00-00', '0000-00-00', 0, '', '<p><br></p>', '', '', '', 0, '', '', '', '', 'off', 'off', '', '2017-05-19');

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
(7, 1, 'Santiago', 'Regidor', 'Hernandez', '87 Spain st., Better Living Subd', 'Paranaque', 'Metro Manila', 'Philippines', '  (23)3343', 'reggie1@gmail.com', ' 6391770018451', 39, '2016-11-09', 'female', 'Philippines'),
(8, 29, 'Cat', 'Goldie', '', 'Spain', 'Paranaque City', 'Metro Manila', 'Philippines', '09171110000', 'goldie@gmail.com', '', 8, '2009-01-01', 'male', 'Filipino'),
(9, 30, 'Santiago', 'Moytisha', '', '87', 'Paranaque', '', 'Philippines', '09170000000', 'moytisha@gmail.com', '', 20, '1996-12-31', 'female', 'Filipino'),
(10, 31, 'Girl', 'Tisha', '', '111 Espana', 'Makati', 'Metro Manila', 'Philippines', '09171101001', 'tisha@gmail.com', ' 639175010845', 20, '1997-01-14', 'female', 'Filipino'),
(11, 32, 'Pinon', 'Toya', '', '2 Sta Clara', 'San Pedro', 'Laguna', 'Philippines', '09479999999', 'toya@gmail.com', '', 16, '2000-12-05', 'female', 'Filipino'),
(12, 33, 'Santiago', 'Rico', '', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '9175010845', 'rico@gmail.com', '', 32, '1984-03-01', 'male', 'Filipino'),
(13, 35, 'Hopps', 'Judy', '', '1 ', 'Bunny Burrows', '', 'Zootopia', '09479962172', 'judy@gmail.com', '', 20, '1997-01-01', 'female', 'Zootopian'),
(14, 36, 'Wilde', 'Nick', '', '2', 'Fox Land', '', 'Zootopia', '09479962172', 'nick@gmail.com', '', 25, '1992-01-01', 'male', 'Zootopian'),
(15, 37, 'Bogo', 'Chief', 'Bogo', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '9175010845', 'reggie1@gmail.com', '09175010845', 35, '1981-07-01', 'male', 'Zootopian'),
(16, 38, 'Aur', 'Dino', 'S', '4 Dino Drive', 'Forest City', 'Dino Land', 'Philippines', '09171101001', 'dino@gmail.com', '028210119', 27, '1990-01-01', 'male', 'Filipino'),
(17, 39, 'Cavebaby', 'Spot', 'Doggie', '5 Cave Road', 'Dino City', 'Dino Land', 'Philippines', '09479999999', 'spot@gmail.com', '82101111', 39, '1978-06-01', 'male', 'Filipino'),
(18, 40, 'McQueen', 'Lighting', '', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '09171101001', 'lightning@gmail.com', '', 32, '1985-05-01', 'male', 'Filipino'),
(19, 41, 'Truck', 'Mater', 'Tow', '10 Garage St', 'Car City', '', 'USA', '09479999999', 'mater@gmail.com', '', 46, '1970-03-19', 'male', 'American'),
(20, 42, 'Truck', 'Dusty', '', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '09180000001', 'dusty@gmail.com', ' 639175010845', 21, '1995-06-01', 'male', 'Filipino'),
(21, 43, 'Jet', 'Skipper', 'Fighter', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '028210119', 'skipper@gmail.com', ' 639175010845', 25, '1992-01-28', 'male', 'Filipino'),
(22, 44, 'Ington', 'Chug', 'G', '87 Spain St. Better Living Subd.', 'Paranaque', 'Metro Manila', 'Philippines', '9177001845', 'chug@gmail.com', '028210119', 27, '1990-01-28', 'male', 'Filipino');

-- --------------------------------------------------------

--
-- Table structure for table `savedapplications`
--

CREATE TABLE `savedapplications` (
  `id` int(10) NOT NULL,
  `jobid` int(10) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedapplications`
--

INSERT INTO `savedapplications` (`id`, `jobid`, `userid`) VALUES
(6, 86, 1),
(8, 89, 32),
(9, 88, 33),
(10, 91, 33),
(11, 118, 37),
(12, 88, 37),
(13, 94, 37),
(14, 88, 38),
(15, 118, 43),
(16, 91, 43),
(18, 86, 37),
(19, 90, 37),
(20, 106, 1),
(21, 112, 1),
(22, 107, 1),
(23, 89, 1),
(24, 100, 1),
(25, 90, 1);

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
(4, 1, 'j2ee', '#j2ee', '2016-12-05'),
(5, 1, 'bootstrap', '#bootstrap', '2016-12-05'),
(6, 1, 'responsive', '#responsive', '2016-12-05'),
(14, 1, 'American Samoa', '#AmericanSamoa', '2016-12-06'),
(15, 1, 'Nigeria', '#Nigeria', '2016-12-06'),
(17, 1, 'Cape Verde', '#CapeVerde', '2016-12-06'),
(19, 29, 'accounting', '#accounting', '2017-01-07'),
(20, 29, 'web design', '#webdesign', '2017-01-07'),
(21, 29, 'programming', '#programming', '2017-01-07'),
(22, 29, 'Microsoft Office', '#MicrosoftOffice', '2017-01-07'),
(23, 30, 'PHP', '#PHP', '2017-01-08'),
(24, 30, 'JAVA', '#JAVA', '2017-01-08'),
(25, 31, 'Sit', '#Sit', '2017-01-14'),
(26, 31, 'catch', '#catch', '2017-01-14'),
(27, 31, 'play dead', '#playdead', '2017-01-14'),
(28, 32, 'bootstrap', '#bootstrap', '2017-01-14'),
(29, 32, 'html', '#html', '2017-01-14'),
(30, 32, 'css', '#css', '2017-01-14'),
(31, 32, 'javascript', '#javascript', '2017-01-14'),
(32, 32, 'php', '#php', '2017-01-14'),
(33, 33, 'microsoft office', '#microsoftoffice', '2017-01-14'),
(34, 33, 'google analytics', '#googleanalytics', '2017-01-14'),
(35, 33, 'data analysis', '#dataanalysis', '2017-01-14'),
(36, 33, 'R', '#R', '2017-01-14'),
(37, 33, 'data modelling', '#datamodelling', '2017-01-14'),
(38, 33, 'charting', '#charting', '2017-01-14'),
(39, 35, 'catchbadguys', '#catchbadguys', '2017-01-26'),
(40, 36, 'selling', '#selling', '2017-01-26'),
(41, 37, 'criminal investigation', '#criminalinvestigation', '2017-01-28'),
(42, 37, 'criminal investigation', '#criminalinvestigation', '2017-01-28'),
(43, 37, 'html', '#html', '2017-01-28'),
(44, 37, ' CSS', '#CSS', '2017-01-28'),
(45, 38, 'financial analyssis', '#financialanalyssis', '2017-01-28'),
(46, 38, 'dataanalysis', '#dataanalysis', '2017-01-28'),
(47, 38, 'finncial engineering', '#finncialengineering', '2017-01-28'),
(48, 39, 'data analysis', '#dataanalysis', '2017-01-28'),
(49, 39, 'financial analysis', '#financialanalysis', '2017-01-28'),
(50, 39, 'microsoft office', '#microsoftoffice', '2017-01-28'),
(51, 39, 'capital budgeting', '#capitalbudgeting', '2017-01-28'),
(52, 39, 'strategic management', '#strategicmanagement', '2017-01-28'),
(53, 40, 'linear regression', '#linearregression', '2017-01-28'),
(54, 40, 'html', '#html', '2017-01-28'),
(55, 40, 'php', '#php', '2017-01-28'),
(56, 40, 'java', '#java', '2017-01-28'),
(57, 41, 'towing', '#towing', '2017-01-28'),
(58, 42, 'java', '#java', '2017-01-28'),
(59, 42, 'html', '#html', '2017-01-28'),
(60, 42, 'css', '#css', '2017-01-28'),
(61, 43, 'web design', '#webdesign', '2017-01-28'),
(62, 43, 'css', '#css', '2017-01-28'),
(64, 1, 'Antigua and Barbuda', '#AntiguaandBarbuda', '2017-01-31'),
(66, 1, 'Australia', '#Australia', '2017-01-31'),
(69, 1, 'Bahamas', '#Bahamas', '2017-01-31'),
(70, 1, 'Aruba', '#Aruba', '2017-01-31'),
(71, 1, 'Bangladesh', '#Bangladesh', '2017-02-25');

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
  `isverified` int(5) NOT NULL DEFAULT '0',
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `email`, `password`, `usertype`, `companyname`, `verifyhash`, `signupdate`, `isverified`, `photo`) VALUES
(1, 'reg@jobsly.net', 'regsam', 2, NULL, '11111', '2016-11-07', 1, 'photo/20170225090214.jpg'),
(28, 'reggie1@gmail.com', 'samreece', 1, 'T4K', '222', '2016-12-16', 1, ''),
(29, 'goldie@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-07', 1, 'photo/20170412100417.jpg'),
(30, 'moytisha@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-07', 1, ''),
(31, 'tisha@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-07', 1, ''),
(32, 'toya@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-07', 1, ''),
(33, 'rico@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-07', 0, ''),
(34, 'bambam@gmail.com', 'truck', 1, 'Google', '222', '2017-01-14', 1, ''),
(35, 'judy@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(36, 'nick@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 0, ''),
(37, 'bogo@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(38, 'dino@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(39, 'spot@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(40, 'lightning@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(41, 'mater@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(42, 'dusty@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(43, 'skipper@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(44, 'chug@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 0, ''),
(45, 'dottie@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(46, 'riley@gmail.com', 'truck', 2, 'undefined', '222', '2017-01-26', 1, ''),
(47, 'reggie@yahoo.com', 'regsam', 1, 'reg Corp', '222', '2017-04-03', 1, ''),
(48, 'sampretty@gmail.com', 'truck', 1, 'Tech4Kids', '222', '2017-04-04', 1, ''),
(49, 'wan@gmail.com', 'truck', 1, 'Doggie Corp.', '222', '2017-04-04', 1, ''),
(50, 'dro@gmail.com', 'truck', 1, 'Firestation', '222', '2017-04-04', 1, ''),
(51, 'wandro@gmail.com', 'truck', 1, 'Fire Station', '222', '2017-04-17', 0, ''),
(52, 'gekko@gmail.com', 'truck', 1, 'PJ Mask Inc', '222', '2017-04-25', 1, '');

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
  `plevel` int(10) NOT NULL,
  `enddate` date DEFAULT '0000-00-00',
  `currentemployer` varchar(5) DEFAULT NULL,
  `jobdescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workexperience`
--

INSERT INTO `workexperience` (`id`, `userid`, `company`, `position`, `startdate`, `msalary`, `industry`, `plevel`, `enddate`, `currentemployer`, `jobdescription`) VALUES
(7, 1, 'CHAMP Cargosystems Inc.', 'Senior Software Engineer', '2016-11-07', 85000, 'Airline Cargo', 5, '2016-11-24', 'on', '<p>Accomplishments:</p><ul><li>Architecture Committee reviewer</li><li>Developer for Handling and Airline modules</li><li>Trains new joiners</li><li>Refactoring group</li></ul>'),
(15, 1, 'Rappler', 'Metrics Manager', '2016-12-09', 33331, 'industry', 2, '2016-11-16', 'off', '<p>Hello Summernote</p>'),
(16, 1, 'ASTI1', 'System Engineer', '2016-11-25', 30000, 'IT', 6, '2016-12-23', 'off', '<p>A software engineer is a person who applies the principles of software engineering to the design, development, maintenance, testing, and evaluation of the software and systems that make computers or anything containing software work.</p><p>Becoming a software developer, also known as a computer programmer, you''ll be playing a key role in the design, installation, testing and maintenance of software systems. The programs you create are likely to help businesses be more efficient and provide a better service.</p>'),
(17, 29, 'APMC', 'Operations Accountant', '2002-09-01', 20000, 'Real Estate', 6, '2005-06-30', 'off', '<p>Responsibilities:<br>â€¢ Preparation and Analysis of Monthly and Annual Financial Statements<br><br></p>'),
(19, 29, 'Thomson Financial Corp.', 'Financial Data Analyst', '2001-09-01', 12000, 'Finance', 6, '2002-08-28', 'off', '<p>Responsibilities:<br>â€¢ Update and analyze information of publicly held companies that form part of DataStream United Kingdom<br>coverage in compliance with UK Format policies for timeliness, quality and consistency.<br>â€¢ Coordinates with fundamental group and/or other departments to ensure editorial needs are addressed.<br>â€¢ Performs other duties that may be assigned from time to time by the team manager.</p>'),
(20, 30, 'Tech4kids Inc.', 'Finance Director', '2006-01-01', 40000, 'IT', 1, '2015-02-01', 'on', 'Responsibilities:<br>â€¢ Develop and manage financial practices, accounting process, and internal<br>controls<br>â€¢ Preparation and Analysis of Monthly and Annual Financial Statements<br>â€¢ Direct the organizationâ€™s financial goals, objectives, and budgets.<br>â€¢ Financial Decision-making including Capital Budgeting and Ratio Analysis<br>â€¢ Strategic Planning and Business Development<br>â€¢ Ensure compliance with BIR, SEC, and other government agencies<br>â€¢ Develop Technology Curriculum for grade school students'),
(21, 30, 'Cogmotion Inc.', 'BPO Accountant / Project Manager', '2005-08-01', 35000, 'IT', 2, '2008-03-01', 'off', '<p>Responsibilities:<br>â€¢ Design the accounting process and Books of Accounts using QuickBooks<br>Online for US clients<br>â€¢ Provide accounting services for US clients including the ff:<br>â€¢ Bookkeeping and maintaining of General Ledgers<br>â€¢ Accounts payable recording, monitoring, processing, preparation of<br>reports, and preparation of printable checks<br>â€¢ Accounts receivable recording, monitoring, preparation of aging reports,<br>and preparation of printable invoices<br>â€¢ Payroll processing<br>â€¢ Bank Reconciliation<br>â€¢ Preparation of financial reports including Profit and Loss Statement,<br>Balance Sheet '),
(22, 30, 'Ayala Property Management Corp.', 'Operations Accountant', '2002-09-01', 24000, 'Real Estate', 6, '2005-06-30', 'off', '<p>Responsibilities:<br>â€¢ Preparation and Analysis of Monthly and Annual Financial Statements<br>â€¢ Preparation '),
(23, 31, 'Goldie Veterinary Services', 'Vice President', '2016-01-01', 50000, 'Healthcare', 1, '2017-01-21', 'on', '<p>Examine animals to diagnose their health problems\r</p><p>Diagnose and treat animals for medical conditions\r</p><p>Treat and dress wounds\r</p><p>Perform surgery on animals\r</p><p>Test for and vaccinate against diseases\r</p><p>Operate medical equipment, such as x-ray machines\r</p><p>Advise animal owners about general care, medical conditions, and treatments\r</p><p>Prescribe medication</p>'),
(24, 32, 'Bamsoywandro Inc.', 'Web Developer', '2011-10-01', 45000, 'Retail', 2, '2017-01-13', 'off', '<p>Accomplishes information technology staff results by communicating job expectations; planning, monitoring, and appraising job results; coaching, counseling, and disciplining employees; initiating, coordinating, and enforcing systems, policies, and procedures.\n</p><p>Maintains staff by recruiting, selecting, orienting, and training employees; maintaining a safe and secure work environment; developing personal growth opportunities.\n</p><p>Maintains organization''s effectiveness and efficiency by defining, delivering, and supporting strategic plans for implementing information technologies.\n</p><p>Directs technological research by studying organization goals, strategies, practices, and user projects.\n</p><p>Completes projects by coordinating resources and timetables with user departments and data center.\n</p><p>Verifies application results by conducting system audits of technologies implemented.\n</p><p>Preserves assets by implementing disaster recovery and back-up procedures and information security and control structures.\n</p><p>Recommends information technology strategies, policies, and procedures by evaluating organization outcomes; identifying problems; evaluating trends; anticipating requirements.\n</p><p>Accomplishes financial objectives by forecasting requirements; preparing an annual budget; scheduling expenditures; analyzing variances; initiating corrective action.\n</p><p>Maintains quality service by establishing and enforcing organization standards.\n</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; benchmarking state-of-the-art practices; participating in professional societies.\n</p><p>Contributes to team effort by accomplishing related results as needed.</p>'),
(25, 32, 'Doggie Co.', 'Web Designer', '2011-06-01', 20000, 'Information Technology', 7, '2011-09-30', 'off', '<p>Regular exposure to business stakeholders and executive management, as well as the authority and scope to apply your expertise to many interesting technical problems.\r</p><p>Candidate must have a strong understanding of UI, cross-browser compatibility, general web functions and standards.\r</p><p>The position requires constant communication with colleagues.\r</p><p><br></p>'),
(27, 33, 'Oracle', 'Web Analytics Manager', '2015-01-23', 55000, 'Information Technology', 2, '2017-12-31', 'on', '<p>-Provide marketing intelligence and offer recommendations to support business decisions.\r</p><p>- Recommend, achieve buy in for and develop new analytical reports and methods that will enhance marketersâ€™ knowledge and understanding of their performance vs. business goals, and enable them to â€œturn the dialsâ€ for business performance\r</p><p>-Prepare scheduled and ad-hoc reports that highlight key metrics and trends and be able to articulate those trends and recommend ways marketers can respond to them.\r</p><p>-Manage website analytics tools (primarily Adobe Site Catalyst) and leverage automation to the maximum extent possible.\r</p><p>-Train marketing and other lines of business on web analytics tools and techniques with a goal of transferring knowledge for maximum analytical expertise.\r</p><p>-Write functional requirements and QA test plans for site tracking and configuring Web Analytics'),
(28, 33, 'Amazon', 'Web Analyst', '2013-02-01', 45000, 'Retail', 6, '2015-01-10', 'off', '<p>Prepares useful information that drives effective decisions from the mass of data\n</p><p>Presents information well in all formats â€“ written, verbal and using new media tools\n</p><p>Uses their analytical and mathematical approach to a problem to ensure rigour and accuracy (e.g. comfortable with concepts of significance, mathematical trending, modelling)\n</p><p>Knows how to use the best base tools (e.g. advanced Excel, use of relational databases such as mysql) as well as packaged tools such as Google analytics , Omniture etc\n</p><p>Enthusiastically researches the Analytics discipline, reading, networking, researching in order to stay at the top of their game.</p>'),
(29, 33, 'Alexa', 'Data Analyst', '2005-04-01', 25000, 'Information Technology', 7, '2011-01-02', 'off', '<p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p>Requirements</p>'),
(30, 35, 'District 1', 'Police Officer', '2016-01-01', 20000, '', 0, '2017-01-26', 'off', '<p>Responsibilities<br><br>As a police officer youâ€™ll need to work alongside communities, liaising with community groups and individuals</p><p><br>AAAA</p><p>BBBB<br></p>'),
(32, 36, 'Popsicle Corp.', 'CEO', '2012-04-01', 40000, 'Retail', 1, '2017-01-25', 'off', '<p>CEO Responsibilities</p><p>Develop high quality business strategies and plans ensuring their alignment with short-term and long-term objectives<br>Lead and motivate subordinates to advance employee engagement develop a high performing managerial team<br>Oversee all operations and business activities to ensure they produce the desired results and are consistent with the overall strategy and mission<br>Make high-quality investing decisions to advance the business and increase profits<br>Enforce adherence to legal guidelines and in-house policies to maintain the companyâ€™s legality and business ethics<br>Review financial and non-financial reports to devise solutions or improvements<br>Build trust relations with key partners and stakeholders and act as a point of contact for important shareholders<br>Analyze problematic situations and occurrences and provide solutions to ensure company survival and growth<br>Maintain a deep knowledge of the markets and industry of the company<br></p>'),
(33, 37, 'Precint 1', 'Chief of Police', '2003-01-01', 50000, 'Law Enforcement', 2, '2017-01-25', 'on', '<ul><li>Prevents crime by explaining and enforcing applicable federal, state, and local laws and ordinances; teaching preventive, protective, and defensive tactics; mediating disputes; patrolling assigned area; responding to notices of disturbances; conducting searches; observing suspicious activities; detaining suspects.</li><li>Apprehends suspects by responding to complaints and calls for help; observing violations; making arrests.</li><li>Conducts criminal investigations by gathering evidence; interviewing victims and witnesses; interrogating suspects</li><li>Documents observations and actions by radioing information; completing reports.</li><li>Reports observations and actions by testifying in court.</li><li>Fulfills court orders by serving warrants and commitments.</li><li>Maintains safe traffic conditions by monitoring and directing traffic; enforcing laws and ordinances; investigating accidents; providing escort; reporting unsafe streets and facilities.</li><li>Minimizes personal injury by rescuing and reviving victims; radioing for medical assistance.</li><li>Maintains operations by following department policies and procedures; recommending changes.</li><li>Ensures operation of equipment by practicing use; completing preventive maintenance requirements; following manufacturer''s instructions; troubleshooting malfunctions; notifying supervisor of needed repairs; evaluating new equipment and techniques.</li><li>Maintains professional and technical knowledge by studying applicable federal, state, and local laws and ordinances; attending educational workshops; reviewing professional publications; practicing skills; participating in professional societies.</li><li>Contributes to team effort by accomplishing related results as needed. Skills/Qualifications: Decision Making, Legal Compliance, Handles Pressure, Deals with Uncertainty, Lifting, Physical Fitness, Judgment, Objectivity, Dependability, Emotional Control, Integrity<br><br><br></li></ul>'),
(35, 37, 'Precint 2', 'Junior Police', '2002-04-01', 50000, 'Law Enforcement', 7, '2002-09-21', 'off', '<p>Gives Parking Tickets<br>Apprehends suspects by responding to complaints and calls for help; observing violations; making arrests.<br>Conducts criminal investigations by gathering evidence; interviewing victims and witnesses; interrogating suspects.<br>Documents observations and actions by radioing information; completing reports.</p><p>Financial Manager Responsibilities\r</p><p>\r</p><p>Include:\r</p><p>\r</p><p>Providing financial reports and interpreting financial information to managerial staff while recommending further courses of action.\r</p><p>Advising on investment activities and provide strategies that the company should take\r</p><p>Maintaining the financial health of the organization.</p>'),
(36, 38, 'APMC', 'Operations Accountant', '2010-05-01', 30000, 'Real Estate', 4, '2012-01-01', 'off', '<p>Maintains financial security by following internal controls.\r</p><p>Prepares payments by verifying documentation, and requesting disbursements.\r</p><p>Answers accounting procedure questions by researching and interpreting accounting policy and regulations.\r</p><p>Complies with federal, state, and local financial legal requirements by studying existing and new legislation, enforcing adherence to requirements, and advising management on needed actions.\r</p><p>Prepares special financial reports by collecting, analyzing, and summarizing account information and trends.\r</p><p>Maintains customer confidence and protects operations by keeping financial information confidential.\r</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\r</p><p>Accomplishes the result by performing the duty.\r</p><p>Contributes to team effort by accomplishing related results as needed.'),
(37, 38, 'Cogmotion', 'Project Manager', '2012-02-01', 40000, 'Information Technology', 2, '2013-03-01', 'off', '<p>Plan, budget, oversee and document all aspects of the specific project you are working on. Project managers may work closely with upper management to make sure that the scope and direction of each project is on schedule, as well as other departments for support.</p>'),
(38, 38, 'Tech4Kids', 'Finance Manager', '2013-04-01', 60000, 'Information Technology', 2, '2017-01-31', 'on', '<p>providing and interpreting financial information\r</p><p>monitoring and interpreting cash flows and predicting future trends\r</p><p>analysing change and advising accordingly\r</p><p>formulating strategic and long-term business plans\r</p><p>researching and reporting on factors influencing business performance\r</p><p>analysing competitors and market trends\r</p><p>developing financial management mechanisms that minimise financial risk\r</p><p>conducting reviews and evaluations for cost-reduction opportunities\r</p><p>managing a company''s financial accounting, monitoring and reporting systems\r</p><p>liaising with auditors to ensure annual monitoring is carried out\r</p><p>developing external relationships with appropriate contacts, e.g. auditors, solicitors, bankers and statutory organisations such as the Inland Revenue\r</p><p>producing accurate financial reports to specific deadlines\r</p><p>managing budgets\r</p><p>arranging new sources of finance for a company''s debt facilities\r</p><p>supervising staff\r</p><p>keeping abreast of changes in financial regulations and legislation.</p>'),
(39, 39, 'Rappler', 'Metrics Manager', '2016-01-18', 55000, 'Media', 2, '2017-04-30', 'on', '<p>Prepares useful information that drives effective decisions from the mass of data\r</p><p>Presents information well in all formats â€“ written, verbal and using new media tools\r</p><p>Uses their analytical and mathematical approach to a problem to ensure rigour and accuracy (e.g. comfortable with concepts of significance, mathematical trending, modelling)\r</p><p>Knows how to use the best base tools (e.g. advanced Excel, use of relational databases such as mysql) as well as packaged tools such as Google analytics , Omniture etc\r</p><p>Enthusiastically researches the Analytics discipline, reading, networking, researching in order to stay at the top of their game.</p>'),
(40, 39, 'Tech4Kids', 'CFO', '2006-01-01', 40000, 'Information Technology', 1, '2014-12-31', 'off', '<p>Basic Function: The chief financial officer position is accountable for the administrative, financial, and risk management operations of the company, to include the development of a financial and operational strategy, metrics tied to that strategy, and the ongoing development and monitoring of control systems designed to preserve company assets and report accurate financial results. Principal accountabilities are:\r</p><p>\r</p><p>Planning\r</p><p>\r</p><p>Assist in formulating the company''s future direction and supporting tactical initiatives\r</p><p>Monitor and direct the implementation of strategic business plans\r</p><p>Develop financial and tax strategies\r</p><p>Manage the capital request and budgeting processes\r</p><p>Develop performance measures that support the company''s strategic direction\r</p><p>Operations\r</p><p>\r</p><p>Participate in key decisions as a member of the executive management team\r</p><p>Maintain in-depth relations with all members of the management team\r</p><p>Manage the accounting, human resources, investor relations, legal, tax, and treasury departments\r</p><p>Oversee the financial operations of subsidiary companies and foreign operations\r</p><p>Manage any third parties to which functions have been outsourced\r</p><p>Oversee the company''s transaction processing systems\r</p><p>Implement operational best practices\r</p><p>Oversee employee benefit plans, with particular emphasis on maximizing a cost-effective benefits package\r</p><p>Supervise acquisition due diligence and negotiate acquisitions\r</p><p>Financial Information\r</p><p>\r</p><p>Oversee the issuance of financial information\r</p><p>Personally review and approve all Form 8-K, 10-K, and 10-Q filings with the Securities and Exchange Commission\r</p><p>Report financial results to the board of directors\r</p><p>Risk Management\r</p><p>\r</p><p>Understand and mitigate key elements of the company''s risk profile\r</p><p>Monitor all open legal issues involving the company, and legal issues affecting the industry\r</p><p>Construct and monitor reliable control systems\r</p><p>Maintain appropriate insurance coverage\r</p><p>Ensure that the company complies with all legal and regulatory requirements\r</p><p>Ensure that record keeping meets the requirements of auditors and government agencies\r</p><p>Report risk issues to the audit committee of the board of directors\r</p><p>Maintain relations with external auditors and investigate their findings and recommendations\r</p><p>Funding\r</p><p>\r</p><p>Monitor cash balances and cash forecasts\r</p><p>Arrange for debt and equity financing\r</p><p>Invest funds\r</p><p>Invest pension funds\r</p><p>Third Parties\r</p><p>\r</p><p>Participate in conference calls with the investment community\r</p><p>Maintain banking relationships\r</p><p>Represent the company with investment bankers and investors</p>'),
(41, 39, 'Thomson Financial', 'Financial Data Analyst', '2000-04-01', 15000, 'Banking and Finance', 7, '2003-04-30', 'off', '<p>Analyze financial data by collecting, monitoring and creating financial models for decision support. Improve financial status by analyzing results; monitoring variances; identifying trends; recommending actions to management. Assist with annual and quarterly forecasting.</p>'),
(42, 39, 'APMC', 'Operations Accountant II', '2003-06-01', 25000, 'Service', 4, '2005-06-30', 'off', '<p>Perform day-to-day management of financial accounts.\r</p><p>\r</p><p>Provide financial assistance for decision making in timely manner.\r</p><p>\r</p><p>Apply accounting principles to analyze financial information.\r</p><p>\r</p><p>Ensure financial transactions are performed in compliance with company policies.\r</p><p>\r</p><p>Prepare accurate and timely financial management reports and statements.\r</p><p>\r</p><p>Ensure accurate recording and analysis of revenues and expenses.\r</p><p>\r</p><p>Perform reconciliation for various client accounts.\r</p><p>\r</p><p>Analyze financial information to prepare weekly, monthly and annual financial reports.\r</p><p>\r</p><p>Address and resolve customer queries in timely and accurate manner.\r</p><p>\r</p><p>Coordinate internal audit process with Auditors.\r</p><p>\r</p><p>Perform accounting functions such as revenue and asset accounting, payroll and cost analysis.\r</p><p>\r</p><p>Manage book-keeping and financial systems.\r</p><p>\r</p><p>Update accounting systems in line with latest computer technology.\r</p><p>\r</p><p>Provide advice on revenue and expenditure trends and financial commitments.\r</p><p>\r</p><p>Develop solutions to resolve accounting discrepancies and other financial problems/issues.\r</p><p>\r</p><p>Provide continuous management and support of budget and forecast activities.</p>'),
(45, 41, 'The Garage', 'Vice President of Operations', '2009-01-01', 200000, 'Automobile', 1, '2016-12-31', 'off', '<p>Internal Relationships\r</p><p>Develop junior staff to the next level by ensuring assigned staff fully understand projects, providing effective feedback to staff (positive and critical), identifying and promoting growth opportunities for all junior staff\r</p><p>Implement firm policies around recruiting, staffing, training and account management that result in top-notch client service as well as a positive work environment that fosters a pattern of long-term staff retention\r</p><p>Promote a positive environment for staff and identify and work with firm management to address any issues that are creating barriers to an optimal work environment for all staff\r</p><p>Provide feedback, advice and back up as needed to other members of senior staff team to ensure all senior staff has support needed to effectively run accounts and promote positive work environment\r</p><p>Attend and actively participate in senior staff meetings, offering ideas, insights and recommendations on firm policies, staffing, client service, new business and other topics that ultimately impact the overall quality of the firm\r</p><p>Effectively manage all aspects of an account team\r</p><p>Manage workflow for yourself and all staff assigned to your team project team\r</p><p>Consistently demonstrate ability to successfully move into problem-solving mode whenever challenges or concerns arise\r</p><p>Work well with and demonstrate respect for colleagues at all levels and consistently contribute to a positive work environment for the entire staff\r</p><p>Take responsibility for one internal area of management (i.e., new hire orientation, tech support, new business, office moral, etc.)\r</p><p>Assist in hiring new staff that ultimately prove to be excellent, long-term hires\r</p><p>Take the lead on implementing at least one internal program/procedure per quarter that improves office moral and/or contributes to staff retention\r</p><p>External Relationships\r</p><p>Identify new business opportunities, participate in new business pitches and assist in drafting new business proposals\r</p><p>Expand and/or renew existing accounts\r</p><p>Maintain an extensive network of nonprofit and foundation connections that can be tapped for new business outreach, issue expertise, etc.\r</p><p>Develop and conduct trainings, including regular Spitfire trainings such as the Smart Chart as well as niche areas of expertise, such as collaterals or policy maker relations\r</p><p>Successfully run multiple accounts simultaneously, including managing work plans, client expectations, and internal staffing to ensure project is consistent with time and scope in the contract\r</p><p>Show impeccable client service as demonstrated by at least one positive, unsolicited remark from a client per month as well as positive reviews from clients when firm management makes periodic check-in calls\r</p><p>Develop relationships with vendors or contractors that represent a variety of fields (media, policy, design, Web, etc.) and can be used on projects as needed\r</p><p>Develop relationships with other firms that are like-minded and suitable for/open to partnering with Spitfire on projects when appropriate\r</p><p>Communication and Process\r</p><p>Assume all responsibilities for effectively leading an account team, including ensuring all administrative pieces are in place (work plan, contract, budget, projections, etc.), clients report high satisfaction, all staff clearly understand accounts and assignments, and the entire team is working in a cooperative fashion to promote great work as well as a positive internal team environment\r</p><p>Write strategic communication plans and campaign strategies that demonstrate Spitfireâ€™s creative approach, offer unique strategies tailored to the needs of the client and provide enough detail that they can be implemented by client in the event Spitfire is not contracted for implementation\r</p><p>Lead proposal process for new business opportunities by adhering to Spitfireâ€™s policies for new business approach and development\r</p><p>Take a lead role in creating a new piece of Spitfire intellectual property or new Spitfire training at least once per year\r</p><p>Demonstrate outstanding writing skills\r</p><p>Consistently meet internal and external deadlines\r</p><p>Financial and Administrative\r</p><p>Submit expense reimbursement forms as appropriate\r</p><p>Submit accurate time sheets\r</p><p>Regularly update projections and manage work to meet or exceed projected revenue targets\r</p><p>Manage project budgets to maintain high client satisfaction while meeting or coming in below budget\r</p><p>Find ways to save company money by improving/streamlining internal systems or procedures</p>'),
(46, 41, 'Towing Services', 'Operations Manager', '1998-02-01', 100000, 'Service', 2, '2008-01-28', 'on', '<p>Perform Human Resources Management\r</p><p>\r</p><p>Plan staffing levels.\r</p><p>Work with Human Resources staff to recruit, interview, select, hire, and employ an appropriate number of employees.\r</p><p>Provide oversight and direction to the employees in the operating unit in accordance with the organization''s policies and procedures.\r</p><p>Coach, mentor and develop staff, including overseeing new employee onboarding and providing career development planning and opportunities.\r</p><p>Empower employees to take responsibility for their jobs and goals. Delegate responsibility and expect accountability and regular feedback.\r</p><p>Foster a spirit of teamwork and unity among department members that allows for disagreement over ideas, conflict and expeditious conflict resolution, and the appreciation of diversity as well as cohesiveness, supportiveness, and working effectively together to enable each employee and the department to succeed.\r</p><p>Consciously create a workplace culture that is consistent with the overall organization''s and that emphasizes the identified mission, vision, guiding principles, and values of the organization.\r</p><p>Lead employees using a performance management and development process that provides an overall context and framework to encourage employee contribution and includes goal setting, feedback, and performance development planning.\r</p><p>Lead employees to meet the organization''s expectations for productivity, quality, and goal accomplishment.\r</p><p>Provide effective performance feedback through employee recognition, rewards, and disciplinary action, with the assistance of Human Resources, when necessary.\r</p><p>Maintain employee work schedules including assignments, job rotation, training, vacations and paid time off, telecommuting, cover for absenteeism, and overtime scheduling.\r</p><p>Maintain transparent communication. Appropriately communicate organization information through department meetings, one-on-one meetings, and appropriate email, IM, and regular interpersonal communication.\r</p><p>Perform Department Management\r</p><p>\r</p><p>Manage the overall operational, budgetary, and financial responsibilities and activities of the department.\r</p><p>Plan and implement systems that perform the work and fulfill the mission and the goals of the department efficiently and effectively.\r</p><p>Plan and allocate resources to effectively staff and accomplish the work to meet departmental productivity and quality goals.\r</p><p>Plan, evaluate, and improve the efficiency of business processes and procedures to enhance speed, quality, efficiency, and output.\r</p><p>Make business decisions that are financially responsible, accountable, justifiable, and defensible in accordance with organization policies and procedures.\r</p><p>Establish and maintain relevant controls and feedback systems to monitor the operation of the department.\r</p><p>Review performance data that includes financial, sales, and activity reports and spreadsheets, to monitor and measure departmental productivity, goal achievement, and overall effectiveness.\r</p><p>Manage the preparation and maintenance of reports necessary to carry out the functions of the department. Prepares periodic reports for management, as necessary or requested, to track strategic goal accomplishment.\r</p><p>Communicate regularly with other managers, the director, vice president, president, and other designated contacts within the organization.\r</p><p>Perform other duties and responsibilities, as assigned.\r</p><p>Want More Information About Job Descriptions?</p>'),
(47, 41, 'Tow Inc.', 'Tow Truck', '1992-03-22', 40000, 'Service', 5, '1997-11-29', 'off', '<p>Towing Cars</p>'),
(53, 1, 'Google', 'Senior Developer', '2016-11-08', 40000, 'IT', 5, '2017-01-12', 'off', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n<p></p><div></div>\n                                                                          <script>\n                                                                            $(document).ready(function() {\n                                                                               $(''#summernote'').summernote({\n                                                                                      toolbar: [\n                                                                                        // [groupName, [list of button]]\n                                                                                        [''style'', [''bold'', ''italic'', ''underline'', ''clear'']],                       \n                                                                                        [''fontsize'', [''fontsize'']],\n                                                                                        [''color'', [''color'']],\n                                                                                        [''para'', [''ul'', ''ol'', ''paragraph'']],\n                                                                                        [''height'', [''height'']]\n                                                                                      ],\n                                                                                      callbacks: {\n                                                                                      onPaste: function (e) {\n                                                                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData(''Text'');\n\n                                                                                          e.preventDefault();\n\n                                                                                          // Firefox fix\n                                                                                          setTimeout(function () {\n                                                                                              document.execCommand(''insertText'', false, bufferText);\n                                                                                          }, 10);\n                                                                                      }\n                                                                                    }  \n                                                                                    });\n                                                                            });\n                                                                            </script>\n\n                                                                '),
(54, 29, 'Chicago Fire', 'Fireman', '2000-04-01', 8000, '', 7, '2001-12-01', 'off', '<p>Put out fire</p>'),
(55, 1, 'test', 'position', '2017-05-11', 25000, 'industry', 2, '2017-05-19', 'off', '<p>test</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionalinformation`
--
ALTER TABLE `additionalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminaccounts`
--
ALTER TABLE `adminaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
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
-- Indexes for table `jobapplications`
--
ALTER TABLE `jobapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobessays`
--
ALTER TABLE `jobessays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobinvitations`
--
ALTER TABLE `jobinvitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobskillstemplate`
--
ALTER TABLE `jobskillstemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtemplates`
--
ALTER TABLE `jobtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savedapplications`
--
ALTER TABLE `savedapplications`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `adminaccounts`
--
ALTER TABLE `adminaccounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `educationandtraining`
--
ALTER TABLE `educationandtraining`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `jobads`
--
ALTER TABLE `jobads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `jobapplications`
--
ALTER TABLE `jobapplications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `jobessays`
--
ALTER TABLE `jobessays`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jobinvitations`
--
ALTER TABLE `jobinvitations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobskills`
--
ALTER TABLE `jobskills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `jobskillstemplate`
--
ALTER TABLE `jobskillstemplate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `jobtemplates`
--
ALTER TABLE `jobtemplates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `savedapplications`
--
ALTER TABLE `savedapplications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `skilltags`
--
ALTER TABLE `skilltags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `workexperience`
--
ALTER TABLE `workexperience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
