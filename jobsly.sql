-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 01:27 PM
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
(91, 28, 'Data analyst', 'Globe', 'Data Science', 6, 'full', 25000, 40000, '2017-01-18', '2016-12-31', 1, '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What is it?', '2016-12-28'),
(92, 28, 'Admin Assistant', 'Ayala Properties Management Corporation', 'Management', 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(93, 28, 'Technical Support Representative', '24/7', 'BPO', 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2016-12-28'),
(94, 28, 'Technical Support Representative', 'Telus', 'BPO', 1, 'full', 20000, 30000, '2017-03-15', '2017-01-15', 10, '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2016-12-28'),
(95, 28, 'Relationship Manager', 'East West', 'Finance', 6, 'full', 30000, 50000, '2017-01-03', '2016-12-31', 1, '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(96, 28, 'Accounting Staff', 'SGV', 'Management', 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(97, 28, 'Social Media Manager', 'Summit Media', 'Social Media', 1, 'full', 15000, 25000, '2017-01-28', '2016-12-14', 2, '<p><b>Social Media Manager Job Description\n</b></p><p>\n</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\n</p><p>\n</p><p>Deliberate planning and goal setting\n</p><p>Development of brand awareness and online reputation\n</p><p>Content management\n</p><p>SEO (search engine optimization) and generation of inbound traffic\n</p><p>Cultivation of leads and sales\n</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\n</p><p>\n</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\n</p><p>\n</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\n</p><p>\n</p><p>Content management duties include:\n</p><p>\n</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\n</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\n</p><p>Create a regular publishing schedule.\n</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\n</p><p>Promote content through social advertising.\n</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\n</p><p>\n</p><p>Digital Marketing Manager\n</p><p>Content Marketing Manager\n</p><p>Customer Experience Manager\n</p><p>Community Manager\n</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or</p>', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you', '2016-12-28'),
(98, 28, 'Data Miner', 'SAP Philippines Inc', 'Data Science', 7, 'full', 25000, 40000, '2017-02-28', '2017-01-15', 1, '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'BS Information technology', 'English, Filipino', '', 'on', 'on', 'What', '2016-12-28'),
(99, 28, 'Data Entry Specialists', 'Athena', 'BPO', 7, 'full', 12000, 23000, '2017-04-12', '2017-02-22', 12, '<p>Data Entry Operator I Job Responsibilities:\n</p><p>\n</p><p>Maintains database by entering data.\n</p><p></p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'Any 4-year course', 'English', '', 'off', 'off', 'Why should we hire you?', '2016-12-28'),
(100, 28, 'Senior Web Developer', 'Cloud sherpa', 'Information Technology', 5, 'full', 50000, 80000, '2016-11-29', '2016-12-29', 5, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'What are your greatest professional strengths?', '2016-12-28'),
(101, 28, 'Technical Support Specialists', 'Convergys', 'BPO', 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(102, 28, 'Web Developer', 'ASTI', 'Information Technology', 6, 'full', 30000, 450000, '2016-11-29', '2016-12-29', 1, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 2, '', 'BS Computer Science', 'English', '', 'on', 'off', 'Why should we hire you?', '2016-12-28');
INSERT INTO `jobads` (`id`, `userid`, `jobtitle`, `company`, `specialization`, `plevel`, `jobtype`, `msalary`, `maxsalary`, `startappdate`, `endappdate`, `nvacancies`, `jobdesc`, `city`, `province`, `country`, `yrsexp`, `mineduc`, `prefcourse`, `languages`, `licenses`, `wtravel`, `wrelocate`, `essay`, `dateadded`) VALUES
(103, 28, 'PHP Developer', 'Rappler', 'Information Technology', 6, 'full', 40000, 50000, '2016-11-29', '2016-12-29', 2, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'off', 'on', 'What are your greatest professional strengths?', '2016-12-28'),
(104, 28, 'Big data Engineer', 'ETL Corp', 'Information Technology', 5, 'full', 50000, 80000, '2017-01-27', '2016-12-29', 1, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'on', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(105, 28, 'Social Media Staff', 'Summit Media', 'Social Media', 7, 'full', 10000, 18000, '2017-01-28', '2016-12-14', 5, '<p><b>Social Media Manager Job Description\n</b></p><p>\n</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\n</p><p>\n</p><p>Deliberate planning and goal setting\n</p><p>Development of brand awareness and online reputation\n</p><p>Content management\n</p><p>SEO (search engine optimization) and generation of inbound traffic\n</p><p>Cultivation of leads and sales\n</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\n</p><p>\n</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\n</p><p>\n</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\n</p><p>\n</p><p>Content management duties include:\n</p><p>\n</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\n</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\n</p><p>Create a regular publishing schedule.\n</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\n</p><p>Promote content through social advertising.\n</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\n</p><p>\n</p><p>Digital Marketing Manager\n</p><p>Content Marketing Manager\n</p><p>Customer Experience Manager\n</p><p>Community Manager\n</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or</p>', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(106, 28, 'Accounting Clerk', 'Metrobank', 'Finance', 6, 'full', 30000, 50000, '2017-01-25', '2016-12-31', 3, '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(107, 28, 'Office Manager', 'jobsly', 'Management', 6, 'full', 20000, 30000, '2017-03-15', '2017-02-15', 1, '<p>Maintains office services by organizing office operations and procedures; preparing payroll; controlling correspondence; designing filing systems; reviewing and approving supply requisitions; assigning and monitoring clerical functions.\n</p><p>Provides historical reference by defining procedures for retention, protection, retrieval, transfer, and disposal of records.\n</p><p>Maintains office efficiency by planning and implementing office systems, layouts, and equipment procurement.\n</p><p>Designs and implements office policies by establishing standards and procedures; measuring results against standards; making necessary adjustments.\n</p><p>Completes operational requirements by scheduling and assigning employees; following up on work results.\n</p><p>Keeps management informed by reviewing and analyzing special reports; summarizing information; identifying trends.\n</p><p>Maintains office staff by recruiting, selecting, orienting, and training employees.\n</p><p>Maintains office staff job results by coaching, counseling, and disciplining employees; planning, monitoring, and appraising job results.\n</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\n</p><p>Achieves financial objectives by preparing an annual budget; scheduling expenditures; analyzing variances; initiating corrective actions.\n</p><p>Contributes to team effort by accomplishing related results as needed.\n</p><p>Office Manager Skills and Qualifications:\n</p><p>\n</p><p>Supply Management, Informing Others, Tracking Budget Expenses, Delegation, Staffing, Managing Processes, Supervision, Developing Standards, Promoting Process Improvement, Inventory Control, Reporting Skills</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'Why should we hire you?', '2016-12-28'),
(108, 28, 'Account Manager', 'Metrobank', 'Finance', 6, 'full', 40000, 50000, '2017-01-21', '2016-12-31', 1, '<p>We are looking for a passionate Account manager who will partner with our customers and ensure their long-term success. The Account manager role is to manage a portfolio of assigned customers, develop new business from existing clients and actively seek new opportunities.\n</p><p>\n</p><p>Account management responsibilities include developing strong relationships with customers, connecting with key business executives and stakeholders and preparing sales reports. Accounts managers will liaise between customers and cross-functional internal teams, ensure the timely and successful delivery of our solutions according to customer needs and improve the entire customer experience. Our ideal candidate is able to identify customer needs and exceed client expectations.\n</p><p>\n</p><p>Ultimately, a successful Account manager should collaborate with our sales team to achieve sales quotas and grow our business.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Operate as the lead point of contact for any and all matters specific to your customers\n</p><p>Build and maintain strong, long-lasting customer relationships\n</p><p>Negotiate contracts and close agreements to maximize profit\n</p><p>Develop a trusted advisor relationship with key accounts, customer stakeholders and executive sponsors\n</p><p>Ensure the timely and successful delivery of our solutions according to customer needs and objectives\n</p><p>Communicate clearly the progress of monthly/quarterly initiatives to internal and external stakeholders\n</p><p>Develop new business with existing clients and/or identify areas of improvement to exceed sales quotas\n</p><p>Forecast and track key account metrics (e.g. quarterly sales results and annual forecasts)\n</p><p>Prepare reports on account status\n</p><p>Identify and grow opportunities within territory and collaborate with sales teams to ensure growth attainment\n</p><p>Assist with high severity requests or issue escalations as needed\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven work experience as an Account manager, Key account manager or other relevant experience\n</p><p>Demonstrable ability to communicate, present and influence credibly and effectively at all levels of the organization, including executive and C-level\n</p><p>Solid experience with CRM software and MS Office (particularly MS Excel)\n</p><p>Experience in delivering client-focused solutions based on customer needs\n</p><p>Proven ability to manage multiple projects at a time while paying strict attention to detail\n</p><p>Excellent listening, negotiation and presentation skills\n</p><p>Excellent verbal and written communications skills\n</p><p>BA/BS degree in Business Administration, Sales or relevant field</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(109, 28, 'Recruitment Specialist', 'HR Network', 'Human Resource', 1, 'full', 30000, 450000, '2017-01-20', '2016-12-31', 1, '<p><b>JOB DESCRIPTION\n</b></p><p>\n</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\n</p><p>\n</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\n</p><p>\n</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\n</p><p>\n</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\n</p><p>\n</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\n</p><p>\n</p><p><b>SALARY </b></p>', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What are your greatest professional strengths?', '2016-12-28'),
(110, 28, 'Data Scientist', 'jobsly', 'Data Science', 6, 'full', 35000, 45000, '2017-01-31', '2016-12-31', 1, '<p><b>Job brief\n</b></p><p>\n</p><p>We are looking for a passionate certified Data Analyst. The successful candidate will turn data into information, information into insight and insight into business decisions.\n</p><p>\n</p><p><b>Data Analyst Job Duties\n</b></p><p>\n</p><p>Data analyst responsibilities include conducting full lifecycle analysis to include requirements, activities and design. Data analysts will develop analysis and reporting capabilities. They will also monitor performance and quality control plans to identify improvements.\n</p><p>\n</p><p><b>Responsibilities\n</b></p><p>\n</p><p>Interpret data, analyze results using statistical techniques and provide ongoing reports\n</p><p>Develop and implement databases, data collection systems, data analytics and other strategies that optimize statistical efficiency and quality\n</p><p>Acquire data from primary or secondary data sources and maintain databases/data systems\n</p><p>Identify, analyze, and interpret trends or patterns in complex data sets\n</p><p>Filter and â€œcleanâ€ data by reviewing computer reports, printouts, and performance indicators to locate and correct code problems\n</p><p>Work with management to prioritize business and information needs\n</p><p>Locate and define new process improvement opportunities\n</p><p><b>Requirements\n</b></p><p>\n</p><p>Proven working experience as a data analyst or business data analyst\n</p><p>Technical expertise regarding data models, database design development, data mining and segmentation techniques\n</p><p>Strong knowledge of and experience with reporting packages (Business Objects etc), databases (SQL etc), programming (XML, Javascript, or ETL frameworks)\n</p><p>Knowledge of statistics and experience using statistical packages for analyzing datasets (Excel, SPSS, SAS etc)\n</p><p>Strong analytical skills with the ability to collect, organize, analyze, and disseminate significant amounts of information with attention to detail and accuracy\n</p><p>Adept at queries, report writing and presenting findings\n</p><p>BS in Mathematics, Economics, Computer Science, Information Management or Statistics</p>', 'Paranaque', 'Metro Manila', 'Philippines', 3, 'College', 'BS Statistics', 'English, Filipino', '', 'on', 'on', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(111, 28, 'Java Developer', 'CHAMP Cargosystems Inc.', 'Information Technology', 6, 'full', 50000, 80000, '2017-01-26', '2016-12-29', 5, '<h2 style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: 20px; font-family: AdelleBasic-Bold, serif; vertical-align: baseline; clear: none; -webkit-margin-before: 0px; -webkit-margin-after: 0px; color: rgb(0, 0, 0);">As technology continues to become a prominent feature in many people''s lives, the need for computer software engineers continues to grow. According to the Bureau of Labor Statistics, computer software engineers make around $87,000 to $95,000 a year, making becoming one a lucrative career choice. However, to command such a lucrative salary, you must have the required education and technical skills to back it up.\n</h2><div>\n</div><div>Education and Training\n</div><div>Technical knowledge is often more important than formal training when it comes to being a computer software engineer. While most positions require at least a bachelor''s degree, you may be able to get your foot in the door of a company with an associate''s degree if you can also demonstrate experience working with specific software development applications and knowing how to program in multiple languages, such as Java, C, Lisp and Ada. Once employed as a software engineer, you must stay up to date with changes in programming languages and applications, which may require taking additional courses or getting an advanced degree.\n</div><div>\n</div><div>Certification\n</div><div>While most employers do not require software engineers to be certified, getting certified may improve your chances of getting a job or advancing in your current company. Software engineers may seek certification through the Institute of Electrical and Electronics Engineers as a Certified Software Development Associate or Professional. The IEEE is also developing an exam to license computer software engineers. Called the Principles and Practices Exam of Software Engineering, it will be introduced in April 2013. Engineers also may seek certification through American Society for Quality as a Software Quality Engineer.</div><div><br></div>', 'Makati', 'Manila', 'Philippines', 5, '', 'BS Computer Science', 'English', '', 'on', 'off', 'Why should we hire you?', '2016-12-28'),
(112, 28, 'Customer Service Representative', 'HSBC', 'BPO', 6, 'full', 18000, 28000, '2017-02-10', '2017-01-15', 5, '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\n</p><p>\n</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\n</p><p>\n</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\n</p><p>\n</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \n</p><p>\n</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\n</p><p>\n</p><p>Some tasks you may be involved in include:\n</p><p>\n</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\n</p><p>â€¢ Logging and keeping records of customer/employee queries\n</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\n</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\n</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\n</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\n</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \n</p><p>\n</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\n</p><p><b>Required skills\n</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\n</p><p>\n</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\n</p><p>â€¢ Ability to deal with difficult callers\n</p><p>â€¢ Logical thinker\n</p><p>â€¢ Good analytical and problem solving skills\n</p><p>â€¢ Up-to-date technical knowledge\n</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\n</p><p>â€¢ Good interpersonal and customer care skills\n</p><p>â€¢ Good accurate records keeping\n</p><p><b>Entry requirements\n</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\n</p><p>\n</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City </p>', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What are your greatest professional strengths?', '2016-12-28'),
(113, 28, 'Project Manager', 'Accenture', 'Management', 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(114, 28, 'Scrum Master', 'CHAMP Cargosystems Inc.', 'Management', 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(115, 28, 'Project Manager', 'ASTI', 'Management', 5, 'full', 50000, 65000, '2017-02-08', '2016-12-28', 1, '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(116, 28, 'Scrum Master', 'Maersk Sealand', 'Management', 6, 'full', 60000, 80000, '2017-01-06', '2016-12-12', 1, '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28'),
(117, 28, 'Senior Scrum Master', 'CHAMP Cargosystems Inc.', 'Management', 5, 'full', 80000, 100000, '2017-02-15', '2016-12-31', 1, '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28');

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
(9, 28, 'What''s a time you disagreed with a decision that was made at work?');

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
(193, 28, 117, 'Cape Verde', '#CapeVerde', '2016-12-28');

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
(42, 28, 81, 'Cape Verde', '#CapeVerde', '2016-12-28');

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
(74, 28, 'Recruitment Manager', 'Jobsly', 'Human Resource', 1, 'full', 40000, 60000, '2017-01-07', '2016-12-29', 1, '<p><b>JOB DESCRIPTION\r</b></p><p>\r</p><p>Recruitment can be a tricky and complex process, especially when various vacancies need to be filled at once. Resourcers and recruitment consultants are responsible for the hands-on search and selection activities, but someone else needs to be there to oversee everything, manage the recruitment team and work closely with clients to understand and satisfy their recruitment needs. Enter recruitment managers.\r</p><p>\r</p><p>Some large organisations employ recruitment managers in-house alongside the human resources department. These guys manage every stage of recruitment and candidate selection for their organisation, attracting talent, vetting candidates and advising the business on the best recruitment practices and processes.\r</p><p>\r</p><p>Some recruitment managers might even focus their efforts solely on graduate recruitment.\r</p><p>\r</p><p>Other recruitment managers work for independent recruitment agencies, building relationships with clients, developing recruitment solutions and managing a dedicated team of recruitment consultants.\r</p><p>\r</p><p>On a day-to-day basis, you might be responsible for direct team management, business development, drafting job specifications, creating job adverts, analysing CVs, training junior recruitment consultants and offering advice to business professionals on recruitment policies.\r</p><p>\r</p><p><b>SALARY ', 'Makati', 'Manila', 'Philippines', 5, 'College', 'BS Human Resources', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(75, 28, 'Admin Assistant', 'Ayala Properties Management Corporation', 'Management', 7, 'full', 20000, 30000, '2017-01-05', '2016-12-31', 2, '<p><b>Entry-Level Administrative Assistant</b> â€” Performs a variety of Internet research functions and uses word processing, spreadsheet and presentation software. Duties also include fielding telephone calls, filing and data entry. May assist with overflow work from administrative and executive assistants and fill in for the office receptionist as needed.</p>', 'Pasig', 'Metro Manila', 'Philippines', 1, 'College', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What is it?', '2016-12-28'),
(76, 28, 'Technical Support Representative', '24/7', 'BPO', 1, 'full', 18000, 28000, '2017-03-15', '2017-01-15', 10, '<p>As a technical support/helpdesk employee, youâ€™ll be monitoring and maintaining the computer systems and networks within an organisation in a technical support role. If there are any issues or changes required, such as forgotten passwords, viruses or email issues, youâ€™ll be the first person employees will come to.\r</p><p>\r</p><p>Tasks can include installing and configuring computer systems, diagnosing hardware/software faults and solving technical problems, either over the phone or face to face.\r</p><p>\r</p><p>Most importantly, as businesses cannot afford to be without the whole system, or individual workstations, for more than the minimum time taken to repair or replace them, your technical support is vital to the ongoing operational efficiency of the company.\r</p><p>\r</p><p>As technical support, you may also be known as a helpdesk operator, technician or maintenance engineer. \r</p><p>\r</p><p>You could work for software or equipment suppliers providing after-sales support or companies that specialise in providing IT maintenance and support. Alternatively you may work in house, supporting the rest of the business with their ongoing IT requirements.\r</p><p>\r</p><p>Some tasks you may be involved in include:\r</p><p>\r</p><p>â€¢ Working with customers/employees to identify computer problems and advising on the solution\r</p><p>â€¢ Logging and keeping records of customer/employee queries\r</p><p>â€¢ Analysing call logs so you can spot common trends and underlying problems\r</p><p>â€¢ Updating self-help documents so customers/employees can try to fix problems themselves\r</p><p>â€¢ Working with field engineers to visit customers/employees if the problem is more serious\r</p><p>â€¢ Testing and fixing faulty equipment</p><p><br></p><p><b>Opportunities\r</b></p><p>In many companies, you may find thereâ€™s a natural career progression within technical support. As an example, this would see you being promoted to a more senior technical support role and from there to a team, section or department leader. \r</p><p>\r</p><p>Alternatively, a role in technical support is a good stepping stone if you wish to move towards various other areas in IT, such as programming, IT training, technical sales or systems administration.\r</p><p><b>Required skills\r</b></p><p>As well as a strong technical background, many employers would want you to be able to explain complex information in simple, clear terms to a non-IT personnel. Additionally, they will be looking for:\r</p><p>\r</p><p>â€¢ An ability to assess each customer/employee''s IT knowledge levels\r</p><p>â€¢ Ability to deal with difficult callers\r</p><p>â€¢ Logical thinker\r</p><p>â€¢ Good analytical and problem solving skills\r</p><p>â€¢ Up-to-date technical knowledge\r</p><p>â€¢ An in depth understanding of the software and equipment your customers/employees are using\r</p><p>â€¢ Good interpersonal and customer care skills\r</p><p>â€¢ Good accurate records keeping\r</p><p><b>Entry requirements\r</b></p><p>You can start training to work in a technical support role straight from school if you have good GCSE grades in English, Maths and IT or Science.\r</p><p>\r</p><p>An additional computing course would also help you stand out among employers. Popular courses include: BTEC (Edexcel) National Certificate and Diploma IT Practitioners, City ', 'Makati', 'Manila', 'Philippines', 1, 'College', 'Information technology', 'English', '', 'off', 'off', 'What is it?', '2016-12-28'),
(77, 28, 'Social Media Manager', 'Summit Media', 'Social Media', 1, 'full', 15000, 25000, '2017-01-28', '2016-12-14', 2, '<p><b>Social Media Manager Job Description\r</b></p><p>\r</p><p>The Social Media Manager will administer the companyâ€™s social media marketing and advertising. Administration includes but is not limited to:\r</p><p>\r</p><p>Deliberate planning and goal setting\r</p><p>Development of brand awareness and online reputation\r</p><p>Content management\r</p><p>SEO (search engine optimization) and generation of inbound traffic\r</p><p>Cultivation of leads and sales\r</p><p>The Social Media Manager is a highly motivated, creative individual with experience and a passion for connecting with current and future customers. That passion comes through as he/she engages with customers on a daily basis, with the ultimate goal of turning fans into customers.\r</p><p>\r</p><p>Community leadership and participation (both online and offline) are integral to a Social Media Managerâ€™s success. An essential component is communicating the companyâ€™s brand in a positive, authentic way what will attract todayâ€™s modern, hyper-connected buyers.\r</p><p>\r</p><p>The Social Media Manager is instrumental in managing the companyâ€™s content-related assets. Googleâ€™s #1 search ranking factor is relevant content (content that serves the searchers needs the best). Itâ€™s clear then that managing content should be part of the Social Media Managerâ€™s Job Description.\r</p><p>\r</p><p>Content management duties include:\r</p><p>\r</p><p>Administrate the creation and publishing of relevant, original, high-quality content.\r</p><p>Identify and improve organizational development aspects that would improve content (ie: employee training, recognition and rewards for participation in the companyâ€™s marketing and online review building).\r</p><p>Create a regular publishing schedule.\r</p><p>Implement a content editorial calendar to manage content and plan specific, timely marketing campaigns.\r</p><p>Promote content through social advertising.\r</p><p>This position is full time salaried with benefits. Specific titles and/or duties for this position may also include:\r</p><p>\r</p><p>Digital Marketing Manager\r</p><p>Content Marketing Manager\r</p><p>Customer Experience Manager\r</p><p>Community Manager\r</p><p>The Social Media Manager should always be learning, as itâ€™s a crucial component to their success. Social and digital marketing â€œBest Practicesâ€ shift constantly, so a budget should be allocated for training and/or', 'Pasig', 'Metro Manila', 'Philippines', 2, 'College', 'BS Psychology', 'English', '', 'on', 'off', 'Tell me about a challenge or conflict you', '2016-12-28'),
(78, 28, 'Data Entry Specialists', 'Athena', 'BPO', 7, 'full', 12000, 23000, '2017-04-12', '2017-02-22', 12, '<p>Data Entry Operator I Job Responsibilities:\r</p><p>\r</p><p>Maintains database by entering data.\r</p><p>', 'Paranaque', 'Metro Manila', 'Philippines', 1, 'College', 'Any 4-year course', 'English', '', 'off', 'off', 'Why should we hire you?', '2016-12-28'),
(79, 28, 'Office Manager', 'jobsly', 'Management', 6, 'full', 20000, 30000, '2017-03-15', '2017-02-15', 1, '<p>Maintains office services by organizing office operations and procedures; preparing payroll; controlling correspondence; designing filing systems; reviewing and approving supply requisitions; assigning and monitoring clerical functions.\r</p><p>Provides historical reference by defining procedures for retention, protection, retrieval, transfer, and disposal of records.\r</p><p>Maintains office efficiency by planning and implementing office systems, layouts, and equipment procurement.\r</p><p>Designs and implements office policies by establishing standards and procedures; measuring results against standards; making necessary adjustments.\r</p><p>Completes operational requirements by scheduling and assigning employees; following up on work results.\r</p><p>Keeps management informed by reviewing and analyzing special reports; summarizing information; identifying trends.\r</p><p>Maintains office staff by recruiting, selecting, orienting, and training employees.\r</p><p>Maintains office staff job results by coaching, counseling, and disciplining employees; planning, monitoring, and appraising job results.\r</p><p>Maintains professional and technical knowledge by attending educational workshops; reviewing professional publications; establishing personal networks; participating in professional societies.\r</p><p>Achieves financial objectives by preparing an annual budget; scheduling expenditures; analyzing variances; initiating corrective actions.\r</p><p>Contributes to team effort by accomplishing related results as needed.\r</p><p>Office Manager Skills and Qualifications:\r</p><p>\r</p><p>Supply Management, Informing Others, Tracking Budget Expenses, Delegation, Staffing, Managing Processes, Supervision, Developing Standards, Promoting Process Improvement, Inventory Control, Reporting Skills</p>', 'Paranaque', 'Metro Manila', 'Philippines', 2, 'college', 'Business', 'English, Filipino', '', 'on', 'off', 'Why should we hire you?', '2016-12-28'),
(80, 28, 'Project Manager', 'Accenture', 'Management', 5, 'full', 40000, 60000, '2017-02-14', '2016-12-28', 2, '<p>Project managers ensure that a project is completed on time and within budget, that the project''s objectives are met and that everyone else is doing their job properly. Projects are usually separate to usual day-to-day business activities and require a group of people to work together to achieve a set of specific objectives. Project managers oversee the project to ensure the desired result is achieved, the most efficient resources are used and the different interests involved are satisfied.\n</p><p>\n</p><p>Typical responsibilities include:\n</p><p>agreeing project objectives\n</p><p>representing the client''s or organisation''s interests\n</p><p>providing advice on the management of projects\n</p><p>organising the various professional people working on a project\n</p><p>carrying out risk assessment\n</p><p>making sure that all the aims of the project are met\n</p><p>making sure the quality standards are met\n</p><p>using IT systems to keep track of people and progress\n</p><p>recruiting specialists and sub-contractors\n</p><p>monitoring sub-contractors to ensure guidelines are maintained\n</p><p>overseeing the accounting, costing and billing\n</p><p>Depending on the project, responsibilities can cover all aspects of a project from the beginning stages through to completion. Project managers typically lead by example, so expect to be working at least the same hours as your staff. Wages for this role can be lucrative.\n</p><p>\n</p><p><b>Typical employers of project managers\n</b></p><p>\n</p><p>Construction companies\n</p><p>Architects\n</p><p>Software producers\n</p><p>Commercial retailers\n</p><p>Engineering firms\n</p><p>Manufacturers\n</p><p>Public sector organisations\n</p><p>Qualifications and training required\n</p><p>\n</p><p>You often need a significant body of experience in the appropriate field, although some graduate schemes start you off in an ''assistant PM'' role. You may also be required to be part of a professional or chartered body. Some professional bodies such as the Association of Project Management offer industry recognised qualifications â€“ these are not essential but would be advantageous. It is also likely that you will need a full, clean driving licence.\n</p><p>\n</p><p>As mentioned, some employers run graduate schemes and internship programmes in project management. While some specify degree subjects, others don''t. Entry requirements depend on which industry you want to work in. You can find such opportunities online at TARGETjobs, The Association for Project Management and through university careers services.\n</p><p>\n</p><p><b>Key skills for project managers\n</b></p><p>\n</p><p>Organisational skills\n</p><p>Analytical skills\n</p><p>Well developed interpersonal skills\n</p><p>Numeracy skills\n</p><p>Commercial awareness\n</p><p>Communication skills\n</p><p>Teamworking skills\n</p><p>Diplomacy\n</p><p>Ability to motivate people\n</p><p>Management and leadership skills</p>', 'Makati', 'Metro Manila', 'Philippines', 5, '', 'BS Management', 'English, Filipino', '', 'on', 'off', 'What''s a time you disagreed with a decision that was made at work?', '2016-12-28'),
(81, 28, 'Scrum Master', 'Maersk Sealand', 'Management', 6, 'full', 60000, 80000, '2017-01-06', '2016-12-12', 1, '<p><b>Top 10 Personal Skills for a ScrumMaster:\n</b></p><p>\n</p><p>Servant Leader â€“ Must be able to garner respect from his/her team and be willing to get their hands dirty to get the job done\n</p><p>Communicative and social â€“ Must be able to communicate well with teams\n</p><p>Facilitative â€“ Must be able to lead and demonstrate value-add principles to a team\n</p><p>Assertive â€“ Must be able to ensure Agile/Scrum concepts and principles are adhered to, must be able to be a voice of reason and authority, make the tough calls.\n</p><p>Situationally Aware â€“ Must be the first to notice differences and issues as they arise and elevate them to management\n</p><p>Enthusiastic â€“ Must be high-energy\n</p><p>Continual improvement â€“ Must continually be growing ones craft learning new tools and techniques to manage oneself and a team\n</p><p>Conflict resolution â€“ Must be able to facilitate discussion and facilitate alternatives or different approaches\n</p><p>Attitude of empowerment â€“ Must be able to lead a team to self-organization\n</p><p>Attitude of transparency â€“ Must desire to bring disclosure and transparency to the business about development and grow business trust\n</p><p><b>Technical Skills:\n</b></p><p>\n</p><p>Understand basic fundamentals of iterative development\n</p><p>Understand other processes and methodologies and can speak intelligently about them and leverage other techniques to provide value to a team/enterprise\n</p><p>Understand basic fundamentals of software development processes and procedures\n</p><p>Understand the value of commitments to delivery made by a development team\n</p><p>Understand incremental delivery and the value of metrics\n</p><p>Understand backlog tracking, burndown metrics, velocity, and task definition\n</p><p>Familiarity with common Agile practices, service-oriented environments, and better development practices</p>', 'Makati', 'Metro Manila', 'Philippines', 4, 'College', 'BS Computer Science', 'English, Filipino', '', 'off', 'off', 'Tell me about a challenge or conflict you''ve faced at work, and how you dealt with it.', '2016-12-28');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `jobessays`
--
ALTER TABLE `jobessays`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jobskills`
--
ALTER TABLE `jobskills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `jobskillstemplate`
--
ALTER TABLE `jobskillstemplate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `jobtemplates`
--
ALTER TABLE `jobtemplates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
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
