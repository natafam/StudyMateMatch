-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Maj 28, 2024 at 07:05 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StudyMateMatch`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Answers`
--

CREATE TABLE `Answers` (
  `Answer_ID` int(11) NOT NULL,
  `Answer` text DEFAULT NULL,
  `Answer_datetime` datetime DEFAULT NULL,
  `Question_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Lessons`
--

CREATE TABLE `Lessons` (
  `Lesson_ID` int(11) NOT NULL,
  `Student_name` varchar(50) DEFAULT NULL,
  `Student_surname` varchar(50) DEFAULT NULL,
  `Student_email` varchar(100) DEFAULT NULL,
  `Student_phone` varchar(11) DEFAULT NULL,
  `Lesson_date` date DEFAULT NULL,
  `Lesson_time` time DEFAULT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Teacher_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Questions`
--

CREATE TABLE `Questions` (
  `Question_ID` int(11) NOT NULL,
  `Question_text` text NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Question_datetime` datetime NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`Question_ID`, `Question_text`, `Subject`, `Question_datetime`, `User_ID`) VALUES
(1, 'Jaki jest pierwiastek kwadratowy z 16?', 'Matematyka', '2024-04-29 01:12:35', 1),
(2, 'Kto napisał \"Pana Tadeusza\"?', 'Polski', '2024-04-29 01:17:20', 2),
(3, 'Co powstaje w wyniku fotosyntezy?', 'Biologia', '2024-05-01 08:56:38', 4),
(4, 'Kto jest autorem teorii względności?', 'Fizyka', '2024-05-03 10:42:18', 2),
(5, 'Gdzie Wokulski po raz pierwszy zobaczył Izabelę Łęcką?', 'Polski', '2024-05-04 12:24:30', 1),
(6, 'Jak rozmnaża się pantofelek?', 'Biologia', '2024-05-04 13:02:35', 1),
(7, 'Czym się różni procedura od funkcji w SQL?', 'Informatyka', '2024-05-14 08:37:54', 5),
(8, 'Co to jest język programowania?', 'Informatyka', '2024-05-14 09:17:25', 5),
(9, 'Czym jest depresja?', 'Geografia', '2024-05-21 08:23:22', 4),
(10, 'Jakie są podstawowe zasady związane z prawem zachowania energii i jakie są ich praktyczne zastosowania?', 'Fizyka', '2024-05-21 08:45:44', 5),
(11, 'Gdzie rozgrywa się akcja \"Lalki\" B. Prusa?', 'Polski', '2024-05-21 08:49:12', 5),
(12, 'Do czego służy polecenie SELECT w SQL?', 'Informatyka', '2024-05-27 17:46:34', 6),
(13, 'Liczba Pi jest wymierna czy niewymierna?', 'Matematyka', '2024-05-27 17:49:30', 2),
(14, 'Co to znaczy liczba wymierna lub niewymierna?', 'Matematyka', '2024-05-27 17:53:23', 6),
(15, 'Ile to jest (2+2)/2?', 'Matematyka', '2024-05-27 18:06:08', 6),
(16, 'W jaki sposób S. Żeromski przedstawia młodość w utworze \"Przedwiośnie\"?', 'Polski', '2024-05-27 18:21:22', 3),
(17, 'Czym charakteryzuje się czas Present Continuous w języku angielskim i kiedy go używamy?', 'Angielski', '2024-05-28 06:14:16', 1),
(18, 'Czym charakteryzują się czasy Perfect w języku angielskim i kiedy ich używamy?', 'Angielski', '2024-05-28 06:27:09', 1),
(19, 'Co to za kwas o wzorze H2SO4?', 'Chemia', '2024-05-28 06:50:35', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Subjects`
--

CREATE TABLE `Subjects` (
  `Subject_ID` int(11) NOT NULL,
  `Subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`Subject_ID`, `Subject`) VALUES
(1, 'Matematyka'),
(2, 'Polski'),
(3, 'Angielski'),
(4, 'Biologia'),
(5, 'Fizyka'),
(6, 'Chemia'),
(7, 'Geografia'),
(8, 'Historia'),
(9, 'WOS'),
(10, 'Religia'),
(11, 'Informatyka'),
(12, 'Plastyka'),
(13, 'Historia sztuki'),
(14, 'Muzyka'),
(15, 'BiZ i PP'),
(16, 'EdB i BHP'),
(17, 'Niemiecki'),
(18, 'Hiszpański'),
(19, 'Włoski'),
(20, 'Francuski'),
(21, 'Rosyjski'),
(22, 'Inne języki obce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Teachers`
--

CREATE TABLE `Teachers` (
  `Teacher_ID` int(11) NOT NULL,
  `Teacher_name` varchar(50) DEFAULT NULL,
  `Teacher_surname` varchar(50) DEFAULT NULL,
  `Teacher_phone` varchar(11) DEFAULT NULL,
  `Teacher_email` varchar(254) DEFAULT NULL,
  `Teacher_password` varchar(100) DEFAULT NULL,
  `Subject_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`Teacher_ID`, `Teacher_name`, `Teacher_surname`, `Teacher_phone`, `Teacher_email`, `Teacher_password`, `Subject_ID`) VALUES
(1, 'Anna', 'Kowalska', '673753301', 'anna.kowalska@gmail.com', '$2y$10$pxgZ3fu9J9dEex5WMOLu2eZs36nKQSzqtpfIN07MxMd8Mw5QT8cWK', 7),
(2, 'Piotr', 'Nowicki', '267373364', 'piotr.nowicki@gmail.com', '$2y$10$3uXwJ/y.vYFU6AeAilCqd.WongyOaWglESP9VygQbQiMu5GetVgQG', 1),
(3, 'Monika', 'Zając', '906271501', 'monika.zajac@gmail.com', '$2y$10$dBZs5yA0woyIKEPppLHW6eYiwgYSC.GMZHEYhFgIVw22wRl2IXrzO', 4),
(4, 'Barbara', 'Nowak', '792530977', 'barbara.nowak@gmail.com', '$2y$10$QBo9kMNDdYYIihw7RH5TTuATtn9s9EAzYHCKt0Aa4Lgx7skp9jagi', 3),
(5, 'Jakub', 'Dąbrowski', '664391452', 'jakub.dabrowski@gmail.com', '$2y$10$mF8RXfUd/4zKYe0boc7SReqO0bmRdGVNW0G1zJzN71iP5igULuCYS', 2),
(6, 'Mateusz', 'Lewandowski', '339590350', 'mateusz.lewandowski@gmail.com', '$2y$10$F/W7nXP1PHm0VWTIVMxNtuNd5xnOkib/fpA5cSU/TtcdwzNEEpvTS', 5),
(7, 'Marta', 'Wiśniewska', '345678901', 'marta.wisniewska@gmail.com', '$2y$10$yul7C/uR9jMGHoVfneYYjerX2dMYrsD6grHnNri4ngC0u.Dfwp8bK', 6),
(8, 'Andrzej', 'Kamiński', '789012345', 'andrzej.kaminski@gmail.com', '$2y$10$clZxRZai8KAx07dekYZFi.qrkc9r61S10dDQ3cure3HpvhQ4RTr2S', 1),
(9, 'Magdalena', 'Wójcik', '456789012', 'magdalena.wojcik@gmail.com', '$2y$10$eFA.4JR09MUDtEe7Hg/APe9608CjZ/IlpAPyQ4aJ99LxGQB9RaeKK', 2),
(10, 'Aleksandra', 'Król', '901234567', 'aleksandra.krol@gmail.com', '$2y$10$IrxqbQUcBB54zSUt0sPDi.iHvB/uOTLvPnLrRRIIa2RPOU6Jx8R1q', 7),
(11, 'Paweł', 'Nowotny', '678901234', 'pawel.nowotny@gmail.com', '$2y$10$VHyVBhj2zk.96xbS6YS8Fe5ruIHld3l1IW2zmAukvey1S1elVzdkW', 11),
(12, 'Dorota', 'Piotrowska', '450987654', 'dorota.piotrowska@gmail.com', '$2y$10$7Udw7fKCH1veww5XGZBgeOzEbNAci/KlOYl9yX0oVa8Xsh.tgmLfG', 8),
(13, 'Grzegorz', 'Kaczmarek', '345098765', 'grzegorz.kaczmarek@gmail.com', '$2y$10$Sc8K4vdyOZlsV8wXKrTfnes.xvBs/Blm9cgWloukcRxxZaHw50P7i', 9),
(14, 'Paweł', 'Wojciechowski', '123450987', 'pawel.wojciechowski@gmail.com', '$2y$10$QrDGTjBZeO1Rc/XZuaoqdODZAGIkMb7eRSylVRYPDx/xYs9nN2Yoq', 9),
(15, 'Łukasz', 'Jankowski', '509876543', 'lukasz.jankowski@gmail.com', '$2y$10$5pCQvYNEEdgX1sKSG3LjPOb/PlRElTvsjJHADyXs1f2AfxfoB5D9K', 4),
(16, 'Jacek', 'Mazur', '987654321', 'jacek.mazur@gmail.com', '$2y$10$jmwyGNHVueQl7CIYoBTSDe5u8v3esnpgFxr1jg7ZJc4sLoIOcUcWK', 3),
(17, 'Natalia', 'Michalczyk', '876543210', 'natalia.michalczyk@gmail.com', '$2y$10$q1V9RQn81Cs2fhjTVmfBU.R8H3aTn2JHqbT7qDLRw9hY4VaO5tIEK', 2),
(18, 'Szymon', 'Tomczyk', '765432109', 'szymon.tomczyk@gmail.com', '$2y$10$MIGr8R6v8zY0PJVJMGfiWeu/oUHGHvrfF9vjXe19tmLmygax32N26', 16),
(19, 'Iwona', 'Grabowska', '654321098', 'iwona.grabowska@gmail.com', '$2y$10$2x9Udf66EfxmutcsaZrale4HydXd7W94Ws0bmBl.WXUDrw4lkCVUG', 9),
(20, 'Karolina', 'Krawczyk', '819463752', 'karolina.krawczyk@gmail.com', '$2y$10$1L/UwTduTqG8Cmco9D8lOuXHpGkePKI8cFpXp66e4g21CUA74hX1i', 5),
(21, 'Szymon', 'Mrozek', '567982156', 'szymon.mrozek@gmail.com', '$2y$10$74/ONdnWoMq8hoqdVs477eGzLokUv3yxC847Yw2uasROSvCV3866.', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(11) NOT NULL,
  `User_name` varchar(50) DEFAULT NULL,
  `User_surname` varchar(50) DEFAULT NULL,
  `User_nickname` varchar(70) DEFAULT NULL,
  `User_email` varchar(254) DEFAULT NULL,
  `User_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`User_ID`, `User_name`, `User_surname`, `User_nickname`, `User_email`, `User_password`) VALUES
(1, 'Natalia', 'Michałowska', 'natafam', 'natalia.michalowska@gmail.com', '$2y$10$GXnFPRJ8msV.2e4HrN29G.ydxCjrm3maZDBGJ7eALksL/IxTHybmW'),
(2, 'Jakub', 'Markiewicz', 'kubus', 'jakub.markiewicz@gmail.com', '$2y$10$9hBSDfNsetKuRpG04HDCu.Wxry4R860ScnnvTdi84/lJp5HnvPERe'),
(3, 'Daniel', 'Niekonieczny', 'nie_konieczny', 'daniel.niekonieczny@gmail.com', '$2y$10$H.nPyqo7ZuezKPEzN2X5veLFkB6zEAdil0GPt.H5y1Joa8ERQjylu'),
(4, 'Jakub', 'Stolarz', 'cieslak', 'jakub.stolarz@gmail.com', '$2y$10$OLV4dy4z1HtZEQ/JVWBOjesIraCRApUxVwcoGSWuD1eskDVnMeQE6'),
(5, 'Szymon', 'Mrotek', 'szymon', 'szymon.mrotek@gmail.com', '$2y$10$zwpuJ8D2/WI922wVJyRB7uX3rSQmaNlyrfCLkHMWxvmJmLCi14mT.'),
(6, 'Szymon', 'Siemionka', 'szymon.s', 'szymon.siemionka@gmail.com', '$2y$10$Ks.oEUVNa3D3FvXacz2kN.YxFKE47OiBLvP.4WttkmYnVvNOxx1ye');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`Answer_ID`);

--
-- Indeksy dla tabeli `Lessons`
--
ALTER TABLE `Lessons`
  ADD PRIMARY KEY (`Lesson_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`),
  ADD KEY `Teacher_ID` (`Teacher_ID`);

--
-- Indeksy dla tabeli `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indeksy dla tabeli `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indeksy dla tabeli `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indeksy dla tabeli `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Lessons`
--
ALTER TABLE `Lessons`
  MODIFY `Lesson_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `Questions` (`Question_ID`);

--
-- Constraints for table `Lessons`
--
ALTER TABLE `Lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `Subjects` (`Subject_ID`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `Subjects` (`Subject_ID`),
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teachers` (`Teacher_ID`);

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD CONSTRAINT `Subject_ID` FOREIGN KEY (`Subject_ID`) REFERENCES `Subjects` (`Subject_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
