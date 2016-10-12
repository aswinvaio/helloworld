-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 07:54 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helloworlddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(250) NOT NULL,
  `Content` varchar(10000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `Time`, `Title`, `Content`) VALUES
(37, 10, '2016-10-12 13:21:40', 'I think you can have moderate success', 'I think you can have moderate success by copying something else, but if you really want to knock it out of the park, you have to do something different and take chances.'),
(36, 9, '2016-10-12 13:20:17', 'I think you can have moderate success', 'I think you can have moderate success by copying something else, but if you really want to knock it out of the park, you have to do something different and take chances.'),
(34, 9, '2016-10-12 13:19:08', 'No illusion is more crucial than', 'No illusion is more crucial than the illusion that great success and huge money buy you immunity from the common ills of mankind, such as cars that won\'t start'),
(35, 9, '2016-10-12 13:19:40', 'If success attends my steps', 'If success attends my steps, honor and glory await my name-if defeat, still shall it be said we died like brave men, and conferred honor, even in death, on the American Name.'),
(33, 8, '2016-10-12 13:17:57', 'No illusion is more crucial than the illusion', 'No illusion is more crucial than the illusion that great success and huge money buy you immunity from the common ills of mankind, such as cars that won\'t start'),
(30, 8, '2016-10-12 13:15:10', 'Always be yourself', 'Always be yourself, express yourself, have faith in yourself, do not go out and look for a successful personality and duplicate it.'),
(31, 8, '2016-10-12 13:15:57', 'Desire is the key to motivation', 'Desire is the key to motivation, but it\'s determination and commitment to an unrelenting pursuit of your goal - a commitment to excellence - that will enable you to attain the success you seek.'),
(32, 8, '2016-10-12 13:16:44', 'Take up one idea. Make that one idea your life.', 'Take up one idea. Make that one idea your life - think of it, dream of it, live on that idea. Let the brain, muscles, nerves, every part of your body, be full of that idea, and just leave every other idea alone. This is the way to success.'),
(38, 10, '2016-10-12 13:22:21', 'I live again the days', 'I live again the days and evenings of my long career. I dream at night of operas and concerts in which I have had my share of success. Now like the old Irish minstrel, I have hung up my harp because my songs are all sung.'),
(39, 10, '2016-10-12 13:23:00', 'It\'s the quality of the ordinary', 'It\'s the quality of the ordinary, the straight, the square, that accounts for the great stability and success of our nation. It\'s a quality to be proud of. But it\'s a quality that many people seem to have neglected.It\'s the quality of the ordinary, the straight, the square, that accounts for the great stability and success of our nation. It\'s a quality to be proud of. But it\'s a quality that many people seem to have neglected.\r\nRead more at: http://www.brainyquote.com/quotes/quotes/g/geraldrfo116708.html?src=t_success');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(25) NOT NULL,
  `Username` varchar(65) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `EmailAddress`, `Name`, `Phone`) VALUES
(1, 'admin', 'admin', 'admin@vaio.pc', 'admin', '9876543210'),
(8, 'aswinvaio', 'vaio', 'aswinprabhakaran@gmail.com', 'aswin vp', '9633139263'),
(9, 'ajithkv', 'password', 'ajithkv@gmail.com', 'ajith kv', '9037121423'),
(10, 'saleeh', 'password', 'saleeh93@gmail.com', 'saleeh kalluvetty', '9995556560');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
