-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2018 at 09:01 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_ledc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(255) unsigned NOT NULL,
  `company` varchar(50) NOT NULL,
  `logo_src` varchar(100) NOT NULL,
  `img_src` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `company`, `logo_src`, `img_src`, `description`, `link`) VALUES
(1, 'Arcane', 'arcane-logo.png', 'mob-arcane.jpg', 'Arcane is a marketing agency based out of London with a completely new approach to advertising. They focus on new and unique ways of driving high revenue for their clients.', 'www.arcane.ca'),
(2, 'Northern', 'northernlogo.png', 'mob-northern.jpg', 'Northern are an e-commerce agency based out of London. One of the few Google Partners in London, Northern is one of the fastest growing e-commerce companies in Canada.', 'www.northern.ca'),
(3, 'Red Rhino', 'redrhino-logo.png', 'mob-redrhino.jpg', 'About Red Rhino is a digital agency based out of London that began in 1996. Their main focus is connecting with customers and providing innovative and unique marketing strategies.', 'www.red-rhino.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_level` tinyint(6) NOT NULL,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `attempts` int(255) NOT NULL,
  `last_login` varchar(60) NOT NULL,
  `needs_edit` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`, `user_ip`, `attempts`, `last_login`, `needs_edit`) VALUES
(1, 'Kolton', 'KS', 'abc123', 'tallmidget@gmail.com', '2018-02-15 02:02:13', 0, '::1', 1, '11-03-2018 03:55:03 PM', 0),
(2, 'asdsad', 'asdsad', 'db7af53c53', 'sadsad', '0000-00-00 00:00:00', 1, 'no', 0, '0', 0),
(3, 'John', 'Snow', 'def456', 'john@fbi.gov', '0000-00-00 00:00:00', 2, '127.0.0.1', 0, '01-03-2018 08:46:14 AM', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
