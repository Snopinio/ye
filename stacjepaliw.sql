-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 29, 2024 at 07:06 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stacjepaliw`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id` bigint(20) NOT NULL,
  `miasto` varchar(50) DEFAULT NULL,
  `ulica` varchar(50) DEFAULT NULL,
  `numer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adresy`
--

INSERT INTO `adresy` (`id`, `miasto`, `ulica`, `numer`) VALUES
(1, 'Warszawa', 'Marszałkowska', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stacje_paliw`
--

CREATE TABLE `stacje_paliw` (
  `id` bigint(20) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `adres` bigint(20) DEFAULT NULL,
  `cena_paliwa` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stacje_paliw`
--

INSERT INTO `stacje_paliw` (`id`, `nazwa`, `adres`, `cena_paliwa`) VALUES
(1, 'Stacja Warszawa', 1, 6.50);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stacje_paliw`
--
ALTER TABLE `stacje_paliw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adres` (`adres`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stacje_paliw`
--
ALTER TABLE `stacje_paliw`
  ADD CONSTRAINT `stacje_paliw_ibfk_1` FOREIGN KEY (`adres`) REFERENCES `adresy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
