-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 07, 2023 alle 16:08
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogana`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `addetti`
--

CREATE TABLE `addetti` (
  `CodAddetto` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Funzionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `addetti`
--

INSERT INTO `addetti` (`CodAddetto`, `Nome`, `Cognome`, `Password`, `Funzionario`) VALUES
(1, 'Mario', 'Rossi', 'dbiwq39812', 1),
(2, 'Dario', 'Bruno', 'a', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `aereoporti`
--

CREATE TABLE `aereoporti` (
  `CodAereoporto` varchar(3) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Indirizzo` varchar(50) NOT NULL,
  `Citta` varchar(20) NOT NULL,
  `Stato` varchar(25) NOT NULL,
  `Cap` int(11) NOT NULL,
  `Latitudine` varchar(25) NOT NULL,
  `Longitudine` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `aereoporti`
--

INSERT INTO `aereoporti` (`CodAereoporto`, `Nome`, `Indirizzo`, `Citta`, `Stato`, `Cap`, `Latitudine`, `Longitudine`) VALUES
('AMS', 'Aeroporto di Amsterdam-Schiphol', 'Evert van de Beekstraat 202', 'Amsterdam', 'Paesi Bassi', 1118, '52.3105', '4.7683'),
('CDG', 'Aeroporto di Parigi-Charles de Gaulle', '95700 Roissy-en-France', 'Parigi', 'Francia', 95700, '49.0097', '2.5479'),
('DXB', 'Aeroporto Internazionale di Dubai', 'Dubai Al Caedia 56', 'Dubai', 'Emirati Arabi Uniti', 213, '25.2528', '55.3644'),
('FCO', 'Aeroporto di Roma-Fiumicino', 'Via dell\'Aeroporto di Fiumicino', 'Fiumicino', 'Italia', 54, '41.8003', '12.2388'),
('HKG', 'Aeroporto Internazionale di Hong Kong', '1 Sky Plaza Rd', 'Hong Kong', 'Cina', 654, '22.3080', '113.9185'),
('JFK', 'Aeroporto Internazionale John F. Kennedy', 'JFK Access Rd, Jamaica', 'New York City', 'Stati Uniti', 11430, '40.6413', '-73.7781'),
('LAX', 'Aeroporto Internazionale di Los Angeles', '1 World Way', 'Los Angeles', 'Stati Uniti', 90045, '33.9416', '-118.4085'),
('LHR', 'Aeroporto di Londra-Heathrow', 'Longford, Hounslow TW6', 'Londra', 'Regno Unito', 9454, '51.4700', '-0.4543'),
('NRT', 'Aeroporto Internazionale di Narita', '1-1 Furugome, Narita', 'Narita', 'Giappone', 286, '35.7647', '140.3863'),
('SYD', 'Aeroporto Internazionale di Sydney', 'Mascot NSW 2020', 'Sydney', 'Australia', 2020, '-33.9461', '151.1772');

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `CodCategoria` int(11) NOT NULL,
  `Categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`CodCategoria`, `Categoria`) VALUES
(1, 'Alimentare'),
(2, 'Abbigliamento'),
(3, 'Elettronica'),
(4, 'Cosmetici'),
(5, 'Calzature'),
(6, 'Libri'),
(7, 'Gioielli'),
(8, 'Articoli da toeletta'),
(9, 'Attrezzature sportive'),
(10, 'Oggetti pericolosi'),
(11, 'Scarpe');

-- --------------------------------------------------------

--
-- Struttura della tabella `controlli`
--

CREATE TABLE `controlli` (
  `CodControllo` int(11) NOT NULL,
  `CodAddetto` int(11) NOT NULL,
  `CodMerce` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `OraFine` time NOT NULL,
  `Esito` varchar(50) NOT NULL,
  `ImportoDazio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `controlli`
--

INSERT INTO `controlli` (`CodControllo`, `CodAddetto`, `CodMerce`, `Data`, `Ora`, `OraFine`, `Esito`, `ImportoDazio`) VALUES
(9, 2, 14, '2023-04-26', '16:50:28', '16:54:03', 'Confisca', 3123),
(10, 2, 15, '2023-05-07', '15:58:04', '15:58:35', 'Confisca', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `funzionari`
--

CREATE TABLE `funzionari` (
  `CodFunz` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `funzionari`
--

INSERT INTO `funzionari` (`CodFunz`, `Nome`, `Cognome`) VALUES
(1, 'Filippo', 'Luigini');

-- --------------------------------------------------------

--
-- Struttura della tabella `merci`
--

CREATE TABLE `merci` (
  `codMerce` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Categoria` int(11) NOT NULL,
  `Note` varchar(100) DEFAULT NULL,
  `Qt` float NOT NULL,
  `Unita` varchar(2) NOT NULL,
  `codPasseggero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `merci`
--

INSERT INTO `merci` (`codMerce`, `Nome`, `Categoria`, `Note`, `Qt`, `Unita`, `codPasseggero`) VALUES
(13, 'Nike jordan 32', 11, 'Originali', 1, 'Pz', 7),
(14, 'Nike jordan 33', 3, 'Originali', 22, 'Pz', 7),
(15, 'Bottiglia', 1, 'Acqua', 2, 'Pz', 16);

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggeri`
--

CREATE TABLE `passeggeri` (
  `codPasseggero` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Sesso` char(1) NOT NULL,
  `DataNascita` date NOT NULL,
  `Nazione` varchar(20) NOT NULL,
  `CartaIde` varchar(12) NOT NULL,
  `Passaporto` varchar(12) DEFAULT NULL,
  `StatoControllo` varchar(15) NOT NULL,
  `Contestazione` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `passeggeri`
--

INSERT INTO `passeggeri` (`codPasseggero`, `Nome`, `Cognome`, `Sesso`, `DataNascita`, `Nazione`, `CartaIde`, `Passaporto`, `StatoControllo`, `Contestazione`) VALUES
(5, 'Piero', 'Marci', 'M', '2004-05-07', 'ITALIA', 'cccdd', '', 'Ammesso', 'si'),
(6, 'Antonia', 'Salerno', 'F', '1999-03-12', 'Albania', 'dsfsdf', '21sQ2', '', ''),
(7, 'Marco', 'dawewe', 'M', '2004-06-07', 'Italia', '3123123', '3123das', '', ''),
(12, 'Marco', 'Ristorto', 'F', '2020-02-02', 'Perù', 'lololo2', '', '', ''),
(15, 'Marco', 'Ristorto', 'F', '1988-02-22', 'Somalia', 'wewewe', '', '', ''),
(16, 'Sofia', 'Augusti', 'F', '2009-12-23', 'Francia', '31423463564', '', 'Ammesso', 'no');

-- --------------------------------------------------------

--
-- Struttura della tabella `punticontrollo`
--

CREATE TABLE `punticontrollo` (
  `CodPuntoControllo` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `punticontrollo`
--

INSERT INTO `punticontrollo` (`CodPuntoControllo`, `nome`, `descrizione`) VALUES
(1, 'Check-in-nord', 'Punto di controllo dove i passeggeri effettuano il check-in per il volo.'),
(2, 'Check-in-est', 'Punto di controllo dove i passeggeri vengono sottoposti ai controlli di sicurezza prima dell\'imbarco'),
(3, 'Check-in-sud', 'Punto di controllo dove i passeggeri vengono controllati per eventuali violazioni delle norme dogana'),
(4, 'Check-in-oves', 'Punto di controllo dove i passeggeri effettuano l\'imbarco sul volo.'),
(5, 'Emergency Exit', 'Punto di controllo dove i passeggeri che si trovano nelle file degli emergency exit vengono sottopos'),
(6, 'Esteri', 'Punto di controllo dove i passeggeri effettuano il controllo dei passaporti per i voli internazional');

-- --------------------------------------------------------

--
-- Struttura della tabella `turni`
--

CREATE TABLE `turni` (
  `codTurno` int(11) NOT NULL,
  `Addetto` int(11) NOT NULL,
  `PuntoControllo` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `DataFine` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `turni`
--

INSERT INTO `turni` (`codTurno`, `Addetto`, `PuntoControllo`, `Data`, `DataFine`) VALUES
(15, 2, 1, '2023-04-21 21:01:21', '2023-04-21 22:15:00'),
(16, 2, 6, '2023-04-21 22:15:57', '2023-04-21 22:21:35'),
(17, 2, 1, '2023-04-21 22:22:21', NULL),
(18, 2, 1, '2023-04-22 13:51:50', NULL),
(19, 2, 1, '2023-04-26 16:37:46', '2023-04-26 16:54:14'),
(20, 2, 5, '2023-04-26 17:02:14', '2023-04-26 17:06:28'),
(21, 2, 1, '2023-04-26 17:08:07', NULL),
(22, 2, 1, '2023-05-07 15:30:38', '2023-05-07 15:44:11'),
(23, 2, 1, '2023-05-07 15:46:49', '2023-05-07 16:05:20');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addetti`
--
ALTER TABLE `addetti`
  ADD PRIMARY KEY (`CodAddetto`);

--
-- Indici per le tabelle `aereoporti`
--
ALTER TABLE `aereoporti`
  ADD PRIMARY KEY (`CodAereoporto`),
  ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CodCategoria`);

--
-- Indici per le tabelle `controlli`
--
ALTER TABLE `controlli`
  ADD PRIMARY KEY (`CodControllo`),
  ADD KEY `CodAddetto` (`CodAddetto`),
  ADD KEY `CodMerce` (`CodMerce`);

--
-- Indici per le tabelle `funzionari`
--
ALTER TABLE `funzionari`
  ADD PRIMARY KEY (`CodFunz`);

--
-- Indici per le tabelle `merci`
--
ALTER TABLE `merci`
  ADD PRIMARY KEY (`codMerce`),
  ADD KEY `codPasseggero` (`codPasseggero`),
  ADD KEY `Categoria` (`Categoria`);

--
-- Indici per le tabelle `passeggeri`
--
ALTER TABLE `passeggeri`
  ADD PRIMARY KEY (`codPasseggero`),
  ADD UNIQUE KEY `CartaIde` (`CartaIde`);

--
-- Indici per le tabelle `punticontrollo`
--
ALTER TABLE `punticontrollo`
  ADD PRIMARY KEY (`CodPuntoControllo`);

--
-- Indici per le tabelle `turni`
--
ALTER TABLE `turni`
  ADD PRIMARY KEY (`codTurno`),
  ADD KEY `Addettto` (`Addetto`),
  ADD KEY `PuntoControllo` (`PuntoControllo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addetti`
--
ALTER TABLE `addetti`
  MODIFY `CodAddetto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CodCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `controlli`
--
ALTER TABLE `controlli`
  MODIFY `CodControllo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `funzionari`
--
ALTER TABLE `funzionari`
  MODIFY `CodFunz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `merci`
--
ALTER TABLE `merci`
  MODIFY `codMerce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `passeggeri`
--
ALTER TABLE `passeggeri`
  MODIFY `codPasseggero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `punticontrollo`
--
ALTER TABLE `punticontrollo`
  MODIFY `CodPuntoControllo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `turni`
--
ALTER TABLE `turni`
  MODIFY `codTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `controlli`
--
ALTER TABLE `controlli`
  ADD CONSTRAINT `CodAddetto` FOREIGN KEY (`CodAddetto`) REFERENCES `addetti` (`CodAddetto`),
  ADD CONSTRAINT `CodMerce` FOREIGN KEY (`CodMerce`) REFERENCES `merci` (`codMerce`);

--
-- Limiti per la tabella `merci`
--
ALTER TABLE `merci`
  ADD CONSTRAINT `Categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorie` (`CodCategoria`),
  ADD CONSTRAINT `codPasseggero` FOREIGN KEY (`codPasseggero`) REFERENCES `passeggeri` (`codPasseggero`);

--
-- Limiti per la tabella `turni`
--
ALTER TABLE `turni`
  ADD CONSTRAINT `PuntoControllo` FOREIGN KEY (`PuntoControllo`) REFERENCES `punticontrollo` (`CodPuntoControllo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
