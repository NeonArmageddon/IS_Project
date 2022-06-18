-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Cze 2022, 14:58
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `country`
--

CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `DataID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `country`
--

INSERT INTO `country` (`CountryID`, `Name`, `DataID`) VALUES
(1, 'Poland', 1),
(2, 'Poland', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rental_values`
--

CREATE TABLE `rental_values` (
  `DataID` int(11) NOT NULL,
  `Date2019_03` varchar(5) DEFAULT NULL,
  `Date2019_04` varchar(5) DEFAULT NULL,
  `Date2019_05` varchar(5) DEFAULT NULL,
  `Date2019_06` varchar(5) DEFAULT NULL,
  `Date2019_07` varchar(5) DEFAULT NULL,
  `Date2019_08` varchar(5) DEFAULT NULL,
  `Date2019_09` varchar(5) DEFAULT NULL,
  `Date2019_10` varchar(5) DEFAULT NULL,
  `Date2019_11` varchar(5) DEFAULT NULL,
  `Date2019_12` varchar(5) DEFAULT NULL,
  `Date2020_01` varchar(5) DEFAULT NULL,
  `Date2020_02` varchar(5) DEFAULT NULL,
  `Date2020_03` varchar(5) DEFAULT NULL,
  `Date2020_04` varchar(5) DEFAULT NULL,
  `Date2020_05` varchar(5) DEFAULT NULL,
  `Date2020_06` varchar(5) DEFAULT NULL,
  `Date2020_07` varchar(5) DEFAULT NULL,
  `Date2020_08` varchar(5) DEFAULT NULL,
  `Date2020_09` varchar(5) DEFAULT NULL,
  `Date2020_10` varchar(5) DEFAULT NULL,
  `Date2020_11` varchar(5) DEFAULT NULL,
  `Date2020_12` varchar(5) DEFAULT NULL,
  `Date2021_01` varchar(5) DEFAULT NULL,
  `Date2021_02` varchar(5) DEFAULT NULL,
  `Date2021_03` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rental_values`
--

INSERT INTO `rental_values` (`DataID`, `Date2019_03`, `Date2019_04`, `Date2019_05`, `Date2019_06`, `Date2019_07`, `Date2019_08`, `Date2019_09`, `Date2019_10`, `Date2019_11`, `Date2019_12`, `Date2020_01`, `Date2020_02`, `Date2020_03`, `Date2020_04`, `Date2020_05`, `Date2020_06`, `Date2020_07`, `Date2020_08`, `Date2020_09`, `Date2020_10`, `Date2020_11`, `Date2020_12`, `Date2021_01`, `Date2021_02`, `Date2021_03`) VALUES
(1, '112.3', '112.6', '112.8', '112.8', '113.6', '114', '115.1', '115.3', '116', '116', '117.7', '119', '119.4', '119.4', '119.1', '119.4', '119.6', '120', '120.7', '120.9', '120.6', '120.6', '121.5', '121.9', '122.5'),
(2, '112.3', '112.6', '112.8', '112.8', '113.6', '114', '115.1', '115.3', '116', '116', '117.7', '119', '119.4', '119.4', '119.1', '119.4', '119.6', '120', '120.7', '120.9', '120.6', '120.6', '121.5', '121.9', '122.5');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`),
  ADD UNIQUE KEY `DataID` (`DataID`),
  ADD UNIQUE KEY `CountryID` (`CountryID`);

--
-- Indeksy dla tabeli `rental_values`
--

ALTER TABLE `rental_values`
  ADD PRIMARY KEY (`DataID`),
  ADD UNIQUE KEY `DataID` (`DataID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `rental_values`
--
ALTER TABLE `rental_values`
  MODIFY `DataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;