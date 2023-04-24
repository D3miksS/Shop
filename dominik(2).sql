-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Kwi 2019, 11:17
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
(7, 13, 1);

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
-- Struktura tabeli dla tabeli `item_ordered`
--

CREATE TABLE IF NOT EXISTS `item_ordered` (
  `NUM_ORD` int(3) NOT NULL,
  `CLI_ORD` int(3) NOT NULL,
  `PROD_ID` int(3) NOT NULL,
  `PROD_NAME` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `AMOUNT_ORD` int(11) NOT NULL,
  `PROD_PRICE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `item_ordered`
--

INSERT INTO `item_ordered` (`NUM_ORD`, `CLI_ORD`, `PROD_ID`, `PROD_NAME`, `AMOUNT_ORD`, `PROD_PRICE`) VALUES
(37, 5, 1, 'Motorola', 1, 1),
(37, 5, 9, 'Koala', 1, 100000000),
(38, 6, 1, 'Motorola', 1, 1),
(39, 6, 1, 'Motorola', 4, 4),
(39, 6, 3, 'Nokia', 1, 10000),
(40, 7, 9, 'Koala', 1, 100000000),
(40, 7, 3, 'Nokia', 2, 20000),
(41, 6, 13, 'Sony', 1, 0.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `NUM_ORD` int(3) NOT NULL,
  `CLI_ORD` int(3) NOT NULL,
  `DATA_ORD` date NOT NULL,
  `PROD_ORD` float NOT NULL,
  `SHIP_ORD` float NOT NULL,
  `TOT_ORD` float NOT NULL,
  `SHIPPING_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`NUM_ORD`, `CLI_ORD`, `DATA_ORD`, `PROD_ORD`, `SHIP_ORD`, `TOT_ORD`, `SHIPPING_ID`) VALUES
(37, 5, '2019-04-04', 100000000, 0, 100000000, 3),
(38, 6, '2019-04-05', 1, 0, 1, 2),
(39, 6, '2019-04-09', 10004, 0, 10004, 2),
(40, 7, '2019-04-09', 100020000, 0, 100020000, 4),
(41, 6, '2019-04-09', 0.99, 0, 0.99, 2);

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
(1, 'Motorola', 1, 1, 4, 1, 'Dzwoni', 'moto.jpg'),
(3, 'Nokia', 10000, 1, 48, 1, 'Cegla', 'nokia.jpg'),
(9, 'Koala', 100000000, 1, 98, 1, 'Slodziak', 'Koala.jpg'),
(12, 'SAMSUNG', 99.99, 0, 0, 1, 'ds', 'Desert.jpg'),
(13, 'Sony', 0.99, 2, 198, 1, 'das', 'sonyt.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `ID_SHIP` bigint(20) unsigned NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STREET_SHIP` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `ZIP_SHIP` int(5) NOT NULL,
  `CITY_SHIP` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `COUNTRY_SHIP` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `PHONE_SHIP` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `shipping`
--

INSERT INTO `shipping` (`ID_SHIP`, `USER_ID`, `STREET_SHIP`, `ZIP_SHIP`, `CITY_SHIP`, `COUNTRY_SHIP`, `PHONE_SHIP`) VALUES
(2, 6, 'Warszawska 2', 12321, 'Krakow', 'Poland', 981273465),
(3, 5, 'Slow', 21478, 'Sosnowiec', 'Sosnowiec', 606060000),
(4, 7, 'via brenta 12', 47921, 'rimini', 'italy', 54122248);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` bigint(20) unsigned NOT NULL,
  `EMAIL_USER` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `FIRST_USER` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `LAST_USER` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `HASH_USER` varchar(60) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID_USER`, `EMAIL_USER`, `FIRST_USER`, `LAST_USER`, `HASH_USER`) VALUES
(5, 'Dominik', 'Kot', 'Pies', '$2y$10$vN6VpWJ/3jtw4xmpkzy1y.thzleKokJIlyGob5xvQuYO3Qror0zWu'),
(6, 'asd', 'asd', 'asd', '$2y$10$H0d0W.J3bQv38NTklTFf7eMfl2wpGsZ37dyf0ybjSDtfBIo9/5C4u'),
(7, 'tubba', 'simona', 'd''ambrosio', '$2y$10$LPiJedG/SofQzjw5gmeR9uyMv2/HsCB1O5lSsicc8nkjpycF0sOny'),
(8, 'qwe', 'qwe', 'qwe', '$2y$10$WLUijaloIREMAX3UMQtQFeABOIELofIbwSMyQoDRvYIIjhkG0OUSm');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`NUM_ORD`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD UNIQUE KEY `ID_PROD` (`ID_PROD`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ID_SHIP`),
  ADD UNIQUE KEY `ID_SHIP` (`ID_SHIP`);

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
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `NUM_ORD` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `ID_PROD` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ID_SHIP` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
