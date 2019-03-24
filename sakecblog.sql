-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 03:49 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sakecblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `b_id` int(3) NOT NULL,
  `b_title` varchar(50) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `b_content` text NOT NULL,
  `b_votes` int(3) DEFAULT '0',
  `b_read_time` int(2) NOT NULL,
  `b_cover` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(2) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(2, 'Entertainment'),
(3, 'Literature'),
(4, 'Politics'),
(5, 'Social'),
(6, 'Sports'),
(1, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `b_id` int(3) NOT NULL,
  `u-id` int(3) NOT NULL,
  `c_comment` varchar(256) NOT NULL,
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(3) NOT NULL,
  `b_id` int(3) NOT NULL,
  `m_file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(3) NOT NULL,
  `u_fname` varchar(20) NOT NULL,
  `u_lname` varchar(20) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_gender` varchar(1) NOT NULL,
  `u_phone` bigint(10) UNSIGNED NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_username`, `u_gender`, `u_phone`, `u_email`, `u_password`) VALUES
(3, 'pundrik', 'mishra', 'amit', 'M', 987654321, 'amit@pundrik.mishra', '$2y$10$EkPZfWX/rUngjmoYDhEf5eL7GgtM5e0ZpF/TbqGCAH6hBeU/lI4Au');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `u_id` int(3) NOT NULL,
  `b_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `vote`
--
DELIMITER $$
CREATE TRIGGER `add_vote` AFTER INSERT ON `vote` FOR EACH ROW BEGIN

	DECLARE bid integer;

	SET @bid = new.b_id;

	UPDATE blogs

	SET b_votes = b_votes + 1

    WHERE b_id = @bid;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rem_vote` BEFORE DELETE ON `vote` FOR EACH ROW BEGIN

	DECLARE bid integer;

    SET @bid = old.b_id;

    UPDATE blogs

    SET b_votes = b_votes - 1

    WHERE b_id = @bid;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `write`
--

CREATE TABLE `write` (
  `u_id` int(3) NOT NULL,
  `b_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`b_id`,`u-id`,`c_comment`),
  ADD KEY `u-id` (`u-id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_username` (`u_username`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`u_id`,`b_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `write`
--
ALTER TABLE `write`
  ADD PRIMARY KEY (`u_id`,`b_id`),
  ADD KEY `b_id` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `b_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`u-id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_3` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `write`
--
ALTER TABLE `write`
  ADD CONSTRAINT `write_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `write_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
