-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2019 at 05:19 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
  DROP DATABASE IF EXISTS Test;
  CREATE DATABASE Test;
  
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
--
  -- Dumping data for table `authors`
  --
INSERT INTO
  `authors` (`id`, `author`)
VALUES
  (1, 'Mo2ayad'),
  (2, 'Mesh Mo2ayad'),
  (3, 'Author3'),
  (4, 'Author4'),
  (5, 'Author5'),
  (6, 'Author6'),
  (7, 'Author7');
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
--
  -- Dumping data for table `books`
  --
INSERT INTO
  `books` (`id`, `title`, `author_id`, `book_image`)
VALUES
  (2, 'AAA', 1, 'download.jpeg'),
  (3, 'BBB', 1, 'download.jpeg'),
  (4, 'CCC', 1, 'download.jpeg'),
  (5, 'AAA', 2, 'download.jpeg'),
  (6, 'BBB', 2, 'download.jpeg'),
  (7, 'CCC', 2, 'download.jpeg');
-- --------------------------------------------------------
  --
  -- Table structure for table `books_tags`
  --
  CREATE TABLE `books_tags` (
    `book_id` int(11) NOT NULL,
    `tag_id` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `books_tags`
  --
INSERT INTO
  `books_tags` (`book_id`, `tag_id`)
VALUES
  (3, 1),
  (6, 1),
  (1, 2),
  (2, 2),
  (4, 2),
  (7, 2),
  (1, 3),
  (2, 3),
  (3, 3),
  (5, 3),
  (6, 3),
  (1, 4),
  (2, 4),
  (4, 4),
  (5, 4),
  (7, 4);
-- --------------------------------------------------------
  --
  -- Table structure for table `tags`
  --
  CREATE TABLE `tags` (
    `id` int(11) NOT NULL,
    `tag` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `tags`
  --
INSERT INTO
  `tags` (`id`, `tag`)
VALUES
  (1, 'Tag1'),
  (2, 'Tag2'),
  (3, 'Tag3'),
  (4, 'Tag4'),
  (5, 'Tag5'),
  (6, 'Tag6'),
  (7, 'Tag7');
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
  PRIMARY KEY (`id`);
--
  -- Indexes for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  PRIMARY KEY (`book_id`, `tag_id`),
ADD
  KEY `tag_id` (`tag_id`);
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
  AUTO_INCREMENT = 8;
--
  -- AUTO_INCREMENT for table `books`
  --
ALTER TABLE
  `books`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- AUTO_INCREMENT for table `tags`
  --
ALTER TABLE
  `tags`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  CONSTRAINT `books_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
  