-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 07:57 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `v_users` ()  NO SQL
BEGIN
select u.Uid,u.username,u.user_type,u.email
FROM
users u;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `qid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `qid`, `cid`) VALUES
(1, 'Increase', 1, 1),
(2, 'Decrease', 1, 1),
(3, 'Remain Constant', 1, 1),
(4, 'First increase and then decrease', 1, 1),
(9, 'Volcanic eruptions', 3, 1),
(10, 'Landslides', 3, 1),
(11, 'Cyclones', 3, 1),
(12, 'Movement of a part of earth\'s surface on account of the faulting of rocks', 3, 1),
(13, 'Sun is moving around the earth', 4, 1),
(14, 'Of revolution of the earth around the sun on its orbit', 4, 1),
(15, 'Tilt of Earth\'s axis', 4, 1),
(16, 'All of the above', 4, 1),
(17, 'Soil erosion', 5, 1),
(18, 'Soil protection', 5, 1),
(19, 'Depleting the soil of its moisture', 5, 1),
(20, 'All of the above', 5, 1),
(21, 'Dihybrid crosses', 6, 1),
(22, 'Back cross', 6, 1),
(23, 'Double cross', 6, 1),
(24, 'Natural selection', 6, 1),
(25, 'Brahmi', 1, 2),
(26, 'Nandnagari', 1, 2),
(27, 'Sharada', 1, 2),
(28, 'Kharoshti', 1, 2),
(29, 'S. C. Bose', 7, 1),
(30, 'Bhagat Singh', 7, 1),
(31, 'Jatin Das', 7, 1),
(32, 'Bipin Chandra Pal', 7, 1),
(33, 'Badminton', 1, 3),
(34, 'Hockey', 1, 3),
(35, 'Table Tennis', 1, 3),
(36, 'Golf', 1, 3),
(37, 'Sri Lanka', 2, 3),
(38, 'Bangladesh', 2, 3),
(39, 'Pakistan', 2, 3),
(40, 'South Africa', 2, 3),
(41, 'Pulela Gopichand', 3, 3),
(42, 'Nawab Pataudi', 3, 3),
(43, 'Ajit Wadekar', 3, 3),
(44, 'Sachin Tendulkar', 3, 3),
(45, 'Canada', 4, 3),
(46, 'England', 4, 3),
(47, 'Australia', 4, 3),
(48, 'India', 4, 3),
(49, 'French Open', 5, 3),
(50, 'Wimbeldon', 5, 3),
(51, 'US Open', 5, 3),
(52, 'Australian Open', 5, 3),
(53, 'Cricket', 6, 3),
(54, 'Carrom', 6, 3),
(55, 'Chess', 6, 3),
(56, 'Tennis', 6, 3),
(5, '15th August, 1947', 2, 1),
(6, '26th January, 1950', 2, 1),
(7, '26th November, 1949', 2, 1),
(8, '30th January, 1948', 2, 1),
(57, 'Varuna', 2, 2),
(58, 'Indra', 2, 2),
(59, 'Surya', 2, 2),
(60, 'All the above', 2, 2),
(61, 'Ramakrishna Paramahansa', 3, 2),
(62, 'Swami Dayananda Saraswati', 3, 2),
(63, 'Swami Vivekananda', 3, 2),
(64, 'Blavatsky and Olcott', 3, 2),
(65, 'Hyder Ali', 4, 2),
(66, 'Tipu Sultan', 4, 2),
(67, 'Chin Quilich Khan', 4, 2),
(68, 'Murshid Quli Khan', 4, 2),
(69, 'Khilafat Movement', 5, 2),
(70, 'Non-Cooperation Movement', 5, 2),
(71, 'Civil Disobedience Movement', 5, 2),
(72, 'Quit India Movement', 5, 2),
(73, 'Belgaum', 6, 2),
(74, 'Faizpur', 6, 2),
(75, 'Allahabad', 6, 2),
(76, 'Karachi', 6, 2),
(77, 'France', 7, 2),
(78, 'UK', 7, 2),
(79, 'Germany', 7, 2),
(80, 'USA', 7, 2),
(81, 'Raja Rammohan Roy', 8, 2),
(82, 'Bal Gangadhar Tilak', 8, 2),
(83, 'Mahatma Gandhi', 8, 2),
(84, 'Dadabhai Naoroji', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cat_name`) VALUES
(1, 'General Knowledge'),
(2, 'History'),
(3, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `Uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`Uid`, `username`, `email`, `user_type`, `password`) VALUES
(7, 'Helixheir', 'helixheir@yahoo.com', 'user', '698d51a19d8a121ce581499d7b701668'),
(8, 'vathsa', 'vathsa@gmail.com', 'user', '140f6969d5213fd0ece03148e62e461e');

-- --------------------------------------------------------

--
-- Table structure for table `highscore`
--

CREATE TABLE `highscore` (
  `Uid` int(11) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `tques` int(11) NOT NULL,
  `acorrect` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `attemptedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highscore`
--

INSERT INTO `highscore` (`Uid`, `uname`, `tques`, `acorrect`, `cid`, `attemptedon`) VALUES
(1, 'Chethan', 7, 3, 1, '2019-11-13 11:11:14'),
(2, 'Chandra', 6, 5, 3, '2019-11-11 20:26:46'),
(3, 'Venkata', 7, 7, 1, '2019-11-11 19:30:54'),
(4, 'Chandra', 1, 0, 2, '2019-11-11 15:50:13'),
(5, 'Venkata', 6, 4, 3, '2019-11-11 15:13:56'),
(6, 'Chandra', 7, 7, 1, '2019-11-11 15:10:36'),
(7, 'Chandra', 7, 3, 1, '2019-11-11 15:09:33'),
(8, 'Chandra', 7, 0, 1, '2019-11-11 14:53:29'),
(9, 'Chandra', 1, 1, 2, '2019-11-11 14:52:24'),
(10, 'Chandra', 7, 1, 1, '2019-11-11 14:51:53'),
(11, 'Chandra', 7, 1, 1, '2019-11-11 14:51:21'),
(12, 'Chandra', 7, 0, 1, '2019-11-11 14:49:46'),
(13, 'Chandra', 7, 0, 1, '2019-11-11 14:47:53'),
(14, 'Chandra', 6, 3, 3, '2019-11-11 11:12:07'),
(15, 'Chandra', 6, 3, 3, '2019-11-11 10:54:16'),
(16, 'Chandra', 7, 1, 1, '2019-11-10 22:59:30'),
(17, 'Chandra', 7, 0, 1, '2019-11-10 22:56:01'),
(18, 'Chandra', 1, 1, 2, '2019-11-10 22:52:56'),
(19, 'Chandra', 1, 1, 2, '2019-11-10 21:48:22'),
(20, 'Chandra', 6, 5, 3, '2019-11-09 21:13:25'),
(21, 'Chandra', 0, 0, 0, '2019-11-09 19:31:07'),
(22, 'Chandra', 0, 0, 0, '2019-11-09 19:30:49'),
(23, 'Chandra', 1, 1, 3, '2019-11-09 19:30:44'),
(24, 'Chandra', 1, 1, 3, '2019-11-09 19:25:51'),
(25, 'Chandra', 1, 0, 3, '2019-11-09 19:24:22'),
(26, 'Chandra', 0, 0, 3, '2019-11-09 19:22:02'),
(27, 'Chandra', 1, 1, 2, '2019-11-09 15:24:18'),
(28, 'Chandra', 1, 0, 2, '2019-11-09 15:18:46'),
(29, 'Chandra', 1, 0, 2, '2019-11-09 15:18:37'),
(30, 'Chandra', 6, 6, 1, '2019-11-09 15:08:32'),
(31, 'Chandra', 0, 0, 2, '2019-11-09 15:04:05'),
(32, 'Chandra', 5, 2, 1, '2019-11-08 22:57:07'),
(33, 'Chandra', 5, 6, 1, '2019-11-08 22:52:44'),
(34, 'Chandra', 5, 0, 1, '2019-11-08 12:09:32'),
(35, 'Chandra', 5, 3, 1, '2019-11-08 11:46:24'),
(36, 'Chandra', 5, 4, 1, '2019-11-08 11:42:12'),
(37, 'Sarath', 5, 4, 1, '2019-11-08 09:32:52'),
(38, 'Sarath', 5, 3, 1, '2019-11-08 09:31:01'),
(39, 'Sarath', 5, 5, 1, '2019-11-08 09:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `id` int(11) NOT NULL,
  `search` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`id`, `search`) VALUES
(1, 'Chethan');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`, `cid`) VALUES
(1, 'What will happen to the level of water, when the ice floating in a glass of water melts?', 3, 1),
(3, 'Which of the following causes Earthquakes?', 12, 1),
(4, 'Which of the following is the reason behind the different seasons to occur?', 14, 1),
(5, 'How does forests help soil?', 18, 1),
(6, 'The varieties of corn can be improved by which of the following methods?', 23, 1),
(1, 'Which one of the following scripts of ancient India was written from right to left?', 28, 2),
(7, 'Who among the following Indian patriots died in jail due to hunger strike?', 31, 1),
(1, 'Sultan Azlan Shah Cup is related to which among the following Sports?', 34, 3),
(2, 'Sachin Tendulkar hit his 100th international century against which among the following team?', 38, 3),
(3, 'THE WORLD BENEATH HIS FEET is a Biography of?', 41, 3),
(4, 'Which among the following country is the host of 2018 Commonwealth Games?', 47, 3),
(5, 'Which among the following is played on a synthetic hard court?', 52, 3),
(6, '“Magnus Carlsen” is a player of which among the following sports / games?', 55, 3),
(2, 'On which date Constitution of India was adopted and enacted by the Constituent Assembly?', 7, 1),
(2, 'Who among the following was worshipped during Early Vedic Civilization?', 59, 2),
(3, 'Who founded the Ramakrishna Mission in 1896 to carry on humanitarian relief and social work?', 63, 2),
(4, 'Who planted the ‘Tree of Liberty’ at Srirangapatnam?', 66, 2),
(5, 'Which Indian mass movement began with the famous ‘Dandi March’ of Mahatma Gandhi ?', 71, 2),
(6, 'The only session of Indian National Congress which was presided by Mahatma Gandhi was held at:', 73, 2),
(7, 'In which country Indian Independence Committee was formed during British Era?', 79, 2),
(8, 'Who among the following is called the father of Nationalism in India?', 81, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `totalques` int(11) NOT NULL,
  `answerscorrect` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `attemptedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `totalques`, `answerscorrect`, `cid`, `attemptedon`) VALUES
(1, 'Sarath', 5, 5, 1, '2019-11-08 09:27:54'),
(2, 'Sarath', 5, 3, 1, '2019-11-08 09:31:01'),
(3, 'Sarath', 5, 4, 1, '2019-11-08 09:32:52'),
(4, 'Chandra', 5, 4, 1, '2019-11-08 11:42:12'),
(5, 'Chandra', 5, 3, 1, '2019-11-08 11:46:24'),
(6, 'Chandra', 5, 0, 1, '2019-11-08 12:09:32'),
(7, 'Chandra', 5, 6, 1, '2019-11-08 22:52:44'),
(8, 'Chandra', 5, 2, 1, '2019-11-08 22:57:07'),
(9, 'Chandra', 0, 0, 2, '2019-11-09 15:04:05'),
(10, 'Chandra', 6, 6, 1, '2019-11-09 15:08:32'),
(11, 'Chandra', 1, 0, 2, '2019-11-09 15:18:37'),
(12, 'Chandra', 1, 0, 2, '2019-11-09 15:18:46'),
(13, 'Chandra', 1, 1, 2, '2019-11-09 15:24:18'),
(14, 'Chandra', 0, 0, 3, '2019-11-09 19:22:02'),
(15, 'Chandra', 1, 0, 3, '2019-11-09 19:24:22'),
(16, 'Chandra', 1, 1, 3, '2019-11-09 19:25:51'),
(17, 'Chandra', 1, 1, 3, '2019-11-09 19:30:44'),
(18, 'Chandra', 0, 0, 0, '2019-11-09 19:30:49'),
(19, 'Chandra', 0, 0, 0, '2019-11-09 19:31:07'),
(20, 'Chandra', 6, 5, 3, '2019-11-09 21:13:25'),
(21, 'Chandra', 1, 1, 2, '2019-11-10 21:48:22'),
(22, 'Chandra', 1, 1, 2, '2019-11-10 22:52:56'),
(23, 'Chandra', 7, 0, 1, '2019-11-10 22:56:01'),
(24, 'Chandra', 7, 1, 1, '2019-11-10 22:59:30'),
(25, 'Chandra', 6, 3, 3, '2019-11-11 10:54:16'),
(26, 'Chandra', 6, 3, 3, '2019-11-11 11:12:07'),
(27, 'Chandra', 7, 0, 1, '2019-11-11 14:47:53'),
(28, 'Chandra', 7, 0, 1, '2019-11-11 14:49:46'),
(29, 'Chandra', 7, 1, 1, '2019-11-11 14:51:21'),
(30, 'Chandra', 7, 1, 1, '2019-11-11 14:51:53'),
(31, 'Chandra', 1, 1, 2, '2019-11-11 14:52:24'),
(32, 'Chandra', 7, 0, 1, '2019-11-11 14:53:29'),
(33, 'Chandra', 7, 3, 1, '2019-11-11 15:09:33'),
(34, 'Chandra', 7, 7, 1, '2019-11-11 15:10:36'),
(35, 'Venkata', 6, 4, 3, '2019-11-11 15:13:56'),
(36, 'Chandra', 1, 0, 2, '2019-11-11 15:50:13'),
(37, 'Venkata', 7, 7, 1, '2019-11-11 19:30:54'),
(38, 'Chandra', 6, 5, 3, '2019-11-11 20:26:46'),
(39, 'Chethan', 7, 3, 1, '2019-11-13 11:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Sarath', 'sarathchandra8519@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Chandra', 'Chandra@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(4, 'Kavuri', 'qwerty@p', 'admin', '202cb962ac59075b964b07152d234b70'),
(6, 'sriharsha', 'sriharshar1999@gmail.com', 'admin', 'b59c67bf196a4758191e42f76670ceba');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `trigger` AFTER DELETE ON `users` FOR EACH ROW BEGIN
INSERT INTO deleted_users(Uid,username,email,user_type,password) VALUES(old.Uid,old.username,old.email,old.user_type,old.password);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL,
  `totalq1` int(11) NOT NULL,
  `totalq2` int(11) NOT NULL,
  `totalq3` int(11) NOT NULL,
  `totalans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `totalq1`, `totalq2`, `totalq3`, `totalans`) VALUES
(1, 8, 9, 7, 84),
(2, 3, 1, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highscore`
--
ALTER TABLE `highscore`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
