-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 10 2019 г., 06:28
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
  `full_name` varchar(128) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(32) NOT NULL,
  `country` varchar(64) NOT NULL,
  `postal_code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`) VALUES
(1, 'Doston', 'Ismailov');

-- --------------------------------------------------------

--
-- Структура таблицы `function`
--

CREATE TABLE `function` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `function`
--

INSERT INTO `function` (`id`, `name`) VALUES
(1, 'Ziyoratchi'),
(3, 'Delegatsiya'),
(4, 'Shifokor'),
(5, 'Ishchi guruh'),
(6, 'Oshpaz'),
(7, 'huhikj');

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
(3, 'Samarqand-1', 12, 4, 75),
(4, 'Samarqand-2', 12, 4, 51),
(5, 'Samarqand-3', 12, 4, 79),
(7, '111111', 16, 1, 111111),
(8, 'fqfq', 16, 1, 1651),
(9, 'fqfqwfqw', 16, 1, 165);

-- --------------------------------------------------------

--
-- Структура таблицы `mahram_name`
--

CREATE TABLE `mahram_name` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mahram_name`
--

INSERT INTO `mahram_name` (`id`, `name`) VALUES
(1, 'Husband'),
(2, 'Father'),
(3, 'Brother');

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
  `sent` enum('0','1') NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL DEFAULT '1',
  `mahram_id` int(11) DEFAULT NULL,
  `mahram_name_id` int(11) DEFAULT NULL,
  `tel_number` varchar(25) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `malumot`
--

INSERT INTO `malumot` (`id`, `surname`, `name`, `p_number`, `d_birth`, `gender`, `ex_date`, `is_date`, `today`, `sent`, `group_id`, `user_id`, `function_id`, `mahram_id`, `mahram_name_id`, `tel_number`, `address`) VALUES
(2, 'YUSUPOV', 'Jahongir', 'AA0741341', '2015-03-14', '1', '2026-02-10', '2016-02-10', NULL, '0', 5, 1, 5, NULL, NULL, '', ''),
(5, 'MUHAMMADYUSUPOV', 'Jahongir', 'TA0741341', '2015-03-14', '1', '2026-02-10', '2016-02-10', NULL, '0', 4, 2, 1, NULL, NULL, '', ''),
(6, 'ISMAILOV', 'Jahongir', 'KK0741341', '1995-03-14', '0', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 1, 1, 3, NULL, NULL, '123', ''),
(7, 'Axmadjonov', 'Akbarjon', 'AA6297895', '1995-11-12', '1', '1995-11-12', '1995-11-12', '1995-11-12 00:00:00', '1', 1, 1, 1, NULL, NULL, '', ''),
(8, 'Ismaillov', 'Doston', 'AA6297891', '1995-11-12', '1', '1995-11-12', '1995-11-12', '1995-11-12 00:00:00', '1', 1, 1, 1, NULL, NULL, '', ''),
(9, 'fererg', 'fwfw', 'AA1247998', '2018-01-10', '1', '0000-00-00', '2017-12-27', NULL, '1', 1, 1, 4, NULL, NULL, '', ''),
(21, 'Kimsanov', 'Kimsan', 'AA1234852', '0000-00-00', '0', '0000-00-00', '1970-01-01', '2017-10-16 00:00:00', '1', 3, 1, 1, NULL, NULL, '', ''),
(31, 'KODIROVA', 'DJAMILA', 'AB5933735', '1974-07-14', '1', '2027-02-13', '2017-02-14', '2017-10-16 00:00:00', '1', 1, 1, 5, NULL, NULL, '', ''),
(32, 'KODIROVA', 'DJAMILA', 'AH5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 02:32:18', '0', 4, 1, 1, NULL, NULL, '', ''),
(33, 'KODIROVA', 'DJAMILA', 'Aa5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 03:30:45', '0', 4, 1, 1, NULL, NULL, '', ''),
(34, 'KODIROVA', 'DJAMILA', 'Ay5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-26 03:34:22', '0', 4, 1, 1, NULL, NULL, '', ''),
(35, 'KODIROVA', 'DJAMILA', 'AB4933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 01:07:16', '0', 4, 1, 1, 5, 3, '', ''),
(36, 'KODIROVA', 'DJAMILA', 'DB5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:15', '0', 3, 1, 1, NULL, NULL, '', ''),
(37, 'KODIROVA', 'DJAMILA', 'AB5933535', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:27', '0', 3, 1, 1, NULL, NULL, '', ''),
(38, 'KODIROVA', 'DJAMILA', 'AB5433735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:36', '0', 3, 1, 1, NULL, NULL, '', ''),
(39, 'KODIROVA', 'DJAMILA', 'AO5933735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:44:42', '0', 3, 1, 1, NULL, NULL, '', ''),
(40, 'KODIROVA', 'DJAMILA', 'AB5333735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:45:06', '0', 5, 1, 1, NULL, NULL, '', ''),
(41, 'KODIROVA', 'DJAMILA', 'AB5933635', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-11-27 14:45:28', '0', 5, 1, 1, 2, 2, '65', '464654'),
(42, 'ISMAILOV', 'Jahongir', 'KK0741345', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 3, 1, 1, NULL, NULL, '', ''),
(43, 'ISMAILOV', 'Jahongir', 'TK0741341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 3, 1, 1, NULL, NULL, '', ''),
(44, 'ISMAILOV', 'Jahongir', 'TK0771341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 3, 1, 1, NULL, NULL, '', ''),
(45, 'ISMAILOV', 'Jahongir', 'TK0775341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 3, 1, 1, NULL, NULL, '', ''),
(46, 'ISMAILOV', 'DASTON', 'JK0771341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-10-16 00:00:00', '0', 1, 1, 3, NULL, NULL, '', ''),
(47, 'QODIROVA', 'JAAMILA', 'AB5903735', '1974-07-14', '0', '2027-02-13', '2017-02-14', '2017-12-15 11:04:47', '0', 1, 1, 1, 50, 1, '12345677789', 'Toshkent shahri1'),
(48, 'ISMAILOV', 'DASTON', 'KA0741347', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-12-18 06:15:51', '0', 1, 1, 5, NULL, NULL, '+998977458090', 'Beruniy tumani'),
(49, 'YUSUPOV', 'JURABEK', 'AA0168033', '1987-07-26', '1', '2022-07-21', '2012-07-22', '2017-12-18 06:34:33', '0', 1, 1, 5, NULL, NULL, '4800787', 'Toshkent'),
(50, 'ISMAILOV', 'DASTON', 'KA0741341', '1995-03-14', '1', '2026-02-09', '2016-02-10', '2017-12-18 06:41:56', '0', 1, 1, 5, NULL, NULL, '+998977458090', 'Beruniy tuman');

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
(1, 'Salom', 'vkvdsklvnkl');

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
(1, 'Toshkent shahri', 100),
(2, 'Qoraqalpog\'iston Respublikasi', 1000),
(3, 'Toshkent viloyati', 500),
(4, 'Samarqand viloyati', 450),
(13, 'Namangan viloyati', 100),
(21, 'Navoiy viloyati', 221),
(22, 'Sirdaryo viloyati', 221),
(23, 'Xorazm viloyati', 200),
(24, 'Buxoro viloyati', 200),
(25, 'Surxandaryo viloyati', 200),
(26, 'Qashqadaryo viloyati', 200),
(27, 'Jizzax viloyati', 100),
(28, 'Farg\'ona viloyati', 100),
(29, 'Andijan', 800);

-- --------------------------------------------------------

--
-- Структура таблицы `reys`
--

CREATE TABLE `reys` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `reys_name` varchar(25) NOT NULL,
  `air_place` varchar(25) NOT NULL,
  `depart_date` date NOT NULL,
  `arrive_date` date NOT NULL,
  `count_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reys`
--

INSERT INTO `reys` (`id`, `name`, `reys_name`, `air_place`, `depart_date`, `arrive_date`, `count_people`) VALUES
(1, 1, 'AA1235', 'Toshkent shahri', '2018-03-14', '2018-03-24', 200),
(12, 2, 'YT56T', 'Samarqand viloyati', '2018-03-15', '2018-03-25', 201),
(13, 10, 'dewd', '46546', '0000-00-00', '0000-00-00', 200),
(14, 252525, '252525', '252525', '0000-00-00', '0000-00-00', 252525),
(15, 1111, '111111', '111111', '2011-11-11', '2011-11-11', 111111),
(16, 111111, '111111', '111111', '2011-11-11', '2011-11-11', 111111);

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
(1, 'admin', '$2y$13$DkpmebSp8nvl5AHPpZE.Zetyl6TwJeyFHZ/JrRcPsAMh0PFrobRbe', 'N4TmPaVGy7l8H42scU7nnNSM90a66ks6', 'Ismailov Doston', 'owner'),
(2, 'user1', '$2y$13$DkpmebSp8nvl5AHPpZE.Zetyl6TwJeyFHZ/JrRcPsAMh0PFrobRbe', 'GWz9hNuXQX68GkOpnn5EhtGDlkIPFN87', 'Userov User', 'user');

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
-- Индексы таблицы `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `reys_id` (`reys_id`);

--
-- Индексы таблицы `mahram_name`
--
ALTER TABLE `mahram_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `malumot`
--
ALTER TABLE `malumot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_number` (`p_number`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `function_id` (`function_id`),
  ADD KEY `mahram_id` (`mahram_id`),
  ADD KEY `mahram_name_id` (`mahram_name_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT для таблицы `function`
--
ALTER TABLE `function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `mahram_name`
--
ALTER TABLE `mahram_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `malumot`
--
ALTER TABLE `malumot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `po_item`
--
ALTER TABLE `po_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `reys`
--
ALTER TABLE `reys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `malumot_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  ADD CONSTRAINT `malumot_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `malumot_ibfk_3` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`),
  ADD CONSTRAINT `malumot_ibfk_4` FOREIGN KEY (`mahram_id`) REFERENCES `malumot` (`id`),
  ADD CONSTRAINT `malumot_ibfk_5` FOREIGN KEY (`mahram_name_id`) REFERENCES `mahram_name` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
