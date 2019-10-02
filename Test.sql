-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2019 at 05:11 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2
DROP DATABASE IF EXISTS Test;
CREATE DATABASE Test;
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `Test`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `authors`
  --
  CREATE TABLE `authors` (
    `id` int(11) NOT NULL,
    `author` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
  --
  -- Table structure for table `books`
  --
  CREATE TABLE `books` (
    `id` int(11) NOT NULL,
    `title` varchar(256) NOT NULL,
    `author_id` int(11) DEFAULT NULL,
    `book_image` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
  --
  -- Table structure for table `books_tags`
  --
  CREATE TABLE `books_tags` (
    `book_id` int(11) NOT NULL,
    `tag_id` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
  --
  -- Table structure for table `tags`
  --
  CREATE TABLE `tags` (
    `id` int(11) NOT NULL,
    `tag` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `authors`
  --
ALTER TABLE
  `authors`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `books`
  --
ALTER TABLE
  `books`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `author_id` (`author_id`);
--
  -- Indexes for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  PRIMARY KEY (`book_id`, `tag_id`),
ADD
  KEY `tag_id` (`tag_id`),
ADD
  KEY `book_id` (`book_id`);
--
  -- Indexes for table `tags`
  --
ALTER TABLE
  `tags`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `authors`
  --
ALTER TABLE
  `authors`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
  -- AUTO_INCREMENT for table `books`
  --
ALTER TABLE
  `books`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 31;
--
  -- AUTO_INCREMENT for table `tags`
  --
ALTER TABLE
  `tags`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `books`
  --
ALTER TABLE
  `books`
ADD
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
  -- Constraints for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  CONSTRAINT `books_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT `books_tags_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`); 
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;