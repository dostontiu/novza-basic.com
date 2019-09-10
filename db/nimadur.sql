-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2017 г., 23:53
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `novza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `full_name` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(32) NOT NULL,
  `postal_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`) VALUES
(1, 'Doston', 'Ismailov');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `reys_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `count_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`, `reys_id`, `region_id`, `count_people`) VALUES
(1, 'Toshkent-1', 1, 2, 50),
(2, 'Toshkent-2', 1, 2, 100),
(3, 'Samarqand-1', 2, 4, 50),
(4, 'Samarqand-2', 2, 4, 51),
(5, 'Samarqand-3', 2, 4, 53);

-- --------------------------------------------------------

--
-- Структура таблицы `malumot`
--

CREATE TABLE `malumot` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(25) NOT NULL,
  `p_number` varchar(9) NOT NULL,
  `d_birth` date NOT NULL,
  `gender` enum('0','1') NOT NULL,
  `ex_date` date NOT NULL,
  `is_date` date NOT NULL,
  `today` datetime DEFAULT NULL,
  `sent` enum('0','1') NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `malumot`
--

INSERT INTO `malumot` (`id`, `surname`, `name`, `p_number`, `d_birth`, `gender`, `ex_date`, `is_date`, `today`, `sent`, `group_id`) VALUES
(1, 'ISMAILOV!!!!Doston', 'Muhammadqodirjonxonbek', 'KA0741341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 4),
(2, 'YUSUPOV', 'Jahongir', 'AA0741341', '2015-03-14', '1', '2026-02-10', '2016-02-10', NULL, '0', 2),
(5, 'MUHAMMADYUSUPOV', 'Jahongir', 'TA0741341', '2015-03-14', '1', '2026-02-10', '2016-02-10', NULL, '0', 5),
(6, 'ISMAILOV', 'Jahongir', 'KK0741341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 3),
(7, 'Axmadjonov', 'Akbarjon', 'AA6297895', '1995-11-12', '1', '1995-11-12', '1995-11-12', '1995-11-12 00:00:00', '1', 1),
(8, '', '', 'AA6297891', '1995-11-12', '1', '1995-11-12', '1995-11-12', '1995-11-12 00:00:00', '1', 1),
(9, 'fererg', 'fwfw', 'few', '0000-00-00', '0', '0000-00-00', '0000-00-00', NULL, '1', 1),
(21, '', '', '', '0000-00-00', '0', '0000-00-00', '1970-01-01', '2017-10-16 00:00:00', '1', 3),
(31, 'KODIROVA', 'DJAMILA', 'AB5933735', '1974-07-14', '1', '2027-02-13', '2017-02-14', '2017-10-16 00:00:00', '1', 1),
(32, 'KODIROVA', 'DJAMILA', 'AH5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 02:32:18', '0', 4),
(33, 'KODIROVA', 'DJAMILA', 'Aa5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 03:30:45', '0', 4),
(34, 'KODIROVA', 'DJAMILA', 'Ay5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 03:34:22', '0', 4),
(35, 'KODIROVA', 'DJAMILA', 'AB4933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 01:07:16', '0', 3),
(36, 'KODIROVA', 'DJAMILA', 'DB5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:15', '0', 3),
(37, 'KODIROVA', 'DJAMILA', 'AB5933535', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:27', '0', 3),
(38, 'KODIROVA', 'DJAMILA', 'AB5433735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:36', '0', 3),
(39, 'KODIROVA', 'DJAMILA', 'AO5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:42', '0', 3),
(40, 'KODIROVA', 'DJAMILA', 'AB5333735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:45:06', '0', 3),
(41, 'KODIROVA', 'DJAMILA', 'AB5933635', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:45:28', '0', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `po`
--

INSERT INTO `po` (`id`, `po_no`, `description`) VALUES
(1, 'po no 1', 'descr'),
(2, 'grrg', 'egwre'),
(3, 'egegjei', 'gienerkn');

-- --------------------------------------------------------

--
-- Структура таблицы `po_item`
--

CREATE TABLE `po_item` (
  `id` int(11) NOT NULL,
  `po_item_no` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `count_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `count_people`) VALUES
(1, 'Qoraqalpog\'iston Respublikasi', 100),
(2, 'Toshkent shahri', 1000),
(3, 'Toshkent viloyati', 500),
(4, 'Samarqand viloyati', 450),
(13, 'Beruniy', 100),
(21, 'Darhon', 221),
(22, 'Darhon', 221);

-- --------------------------------------------------------

--
-- Структура таблицы `reys`
--

CREATE TABLE `reys` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `depart_date` datetime NOT NULL,
  `arrive_date` datetime NOT NULL,
  `count_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reys`
--

INSERT INTO `reys` (`id`, `name`, `depart_date`, `arrive_date`, `count_people`) VALUES
(1, 1, '2018-03-14 08:00:00', '2018-03-24 08:00:00', 200),
(2, 2, '2018-03-15 08:00:00', '2018-03-25 08:00:00', 201);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('user','admin','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `name`, `role`) VALUES
(1, 'admin', '$2y$13$DkpmebSp8nvl5AHPpZE.Zetyl6TwJeyFHZ/JrRcPsAMh0PFrobRbe', 'p_LUTx5Pro2OwKAACXjREHMffavN43MV', 'Ismailov Doston', 'owner');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `reys_id` (`reys_id`);

--
-- Индексы таблицы `malumot`
--
ALTER TABLE `malumot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_number` (`p_number`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `po_item`
--
ALTER TABLE `po_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reys`
--
ALTER TABLE `reys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `malumot`
--
ALTER TABLE `malumot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `po_item`
--
ALTER TABLE `po_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `reys`
--
ALTER TABLE `reys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Ограничения внешнего ключа таблицы `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`reys_id`) REFERENCES `reys` (`id`);

--
-- Ограничения внешнего ключа таблицы `malumot`
--
ALTER TABLE `malumot`
  ADD CONSTRAINT `malumot_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
