-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 11. lis 2022, 10:45
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pojisteni`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenci`
--

CREATE TABLE `pojistenci` (
  `pojistenec_id` int(11) NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `vek` int(10) NOT NULL,
  `tel_cislo` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenci`
--

INSERT INTO `pojistenci` (`pojistenec_id`, `jmeno`, `prijmeni`, `vek`, `tel_cislo`) VALUES
(1, 'Michal', 'Nový', 22, 233654789),
(4, 'Petr', 'Starý', 55, 126468623),
(6, 'Ema', 'Novotná', 38, 985625522);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatele_id` int(11) NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `admin` int(60) DEFAULT 0,
  `heslo` varchar(60) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`uzivatele_id`, `jmeno`, `admin`, `heslo`) VALUES
(3, 'Hana', 0, '$2y$10$TJWpxIloDORLexR9O9a6mO9RP4HBVRvrY0fEamZ8Jnt5UPQb/fjLa'),
(4, 'admin', 1, '$2y$10$hVd.yfCGPNmtKFVaTMeK.OftFbHT6iUtBz6DeZTlQMrQZOWNuRG.q');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`pojistenec_id`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`uzivatele_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
