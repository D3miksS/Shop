-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Kwi 2019, 10:21
-- Wersja serwera: 5.6.26
-- Wersja PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dominik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` bigint(20) unsigned NOT NULL,
  `EMAIL_ADMIN` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `PASS_ADMIN` varchar(15) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `EMAIL_ADMIN`, `PASS_ADMIN`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID_CART` int(11) NOT NULL,
  `ID_PROD` int(11) NOT NULL,
  `QT_CART` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`ID_CART`, `ID_PROD`, `QT_CART`) VALUES
(0, 1, 19),
(1, 1, 4),
(1, 9, 6),
(6, 1, 3),
(6, 13, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID_CAT` bigint(20) unsigned NOT NULL,
  `NAME_CAT` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`ID_CAT`, `NAME_CAT`) VALUES
(1, 'telefony'),
(2, 'tablety');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID_PROD` bigint(20) unsigned NOT NULL,
  `NAME_PROD` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `PRICE_PROD` float NOT NULL,
  `CAT_PROD` int(2) NOT NULL,
  `STOCK_PROD` int(3) NOT NULL,
  `AVAIL_PROD` tinyint(1) NOT NULL,
  `DESC_PROD` text COLLATE utf8_polish_ci NOT NULL,
  `IMG_PROD` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`ID_PROD`, `NAME_PROD`, `PRICE_PROD`, `CAT_PROD`, `STOCK_PROD`, `AVAIL_PROD`, `DESC_PROD`, `IMG_PROD`) VALUES
(1, 'Motorola', 1, 1, 3, 1, 'Dzwoni', ''),
(2, 'ok', 2.4, 0, 5, 0, 'Dziala', ''),
(3, 'Nokia', 10000, 1, 1, 1, 'Cegla', ''),
(9, 'Koala', 100000000, 1, 100, 1, 'Slodziak', 'Koala.jpg'),
(12, 'SAMSUNG', 99.99, 0, 10, 0, 'ds', 'Desert.jpg'),
(13, 'Sony', 0.99, 2, 199, 1, 'das', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` bigint(20) unsigned NOT NULL,
  `EMAIL_USER` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `PASS_USER` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `FIRST_USER` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `LAST_USER` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `HASH_USER` varchar(60) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID_USER`, `EMAIL_USER`, `PASS_USER`, `FIRST_USER`, `LAST_USER`, `HASH_USER`) VALUES
(5, 'Dominik', '123A', 'Kot', 'Pies', '$2y$10$vN6VpWJ/3jtw4xmpkzy1y.thzleKokJIlyGob5xvQuYO3Qror0zWu'),
(6, 'asd', 'asd', 'asd', 'asd', '$2y$10$izZRUOCfnue880bSMr7lfu8ZmZ4ClaTkEZ27vuzjYt0ajCcd3OOmO');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `ID_ADMIN` (`ID_ADMIN`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CAT`),
  ADD UNIQUE KEY `ID_CAT` (`ID_CAT`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD UNIQUE KEY `ID_PROD` (`ID_PROD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `ID_USER` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_CAT` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `ID_PROD` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
