-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 05:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `dateCreation`) VALUES
(51, 'kkkkkkkkk', '2024-01-03'),
(52, 'jjjjjj', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `idtag` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`idtag`, `name`) VALUES
(31, 'tag1');

-- --------------------------------------------------------

--
-- Table structure for table `tag_wiki`
--

CREATE TABLE `tag_wiki` (
  `id` int(11) NOT NULL,
  `idwiki` int(11) NOT NULL,
  `idtag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_wiki`
--

INSERT INTO `tag_wiki` (`id`, `idwiki`, `idtag`) VALUES
(45, 37, 31),
(46, 39, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','author') NOT NULL DEFAULT 'author'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `lastname`, `firstname`, `email`, `password`, `role`) VALUES
(2, 'sahtani', 'soumia', 'soumia@gmail.com', '$2y$10$6.xydGDS75duFVjrTtl.nuzafSFk3D9W3wojQdZPzngaoFBi5ekda', 'admin'),
(3, 'Davidson', 'mohamed', 'mohamed@gmail.com', '$2y$10$dMCfS1ftoqVg/uIYxf090OCpP7YaKBRGcCu7eKt1r8TWBx7SikX9q', 'author'),
(4, 'ayoub', 'Brennan', 'ayoub@gmail.com', '$2y$10$fGdet1kTdiwSRJKuK3aUm.SRwJtVd9u2f1WZzQ1fpzjZN2iHPxsry', 'user'),
(5, 'Rivers', 'Minerva', 'gofecoqe@mailinator.com', '$2y$10$x6C0WtbIlUJIUvtIfbvHcuoJ2GWaRvn9Sgf8SkjxXxW8Y6BH4Xhgq', 'user'),
(6, 'Hughes', 'Keaton', 'buvovudote@mailinator.com', '$2y$10$ZccvId30ClDurI3gDC6P4u2AllKY15USASnvlpQrV3EDeDx.Iur/O', 'user'),
(7, 'Noel', 'Yoko', 'yoko@gmail.com', '$2y$10$QfE9wLLrPrRJmp0K.LdObO204/K2hLA.9Ke7yZye019tVvnucEDqG', 'author');

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `idwiki` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`idwiki`, `title`, `content`, `archive`, `iduser`, `idcat`, `dateCreation`) VALUES
(37, 'Maxime ut ipsum volu', 'Dans cet exemple, la fonction generateWikiContent crée une chaîne de texte aléatoire simulant le contenu d&#039;un article de wiki. Vous pouvez personnaliser cette fonction pour générer un contenu qui correspond à votre contexte spécifique.\r\n\r\nN&#039;oubl', 0, 3, 51, '2024-01-12 14:26:45'),
(38, 'Ut culpa sunt sunt', 'Consequat Amet nec', 0, 3, 51, '2024-01-12 15:07:34'),
(39, 'Ut culpa sunt sunt', 'Consequat Amet nec', 0, 3, 51, '2024-01-12 15:07:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idtag`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `tag_wiki`
--
ALTER TABLE `tag_wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tag` (`idtag`),
  ADD KEY `fk_wiki` (`idwiki`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`idwiki`),
  ADD KEY `fk_user` (`iduser`),
  ADD KEY `fk_category` (`idcat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `idtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tag_wiki`
--
ALTER TABLE `tag_wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `idwiki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tag_wiki`
--
ALTER TABLE `tag_wiki`
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`idtag`) REFERENCES `tag` (`idtag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wiki` FOREIGN KEY (`idwiki`) REFERENCES `wiki` (`idwiki`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`idcat`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
