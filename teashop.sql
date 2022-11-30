-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2022, 19:54
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `teashop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `cart_user_id` int(64) NOT NULL,
  `cart_item_id` int(64) NOT NULL,
  `cart_item_ammount` int(64) NOT NULL,
  `cart_payment_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`cart_user_id`, `cart_item_id`, `cart_item_ammount`, `cart_payment_type`) VALUES
(1, 3, 1, 'paypal'),
(1, 1, 1, 'bank'),
(1, 2, 1, 'blik'),
(1, 3, 1, 'paypal'),
(1, 2, 1, 'bank'),
(1, 1, 1, 'paypal'),
(1, 2, 1, 'paypal'),
(2, 1, 1, 'bank');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_id` int(64) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Green'),
(2, 'White'),
(3, 'Black'),
(4, 'Yellow');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `item_id` int(64) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` int(64) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_category`, `item_desc`, `item_price`, `item_image`) VALUES
(1, 'Assam', 3, 'Full bodied, strong and distinctively malty tea from the lowlands of Assam.\r\n', 2, 'https://m.media-amazon.com/images/I/61HgurREw0L.jpg'),
(2, 'Munnar', 3, 'This variety produces a strong bodied golden yellow liquor with refreshing briskness and a hint of fruit. It has a medium toned fragrance, that is akin to malted biscuits', 5, 'https://kdhptea.com/wp-content/uploads/2021/02/Ripple-Premium-Black-Tea-With-Rose-Container-125g-FOP.jpg'),
(3, 'Tasty Leaf tea', 2, 'xaxaxaxzjsidhh', 3, 'https://m.media-amazon.com/images/I/81oNwuqT8cL._SX522_.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(64) NOT NULL,
  `username` varchar(124) NOT NULL,
  `email` varchar(124) NOT NULL,
  `password` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Jacek', 'januszek@gmail.com', 'aaa'),
(2, 'Andrzej', 'andrzejek@gmail.com', 'aaa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD KEY `cart_user_id` (`cart_user_id`) USING BTREE,
  ADD KEY `cart_item_id` (`cart_item_id`) USING BTREE;

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_category`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
