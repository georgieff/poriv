-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2012 at 02:47 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `telerik`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `COUNTRY_ID` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `COUNTRY_NAME` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REGION_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`COUNTRY_ID`),
  KEY `COUNTR_REG_FK` (`REGION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`COUNTRY_ID`, `COUNTRY_NAME`, `REGION_ID`) VALUES
('AR', 'Argentina', 2),
('AU', 'Australia', 3),
('BE', 'Belgium', 1),
('BR', 'Brazil', 2),
('CA', 'Canada', 2),
('CH', 'Switzerland', 1),
('CN', 'China', 3),
('DE', 'Germany', 1),
('DK', 'Denmark', 1),
('EG', 'Egypt', 4),
('FR', 'France', 1),
('HK', 'HongKong', 3),
('IL', 'Israel', 4),
('IN', 'India', 3),
('IT', 'Italy', 1),
('JP', 'Japan', 3),
('KW', 'Kuwait', 4),
('MX', 'Mexico', 2),
('NG', 'Nigeria', 4),
('NL', 'Netherlands', 1),
('SG', 'Singapore', 3),
('UK', 'United Kingdom', 1),
('US', 'United States of America', 2),
('ZM', 'Zambia', 4),
('ZW', 'Zimbabwe', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MANAGER_ID` int(11) DEFAULT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`DEPARTMENT_ID`),
  KEY `DEPT_LOC_FK` (`LOCATION_ID`),
  KEY `DEPT_MGR_FK` (`MANAGER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=271 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DEPARTMENT_ID`, `DEPARTMENT_NAME`, `MANAGER_ID`, `LOCATION_ID`) VALUES
(10, 'Administration', 200, 1700),
(20, 'Marketing', 201, 1800),
(30, 'Purchasing', 114, 1700),
(40, 'Human Resources', 203, 2400),
(50, 'Shipping', 121, 1500),
(60, 'IT', 103, 1400),
(70, 'Public Relations', 204, 2700),
(80, 'Sales', 145, 2500),
(90, 'Executive', 100, 1700),
(100, 'Finance', 108, 1700),
(110, 'Accounting', 205, 1700),
(120, 'Treasury', NULL, 1700),
(130, 'Corporate Tax', NULL, 1700),
(140, 'Control And Credit', NULL, 1700),
(150, 'Shareholder Services', NULL, 1700),
(160, 'Benefits', NULL, 1700),
(170, 'Manufacturing', NULL, 1700),
(180, 'Construction', NULL, 1700),
(190, 'Contracting', NULL, 1700),
(200, 'Operations', NULL, 1700),
(210, 'IT Support', NULL, 1700),
(220, 'NOC', NULL, 1700),
(230, 'IT Helpdesk', NULL, 1700),
(240, 'Government Sales', NULL, 1700),
(250, 'Retail Sales', NULL, 1700),
(260, 'Recruiting', NULL, 1700),
(270, 'Payroll', NULL, 1700);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LAST_NAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE_NUMBER` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HIRE_DATE` datetime DEFAULT NULL,
  `JOB_ID` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SALARY` decimal(8,2) DEFAULT NULL,
  `COMMISSION_PCT` decimal(2,2) DEFAULT NULL,
  `MANAGER_ID` int(11) DEFAULT NULL,
  `DEPARTMENT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`),
  KEY `EMP_DEPT_FK` (`DEPARTMENT_ID`),
  KEY `EMP_JOB_FK` (`JOB_ID`),
  KEY `EMP_MANAGER_FK` (`MANAGER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=207 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE_NUMBER`, `HIRE_DATE`, `JOB_ID`, `SALARY`, `COMMISSION_PCT`, `MANAGER_ID`, `DEPARTMENT_ID`) VALUES
(100, 'Steven', 'King', 'SKING', '515.123.4567', '1987-06-17 00:00:00', 'AD_PRES', '24000.00', NULL, NULL, 90),
(101, 'Neena', 'Kochhar', 'NKOCHHAR', '515.123.4568', '1989-09-21 00:00:00', 'AD_VP', '17000.00', NULL, 100, 90),
(102, 'Lex', 'De Haan', 'LDEHAAN', '515.123.4569', '1993-01-13 00:00:00', 'AD_VP', '17000.00', NULL, 100, 90),
(103, 'Alexander', 'Hunold', 'AHUNOLD', '590.423.4567', '1990-01-03 00:00:00', 'IT_PROG', '9000.00', NULL, 102, 60),
(104, 'Bruce', 'Ernst', 'BERNST', '590.423.4568', '1991-05-21 00:00:00', 'IT_PROG', '6000.00', NULL, 103, 60),
(105, 'David', 'Austin', 'DAUSTIN', '590.423.4569', '1997-06-25 00:00:00', 'IT_PROG', '4800.00', NULL, 103, 60),
(106, 'Valli', 'Pataballa', 'VPATABAL', '590.423.4560', '1998-02-05 00:00:00', 'IT_PROG', '4800.00', NULL, 103, 60),
(107, 'Diana', 'Lorentz', 'DLORENTZ', '590.423.5567', '1999-02-07 00:00:00', 'IT_PROG', '4200.00', NULL, 103, 60),
(108, 'Nancy', 'Greenberg', 'NGREENBE', '515.124.4569', '1994-08-17 00:00:00', 'FI_MGR', '12000.00', NULL, 101, 100),
(109, 'Daniel', 'Faviet', 'DFAVIET', '515.124.4169', '1994-08-16 00:00:00', 'FI_ACCOUNT', '9000.00', NULL, 108, 100),
(110, 'John', 'Chen', 'JCHEN', '515.124.4269', '1997-09-28 00:00:00', 'FI_ACCOUNT', '8200.00', NULL, 108, 100),
(111, 'Ismael', 'Sciarra', 'ISCIARRA', '515.124.4369', '1997-09-30 00:00:00', 'FI_ACCOUNT', '7700.00', NULL, 108, 100),
(112, 'Jose Manuel', 'Urman', 'JMURMAN', '515.124.4469', '1998-03-07 00:00:00', 'FI_ACCOUNT', '7800.00', NULL, 108, 100),
(113, 'Luis', 'Popp', 'LPOPP', '515.124.4567', '1999-12-07 00:00:00', 'FI_ACCOUNT', '6900.00', NULL, 108, 100),
(114, 'Den', 'Raphaely', 'DRAPHEAL', '515.127.4561', '1994-12-07 00:00:00', 'PU_MAN', '11000.00', NULL, 100, 30),
(115, 'Alexander', 'Khoo', 'AKHOO', '515.127.4562', '1995-05-18 00:00:00', 'PU_CLERK', '3100.00', NULL, 114, 30),
(116, 'Shelli', 'Baida', 'SBAIDA', '515.127.4563', '1997-12-24 00:00:00', 'PU_CLERK', '2900.00', NULL, 114, 30),
(117, 'Sigal', 'Tobias', 'STOBIAS', '515.127.4564', '1997-07-24 00:00:00', 'PU_CLERK', '2800.00', NULL, 114, 30),
(118, 'Guy', 'Himuro', 'GHIMURO', '515.127.4565', '1998-11-15 00:00:00', 'PU_CLERK', '2600.00', NULL, 114, 30),
(119, 'Karen', 'Colmenares', 'KCOLMENA', '515.127.4566', '1999-08-10 00:00:00', 'PU_CLERK', '2500.00', NULL, 114, 30),
(120, 'Matthew', 'Weiss', 'MWEISS', '650.123.1234', '1996-07-18 00:00:00', 'ST_MAN', '8000.00', NULL, 100, 50),
(121, 'Adam', 'Fripp', 'AFRIPP', '650.123.2234', '1997-04-10 00:00:00', 'ST_MAN', '8200.00', NULL, 100, 50),
(122, 'Payam', 'Kaufling', 'PKAUFLIN', '650.123.3234', '1995-05-01 00:00:00', 'ST_MAN', '7900.00', NULL, 100, 50),
(123, 'Shanta', 'Vollman', 'SVOLLMAN', '650.123.4234', '1997-10-10 00:00:00', 'ST_MAN', '6500.00', NULL, 100, 50),
(124, 'Kevin', 'Mourgos', 'KMOURGOS', '650.123.5234', '1999-11-16 00:00:00', 'ST_MAN', '5800.00', NULL, 100, 50),
(125, 'Julia', 'Nayer', 'JNAYER', '650.124.1214', '1997-07-16 00:00:00', 'ST_CLERK', '3200.00', NULL, 120, 50),
(126, 'Irene', 'Mikkilineni', 'IMIKKILI', '650.124.1224', '1998-09-28 00:00:00', 'ST_CLERK', '2700.00', NULL, 120, 50),
(127, 'James', 'Landry', 'JLANDRY', '650.124.1334', '1999-01-14 00:00:00', 'ST_CLERK', '2400.00', NULL, 120, 50),
(128, 'Steven', 'Markle', 'SMARKLE', '650.124.1434', '2000-03-08 00:00:00', 'ST_CLERK', '2200.00', NULL, 120, 50),
(129, 'Laura', 'Bissot', 'LBISSOT', '650.124.5234', '1997-08-20 00:00:00', 'ST_CLERK', '3300.00', NULL, 121, 50),
(130, 'Mozhe', 'Atkinson', 'MATKINSO', '650.124.6234', '1997-10-30 00:00:00', 'ST_CLERK', '2800.00', NULL, 121, 50),
(131, 'James', 'Marlow', 'JAMRLOW', '650.124.7234', '1997-02-16 00:00:00', 'ST_CLERK', '2500.00', NULL, 121, 50),
(132, 'TJ', 'Olson', 'TJOLSON', '650.124.8234', '1999-04-10 00:00:00', 'ST_CLERK', '2100.00', NULL, 121, 50),
(133, 'Jason', 'Mallin', 'JMALLIN', '650.127.1934', '1996-06-14 00:00:00', 'ST_CLERK', '3300.00', NULL, 122, 50),
(134, 'Michael', 'Rogers', 'MROGERS', '650.127.1834', '1998-08-26 00:00:00', 'ST_CLERK', '2900.00', NULL, 122, 50),
(135, 'Ki', 'Gee', 'KGEE', '650.127.1734', '1999-12-12 00:00:00', 'ST_CLERK', '2400.00', NULL, 122, 50),
(136, 'Hazel', 'Philtanker', 'HPHILTAN', '650.127.1634', '2000-02-06 00:00:00', 'ST_CLERK', '2200.00', NULL, 122, 50),
(137, 'Renske', 'Ladwig', 'RLADWIG', '650.121.1234', '1995-07-14 00:00:00', 'ST_CLERK', '3600.00', NULL, 123, 50),
(138, 'Stephen', 'Stiles', 'SSTILES', '650.121.2034', '1997-10-26 00:00:00', 'ST_CLERK', '3200.00', NULL, 123, 50),
(139, 'John', 'Seo', 'JSEO', '650.121.2019', '1998-02-12 00:00:00', 'ST_CLERK', '2700.00', NULL, 123, 50),
(140, 'Joshua', 'Patel', 'JPATEL', '650.121.1834', '1998-04-06 00:00:00', 'ST_CLERK', '2500.00', NULL, 123, 50),
(141, 'Trenna', 'Rajs', 'TRAJS', '650.121.8009', '1995-10-17 00:00:00', 'ST_CLERK', '3500.00', NULL, 124, 50),
(142, 'Curtis', 'Davies', 'CDAVIES', '650.121.2994', '1997-01-29 00:00:00', 'ST_CLERK', '3100.00', NULL, 124, 50),
(143, 'Randall', 'Matos', 'RMATOS', '650.121.2874', '1998-03-15 00:00:00', 'ST_CLERK', '2600.00', NULL, 124, 50),
(144, 'Peter', 'Vargas', 'PVARGAS', '650.121.2004', '1998-07-09 00:00:00', 'ST_CLERK', '2500.00', NULL, 124, 50),
(145, 'John', 'Russell', 'JRUSSEL', '011.44.1344.429268', '1996-10-01 00:00:00', 'SA_MAN', '14000.00', '0.40', 100, 80),
(146, 'Karen', 'Partners', 'KPARTNER', '011.44.1344.467268', '1997-01-05 00:00:00', 'SA_MAN', '13500.00', '0.30', 100, 80),
(147, 'Alberto', 'Errazuriz', 'AERRAZUR', '011.44.1344.429278', '1997-03-10 00:00:00', 'SA_MAN', '12000.00', '0.30', 100, 80),
(148, 'Gerald', 'Cambrault', 'GCAMBRAU', '011.44.1344.619268', '1999-10-15 00:00:00', 'SA_MAN', '11000.00', '0.30', 100, 80),
(149, 'Eleni', 'Zlotkey', 'EZLOTKEY', '011.44.1344.429018', '2000-01-29 00:00:00', 'SA_MAN', '10500.00', '0.20', 100, 80),
(150, 'Peter', 'Tucker', 'PTUCKER', '011.44.1344.129268', '1997-01-30 00:00:00', 'SA_REP', '10000.00', '0.30', 145, 80),
(151, 'David', 'Bernstein', 'DBERNSTE', '011.44.1344.345268', '1997-03-24 00:00:00', 'SA_REP', '9500.00', '0.25', 145, 80),
(152, 'Peter', 'Hall', 'PHALL', '011.44.1344.478968', '1997-08-20 00:00:00', 'SA_REP', '9000.00', '0.25', 145, 80),
(153, 'Christopher', 'Olsen', 'COLSEN', '011.44.1344.498718', '1998-03-30 00:00:00', 'SA_REP', '8000.00', '0.20', 145, 80),
(154, 'Nanette', 'Cambrault', 'NCAMBRAU', '011.44.1344.987668', '1998-12-09 00:00:00', 'SA_REP', '7500.00', '0.20', 145, 80),
(155, 'Oliver', 'Tuvault', 'OTUVAULT', '011.44.1344.486508', '1999-11-23 00:00:00', 'SA_REP', '7000.00', '0.15', 145, 80),
(156, 'Janette', 'King', 'JKING', '011.44.1345.429268', '1996-01-30 00:00:00', 'SA_REP', '10000.00', '0.35', 146, 80),
(157, 'Patrick', 'Sully', 'PSULLY', '011.44.1345.929268', '1996-03-04 00:00:00', 'SA_REP', '9500.00', '0.35', 146, 80),
(158, 'Allan', 'McEwen', 'AMCEWEN', '011.44.1345.829268', '1996-08-01 00:00:00', 'SA_REP', '9000.00', '0.35', 146, 80),
(159, 'Lindsey', 'Smith', 'LSMITH', '011.44.1345.729268', '1997-03-10 00:00:00', 'SA_REP', '8000.00', '0.30', 146, 80),
(160, 'Louise', 'Doran', 'LDORAN', '011.44.1345.629268', '1997-12-15 00:00:00', 'SA_REP', '7500.00', '0.30', 146, 80),
(161, 'Sarath', 'Sewall', 'SSEWALL', '011.44.1345.529268', '1998-11-03 00:00:00', 'SA_REP', '7000.00', '0.25', 146, 80),
(162, 'Clara', 'Vishney', 'CVISHNEY', '011.44.1346.129268', '1997-11-11 00:00:00', 'SA_REP', '10500.00', '0.25', 147, 80),
(163, 'Danielle', 'Greene', 'DGREENE', '011.44.1346.229268', '1999-03-19 00:00:00', 'SA_REP', '9500.00', '0.15', 147, 80),
(164, 'Mattea', 'Marvins', 'MMARVINS', '011.44.1346.329268', '2000-01-24 00:00:00', 'SA_REP', '7200.00', '0.10', 147, 80),
(165, 'David', 'Lee', 'DLEE', '011.44.1346.529268', '2000-02-23 00:00:00', 'SA_REP', '6800.00', '0.10', 147, 80),
(166, 'Sundar', 'Ande', 'SANDE', '011.44.1346.629268', '2000-03-24 00:00:00', 'SA_REP', '6400.00', '0.10', 147, 80),
(167, 'Amit', 'Banda', 'ABANDA', '011.44.1346.729268', '2000-04-21 00:00:00', 'SA_REP', '6200.00', '0.10', 147, 80),
(168, 'Lisa', 'Ozer', 'LOZER', '011.44.1343.929268', '1997-03-11 00:00:00', 'SA_REP', '11500.00', '0.25', 148, 80),
(169, 'Harrison', 'Bloom', 'HBLOOM', '011.44.1343.829268', '1998-03-23 00:00:00', 'SA_REP', '10000.00', '0.20', 148, 80),
(170, 'Tayler', 'Fox', 'TFOX', '011.44.1343.729268', '1998-01-24 00:00:00', 'SA_REP', '9600.00', '0.20', 148, 80),
(171, 'William', 'Smith', 'WSMITH', '011.44.1343.629268', '1999-02-23 00:00:00', 'SA_REP', '7400.00', '0.15', 148, 80),
(172, 'Elizabeth', 'Bates', 'EBATES', '011.44.1343.529268', '1999-03-24 00:00:00', 'SA_REP', '7300.00', '0.15', 148, 80),
(173, 'Sundita', 'Kumar', 'SKUMAR', '011.44.1343.329268', '2000-04-21 00:00:00', 'SA_REP', '6100.00', '0.10', 148, 80),
(174, 'Ellen', 'Abel', 'EABEL', '011.44.1644.429267', '1996-05-11 00:00:00', 'SA_REP', '11000.00', '0.30', 149, 80),
(175, 'Alyssa', 'Hutton', 'AHUTTON', '011.44.1644.429266', '1997-03-19 00:00:00', 'SA_REP', '8800.00', '0.25', 149, 80),
(176, 'Jonathon', 'Taylor', 'JTAYLOR', '011.44.1644.429265', '1998-03-24 00:00:00', 'SA_REP', '8600.00', '0.20', 149, 80),
(177, 'Jack', 'Livingston', 'JLIVINGS', '011.44.1644.429264', '1998-04-23 00:00:00', 'SA_REP', '8400.00', '0.20', 149, 80),
(178, 'Kimberely', 'Grant', 'KGRANT', '011.44.1644.429263', '1999-05-24 00:00:00', 'SA_REP', '7000.00', '0.15', 149, NULL),
(179, 'Charles', 'Johnson', 'CJOHNSON', '011.44.1644.429262', '2000-01-04 00:00:00', 'SA_REP', '6200.00', '0.10', 149, 80),
(180, 'Winston', 'Taylor', 'WTAYLOR', '650.507.9876', '1998-01-24 00:00:00', 'SH_CLERK', '3200.00', NULL, 120, 50),
(181, 'Jean', 'Fleaur', 'JFLEAUR', '650.507.9877', '1998-02-23 00:00:00', 'SH_CLERK', '3100.00', NULL, 120, 50),
(182, 'Martha', 'Sullivan', 'MSULLIVA', '650.507.9878', '1999-06-21 00:00:00', 'SH_CLERK', '2500.00', NULL, 120, 50),
(183, 'Girard', 'Geoni', 'GGEONI', '650.507.9879', '2000-02-03 00:00:00', 'SH_CLERK', '2800.00', NULL, 120, 50),
(184, 'Nandita', 'Sarchand', 'NSARCHAN', '650.509.1876', '1996-01-27 00:00:00', 'SH_CLERK', '4200.00', NULL, 121, 50),
(185, 'Alexis', 'Bull', 'ABULL', '650.509.2876', '1997-02-20 00:00:00', 'SH_CLERK', '4100.00', NULL, 121, 50),
(186, 'Julia', 'Dellinger', 'JDELLING', '650.509.3876', '1998-06-24 00:00:00', 'SH_CLERK', '3400.00', NULL, 121, 50),
(187, 'Anthony', 'Cabrio', 'ACABRIO', '650.509.4876', '1999-02-07 00:00:00', 'SH_CLERK', '3000.00', NULL, 121, 50),
(188, 'Kelly', 'Chung', 'KCHUNG', '650.505.1876', '1997-06-14 00:00:00', 'SH_CLERK', '3800.00', NULL, 122, 50),
(189, 'Jennifer', 'Dilly', 'JDILLY', '650.505.2876', '1997-08-13 00:00:00', 'SH_CLERK', '3600.00', NULL, 122, 50),
(190, 'Timothy', 'Gates', 'TGATES', '650.505.3876', '1998-07-11 00:00:00', 'SH_CLERK', '2900.00', NULL, 122, 50),
(191, 'Randall', 'Perkins', 'RPERKINS', '650.505.4876', '1999-12-19 00:00:00', 'SH_CLERK', '2500.00', NULL, 122, 50),
(192, 'Sarah', 'Bell', 'SBELL', '650.501.1876', '1996-02-04 00:00:00', 'SH_CLERK', '4000.00', NULL, 123, 50),
(193, 'Britney', 'Everett', 'BEVERETT', '650.501.2876', '1997-03-03 00:00:00', 'SH_CLERK', '3900.00', NULL, 123, 50),
(194, 'Samuel', 'McCain', 'SMCCAIN', '650.501.3876', '1998-07-01 00:00:00', 'SH_CLERK', '3200.00', NULL, 123, 50),
(195, 'Vance', 'Jones', 'VJONES', '650.501.4876', '1999-03-17 00:00:00', 'SH_CLERK', '2800.00', NULL, 123, 50),
(196, 'Alana', 'Walsh', 'AWALSH', '650.507.9811', '1998-04-24 00:00:00', 'SH_CLERK', '3100.00', NULL, 124, 50),
(197, 'Kevin', 'Feeney', 'KFEENEY', '650.507.9822', '1998-05-23 00:00:00', 'SH_CLERK', '3000.00', NULL, 124, 50),
(198, 'Donald', 'OConnell', 'DOCONNEL', '650.507.9833', '1999-06-21 00:00:00', 'SH_CLERK', '2600.00', NULL, 124, 50),
(199, 'Douglas', 'Grant', 'DGRANT', '650.507.9844', '2000-01-13 00:00:00', 'SH_CLERK', '2600.00', NULL, 124, 50),
(200, 'Jennifer', 'Whalen', 'JWHALEN', '515.123.4444', '1987-09-17 00:00:00', 'AD_ASST', '4400.00', NULL, 101, 10),
(201, 'Michael', 'Hartstein', 'MHARTSTE', '515.123.5555', '1996-02-17 00:00:00', 'MK_MAN', '13000.00', NULL, 100, 20),
(202, 'Pat', 'Fay', 'PFAY', '603.123.6666', '1997-08-17 00:00:00', 'MK_REP', '6000.00', NULL, 201, 20),
(203, 'Susan', 'Mavris', 'SMAVRIS', '515.123.7777', '1994-06-07 00:00:00', 'HR_REP', '6500.00', NULL, 101, 40),
(204, 'Hermann', 'Baer', 'HBAER', '515.123.8888', '1994-06-07 00:00:00', 'PR_REP', '10000.00', NULL, 101, 70),
(205, 'Shelley', 'Higgins', 'SHIGGINS', '515.123.8080', '1994-06-07 00:00:00', 'AC_MGR', '12000.00', NULL, 101, 110),
(206, 'William', 'Gietz', 'WGIETZ', '515.123.8181', '1994-06-07 00:00:00', 'AC_ACCOUNT', '8300.00', NULL, 205, 110);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `JOB_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `JOB_TITLE` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIN_SALARY` decimal(8,2) DEFAULT NULL,
  `MAX_SALARY` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`JOB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JOB_ID`, `JOB_TITLE`, `MIN_SALARY`, `MAX_SALARY`) VALUES
('AC_ACCOUNT', 'Public Accountant', '4200.00', '9000.00'),
('AC_MGR', 'Accounting Manager', '8200.00', '16000.00'),
('AD_ASST', 'Administration Assistant', '3000.00', '6000.00'),
('AD_PRES', 'President', '20000.00', '40000.00'),
('AD_VP', 'Administration Vice President', '15000.00', '30000.00'),
('FI_ACCOUNT', 'Accountant', '4200.00', '9000.00'),
('FI_MGR', 'Finance Manager', '8200.00', '16000.00'),
('HR_REP', 'Human Resources Representative', '4000.00', '9000.00'),
('IT_PROG', 'Programmer', '4000.00', '10000.00'),
('MK_MAN', 'Marketing Manager', '9000.00', '15000.00'),
('MK_REP', 'Marketing Representative', '4000.00', '9000.00'),
('PR_REP', 'Public Relations Representative', '4500.00', '10500.00'),
('PU_CLERK', 'Purchasing Clerk', '2500.00', '5500.00'),
('PU_MAN', 'Purchasing Manager', '8000.00', '15000.00'),
('SA_MAN', 'Sales Manager', '10000.00', '20000.00'),
('SA_REP', 'Sales Representative', '6000.00', '12000.00'),
('SH_CLERK', 'Shipping Clerk', '2500.00', '5500.00'),
('ST_CLERK', 'Stock Clerk', '2000.00', '5000.00'),
('ST_MAN', 'Stock Manager', '5500.00', '8500.00');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE IF NOT EXISTS `job_history` (
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `START_DATE` datetime DEFAULT NULL,
  `END_DATE` datetime DEFAULT NULL,
  `JOB_ID` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEPARTMENT_ID` int(11) DEFAULT NULL,
  KEY `JHIST_DEPT_FK` (`DEPARTMENT_ID`),
  KEY `JHIST_EMP_FK` (`EMPLOYEE_ID`),
  KEY `JHIST_JOB_FK` (`JOB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`EMPLOYEE_ID`, `START_DATE`, `END_DATE`, `JOB_ID`, `DEPARTMENT_ID`) VALUES
(102, '1993-01-13 00:00:00', '1998-07-24 00:00:00', 'IT_PROG', 60),
(101, '1989-09-21 00:00:00', '1993-10-27 00:00:00', 'AC_ACCOUNT', 110),
(101, '1993-10-28 00:00:00', '1997-03-15 00:00:00', 'AC_MGR', 110),
(201, '1996-02-17 00:00:00', '1999-12-19 00:00:00', 'MK_REP', 20),
(114, '1998-03-24 00:00:00', '1999-12-31 00:00:00', 'ST_CLERK', 50),
(122, '1999-01-01 00:00:00', '1999-12-31 00:00:00', 'ST_CLERK', 50),
(200, '1987-09-17 00:00:00', '1993-06-17 00:00:00', 'AD_ASST', 90),
(176, '1998-03-24 00:00:00', '1998-12-31 00:00:00', 'SA_REP', 80),
(176, '1999-01-01 00:00:00', '1999-12-31 00:00:00', 'SA_MAN', 80),
(200, '1994-07-01 00:00:00', '1998-12-31 00:00:00', 'AC_ACCOUNT', 90);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STREET_ADDRESS` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POSTAL_CODE` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CITY` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATE_PROVINCE` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COUNTRY_ID` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`LOCATION_ID`),
  KEY `LOC_C_ID_FK` (`COUNTRY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3201 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`LOCATION_ID`, `STREET_ADDRESS`, `POSTAL_CODE`, `CITY`, `STATE_PROVINCE`, `COUNTRY_ID`) VALUES
(1000, '1297 Via Cola di Rie', '00989', 'Roma', NULL, 'IT'),
(1100, '93091 Calle della Testa', '10934', 'Venice', NULL, 'IT'),
(1200, '2017 Shinjuku-ku', '1689', 'Tokyo', 'Tokyo Prefecture', 'JP'),
(1300, '9450 Kamiya-cho', '6823', 'Hiroshima', NULL, 'JP'),
(1400, '2014 Jabberwocky Rd', '26192', 'Southlake', 'Texas', 'US'),
(1500, '2011 Interiors Blvd', '99236', 'South San Francisco', 'California', 'US'),
(1600, '2007 Zagora St', '50090', 'South Brunswick', 'New Jersey', 'US'),
(1700, '2004 Charade Rd', '98199', 'Seattle', 'Washington', 'US'),
(1800, '147 Spadina Ave', 'M5V 2L7', 'Toronto', 'Ontario', 'CA'),
(1900, '6092 Boxwood St', 'YSW 9T2', 'Whitehorse', 'Yukon', 'CA'),
(2000, '40-5-12 Laogianggen', '190518', 'Beijing', NULL, 'CN'),
(2100, '1298 Vileparle (E)', '490231', 'Bombay', 'Maharashtra', 'IN'),
(2200, '12-98 Victoria Street', '2901', 'Sydney', 'New South Wales', 'AU'),
(2300, '198 Clementi North', '540198', 'Singapore', NULL, 'SG'),
(2400, '8204 Arthur St', NULL, 'London', NULL, 'UK'),
(2500, 'Magdalen Centre, The Oxford Science Park', 'OX9 9ZB', 'Oxford', 'Oxford', 'UK'),
(2600, '9702 Chester Road', '09629850293', 'Stretford', 'Manchester', 'UK'),
(2700, 'Schwanthalerstr. 7031', '80925', 'Munich', 'Bavaria', 'DE'),
(2800, 'Rua Frei Caneca 1360 ', '01307-002', 'Sao Paulo', 'Sao Paulo', 'BR'),
(2900, '20 Rue des Corps-Saints', '1730', 'Geneva', 'Geneve', 'CH'),
(3000, 'Murtenstrasse 921', '3095', 'Bern', 'BE', 'CH'),
(3100, 'Pieter Breughelstraat 837', '3029SK', 'Utrecht', 'Utrecht', 'NL'),
(3200, 'Mariano Escobedo 9991', '11932', 'Mexico City', 'Distrito Federal,', 'MX');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `REGION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REGION_NAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`REGION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`REGION_ID`, `REGION_NAME`) VALUES
(1, 'Europe'),
(2, 'Americas'),
(3, 'Asia'),
(4, 'Middle East and Africa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `COUNTR_REG_FK` FOREIGN KEY (`REGION_ID`) REFERENCES `regions` (`REGION_ID`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `DEPT_LOC_FK` FOREIGN KEY (`LOCATION_ID`) REFERENCES `locations` (`LOCATION_ID`),
  ADD CONSTRAINT `DEPT_MGR_FK` FOREIGN KEY (`MANAGER_ID`) REFERENCES `employees` (`EMPLOYEE_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `EMP_DEPT_FK` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `departments` (`DEPARTMENT_ID`),
  ADD CONSTRAINT `EMP_JOB_FK` FOREIGN KEY (`JOB_ID`) REFERENCES `jobs` (`JOB_ID`),
  ADD CONSTRAINT `EMP_MANAGER_FK` FOREIGN KEY (`MANAGER_ID`) REFERENCES `employees` (`EMPLOYEE_ID`);

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `JHIST_DEPT_FK` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `departments` (`DEPARTMENT_ID`),
  ADD CONSTRAINT `JHIST_EMP_FK` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`EMPLOYEE_ID`),
  ADD CONSTRAINT `JHIST_JOB_FK` FOREIGN KEY (`JOB_ID`) REFERENCES `jobs` (`JOB_ID`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `LOC_C_ID_FK` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `countries` (`COUNTRY_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
