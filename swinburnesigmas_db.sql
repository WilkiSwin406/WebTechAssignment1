-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2025 at 04:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swinburnesigmas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOINumber` int(5) NOT NULL,
  `JRN` varchar(6) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Gender` set('MALE','FEMALE','NON-BINARY','OTHER','PREFER NOT TO SAY') NOT NULL,
  `DOB` date NOT NULL,
  `StreetAddress` varchar(40) NOT NULL,
  `Suburb` varchar(40) NOT NULL,
  `State` set('VIC','ACT','TAS','QLD','NT','SA','WA','NSW') NOT NULL,
  `Postcode` int(4) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Skills` varchar(100) NOT NULL,
  `OtherSkills` text NOT NULL,
  `Status` set('NEW','CURRENT','FINAL') NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `JRN` varchar(6) NOT NULL,
  `Description` text NOT NULL,
  `Salary_range` varchar(30) NOT NULL,
  `Position` varchar(200) NOT NULL,
  `Requirements` varchar(400) NOT NULL,
  `Preferences` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `JRN`, `Description`, `Salary_range`, `Position`, `Requirements`, `Preferences`) VALUES
(8, 'CLE01', 'As one of our cloud engineers, you will be responsible for designing, implementing and maintaining our cloud-based infrastructure and services. You must ensure that our cloud systems are scalable, secure and reliable at all times. Your position will primarily consist of maintenance work as a level one employee.', '$100,000 - $105,000', 'Cloud Engineer, Level 1', '2+ years of experience in cloud platforms (AWS, Azure, or GCP)\nStrong understanding of networking, security, and cloud architecture\nProficient in scripting languages (e.g., Python, Bash)', 'Experience with containerization (Docker, Kubernetes)\nKnowledge of cost optimization strategies in the cloud\nFamiliarity with Infrastructure as Code (IaC) tools such as Terraform'),
(9, 'DBE01', 'As a database analyst, you will be responsible for creating efficient database systems, optimizing queries, and implementing backup and recovery strategies for our databases. Your position will also include handling scaling and integration tasks, as well as database migration if necessary. As a level one employee, you will primarily focus on maintenance.', '$105,000 - $115,000', 'Database Engineer, Level 1', '2+ years of experience in data analysis or related field\nProficiency in data visualization tools (e.g., Power BI, Tableau, Looker)\nUnderstanding of statistical analysis and data interpretation', 'Proficiency in Python or R for data analysis\nExperience with big data tools (e.g., Spark, Hadoop)'),
(10, 'DTA02', 'As a data analyst, you will be responsible for collecting, processing and analysing data in order to assist management to make informed decisions. You will identify trends, patterns and insights through data visualisation and statistical techniques. As a level two employee, you will also be expected to prepare reports for stakeholders and management, as well as participate in meetings in order to share your findings.', '$110,000 - $135,000', 'Data Analyst, Level 2', '4+ years of experience in database development and administration\nProficiency in SQL and database design principles\nExperience with at least one RDBMS (e.g., PostgreSQL, MySQL, SQL Server)', 'Experience with NoSQL databases (e.g., MongoDB, Cassandra)\nCertification in database technologies'),
(11, 'UXD01', 'As one of our UX designers, you will be responsible for the user experience, including tasks such as upkeep of our website and apps user interface and designing prototypes or wireframes. You must ensure that your work is functional, readable and aesthetically pleasing. As a level one employee, you will primarily undertake smaller UI design tasks directly under your supervisor.', '$90,000 - $105,000', 'UX Designer, Level 1', '2+ years of experience in UX design\nStrong portfolio demonstrating UX processes and final designs\nKnowledge of responsive and accessible design principles', 'Experience working in Agile or cross-functional teams\nFamiliarity with HTML/CSS and design handoff to developers');

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOINumber`, `JRN`, `FirstName`, `LastName`, `Gender`, `DOB`, `StreetAddress`, `Suburb`, `State`, `Postcode`, `Email`, `Phone`, `Skills`, `OtherSkills`, `Status`) VALUES
(7, 'DTA02', 'Connor', 'Wright', 'MALE', '2004-01-21', '26 Riviera St', 'Mentone', 'VIC', 3194, 'connorawright999@gmail.com', 416963332, ' Digital Networking Knowledge, Virtualisation, Automation Tools, UI & UX Understanding', '3-time hotdog eating champion', 'NEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOINumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOINumber` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
