-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 11:11 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AUTHORID` varchar(10) NOT NULL,
  `ANAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AUTHORID`, `ANAME`) VALUES
('12AI3451', 'shubham'),
('12AI3452', 'arpitha'),
('12AI3453', 'sumit'),
('12AI3454', 'gulia'),
('12AI3455', 'gupta');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `DOCID` varchar(10) NOT NULL,
  `ISBN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`DOCID`, `ISBN`) VALUES
('1223331', 'ISBN 7-894-561-257'),
('1223332', 'ISBN 9-594-261-963');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `BORNUMBER` int(11) NOT NULL,
  `READERID` varchar(10) DEFAULT NULL,
  `DOCID` varchar(10) DEFAULT NULL,
  `COPYNO` int(6) DEFAULT NULL,
  `LIBID` varchar(10) DEFAULT NULL,
  `BDTIME` datetime DEFAULT NULL,
  `RDTIME` datetime DEFAULT NULL,
  `actretdate` datetime DEFAULT NULL,
  `fine` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`BORNUMBER`, `READERID`, `DOCID`, `COPYNO`, `LIBID`, `BDTIME`, `RDTIME`, `actretdate`, `fine`) VALUES
(1, '1rd11', '1223331', 112124, '78LI9451', '2017-12-13 13:37:18', '2018-01-02 13:37:18', NULL, NULL),
(2, '1rd12', '1223335', 112332, '78LI9455', '2016-12-01 00:00:00', '2016-12-21 00:00:00', '2017-12-13 00:00:00', 71.4),
(3, '1rd11', '1223331', 112124, '78LI9451', '2017-12-13 14:25:47', '2018-01-02 14:25:47', NULL, NULL),
(5, '1rd11', '1223331', 112124, '78LI9451', '2017-12-13 14:29:35', '2018-01-02 14:29:35', NULL, NULL),
(6, '1rd11', '1223331', 112124, '78LI9451', '2017-12-13 14:31:46', '2018-01-02 14:31:46', NULL, NULL);

--
-- Triggers `borrows`
--
DELIMITER $$
CREATE TRIGGER `noMoreThanTenDoc` BEFORE INSERT ON `borrows` FOR EACH ROW BEGIN
    DECLARE msg varchar(255);
    IF ((select count(*) from borrows where ACTRETDATE is NULL GROUP BY READERID) > 9) THEN
        SET msg = 'Reader cannot borrow or reserve more than 10 Documents';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT=msg;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `LIBID` varchar(10) NOT NULL,
  `LNAME` varchar(20) DEFAULT NULL,
  `LLOCATION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`LIBID`, `LNAME`, `LLOCATION`) VALUES
('78LI9451', 'State of Alabama', 'Alabama'),
('78LI9452', 'Alaska Methodist ', 'Alaska'),
('78LI9453', 'California Western', 'California'),
('78LI9454', 'Oriental Medicine', 'Austin'),
('78LI9455', 'Arkansas AM&NCollege', 'Arkansas');

-- --------------------------------------------------------

--
-- Table structure for table `chief_editor`
--

CREATE TABLE `chief_editor` (
  `EDITOR_ID` varchar(10) NOT NULL,
  `ENAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chief_editor`
--

INSERT INTO `chief_editor` (`EDITOR_ID`, `ENAME`) VALUES
('1ed11', 'Aman Gulia'),
('1ed12', 'Shreyash '),
('1ed13', 'Benjamin Wallance'),
('1ed14', 'Neeharika Palli'),
('1ed15', 'Shubham Gulia');

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `DOCID` varchar(10) NOT NULL,
  `COPYNO` int(6) NOT NULL,
  `LIBID` varchar(10) NOT NULL,
  `POSITION` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `copy`
--

INSERT INTO `copy` (`DOCID`, `COPYNO`, `LIBID`, `POSITION`) VALUES
('1223331', 112124, '78LI9451', '001a03'),
('1223335', 112332, '78LI9455', '001b03');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DOCID` varchar(10) NOT NULL,
  `TITLE` varchar(10) DEFAULT NULL,
  `PDATE` date DEFAULT NULL,
  `PUBLISHERID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`DOCID`, `TITLE`, `PDATE`, `PUBLISHERID`) VALUES
('1223331', 'database', '2000-01-10', 'Wile5'),
('1223332', 'Ihlp', '2001-03-05', 'Rand3'),
('1223333', 'Rprogram', '2005-12-09', 'Thom1'),
('1223334', 'Bigdata', '2008-10-10', 'Wolt2'),
('1223335', 'Cloud', '2007-08-05', 'Hach4'),
('1223336', 'inwork', '2017-12-01', 'wile5');

-- --------------------------------------------------------

--
-- Table structure for table `inv_editor`
--

CREATE TABLE `inv_editor` (
  `DOCID` varchar(10) NOT NULL,
  `ISSUE_NO` int(11) NOT NULL,
  `IENAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_editor`
--

INSERT INTO `inv_editor` (`DOCID`, `ISSUE_NO`, `IENAME`) VALUES
('1223333', 5, 'Shubham'),
('1223334', 5, 'Sumit');

-- --------------------------------------------------------

--
-- Table structure for table `journal_issue`
--

CREATE TABLE `journal_issue` (
  `DOCID` varchar(10) NOT NULL,
  `ISSUE_NO` int(11) NOT NULL,
  `SCOPE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `journal_issue`
--

INSERT INTO `journal_issue` (`DOCID`, `ISSUE_NO`, `SCOPE`) VALUES
('1223333', 5, 'Social issue'),
('1223334', 5, 'Social issue');

-- --------------------------------------------------------

--
-- Table structure for table `journal_volume`
--

CREATE TABLE `journal_volume` (
  `DOCID` varchar(10) NOT NULL,
  `JVOLUME` int(11) DEFAULT NULL,
  `EDITOR_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `journal_volume`
--

INSERT INTO `journal_volume` (`DOCID`, `JVOLUME`, `EDITOR_ID`) VALUES
('1223333', 1, '1ed12'),
('1223334', 5, '1ed14');

-- --------------------------------------------------------

--
-- Table structure for table `proceedings`
--

CREATE TABLE `proceedings` (
  `DOCID` varchar(10) NOT NULL,
  `CDATE` date DEFAULT NULL,
  `CLOCATION` varchar(20) DEFAULT NULL,
  `CEDITOR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proceedings`
--

INSERT INTO `proceedings` (`DOCID`, `CDATE`, `CLOCATION`, `CEDITOR`) VALUES
('1223331', '1999-02-07', 'boston', 'pankaj'),
('1223332', '2001-01-05', 'houstan', 'abdulla'),
('1223333', '2004-08-08', 'newyork', 'deb mandal'),
('1223334', '2007-12-12', 'boston', 'pankaj'),
('1223335', '2006-09-09', 'newyork', 'deb mandal');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PUBLISHERID` varchar(10) NOT NULL,
  `PUBNAME` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PUBLISHERID`, `PUBNAME`, `ADDRESS`) VALUES
('Hach4', 'Hachette Livre', 'broad street , kearny ,new jersey'),
('Rand3', 'Random House', '2nd north street , harrison ,new jersey '),
('Thom1', 'Thomson Reuters	', 'avenue street , harrison , new jersey  '),
('Wile5', 'Wiley', 'food street , jersey city ,new jersey'),
('Wolt2', 'Wolters Kluwer', '37 washington street , harrison ,new jersey ');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `READERID` varchar(10) NOT NULL,
  `RTYPE` varchar(10) DEFAULT NULL,
  `RNAME` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`READERID`, `RTYPE`, `RNAME`, `ADDRESS`) VALUES
('1rd11', 'Partial ', 'ashish ', 'craz street , harrison , new jersey  '),
('1rd12', 'Re-Readers', 'john', '35 dalton street , harrison ,new jersey '),
('1rd13', 'Loyalists', 'cena', 'jordan street , harrison ,new jersey '),
('1rd14', 'Nonfiction', 'sandeep', 'cleveland street , kearny ,new jersey'),
('1rd15', 'Fiction', 'poplu', 'warriors street , jersey city ,new jersey'),
('1rd16', 'student ', 'neal', 'crazy street , never know 123123 '),
('1ri111', 'student ', 'neal', '37 Washington Street'),
('1ri50', 'student ', 'name', '98 wahssjos');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `RESUMBER` int(11) NOT NULL,
  `READERID` varchar(10) DEFAULT NULL,
  `DOCID` varchar(10) DEFAULT NULL,
  `COPYNO` int(6) DEFAULT NULL,
  `LIBID` varchar(10) DEFAULT NULL,
  `DTIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`RESUMBER`, `READERID`, `DOCID`, `COPYNO`, `LIBID`, `DTIME`) VALUES
(105, '1ri50', '1223331', 112124, '78LI9451', '2017-12-13 19:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `pwd`) VALUES
('admin1', '12345'),
('admin2', '12345'),
('admin9', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `AUTHORID` varchar(10) NOT NULL,
  `DOCID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `writes`
--

INSERT INTO `writes` (`AUTHORID`, `DOCID`) VALUES
('12AI3451', '12AI23331'),
('12AI3452', '1223332');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AUTHORID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`DOCID`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`BORNUMBER`),
  ADD KEY `FK_D_c_LB` (`DOCID`,`COPYNO`,`LIBID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`LIBID`);

--
-- Indexes for table `chief_editor`
--
ALTER TABLE `chief_editor`
  ADD PRIMARY KEY (`EDITOR_ID`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`DOCID`,`COPYNO`,`LIBID`),
  ADD KEY `FK_LIBID` (`LIBID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DOCID`),
  ADD KEY `FK_PUBLISHERID` (`PUBLISHERID`);

--
-- Indexes for table `inv_editor`
--
ALTER TABLE `inv_editor`
  ADD PRIMARY KEY (`DOCID`,`ISSUE_NO`,`IENAME`);

--
-- Indexes for table `journal_issue`
--
ALTER TABLE `journal_issue`
  ADD PRIMARY KEY (`DOCID`,`ISSUE_NO`);

--
-- Indexes for table `journal_volume`
--
ALTER TABLE `journal_volume`
  ADD PRIMARY KEY (`DOCID`),
  ADD KEY `FK_EDITOR_ID` (`EDITOR_ID`);

--
-- Indexes for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD PRIMARY KEY (`DOCID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PUBLISHERID`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`READERID`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`RESUMBER`),
  ADD KEY `FK_D_c_L` (`DOCID`,`COPYNO`,`LIBID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`AUTHORID`,`DOCID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `BORNUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_DOCID_B` FOREIGN KEY (`DOCID`) REFERENCES `document` (`DOCID`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `FK_D_c_LB` FOREIGN KEY (`DOCID`,`COPYNO`,`LIBID`) REFERENCES `copy` (`DOCID`, `COPYNO`, `LIBID`);

--
-- Constraints for table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `FK_DOCID` FOREIGN KEY (`DOCID`) REFERENCES `document` (`DOCID`),
  ADD CONSTRAINT `FK_LIBID` FOREIGN KEY (`LIBID`) REFERENCES `branch` (`LIBID`);

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_PUBLISHERID` FOREIGN KEY (`PUBLISHERID`) REFERENCES `publisher` (`PUBLISHERID`);

--
-- Constraints for table `journal_issue`
--
ALTER TABLE `journal_issue`
  ADD CONSTRAINT `FK_DOC_JI` FOREIGN KEY (`DOCID`) REFERENCES `journal_volume` (`DOCID`);

--
-- Constraints for table `journal_volume`
--
ALTER TABLE `journal_volume`
  ADD CONSTRAINT `FK_DOCIDJV` FOREIGN KEY (`DOCID`) REFERENCES `document` (`DOCID`),
  ADD CONSTRAINT `FK_EDITOR_ID` FOREIGN KEY (`EDITOR_ID`) REFERENCES `chief_editor` (`EDITOR_ID`);

--
-- Constraints for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD CONSTRAINT `FK_DOCID_P` FOREIGN KEY (`DOCID`) REFERENCES `document` (`DOCID`);

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `FK_AUTHORID` FOREIGN KEY (`AUTHORID`) REFERENCES `author` (`AUTHORID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
