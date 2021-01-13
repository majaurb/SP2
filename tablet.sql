-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 18. avg 2017 ob 19.49
-- Različica strežnika: 5.7.14
-- Različica PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `music_sp`
--

-- --------------------------------------------------------

--
-- Struktura tabele `tablet`
--

CREATE TABLE `tablet` (
  `id` int(4) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `koncentracija` int(5) NOT NULL,
  `serija` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `tablet`
--

INSERT INTO `tablet` (`id`, `ime`, `koncentracija`, `serija`) VALUES
(1, 'Bilobil', 150, 'SA1415'),
(2, 'Pantoprazol', 40, 'SA1420'),
(3, 'Nolpaza', 16, 'SA1254'),
(4, 'Traumadol', 750, 'SA1222'),
(5, 'Traumadol', 500, 'SA1222'),
(6, 'Septolete', 250, 'SA1234'),
(8, 'Kaki', 100, 'BI2194');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
