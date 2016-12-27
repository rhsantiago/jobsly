-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 06:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
  `company` varchar(50) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `plevel` int(10) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `msalary` int(10) NOT NULL,
  `maxsalary` int(10) NOT NULL,
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
  `licenses` varchar(50) DEFAULT NULL,
  `wtravel` varchar(5) DEFAULT NULL,
  `wrelocate` varchar(5) DEFAULT NULL,
  `essay` varchar(100) DEFAULT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobads`
--

INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`) VALUES
(69, 28, 'Senior Software Engineer', 'CHAMP Cargosystems Inc.', 'Information Technology', 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-26'),
(84, 28, 'Metrics Manager', 'Rappler', 'Information Technology', 2, 'full', 40000, 60000, '2017-02-01', '2016-12-29', 1, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">Data Analyst Responsibilities\n</h2><div>\n</div><div>Include:\n</div><div>\n</div><div>Interpreting data, analyzing results using statistical techniques and providing ongoing reports\n</div><div>Developing and implementing databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</div><div>Acquiring data from primary or secondary data sources and maintaining databases/data systems</div><div><br></div><div><b>Job brief\n</b></div><div>\n</div><div>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</div><div>\n</div><div>Data Analyst Job Duties\n</div><div>\n</div><div>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.</div><div><br></div><div>\n</div><div>\n</div><div><b>Responsibilities\n</b></div><div>\n</div><div>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</div><div>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</div><div>Acquire data from primary or secondary data sources and maintain databases/data systems\n</div><div>Identify, analyze, and interpret trends or patterns in complex data sets\n</div><div>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</div><div>Work with management to prioritize business and information needs\n</div><div>Locate and define new process improvement opportunities</div><div><br></div><div>\n</div><div><b>Requirements\n</b></div><div>\n</div><div>Proven working experience as a data analyst or business data analyst\n</div><div>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</div><div>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</div><div>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</div><div>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</div><div>Adept at queries, report writing and presenting findings\n</div><div>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</div>', 'Makati', 'Manila', 'Philippines', 3, 'MAsters', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-27'),
(85, 28, 'Account Manager', 'BDO', 'Finance', 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-27'),
(86, 28, 'Web Developer', 'Ecommsite', 'Information Technology', 7, 'full', 20000, 30000, '2017-03-01', '2017-02-01', 2, '<p><b>Web Developer Responsibilities</b>\n</p><p>\n</p><p>Include:\n</p><p>\n</p><p>Writing well designed, testable, efficient code by using best software development practices\n</p><p>Creating website layout/user interfaces by using standard HTML/CSS practices\n</p><p>Integrating data from various back-end services and databases\n</p><p><br></p><p><b>Job brief</b></p><p>We are looking for an outstanding Web Developer to be responsible for the coding, innovative design and layout of our website.\n</p><p>\n</p><p>Web Developer Job Duties\n</p><p>\n</p><p>Web developer responsibilities include building our website from concept all the way to completion from the bottom up, fashioning everything from the home page to site layout and function.\n</p><p>\n</p><p>Responsibilities\n</p><p>\n</p><p>Write well designed, testable, efficient code by using best software development practices\n</p><p>Create website layout/user interface by using standard HTML/CSS practices\n</p><p>Integrate data from various back-end services and databases\n</p><p>Gather and refine specifications and requirements based on technical needs\n</p><p>Create and maintain software documentation\n</p><p>Be responsibile for maintaining, expanding, and scaling our site\n</p><p>Stay plugged into emerging technologies/industry trends and apply them into operations and activities\n</p><p>Cooperate with web designers to match visual design intent\n</p><p>Requirements\n</p><p>\n</p><p>Proven working experience in web programming\n</p><p>Top-notch programming skills and in-depth knowledge of modern HTML/CSS\n</p><p>Familiarity with at least one of the following programming languages: PHP, ASP.NET, Javascript or Ruby on Rails\n</p><p>A solid understanding of how web applications work including security, session management, and best development practices\n</p><p>Adequate knowledge of relational database systems, Object Oriented Programming and web application development\n</p><p>Hands-on experience with network diagnostics, network analytics tools\n</p><p>Basic knowledge of Search Engine Optimisation process\n</p><p>Aggressive problem diagnosis and creative problem solving skills\n</p><p>Strong organisational skills to juggle multiple tasks within the constraints of  timelines and budgets with business acumen\n</p><p>Ability to work and thrive in a fast-paced environment, learn rapidly and master diverse web technologies and techniques.\n</p><p>BS in computer science or a related field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Computer Science', 'English, Filipino', '', 'off', 'off', 'Describe you greatest challenge in your career. What was the outcome and what steps did you take?', '2016-12-28'),
(87, 28, 'Software Engineer', 'Accenture', 'Information Technology', 6, 'full', 35000, 50000, '2016-11-29', '2016-12-29', 5, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-28'),
(88, 28, 'Data analyst', 'IBM', 'Data Science', 7, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28'),
(89, 28, 'Recruitment Manager', 'Jobsly', 'Human Resource', 1, 'full', 40000, 60000, '2017-01-07', '2016-12-29', 1, '<p><b>JOB DESCRIPTION\n</b></p><p>\n</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\n</p><p>\n</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\n</p><p>\n</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\n</p><p>\n</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\n</p><p>\n</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\n</p><p>\n</p><p><b>SALARY </b></p>', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(90, 28, 'Game Developer', 'Bethesda', 'Information Technology', 6, 'full', 60000, 75000, '2017-02-15', '2017-01-31', 3, '<p><b>Job Description of a Game Developer\r</b></p><p>Game developers, more specifically known as video game developers or video game designers, are software developers and engineers who create video games. Game developers may be involved in various aspects of a game''s creation from concept and story writing to the coding and programming. Other potential areas of work for a game developer include audio, design, production and visual arts.\r</p><p>\r</p><p><b>Duties of a Game Developer\r</b></p><p>Many components are involved in the development of a video game. Designers, producers and graphic artists all contribute to the final product. However, programmers and software developers turn the idea into code, which provides the game with its operating instructions. Game and software developers create the core features of a video game. Duties of a game developer may include:\r</p><p>\r</p><p>Creating story lines and character biographies\r</p><p>Conducting design reviews\r</p><p>Designing role-play mechanics\r</p><p>Creating prototypes for staff and management\r</p><p>Documenting game design process\r</p><p>Entry level and junior game programmers typically use basic tools and languages, such as C  , to add small elements to games. They are also expected to keep up with changing technology. Lead developers and programmers write more complicated code and manage other programmers.\r</p><p>\r</p><p><b>Game Developer Requirements\r</b></p><p>According to the U.S. Bureau of Labor Statistics, in most cases a bachelor''s degree is preferred for software engineer positions (www.bls.gov). Common majors include computer science, software engineering, mathematics or computer information systems. The ability to use programming language is often the primary requirement. Knowledge of various computer systems is also beneficial. In certain situations, completion of an associate''s degree or certificate program may suffice.\r</p><p>\r</p><p>Currently no major organizations offer certification in video game development. If they do, it''s rare. However, game developers can earn certification in the key programming languages such as C  , visual basic, java and MEL (Maya Scripting Language). Additionally, the Institute of Electrical and Electronics Engineers offers certification for software developers.\r</p><p>\r</p><p><b>Employment Outlook and Salary Information\r</b></p><p>From 2014-2024, the U.S. Bureau of Labor Statistics (BLS) projected 19% employment growth for applications software developers. The BLS reported an annual average salary of $102,160 for these professionals in 2015, with those working in software publishing earning $112,460, on average.\r</p><p>\r</p><p>Game developers create the concept for a video game and develop the program to ensure that it runs correctly. These games are typically used on computers or in video game systems.</p>', 'Paranaque', 'Metro Manila', 'Philippines', 3, 'college', 'BS Computer Science', 'English, Filipino', '', 'on', 'off', 'Ride toto na?', '2016-12-28'),
(91, 28, 'Data analyst', 'Globe', 'Data Science', 6, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28');

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
(5, 28, 'What is it?');

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
(87, 28, 91, 'SQL', '#SQL', '2016-12-28');

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
(18, 28, 74, 'Orange HRM', '#OrangeHRM', '2016-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `jobtemplates`
--

CREATE TABLE `jobtemplates` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `jobtitle` varchar(40) NOT NULL,
  `company` varchar(50) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `plevel` int(10) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `msalary` int(10) NOT NULL,
  `maxsalary` int(10) NOT NULL,
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
  `licenses` varchar(50) DEFAULT NULL,
  `wtravel` varchar(5) DEFAULT NULL,
  `wrelocate` varchar(5) DEFAULT NULL,
  `essay` varchar(100) NOT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtemplates`
--

INSERT INTO `jobtemplates` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`) VALUES
(70, 28, 'Senior Software Engineer', 'Rappler', 'Information Technology', 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What is it?', '2016-12-23'),
(71, 28, 'Account Manager', 'BDO', 'Finance', 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\r</p><p>\r</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\r</p><p>\r</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\r</p><p>\r</p><p><b>Responsibilities\r</b></p><p>\r</p><p>Operate as the lead point of contact for any and all matters specific to your customers\r</p><p>Build and maintain strong, long-lasting customer relationships\r</p><p>Negotiate contracts and close agreements to maximize profit\r</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\r</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\r</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\r</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\r</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\r</p><p>Prepare reports on account status\r</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\r</p><p>Assist with high severity requests or issue escalations as needed\r</p><p><b>Requirements\r</b></p><p>\r</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\r</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\r</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\r</p><p>Experience in delivering client-focused solutions based on customer needs\r</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\r</p><p>Excellent listening, negotiation and presentation skills\r</p><p>Excellent verbal and written communications skills\r</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-27'),
(72, 28, 'Web Developer', 'Ecommsite', 'Information Technology', 7, 'full', 20000, 30000, '2017-03-01', '2017-02-01', 2, '<p><b>Web Developer Responsibilities</b>\r\n</p><p>\r\n</p><p>Include:\r\n</p><p>\r\n</p><p>Writing well designed, testable, efficient code by using best software development practices\r\n</p><p>Creating website layout/user interfaces by using standard HTML/CSS practices\r\n</p><p>Integrating data from various back-end services and databases\r\n</p><p><br></p><p><b>Job brief</b>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Computer Science', 'English, Filipino', '', 'off', 'off', 'What is it?', '2016-12-27'),
(73, 28, 'Data analyst', 'IBM', 'Data Science', 7, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '<p><b>Job brief\r</b></p><p>\r</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\r</p><p>\r</p><p><b>Data Analyst Job Duties\r</b></p><p>\r</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\r</p><p>\r</p><p><b>Responsibilities\r</b></p><p>\r</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\r</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\r</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\r</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\r</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\r</p><p>Work with management to prioritize business and information needs\r</p><p>Locate and define new process improvement opportunities\r</p><p><b>Requirements\r</b></p><p>\r</p><p>Proven working experience as a data analyst or business data analyst\r</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\r</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\r</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\r</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\r</p><p>Adept at queries, report writing and presenting findings\r</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28'),
(74, 28, 'Recruitment Manager', 'Jobsly', 'Human Resource', 1, 'full', 40000, 60000, '2017-01-07', '2016-12-29', 1, '<p><b>JOB DESCRIPTION\r</b></p><p>\r</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\r</p><p>\r</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\r</p><p>\r</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\r</p><p>\r</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\r</p><p>\r</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\r</p><p>\r</p><p><b>SALARY ', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28');

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
-- Indexes for table `jobessays`
--
ALTER TABLE `jobessays`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `jobessays`
--
ALTER TABLE `jobessays`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jobskills`
--
ALTER TABLE `jobskills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `jobskillstemplate`
--
ALTER TABLE `jobskillstemplate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jobtemplates`
--
ALTER TABLE `jobtemplates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
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
