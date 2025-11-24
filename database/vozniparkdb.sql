-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 12:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vozniparkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Lozinka` varchar(255) NOT NULL,
  `TipKorisnika` enum('Admin','Korisnik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `Ime`, `Prezime`, `Email`, `Lozinka`, `TipKorisnika`) VALUES
(1, 'Marko', 'Petrović', 'marko.petrovic@email.com', '12345', 'Admin'),
(2, 'Jovana', 'Nikolić', 'jovana.nikolic@email.com', '54321', 'Korisnik'),
(3, 'Milan', 'Jovanović', 'milan.jovanovic@email.com', 'lozinka123', 'Korisnik'),
(4, 'Ana', 'Stanković', 'ana.stankovic@email.com', 'adminpass', 'Admin'),
(5, 'Dejan', 'Ilić', 'dejan.ilic@email.com', 'pass789', 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kvarovi`
--

CREATE TABLE `kvarovi` (
  `ID` int(11) NOT NULL,
  `VoziloID` int(11) NOT NULL,
  `KorisnikID` int(11) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `DatumPrijave` datetime DEFAULT current_timestamp(),
  `Status` enum('Prijavljen','Popravljen') NOT NULL DEFAULT 'Prijavljen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kvarovi`
--

INSERT INTO `kvarovi` (`ID`, `VoziloID`, `KorisnikID`, `Opis`, `DatumPrijave`, `Status`) VALUES
(1, 4, 3, 'Problem sa menjačem', '2024-02-05 09:00:00', 'Prijavljen'),
(2, 2, 5, 'Pukla guma na zadnjem točku', '2024-02-18 16:30:00', 'Popravljen'),
(3, 3, 2, 'Problemi sa paljenjem motora', '2024-02-22 11:00:00', 'Popravljen'),
(7, 1, 4, 'Kvar plinske boce', '2025-03-03 00:34:10', 'Prijavljen');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `ID` int(11) NOT NULL,
  `KorisnikID` int(11) NOT NULL,
  `VoziloID` int(11) NOT NULL,
  `DatumRezervacije` datetime DEFAULT current_timestamp(),
  `DatumPovratka` datetime DEFAULT NULL,
  `Status` enum('Aktivna','Završena') NOT NULL DEFAULT 'Aktivna'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`ID`, `KorisnikID`, `VoziloID`, `DatumRezervacije`, `DatumPovratka`, `Status`) VALUES
(1, 2, 1, '2024-02-01 08:00:00', '2024-02-10 18:00:00', 'Završena'),
(2, 3, 2, '2024-02-15 10:30:00', NULL, 'Aktivna'),
(3, 4, 3, '2024-02-20 12:00:00', '2024-02-25 15:00:00', 'Završena'),
(4, 5, 4, '2024-03-01 14:00:00', NULL, 'Aktivna'),
(11, 1, 3, '2025-03-04 17:01:49', NULL, 'Aktivna'),
(14, 1, 26, '2025-03-04 23:04:48', NULL, 'Aktivna');

-- --------------------------------------------------------

--
-- Table structure for table `servisi`
--

CREATE TABLE `servisi` (
  `ID` int(11) NOT NULL,
  `VoziloID` int(11) NOT NULL,
  `DatumZakazivanja` datetime NOT NULL,
  `DatumIzvrsenja` datetime DEFAULT NULL,
  `OpisPopravke` varchar(255) DEFAULT NULL,
  `Status` enum('Zakazano','Završeno') NOT NULL DEFAULT 'Zakazano'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servisi`
--

INSERT INTO `servisi` (`ID`, `VoziloID`, `DatumZakazivanja`, `DatumIzvrsenja`, `OpisPopravke`, `Status`) VALUES
(26, 1, '2025-03-04 01:20:00', '2025-03-07 01:20:00', 'Kvar plinske boce', 'Zakazano'),
(27, 2, '2025-03-04 01:21:00', '2025-03-08 01:21:00', 'Kvar klima uredjaja', 'Zakazano'),
(29, 26, '2025-03-04 01:22:00', '2025-03-12 01:22:00', 'Zamena filtera', 'Zakazano');

-- --------------------------------------------------------

--
-- Table structure for table `vozaci`
--

CREATE TABLE `vozaci` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `BrojDozvole` varchar(20) NOT NULL,
  `Status` enum('Aktivan','Neaktivan') NOT NULL DEFAULT 'Aktivan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vozaci`
--

INSERT INTO `vozaci` (`ID`, `Ime`, `Prezime`, `BrojDozvole`, `Status`) VALUES
(1, 'Ivan', 'Ivanovic', '49420087', 'Aktivan'),
(2, 'Stefan', 'Kostić', '45698654', 'Neaktivan'),
(3, 'Ivana', 'Lazić', '22334455', 'Aktivan'),
(4, 'Petar', 'Petrovic', '13531224', 'Aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `ID` int(11) NOT NULL,
  `Marka` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Godiste` int(11) NOT NULL,
  `Registracija` varchar(20) NOT NULL,
  `Status` enum('Dostupno','Rezervisano','Na popravci') NOT NULL DEFAULT 'Dostupno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`ID`, `Marka`, `Model`, `Godiste`, `Registracija`, `Status`) VALUES
(1, 'Fiat', 'Doblo', 2022, 'BG-1237-ML', 'Na popravci'),
(2, 'Volkswagen', 'Caddy', 2021, 'NS-456-CD', 'Dostupno'),
(3, 'Fiat', 'Ducato', 2017, 'KG-789-EFF', 'Rezervisano'),
(4, 'Mercedes', 'Sprinter', 2019, 'NI-321-GHH', 'Dostupno'),
(25, 'Scania', 'RTX', 2020, 'BG-2246-ML', 'Dostupno'),
(26, 'Mercedes', 'Esprinter', 2018, 'BG-2281-IC', 'Rezervisano');

-- --------------------------------------------------------

--
-- Table structure for table `zahtevi`
--

CREATE TABLE `zahtevi` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `BrojDozvole` varchar(20) NOT NULL,
  `TipZahteva` enum('Tehnička podrška','Prijava problema','Ostalo','Zamena vozila','Zamena opreme') NOT NULL,
  `Opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zahtevi`
--

INSERT INTO `zahtevi` (`ID`, `Ime`, `Prezime`, `BrojDozvole`, `TipZahteva`, `Opis`) VALUES
(9, 'Marko', 'Petrovic', '22445678', 'Tehnička podrška', 'Potrebna podrska.'),
(35, 'Ivan', 'Ivanovic', '55667788', 'Zamena opreme', 'Oprema ne odgovara.'),
(36, 'Bojan', 'Mirkovic', '88762320', 'Zamena vozila', 'Vozilo ne odgovara potrebama.'),
(39, 'Milos', 'Milosevic', '12040045', 'Ostalo', 'Potrebna zamena uniforme.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `kvarovi`
--
ALTER TABLE `kvarovi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VoziloID` (`VoziloID`),
  ADD KEY `KorisnikID` (`KorisnikID`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KorisnikID` (`KorisnikID`),
  ADD KEY `VoziloID` (`VoziloID`);

--
-- Indexes for table `servisi`
--
ALTER TABLE `servisi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VoziloID` (`VoziloID`);

--
-- Indexes for table `vozaci`
--
ALTER TABLE `vozaci`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BrojDozvole` (`BrojDozvole`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Registracija` (`Registracija`);

--
-- Indexes for table `zahtevi`
--
ALTER TABLE `zahtevi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kvarovi`
--
ALTER TABLE `kvarovi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `servisi`
--
ALTER TABLE `servisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vozaci`
--
ALTER TABLE `vozaci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vozila`
--
ALTER TABLE `vozila`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `zahtevi`
--
ALTER TABLE `zahtevi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kvarovi`
--
ALTER TABLE `kvarovi`
  ADD CONSTRAINT `kvarovi_ibfk_1` FOREIGN KEY (`VoziloID`) REFERENCES `vozila` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `kvarovi_ibfk_2` FOREIGN KEY (`KorisnikID`) REFERENCES `korisnici` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `rezervacije_ibfk_1` FOREIGN KEY (`KorisnikID`) REFERENCES `korisnici` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `rezervacije_ibfk_2` FOREIGN KEY (`VoziloID`) REFERENCES `vozila` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `servisi`
--
ALTER TABLE `servisi`
  ADD CONSTRAINT `servisi_ibfk_1` FOREIGN KEY (`VoziloID`) REFERENCES `vozila` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
