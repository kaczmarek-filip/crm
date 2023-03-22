-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Mar 2023, 21:37
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `crm`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `ulica` varchar(255) NOT NULL,
  `numer_domu` varchar(255) NOT NULL,
  `numer_mieszkania` varchar(255) DEFAULT NULL,
  `kod_pocztowy` varchar(10) NOT NULL,
  `miasto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`address_id`, `pesel`, `ulica`, `numer_domu`, `numer_mieszkania`, `kod_pocztowy`, `miasto`) VALUES
(1, '02322106075', 'Reymonta', '67', '13', '05-400', 'Otwock'),
(2, '12345678912', 'Kowalska', '11', NULL, '123-45', 'Warszawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal`
--

CREATE TABLE `personal` (
  `pesel` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_klienta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `personal`
--

INSERT INTO `personal` (`pesel`, `name`, `surname`, `email`, `id_klienta`) VALUES
('02322106075', 'Filip', 'Kaczmarek', 'fkaczmarekf@gmail.com', '8291758'),
('12345678912', 'Jan', 'Kowalski', 'jan.kowalski@gmail.com', '4123145');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umowy`
--

CREATE TABLE `umowy` (
  `pesel` varchar(11) NOT NULL,
  `numer_umowy` varchar(255) NOT NULL,
  `kontrakty` varchar(255) NOT NULL,
  `data_utworzenia` date NOT NULL,
  `system_tworzacy` varchar(255) NOT NULL,
  `data_przekazania_do_realizacji` date NOT NULL,
  `system_przekazujacy_do_realizacji` varchar(255) NOT NULL,
  `osoba_przekazujaca_do_realizacji` varchar(255) NOT NULL,
  `poziom_negocjacji` varchar(255) NOT NULL,
  `pakiet_podstawowy` varchar(255) NOT NULL,
  `pakiety_dodatkowe` varchar(255) NOT NULL,
  `id_konta` varchar(255) NOT NULL,
  `id_kontraktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `umowy`
--

INSERT INTO `umowy` (`pesel`, `numer_umowy`, `kontrakty`, `data_utworzenia`, `system_tworzacy`, `data_przekazania_do_realizacji`, `system_przekazujacy_do_realizacji`, `osoba_przekazujaca_do_realizacji`, `poziom_negocjacji`, `pakiet_podstawowy`, `pakiety_dodatkowe`, `id_konta`, `id_kontraktu`) VALUES
('02322106075', 'U2023-182-123-512', '156443115', '2023-03-08', 'CTI', '2023-03-08', 'CTI', 'Filip Kaczmarek (HWU)', '', 'L', 'HBO + HBO Max', '1920472', '156443115');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `pesel` varchar(11) NOT NULL,
  `numer_zamowienia` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `proces` text NOT NULL,
  `data_utworzenia` date NOT NULL,
  `system_tworzacy` varchar(255) NOT NULL,
  `osoba_tworzaca` varchar(255) NOT NULL,
  `kanal_ofertowania` text NOT NULL,
  `kanal_realizacji` text NOT NULL,
  `sprzet` varchar(255) NOT NULL,
  `data_przekazania_do_realizacji` date NOT NULL,
  `system_przekazujacy_do_realizacji` varchar(255) NOT NULL,
  `osoba_przekazujaca_do_realizacji` varchar(255) NOT NULL,
  `kanal_akceptacji` text NOT NULL,
  `numer_listu_przewozowego` varchar(255) NOT NULL,
  `status_weryfikacji` text NOT NULL,
  `numer_sprawy_crm` varchar(255) NOT NULL,
  `komorka_przetwarzajaca` varchar(255) NOT NULL,
  `typ_migracji` text NOT NULL,
  `poziom_negocjacji` varchar(255) NOT NULL,
  `kwota_kaucji` varchar(255) NOT NULL,
  `oferta_gotowa` varchar(255) NOT NULL,
  `generacja` varchar(255) NOT NULL,
  `kontrakty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`pesel`, `numer_zamowienia`, `status`, `proces`, `data_utworzenia`, `system_tworzacy`, `osoba_tworzaca`, `kanal_ofertowania`, `kanal_realizacji`, `sprzet`, `data_przekazania_do_realizacji`, `system_przekazujacy_do_realizacji`, `osoba_przekazujaca_do_realizacji`, `kanal_akceptacji`, `numer_listu_przewozowego`, `status_weryfikacji`, `numer_sprawy_crm`, `komorka_przetwarzajaca`, `typ_migracji`, `poziom_negocjacji`, `kwota_kaucji`, `oferta_gotowa`, `generacja`, `kontrakty`) VALUES
('02322106075', 'Z2023-012-123-512', 'Wysłano przesyłkę', 'Utrzymanie', '2023-03-20', 'CTI', 'Aleksandra Bereza (ZS7)', 'Telefon', 'Kurier', 'nie', '2023-03-20', 'CTI', 'Aleksandra Bereza (ZS7)', 'brak', '658484839', 'brak', 'brak', 'brak', 'Upgrade', 'Poziom 3', '0,00 PLN', 'brak', 'Utrzymanie NCP - oferty SPECJALNE', '156443115'),
('12345678912', 'Z2023-582-102-123', 'Zakończono przetwarzanie zamówienia', 'Utrzymanie', '2023-03-20', 'CTI', 'Filip Kaczmarek (HWU)', 'Telefon', 'SMS', 'nie', '2023-03-20', 'CTI', 'Filip Kaczmarek (HWU)', 'brak', '283182847', 'brak', 'brak', 'brak', 'Downgrade', 'Poziom 3', '400,00 PLN', 'brak', 'Utrzymanie NCP - oferty SPECJALNE', '281948271'),
('12345678912', 'Z2023-148-420-124', 'Wysłano przesyłkę', 'Utrzymanie', '2023-03-20', 'CTI', 'Aleksandra Bereza (ZS7)', 'Telefon', 'Kurier', 'nie', '2023-03-20', 'CTI', 'Aleksandra Bereza (ZS7)', 'brak', '658484839', 'brak', 'brak', 'brak', 'Upgrade', 'Poziom 3', '0,00 PLN', 'brak', 'Utrzymanie NCP - oferty SPECJALNE', '581028564'),
('02322106075', 'Z2023-918-212-382', 'Zakończono przetwarzanie zamówienia', 'Utrzymanie', '2023-03-20', 'CTI', 'Filip Kaczmarek (HWU)', 'Telefon', 'SMS', 'nie', '2023-03-20', 'CTI', 'Filip Kaczmarek (HWU)', 'brak', '283182847', 'brak', 'brak', 'brak', 'Downgrade', 'Poziom 3', '400,00 PLN', 'brak', 'Utrzymanie NCP - oferty SPECJALNE', '2918275627');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `pesel` (`pesel`);

--
-- Indeksy dla tabeli `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`pesel`);

--
-- Indeksy dla tabeli `umowy`
--
ALTER TABLE `umowy`
  ADD KEY `pesel` (`pesel`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD KEY `pesel` (`pesel`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`pesel`) REFERENCES `personal` (`pesel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `umowy`
--
ALTER TABLE `umowy`
  ADD CONSTRAINT `umowy_ibfk_1` FOREIGN KEY (`pesel`) REFERENCES `personal` (`pesel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`pesel`) REFERENCES `personal` (`pesel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
