-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 05:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alchemiastory`
--

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(300) NOT NULL,
  `rating` int(11) NOT NULL,
  `maps` varchar(300) NOT NULL,
  `conditional` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `type`, `name`, `description`, `rating`, `maps`, `conditional`, `category`) VALUES
(8, 'consumable', 'Potato', 'kentang dapat disintesys menjadi croquette untuk mendapatkan double Exp.', 1, 'Village of Destruction,Along Borderline,Himalayas', 'Condition...', 'expend'),
(10, 'bones', 'Orkbones', 'Bones hasil drop dari mamono untuk bahan sinthesys.', 1, 'all map zone', 'Condition...', 'expend'),
(11, 'fluid', 'Geru', 'Item Drop dari gerumi dan geng, untuk keperluan bahan synthesis.', 1, 'all map zone', 'Condition...', 'expend'),
(12, 'fishing', 'Rubber Boots', 'Item yang diperoleh dari memancing.', 1, 'fishing map zone', 'fishing', 'expend'),
(13, 'enchantment', 'Tincture', 'Item untuk build-up yome, untuk menguatkan yome dengan berbagai tambahan stats.', 3, 'reward of quest', 'Condition...', 'tool'),
(14, 'gems', 'Gemstone', 'Mineral yang didapat dari mining', 1, 'Mining Area', 'Condition...', 'expend'),
(17, 'special', 'Housing Medal', 'medal untuk transaksi item rumah', 3, 'reward of quest', 'Condition...', 'housing'),
(21, 'enchantment', 'Water of Life', 'Batu Enchantment untuk memperkuat yome dan menambah stamina nya.', 5, 'reward of quest', 'Condition...', 'tool');

-- --------------------------------------------------------

--
-- Table structure for table `monster`
--

CREATE TABLE IF NOT EXISTS `monster` (
  `id` int(5) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `drops` varchar(32) NOT NULL,
  `maps` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treasure`
--

CREATE TABLE IF NOT EXISTS `treasure` (
  `id` int(11) NOT NULL,
  `item` varchar(32) NOT NULL,
  `maps` varchar(32) NOT NULL,
  `clue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monster`
--
ALTER TABLE `monster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasure`
--
ALTER TABLE `treasure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `monster`
--
ALTER TABLE `monster`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treasure`
--
ALTER TABLE `treasure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
