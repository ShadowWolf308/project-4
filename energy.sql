-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mei 2022 om 14:27
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `energy`
--
CREATE DATABASE IF NOT EXISTS `energy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `energy`;
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanbiedingen`
--

CREATE TABLE `aanbiedingen` (
  `aanbiedingen_id` int(11) NOT NULL,
  `titel` varchar(50) DEFAULT NULL,
  `begindatum` datetime DEFAULT NULL,
  `einddatum` datetime DEFAULT NULL,
  `omschrijving` varchar(100) DEFAULT NULL,
  `afbeelding` varchar(50) DEFAULT NULL,
  `artiest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `aanbiedingen`
--

INSERT INTO `aanbiedingen` (`aanbiedingen_id`, `titel`, `begindatum`, `einddatum`, `omschrijving`, `afbeelding`, `artiest_id`) VALUES
(1, 'Knalkorting', '2021-02-01 00:00:00', '2021-02-28 00:00:00', 'Met deze knalkorting ga je helemaal knallen', 'knal.png', 101),
(2, 'Volle voor lege', '2021-03-04 00:00:00', '2021-03-10 00:00:00', 'Bij inlevering van 12 lege blikjes krijg je 1 volle', 'cheap.png', 102),
(3, 'Vroegdrinkkorting', '2021-03-11 00:00:00', '2021-03-24 00:00:00', 'Voor 9 uur in de ochtend 50% korting!', 'clock.png', 104),
(4, 'Grote X knaller', '2021-04-01 00:00:00', '2021-04-30 00:00:00', 'Met deze knalkorting ga je helemaal knallen', 'knal.png', 101),
(5, 'Voorjaarsaanbieding', '2021-03-01 00:00:00', '2021-04-01 00:00:00', 'Bij inlevering van 11 lege blikjes krijg je 1 volle', 'cheap.png', 103),
(6, 'Doldwaze dagen', '2021-04-01 00:00:00', '2021-04-30 00:00:00', 'Elk 2e blikje gratis', 'dwaas.png', 105),
(7, 'Lenteactie', '2021-05-01 00:00:00', '2021-05-31 00:00:00', 'Nieuwe energie voor halve prijs', 'lente.png', 102);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artiesten`
--

CREATE TABLE `artiesten` (
  `artiest_id` int(11) NOT NULL,
  `naam` varchar(50) DEFAULT NULL,
  `achternaam` varchar(50) DEFAULT NULL,
  `voornaam` varchar(50) DEFAULT NULL,
  `tussenvoegsel` varchar(10) DEFAULT NULL,
  `statement` varchar(100) DEFAULT NULL,
  `telefoon` varchar(20) DEFAULT NULL,
  `actief` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `artiesten`
--

INSERT INTO `artiesten` (`artiest_id`, `naam`, `achternaam`, `voornaam`, `tussenvoegsel`, `statement`, `telefoon`, `actief`) VALUES
(101, 'Elvis Presley', 'Presley', 'Elvis Aaron', NULL, '... has left the building!', '+31 6 28271134', 1),
(102, 'Tones and I', 'Watson', 'Toni', NULL, 'Energy Monkey Energy!', '+31 6 28271134', 1),
(103, 'Post Malone', 'Post', 'Austin Richard', NULL, 'Broken energy can.', '+31 6 28271134', 1),
(104, 'Miley Cyrus', 'Cyrus', 'Destiny Hope', NULL, 'Energy isn\'t just a color, it\'s an attitude!', '+31 6 28271134', 1),
(105, 'Rapper Sjors', 'Peter', 'Sjors', NULL, 'Yeah, let\'s go!', '+31 6 28271134', 0),
(121, 'Dua Lipa', 'Lipa', 'Dua', NULL, 'One Sip is all I need!', '+31 6 28271134', 1),
(122, 'Duncan', 'Rijssel', 'Duncan', 'van', 'Ben jij ook zo.... energiek vandaag', '+31 6 28271134', 1),
(123, 'Justin Bieber', 'Bieber', 'Justin Drew', NULL, 'Energy should be honest, loving and trustworthy.', '+31 6 28271134', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `gebruiker_id` int(11) NOT NULL,
  `naam` varchar(10) NOT NULL,
  `bericht` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `evenementen`
--

CREATE TABLE `evenementen` (
  `evenement_id` int(11) NOT NULL,
  `datum` datetime DEFAULT NULL,
  `artiest_id` int(11) DEFAULT NULL,
  `locatie_id` int(11) DEFAULT NULL,
  `max_bezoekers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `evenementen`
--

INSERT INTO `evenementen` (`evenement_id`, `datum`, `artiest_id`, `locatie_id`, `max_bezoekers`) VALUES
(501, '2021-03-01 00:00:00', 101, 51, 1000),
(502, '2021-03-04 00:00:00', 105, 53, 3000),
(503, '2021-03-09 00:00:00', 102, 54, 1000),
(504, '2021-03-11 00:00:00', 101, 55, 3000),
(505, '2021-03-15 00:00:00', 101, 51, 1000),
(506, '2021-03-16 00:00:00', 103, 53, 3000),
(507, '2021-03-20 00:00:00', 104, 52, 2000),
(508, '2021-03-22 00:00:00', 101, 51, 1000),
(509, '2021-03-24 00:00:00', 102, 56, 5000),
(510, '2021-03-25 00:00:00', 103, 53, 3000),
(511, '2021-03-30 00:00:00', 102, 52, 2000),
(512, '2021-03-31 00:00:00', 101, 51, 5000),
(513, '2021-04-01 00:00:00', 102, 54, 5000),
(514, '2021-04-05 00:00:00', 103, 59, 3000),
(515, '2021-04-12 00:00:00', 102, 52, 2000),
(516, '2021-03-13 00:00:00', 101, 55, 5000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruiker_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_id`, `username`, `password`, `permission`) VALUES
(1, 'admin', 'welkom1', 2),
(2, 'user1', 'welkom2', 1),
(3, 'user2', 'welkom3', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locaties`
--

CREATE TABLE `locaties` (
  `locatie_id` int(11) NOT NULL,
  `plaatsnaam` varchar(50) DEFAULT NULL,
  `gebouw` varchar(50) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `locaties`
--

INSERT INTO `locaties` (`locatie_id`, `plaatsnaam`, `gebouw`, `adres`, `postcode`) VALUES
(51, 'Den Haag', 'Kurhaus', NULL, NULL),
(52, 'Den Haag', 'Strand Scheveningen', NULL, NULL),
(53, 'Den Haag', 'Malieveld', NULL, NULL),
(54, 'Voorburg', 'St Maartenscollege', NULL, NULL),
(55, 'Leiden', 'mboRijnland', NULL, NULL),
(56, 'Leiden', 'Centraal Station', NULL, NULL),
(57, 'Alphen a/d Rijn', 'Winkelcentrum Ridderhof', NULL, NULL),
(58, 'Lisse', 'Veilinghallen', NULL, NULL),
(59, 'Rotterdam', 'Erasmusbrug', NULL, NULL),
(60, 'Delft', 'Grote Markt', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reacties`
--

CREATE TABLE `reacties` (
  `reactie_id` int(11) NOT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `titel` varchar(50) DEFAULT NULL,
  `inhoud` varchar(1000) DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reacties`
--

INSERT INTO `reacties` (`reactie_id`, `evenement_id`, `titel`, `inhoud`, `auteur`) VALUES
(1, 501, 'Leuk event', 'Ik vond het een fantastische dag.', 'Anoniem'),
(2, 503, 'Waste of time', 'Wat een complete verspilling van tijd.', 'Zeurkous'),
(3, 505, 'Pharell was top', 'Jammer dat Lady Gaga niet is gekomen.', 'Fanboy17');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanbiedingen`
--
ALTER TABLE `aanbiedingen`
  ADD PRIMARY KEY (`aanbiedingen_id`),
  ADD KEY `artiest_id` (`artiest_id`);

--
-- Indexen voor tabel `artiesten`
--
ALTER TABLE `artiesten`
  ADD PRIMARY KEY (`artiest_id`);

--
-- Indexen voor tabel `evenementen`
--
ALTER TABLE `evenementen`
  ADD PRIMARY KEY (`evenement_id`),
  ADD KEY `artiest_id` (`artiest_id`),
  ADD KEY `locatie_id` (`locatie_id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruiker_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `locaties`
--
ALTER TABLE `locaties`
  ADD PRIMARY KEY (`locatie_id`);

--
-- Indexen voor tabel `reacties`
--
ALTER TABLE `reacties`
  ADD PRIMARY KEY (`reactie_id`),
  ADD KEY `evenement_id` (`evenement_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanbiedingen`
--
ALTER TABLE `aanbiedingen`
  MODIFY `aanbiedingen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `artiesten`
--
ALTER TABLE `artiesten`
  MODIFY `artiest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT voor een tabel `evenementen`
--
ALTER TABLE `evenementen`
  MODIFY `evenement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `locaties`
--
ALTER TABLE `locaties`
  MODIFY `locatie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT voor een tabel `reacties`
--
ALTER TABLE `reacties`
  MODIFY `reactie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aanbiedingen`
--
ALTER TABLE `aanbiedingen`
  ADD CONSTRAINT `aanbiedingen_ibfk_1` FOREIGN KEY (`artiest_id`) REFERENCES `artiesten` (`artiest_id`);

--
-- Beperkingen voor tabel `evenementen`
--
ALTER TABLE `evenementen`
  ADD CONSTRAINT `evenementen_ibfk_1` FOREIGN KEY (`artiest_id`) REFERENCES `artiesten` (`artiest_id`),
  ADD CONSTRAINT `evenementen_ibfk_2` FOREIGN KEY (`locatie_id`) REFERENCES `locaties` (`locatie_id`);

--
-- Beperkingen voor tabel `reacties`
--
ALTER TABLE `reacties`
  ADD CONSTRAINT `reacties_ibfk_1` FOREIGN KEY (`evenement_id`) REFERENCES `evenementen` (`evenement_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
