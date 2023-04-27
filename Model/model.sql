SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FinalProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `authorName` varchar(100) NOT NULL,
  `series` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `firstPublished` date NOT NULL,
  `publisherName` varchar(10) NOT NULL,
  `isbn` int(20) NOT NULL,
  `language` varchar(50) NOT NULL,
  `format` varchar(50) DEFAULT NULL,
  `totalpages` int(1000) NOT NULL,
  `goodreadsrating` varchar(20) NOT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `bookName`, `authorName`, `series`, `password`, `firstPublished`, `publisherName`, `isbn`, `language`, `format`, `totalpages`, `goodreadsrating`, `pic`) VALUES
(1100, 'It Ends With Us', 'Colleen Hoover', 'It Ends With Us', '1234', '2016-08-02', 'Atria Books', '1668021048', 'English', 'Kindle', '386', '4.27', 'images/itends.jpg'),
(1101, 'Storm and Silence', 'Robert Thier', 'Storm and Silence', '1234', '2015-01-01', 'Penguin Random House', '1668025678', 'English', 'Kindle', '600', '4.5', 'images/ss.jpg'),
(1110, 'Confess', 'Colleen Hoover', '', '1234', '2017-02-02', 'Simon & Schuster', '1668021078', 'English', 'Paperback', '267', '4.1', 'images/con.jpg'),
(1111, 'Heartstopper', 'Alice Oseman', 'Heartstopper', '1234', '2017-12-01', 'Warfield Books', '16680567788', 'English', 'Audiobook', '190', '4.7', 'images/heart.jpg'),
(1120, 'King of Scars', 'Leigh Bardugo', 'Grishaverse', '1234', '2020-06-28', 'Amara Books', '1998021048', 'English', 'Hardcover', '425', '4.5', 'images/king.jpg'),
(1200, 'City of Bones', 'Cassandra Clare', 'Mortal Instruments', '2007', '1990-02-02', 'Simon & Schuster', '1667777048', 'English', 'Kindle', '366', '3.86', 'images/bones.jpg'),
(1201, 'Dead Man Walking ', 'Giana Darling', 'Fallen Men', '1234', '2023-03-03', 'Sirus Publications', '2228021048', 'English', 'Hardcover', '454 ', '4.4', 'images/dead.jpg'),
(1500, 'Jane Eyre', 'Charlotte Bronte', '', '1234', '1947-04-16', 'Atria Books', '5555521048', 'English', 'Paperback', '556', '4.24', 'images/jane.jpg'),
(1555, 'It Starts With Us ', 'Colleen Hoover', 'It Ends With Us', '1234', '2022-01-01', 'Simon & Schuster', '1908021048', 'English', 'Kindle', '455', '4.5', 'images/itstarts.jpg'),
(1650, 'Radio Silence ', 'Alice Oseman', '', '1234', '2012-09-18', 'Penguin Random House', '5008021048', 'English', 'Audiobook', '259', '4.3', 'images/radio.jpg'),
(1800, 'Harry Potter and the Half Blood Prince', 'J.K. Rowling', 'Harry Potter', '1234', '2011-02-01', 'Penguin Random House', '9908021048', 'English', 'Ebook', '399', '3.9', 'images/halfblood.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_leave`
--

CREATE TABLE `user_leave` (
  `id` int(11) DEFAULT NULL,
  `token` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `reason` char(100) DEFAULT NULL,
  `status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_leave`
--

INSERT INTO `user_leave` (`id`, `token`, `start`, `end`, `reason`, `status`) VALUES
(1555, 305, '2023-03-07', '2023-04-08', 'Travelling', 'Pending'),
(1101, 309, '2023-04-09', '2023-04-30', 'Family Emergency', 'Approved'),
(1800, 310, '2023-04-08', '2023-04-20', 'Reading Block', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `userid` int(11) DEFAULT NULL,
  `bookname` varchar(100) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `subdate` date DEFAULT '0000-00-00',
  `rating` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`userid`, `bookname`, `isbn`, `duedate`, `subdate`, `rating`, `status`) VALUES
(1100, 'It Ends With Us', '1668021048', '2023-04-07', '2023-04-04', 5, 'Read'),
(1101, 'Confess', '1668021078' '2023-04-10', '0000-00-00', 0, 'Currently Reading'),
(1110, 'King of Scars', '1998021048', '2023-04-19', '2023-04-06', 5, 'Read'),
(1111, 'City of Bones', '2023-05-04', '2023-04-05', 2.5, 'Read'),
(1120, 'Radio Silence', '2023-04-02', '2023-04-01', 4, 'Read'),
(1120, 'Confess', '1668021078' '2023-04-03', '2023-04-03', 5, 'Read'),
(1100, 'Jane Eyre', '2023-04-07', '0000-00-00', 0, 'Currently Reading'),
(1201, 'Heartstopper', '2023-04-16', '2023-04-04', 4.1, 'Read'),
(1800, 'Confess', '1668021078' '2023-04-03', '2023-04-04', 3, 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `userid` int(11) NOT NULL,
  `points` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`userid`, `points`) VALUES
(1100, 8),
(1101, 9),
(1110, 4),
(1111, 34),
(1120, 44),
(1200, 25),
(1201, 67),
(1500, 5),
(1555, 10),
(1650, 1),
(1800, 8);

-- --------------------------------------------------------

--
-- Table structure for table `highlight`
--

CREATE TABLE `highlight` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `totalbookread` int(11) DEFAULT NULL,
  `totalpages` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highlight`
--

INSERT INTO `highlight` (`id`, `year`, `totalbookread`, `totalpages`) VALUES
(1100, 2023, 44, 2667),
(1101, 2023, 2, 132),
(1110, 2023, 5, 500),
(1111, 2023, 6, 345),
(1120, 2023, 3, 456),
(1200, 2023, 9, 789),
(1201, 2023, 12, 1678),
(1500, 2023, 17, 1778),
(1555, 2023, 20, 2000),
(1650, 2023, 1, 350),
(1800, 2023, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_leave`
--
ALTER TABLE `user_leave`
  ADD PRIMARY KEY (`token`),
  ADD KEY `user_leave_ibfk_1` (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`bookname`),
  ADD KEY `project_ibfk_1` (`userid`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `highlight`
--
ALTER TABLE `highlight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT for table `user_leave`
--
ALTER TABLE `user_leave`
  MODIFY `token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `bookname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT='Confess';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_leave`
--
ALTER TABLE `user_leave`
  ADD CONSTRAINT `user_leave_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `highlight`
--
ALTER TABLE `highlight`
  ADD CONSTRAINT `highlight_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;