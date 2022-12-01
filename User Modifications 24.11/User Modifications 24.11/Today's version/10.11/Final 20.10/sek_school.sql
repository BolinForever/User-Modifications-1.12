-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2022, 21:51
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sek_school`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `IDclass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IDClass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `IDsubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`login`, `pass`) VALUES
('123abc', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b'),
('abc', 'a9993e364706816aba3e25717850c26c9cd0d89d'),
('abc123', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_classstudent` (`IDclass`);

--
-- Indeksy dla tabeli `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_subjectclass` (`IDClass`);

--
-- Indeksy dla tabeli `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_subjectteacher` (`IDsubject`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_classstudent` FOREIGN KEY (`IDclass`) REFERENCES `class` (`ID`);

--
-- Ograniczenia dla tabeli `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `FK_subjectclass` FOREIGN KEY (`IDClass`) REFERENCES `class` (`ID`);

--
-- Ograniczenia dla tabeli `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `FK_subjectteacher` FOREIGN KEY (`IDsubject`) REFERENCES `subject` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
