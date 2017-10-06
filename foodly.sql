-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 05:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodly`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ingredients` varchar(1000) NOT NULL,
  `instructions` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_fk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `description`, `ingredients`, `instructions`, `image`, `user_fk`) VALUES
(2, 'Salmon stake', 'Delicious', 'Salmon and vegetables', 'Cook salmon in low heat for about 3 hours', 'stake.jpg', 2),
(4, 'Chicken stake', 'Delicious chicken ', 'Chicken breast, olive oil, vegetables', 'Mix them all and let them cook in low heat', 'stake.jpg', 1),
(7, 'Vegetable Recipe', '\r\nDelicious vegetable recipe', '1 teaspoon olive oil,  2 yams peeled and cut into wedges, 5 tablespoons fat-free sour cream', 'Preheat an oven to 350 degrees F (175 degrees C). Spread the olive oil over a baking sheet.\r\nArrange the yams on the prepared baking sheet in a single layer; season with the seasoned salt.', 'vegies.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Renata', 'renata@gmail.com', '$2y$10$oVP/1XrR9V1/M0oMzMaTPukqfImPkEuQW2gR7W/n/WkVWJ3x5akzG'),
(2, 'Filane', 'filane.f@gmail.com', '$2y$10$oLVqroulSCJa2TyZpVcnbeSrcQ66csYjaOOKqRgP3EKi6Ca2/xSta'),
(4, 'Filan ', 'filan.f@gmail.com', '$2y$10$Q/qWh8lDyhNh2At/swKN8.oEJPU8fDTsZMBqNpfsJUr7hunreAKi2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_fk` (`user_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_fk`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
