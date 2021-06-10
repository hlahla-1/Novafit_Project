SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS webshop;
CREATE DATABASE webshop;
USE WEBSHOP;
--
-- Tabelstructuur voor tabel `inschrijvingen`
--

CREATE TABLE `inschrijvingen` (
  `inschrijvingenid` int(11) NOT NULL,
  `naam` varchar(60) NOT NULL,
  `adres` varchar(60) NOT NULL,
  `woonplaats` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `instructeur` varchar(60) NOT NULL,
  `soortgroepsles` varchar(20) NOT NULL,
  `startdatum` date NOT NULL,
  `aantallessen` int(6) NOT NULL,
  `prijsperles` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `inschrijvingen`
--

INSERT INTO `inschrijvingen` (`inschrijvingenid`, `naam`, `adres`, `woonplaats`, `email`, `telefoonnummer`, `instructeur`, `soortgroepsles`, `startdatum`, `aantallessen`, `prijsperles`) VALUES
(1, 'Christiano Ronaldo', 'Plaza 15', 'Haarlem', 'CR7@gmail.com', '0612345678', 'Tom van der Plas', 'Aerobic fit', '2021-05-01', 6, '29.99'),
(2, 'Lionel Messi', 'Schoorsteen 1', 'Haarlem', 'LM10@gmail.com', '0632176933', 'Tom van der Plas', 'Aerobic fit', '2021-06-01', 6, '29.99'),
(3, 'Frank de Boer', 'Hoofdstraat 12', 'Haarlem', 'FB2@gmail.com', '0609876543', 'Tom van der Plas', 'Aerobic fit', '2021-05-15', 6, '29.99'),
(4, 'Marcel de Jong', 'Kerkstraat 6', 'Haarlem', 'MDJ81@gmail.com', '062345671', 'Tom van der Plas', 'Aerobic fit', '2021-05-01', 6, '29.99'),
(5, 'KLaas de Waal', 'Stationsplein 211', 'Haarlem', 'klaaswW@yahoo.com', '063 45678', 'Tom van der Plas', 'Aerobic fit', '2021-07-01', 6, '29.99'),
(6, 'Ricardo Rijn', 'Trentje 32Plaza 15', 'Haarlem', 'rr5@gmail.com', '06456789123', 'Tom van der Plas', 'Aerobic fit', '2021-07-15', 6, '29.99'),
(7, 'Frenkie van Basten', 'Saharalaan 86', 'Hoofddorp', 'Frenkienr1@strato.nl', '0678901234', 'Tom van der Plas', 'Aerobic fit', '2021-01-01', 6, '29.99'),
(8, 'Lisa Steen', 'Chopinstraat 312', 'Hoofddorp', 'SteenLisa23@gmail.com', '0689012345', 'Tom van der Plas', 'Aerobic fit', '2021-01-01', 6, '29.99'),
(9, 'Graciano Pele', 'Abbapad 23', 'Amsterdam', 'Grpellatio@gmail.com', '0611223344', 'Tom van der Plas', 'Aerobic fit', '2021-06-15', 6, '29.99'),
(10, 'Samanta van Viet', 'Piet-Heinstraat 12', 'Amsterdam', 'SammieV@gmail.com', '062233445566', 'Tom van der Plas', 'Aerobic fit', '2021-05-01', 6, '29.99'),
(11, 'Maarten Vos', 'Balistraat 15', 'Delft', 'CR7@gmail.com', '0655667788', 'Mohamed Ali', 'Box Fit', '2021-05-01', 6, '49.50'),
(12, 'Jesse Law', 'Baluwsteeg 1', 'Delft', 'LM10@gmail.com', '0612213443', 'Mohamed Ali', 'Box Fit', '2021-06-01', 6, '49.50'),
(13, 'Evie Rijnink', 'Bagrijnhof 12', 'Delft', 'FB2@gmail.com', '0623323443', 'Mohamed Ali', 'Box Fit', '2021-05-15', 6, '49.50'),
(14, 'Justin Hemmer', 'Kerkstraat 6', 'Haarlem', 'MDJ81@gmail.com', '0656656776', 'Mohamed Ali', 'Box Fit', '2021-05-01', 6, '49.50'),
(15, 'Devin Laaren', 'Plantsoen 211', 'Haarlem', 'klaaswW@yahoo.com', '0689989009', 'Mohamed Ali', 'Box Fit', '2021-07-01', 6, '49.50'),
(16, 'Mohamed Basi', 'Balistraat 15', 'Delft', 'rr5@gmail.com', '0698765987', 'Mohamed Ali', 'Box Fit', '2021-07-15', 6, '49.50'),
(17, 'Camil Kalen', 'Saharalaan 86', 'Hoofddorp', 'Frenkienr1@strato.nl', '0665478562', 'Mohamed Ali', 'Box Fit', '2021-01-01', 6, '49.50'),
(18, 'Hanna de Gtoor', 'Beethovenlaan 312', 'Hoofddorp', 'SteenLisa23@gmail.com', '0626547821', 'Mohamed Ali', 'Box Fit', '2021-01-01', 6, '49.50'),
(19, 'Marlies Westen', 'Abbapad 23', 'Rotterdam', 'Grpellatio@gmail.com', '0623423568', 'Mohamed Ali', 'Box Fit', '2021-06-15', 6, '49.50'),
(20, 'Marcel Sammella', 'Piet-Heinstraat 12', 'Rotterdam', 'SammieV@gmail.com', '0619283735', 'Mohamed Ali', 'Box Fit', '2021-05-01', 6, '49.50'),
(21, 'Thijn van Vliet', 'Bachlaan 15', 'Haarlem', 'CR7@gmail.com', '0612375678', 'Bernadet Kamp', 'Bootcamp', '2021-05-01', 10, '23.25'),
(22, 'Ronald Rijkers', 'Berliozlaan 1', 'Haarlem', 'LM10@gmail.com', '0632176253', 'Bernadet Kamp', 'Bootcamp', '2021-06-01', 12, '23.25'),
(23, 'Sep de Bruin', 'Bizetstraat 12', 'Haarlem', 'FB2@gmail.com', '0603876573', 'Bernadet Kamp', 'Bootcamp', '2021-05-15', 5, '23.25'),
(24, 'Marcel de Jong', 'Borodinlaan 6', 'Zaandam', 'MDJ81@gmail.com', '062375671', 'Bernadet Kamp', 'Bootcamp', '2021-05-01', 7, '23.25'),
(25, 'Alex Chong', 'Brucknerplein 211', 'Zaandam', 'klaaswW@yahoo.com', '063 75678', 'Bernadet Kamp', 'Bootcamp', '2021-07-01', 7, '23.25'),
(26, 'Erik Bergwijn', 'Debussylaan 18', 'Haarlem', 'rr5@gmail.com', '06756783123', 'Bernadet Kamp', 'Bootcamp', '2021-07-15', 10, '23.25'),
(27, 'Jesse Wang', 'Nigeriaronde 686', 'Hoofddorp', 'Frenkienr1@strato.nl', '0678301237', 'Bernadet Kamp', 'Bootcamp', '2021-01-01', 6, '23.25'),
(28, 'Lars Hoogendoorn', 'Canada 312', 'Beverwijk', 'SteenLisa23@gmail.com', '0683012375', 'Bernadet Kamp', 'Bootcamp', '2021-01-01', 12, '23.25'),
(29, 'Timo van Eijk', 'Europa 23', 'Amsterdam', 'Grpellatio@gmail.com', '0611822564', 'Bernadet Kamp', 'Bootcamp', '2021-06-15', 14, '23.25'),
(30, 'Ron Schuurmans', 'Piet-Donnerlaan 12', 'Beverwijk', 'SammieV@gmail.com', '068225645502', 'Bernadet Kamp', 'Bootcamp', '2021-05-01', 8, '23.25'),
(31, 'Roben de Laat', 'Grieglaan 27', 'Rotterdam', 'CR7@gmail.com', '0655026488', 'Bowie aan de Vecht', 'Body Combat', '2021-05-01', 12, '73.50'),
(32, 'Robin Tijlema', 'BaljetSchouw 1', 'Delft', 'LM10@gmail.com', '0618213643', 'Bowie aan de Vecht', 'Body Combat', '2021-06-01', 3, '73.50'),
(33, 'Daks van der Ploeg', 'Mahlerplein 12', 'Delft', 'FB2@gmail.com', '0622523643', 'Bowie aan de Vecht', 'Body Combat', '2021-05-15', 1, '73.50'),
(34, 'Jack Hamerslag', 'Pergolesstraat 6', 'Haarlem', 'MDJ81@gmail.com', '0650256646', 'Bowie aan de Vecht', 'Body Combat', '2021-05-01', 9, '73.50'),
(35, 'Justin Bijlsma', 'PlaSchumalaan 211', 'Beverwijk', 'klaaswW@yahoo.com', '0682583003', 'Bowie aan de Vecht', 'Body Combat', '2021-07-01', 10, '73.50'),
(36, 'Ton de Smet', 'Westerplantsoen 15', 'Delft', 'rr5@gmail.com', '0638765387', 'Bowie aan de Vecht', 'Body Combat', '2021-07-15', 10, '73.50'),
(37, 'Trijntje van Westeren', 'Smetanalaan 86', 'Hoofddorp', 'Frenkienr1@strato.nl', '0025648562', 'Bowie aan de Vecht', 'Body Combat', '2021-01-01', 10, '73.50'),
(38, 'Marlies van Gameren', 'Beatlesweg 23', 'Rotterdam', 'Grpellatio@gmail.com', '0623723568', 'Bowie aan de Vecht', 'Body Combat', '2021-06-15', 12, '73.50'),
(39, 'Theo Ladiala', 'Diepenbrocklaan 12', 'Rotterdam', 'SammieV@gmail.com', '0613283735', 'Bowie aan de Vecht', 'Body Combat', '2021-05-01', 6, '73.50');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD PRIMARY KEY (`inschrijvingenid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  MODIFY `inschrijvingenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

CREATE TABLE `aanspreektitels` (
  `aanspreektitelid` int(11) NOT NULL,
  `omschrijving` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Gegevens worden geëxporteerd voor tabel `aanspreektitels`
--

INSERT INTO `aanspreektitels` (`aanspreektitelid`, `omschrijving`) VALUES
(1, 'De heer'),
(2, 'Mevrouw'),
(3, 'Overig');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikerid` int(11) NOT NULL,
  `aanspreektitelid` int(11) DEFAULT NULL,
  `achterncaam` varchar(30) DEFAULT NULL,
  `telefoonnummer` varchar(20) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `woonplaats` varchar(50) DEFAULT NULL,
  `inlognaam` varchar(20) DEFAULT NULL,
  `wachtwoord` varchar(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikerid`, `aanspreektitelid`, `achterncaam`, `telefoonnummer`, `adres`, `postcode`, `woonplaats`, `inlognaam`, `wachtwoord`, `email`) VALUES
(35, 1, 'van der Plant', '06-123455678', 'Dadelseweg 12', '2415PO', 'Haarlem', 'PlantJ', '123ik1964', 'PLant@yahoo.com'),
(36, 1, 'Messi', '06-12121212', 'Viaweg 21', '3415PO', 'Barcelona', 'MesL123', '123mes2964', 'Messietjet@gmail.com'),
(37, 2, 'Messi', '06-21212121', 'Viaweg 21', '3415PO', 'Barcelona', 'MesaL123', '123mes2964', 'Messianan@gmail.com'),
(38, 1, 'Ronaldo', '06-33333337', 'PCHoofdstraat 21', '2555PO', 'Amsterdam', 'R7R7R7', '123ron2964', 'Ron7@gmail.com'),
(39, 1, 'Jansen', '06-33333337', 'Kerkstraat 15', '3344PP', 'Haarlem', 'Jan123', '123jan2964', 'Jan7@gmail.com'),
(40, 2, 'Jansen', '06-23123123', 'Kerkstraat 15', '3344PP', 'Haarlem', 'Janine123', 'jani964', 'Janinna7@gmail.com'),
(41, 1, 'Pietersen', '06-33333337', 'Kerkstraat 16', '2211PO', 'Haarlem', 'Piet123', '123piet2964', 'Piet7@gmail.com'),
(42, 1, 'Karelsen', '06-33333337', 'Kerkstraat 20', '1122PO', 'Hoofddorp', 'Kar123', '123kar2964', 'Kar7@gmail.com'),
(43, 1, 'Karelsen', '06-33333337', 'Kerkstraat 20', '1122PO', 'Hoofddorp', 'Kar123', '123kar2964', 'Kar7@gmail.com'),
(44, 1, 'Knol', '06-33333337', 'Eerstestraat 19', '2555PO', 'Delft', 'R7R7R7', '123knollie', 'knol9@gmail.com'),
(45, 1, 'Haagens', '06-33333337', 'Tweedestraat 45', '3344PP', 'Delft', 'hagan123', 'Haegjun2964', 'haen7gmail.com'),
(46, 2, 'Jellya', '06-23123123', 'Nigeriastraat 34', '3344PP', 'Amsterdam', 'jelJanine123', 'Jel2002', 'Jelinna7gmail.com'),
(47, 1, 'De Jong', '06-33333337', 'Europalaan16', '2211PO', 'Haarlem', 'jng3', '123jo2001', 'Jong7@gmail.com'),
(48, 1, 'Memphis', '06-11111111', 'Azieweg 20', '1122PO', 'Haarlem', 'okedan56', '123mpdp964', 'dep7@gmail.com'),
(49, 1, 'Visser', '06-22222222', 'Belgiepad 1', '1122PO', 'Hoofddorp', 'noway321', '123vis4', 'vis6r7@gmail.com'),
(50, 3, 'Bakker', '06-88888885', 'Flatgebouw 673', '2211PO', 'Klazinaveen', 'Oneway', '123bakl2964', 'bakkiet7@gmail.com'),
(51, 2, 'NiceNienke', '06-56234522', 'AchterafWeg 89', '1234PO', 'Rotterdam', 'N4nicieNo', '123nice2964', 'NNNN@gmail.com'),
(52, 2, 'Stukken', '06-768768998', 'Dezeweg 33', '2255PO', 'Rotterdam', 'Kwebbela8', '123kwe2964', 'Stkreal@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanspreektitels`
--
ALTER TABLE `aanspreektitels`
  ADD PRIMARY KEY (`aanspreektitelid`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruikerid`),
  ADD KEY `aanspreektitelid` (`aanspreektitelid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanspreektitels`
--
ALTER TABLE `aanspreektitels`
  MODIFY `aanspreektitelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `gebruikers_ibfk_1` FOREIGN KEY (`aanspreektitelid`) REFERENCES `aanspreektitels` (`aanspreektitelid`);
COMMIT;